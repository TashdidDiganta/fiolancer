<?php


new \Kirki\Panel(
    'panel_id',
    [
        'priority'    => 10,
        'title'       => esc_html__( 'Fiola Customizer', 'fio' ),
        'description' => esc_html__( 'Fio Customizer Description.', 'fio' ),
    ]
);


// About Me section
function about_me_section(){

    new \Kirki\Section(
        'about_me_section',
        [
            'title'       => esc_html__( 'About Me', 'kirki' ),
            'description' => esc_html__( 'About Me Section Description.', 'kirki' ),
            'panel'       => 'panel_id',
            'priority'    => 60,
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'image_setting_url',
            'label'       => esc_html__( 'Image Control (URL)', 'kirki' ),
            'description' => esc_html__( 'The saved value will be the URL.', 'kirki' ),
            'section'     => 'about_me_section',
            'default'     => '',
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'author_name',
            'label'    => esc_html__( 'About Me', 'kirki' ),
            'section'  => 'about_me_section',
            'default'  => esc_html__( 'Rosalina D. Willaimson', 'kirki' ),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Textarea(
        [
            'settings'    => 'about_textarea',
            'label'       => esc_html__( 'Description', 'kirki' ),
            'section'     => 'about_me_section',
            'default'     => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore.', 'kirki' ),
        ]
    );

    new \Kirki\Field\Repeater(
        [
            'settings'     => 'about_social',
            'label'        => esc_html__( 'footer_social_links', 'kirki' ),
            'section'      => 'about_me_section',
            'priority'     => 10,

            'default'      => [
            ],
            'row_label'    => [
                'type'  => 'field',
                'value' => esc_html__( 'ROW', 'kirki' ),
                'field' => 'link_target',
            ],
            'fields' => [
                'link_target'   => [
                    'type'        => 'select',
                    'label'       => esc_html__( 'Choose social media', 'kirki' ),
                    'description' => esc_html__( 'Description', 'kirki' ),
                    'default'     => "<i class='fab fa-facebook-f'></i>",
                    'choices' => [
                        "<i class='fab fa-facebook-f'></i>" => "Facebook",
                        "<i class='fab fa-twitter'></i>" => "Twitter",
                        "<i class='fab fa-pinterest'></i>" => "Pinterest",
                        "<i class='fab fa-behance'></i>" => "Behance",
                        "<i class='fab fa-youtube'></i>" => "Youtube",
                    ],
                ],
                'link_url'    => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Link URL', 'kirki' ),
                    'description' => esc_html__( 'Description', 'kirki' ),
                    'default'     => '',
                ],
            ],
        ]
    );
 
}
about_me_section();

// header main section
function header_main_section(){
    // header_top_bar section 
    new \Kirki\Section(
        'header_main_section',
        [
            'title'       => esc_html__( 'Header Main Settings', 'fio' ),
            'description' => esc_html__( 'Header Main Controls.', 'fio' ),
            'panel'       => 'panel_id',
            'priority'    => 30,
        ]
    );
    // header_top_bar section 

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'fio_header_elementor_switch',
            'label'       => esc_html__( 'Header Custom/Elementor Switch', 'fio' ),
            'description' => esc_html__( 'Header Custom/Elementor On/Off', 'fio' ),
            'section'     => 'header_main_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'fio' ),
                'off' => esc_html__( 'Disable', 'fio' ),
            ],
        ]
    ); 

    new \Kirki\Field\Radio_Image(
        [
            'settings'    => 'header_layout_custom',
            'label'       => esc_html__( 'Chose Header Style', 'fio' ),
            'section'     => 'header_main_section',
            'priority'    => 10,
            'choices'     => [
                'header_1'  => get_template_directory_uri() . '/inc/img/header/header-1.png',
            ],
            'default'     => 'header_1',
            'active_callback' => [
                [
                    'setting' => 'fio_header_elementor_switch',
                    'operator' => '==',
                    'value' => false
                ]
            ]
        ]
    );

    $header_posttype = array(
        'post_type'      => 'nl-header',
        'posts_per_page' => -1,
    );
    $header_posttype_loop = get_posts($header_posttype);

    $header_post_obj_arr = array();
    foreach($header_posttype_loop as $post){
        $header_post_obj_arr[$post->ID] = $post->post_title;
    }


    wp_reset_query();


    new \Kirki\Field\Select(
        [
            'settings'    => 'fio_header_templates',
            'label'       => esc_html__( 'Elementor Header Template', 'fio' ),
            'section'     => 'header_main_section',
            'placeholder' => esc_html__( 'Choose an option', 'fio' ),
            'choices'     => $header_post_obj_arr,
            'active_callback' => [
                [
                    'setting' => 'fio_header_elementor_switch',
                    'operator' => '==',
                    'value' => true
                ]
            ]
        ]
    );
   
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'header_right_switch',
            'label'       => esc_html__( 'Header Right Switch', 'fio' ),
            'description' => esc_html__( 'Header Right On/Off', 'fio' ),
            'section'     => 'header_main_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'fio' ),
                'off' => esc_html__( 'Disable', 'fio' ),
            ],
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'sticky_header',
            'label'       => esc_html__( 'Sticky Header', 'fio' ),
            'description' => esc_html__( 'Sticky Header On/Off', 'fio' ),
            'section'     => 'header_main_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'fio' ),
                'off' => esc_html__( 'Disable', 'fio' ),
            ],
        ]
    );

    new \Kirki\Field\Repeater(
        [
            'settings' => 'header_socials',
            'label'    => esc_html__( 'Header socials links', 'kirki' ),
            'section'  => 'header_main_section',
            'priority' => 10,
            'row_label'    => [
                'type'  => 'field',
                'value' => esc_html__( 'link', 'kirki' ),
                'field' => 'link_text',
            ],
            'active_callback' => [
                [
                    'setting'  => 'header_right_switch',
                    'operator' => '==',
                    'value'    => true,
                ]
            ],
            'default'  => [
                [
                    'link_text'   => esc_html__( 'Fb.', 'kirki' ),
                    'link_url'    => 'https://facebook.com/',
                    'link_target' => '_self',
                    'checkbox'    => false,
                ]
            ],
            'fields'   => [
                'link_text'   => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Link Text', 'kirki' ),
                    'description' => esc_html__( 'Description', 'kirki' ),
                    'default'     => '',
                ],
                'link_url'    => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Link URL', 'kirki' ),
                    'description' => esc_html__( 'Description', 'kirki' ),
                    'default'     => '',
                ],
                'link_target' => [
                    'type'        => 'select',
                    'label'       => esc_html__( 'Link Target', 'kirki' ),
                    'description' => esc_html__( 'Description', 'kirki' ),
                    'default'     => '_self',
                    'choices'     => [
                        '_blank' => esc_html__( 'New Window', 'kirki' ),
                        '_self'  => esc_html__( 'Same Frame', 'kirki' ),
                    ],
                ]
            ],
        ]
    );

    new \Kirki\Field\URL(
        [
            'settings' => 'download_cv',
            'label'    => esc_html__( 'CV link', 'kirki' ),
            'section'  => 'header_main_section',
            'default'  => 'https://yoururl.com/',
            'priority' => 10,
            'active_callback' => [
                [
                    'setting'  => 'header_right_switch',
                    'operator' => '==',
                    'value'    => true,
                ]
            ],
        ]
    );
 
}
header_main_section();

function preloader_section(){

    new \Kirki\Section(
        'preloader_section',
        [
            'title'       => esc_html__( 'Preloader Settings', 'fio' ),
            'description' => esc_html__( 'Preloader Controls.', 'fio' ),
            'panel'       => 'panel_id',
            'priority'    => 100,
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'fio_preloader_switch',
            'label'       => esc_html__( 'Preloader Switch', 'fio' ),
            'description' => esc_html__( 'Preloader On/Off', 'fio' ),
            'section'     => 'preloader_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'fio' ),
                'off' => esc_html__( 'Disable', 'fio' ),
            ],
        ]
    ); 

    new \Kirki\Field\Image(
        [
            'settings'    => 'fio_preloader_logo',
            'label'       => esc_html__( 'Preloader Logo Icon', 'fio' ),
            'description' => esc_html__( 'Preloader Logo Here', 'fio' ),
            'section'     => 'preloader_section',
            'default'     => get_template_directory_uri() . '/assets/img/loader.png',
        ]
    );   
}
preloader_section();

// offcanvas_side_section
function offcanvas_side_section(){
    // header_top_bar section 
    new \Kirki\Section(
        'offcanvas_side_section',
        [
            'title'       => esc_html__( 'Offcanvas Info', 'fio' ),
            'description' => esc_html__( 'Offcanvas Information.', 'fio' ),
            'panel'       => 'panel_id',
            'priority'    => 110,
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'fio_offcanvas_enable',
            'label'       => esc_html__( 'Enable/Disable Offcanvas', 'fio' ),
            'description' => esc_html__( 'Enable/Disable Offcanvas', 'fio' ),
            'section'     => 'offcanvas_side_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'fio' ),
                'off' => esc_html__( 'Disable', 'fio' ),
            ],
        ]
    ); 

    new \Kirki\Field\Image(
        [
            'settings'    => 'fio_offcanvas_logo',
            'label'       => esc_html__( 'Offcanvas Logo', 'fio' ),
            'description' => esc_html__( 'Offcanvas Logo Here', 'fio' ),
            'section'     => 'offcanvas_side_section',
            'default'     => get_template_directory_uri() . '/assets/img/logo/logo-2.png',
            'active_callback' => [
                [
                    'setting'  => 'fio_offcanvas_enable',
                    'operator' => '==',
                    'value'    => true,
                ]
            ],
        ]
    ); 

    new \Kirki\Field\Text(
        [
            'settings' => 'fio_offcanvas_title',
            'label'    => esc_html__( 'Give a title', 'fio' ),
            'section'  => 'offcanvas_side_section',
            'default'  => esc_html__( 'About US', 'fio' ),
            'priority' => 10,
            'active_callback' => [
                [
                    'setting'  => 'fio_offcanvas_enable',
                    'operator' => '==',
                    'value'    => true,
                ]
            ],
        ]
    );

    new \Kirki\Field\Textarea(
        [
            'settings' => 'fio_offcanvas_desc',
            'label'    => esc_html__( 'Write a short description', 'fio' ),
            'section'  => 'offcanvas_side_section',
            'default'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut
            labore et magna aliqua. Ut enim ad minim veniam laboris.', 'fio' ),
            'priority' => 10,
            'active_callback' => [
                [
                    'setting'  => 'fio_offcanvas_enable',
                    'operator' => '==',
                    'value'    => true,
                ]
            ],
        ]
    );

    

    new \Kirki\Field\Text(
        [
            'settings' => 'fio_offcanvas_form_title',
            'label'    => esc_html__( 'Give a form title', 'fio' ),
            'section'  => 'offcanvas_side_section',
            'default'  => esc_html__( 'Get a free quote', 'fio' ),
            'priority' => 10,
            'active_callback' => [
                [
                    'setting'  => 'fio_offcanvas_enable',
                    'operator' => '==',
                    'value'    => true,
                ]
            ],
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings'    => 'fio_offcanvas_form',
            'label'       => esc_html__( 'Form Shortcode', 'fio' ),
            'section'     => 'offcanvas_side_section',
            'default'     => '',
            'placeholder' => esc_html__( 'Paste a shortcode here', 'fio' ),
            'active_callback' => [
                [
                    'setting'  => 'fio_offcanvas_enable',
                    'operator' => '==',
                    'value'    => true,
                ]
            ],
        ]
    );
}
offcanvas_side_section();

// header_logo_section
function header_logo_section(){
    // header_logo_section section 
    new \Kirki\Section(
        'header_logo_section',
        [
            'title'       => esc_html__( 'Header Logo', 'fio' ),
            'description' => esc_html__( 'Header Logo Settings.', 'fio' ),
            'panel'       => 'panel_id',
            'priority'    => 40,
        ]
    );

    // header_logo_section section 
    new \Kirki\Field\Image(
        [
            'settings'    => 'header_logo',
            'label'       => esc_html__( 'Header Logo', 'fio' ),
            'description' => esc_html__( 'Theme Default/Primary Logo Here', 'fio' ),
            'section'     => 'header_logo_section',
            'default'     => get_template_directory_uri() . '/assets/img/logo/logo.svg',
        ]
    );
    new \Kirki\Field\Image(
        [
            'settings'    => 'header_secondary_logo',
            'label'       => esc_html__( 'Header Secondary Logo', 'fio' ),
            'description' => esc_html__( 'Theme Secondary Logo Here', 'fio' ),
            'section'     => 'header_logo_section',
            'default'     => get_template_directory_uri() . '/assets/img/logo/logo-white.svg',
        ]
    );

    // Contacts Text 
    new \Kirki\Field\Text(
        [
            'settings' => 'fio_logo_width',
            'label'    => esc_html__( 'Logo Width', 'fio' ),
            'section'  => 'header_logo_section',
            'default'  => esc_html__( '135', 'fio' ),
            'priority' => 10,
        ]
    );
}
header_logo_section();


// header_logo_section
function header_breadcrumb_section(){
    // header_logo_section section 
    new \Kirki\Section(
        'header_breadcrumb_section',
        [
            'title'       => esc_html__( 'Breadcrumb', 'fio' ),
            'description' => esc_html__( 'Breadcrumb Settings.', 'fio' ),
            'panel'       => 'panel_id',
            'priority'    => 160,
        ]
    );

    // header_breadcrumb_section section 
    new \Kirki\Field\Text(
        [
            'settings' => 'breadcrumb_sub_title',
            'label'    => esc_html__( 'Sub Title', 'fio' ),
            'section'  => 'header_breadcrumb_section',
            'default'  => "welcome to fiolancer",
            'priority' => 10,
        ]
    );
    new \Kirki\Field\Textarea(
        [
            'settings'    => 'breadcrumb_blog_title',
            'label'       => esc_html__( 'End Cridets', 'kirki' ),
            'section'     => 'header_breadcrumb_section',
            'default'     => esc_html__( 'News & Insights' ),
        ]
    );
    new \Kirki\Field\Image(
        [
            'settings'    => 'breadcrumb_image',
            'label'       => esc_html__( 'Breadcrumb Image', 'fio' ),
            'description' => esc_html__( 'Breadcrumb Image add/remove', 'fio' ),
            'section'     => 'header_breadcrumb_section',
        ]
    );





}
header_breadcrumb_section();

// Blog Socials
function blog_socialmedia_section(){

    new \Kirki\Section(
        'blog_social_section',
        [
            'title'       => esc_html__( 'Blog Social Media', 'fio' ),
            'description' => esc_html__( 'Add Social Media', 'fio' ),
            'panel'       => 'panel_id',
            'priority'    => 190,
        ]
    );

    new \Kirki\Field\Repeater(
        [
            'settings'     => 'fio_blog_single_social',
            'label'        => esc_html__( 'Add New Social', 'kirki' ),
            'section'      => 'blog_social_section',
            'priority'     => 10,

            'default'      => [
            ],
            'row_label'    => [
                'type'  => 'field',
                'value' => esc_html__( 'ROW', 'kirki' ),
                'field' => 'link_target',
            ],
            'fields' => [
                'link_target'   => [
                    'type'        => 'select',
                    'label'       => esc_html__( 'Choose social media', 'kirki' ),
                    'description' => esc_html__( 'Description', 'kirki' ),
                    'default'     => "<i class='fab fa-facebook-f'></i>",
                    'choices' => [
                        "<i class='fab fa-facebook-f'></i>" => "Facebook",
                        "<i class='fab fa-twitter'></i>" => "Twitter",
                        "<i class='fab fa-linkedin'></i>" => "Linkedin-in",
                        "<i class='fab fa-pinterest'></i>" => "Pinterest",
                    ],
                ],
                'link_url'    => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Link URL', 'kirki' ),
                    'description' => esc_html__( 'Description', 'kirki' ),
                    'default'     => '',
                ],
            ],
        ]
    );


    $menus = wp_get_nav_menus();

    $options = [];

    foreach ( $menus as $menu ) {
        $options[ $menu->slug ] = $menu->name;
    }

    new \Kirki\Field\Select(
        [
            'settings'    => 'footer_navs',
            'label'       => esc_html__( 'Footer Navs', 'fio' ),
            'section'     => 'footer_layout_section',
            'default'     => '4',
            'placeholder' => esc_html__( 'Choose a menu', 'fio' ),
            'choices'     => $options,
        ]
    );


}
blog_socialmedia_section();


// footer layout
function footer_layout_section(){

    new \Kirki\Section(
        'footer_layout_section',
        [
            'title'       => esc_html__( 'Footer', 'fio' ),
            'description' => esc_html__( 'Footer Settings.', 'fio' ),
            'panel'       => 'panel_id',
            'priority'    => 190,
        ]
    );
    // footer_widget_number section 
    new \Kirki\Field\Select(
        [
            'settings'    => 'footer_widget_number',
            'label'       => esc_html__( 'Footer Widget Number', 'fio' ),
            'section'     => 'footer_layout_section',
            'default'     => '4',
            'placeholder' => esc_html__( 'Choose an option', 'fio' ),
            'choices'     => [
                '1' => esc_html__( '1', 'fio' ),
                '2' => esc_html__( '2', 'fio' ),
                '3' => esc_html__( '3', 'fio' ),
                '4' => esc_html__( '4', 'fio' ),
            ],
        ]
    );


    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'fio_footer_elementor_switch',
            'label'       => esc_html__( 'Footer Custom/Elementor Switch', 'fio' ),
            'description' => esc_html__( 'Footer Custom/Elementor On/Off', 'fio' ),
            'section'     => 'footer_layout_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'fio' ),
                'off' => esc_html__( 'Disable', 'fio' ),
            ],
        ]
    ); 


    new \Kirki\Field\Textarea(
        [
            'settings'    => 'fiolancer_cridets',
            'label'       => esc_html__( 'End Cridets', 'kirki' ),
            'section'     => 'footer_layout_section',
            'default'     => esc_html__( 'Copyright & Design By @Fiolancer  - 2022.', 'kirki' ),
        ]
    );



    new \Kirki\Field\Repeater(
        [
            'settings'     => 'fiola_footer_social',
            'label'        => esc_html__( 'footer_social_links', 'kirki' ),
            'section'      => 'footer_layout_section',
            'priority'     => 10,

            'default'      => [
            ],
            'row_label'    => [
                'type'  => 'field',
                'value' => esc_html__( 'ROW', 'kirki' ),
                'field' => 'link_target',
            ],
            'fields' => [
                'link_target'   => [
                    'type'        => 'select',
                    'label'       => esc_html__( 'Choose social media', 'kirki' ),
                    'description' => esc_html__( 'Description', 'kirki' ),
                    'default'     => "<i class='fab fa-facebook-f'></i>",
                    'choices' => [
                        "<i class='fab fa-facebook-f'></i>" => "Facebook",
                        "<i class='fab fa-twitter'></i>" => "Twitter",
                        "<i class='fab fa-behance'></i>" => "Behance",
                        "<i class='fab fa-youtube'></i>" => "Youtube",
                    ],
                ],
                'link_url'    => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Link URL', 'kirki' ),
                    'description' => esc_html__( 'Description', 'kirki' ),
                    'default'     => '',
                ],
            ],
        ]
    );


    $menus = wp_get_nav_menus();

    $options = [];

    foreach ( $menus as $menu ) {
        $options[ $menu->slug ] = $menu->name;
    }

    new \Kirki\Field\Select(
        [
            'settings'    => 'footer_navs',
            'label'       => esc_html__( 'Footer Navs', 'fio' ),
            'section'     => 'footer_layout_section',
            'default'     => '4',
            'placeholder' => esc_html__( 'Choose a menu', 'fio' ),
            'choices'     => $options,
        ]
    );


}
footer_layout_section();


// 404 section
function error_404_section(){
    // 404_section section 
    new \Kirki\Section(
        'error_404_section',
        [
            'title'       => esc_html__( '404 Page', 'fio' ),
            'description' => esc_html__( '404 Page Settings.', 'fio' ),
            'panel'       => 'panel_id',
            'priority'    => 150,
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'fio_error_thumb',
            'label'       => esc_html__( 'Error Image', 'fio' ),
            'description' => esc_html__( 'Error Image Here', 'fio' ),
            'section'     => 'error_404_section',
            'default'     => get_template_directory_uri() . '/assets/img/error/error.png',
        ]
    );  

    // 404_section 
    new \Kirki\Field\Text(
        [
            'settings' => 'fio_error_title',
            'label'    => esc_html__( 'Not Found Title', 'fio' ),
            'section'  => 'error_404_section',
            'default'  => "Oops! Page not found",
            'priority' => 10,
        ]
    );

    // 404_section description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'fio_error_desc',
            'label'    => esc_html__( 'Not Found description', 'fio' ),
            'section'  => 'error_404_section',
            'default'  => "Whoops, this is embarassing. Looks like the page you were looking for was not found.",
            'priority' => 10,
        ]
    );

    // 404_section description
    new \Kirki\Field\Text(
        [
            'settings' => 'fio_error_link_text',
            'label'    => esc_html__( 'Error Link Text', 'fio' ),
            'section'  => 'error_404_section',
            'default'  => "Back To Home",
            'priority' => 10,
        ]
    );
}
error_404_section();