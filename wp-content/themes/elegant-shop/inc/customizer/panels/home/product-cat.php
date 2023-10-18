<?php
/**
 * Product Category Section
 *
 * @package Elegant_Shop
 */

function elegant_shop_customize_register_frontpage_cat_list( $wp_customize ){
    $wp_customize->add_section(
        'prod_cat_section',
        array(
            'title'    => __( 'Category List Section', 'elegant-shop' ),
            'priority' => 40,
            'panel'    => 'frontpage_settings',
        )
    );

    $wp_customize->add_setting(
        'ed_prod_cat_sec',
        array(
            'default'           => false,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control( 
            $wp_customize,
            'ed_prod_cat_sec',
            array(
                'section'       => 'prod_cat_section',
                'label'         => __( 'Enable Category Listing Section', 'elegant-shop' ),
            )
        )
    );

    $wp_customize->add_setting( 
        new Elegant_Shop_Pro_Control_Repeater_Setting( 
            $wp_customize, 
            'cat_list_custom', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Elegant_Shop_Pro_Control_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Control_Repeater(
            $wp_customize,
            'cat_list_custom',
            array(
                'section' => 'prod_cat_section',                
                'label'   => __( 'Category Lists', 'elegant-shop' ),
                'fields'  => array(
                    'title'     => array(
                        'type'  => 'text',
                        'label' => __( 'Title', 'elegant-shop' ),
                    ),
                    'choose_cat' => array(
                        'type'    => 'select',
                        'label'   => __( 'Choose Category for Lists', 'elegant-shop' ),
                        'choices' => elegant_shop_get_categories( true, 'product_cat' )
                    ),
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'category', 'elegant-shop' ),
                ),
                'choices' => array(
                    'limit' => 3
                )                        
            )
        )
    );

    $wp_customize->add_setting(
        'prod_cat_btn',
        array(
            'default'           => __( 'Shop now', 'elegant-shop' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'prod_cat_btn',
        array(
            'label'           => __( 'Product Section Button', 'elegant-shop' ),
            'section'         => 'prod_cat_section',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'prod_cat_btn', array(
        'selector' => '.home .product-category .product__wrap a.btn',
        'render_callback' => 'elegant_shop_get_prod_cat_btn',
    ) );

    $wp_customize->add_setting( 
        'prod_cat_new_tab', 
        array(
            'default'           => false,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control( 
            $wp_customize,
            'prod_cat_new_tab',
            array(
                'section'     => 'prod_cat_section',
                'label'       => __( 'Enable to open link in a new tab', 'elegant-shop' ),
            )
        )
    );

    /** Category Tab Section Ends */  

}
add_action( 'customize_register', 'elegant_shop_customize_register_frontpage_cat_list' );