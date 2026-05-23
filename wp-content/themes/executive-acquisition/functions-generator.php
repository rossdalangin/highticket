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
        get_theme_mod('ea_gen_title_strategy', 'Private Strategy Session') => array(
            'template' => 'template-contact.php',
            'content' => get_theme_mod('ea_gen_content_strategy', '')
        ),
        get_theme_mod('ea_gen_title_privacy', 'Privacy Policy') => array(
            'template' => 'page.php',
            'content' => get_theme_mod('ea_gen_content_privacy', '<p>This policy outlines our commitment to your institutional data privacy.</p>')
        ),
        get_theme_mod('ea_gen_title_terms', 'Terms of Service') => array(
            'template' => 'page.php',
            'content' => get_theme_mod('ea_gen_content_terms', '<p>By engaging with our briefing, you agree to absolute confidentiality.</p>')
        ),
        'Lead Magnet' => array(
            'template' => 'template-lead-magnet.php',
            'content' => '<h3>The ROI of Institutional Trust</h3><p>Download our proprietary framework for identifying anonymous C-Suite decision-makers and building authority without manual outreach.</p>'
        ),
        'Strategic Assets' => array(
            'template' => 'template-resources.php',
            'content' => '<p>A curated library of frameworks, whitepapers, and audits designed for the mid-market leadership segment.</p>'
        ),
    );

    // 1. Header Menu
    $menu_name = 'Executive Primary Menu';
    $menu_exists = wp_get_nav_menu_object( $menu_name );
    if ( ! $menu_exists ) { $menu_id = wp_create_nav_menu( $menu_name ); }
    else {
        $menu_id = $menu_exists->term_id;
        $menu_items = wp_get_nav_menu_items( $menu_id );
        if ( $menu_items ) { foreach ( $menu_items as $item ) { wp_delete_post( $item->ID, true ); } }
    }
    if ( ! is_wp_error( $menu_id ) ) {
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations['primary'] = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }

    // 2. Footer Menu
    $footer_menu_name = 'Executive Footer Menu';
    $footer_menu_exists = wp_get_nav_menu_object( $footer_menu_name );
    if ( ! $footer_menu_exists ) { $footer_menu_id = wp_create_nav_menu( $footer_menu_name ); }
    else {
        $footer_menu_id = $footer_menu_exists->term_id;
        $footer_menu_items = wp_get_nav_menu_items( $footer_menu_id );
        if ( $footer_menu_items ) { foreach ( $footer_menu_items as $item ) { wp_delete_post( $item->ID, true ); } }
    }
    if ( ! is_wp_error( $footer_menu_id ) ) {
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations['footer'] = $footer_menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }

    foreach ( $pages as $title => $data ) {
        $pid = wp_insert_post( array('post_title' => $title, 'post_content' => $data['content'], 'post_status' => 'publish', 'post_type' => 'page') );
        if ( $pid ) {
            update_post_meta( $pid, '_wp_page_template', $data['template'] );
            update_post_meta( $pid, '_ea_gen', '1' );

            // Strategic Menu Logic: Only high-leverage pages in Header
            $header_pages = array(
                'Home',
                get_theme_mod('ea_gen_title_about', 'The Architecture of Authority'),
                'Strategic Assets',
                get_theme_mod('ea_gen_title_strategy', 'Private Strategy Session')
            );

            if ( ! is_wp_error( $menu_id ) && in_array($title, $header_pages) ) {
                wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'     => $title,
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $pid,
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish'
                ) );
            }

            // Footer Menu Logic: Privacy, Terms, Legal
            $footer_pages = array(
                get_theme_mod('ea_gen_title_privacy', 'Privacy Policy'),
                get_theme_mod('ea_gen_title_terms', 'Terms of Service')
            );
            if ( ! is_wp_error( $footer_menu_id ) && in_array($title, $footer_pages) ) {
                wp_update_nav_menu_item( $footer_menu_id, 0, array(
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

    // Create Sample Strategic Resources
    $resource_samples = array(
        'The 2024 Leadership Retention Audit' => array(
            'excerpt' => 'A technical breakdown of the 4 primary revenue leaks in mid-market leadership teams.',
            'icon'    => '.PDF'
        ),
        'The Institutional Intent Roadmap' => array(
            'excerpt' => 'Map your acquisition sequence from anonymous visitor to $25k engagement.',
            'icon'    => '.MAP'
        ),
        'C-Suite Communication Protocol' => array(
            'excerpt' => 'Strategic scripts for internal stakeholder buy-in during high-ticket leadership pivots.',
            'icon'    => '.DOC'
        )
    );

    foreach ( $resource_samples as $title => $data ) {
        $rid = wp_insert_post( array(
            'post_title'   => $title,
            'post_excerpt' => $data['excerpt'],
            'post_content' => 'This framework represents the distillation of over 500 hours of executive consulting. It is designed to be shared directly with board-level stakeholders to facilitate high-velocity decision making.',
            'post_status'  => 'publish',
            'post_type'    => 'resource'
        ) );
        if ($rid) update_post_meta($rid, '_ea_res_icon', $data['icon']);
    }

    // Create Sample Testimonials
    $testimonial_samples = array(
        'Marcus Thorne, VP of Strategy' => 'The Intent Engine identified our specific leadership gaps before we even authorized the search. The precision is unmatched in the coaching industry.',
        'Sarah Jenkins, Scaling Founder' => 'Finally, a client acquisition system that understands the discretion and institutional authority required at the $5M+ level. Our ROI was established in month one.',
        'Director of Ops, Fortune 500' => 'This methodology has transformed how we view executive development. It is no longer a cost center, but a predictable growth lever.'
    );

    foreach ( $testimonial_samples as $name => $content ) {
        wp_insert_post( array(
            'post_title'   => $name,
            'post_content' => $content,
            'post_status'  => 'publish',
            'post_type'    => 'testimonial'
        ) );
    }

    // Create Sample Case Studies
    $case_samples = array(
        'Mid-Market Leadership Pivot' => array(
            'impact' => '140% Efficiency Increase',
            'rev'    => '$1.2M Recovered'
        ),
        'Global Tech C-Suite Alignment' => array(
            'impact' => 'Full Executive Buy-in',
            'rev'    => '3.4x ROI'
        )
    );

    foreach ( $case_samples as $title => $meta ) {
        $cid = wp_insert_post( array(
            'post_title'   => $title,
            'post_excerpt' => 'How we utilized the Intent Method to realign a fractured C-Suite and recover hundreds of wasted executive hours.',
            'post_content' => 'The primary challenge was a misalignment between the Board of Directors and the operating leadership team. By deploying the Institutional Intent framework, we identified the specific friction points...',
            'post_status'  => 'publish',
            'post_type'    => 'case_study'
        ) );
        if ($cid) {
            update_post_meta($cid, '_ea_case_impact', $meta['impact']);
            update_post_meta($cid, '_ea_case_revenue', $meta['rev']);
        }
    }

    wp_send_json_success( array( 'message' => 'Elite Infrastructure & Sample Content Deployed.' ) );
}
add_action( 'wp_ajax_ea_generate_pages', 'ea_ajax_generate_pages' );
