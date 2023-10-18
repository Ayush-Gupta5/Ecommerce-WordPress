<?php
/**
 * elegant shop pro Theme Customizer
 *
 * @package elegant_shop
 */

if ( ! function_exists( 'elegant_shop_customize_register' ) ) :
 /**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function elegant_shop_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'refresh';
	$wp_customize->get_setting( 'background_image' )->transport = 'refresh';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'elegant_shop_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'elegant_shop_customize_partial_blogdescription',
			)
		);
	}

}
endif;
add_action( 'customize_register', 'elegant_shop_customize_register' );


$elegant_shop_panels  = array( 'home', 'general', 'contact' );

$elegant_shop_sections  = array( 'footer', 'layout', 'info' );

$elegant_shop_sub_sections = array(
	'home'	 		=> array ( 'featured', 'category', 'new-arrivals', 'featured-products', 'product-cat', 'blog' ),
	'general'		=> array ( 'header', 'top-header', 'appearance', 'post-page', 'misc' ),
	'contact'		=> array ( 'contact-detail', 'contact-form', 'contact-map' ),
);

foreach( $elegant_shop_panels as $panel ){
    require get_template_directory() . '/inc/customizer/panels/' . $panel . '.php';
}

foreach( $elegant_shop_sub_sections as $sub => $sec ){ 
    foreach( $sec as $sections ){        
        require get_template_directory() . '/inc/customizer/panels/' . $sub . '/' . $sections . '.php';
    }
}

foreach( $elegant_shop_sections as $section ){
    require get_template_directory() . '/inc/customizer/section/' . $section . '.php';
}

/**
 * Sanitization functions
 */
require get_template_directory() . '/inc/customizer/sanitization-functions.php';
/**
 *Active callback functions
 */
require get_template_directory() . '/inc/customizer/active-callback.php';
/**
 * Partial Refresh Functions
 */
require get_template_directory() . '/inc/customizer/partial-refresh.php';

if ( ! function_exists( 'elegant_shop_customize_preview_js' ) ) :
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function elegant_shop_customize_preview_js() {
	wp_enqueue_script( 'elegant-shop-customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), ELEGANT_SHOP_THEME_VERSION, true );
}
endif;
add_action( 'customize_preview_init', 'elegant_shop_customize_preview_js' );

if ( ! function_exists( 'elegant_shop_customize_script' ) ) :

function elegant_shop_customize_script(){

	wp_enqueue_style( 'elegant-shop-customize', get_template_directory_uri() . '/inc/assets/css/customize.css', array(), ELEGANT_SHOP_THEME_VERSION );
    wp_enqueue_script( 'elegant-shop-customize', get_template_directory_uri() . '/inc/js/customize.js', array( 'jquery', 'customize-controls' ), ELEGANT_SHOP_THEME_VERSION, true );

}
endif;
add_action( 'customize_controls_enqueue_scripts', 'elegant_shop_customize_script' );