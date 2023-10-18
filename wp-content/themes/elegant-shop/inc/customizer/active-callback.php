<?php 
/**
 * Active Callback
 * 
 * @package Elegant_Shop
*/

if ( ! function_exists( 'elegant_shop_banner_ac' ) ) :
/**
 * Active Callback for Banner Slider
*/
function elegant_shop_banner_ac( $control ){
    $banner        = $control->manager->get_setting( 'ed_banner_section' )->value();
    $control_id    = $control->id;
    
    if ( $control_id == 'header_image' && $banner == 'static_banner'  ) return true;
    if ( $control_id == 'header_video' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'external_header_video' && $banner == 'static_banner' ) return true;

    return false; 
}
endif;

if ( ! function_exists( 'elegant_shop_loading_ac' ) ) :
/**
 * Active Callback for pagination
*/
function elegant_shop_loading_ac( $control ){
    
    $pagination_type = $control->manager->get_setting( 'pagination_type' )->value();
    
    if ( $pagination_type == 'load_more' ) return true;
    
    return false;
}
endif;