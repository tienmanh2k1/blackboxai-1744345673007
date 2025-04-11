<?php
/**
 * ASICS Vietnam Theme functions and definitions
 */

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

/**
 * Theme Setup
 */
function asics_vn_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Register Navigation Menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'asics-vn'),
        'footer-about' => esc_html__('Footer About Menu', 'asics-vn'),
        'footer-support' => esc_html__('Footer Support Menu', 'asics-vn'),
        'footer-legal' => esc_html__('Footer Legal Menu', 'asics-vn'),
    ));

    // WooCommerce support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'asics_vn_setup');

/**
 * Enqueue scripts and styles
 */
function asics_vn_scripts() {
    // Tailwind CSS
    wp_enqueue_script('tailwindcss', 'https://cdn.tailwindcss.com', array(), _S_VERSION);
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), null);
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', array(), '6.0.0-beta3');
    
    // Theme stylesheet
    wp_enqueue_style('asics-vn-style', get_stylesheet_uri(), array(), _S_VERSION);
    
    // Theme JavaScript
    wp_enqueue_script('asics-vn-script', get_template_directory_uri() . '/js/global.js', array('jquery'), _S_VERSION, true);

    // Localize script
    wp_localize_script('asics-vn-script', 'asicsVNData', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('asics_vn_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'asics_vn_scripts');

/**
 * Register widget areas
 */
function asics_vn_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Footer About', 'asics-vn'),
        'id'            => 'footer-about',
        'description'   => esc_html__('Add widgets here.', 'asics-vn'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="font-bold mb-4">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Support', 'asics-vn'),
        'id'            => 'footer-support',
        'description'   => esc_html__('Add widgets here.', 'asics-vn'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="font-bold mb-4">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Legal', 'asics-vn'),
        'id'            => 'footer-legal',
        'description'   => esc_html__('Add widgets here.', 'asics-vn'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="font-bold mb-4">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'asics_vn_widgets_init');

/**
 * Custom template tags
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * WooCommerce specific functions
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Customizer additions
 */
require get_template_directory() . '/inc/customizer.php';
