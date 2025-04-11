<?php
/**
 * Template part for displaying posts
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-12'); ?>>
    <header class="mb-6">
        <?php if (is_singular()): ?>
            <h1 class="text-3xl font-bold mb-4">
                <?php the_title(); ?>
            </h1>
        <?php else: ?>
            <h2 class="text-2xl font-bold mb-4">
                <a href="<?php the_permalink(); ?>" class="hover:text-blue-900 transition">
                    <?php the_title(); ?>
                </a>
            </h2>
        <?php endif; ?>

        <div class="text-gray-600 text-sm mb-4">
            <?php
            printf(
                '<span class="mr-4"><i class="far fa-calendar-alt mr-1"></i> %1$s</span>',
                get_the_date()
            );
            
            if (get_the_category_list()) {
                printf(
                    '<span class="mr-4"><i class="far fa-folder mr-1"></i> %1$s</span>',
                    get_the_category_list(', ')
                );
            }

            if (get_the_tag_list()) {
                printf(
                    '<span><i class="far fa-tags mr-1"></i> %1$s</span>',
                    get_the_tag_list('', ', ')
                );
            }
            ?>
        </div>
    </header>

    <?php if (has_post_thumbnail() && !is_singular()): ?>
        <div class="mb-6">
            <a href="<?php the_permalink(); ?>" class="block overflow-hidden rounded-lg">
                <?php
                the_post_thumbnail('large', array(
                    'class' => 'w-full h-auto hover:scale-105 transition duration-300'
                ));
                ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="prose max-w-none mb-6">
        <?php
        if (is_singular()) {
            the_content(
                sprintf(
                    wp_kses(
                        __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'asics-vn'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post(get_the_title())
                )
            );

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'asics-vn'),
                    'after'  => '</div>',
                )
            );
        } else {
            the_excerpt();
        }
        ?>
    </div>

    <?php if (!is_singular()): ?>
        <footer>
            <a href="<?php the_permalink(); ?>" class="inline-block bg-blue-900 text-white px-6 py-2 rounded-full hover:bg-blue-800 transition">
                <?php echo esc_html__('Đọc thêm', 'asics-vn'); ?>
            </a>
        </footer>
    <?php endif; ?>
</article>
