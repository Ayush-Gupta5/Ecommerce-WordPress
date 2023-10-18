<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Elegant_Shop
 */

get_header(); ?>

	<div class="content-area" id="primary">
		<div class="container">
			<main id="main" class="site-main">
				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title">
							<?php esc_html_e( 'Sorry We Can`t Find That Page!', 'elegant-shop' ); ?>
						</h1>
						<div class="subtitle">
							<p><?php esc_html_e( 'The page you are looking for was moved, removed, renamed or never existed.', 'elegant-shop' ); ?></p>
						</div>
						<div class="error404-search">
							<?php get_search_form(); ?>
						</div>
					</header><!-- .page-header -->
				</section><!-- .error-404 -->
			</main><!-- #main -->
			<?php
			/**
			 * @see elegant_shop_latest_post
			*/
			do_action( 'elegant_shop_latest_post' ); ?>
		</div>
	</div><!-- #primary -->

<?php
get_footer();