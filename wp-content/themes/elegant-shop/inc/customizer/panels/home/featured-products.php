<?php
/**
 * Featured Products Settings
 *
 * @package Elegant_Shop
 */
if ( ! function_exists( 'elegant_shop_customize_register_featured_products' ) ) :

function elegant_shop_customize_register_featured_products( $wp_customize ){

    /** Featured product Section Settings  */
    $wp_customize->add_section(
        'featured_product_section',
        array(
            'title'    => __( 'Featured product Section', 'elegant-shop' ),
            'priority' => 20,
            'panel'    => 'frontpage_settings',
        )
    );

    $wp_customize->add_setting(
        'ed_featured_prod_sec',
        array(
            'default'           => false,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control( 
            $wp_customize,
            'ed_featured_prod_sec',
            array(
                'section'       => 'featured_product_section',
                'label'         => __( 'Enable Featured Product Section', 'elegant-shop' ),
            )
        )
    );

    /** Title Text */
    $wp_customize->add_setting( 
        'featured_prod_sec_title', 
        array(
            'default'           => __( 'Our Featured Products', 'elegant-shop' ), 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        ) 
    );
    
    $wp_customize->add_control(
        'featured_prod_sec_title',
        array(
            'section'         => 'featured_product_section',
            'label'           => __( 'Section Title', 'elegant-shop' ),
            'type'            => 'text',
        )   
    );

    $wp_customize->selective_refresh->add_partial( 'featured_prod_sec_title', array(
        'selector'        => '.home .site .featured-products .heading h2.heading__underlined--center',
        'render_callback' => 'elegant_shop_get_featured_prod_sec_title',
    ) );

    $wp_customize->add_setting( 
        new Elegant_Shop_Pro_Control_Repeater_Setting( 
            $wp_customize, 
            'cat_tab_custom', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Elegant_Shop_Pro_Control_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Control_Repeater(
            $wp_customize,
            'cat_tab_custom',
            array(
                'section' => 'featured_product_section',                
                'label'   => __( 'Category Tabs', 'elegant-shop' ),
                'fields'  => array(
                    'choose_cat' => array(
                        'type'    => 'select',
                        'label'   => __( 'Choose Category for Tabs', 'elegant-shop' ),
                        'choices' => elegant_shop_get_categories( true, 'product_cat' )
                    )
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'category', 'elegant-shop' ),
                ),
                'choices' => array(
                    'limit' => 8
                )
            )
        )
    );

     /** No. of Category Product */
    $wp_customize->add_setting(
        'no_of_cat_tab_products',
        array(
            'default'           => 8,
            'sanitize_callback' => 'elegant_shop_sanitize_number_absint'
        )
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Slider_Control( 
            $wp_customize,
            'no_of_cat_tab_products',
            array(
                'section'     => 'featured_product_section',
                'label'       => __( 'Number of Products', 'elegant-shop' ),
                'description' => __( 'Choose the number of products you want to display', 'elegant-shop' ),
                'choices'     => array(
                    'min'   => 4,
                    'max'   => 8,
                    'step'  => 1,
                ),                 
            )
        )
    );

    $wp_customize->add_setting( 
        'featured_prod_new_tab', 
        array(
            'default'           => false,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control( 
            $wp_customize,
            'featured_prod_new_tab',
            array(
                'section'     => 'featured_product_section',
                'label'       => __( 'Enable to open link in a new tab', 'elegant-shop' ),
            )
        )
    );
    
}
endif;
add_action( 'customize_register', 'elegant_shop_customize_register_featured_products' );