<?php
/**
 * Wise Wolves Child Theme Functions
 * 
 * This file contains custom functions for the Wise Wolves child theme.
 * Based on Astra parent theme.
 * 
 * @package Wise_Wolves
 * @since 1.0.0
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

use ScssPhp\ScssPhp\Compiler;

function wise_wolves_compile_scss() {
    $scss = new Compiler();
    $scss_file = get_stylesheet_directory() . '/style.scss';
    $css_file = get_stylesheet_directory() . '/style.css';

    if (file_exists($scss_file)) {
        $scss_content = file_get_contents($scss_file);
        $css_content = $scss->compileString($scss_content)->getCss();
        file_put_contents($css_file, $css_content);
    }
}

add_action('wp_enqueue_scripts', 'wise_wolves_compile_scss', 1);

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
        'astra-style',
        get_template_directory_uri() . '/style.css',
        array(),
        $parent_version
    );
    
    // Enqueue child theme stylesheet
    wp_enqueue_style(
        'wise-wolves-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'astra-style', 'wise-wolves-poppins-font' ),
        wp_get_theme()->get( 'Version' )
    );
    
    // Enqueue header JavaScript
    wp_enqueue_script(
        'wise-wolves-header-js',
        get_stylesheet_directory_uri() . '/js/header.js',
        array(),
        wp_get_theme()->get( 'Version' ),
        true
    );
    
    // Enqueue smooth scroll JavaScript
    wp_enqueue_script(
        'wise-wolves-smooth-scroll',
        get_stylesheet_directory_uri() . '/js/smooth-scroll.js',
        array(),
        wp_get_theme()->get( 'Version' ),
        true
    );

    // Enqueue news slider JavaScript
    wp_enqueue_script(
        'wise-wolves-news-slider',
        get_stylesheet_directory_uri() . '/js/news-slider.js',
        array(),
        wp_get_theme()->get( 'Version' ),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'wise_wolves_enqueue_styles', 5 ); // Lower priority so plugin styles can override

/**
 * Ensure WPCodeBox plugin styles have higher priority
 * This function makes sure plugin CSS can override theme CSS
 */
function wise_wolves_prioritize_plugin_styles() {
    // Increase priority for WPCodeBox styles if they exist
    global $wp_styles;
    if ( isset( $wp_styles->registered['wpcodebox-frontend'] ) ) {
        $wp_styles->registered['wpcodebox-frontend']->extra['after'] = array(
            '/* WPCodeBox styles have priority over theme styles */'
        );
    }
}
add_action( 'wp_enqueue_scripts', 'wise_wolves_prioritize_plugin_styles', 20 ); // Higher priority

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
    
    // Add Astra parent theme path as fallback
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
    
    // Register navigation menus
    register_nav_menus( array(
        'wise-wolves-primary' => esc_html__( 'Primary Navigation', 'wise-wolves' ),
        'wise-wolves-footer'  => esc_html__( 'Footer Navigation', 'wise-wolves' ),
    ) );
    
    // Add theme support for HTML5 markup
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
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
 * Fallback menu for header navigation
 * Shows a default menu when no menu is assigned
 */
function wise_wolves_fallback_menu() {
    echo '<ul class="wise-wolves-nav-menu">';
    echo '<li><a href="#about-us">' . esc_html__( 'About us', 'wise-wolves' ) . '</a></li>';
    echo '<li><a href="#news">' . esc_html__( 'News', 'wise-wolves' ) . '</a></li>';
    echo '<li><a href="#services">' . esc_html__( 'Our services', 'wise-wolves' ) . '</a></li>';
    echo '<li><a href="#career">' . esc_html__( 'Career', 'wise-wolves' ) . '</a></li>';
    echo '<li><a href="#contacts">' . esc_html__( 'Contacts', 'wise-wolves' ) . '</a></li>';
    echo '</ul>';
}

function wise_wolves_footer_fallback_menu() {
    echo '<ul class="footer-menu">';
    echo '<li><a href="#hero">Home Screen</a></li>';
    echo '<li><a href="#news">Insights & News</a></li>';
    echo '<li><a href="#about-us">About Us</a></li>';
    echo '<li><a href="#services">Our Services</a></li>';
    echo '<li><a href="#clients">Our clients & Partners</a></li>';
    echo '<li><a href="#partnership">Partnership Program</a></li>';
    echo '<li><a href="#career">Career & Corporate culture</a></li>';
    echo '<li><a href="#contacts">Contacts</a></li>';
    echo '</ul>';
}

/**
 * Add SVG support to WordPress
 * Allows uploading and displaying SVG files safely
 */

/**
 * Allow SVG uploads
 * 
 * @param array $mimes Array of allowed mime types
 * @return array Modified mime types array
 */
function wise_wolves_allow_svg_uploads( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'wise_wolves_allow_svg_uploads' );

/**
 * Fix SVG display in media library
 * 
 * @param array $response Response array for media items
 * @param WP_Post $attachment Attachment post object
 * @param array $meta Attachment metadata
 * @return array Modified response array
 */
function wise_wolves_fix_svg_thumbnails( $response, $attachment, $meta ) {
    if ( $response['mime'] === 'image/svg+xml' ) {
        $response['sizes'] = array(
            'full' => array(
                'url' => $response['url'],
                'width' => $response['width'],
                'height' => $response['height'],
                'orientation' => $response['orientation']
            )
        );
    }
    return $response;
}
add_filter( 'wp_prepare_attachment_for_js', 'wise_wolves_fix_svg_thumbnails', 10, 3 );

/**
 * Sanitize SVG uploads for security
 * 
 * @param array $file Uploaded file data
 * @return array Modified file data
 */
function wise_wolves_sanitize_svg_upload( $file ) {
    if ( $file['type'] === 'image/svg+xml' ) {
        // Basic SVG sanitization - remove potentially dangerous elements
        $svg_content = file_get_contents( $file['tmp_name'] );
        
        // Remove script tags and event handlers
        $svg_content = preg_replace( '/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/mi', '', $svg_content );
        $svg_content = preg_replace( '/on\w+\s*=\s*["\'][^"\']*["\']/i', '', $svg_content );
        
        // Remove external references
        $svg_content = preg_replace( '/xlink:href\s*=\s*["\'][^"\']*["\']/i', '', $svg_content );
        
        // Write sanitized content back
        file_put_contents( $file['tmp_name'], $svg_content );
    }
    return $file;
}
add_filter( 'wp_handle_upload_prefilter', 'wise_wolves_sanitize_svg_upload' );

/**
 * Add SVG support to customizer
 * 
 * @param array $mimes Array of allowed mime types
 * @return array Modified mime types array
 */
function wise_wolves_customizer_svg_support( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'wise_wolves_customizer_svg_support' );

/**
 * Include additional files
 * Uncomment and modify as needed
 */
// require_once get_stylesheet_directory() . '/inc/custom-functions.php';
// require_once get_stylesheet_directory() . '/inc/customizer-extensions.php';
// require_once get_stylesheet_directory() . '/inc/admin-functions.php';
