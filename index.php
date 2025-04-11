<?php
/**
 * The main template file
 */

get_header();
?>

<main>
    <?php if (is_front_page()): ?>
        <!-- Hero Section -->
        <section class="bg-[#E8EDE7] py-12">
            <div class="container mx-auto px-4">
                <div class="flex flex-col lg:flex-row items-center gap-12">
                    <div class="lg:w-1/2">
                        <?php 
                        $hero_logo = get_theme_mod('hero_logo', get_template_directory_uri() . '/assets/images/runkeeper-logo.svg');
                        $hero_title = get_theme_mod('hero_title', 'Cùng nhau<br>chạy vì rừng xanh.');
                        $hero_description = get_theme_mod('hero_description', 'Bạn có thể góp phần vào chiến dịch trồng rừng của ASICS bằng cách hoàn thành một tracklog cự ly 5km, và ASICS sẽ trồng một cây.');
                        $hero_button_text = get_theme_mod('hero_button_text', 'Tham gia ngay');
                        $hero_button_url = get_theme_mod('hero_button_url', '#');
                        $hero_image = get_theme_mod('hero_image', get_template_directory_uri() . '/assets/images/hero.jpg');
                        ?>
                        <img src="<?php echo esc_url($hero_logo); ?>" 
                             alt="ASICS Runkeeper" 
                             class="h-12 mb-6">
                        <h1 class="text-4xl font-bold text-blue-900 mb-4">
                            <?php echo wp_kses_post($hero_title); ?>
                        </h1>
                        <p class="text-blue-900 mb-8">
                            <?php echo esc_html($hero_description); ?>
                        </p>
                        <a href="<?php echo esc_url($hero_button_url); ?>" 
                           class="inline-block bg-blue-900 text-white px-8 py-3 rounded-full hover:bg-blue-800 transition">
                            <?php echo esc_html($hero_button_text); ?>
                        </a>
                    </div>
                    <div class="lg:w-1/2">
                        <img src="<?php echo esc_url($hero_image); ?>" 
                             alt="<?php echo esc_attr__('Hero Image', 'asics-vn'); ?>" 
                             class="w-full rounded-lg shadow-lg">
                    </div>
                </div>
            </div>
        </section>

        <?php if (class_exists('WooCommerce')): ?>
        <!-- Categories Grid -->
        <section class="py-16">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl font-bold text-center mb-12"><?php echo esc_html__('Danh mục sản phẩm', 'asics-vn'); ?></h2>
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                    <?php
                    $product_categories = get_terms(array(
                        'taxonomy' => 'product_cat',
                        'hide_empty' => true,
                        'parent' => 0,
                        'number' => 4
                    ));

                    foreach ($product_categories as $category):
                        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                        $image = wp_get_attachment_url($thumbnail_id);
                    ?>
                    <a href="<?php echo esc_url(get_term_link($category)); ?>" class="group relative overflow-hidden rounded-lg">
                        <img src="<?php echo esc_url($image); ?>" 
                             alt="<?php echo esc_attr($category->name); ?>" 
                             class="w-full aspect-square object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                            <h3 class="text-white text-xl font-bold"><?php echo esc_html($category->name); ?></h3>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Featured Products -->
        <section class="bg-gray-50 py-16">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl font-bold text-center mb-12"><?php echo esc_html__('Sản phẩm nổi bật', 'asics-vn'); ?></h2>
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 4,
                        'meta_key' => 'total_sales',
                        'orderby' => 'meta_value_num',
                    );
                    $featured_products = new WP_Query($args);

                    if ($featured_products->have_posts()):
                        while ($featured_products->have_posts()): $featured_products->the_post();
                            global $product;
                    ?>
                    <div class="bg-white rounded-lg shadow-sm group">
                        <div class="relative">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('woocommerce_thumbnail', array('class' => 'w-full aspect-square object-cover rounded-t-lg group-hover:scale-105 transition duration-300')); ?>
                            <?php endif; ?>
                            <div class="absolute top-2 right-2 flex gap-2">
                                <?php if ($product->is_on_sale()): ?>
                                    <span class="bg-red-500 text-white px-2 py-1 text-xs rounded">
                                        <?php echo esc_html__('-20%', 'asics-vn'); ?>
                                    </span>
                                <?php endif; ?>
                                <?php if (class_exists('YITH_WCWL')): ?>
                                    <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-medium mb-2"><?php the_title(); ?></h3>
                            <div class="flex items-center gap-2">
                                <?php if ($product->is_on_sale()): ?>
                                    <span class="text-red-500 font-bold"><?php echo $product->get_sale_price(); ?>₫</span>
                                    <span class="text-gray-400 line-through text-sm"><?php echo $product->get_regular_price(); ?>₫</span>
                                <?php else: ?>
                                    <span class="font-bold"><?php echo $product->get_price(); ?>₫</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

    <?php else: ?>
        <div class="container mx-auto px-4 py-8">
            <?php
            if (have_posts()):
                while (have_posts()):
                    the_post();
                    get_template_part('template-parts/content', get_post_type());
                endwhile;
                the_posts_navigation();
            else:
                get_template_part('template-parts/content', 'none');
            endif;
            ?>
        </div>
    <?php endif; ?>
</main>

<?php
get_footer();
