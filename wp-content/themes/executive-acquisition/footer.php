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

    <!-- Exit Intent Overlay -->
    <?php if ( get_theme_mod( 'ea_enable_exit_intent', false ) ) : ?>
    <div id="ea-exit-intent" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(11,29,51,0.9); z-index:9999; justify-content:center; align-items:center;">
        <div class="card" style="max-width:500px; text-align:center; padding:50px; position:relative;">
            <button id="close-exit" style="position:absolute; top:20px; right:20px; background:none; border:none; font-size:1.5rem; cursor:pointer;">&times;</button>
            <span style="color:var(--accent-color); font-weight:700; letter-spacing:2px; text-transform:uppercase; font-size:0.8rem;">Wait, Executive...</span>
            <h2 style="margin-top:15px;">Before You Go...</h2>
            <p>Would you like a custom <strong>ROI Diagnostic</strong> to see the exact revenue leaks in your current acquisition infrastructure?</p>
            <a href="<?php echo esc_url( get_theme_mod( 'ea_booking_url', '#' ) ); ?>" class="btn" style="width:100%;">Get Your Diagnostic →</a>
            <p style="font-size:0.8rem; margin-top:20px; opacity:0.7;">No cost. No obligation. 15 minutes of pure ROI mapping.</p>
        </div>
    </div>
    <?php endif; ?>

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
