<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elegant_Shop
 */

?>

		<footer id="colophon" class="site-footer">
			<?php 
			/**
			 *  Footer
			 *  @hooked elegant_shop_footer_top     - 30
			 * 	@hooked elegant_shop_footer_bottom  - 40
			 */
			do_action( 'elegant_shop_footer' ); ?>
		</footer><!-- #colophon -->
		<?php elegant_shop_scroll_to_top(); ?>
	</div><!-- #content -->    
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
