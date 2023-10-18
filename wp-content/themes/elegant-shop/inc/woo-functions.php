<?php
/**
 * Elegant Shop Pro Woocommerce hooks and functions.
 *
 * @link https://docs.woothemes.com/document/third-party-custom-theme-compatibility/
 *
 * @package Elegant_Shop
 */

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title');
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price');
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash');
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar',             'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
add_action( 'woocommerce_product_meta_start', 'elegant_shop_single_product_wishlist' ); 
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 60 );
add_filter( 'woocommerce_show_page_title' ,     '__return_false' );
add_filter( 'woocommerce_product_description_heading', 'elegant_shop_remove_description' );
add_filter( 'woocommerce_product_additional_information_heading', 'elegant_shop_remove_add_info' );

if( ! function_exists( 'yith_wcwl_selectively_hide_add_to_wishlist' ) ) {
	function yith_wcwl_selectively_hide_add_to_wishlist( $show ) {

		return false;
	}

	add_filter( 'yith_wcwl_show_add_to_wishlist', 'yith_wcwl_selectively_hide_add_to_wishlist' );
}

if( ! function_exists( 'elegant_shop_single_product_wishlist' ) ) :
    function elegant_shop_single_product_wishlist(){
        if( elegant_shop_is_yith_whislist_activated() ) echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
    }
endif;

if( ! function_exists( 'elegant_shop_remove_description' ) ) :
    function elegant_shop_remove_description(){
        __( '', 'elegant-shop' );
    }
endif;

if( ! function_exists( 'elegant_shop_remove_add_info' ) ) :
    function elegant_shop_remove_add_info(){
        __( '', 'elegant-shop' );
    }
endif;

if ( ! function_exists( 'elegant_shop_woocommerce_support' ) ) :
    /**
     * Declare Woocommerce Support
    */
    function elegant_shop_woocommerce_support() {
        global $woocommerce;
        
        add_theme_support( 'woocommerce' );
        
        if( version_compare( $woocommerce->version, '3.0', ">=" ) ) {
            add_theme_support( 'wc-product-gallery-zoom' );
            add_theme_support( 'wc-product-gallery-lightbox' );
            add_theme_support( 'wc-product-gallery-slider' );
        }
    }
endif;
add_action( 'after_setup_theme', 'elegant_shop_woocommerce_support');

if( ! function_exists( 'elegant_shop_wc_cart_count' ) ) :
/**
 * Woocommerce Cart Count
 * 
 * @link https://isabelcastillo.com/woocommerce-cart-icon-count-theme-header 
*/
function elegant_shop_wc_cart_count(){
    $count = WC()->cart->cart_contents_count; ?>
    <div class="cart-block">
        <div class="rr-cart-block-wrap">
            <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart" title="<?php esc_attr_e( 'View your shopping cart', 'elegant-shop' ); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="13.87" height="16" viewBox="0 0 13.87 16"><path d="M15.8,5.219a.533.533,0,0,0-.533-.485H13.132V4.44A3.333,3.333,0,0,0,9.932,1a3.333,3.333,0,0,0-3.2,3.44v.293H4.6a.533.533,0,0,0-.533.485L3,16.419A.539.539,0,0,0,3.532,17h12.8a.539.539,0,0,0,.533-.581Zm-8-.779A2.267,2.267,0,0,1,9.932,2.067,2.267,2.267,0,0,1,12.065,4.44v.293H7.8ZM4.118,15.933,5.084,5.8H6.732v.683a1.067,1.067,0,1,0,1.067,0V5.8h4.267v.683a1.067,1.067,0,1,0,1.067,0V5.8H14.78l.965,10.133Z" transform="translate(-2.997 -1)"></path></svg>
                <span class="number"><?php echo absint( $count ); ?></span>
            </a>
        </div>
        <div class="cart-block-popup"> 
            <?php the_widget( 'WC_Widget_Cart' ); ?>
        </div>
    </div>
    <?php
}
endif;

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 * 
 * @link https://isabelcastillo.com/woocommerce-cart-icon-count-theme-header
 */
function elegant_shop_add_to_cart_fragment( $fragments ){
    ob_start();
    $count = WC()->cart->cart_contents_count; ?>
    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart" title="<?php esc_attr_e( 'View your shopping cart', 'elegant-shop' ); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="13.87" height="16" viewBox="0 0 13.87 16"><path d="M15.8,5.219a.533.533,0,0,0-.533-.485H13.132V4.44A3.333,3.333,0,0,0,9.932,1a3.333,3.333,0,0,0-3.2,3.44v.293H4.6a.533.533,0,0,0-.533.485L3,16.419A.539.539,0,0,0,3.532,17h12.8a.539.539,0,0,0,.533-.581Zm-8-.779A2.267,2.267,0,0,1,9.932,2.067,2.267,2.267,0,0,1,12.065,4.44v.293H7.8ZM4.118,15.933,5.084,5.8H6.732v.683a1.067,1.067,0,1,0,1.067,0V5.8h4.267v.683a1.067,1.067,0,1,0,1.067,0V5.8H14.78l.965,10.133Z" transform="translate(-2.997 -1)"></path></svg>
        <span class="number"><?php echo absint( $count ); ?></span>
    </a>
    <?php
 
    $fragments['a.cart'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'elegant_shop_add_to_cart_fragment' );

/**
 * Woocommerce Sidebar
*/
function elegant_shop_wc_widgets_init(){
    register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'elegant-shop' ),
		'id'            => 'shop-sidebar',
		'description'   => esc_html__( 'Sidebar displaying only in woocommerce pages.', 'elegant-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );    
}
add_action( 'widgets_init', 'elegant_shop_wc_widgets_init' );

/**
 * Callback function for Shop sidebar
*/
function elegant_shop_wc_sidebar_cb(){
    $sidebar = elegant_shop_sidebar();

    if( $sidebar && is_active_sidebar( 'shop-sidebar' ) ){
        echo '<aside id="secondary" class="widget-area" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">';
        dynamic_sidebar( 'shop-sidebar' );
        echo '</aside>'; 
    }
}
add_action( 'elegant_shop_wo_sidebar', 'elegant_shop_wc_sidebar_cb' );

if ( ! function_exists( 'elegant_shop_wc_wrapper' ) ) :
/**
 * Before Content
 * Wraps all WooCommerce content in wrappers which match the theme markup
*/
function elegant_shop_wc_wrapper(){    
    ?>
    <div id="primary" class="content-area">
        <div class="container">
            <div class="page-grid">
                <div id="main" class="site-main">
                <?php         
                if( is_shop() ){
                    echo '<h1 class="page-title">';
                    echo esc_html( get_the_title( wc_get_page_id( 'shop' ) ) );
                    echo '</h1>';
                }
}
endif;
add_action( 'woocommerce_before_main_content', 'elegant_shop_wc_wrapper' );

if ( ! function_exists( 'elegant_shop_wc_wrapper_end' ) ) :
/**
 * After Content
 * Closes the wrapping divs
*/
function elegant_shop_wc_wrapper_end(){ ?>
                </div>
                <?php if( ! is_single() ) do_action( 'elegant_shop_wo_sidebar' ); ?>
            </div>
        </div>
    </div>
    <?php 
}
endif;
add_action( 'woocommerce_after_main_content', 'elegant_shop_wc_wrapper_end' );

if ( ! function_exists( 'elegant_shop_product_wrapper' ) ) {
/**
 * Insert the opening anchor tag for products in the loop.
 */
function elegant_shop_product_wrapper() {
    echo '<div class="new-arrivals__item"><div class="new-arrivals__img">';
}
add_action( 'woocommerce_before_shop_loop_item', 'elegant_shop_product_wrapper', 9 );
}

/**
 * Add Yith Wish list to Shop Page
 * 
*/
function elegant_shop_add_whislist_shop() {  
    global $product;  
    elegant_shop_get_products_sale( $product );
    elegant_shop_overlay_content();
    echo '</div>';
    echo '<div class="new-arrivals__content">';
        the_title( '<h6><a href="' . esc_url( get_permalink() ) . '">', '</a></h6>' );
        woocommerce_template_single_price(); 
    echo '</div>';
    echo '</div>';
}
add_action( 'woocommerce_after_shop_loop_item', 'elegant_shop_add_whislist_shop', 12 );