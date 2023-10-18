<?php
/**
 * Front Page Settings
 * 
 * @package Elegant_Shop
 */

if ( ! function_exists( 'elegant_shop_customize_register_frontpage' ) ) :

function elegant_shop_customize_register_frontpage( $wp_customize ) {
	
    /** Front Page Settings */
    $wp_customize->add_panel( 
        'frontpage_settings',
         array(
            'priority'    => 60,
            'capability'  => 'edit_theme_options',
            'title'       => esc_html__( 'Front Page Settings', 'elegant-shop' ),
            'description' => esc_html__( 'Static Home Page settings.', 'elegant-shop' ),
        ) 
    ); 

}
endif;
add_action( 'customize_register', 'elegant_shop_customize_register_frontpage' );