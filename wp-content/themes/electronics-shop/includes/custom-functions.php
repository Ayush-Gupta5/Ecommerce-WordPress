<?php
/**
 * Electronics Shop functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Elegant_shop
 */
/**
 * Assets file.
 *
 * @since 1.0.0
 *
 * @return void
 */
function elegant_shop_child_assets() {
    $my_theme = wp_get_theme();
    $version  = $my_theme['Version'];

    wp_enqueue_style('elegant-shop', get_template_directory_uri()  . '/style.css');
    wp_enqueue_style('electronics-shop', get_stylesheet_directory_uri() . '/style.css', array('elegant-shop'), $version);
}
add_action('wp_enqueue_scripts', 'elegant_shop_child_assets', 10);