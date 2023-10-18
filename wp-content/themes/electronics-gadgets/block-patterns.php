<?php
/**
 * Electronics Gadgets: Block Patterns
 *
 * @package Electronics Gadgets
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'electronics-gadgets',
		array( 'label' => __( 'Electronics Gadgets', 'electronics-gadgets' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'electronics-gadgets/banner-section',
		array(
			'title'      => __( 'Banner Section', 'electronics-gadgets' ),
			'categories' => array( 'electronics-gadgets' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_theme_file_uri()) . "/images/banner-image.png\",\"id\":3469,\"dimRatio\":0,\"isDark\":false,\"align\":\"full\",\"className\":\"electronics-gadgets-banner-section\"} -->\n<div class=\"wp-block-cover alignfull is-light electronics-gadgets-banner-section\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim-0 has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-3469\" alt=\"\" src=\"" . esc_url(get_theme_file_uri()) . "/images/banner-image.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"className\":\"electronics-gadgets-banner-column px-md-4 mx-lg-5\"} -->\n<div class=\"wp-block-columns electronics-gadgets-banner-column px-md-4 mx-lg-5\"><!-- wp:column {\"className\":\"electronics-gadgets-banner-text-sectiion\"} -->\n<div class=\"wp-block-column electronics-gadgets-banner-text-sectiion\"><!-- wp:heading {\"level\":1,\"style\":{\"typography\":{\"fontSize\":\"40px\"}}} -->\n<h1 style=\"font-size:40px\">The feature of health</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":\"15px\"}}} -->\n<p style=\"font-size:15px\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"style\":{\"border\":{\"radius\":\"0px\"},\"typography\":{\"fontSize\":\"14px\"}},\"className\":\"is-style-fill\"} -->\n<div class=\"wp-block-button has-custom-font-size is-style-fill\" style=\"font-size:14px\"><a class=\"wp-block-button__link\" style=\"border-radius:0px\">LEARN MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'electronics-gadgets/product-section',
		array(
			'title'      => __( 'Product Section', 'electronics-gadgets' ),
			'categories' => array( 'electronics-gadgets' ),
			'content'    => "<!-- wp:group {\"className\":\"electronics-gadgets-product-section pt-4\"} -->\n<div class=\"wp-block-group electronics-gadgets-product-section pt-4\"><!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"25px\"}}} -->\n<p class=\"has-text-align-center\" style=\"font-size:25px\"><strong>RECOMMENDED FOR YOU</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:group -->\n<div class=\"wp-block-group\"><!-- wp:woocommerce/product-category {\"columns\":4,\"rows\":1,\"categories\":[18],\"className\":\"electronics-gadgets-product-section-column pt-4\"} /--></div>\n<!-- /wp:group --></div>\n<!-- /wp:group -->",
		)
	);
}