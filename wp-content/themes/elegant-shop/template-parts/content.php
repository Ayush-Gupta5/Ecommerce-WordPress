<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elegant_Shop
 */

if( elegant_shop_is_woocommerce_activated() && 'product' != get_post_type() ) { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); if( ! is_single() ) echo ' itemscope itemtype="https://schema.org/Blog"'; ?>>
		<div class="blog-card card">
			<?php 
			/**
			 * @hooked elegant_shop_post_thumbnail - 10
			 */
			do_action( 'elegant_shop_before_entry_content' );
			}

			echo '<div class="card__content">';
				/**
				 * @hooked elegant_shop_entry_header  - 10
				 * @hooked elegant_shop_entry_content - 20
				 * @hooked elegant_shop_content_entry_footer  - 30
				 */
				do_action( 'elegant_shop_content' );
			echo '</div>';
		if( elegant_shop_is_woocommerce_activated() && 'product' != get_post_type() ) { ?>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
<?php }