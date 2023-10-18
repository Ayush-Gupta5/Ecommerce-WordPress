<?php
/**
 * Elegant Shop Pro Custom functions and definitions
 *
 * @package Elegant_Shop
 */

$elegant_shop_theme_data = wp_get_theme();
if( ! defined( 'ELEGANT_SHOP_THEME_VERSION' ) ) define( 'ELEGANT_SHOP_THEME_VERSION', $elegant_shop_theme_data->get( 'Version' ) );
if( ! defined( 'ELEGANT_SHOP_PRO_THEME_NAME' ) ) define( 'ELEGANT_SHOP_PRO_THEME_NAME', $elegant_shop_theme_data->get( 'Name' ) );

if ( ! function_exists( 'elegant_shop_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function elegant_shop_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Elegant Shop Pro, use a find and replace
		* to change 'elegant-shop' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'elegant-shop', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary'   => esc_html__( 'Primary', 'elegant-shop' ),
			'secondary' => esc_html__( 'Secondary', 'elegant-shop' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'elegant_shop_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_image_size( 'elegant-shop-blog', 390, 250 );
	add_image_size( 'elegant-shop-product', 280, 324 );
	add_image_size( 'elegant-shop-abt-featured', 340, 411 );
	add_image_size( 'elegant-shop-abt-featured-second', 301, 270 );
}
endif;
add_action( 'after_setup_theme', 'elegant_shop_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function elegant_shop_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'elegant_shop_content_width', 640 );
}
add_action( 'after_setup_theme', 'elegant_shop_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function elegant_shop_scripts() {

	// Use minified libraries if SCRIPT_DEBUG is false
	$build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css' . $build . '/owl.carousel'. $suffix . '.css', array(), '2.3.4' );
	wp_enqueue_style( 'elegant-shop-style', get_stylesheet_uri(), array(), ELEGANT_SHOP_THEME_VERSION );

	// Add styles inline.
	wp_add_inline_style( 'elegant-shop-style', elegant_shop_get_font_face_styles() );
	wp_style_add_data( 'elegant-shop-style', 'rtl', 'replace' );

	wp_enqueue_script( 'elegant-shop-accessibility', get_template_directory_uri() . '/js' . $build . '/modal-accessibility' . $suffix . '.js', array(), ELEGANT_SHOP_THEME_VERSION, true );
	wp_enqueue_script( 'elegant-shop-navigation', get_template_directory_uri() . '/inc/js/navigation.js', array(), ELEGANT_SHOP_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'jquery' );

    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js' . $build . '/owl.carousel' . $suffix . '.js', array('jquery'), '2.3.4', true );

    wp_enqueue_script( 'owl-thumbs', get_template_directory_uri() . '/js' . $build . '/owl.carousel.thumbs' . $suffix . '.js', array('jquery'), '2.0.0', true );

    wp_enqueue_script( 'elegant-custom', get_template_directory_uri() . '/js' . $build . '/custom' . $suffix . '.js', array('jquery'), ELEGANT_SHOP_THEME_VERSION, true );

	$array = [
        'rtl'           => is_rtl(),
		'home_url'      => home_url(),
        'theme_nonce'   => wp_create_nonce( 'elegant_shop_theme_nonce' )
    ];

    wp_localize_script( 'elegant-custom', 'esp_data', $array );

}
add_action( 'wp_enqueue_scripts', 'elegant_shop_scripts' );

if( ! function_exists( 'elegant_shop_post_classes' ) ) :
	/**
	 * Add custom classes to the array of post classes.
	*/
	function elegant_shop_post_classes( $classes ){

		$classes[] = 'latest_post';

		return $classes;
	}
endif;
add_filter( 'post_class', 'elegant_shop_post_classes' );

if ( ! function_exists( 'elegant_shop_load_media' ) ) :
/**
 * Enqueue admin css
*/
function elegant_shop_load_media() {
	wp_enqueue_style( 'elegant-shop-admin-style', get_template_directory_uri() . '/inc/assets/css/admin.css', array(), ELEGANT_SHOP_THEME_VERSION );
}
endif;
add_action( 'admin_enqueue_scripts', 'elegant_shop_load_media' );