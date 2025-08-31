    </div><!-- #content -->

    <footer id="colophon" class="wise-wolves-footer" role="contentinfo">
        <div class="footer-background">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/images/footer-bg.webp'); ?>" alt="Footer Background" class="footer-bg-image">
        </div>
        
        <div class="footer-content">
            <div class="container">
                <div class="footer-main">
                    
                    <!-- Logo and Copyright Section -->
                    <div class="footer-logo-section">
                        <div class="footer-logo">
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/images/wisewolves-logo-white.svg'); ?>" alt="<?php bloginfo('name'); ?>" class="footer-logo-img">
                        </div>
                        <div class="footer-copyright">
                            <p>&copy; Wise Wolves Corporation, <?php echo date('Y'); ?></p>
                        </div>
                    </div>
                    
                    <!-- Menu Section -->
                    <div class="footer-menu-section">
                        <h3 class="footer-menu-title">Menu</h3>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'wise-wolves-footer',
                            'menu_class'     => 'footer-menu',
                            'container'      => false,
                            'fallback_cb'    => 'wise_wolves_footer_fallback_menu',
                        ));
                        ?>
                    </div>
                    
                    <!-- Call to Action Section -->
                    <div class="footer-cta-section">
                        <div class="footer-cta-text">
                            <p>Reach out to our team for consultations, partnerships, or inquiries</p>
                        </div>
                        <div class="footer-cta-button">
                            <a href="#contacts" class="ww-btn ww-btn-white">
                                Contact us
                            </a>
                        </div>
                        
                        <!-- Legal Links Section -->
                        <div class="footer-legal">
                            <div class="legal-links">
                                <a href="/terms-and-conditions">Terms and Conditions</a>
                                <a href="/privacy-policy">Privacy Policy</a>
                                <a href="/cookie-policy">Cookie Policy</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
