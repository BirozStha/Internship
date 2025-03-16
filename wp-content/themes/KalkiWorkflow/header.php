<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head(); ?>
</head>
<body>
<?php if (is_front_page()) : ?>
        <!-- Banner Section (Only for Front Page) -->
        <section class="banner-section">
            <?php
            $banner_image = get_template_directory_uri() . '/assets/img/banner.png';
            ?>
            <img src="<?php echo esc_url($banner_image); ?>" alt="Banner Image" class="banner-image">

            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bl3.png" alt="Vector 1" class="banner-vector top-right vector1">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bl3.png" alt="Vector 2" class="banner-vector top-right vector2">
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
    <?php endif; ?>

    <!-- Navigation Menu (Visible on All Pages) -->
    <nav class="main-nav">
        <div class="nav-container">
            
            <div class="logo">
                <div class="bg">
                    <?php
                        if (function_exists('the_custom_logo')) {
                            the_custom_logo();
                        }
                    ?>
                </div>
                        

            </div>
            <?php
            // Display the navigation menu
            wp_nav_menu(array(
                'menu' => 'kalki_menu',
                'menu_class' => 'nav-menu',
                'container'  => false // Avoid extra divs
            ));
            ?>
        </div>

        <div class="user-account">
    <?php if (is_user_logged_in()) : ?>
        <?php
        $current_user = wp_get_current_user();
        $username = $current_user->display_name;
        ?>
        <div class="dropdown">
            <button class="dropbtn"> <?php echo esc_html($username). '▼'; ?> </button>
            
            <div class="dropdown-content">
                <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>">Dashboard</a>
                <a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a>
            </div>
        </div>
    <?php endif; ?>
</div>

    </nav>