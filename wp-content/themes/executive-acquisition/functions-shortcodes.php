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
