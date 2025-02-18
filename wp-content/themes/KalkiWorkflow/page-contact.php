<?php
/*
Template name: Contact Page
*/
get_header();
?>

<section class="contact-page-section">
<h1 style="font-size: 100px; margin-bottom:50px; margin-left:180px;"><?php echo get_the_title(); ?></h1>

    <div class="contact-page-container">
        
        <!-- Left Column (Page Content) -->
        <div class="contact-page">
            <h2>Have an idea? <br> <span style="color:blue;">Tell us about it</span></h2>
            <?php the_content(); ?>
        </div>

        <!-- Right Column (ACF Contact Info) -->
        <div class="contact-info-box">
            <h3>Contact Info</h3>
            <p>Fill up the form and our team will get back to you within 24 hours.</p>
            <div class="contact-details">
                <?php if ($phone = get_field('contact')) : ?>
                    <p><i class="fas fa-phone-alt"></i> <?php echo esc_html($phone); ?></p>
                <?php endif; ?>
                <?php if ($email = get_field('email')) : ?>
                    <p><i class="fas fa-envelope"></i> <?php echo esc_html($email); ?></p>
                <?php endif; ?>
                <?php if ($address = get_field('address')) : ?>
                    <p><i class="fas fa-map-marker-alt"></i> <?php echo esc_html($address); ?></p>
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>
