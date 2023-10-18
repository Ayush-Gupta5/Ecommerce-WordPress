<?php
/**
 * Featured Settings For Homepage
 * 
 * @package Elegant_Shop
 */

if ( ! function_exists( 'elegant_shop_customize_register_home_featured' ) ) :

function elegant_shop_customize_register_home_featured( $wp_customize ){
    
	$wp_customize->add_section( 
        'featured_sec_home', 
	    array(
	        'title'         => esc_html__( 'Featured Section', 'elegant-shop' ),
	        'priority'      => 10,
	        'panel'         => 'frontpage_settings'
	    ) 
	);

    $wp_customize->add_setting(
        'ed_featured_sec',
        array(
            'default'           => false,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control( 
            $wp_customize,
            'ed_featured_sec',
            array(
                'section'       => 'featured_sec_home',
                'label'         => __( 'Enable Featured Section', 'elegant-shop' ),
            )
        )
    );

    $wp_customize->add_setting( 
        new Elegant_Shop_Pro_Control_Repeater_Setting( 
            $wp_customize, 
            'featured_repeater_home', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Elegant_Shop_Pro_Control_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Elegant_Shop_Pro_Control_Repeater(
			$wp_customize,
			'featured_repeater_home',
			array(
				'section' => 'featured_sec_home',				
				'label'	  => __( 'Featured', 'elegant-shop' ),
				'fields'  => array(
                    'tag' => array(
                        'type'    => 'text',
                        'label'   => __( 'Enter Tag', 'elegant-shop' ),
                    ),
                    'title' => array(
                        'type'    => 'text',
                        'label'   => __( 'Enter Title', 'elegant-shop' ),
                    ),
                    'label' => array(
                        'type'    => 'text',
                        'label'   => __( 'Enter label', 'elegant-shop' ),
                    ),
                    'link' => array(
                        'type'    => 'url',
                        'label'   => __( 'Link', 'elegant-shop' ),
                        'description' => __( 'Example: https://facebook.com', 'elegant-shop' ),
                    ),
                    'image' => array(
                        'type'    => 'image',
                        'label'   => __( 'Select Image', 'elegant-shop' ),
					),
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => __( 'Featured', 'elegant-shop' ),
                    'field' => 'title'
                ),
                'choices' => array(
                    'limit' => 3
                )
			)
		)
	);

    $wp_customize->add_setting( 
        'featured_new_tab_home', 
        array(
            'default'           => false,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control( 
            $wp_customize,
            'featured_new_tab_home',
            array(
                'section'     => 'featured_sec_home',
                'label'       => __( 'Enable to open link in a new tab', 'elegant-shop' ),
            )
        )
    );

}
endif;
add_action( 'customize_register', 'elegant_shop_customize_register_home_featured' );