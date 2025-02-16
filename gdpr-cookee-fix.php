<?php
/*
Plugin Name: GDPR Cookie Fix
Description: A WordPress plugin to dynamically handle tracking cookies based on user consent.
Version: 1.1
Author: Imran Khan, Webkonsulenterne
License: GPL2
*/

if (!defined('ABSPATH')) {
    exit;
}

// 🔹 Add Menu Item in WP Admin
function gdpr_add_admin_menu()
{
    add_options_page('GDPR Cookie Handler', 'GDPR Cookies', 'manage_options', 'wk-gdpr-cookie-handler', 'wk_gdpr_settings_page');
}
add_action('admin_menu', 'gdpr_add_admin_menu');

// 🔹 Register Setting
function gdpr_register_settings()
{
    // Register the setting properly
    register_setting('wk_gdpr_cookie_handler', 'wk_gdpr_cookie_patterns');

    // Only set default if the option doesn't exist
    if (get_option('wk_gdpr_cookie_patterns') === false) {
        $default_patterns = '_sn_*,SNS,sbjs_*,_drip*,_clck,_clsk,TawkConnectionTime,cf_clearance,sbjs_current,sbjs_current_add,sbjs_first,sbjs_first_add,sbjs_migrations,sbjs_session,sbjs_udata,twk_idm_key';
        update_option('wk_gdpr_cookie_patterns', $default_patterns);
    }
}
add_action('admin_init', 'gdpr_register_settings');


// 🔹 Redirect to Settings Page After Activation
function wk_gdpr_cookie_handler_activate()
{
    add_option('wk_gdpr_cookie_handler_activation_redirect', true);
}
register_activation_hook(__FILE__, 'wk_gdpr_cookie_handler_activate');

function wk_gdpr_cookie_handler_activation_redirect()
{
    if (get_option('wk_gdpr_cookie_handler_activation_redirect', false)) {
        delete_option('wk_gdpr_cookie_handler_activation_redirect');

        if (!isset($_GET['activate-multi'])) {
            wp_safe_redirect(admin_url('options-general.php?page=wk-gdpr-cookie-handler'));
            exit;
        }
    }
}
add_action('admin_init', 'wk_gdpr_cookie_handler_activation_redirect');



// 🔹 Settings Page Content
function wk_gdpr_settings_page()
{
    // Get the current value
    $current_patterns = get_option('wk_gdpr_cookie_patterns');

    // If empty, use the default value
    if (empty($current_patterns)) {
        $current_patterns = '_sn_*,SNS,sbjs_*,_drip*,_clck,_clsk,TawkConnectionTime,cf_clearance,sbjs_current,sbjs_current_add,sbjs_first,sbjs_first_add,sbjs_migrations,sbjs_session,sbjs_udata,twk_idm_key';
    }
    ?>
    <div class="wrap">
        <h1>GDPR Cookie Handler Settings</h1>
        <form method="post" action="options.php">
            <?php settings_fields('wk_gdpr_cookie_handler'); ?>
            <?php do_settings_sections('wk_gdpr_cookie_handler'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="wk_gdpr_cookie_patterns">Cookies to Handle (Comma-Separated)</label></th>
                    <td>
                        <input type="text"
                               name="wk_gdpr_cookie_patterns"
                               id="wk_gdpr_cookie_patterns"
                               value="<?php echo esc_attr($current_patterns); ?>"
                               class="regular-text"
                               style="width: 100%;">
                        <p class="description">Enter cookie prefixes like "_sn_*, SNS, sbjs_*" to automatically handle tracking cookies.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// 🔹 Enqueue Scripts and Pass Cookie Patterns
function wk_gdpr_enqueue_scripts()
{
    $cookie_patterns = get_option('wk_gdpr_cookie_patterns', '_sn_*,SNS,sbjs_*,_drip*,_clck,_clsk,TawkConnectionTime,cf_clearance,sbjs_current,sbjs_current_add,sbjs_first,sbjs_first_add,sbjs_migrations,sbjs_session,sbjs_udata,twk_idm_key');

    ?>
    <script id="allowcookiesetscripts">
        // Run this immediately to prevent cookies from being set before consent
        (function() {
            const originalDocumentCookie = Object.getOwnPropertyDescriptor(Document.prototype, 'cookie');
            let cookiePatterns = '<?php echo esc_js($cookie_patterns); ?>'.split(',');

            // Override the cookie setter
            Object.defineProperty(document, 'cookie', {
                get: function() {
                    return originalDocumentCookie.get.call(this);
                },
                set: function(value) {
                    // Parse the cookie being set
                    const cookieName = value.split('=')[0].trim();

                    // Check if this is a tracking cookie
                    const isTrackingCookie = cookiePatterns.some(pattern => {
                        // Create regex from pattern
                        const regexPattern = new RegExp('^' +
                            pattern.trim()
                                  .replace(/\*/g, '.*')
                                  .replace(/[-\/\\^$+?.()|[\]{}]/g, '\\$&') +
                            '$'
                        );
                        return regexPattern.test(cookieName);
                    });

                    // Only allow the cookie if it's not a tracking cookie or if consent is given
                    if (!isTrackingCookie || (
                        document.cookie.includes('bt_consent') &&
                        JSON.parse(decodeURIComponent(document.cookie.split('bt_consent=')[1].split(';')[0])).bt_statistics
                    )) {
                        originalDocumentCookie.set.call(this, value);
                        console.log('✅ Allowed cookie:', cookieName);
                    } else {
                        console.log('🚫 Blocked cookie:', cookieName);
                    }
                }
            });
        })();
    </script>
    <script id="cookiehandlerscript" async>
        let lastConsentValue = "";

        function isTrackingAllowed() {
            let cookies = document.cookie.split("; ").reduce((acc, cookie) => {
                let [key, value] = cookie.split("=");
                acc[key] = decodeURIComponent(value);
                return acc;
            }, {});

            if (!cookies["bt_consent"]) {
                console.warn("❌ bt_consent cookie not found");
                return false;
            }

            try {
                let consentData = JSON.parse(cookies["bt_consent"]);
                return consentData.bt_statistics === true || consentData.bt_marketing === true;
            } catch (error) {
                console.error("Error parsing bt_consent cookie:", error);
                return false;
            }
        }

        // **🗄️ Store Cookies in localStorage Before Removing (with Pattern Matching)**
        function storeCookiesBeforeRemoval(cookieNames) {
            console.group("🗄️ Cookie Storage");

            if (!window.localStorage) {
                console.warn("⚠️ localStorage is not available!");
                console.groupEnd();
                return;
            }

            let storedCookies = JSON.parse(localStorage.getItem("storedCookies")) || {};
            let patterns = getCookiePatterns();
            let foundCookies = [];
            let skippedCookies = [];

            console.log("🔍 Looking for cookies matching patterns:", patterns);

            document.cookie.split("; ").forEach((cookie) => {
                let [name, value] = cookie.split("=");
                name = name.trim();

                if (cookieNames.includes(name) || patterns.some(pattern => matchCookiePattern(name, pattern))) {
                    if (value) {
                        storedCookies[name] = value;
                        foundCookies.push({ name, value });
                        console.log(`✅ Stored: ${name} = ${value}`);
                    } else {
                        skippedCookies.push(name);
                        console.warn(`⚠️ Skipped empty cookie: ${name}`);
                    }
                }
            });

            localStorage.setItem("storedCookies", JSON.stringify(storedCookies));

            console.log("📊 Storage Summary:", {
                stored: foundCookies.length,
                skipped: skippedCookies.length,
                cookies: foundCookies.map(c => c.name)
            });
            console.groupEnd();
        }




        // **🔍 Check If a Cookie Matches a Pattern (`_ga*` should match `_ga`, `_ga123`)**
        function matchCookiePattern(cookieName, pattern) {
			// Trim whitespace just in case
			cookieName = cookieName.trim();
			pattern = pattern.trim();

			// If pattern is just "*" => match everything
			if (pattern === "*") {
				return true;
			}

			// If pattern has no "*" => must match exactly
			if (!pattern.includes("*")) {
				return cookieName === pattern;
			}

			// Convert wildcard pattern to a RegExp
			// 1) Escape regex special chars except "*"
			// 2) Replace "*" with ".*" for a wildcard
			let escaped = pattern.replace(/[.+?^${}()|[\]\\]/g, "\\$&")   // Escape regex chars
								 .replace(/\*/g, ".*");                  // "*" => ".*"

			// Create a case-sensitive regex (if you need case-insensitive, add "i")
			let regex = new RegExp(`^${escaped}$`);

			return regex.test(cookieName);
		}

        // **🔄 Restore Cookies If Consent is Given**
        function restoreStoredCookies() {
			let storedCookies = JSON.parse(localStorage.getItem("storedCookies")) || {};
			let currentDomain = window.location.hostname;
			let rootDomain = currentDomain.startsWith("www.") ? currentDomain.substring(4) : currentDomain;

			Object.keys(storedCookies).forEach((cookie) => {
				// 🚀 Set cookie only for the main domain
				document.cookie = `${cookie}=${storedCookies[cookie]}; path=/; domain=.${rootDomain}; secure; SameSite=None`;
				console.log(`
