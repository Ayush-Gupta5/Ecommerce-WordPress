<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elegant_Shop
 */
$sidebar = elegant_shop_sidebar();

if( $sidebar == 'full-width' ){
	return;
}

if( ( ! is_active_sidebar( 'sidebar' ) ) || ( ! is_active_sidebar( 'shop-sidebar' ) && elegant_shop_is_woocommerce_activated() && ( is_shop() || is_product_category() || is_product_tag() ) ) || ( elegant_shop_is_woocommerce_activated() && ( is_checkout() || is_account_page() ) ) ){
	return;
}

if( elegant_shop_is_woocommerce_activated() && ( is_shop() || is_product_category() || is_product_tag() ) ){
	$sidebar = 'shop-sidebar';
}else{
	$sidebar = 'sidebar';
} ?> 

<aside id="secondary" class="widget-area" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
	<?php dynamic_sidebar( $sidebar ); ?>
</aside><!-- #secondary --> 