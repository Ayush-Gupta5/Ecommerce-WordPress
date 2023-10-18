<?php
/**
 * Blog and News Settings
 * 
 * @package Elegant_Shop
 */

function elegant_shop_blog_frontpage_settings( $wp_customize ){
    
	$wp_customize->add_section( 'blogs_news_sec', 
	    array(
	        'title'         => esc_html__( 'Blogs Section', 'elegant-shop' ),
	        'priority'      => 50,
	        'panel'         => 'frontpage_settings'
	    ) 
	);

    $wp_customize->add_setting(
        'ed_blog_sec',
        array(
            'default'           => false,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control( 
            $wp_customize,
            'ed_blog_sec',
            array(
                'section'       => 'blogs_news_sec',
                'label'         => __( 'Enable Blog Section', 'elegant-shop' ),
            )
        )
    );

    $wp_customize->add_setting(
        'blog_title',
        array(
            'default'           => __( 'News And Blogs', 'elegant-shop' ),
            'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'blog_title',
        array(
            'section'           => 'blogs_news_sec',
            'label'             => __( 'Section Title', 'elegant-shop' ),
            'type'              => 'text',
        )
    );
	
	$wp_customize->selective_refresh->add_partial( 'blog_title', array(
        'selector'        => '.home .news-blog .heading h2.heading__underlined--center',
        'render_callback' => 'elegant_shop_blog_title',
    ) );

    $wp_customize->add_setting(
        'blog_btn_label',
        array(
            'default'           => __( 'Read More', 'elegant-shop' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'blog_btn_label',
        array(
            'label'           => __( 'Button label', 'elegant-shop' ),
            'description'     => __( 'Add button label for blog and news section.', 'elegant-shop' ),
            'section'         => 'blogs_news_sec',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'blog_btn_label', array(
        'selector' => '.home .news-blog .blog-card a.btn',
        'render_callback' => 'elegant_shop_get_blog_btn_label',
    ) );

	$wp_customize->add_setting( 
        'blog_new_tab', 
        array(
            'default'           => false,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control( 
            $wp_customize,
            'blog_new_tab',
            array(
                'section'     => 'blogs_news_sec',
                'label'       => __( 'Enable to open link in a new tab', 'elegant-shop' ),
            )
        )
    );

}
add_action( 'customize_register', 'elegant_shop_blog_frontpage_settings' );