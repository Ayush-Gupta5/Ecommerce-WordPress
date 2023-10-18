<?php
/**
 * elegant shop pro Custom Control
 * 
 * @package elegant_shop
*/

if( ! function_exists( 'elegant_shop_register_custom_controls' ) ) :
/**
 * Register Custom Controls
*/
function elegant_shop_register_custom_controls( $wp_customize ){    
    // Load our custom control.
    require_once get_template_directory() . '/inc/custom-controls/note/class-note-control.php';
    require_once get_template_directory() . '/inc/custom-controls/radioimg/class-radio-image-control.php';
    require_once get_template_directory() . '/inc/custom-controls/repeater/class-repeater-setting.php';
    require_once get_template_directory() . '/inc/custom-controls/repeater/class-control-repeater.php';
    require_once get_template_directory() . '/inc/custom-controls/slider/class-slider-control.php';
    require_once get_template_directory() . '/inc/custom-controls/toggle/class-toggle-control.php';    
            
    // Register the control type.
    $wp_customize->register_control_type( 'Elegant_Shop_Pro_Radio_Image_Control' );
    $wp_customize->register_control_type( 'Elegant_Shop_Pro_Slider_Control' );
    $wp_customize->register_control_type( 'Elegant_Shop_Pro_Toggle_Control' );
}
endif;
add_action( 'customize_register', 'elegant_shop_register_custom_controls' );