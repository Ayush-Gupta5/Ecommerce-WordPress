<?php
/**
 * Contact Page Theme Option.
 * 
 * @package Elegant_Shop
 */

if ( ! function_exists( 'elegant_shop_customize_register_contact' ) ) :

function elegant_shop_customize_register_contact( $wp_customize ) {
    
    /** contact Page Settings */
    $wp_customize->add_panel( 
        'contact_page_settings',
         array(
            'priority'    => 60,
            'title'       => __( 'Contact Page Settings', 'elegant-shop' ),
            'description' => __( 'Customize contact Page Sections', 'elegant-shop' ),
        ) 
    );
}
endif;
add_action( 'customize_register', 'elegant_shop_customize_register_contact' );