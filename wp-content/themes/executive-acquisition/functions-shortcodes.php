<?php
/**
 * Shortcodes for the Executive Acquisition theme
 */

// ROI Callout Shortcode
function ea_roi_callout_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'value' => '+100%',
        'label' => 'Result',
    ), $atts, 'roi_callout' );

    return '<div class="roi-shortcode" style="margin: 2rem 0; padding: 2rem; background: var(--light-bg); border-left: 5px solid var(--accent-color); display: inline-block;">
                <div style="font-size: 2.5rem; font-weight: 900; color: var(--primary-color); line-height: 1;">' . esc_html( $atts['value'] ) . '</div>
                <div style="font-size: 0.8rem; font-weight: 700; color: var(--accent-color); text-transform: uppercase; letter-spacing: 1px;">' . esc_html( $atts['label'] ) . '</div>
            </div>';
}
add_shortcode( 'roi_callout', 'ea_roi_callout_shortcode' );

// Executive Quote Shortcode
function ea_exec_quote_shortcode( $atts, $content = null ) {
    $atts = shortcode_atts( array(
        'author' => '',
    ), $atts, 'exec_quote' );

    return '<blockquote class="exec-quote" style="border: none; padding: 0; margin: 3rem 0; position: relative;">
                <div style="font-size: 4rem; color: var(--accent-color); position: absolute; top: -30px; left: -20px; opacity: 0.2; font-family: var(--font-heading);">“</div>
                <p style="font-size: 1.5rem; font-family: var(--font-heading); font-style: italic; color: var(--primary-color); position: relative; z-index: 1;">' . do_shortcode($content) . '</p>
                <cite style="display: block; margin-top: 15px; font-weight: 700; color: var(--accent-color); text-transform: uppercase; letter-spacing: 1px; font-style: normal;">— ' . esc_html( $atts['author'] ) . '</cite>
            </blockquote>';
}
add_shortcode( 'exec_quote', 'ea_exec_quote_shortcode' );

// CTA Button Shortcode
function ea_cta_button_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'text' => 'Access the Briefing',
        'url' => home_url('/#cta'),
    ), $atts, 'cta_button' );

    return '<div style="margin: 2.5rem 0; text-align: center;">
                <a href="' . esc_url( $atts['url'] ) . '" class="btn">' . esc_html( $atts['text'] ) . '</a>
            </div>';
}
add_shortcode( 'cta_button', 'ea_cta_button_shortcode' );

// Case Study Index Shortcode
function ea_case_study_index_shortcode() {
    $pages = get_posts( array(
        'post_type' => 'page',
        'meta_query' => array(
            array(
                'key' => '_wp_page_template',
                'value' => 'template-case-study.php'
            )
        )
    ) );

    $output = '<div class="grid-3">';
    foreach ( $pages as $page ) {
        $output .= '<article class="card">
                        <h3>' . esc_html($page->post_title) . '</h3>
                        <p>' . esc_html(wp_trim_words($page->post_excerpt, 20)) . '</p>
                        <a href="' . get_permalink($page->ID) . '" style="color: var(--accent-color); font-weight: 700;">View Full Proof →</a>
                    </article>';
    }
    $output .= '</div>';
    return $output;
}
add_shortcode( 'case_studies', 'ea_case_study_index_shortcode' );

// Board-Ready ROI Summary Shortcode
function ea_roi_summary_shortcode( $atts, $content = null ) {
    $atts = shortcode_atts( array(
        'title' => 'Executive ROI Summary',
        'revenue' => '',
        'efficiency' => ''
    ), $atts, 'roi_summary' );

    return '<div class="roi-summary-box" style="margin: 3rem 0; padding: 40px; background: var(--primary-color); color: #fff; border-radius: 4px; border-left: 10px solid var(--accent-color);">
                <h3 style="color: var(--accent-color); margin-bottom: 25px; font-size: 1.5rem;">' . esc_html($atts['title']) . '</h3>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 30px;">
                    <div>
                        <div style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; opacity: 0.7;">Impacted Revenue</div>
                        <div style="font-size: 2.5rem; font-weight: 900; color: #fff;">' . esc_html($atts['revenue']) . '</div>
                    </div>
                    <div>
                        <div style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; opacity: 0.7;">Efficiency Gain</div>
                        <div style="font-size: 2.5rem; font-weight: 900; color: #fff;">' . esc_html($atts['efficiency']) . '</div>
                    </div>
                </div>
                <div style="font-size: 1.1rem; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 25px;">' . do_shortcode($content) . '</div>
            </div>';
}
add_shortcode( 'roi_summary', 'ea_roi_summary_shortcode' );

// Logo Bar Shortcode
function ea_logo_bar_shortcode() {
    $text = get_theme_mod( 'ea_logo_bar_text', 'TRUSTED BY LEADERS AT:' );
    return '<div class="logo-bar" style="padding: 40px 0; text-align: center; border-bottom: 1px solid #eee;">
                <p style="font-size: 0.75rem; font-weight: 700; letter-spacing: 2px; color: var(--accent-color); margin-bottom: 25px;">' . esc_html($text) . '</p>
                <div class="logo-grid" style="display: flex; justify-content: center; gap: 60px; filter: grayscale(1); opacity: 0.6; align-items: center; flex-wrap: wrap; font-weight: 900; font-size: 1.2rem;">
                    <div>FORBES</div><div>INC.</div><div>HBR</div><div>FAST CO.</div><div>DELOITTE</div>
                </div>
            </div>';
}
add_shortcode( 'logo_bar', 'ea_logo_bar_shortcode' );
