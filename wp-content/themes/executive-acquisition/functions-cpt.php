<?php
/**
 * Custom Post Types for Executive Acquisition
 */

function ea_register_cpts() {
    // Case Studies
    register_post_type( 'case_study', array(
        'labels'      => array( 'name' => 'ROI Case Studies', 'singular_name' => 'Case Study' ),
        'public'      => true,
        'has_archive' => true,
        'menu_icon'   => 'dashicons-chart-line',
        'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'rewrite'     => array( 'slug' => 'results' ),
    ));

    // FAQs
    register_post_type( 'faq', array(
        'labels'      => array( 'name' => 'Executive FAQs', 'singular_name' => 'FAQ' ),
        'public'      => true,
        'has_archive' => false,
        'menu_icon'   => 'dashicons-editor-help',
        'supports'    => array( 'title', 'editor' ),
    ));

    // Testimonials
    register_post_type( 'testimonial', array(
        'labels'      => array( 'name' => 'Testimonials', 'singular_name' => 'Testimonial' ),
        'public'      => true,
        'has_archive' => false,
        'menu_icon'   => 'dashicons-testimonial',
        'supports'    => array( 'title', 'editor', 'thumbnail' ),
    ));

    // Resources
    register_post_type( 'resource', array(
        'labels'      => array( 'name' => 'Strategic Resources', 'singular_name' => 'Resource' ),
        'public'      => true,
        'has_archive' => false,
        'menu_icon'   => 'dashicons-media-document',
        'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    ));
}
add_action( 'init', 'ea_register_cpts' );
