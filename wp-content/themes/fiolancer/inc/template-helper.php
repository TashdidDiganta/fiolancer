<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package fio
 */


function fio_check_header() {
    $nl_header_tabs = function_exists('get_field')? get_field('header') : false;
    $nl_header_style_meta = function_exists('get_field')? get_field('fio_header_style') : '';
    $elementor_header_template_meta = function_exists('get_field')? get_field('elementor_header_style') : false;


    $fio_header_option_switch = get_theme_mod('fio_header_elementor_switch', false);
    $header_default_style_kirki = get_theme_mod( 'header_layout_custom', 'header_1' );
    $elementor_header_templates_kirki = get_theme_mod( 'fio_header_templates' );
    
    if($nl_header_tabs == 'default'){
        if($fio_header_option_switch){
            if($elementor_header_templates_kirki){
                echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_header_templates_kirki);
            }
        }else{ 
            get_template_part( 'template-parts/header/header-1' );
        }
    }elseif($nl_header_tabs == 'elementor'){
        if($elementor_header_template_meta){
            echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_header_template_meta);
        }else{
            echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_header_templates_kirki);
        }
    }else{
        if($fio_header_option_switch){

            if($elementor_header_templates_kirki){
                echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_header_templates_kirki);
            }else{
                get_template_part( 'template-parts/header/header-1' );
            }
        }else{
            get_template_part( 'template-parts/header/header-1' );
        }
        
    }

}
add_action( 'fio_header_style', 'fio_check_header', 10 );


/* fio offcanvas */

function fio_check_offcanvas() {
    $fio_offcanvas_style = function_exists( 'get_field' ) ? get_field( 'fio_offcanvas_style' ) : NULL;
    $fio_default_offcanvas_style = get_theme_mod( 'choose_default_offcanvas', 'offcanvas-style-1' );

    if ( $fio_offcanvas_style == 'offcanvas-style-1' ) {
        get_template_part( 'template-parts/offcanvas/offcanvas-1' );

    }
    elseif($fio_offcanvas_style == 'offcanvas-style-2' ){
        get_template_part( 'template-parts/offcanvas/offcanvas-2' );
    }

    
    else{
        if ( $fio_default_offcanvas_style == 'offcanvas-style-2' ) {
            get_template_part( 'template-parts/offcanvas/offcanvas-2' );
        } 

        else {
            get_template_part( 'template-parts/offcanvas/offcanvas-1' );
        }
    }
}

add_action( 'fio_offcanvas_style', 'fio_check_offcanvas', 10 );




/**
 * [fio_header_lang description]
 * @return [type] [description]
 */
function fio_header_lang_defualt() {
   ?>

    <div class="nl-header-top-menu-item nl-header-lang">
        <span class="nl-header-lang-toggle" id="nl-header-lang-toggle"><?php print esc_html__( 'English', 'fio' );?></span>
        <?php do_action( 'fio_language' );?>
    </div>
<?php
}

/**
 * [fio_language_list description]
 * @return [type] [description]
 */
function _fio_language( $mar ) {
    return $mar;
}
function fio_language_list() {

    $mar = '';
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    if ( !empty( $languages ) ) {
        $mar = '<ul class="">';
        foreach ( $languages as $lan ) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<ul class="">';
        $mar .= '<li><a href="#">' . esc_html__( 'English', 'fio' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'Spanish', 'fio' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'French', 'fio' ) . '</a></li>';
        $mar .= ' </ul>';
    }
    print _fio_language( $mar );
}
add_action( 'fio_language', 'fio_language_list' );





/**
 * [fio_offcanvas_language description]
 * @return [type] [description]
 */


 /**
 * [fio_header_lang description]
 * @return [type] [description]
 */
function fio_offcanvas_lang_defualt() {
    ?>
  
     <div class="offcanvas__select language">
         <div class="offcanvas__lang d-flex align-items-center justify-content-md-end">
             <div class="offcanvas__lang-img mr-15">
                 <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/language-flag.png" alt="<?php echo esc_attr__('language', 'fio'); ?>">
             </div>
 
             <div class="offcanvas__lang-wrapper">
                 <span class="offcanvas__lang-selected-lang nl-lang-toggle" id="nl-offcanvas-lang-toggle"><?php echo esc_html__('English', 'fio'); ?></span> 
                 <?php do_action( 'fio_offcanvas_language' );?>
             </div>
         </div>
     </div>
 <?php
 }
function _fio_offcanvas_language( $mar ) {
    return $mar;
}
function fio_offcanvas_language_list() {

    $mar = '';
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    if ( !empty( $languages ) ) {
        $mar = '<ul class="offcanvas__lang-list nl-lang-list">';
        foreach ( $languages as $lan ) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<ul class="offcanvas__lang-list nl-lang-list">';
        $mar .= '<li><a href="#">' . esc_html__( 'English', 'fio' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'Spanish', 'fio' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'French', 'fio' ) . '</a></li>';
        $mar .= ' </ul>';
    }
    print _fio_language( $mar );
}
add_action( 'fio_offcanvas_language', 'fio_offcanvas_language_list' );



/**
 * [fio_language_list description]
 * @return [type] [description]
 */
function _fio_footer_language( $mar ) {
    return $mar;
}
function fio_footer_language_list() {
    $mar = '';
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    if ( !empty( $languages ) ) {
        $mar = '<ul class="footer__lang-list nl-lang-list-2">';
        foreach ( $languages as $lan ) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<ul class="footer__lang-list nl-lang-list-2">';
        $mar .= '<li><a href="#">' . esc_html__( 'English', 'fio' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'Spanish', 'fio' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'French', 'fio' ) . '</a></li>';
        $mar .= ' </ul>';
    }
    print _fio_footer_language( $mar );
}
add_action( 'fio_footer_language', 'fio_footer_language_list' );



// header logo
function fio_header_logo() { ?>
        <?php
            $fio_logo_on = function_exists('get_field')? get_field('fio_en_secondary_logo') : NULL;
            $fio_logo = get_template_directory_uri() . '/assets/img/logo/logo.png';
            $fio_logo_white = get_template_directory_uri() . '/assets/img/logo/logo.png';

            $fio_site_logo_width = get_theme_mod( 'fio_logo_width', '135');

            $fio_site_logo = get_theme_mod( 'header_logo', $fio_logo );
            $fio_secondary_logo = get_theme_mod( 'header_secondary_logo', $fio_logo_white );
        ?>
    
        <?php if ( $fio_logo_on == 'on' ) : ?>
        <a class="secondary-logo" href="<?php print esc_url( home_url( '/' ) );?>">
            <img data-width="<?php echo esc_attr($fio_site_logo_width); ?>" height="auto" src="<?php print esc_url( $fio_secondary_logo );?>" alt="<?php print esc_attr__( 'logo', 'fio' );?>" />
        </a>
        <?php else : ?>
        <a class="standard-logo" href="<?php print esc_url( home_url( '/' ) );?>">
            <img data-width="<?php echo esc_attr($fio_site_logo_width); ?>" height="auto" src="<?php print esc_url( $fio_site_logo );?>" alt="<?php print esc_attr__( 'logo', 'fio' );?>" />
        </a>
        <?php endif; ?>
<?php
}

// header logo
function fio_header_double_logo() { ?>
    <?php
        $fio_logo = get_template_directory_uri() . '/assets/img/logo/logo.svg';
        $fio_logo_white = get_template_directory_uri() . '/assets/img/logo/logo-white.svg';

        $fio_site_logo_width = get_theme_mod( 'fio_logo_width', '135');

        $fio_site_logo = get_theme_mod( 'header_logo', $fio_logo );
        $fio_logo_white = get_theme_mod( 'header_secondary_logo', $fio_logo_white );

        ?>
    
        <a href="<?php print esc_url( home_url( '/' ) );?>">
            <img data-width="<?php echo esc_attr($fio_site_logo_width); ?>" height="auto" class="logo-light" src="<?php print esc_url( $fio_logo_white ); ?>" alt="<?php print esc_attr__( 'logo', 'fio' );?>">
            <img data-width="<?php echo esc_attr($fio_site_logo_width); ?>" height="auto" class="logo-dark" src="<?php print esc_url( $fio_site_logo );?>" alt="<?php print esc_attr__( 'logo', 'fio' );?>">
        </a>
<?php
}


// fio_footer_logo
function fio_footer_logo() { ?>
      <?php
        $fio_foooter_logo = function_exists( 'get_field' ) ? get_field( 'fio_footer_logo' ) : NULL;

        $fio_logo = get_template_directory_uri() . '/assets/img/logo/logo-2.png';

        $fio_footer_logo_default = get_theme_mod( 'fio_footer_logo', $fio_logo );
        $fio_site_logo_width = get_theme_mod( 'fio_logo_width', '120');
      ?>

      <?php if ( !empty( $fio_foooter_logo ) ) : ?>
         <a href="<?php print esc_url( home_url( '/' ) );?>">
             <img data-width="<?php echo esc_attr($fio_site_logo_width); ?>" height="auto" src="<?php print esc_url( $fio_foooter_logo );?>" alt="<?php print esc_attr__( 'logo', 'fio' );?>" />
         </a>
      <?php else : ?>
         <a href="<?php print esc_url( home_url( '/' ) );?>">
             <img data-width="<?php echo esc_attr($fio_site_logo_width); ?>" height="auto" src="<?php print esc_url( $fio_footer_logo_default );?>" alt="<?php print esc_attr__( 'logo', 'fio' );?>" />
         </a>
      <?php endif; ?>
   <?php
}


// header logo
function fio_header_sticky_logo() {?>
    <?php
        $fio_sticky_logo = function_exists( 'get_field' ) ? get_field( 'fio_sticky_logo' ) : NULL;
        $fio_logo = get_theme_mod( 'fio_sticky_logo', get_template_directory_uri() . '/assets/img/logo/logo-black-solid.svg' );
        $fio_secondary_logo = get_theme_mod( 'seconday_logo',  get_template_directory_uri() . '/assets/img/logo/logo.svg');
        $fio_site_logo_width = get_theme_mod( 'fio_logo_width', '120');
    ?>
        <?php if ( !empty( $fio_sticky_logo ) ) : ?>
        <a href="<?php print esc_url( home_url( '/' ) );?>">
            <img data-width="<?php echo esc_attr($fio_site_logo_width); ?>" height="auto" class="logo-dark" src="<?php print esc_url( $fio_sticky_logo );?>" alt="logo">
        </a>
        <?php else : ?>
            <a href="<?php print esc_url( home_url( '/' ) );?>">
            <img data-width="<?php echo esc_attr($fio_site_logo_width); ?>" height="auto" class="logo-dark" src="<?php print esc_url( $fio_logo );?>" alt="logo">
            <img data-width="<?php echo esc_attr($fio_site_logo_width); ?>" height="auto" class="logo-light" src="<?php print esc_url( $fio_secondary_logo );?>" alt="logo">
        </a>
        <?php endif; ?>
    <?php
}

function fio_mobile_logo() {
    // side info
    $fio_mobile_logo_hide = get_theme_mod( 'fio_mobile_logo_hide', false );

    $fio_site_logo = get_theme_mod( 'logo', get_template_directory_uri() . '/assets/img/logo/logo.png' );

    ?>

    <?php if ( !empty( $fio_mobile_logo_hide ) ): ?>
    <div class="side__logo mb-25">
        <a class="sideinfo-logo" href="<?php print esc_url( home_url( '/' ) );?>">
            <img src="<?php print esc_url( $fio_site_logo );?>" alt="<?php print esc_attr__( 'logo', 'fio' );?>" />
        </a>
    </div>
    <?php endif;?>



<?php }

/**
 * [fio_header_social_profiles description]
 * @return [type] [description]
 */
function fio_header_social_profiles() {
    $fio_topbar_fb_url = get_theme_mod( 'fio_topbar_fb_url', __( '#', 'fio' ) );
    $fio_topbar_twitter_url = get_theme_mod( 'fio_topbar_twitter_url', __( '#', 'fio' ) );
    $fio_topbar_instagram_url = get_theme_mod( 'fio_topbar_instagram_url', __( '#', 'fio' ) );
    $fio_topbar_linkedin_url = get_theme_mod( 'fio_topbar_linkedin_url', __( '#', 'fio' ) );
    $fio_topbar_youtube_url = get_theme_mod( 'fio_topbar_youtube_url', __( '#', 'fio' ) );
    ?>
        <ul>
        <?php if ( !empty( $fio_topbar_fb_url ) ): ?>
          <li><a href="<?php print esc_url( $fio_topbar_fb_url );?>"><span><i class="fab fa-facebook-f"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $fio_topbar_twitter_url ) ): ?>
            <li><a href="<?php print esc_url( $fio_topbar_twitter_url );?>"><span><i class="fab fa-twitter"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $fio_topbar_instagram_url ) ): ?>
            <li><a href="<?php print esc_url( $fio_topbar_instagram_url );?>"><span><i class="fab fa-instagram"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $fio_topbar_linkedin_url ) ): ?>
            <li><a href="<?php print esc_url( $fio_topbar_linkedin_url );?>"><span><i class="fab fa-linkedin"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $fio_topbar_youtube_url ) ): ?>
            <li><a href="<?php print esc_url( $fio_topbar_youtube_url );?>"><span><i class="fab fa-youtube"></i></span></a></li>
        <?php endif;?>
        </ul>

<?php
}

/**
 * [fio_offcanvas_social_profiles description]
 * @return [type] [description]
 */
function fio_offcanvas_social_profiles() {

    $fio_offcanvas_fb_url = get_theme_mod( 'fio_offcanvas_fb_url', __( '#', 'fio' ) );
    $fio_offcanvas_twitter_url = get_theme_mod( 'fio_offcanvas_twitter_url', __( '#', 'fio' ) );
    $fio_offcanvas_instagram_url = get_theme_mod( 'fio_offcanvas_instagram_url', __( '#', 'fio' ) );
    $fio_offcanvas_linkedin_url = get_theme_mod( 'fio_offcanvas_linkedin_url', __( '#', 'fio' ) );
    $fio_offcanvas_youtube_url = get_theme_mod( 'fio_offcanvas_youtube_url', __( '#', 'fio' ) );
    ?>
        <?php if ( !empty( $fio_offcanvas_fb_url ) ): ?>
            <a href="<?php print esc_url( $fio_offcanvas_fb_url );?>"><span><i class="fab fa-facebook-f"></i></span></a>
        <?php endif;?>

        <?php if ( !empty( $fio_offcanvas_twitter_url ) ): ?>
            <a href="<?php print esc_url( $fio_offcanvas_twitter_url );?>"><span><i class="fab fa-twitter"></i></span></a>
        <?php endif;?>

        <?php if ( !empty( $fio_offcanvas_instagram_url ) ): ?>
            <a href="<?php print esc_url( $fio_offcanvas_instagram_url );?>"><span><i class="fab fa-instagram"></i></span></a>
        <?php endif;?>

        <?php if ( !empty( $fio_offcanvas_linkedin_url ) ): ?>
            <a href="<?php print esc_url( $fio_offcanvas_linkedin_url );?>"><span><i class="fab fa-linkedin"></i></span></a>
        <?php endif;?>

        <?php if ( !empty( $fio_offcanvas_youtube_url ) ): ?>
            <a href="<?php print esc_url( $fio_offcanvas_youtube_url );?>"><span><i class="fab fa-youtube"></i></span></a>
        <?php endif;?>
<?php
}

function fio_footer_social_profiles() {
    $fio_footer_fb_url = get_theme_mod( 'fio_footer_fb_url', __( '#', 'fio' ) );
    $fio_footer_twitter_url = get_theme_mod( 'fio_footer_twitter_url', __( '#', 'fio' ) );
    $fio_footer_instagram_url = get_theme_mod( 'fio_footer_instagram_url', __( '#', 'fio' ) );
    $fio_footer_linkedin_url = get_theme_mod( 'fio_footer_linkedin_url', __( '#', 'fio' ) );
    $fio_footer_youtube_url = get_theme_mod( 'fio_footer_youtube_url', __( '#', 'fio' ) );
    ?>

        <?php if ( !empty( $fio_footer_fb_url ) ): ?>
            <a href="<?php print esc_url( $fio_footer_fb_url );?>">
                <i class="fab fa-facebook-f"></i>
            </a>
        <?php endif;?>

        <?php if ( !empty( $fio_footer_twitter_url ) ): ?>
            <a href="<?php print esc_url( $fio_footer_twitter_url );?>">
                <i class="fab fa-twitter"></i>
            </a>
        <?php endif;?>

        <?php if ( !empty( $fio_footer_instagram_url ) ): ?>
            <a href="<?php print esc_url( $fio_footer_instagram_url );?>">
                <i class="fab fa-instagram"></i>
            </a>
        <?php endif;?>

        <?php if ( !empty( $fio_footer_linkedin_url ) ): ?>
            <a href="<?php print esc_url( $fio_footer_linkedin_url );?>">
                <i class="fab fa-linkedin"></i>
            </a>
        <?php endif;?>

        <?php if ( !empty( $fio_footer_youtube_url ) ): ?>
            <a href="<?php print esc_url( $fio_footer_youtube_url );?>">
                <i class="fab fa-youtube"></i>
            </a>
        <?php endif;?>
<?php
}


/**
 * [fio_header_menu description]
 * @return [type] [description]
 */
function fio_header_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => 'navigation',
            'container'      => '',
            'fallback_cb'    => 'Fio_Navwalker_Class::fallback',
            'walker'         => new \TPCore\Widgets\Fio_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [fio_category_menu description]
 * @return [type] [description]
 */
function fio_category_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'category-menu', 
            'menu_class'     => 'list-wrap',
            'container'      => '',
            'fallback_cb'    => 'Fio_Category_Navwalker_Class::fallback',
            'walker'         => new \TPCore\Widgets\Fio_Category_walker_Class,
        ] );
    ?>
    <?php
}

/**
 * [fio_grocery_menu description]
 * @return [type] [description]
 */
function fio_grocery_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'grocery-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'Fio_Navwalker_Class::fallback',
            'walker'         => new \TPCore\Widgets\Fio_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [fio_search_menu description]
 * @return [type] [description]
 */
function fio_header_search_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'header-search-menu ',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'Fio_Navwalker_Class::fallback',
            'walker'         => new \TPCore\Widgets\Fio_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [fio_footer_menu description]
 * @return [type] [description]
 */
function fio_footer_menu() {
    wp_nav_menu( [
        'theme_location' => 'footer-menu',
        'menu_class'     => 'm-0 footer-list-inline-3',
        'container'      => '',
        'fallback_cb'    => 'Fio_Navwalker_Class::fallback',
        'walker'         => new \TPCore\Widgets\Fio_Navwalker_Class,
    ] );
}

/**
 * [fio_offcanvas_default_menu description]
 * @return [type] [description]
 */
function fio_offcanvas_default_menu() {
    wp_nav_menu( [
        'theme_location' => 'offcanvas-menu',
        'menu_class'     => '',
        'container'      => '',
        'fallback_cb'    => 'Fio_Navwalker_Class::fallback',
        'walker'         => new \TPCore\Widgets\Fio_Navwalker_Class,
    ] );
}

/**
 *
 * fio footer
 */
add_action( 'fio_footer_style', 'fio_check_footer', 10 );

function fio_check_footer() {
    $page_footer = function_exists('get_field')? get_field('footer') : false;
    $page_elementor_footer_style = function_exists('get_field')? get_field('element_footer_styles') : false;
    $fio_footer_option_switch = get_theme_mod('fio_footer_elementor_switch', false);
    $elementor_footer_templates_kirki = get_theme_mod( 'fio_footer_templates' );
    
    if($page_footer == 'default'){
        if($fio_footer_option_switch){
            if($elementor_footer_templates_kirki){
                echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_footer_templates_kirki);
            }
        }else{ 
            get_template_part( 'template-parts/footer/footer-1' );
        }
    }elseif($page_footer == 'elementor'){
        if($page_elementor_footer_style){
            echo \Elementor\Plugin::$instance->frontend->get_builder_content($page_elementor_footer_style);
        }else{
            echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_footer_templates_kirki);
        }
    }else{
        if($elementor_footer_templates_kirki){
            echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_footer_templates_kirki);
        }else{
            get_template_part( 'template-parts/footer/footer-1' );
        }
    }

}

// fio_copyright_text
function fio_copyright_text() {
   print get_theme_mod( 'fio_copyright', wp_kses_post( 'Copyright & Design By <a href="#">@FioDesign</a> - 2023' ) );
}

/**
 *
 * pagination
 */
if ( !function_exists( 'fio_pagination' ) ) {

    function _fio_pagi_callback( $pagination ) {
        return $pagination;
    }

    //page navegation
    function fio_pagination( $prev, $next, $pages, $args ) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ( $pages == '' ) {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if ( !$pages ) {
                $pages = 1;
            }

        }

        $pagination = [
            'base'      => add_query_arg( 'paged', '%#%' ),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
            'before_page_number'    => '0'
        ];

        //rewrite permalinks
        if ( $wp_rewrite->using_permalinks() ) {
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
        }

        if ( !empty( $wp_query->query_vars['s'] ) ) {
            $pagination['add_args'] = ['s' => get_query_var( 's' )];

            
        }     

        $pagi = '';
        if ( paginate_links( $pagination ) != '' ) {
            $paginations = paginate_links( $pagination );
            $pagi .= '<ul class="'.$args['class'].'">';
            foreach ( $paginations as $key => $pg ) {
                if(strpos($pg, 'current') !== false){
                    $pagi .= '<li><a href="#" class="active">' . $pg . '</a></li>';
                }elseif(strpos($pg, 'dots') !== false){
                    $pagi .= '<li><a href="#">---</a></li>';
                }else{
                    $pagi .= '<li>'.$pg.'</li>';
                }
            }
            $pagi .= '</ul>';
        }

        print _fio_pagi_callback( $pagi );
    }
}

function fio_paginate_links_dots( $args ) {
    // Replace '...' with your custom dots HTML.
    $args['dots'] = '<a href="#">---</a>';
    return $args;
}

add_filter('wp_link_pages_args', 'fio_paginate_links_dots');


// header top bg color
function fio_breadcrumb_bg_color() {
    $color_code = get_theme_mod( 'fio_breadcrumb_bg_color', '#e1e1e1' );
    wp_enqueue_style( 'fio-custom', FIO_THEME_CSS_DIR . 'fio-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: " . $color_code . "}";

        wp_add_inline_style( 'fio-breadcrumb-bg', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'fio_breadcrumb_bg_color' );

// breadcrumb-spacing top
function fio_breadcrumb_spacing() {
    $padding_px = get_theme_mod( 'fio_breadcrumb_spacing', '160px' );
    wp_enqueue_style( 'fio-custom', FIO_THEME_CSS_DIR . 'fio-custom.css', [] );
    if ( $padding_px != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: " . $padding_px . "}";

        wp_add_inline_style( 'fio-breadcrumb-top-spacing', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'fio_breadcrumb_spacing' );

// breadcrumb-spacing bottom
function fio_breadcrumb_bottom_spacing() {
    $padding_px = get_theme_mod( 'fio_breadcrumb_bottom_spacing', '160px' );
    wp_enqueue_style( 'fio-custom', FIO_THEME_CSS_DIR . 'fio-custom.css', [] );
    if ( $padding_px != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-bottom: " . $padding_px . "}";

        wp_add_inline_style( 'fio-breadcrumb-bottom-spacing', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'fio_breadcrumb_bottom_spacing' );

// scrollup
function fio_scrollup_switch() {
    $scrollup_switch = get_theme_mod( 'fio_scrollup_switch', false );
    wp_enqueue_style( 'fio-custom', FIO_THEME_CSS_DIR . 'fio-custom.css', [] );
    if ( $scrollup_switch ) {
        $custom_css = '';
        $custom_css .= "#scrollUp{ display: none !important;}";

        wp_add_inline_style( 'fio-scrollup-switch', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'fio_scrollup_switch' );

// theme color
function fio_custom_color() {
    $color_code = get_theme_mod( 'fio_color_option', '#F50963' );
    wp_enqueue_style( 'fio-custom', FIO_THEME_CSS_DIR . 'fio-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= "html:root { --nl-theme-1 : " . $color_code . "}";

        wp_add_inline_style( 'fio-custom', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'fio_custom_color' );


// theme color secondary
function fio_custom_color_secondary() {
    $color_code = get_theme_mod( 'fio_color_option_2', '#008080' );
    wp_enqueue_style( 'fio-custom', FIO_THEME_CSS_DIR . 'fio-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= "html:root { --nl-theme-2 : " . $color_code . "}";

        wp_add_inline_style( 'fio-custom', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'fio_custom_color_secondary' );

// scroll to top color
function fio_custom_color_scrollup() {
    $color_code = get_theme_mod( 'fio_color_scrollup', '#03041C' );
    wp_enqueue_style( 'fio-custom', FIO_THEME_CSS_DIR . 'fio-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= "html .back-to-top-btn { background-color: " . $color_code . "}";
        wp_add_inline_style( 'fio-custom', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'fio_custom_color_scrollup' );

/**
 * Move the textarea field to the bottom
 */
function fio_move_comment_field( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'fio_move_comment_field' );

// fio_kses_intermediate
function fio_kses_intermediate( $string = '' ) {
    return wp_kses( $string, fio_get_allowed_html_tags( 'intermediate' ) );
}

function fio_get_allowed_html_tags( $level = 'basic' ) {
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}



// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function fio_kses($raw){

   $allowed_tags = array(
      'a'                         => array(
         'class'   => array(),
         'href'    => array(),
         'rel'  => array(),
         'title'   => array(),
         'target' => array(),
      ),
      'abbr'                      => array(
         'title' => array(),
      ),
      'b'                         => array(),
      'blockquote'                => array(
         'cite' => array(),
      ),
      'cite'                      => array(
         'title' => array(),
      ),
      'code'                      => array(),
      'del'                    => array(
         'datetime'   => array(),
         'title'      => array(),
      ),
      'dd'                     => array(),
      'div'                    => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'dl'                     => array(),
      'dt'                     => array(),
      'em'                     => array(),
      'h1'                     => array(),
      'h2'                     => array(),
      'h3'                     => array(),
      'h4'                     => array(),
      'h5'                     => array(),
      'h6'                     => array(),
      'i'                         => array(
         'class' => array(),
      ),
      'img'                    => array(
         'alt'  => array(),
         'class'   => array(),
         'height' => array(),
         'src'  => array(),
         'width'   => array(),
      ),
      'li'                     => array(
         'class' => array(),
      ),
      'ol'                     => array(
         'class' => array(),
      ),
      'p'                         => array(
         'class' => array(),
      ),
      'q'                         => array(
         'cite'    => array(),
         'title'   => array(),
      ),
      'span'                      => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'iframe'                 => array(
         'width'         => array(),
         'height'     => array(),
         'scrolling'     => array(),
         'frameborder'   => array(),
         'allow'         => array(),
         'src'        => array(),
      ),
      'strike'                 => array(),
      'br'                     => array(),
      'strong'                 => array(),
      'data-wow-duration'            => array(),
      'data-wow-delay'            => array(),
      'data-wallpaper-options'       => array(),
      'data-stellar-background-ratio'   => array(),
      'ul'                     => array(
         'class' => array(),
      ),
      'svg' => array(
           'class' => true,
           'aria-hidden' => true,
           'aria-labelledby' => true,
           'role' => true,
           'xmlns' => true,
           'width' => true,
           'height' => true,
           'viewbox' => true, // <= Must be lower case!
       ),
       'g'     => array( 'fill' => true ),
       'title' => array( 'title' => true ),
       'path'  => array( 'd' => true, 'fill' => true,  ),
      );

   if (function_exists('wp_kses')) { // WP is here
      $allowed = wp_kses($raw, $allowed_tags);
   } else {
      $allowed = $raw;
   }

   return $allowed;
}

// / This code filters the Archive widget to include the post count inside the link /
add_filter( 'get_archives_link', 'fio_archive_count_span' );
function fio_archive_count_span( $links ) {
    $links = str_replace('</a>&nbsp;(', '<span > (', $links);
    $links = str_replace(')', ')</span></a> ', $links);
    return $links;
}


// / This code filters the Category widget to include the post count inside the link /
add_filter('wp_list_categories', 'fio_cat_count_span');
function fio_cat_count_span($links) {
  $links = str_replace('</a> (', '<span> (', $links);
  $links = str_replace(')', ')</span></a>', $links);
  return $links;
}