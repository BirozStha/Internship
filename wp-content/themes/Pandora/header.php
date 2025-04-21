<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head(); ?>
</head>
<body>
    <div class="pink-line"></div>

    <!-- Navigation Menu (Visible on All Pages) -->
    <nav class="post-nav">
            
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
                'menu' => 'Pandora',
                'menu_class' => 'nav-menu',
                'container'  => false // Avoid extra divs
            ));
            ?>

    </nav>
