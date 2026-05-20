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
}
add_action( 'customize_register', 'executive_acquisition_customize_register' );
