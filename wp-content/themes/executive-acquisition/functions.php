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
    wp_enqueue_style( 'executive-acquisition-style', get_stylesheet_uri(), array(), '1.1.7' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&family=Playfair+Display:wght@700;900&display=swap', array(), null );
    wp_enqueue_script( 'ea-dtr', get_template_directory_uri() . '/assets/js/dtr-personalization.js', array('jquery'), '1.1.7', true );
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
        'priority' => 26,
    ) );

    $wp_customize->add_setting( 'ea_lead_magnet_title', array( 'default' => 'The Institutional Intent Roadmap', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_lead_magnet_title', array( 'label' => __( 'Asset Title', 'executive-acquisition' ), 'section' => 'ea_assets_section' ) );

    $wp_customize->add_setting( 'ea_lead_magnet_url', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_lead_magnet_url', array( 'label' => __( 'Asset Download URL', 'executive-acquisition' ), 'section' => 'ea_assets_section', 'type' => 'url' ) );
    $wp_customize->add_control( 'ea_form_action_url', array(
        'label' => __( 'ESP Form Action URL (e.g. Mailchimp/Klaviyo)', 'executive-acquisition' ),
        'section' => 'ea_assets_section',
        'type' => 'text'
    ) );

    // 3. About Page Strategy
    $wp_customize->add_section( 'ea_about_section', array(
        'title'    => __( 'About Page Strategy', 'executive-acquisition' ),
        'priority' => 27,
    ) );

    $wp_customize->add_setting( 'ea_about_tag', array( 'default' => 'The Architecture of Authority', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_about_tag', array( 'label' => __( 'About Page Tag', 'executive-acquisition' ), 'section' => 'ea_about_section' ) );

    $wp_customize->add_setting( 'ea_about_headline', array( 'default' => 'We Engineer Institutional Trust for Elite Coaches.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_about_headline', array( 'label' => __( 'About Page Headline', 'executive-acquisition' ), 'section' => 'ea_about_section' ) );

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

    $wp_customize->add_setting( 'ea_about_exp_title', array( 'default' => 'The Track Record', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_about_exp_title', array( 'label' => __( 'Experience Box Title', 'executive-acquisition' ), 'section' => 'ea_about_section' ) );

    $wp_customize->add_setting( 'ea_about_experience', array( 'default' => 'Since 2012, we have been the silent architects behind the leadership transitions of over 150 mid-market organizations.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_about_experience', array( 'label' => __( 'Experience / Track Record', 'executive-acquisition' ), 'section' => 'ea_about_section', 'type' => 'textarea' ) );

    // 4. Contact Page Strategy
    $wp_customize->add_section( 'ea_contact_section', array(
        'title'    => __( 'Contact Page Strategy', 'executive-acquisition' ),
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

    // 5. Founder Profile
    $wp_customize->add_section( 'ea_profile_section', array(
        'title'    => __( 'Founder Profile', 'executive-acquisition' ),
        'priority' => 29,
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

    $wp_customize->add_setting( 'ea_linkedin_url', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_linkedin_url', array( 'label' => __( 'LinkedIn URL', 'executive-acquisition' ), 'section' => 'ea_profile_section', 'type' => 'url' ) );

    $wp_customize->add_setting( 'ea_twitter_url', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_twitter_url', array( 'label' => __( 'Twitter/X URL', 'executive-acquisition' ), 'section' => 'ea_profile_section', 'type' => 'url' ) );

    // 6. Funnel Flow & Video
    $wp_customize->add_section( 'ea_funnel_flow', array(
        'title'    => __( 'Funnel Flow & Video', 'executive-acquisition' ),
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
        'priority' => 31,
    ) );

    $wp_customize->add_setting( 'ea_hero_pre_headline', array( 'default' => 'Strictly for Executive Coaches targeting the C-Suite:', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_hero_pre_headline', array( 'label' => __( 'Pre-Headline', 'executive-acquisition' ), 'section' => 'ea_hero_section' ) );

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

    $wp_customize->add_setting( 'ea_hero_cta_text', array( 'default' => 'Access the Private Executive Briefing →', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_hero_cta_text', array( 'label' => __( 'CTA Button Text', 'executive-acquisition' ), 'section' => 'ea_hero_section' ) );

    $wp_customize->add_setting( 'ea_hero_micro_copy', array( 'default' => 'Takes 12 minutes. No \'salesy\' fluff. Pure strategy.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_hero_micro_copy', array( 'label' => __( 'Hero Micro-copy', 'executive-acquisition' ), 'section' => 'ea_hero_section' ) );

    $wp_customize->add_setting( 'ea_hero_video_url', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_hero_video_url', array( 'label' => __( 'Hero Video URL (YouTube/Vimeo)', 'executive-acquisition' ), 'section' => 'ea_hero_section', 'type' => 'url' ) );

    // 8. Social Proof & Authority
    $wp_customize->add_section( 'ea_social_proof', array(
        'title'    => __( 'Social Proof & Authority', 'executive-acquisition' ),
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
        'priority' => 33,
    ) );

    $wp_customize->add_setting( 'ea_agitation_title', array( 'default' => "The 'High-Ticket' Paradox: Why Your Expertise Isn't Converting", 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_agitation_title', array( 'label' => __( 'Section Title', 'executive-acquisition' ), 'section' => 'ea_agitation_section' ) );

    $wp_customize->add_setting( 'ea_agitation_subheadline', array( 'default' => "The hidden costs of the content hamster wheel.", 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_agitation_subheadline', array( 'label' => __( 'Section Subheadline', 'executive-acquisition' ), 'section' => 'ea_agitation_section', 'type' => 'textarea' ) );

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "ea_agitation_bullet_{$i}_title", array( 'default' => "Pain Point {$i}", 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_agitation_bullet_{$i}_title", array( 'label' => __( "Bullet {$i} Title", 'executive-acquisition' ), 'section' => 'ea_agitation_section' ) );
        $wp_customize->add_setting( "ea_agitation_bullet_{$i}_text", array( 'default' => "Description of pain point {$i}.", 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_agitation_bullet_{$i}_text", array( 'label' => __( "Bullet {$i} Text", 'executive-acquisition' ), 'section' => 'ea_agitation_section', 'type' => 'textarea' ) );
    }

    // 10. Engagement Tiers
    $wp_customize->add_section( 'ea_tiers_section', array(
        'title'    => __( 'Engagement Tiers', 'executive-acquisition' ),
        'priority' => 34,
    ) );

    for ($i = 1; $i <= 2; $i++) {
        $wp_customize->add_setting( "ea_tier_{$i}_name", array( 'default' => "Tier {$i} Name", 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_tier_{$i}_name", array( 'label' => __( "Tier {$i} Name", 'executive-acquisition' ), 'section' => 'ea_tiers_section' ) );
        $wp_customize->add_setting( "ea_tier_{$i}_price", array( 'default' => "$5,000", 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_tier_{$i}_price", array( 'label' => __( "Tier {$i} Price", 'executive-acquisition' ), 'section' => 'ea_tiers_section' ) );
        $wp_customize->add_setting( "ea_tier_{$i}_desc", array( 'default' => "Tier {$i} description.", 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_tier_{$i}_desc", array( 'label' => __( "Tier {$i} Description", 'executive-acquisition' ), 'section' => 'ea_tiers_section', 'type' => 'textarea' ) );
    }

    // 11. The Mechanism (3-Step System)
    $wp_customize->add_section( 'ea_mechanism_section', array(
        'title'    => __( 'The Mechanism (3-Step System)', 'executive-acquisition' ),
        'priority' => 35,
    ) );

    $wp_customize->add_setting( 'ea_mechanism_title', array( 'default' => 'The Institutional Intent Engine', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_mechanism_title', array( 'label' => __( 'Section Title', 'executive-acquisition' ), 'section' => 'ea_mechanism_section' ) );

    $wp_customize->add_setting( 'ea_mechanism_subheadline', array( 'default' => 'A predictable, intent-driven acquisition system.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_mechanism_subheadline', array( 'label' => __( 'Section Subheadline', 'executive-acquisition' ), 'section' => 'ea_mechanism_section', 'type' => 'textarea' ) );

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "ea_mechanism_step_{$i}_title", array( 'default' => "Step {$i} Title", 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_mechanism_step_{$i}_title", array( 'label' => __( "Step {$i} Title", 'executive-acquisition' ), 'section' => 'ea_mechanism_section' ) );
        $wp_customize->add_setting( "ea_mechanism_step_{$i}_text", array( 'default' => "Description for step {$i}.", 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_mechanism_step_{$i}_text", array( 'label' => __( "Step {$i} Text", 'executive-acquisition' ), 'section' => 'ea_mechanism_section', 'type' => 'textarea' ) );
    }

    // 12. FAQ Section
    $wp_customize->add_section( 'ea_faq_section', array(
        'title'    => __( 'FAQ Section', 'executive-acquisition' ),
        'priority' => 36,
    ) );

    $wp_customize->add_setting( 'ea_faq_title', array( 'default' => 'Strategic Clarifications', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_faq_title', array( 'label' => __( 'FAQ Title', 'executive-acquisition' ), 'section' => 'ea_faq_section' ) );

    $wp_customize->add_setting( 'ea_faq_subheadline', array( 'default' => 'Common questions regarding the acquisition engine.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_faq_subheadline', array( 'label' => __( 'FAQ Subheadline', 'executive-acquisition' ), 'section' => 'ea_faq_section', 'type' => 'textarea' ) );

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting( "ea_faq_q_{$i}", array( 'default' => "Question {$i}?", 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_faq_q_{$i}", array( 'label' => __( "Question {$i}", 'executive-acquisition' ), 'section' => 'ea_faq_section' ) );
        $wp_customize->add_setting( "ea_faq_a_{$i}", array( 'default' => "Answer for question {$i}.", 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_faq_a_{$i}", array( 'label' => __( "Answer {$i}", 'executive-acquisition' ), 'section' => 'ea_faq_section', 'type' => 'textarea' ) );
    }

    // 13. Final CTA (Bottom of Page)
    $wp_customize->add_section( 'ea_final_cta_section', array(
        'title'    => __( 'Final CTA (Bottom)', 'executive-acquisition' ),
        'priority' => 37,
    ) );

    $wp_customize->add_setting( 'ea_cta_title', array( 'default' => 'Ready to exit the content hamster wheel?', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_cta_title', array( 'label' => __( 'CTA Title', 'executive-acquisition' ), 'section' => 'ea_final_cta_section' ) );

    $wp_customize->add_setting( 'ea_cta_subheadline', array( 'default' => 'Book your strategic diagnostic session today.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_cta_subheadline', array( 'label' => __( 'CTA Subheadline', 'executive-acquisition' ), 'section' => 'ea_final_cta_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'ea_cta_compliance', array( 'default' => '✓ STRICTLY CONFIDENTIAL | ✓ NO HIGH-PRESSURE SALES | ✓ C-SUITE OPTIMIZED', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_cta_compliance', array( 'label' => __( 'CTA Compliance Text', 'executive-acquisition' ), 'section' => 'ea_final_cta_section' ) );

    // 14. Newsletter Section
    $wp_customize->add_section( 'ea_newsletter_section', array(
        'title'    => __( 'Newsletter Section', 'executive-acquisition' ),
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

    // 15. Infrastructure Blueprint (Generator Defaults)
    $wp_customize->add_section( 'ea_blueprint_section', array(
        'title'    => __( 'Infrastructure Blueprint (Generator)', 'executive-acquisition' ),
        'priority' => 10,
    ) );

    $blueprint_pages = array(
        'home' => 'Home',
        'about' => 'The Architecture of Authority',
        'contact' => 'Initiate Diagnostic',
        'briefing' => 'Institutional Briefing',
        'case_study' => 'ROI & Impact Proof'
    );

    foreach ($blueprint_pages as $slug => $label) {
        $wp_customize->add_setting( "ea_gen_title_{$slug}", array( 'default' => $label, 'transport' => 'refresh' ) );
        $wp_customize->add_control( "ea_gen_title_{$slug}", array( 'label' => __( "{$label} Page Title", 'executive-acquisition' ), 'section' => 'ea_blueprint_section' ) );

        $wp_customize->add_setting( "ea_gen_content_{$slug}", array( 'default' => '', 'transport' => 'refresh' ) );
        $wp_customize->add_control( "ea_gen_content_{$slug}", array( 'label' => __( "{$label} Initial Content", 'executive-acquisition' ), 'section' => 'ea_blueprint_section', 'type' => 'textarea' ) );
    }

    // 16. Form Architecture
    $wp_customize->add_section( 'ea_forms_section', array(
        'title'    => __( 'Form Architecture & UX', 'executive-acquisition' ),
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

    // Landing Page Form (Bottom of page)
    $wp_customize->add_setting( 'ea_form_title_cta', array( 'default' => '[Lead Qualification Form Placeholder]', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_form_title_cta', array( 'label' => __( 'LP Form Placeholder Title', 'executive-acquisition' ), 'section' => 'ea_forms_section' ) );
    $wp_customize->add_setting( 'ea_form_desc_cta', array( 'default' => '(Use Step 1: Work Email -> Step 2: Executive Qualifier)', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_form_desc_cta', array( 'label' => __( 'LP Form Placeholder Desc', 'executive-acquisition' ), 'section' => 'ea_forms_section' ) );

    // 17. Tracking & Scripts
    $wp_customize->add_section( 'ea_tracking_section', array(
        'title'    => __( 'Tracking & Analytics', 'executive-acquisition' ),
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

    $wp_customize->add_setting( 'ea_schema_json', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_schema_json', array(
        'label' => __( 'JSON-LD Schema', 'executive-acquisition' ),
        'section' => 'ea_tracking_section',
        'type' => 'textarea'
    ) );
}
add_action( 'customize_register', 'executive_acquisition_customize_register' );

/**
 * Enqueue Customizer Preview JS
 */
function ea_customize_preview_js() {
    wp_enqueue_script( 'ea-customizer-preview', get_template_directory_uri() . '/assets/js/customizer-preview.js', array( 'customize-preview', 'jquery' ), '1.1.7', true );
}
add_action( 'customize_preview_init', 'ea_customize_preview_js' );
