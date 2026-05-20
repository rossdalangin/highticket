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
}
add_action( 'wp_enqueue_scripts', 'executive_acquisition_scripts' );

/**
 * Include Shortcodes
 */
require get_template_directory() . '/functions-shortcodes.php';

/**
 * Customizer settings for the Acquisition System
 */
function executive_acquisition_customize_register( $wp_customize ) {
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
