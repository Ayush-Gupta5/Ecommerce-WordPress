<?php
/**
 * Contact Form Settings
 * 
 * @package Elegant_Shop
 */

if ( ! function_exists( 'elegant_shop_contact_page_form' ) ) :

function elegant_shop_contact_page_form( $wp_customize ){
    
	$wp_customize->add_section( 'contact_page_form', 
	    array(
	        'title'         => esc_html__( 'Contact Form Section', 'elegant-shop' ),
	        'priority'      => 20,
            'panel'         => 'contact_page_settings',
	    ) 
	);

	$wp_customize->add_setting(
		'contact_form_title',
		array(
			'default'           => __( 'Get In Touch', 'elegant-shop' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'contact_form_title',
		array(
			'section'           => 'contact_page_form',
			'label'             => __( 'Contact Form Title', 'elegant-shop' ),
			'type'              => 'text',
		)
	);

	$wp_customize->selective_refresh->add_partial( 'contact_form_title', array(
        'selector'        => '.page-template-contact .contact__form .contact__form-wrap h3',
        'render_callback' => 'elegant_shop_contact_form_title',
    ) );

	$wp_customize->add_setting(
		'contact_form_shortcode',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control(
		'contact_form_shortcode',
		array(
			'section'           => 'contact_page_form',
			'label'             => __( 'Contact Form Shortcode', 'elegant-shop' ),
            'description'       => __( 'Please generate the shortcode from contact form 7 widget', 'elegant-shop' ),
			'type'              => 'text',
		)
	);
}
endif;
add_action( 'customize_register', 'elegant_shop_contact_page_form' );