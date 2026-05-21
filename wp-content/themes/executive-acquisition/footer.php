<footer>
    <div class="container" style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 60px; text-align: left; padding: 100px 0;">
        <div class="footer-brand">
            <div class="footer-logo" style="font-size: 1.5rem; font-weight: 900; margin-bottom: 25px;">
                <?php
                $logo = get_theme_mod( 'ea_executive_logo' );
                if ( $logo ) : ?>
                    <img src="<?php echo esc_url( $logo ); ?>" style="max-height: 40px; filter: brightness(0) invert(1);">
                <?php else : ?>
                    <?php bloginfo( 'name' ); ?>
                <?php endif; ?>
            </div>
            <p style="font-size: 0.95rem; opacity: 0.7; line-height: 1.7;"><?php echo esc_html( get_theme_mod('ea_about_mission') ); ?></p>
            <div class="social-links" style="margin-top: 30px; display: flex; gap: 20px;">
                <?php if ( get_theme_mod('ea_linkedin_url') ) : ?><a href="<?php echo esc_url(get_theme_mod('ea_linkedin_url')); ?>" style="color: var(--accent-color); font-weight: 900;">LinkedIn</a><?php endif; ?>
                <?php if ( get_theme_mod('ea_twitter_url') ) : ?><a href="<?php echo esc_url(get_theme_mod('ea_twitter_url')); ?>" style="color: var(--accent-color); font-weight: 900;">X / Twitter</a><?php endif; ?>
            </div>
        </div>

        <div class="footer-contact">
            <h3 style="color: #fff; font-size: 1.1rem; margin-bottom: 30px; text-transform: uppercase; letter-spacing: 1px;">Institutional Access</h3>
            <p style="font-size: 0.95rem; opacity: 0.8; margin-bottom: 15px;"><strong>Location:</strong> <?php echo esc_html( get_theme_mod('ea_contact_office') ); ?></p>
            <p style="font-size: 0.95rem; opacity: 0.8;"><strong>Inquiries:</strong> support@<?php echo $_SERVER['HTTP_HOST']; ?></p>
        </div>

        <div class="footer-nav-col">
            <h3 style="color: #fff; font-size: 1.1rem; margin-bottom: 30px; text-transform: uppercase; letter-spacing: 1px;">Infrastructure</h3>
            <nav class="footer-nav">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer',
                    'container'      => false,
                    'menu_class'     => 'footer-nav-list',
                ) );
                ?>
            </nav>
        </div>
    </div>

    <div class="footer-bottom" style="border-top: 1px solid rgba(255,255,255,0.05); padding: 40px 0; text-align: center;">
        <div class="container">
            <p style="font-size: 0.8rem; opacity: 0.5;">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved. Strictly Confidential.</p>
        </div>
    </div>

    <style>
        .footer-nav-list { list-style: none; padding: 0; margin: 0; }
        .footer-nav-list li { margin-bottom: 12px; }
        .footer-nav-list a { text-decoration: none; color: #fff; opacity: 0.7; font-size: 0.9rem; transition: opacity 0.3s ease; }
        .footer-nav-list a:hover { opacity: 1; color: var(--accent-color); }
        @media (max-width: 768px) {
            footer .container { grid-template-columns: 1fr; gap: 40px; text-align: center; }
            .social-links { justify-content: center; }
        }
    </style>
</footer>

<?php
echo get_theme_mod( 'ea_footer_scripts' );
wp_footer();
?>
</body>
</html>
