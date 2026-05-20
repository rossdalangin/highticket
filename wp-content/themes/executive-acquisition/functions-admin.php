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
    <div class="wrap ea-admin-wrap" style="max-width: 1000px; margin: 40px auto;">
        <h1 style="margin-bottom: 30px;"><?php _e( 'Executive Acquisition: Command Center', 'executive-acquisition' ); ?></h1>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 40px;">
            <div class="card" style="padding: 40px; border-radius: 4px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: none;">
                <h2><?php _e( '1. Infrastructure Generator', 'executive-acquisition' ); ?></h2>
                <p><?php _e( 'Deploy your high-ticket funnel architecture instantly. This will generate all core pages and set your reading settings.', 'executive-acquisition' ); ?></p>

                <ul style="margin: 25px 0; list-style: none; padding: 0;">
                    <li style="margin-bottom: 10px;">✓ <strong>Home:</strong> High-Conversion Funnel</li>
                    <li style="margin-bottom: 10px;">✓ <strong>Thank You:</strong> Authority Bridge</li>
                    <li style="margin-bottom: 10px;">✓ <strong>Briefing:</strong> Executive Briefing Page</li>
                    <li style="margin-bottom: 10px;">✓ <strong>ROI Proof:</strong> Case Study Page</li>
                    <li style="margin-bottom: 10px;">✓ <strong>Primary Menu:</strong> Automated Navigation</li>
                </ul>

                <button type="button" class="button button-primary button-large ea-generator-btn" id="ea-admin-regenerate-btn" style="padding: 10px 30px; height: auto; font-size: 1.1rem; background: #C5A059; border-color: #C5A059;">
                    <?php _e( 'Generate Infrastructure →', 'executive-acquisition' ); ?>
                </button>
                <span class="spinner" style="float:none; vertical-align: middle;"></span>
            </div>

            <div class="sidebar-links">
                <div class="card" style="padding: 30px; margin-bottom: 30px; border: none; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                    <h3>Tutorials & Guides</h3>
                    <p style="font-size: 0.9rem;">Master the Institutional Intent Method™ with our comprehensive guides.</p>
                    <ul style="margin-top: 20px;">
                        <li><a href="#" style="text-decoration: none; color: #C5A059; font-weight: 700;">User Setup Guide</a></li>
                        <li><a href="#" style="text-decoration: none; color: #C5A059; font-weight: 700;">Marketing Strategy</a></li>
                        <li><a href="#" style="text-decoration: none; color: #C5A059; font-weight: 700;">Technical Reference</a></li>
                    </ul>
                </div>

                <div class="card" style="padding: 30px; border: none; box-shadow: 0 5px 15px rgba(0,0,0,0.05); background: #0B1D33; color: #fff;">
                    <h3 style="color: #C5A059;">Elite Support</h3>
                    <p style="font-size: 0.85rem; opacity: 0.8;">Need help custom-engineering your acquisition system?</p>
                    <a href="mailto:support@example.com" class="button" style="margin-top: 15px;">Contact Architect</a>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#ea-admin-regenerate-btn').on('click', function(e) {
                e.preventDefault();
                if (!confirm('This will reset previously generated funnel pages. Continue?')) return;

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
        .ea-admin-wrap h1, .ea-admin-wrap h2, .ea-admin-wrap h3 { font-family: 'Playfair Display', serif; }
        .ea-admin-wrap h1 { font-size: 2.8rem; color: #0B1D33; }
        .ea-admin-wrap .card { border-radius: 4px; }
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
