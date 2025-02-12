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
                <?php 
                $categories = get_the_category(); // Get categories of the current post
                if (!empty($categories)) {
                    $first_category = $categories[0]; // Get the first category
                    $category_link = get_category_link($first_category->term_id); 
                    ?>
                    <a href="<?php echo esc_url($category_link); ?>" class="back-button">← Back to <?php echo esc_html($first_category->name); ?></a>
                <?php } ?>
            </div>

    <?php
        } 

    } 
      ?>
</div>

<?php get_footer(); ?>
