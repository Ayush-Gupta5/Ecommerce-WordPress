<?php
/**
 * Contact Map Section Theme Option.
 * 
 * @package Elegant_Shop
 */

if ( ! function_exists( 'elegant_shop_customize_register_map' ) ) :

function elegant_shop_customize_register_map( $wp_customize ) {
    
    /** Google Map Settings */
    $wp_customize->add_section(
        'google_map_settings',
        array(
            'title'    => __( 'Google Map Section', 'elegant-shop' ),
            'priority' => 30,
            'panel'    => 'contact_page_settings',
        )
    );

    /** Contact Form */
    $wp_customize->add_setting(
        'ed_googlemap',
        array(
            'default'           => true,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control( 
            $wp_customize,
            'ed_googlemap',
            array(
                'section'       => 'google_map_settings',
                'label'         => __( 'Google Map Settings', 'elegant-shop' ),
                'description'   => __( 'Disable to hide the Google Map Settings', 'elegant-shop' ),
            )
        )
    );

    $wp_customize->add_setting(
        'contact_google_map_iframe',
        array(
            'default'           => '',
            'sanitize_callback' => 'elegant_shop_sanitize_google_map_iframe',
        )
    );
    
    $wp_customize->add_control(
        'contact_google_map_iframe',
        array(
            'section'         => 'google_map_settings',
            'label'           => __( 'Embeded Google Map', 'elegant-shop' ),
            'type'            => 'textarea',
        )
    );
}
endif;
add_action( 'customize_register', 'elegant_shop_customize_register_map' );