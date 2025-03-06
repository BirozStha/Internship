<?php
/**
 * Template Name: My Account Page
 */
get_header();
?>
<div class="custom-my-account-container">
    <h1 class="my-account-title">My Account</h1>
    <div class="my-account-content">
        <?php
            // WooCommerce My Account Shortcode
            echo do_shortcode('[woocommerce_my_account]');
        ?>
    </div>
</div>
<?php get_footer(); ?>


<!-- css for this in custom.css -->