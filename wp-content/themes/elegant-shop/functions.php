<?php
/**
 * Elegant Shop Pro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Elegant_Shop
 */

/**
 * Custom Functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom Controls
 */
require get_template_directory() . '/inc/custom-controls/custom-control.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
* Extra Functions
*/
require get_template_directory() . '/inc/extra-functions.php';

/**
 * Add theme compatibility function for woocommerce if active
*/
if( elegant_shop_is_woocommerce_activated() ){
    require get_template_directory() . '/inc/woo-functions.php';
}

/**
 * Plugin Recommendation
*/
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Metabox
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}