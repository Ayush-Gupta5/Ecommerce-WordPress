<?php
/**
 * Category Settings For Homepage
 * 
 * @package Elegant_Shop
 */

if ( ! function_exists( 'elegant_shop_customize_register_home_category' ) ) :

function elegant_shop_customize_register_home_category( $wp_customize ){
    
	$wp_customize->add_section( 
        'category_sec', 
	    array(
	        'title'         => esc_html__( 'Category Section', 'elegant-shop' ),
	        'priority'      => 60,
	        'panel'         => 'frontpage_settings'
	    ) 
	);

    $wp_customize->add_setting(
        'ed_category_sec',
        array(
            'default'           => false,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control( 
            $wp_customize,
            'ed_category_sec',
            array(
                'section'       => 'category_sec',
                'label'         => __( 'Enable Category Section', 'elegant-shop' ),
            )
        )
    );

    $wp_customize->add_setting( 
        new Elegant_Shop_Pro_Control_Repeater_Setting( 
            $wp_customize, 
            'cat_select_repeater', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Elegant_Shop_Pro_Control_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Elegant_Shop_Pro_Control_Repeater(
			$wp_customize,
			'cat_select_repeater',
			array(
				'section' => 'category_sec',				
				'label'	  => __( 'Categories', 'elegant-shop' ),
				'fields'  => array(
                    'choose_cat' => array(
                        'type'    => 'select',
                        'label'   => __( 'Choose Category', 'elegant-shop' ),
                        'choices' => elegant_shop_get_categories( true, 'product_cat', false ),
                    ),
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => __( 'Categories', 'elegant-shop' ),
                ),
                'choices' => array(
                    'limit' => 7
                )
			)
		)
	);

    $wp_customize->add_setting( 
        'cat_sec_new_tab', 
        array(
            'default'           => false,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control( 
            $wp_customize,
            'cat_sec_new_tab',
            array(
                'section'     => 'category_sec',
                'label'       => __( 'Enable to open link in a new tab', 'elegant-shop' ),
            )
        )
    );

}
endif;
add_action( 'customize_register', 'elegant_shop_customize_register_home_category' );