<?php

// Shortcode to display top selling product categories with a fixed limit of 20
function wk_sportyfit_top_selling_product_categories_shortcode()
{
    $output = '<style>';
    $output .= '.top-selling-categories { display: flex; overflow-y: hidden; font-size: 14px; margin-bottom: 0px;}
			.top-selling-categories p { margin-bottom: 0px;}
			.top-selling-categories .category-item { display: flex; align-items: center; width: 120px; min-width: 120px;  flex-direction: column; text-align: center; }
			.top-selling-categories .category-item a { font-size: 13px; color: #000; }
			.top-selling-categories .category-item a:hover { color: #000; text-decoration: underline };';
    $output .= '</style>';
    // Get the top selling category IDs based on the hardcoded limit
    $top_category_ids = [ 216, 200, 201, 199, 395, 235, 140, 242, 247, 186 ];

    // Build the output HTML for the shortcode
    $output .= '<div class="top-selling-categories">';
    foreach ($top_category_ids as $cat_id) {
        $term = get_term($cat_id, 'product_cat');
        // Get the thumbnail ID and then the image URL for the category
        $thumbnail_id = get_term_meta($cat_id, 'thumbnail_id', true);
        $image_url    = wp_get_attachment_url($thumbnail_id);
        $link         = get_term_link($term);
        $title        = $term->name;

        $output .= '<div class="category-item">';
        //         if ( $image_url ) {
        //             $output .= '<a href="' . esc_url( $link ) . '"><img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $title ) . '" width="96" height="96"></a>';
        //         }

        $image_src = wp_get_attachment_image_src($thumbnail_id, [96, 96], true);
        $image_url = $image_src ? $image_src[0] : '';
        if ($image_url) {
            $output .= '<a href="' . esc_url($link) . '">
				<img src="' . esc_url($image_url) . '" alt="' . esc_attr($title) . '" width="96" height="96">
			</a>';
        }
        $output .= '<a href="' . esc_url($link) . '">' . esc_html($title) . '</a>';
        $output .= '</div>';
    }
    $output .= '</div>';

    return $output;
}
add_shortcode('wk_top_selling_categories', 'wk_sportyfit_top_selling_product_categories_shortcode');
