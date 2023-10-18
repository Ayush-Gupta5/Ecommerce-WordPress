<?php
/**
 * Contact Form Settings
 * 
 * @package Elegant_Shop
 */

if ( ! function_exists( 'elegant_shop_contact_page_info' ) ) :

function elegant_shop_contact_page_info( $wp_customize ){
    
	$wp_customize->add_section( 'contact_info_section', 
	    array(
	        'title'         => esc_html__( 'Contact Details Section', 'elegant-shop' ),
	        'priority'      => 10,
            'panel'         => 'contact_page_settings',
	    ) 
	);

	 /** Title Text */
    $wp_customize->add_setting( 
        'contact_title', 
        array(
            'default'           => __( 'Keep in touch with us', 'elegant-shop' ), 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        ) 
    );
    
    $wp_customize->add_control(
        'contact_title',
        array(
            'section'         => 'contact_info_section',
            'label'           => __( 'Section Title', 'elegant-shop' ),
            'type'            => 'text',
        )   
    );

	$wp_customize->selective_refresh->add_partial( 'contact_title', array(
        'selector'        => '.page-template-contact .contact .heading h2.heading__title',
        'render_callback' => 'elegant_shop_contact_title',
    ) );

	/** Content Text */
    $wp_customize->add_setting( 
        'contact_content', 
        array(
            'default'           => '', 
            'sanitize_callback' => 'wp_kses_post',
        ) 
    );
    
    $wp_customize->add_control(
        'contact_content',
        array(
            'section'         => 'contact_info_section',
            'label'           => __( 'Section Content', 'elegant-shop' ),
            'type'            => 'textarea',
        )   
    );

	$wp_customize->add_setting(
		'location_title',
		array(
			'default'           => __( 'Address', 'elegant-shop' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control(
		'location_title',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Location Title', 'elegant-shop' ),
			'type'              => 'text',
		)
	);

	$wp_customize->add_setting(
		'location',
		array(
			'default'           => __( '4140 Parker Rd. Allentown, New Mexico 31134', 'elegant-shop' ),
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	
	$wp_customize->add_control(
		'location',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Location Description', 'elegant-shop' ),
			'type'              => 'textarea',
		)
	);

	$wp_customize->add_setting(
		'contact_info_title',
		array(
			'default'           => __( 'Contact', 'elegant-shop' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control(
		'contact_info_title',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Contact Information Title', 'elegant-shop' ),
			'type'              => 'text',
		)
	);

	$wp_customize->add_setting(
		'mail_title',
		array(
			'default'           => __( 'Email', 'elegant-shop' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control(
		'mail_title',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Mail Title', 'elegant-shop' ),
			'type'              => 'text',
		)
	);

	$wp_customize->add_setting(
		'mail_description',
		array(
			'default'           => __( 'debra.holt@example.com', 'elegant-shop' ),
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	
	$wp_customize->add_control(
		'mail_description',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Email Address', 'elegant-shop' ),
			'description'		=> __( 'You can add multiple emails by seperating it with comma. For example: xyz@gmail.com, abc@yahoo.com', 'elegant-shop' ), 
			'type'              => 'textarea',
		)
	);
       
	$wp_customize->add_setting(
		'phone_title',
		array(
			'default'           => __( 'Phone', 'elegant-shop' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control(
		'phone_title',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Phone Us Title', 'elegant-shop' ),
			'type'              => 'text',
		)
	);

	$wp_customize->add_setting(
		'phone_number',
		array(
			'default'           => __( '+1 (800) 123 456 789', 'elegant-shop' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control(
		'phone_number',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Phone Number', 'elegant-shop' ),
			'description'       => __( 'You can add multiple phone number seperating with comma', 'elegant-shop' ),
			'type'              => 'text',
		)
	);
	
	$wp_customize->add_setting(
		'contact_hours',
		array(
			'default'           => __( 'Hours of Operation', 'elegant-shop' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control(
		'contact_hours',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Contact Timing Title', 'elegant-shop' ),
			'type'              => 'text',
		)
	);

	$wp_customize->add_setting(
		'contact_hrs_content',
		array(
			'default'           => __( 'Monday - Friday: 09.00 - 20.00', 'elegant-shop' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control(
		'contact_hrs_content',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Contact Timing Content', 'elegant-shop' ),
			'description'       => __( 'You can add multiple contact hours seperating with comma. For example: Monday - Friday: 09.00 - 20.00, Sunday & Saturday: 10.30 - 22.30', 'elegant-shop' ),
			'type'              => 'text',
		)
	);

	/** Enable Social */
    $wp_customize->add_setting(
        'ed_social_contact',
        array(
            'default'           => true,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control( 
            $wp_customize,
            'ed_social_contact',
            array(
                'section'       => 'contact_info_section',
                'label'         => __( 'Enable Social Section', 'elegant-shop' ),
            )
        )
    );

	$wp_customize->add_setting(
		'social_title',
		array(
			'default'           => __( 'Follow Us:', 'elegant-shop' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'social_title',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Social Title', 'elegant-shop' ),
			'type'              => 'text',
		)
	);

	$wp_customize->selective_refresh->add_partial( 'social_title', array(
        'selector'        => '.page-template-contact .contact__social h6',
        'render_callback' => 'elegant_shop_contact_social_title',
    ) );
}
endif;
add_action( 'customize_register', 'elegant_shop_contact_page_info' );