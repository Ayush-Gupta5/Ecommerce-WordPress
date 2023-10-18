<?php
/**
 * Theme functions and definitions
 *
 * @package Electronics Gadgets
 */ 

if ( ! function_exists( 'electronics_gadgets_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function electronics_gadgets_enqueue_styles() {
		wp_enqueue_style( 'electronics-gadgets-block-patterns-style-frontend', get_theme_file_uri('/css/block-frontend.css') );
		wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/css/bootstrap.css' );
		wp_enqueue_style( 'electronics-gadgets-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'electronics-gadgets-style', get_stylesheet_directory_uri() . '/style.css', array( 'electronics-gadgets-style-parent' ), '1.0.0' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'electronics_gadgets_enqueue_styles');

/**
 * Enqueue block editor style
 */
function electronics_gadgets_block_editor_styles() {
	wp_enqueue_style( 'electronics-store-font', electronics_store_font_url(), array() );
	wp_enqueue_style( 'electronics-gadgets-block-patterns-style-editor', get_theme_file_uri( '/css/block-editor.css' ), false, '1.0', 'all' );
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/css/bootstrap.css' );
    wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/css/fontawesome-all.css' );
}
add_action( 'enqueue_block_editor_assets', 'electronics_gadgets_block_editor_styles' );

function electronics_gadgets_scripts() {	
	wp_enqueue_script( 'electronics-gadgets-custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'electronics_gadgets_scripts' );

function electronics_gadgets_customize_register() {
	global $wp_customize;
	$wp_customize->remove_setting( 'electronics_store_shipping_text' );
	$wp_customize->remove_control( 'electronics_store_shipping_text' );
	$wp_customize->remove_setting( 'electronics_store_product_deals_image' );
	$wp_customize->remove_control( 'electronics_store_product_deals_image' );
	$wp_customize->remove_setting( 'electronics_store_product_deal_text' );
	$wp_customize->remove_control( 'electronics_store_product_deal_text' );
}
add_action( 'customize_register', 'electronics_gadgets_customize_register', 11 );

/* Theme Setup */
if ( ! function_exists( 'electronics_gadgets_setup' ) ) :

function electronics_gadgets_setup() {

	$GLOBALS['content_width'] = apply_filters( 'electronics_gadgets_content_width', 640 );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('electronics-gadgets-homepage-thumb',240,145,true);
	
   	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'electronics-gadgets' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );
	
	add_theme_support ('html5', array (
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

	add_theme_support('responsive-embeds');

	/* Selective refresh for widgets */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', electronics_store_font_url() ) );

	// Dashboard Theme Notification
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'electronics_gadgets_activation_notice' );
	}	

}
endif;
add_action( 'after_setup_theme', 'electronics_gadgets_setup' );

// Dashboard Theme Notification
function electronics_gadgets_activation_notice() {
	echo '<div class="welcome-notice notice notice-success is-dimdissible">';
		echo '<h2>'. esc_html__( 'Thank You!!!!!', 'electronics-gadgets' ) .'</h2>';
		echo '<p>'. esc_html__( 'Much grateful to you for choosing our electronics gadgets theme from themescaliber. we praise you for opting our services over others. we are obliged to invite you on our welcome page to render you with our outstanding services.', 'electronics-gadgets' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=electronics_gadgets_guide' ) ) .'" class="button button-primary">'. esc_html__( 'Click Here...', 'electronics-gadgets' ) .'</a></p>';
	echo '</div>';
}

function electronics_gadgets_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'electronics-gadgets' ),
		'description'   => __( 'Appears on blog page sidebar', 'electronics-gadgets' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s mb-4 p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title pt-0">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'electronics_gadgets_widgets_init' );

function electronics_gadgets_enqueue_comments_reply() {
    if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
        wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
    }
}
add_action( 'wp_enqueue_scripts', 'electronics_gadgets_enqueue_comments_reply' );

add_action( 'init', 'electronics_gadgets_remove_action');
function electronics_gadgets_remove_action() {
    remove_action( 'admin_menu','electronics_store_gettingstarted' );
    remove_action( 'admin_notices','electronics_store_activation_notice' );
}

// URL DEFINES
define('ELECTRONICS_GADGETS_SUPPORT',__('https://wordpress.org/support/theme/electronics-gadgets/','electronics-gadgets'));
define('ELECTRONICS_GADGETS_REVIEW',__('https://wordpress.org/support/theme/electronics-gadgets/reviews/','electronics-gadgets'));
define('ELECTRONICS_GADGETS_BUY_NOW',__('https://www.themescaliber.com/themes/electronic-gadget-wordpress-theme/','electronics-gadgets'));
define('ELECTRONICS_GADGETS_LIVE_DEMO',__('https://www.themescaliber.com/electronics-gadgets-pro/','electronics-gadgets'));
define('ELECTRONICS_GADGETS_PRO_DOC',__('https://themescaliber.com/demo/doc/electronics-gadgets-pro/','electronics-gadgets'));
define('ELECTRONICS_GADGETS_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','electronics-gadgets'));
define('ELECTRONICS_GADGETS_THEME_URL',__('https://www.themescaliber.com/themes/free-gadget-wordpress-theme/', 'electronics-gadgets'));

if ( ! defined( 'ELECTRONICS_STORE_PRO_NAME' ) ) {
	define( 'ELECTRONICS_STORE_PRO_NAME', esc_html__( 'Electronics Gadgets Pro', 'electronics-gadgets' ));
}
if ( ! defined( 'ELECTRONICS_STORE_PRO_URL' ) ) {
	define( 'ELECTRONICS_STORE_PRO_URL', esc_url('https://www.themescaliber.com/themes/electronics-gadgets-wordpress-theme/'));
}

function electronics_gadgets_credit_link() {
    echo "<a href=".esc_url(ELECTRONICS_GADGETS_THEME_URL)." target='_blank'>".esc_html__('Electronics Gadgets WordPress Theme','electronics-gadgets')."</a>";
}
/* Implement the get started page */
require get_theme_file_path() . '/inc/dashboard/getstart.php';

/* Block Pattern */
require get_theme_file_path() . '/block-patterns.php';