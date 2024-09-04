<?php 

/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fio
*/

use TPCore\Widgets\Fio_Navwalker_Class;

$fio_footer_logo  = get_theme_mod( 'footer_logo' );
$fio_footer_links = get_theme_mod( 'fio_footer_links' );
$fio_footer_description = get_theme_mod( 'fio_footer_description' );
$menu  = get_theme_mod( 'footer_navs' );
$whatsapp  = get_theme_mod( 'footer_whatsapp' );

// Default values for 'my_repeater_setting' theme mod.
$footer_socials_links = [
	[
		'link_text' => '<i class="fab fa-facebook-f"></i>',
		'link_url'  => 'https://facebook.com/',
	],
    [
		'link_text' => '<i class="fab fa-twitter"></i>',
		'link_url'  => 'https://twitter.com/',
	],
    [
		'link_text' => '<i class="fab fa-behance"></i>',
		'link_url'  => 'https://behance.com/',
	],
    [
		'link_text' => '<i class="fab fa-youtube"></i>',
		'link_url'  => 'https://youtube.com/',
	],
];

// Theme_mod settings to check.
$footer_socials = get_theme_mod( 'my_repeater_setting', $footer_socials_links );

// footer_columns
$footer_columns = 0;
$footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

for ( $num = 1; $num <= $footer_widgets; $num++ ) {
    if ( is_active_sidebar( 'footer-' . $num ) ) {
        $footer_columns++;
    }
}

switch ( $footer_columns ) {
case '1':
    $footer_class[1] = 'col-lg-12';
    break;
case '2':
    $footer_class[1] = 'col-lg-6 col-md-6';
    $footer_class[2] = 'col-lg-6 col-md-6';
    break;
case '3':
    $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
    $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
    $footer_class[3] = 'col-xl-4 col-lg-6';
    break;
case '4':
    $footer_class[1] = 'col-xl-3 col-lg-3 col-md-4 col-sm-6';
    $footer_class[2] = 'col-xl-3 col-lg-3 col-md-4 col-sm-6';
    $footer_class[3] = 'col-xl-3 col-lg-3 col-md-4 col-sm-6';
    $footer_class[4] = 'col-xl-3 col-lg-3 col-md-4 col-sm-6';
    break;
default:
    $footer_class = 'col-xl-3 col-lg-3 col-md-6';
    break;
}

?>

<!--Site Footer Start-->
<!-- <footer class="site-footer-five">
    <div class="container">
        <?php if( $fio_footer_logo ): ?>
        <div class="site-footer-five__top">
            <div class="site-footer-five__logo">
                <?php fio_footer_logo(); ?>
            </div>
            <?php if($fio_footer_description): ?>
            <p class="site-footer-five__text-1"><?php echo wp_kses_post($fio_footer_description); ?></p>
            <?php endif; ?>
            <?php if(!empty($footer_socials)): ?>
            <ul class="footer-widget-five__social-box list-unstyled">
                <?php foreach($footer_socials as $link): ?>
                <li>
                    <a href="<?php echo esc_url($link['link_url']); ?>"><?php echo wp_kses_post($link['link_text']); ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php if(is_active_sidebar('footer-1') OR is_active_sidebar('footer-2') OR is_active_sidebar('footer-3') OR is_active_sidebar('footer-4')): ?>
        <div class="footer-widget-five__menu-box row">
            <?php
                if ( $footer_columns < 5 ) {
                    print '<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">';
                    dynamic_sidebar( 'footer-1' );
                    print '</div>';

                    print '<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">';
                    dynamic_sidebar( 'footer-2' );
                    print '</div>';

                    print '<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">';
                    dynamic_sidebar( 'footer-3' );
                    print '</div>';

                    print '<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">';
                    dynamic_sidebar( 'footer-4' );
                    print '</div>';
                } else {
                    for ( $num = 1; $num <= $footer_columns; $num++ ) {
                        if ( !is_active_sidebar( 'footer-col-' . $num ) ) {
                            continue;
                        }
                        print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                        dynamic_sidebar( 'footer-col-' . $num );
                        print '</div>';
                    }
                }
            ?>
        </div>
        <?php endif; ?>
        <?php
        $args = [
            'echo'        => false,
            'menu'        => $menu,
            'menu_class'  => 'list-unstyled footer-widget-five__menu',
            'fallback_cb' => 'Fio_Navwalker_Class::fallback',
            'container'   => '',
            'walker'      => new Fio_Navwalker_Class,
        ];

        $menu_html = wp_nav_menu( $args );
        ?>
        <?php if(isset($menu) && isset($whatsapp)): ?>
        <div class="footer-widget-five__menu-box">
            <?php echo wp_kses_post($menu_html); ?>
            <p class="footer-widget-five__number"><?php esc_html_e('WhatsApp:', 'fio'); ?><a href="tel:<?php echo esc_url($whatsapp); ?>"><?php echo esc_html($whatsapp); ?></a></p>
        </div>
        <?php endif; ?>
        <div class="site-footer-five__bottom">
            <p class="site-footer-five__bottom-text"><?php print fio_copyright_text(); ?></p>
        </div>
    </div>
</footer> -->
<!--Site Footer End-->

<!-- Footer-start -->
<footer class="footer-area footer-style-three">
    <div class="footer-main-wrap footer-padding">
        <div class="container">
            <div class="footer-main-border">
                <div class="row">
                    <?php for( $num = 1; $num <= $footer_widgets; $num++) :?>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <?php dynamic_sidebar('footer-' . $num); ?>
                    </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 d-none d-xl-block">
                    <div class="copyright-menu-list">
                    <?php
                        $args = [
                            'echo'        => false,
                            'menu'        => $menu,
                            'menu_class'  => 'list-unstyled footer-widget-five__menu',
                            'fallback_cb' => 'Fio_Navwalker_Class::fallback',
                            'container'   => '',
                            'walker'      => new Fio_Navwalker_Class,
                        ];

                        $menu_html = wp_nav_menu( $args );
                        ?>
                        <ul class="list-wrap">
                            <?php echo wp_kses_post($menu_html); ?>       
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="copyright-text text-center text-md-start text-xl-center">
                        <?php echo get_theme_mod( 'fiolancer_cridets', '' ); ?>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="copyright-social-list">
                        <?php $social_links = get_theme_mod('fiola_footer_social', '');
                         if(!empty($social_links)) :
                        ?>
                        <ul class="list-wrap">
                            <?php foreach($social_links as $social) : ?>
                            <li>
                                <a href="<?php echo $social['link_url']; ?>"><?php echo $social['link_target']; ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- Footer-end -->
