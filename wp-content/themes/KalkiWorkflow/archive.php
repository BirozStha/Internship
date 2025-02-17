<?php get_header(); ?>
<div class="archive-container">
    <h1 class="archive-page-title">
        <?php 
        $title = single_cat_title('', false);
        $title = str_replace('_', ' ', $title); // Replace underscore with space
        $title_parts = explode(' ', $title, 2); // Split the title into two parts

        if (!empty($title_parts[0]) && !empty($title_parts[1])) {
            echo '<span style="color: black;">' . esc_html(ucfirst($title_parts[0])) . '</span> ';
            echo '<span style="color: #007bff;">' . esc_html(ucfirst($title_parts[1])) . '</span>';
        } else {
            echo esc_html(ucfirst($title)); // Fallback if there's no space in title
        }
        ?>
    </h1>
    
    <?php if (have_posts()) : ?>
        <div class="archive-service-grid">
            <?php while (have_posts()) : the_post(); ?>
                <div class="archive-service-card">
                    <a href="<?php the_permalink(); ?>">
                        <div class="archive-service-content">
                            <?php echo get_the_content();?>
                            <h2 class="archive-service-title"><?php the_title(); ?></h2>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="default-post-thumbnail">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>
                            <?php endif; ?>
                            <p class="archive-service-excerpt"><?php the_excerpt(); ?></p>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="archive-pagination">
            <?php echo paginate_links(); ?>
        </div>
    <?php else : ?>
        <p class="archive-no-services">No services found.</p>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
