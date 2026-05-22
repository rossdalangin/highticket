<footer class="site-footer">
    <div class="container footer-grid">
        <!-- Col 1: Brand -->
        <div class="footer-brand">
            <div class="footer-logo">
                <?php
                $logo = get_theme_mod( 'ea_executive_logo' );
                if ( $logo ) : ?>
                    <img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                <?php else : ?>
                    <?php bloginfo( 'name' ); ?>
                <?php endif; ?>
            </div>
            <p class="footer-mission"><?php echo esc_html( get_theme_mod('ea_about_mission', "We engineer institutional trust for the world's most impactful leadership architects.") ); ?></p>
            <div class="footer-social">
                <?php if ( get_theme_mod('ea_linkedin_url', '#') ) : ?><a href="<?php echo esc_url(get_theme_mod('ea_linkedin_url', '#')); ?>" class="social-link">LinkedIn</a><?php endif; ?>
                <?php if ( get_theme_mod('ea_twitter_url', '#') ) : ?><a href="<?php echo esc_url(get_theme_mod('ea_twitter_url', '#')); ?>" class="social-link">X / Twitter</a><?php endif; ?>
            </div>
        </div>

        <!-- Col 2: Navigation -->
        <div class="footer-nav-col">
            <h3 class="footer-heading"><?php echo esc_html( get_theme_mod('ea_footer_col2_title', 'Infrastructure') ); ?></h3>
            <nav class="footer-nav">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer',
                    'container'      => false,
                    'menu_class'     => 'footer-nav-list',
                    'fallback_cb'    => false
                ) );
                ?>
            </nav>
        </div>

        <!-- Col 3: Contact -->
        <div class="footer-contact">
            <h3 class="footer-heading"><?php echo esc_html( get_theme_mod('ea_footer_col3_title', 'Institutional Access') ); ?></h3>
            <p class="contact-info"><strong>Location:</strong> <?php echo esc_html( get_theme_mod('ea_contact_office', 'Executive Suite, Financial District') ); ?></p>
            <p class="contact-info"><strong>Inquiries:</strong> support@<?php echo $_SERVER['HTTP_HOST']; ?></p>
        </div>

        <!-- Col 4: Trust & Legal -->
        <div class="footer-trust">
            <h3 class="footer-heading"><?php echo esc_html( get_theme_mod('ea_footer_col4_title', 'Legal & Trust') ); ?></h3>
            <p class="footer-legal-text mb-md"><?php echo esc_html( get_theme_mod('ea_footer_legal_text', 'All leadership engagements are subject to a strict Mutual Non-Disclosure Agreement.') ); ?></p>

            <div class="footer-trust-seals">
                <p class="trust-label mb-xs"><?php echo esc_html(get_theme_mod('ea_footer_trust_label', 'SECURE INFRASTRUCTURE:')); ?></p>
                <div class="seals-grid">
                    <?php for ($i = 1; $i <= 3; $i++) :
                        $seal = get_theme_mod("ea_footer_seal_{$i}");
                        if ($seal) : ?>
                            <img src="<?php echo esc_url($seal); ?>" alt="Trust Seal" class="footer-seal">
                        <?php endif;
                    endfor; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved. Strictly Confidential.</p>
        </div>
    </div>
</footer>

<?php
echo get_theme_mod( 'ea_footer_scripts' );
wp_footer();
?>
</body>
</html>
