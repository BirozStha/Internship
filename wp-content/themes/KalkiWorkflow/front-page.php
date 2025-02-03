<?php
/*
Template Name: Kalki Automation
*/

get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">

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

        </div>




    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer(); // Load the footer template
?>