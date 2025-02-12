<?php
/*
Template Name: Kalki Automation
*/

get_header();
?>
<!-- <div id="primary" class="content-area"> -->
    <!-- <main id="main" class="site-main"> -->



    

        <!-- achievement Content Below Banner -->
        <div class="container-achieve">
            <?php
            $args = array(
                'post_type'      => 'page', 
                'pagename'       => 'Achievement', 
                'posts_per_page' => 1, 
            );
            $new_page_query = new WP_Query($args);
            if ($new_page_query->have_posts()) {
                while ($new_page_query->have_posts()) {
                        $new_page_query->the_post();
                    ?>
                    <div class="achieve">

                    <?php the_content(); ?>
                    
                    </div>

                    <?php
                }
                wp_reset_postdata(); 
            }else {
                echo '<p>No content found.</p>';
            }
            ?>
        </div>


        <!-- serviceContent Below Banner -->
        <div class="container-mata-service serv">
            <?php
            // Get category details
            $category_slug = 'our_service'; // Change this to your actual category slug
            $category = get_term_by('slug', $category_slug, 'category');

            if ($category) {
                $category_id = $category->term_id;
                $category_name = $category->name;
                $category_description = $category->description;
                
                // Explode the category name into two words
                $category_name_parts = explode('_', $category_name);
                $first_word = isset($category_name_parts[0]) ? ucfirst($category_name_parts[0]) : ''; // Capitalize the first word
                $second_word = isset($category_name_parts[1]) ? ucfirst($category_name_parts[1]) : ''; // Capitalize the second word
                
                // Fetch category image from custom field
                $category_image = get_option('z_taxonomy_image' . $category_id);
                // $default_image = get_template_directory_uri() . '/assets/img/default-service.jpg';
                // $category_image = (!empty($category_image)) ? esc_url($category_image) : $default_image;
            ?>

                <!-- Updated Category Section -->
                <div class="service">
                    <div class="wp-block-media-text">
                        <figure class="wp-block-media-text__media">
                            <img src="<?php echo esc_url($category_image); ?>" alt="<?php echo esc_attr($category_name); ?>">
                        </figure>
                        <div class="wp-block-media-text__content">
                            <h1>
                                <span style="color: black;"><?php echo $first_word; ?></span> 
                                <span style="color: #007bff;"><?php echo $second_word; ?></span>
                            </h1>
                            <p><?php echo esc_html($category_description); ?></p>
                            <div class="view-all-button">
                            <a href="<?php echo get_category_link(get_cat_ID('our_service')); ?>" class="button">   
                                View All
                            </a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } else {
                echo '<p>Category not found.</p>';
            } ?>



                    <?php
                    // Fetch posts from the category
                    $args = array(
                        'post_type'      => 'post',
                        'post_status'    => 'publish',
                        'posts_per_page' => 4,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'our_service',
                            ),
                        ),
                    );

                    $the_query = new WP_Query($args);

                    if ($the_query->have_posts()) {
                        $slide_number = 1;
                        echo '<div class="circle-container">';

                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                    ?>
                            
                            <div class="circle circle-<?php echo esc_attr($slide_number); ?>">
                                <i class="fas"><?php echo get_the_content(); ?></i>
                                <h2><?php echo get_the_title(); ?></h2>
                                <h3><?php echo get_the_excerpt(); ?></h3>
                            </div>
                    <?php
                            $slide_number++;
                        }
                        echo '</div>';
                    } else {
                        esc_html_e('Sorry, no posts matched your criteria.');
                    }

                    // Restore original Post Data
                    wp_reset_postdata();
                    ?>
        </div>



        <!-- featured project -->
        <div class="projects-carousel-section">
            <!-- Left Section -->
            <div class="carousel-text-section">
                <h2>Featured <span class="blue-text">Projects</span></h2>
                <a class='view-all-btn' href="<?php echo get_category_link(get_cat_ID('featured')); ?>" class="button">VIEW ALL</a>
                <div class="carousel-navigation">
                    <button id="prev-serv-btn">←</button>
                    <button id="next-serv-btn">→</button>
                </div>
            </div>

            <!-- Right Section: Carousel -->
            <div class="carousel-container">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php
                            $args = array(
                                'post_type'      => 'post',
                                'post_status'    => 'publish',
                                'posts_per_page' => -1, // Fetch 3 posts
                                'tax_query'      => array(
                                    array(
                                        'taxonomy' => 'category',
                                        'field'    => 'slug',
                                        'terms'    => 'featured', // Change to your category slug
                                    ),
                                ),
                            );

                            $the_query = new WP_Query($args);

                            if ($the_query->have_posts()) {
                                while ($the_query->have_posts()) {
                                    $the_query->the_post();
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="post-item">
                                            <a class="blog-link d-block zoom-image">
                                                <?php 
                                                    if (has_post_thumbnail()) {
                                                        the_post_thumbnail('small'); // Adjust size if needed
                                                    } else {
                                                        echo '<img src="https://via.placeholder.com/350x200" alt="Placeholder Image">';
                                                    }
                                                ?>
                                            </a>
                                            <h2><?php the_title(); ?></h2>
                                            <p><?php the_excerpt(); ?></p>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo '<p>No posts found.</p>';
                            }

                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>


        <!-- Testimonial -->
         <div class="test">

             <div class="testimonial-title">
                 <h1>Client's <br><span>Testimonial</span></h1>
             </div>
             <?php
             function create_testimonial_post_type() {
                 register_post_type('testimonial',
                     array(
                         'labels'      => array(
                             'name'          => __('Testimonials'),
                             'singular_name' => __('Testimonial'),
                         ),
                         'public'      => true,
                         'has_archive' => true,
                         'supports'    => array('title', 'editor', 'thumbnail'),
                     )
                 );
             }
             add_action('init', 'create_testimonial_post_type');
             ?>
         <!-- Testimonials Section -->
             <section class="testimonials">
                 <div class="testimonial-wrapper">
                     <button id="prevTestimonial" class="arrow left">
                         <img id="prevImage" src="" alt="Previous">
                         <span>&#8592;</span>
                     </button>
                     <div class="testimonial-content">
                         <div class="testimonial-slider">
                             <?php
                             $args = array(
                                 'post_type'      => 'testimonial',
                                 'posts_per_page' => -1,
                                 'post_status'    => 'publish',
                                 'order'          => 'DESC'
                             );
                             $query = new WP_Query($args);
                             $testimonials = [];
                             if ($query->have_posts()) :
                                 while ($query->have_posts()) : $query->the_post();
                                     $testimonials[] = array(
                                         'image' => get_the_post_thumbnail_url(get_the_ID(), 'medium'),
                                         'title' => get_the_title(),
                                         'content' => apply_filters('the_content', get_the_content()) // Fix content formatting
                                     );
                                 endwhile;
                                 wp_reset_postdata();
                             endif;
                             ?>
                             <?php foreach ($testimonials as $index => $testimonial) : ?>
                                 <div class="testimonial-slide" data-index="<?php echo $index; ?>">
                                     <div class="testimonial-img">
                                         <img src="<?php echo esc_url($testimonial['image']); ?>" alt="<?php echo esc_attr($testimonial['title']); ?>">
                                     </div>
                                     <div class="testimonial-text">
                                         <p><?php echo wp_kses_post($testimonial['content']); ?></p>
                                         <h3><?php echo esc_html($testimonial['title']); ?></h3>
                                     </div>
                                 </div>
                             <?php endforeach; ?>
                         </div>
                     </div>
                     <button id="nextTestimonial" class="arrow right">
                         <img id="nextImage" src="" alt="Next">
                         <span>&#8594;</span>
                     </button>
                 </div>
             </section>
         </div>


<!-- Counter -->
<section class="counter-section">
    <div class="counter-box">
        <h2>400 <span class="blue">+</span></h2>
        <p>Projects Completed</p>
    </div>
    <div class="counter-box">
        <h2>150 <span class="blue">m</span></h2>
        <p>Hours Coding</p>
    </div>
    <div class="counter-box">
        <h2>700 <span class="blue">+</span></h2>
        <p>Happy Clients</p>
    </div>
</section>

<!-- recent post -->
<section class="recent-posts">
    <div class="recent-posts-header">
        <h2><span class="black">Recent</span> <span class="blue">Posts</span></h2>
        <a class='view-all' href="<?php echo get_category_link(get_cat_ID('post')); ?>" class="button">VIEW ALL</a>

    </div>

    <div class="recent-posts-container">
        <?php
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
            'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'post',
                            ),
                        ),

                    );
        
        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                $image = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: 'https://via.placeholder.com/600';
                $title = get_the_title();
                $date = get_the_date('d M, Y');
                $link = get_permalink();
        ?>
                <div class="post-card">
                    <div class="post-image">
                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
                    </div>
                    <div class="post-info">
                        <h3><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h3>
                        <p>Admin | <?php echo esc_html($date); ?></p>
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
</section>

<section class="contact-section">
    <div class="contact-container">
        <?php
        $args = array(
            'post_type'      => 'post',
            'name'           => 'have-an-idea', // 'postname' should be 'name' and use the slug
            'posts_per_page' => 1,
            'post_status'    => 'publish',
            'tax_query'      => array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => 'contact',
                ),
            ),
        );

        $new_page_query = new WP_Query($args);
        if ($new_page_query->have_posts()) :
        ?>
            <?php while ($new_page_query->have_posts()) : $new_page_query->the_post(); ?>
                <div class="contact">
                    <?php the_content(); ?>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        <?php else : ?>
            <p class="no-content">No content found.</p>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer(); // Load the footer template
?>