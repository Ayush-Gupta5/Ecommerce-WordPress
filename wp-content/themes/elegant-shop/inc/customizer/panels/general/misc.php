<?php
/**
 * Miscellaneous Settings
 *
 * @package Elegant_Shop
 */

if ( ! function_exists( 'elegant_shop_customize_register_misc_settings' ) ) :

function elegant_shop_customize_register_misc_settings( $wp_customize ) {

    /** Miscellaneous Settings */
    $wp_customize->add_section(
        'misc_settings',
        array(
            'title'    => __( 'Misc Settings', 'elegant-shop' ),
            'priority' => 85,
            'panel'    => 'general_settings',
        )
    );

    /** Admin Bar */
    $wp_customize->add_setting(
        'ed_scroll_top',
        array(
            'default'           => true,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control( 
            $wp_customize,
            'ed_scroll_top',
            array(
                'section'		=> 'misc_settings',
                'label'			=> __( 'Scroll To Top', 'elegant-shop' ),
                'description'	=> __( 'You can enable/disable Scroll to Top.', 'elegant-shop' ),
            )
        )
    );
    
    /** Excerpt Length */
    $wp_customize->add_setting( 
        'excerpt_length', 
        array(
            'default'           => absint( 25 ),
            'sanitize_callback' => 'elegant_shop_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Slider_Control( 
            $wp_customize,
            'excerpt_length',
            array(
                'section'	  => 'misc_settings',
                'label'		  => __( 'Excerpt Length', 'elegant-shop' ),
                'description' => __( 'Automatically generated excerpt length (in words).', 'elegant-shop' ),
                'choices'	  => array(
                    'min' 	=> 10,
                    'max' 	=> 100,
                    'step'	=> 5,
                )                 
            )
        )
    );

    /** Archive and Search Page Button Label */
    $wp_customize->add_setting(
        'archive_btn_label',
        array(
            'default'           => esc_html__( 'View Details', 'elegant-shop' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'archive_btn_label',
        array(
            'label'           => esc_html__( 'Button Label', 'elegant-shop' ),
            'label'           => esc_html__( 'Read more button label for Archive Pages and 404.', 'elegant-shop' ),
            'section'         => 'misc_settings',
            'type'            => 'text',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'archive_btn_label', array(
        'selector'        => '.archive .blog__bottom a.btn-link',
        'render_callback' => 'education_center_pro_archive_btn_label',
    ) );
}
endif;
add_action( 'customize_register', 'elegant_shop_customize_register_misc_settings' );