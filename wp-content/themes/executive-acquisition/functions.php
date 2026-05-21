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
            'footer'  => __( 'Footer Menu', 'executive-acquisition' ),
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
        'label'    => __( 'Accent Color (Gold)', 'executive-acquisition' ),
        'section'  => 'ea_brand_section',
    ) ) );

    $wp_customize->add_setting( 'ea_border_radius', array(
        'default'   => '2px',
        'transport' => 'postMessage',
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
        'label'    => __( 'Executive Night Mode (Dark Mode)', 'executive-acquisition' ),
        'section'  => 'ea_brand_section',
        'type'     => 'checkbox',
    ) );

    $wp_customize->add_setting( 'ea_executive_logo', array( 'default' => '', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ea_executive_logo', array(
        'label'    => __( 'Executive Logo (Header)', 'executive-acquisition' ),
        'section'  => 'ea_brand_section',
    ) ) );

    // 2. Strategic Assets
    $wp_customize->add_section( 'ea_assets_section', array(
        'title'    => __( 'Strategic Assets (Lead Magnets)', 'executive-acquisition' ),
        'priority' => 24,
    ) );

    $wp_customize->add_setting( 'ea_lead_magnet_title', array( 'default' => 'The Institutional Intent Roadmap', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_lead_magnet_title', array( 'label' => __( 'Asset Title', 'executive-acquisition' ), 'section' => 'ea_assets_section' ) );

    $wp_customize->add_setting( 'ea_lead_magnet_url', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_lead_magnet_url', array( 'label' => __( 'Asset Download URL', 'executive-acquisition' ), 'section' => 'ea_assets_section', 'type' => 'url' ) );

    $wp_customize->add_setting( 'ea_form_action_url', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( 'ea_form_action_url', array(
        'label' => __( 'ESP Form Action URL (e.g. Mailchimp/Klaviyo)', 'executive-acquisition' ),
        'section' => 'ea_assets_section',
        'type' => 'text',
        'description' => __( 'The action URL for your lead magnet capture form.', 'executive-acquisition' )
    ) );

    // 3. Founder/Coach Profile
    $wp_customize->add_section( 'ea_profile_section', array(
        'title'    => __( 'Founder/Coach Profile', 'executive-acquisition' ),
        'priority' => 26,
    ) );

    $wp_customize->add_setting( 'ea_founder_name', array( 'default' => 'Executive Strategist', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_founder_name', array( 'label' => __( 'Founder Name', 'executive-acquisition' ), 'section' => 'ea_profile_section' ) );

    $wp_customize->add_setting( 'ea_founder_bio', array(
        'default' => 'Specializing in leadership architecture for $5M+ scaling organizations. We bridge the gap between founder vision and institutional execution.',
        'transport' => 'postMessage'
    ) );
    $wp_customize->add_control( 'ea_founder_bio', array( 'label' => __( 'Brief Bio (Authority focus)', 'executive-acquisition' ), 'section' => 'ea_profile_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'ea_founder_image', array( 'default' => '', 'transport' => 'refresh' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ea_founder_image', array(
        'label'    => __( 'Founder Image', 'executive-acquisition' ),
        'section'  => 'ea_profile_section',
    ) ) );

    // 4. Hero Section
    $wp_customize->add_section( 'ea_hero_section', array(
        'title'    => __( 'Hero Section', 'executive-acquisition' ),
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'ea_hero_pre_headline', array(
        'default'   => 'Strictly for Executive, Leadership, and Business Coaches targeting the C-Suite & Scaling Founders:',
        'transport' => 'postMessage',
    ) );
    $wp_customize->add_control( 'ea_hero_pre_headline', array(
        'label'    => __( 'Pre-Headline', 'executive-acquisition' ),
        'section'  => 'ea_hero_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'ea_hero_headline', array(
        'default'   => 'Book 3-5 High-Ticket Corporate Engagements Every Month Using an Institutional Intent Engine WITHOUT The Content Hamster Wheel.',
        'transport' => 'postMessage',
    ) );
    $wp_customize->add_control( 'ea_hero_headline', array(
        'label'    => __( 'Headline', 'executive-acquisition' ),
        'section'  => 'ea_hero_section',
        'type'     => 'textarea',
    ) );

    $wp_customize->add_setting( 'ea_hero_subheadline', array(
        'default'   => 'Our proprietary "Client Acquisition Infrastructure" identifies anonymous corporate decision-makers in your ecosystem and builds instant institutional trust.',
        'transport' => 'postMessage',
    ) );
    $wp_customize->add_control( 'ea_hero_subheadline', array(
        'label'    => __( 'Sub-Headline', 'executive-acquisition' ),
        'section'  => 'ea_hero_section',
        'type'     => 'textarea',
    ) );

    $wp_customize->add_setting( 'ea_hero_cta_text', array(
        'default'   => 'Access the Private Executive Briefing →',
        'transport' => 'postMessage',
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

    // 5. Social Proof Section
    $wp_customize->add_section( 'ea_social_proof', array(
        'title'    => __( 'Social Proof & Authority', 'executive-acquisition' ),
        'priority' => 31,
    ) );

    $wp_customize->add_setting( 'ea_logo_bar_text', array(
        'default'   => 'TRUSTED BY LEADERS AT:',
        'transport' => 'postMessage',
    ) );
    $wp_customize->add_control( 'ea_logo_bar_text', array(
        'label'    => __( 'Logo Bar Label', 'executive-acquisition' ),
        'section'  => 'ea_social_proof',
        'type'     => 'text',
    ) );

    for ($i = 1; $i <= 5; $i++) {
        $wp_customize->add_setting( "ea_logo_{$i}", array( 'default' => '', 'transport' => 'refresh' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "ea_logo_{$i}", array(
            'label'    => __( "Partner Logo {$i}", 'executive-acquisition' ),
            'section'  => 'ea_social_proof',
        ) ) );
    }

    $wp_customize->add_setting( 'ea_enable_marquee', array(
        'default'   => false,
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_enable_marquee', array(
        'label'    => __( 'Enable Scrolling Marquee Animation', 'executive-acquisition' ),
        'section'  => 'ea_social_proof',
        'type'     => 'checkbox',
    ) );

    $wp_customize->add_setting( 'ea_testimonial_quote', array(
        'default'   => 'This system eliminated our lead quality bottleneck within 90 days. We now command the authority we deserve in the mid-market segment.',
        'transport' => 'postMessage',
    ) );
    $wp_customize->add_control( 'ea_testimonial_quote', array(
        'label'    => __( 'Featured Testimonial Quote', 'executive-acquisition' ),
        'section'  => 'ea_social_proof',
        'type'     => 'textarea',
    ) );

    $wp_customize->add_setting( 'ea_testimonial_author', array(
        'default'   => 'VP OPERATIONS, FORTUNE 500 COMPANY',
        'transport' => 'postMessage',
    ) );
    $wp_customize->add_control( 'ea_testimonial_author', array(
        'label'    => __( 'Testimonial Author Name/Title', 'executive-acquisition' ),
        'section'  => 'ea_social_proof',
        'type'     => 'text',
    ) );

    // 6. Advanced SEO & Schema
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

    // 7. Tracking & Scripts Section
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

    // 8. Funnel Flow Settings
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

    $wp_customize->add_setting( 'ea_briefing_cta_delay', array(
        'default'   => '480', // 8 minutes in seconds
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_briefing_cta_delay', array(
        'label'    => __( 'Briefing CTA Delay (Seconds)', 'executive-acquisition' ),
        'section'  => 'ea_funnel_flow',
        'type'     => 'number',
        'description' => __( 'Set the delay before the booking button appears on the briefing page.', 'executive-acquisition' ),
    ) );

    // 9. Agitation Section
    $wp_customize->add_section( 'ea_agitation_section', array(
        'title'    => __( 'Agitation Section', 'executive-acquisition' ),
        'priority' => 40,
    ) );

    $wp_customize->add_setting( 'ea_agitation_title', array(
        'default'   => "The 'High-Ticket' Paradox: Why Your Expertise Isn't Converting Into Calendars",
        'transport' => 'postMessage',
    ) );
    $wp_customize->add_control( 'ea_agitation_title', array(
        'label'    => __( 'Section Title', 'executive-acquisition' ),
        'section'  => 'ea_agitation_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'ea_agitation_subheadline', array(
        'default'   => "Despite your experience, your current acquisition strategy is likely leaking revenue in three critical areas:",
        'transport' => 'postMessage',
    ) );
    $wp_customize->add_control( 'ea_agitation_subheadline', array(
        'label'    => __( 'Section Sub-headline', 'executive-acquisition' ),
        'section'  => 'ea_agitation_section',
        'type'     => 'textarea',
    ) );

    $agitation_defaults = array(
        1 => array('t' => 'The "Content Hamster Wheel" Burnout', 'd' => 'You’re spending hours crafting "thought leadership" that gets likes from peers but is ignored by the VPs and Founders who actually have the budget to hire you.'),
        2 => array('t' => 'The "Cold Outreach" Reputation Tax', 'd' => 'Using automated LinkedIn bots or generic email blasts doesn’t just fail; it actively burns your brand with the C-Suite. High-level leaders value discretion.'),
        3 => array('t' => 'The "Discovery Call" Trap', 'd' => 'Your calendar is filled with "free consults" that lead to "let me think about it." You’re wasting executive time on prospects who can’t afford your $10k+ engagements.')
    );

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "ea_agitation_bullet_{$i}_title", array(
            'default'   => $agitation_defaults[$i]['t'],
            'transport' => 'postMessage',
        ) );
        $wp_customize->add_control( "ea_agitation_bullet_{$i}_title", array(
            'label'    => __( "Bullet {$i} Title", 'executive-acquisition' ),
            'section'  => 'ea_agitation_section',
            'type'     => 'text',
        ) );
        $wp_customize->add_setting( "ea_agitation_bullet_{$i}_text", array(
            'default'   => $agitation_defaults[$i]['d'],
            'transport' => 'postMessage',
        ) );
        $wp_customize->add_control( "ea_agitation_bullet_{$i}_text", array(
            'label'    => __( "Bullet {$i} Text", 'executive-acquisition' ),
            'section'  => 'ea_agitation_section',
            'type'     => 'textarea',
        ) );
    }

    // 10. Mechanism Section
    $wp_customize->add_section( 'ea_mechanism_section', array(
        'title'    => __( 'Mechanism Section', 'executive-acquisition' ),
        'priority' => 50,
    ) );

    $wp_customize->add_setting( 'ea_mechanism_title', array(
        'default'   => 'Introducing: The Institutional Intent Method™',
        'transport' => 'postMessage',
    ) );
    $wp_customize->add_control( 'ea_mechanism_title', array(
        'label'    => __( 'Section Title', 'executive-acquisition' ),
        'section'  => 'ea_mechanism_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'ea_mechanism_subheadline', array(
        'default'   => "A 3-Step Predictive System to Turn Anonymous Decision-Makers into High-Value Partners.",
        'transport' => 'postMessage',
    ) );
    $wp_customize->add_control( 'ea_mechanism_subheadline', array(
        'label'    => __( 'Section Sub-headline', 'executive-acquisition' ),
        'section'  => 'ea_mechanism_section',
        'type'     => 'textarea',
    ) );

    $mechanism_defaults = array(
        1 => array('t' => 'The Decision-Maker Beacon', 'd' => 'We identify the exact VPs and Founders who are currently searching for leadership solutions using intent-based data.'),
        2 => array('t' => 'The Authority Infrastructure', 'd' => 'We replace your "sales funnel" with an Institutional Asset—a high-level briefing that builds 6 months of trust in 12 minutes.'),
        3 => array('t' => 'The Frictionless Conversion Gate', 'd' => 'We implement a qualification protocol that filters out everyone except those ready to engage at your $5k–$25k price point.')
    );

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "ea_mechanism_step_{$i}_title", array(
            'default'   => $mechanism_defaults[$i]['t'],
            'transport' => 'postMessage',
        ) );
        $wp_customize->add_control( "ea_mechanism_step_{$i}_title", array(
            'label'    => __( "Step {$i} Title", 'executive-acquisition' ),
            'section'  => 'ea_mechanism_section',
            'type'     => 'text',
        ) );
        $wp_customize->add_setting( "ea_mechanism_step_{$i}_text", array(
            'default'   => $mechanism_defaults[$i]['d'],
            'transport' => 'postMessage',
        ) );
        $wp_customize->add_control( "ea_mechanism_step_{$i}_text", array(
            'label'    => __( "Step {$i} Text", 'executive-acquisition' ),
            'section'  => 'ea_mechanism_section',
            'type'     => 'textarea',
        ) );
    }

    // 11. FAQ Section
    $wp_customize->add_section( 'ea_faq_section', array(
        'title'    => __( 'Executive FAQ', 'executive-acquisition' ),
        'priority' => 60,
    ) );

    $wp_customize->add_setting( 'ea_faq_title', array(
        'default'   => "Common Objections & Executive FAQ",
        'transport' => 'postMessage',
    ) );
    $wp_customize->add_control( 'ea_faq_title', array(
        'label'    => __( 'Section Title', 'executive-acquisition' ),
        'section'  => 'ea_faq_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'ea_faq_subheadline', array(
        'default'   => "Addressing the critical questions about the Institutional Intent Method™.",
        'transport' => 'postMessage',
    ) );
    $wp_customize->add_control( 'ea_faq_subheadline', array(
        'label'    => __( 'Section Sub-headline', 'executive-acquisition' ),
        'section'  => 'ea_faq_section',
        'type'     => 'textarea',
    ) );

    $faq_defaults = array(
        1 => array('q' => 'How much time is required to manage this system?', 'a' => 'The system is designed for high-leverage. After the initial 14-day setup, your only responsibility is showing up for pre-qualified diagnostic sessions.'),
        2 => array('q' => 'Does this work for specialized coaching niches?', 'a' => 'Yes. The Institutional Intent Method™ is niche-agnostic; it identifies intent based on specific problem searches, not general industry terms.'),
        3 => array('q' => 'How does this compare to LinkedIn automation?', 'a' => 'Automation burns brand equity. Our method uses "Inbound Institutional Assets" that make prospects ask to speak with you, rather than you chasing them.'),
        4 => array('q' => 'What is the typical ROI on these engagements?', 'a' => 'Our clients typically book 3-5 corporate engagements monthly, with average contract values ranging from $10k to $25k.')
    );

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting( "ea_faq_q_{$i}", array( 'default' => $faq_defaults[$i]['q'], 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_faq_q_{$i}", array( 'label' => __( "Question {$i}", 'executive-acquisition' ), 'section' => 'ea_faq_section', 'type' => 'text' ) );
        $wp_customize->add_setting( "ea_faq_a_{$i}", array( 'default' => $faq_defaults[$i]['a'], 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_faq_a_{$i}", array( 'label' => __( "Answer {$i}", 'executive-acquisition' ), 'section' => 'ea_faq_section', 'type' => 'textarea' ) );
    }

    // 12. Engagement Tiers (Packages)
    $wp_customize->add_section( 'ea_tiers_section', array(
        'title'    => __( 'Engagement Tiers', 'executive-acquisition' ),
        'priority' => 64,
    ) );

    $tier_defaults = array(
        1 => array('n' => 'Strategic Intensive', 'p' => '$10,000', 'd' => 'A focused 30-day leadership pivot for mid-market Founders facing rapid institutional scale.'),
        2 => array('n' => 'Institutional Transformation', 'p' => '$25,000', 'd' => 'A comprehensive 90-day infrastructure build for C-Suite teams protecting retention revenue.')
    );

    for ($i = 1; $i <= 2; $i++) {
        $wp_customize->add_setting( "ea_tier_{$i}_name", array( 'default' => $tier_defaults[$i]['n'], 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_tier_{$i}_name", array( 'label' => __( "Tier {$i} Name", 'executive-acquisition' ), 'section' => 'ea_tiers_section' ) );
        $wp_customize->add_setting( "ea_tier_{$i}_price", array( 'default' => $tier_defaults[$i]['p'], 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_tier_{$i}_price", array( 'label' => __( "Tier {$i} Price", 'executive-acquisition' ), 'section' => 'ea_tiers_section' ) );
        $wp_customize->add_setting( "ea_tier_{$i}_desc", array( 'default' => $tier_defaults[$i]['d'], 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "ea_tier_{$i}_desc", array( 'label' => __( "Tier {$i} Description", 'executive-acquisition' ), 'section' => 'ea_tiers_section', 'type' => 'textarea' ) );
    }

    // 13. Final CTA Section
    $wp_customize->add_section( 'ea_cta_section', array(
        'title'    => __( 'Final CTA / Form Section', 'executive-acquisition' ),
        'priority' => 65,
    ) );

    $wp_customize->add_setting( 'ea_cta_title', array( 'default' => 'Apply for Your Private Executive Briefing', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_cta_title', array( 'label' => __( 'Section Title', 'executive-acquisition' ), 'section' => 'ea_cta_section' ) );

    $wp_customize->add_setting( 'ea_cta_subheadline', array( 'default' => 'Select a time below to see the architecture behind the Institutional Intent Method™ and how it can be applied to your coaching practice.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'ea_cta_subheadline', array( 'label' => __( 'Section Sub-headline', 'executive-acquisition' ), 'section' => 'ea_cta_section', 'type' => 'textarea' ) );

    // 13. Compliance Section
    $wp_customize->add_section( 'ea_compliance_section', array(
        'title'    => __( 'Privacy & Compliance', 'executive-acquisition' ),
        'priority' => 70,
    ) );

    $wp_customize->add_setting( 'ea_cookie_notice', array(
        'default'   => 'We use cookies to ensure you get the best experience on our executive platform.',
        'transport' => 'postMessage',
    ) );
    $wp_customize->add_control( 'ea_cookie_notice', array(
        'label'    => __( 'Cookie Notice Text', 'executive-acquisition' ),
        'section'  => 'ea_compliance_section',
        'type'     => 'text',
    ) );

    // 14. Premium Animations
    $wp_customize->add_section( 'ea_animations_section', array(
        'title'    => __( 'Premium Animations', 'executive-acquisition' ),
        'priority' => 80,
    ) );

    $wp_customize->add_setting( 'ea_enable_animations', array(
        'default'   => true,
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'ea_enable_animations', array(
        'label'    => __( 'Enable Entrance Animations', 'executive-acquisition' ),
        'section'  => 'ea_animations_section',
        'type'     => 'checkbox',
    ) );
}
add_action( 'customize_register', 'executive_acquisition_customize_register' );

/**
 * Enqueue Customizer Preview JS
 */
function ea_customize_preview_js() {
    wp_enqueue_script( 'ea-customizer-preview', get_template_directory_uri() . '/assets/js/customizer-preview.js', array( 'customize-preview', 'jquery' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'ea_customize_preview_js' );
