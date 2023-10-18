<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elegant_Shop
 */

get_header();
?>

<div class="site-content" id="content">
	<div class="container">
		<div class="page-grid">
			<div class="content-area" id="primary">
				<div id="main" class="site-main">
					<div class="grid-layout-wrap">
						<div class="row">

							<?php if ( have_posts() ) :
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									/*
									* Include the Post-Type-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Type name) and that will be used instead.
									*/
									get_template_part( 'template-parts/content', get_post_type() );

								endwhile;

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
							?>
						</div>
					</div>
					<?php elegant_shop_navigation(); ?>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php
get_footer();