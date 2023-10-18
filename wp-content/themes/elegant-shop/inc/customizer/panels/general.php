<?php
/**
 * General Settings
 *
 * @package Elegant_Shop
 */

if ( ! function_exists( 'elegant_shop_customize_register_general' ) ) :

function elegant_shop_customize_register_general( $wp_customize ){
    
    /** General Settings */
    $wp_customize->add_panel( 
        'general_settings',
         array(
            'priority'    => 60,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'General Settings', 'elegant-shop' ),
            'description' => __( 'Customize Header, Social, Sharing, SEO, Post/Page, Newsletter, Performance and Miscellaneous settings.', 'elegant-shop' ),
        ) 
    );

     
    $wp_customize->get_section( 'header_image' )->panel                    = 'frontpage_settings';
    $wp_customize->get_section( 'header_image' )->title                    = __( 'Banner Section', 'elegant-shop' );
    $wp_customize->get_section( 'header_image' )->priority                 = 10;
    $wp_customize->get_control( 'header_image' )->active_callback          = 'elegant_shop_banner_ac';
    $wp_customize->get_control( 'header_video' )->active_callback          = 'elegant_shop_banner_ac';
    $wp_customize->get_control( 'external_header_video' )->active_callback = 'elegant_shop_banner_ac';
    $wp_customize->get_section( 'header_image' )->description              = '';                                               
    $wp_customize->get_setting( 'header_image' )->transport                = 'refresh';
    $wp_customize->get_setting( 'header_video' )->transport                = 'refresh';
    $wp_customize->get_setting( 'external_header_video' )->transport       = 'refresh';
    
    /** Banner Options */
    $wp_customize->add_setting(
		'ed_banner_section',
		array(
			'default'			=> 'static_banner',
			'sanitize_callback' => 'elegant_shop_sanitize_select'
		)
	);

	$wp_customize->add_control(
        'ed_banner_section',
        array(
            'label'	      => __( 'Banner Options', 'elegant-shop' ),
            'description' => __( 'Choose banner as static image/video or as a slider.', 'elegant-shop' ),
            'section'     => 'header_image',
            'type'        => 'select',
            'choices'     => array(
                'no_banner'        => __( 'Disable Banner Section', 'elegant-shop' ),
                'static_banner'    => __( 'Static/Video CTA Banner', 'elegant-shop' ),
            ),
            'priority' => 5	
        )            
	);

    /** Sub Title */
    $wp_customize->add_setting(
        'banner_subtitle',
        array(
            'default'           => __( 'NEW ARRIVALS 2022', 'elegant-shop' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'banner_subtitle',
        array(
            'label'           => __( 'Subtitle', 'elegant-shop' ),
            'section'         => 'header_image',
            'type'            => 'text',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'banner_subtitle', array(
        'selector' => '.home .banner .banner__wrap .banner__text .banner__stitle',
        'render_callback' => 'elegant_shop_pro_get_banner_subtitle',
    ) );
    
    /** Title */
    $wp_customize->add_setting(
        'banner_title',
        array(
            'default'           => esc_html__( 'Best Higher End Level Smartphone', 'elegant-shop' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'banner_title',
        array(
            'label'           => __( 'Title', 'elegant-shop' ),
            'section'         => 'header_image',
            'type'            => 'text',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'banner_title', array(
        'selector' => '.home .banner .banner__wrap .banner__text h2.banner__title',
        'render_callback' => 'elegant_shop_get_banner_title',
    ) );
    
    /** Content */
    $wp_customize->add_setting(
        'banner_content',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'banner_content',
        array(
            'label'           => __( 'Content', 'elegant-shop' ),
            'section'         => 'header_image',
            'type'            => 'textarea',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'banner_content', array(
        'selector' => '.home .banner .banner__wrap .banner__text p',
        'render_callback' => 'elegant_shop_pro_get_banner_content',
    ) );

    $wp_customize->add_setting(
        'banner_overlay',
        array(
            'default'           => true,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control( 
            $wp_customize,
            'banner_overlay',
            array(
                'section'     => 'header_image',
                'label'       => __( 'Banner Overlay', 'elegant-shop' ),
                'description' => __( 'Enable to add overlay in banner', 'elegant-shop' ),
            )
        )
    );
    
    /** Read More Text */
    $wp_customize->add_setting(
        'banner_btn_lbl',
        array(
            'default'           => esc_html__( 'Shop Now', 'elegant-shop' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'banner_btn_lbl',
        array(
            'type'            => 'text',
            'section'         => 'header_image',
            'label'           => __( 'Banner Button label', 'elegant-shop' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'banner_btn_lbl', array(
        'selector' => '.home .banner .banner__wrap .btn-wrap a.btn-primary',
        'render_callback' => 'hotell_pro_get_banner_btn_lbl',
    ) );

    $wp_customize->add_setting(
        'banner_btn_link',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'banner_btn_link',
        array(
            'label'           => __( 'Banner Button Link', 'elegant-shop' ),
            'section'         => 'header_image',
            'type'            => 'text',
        )
    );

    $wp_customize->add_setting(
        'btn_new_tab',
        array(
            'default'           => false,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Elegant_Shop_Pro_Toggle_Control( 
			$wp_customize,
			'btn_new_tab',
			array(
				'section'     => 'header_image',
				'label'       => __( 'Open in a new tab', 'elegant-shop' ),
                'description' => __( 'Enable to open the link in a new tab.', 'elegant-shop' ),
			)
		)
	);
    
}
endif;
add_action( 'customize_register', 'elegant_shop_customize_register_general' );