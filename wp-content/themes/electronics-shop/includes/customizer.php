<?php
/**
 * Theme Customizer
 *
 * @package Elegant_Shop
 */

/**
 * Register Custom Controls
 */
function feminine_business_register_custom_controls($wp_customize)
{

    // Load our custom control.
    include_once get_template_directory() . '/inc/custom-controls/note/class-note-control.php';
    include_once get_template_directory() . '/inc/custom-controls/radioimg/class-radio-image-control.php';
    include_once get_template_directory() . '/inc/custom-controls/repeater/class-repeater-setting.php';
    include_once get_template_directory() . '/inc/custom-controls/repeater/class-control-repeater.php';
    include_once get_template_directory() . '/inc/custom-controls/toggle/class-toggle-control.php';
    // Register the control type.

    $wp_customize->register_control_type('Elegant_Shop_Pro_Toggle_Control');
}
add_action('customize_register', 'elegant_shop_register_custom_controls');

function elegant_shop_overide_customizer_values( $wp_customize )
{
    $wp_customize->remove_section('featured_sec_home');
}
add_action('customize_register', 'elegant_shop_overide_customizer_values', 999);

function elegant_shop_customize_register_home_featured( $wp_customize )
{

    $wp_customize->add_section(
        'featured_sec_home',
        array(
        'title'         => esc_html__('Featured Section', 'electronics-shop'),
        'priority'      => 10,
        'panel'         => 'frontpage_settings'
        )
    );

    $wp_customize->add_setting(
        'ed_featured_sec',
        array(
        'default'           => false,
        'sanitize_callback' => 'elegant_shop_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control(
            $wp_customize,
            'ed_featured_sec',
            array(
                'section'       => 'featured_sec_home',
                'label'         => __('Enable Featured Section', 'electronics-shop'),
            )
        )
    );

    $wp_customize->add_setting(
        new Elegant_Shop_Pro_Control_Repeater_Setting(
            $wp_customize,
            'featured_repeater_home',
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Elegant_Shop_Pro_Control_Repeater_Setting', 'sanitize_repeater_setting' ),
            )
        )
    );

    $wp_customize->add_control(
        new Elegant_Shop_Pro_Control_Repeater(
            $wp_customize,
            'featured_repeater_home',
            array(
                'section' => 'featured_sec_home',
                'label'      => __('Featured', 'electronics-shop'),
                'fields'  => array(
                    'tag' => array(
                        'type'    => 'text',
                        'label'   => __('Enter Tag', 'electronics-shop'),
                    ),
                    'title' => array(
                        'type'    => 'text',
                        'label'   => __('Enter Title', 'electronics-shop'),
                    ),
                    'label' => array(
                        'type'    => 'text',
                        'label'   => __('Enter label', 'electronics-shop'),
                    ),
                    'link' => array(
                        'type'    => 'url',
                        'label'   => __('Link', 'electronics-shop'),
                        'description' => __('Example: https://facebook.com', 'electronics-shop'),
                    ),
                    'image' => array(
                        'type'    => 'image',
                        'label'   => __('Select Image', 'electronics-shop'),
                    ),
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => __('Featured', 'electronics-shop'),
                    'field' => 'title'
                ),
                'choices' => array(
                    'limit' => 2
                )
            )
        )
    );

    $wp_customize->add_setting(
        'featured_new_tab_home',
        array(
        'default'           => false,
        'sanitize_callback' => 'elegant_shop_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control(
            $wp_customize,
            'featured_new_tab_home',
            array(
                'section'     => 'featured_sec_home',
                'label'       => __('Enable to open link in a new tab', 'electronics-shop'),
            )
        )
    );

}
add_action('customize_register', 'elegant_shop_customize_register_home_featured');


function elegant_shop_customize_register_home_category( $wp_customize )
{

    $wp_customize->add_section(
        'category_sec',
        array(
        'title'         => esc_html__('Category Section', 'electronics-shop'),
        'priority'      => 60,
        'panel'         => 'frontpage_settings'
        )
    );

    $wp_customize->add_setting(
        'ed_category_sec',
        array(
        'default'           => false,
        'sanitize_callback' => 'elegant_shop_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control(
            $wp_customize,
            'ed_category_sec',
            array(
                'section'       => 'category_sec',
                'label'         => __('Enable Category Section', 'electronics-shop'),
            )
        )
    );

    $wp_customize->add_setting(
        new Elegant_Shop_Pro_Control_Repeater_Setting(
            $wp_customize,
            'cat_select_repeater',
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Elegant_Shop_Pro_Control_Repeater_Setting', 'sanitize_repeater_setting' ),
            )
        )
    );

    $wp_customize->add_setting(
        'category_title',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );

    $wp_customize->add_control(
        'category_title',
        array(
            'label'             => __('Categories Title', 'electronics-shop'),
            'type'              => 'text',
            'section'           => 'category_sec',
            'priority'          => 10
        )
    );

    $wp_customize->add_control(
        new Elegant_Shop_Pro_Control_Repeater(
            $wp_customize,
            'cat_select_repeater',
            array(
                'section' => 'category_sec',
                'label'      => __('Categories', 'electronics-shop'),
                'fields'  => array(
                    'choose_cat' => array(
                        'type'    => 'select',
                        'label'   => __('Choose Category', 'electronics-shop'),
                        'choices' => elegant_shop_get_categories(true, 'product_cat', false),
                    ),
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => __('Categories', 'electronics-shop'),
                ),
                'choices' => array(
                    'limit' => 7
                )
            )
        )
    );

    $wp_customize->add_setting(
        'cat_sec_new_tab',
        array(
        'default'           => false,
        'sanitize_callback' => 'elegant_shop_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        new Elegant_Shop_Pro_Toggle_Control(
            $wp_customize,
            'cat_sec_new_tab',
            array(
                'section'     => 'category_sec',
                'label'       => __('Enable to open link in a new tab', 'electronics-shop'),
            )
        )
    );



}
add_action('customize_register', 'elegant_shop_customize_register_home_category');