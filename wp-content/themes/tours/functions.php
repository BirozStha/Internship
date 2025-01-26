<?php

// wp_enqueue_scripts
add_action('wp_enqueue_scripts', 'tours_scripts');
function tours_scripts()
{
    wp_enqueue_style('tours-starter', get_template_directory_uri() . '/assets/css/style-starter.css', [] );
    //wp_enqueue_style('tours-new', get_template_directory_uri() . '/assets/css/new.css', ['tours-starter'], '1.0.0');

    wp_enqueue_script('jquery');
    //wp_enqueue_script('bootstrap',get_template_directory_uri() .'/assets/js/bootstrap.min.js',[],'1.0.0',true);
    wp_enqueue_script('counter',get_template_directory_uri() .'/assets/js/counter.js',[],'1.0.0',true);
    wp_enqueue_script('custom',get_template_directory_uri() .'/assets/js/custom.js',[],'1.0.0',true);
    wp_enqueue_script('owlcarousel',get_template_directory_uri() .'/assets/js/owl.carousel.js',[],'1.0.0',true);
    wp_enqueue_script('slideshow',get_template_directory_uri() .'/assets/js/slideshow.js',[],'1.0.0',true);
    wp_enqueue_script('theme',get_template_directory_uri() .'/assets/js/theme-change.js',[],'1.0.0',true);
    //wp_enqueue_script('jquery',get_template_directory_uri() .'/assets/js/jquery-3.3.1.min.js',[],'1.0.0',true);

}

require_once get_template_directory().'/inc/travel-menu-walker.php';