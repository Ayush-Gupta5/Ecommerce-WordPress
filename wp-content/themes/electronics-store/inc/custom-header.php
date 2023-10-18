<?php
/**
 * @package Electronics Store
 * @subpackage electronics-store
 * @since electronics-store 1.0
 * Setup the WordPress core custom header feature.
 *
 * @uses electronics_store_header_style()
*/

function electronics_store_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'electronics_store_custom_header_args', array(
		'default-text-color' => 'fff',
		'header-text' 	     =>	false,
		'width'              => 1400,
		'height'             => 80,
		'flex-height'        => true,
	    'flex-width'         => true,
		'wp-head-callback'   => 'electronics_store_header_style',
	) ) );

}

add_action( 'after_setup_theme', 'electronics_store_custom_header_setup' );

if ( ! function_exists( 'electronics_store_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see electronics_store_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'electronics_store_header_style' );
function electronics_store_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$electronics_store_custom_css = "
        .middle-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size: 100% 100%;
		}
		";
	   	wp_add_inline_style( 'electronics-store-basic-style', $electronics_store_custom_css );
	endif;
}
endif; // electronics_store_header_style
