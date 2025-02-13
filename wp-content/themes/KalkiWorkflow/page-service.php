<?php
/*
Template Name: Service page
*/
get_header();
?>
<?php
        $category = get_category_by_slug('services'); // Fetch category by slug
        if ($category) :
    ?>
        <h2 class="services-title"><?php echo esc_html($category->name); ?></h2>
        <?php endif; ?>

<div class="services-container">

    <?php
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => 'services',
            ),
        ),
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $image = get_the_post_thumbnail_url(get_the_ID(), 'large');
            $title = get_the_title();
            $content = get_the_excerpt(); // Use excerpt for a cleaner look
    ?>
            <div class="service-item">
                <img src="<?php echo esc_url($image); ?>" alt="image">
                <div class="service-text">
                    <h3><?php echo esc_html($title); ?></h3>
                    <p><?php echo esc_html($content); ?></p>
                    <a href="<?php echo get_permalink(); ?>" class="view-details-btn">View Details</a>
                </div>
            </div>
    <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No posts found.</p>';
    endif;
    ?>
</div>







<?php get_footer(); ?>
