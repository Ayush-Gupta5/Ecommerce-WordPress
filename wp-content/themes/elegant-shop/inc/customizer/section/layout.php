<?php
/**
 * General Layout Settings
 *
 * @package Elegant_Shop
 */
if ( ! function_exists( 'elegant_shop_customize_register_layout_general' ) ) :

function elegant_shop_customize_register_layout_general( $wp_customize ) {
    
    /** Home Page Layout Settings */
    $wp_customize->add_section(
        'general_layout_settings',
        array(
            'title'    => __( 'General Sidebar Layout', 'elegant-shop' ),
            'priority' => 55,
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'page_sidebar_layout', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'elegant_shop_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Elegant_Shop_Pro_Radio_Image_Control(
			$wp_customize,
			'page_sidebar_layout',
			array(
				'section'	  => 'general_layout_settings',
				'label'		  => __( 'Page Sidebar Layout', 'elegant-shop' ),
				'description' => __( 'This is the general sidebar layout for pages. You can override the sidebar layout for individual page in respective page.', 'elegant-shop' ),
				'choices'	  => array(
                    'no-sidebar'    => get_template_directory_uri() . '/images/sidebar/general-full.jpg',
                    'left-sidebar'  => get_template_directory_uri() . '/images/sidebar/general-left.jpg',
                    'right-sidebar' => get_template_directory_uri() . '/images/sidebar/general-right.jpg',
				)
			)
		)
	);
    
    /** Post Sidebar layout */
    $wp_customize->add_setting( 
        'post_sidebar_layout', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'elegant_shop_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Elegant_Shop_Pro_Radio_Image_Control(
			$wp_customize,
			'post_sidebar_layout',
			array(
				'section'	  => 'general_layout_settings',
				'label'		  => __( 'Post Sidebar Layout', 'elegant-shop' ),
				'description' => __( 'This is the general sidebar layout for posts & custom post. You can override the sidebar layout for individual post in respective post.', 'elegant-shop' ),
				'choices'	  => array(
                    'no-sidebar'    => get_template_directory_uri() . '/images/sidebar/general-full.jpg',
                    'left-sidebar'  => get_template_directory_uri() . '/images/sidebar/general-left.jpg',
                    'right-sidebar' => get_template_directory_uri() . '/images/sidebar/general-right.jpg',
				)
			)
		)
	);
    
    /** Post Sidebar layout */
    $wp_customize->add_setting( 
        'layout_style', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'elegant_shop_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Elegant_Shop_Pro_Radio_Image_Control(
			$wp_customize,
			'layout_style',
			array(
				'section'	  => 'general_layout_settings',
				'label'		  => __( 'Default Sidebar Layout', 'elegant-shop' ),
				'description' => __( 'This is the general sidebar layout for whole site.', 'elegant-shop' ),
				'choices'	  => array(
                    'no-sidebar'    => get_template_directory_uri() . '/images/sidebar/general-full.jpg',
                    'left-sidebar'  => get_template_directory_uri() . '/images/sidebar/general-left.jpg',
                    'right-sidebar' => get_template_directory_uri() . '/images/sidebar/general-right.jpg',
				)
			)
		)
	);
    
}
endif;
add_action( 'customize_register', 'elegant_shop_customize_register_layout_general' );