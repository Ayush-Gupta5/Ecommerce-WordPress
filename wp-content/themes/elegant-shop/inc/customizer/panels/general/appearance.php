<?php
/**
 * Appearance Settings
 *
 * @package Elegant_Shop
 */

if ( ! function_exists( 'elagant_shop_pro_customize_register_appearance' ) ) :

function elagant_shop_pro_customize_register_appearance( $wp_customize ) {

    $wp_customize->get_section( 'colors' )->panel               = 'appearance_settings';
    $wp_customize->get_section( 'background_image' )->panel     = 'appearance_settings';

    $wp_customize->add_panel( 
        'appearance_settings', 
        array(
            'title'       => __( 'Appearance Settings', 'elegant-shop' ),
            'priority'    => 25,
            'capability'  => 'edit_theme_options',
            'description' => __( 'Change color and body background.', 'elegant-shop' ),
        ) 
    );
}
add_action( 'customize_register', 'elagant_shop_pro_customize_register_appearance' );
endif;