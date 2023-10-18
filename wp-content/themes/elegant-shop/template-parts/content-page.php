<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elegant_Shop
 */

?>

<?php if( elegant_shop_is_woocommerce_activated() && ! ( is_shop() || is_product_category() || is_product_tag() || is_checkout() ) ){ ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
		/**
		 * @hooked elegant_shop_post_thumbnail - 10
		 */
		do_action( 'elegant_shop_before_entry_content' ); 
	} ?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'elegant-shop' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'elegant-shop' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif;
if( elegant_shop_is_woocommerce_activated() && ! ( is_shop() || is_product_category() || is_product_tag() ) ) echo '</article>';