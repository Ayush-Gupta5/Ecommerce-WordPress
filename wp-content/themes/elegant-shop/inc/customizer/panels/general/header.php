<?php
/**
 * Header Settings
 *
 * @package Rara_eCommerce_Pro
 */

function rara_ecommerce_pro_customize_register_general_header( $wp_customize ) {
    
    /** Header Settings */
    $wp_customize->add_section(
        'header_settings',
        array(
            'title'    => __( 'Header Settings', 'elegant-shop' ),
            'priority' => 20,
            'panel'    => 'general_settings',
        )
    );

    /** Search Header */
    $wp_customize->add_setting(
        'ed_header_search',
        array(
            'default'           => false,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control(
            $wp_customize,
            'ed_header_search',
            array(
                'section'       => 'header_settings',
                'label'         => __( 'Header Search', 'elegant-shop' ),
                'description'   => __( 'Enable to show search in header', 'elegant-shop' ),
            )
        )	
    );

    /** Wishlist Cart */
    $wp_customize->add_setting( 
        'ed_whislist', 
        array(
            'default'           => true,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control( 
            $wp_customize,
            'ed_whislist',
            array(
                'section'         => 'header_settings',
                'label'           => __( 'Wishlist Cart', 'elegant-shop' ),
                'description'     => __( 'Enable to show Wishlist cart in the header.', 'elegant-shop' ),
            )
        )
    );
    
    /** User Login */
    $wp_customize->add_setting( 
        'ed_user_login', 
        array(
            'default'           => true,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Elegant_Shop_Pro_Toggle_Control( 
			$wp_customize,
			'ed_user_login',
			array(
				'section'         => 'header_settings',
				'label'	          => __( 'User Login', 'elegant-shop' ),
                'description'     => __( 'Enable to show user login in the header.', 'elegant-shop' ),
			)
		)
	);

    /** Shopping Cart */
    $wp_customize->add_setting( 
        'ed_shopping_cart', 
        array(
            'default'           => true,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control( 
            $wp_customize,
            'ed_shopping_cart',
            array(
                'section'         => 'header_settings',
                'label'           => __( 'Shopping Cart', 'elegant-shop' ),
                'description'     => __( 'Enable to show Shopping cart in the header.', 'elegant-shop' ),
            )
        )
    );
    /** Header Settings Ends */
}
add_action( 'customize_register', 'rara_ecommerce_pro_customize_register_general_header' );