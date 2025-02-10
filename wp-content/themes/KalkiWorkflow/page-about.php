<?php
/*
Template Name: About Us
*/
get_header();
?>

<div class="about-us-container">
    <div class="about-content">
        <h1><?php the_title(); ?></h1> 
        <div><?php the_content(); ?></div> 
    </div>
</div>

<?php get_footer(); ?>

