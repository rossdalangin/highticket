<?php
/**
 * Executive Acquisition functions and definitions
 */

if ( ! function_exists( 'executive_acquisition_setup' ) ) :
    function executive_acquisition_setup() {
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_image_size( 'executive-hero', 1400, 800, true );
        add_image_size( 'executive-card', 800, 500, true );
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'executive-acquisition' ),
            'footer'  => __( 'Footer Menu', 'executive-acquisition' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'executive_acquisition_setup' );

function executive_acquisition_scripts() {
    wp_enqueue_style( 'executive-acquisition-style', get_stylesheet_uri(), array(), '1.1.5' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&family=Playfair+Display:wght@700;900&display=swap', array(), null );
    wp_enqueue_script( 'ea-dtr', get_template_directory_uri() . '/assets/js/dtr-personalization.js', array('jquery'), '1.1.5', true );
}
add_action( 'wp_enqueue_scripts', 'executive_acquisition_scripts' );

/**
 * Customizer settings for the Acquisition System
 */
function executive_acquisition_customize_register( $wp_customize ) {

    // 1. Global Brand Identity
    $wp_customize->add_section( 'ea_brand_section', array(
        'title'    => __( 'Global Brand Identity', 'executive-acquisition' ),
        'priority' => 25,
    ) );

    $wp_customize->add_setting( 'ea_accent_color', array(
        'default'   => '#C5A059',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ea_accent_color', array(
        'label'    => __( 'Primary Accent (Gold)', 'executive-acquisition' ),
        'section'  => 'ea_brand_section',
    ) ) );

    $wp_customize->add_setting( 'ea_h1_size_rem', array(
        'default'   => '4.75',
        'transport' => 'postMessage',
    ) );
    $wp_customize->add_control( 'ea_h1_size_rem', array(
        'label'    => __( 'H1 Max Size (rem)', 'executive-acquisition' ),
        'section'  => 'ea_brand_section',
        'type'     => 'number',
        'input_attrs' => array('step' => '0.25')
    ) );

    $wp_customize->add_setting( 'ea_enable_night_mode', array(
        'default'   => false,
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_enable_night_mode', array(
        'label'    => __( 'Executive Night Mode', 'executive-acquisition' ),
        'section'  => 'ea_brand_section',
        'type'     => 'checkbox',
    ) );

    $wp_customize->add_setting( 'ea_executive_logo', array( 'default' => '', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ea_executive_logo', array(
        'label'    => __( 'Header Logo', 'executive-acquisition' ),
        'section'  => 'ea_brand_section',
    ) ) );

    // 2. Strategic Assets
    $wp_customize->add_section( 'ea_assets_section', array(
        'title'    => __( 'Strategic Assets (Lead Magnets)', 'executive-acquisition' ),
        'priority' => 24,
    ) );

    $wp_customize->add_setting( 'ea_lead_magnet_title', array( 'default' => 'The Institutional Intent Roadmap', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_lead_magnet_title', array( 'label' => __( 'Asset Title', 'executive-acquisition' ), 'section' => 'ea_assets_section' ) );

    $wp_customize->add_setting( 'ea_form_action_url', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_form_action_url', array(
        'label' => __( 'ESP Form Action URL', 'executive-acquisition' ),
        'section' => 'ea_assets_section',
        'type' => 'text'
    ) );

    // 3. About Page Settings (Enhanced)
    $wp_customize->add_section( 'ea_about_section', array(
        'title'    => __( 'About Page Strategy', 'executive-acquisition' ),
        'priority' => 25.5,
    ) );

    $wp_customize->add_setting( 'ea_about_mission', array( 'default' => 'We engineer institutional trust for the world\'s most impactful leadership architects.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_about_mission', array( 'label' => __( 'Mission Statement', 'executive-acquisition' ), 'section' => 'ea_about_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'ea_about_p1_title', array( 'default' => 'Institutional Integrity', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_about_p1_title', array( 'label' => __( 'Pillar 1 Title', 'executive-acquisition' ), 'section' => 'ea_about_section' ) );
    $wp_customize->add_setting( 'ea_about_p1_desc', array( 'default' => 'Acquisition should mirror the discretion of the boardroom.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_about_p1_desc', array( 'label' => __( 'Pillar 1 Desc', 'executive-acquisition' ), 'section' => 'ea_about_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'ea_about_p2_title', array( 'default' => 'Predictable Precision', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_about_p2_title', array( 'label' => __( 'Pillar 2 Title', 'executive-acquisition' ), 'section' => 'ea_about_section' ) );
    $wp_customize->add_setting( 'ea_about_p2_desc', array( 'default' => 'Identifying anonymous decision-makers through intent mapping.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_about_p2_desc', array( 'label' => __( 'Pillar 2 Desc', 'executive-acquisition' ), 'section' => 'ea_about_section', 'type' => 'textarea' ) );

    // 4. Contact Page Settings (Enhanced)
    $wp_customize->add_section( 'ea_contact_section', array(
        'title'    => __( 'Contact Page Strategy', 'executive-acquisition' ),
        'priority' => 25.6,
    ) );

    $wp_customize->add_setting( 'ea_contact_inquiry_text', array( 'default' => 'Initiate a strategic diagnostic session through our secure inquiry channel. All submissions are handled with absolute discretion.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_contact_inquiry_text', array( 'label' => __( 'Inquiry Instructions', 'executive-acquisition' ), 'section' => 'ea_contact_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'ea_contact_office', array( 'default' => 'Executive Suite, Financial District', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_contact_office', array( 'label' => __( 'Primary Office', 'executive-acquisition' ), 'section' => 'ea_contact_section', 'type' => 'text' ) );

    // 5. Founder Profile
    $wp_customize->add_section( 'ea_profile_section', array(
        'title'    => __( 'Founder Profile', 'executive-acquisition' ),
        'priority' => 26,
    ) );

    $wp_customize->add_setting( 'ea_founder_name', array( 'default' => 'Executive Strategist', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_founder_name', array( 'label' => __( 'Full Name', 'executive-acquisition' ), 'section' => 'ea_profile_section' ) );

    $wp_customize->add_setting( 'ea_founder_bio', array(
        'default' => 'Specializing in leadership architecture for $5M+ organizations. Bridging the gap between vision and institutional scale.',
        'transport' => 'postMessage'
    ) );
    $wp_customize->add_control( 'ea_founder_bio', array( 'label' => __( 'Authority Bio', 'executive-acquisition' ), 'section' => 'ea_profile_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'ea_founder_image', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ea_founder_image', array(
        'label'    => __( 'Profile Image', 'executive-acquisition' ),
        'section'  => 'ea_profile_section',
    ) ) );

    // 6. Hero Copy
    $wp_customize->add_section( 'ea_hero_section', array(
        'title'    => __( 'Hero & Direct Response', 'executive-acquisition' ),
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'ea_hero_headline', array(
        'default'   => 'Book 3-5 High-Ticket Corporate Engagements Every Month Using an Institutional Intent Engine.',
        'transport' => 'postMessage',
    ) );
    $wp_customize->add_control( 'ea_hero_headline', array(
        'label'    => __( 'Primary Headline', 'executive-acquisition' ),
        'section'  => 'ea_hero_section',
        'type'     => 'textarea',
    ) );

    $wp_customize->add_setting( 'ea_hero_subheadline', array(
        'default'   => 'Identifies anonymous corporate decision-makers and builds instant institutional trust without the content hamster wheel.',
        'transport' => 'postMessage',
    ) );
    $wp_customize->add_control( 'ea_hero_subheadline', array(
        'label'    => __( 'Sub-headline', 'executive-acquisition' ),
        'section'  => 'ea_hero_section',
        'type'     => 'textarea',
    ) );

    // 7. Tracking
    $wp_customize->add_section( 'ea_tracking_section', array(
        'title'    => __( 'Tracking & Analytics', 'executive-acquisition' ),
        'priority' => 80,
    ) );

    $wp_customize->add_setting( 'ea_gtm_id', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_gtm_id', array( 'label' => __( 'GTM Container ID', 'executive-acquisition' ), 'section' => 'ea_tracking_section' ) );
}
add_action( 'customize_register', 'executive_acquisition_customize_register' );
