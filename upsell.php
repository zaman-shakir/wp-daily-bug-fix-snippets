<?php




// Display upsell product thumbnails with "pa_vaegt" and "pa_farve" attributes
function display_upsell_product_thumbnails()
{
    global $product;

    // Get upsell IDs
    $upsell_ids = get_post_meta($product->get_id(), '_upsell_ids', true);

    // Check if there are any upsell products
    if (!empty($upsell_ids)) {
        // Function to compare products by "pa_vaegt" (weight) attribute
        $compare_by_pa_vaegt = function ($a, $b) {
            $product_a = wc_get_product($a);
            $product_b = wc_get_product($b);

            // Get "pa_vaegt" terms for both products
            $weight_a = wc_get_product_terms($a, 'pa_vaegt', array('fields' => 'names'));
            $weight_b = wc_get_product_terms($b, 'pa_vaegt', array('fields' => 'names'));

            // If either product doesn't have a "pa_vaegt" value, treat it as 0
            $weight_a_value = !empty($weight_a) ? floatval($weight_a[0]) : 0;
            $weight_b_value = !empty($weight_b) ? floatval($weight_b[0]) : 0;

            // Compare the weights
            return $weight_a_value - $weight_b_value;
        };

        // Sort upsell IDs by "pa_vaegt" attribute
        usort($upsell_ids, $compare_by_pa_vaegt);

        echo '<br><br><div class="upsell-product-thumbnails upsell product-upsells">';
        echo '<span style="font-weight: 700; font-size: 1.5rem; color: #000;">' . __('Findes også som:', 'woocommerce') . '</span>';
        echo '<div class="product-thumbnail-container">';

        foreach ($upsell_ids as $upsell_id) {
            $upsell_product = wc_get_product($upsell_id);

            if ($upsell_product) {
                echo "<div class='upsell-container' >";
                // Always use the featured image (primary image) as the thumbnail
                $thumbnail_id = $upsell_product->get_image_id();

                // Fallback to the first gallery image if the featured image doesn't exist
                if (empty($thumbnail_id)) {
                    $attachment_ids = $upsell_product->get_gallery_image_ids();
                    $thumbnail_id = !empty($attachment_ids) ? $attachment_ids[0] : 0;
                }

                // If no thumbnail is available, skip the product
                if ($thumbnail_id) {
                    $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'thumbnail'); // Change 'thumbnail' to the desired thumbnail size

                    $pa_vaegt_values = wc_get_product_terms($upsell_id, 'pa_vaegt', array('fields' => 'names'));
                    $pa_farve_values = wc_get_product_terms($upsell_id, 'pa_farve', array('fields' => 'names'));
                    $pa_type_values = wc_get_product_terms($upsell_id, 'pa_product-type', array('fields' => 'names'));
                    $pa_stoerrelse_values = wc_get_product_terms($upsell_id, 'pa_stoerrelse', array('fields' => 'names'));

                    echo '<div class="product-thumbnail">';
                    echo '<a href="' . esc_url(get_permalink($upsell_id)) . '">';
                    echo wp_get_attachment_image($thumbnail_id, 'thumbnail'); // Display the correct thumbnail image
                    //echo wp_get_attachment_image($thumbnail_id, array(100, 100), false, array('class' => 'uniform-size-thumbnail'));

                    // Display product name
                    //echo '<p class="product-name"><strong>' . esc_html($upsell_product->get_name()) . '</strong></p>';

                    // Display product price
                    //echo '<p class="product-price">' . $upsell_product->get_price_html() . '</p>';
                    // Output "pa_vaegt" attribute value
                    if (!empty($pa_vaegt_values)) {
                        echo '<p>' . esc_html($pa_vaegt_values[0]) . '</p>';
                    }

                    // Output "pa_farve" attribute value
                    if (!empty($pa_farve_values)) {
                        echo '<p>' . esc_html($pa_farve_values[0]) . '</p>';
                    }

                    // Output "pa_type" attribute value
                    if (!empty($pa_type_values)) {
                        echo '<p>' . esc_html($pa_type_values[0]) . '</p>';
                    }

                    // Output "pa_stoerrelse" attribute value
                    if (!empty($pa_stoerrelse_values)) {
                        echo '<p>' . esc_html($pa_stoerrelse_values[0]) . '</p>';
                    }

                    echo '</a>';
                    echo '</div>';
                }
                echo "<div class='product-name'>";
                echo '<p class="product-name"><strong>' . esc_html($upsell_product->get_name()) . '</strong></p>';
                echo "</div>";
                echo "<div class='product-price'>";
                echo '<p class="product-price">' . $upsell_product->get_price_html() . '</p>';
                echo "</div>";
                echo "</div>";

            }
        }

        echo '</div>';
        echo '</div><span style="clear:both;"></span>';
        echo '<style>';

        echo '.upsell-container{max-width: 135px; display: flex; flex-direction: column;margin-right: 15px;}';

        echo '.product-thumbnail{display:flex;justify-content:center;}';
        echo '.product-thumbnail img{max-width:55px;}';

        echo '.product-name, .product-price{font-size:12px; text-align:center;}';
        echo '.product-name{display: flex; align-items: center; justify-content: center; min-height: 40px; flex: 1;}';
        echo '.product-name p{margin: 0;}';
        echo '</style>';
    }
}

// Hook to trigger the display function
add_action('woocommerce_before_add_to_cart_form', 'display_upsell_product_thumbnails', 1);
