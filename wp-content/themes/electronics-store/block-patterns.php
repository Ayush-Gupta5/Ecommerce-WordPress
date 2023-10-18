<?php
/**
 * Electronics Store: Block Patterns
 *
 * @package Electronics Store
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'electronics-store',
		array( 'label' => __( 'Electronics Store', 'electronics-store' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'electronics-store/banner-section',
		array(
			'title'      => __( 'Banner Section', 'electronics-store' ),
			'categories' => array( 'electronics-store' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/images/Banner.png\",\"id\":3375,\"dimRatio\":50,\"align\":\"full\",\"className\":\"electronics-store-banner-section\"} -->\n<div class=\"wp-block-cover alignfull electronics-store-banner-section\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-3375\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/images/Banner.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"align\":\"full\",\"className\":\"px-5 mx-lg-5\"} -->\n<div class=\"wp-block-columns alignfull px-5 mx-lg-5\"><!-- wp:column {\"width\":\"22.22%\",\"backgroundColor\":\"white\",\"className\":\"catergory-section-column\"} -->\n<div class=\"wp-block-column catergory-section-column has-white-background-color has-background\" style=\"flex-basis:22.22%\"><!-- wp:heading {\"level\":4,\"style\":{\"color\":{\"background\":\"#5819b8\"},\"typography\":{\"fontSize\":\"15px\"}},\"className\":\"column\"} -->\n<h4 class=\"column has-background\" style=\"background-color:#5819b8;font-size:15px\">ALL CATEGORIES</h4>\n<!-- /wp:heading -->\n\n<!-- wp:woocommerce/product-categories {\"className\":\"category1\"} /-->\n\n<!-- wp:paragraph {\"textColor\":\"black\"} -->\n<p class=\"has-black-color has-text-color\"></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"20%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:20%\"><!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"55%\",\"className\":\"gaming-section pt-lg-5 mt-lg-5 pt-sm-0 mt-sm-0\"} -->\n<div class=\"wp-block-column gaming-section pt-lg-5 mt-lg-5 pt-sm-0 mt-sm-0\" style=\"flex-basis:55%\"><!-- wp:heading {\"level\":1,\"style\":{\"typography\":{\"fontSize\":\"40px\"}}} -->\n<h1 style=\"font-size:40px\">New Gaming Consoles</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":\"15px\"}}} -->\n<p style=\"font-size:15px\">It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"backgroundColor\":\"white\",\"style\":{\"typography\":{\"fontSize\":\"14px\"},\"color\":{\"text\":\"#5819b8\"}},\"className\":\"button-1\"} -->\n<div class=\"wp-block-button has-custom-font-size button-1\" style=\"font-size:14px\"><a class=\"wp-block-button__link has-white-background-color has-text-color has-background\" style=\"color:#5819b8\">LEARN MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'electronics-store/product-section',
		array(
			'title'      => __( 'Product Section', 'electronics-store' ),
			'categories' => array( 'electronics-store' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/images/background-image.png\",\"id\":3428,\"dimRatio\":0,\"isDark\":false,\"align\":\"full\",\"className\":\"electronics-store-product-cover\"} -->\n<div class=\"wp-block-cover alignfull is-light electronics-store-product-cover\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim-0 has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-3428\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/images/background-image.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:group {\"className\":\"electronics-store-product-section  \"} -->\n<div class=\"wp-block-group electronics-store-product-section\"><!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"25px\"}},\"className\":\"recommended-heading\"} -->\n<p class=\"has-text-align-center recommended-heading\" style=\"font-size:25px\"><strong>RECOMMENDED FOR YOU</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:columns {\"className\":\"electronics-store-product-section-column pt-2 px-md-5 mx-lg-5\"} -->\n<div class=\"wp-block-columns electronics-store-product-section-column pt-2 px-md-5 mx-lg-5\"><!-- wp:column {\"width\":\"\",\"className\":\"electronics-store-product-section-image\"} -->\n<div class=\"wp-block-column electronics-store-product-section-image\"><!-- wp:image {\"id\":3395,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-full\"><img src=\"" . esc_url(get_template_directory_uri()) . "/images/sale-banner.png\" alt=\"\" class=\"wp-image-3395\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph {\"fontSize\":\"medium\"} -->\n<p class=\"has-medium-font-size\"><strong>Hot Deals on Smartphons!</strong></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"66.66%\",\"className\":\"electronics-store-product\"} -->\n<div class=\"wp-block-column electronics-store-product\" style=\"flex-basis:66.66%\"><!-- wp:woocommerce/product-category {\"categories\":[18]} /--></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:group --></div></div>\n<!-- /wp:cover -->",
		)
	);
}