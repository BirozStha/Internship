<?php
/* Template Name: Cart Page */
get_header();
?>
<div style="margin-bottom: 20px; margin-left: 20px; margin-right: 20px;">
    <div>
        <h1> Your Shopping Cart</h1>
    </div>
    <div>
        <?php echo do_shortcode('[woocommerce_cart]'); ?>
    </div>
</div>
<?php get_footer(); ?>