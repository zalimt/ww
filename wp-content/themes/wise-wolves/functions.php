<?php
/**
 * Wise Wolves Child Theme Functions
 * 
 * This file contains custom functions for the Wise Wolves child theme.
 * 
 * @package Wise_Wolves
 * @since 1.0.0
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue parent and child theme styles and fonts
 */
function wise_wolves_enqueue_styles() {
    // Get parent theme version
    $parent_theme = wp_get_theme( get_template() );
    $parent_version = $parent_theme->get( 'Version' );
    
    // Enqueue Poppins Google Font
    wp_enqueue_style(
        'wise-wolves-poppins-font',
        'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap',
        array(),
        null
    );
    
    // Enqueue parent theme stylesheet
    wp_enqueue_style(
        'twentytwentyfive-style',
        get_template_directory_uri() . '/style.css',
        array(),
        $parent_version
    );
    
    // Enqueue child theme stylesheet
    wp_enqueue_style(
        'wise-wolves-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'twentytwentyfive-style', 'wise-wolves-poppins-font' ),
        wp_get_theme()->get( 'Version' )
    );
}
add_action( 'wp_enqueue_scripts', 'wise_wolves_enqueue_styles' );

/**
 * ACF JSON Sync Configuration
 * Set up Advanced Custom Fields JSON synchronization for the child theme
 */

/**
 * Set ACF JSON save point to child theme
 * 
 * @param string $path The default save path
 * @return string The modified save path
 */
function wise_wolves_acf_json_save_point( $path ) {
    return get_stylesheet_directory() . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'wise_wolves_acf_json_save_point' );

/**
 * Set ACF JSON load points
 * Load from both child theme and parent theme directories
 * 
 * @param array $paths Array of paths to load JSON files from
 * @return array Modified paths array
 */
function wise_wolves_acf_json_load_point( $paths ) {
    // Remove original path
    unset( $paths[0] );
    
    // Add child theme path (higher priority)
    $paths[] = get_stylesheet_directory() . '/acf-json';
    
    // Add parent theme path as fallback
    $paths[] = get_template_directory() . '/acf-json';
    
    return $paths;
}
add_filter( 'acf/settings/load_json', 'wise_wolves_acf_json_load_point' );

/**
 * Theme Setup
 * Add theme supports and features
 */
function wise_wolves_theme_setup() {
    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
    
    // Add support for custom header
    add_theme_support( 'custom-header', array(
        'default-color' => 'ffffff',
        'default-text-color' => '000000',
        'width' => 1200,
        'height' => 300,
        'flex-height' => true,
        'flex-width' => true,
    ) );
    
    // Add support for custom background
    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff',
    ) );
}
add_action( 'after_setup_theme', 'wise_wolves_theme_setup' );

/**
 * Customizer additions
 * Add custom sections to the WordPress Customizer
 */
function wise_wolves_customize_register( $wp_customize ) {
    // Add a custom section for Wise Wolves settings
    $wp_customize->add_section( 'wise_wolves_settings', array(
        'title'    => __( 'Wise Wolves Settings', 'wise-wolves' ),
        'priority' => 30,
    ) );
    
    // Example: Add a custom color setting
    $wp_customize->add_setting( 'wise_wolves_accent_color', array(
        'default'           => '#007cba',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wise_wolves_accent_color', array(
        'label'    => __( 'Accent Color', 'wise-wolves' ),
        'section'  => 'wise_wolves_settings',
        'settings' => 'wise_wolves_accent_color',
    ) ) );
}
add_action( 'customize_register', 'wise_wolves_customize_register' );

/**
 * Add custom body classes
 * 
 * @param array $classes Existing body classes
 * @return array Modified body classes
 */
function wise_wolves_body_classes( $classes ) {
    $classes[] = 'wise-wolves-theme';
    return $classes;
}
add_filter( 'body_class', 'wise_wolves_body_classes' );

/**
 * Custom function to get theme version
 * Useful for cache busting and debugging
 */
function wise_wolves_get_version() {
    return wp_get_theme()->get( 'Version' );
}

/**
 * Add custom post types and taxonomies here if needed
 * Example:
 * 
 * function wise_wolves_register_post_types() {
 *     // Register custom post types
 * }
 * add_action( 'init', 'wise_wolves_register_post_types' );
 */

/**
 * Include additional files
 * Uncomment and modify as needed
 */
// require_once get_stylesheet_directory() . '/inc/custom-functions.php';
// require_once get_stylesheet_directory() . '/inc/customizer-extensions.php';
// require_once get_stylesheet_directory() . '/inc/admin-functions.php';
