<div class="footer-container">
    <footer class="footer">
        <div class="footer-logo">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/logo.png" alt="Kalki Automation Logo">
        </div>

        <div class="footer-links">
            <h4>About</h4>
            <?php
            
            wp_nav_menu(array(
                'menu' => 'kalki_menu',
                'menu_class' => 'nav-menu-footer',
                'container'  => false // Avoid extra divs
            ));
            ?>
            <!-- <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">How It Works</a></li>
                <li><a href="#">What We Do</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">FAQs</a></li>
            </ul> -->
        </div>

        <div class="footer-connect">
            <h4>Connect</h4>
            <ul>
                <li>Kathmandu, Nepal <br>44600</li>
                <br>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">LinkedIn</a></li>
            </ul>
        </div>
    </footer>

    <div class="footer-bottom">
        <p>Copyright &copy; 2023 Kalki Automations. All Rights Reserved.</p>
        <div>
            <a href="#">Terms & Conditions</a>
            <a href="#">Privacy Policy</a>
        </div>
    </div>
</div>



<?php wp_footer(); ?>

</body>
</html>

