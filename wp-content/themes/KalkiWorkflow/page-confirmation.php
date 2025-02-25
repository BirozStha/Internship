<?php
/* Template Name: Confirmation Page */
get_header();
?>
<section class="confirmation-container">
    <h2 class="confirmation-title">Booking Confirmed!</h2>
    <p class="confirmation-message">Thank you! Your appointment has been scheduled. We'll contact you soon.</p>
    <div class="a-btn">
        <a class="home-link" href="<?php echo site_url(); ?>">Back to Home</a>
        <a class="home-link" href="<?php echo site_url('/booking'); ?>">Back to Booking</a>
    </div>
</section>
<?php get_footer(); ?>  