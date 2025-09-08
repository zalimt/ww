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
                                <a href="/wp-content/themes/wise-wolves/legal/WWCorp-Terms.pdf" target="_blank">Terms and Conditions</a>
                                <a href="/wp-content/themes/wise-wolves/legal/WWCorp-Privacy-Policy.pdf" target="_blank">Privacy Policy</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Reusable Modal Root -->
<div class="ww-modal" id="ww-modal" aria-hidden="true">
    <div class="ww-modal-backdrop" data-ww-modal-close></div>
    <div class="ww-modal-dialog" role="dialog" aria-modal="true" aria-label="Modal">
        <button class="ww-modal-close" type="button" aria-label="Close" data-ww-modal-close>×</button>
        <div class="ww-modal-body">
            <div class="ww-contact-card">
                <div class="ww-contact-left">
                    <div class="ww-contact-title">Let's talk about your goals</div>
                    <?php echo do_shortcode('[contact-form-7 id="83879d9" title="Let\'s Talk"]'); ?>
                </div>
                <div class="ww-contact-right">
                    <div class="ww-contact-copy">We’re here to answer your questions, discuss opportunities, and explore how Wise Wolves Corporation can support your vision</div>
                    <div class="ww-contact-image">
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/images/form-lets-talk-bg.webp'); ?>" alt="Let's Talk">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

</body>
</html>
