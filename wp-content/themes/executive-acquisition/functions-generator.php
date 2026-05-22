<?php
/**
 * Page Generator logic for Executive Acquisition theme
 */

function ea_generator_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'ea_generator_section', array(
        'title'    => __( 'Funnel Infrastructure / Setup', 'executive-acquisition' ),
        'priority' => 20,
    ) );

    $wp_customize->add_setting( 'ea_regenerate_trigger', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( new EA_Generator_Control( $wp_customize, 'ea_regenerate_trigger', array(
        'label'    => __( 'Reset Funnel Pages', 'executive-acquisition' ),
        'section'  => 'ea_generator_section',
    ) ) );
}
add_action( 'customize_register', 'ea_generator_customize_register' );

if ( class_exists( 'WP_Customize_Control' ) ) {
    class EA_Generator_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <button type="button" class="button button-primary" id="ea-regen-btn">Generate Elite Infrastructure</button>
            <script>
                jQuery('#ea-regen-btn').on('click', function() {
                    if(!confirm('Reset all funnel pages?')) return;
                    jQuery.post(ajaxurl, {
                        action: 'ea_generate_pages',
                        nonce: '<?php echo wp_create_nonce("ea_generator_nonce"); ?>'
                    }, function(r) {
                        alert(r.data.message);
                        location.reload();
                    });
                });
            </script>
        <?php }
    }
}

function ea_ajax_generate_pages() {
    check_ajax_referer( 'ea_generator_nonce', 'nonce' );
    if ( ! current_user_can( 'manage_options' ) ) wp_send_json_error( array( 'message' => 'Insufficient permissions.' ) );

    // Clean old
    $old = get_posts( array('post_type' => 'page', 'meta_key' => '_ea_gen', 'posts_per_page' => -1) );
    foreach ( $old as $p ) wp_delete_post( $p->ID, true );

    $pages = array(
        get_theme_mod('ea_gen_title_home', 'Home') => array(
            'template' => 'front-page.php',
            'content' => get_theme_mod('ea_gen_content_home', '')
        ),
        get_theme_mod('ea_gen_title_about', 'The Architecture of Authority') => array(
            'template' => 'template-about.php',
            'content' => get_theme_mod('ea_gen_content_about', '<h3>Boardroom-Level Discretion</h3><p>We do not chase attention; we engineer intent. Our methodology mirrors the discretion and authority of the boardroom, identifying anonymous corporate decision-makers before they issue an RFP.</p>')
        ),
        get_theme_mod('ea_gen_title_contact', 'Initiate Diagnostic') => array(
            'template' => 'template-contact.php',
            'content' => get_theme_mod('ea_gen_content_contact', '')
        ),
        get_theme_mod('ea_gen_title_briefing', 'Institutional Briefing') => array(
            'template' => 'template-briefing.php',
            'content' => get_theme_mod('ea_gen_content_briefing', '')
        ),
        get_theme_mod('ea_gen_title_case_study', 'ROI & Impact Proof') => array(
            'template' => 'template-case-study.php',
            'content' => get_theme_mod('ea_gen_content_case_study', '[roi_callout value="+140%" label="Leadership Efficiency"]<h3>The Challenge of Scale</h3><p>Before implementing the Intent Method, the leadership team was trapped on the content hamster wheel, resulting in unqualified leads and wasted executive hours.</p>')
        ),
    );

    // Create/Get Menu
    $menu_name = 'Executive Primary Menu';
    $menu_exists = wp_get_nav_menu_object( $menu_name );
    if ( ! $menu_exists ) {
        $menu_id = wp_create_nav_menu( $menu_name );
    } else {
        $menu_id = $menu_exists->term_id;
        // Clean existing menu items to avoid duplicates
        $menu_items = wp_get_nav_menu_items( $menu_id );
        if ( $menu_items ) {
            foreach ( $menu_items as $item ) {
                wp_delete_post( $item->ID, true );
            }
        }
    }

    if ( ! is_wp_error( $menu_id ) ) {
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations['primary'] = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }

    foreach ( $pages as $title => $data ) {
        $pid = wp_insert_post( array('post_title' => $title, 'post_content' => $data['content'], 'post_status' => 'publish', 'post_type' => 'page') );
        if ( $pid ) {
            update_post_meta( $pid, '_wp_page_template', $data['template'] );
            update_post_meta( $pid, '_ea_gen', '1' );

            if ( ! is_wp_error( $menu_id ) ) {
                wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'     => $title,
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $pid,
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish'
                ) );
            }

            if ( $title === 'Home' ) {
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $pid );
            }
        }
    }

    wp_send_json_success( array( 'message' => 'Elite Infrastructure Deployed.' ) );
}
add_action( 'wp_ajax_ea_generate_pages', 'ea_ajax_generate_pages' );
