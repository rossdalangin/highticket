<?php
/**
 * Executive Acquisition functions and definitions
 */

if ( ! function_exists( 'executive_acquisition_setup' ) ) :
    function executive_acquisition_setup() {
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'executive-acquisition' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'executive_acquisition_setup' );

function executive_acquisition_scripts() {
    wp_enqueue_style( 'executive-acquisition-style', get_stylesheet_uri(), array(), '1.0.0' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Playfair+Display:wght@700;900&display=swap', array(), null );
    wp_enqueue_script( 'ea-dtr', get_template_directory_uri() . '/assets/js/dtr-personalization.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'executive_acquisition_scripts' );

/**
 * Custom Login Styles
 */
function ea_login_stylesheet() {
    wp_enqueue_style( 'ea-login-style', get_template_directory_uri() . '/assets/css/admin-login.css' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&display=swap', array(), null );
}
add_action( 'login_enqueue_scripts', 'ea_login_stylesheet' );

function ea_login_logo_url() { return home_url(); }
add_filter( 'login_headerurl', 'ea_login_logo_url' );

function ea_login_logo_url_title() { return get_bloginfo('name'); }
add_filter( 'login_headertext', 'ea_login_logo_url_title' );

/**
 * Include Shortcodes
 */
require get_template_directory() . '/functions-shortcodes.php';

/**
 * Include Page Generator
 */
require get_template_directory() . '/functions-generator.php';

/**
 * Include Admin Setup
 */
require get_template_directory() . '/functions-admin.php';

/**
 * Customizer settings for the Acquisition System
 */
function executive_acquisition_customize_register( $wp_customize ) {
    // Global Brand Identity
    $wp_customize->add_section( 'ea_brand_section', array(
        'title'    => __( 'Global Brand Identity', 'executive-acquisition' ),
        'priority' => 25,
    ) );

    $wp_customize->add_setting( 'ea_accent_color', array(
        'default'   => '#C5A059',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ea_accent_color', array(
        'label'    => __( 'Accent Color (Gold)', 'executive-acquisition' ),
        'section'  => 'ea_brand_section',
    ) ) );

    $wp_customize->add_setting( 'ea_border_radius', array(
        'default'   => '2px',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_border_radius', array(
        'label'    => __( 'Global Border Radius (px)', 'executive-acquisition' ),
        'section'  => 'ea_brand_section',
        'type'     => 'text',
    ) );

    // Hero Section
    $wp_customize->add_section( 'ea_hero_section', array(
        'title'    => __( 'Hero Section', 'executive-acquisition' ),
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'ea_hero_pre_headline', array(
        'default'   => 'Strictly for Executive, Leadership, and Business Coaches targeting the C-Suite & Scaling Founders:',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_hero_pre_headline', array(
        'label'    => __( 'Pre-Headline', 'executive-acquisition' ),
        'section'  => 'ea_hero_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'ea_hero_headline', array(
        'default'   => 'Book 3-5 High-Ticket Corporate Engagements Every Month Using an Institutional Intent Engine WITHOUT The Content Hamster Wheel.',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_hero_headline', array(
        'label'    => __( 'Headline', 'executive-acquisition' ),
        'section'  => 'ea_hero_section',
        'type'     => 'textarea',
    ) );

    $wp_customize->add_setting( 'ea_hero_cta_text', array(
        'default'   => 'Access the Private Executive Briefing →',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_hero_cta_text', array(
        'label'    => __( 'CTA Button Text', 'executive-acquisition' ),
        'section'  => 'ea_hero_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'ea_hero_video_url', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_hero_video_url', array(
        'label'    => __( 'Video URL (Vimeo/Wistia Embed Link)', 'executive-acquisition' ),
        'section'  => 'ea_hero_section',
        'type'     => 'url',
    ) );

    // Social Proof Section
    $wp_customize->add_section( 'ea_social_proof', array(
        'title'    => __( 'Social Proof & Authority', 'executive-acquisition' ),
        'priority' => 31,
    ) );

    $wp_customize->add_setting( 'ea_logo_bar_text', array(
        'default'   => 'TRUSTED BY LEADERS AT:',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_logo_bar_text', array(
        'label'    => __( 'Logo Bar Label', 'executive-acquisition' ),
        'section'  => 'ea_social_proof',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'ea_testimonial_quote', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_testimonial_quote', array(
        'label'    => __( 'Featured Testimonial Quote', 'executive-acquisition' ),
        'section'  => 'ea_social_proof',
        'type'     => 'textarea',
    ) );

    $wp_customize->add_setting( 'ea_testimonial_author', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_testimonial_author', array(
        'label'    => __( 'Testimonial Author Name/Title', 'executive-acquisition' ),
        'section'  => 'ea_social_proof',
        'type'     => 'text',
    ) );

    // Advanced SEO & Schema
    $wp_customize->add_section( 'ea_seo_section', array(
        'title'    => __( 'Advanced SEO & Schema', 'executive-acquisition' ),
        'priority' => 31.5,
    ) );

    $wp_customize->add_setting( 'ea_schema_json', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_schema_json', array(
        'label'    => __( 'Schema.org JSON-LD (Organization/Coach)', 'executive-acquisition' ),
        'section'  => 'ea_seo_section',
        'type'     => 'textarea',
        'description' => __( 'Paste your Schema.org JSON-LD script here.', 'executive-acquisition' ),
    ) );

    $wp_customize->add_setting( 'ea_og_image', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ea_og_image', array(
        'label'    => __( 'Default OpenGraph Image (Social Sharing)', 'executive-acquisition' ),
        'section'  => 'ea_seo_section',
    ) ) );

    // Tracking & Scripts Section
    $wp_customize->add_section( 'ea_tracking_section', array(
        'title'    => __( 'Tracking & Scripts', 'executive-acquisition' ),
        'priority' => 32,
    ) );

    $wp_customize->add_setting( 'ea_gtm_id', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_gtm_id', array(
        'label'    => __( 'Google Tag Manager ID (e.g. GTM-XXXXXX)', 'executive-acquisition' ),
        'section'  => 'ea_tracking_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'ea_header_scripts', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_header_scripts', array(
        'label'    => __( 'Header Scripts (CAPI, LinkedIn Pixel, etc.)', 'executive-acquisition' ),
        'section'  => 'ea_tracking_section',
        'type'     => 'textarea',
    ) );

    $wp_customize->add_setting( 'ea_footer_scripts', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_footer_scripts', array(
        'label'    => __( 'Footer Scripts (Hotjar, Microsoft Clarity, etc.)', 'executive-acquisition' ),
        'section'  => 'ea_tracking_section',
        'type'     => 'textarea',
    ) );

    // Funnel Flow Settings
    $wp_customize->add_section( 'ea_funnel_flow', array(
        'title'    => __( 'Funnel Flow & Logic', 'executive-acquisition' ),
        'priority' => 35,
    ) );

    $wp_customize->add_setting( 'ea_bridge_video_url', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_bridge_video_url', array(
        'label'    => __( 'Authority Bridge Video (60s) URL', 'executive-acquisition' ),
        'section'  => 'ea_funnel_flow',
        'type'     => 'url',
    ) );

    $wp_customize->add_setting( 'ea_briefing_video_url', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_briefing_video_url', array(
        'label'    => __( 'Executive Briefing (12m) Video URL', 'executive-acquisition' ),
        'section'  => 'ea_funnel_flow',
        'type'     => 'url',
    ) );

    $wp_customize->add_setting( 'ea_briefing_page_url', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_briefing_page_url', array(
        'label'    => __( 'Briefing Page URL', 'executive-acquisition' ),
        'section'  => 'ea_funnel_flow',
        'type'     => 'url',
    ) );

    $wp_customize->add_setting( 'ea_booking_url', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_booking_url', array(
        'label'    => __( 'Booking/Calendar URL', 'executive-acquisition' ),
        'section'  => 'ea_funnel_flow',
        'type'     => 'url',
    ) );

    $wp_customize->add_setting( 'ea_enable_exit_intent', array(
        'default'   => false,
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_enable_exit_intent', array(
        'label'    => __( 'Enable Exit-Intent Overlay', 'executive-acquisition' ),
        'section'  => 'ea_funnel_flow',
        'type'     => 'checkbox',
    ) );

    // Agitation Section
    $wp_customize->add_section( 'ea_agitation_section', array(
        'title'    => __( 'Agitation Section', 'executive-acquisition' ),
        'priority' => 40,
    ) );

    $wp_customize->add_setting( 'ea_agitation_title', array(
        'default'   => "The 'High-Ticket' Paradox: Why Your Expertise Isn't Converting Into Calendars",
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_agitation_title', array(
        'label'    => __( 'Section Title', 'executive-acquisition' ),
        'section'  => 'ea_agitation_section',
        'type'     => 'text',
    ) );

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "ea_agitation_bullet_{$i}_title", array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( "ea_agitation_bullet_{$i}_title", array(
            'label'    => __( "Bullet {$i} Title", 'executive-acquisition' ),
            'section'  => 'ea_agitation_section',
            'type'     => 'text',
        ) );
        $wp_customize->add_setting( "ea_agitation_bullet_{$i}_text", array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( "ea_agitation_bullet_{$i}_text", array(
            'label'    => __( "Bullet {$i} Text", 'executive-acquisition' ),
            'section'  => 'ea_agitation_section',
            'type'     => 'textarea',
        ) );
    }

    // Mechanism Section
    $wp_customize->add_section( 'ea_mechanism_section', array(
        'title'    => __( 'Mechanism Section', 'executive-acquisition' ),
        'priority' => 50,
    ) );

    $wp_customize->add_setting( 'ea_mechanism_title', array(
        'default'   => 'Introducing: The Institutional Intent Method™',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_mechanism_title', array(
        'label'    => __( 'Section Title', 'executive-acquisition' ),
        'section'  => 'ea_mechanism_section',
        'type'     => 'text',
    ) );

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "ea_mechanism_step_{$i}_title", array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( "ea_mechanism_step_{$i}_title", array(
            'label'    => __( "Step {$i} Title", 'executive-acquisition' ),
            'section'  => 'ea_mechanism_section',
            'type'     => 'text',
        ) );
        $wp_customize->add_setting( "ea_mechanism_step_{$i}_text", array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( "ea_mechanism_step_{$i}_text", array(
            'label'    => __( "Step {$i} Text", 'executive-acquisition' ),
            'section'  => 'ea_mechanism_section',
            'type'     => 'textarea',
        ) );
    }

    // Compliance Section
    $wp_customize->add_section( 'ea_compliance_section', array(
        'title'    => __( 'Privacy & Compliance', 'executive-acquisition' ),
        'priority' => 70,
    ) );

    $wp_customize->add_setting( 'ea_cookie_notice', array(
        'default'   => 'We use cookies to ensure you get the best experience on our executive platform.',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_cookie_notice', array(
        'label'    => __( 'Cookie Notice Text', 'executive-acquisition' ),
        'section'  => 'ea_compliance_section',
        'type'     => 'text',
    ) );

    // FAQ Section
    $wp_customize->add_section( 'ea_faq_section', array(
        'title'    => __( 'Executive FAQ', 'executive-acquisition' ),
        'priority' => 60,
    ) );

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting( "ea_faq_q_{$i}", array( 'default' => '', 'transport' => 'refresh' ) );
        $wp_customize->add_control( "ea_faq_q_{$i}", array( 'label' => __( "Question {$i}", 'executive-acquisition' ), 'section' => 'ea_faq_section', 'type' => 'text' ) );
        $wp_customize->add_setting( "ea_faq_a_{$i}", array( 'default' => '', 'transport' => 'refresh' ) );
        $wp_customize->add_control( "ea_faq_a_{$i}", array( 'label' => __( "Answer {$i}", 'executive-acquisition' ), 'section' => 'ea_faq_section', 'type' => 'textarea' ) );
    }
}
add_action( 'customize_register', 'executive_acquisition_customize_register' );
