<?php
/*
Template Name: Kalki Automation
*/

get_header();
?>
<!-- <div id="primary" class="content-area"> -->
    <!-- <main id="main" class="site-main"> -->

        <!-- Banner Section -->
        <section class="banner-section">
            <?php
            $banner_image = get_template_directory_uri() . '/assets/img/banner.png';
            ?>
            <img src="<?php echo esc_url($banner_image); ?>" alt="Banner Image" class="banner-image">
            <div class="banner-content">
                <div class="rectangle">
                    <h1>
                        Automate 
                        <br>
                        <span class="bold">Workflow</span> With Us
                    </h1>
                    <a href="#" class="btn">VIEW MORE</a>
                </div>
            </div>
        </section>

       <!-- Navigation Menu -->
        <nav class="main-nav">
            <?php
            // Display the navigation menu
            wp_nav_menu(array(
                'menu' => 'kalki_menu',
                'menu_class'     => 'nav-menu',
            ));
            ?>
        </nav> 
        <!-- Navigation Menu -->

        <!-- referance -->
        <!-- <section id="new-page-content" class="new-page-content">
            <div class="container">
                <?php
                // Use WP_Query to fetch the content of a specific page (e.g., "Services")
                $args = array(
                    'post_type'      => 'page', 
                    'pagename'       => 'home', 
                    'posts_per_page' => 1, 
                );
                $new_page_query = new WP_Query($args);
                if ($new_page_query->have_posts()) {
                    while ($new_page_query->have_posts()) {
                         $new_page_query->the_post();
                        the_content(); // Display the content of the page
                    }
                    wp_reset_postdata(); // Reset the post data
                }else {
                    echo '<p>No content found.</p>';
                }
                ?>
            </div>
        </section> -->
    

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

        <!-- achievement Content Below Banner -->
        <div class="container-mata-service serv">
            <?php
                $args = array(
                    'post_type'      => 'page', 
                    'pagename'       => 'service', 
                    'posts_per_page' => 1, 
                );
                $new_page_query = new WP_Query($args);
                if ($new_page_query->have_posts()) {
                    while ($new_page_query->have_posts()) {
                            $new_page_query->the_post();
                            ?>
                        <div class="service">

                            <?php the_content(); ?>
                            
                        </div>

                            <?php
                    }
                    wp_reset_postdata(); 
                }else {
                    echo '<p>No content found.</p>';
                }
            ?>


            <?php
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 4,
                    // 'catagory_name' => 'slider',
                    'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'our_service',
                            ),
                        ),

                    );

                    // The Query.
                    $the_query = new WP_Query( $args );

                    // The Loop.
                    if ( $the_query->have_posts() ) {

                        $slide_number = 1;
                        echo'<div class="circle-container">';

                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();

            ?>
                        <!-- Top -->
                        <div class="circle circle-<?php echo esc_attr($slide_number); ?>">
                            <!-- <i class="fas fa-gem"></i>  -->
                             <i class="fas"><?php echo get_the_content()?></i>
                            <h2><?php echo get_the_title() ?></h2>
                            <h3><?php echo get_the_excerpt() ?></h3>
                        </div>
                    

             <?php
                        $slide_number++; 
                    }
                    echo '</div>';

                } else {
                    esc_html_e( 'Sorry, no posts matched your criteria.' );
                }
                // Restore original Post Data.
                wp_reset_postdata();
             ?>
        </div>



        <div class="projects-carousel-section">
            <!-- Left Section -->
            <div class="carousel-text-section">
                <h2>Featured <span class="blue-text">Projects</span></h2>
                <a href="#" class="view-all-btn">View All</a>
                <div class="carousel-navigation">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
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
                                'posts_per_page' => 3, // Fetch 3 posts
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
                                echo '<div class="posts-container">';

                                while ($the_query->have_posts()) {
                                    $the_query->the_post();
                                    ?>
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
                                    <?php
                                }

                                echo '</div>';
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










        




    <!-- </main> -->
<!-- </div> -->
<?php
get_footer(); // Load the footer template
?>