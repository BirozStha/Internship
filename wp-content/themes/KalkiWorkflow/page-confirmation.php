<?php
/* Template Name: Confirmation Page */
?>
<?php
get_header();
?>
<div class="app-con">
    <h2>Booking Confirmed!</h2>
    <p>Thank you! Your appointment has been scheduled. We'll contact you soon.</p>
    <a href="<?php echo site_url('/booking'); ?>">Back to Booking</a>
</div>
<?php get_footer(); ?>