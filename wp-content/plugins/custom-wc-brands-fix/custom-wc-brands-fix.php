<?php
/*
Plugin Name: Custom WC Brands Fix
Description: Fixes strpos() type error in WC Brands
Version: 1.0
*/

if (!defined('ABSPATH')) {
    exit;
}

class Custom_WC_Brands_Fix
{
    public function __construct()
    {
        add_filter('wc_brand_thumbnail_url', array($this, 'fix_brand_thumbnail_url'), 10, 2);
    }

    public function fix_brand_thumbnail_url($url, $brand_id)
    {
        $thumbnail_id = get_term_meta($brand_id, 'thumbnail_id', true);

        $image_src = $thumbnail_id ? wp_get_attachment_image_src($thumbnail_id, 'full') : false;

        if (!$image_src || !is_array($image_src)) {
            return '';
        }

        $image_url = $image_src[0];

        if (!is_string($image_url)) {
            return '';
        }

        if (strpos($image_url, '://') === false) {
            $image_url = get_site_url() . $image_url;
        }

        return $image_url;
    }
}

new Custom_WC_Brands_Fix();
