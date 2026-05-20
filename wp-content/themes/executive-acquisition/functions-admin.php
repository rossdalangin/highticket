<?php
/**
 * Executive Acquisition: Theme Setup Admin Page
 */

function ea_add_setup_page() {
    add_menu_page(
        __( 'Theme Setup', 'executive-acquisition' ),
        __( 'Theme Setup', 'executive-acquisition' ),
        'manage_options',
        'ea-setup',
        'ea_render_setup_page',
        'dashicons-performance',
        2
    );
}
add_action( 'admin_menu', 'ea_add_setup_page' );

function ea_render_setup_page() {
    ?>
    <div class="wrap ea-admin-wrap">
        <h1><?php _e( 'Executive Acquisition: One-Click Infrastructure Setup', 'executive-acquisition' ); ?></h1>
        <p><?php _e( 'Deploy your high-ticket funnel architecture instantly. This tool will generate the core pages, menus, and reading settings required for the acquisition system.', 'executive-acquisition' ); ?></p>

        <div class="card" style="max-width: 600px; padding: 40px; margin-top: 20px;">
            <h2><?php _e( 'Infrastructure Generator', 'executive-acquisition' ); ?></h2>
            <p><?php _e( 'Warning: This will reset any previously generated funnel pages to ensure a clean deployment.', 'executive-acquisition' ); ?></p>

            <ul style="margin: 20px 0;">
                <li>✓ <strong>Home:</strong> Funnel Landing Page</li>
                <li>✓ <strong>Thank You:</strong> Authority Bridge</li>
                <li>✓ <strong>Briefing:</strong> Executive Briefing Page</li>
                <li>✓ <strong>ROI Proof:</strong> Case Study Page</li>
                <li>✓ <strong>Blog:</strong> Insight Archive</li>
                <li>✓ <strong>Primary Menu:</strong> Automated Navigation</li>
            </ul>

            <button type="button" class="button button-primary button-large ea-generator-btn" id="ea-admin-regenerate-btn" style="padding: 10px 30px; height: auto; font-size: 1.1rem;">
                <?php _e( 'Generate Infrastructure →', 'executive-acquisition' ); ?>
            </button>
            <span class="spinner" style="float:none; vertical-align: middle;"></span>
        </div>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#ea-admin-regenerate-btn').on('click', function(e) {
                e.preventDefault();
                if (!confirm('This will delete previously generated pages. Continue?')) return;

                var $btn = $(this);
                var $spinner = $btn.next('.spinner');

                $btn.attr('disabled', true);
                $spinner.addClass('is-active');

                $.post(ajaxurl, {
                    action: 'ea_generate_pages',
                    nonce: '<?php echo wp_create_nonce("ea_generator_nonce"); ?>'
                }, function(response) {
                    $btn.attr('disabled', false);
                    $spinner.removeClass('is-active');
                    alert(response.data.message);
                    if (response.success) {
                        window.location.href = '<?php echo admin_url("customize.php"); ?>';
                    }
                });
            });
        });
    </script>

    <style>
        .ea-admin-wrap h1 { font-family: 'Playfair Display', serif; font-size: 2.5rem; color: #0B1D33; }
        .ea-admin-wrap .card { border-radius: 4px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
    </style>
    <?php
}

// Redirect to setup page on theme activation
function ea_theme_activation_redirect() {
    global $pagenow;
    if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
        wp_redirect( admin_url( 'admin.php?page=ea-setup' ) );
        exit;
    }
}
add_action( 'admin_init', 'ea_theme_activation_redirect' );
