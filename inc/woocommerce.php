<?php
/**
 * WooCommerce specific functions and customizations
 */

/**
 * WooCommerce setup function.
 */
function asics_vn_woocommerce_setup() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'asics_vn_woocommerce_setup');

/**
 * Disable the default WooCommerce stylesheet
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Add custom classes to products
 */
function asics_vn_woocommerce_product_classes($classes, $product) {
    $classes[] = 'bg-white rounded-lg shadow-sm group';
    return $classes;
}
add_filter('woocommerce_post_class', 'asics_vn_woocommerce_product_classes', 10, 2);

/**
 * Customize product loop item template
 */
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

add_action('woocommerce_before_shop_loop_item', function() {
    echo '<div class="relative">';
}, 5);

add_action('woocommerce_before_shop_loop_item_title', function() {
    global $product;
    echo '<div class="absolute top-2 right-2 flex gap-2">';
    if ($product->is_on_sale()) {
        echo '<span class="bg-red-500 text-white px-2 py-1 text-xs rounded">' . esc_html__('-20%', 'asics-vn') . '</span>';
    }
    if (class_exists('YITH_WCWL')) {
        echo do_shortcode('[yith_wcwl_add_to_wishlist]');
    }
    echo '</div>';
}, 15);

/**
 * Customize price display
 */
function asics_vn_woocommerce_price_html($price, $product) {
    if ($product->is_on_sale()) {
        $regular_price = wc_get_price_to_display($product, array('price' => $product->get_regular_price()));
        $sale_price = wc_get_price_to_display($product, array('price' => $product->get_sale_price()));
        
        return sprintf(
            '<span class="text-red-500 font-bold">%1$s₫</span> <span class="text-gray-400 line-through text-sm">%2$s₫</span>',
            number_format($sale_price, 0, ',', '.'),
            number_format($regular_price, 0, ',', '.')
        );
    }
    
    return sprintf(
        '<span class="font-bold">%1$s₫</span>',
        number_format(wc_get_price_to_display($product), 0, ',', '.')
    );
}
add_filter('woocommerce_get_price_html', 'asics_vn_woocommerce_price_html', 10, 2);

/**
 * Customize mini cart
 */
function asics_vn_woocommerce_mini_cart() {
    echo '<div class="p-4">';
    echo '<h3 class="text-lg font-bold mb-4">' . esc_html__('Giỏ hàng', 'asics-vn') . '</h3>';
    
    if (WC()->cart->is_empty()) {
        echo '<p class="text-gray-600">' . esc_html__('Chưa có sản phẩm trong giỏ hàng.', 'asics-vn') . '</p>';
    } else {
        echo '<div class="space-y-4 mb-4">';
        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
            if ($_product && $_product->exists() && $cart_item['quantity'] > 0) {
                echo '<div class="flex items-center gap-4">';
                echo '<div class="w-16 h-16">' . $_product->get_image() . '</div>';
                echo '<div class="flex-1">';
                echo '<h4 class="font-medium">' . $_product->get_name() . '</h4>';
                echo '<div class="text-sm text-gray-600">';
                echo sprintf(
                    '%s x %s',
                    $cart_item['quantity'],
                    WC()->cart->get_product_price($_product)
                );
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
        echo '</div>';
        
        echo '<div class="border-t pt-4">';
        echo '<div class="flex justify-between mb-4">';
        echo '<span>' . esc_html__('Tổng cộng:', 'asics-vn') . '</span>';
        echo '<span class="font-bold">' . WC()->cart->get_cart_total() . '</span>';
        echo '</div>';
        
        echo '<div class="flex gap-4">';
        echo '<a href="' . esc_url(wc_get_cart_url()) . '" class="flex-1 bg-gray-200 text-center py-2 rounded-full hover:bg-gray-300 transition">';
        echo esc_html__('Xem giỏ hàng', 'asics-vn');
        echo '</a>';
        echo '<a href="' . esc_url(wc_get_checkout_url()) . '" class="flex-1 bg-blue-900 text-white text-center py-2 rounded-full hover:bg-blue-800 transition">';
        echo esc_html__('Thanh toán', 'asics-vn');
        echo '</a>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
}
add_action('woocommerce_mini_cart', 'asics_vn_woocommerce_mini_cart');

/**
 * Add to cart button text
 */
function asics_vn_woocommerce_product_add_to_cart_text($text) {
    return __('Thêm vào giỏ', 'asics-vn');
}
add_filter('woocommerce_product_add_to_cart_text', 'asics_vn_woocommerce_product_add_to_cart_text');

/**
 * Customize checkout fields
 */
function asics_vn_woocommerce_checkout_fields($fields) {
    // Add placeholder text
    $fields['billing']['billing_first_name']['placeholder'] = __('Họ và tên lót', 'asics-vn');
    $fields['billing']['billing_last_name']['placeholder'] = __('Tên', 'asics-vn');
    $fields['billing']['billing_phone']['placeholder'] = __('Số điện thoại', 'asics-vn');
    $fields['billing']['billing_email']['placeholder'] = __('Email', 'asics-vn');
    $fields['billing']['billing_address_1']['placeholder'] = __('Địa chỉ', 'asics-vn');
    $fields['billing']['billing_city']['placeholder'] = __('Thành phố', 'asics-vn');
    
    return $fields;
}
add_filter('woocommerce_checkout_fields', 'asics_vn_woocommerce_checkout_fields');

/**
 * Add custom order statuses
 */
function asics_vn_woocommerce_register_order_statuses() {
    register_post_status('wc-preparing', array(
        'label' => __('Đang chuẩn bị', 'asics-vn'),
        'public' => true,
        'exclude_from_search' => false,
        'show_in_admin_all_list' => true,
        'show_in_admin_status_list' => true,
        'label_count' => _n_noop('Đang chuẩn bị <span class="count">(%s)</span>', 'Đang chuẩn bị <span class="count">(%s)</span>')
    ));
}
add_action('init', 'asics_vn_woocommerce_register_order_statuses');

function asics_vn_woocommerce_add_order_statuses($order_statuses) {
    $new_order_statuses = array();
    foreach ($order_statuses as $key => $status) {
        $new_order_statuses[$key] = $status;
        if ($key === 'wc-processing') {
            $new_order_statuses['wc-preparing'] = __('Đang chuẩn bị', 'asics-vn');
        }
    }
    return $new_order_statuses;
}
add_filter('wc_order_statuses', 'asics_vn_woocommerce_add_order_statuses');
