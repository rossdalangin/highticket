<?php
/**
 * Executive Acquisition Shortcodes
 */

// ROI Callout
function ea_roi_callout_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'title' => 'Projected Impact',
        'value' => '+300% ROI',
    ), $atts );

    return '<div class="roi-callout card text-center mb-lg">
                <span class="section-tag mb-xxs">' . esc_html( $atts['title'] ) . '</span>
                <div class="roi-value impact-value">' . esc_html( $atts['value'] ) . '</div>
            </div>';
}
add_shortcode( 'roi_callout', 'ea_roi_callout_shortcode' );

// CTA Button
function ea_cta_button_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'text' => 'Access the Briefing',
        'link' => '#cta',
        'class' => '',
    ), $atts );

    return '<a href="' . esc_url( $atts['link'] ) . '" class="btn ' . esc_attr( $atts['class'] ) . '">' . esc_html( $atts['text'] ) . '</a>';
}
add_shortcode( 'cta_button', 'ea_cta_button_shortcode' );

// Logo Bar Shortcode (Dynamic)
function ea_logo_bar_shortcode() {
    ob_start();
    ?>
    <div class="logo-grid logo-grid-shortcode">
        <?php for ($i = 1; $i <= 5; $i++) :
            $logo = get_theme_mod("ea_logo_{$i}");
            if ($logo) echo '<img src="'.esc_url($logo).'" class="logo-item-shortcode">';
        endfor; ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'logo_bar', 'ea_logo_bar_shortcode' );

// Executive Quote
function ea_exec_quote_shortcode( $atts, $content = null ) {
    return '<blockquote class="exec-quote">
                <div class="quote-mark">“</div>
                <div class="quote-text">' . do_shortcode($content) . '</div>
            </blockquote>';
}
add_shortcode( 'exec_quote', 'ea_exec_quote_shortcode' );

// Resource Grid (Dynamic)
function ea_resource_grid_shortcode() {
    $assets = get_posts(array('post_type' => 'post', 'category_name' => 'resources', 'posts_per_page' => 6));
    if (!$assets) return '';

    $output = '<div class="grid-3">';
    foreach ($assets as $asset) {
        $output .= '<article class="card archive-card">
                        <h3 class="mb-sm">' . get_the_title($asset->ID) . '</h3>
                        <p class="mb-md opacity-80">' . wp_trim_words($asset->post_excerpt, 15) . '</p>
                        <a href="' . get_permalink($asset->ID) . '" class="archive-read-more">Access Asset →</a>
                    </article>';
    }
    $output .= '</div>';
    return $output;
}
add_shortcode( 'resource_grid', 'ea_resource_grid_shortcode' );
