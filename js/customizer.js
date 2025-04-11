/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 */

(function($) {
    'use strict';

    // Top Banner Text
    wp.customize('top_banner_text', function(value) {
        value.bind(function(newval) {
            $('.bg-\\[\\#F0F0F5\\] a').text(newval);
        });
    });

    // Hero Title
    wp.customize('hero_title', function(value) {
        value.bind(function(newval) {
            $('.hero-title').html(newval);
        });
    });

    // Hero Description
    wp.customize('hero_description', function(value) {
        value.bind(function(newval) {
            $('.hero-description').text(newval);
        });
    });

    // Hero Button Text
    wp.customize('hero_button_text', function(value) {
        value.bind(function(newval) {
            $('.hero-button').text(newval);
        });
    });

    // Newsletter Title
    wp.customize('newsletter_title', function(value) {
        value.bind(function(newval) {
            $('.newsletter-title').text(newval);
        });
    });

    // Newsletter Description
    wp.customize('newsletter_description', function(value) {
        value.bind(function(newval) {
            $('.newsletter-description').text(newval);
        });
    });

    // Logo
    wp.customize('header_logo', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('.site-logo img').attr('src', newval);
            }
        });
    });

    // Hero Logo
    wp.customize('hero_logo', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('.hero-logo').attr('src', newval);
            }
        });
    });

    // Hero Image
    wp.customize('hero_image', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('.hero-image').attr('src', newval);
            }
        });
    });

    // Social Media Links
    wp.customize('social_facebook', function(value) {
        value.bind(function(newval) {
            $('.social-facebook').attr('href', newval);
        });
    });

    wp.customize('social_instagram', function(value) {
        value.bind(function(newval) {
            $('.social-instagram').attr('href', newval);
        });
    });

    wp.customize('social_youtube', function(value) {
        value.bind(function(newval) {
            $('.social-youtube').attr('href', newval);
        });
    });

})(jQuery);
