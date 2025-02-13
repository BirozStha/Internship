<?php
/*
Template name: Blog page
*/
get_header();
?>

<?php
$category = get_category_by_slug('blog'); // Fetch category by slug
if ($category) :
?>
    <h2 class="blog-title"><?php echo esc_html($category->name); ?></h2>
<?php endif; ?>

<div class="blog-container">

    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 8, 
        'paged'          => $paged, 
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => 'blog',
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
            <div class="blog-item">
                <img src="<?php echo esc_url($image); ?>" alt="image">
                <div class="blog-text">
                    <h3><?php echo esc_html($title); ?></h3>
                    <p><?php echo esc_html($content); ?></p>
                    <a href="<?php echo get_permalink(); ?>" class="view-blog-details-btn">Read More</a>
                </div>
            </div>
    <?php
        endwhile;
    ?>
        
    </div>
    <?php
    echo '<div class="pagination">';
    echo paginate_links(array(
        'total' => $query->max_num_pages,
        'current' => max(1, get_query_var('paged')),
        'prev_text' => '« Prev',
        'next_text' => 'Next »',
    ));
    echo '</div>';

    wp_reset_postdata();
else :
    echo '<p>No posts found.</p>';
endif;
?>

<!-- header ko matiko -->
<div class="blog-after-pagination">
    <div>
        <h1>Get the latest<br>news into your inbox</h1>

    </div>
    <div>
        <h5>
            Stay informed and up-tp-date with the latest news
            delivered straight to your inbox for a seamless and
            convenient experience
        </h5>
    </div>
</div>

    <!-- form -->
    <div class="form-style">
        <?php
            $args = array(
                'post_type'      => 'post', 
                'post_status'    => 'publish',
                'name'      =>  'formblog',

            );

            $query = new WP_Query($args);

            if ($query->have_posts()) {

                while ($query->have_posts()) {
                $query->the_post();
                    echo the_content();
                }

            }
        ?>
        
    </div>
</div>

<?php get_footer(); ?>