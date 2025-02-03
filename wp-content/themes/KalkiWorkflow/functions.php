<?php
    function kalki_style() {
        wp_enqueue_style('kalki_Automation', get_template_directory_uri() . '/assets/css/custom.css');
        wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css');
    }
    add_action('wp_enqueue_scripts', 'kalki_style');
?>