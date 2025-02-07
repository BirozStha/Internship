<?php get_header(); ?>
<div class="archive-container">
    <h1 class="archive-page-title"><?php single_cat_title(); ?></h1>
    
    <?php if (have_posts()) : ?>
        <div class="archive-service-grid">
            <?php while (have_posts()) : the_post(); ?>
                <div class="archive-service-card">
                    <a href="<?php the_permalink(); ?>">
                        <div class="archive-service-content">
                            <?php echo get_the_content();?>
                            <h2 class="archive-service-title"><?php the_title(); ?></h2>
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
