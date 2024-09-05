<?php 

	/**
	 * Template part for displaying header layout one
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package fio
	*/
   // topbar settings
   $fio_fb_link    = get_theme_mod( 'fio_fb_link', __( 'info@fio.com', 'fio' ) );
   $fio_fb_text    = get_theme_mod( 'fio_fb_text', __( '7500k Followers ', 'fio' ) );

   // main header settings
   $fio_header_search      = get_theme_mod( 'fio_header_search', false );
   $fio_header_hamburger   = get_theme_mod( 'fio_header_hamburger', false );
   $header_right_switch      = get_theme_mod( 'header_right_switch', false );
   $sticky_header            = get_theme_mod( 'sticky_header', 'off' );
   $fio_menu_col           = $header_right_switch ? 'col-xl-5 d-none d-xl-block' : 'col-xl-10 col-lg-7 col-md-7 col-sm-8 col-6 d-none d-xl-block';
   $fio_menu_align         = $header_right_switch ? '' : 'justify-content-end';
?>
<!-- <header class="main-header-six">
    <nav class="main-menu main-menu-six">
        <div class="main-menu-six__wrapper">
            <div class="container">
                <div class="main-menu-six__wrapper-inner">
                    <div class="main-menu-six__logo">
                        <?php fio_header_logo(); ?>
                    </div>
                    <div class="main-menu-six__main-menu-box">
                        <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                        <?php fio_header_menu();?>
                    </div>
                    <?php if($header_right_switch): ?>
                    <div class="main-menu-six__right">
                        <?php
                            $header_socials = get_theme_mod('header_socials', '');
                            $cv_link = get_theme_mod('download_cv', '');
                            if(!empty($header_socials)):
                        ?>
                        <div class="main-menu-six__social">
                            <?php foreach($header_socials as $social): ?>
                            <a href="<?php echo esc_url($social['link_url']); ?>"><?php echo esc_html($social['link_text']); ?></a>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        <div class="main-menu-six__btn">
                            <a href="<?php echo esc_url($cv_link); ?>" download><?php esc_html_e('Download CV', 'fio'); ?> <span></span> </a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</header> -->



<!-- header-area -->
<header>
    <div class="header-top-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-4 d-none d-md-block">
                    <div class="header-top-left-menu">
                        <ul class="list-wrap">
                            <li><a href="about-us.html">How It Works</a></li>
                            <li><a href="faq.html">Faq</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="header-top-right">
                        <ul class="list-wrap">
                            <?php if(!is_user_logged_in()) : ?>
                            <li><i class="fas fa-user"></i><a href="login-signup.html">Login/Signup</a></li>
                            <?php endif; ?>
                            <li><a href="login-signup.html">Dashboard</a></li>
                        </ul>
                        <div class="header-lang">
                            <span class="selected-lang">English</span>
                            <ul class="list-wrap lang-list">
                                <li><a href="#">Arabic</a></li>
                                <li><a href="#">Spanish</a></li>
                                <li><a href="#">Chinese</a></li>
                                <li><a href="#">Turkish</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="header-top-fixed"></div>
    <div id="sticky-header" class="menu-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile-nav-toggler">
                        <i class="flaticon-dots-menu"></i>
                    </div>
                    <div class="menu-wrap">
                        <nav class="menu-nav">
                            <div class="logo">
                               <?php fio_header_logo(); ?>
                            </div>
                            <div class="header-category">
                                <?php
                                //  $custom_text = get_field('category_name');
                                //  $valuess = get_field("name");
                               
                                 ?>
                                <a href="#" class="category-text"><i class="flaticon-dots-menu"></i>Category</a>
                                 <?php fio_category_menu() ?>
                            </div>
                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                <?php fio_header_menu();?>
                            </div>
                            <div class="header-search-form">
                                <a href="#" class="header-search-icon d-block d-xl-none"><i class="far fa-search"></i></a>

                                <form action="#">
                                    <input name="s" value="<?php echo get_search_query(); ?>" type="text" placeholder="Search talent...">
                                    <button type="submit" ><i class="far fa-search"></i></button>
                                </form>
                            </div>
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="mobile-menu">
                        <nav class="menu-box">
                            <div class="close-btn"><i class="far fa-times"></i></div>
                            <div class="nav-logo">
                                <?php fio_header_logo(); ?>
                            </div>
                            <div class="menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <?php  $social_links = get_theme_mod('fiola_footer_social',''); ?>

                                <ul class="clearfix list-wrap">
                                <?php foreach($social_links as $social) : ?>
                                    <li><a href="<?php echo $social['link_url']; ?>"><?php echo $social['link_target']; ?></a></li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="menu-backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-area-end -->
<?php if($sticky_header == 'on'): ?>
<div class="stricky-header stricked-menu main-menu main-menu-six">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->
<?php endif; ?>