<?php

add_action('wp_head', function() {
	?>
		<!-- <style>
			@media (max-width: 768px) {
			img[src="/wp-content/themes/flatsome-child/trustpilot.png"] {
				width: 118px;
				height: 33px;
			}
		}
		</style> -->
	<?php

        // loading for all devices
		echo "<!-- Preloading Critical Assets 1.0.2 -->\n";
        echo '<link rel="preload" as="font" href="https://shakir.billigventilation.dk/wp-content/themes/rife-free-ny-search/fonts/a13-icomoon.ttf?shhy2f" type="font/ttf" crossorigin>' . "\n";
        echo '<link rel="preload" as="font" href="https://shakir.billigventilation.dk/fonts/saira-semi-condensed-v9-latin-300.woff2" type="font/woff2" crossorigin>' . "\n";
        echo '<link rel="preload" as="font" href="https://shakir.billigventilation.dk/fonts/saira-semi-condensed-v9-latin-regular.woff2" type="font/woff2" crossorigin>' . "\n";
        echo '<link rel="preload" as="font" href="https://shakir.billigventilation.dk/fonts/saira-semi-condensed-v9-latin-500.woff2" type="font/woff2" crossorigin>' . "\n";
        echo '<link rel="preload" as="font" href="https://shakir.billigventilation.dk/fonts/saira-semi-condensed-v9-latin-700.woff2" type="font/woff2" crossorigin>' . "\n";
        echo '<link rel="preload" as="font" href="https://shakir.billigventilation.dk/fonts/saira-semi-condensed-v9-latin-600.woff2" type="font/woff2" crossorigin>' . "\n";
        echo '<link rel="preload" as="font" href="https://shakir.billigventilation.dk/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-solid-900.woff2" type="font/woff2" crossorigin>' . "\n";
        echo '<link rel="preload" as="font" href="https://shakir.billigventilation.dk/wp-content/plugins/woocommerce-side-cart-premium/assets/css/fonts/Woo-Side-Cart.woff?le17z4" type="font/woff" crossorigin>' . "\n";






    if (is_front_page()) {


	    //loading for only mobile
		if(wp_is_mobile()){
			echo '<link rel="preload" as="image" href="' . esc_url(home_url('/wp-content/uploads/2023/10/Billig-Ventilation-header-2023-1-1024x403.jpg')) . '">' . "\n";
		}

        //echo '<link rel="preload" as="image" href="' . esc_url(home_url('/wp-content/uploads/2024/09/Forside-billede-1.jpg-1.webp')) . '">' . "\n";
    }

    // 3. Preload WooCommerce product images (product pages only)
    if (is_product()) {
        global $product;
        $product = wc_get_product(get_the_ID());

        if ($product) {
            // Main product image
            $main_image_id = $product->get_image_id();
            if ($main_image_id) {
                $main_img_src = wp_get_attachment_image_src($main_image_id, 'woocommerce_single');
                if ($main_img_src) {
                    echo '<link rel="preload" as="image" href="' . esc_url($main_img_src[0]) . '" type="' . esc_attr(get_post_mime_type($main_image_id)) . '">' . "\n";
                }
            }

            // Gallery images (first 3)
            $gallery_ids = $product->get_gallery_image_ids();
            if (!empty($gallery_ids)) {
                foreach (array_slice($gallery_ids, 0, 3) as $image_id) {
                    $gallery_img_src = wp_get_attachment_image_src($image_id, 'woocommerce_single');
                    if ($gallery_img_src) {
                        echo '<link rel="preload" as="image" href="' . esc_url($gallery_img_src[0]) . '" type="' . esc_attr(get_post_mime_type($image_id)) . '">' . "\n";
                    }
                }
            }
        }
    }
    if (is_product_category()) {
        global $wp_query;

        // Get the first two products in the loop
        $products = $wp_query->posts;
        $first_two_products = array_slice($products, 0, 2);

        if (!empty($first_two_products)) {
            echo "<!-- Preloading First Two Product Images -->\n";

            foreach ($first_two_products as $product) {
                $product_id = $product->ID;
                $product = wc_get_product($product_id);

                // Get the main product image
                $image_id = $product->get_image_id();
                if ($image_id) {
                    $image_url = wp_get_attachment_image_url($image_id, 'woocommerce_thumbnail');
                    echo '<link rel="preload" as="image" href="' . esc_url($image_url) . '">' . "\n";
                }
            }

            echo "<!-- End Preloads -->\n";
        }
    }
    echo "<!-- End Preloads -->\n";
}, 5);
