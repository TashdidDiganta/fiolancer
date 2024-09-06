<?php
/**
 * Breadcrumbs for fio theme.
 *
 * @package     fio
 * @author      themedox
 * @copyright   Copyright (c) 2023, themedox
 * @link        https://www.wphix.com
 * @since       fio 1.0.0
 */

function fio_breadcrumb_func() {
    global $post;  
    $breadcrumb_class = '';
    $breadcrumb_show = 1;

    if ( is_front_page() && is_home() ) {

        $title = get_theme_mod('breadcrumb_blog_title', __('News & Insights','fio'));
        $breadcrumb_class = 'home_front_page';
    }
    elseif ( is_front_page() ) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog & Insights','fio'));
        $breadcrumb_show = 0;
    }
    elseif ( is_home() ) {
        if ( get_option( 'page_for_posts' ) ) {
            $title = get_the_title( get_option( 'page_for_posts') );
        }
    }
    elseif ( is_single() && 'post' == get_post_type() ) {
      $title = substr(get_the_title(),0,30);
    }
    elseif ( is_single() && 'services' == get_post_type() ) {
        $title = substr(get_the_title(),0,30);
    }
    elseif ( is_single() && 'portfolio' == get_post_type() ) {
        $title = substr(get_the_title(),0,30);
    }
    elseif ( is_search() ) {
        $title = esc_html__( 'Search Results for : ', 'fio' ) . get_search_query();
    } 
    elseif ( is_404() ) {
        $title = esc_html__( 'Page not Found', 'fio' );
        $breadcrumb_show = 0;
    } 
    elseif ( is_archive() ) {
        $title = get_the_archive_title();
    } 
    else {
        $title = get_the_title();
    }
 

    $_id = get_the_ID();

    if ( is_single() && 'product' == get_post_type() ) { 
        $_id = $post->ID;
    }
    elseif ( is_home() && get_option( 'page_for_posts' ) ) {
        $_id = get_option( 'page_for_posts' );
    }

    $is_breadcrumb = function_exists('get_field')? get_field('is_it_invisible_breadcrumb', $_id) : 'on';

    $con1 = $breadcrumb_show == 1;
    
    if (  $con1 && !$is_breadcrumb) {
        $bg_img_from_page = function_exists('get_field')? get_field('breadcrumb_background_image') : '';
        $hide_bg_img = function_exists('get_field')? get_field('hide_breadcrumb_background_image') : 'on';

        // get_theme_mod
        $bg_img = get_theme_mod( 'breadcrumb_image' );

        if ( $hide_bg_img == 'off' ) {
            $bg_main_img = '';
        }else{  
            $bg_main_img = !empty( $bg_img_from_page ) ? $bg_img_from_page['url'] : $bg_img;
        }   
    ?>

    <!-- breadcrumb-area -->
        <section class="breadcrumb-area gray-bg">
            <div class="container">
                <div class="breadcrumb-wrap">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content">
                                <span class="sub-title" ><?php echo get_theme_mod('breadcrumb_sub_title', 'fio'); ?></span>
                                <h2 class="title"> <?php echo fio_kses( $title ); ?>....</h2>
                            </div>
                        </div>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'fio'); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?php  
                                    if(is_single() && get_post_type() == 'post'){
                                        _e('Blog Details', 'fio');
                                    } else{
                                        _e('Blog', 'fio');
                                    }
                                ?>
                            </li>
                        </ol>
                    </nav>
                    <div class="breadcrumb-shape" data-background="<?php print esc_attr($bg_main_img);?>"></div>
                </div>
            </div>
        </section>
    <!-- breadcrumb-area-end -->

<?php
    }
}

add_action( 'fio_before_main_content', 'fio_breadcrumb_func' );

