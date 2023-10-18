<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

					endwhile; // End of the loop.
					
					/**
					 * @hooked elegant_shop_navigation           - 10
					 * @hooked elegant_shop_related_posts        - 15
					 * @hooked elegant_shop_comment              - 20
					*/
					do_action( 'elegant_shop_after_post_content' );
					?>
				</div>
			</div>
			<?php 
			get_sidebar(); ?>
		</div>
	</div>
<?php
get_footer();