<?php
/**
 * ASICS Vietnam Theme Customizer
 */

function asics_vn_customize_register($wp_customize) {
    // Header Section
    $wp_customize->add_section('asics_vn_header', array(
        'title' => __('Header Settings', 'asics-vn'),
        'priority' => 30,
    ));

    // Logo Upload
    $wp_customize->add_setting('header_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_logo', array(
        'label' => __('Upload Logo', 'asics-vn'),
        'section' => 'asics_vn_header',
        'settings' => 'header_logo',
    )));

    // Top Banner Section
    $wp_customize->add_section('asics_vn_top_banner', array(
        'title' => __('Top Banner Settings', 'asics-vn'),
        'priority' => 35,
    ));

    $wp_customize->add_setting('top_banner_text', array(
        'default' => 'Nhiều sản phẩm Tennis/Pickleball đã trở lại | Mua Ngay',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('top_banner_text', array(
        'label' => __('Banner Text', 'asics-vn'),
        'section' => 'asics_vn_top_banner',
        'type' => 'text',
    ));

    // Hero Section
    $wp_customize->add_section('asics_vn_hero', array(
        'title' => __('Hero Section Settings', 'asics-vn'),
        'priority' => 40,
    ));

    // Hero Logo
    $wp_customize->add_setting('hero_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_logo', array(
        'label' => __('Hero Logo', 'asics-vn'),
        'section' => 'asics_vn_hero',
        'settings' => 'hero_logo',
    )));

    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Cùng nhau<br>chạy vì rừng xanh.',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'asics-vn'),
        'section' => 'asics_vn_hero',
        'type' => 'textarea',
    ));

    // Hero Description
    $wp_customize->add_setting('hero_description', array(
        'default' => 'Bạn có thể góp phần vào chiến dịch trồng rừng của ASICS bằng cách hoàn thành một tracklog cự ly 5km, và ASICS sẽ trồng một cây.',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_description', array(
        'label' => __('Hero Description', 'asics-vn'),
        'section' => 'asics_vn_hero',
        'type' => 'textarea',
    ));

    // Hero Button Text
    $wp_customize->add_setting('hero_button_text', array(
        'default' => 'Tham gia ngay',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_button_text', array(
        'label' => __('Button Text', 'asics-vn'),
        'section' => 'asics_vn_hero',
        'type' => 'text',
    ));

    // Hero Button URL
    $wp_customize->add_setting('hero_button_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('hero_button_url', array(
        'label' => __('Button URL', 'asics-vn'),
        'section' => 'asics_vn_hero',
        'type' => 'url',
    ));

    // Hero Image
    $wp_customize->add_setting('hero_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
        'label' => __('Hero Image', 'asics-vn'),
        'section' => 'asics_vn_hero',
        'settings' => 'hero_image',
    )));

    // Newsletter Section
    $wp_customize->add_section('asics_vn_newsletter', array(
        'title' => __('Newsletter Settings', 'asics-vn'),
        'priority' => 45,
    ));

    // Newsletter Title
    $wp_customize->add_setting('newsletter_title', array(
        'default' => 'Đăng ký nhận thông tin',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('newsletter_title', array(
        'label' => __('Newsletter Title', 'asics-vn'),
        'section' => 'asics_vn_newsletter',
        'type' => 'text',
    ));

    // Newsletter Description
    $wp_customize->add_setting('newsletter_description', array(
        'default' => 'Nhận thông tin về sản phẩm mới và ưu đãi đặc biệt.',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('newsletter_description', array(
        'label' => __('Newsletter Description', 'asics-vn'),
        'section' => 'asics_vn_newsletter',
        'type' => 'textarea',
    ));

    // Contact Form 7 ID
    $wp_customize->add_setting('newsletter_form_id', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('newsletter_form_id', array(
        'label' => __('Newsletter Form ID (Contact Form 7)', 'asics-vn'),
        'section' => 'asics_vn_newsletter',
        'type' => 'number',
    ));

    // Social Media Section
    $wp_customize->add_section('asics_vn_social', array(
        'title' => __('Social Media Settings', 'asics-vn'),
        'priority' => 50,
    ));

    // Facebook URL
    $wp_customize->add_setting('social_facebook', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_facebook', array(
        'label' => __('Facebook URL', 'asics-vn'),
        'section' => 'asics_vn_social',
        'type' => 'url',
    ));

    // Instagram URL
    $wp_customize->add_setting('social_instagram', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_instagram', array(
        'label' => __('Instagram URL', 'asics-vn'),
        'section' => 'asics_vn_social',
        'type' => 'url',
    ));

    // YouTube URL
    $wp_customize->add_setting('social_youtube', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_youtube', array(
        'label' => __('YouTube URL', 'asics-vn'),
        'section' => 'asics_vn_social',
        'type' => 'url',
    ));
}
add_action('customize_register', 'asics_vn_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function asics_vn_customize_preview_js() {
    wp_enqueue_script('asics-vn-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'asics_vn_customize_preview_js');
