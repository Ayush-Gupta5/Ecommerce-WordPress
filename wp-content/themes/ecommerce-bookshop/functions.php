<?php

add_action( 'after_setup_theme', 'ecommerce_bookshop_after_setup_theme' );
function ecommerce_bookshop_after_setup_theme() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( "responsive-embeds" );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'ecommerce-bookshop-featured-image', 2000, 1200, true );
    add_image_size( 'ecommerce-bookshop-thumbnail-avatar', 100, 100, true );

    // Set the default content width.
    $GLOBALS['content_width'] = 525;

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
    ) );

    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff'
    ) );

    add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

    add_editor_style( array( 'assets/css/editor-style.css') );
}

/**
 * Register widget area.
 */
function ecommerce_bookshop_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'ecommerce-bookshop' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'ecommerce-bookshop' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Page Sidebar', 'ecommerce-bookshop' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'ecommerce-bookshop' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Sidebar 3', 'ecommerce-bookshop' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'ecommerce-bookshop' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'ecommerce-bookshop' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'ecommerce-bookshop' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'ecommerce-bookshop' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'ecommerce-bookshop' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'ecommerce-bookshop' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'ecommerce-bookshop' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 4', 'ecommerce-bookshop' ),
        'id'            => 'footer-4',
        'description'   => __( 'Add widgets here to appear in your footer.', 'ecommerce-bookshop' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'ecommerce_bookshop_widgets_init' );

// enqueue styles for child theme
function ecommerce_bookshop_enqueue_styles() {

    wp_enqueue_style( 'ecommerce-bookshop-fonts', author_writer_fonts_url(), array(), null );

    // Bootstrap
    wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

    // Theme block stylesheet.
    wp_enqueue_style( 'ecommerce-bookshop-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'ecommerce-bookshop-child-style' ), '1.0' );

    // enqueue parent styles
    wp_enqueue_style('author-writer-style', get_template_directory_uri() .'/style.css');

    // enqueue child styles
    wp_enqueue_style('ecommerce-bookshop-child-style', get_stylesheet_directory_uri() .'/style.css', array('author-writer-style'));

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
}
add_action('wp_enqueue_scripts', 'ecommerce_bookshop_enqueue_styles');

function ecommerce_bookshop_admin_scripts() {
    // Backend CSS
    wp_enqueue_style( 'ecommerce-bookshop-backend-css', get_theme_file_uri( '/assets/css/customizer.css' ) );
}
add_action( 'admin_enqueue_scripts', 'ecommerce_bookshop_admin_scripts' );

function ecommerce_bookshop_header_style() {
    if ( get_header_image() ) :
    $ecommerce_bookshop_custom_header = "
        .headerbox{
            background-image:url('".esc_url(get_header_image())."');
            background-position: center top;
        }";
        wp_add_inline_style( 'ecommerce-bookshop-child-style', $ecommerce_bookshop_custom_header );
    endif;
}
add_action( 'wp_enqueue_scripts', 'ecommerce_bookshop_header_style' );

if ( ! defined( 'AUTHOR_WRITER_PRO_THEME_NAME' ) ) {
    define( 'AUTHOR_WRITER_PRO_THEME_NAME', esc_html__( 'Ecommerce Bookshop Pro', 'ecommerce-bookshop' ));
}
if ( ! defined( 'AUTHOR_WRITER_PRO_THEME_URL' ) ) {
    define( 'AUTHOR_WRITER_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/bookshop-wordpress-theme/'));
}
if ( ! defined( 'AUTHOR_WRITER_FREE_THEME_URL' ) ) {
	define( 'AUTHOR_WRITER_FREE_THEME_URL', 'https://www.themespride.com/themes/free-ecommerce-wordpress-theme/' );
}
if ( ! defined( 'AUTHOR_WRITER_DEMO_THEME_URL' ) ) {
	define( 'AUTHOR_WRITER_DEMO_THEME_URL', 'https://www.themespride.com/ecommerce-bookshop/' );
}
if ( ! defined( 'AUTHOR_WRITER_DOCS_THEME_URL' ) ) {
    define( 'AUTHOR_WRITER_DOCS_THEME_URL', 'https://www.themespride.com/demo/docs/ecommerce-bookshop/' );
}
if ( ! defined( 'AUTHOR_WRITER_DOCS_URL' ) ) {
    define( 'AUTHOR_WRITER_DOCS_URL', 'https://www.themespride.com/demo/docs/ecommerce-bookshop/' );
}
if ( ! defined( 'AUTHOR_WRITER_RATE_THEME_URL' ) ) {
    define( 'AUTHOR_WRITER_RATE_THEME_URL', 'https://wordpress.org/support/theme/ecommerce-bookshop/reviews/#new-post' );
}
if ( ! defined( 'AUTHOR_WRITER_SUPPORT_THEME_URL' ) ) {
    define( 'AUTHOR_WRITER_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/ecommerce-bookshop' );
}
if ( ! defined( 'AUTHOR_WRITER_CHANGELOG_THEME_URL' ) ) {
    define( 'AUTHOR_WRITER_CHANGELOG_THEME_URL', get_stylesheet_directory() . '/readme.txt' );
}

function ecommerce_bookshop_remove_customize_register() {
    global $wp_customize;
    $wp_customize->remove_section( 'author_writer_color_option' );

    $wp_customize->remove_setting( 'author_writer_bar_icon_link' );
    $wp_customize->remove_control( 'author_writer_bar_icon_link' );
}
add_action( 'customize_register', 'ecommerce_bookshop_remove_customize_register', 11 );

define('ECOMMERCE_BOOKSHOP_CREDIT',__('https://www.themespride.com/themes/free-ecommerce-wordpress-theme/','ecommerce-bookshop') );
if ( ! function_exists( 'ecommerce_bookshop_credit' ) ) {
	function ecommerce_bookshop_credit(){
		echo "<a href=".esc_url(ECOMMERCE_BOOKSHOP_CREDIT)." target='_blank'>".esc_html__('Ecommerce Bookshop WordPress Theme','ecommerce-bookshop')."</a>";
	}
}
