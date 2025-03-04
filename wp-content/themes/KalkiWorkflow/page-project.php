<?php
/*
Template Name: Project Page
*/
get_header();
?>

<div class="ps-container">
    <h2 class="ps-title">Available Projects for Sale</h2>
    <div class="ps-grid">
        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'order'          => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => 'projects',
                ),
            ),
        );
        $loop = new WP_Query($args);
        if ($loop->have_posts()) :
            while ($loop->have_posts()) : $loop->the_post();
                global $product;
                ?>
                <div class="ps-project-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium', ['class' => 'ps-project-img']); ?>
                        <h3 class="ps-project-title"><?php the_title(); ?></h3>
                        <p class="ps-project-price"><span>Price:</span><?php echo $product->get_price_html(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="ps-learn-more">View details</a>
                        <a href="<?php echo esc_url($product->add_to_cart_url()); ?>"
                            data-quantity="1"
                            class="add-to-cart-button"
                            data-product_id="<?php echo esc_attr($product->get_id()); ?>"
                            data-product_sku="<?php echo esc_attr($product->get_sku()); ?>">
                            <?php echo esc_html($product->add_to_cart_text()); ?>
                        </a>
                    </a>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo "<p class='ps-no-projects'>No projects available for sale.</p>";
        endif;
        ?>
    </div>
</div>

<?php
get_footer(); 
?>