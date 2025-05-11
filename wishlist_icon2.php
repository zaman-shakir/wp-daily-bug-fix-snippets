<?php

// Add wishlist after add to cart button - only on product pages
add_action('elementor/widget/woocommerce-product-add-to-cart/skins_init', function ($widget) {
    // Only run on product pages
    if (!is_product()) {
        return;
    }

    add_action('woocommerce_after_add_to_cart_button', function () {
        echo do_shortcode('[yith_wcwl_add_to_wishlist]');
    });
});

// Add CSS to wp_head to style the wishlist button - only on product pages
add_action('wp_head', function () {
    // Only apply on single product pages
    if (!is_product()) {
        return;
    }
    ?>
    <style>
    .single-product-cart-container .e-atc-qty-button-holder {
        background: red;
        width: fit-content;
    }

    .single-product-cart-container .yith-wcwl-add-to-wishlist {
        position: relative;
        width: fit-content;
        left: 295px;
        /* top: -48px; */
        background: blue;
        /* margin: -1px; */
        padding: 0px;
        margin-top: -50px;
        padding-top: 0px;
    }

    @media (min-width: 768px) and (max-width: 1024px) {
        .single-product-cart-container .yith-wcwl-add-to-wishlist {

            left: 283px;

            margin-top: -40px;

        }
    }
    @media (max-width: 767px) {
        .single-product-cart-container .yith-wcwl-add-to-wishlist {
            left: 275px;
            margin-top: -40px;

        }
    }

    </style>
    <?php
});

?>
<form class="cart" action="https://ux2.sportyfit.dk/vare/vaegtstang-saet-body-pump-saet-20kg/" method="post" enctype="multipart/form-data">
					<div class="bundle_form bundle_sells_form initialized"><div class="bundled_item_1 bundled_product bundled_product_summary product has_qty_input bundled_item_optional"><div class="bundled_product_images images" style="opacity: 1;"><figure class="bundled_product_image woocommerce-product-gallery__image"><a href="https://ux2.sportyfit.dk/wp-content/uploads/2021/07/Billig-Vaegtskive-10kg-Vaegtstangset-pumpset.png" class="image zoom" title="Lilla vægtskive på 10 kg" data-rel="photoSwipe"><img loading="lazy" width="247" height="296" src="https://ux2.sportyfit.dk/wp-content/uploads/2021/07/Billig-Vaegtskive-10kg-Vaegtstangset-pumpset-247x296.png" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="Lilla vægtskive med en vægt på 10 kg" title="Lilla vægtskive på 10 kg" data-caption="Lilla vægtskive anvendt til styrketræning." data-large_image="https://ux2.sportyfit.dk/wp-content/uploads/2021/07/Billig-Vaegtskive-10kg-Vaegtstangset-pumpset.png" data-large_image_width="600" data-large_image_height="600" decoding="async" data-xoowscfly="fly"></a></figure></div>
<div class="details"><h4 class="bundled_product_title product_title"><span class="bundled_product_title_inner"><span class="item_title">Vægtskive 10 kg Ø30mm til pumpset - Lilla | NORGYM PRO</span><span class="item_qty"></span><span class="item_suffix"></span></span> <span class="bundled_product_title_link"><a class="bundled_product_permalink" href="https://ux2.sportyfit.dk/vare/vaegtskive-10kg-oe30mm-hul-til-pumpset/" target="_blank" aria-label="View product"></a></span></h4>
<div class="bundled_product_excerpt product_excerpt"><ul>
<li>Øger mulighederne i dit pumpsæt med ekstra 10 kg vægt ✓</li>
<li>Designet til at passe til alle vægtstangssæt/pumpsæt, der benytter en Ø30mm vægtstang ✓</li>
<li>Belagt med kraftig lilla gummibelægning for sikker håndtering og holdbarhed ✓</li>
</ul>
<p>Med Vægtskive 10kg Ø30mm til pumpset, kan du nemt tilføje mere belastning til dit træningsregime. (Husk at bestille 2stk hvis den skal benyttes til en vægtstang)</p>
</div>
<label class="bundled_product_optional_checkbox">
	<input class="bundled_product_checkbox" type="checkbox" name="bundle_selected_optional_1" value=""> Tilføj for <span class="price"><span class="woocommerce-Price-amount amount">299,00<span class="woocommerce-Price-currencySymbol">kr.</span></span><div class="viabill-pricetag" data-view="product" data-price="299"></div> <span class="bundled_item_price_quantity">each</span></span></label><div class="cart" data-title="Vægtskive 10 kg Ø30mm til pumpset - Lilla | NORGYM PRO" data-product_title="Vægtskive 10 kg Ø30mm til pumpset - Lilla | NORGYM PRO" data-visible="yes" data-optional_suffix="" data-optional="yes" data-type="simple" data-bundled_item_id="1" data-custom_data="[]" data-product_id="4620" data-bundle_id="2629">
	<div class="bundled_item_wrap">
		<div class="bundled_item_cart_content" style="display:none">
			<div class="bundled_item_cart_details"><p class="stock in-stock">På lager</p>
</div>
			<div class="bundled_item_after_cart_details bundled_item_button"><input class="bundled_qty" type="hidden" name="bundle_quantity_1" value="1">
</div>
		</div>
	</div>
</div>
</div></div><div class="bundled_item_2 bundled_product bundled_product_summary product bundled_item_optional"><div class="bundled_product_images images" style="opacity: 1;"><figure class="bundled_product_image woocommerce-product-gallery__image"><a href="https://ux2.sportyfit.dk/wp-content/uploads/2023/06/1.png" class="image zoom" title="Vægtstangsholder" data-rel="photoSwipe"><img loading="lazy" width="247" height="296" src="https://ux2.sportyfit.dk/wp-content/uploads/2023/06/1-247x296.png" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="Vægtstangsholder til opbevaring af vægtskiver" title="Vægtstangsholder" data-caption="En robust holder til organisation af vægtskiver i et træningscenter." data-large_image="https://ux2.sportyfit.dk/wp-content/uploads/2023/06/1.png" data-large_image_width="400" data-large_image_height="400" decoding="async" data-xoowscfly="fly"></a></figure></div>
<div class="details"><h4 class="bundled_product_title product_title"><span class="bundled_product_title_inner"><span class="item_title">Stativ til Bodypump sæt | NORGYM PRO</span><span class="item_qty"></span><span class="item_suffix"></span></span> <span class="bundled_product_title_link"><a class="bundled_product_permalink" href="https://ux2.sportyfit.dk/vare/stativ-til-bodypump-saet/" target="_blank" aria-label="View product"></a></span></h4>
<div class="bundled_product_excerpt product_excerpt"><ul>
<li>Smart pladsbesparende design ✓</li>
<li>Sort farve, der passer ind i ethvert træningsmiljø ✓</li>
<li>Kan rumme op til 10 sæt stænger og skiver ✓</li>
</ul>
<p>Opdag NORGYM PRO's Bodypump-stativ, en ideel løsning til at holde dit træningsudstyr organiseret. Fordyb dig i din Bodypump-rutine uden rod!</p>
</div>
<label class="bundled_product_optional_checkbox">
	<input class="bundled_product_checkbox" type="checkbox" name="bundle_selected_optional_2" value="" disabled="disabled"> Tilføj for <span class="price"><span class="woocommerce-Price-amount amount">1.495,00<span class="woocommerce-Price-currencySymbol">kr.</span></span><div class="viabill-pricetag" data-view="product" data-price="1495"></div> <span class="bundled_item_price_quantity">each</span></span></label><p class="stock out-of-stock">Ikke på lager</p>
<div class="cart" data-title="Stativ til Bodypump sæt | NORGYM PRO" data-product_title="Stativ til Bodypump sæt | NORGYM PRO" data-visible="yes" data-optional_suffix="" data-optional="yes" data-type="simple" data-bundled_item_id="2" data-custom_data="[]" data-product_id="35804" data-bundle_id="2629">
	<div class="bundled_item_wrap">
		<div class="bundled_item_cart_content" style="display:none">
			<div class="bundled_item_cart_details"><p class="stock out-of-stock">Ikke på lager</p>
</div>
			<div class="bundled_item_after_cart_details bundled_item_button"><input class="bundled_qty" type="hidden" name="bundle_quantity_2" value="1">
</div>
		</div>
	</div>
</div>
</div></div><div class="bundled_item_3 bundled_product bundled_product_summary product bundled_item_optional"><div class="bundled_product_images images" style="opacity: 1;"><figure class="bundled_product_image woocommerce-product-gallery__image"><a href="https://ux2.sportyfit.dk/wp-content/uploads/2020/03/Traeningsmaatte-180x60x1cm-sort.png" class="image zoom" title="Træningsmåtte-180x60x1cm-sort" data-rel="photoSwipe"><img loading="lazy" width="247" height="296" src="https://ux2.sportyfit.dk/wp-content/uploads/2020/03/Traeningsmaatte-180x60x1cm-sort-247x296.png" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="Sort og tyk træningsmåtte med bærestrop og metaløjer til ophængning, rullet sammen for nem transport." title="Træningsmåtte-180x60x1cm-sort" data-caption="Træningsmåtte klar til brug eller transport." data-large_image="https://ux2.sportyfit.dk/wp-content/uploads/2020/03/Traeningsmaatte-180x60x1cm-sort.png" data-large_image_width="600" data-large_image_height="600" decoding="async" data-xoowscfly="fly"></a></figure></div>
<div class="details"><h4 class="bundled_product_title product_title"><span class="bundled_product_title_inner"><span class="item_title">Træningsmåtte med bærestrop - Sort og tyk | NORGYM</span><span class="item_qty"></span><span class="item_suffix"></span></span> <span class="bundled_product_title_link"><a class="bundled_product_permalink" href="https://ux2.sportyfit.dk/vare/traeningsmaatte-sort/" target="_blank" aria-label="View product"></a></span></h4>
<div class="bundled_product_excerpt product_excerpt"><ul>
<li>180cm lang, 60cm bred og 1,5cm tyk - ideel til hjemmebrug ✓</li>
<li>Praktisk elastikstrop for nem opbevaring og transport ✓</li>
<li>Anbefales til mave- og rygøvelser samt udstrækning ✓</li>
</ul>
<p>Du vil elske vores Norgym træningsmåtte i sort, perfekt til mavebøjninger, rygøvelser og udstrækning. Den er nem at opbevare og transportere takket være den praktiske elastikstrop.</p>
</div>
<label class="bundled_product_optional_checkbox">
	<input class="bundled_product_checkbox" type="checkbox" name="bundle_selected_optional_3" value="" disabled="disabled"> Tilføj for <span class="price"><del aria-hidden="true"><span class="woocommerce-Price-amount amount">249,00<span class="woocommerce-Price-currencySymbol">kr.</span></span></del> <span class="screen-reader-text">Original price was: 249,00kr..</span><ins aria-hidden="true"><span class="woocommerce-Price-amount amount">149,00<span class="woocommerce-Price-currencySymbol">kr.</span></span></ins><span class="screen-reader-text">Current price is: 149,00kr..</span><div class="viabill-pricetag" data-view="product" data-price="149"></div> <span class="bundled_item_price_quantity">each</span></span></label><p class="stock out-of-stock">Ikke på lager</p>
<div class="cart" data-title="Træningsmåtte med bærestrop - Sort og tyk | NORGYM" data-product_title="Træningsmåtte med bærestrop - Sort og tyk | NORGYM" data-visible="yes" data-optional_suffix="" data-optional="yes" data-type="simple" data-bundled_item_id="3" data-custom_data="[]" data-product_id="1946" data-bundle_id="2629">
	<div class="bundled_item_wrap">
		<div class="bundled_item_cart_content" style="display:none">
			<div class="bundled_item_cart_details"><p class="stock out-of-stock">Ikke på lager</p>
</div>
			<div class="bundled_item_after_cart_details bundled_item_button"><input class="bundled_qty" type="hidden" name="bundle_quantity_3" value="1">
</div>
		</div>
	</div>
</div>
</div></div><div class="bundled_item_4 bundled_product bundled_product_summary product has_qty_input bundled_item_optional"><div class="bundled_product_images images" style="opacity: 1;"><figure class="bundled_product_image woocommerce-product-gallery__image"><a href="https://ux2.sportyfit.dk/wp-content/uploads/2022/03/Booty-band-3-pak-front.png" class="image zoom" title="Træningselastikker i farver" data-rel="photoSwipe"><img loading="lazy" width="247" height="296" src="https://ux2.sportyfit.dk/wp-content/uploads/2022/03/Booty-band-3-pak-front-247x296.png" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="Tre træningselastikker i grøn, pink og lilla." title="Træningselastikker i farver" data-caption="Sæt med tre elastiske træningsbånd i forskellige farver." data-large_image="https://ux2.sportyfit.dk/wp-content/uploads/2022/03/Booty-band-3-pak-front.png" data-large_image_width="600" data-large_image_height="600" decoding="async" data-xoowscfly="fly"></a></figure></div>
<div class="details"><h4 class="bundled_product_title product_title"><span class="bundled_product_title_inner"><span class="item_title">Bootybands elastikker 3 stk | NORGYM</span><span class="item_qty"></span><span class="item_suffix"></span></span> <span class="bundled_product_title_link"><a class="bundled_product_permalink" href="https://ux2.sportyfit.dk/vare/bootybands-elastikker-3stk-forskellige/" target="_blank" aria-label="View product"></a></span></h4>
<div class="bundled_product_excerpt product_excerpt"><ul>
<li>Effektive Bootybands træningselastikker til ben, lår og baller. ✓</li>
<li>Tre elastikker med forskellig modstand, ideel til alle fitnessniveauer. ✓</li>
<li>Holdbar konstruktion af bomuld og elastan, kan bruges hjemme eller i træningscenteret. ✓</li>
</ul>
<p>Opnå maksimale resultater med Bootybands elastikker fra Norgym. Med tre forskellige modstandsniveauer er disse elastikker ideelle til at målrette balder og benmuskler, og bidrager til styrketræning og konditionstræning.</p>
</div>
<label class="bundled_product_optional_checkbox">
	<input class="bundled_product_checkbox" type="checkbox" name="bundle_selected_optional_4" value=""> Tilføj for <span class="price"><del aria-hidden="true"><span class="woocommerce-Price-amount amount">299,00<span class="woocommerce-Price-currencySymbol">kr.</span></span></del> <span class="screen-reader-text">Original price was: 299,00kr..</span><ins aria-hidden="true"><span class="woocommerce-Price-amount amount">99,00<span class="woocommerce-Price-currencySymbol">kr.</span></span></ins><span class="screen-reader-text">Current price is: 99,00kr..</span><div class="viabill-pricetag" data-view="product" data-price="99"></div> <span class="bundled_item_price_quantity">each</span></span></label><div class="cart" data-title="Bootybands elastikker 3 stk | NORGYM" data-product_title="Bootybands elastikker 3 stk | NORGYM" data-visible="yes" data-optional_suffix="" data-optional="yes" data-type="simple" data-bundled_item_id="4" data-custom_data="[]" data-product_id="8403" data-bundle_id="2629">
	<div class="bundled_item_wrap">
		<div class="bundled_item_cart_content" style="display:none">
			<div class="bundled_item_cart_details"><p class="stock in-stock">På lager</p>
</div>
			<div class="bundled_item_after_cart_details bundled_item_button"><input class="bundled_qty" type="hidden" name="bundle_quantity_4" value="1">
</div>
		</div>
	</div>
</div>
</div></div>				<div class="bundle_data bundle_data_2629" data-bundle_form_data="{&quot;layout&quot;:&quot;default&quot;,&quot;hide_total_on_validation_fail&quot;:&quot;no&quot;,&quot;zero_items_allowed&quot;:&quot;yes&quot;,&quot;raw_bundle_price_min&quot;:0,&quot;raw_bundle_price_max&quot;:&quot;&quot;,&quot;is_purchasable&quot;:&quot;yes&quot;,&quot;show_free_string&quot;:&quot;no&quot;,&quot;show_total_string&quot;:&quot;no&quot;,&quot;prices&quot;:{&quot;1&quot;:299,&quot;2&quot;:1495,&quot;3&quot;:149,&quot;4&quot;:99},&quot;regular_prices&quot;:{&quot;1&quot;:299,&quot;2&quot;:1495,&quot;3&quot;:249,&quot;4&quot;:299},&quot;prices_tax&quot;:{&quot;1&quot;:{&quot;incl&quot;:1,&quot;excl&quot;:0.8},&quot;2&quot;:{&quot;incl&quot;:1,&quot;excl&quot;:0.8},&quot;3&quot;:{&quot;incl&quot;:1,&quot;excl&quot;:0.8},&quot;4&quot;:{&quot;incl&quot;:1,&quot;excl&quot;:0.8}},&quot;addons_prices&quot;:{&quot;1&quot;:&quot;&quot;,&quot;2&quot;:&quot;&quot;,&quot;3&quot;:&quot;&quot;,&quot;4&quot;:&quot;&quot;},&quot;regular_addons_prices&quot;:{&quot;1&quot;:&quot;&quot;,&quot;2&quot;:&quot;&quot;,&quot;3&quot;:&quot;&quot;,&quot;4&quot;:&quot;&quot;},&quot;quantities&quot;:{&quot;1&quot;:&quot;&quot;,&quot;2&quot;:&quot;&quot;,&quot;3&quot;:&quot;&quot;,&quot;4&quot;:&quot;&quot;},&quot;product_ids&quot;:{&quot;1&quot;:4620,&quot;2&quot;:35804,&quot;3&quot;:1946,&quot;4&quot;:8403},&quot;is_sold_individually&quot;:{&quot;1&quot;:&quot;no&quot;,&quot;2&quot;:&quot;no&quot;,&quot;3&quot;:&quot;no&quot;,&quot;4&quot;:&quot;no&quot;},&quot;recurring_prices&quot;:{&quot;1&quot;:&quot;&quot;,&quot;2&quot;:&quot;&quot;,&quot;3&quot;:&quot;&quot;,&quot;4&quot;:&quot;&quot;},&quot;regular_recurring_prices&quot;:{&quot;1&quot;:&quot;&quot;,&quot;2&quot;:&quot;&quot;,&quot;3&quot;:&quot;&quot;,&quot;4&quot;:&quot;&quot;},&quot;recurring_html&quot;:{&quot;1&quot;:&quot;&quot;,&quot;2&quot;:&quot;&quot;,&quot;3&quot;:&quot;&quot;,&quot;4&quot;:&quot;&quot;},&quot;recurring_keys&quot;:{&quot;1&quot;:&quot;&quot;,&quot;2&quot;:&quot;&quot;,&quot;3&quot;:&quot;&quot;,&quot;4&quot;:&quot;&quot;},&quot;base_price&quot;:0,&quot;base_regular_price&quot;:0,&quot;base_price_tax&quot;:{&quot;incl&quot;:1,&quot;excl&quot;:0.8},&quot;base_price_totals&quot;:{&quot;price&quot;:0,&quot;regular_price&quot;:0,&quot;price_incl_tax&quot;:0,&quot;price_excl_tax&quot;:0},&quot;subtotals&quot;:{&quot;price&quot;:0,&quot;regular_price&quot;:0,&quot;price_incl_tax&quot;:0,&quot;price_excl_tax&quot;:0},&quot;totals&quot;:{&quot;price&quot;:0,&quot;regular_price&quot;:0,&quot;price_incl_tax&quot;:0,&quot;price_excl_tax&quot;:0},&quot;recurring_totals&quot;:{&quot;price&quot;:0,&quot;regular_price&quot;:0,&quot;price_incl_tax&quot;:0,&quot;price_excl_tax&quot;:0},&quot;has_variable_quantity&quot;:{&quot;1&quot;:&quot;yes&quot;,&quot;2&quot;:&quot;yes&quot;,&quot;3&quot;:&quot;yes&quot;,&quot;4&quot;:&quot;yes&quot;},&quot;quantities_available&quot;:{&quot;1&quot;:191,&quot;2&quot;:0,&quot;3&quot;:0,&quot;4&quot;:475},&quot;is_in_stock&quot;:{&quot;1&quot;:&quot;yes&quot;,&quot;2&quot;:&quot;no&quot;,&quot;3&quot;:&quot;no&quot;,&quot;4&quot;:&quot;yes&quot;},&quot;backorders_allowed&quot;:{&quot;1&quot;:&quot;no&quot;,&quot;2&quot;:&quot;no&quot;,&quot;3&quot;:&quot;no&quot;,&quot;4&quot;:&quot;no&quot;},&quot;backorders_require_notification&quot;:{&quot;1&quot;:&quot;no&quot;,&quot;2&quot;:&quot;no&quot;,&quot;3&quot;:&quot;no&quot;,&quot;4&quot;:&quot;no&quot;},&quot;is_nyp&quot;:{&quot;1&quot;:&quot;no&quot;,&quot;2&quot;:&quot;no&quot;,&quot;3&quot;:&quot;no&quot;,&quot;4&quot;:&quot;no&quot;},&quot;is_priced_individually&quot;:{&quot;1&quot;:&quot;yes&quot;,&quot;2&quot;:&quot;yes&quot;,&quot;3&quot;:&quot;yes&quot;,&quot;4&quot;:&quot;yes&quot;},&quot;bundled_item_1_totals&quot;:{&quot;price&quot;:0,&quot;regular_price&quot;:0,&quot;price_incl_tax&quot;:0,&quot;price_excl_tax&quot;:0},&quot;bundled_item_1_recurring_totals&quot;:{&quot;price&quot;:0,&quot;regular_price&quot;:0,&quot;price_incl_tax&quot;:0,&quot;price_excl_tax&quot;:0},&quot;bundled_item_2_totals&quot;:{&quot;price&quot;:0,&quot;regular_price&quot;:0,&quot;price_incl_tax&quot;:0,&quot;price_excl_tax&quot;:0},&quot;bundled_item_2_recurring_totals&quot;:{&quot;price&quot;:0,&quot;regular_price&quot;:0,&quot;price_incl_tax&quot;:0,&quot;price_excl_tax&quot;:0},&quot;bundled_item_3_totals&quot;:{&quot;price&quot;:0,&quot;regular_price&quot;:0,&quot;price_incl_tax&quot;:0,&quot;price_excl_tax&quot;:0},&quot;bundled_item_3_recurring_totals&quot;:{&quot;price&quot;:0,&quot;regular_price&quot;:0,&quot;price_incl_tax&quot;:0,&quot;price_excl_tax&quot;:0},&quot;bundled_item_4_totals&quot;:{&quot;price&quot;:0,&quot;regular_price&quot;:0,&quot;price_incl_tax&quot;:0,&quot;price_excl_tax&quot;:0},&quot;bundled_item_4_recurring_totals&quot;:{&quot;price&quot;:0,&quot;regular_price&quot;:0,&quot;price_incl_tax&quot;:0,&quot;price_excl_tax&quot;:0},&quot;group_mode_features&quot;:[&quot;parent_item&quot;,&quot;child_item_indent&quot;,&quot;aggregated_prices&quot;,&quot;aggregated_subtotals&quot;,&quot;parent_cart_widget_item_meta&quot;]}" data-bundle_id="2629">
					<div class="bundle_wrap">
						<div class="bundle_error" style="display:none">

	<div class="woocommerce-info">
		<ul class="msg"></ul>	</div>
						</div>
					</div>
				</div>
			</div>

				<div class="e-atc-qty-button-holder">
			<div class="ux-quantity quantity buttons_added">
		<input type="button" value="-" class="ux-quantity__button ux-quantity__button--minus button minus is-form">				<label class="screen-reader-text" for="quantity_681c8d224dff4">Vægtstang sæt / body pump sæt 20 kg | NORGYM PRO antal</label>
		<input type="number" id="quantity_681c8d224dff4" class="input-text qty text" name="quantity" value="1" aria-label="Vareantal" size="4" min="1" max="112" step="1" placeholder="" inputmode="numeric" autocomplete="off">
				<input type="button" value="+" class="ux-quantity__button ux-quantity__button--plus button plus is-form">	</div>

		<button type="submit" name="add-to-cart" value="2629" class="single_add_to_cart_button button alt">Tilføj til kurv</button>

				</div>
		<input type="hidden" name="gtm4wp_product_data" value="{&quot;internal_id&quot;:2629,&quot;item_id&quot;:2629,&quot;item_name&quot;:&quot;V\u00e6gtstang s\u00e6t \/ body pump s\u00e6t 20 kg | NORGYM PRO&quot;,&quot;sku&quot;:&quot;SF3010f-1&quot;,&quot;price&quot;:549,&quot;stocklevel&quot;:112,&quot;stockstatus&quot;:&quot;instock&quot;,&quot;google_business_vertical&quot;:&quot;retail&quot;,&quot;item_category&quot;:&quot;Crossfit og HIIT&quot;,&quot;id&quot;:2629}">

<div class="yith-wcwl-add-to-wishlist add-to-wishlist-2629 yith-wcwl-add-to-wishlist--button_default-style yith-wcwl-add-to-wishlist--single wishlist-fragment on-first-load" data-fragment-ref="2629" data-fragment-options="{&quot;base_url&quot;:&quot;&quot;,&quot;product_id&quot;:2629,&quot;parent_product_id&quot;:0,&quot;product_type&quot;:&quot;simple&quot;,&quot;is_single&quot;:true,&quot;in_default_wishlist&quot;:false,&quot;show_view&quot;:false,&quot;browse_wishlist_text&quot;:&quot;Se liste&quot;,&quot;already_in_wishslist_text&quot;:&quot;&quot;,&quot;product_added_text&quot;:&quot;&quot;,&quot;available_multi_wishlist&quot;:false,&quot;disable_wishlist&quot;:false,&quot;show_count&quot;:false,&quot;ajax_loading&quot;:false,&quot;loop_position&quot;:&quot;after_add_to_cart&quot;,&quot;item&quot;:&quot;add_to_wishlist&quot;}">

			<!-- ADD TO WISHLIST -->

<div class="yith-wcwl-add-button">
		<a href="?add_to_wishlist=2629&amp;_wpnonce=f03f9a4962" class="add_to_wishlist single_add_to_wishlist alt button theme-button-style " data-product-id="2629" data-product-type="simple" data-original-product-id="0" data-title="" rel="nofollow">
		<svg id="yith-wcwl-icon-heart-outline" class="yith-wcwl-icon-svg" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"></path>
</svg>		<span></span>
	</a>
</div>

			<!-- COUNT TEXT -->

			</div>
	</form>
