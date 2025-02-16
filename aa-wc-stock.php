<?php

/*
1. <i class="right ph-fill ph-truck"></i>Fjernlager <br>Typisk leveringstid 1-3 uger
    css-id backorder-stock
2. <i class="right ph-fill ph-package"></i> Ikke på lager
    css id: out-stock
3. <i class="right ph-fill ph-package"></i> På lager, men få tilbage
    css id : few-stock
4. <i class="right ph-fill ph-package"></i> På lager
    css id: in-stock
*/

// First ensure WooCommerce is active
if (!function_exists('is_product')) {
    return;
}

/**** SHOW STOCK STATUSES IN *****/
// this just add inline css to the product page to show the stock statuses
function custom_stock_status_shortcode()
{
    if (!function_exists('is_product') || !is_product()) {
        return '';
    }

    global $product;

    // Get stock status and quantity
    $stock_quantity = $product->get_stock_quantity();
    $stock_status = $product->get_stock_status();

    // Enqueue the script only on product pages
    wp_enqueue_script(
        'product-stock-status',
        get_stylesheet_directory_uri() . '/js/product-stock-status.js',
        array(),
        '1.0.0',
        true // Load in footer for better performance
    );

    // Pass PHP variables to JavaScript
    wp_localize_script('product-stock-status', 'stockStatusData', array(
        'defaultStatus' => $stock_status,
        'defaultQuantity' => $stock_quantity ?? 0
    ));

    // Return only the CSS
    ob_start();
    ?>
    <style>
        /* Initial styles without !important */
        <?php if ($stock_status == 'outofstock'): ?>
            #in-stock, #few-stock, #backorder-stock { display: none; }
            #out-stock { display: block; }
        <?php elseif ($stock_status == 'onbackorder'): ?>
            #in-stock, #few-stock, #out-stock { display: none; }
            #backorder-stock { display: block; }
        <?php elseif ($stock_quantity < 5): ?>
            #in-stock, #out-stock, #backorder-stock { display: none; }
            #few-stock { display: block; }
        <?php else: ?>
            #out-stock, #few-stock, #backorder-stock { display: none; }
            #in-stock { display: block; }
        <?php endif; ?>

        /* Add a class for JavaScript control */
        .stock-status-active { display: block !important; }
        .stock-status-hidden { display: none !important; }
    </style>
    <?php
    return ob_get_clean();
}

add_shortcode('custom_stock_visibility', 'custom_stock_status_shortcode');
