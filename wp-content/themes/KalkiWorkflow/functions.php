<?php
    function kalki_style() {
        wp_enqueue_style('kalki_Automation', get_template_directory_uri() . '/assets/css/custom.css');
        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    
        // Ensure Swiper is loaded before your custom JS
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
        wp_enqueue_script('custom-carousel-js', get_template_directory_uri() . '/assets/js/feature.js', array('swiper-js', 'jquery'), null, true);
    }
    add_action('wp_enqueue_scripts', 'kalki_style');
    add_theme_support( 'post-thumbnails' );
    
?>
