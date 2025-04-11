<?php
/**
 * The template for displaying the footer
 */
?>

    <!-- Newsletter -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-2xl font-bold mb-4"><?php echo esc_html(get_theme_mod('newsletter_title', 'Đăng ký nhận thông tin')); ?></h2>
                <p class="text-gray-600 mb-8"><?php echo esc_html(get_theme_mod('newsletter_description', 'Nhận thông tin về sản phẩm mới và ưu đãi đặc biệt.')); ?></p>
                <?php 
                if (shortcode_exists('contact-form-7')) {
                    echo do_shortcode('[contact-form-7 id="' . get_theme_mod('newsletter_form_id') . '" title="Newsletter Form"]');
                } else {
                ?>
                <form class="flex gap-4 max-w-md mx-auto" method="post">
                    <input type="email" 
                           placeholder="<?php echo esc_attr__('Nhập email của bạn', 'asics-vn'); ?>" 
                           class="flex-1 px-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-blue-900">
                    <button type="submit" class="bg-blue-900 text-white px-8 py-2 rounded-full hover:bg-blue-800 transition">
                        <?php echo esc_html__('Đăng ký', 'asics-vn'); ?>
                    </button>
                </form>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- About ASICS -->
                <div>
                    <?php if (is_active_sidebar('footer-about')): ?>
                        <?php dynamic_sidebar('footer-about'); ?>
                    <?php else: ?>
                        <h3 class="font-bold mb-4"><?php echo esc_html__('Về ASICS', 'asics-vn'); ?></h3>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-about',
                            'menu_class'     => 'space-y-2',
                            'container'      => false,
                            'fallback_cb'    => false,
                            'depth'          => 1,
                        ));
                        ?>
                    <?php endif; ?>
                </div>

                <!-- Support -->
                <div>
                    <?php if (is_active_sidebar('footer-support')): ?>
                        <?php dynamic_sidebar('footer-support'); ?>
                    <?php else: ?>
                        <h3 class="font-bold mb-4"><?php echo esc_html__('Hỗ trợ', 'asics-vn'); ?></h3>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-support',
                            'menu_class'     => 'space-y-2',
                            'container'      => false,
                            'fallback_cb'    => false,
                            'depth'          => 1,
                        ));
                        ?>
                    <?php endif; ?>
                </div>

                <!-- Legal -->
                <div>
                    <?php if (is_active_sidebar('footer-legal')): ?>
                        <?php dynamic_sidebar('footer-legal'); ?>
                    <?php else: ?>
                        <h3 class="font-bold mb-4"><?php echo esc_html__('Pháp lý', 'asics-vn'); ?></h3>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-legal',
                            'menu_class'     => 'space-y-2',
                            'container'      => false,
                            'fallback_cb'    => false,
                            'depth'          => 1,
                        ));
                        ?>
                    <?php endif; ?>
                </div>

                <!-- Connect -->
                <div>
                    <h3 class="font-bold mb-4"><?php echo esc_html__('Kết nối', 'asics-vn'); ?></h3>
                    <div class="flex space-x-4">
                        <?php
                        $social_links = array(
                            'facebook' => get_theme_mod('social_facebook'),
                            'instagram' => get_theme_mod('social_instagram'),
                            'youtube' => get_theme_mod('social_youtube'),
                        );
                        foreach ($social_links as $platform => $url) {
                            if ($url) {
                                echo '<a href="' . esc_url($url) . '" class="hover:text-gray-300" target="_blank" rel="noopener noreferrer">';
                                echo '<i class="fab fa-' . esc_attr($platform) . '"></i>';
                                echo '</a>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-800 mt-12 pt-8 text-sm text-gray-400">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php echo esc_html__('Bảo lưu mọi quyền.', 'asics-vn'); ?></p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
