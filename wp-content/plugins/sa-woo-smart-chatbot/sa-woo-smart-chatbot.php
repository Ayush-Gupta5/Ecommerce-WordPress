<?php
/**
 * Plugin Name: SA WooSmart ChatBot
 * Plugin URI: https://woochatbot.creative-juni.com/
 * Author: Jawad Ilyas
 * Author URI: 
 * Description: Smartly deals customers on your website to find products according to their needs.
 * Version: 0.1.0
 * License: 0.1.0
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: wscb
*/

defined('ABSPATH') or die('Hey! How can I help you?');


//=============================================================================
//* Check if Woocommerce is installed and activated *//
//=============================================================================
if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    add_action('admin_notices', 'wscb_inactive_notice_for_woo_chatbot');
    return;
}

function wscb_inactive_notice_for_woo_chatbot()
{
    if (current_user_can('activate_plugins')){
        deactivate_plugins(plugin_basename(__FILE__));
        ?>
        <div id="message" class="error">
            <p>
                <?php
                printf(
                    __('%s WooSmart ChatBot for WooCommerce REQUIRES WooCommerce%s %sWooCommerce%s must be active for WooSmartBot to work. Please install & activate WooCommerce.', 'wscb'),
                    '<strong>',
                    '</strong><br>',
                    '<a href="http://wordpress.org/extend/plugins/woocommerce/" target="_blank" >',
                    '</a>'
                );
                ?>
            </p>
        </div>
    <?php
    }
}


//=============================================================================
//* Frontend - Enqueue Scripts and Styles *//
//=============================================================================
add_action( 'wp_enqueue_scripts' , 'wscb_enqueue_frontend_style_scripts' );
function wscb_enqueue_frontend_style_scripts()
{
    $wscb_options = get_option('wscb_options_data');

    wp_enqueue_style('wscb-style', plugin_dir_url(__FILE__) . 'assets/css/style.css' );
    wp_enqueue_script('wscb-script', plugin_dir_url(__FILE__) . 'assets/js/script.js' , array('jquery') , '' , true  );
    wp_localize_script( 'wscb-script', 'wscbObj', array(
                                  'ajax_url'        => admin_url( "admin-ajax.php" ),
                                  'wscb_plugin_url' => plugin_dir_url(__FILE__),
                                  'wscb_options'     => (object)$wscb_options,
                                  
                        ));
}


//=============================================================================
//* ADmin - Enqueue Scripts and Styles *//
//=============================================================================
add_action( 'admin_enqueue_scripts' , 'wscb_enqueue_admin_style_scripts' );
function wscb_enqueue_admin_style_scripts( $hook )
{
    
    if($hook == 'toplevel_page_wscb-options') {
        wp_enqueue_style('wscb-admin-style', plugin_dir_url(__FILE__) . 'assets/css/admin/admin.css' );
        wp_enqueue_script('wscb-admin-tab', plugin_dir_url(__FILE__) . 'assets/js/admin/admin-script.js' , array('jquery') , '' , true  );
    }
}


//=============================================================================
//* Add Chatbot html to frontend *//
//=============================================================================
add_action( 'wp_footer' , 'wscb_chat_box' );
function wscb_chat_box()
{
    require_once( plugin_dir_path( __FILE__ ) . 'inc/chat-bot-html.php' );
}


//=============================================================================
//* Include Files *//
//=============================================================================
require_once( plugin_dir_path(__FILE__) . 'inc/ajax-response.php' );
require_once( plugin_dir_path(__FILE__) . 'inc/admin-options-page.php' );

register_activation_hook( __FILE__ , 'wscb_plugin_init');
function wscb_plugin_init()
{
    wscb_admin_set_default_options();
}


function wscb_admin_set_default_options()
{

    if( empty(get_option('wscb_options_data' )) )
    {
        $options_array = array(
        'auto_popup'           => 'on',
        'chatbox_color'        => '#2488ff',
        'chatbot_icon'         => plugin_dir_url(__FILE__) . 'assets/imgs/robot.png',
        'chatbox_bg'           => plugin_dir_url(__FILE__) . 'assets/imgs/bg.svg',
        'greeting_message'     => 'Hi! I am Dabbu, I am here to find you the product you need. What are you shopping for?',
        'catalog_message'      => 'Checkout our catalog below:',
        'category_message'     => 'Here are some of top products in this category',
        'keyword_message'      => 'Great! We have these products for the keyword',
        );

        update_option('wscb_options_data', $options_array);
    }
}