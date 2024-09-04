<?php 

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fio_widgets_init() {

    $footer_style_2_switch = get_theme_mod( 'footer_style_2_switch', true );
    $footer_style_3_switch = get_theme_mod( 'footer_style_3_switch', true );
    $footer_style_4_switch = get_theme_mod( 'footer_style_4_switch', true );
    $footer_style_5_switch = get_theme_mod( 'footer_style_5_switch', true );
    $footer_style_6_switch = get_theme_mod( 'footer_style_6_switch', true );

    include_once(get_parent_theme_file_path() . '/inc/custom-widgets/class-category-widget.php');
    include_once(get_parent_theme_file_path() . '/inc/custom-widgets/class-socials-widget.php');
    include_once(get_parent_theme_file_path() . '/inc/custom-widgets/class-insta-widget.php');
    include_once(get_parent_theme_file_path() . '/inc/custom-widgets/class-populer-post-widget.php');

    register_widget('Custom_Categories_Widget');
    register_widget('Custom_Social_Widget');
    register_widget('Custom_Insta_Widget');
    register_widget('Custom_Populer_Post_Widget');

    /**
     * blog sidebar
     */
    register_sidebar( [
        'name'          => esc_html__( 'Blog Sidebar', 'fio' ),
        'id'            => 'blog-sidebar',
        'description'   => esc_html__( 'Set Your Blog Widget', 'fio' ),
        'before_widget' => '<div id="%1$s" class="nl-sidebar-widget mb-35 %2$s widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="nl-sidebar-widget-title news-page__sidebar-title tg-sidebar-title">',
        'after_title'   => '</h3>',
    ] );


    $footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

    // footer default
    for ( $num = 1; $num <= $footer_widgets; $num++ ) {
        register_sidebar( [
            'name'          => sprintf( esc_html__( 'Footer %1$s', 'fio' ), $num ),
            'id'            => 'footer-' . $num,
            'description'   => sprintf( esc_html__( 'Footer column %1$s', 'fio' ), $num ),
            'before_widget' => '<div id="%1$s" class="nl-footer-widget mb-50 footer-widget footer-col-'.$num.' %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="nl-footer-widget-title fw-title">',
            'after_title'   => '</h4>',
        ] );
    }

}
add_action( 'widgets_init', 'fio_widgets_init' );




