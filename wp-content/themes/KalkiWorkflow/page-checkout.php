<?php
/**
 * Template Name: Checkout Page
 */
get_header();
?>
<div class="custom-checkout-container">
    <h1 class="checkout-title">Checkout</h1>
    <div class="checkout-form-container">
        <?php
            // WooCommerce Checkout Shortcode
            echo do_shortcode('[woocommerce_checkout]');
        ?>
    </div>
</div>
<?php get_footer(); ?>

<!-- css for this in bookingn.css -->