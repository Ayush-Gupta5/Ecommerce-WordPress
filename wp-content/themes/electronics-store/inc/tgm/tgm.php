<?php

get_template_part( '/inc/tgm/class-tgm-plugin-activation');
/**
 * Recommended plugins.
 */
function electronics_store_proregister_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'YITH WooCommerce Quick View', 'electronics-store' ),
			'slug'             => 'yith-woocommerce-quick-view',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'YITH WooCommerce Wishlist', 'electronics-store' ),
			'slug'             => 'yith-woocommerce-wishlist',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'electronics_store_proregister_recommended_plugins' );