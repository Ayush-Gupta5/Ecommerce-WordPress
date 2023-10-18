<?php
/**
 * Footer Setting
 *
 * @package Elegant_Shop
 */
if ( ! function_exists( 'elegant_shop_customize_register_footer' ) ) :

function elegant_shop_customize_register_footer( $wp_customize ) {
    
    $wp_customize->add_section(
        'footer_settings',
        array(
            'title'      => __( 'Footer Settings', 'elegant-shop' ),
            'priority'   => 199,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Footer Copyright */
    $wp_customize->add_setting(
        'footer_copyright',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'footer_copyright',
        array(
            'label'       => __( 'Footer Copyright Text', 'elegant-shop' ),
            'description' => __( 'You can change footer copyright and use your own custom text from here. Use [the-year] shortcode to display current year & [the-site-link] shortcode to display site link.', 'elegant-shop' ),
            'section'     => 'footer_settings',
            'type'        => 'textarea',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
        'selector' => '.site-info .copyright',
        'render_callback' => 'elegant_shop_get_footer_copyright',
    ) );

    /** About Featured Image */
	$wp_customize->add_setting( 
		'footer_image', 
		array(
			'default' 			=> '',
			'sanitize_callback' => 'elegant_shop_sanitize_number_absint'
    	)
	);
 
    $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control(
            $wp_customize,
            'footer_image',
            array(
                'label'           => __( 'Footer Image', 'elegant-shop' ),
                'section'         => 'footer_settings',
                'height'          => '40',
                'width'           => '320',
            )
        )
    );

    $wp_customize->add_setting(
        'footer_image_link',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'footer_image_link',
        array(
            'label'           => __( 'Footer image link', 'elegant-shop' ),
            'section'         => 'footer_settings',
            'type'            => 'text',
        )
    );
        
}
endif;
add_action( 'customize_register', 'elegant_shop_customize_register_footer' );