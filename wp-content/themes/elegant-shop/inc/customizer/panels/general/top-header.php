<?php
/**
 * Header Settings
 *
 * @package Elegant_Shop
 */

function elegant_shop_customize_register_general_top_header( $wp_customize ) {
	/** Header Settings */
    $wp_customize->add_section(
        'top_bar_settings',
        array(
            'title'    => __( 'Top Bar Settings', 'elegant-shop' ),
            'priority' => 15,
            'panel'    => 'general_settings',
        )
    );

    /** Enable Top Bar */
    $wp_customize->add_setting( 
        'ed_top_bar', 
        array(
            'default'           => false,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control( 
            $wp_customize,
            'ed_top_bar',
            array(
                'section'        => 'top_bar_settings',
                'label'          => __( 'Enable Top Bar', 'elegant-shop' ),
                'description'    => __( 'Enable to show top bar on top of header.', 'elegant-shop' ),
            )
        )
    );

    /** Notification Text */
    $wp_customize->add_setting(
        'notification_text',
        array(
            'default'           => __( 'Due to the COVID 19 pandamic, our shipping may be delayed ! ','elegant-shop' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage', 
        )
    );
    
    $wp_customize->add_control(
        'notification_text',
        array(
            'type'    => 'text',
            'section' => 'top_bar_settings',
            'label'   => __( 'Title', 'elegant-shop' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'notification_text', array(
        'selector' => '.notification-wrap .notification-bar .get-notification-text span.notification-text',
        'render_callback' => 'elegant_shop_topbar_notification_text',
    ) );

    /** Notification Button */
    $wp_customize->add_setting(
        'notification_label',
        array(
            'default'           => __( 'Click here to know more','elegant-shop' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage', 
        )
    );
    
    $wp_customize->add_control(
        'notification_label',
        array(
            'type'    => 'text',
            'section' => 'top_bar_settings',
            'label'   => __( 'Button Label', 'elegant-shop' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'notification_label', array(
        'selector' => '.notification-wrap .notification-bar .get-notification-text a.btn-readmore',
        'render_callback' => 'elegant_shop_notification_btn_text',
    ) );

    /** Notification Button URL*/
    $wp_customize->add_setting(
        'notification_btn_url',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw', 
        )
    );
    
    $wp_customize->add_control(
        'notification_btn_url',
        array(
            'type'    => 'url',
            'section' => 'top_bar_settings',
            'label'   => __( 'Button URL', 'elegant-shop' ),
        )
    );

    /** Enable Notification in New Tab */
    $wp_customize->add_setting( 
        'ed_open_new_target', 
        array(
            'default'           => false,
            'sanitize_callback' => 'elegant_shop_sanitize_checkbox'
        ) 
    );
}
add_action( 'customize_register', 'elegant_shop_customize_register_general_top_header' );