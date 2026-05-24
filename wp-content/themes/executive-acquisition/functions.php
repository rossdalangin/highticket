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
    wp_enqueue_style( 'executive-acquisition-style', get_stylesheet_uri(), array(), '1.1.9' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&family=Playfair+Display:wght@700;900&display=swap', array(), null );
    wp_enqueue_script( 'ea-theme-core', get_template_directory_uri() . '/assets/js/theme-core.js', array('jquery'), '1.1.9', true );
}
add_action( 'wp_enqueue_scripts', 'executive_acquisition_scripts' );

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
 * Include Custom Post Types
 */
require get_template_directory() . '/functions-cpt.php';

/**
 * Customizer settings for the Acquisition System
 */
function executive_acquisition_customize_register( $wp_customize ) {

    // Define Panels
    $wp_customize->add_panel( 'ea_panel_global', array(
        'title'    => __( '1. Global System & Style', 'executive-acquisition' ),
        'priority' => 10,
    ) );
    $wp_customize->add_panel( 'ea_panel_header', array(
        'title'    => __( '2. Header & Navigation', 'executive-acquisition' ),
        'priority' => 20,
    ) );
    $wp_customize->add_panel( 'ea_panel_homepage', array(
        'title'    => __( '3. Homepage Architecture', 'executive-acquisition' ),
        'priority' => 30,
    ) );
    $wp_customize->add_panel( 'ea_panel_pages', array(
        'title'    => __( '4. Page-Specific Assets', 'executive-acquisition' ),
        'priority' => 40,
    ) );
    $wp_customize->add_panel( 'ea_panel_footer', array(
        'title'    => __( '5. Footer & Trust Seals', 'executive-acquisition' ),
        'priority' => 50,
    ) );

    // Header Section (New)
    $wp_customize->add_section( 'ea_header_section', array(
        'title'    => __( 'Header Configuration', 'executive-acquisition' ),
        'panel'    => 'ea_panel_header',
        'priority' => 10,
    ) );

    // 1. Global Brand Identity
    $wp_customize->add_section( 'ea_brand_section', array(
        'title'    => __( 'Global Brand Identity', 'executive-acquisition' ),
        'panel'    => 'ea_panel_global',
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

    $wp_customize->add_setting( 'ea_border_radius', array(
        'default'   => '2px',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_border_radius', array(
        'label'    => __( 'Global Border Radius (px)', 'executive-acquisition' ),
        'section'  => 'ea_brand_section',
        'type'     => 'text',
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

    $wp_customize->add_setting( 'ea_design_preset', array(
        'default'   => 'unisex',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_design_preset', array(
        'label'    => __( 'Owner Design Preset', 'executive-acquisition' ),
        'section'  => 'ea_brand_section',
        'type'     => 'select',
        'choices'  => array(
            'unisex' => 'Unisex (Navy & Gold)',
            'female' => 'Female Owner (Charcoal & Rose Gold)',
            'male'   => 'Male Owner (Midnight & Cobalt Blue)',
        ),
    ) );

    // 2. Strategic Assets
    $wp_customize->add_section( 'ea_assets_section', array(
        'title'    => __( 'Strategic Assets (Lead Magnets)', 'executive-acquisition' ),
        'panel'    => 'ea_panel_pages',
        'priority' => 26,
    ) );

    $wp_customize->add_setting( 'ea_lead_magnet_title', array( 'default' => 'The Institutional Intent Roadmap', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_lead_magnet_title', array( 'label' => __( 'Asset Title', 'executive-acquisition' ), 'section' => 'ea_assets_section' ) );

    $wp_customize->add_setting( 'ea_lead_magnet_url', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_lead_magnet_url', array( 'label' => __( 'Asset Download URL', 'executive-acquisition' ), 'section' => 'ea_assets_section', 'type' => 'url' ) );

    $wp_customize->add_setting( 'ea_lm_headline', array( 'default' => 'Download the Executive Framework', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_lm_headline', array( 'label' => __( 'Lead Magnet Headline', 'executive-acquisition' ), 'section' => 'ea_assets_section' ) );

    $lm_benefit_defaults = array(
        1 => 'The exact 5-step sequence for identified intent visitors.',
        2 => 'Board-ready templates for internal stakeholder buy-in.',
        3 => 'ROI-mapping frameworks for high-ticket coaching engagements.'
    );

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "ea_lm_benefit_{$i}", array( 'default' => $lm_benefit_defaults[$i], 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_lm_benefit_{$i}", array( 'label' => __( "Benefit {$i}", 'executive-acquisition' ), 'section' => 'ea_assets_section' ) );
    }

    $wp_customize->add_setting( 'ea_lm_form_code', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_lm_form_code', array( 'label' => __( 'Lead Magnet Form Code (Shortcode/HTML)', 'executive-acquisition' ), 'section' => 'ea_assets_section', 'type' => 'textarea' ) );

    // 2.1 Resources Library
    $wp_customize->add_section( 'ea_resources_section', array(
        'title'    => __( 'Resources Library', 'executive-acquisition' ),
        'panel'    => 'ea_panel_pages',
        'priority' => 27,
    ) );

    $wp_customize->add_setting( 'ea_resources_headline', array( 'default' => 'Institutional Whitepapers & Strategic Frameworks', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_resources_headline', array( 'label' => __( 'Library Headline', 'executive-acquisition' ), 'section' => 'ea_resources_section' ) );

    $wp_customize->add_setting( 'ea_resources_subheadline', array( 'default' => 'Complimentary resources for scaling Founders and C-Suite leaders navigating institutional complexity.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_resources_subheadline', array( 'label' => __( 'Library Subheadline', 'executive-acquisition' ), 'section' => 'ea_resources_section', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'ea_form_action_url', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_form_action_url', array(
        'label' => __( 'ESP Form Action URL (e.g. Mailchimp/Klaviyo)', 'executive-acquisition' ),
        'section' => 'ea_assets_section',
        'type' => 'text'
    ) );

    // 3. About Page Strategy
    $wp_customize->add_section( 'ea_about_section', array(
        'title'    => __( 'About Page Strategy', 'executive-acquisition' ),
        'panel'    => 'ea_panel_pages',
        'priority' => 27,
    ) );

    $wp_customize->add_setting( 'ea_about_tag', array( 'default' => 'The Architecture of Authority', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_about_tag', array( 'label' => __( 'About Page Tag', 'executive-acquisition' ), 'section' => 'ea_about_section' ) );

    $wp_customize->add_setting( 'ea_about_headline', array( 'default' => 'We Engineer Institutional Trust for Elite Coaches.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_about_headline', array( 'label' => __( 'About Page Headline', 'executive-acquisition' ), 'section' => 'ea_about_section' ) );

    $wp_customize->add_setting( 'ea_about_mission', array( 'default' => 'We engineer institutional trust for the world\'s most impactful leadership architects.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_about_mission', array( 'label' => __( 'Mission Statement', 'executive-acquisition' ), 'section' => 'ea_about_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'ea_about_p1_title', array( 'default' => 'Boardroom-Level Discretion', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_about_p1_title', array( 'label' => __( 'Pillar 1 Title', 'executive-acquisition' ), 'section' => 'ea_about_section' ) );
    $wp_customize->add_setting( 'ea_about_p1_desc', array( 'default' => 'We do not chase attention; we engineer intent. Our methodology mirrors the discretion and authority of the boardroom.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_about_p1_desc', array( 'label' => __( 'Pillar 1 Desc', 'executive-acquisition' ), 'section' => 'ea_about_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'ea_about_p2_title', array( 'default' => 'Intent Mapping Precision', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_about_p2_title', array( 'label' => __( 'Pillar 2 Title', 'executive-acquisition' ), 'section' => 'ea_about_section' ) );
    $wp_customize->add_setting( 'ea_about_p2_desc', array( 'default' => 'Identifying anonymous decision-makers before they even issue an RFP, giving you the ultimate competitive advantage.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_about_p2_desc', array( 'label' => __( 'Pillar 2 Desc', 'executive-acquisition' ), 'section' => 'ea_about_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'ea_about_exp_title', array( 'default' => 'The Track Record', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_about_exp_title', array( 'label' => __( 'Experience Box Title', 'executive-acquisition' ), 'section' => 'ea_about_section' ) );

    $wp_customize->add_setting( 'ea_about_experience', array( 'default' => 'Since 2012, we have been the silent architects behind the leadership transitions of over 150 mid-market organizations.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_about_experience', array( 'label' => __( 'Experience / Track Record', 'executive-acquisition' ), 'section' => 'ea_about_section', 'type' => 'textarea' ) );

    // 4. Contact Page Strategy
    $wp_customize->add_section( 'ea_contact_section', array(
        'title'    => __( 'Contact Page Strategy', 'executive-acquisition' ),
        'panel'    => 'ea_panel_pages',
        'priority' => 28,
    ) );

    $wp_customize->add_setting( 'ea_contact_inquiry_text', array( 'default' => 'Initiate a strategic diagnostic session through our secure inquiry channel. All submissions are handled with absolute discretion.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_contact_inquiry_text', array( 'label' => __( 'Inquiry Instructions', 'executive-acquisition' ), 'section' => 'ea_contact_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'ea_contact_tag', array( 'default' => 'Institutional Inquiry', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_contact_tag', array( 'label' => __( 'Contact Page Tag', 'executive-acquisition' ), 'section' => 'ea_contact_section' ) );

    $wp_customize->add_setting( 'ea_contact_headline', array( 'default' => 'Initiate a Strategic Diagnostic.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_contact_headline', array( 'label' => __( 'Contact Page Headline', 'executive-acquisition' ), 'section' => 'ea_contact_section' ) );

    $wp_customize->add_setting( 'ea_contact_office', array( 'default' => 'Executive Suite, Financial District', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_contact_office', array( 'label' => __( 'Primary Office', 'executive-acquisition' ), 'section' => 'ea_contact_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'ea_contact_form_title', array( 'default' => 'Secure Inquiry Channel', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_contact_form_title', array( 'label' => __( 'Form Title', 'executive-acquisition' ), 'section' => 'ea_contact_section' ) );

    $wp_customize->add_setting( 'ea_contact_type', array( 'default' => 'default', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_contact_type', array(
        'label'    => __( 'Contact Form Strategy', 'executive-acquisition' ),
        'section'  => 'ea_contact_section',
        'type'     => 'select',
        'choices'  => array(
            'default'   => __( 'Standard Theme Form', 'executive-acquisition' ),
            'shortcode' => __( 'Custom Shortcode / HTML', 'executive-acquisition' ),
        ),
    ) );

    $wp_customize->add_setting( 'ea_contact_shortcode', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_contact_shortcode', array(
        'label'    => __( 'Contact Page Shortcode or HTML', 'executive-acquisition' ),
        'section'  => 'ea_contact_section',
        'type'     => 'textarea',
    ) );

    // 5. Founder Profile
    $wp_customize->add_section( 'ea_profile_section', array(
        'title'    => __( 'Founder Profile', 'executive-acquisition' ),
        'panel'    => 'ea_panel_pages',
        'priority' => 29,
    ) );

    $wp_customize->add_setting( 'ea_founder_name', array( 'default' => 'Alexander Sterling', 'transport' => 'postMessage' ) );
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

    $wp_customize->add_setting( 'ea_linkedin_url', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_linkedin_url', array( 'label' => __( 'LinkedIn URL', 'executive-acquisition' ), 'section' => 'ea_profile_section', 'type' => 'url' ) );

    $wp_customize->add_setting( 'ea_twitter_url', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_twitter_url', array( 'label' => __( 'Twitter/X URL', 'executive-acquisition' ), 'section' => 'ea_profile_section', 'type' => 'url' ) );

    // 6. Funnel Flow & Video
    $wp_customize->add_section( 'ea_funnel_flow', array(
        'title'    => __( 'Funnel Flow & Video', 'executive-acquisition' ),
        'panel'    => 'ea_panel_global',
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'ea_briefing_tag', array( 'default' => 'Executive Strategic Briefing', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_briefing_tag', array( 'label' => __( 'Briefing Page Tag', 'executive-acquisition' ), 'section' => 'ea_funnel_flow' ) );

    $wp_customize->add_setting( 'ea_briefing_subheadline', array( 'default' => 'Reserved for C-Suite, VP-level leaders, and Scaling Founders.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_briefing_subheadline', array( 'label' => __( 'Briefing Page Subheadline', 'executive-acquisition' ), 'section' => 'ea_funnel_flow', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'ea_briefing_video_url', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_briefing_video_url', array( 'label' => __( 'Main Briefing Video URL', 'executive-acquisition' ), 'section' => 'ea_funnel_flow', 'type' => 'url' ) );

    $wp_customize->add_setting( 'ea_booking_url', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_booking_url', array( 'label' => __( 'Booking/Calendar URL', 'executive-acquisition' ), 'section' => 'ea_funnel_flow', 'type' => 'url' ) );

    $wp_customize->add_setting( 'ea_briefing_cta_delay', array( 'default' => '480', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_briefing_cta_delay', array( 'label' => __( 'Briefing CTA Delay (Seconds)', 'executive-acquisition' ), 'section' => 'ea_funnel_flow', 'type' => 'number' ) );

    $wp_customize->add_setting( 'ea_bridge_video_url', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_bridge_video_url', array( 'label' => __( 'Bridge/Thank-You Video URL', 'executive-acquisition' ), 'section' => 'ea_funnel_flow', 'type' => 'url' ) );

    $wp_customize->add_setting( 'ea_briefing_page_url', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_briefing_page_url', array( 'label' => __( 'Briefing Page Override URL', 'executive-acquisition' ), 'section' => 'ea_funnel_flow', 'type' => 'url' ) );

    $wp_customize->add_setting( 'ea_briefing_booking_title', array( 'default' => 'Engineer Your Acquisition Pipeline', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_briefing_booking_title', array( 'label' => __( 'Booking Box Title', 'executive-acquisition' ), 'section' => 'ea_funnel_flow' ) );

    $wp_customize->add_setting( 'ea_briefing_booking_text', array( 'default' => 'Schedule your 1:1 Institutional Diagnostic to map your custom roadmap.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_briefing_booking_text', array( 'label' => __( 'Booking Box Text', 'executive-acquisition' ), 'section' => 'ea_funnel_flow', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'ea_briefing_booking_btn', array( 'default' => 'Schedule Diagnostic →', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_briefing_booking_btn', array( 'label' => __( 'Booking Box Button', 'executive-acquisition' ), 'section' => 'ea_funnel_flow' ) );

    // 7. Hero & Direct Response
    $wp_customize->add_section( 'ea_hero_section', array(
        'title'    => __( 'Hero & Direct Response', 'executive-acquisition' ),
        'panel'    => 'ea_panel_homepage',
        'priority' => 31,
    ) );

    $wp_customize->add_setting( 'ea_hero_pre_headline', array( 'default' => 'Strictly for Executive Coaches targeting the C-Suite:', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_hero_pre_headline', array( 'label' => __( 'Pre-Headline', 'executive-acquisition' ), 'section' => 'ea_hero_section' ) );

    $wp_customize->add_setting( 'ea_hero_headline', array(
        'default'   => 'Book $25k+ Corporate Engagements Every Month Using Institutional Intent Mapping.',
        'transport' => 'postMessage',
    ) );
    $wp_customize->add_control( 'ea_hero_headline', array(
        'label'    => __( 'Primary Headline', 'executive-acquisition' ),
        'section'  => 'ea_hero_section',
        'type'     => 'textarea',
    ) );

    $wp_customize->add_setting( 'ea_hero_subheadline', array(
        'default'   => 'Engineer predictable inbound acquisition that identifies anonymous C-Suite decision-makers and builds institutional trust entirely on autopilot.',
        'transport' => 'postMessage',
    ) );
    $wp_customize->add_control( 'ea_hero_subheadline', array(
        'label'    => __( 'Sub-headline', 'executive-acquisition' ),
        'section'  => 'ea_hero_section',
        'type'     => 'textarea',
    ) );

    $wp_customize->add_setting( 'ea_hero_cta_text', array( 'default' => 'Access the Private Executive Briefing →', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_hero_cta_text', array( 'label' => __( 'CTA Button Text', 'executive-acquisition' ), 'section' => 'ea_hero_section' ) );

    $wp_customize->add_setting( 'ea_hero_cta_url', array( 'default' => '#cta', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_hero_cta_url', array( 'label' => __( 'CTA Button URL', 'executive-acquisition' ), 'section' => 'ea_hero_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'ea_hero_cta_type', array( 'default' => 'button', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_hero_cta_type', array(
        'label'    => __( 'Hero CTA Interaction', 'executive-acquisition' ),
        'section'  => 'ea_hero_section',
        'type'     => 'select',
        'choices'  => array(
            'button'    => __( 'Direct Link (Button)', 'executive-acquisition' ),
            'modal'     => __( 'Trigger Modal (Shortcode/HTML)', 'executive-acquisition' ),
            'inline'    => __( 'Inline Form (Shortcode/HTML)', 'executive-acquisition' ),
        ),
    ) );

    $wp_customize->add_setting( 'ea_hero_micro_copy', array( 'default' => 'Takes 12 minutes. No \'salesy\' fluff. Pure strategy.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_hero_micro_copy', array( 'label' => __( 'Hero Micro-copy', 'executive-acquisition' ), 'section' => 'ea_hero_section' ) );

    $wp_customize->add_setting( 'ea_hero_video_url', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_hero_video_url', array( 'label' => __( 'Hero Video URL (YouTube/Vimeo)', 'executive-acquisition' ), 'section' => 'ea_hero_section', 'type' => 'url' ) );

    $wp_customize->add_setting( 'ea_hero_image', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ea_hero_image', array(
        'label'    => __( 'Hero Alternative Image (If no video)', 'executive-acquisition' ),
        'section'  => 'ea_hero_section',
    ) ) );

    $wp_customize->add_setting( 'ea_hero_form_code', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_hero_form_code', array(
        'label'    => __( 'Hero Form Shortcode or HTML', 'executive-acquisition' ),
        'section'  => 'ea_hero_section',
        'type'     => 'textarea',
    ) );

    $wp_customize->add_setting( 'ea_hero_media_type', array( 'default' => 'video', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_hero_media_type', array(
        'label'    => __( 'Hero Media Type', 'executive-acquisition' ),
        'section'  => 'ea_hero_section',
        'type'     => 'select',
        'choices'  => array(
            'video' => __( 'Video (YouTube/Vimeo)', 'executive-acquisition' ),
            'image' => __( 'Image', 'executive-acquisition' ),
            'form'  => __( 'Shortcode / HTML Form', 'executive-acquisition' ),
        ),
    ) );

    // 8. Social Proof & Authority
    $wp_customize->add_section( 'ea_social_proof', array(
        'title'    => __( 'Social Proof & Authority', 'executive-acquisition' ),
        'panel'    => 'ea_panel_homepage',
        'priority' => 32,
    ) );

    $wp_customize->add_setting( 'ea_testimonials_title', array( 'default' => 'Institutional Praise', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_testimonials_title', array( 'label' => __( 'Testimonials Title', 'executive-acquisition' ), 'section' => 'ea_social_proof' ) );

    $wp_customize->add_setting( 'ea_testimonials_subheadline', array( 'default' => 'What C-Suite leaders are saying about the Intent Method™.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_testimonials_subheadline', array( 'label' => __( 'Testimonials Subheadline', 'executive-acquisition' ), 'section' => 'ea_social_proof', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'ea_logo_bar_text', array( 'default' => 'TRUSTED BY LEADERS AT:', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_logo_bar_text', array( 'label' => __( 'Logo Bar Label', 'executive-acquisition' ), 'section' => 'ea_social_proof' ) );

    for ($i = 1; $i <= 5; $i++) {
        $wp_customize->add_setting( "ea_logo_{$i}", array( 'default' => '', 'transport' => 'refresh' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "ea_logo_{$i}", array( 'label' => __( "Partner Logo {$i}", 'executive-acquisition' ), 'section' => 'ea_social_proof' ) ) );
    }

    $wp_customize->add_setting( 'ea_enable_marquee', array( 'default' => false, 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_enable_marquee', array( 'label' => __( 'Enable Scrolling Marquee', 'executive-acquisition' ), 'section' => 'ea_social_proof', 'type' => 'checkbox' ) );

    // 9. Agitation (Pain Points)
    $wp_customize->add_section( 'ea_agitation_section', array(
        'title'    => __( 'Agitation (Pain Points)', 'executive-acquisition' ),
        'panel'    => 'ea_panel_homepage',
        'priority' => 33,
    ) );

    $wp_customize->add_setting( 'ea_agitation_title', array( 'default' => "The 'High-Ticket' Paradox: Why Your Expertise Isn't Converting", 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_agitation_title', array( 'label' => __( 'Section Title', 'executive-acquisition' ), 'section' => 'ea_agitation_section' ) );

    $wp_customize->add_setting( 'ea_agitation_subheadline', array( 'default' => "The hidden costs of the content hamster wheel.", 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_agitation_subheadline', array( 'label' => __( 'Section Subheadline', 'executive-acquisition' ), 'section' => 'ea_agitation_section', 'type' => 'textarea' ) );

    $agitation_defaults = array(
        1 => array(
            'title' => 'The Content Hamster Wheel',
            'text'  => 'Wasting executive hours on low-conversion LinkedIn posts that attract "vanity metrics" instead of institutional decision-makers.'
        ),
        2 => array(
            'title' => 'Brand Reputation Erosion',
            'text'  => 'Burning C-Suite bridges with low-quality automated outreach that signals desperation rather than institutional authority.'
        ),
        3 => array(
            'title' => 'The Discovery Call Drain',
            'text'  => 'Filling your calendar with unqualified leads who lack the budget or the institutional authority to trigger a $25k engagement.'
        )
    );

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "ea_agitation_bullet_{$i}_title", array( 'default' => $agitation_defaults[$i]['title'], 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_agitation_bullet_{$i}_title", array( 'label' => __( "Pain Point {$i} Title", 'executive-acquisition' ), 'section' => 'ea_agitation_section' ) );
        $wp_customize->add_setting( "ea_agitation_bullet_{$i}_text", array( 'default' => $agitation_defaults[$i]['text'], 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_agitation_bullet_{$i}_text", array( 'label' => __( "Pain Point {$i} Description", 'executive-acquisition' ), 'section' => 'ea_agitation_section', 'type' => 'textarea' ) );
    }

$wp_customize->add_setting( 'ea_agitation_pre_headline', array( 'default' => 'The Cost of Invisibility', 'transport' => 'postMessage' ) );
$wp_customize->add_control( 'ea_agitation_pre_headline', array( 'label' => __( 'Section Pre-headline', 'executive-acquisition' ), 'section' => 'ea_agitation_section' ) );

    $wp_customize->add_setting( 'ea_agitation_image', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ea_agitation_image', array(
        'label'    => __( 'Agitation Section Side Image', 'executive-acquisition' ),
        'section'  => 'ea_agitation_section',
    ) ) );

    // 10. Engagement Tiers
    $wp_customize->add_section( 'ea_tiers_section', array(
        'title'    => __( 'Engagement Tiers', 'executive-acquisition' ),
        'panel'    => 'ea_panel_homepage',
        'priority' => 34,
    ) );

    $wp_customize->add_setting( 'ea_tiers_tag', array( 'default' => 'Strategic Engagement', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_tiers_tag', array( 'label' => __( 'Section Tag', 'executive-acquisition' ), 'section' => 'ea_tiers_section' ) );

    $wp_customize->add_setting( 'ea_tiers_title', array( 'default' => 'Institutional Engagement Tiers', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_tiers_title', array( 'label' => __( 'Section Title', 'executive-acquisition' ), 'section' => 'ea_tiers_section' ) );

    $wp_customize->add_setting( 'ea_tiers_subheadline', array( 'default' => 'Quantifiable ROI for Every Stage of Organizational Growth.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_tiers_subheadline', array( 'label' => __( 'Section Subheadline', 'executive-acquisition' ), 'section' => 'ea_tiers_section', 'type' => 'textarea' ) );

    for ($i = 1; $i <= 2; $i++) {
        $wp_customize->add_setting( "ea_tier_{$i}_name", array( 'default' => "Tier {$i} Name", 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_tier_{$i}_name", array( 'label' => __( "Tier {$i} Name", 'executive-acquisition' ), 'section' => 'ea_tiers_section' ) );
        $wp_customize->add_setting( "ea_tier_{$i}_price", array( 'default' => "$5,000", 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_tier_{$i}_price", array( 'label' => __( "Tier {$i} Price", 'executive-acquisition' ), 'section' => 'ea_tiers_section' ) );
        $wp_customize->add_setting( "ea_tier_{$i}_desc", array( 'default' => "Tier {$i} description.", 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_tier_{$i}_desc", array( 'label' => __( "Tier {$i} Description", 'executive-acquisition' ), 'section' => 'ea_tiers_section', 'type' => 'textarea' ) );
        $wp_customize->add_setting( "ea_tier_{$i}_url", array( 'default' => '#cta', 'transport' => 'refresh' ) );
        $wp_customize->add_control( "ea_tier_{$i}_url", array( 'label' => __( "Tier {$i} Button URL", 'executive-acquisition' ), 'section' => 'ea_tiers_section', 'type' => 'text' ) );
    }

    // 10.1 Case Studies Section (Homepage)
    $wp_customize->add_section( 'ea_case_studies_home_section', array(
        'title'    => __( 'Homepage Case Studies', 'executive-acquisition' ),
        'panel'    => 'ea_panel_homepage',
        'priority' => 34,
    ) );

    $wp_customize->add_setting( 'ea_case_studies_tag', array( 'default' => 'Proof of Impact', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_case_studies_tag', array( 'label' => __( 'Section Tag', 'executive-acquisition' ), 'section' => 'ea_case_studies_home_section' ) );

    $wp_customize->add_setting( 'ea_case_studies_title', array( 'default' => 'Measurable Institutional ROI', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_case_studies_title', array( 'label' => __( 'Section Title', 'executive-acquisition' ), 'section' => 'ea_case_studies_home_section' ) );

    // 11. The Mechanism (3-Step System)
    $wp_customize->add_section( 'ea_mechanism_section', array(
        'title'    => __( 'The Mechanism (3-Step System)', 'executive-acquisition' ),
        'panel'    => 'ea_panel_homepage',
        'priority' => 35,
    ) );

    $wp_customize->add_setting( 'ea_mechanism_title', array( 'default' => 'The Institutional Intent Engine', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_mechanism_title', array( 'label' => __( 'Section Title', 'executive-acquisition' ), 'section' => 'ea_mechanism_section' ) );

    $wp_customize->add_setting( 'ea_mechanism_subheadline', array( 'default' => 'A predictable, intent-driven acquisition system.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_mechanism_subheadline', array( 'label' => __( 'Section Subheadline', 'executive-acquisition' ), 'section' => 'ea_mechanism_section', 'type' => 'textarea' ) );

    $mechanism_defaults = array(
        1 => array(
            'title' => 'Intent Beacon Identification',
            'text'  => 'We deploy proprietary tracking that identifies anonymous VP and C-Suite visitors before they ever fill out a form.'
        ),
        2 => array(
            'title' => 'Institutional Trust Anchoring',
            'text'  => 'Our Authority Bridge sequence builds instant boardroom-level trust, positioning you as the only logical solution.'
        ),
        3 => array(
            'title' => 'Strategic Diagnostic Conversion',
            'text'  => 'Move highly-qualified leads directly into a high-leverage diagnostic session to finalize $10k–$25k engagements.'
        )
    );

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "ea_mechanism_step_{$i}_title", array( 'default' => $mechanism_defaults[$i]['title'], 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_mechanism_step_{$i}_title", array( 'label' => __( "Mechanism Step {$i} Title", 'executive-acquisition' ), 'section' => 'ea_mechanism_section' ) );
        $wp_customize->add_setting( "ea_mechanism_step_{$i}_text", array( 'default' => $mechanism_defaults[$i]['text'], 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_mechanism_step_{$i}_text", array( 'label' => __( "Mechanism Step {$i} Description", 'executive-acquisition' ), 'section' => 'ea_mechanism_section', 'type' => 'textarea' ) );
    }

$wp_customize->add_setting( 'ea_mechanism_pre_headline', array( 'default' => 'The Institutional Intent Engine™', 'transport' => 'postMessage' ) );
$wp_customize->add_control( 'ea_mechanism_pre_headline', array( 'label' => __( 'Section Pre-headline', 'executive-acquisition' ), 'section' => 'ea_mechanism_section' ) );

    $wp_customize->add_setting( 'ea_mechanism_image', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ea_mechanism_image', array(
        'label'    => __( 'Mechanism Section Side Image', 'executive-acquisition' ),
        'section'  => 'ea_mechanism_section',
    ) ) );

    // 12. FAQ Section
    $wp_customize->add_section( 'ea_faq_section', array(
        'title'    => __( 'FAQ Section', 'executive-acquisition' ),
        'panel'    => 'ea_panel_homepage',
        'priority' => 36,
    ) );

    $wp_customize->add_setting( 'ea_faq_title', array( 'default' => 'Strategic Clarifications', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_faq_title', array( 'label' => __( 'FAQ Title', 'executive-acquisition' ), 'section' => 'ea_faq_section' ) );

    $wp_customize->add_setting( 'ea_faq_subheadline', array( 'default' => 'Common questions regarding the acquisition engine.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_faq_subheadline', array( 'label' => __( 'FAQ Subheadline', 'executive-acquisition' ), 'section' => 'ea_faq_section', 'type' => 'textarea' ) );

    $faq_defaults = array(
        1 => array(
            'q' => 'How does the Intent Beacon identify anonymous visitors?',
            'a' => 'We utilize B2B identity resolution technology that matches corporate IP addresses and browser fingerprints against institutional databases.'
        ),
        2 => array(
            'q' => 'Does this system work for boutique coaching firms?',
            'a' => 'Yes. It is specifically designed to level the playing field, allowing boutique firms to project the same institutional authority as global consultancies.'
        ),
        3 => array(
            'q' => 'What is the typical timeframe for ROI?',
            'a' => 'Most clients see their first identified "High-Intent" lead within 14 days of system deployment, with full funnel stabilization in 45 days.'
        ),
        4 => array(
            'q' => 'Is this a specialized CRM or a lead gen service?',
            'a' => 'It is a hybrid infrastructure—combining proprietary conversion psychology with automated identification tech that feeds into your existing CRM.'
        )
    );

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting( "ea_faq_q_{$i}", array( 'default' => $faq_defaults[$i]['q'], 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_faq_q_{$i}", array( 'label' => __( "FAQ {$i} Question", 'executive-acquisition' ), 'section' => 'ea_faq_section' ) );
        $wp_customize->add_setting( "ea_faq_a_{$i}", array( 'default' => $faq_defaults[$i]['a'], 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_faq_a_{$i}", array( 'label' => __( "FAQ {$i} Answer", 'executive-acquisition' ), 'section' => 'ea_faq_section', 'type' => 'textarea' ) );
    }

    // 13. Final CTA (Bottom of Page)
    $wp_customize->add_section( 'ea_final_cta_section', array(
        'title'    => __( 'Final CTA (Bottom)', 'executive-acquisition' ),
        'panel'    => 'ea_panel_homepage',
        'priority' => 37,
    ) );

    $wp_customize->add_setting( 'ea_cta_title', array( 'default' => 'Ready to exit the content hamster wheel?', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_cta_title', array( 'label' => __( 'CTA Title', 'executive-acquisition' ), 'section' => 'ea_final_cta_section' ) );

    $wp_customize->add_setting( 'ea_cta_subheadline', array( 'default' => 'Book your strategic diagnostic session today.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_cta_subheadline', array( 'label' => __( 'CTA Subheadline', 'executive-acquisition' ), 'section' => 'ea_final_cta_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'ea_cta_compliance', array( 'default' => '✓ STRICTLY CONFIDENTIAL | ✓ NO HIGH-PRESSURE SALES | ✓ C-SUITE OPTIMIZED', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_cta_compliance', array( 'label' => __( 'CTA Compliance Text', 'executive-acquisition' ), 'section' => 'ea_final_cta_section' ) );

    $wp_customize->add_setting( 'ea_cta_type', array( 'default' => 'modal', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_cta_type', array(
        'label'    => __( 'Final CTA Strategy', 'executive-acquisition' ),
        'section'  => 'ea_final_cta_section',
        'type'     => 'select',
        'choices'  => array(
            'modal'     => __( 'Trigger Modal (Shortcode/HTML)', 'executive-acquisition' ),
            'inline'    => __( 'Inline Form (Shortcode/HTML)', 'executive-acquisition' ),
            'button'    => __( 'Direct Link (Button)', 'executive-acquisition' ),
        ),
    ) );

    $wp_customize->add_setting( 'ea_cta_btn_text', array( 'default' => 'Book Your Diagnostic Session →', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_cta_btn_text', array( 'label' => __( 'CTA Button Text', 'executive-acquisition' ), 'section' => 'ea_final_cta_section' ) );

    $wp_customize->add_setting( 'ea_cta_btn_url', array( 'default' => '/diagnostic-session', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_cta_btn_url', array( 'label' => __( 'CTA Button URL', 'executive-acquisition' ), 'section' => 'ea_final_cta_section' ) );

    $wp_customize->add_setting( 'ea_cta_form_code', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_cta_form_code', array(
        'label'    => __( 'Final CTA Form Shortcode or HTML', 'executive-acquisition' ),
        'section'  => 'ea_final_cta_section',
        'type'     => 'textarea',
    ) );

    // 14. Newsletter Section
    $wp_customize->add_section( 'ea_newsletter_section', array(
        'title'    => __( 'Newsletter Section', 'executive-acquisition' ),
        'panel'    => 'ea_panel_homepage',
        'priority' => 38,
    ) );

    $wp_customize->add_setting( 'ea_newsletter_title', array( 'default' => 'Join 2,400+ C-Suite Leaders', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_newsletter_title', array( 'label' => __( 'Newsletter Title', 'executive-acquisition' ), 'section' => 'ea_newsletter_section' ) );

    $wp_customize->add_setting( 'ea_newsletter_desc', array( 'default' => 'Get bi-weekly leadership architecture and acquisition strategies delivered directly to your inbox.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_newsletter_desc', array( 'label' => __( 'Newsletter Description', 'executive-acquisition' ), 'section' => 'ea_newsletter_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'ea_newsletter_tag', array( 'default' => 'The Institutional Brief', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_newsletter_tag', array( 'label' => __( 'Newsletter Tag', 'executive-acquisition' ), 'section' => 'ea_newsletter_section' ) );

    $wp_customize->add_setting( 'ea_newsletter_btn', array( 'default' => 'Join Briefing →', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_newsletter_btn', array( 'label' => __( 'Newsletter Button', 'executive-acquisition' ), 'section' => 'ea_newsletter_section' ) );

    $wp_customize->add_setting( 'ea_newsletter_type', array( 'default' => 'default', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_newsletter_type', array(
        'label'    => __( 'Newsletter Strategy', 'executive-acquisition' ),
        'section'  => 'ea_newsletter_section',
        'type'     => 'select',
        'choices'  => array(
            'default'   => __( 'Default Inline Form', 'executive-acquisition' ),
            'shortcode' => __( 'Custom Shortcode / HTML', 'executive-acquisition' ),
        ),
    ) );

    $wp_customize->add_setting( 'ea_newsletter_form_code', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_newsletter_form_code', array(
        'label'    => __( 'Newsletter Shortcode / HTML', 'executive-acquisition' ),
        'section'  => 'ea_newsletter_section',
        'type'     => 'textarea',
    ) );

    // 15. Infrastructure Blueprint (Generator Defaults)
    $wp_customize->add_section( 'ea_blueprint_section', array(
        'title'    => __( 'Infrastructure Blueprint (Generator)', 'executive-acquisition' ),
        'panel'    => 'ea_panel_global',
        'priority' => 10,
    ) );

    $blueprint_pages = array(
        'home' => 'Home',
        'about' => 'The Architecture of Authority',
        'contact' => 'Initiate Diagnostic',
        'briefing' => 'Institutional Briefing',
        'case_study' => 'ROI & Impact Proof',
        'privacy' => 'Privacy Policy',
        'terms' => 'Terms of Service'
    );

    foreach ($blueprint_pages as $slug => $label) {
        $wp_customize->add_setting( "ea_gen_title_{$slug}", array( 'default' => $label, 'transport' => 'refresh' ) );
        $wp_customize->add_control( "ea_gen_title_{$slug}", array( 'label' => __( "{$label} Page Title", 'executive-acquisition' ), 'section' => 'ea_blueprint_section' ) );

        $wp_customize->add_setting( "ea_gen_content_{$slug}", array( 'default' => '', 'transport' => 'refresh' ) );
        $wp_customize->add_control( "ea_gen_content_{$slug}", array( 'label' => __( "{$label} Initial Content", 'executive-acquisition' ), 'section' => 'ea_blueprint_section', 'type' => 'textarea' ) );
    }

    // 15.1 Strategy Session Page
    $wp_customize->add_section( 'ea_strategy_session_section', array(
        'title'    => __( 'Strategy Session Page', 'executive-acquisition' ),
        'panel'    => 'ea_panel_pages',
        'priority' => 11,
    ) );

    $wp_customize->add_setting( 'ea_gen_title_strategy', array( 'default' => 'Private Strategy Session', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_gen_title_strategy', array( 'label' => __( 'Strategy Session Title', 'executive-acquisition' ), 'section' => 'ea_strategy_session_section' ) );

    $wp_customize->add_setting( 'ea_gen_content_strategy', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_gen_content_strategy', array( 'label' => __( 'Strategy Session Initial Content', 'executive-acquisition' ), 'section' => 'ea_strategy_session_section', 'type' => 'textarea' ) );

    // 16. Form Architecture
    $wp_customize->add_section( 'ea_forms_section', array(
        'title'    => __( 'Form Architecture & UX', 'executive-acquisition' ),
        'panel'    => 'ea_panel_global',
        'priority' => 70,
    ) );

    // Newsletter Form
    $wp_customize->add_setting( 'ea_form_placeholder_newsletter', array( 'default' => 'Work Email Address', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_form_placeholder_newsletter', array( 'label' => __( 'Newsletter Email Placeholder', 'executive-acquisition' ), 'section' => 'ea_forms_section' ) );

    // Contact Page Form
    $wp_customize->add_setting( 'ea_form_label_name', array( 'default' => 'Full Name', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_form_label_name', array( 'label' => __( 'Name Field Label', 'executive-acquisition' ), 'section' => 'ea_forms_section' ) );
    $wp_customize->add_setting( 'ea_form_placeholder_name', array( 'default' => 'Executive Name', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_form_placeholder_name', array( 'label' => __( 'Name Field Placeholder', 'executive-acquisition' ), 'section' => 'ea_forms_section' ) );

    $wp_customize->add_setting( 'ea_form_label_email', array( 'default' => 'Work Email', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_form_label_email', array( 'label' => __( 'Email Field Label', 'executive-acquisition' ), 'section' => 'ea_forms_section' ) );
    $wp_customize->add_setting( 'ea_form_placeholder_email', array( 'default' => 'corporate@email.com', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_form_placeholder_email', array( 'label' => __( 'Email Field Placeholder', 'executive-acquisition' ), 'section' => 'ea_forms_section' ) );

    $wp_customize->add_setting( 'ea_form_label_org', array( 'default' => 'Organization / Focus Area', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_form_label_org', array( 'label' => __( 'Org Field Label', 'executive-acquisition' ), 'section' => 'ea_forms_section' ) );
    $wp_customize->add_setting( 'ea_form_placeholder_org', array( 'default' => 'Company Name or Niche', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_form_placeholder_org', array( 'label' => __( 'Org Field Placeholder', 'executive-acquisition' ), 'section' => 'ea_forms_section' ) );

    $wp_customize->add_setting( 'ea_form_label_message', array( 'default' => 'Briefly describe your institutional challenge', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_form_label_message', array( 'label' => __( 'Message Field Label', 'executive-acquisition' ), 'section' => 'ea_forms_section' ) );
    $wp_customize->add_setting( 'ea_form_placeholder_message', array( 'default' => 'Your inquiry...', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_form_placeholder_message', array( 'label' => __( 'Message Field Placeholder', 'executive-acquisition' ), 'section' => 'ea_forms_section' ) );

    $wp_customize->add_setting( 'ea_form_btn_contact', array( 'default' => 'Send Inquiry →', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_form_btn_contact', array( 'label' => __( 'Contact Form Button Text', 'executive-acquisition' ), 'section' => 'ea_forms_section' ) );

    $wp_customize->add_setting( 'ea_contact_form_code', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_contact_form_code', array(
        'label'    => __( 'Contact Page Form Shortcode or HTML', 'executive-acquisition' ),
        'section'  => 'ea_forms_section',
        'type'     => 'textarea',
    ) );

    // Landing Page Form (Bottom of page)
    $wp_customize->add_setting( 'ea_form_title_cta', array( 'default' => '[Lead Qualification Form Placeholder]', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_form_title_cta', array( 'label' => __( 'LP Form Placeholder Title', 'executive-acquisition' ), 'section' => 'ea_forms_section' ) );
    $wp_customize->add_setting( 'ea_form_desc_cta', array( 'default' => '(Use Step 1: Work Email -> Step 2: Executive Qualifier)', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_form_desc_cta', array( 'label' => __( 'LP Form Placeholder Desc', 'executive-acquisition' ), 'section' => 'ea_forms_section' ) );

    // 17. Tracking & Scripts
    $wp_customize->add_section( 'ea_tracking_section', array(
        'title'    => __( 'Tracking & Analytics', 'executive-acquisition' ),
        'panel'    => 'ea_panel_global',
        'priority' => 80,
    ) );

    $wp_customize->add_setting( 'ea_gtm_id', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_gtm_id', array( 'label' => __( 'GTM Container ID', 'executive-acquisition' ), 'section' => 'ea_tracking_section' ) );

    $wp_customize->add_setting( 'ea_header_scripts', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_header_scripts', array( 'label' => __( 'Header Scripts', 'executive-acquisition' ), 'section' => 'ea_tracking_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'ea_footer_scripts', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_footer_scripts', array( 'label' => __( 'Footer Scripts', 'executive-acquisition' ), 'section' => 'ea_tracking_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'ea_og_image', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ea_og_image', array(
        'label'    => __( 'OG Share Image (1200x630)', 'executive-acquisition' ),
        'section'  => 'ea_tracking_section',
    ) ) );

    $wp_customize->add_setting( 'ea_executive_logo', array( 'default' => '', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ea_executive_logo', array(
        'label'    => __( 'Header Logo', 'executive-acquisition' ),
        'section'  => 'ea_header_section',
    ) ) );

    $wp_customize->add_setting( 'ea_header_cta_text', array( 'default' => 'Get Started', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_header_cta_text', array( 'label' => __( 'Header CTA Text', 'executive-acquisition' ), 'section' => 'ea_header_section' ) );

    $wp_customize->add_setting( 'ea_header_cta_url', array( 'default' => '#cta', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_header_cta_url', array( 'label' => __( 'Header CTA URL', 'executive-acquisition' ), 'section' => 'ea_header_section', 'type' => 'text' ) );

    $wp_customize->add_setting( 'ea_schema_json', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_schema_json', array(
        'label' => __( 'JSON-LD Schema', 'executive-acquisition' ),
        'section' => 'ea_tracking_section',
        'type' => 'textarea'
    ) );

    // 18. Footer Redesign
    $wp_customize->add_section( 'ea_footer_redesign', array(
        'title'    => __( 'Footer & Trust Seals', 'executive-acquisition' ),
        'panel'    => 'ea_panel_footer',
        'priority' => 90,
    ) );

    $wp_customize->add_setting( 'ea_footer_trust_label', array( 'default' => 'SECURE INFRASTRUCTURE:', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_footer_trust_label', array( 'label' => __( 'Trust Seal Label', 'executive-acquisition' ), 'section' => 'ea_footer_redesign' ) );

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "ea_footer_seal_{$i}", array( 'default' => '', 'transport' => 'refresh' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "ea_footer_seal_{$i}", array( 'label' => __( "Trust Seal {$i}", 'executive-acquisition' ), 'section' => 'ea_footer_redesign' ) ) );
    }

    $wp_customize->add_setting( 'ea_footer_col2_title', array( 'default' => 'Infrastructure', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_footer_col2_title', array( 'label' => __( 'Column 2 Title', 'executive-acquisition' ), 'section' => 'ea_footer_redesign' ) );

    $wp_customize->add_setting( 'ea_footer_col3_title', array( 'default' => 'Institutional Access', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_footer_col3_title', array( 'label' => __( 'Column 3 Title', 'executive-acquisition' ), 'section' => 'ea_footer_redesign' ) );

    $wp_customize->add_setting( 'ea_footer_col4_title', array( 'default' => 'Legal & Trust', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_footer_col4_title', array( 'label' => __( 'Column 4 Title', 'executive-acquisition' ), 'section' => 'ea_footer_redesign' ) );

    $wp_customize->add_setting( 'ea_footer_legal_text', array( 'default' => 'All leadership engagements are subject to a strict Mutual Non-Disclosure Agreement.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_footer_legal_text', array( 'label' => __( 'Footer Legal Text', 'executive-acquisition' ), 'section' => 'ea_footer_redesign', 'type' => 'textarea' ) );
}
add_action( 'customize_register', 'executive_acquisition_customize_register' );

/**
 * Enqueue Customizer Preview JS
 */
function ea_customize_preview_js() {
    wp_enqueue_script( 'ea-customizer-preview', get_template_directory_uri() . '/assets/js/customizer-preview.js', array( 'customize-preview', 'jquery' ), '1.1.7', true );
}
add_action( 'customize_preview_init', 'ea_customize_preview_js' );
