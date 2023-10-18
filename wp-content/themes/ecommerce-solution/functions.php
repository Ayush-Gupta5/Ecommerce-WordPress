<?php
/**
 * Ecommerce Solution functions and definitions
 * @package Ecommerce Solution
 */
 /* Breadcrumb Begin */
  function ecommerce_solution_the_breadcrumb() {
  	if (!is_home()) {
  		echo '<a href="';
  			echo esc_url( home_url() );
  		echo '">';
  			bloginfo('name');
  		echo "</a> ";
  		if (is_category() || is_single()) {
  			the_category(',');
  			if (is_single()) {
  				echo "<span> ";
  					the_title();
  				echo "</span> ";
  			}
  		} elseif (is_page()) {
  			echo "<span> ";
  				the_title();
  		}
  	}
  }
/* Theme Setup */
if ( ! function_exists( 'ecommerce_solution_setup' ) ) :

function ecommerce_solution_setup() {

	$GLOBALS['content_width'] = apply_filters( 'ecommerce_solution_content_width', 640 );

	load_theme_textdomain( 'ecommerce-solution', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('ecommerce-solution-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ecommerce-solution' ),
		'topmenus' => __( 'Top Menu', 'ecommerce-solution' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support('responsive-embeds');
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', ecommerce_solution_font_url() ) );
}
endif; // ecommerce_solution_setup
add_action( 'after_setup_theme', 'ecommerce_solution_setup' );

/* Theme Widgets Setup */
function ecommerce_solution_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'ecommerce-solution' ),
		'description'   => __( 'Appears on posts and pages', 'ecommerce-solution' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Posts and Pages Sidebar', 'ecommerce-solution' ),
		'description'   => __( 'Appears on posts and pages', 'ecommerce-solution' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'ecommerce-solution' ),
		'description'   => __( 'Appears on posts and pages', 'ecommerce-solution' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$ecommerce_solution_widget_areas = get_theme_mod('footer_widget_areas', '4');
	for ($i=1; $i<=$ecommerce_solution_widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Widget ', 'ecommerce-solution' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'ecommerce_solution_widgets_init' );

/* Theme Font URL */
function ecommerce_solution_font_url(){
	$font_family   = array(
		'Fjalla+One',
		'PT+Sans:ital,wght@0,400;0,700;1,400;1,700',
		'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900',
		'Bad+Script',
		'Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Alex+Brush',
		'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Playball',
		'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Julius+Sans+One',
		'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
		'Slabo+13px',
		'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900',
		'Overpass+Mono:wght@300;400;500;600;700',
		'Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
		'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
		'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Quicksand:wght@300;400;500;600;700',
		'Padauk:wght@400;700',
		'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000',
		'Inconsolata:wght@200;300;400;500;600;700;800;900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000',
		'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Pacifico',
		'Indie+Flower',
		'VT323',
		'Dosis:wght@200;300;400;500;600;700;800',
		'Frank+Ruhl+Libre:wght@300;400;500;700;900',
		'Fjalla+One',
		'Oxygen:wght@300;400;700',
		'Arvo:ital,wght@0,400;0,700;1,400;1,700',
		'Noto+Serif:ital,wght@0,400;0,700;1,400;1,700',
		'Lobster',
		'Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',
		'Yanone+Kaffeesatz:wght@200;300;400;500;600;700',
		'Anton',
		'Libre+Baskerville:ital,wght@0,400;0,700;1,400',
		'Bree+Serif',
		'Gloria+Hallelujah',
		'Abril+Fatface',
		'Varela+Round',
		'Vampiro+One',
		'Shadows+Into+Light',
		'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Rokkitt:wght@100;200;300;400;500;600;700;800;900',
		'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Francois+One',
		'Orbitron:wght@400;500;600;700;800;900',
		'Patua+One',
		'Acme',
		'Satisfy',
		'Josefin+Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700',
		'Architects+Daughter',
		'Russo+One',
		'Monda:wght@400;700',
		'Righteous',
		'Lobster+Two:ital,wght@0,400;0,700;1,400;1,700',
		'Hammersmith+One',
		'Courgette',
		'Permanent+Marke',
		'Cherry+Swash:wght@400;700',
		'Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
		'Poiret+One',
		'BenchNine:wght@300;400;700',
		'Economica:ital,wght@0,400;0,700;1,400;1,700',
		'Handlee',
		'Cardo:ital,wght@0,400;0,700;1,400',
		'Alfa+Slab+One',
		'Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Cookie',
		'Chewy',
		'Great+Vibes',
		'Coming+Soon',
		'Philosopher:ital,wght@0,400;0,700;1,400;1,700',
		'Days+One',
		'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Shrikhand',
		'Tangerine:wght@400;700',
		'IM+Fell+English+SC',
		'Boogaloo',
		'Bangers',
		'Fredoka+One',
		'Bad+Script',
		'Volkhov:ital,wght@0,400;0,700;1,400;1,700',
		'Shadows+Into+Light+Two',
		'Marck+Script',
		'Sacramento',
		'Unica+One',
		'Dancing+Script:wght@400;500;600;700',
		'Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800',
		'Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700',
		'Exo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900'
	);

	$fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $font_family ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
	return $contents;
}


/* Theme enqueue scripts */
function ecommerce_solution_scripts() {
	wp_enqueue_style( 'ecommerce-solution-font', ecommerce_solution_font_url(), array() );
	// blocks-css
	wp_enqueue_style( 'ecommerce-solution-block-style', get_theme_file_uri('/css/blocks.css') );

	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'ecommerce-solution-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'ecommerce-solution-style', 'rtl', 'replace' );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/css/fontawesome-all.css' );

	// Body
	$ecommerce_solution_body_color       = get_theme_mod(
		'ecommerce_solution_body_color', '');
	$ecommerce_solution_body_font_family = get_theme_mod('ecommerce_solution_body_font_family', '');
	$ecommerce_solution_body_font_size   = get_theme_mod(
		'ecommerce_solution_body_font_size', '');

	// Paragraph
	$ecommerce_solution_paragraph_color       = get_theme_mod('ecommerce_solution_paragraph_color', '');
	$ecommerce_solution_paragraph_font_family = get_theme_mod('ecommerce_solution_paragraph_font_family', '');
	$ecommerce_solution_paragraph_font_size   = get_theme_mod('ecommerce_solution_paragraph_font_size', '');
	// "a" tag
	$ecommerce_solution_atag_color       = get_theme_mod('ecommerce_solution_atag_color', '');
	$ecommerce_solution_atag_font_family = get_theme_mod('ecommerce_solution_atag_font_family', '');
	// "li" tag
	$ecommerce_solution_li_color       = get_theme_mod('ecommerce_solution_li_color', '');
	$ecommerce_solution_li_font_family = get_theme_mod('ecommerce_solution_li_font_family', '');

	// H1
	$ecommerce_solution_h1_color       = get_theme_mod('ecommerce_solution_h1_color', '');
	$ecommerce_solution_h1_font_family = get_theme_mod('ecommerce_solution_h1_font_family', '');
	$ecommerce_solution_h1_font_size   = get_theme_mod('ecommerce_solution_h1_font_size', '');

	// H2
	$ecommerce_solution_h2_color       = get_theme_mod('ecommerce_solution_h2_color', '');
	$ecommerce_solution_h2_font_family = get_theme_mod('ecommerce_solution_h2_font_family', '');
	$ecommerce_solution_h2_font_size   = get_theme_mod('ecommerce_solution_h2_font_size', '');
	// H3
	$ecommerce_solution_h3_color       = get_theme_mod('ecommerce_solution_h3_color', '');
	$ecommerce_solution_h3_font_family = get_theme_mod('ecommerce_solution_h3_font_family', '');
	$ecommerce_solution_h3_font_size   = get_theme_mod('ecommerce_solution_h3_font_size', '');
	// H4
	$ecommerce_solution_h4_color       = get_theme_mod('ecommerce_solution_h4_color', '');
	$ecommerce_solution_h4_font_family = get_theme_mod('ecommerce_solution_h4_font_family', '');
	$ecommerce_solution_h4_font_size   = get_theme_mod('ecommerce_solution_h4_font_size', '');
	// H5
	$ecommerce_solution_h5_color       = get_theme_mod('ecommerce_solution_h5_color', '');
	$ecommerce_solution_h5_font_family = get_theme_mod('ecommerce_solution_h5_font_family', '');
	$ecommerce_solution_h5_font_size   = get_theme_mod('ecommerce_solution_h5_font_size', '');
	// H6
	$ecommerce_solution_h6_color       = get_theme_mod('ecommerce_solution_h6_color', '');
	$ecommerce_solution_h6_font_family = get_theme_mod('ecommerce_solution_h6_font_family', '');
	$ecommerce_solution_h6_font_size   = get_theme_mod('ecommerce_solution_h6_font_size', '');


	$ecommerce_solution_custom_css = '
		body{
		    color:'.esc_html($ecommerce_solution_body_color).'!important;
		    font-family: '.esc_html($ecommerce_solution_body_font_family).';
		    font-size: '.esc_html($ecommerce_solution_body_font_size).'px;
		}
		p,span{
		    color:'.esc_html($ecommerce_solution_paragraph_color).'!important;
		    font-family: '.esc_html($ecommerce_solution_paragraph_font_family).';
		    font-size: '.esc_html($ecommerce_solution_paragraph_font_size).';
		}
		a{
		    color:'.esc_html($ecommerce_solution_atag_color).'!important;
		    font-family: '.esc_html($ecommerce_solution_atag_font_family).';
		}
		li{
		    color:'.esc_html($ecommerce_solution_li_color).'!important;
		    font-family: '.esc_html($ecommerce_solution_li_font_family).';
		}
		h1{
		    color:'.esc_html($ecommerce_solution_h1_color).'!important;
		    font-family: '.esc_html($ecommerce_solution_h1_font_family).'!important;
		    font-size: '.esc_html($ecommerce_solution_h1_font_size).'!important;
		}
		h2{
		    color:'.esc_html($ecommerce_solution_h2_color).'!important;
		    font-family: '.esc_html($ecommerce_solution_h2_font_family).'!important;
		    font-size: '.esc_html($ecommerce_solution_h2_font_size).'!important;
		}
		h3{
		    color:'.esc_html($ecommerce_solution_h3_color).'!important;
		    font-family: '.esc_html($ecommerce_solution_h3_font_family).'!important;
		    font-size: '.esc_html($ecommerce_solution_h3_font_size).'!important;
		}
		h4{
		    color:'.esc_html($ecommerce_solution_h4_color).'!important;
		    font-family: '.esc_html($ecommerce_solution_h4_font_family).'!important;
		    font-size: '.esc_html($ecommerce_solution_h4_font_size).'!important;
		}
		h5{
		    color:'.esc_html($ecommerce_solution_h5_color).'!important;
		    font-family: '.esc_html($ecommerce_solution_h5_font_family).'!important;
		    font-size: '.esc_html($ecommerce_solution_h5_font_size).'!important;
		}
		h6{
		    color:'.esc_html($ecommerce_solution_h6_color).'!important;
		    font-family: '.esc_html($ecommerce_solution_h6_font_family).'!important;
		    font-size: '.esc_html($ecommerce_solution_h6_font_size).'!important;
		}
	';
	wp_add_inline_style('ecommerce-solution-basic-style', $ecommerce_solution_custom_css);

	/* Theme Color sheet */
	require get_parent_theme_file_path( '/theme-color-option.php' );
	wp_add_inline_style( 'ecommerce-solution-basic-style',$ecommerce_solution_custom_css );
	wp_enqueue_script( 'tether-js', get_template_directory_uri() . '/js/tether.js', array('jquery') ,'',true);
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/js/jquery.superfish.js', array('jquery') ,'',true);
	wp_enqueue_script( 'ecommerce-solution-custom-scripts-jquery', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ecommerce_solution_scripts' );

define('ECOMMERCE_SOLUTION_LIVE_DEMO',__('https://buywptemplates.com/bwt-ecommerce-solution-pro/', 'ecommerce-solution'));
define('ECOMMERCE_SOLUTION_BUY_PRO',__('https://www.buywptemplates.com/themes/ecommerce-wordpress-template/', 'ecommerce-solution'));
define('ECOMMERCE_SOLUTION_PRO_DOC',__('https://www.buywptemplates.com/demo/docs/bwt-ecommerce-solution-pro/', 'ecommerce-solution'));
define('ECOMMERCE_SOLUTION_FREE_DOC',__('https://buywptemplates.com/demo/docs/free-bwt-ecommerce-solution/', 'ecommerce-solution'));
define('ECOMMERCE_SOLUTION_PRO_SUPPORT',__('https://www.buywptemplates.com/support/', 'ecommerce-solution'));
define('ECOMMERCE_SOLUTION_FREE_SUPPORT',__('https://wordpress.org/support/theme/ecommerce-solution/', 'ecommerce-solution'));
define('ECOMMERCE_SOLUTION_CREDIT',__('https://www.buywptemplates.com/themes/free-ecommerce-wordpress-template/', 'ecommerce-solution'));

if ( ! function_exists( 'ecommerce_solution_credit' ) ) {
	function ecommerce_solution_credit(){
		echo "<a href=".esc_url(ECOMMERCE_SOLUTION_CREDIT).">".esc_html__('Ecommerce WordPress Theme','ecommerce-solution')."</a>";
	}
}

function ecommerce_solution_sanitize_dropdown_pages( $page_id, $setting ) {
  	// Ensure $input is an absolute integer.
  	$page_id = absint( $page_id );
  	// If $page_id is an ID of a published page, return it; otherwise, return the default.
  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/* Excerpt Limit Begin */
function ecommerce_solution_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

/*radio button sanitization*/
function ecommerce_solution_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function ecommerce_solution_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function ecommerce_solution_sanitize_select( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function ecommerce_solution_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

/**
* Switch sanitization
*/
if ( ! function_exists( 'ecommerce_solution_switch_sanitization' ) ) {
	function ecommerce_solution_switch_sanitization( $input ) {
		if ( true === $input ) {
			return 1;
		} else {
			return 0;
		}
	}
}

/**
 * Integer sanitization
 */
if ( ! function_exists( 'ecommerce_solution_sanitize_integer' ) ) {
	function ecommerce_solution_sanitize_integer( $input ) {
		return (int) $input;
	}
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'ecommerce_solution_loop_columns');
if (!function_exists('ecommerce_solution_loop_columns')) {
	function ecommerce_solution_loop_columns() {
		$columns = get_theme_mod( 'ecommerce_solution_per_columns', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'ecommerce_solution_shop_per_page', 20 );
function ecommerce_solution_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'ecommerce_solution_product_per_page', 9 );
	return $cols;
}

//Display the related posts
if ( ! function_exists( 'ecommerce_solution_related_posts' ) ) {
	function ecommerce_solution_related_posts() {
		wp_reset_postdata();
		global $post;
		$args = array(
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'ignore_sticky_posts'    => 1,
			'orderby'                => 'rand',
			'post__not_in'           => array( $post->ID ),
			'posts_per_page'         => absint( get_theme_mod( 'ecommerce_solution_related_posts_count_number', '3' ) ),
		);
		// Categories
		if ( get_theme_mod( 'ecommerce_solution_related_posts_taxanomies', 'categories' ) == 'categories' ) {

			$cats = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $cats ) {
				$cats                 = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );
				$args['category__in'] = $cats;
			} else {
				$args['cat'] = $cats;
			}
		}
		// Tags
		if ( get_theme_mod( 'ecommerce_solution_related_posts_taxanomies', 'categories' ) == 'tags' ) {

			$tags = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $tags ) {
				$tags            = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
				$args['tag__in'] = $tags;
			} else {
				$args['tag_slug__in'] = explode( ',', $tags );
			}
			if ( ! $tags ) {
				$break = true;
			}
		}
		$query = ! isset( $break ) ? new WP_Query( $args ) : new WP_Query();
		return $query;
	}
}

function ecommerce_solution_enable_post_featured_image(){
	if(get_theme_mod('ecommerce_solution_post_featured_image') == 'Image' ) {
		return true;
	}
	return false;
}

function ecommerce_solution_post_color_enabled(){
	if(get_theme_mod('ecommerce_solution_post_featured_image') == 'Color' ) {
		return true;
	}
	return false;
}

function ecommerce_solution_enable_post_image_custom_dimention(){
	if(get_theme_mod('ecommerce_solution_post_featured_image_dimention') == 'Custom' ) {
		return true;
	}
	return false;
}

function ecommerce_solution_show_post_color(){
	if(get_theme_mod('ecommerce_solution_post_featured_image') == 'Color' ) {
		return true;
	}
	return false;
}

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Load Customizer file. */
require get_template_directory() . '/inc/customizer.php';

/* Get Started */
require get_template_directory() . '/inc/dashboard/get_started_info.php';

/* About Widget */
require get_template_directory() . '/inc/about.php';

/* Contact Widget */
require get_template_directory() . '/inc/contact.php';

/* Webfonts */
require get_template_directory() . '/wptt-webfont-loader.php';
