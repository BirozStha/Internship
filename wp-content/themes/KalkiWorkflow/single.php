<?php get_header(); ?>

<div class="single-post-container">
    <?php if (have_posts()) {
        while (have_posts()) {
            the_post(); ?>
            <div class="single-post-content">
                <h1 class="single-post-title"><?php the_title(); ?></h1>
                
                <div class="single-post-flex">
                    <div class="single-post-body">
                        <?php echo get_the_content(); ?>
                    </div>
                    <div class="single-post-excerpt">
                        <p><?php the_excerpt(); ?></p>
                    </div>
                </div>
            </div>

            <!-- Back to Archive Button -->
            <div class="back-to-archive">
                <a href="<?php echo get_category_link(get_cat_ID('our_service')); ?>" class="back-button">← Back to Services</a>

            </div>

    <?php
        } 

    } 
      ?>
</div>

<?php get_footer(); ?>
