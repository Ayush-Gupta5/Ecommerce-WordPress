<?php
/**
 * Post Page Settings
 *
 * @package Elegant_Shop
 */

function elegant_shop_customize_register_general_post_page( $wp_customize ) {
    
    /** Posts(Blog) & Pages Settings */
    $wp_customize->add_section(
        'post_page_settings',
        array(
            'title'    => __( 'Posts(Blog) & Pages Settings', 'elegant-shop' ),
            'priority' => 50,
            'panel'    => 'general_settings',
        )
    );
    
    /** Prefix Archive Page */
    $wp_customize->add_setting( 
        'ed_prefix_archive', 
        array(
            'default'           => true,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Elegant_Shop_Pro_Toggle_Control( 
			$wp_customize,
			'ed_prefix_archive',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Prefix in Archive Page', 'elegant-shop' ),
                'description' => __( 'Enable to hide prefix in archive page.', 'elegant-shop' ),
			)
		)
    );
    
    /** Blog Excerpt */
    $wp_customize->add_setting( 
        'ed_excerpt', 
        array(
            'default'           => true,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Elegant_Shop_Pro_Toggle_Control( 
			$wp_customize,
			'ed_excerpt',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Enable Blog Excerpt', 'elegant-shop' ),
                'description' => __( 'Enable to show excerpt or disable to show full post content.', 'elegant-shop' ),
			)
		)
	);
    
    /** Excerpt Length */
    $wp_customize->add_setting( 
        'excerpt_length', 
        array(
            'default'           => 55,
            'sanitize_callback' => 'elegant_shop_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Elegant_Shop_Pro_Slider_Control( 
			$wp_customize,
			'excerpt_length',
			array(
				'section'	  => 'post_page_settings',
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
    
    /** Read More Text */
    $wp_customize->add_setting(
        'read_more_text',
        array(
            'default'           => __( 'Read More', 'elegant-shop' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'read_more_text',
        array(
            'type'    => 'text',
            'section' => 'post_page_settings',
            'label'   => __( 'Read More Text', 'elegant-shop' ),
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'read_more_text', array(
        'selector' => '.entry-footer .btn-readmore',
        'render_callback' => 'rara_ecommerce_pro_get_read_more',
    ) );
    
    /** Note */
    $wp_customize->add_setting(
        'post_note_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Note_Control( 
			$wp_customize,
			'post_note_text',
			array(
				'section'	  => 'post_page_settings',
                'description' => sprintf( __( '%s These options affect your individual posts.', 'elegant-shop' ), '<hr/>' ),
			)
		)
    );
    
    /** Hide Author Section */
    $wp_customize->add_setting( 
        'ed_author', 
        array(
            'default'           => false,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Elegant_Shop_Pro_Toggle_Control( 
			$wp_customize,
			'ed_author',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Author Section', 'elegant-shop' ),
                'description' => __( 'Enable to hide author section.', 'elegant-shop' ),
			)
		)
	);
    
    /** Show Related Posts */
    $wp_customize->add_setting( 
        'ed_related', 
        array(
            'default'           => true,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Elegant_Shop_Pro_Toggle_Control( 
			$wp_customize,
			'ed_related',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Show Related Posts', 'elegant-shop' ),
                'description' => __( 'Enable to show related posts in single page.', 'elegant-shop' ),
			)
		)
	);
    
    /** Related Posts section title */
    $wp_customize->add_setting(
        'related_post_title',
        array(
            'default'           => __( 'You may also like...', 'elegant-shop' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'related_post_title',
        array(
            'type'            => 'text',
            'section'         => 'post_page_settings',
            'label'           => __( 'Related Posts Section Title', 'elegant-shop' ),
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'related_post_title', array(
        'selector' => '.related-posts .title',
        'render_callback' => 'rara_ecommerce_pro_get_related_title',
    ) );
    
    /** Hide Category */
    $wp_customize->add_setting( 
        'ed_category', 
        array(
            'default'           => false,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Elegant_Shop_Pro_Toggle_Control( 
			$wp_customize,
			'ed_category',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Category', 'elegant-shop' ),
                'description' => __( 'Enable to hide category.', 'elegant-shop' ),
			)
		)
	);
    
    /** Hide Post Author */
    $wp_customize->add_setting( 
        'ed_post_author', 
        array(
            'default'           => false,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Elegant_Shop_Pro_Toggle_Control( 
			$wp_customize,
			'ed_post_author',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Post Author', 'elegant-shop' ),
                'description' => __( 'Enable to hide post author.', 'elegant-shop' ),
			)
		)
	);
    
    /** Hide Posted Date */
    $wp_customize->add_setting( 
        'ed_post_date', 
        array(
            'default'           => false,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Elegant_Shop_Pro_Toggle_Control( 
			$wp_customize,
			'ed_post_date',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Posted Date', 'elegant-shop' ),
                'description' => __( 'Enable to hide posted date.', 'elegant-shop' ),
			)
		)
	);
    /** Posts(Blog) & Pages Settings Ends */
    
}
add_action( 'customize_register', 'elegant_shop_customize_register_general_post_page' );