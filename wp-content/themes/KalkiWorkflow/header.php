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
                <?php
                if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                }
                ?>
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
    </nav>