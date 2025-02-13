<?php get_header(); ?>
<?php
// Get the categories of the current post
$categories = get_the_category();
$category_slug = !empty($categories) ? $categories[0]->slug : 'default';
?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php
        // Check if the post belongs to 'service' category
        if (has_category('services')) : ?>
            <div class="single-post-container <?php echo esc_attr($category_slug); ?>">
             <!-- Service Section Layout -->
                <article class="single-post-content service-layout">
                    <div class="service-header">
                        <h1 class="post-service-title"><?php the_title(); ?></h1>
                    </div>

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="service-image"> 
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="service-content">
                        <?php the_content(); ?>
                    </div>

                    <a href="<?php echo site_url('/service'); ?>" class="back-button">← Back to Services</a>
                </article>
            </div>
        <!--End of the service  -->

        <!-- Start for blog -->
        <!-- Blog Post Layout -->
        <?php elseif (has_category('Blog')) : ?>
            <div class="blog-post-container">
                 <!-- Blog Header -->
                <h1 class="blog-single-title"><?php the_title(); ?></h1>
                <p class="blog-meta">Published on <?php echo get_the_date(); ?> by <?php the_author(); ?></p>

                <!-- Blog Content -->
                <div class="blog-content">
                    <?php the_content(); ?>
                </div>

                <!-- Back to Blog -->
                <a href="<?php echo site_url('/blog'); ?>" class="back-button">← Back to Blogs</a>

                <!-- Other Articles Section -->
                <div class="related-articles">
                    <h2>Other articles picked for you</h2>
                    <div class="related-articles-container">
                        <?php
                            $related_args = array(
                                'post_type'      => 'post',
                                'posts_per_page' => 2,
                                'orderby'        => 'date',
                                'order'          => 'ASC',
                                'post__not_in'   => array(get_the_ID()), // Exclude current post
                                'tax_query'      => array(
                                    array(
                                        'taxonomy' => 'category',
                                        'field'    => 'slug',
                                        'terms'    => 'blog',
                                    ),
                                ),
                            );

                            $related_query = new WP_Query($related_args);

                            if ($related_query->have_posts()) :
                                while ($related_query->have_posts()) : $related_query->the_post();
                                $image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                                $title = get_the_title();
                                $content = get_the_excerpt();
                        ?>
                        <div class="blog-item">
                            <img src="<?php echo esc_url($image); ?>" alt="image">
                            <div class="blog-text">
                                <h3><?php echo esc_html($title); ?></h3>
                                <h6><?php echo get_the_date(); ?></h6>
                                <p><?php echo esc_html($content); ?></p>
                                <a href="<?php echo get_permalink(); ?>" class="keep-reading">KEEP READING</a>

                            </div>
                        </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                            endif;
                        ?>
                    </div>
                </div>
            </div>

      
        <?php else : ?>
            <!-- Default Post Layout -->
            <article class="single-post-content default-layout">
                <h1 class="post-title"><?php the_title(); ?></h1>
                <div class="post-content"><?php the_content(); ?></div>
            </article>
        <?php endif; ?>
    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>








