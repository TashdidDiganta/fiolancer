<?php

/**
 * fio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fio
 */

if ( !function_exists( 'fio_setup' ) ):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function fio_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on fio, use a find and replace
         * to change 'fio' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'fio', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( [
            'main-menu' => esc_html__( 'Main Menu', 'fio' ),
            'category-menu' => esc_html__( 'Category Menu', 'fio' ),
            'footer-menu' => esc_html__( 'Footer Menu', 'fio' ),
            'mini-footer-menu' => esc_html__( ' Mini Footer Menu ', 'fio' ),
        ] );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ] );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'fio_custom_background_args', [
            'default-color' => 'ffffff',
            'default-image' => '',
        ] ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        //Enable custom header
        add_theme_support( 'custom-header' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', [
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ] );

        /**
         * Enable suporrt for Post Formats
         *
         * see: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', [
            'image',
            'audio',
            'video',
            'gallery',
            'quote',
        ] );

        // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );

        remove_theme_support( 'widgets-block-editor' );

        // Add support for woocommerce.
        add_theme_support('woocommerce');
        
        // Remove woocommerce defauly styles
        add_filter( 'woocommerce_enqueue_styles', '__return_false' );
        
        //add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
        // remove products lightbox
	    remove_theme_support( 'wc-product-gallery-zoom' );
	//remove_theme_support( 'wc-product-gallery-lightbox' );

        add_theme_support( 'woocommerce', array(
            'thumbnail_image_width' => 200,
            'gallery_thumbnail_image_width' => 200,
        ) );
        
    }
endif;
add_action( 'after_setup_theme', 'fio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fio_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'fio_content_width', 640 );
}
add_action( 'after_setup_theme', 'fio_content_width', 0 );



/**
 * Enqueue scripts and styles.
 */

define( 'FIO_THEME_DIR', get_template_directory() );
define( 'FIO_THEME_URI', get_template_directory_uri() );
define( 'FIO_THEME_CSS_DIR', FIO_THEME_URI . '/assets/css/' );
define( 'FIO_THEME_JS_DIR', FIO_THEME_URI . '/assets/js/' );
define( 'FIO_THEME_INC', FIO_THEME_DIR . '/inc/' );



// wp_body_open
if ( !function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/**
 * Implement the Custom Header feature.
 */
require FIO_THEME_INC . 'custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require FIO_THEME_INC . 'template-functions.php';

/**
 * Custom template helper function for this theme.
 */
require FIO_THEME_INC . 'template-helper.php';

/**
 * initialize kirki customizer class.
 */

if ( class_exists( 'Kirki' ) ) {
    include_once FIO_THEME_INC . 'kirki-customizer.php';
}
include_once FIO_THEME_INC . 'class-fio-kirki.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require FIO_THEME_INC . 'jetpack.php';
}


/**
 * include fio functions file
 */
require_once FIO_THEME_INC . 'class-navwalker.php';
require_once FIO_THEME_INC . 'class-category-walker.php';
require_once FIO_THEME_INC . 'class-viwes-script.php';
require_once FIO_THEME_INC . 'class-tgm-plugin-activation.php';
require_once FIO_THEME_INC . 'add_plugin.php';
require_once FIO_THEME_INC . '/common/fio-breadcrumb.php';
require_once FIO_THEME_INC . '/common/fio-scripts.php';
require_once FIO_THEME_INC . '/common/fio-widgets.php';


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function fio_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'fio_pingback_header' );



// fio_comment 
if ( !function_exists( 'fio_comment' ) ) {
    function fio_comment( $comment, $args, $depth ) {
        global $post;
        $GLOBAL['comment'] = $comment;
        extract( $args, EXTR_SKIP );
        $args['reply_text'] = '<span class="icon-reply"></span>Reply';
        $replayClass = 'comment-depth-' . esc_attr( $depth );
        ?>
            <li id="comment-<?php comment_ID();?>">
                <div class="comments-box nl-postbox-details-comment-box d-sm-flex align-items-start comment-one__single">
                    <div class="nl-postbox-details-comment-thumb comment-one__image comments-avatar">
                        <?php print get_avatar( $comment, 102, null, null, [ 'class' => [] ] );?>
                    </div>
                    <div class="nl-postbox-details-comment-content comment-one__content avatar-name mb-10">
                        <h6 class="comment-author-name name"><?php print get_comment_author_link();?> <span><?php comment_time( get_option( 'date_format' ) );?></span></h6>
                        <?php comment_text();?>
                        <?php comment_reply_link( array_merge( $args, [ 'depth' => $depth, 'max_depth' => $args['max_depth'] ] ) );?>
                    </div>
                </div>
            </li>
        <?php
    }
}

/**
 * shortcode supports for removing extra p, spance etc
 *
 */
add_filter( 'the_content', 'fio_shortcode_extra_content_remove' );
/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
function fio_shortcode_extra_content_remove( $content ) {

    $array = [
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']',
    ];
    return strtr( $content, $array );

}

// fio_search_filter_form
if ( !function_exists( 'fio_search_filter_form' ) ) {
    function fio_search_filter_form( $form ) {

        $form = sprintf(
                  '<div class="sidebar-search-form position-relative">
                    <form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
                      <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search your keyword..."/>
                      <button type="submit" id="searchsubmit"><i class="fas fa-search"></i></button>
	                </form>
                   </div>',

            esc_url( home_url( '/' ) ),
            esc_attr( get_search_query() ),
            esc_html__( 'Search', 'fio' )
        );

        return $form;
    }
    add_filter( 'get_search_form', 'fio_search_filter_form' );
}

add_action( 'admin_enqueue_scripts', 'fio_admin_custom_scripts' );

function fio_admin_custom_scripts() {
    wp_enqueue_media();
    wp_enqueue_style( 'customizer-style', get_template_directory_uri() . '/inc/css/customizer-style.css',array());
    wp_register_script( 'fio-admin-custom', get_template_directory_uri() . '/inc/js/admin_custom.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'fio-admin-custom' );
}



add_filter('intermediate_image_sizes_advanced','stop_thumbs');
function stop_thumbs($sizes){
      return array();
}

function allow_custom_font_uploads($mime_types) {
    $mime_types['woff'] = 'font/woff';
    $mime_types['woff2'] = 'font/woff2';
    return $mime_types;
}
add_filter('upload_mimes', 'allow_custom_font_uploads');


add_filter( 'tp_meta_boxes', 'fio_post_metabox' );
function fio_post_metabox( $meta_boxes ) {
    $meta_boxes[] = array(
        'metabox_id'       => 'post_gallery_meta',
        'title'    => esc_html__( 'Upload Gallery', 'textdomain' ),
        'post_type'=> 'post',
        'context'  => 'normal',
        'priority' => 'core',
        'fields'   => array(
            array(

                'label'    => esc_html__( 'Gallery img', '' ),
                'id'      => "gallery_fields",
                'type'    => 'gallery', 
            )
        ),
    );

    return $meta_boxes;
}





function add_meta_box_function(){
    add_meta_box("id", "prodact Dig", "callback_function", "product", "side","high");
}

function callback_function(){
    
}

add_action("add_meta_boxes", "add_meta_box_function");






