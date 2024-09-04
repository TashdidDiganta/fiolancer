<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fio
 */
?>

<!doctype html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo( 'charset' );?>">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ): ?>
    <?php endif;?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head();?>
</head>

<body <?php body_class();?>>

    <?php wp_body_open();?>


    <?php
        $fio_preloader        = get_theme_mod( 'fio_preloader_switch', 'off' );
        $fio_oofcanvas       = get_theme_mod( 'fio_offcanvas_enable', 'off' );
        $fio_preloader_logo  = get_theme_mod( 'fio_preloader_logo', get_template_directory_uri() . '/assets/img/loader.png' );
        $fio_sidebar_logo  = get_theme_mod( 'fio_sidebar_logo', get_parent_theme_file_uri('assets/img/logo/logo-2.png') );
        $fio_backtotop = get_theme_mod( 'fio_backtotop', true );
    ?>

    <?php if($fio_preloader == 'on') :?>
       <!-- Preloader -->
        <div id="preloader">
            <div class="tg-folding-cube">
                <div class="tg-cube1 tg-cube"></div>
                <div class="tg-cube2 tg-cube"></div>
                <div class="tg-cube4 tg-cube"></div>
                <div class="tg-cube3 tg-cube"></div>
            </div>
        </div>
        <!-- Preloader -->

    <?php endif; ?>

    <?php if($fio_oofcanvas == 'on') :?>
    <?php
        $offcanvas_logo = get_theme_mod('fio_offcanvas_logo', get_template_directory_uri() . '/assets/img/logo/logo-2.png');
        $offcanvas_title = get_theme_mod('fio_offcanvas_title', 'About Us');
        $offcanvas_desc = get_theme_mod('fio_offcanvas_desc', '');
        $offcanvas_form_title = get_theme_mod('fio_offcanvas_form_title', '');
    ?>
    <!-- Start sidebar widget content -->
    <!-- <div class="xs-sidebar-group info-group info-sidebar">
        <div class="xs-overlay xs-bg-black"></div>
        <div class="xs-sidebar-widget">
            <div class="sidebar-widget-container">
                <div class="widget-heading">
                    <a href="#" class="close-side-widget">X</a>
                </div>
                <div class="sidebar-textwidget">
                    <div class="sidebar-info-contents">
                        <div class="content-inner">
                            <div class="logo">
                                <a href="<?php echo home_url(); ?>"><img src="<?php echo esc_url($offcanvas_logo); ?>" alt="<?php bloginfo('name'); ?>"></a>
                            </div>
                            <div class="content-box">
                                <h4><?php echo esc_html($offcanvas_title); ?></h4>
                                <p><?php echo wp_kses_post($offcanvas_desc); ?></p>
                            </div>
                            <div class="form-inner">
                                <h4><?php echo esc_html($offcanvas_form_title); ?></h4>
                                <?php echo do_shortcode(get_theme_mod('fio_offcanvas_form')); ?>
                                <div class="result"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- offCanvas-start -->
    <div class="offCanvas-wrap">
     <div class="offCanvas-toggle"><i class="fal fa-times"></i></div>
        <div class="offCanvas-body">
            <div class="offCanvas-logo">
                <a href="<?php echo home_url();?>"><img src="<?php echo esc_url($offcanvas_logo); ?>" alt="<?php bloginfo('name');?>"></a>
            </div>
            <div class="offCanvas-content">
                <h3 class="title"><?php echo esc_html($offcanvas_title); ?></h3>
                <p><?php echo wp_kses_post($offcanvas_desc); ?></p>
                <ul class="offCanvas-social list-wrap">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
            <div class="offCanvas-contact">
                <h4 class="number">+1 488 246 5357</h4>
                <h4 class="email">support@gmail.com</h4>
                <p>3828 Delmas Terrace, Culver City, <br> CA, United States</p>
            </div>
        </div>
    </div>
    <div class="offCanvas-overlay"></div>
    <!-- offCanvas-end -->
    <?php endif; ?>

    <?php if(!empty($fio_backtotop)) :?>
        <!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->
    <?php endif; ?>

    <!-- header start -->
    <?php do_action( 'fio_header_style' );?>
    <!-- header end -->
    
    <!-- wrapper-box start -->
    <?php do_action( 'fio_before_main_content' );?>
