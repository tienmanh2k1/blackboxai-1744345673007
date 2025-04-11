<?php
/**
 * The header for our theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class('font-inter'); ?>>
<?php wp_body_open(); ?>

    <!-- Top Banner Slider -->
    <div class="bg-[#F0F0F5] text-center relative">
        <button class="absolute left-4 top-1/2 -translate-y-1/2 text-blue-900">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="absolute right-4 top-1/2 -translate-y-1/2 text-blue-900">
            <i class="fas fa-chevron-right"></i>
        </button>
        <div class="py-3">
            <a href="#" class="text-blue-900 hover:underline">
                <?php echo esc_html(get_theme_mod('top_banner_text', 'Nhiều sản phẩm Tennis/Pickleball đã trở lại | Mua Ngay')); ?>
            </a>
        </div>
    </div>

    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4">
            <!-- Main Navigation -->
            <div class="flex items-center justify-between h-20">
                <!-- Menu Button -->
                <button class="lg:hidden p-2" id="mobile-menu-button">
                    <i class="fas fa-bars text-2xl"></i>
                </button>

                <!-- Logo -->
                <a href="<?php echo esc_url(home_url('/')); ?>" class="flex-shrink-0">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        echo '<img src="' . esc_url(get_theme_mod('header_logo', get_template_directory_uri() . '/assets/images/asics-logo.svg')) . '" alt="' . get_bloginfo('name') . '" class="h-8">';
                    }
                    ?>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex space-x-8">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class'     => '',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'items_wrap'     => '%3$s',
                        'walker'         => new ASICS_VN_Nav_Walker(),
                    ));
                    ?>
                </nav>

                <!-- Search and Icons -->
                <div class="flex items-center space-x-6">
                    <!-- Search -->
                    <div class="hidden lg:block relative">
                        <?php get_search_form(); ?>
                    </div>

                    <!-- Mobile Search -->
                    <button class="lg:hidden">
                        <i class="fas fa-search text-xl"></i>
                    </button>

                    <!-- Wishlist -->
                    <?php if (class_exists('WooCommerce')): ?>
                    <a href="<?php echo esc_url(get_permalink(get_option('yith_wcwl_wishlist_page_id'))); ?>" class="relative">
                        <i class="far fa-heart text-xl"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">
                            <?php echo esc_html(yith_wcwl_count_products()); ?>
                        </span>
                    </a>

                    <!-- Cart -->
                    <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="relative">
                        <i class="fas fa-shopping-bag text-xl"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">
                            <?php echo esc_html(WC()->cart->get_cart_contents_count()); ?>
                        </span>
                    </a>
                    <?php endif; ?>

                    <!-- Account -->
                    <?php if (is_user_logged_in()): ?>
                    <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="p-2">
                        <i class="fas fa-user"></i>
                    </a>
                    <?php else: ?>
                    <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="p-2">
                        <i class="far fa-user"></i>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
        <div class="bg-white h-full w-4/5 max-w-sm transform -translate-x-full transition-transform duration-300">
            <div class="p-4 border-b flex justify-between items-center">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="flex-shrink-0">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        echo '<img src="' . esc_url(get_theme_mod('header_logo', get_template_directory_uri() . '/assets/images/asics-logo.svg')) . '" alt="' . get_bloginfo('name') . '" class="h-8">';
                    }
                    ?>
                </a>
                <button id="mobile-menu-close" class="p-2">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>
            <nav class="p-4">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'space-y-4',
                    'container'      => false,
                    'fallback_cb'    => false,
                    'walker'         => new ASICS_VN_Mobile_Nav_Walker(),
                ));
                ?>
            </nav>
        </div>
    </div>
