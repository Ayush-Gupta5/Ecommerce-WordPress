<?php
/**
 * New Arrivals Settings For Homepage
 * 
 * @package Elegant_Shop
 */

if ( ! function_exists( 'elegant_shop_customize_register_home_new_arrivals' ) ) :

function elegant_shop_customize_register_home_new_arrivals( $wp_customize ){
    
	$wp_customize->add_section( 
        'new_arrivals_sec_home', 
	    array(
	        'title'         => esc_html__( 'New Arrivals Section', 'elegant-shop' ),
	        'priority'      => 30,
	        'panel'         => 'frontpage_settings'
	    ) 
	);

    $wp_customize->add_setting(
        'ed_new_arrivals_sec',
        array(
            'default'           => false,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control( 
            $wp_customize,
            'ed_new_arrivals_sec',
            array(
                'section'       => 'new_arrivals_sec_home',
                'label'         => __( 'Enable New Arrivals Section', 'elegant-shop' ),
            )
        )
    );

     $wp_customize->add_setting(
        'new_arrivals_sec_title',
        array(
            'default'           => __( 'New Arrivals', 'elegant-shop' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'new_arrivals_sec_title',
        array(
            'section'           => 'new_arrivals_sec_home',
            'label'             => __( 'Section Title', 'elegant-shop' ),
            'type'              => 'text',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'new_arrivals_sec_title', array(
        'selector'        => '.home .site .new-arrivals .heading h2.heading__underlined--center',
        'render_callback' => 'elegant_shop_get_new_arrivals_sec_title',
    ) );

    $wp_customize->add_setting(
        'new_arrivals_cat',
        array(
            'default'			=> '',
            'sanitize_callback' => 'elegant_shop_sanitize_select'
        )
    );

    $wp_customize->add_control(
        'new_arrivals_cat',
        array(
            'label'	          => esc_html__( 'Select Product Category', 'elegant-shop' ),
            'section'         => 'new_arrivals_sec_home',
            'choices'         => elegant_shop_get_categories( true, 'product_cat', false ),
            'type'            => 'select'
        )
    );

    $wp_customize->add_setting( 
        'new_arrivals_no', 
        array(
            'default'           => 5,
            'sanitize_callback' => 'elegant_shop_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Slider_Control( 
            $wp_customize,
            'new_arrivals_no',
            array(
                'section'	  => 'new_arrivals_sec_home',
                'label'		  => __( 'Number of products to show', 'elegant-shop' ),
                'choices'	  => array(
                    'min' 	=> 4,
                    'max' 	=> 8,
                    'step'	=> 1,
                ),
            )
        )
    );

    $wp_customize->add_setting( 
        'new_arrivals_new_tab', 
        array(
            'default'           => false,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control( 
            $wp_customize,
            'new_arrivals_new_tab',
            array(
                'section'     => 'new_arrivals_sec_home',
                'label'       => __( 'Enable to open link in a new tab', 'elegant-shop' ),
            )
        )
    );

}
endif;
add_action( 'customize_register', 'elegant_shop_customize_register_home_new_arrivals' );