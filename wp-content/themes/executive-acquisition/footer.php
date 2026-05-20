<footer>
    <div class="container">
        <div class="footer-logo" style="font-size: 1.5rem; font-weight: 900; margin-bottom: 20px;">
            <?php bloginfo( 'name' ); ?>
        </div>
        <nav class="footer-nav" style="margin-bottom: 20px;">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'footer-nav-list',
            ) );
            ?>
        </nav>
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved.</p>
        <p style="font-size: 0.8rem; opacity: 0.7;">Strictly Confidential. We respect executive privacy.</p>
    </div>
    <style>
        .footer-nav-list { display: flex; justify-content: center; list-style: none; gap: 20px; font-size: 0.8rem; opacity: 0.8; }
        .footer-nav-list a { text-decoration: none; color: var(--white); }
    </style>
</footer>

<?php
echo get_theme_mod( 'ea_footer_scripts' );
wp_footer();
?>
</body>
</html>
