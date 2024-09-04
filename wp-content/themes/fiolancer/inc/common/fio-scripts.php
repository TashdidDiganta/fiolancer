<?php

/**
 * fio_scripts description
 * @return [type] [description]
 */
function fio_scripts()
{

    /**
     * all css files
     */

    wp_enqueue_style('fio-fonts', fio_fonts_url(), array(), time());
    if (is_rtl()) {
        wp_enqueue_style('bootstrap-rtl', FIO_THEME_CSS_DIR . 'bootstrap-rtl.css', array());
    } else {
        wp_enqueue_style('bootstrap-min', FIO_THEME_CSS_DIR . 'bootstrap.min.css', array());
    }
    wp_enqueue_style('animate', FIO_THEME_CSS_DIR . 'animate.min.css', []);
    wp_enqueue_style('magnific-popup', FIO_THEME_CSS_DIR . 'magnific-popup.css', []);
    wp_enqueue_style('fontawesome', FIO_THEME_CSS_DIR . 'fontawesome-all.min.css', []);
    wp_enqueue_style('swiper-bundle', FIO_THEME_CSS_DIR . 'swiper-bundle.css', []);
    wp_enqueue_style('flaticon', FIO_THEME_CSS_DIR . 'flaticon.css', []);
    wp_enqueue_style('odometer', FIO_THEME_CSS_DIR . 'odometer.css"', []);
    wp_enqueue_style('jquery-ui', FIO_THEME_CSS_DIR . 'jquery-ui.css', []);
    wp_enqueue_style('slick', FIO_THEME_CSS_DIR . 'slick.css', []);
    wp_enqueue_style('default', FIO_THEME_CSS_DIR . 'default.css', []);
    wp_enqueue_style('style', FIO_THEME_CSS_DIR . 'style.css', []);
    wp_enqueue_style('spacing', FIO_THEME_CSS_DIR . 'responsive.css', []);

    // all js
    wp_enqueue_script('bootstrap.min', FIO_THEME_JS_DIR . 'bootstrap.min.js', ['jquery'], '', true);
    wp_enqueue_script('isotope', FIO_THEME_JS_DIR . 'isotope.pkgd.min.js', ['jquery'], '', true);
    wp_enqueue_script('imagesloaded', FIO_THEME_JS_DIR . 'imagesloaded.pkgd.min.js', ['jquery'], '', true);
    wp_enqueue_script('jquery-magnific', FIO_THEME_JS_DIR . 'jquery.magnific-popup.min.js', ['jquery'], '', true);
    wp_enqueue_script('jquery-odometer.', FIO_THEME_JS_DIR . 'jquery.odometer.min.js', ['jquery'], false, true);
    wp_enqueue_script('jquery-easypiechart', FIO_THEME_JS_DIR . 'jquery.easypiechart.min.js', ['jquery'], false, true);
    wp_enqueue_script('jquery-appear', FIO_THEME_JS_DIR . 'jquery.appear.js', ['jquery'], '', true);
    wp_enqueue_script('swiper-bundle', FIO_THEME_JS_DIR . 'swiper-bundle.js', ['jquery'], '', true);
    wp_enqueue_script('jquery-ui', FIO_THEME_JS_DIR . 'jquery-ui.min.js', ['jquery'], '', true);
    wp_enqueue_script('particles', FIO_THEME_JS_DIR . 'particles.min.js', ['jquery'], '', true);
    wp_enqueue_script('parallax', FIO_THEME_JS_DIR . 'parallax.min.js', ['jquery'], '', true);
    wp_enqueue_script('slick', FIO_THEME_JS_DIR . 'slick.min.js', ['jquery'], '', true);
    wp_enqueue_script('ajax', FIO_THEME_JS_DIR . 'ajax-form.js', ['jquery'], false, true);
    wp_enqueue_script('wow', FIO_THEME_JS_DIR . 'wow.min.js', ['imagesloaded'], false, true);
    wp_enqueue_script('main', FIO_THEME_JS_DIR . 'main.js', ['jquery'], false, true);


    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'fio_scripts');

/*
Register Fonts
 */
function fio_fonts_url()
{
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ('off' !== _x('on', 'Google font: on or off', 'fio')) {
        $font_url = 'https://fonts.googleapis.com/css2?' . urlencode('family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap&family=Prata&display=swap');
    }
    return $font_url;
}
