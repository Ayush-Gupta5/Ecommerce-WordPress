<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

									/**
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									get_template_part( 'template-parts/content', 'search' );

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