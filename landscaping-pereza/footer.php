</div><!-- #content -->

<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-widget">
            <h3>About Landscaping Pereza</h3>
            <p>Professional landscaping services in Hoffman Estates and Schaumburg. We specialize in lawn mowing, cleanup, gardening, and tree trimming.</p>
            <div class="footer-contact">
                <p><i class="fas fa-phone"></i> <a href="tel:6304618267">(630) 461-8267</a></p>
                <p><i class="fas fa-map-marker-alt"></i> Serving Hoffman Estates & Schaumburg</p>
            </div>
        </div>

        <div class="footer-widget">
            <h3>Our Services</h3>
            <ul class="footer-services">
                <li><i class="fas fa-leaf"></i> Lawn Mowing</li>
                <li><i class="fas fa-broom"></i> Fall Cleanup</li>
                <li><i class="fas fa-seedling"></i> Gardening</li>
                <li><i class="fas fa-tree"></i> Tree Trimming</li>
            </ul>
        </div>

        <div class="footer-widget">
            <h3>Service Areas</h3>
            <ul class="footer-locations">
                <li>Hoffman Estates, IL</li>
                <li>Schaumburg, IL</li>
            </ul>
            <div class="cta-footer">
                <p>Need help with landscaping?</p>
                <a href="tel:6304618267" class="footer-cta-button">Call Javier Now</a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="footer-container">
            <div class="footer-bottom-content">
                <p>&copy; <?php echo date('Y'); ?> Landscaping Pereza. All Rights Reserved.</p>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class'     => 'footer-menu',
                    'depth'          => 1,
                    'fallback_cb'    => false,
                ));
                ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<script>
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>

</body>
</html>