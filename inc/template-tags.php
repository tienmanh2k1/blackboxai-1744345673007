<?php
/**
 * Custom template tags for this theme
 */

if (!function_exists('asics_vn_posted_on')):
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function asics_vn_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date(DATE_W3C)),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date(DATE_W3C)),
            esc_html(get_the_modified_date())
        );

        echo '<span class="posted-on">' . $time_string . '</span>';
    }
endif;

if (!function_exists('asics_vn_posted_by')):
    /**
     * Prints HTML with meta information for the current author.
     */
    function asics_vn_posted_by() {
        $byline = sprintf(
            /* translators: %s: post author. */
            esc_html_x('by %s', 'post author', 'asics-vn'),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<span class="byline"> ' . $byline . '</span>';
    }
endif;

if (!function_exists('asics_vn_entry_footer')):
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function asics_vn_entry_footer() {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(', ', 'asics-vn'));
            if ($categories_list) {
                printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'asics-vn') . '</span>', $categories_list);
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'asics-vn'));
            if ($tags_list) {
                printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'asics-vn') . '</span>', $tags_list);
            }
        }

        if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span class="comments-link">';
            comments_popup_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: post title */
                        __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'asics-vn'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post(get_the_title())
                )
            );
            echo '</span>';
        }

        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Edit <span class="screen-reader-text">%s</span>', 'asics-vn'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post(get_the_title())
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
endif;

if (!function_exists('asics_vn_post_thumbnail')):
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function asics_vn_post_thumbnail() {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()):
            ?>
            <div class="post-thumbnail mb-8">
                <?php the_post_thumbnail('full', array('class' => 'rounded-lg w-full h-auto')); ?>
            </div>
        <?php else: ?>
            <a class="post-thumbnail block mb-6" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php
                the_post_thumbnail(
                    'post-thumbnail',
                    array(
                        'class' => 'rounded-lg w-full h-auto',
                        'alt' => the_title_attribute(array('echo' => false)),
                    )
                );
                ?>
            </a>
        <?php
        endif;
    }
endif;

if (!function_exists('asics_vn_custom_excerpt_length')):
    /**
     * Filter the excerpt length.
     */
    function asics_vn_custom_excerpt_length($length) {
        return 20;
    }
endif;
add_filter('excerpt_length', 'asics_vn_custom_excerpt_length', 999);

if (!function_exists('asics_vn_custom_excerpt_more')):
    /**
     * Filter the excerpt "read more" string.
     */
    function asics_vn_custom_excerpt_more($more) {
        return '...';
    }
endif;
add_filter('excerpt_more', 'asics_vn_custom_excerpt_more');

/**
 * Custom navigation menu walker for primary menu
 */
class ASICS_VN_Nav_Walker extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $output .= '<a href="' . esc_url($item->url) . '" class="text-gray-700 hover:text-black">';
        $output .= esc_html($item->title);
        $output .= '</a>';
    }
}

/**
 * Custom navigation menu walker for mobile menu
 */
class ASICS_VN_Mobile_Nav_Walker extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $output .= '<li><a href="' . esc_url($item->url) . '" class="block py-2 text-lg">';
        $output .= esc_html($item->title);
        $output .= '</a></li>';
    }
}
