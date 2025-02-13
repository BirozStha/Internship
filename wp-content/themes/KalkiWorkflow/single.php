<?php
// Check if the page is using the "Blog page" template
if (is_page_template('page-blog.php')) {
    // If on the blog page, include the custom 'single-post.php' template
    include(locate_template('single-post.php'));
    exit; // Stop further processing to prevent loading single.php
}

get_header(); ?>

<div class="single-post-container">
    <?php if (have_posts()) {
        while (have_posts()) {
            the_post(); ?>
            
            <div class="single-post-content">
                <div class="single-post-header">
                    <?php if (has_post_thumbnail()) { ?>
                        <div class="single-post-thumbnail">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php the_title(); ?>">
                        </div>
                    <?php } ?>

                    <div class="single-post-meta">
                        <h1 class="single-post-title"><?php the_title(); ?></h1>
                        <p class="post-date"><?php echo get_the_date(); ?></p>
                    </div>
                </div>

                <div class="single-post-body">
                    <?php the_content(); ?>
                </div>

                <?php if (has_excerpt()) { ?>
                    <div class="single-post-excerpt">
                        <p><?php the_excerpt(); ?></p>
                    </div>
                <?php } ?>
            </div>

            <!-- Back to Archive Button -->
            <div class="back-to-archive">
                <?php 
                // Check if the post belongs to the "Services" category
                if (has_category('services')) { 
                    $back_url = site_url('/service/'); // Hardcoded service page URL
                    $back_text = "← Back to Services";
                } else {
                    // Fallback: Get first category dynamically
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        $first_category = $categories[0]; 
                        $back_url = get_category_link($first_category->term_id);
                        $back_text = "← Back to " . esc_html($first_category->name);
                    } else {
                        // Default fallback to home page if no category is found
                        $back_url = site_url('/');
                        $back_text = "← Back Home";
                    }
                }
                ?>
                <a href="<?php echo esc_url($back_url); ?>" class="back-button"><?php echo esc_html($back_text); ?></a>
            </div>

        <?php } } ?>
</div>

<?php get_footer(); ?>
