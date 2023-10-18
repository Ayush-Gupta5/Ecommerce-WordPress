<?php

/*
Plugin Name: Page Builder Addons for WPBakery
Description: Page Builder Addons for WPBakery are a pack of premium quality addons
Version: 1.4.4.2
Author: Page Builder Addons
Author URI: https://www.pagebuilderaddons.com
Text Domain: bit14
*/


define('PBWB_ASSETS_URL', plugin_dir_url(__FILE__) . 'assets/');
define('PBWB_ASSETS', plugin_dir_url(__FILE__) . 'assets/');

// Side Menu
require_once(plugin_dir_path( __FILE__ ) . '/menus/web-addons.php');
require_once(plugin_dir_path( __FILE__ ) . '/menus/woo-addons.php');
require_once(plugin_dir_path( __FILE__ ) . '/menus/about-us.php');
require_once(plugin_dir_path( __FILE__ ) . '/menus/settings.php');
add_option( 'pb_activated_time', time(), '', false );
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('page-builder-addons-premium/bit14-addons.php') ) {
    deactivate_plugins('page-builder-addons-premium/bit14-addons.php');
}

//Call Before VC Init
add_action( 'vc_before_init', 'pbwb_bit14_free_load_templates' , 5);
add_action('vc_before_init','pbwb_bit14_before_vc_init');


is_admin() && add_filter( 'gettext', 
    function( $translated_text, $untranslated_text, $domain )
    {
        $old = array(
            "Plugin <strong>activated</strong>.",
            "Selected plugins <strong>activated</strong>." 
        );

        $new = "<strong>Thanks for installing PB Addons!</strong>
<p>We hope you like the plugin. Check plugin Pro Elements from <a href='https://pagebuilderaddons.com/plan-and-pricing/?utm_source=plugin-admindashboard&utm_medium=pluginadmin&utm_campaign=go_pro&utm_content=pbaddonsdoc'>here</a>.</p>
<p>PB Addons offers perpetual licensing - purchase once and use for a lifetime, no hassle or recurring periodic payments. <a href='https://pagebuilderaddons.com/plan-and-pricing/?utm_source=plugin-admindashboard&utm_medium=pluginadmin&utm_campaign=go_pro&utm_content=pbaddonsdoc' target='_blank'>View Pricing</a></p>";

        if ( in_array( $untranslated_text, $old, true ) )
            $translated_text = $new;

        return $translated_text;
     }
, 99, 3 );

function pbwb_bit14_before_vc_init(){

	$classes = array (
		'bit-counter-lists',
        'bit-iconic-list',
        'bit-headings',
        'bit-progress-bar',
		'bit-testimonial-lists',
        'bit-info-banner',
        'bit-pricing-table',
        'bit-pricing-table-child',
        'bit-helper',
        'bit-tabs',
        'bit-tabs-child',
        'bit-social-icons',
        'bit-audio-player',
        'bit-ribbon',
        'bit-dividers',
        'bit-recent-posts',
        'bit-animated-text',
        'bit-pie-forms',    
        'bit-pie-register',
        'bit-theme-font',
    );

	$folder = plugin_dir_path( __FILE__ ) . "classes/";

	foreach ( $classes as $class ) {

		$file = 'class-'.$class.'.php';
		include_once $folder.$file;
	}

}

function pbwb_bit14_free_load_templates() {


    // ============= TEMPLATES
	$templates = array(
        'bit-recent-posts'
    );

	$folder = plugin_dir_path( __FILE__ ) . "templates/";

	foreach ( $templates as $template ) {
		$file = 'template-'.$template.'.php';
        include_once $folder.$file;
	}
}

function pbwb_rtl_check(){    

    // Run a security check.
    check_ajax_referer( 'pb_rtl_nonce', 'security' );

    $toggle  = sanitize_text_field( $_POST['rtl_check'] );
    update_option( 'bit14_rtl_language', $toggle);
}

add_action( 'wp_ajax_rtl_check', 'pbwb_rtl_check' );
add_action( 'wp_ajax_nopriv_rtl_check', 'pbwb_rtl_check' );

function pbwb_enable_fontawesone_check_pro(){    

    // Run a security check.
    check_ajax_referer( 'pb_fontawesome_nonce', 'security' );

    $toggle  = sanitize_text_field($_POST['enable_fontawesone']);
    update_option( 'bit14_enable_fontawesone', $toggle);
}
add_action( 'wp_ajax_enable_fontawesone', 'pbwb_enable_fontawesone_check_pro' );
add_action( 'wp_ajax_nopriv_enable_fontawesone', 'pbwb_enable_fontawesone_check_pro' );

function pbwb_enable_googlefonts_check_pro(){    

    // Run a security check.
    check_ajax_referer( 'pb_google_nonce', 'security' );

    $toggle  = sanitize_text_field($_POST['enable_googlefonts']);
    update_option( 'bit14_enable_googlefonts', $toggle);
}
add_action( 'wp_ajax_enable_googlefonts', 'pbwb_enable_googlefonts_check_pro' );
add_action( 'wp_ajax_nopriv_enable_googlefonts', 'pbwb_enable_googlefonts_check_pro' );

// Admin Side Menu 
add_action( 'admin_menu', 'pbwb_admin_menu');
function pbwb_admin_menu() {

    add_menu_page(
        'Page Builder Addons',
        'Page Builder Addons',
        'manage_options',
        'page_builder_addons_main_menu',
        'pbwb_addons_list_page' ,
        plugin_dir_url(__FILE__).'assets/images/pb_icon.png',
        60
    );
    add_submenu_page(
        'page_builder_addons_main_menu',
        'Addons ',
        'Web Addons (Pro)',
        'manage_options',
        'page_builder_addons_main_menu',
        'addons_list_page'
    );
    add_submenu_page(
        'page_builder_addons_main_menu',
        'Custom Post Type',
        'Custom Post Type (Pro)',
        'manage_options',
        'page_builder_addons_main_menu/#custom-post-type',
        'addons_list_page_cpt'
    );
    add_submenu_page(
        'page_builder_addons_main_menu',
        'Woo Addons (Pro)',
        'Woo Addons (Pro)',
        'manage_options',
        'page_builder_addons_wooaddons',
        'pbwb_woo_addons_list_page'
    );
    add_submenu_page(
        'page_builder_addons_main_menu',
        'Settings',
        'Settings',
        'manage_options',
        'page_builder_addons_settings',
        'pbwb_addons_settings_page'
    );
    add_submenu_page(
        'page_builder_addons_main_menu',
        'About Us',
        'About Us',
        'manage_options',
        'page_builder_addons_about_us',
        'pbwb_about_us_page'
    );
}

//enqueue styles and scripts
add_action('wp_enqueue_scripts','pbwb_bit14_vc_enqueue_scripts');


function pbwb_bit14_vc_enqueue_scripts(){

	// PBWB_ASSETS_URL = plugin_dir_url(__FILE__) . 'assets/';

	wp_enqueue_style( 'bit14-vc-addons-free', PBWB_ASSETS_URL.'css/style.css', false );

    $is_fontawesome = get_option( 'bit14_enable_fontawesone');
    if($is_fontawesome == "1" && !empty($is_fontawesome)) {
        wp_enqueue_style( '', PBWB_ASSETS_URL . 'css/fontawesome.min.css' );

        wp_enqueue_script( 'pro-fontawesome', PBWB_ASSETS_URL . 'js/fontawesome.min.js');
    } 
 
    if(get_option('bit14_rtl_language') === '1'){
        wp_enqueue_style( 'rtl', PBWB_ASSETS_URL.'css/rtl.css');
        wp_enqueue_script( 'rtl', PBWB_ASSETS_URL.'js/rtl.js');
    }
}

//enqueue styles and scripts admin
add_action('admin_enqueue_scripts','pbwb_bit14_vc_admin_enqueue_scripts');
function pbwb_bit14_vc_admin_enqueue_scripts(){

    wp_enqueue_style('Select2CSS', PBWB_ASSETS_URL . 'css/select2.min.css' );
    wp_enqueue_style( 'pro-fontawesome', PBWB_ASSETS_URL.'css/fontawesome4.7.css' );
    wp_enqueue_style( 'slickcss', PBWB_ASSETS_URL.'css/slick.min.css', false );
    
	wp_enqueue_style( 'bit14-vc-addons-free', PBWB_ASSETS_URL.'css/admin.css');		
    wp_enqueue_script( 'slickjs', PBWB_ASSETS_URL.'js/slick.js', array('jquery'), false );
    wp_enqueue_script( 'Select2JS',PBWB_ASSETS_URL . 'js/select2.min.js' , array('jquery'), false);
    wp_enqueue_script( 'tabs-lib',PBWB_ASSETS_URL . 'js/tabs-lib.js' , array('jquery'), false);
	wp_enqueue_script( 'bit14-vc-addons-free', PBWB_ASSETS_URL.'js/admin.js', array('jquery'), false );
	wp_localize_script('bit14-vc-addons-free' , 'pb_data_about' , array(
        'ajaxurl'           => admin_url('admin-ajax.php'),
        'nonce_install'     => wp_create_nonce( 'pb_activate_nonce' ),
    ));
	wp_enqueue_script( 'bit14-vc-addons-free-settings', PBWB_ASSETS_URL.'js/settings.js', array('jquery'), false );
	wp_localize_script('bit14-vc-addons-free-settings' , 'pb_data' , array(
        'ajaxurl'           => admin_url('admin-ajax.php'),
        'rtl_nonce'         => wp_create_nonce( 'pb_rtl_nonce' ),
        'fontawesome_nonce' => wp_create_nonce( 'pb_fontawesome_nonce' ),
        'google_nonce'      => wp_create_nonce( 'pb_google_nonce' ),
    ));

}

//Plugin Menu Link
function pbwb_add_action_links_free( $links, $file ) 
{
    if ( $file != plugin_basename( __FILE__ )){
        return $links;
    }
    
    $links[] = '<a style="color:#13ad11;font-weight:bold" target="_blank" href="https://pagebuilderaddons.com/plan-and-pricing/">'.__("Go Pro","page-builder").'</a>';
    return $links;
}

add_filter( 'plugin_action_links', 'pbwb_add_action_links_free',10,2 );

// add body class if before-header-widget is active
add_filter( 'body_class', 'pbwb_body_class_before_header_rtl' );
function pbwb_body_class_before_header_rtl( $classes ) {
    if(get_option( 'bit14_rtl_language') === '1'){
        $classes[] = 'bit14-rtl-content';
    }
    return $classes;
}

// remove admin bar
// add_filter('show_admin_bar', '__return_false');

function pbwb_update_adminbar_free($wp_adminbar) {
    $wp_adminbar->remove_node('wp-logo');
    $wp_adminbar->remove_node('customize');
    $wp_adminbar->remove_node('comments');


    $wp_adminbar->add_node([
    'id' => 'pagebuilderaddons',
    'title' => 'Page Builder Addons',
    'href' => admin_url( 'admin.php?page=page_builder_addons_main_menu' ),
    'meta' => [
        'target' => 'pagebuilderaddons'
    ]
    ]);

    $wp_adminbar->add_node([
    'id' => 'notification',       
    'title' =>  'Notification',
    'parent' => 'pagebuilderaddons',
    'href' => admin_url( 'admin.php?page=page_builder_addons_about_us' ),
    'meta' => [
        'target' => 'pagebuilderaddons'
    ]
    ]);
    $wp_adminbar->add_node([
        'id' => 'settings',       
        'title' =>  'Settings',
        'parent' => 'pagebuilderaddons',
        'href' => admin_url( 'admin.php?page=page_builder_addons_settings' ),
        'meta' => [
        'target' => 'pagebuilderaddons'
        ]
    ]);         
    $wp_adminbar->add_node([
        'id' => 'about_us',       
        'title' => 'About Us',
        // $indicator     = $count  !== 0  ? '<div class="pb-menu-notification-indicator"></div>' : ''; 
        'parent' => 'pagebuilderaddons',
        'href' => admin_url( 'admin.php?page=page_builder_addons_about_us' ),
        'meta' => [
            'target' => 'pagebuilderaddons'
        ] 
    ]);  
}

add_action('admin_bar_menu', 'pbwb_update_adminbar_free', 999);


// add body class if before-header-widget is active
add_filter( 'body_class', 'pbwb_body_class_before_header' );
function pbwb_body_class_before_header( $classes ) {
    if(get_option( 'bit14_rtl_language') === '1'){
        $classes[] = 'bit14-rtl-content';
    }
    return $classes;
}
function pbwb_web_addons_banner(){
?>
     <div class="woo_addons">
        <div class="container">
            <div class="woo_banner_1">
                <div class="woo_section">
                    <div class="woo_card_addons">
                        <img src="<?php echo esc_url(plugin_dir_url( __FILE__ )."assets/images/web_addons.png") ?>" alt="web_addons">
                    </div>
                    <div class="woo_card_content">
                        <div class="woo_text">
                            <h2 class="woo_heading">Get PB All-in-One Web Addons For $29.99</h2>
                            <p class="woo_para">Build your website with premium quality All-in-One Web elements for WPBakery Page Builder.</p>
                            <div class="woo_btn">
                                <a href="https://pagebuilderaddons.com/plan-and-pricing/#web-addons">Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="woo_card_moneyback">
                        <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'/assets/images/badge.png'); ?>" alt="web_addons">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
add_shortcode('web_addons_banner', 'pbwb_web_addons_banner');
function pbwb_woo_addons_banner(){
?>
    <div class="woo_addons">
		<div class="container">
			<div class="woo_banner_2">
				<div class="woo_section">
					<div class="woo_card_woocommerce">
						<img src="<?php echo esc_url(plugin_dir_url( __FILE__ )."assets/images/woocommerce.png") ?>" alt="woocommerce">
					</div>
					<div class="woo_card_content">
						<div class="woo_text">
							<h2 class="woo_heading">Get PB WooCommerce Addons For $14.99</h2>
							<p class="woo_para">Build your online store with premium quality WooCommerce elements for WPBakery Page Builder.</p>
							<div class="woo_btn">
								<a href="https://pagebuilderaddons.com/plan-and-pricing/#woocommerce-addons">Buy Now</a>
							</div>
						</div>
					</div>
                    <div class="woo_card_moneyback">
                        <img src="<?php echo esc_url(plugin_dir_url(__FILE__).'/assets/images/badge.png'); ?>" alt="web_addons">
                    </div>
				</div>
			</div>
		</div>
	</div>
<?php
}
add_shortcode('woo_addons_banner', 'pbwb_woo_addons_banner');
function pbwb_send_in_blue(){
?>
    <div class="sendin-blue">
        <iframe width="360" height="700" src="https://66ac0bda.sibforms.com/serve/MUIEAFspdQFEHvhp9ApZ7LxrsNwIYPio9BkokJ4JOUnxo7zNwi-0Wk3Ya7buEraCpkU9IVk2O9ghe7EZNYN0eecaHxmmihNmU09wrT-TdX5EAesubJFFkvXQ_3zQawWKPE-xzbYDfNcpyabHsvRHqFPzY8l2opR-1iKIS-qv-84MGFahj34sTo-Bomz-vf7hNKyzbXcHdeCpBZmi" frameborder="0" scrolling="auto" allowfullscreen style="display: block;margin-left: auto;margin-right: auto;max-width: 100%;"></iframe>
    </div>
<?php
}
add_shortcode('send_in_blue', 'pbwb_send_in_blue');