<?php
/**
 * The template part for displaying single post
 *
 * @package Electronics Store
 * @subpackage electronics_store
 * @since Electronics Store 1.0
 */
?>
<article>
	<h1><?php the_title(); ?></h1>
	<?php if( get_theme_mod( 'electronics_store_date_hide',true) != '' || get_theme_mod( 'electronics_store_comment_hide',true) != '' || get_theme_mod( 'electronics_store_author_hide',true) != '' || get_theme_mod( 'electronics_store_time_hide',true) != '') { ?>
		<div class="metabox py-1 px-2 mb-3">
			<?php if( get_theme_mod( 'electronics_store_date_hide',true) != '') { ?>
        <span class="entry-date me-2"><i class="far fa-calendar-alt me-1"></i><?php echo esc_html( get_the_date() ); ?></span>
      <?php } ?>

      <?php if( get_theme_mod( 'electronics_store_author_hide',true) != '') { ?>
        <span class="entry-author me-2"><i class="fas fa-user me-1"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
      <?php } ?>

      <?php if( get_theme_mod( 'electronics_store_comment_hide',true) != '') { ?>
        <i class="fas fa-comments me-1"></i><span class="entry-comments me-2"> <?php comments_number( __('0 Comments','electronics-store'), __('0 Comments','electronics-store'), __('% Comments','electronics-store') ); ?></span>
      <?php } ?>

      <?php if( get_theme_mod( 'electronics_store_time_hide',false) != '') { ?>
        <span class="entry-time"><i class="fas fa-clock me-1"></i> <?php echo esc_html( get_the_time() ); ?></span>
      <?php }?>
		</div>
	<?php } ?>
	<?php if( get_theme_mod( 'electronics_store_feature_image',true) != '') { ?>
		<?php if(has_post_thumbnail()) { ?>
			<hr>
			<div class="feature-box">
				<?php the_post_thumbnail(); ?> 
			</div>
			<hr>
		<?php }?> 
	<?php if( get_theme_mod('electronics_store_show_hide_single_post_categories',true) != ''){ ?>
		<div class="tc-single-category mb-2">
  		<?php the_category(); ?>
		</div>
	<?php } ?>
	<?php }?>
	<div class="entry-content"><?php the_content();?></div>
	<?php if( get_theme_mod( 'electronics_store_tags',true) != '') { ?>
		<div class="tags"><?php the_tags(); ?></div>
	<?php }?>
	<div class="clearfix"></div> 

	<?php
	wp_link_pages( array(
		'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'electronics-store' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
		'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'electronics-store' ) . ' </span>%',
		'separator'   => '<span class="screen-reader-text">, </span>',
	) );

	if( get_theme_mod( 'electronics_store_comment',true) != '') {
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() )
		comments_template();
	}

	if ( is_singular( 'attachment' ) ) {
		// Parent post navigation.
		the_post_navigation( array(
			'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title m-3">%title</span>', 'Parent post link', 'electronics-store' ),
		) );
	} elseif ( is_singular( 'post' ) ) {
		if( get_theme_mod( 'electronics_store_nav_links',true) != '') {
			// Previous/next post navigation.
			the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html(get_theme_mod('electronics_store_next_text',__( 'Next Post', 'electronics-store' ))) . '<i class="fas fa-chevron-right"></i></span> ' .
					'<span class="screen-reader-text">' . __( 'Next Post', 'electronics-store' ) . '</span> ' .
					'',
				'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="fas fa-chevron-left"></i>' . esc_html(get_theme_mod('electronics_store_prev_text',__( 'Previous Post', 'electronics-store' ))) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous Post', 'electronics-store' ) . '</span> ' .
					'',
			) );
		}
	}?>
</article>

<?php if (get_theme_mod('electronics_store_related_posts',true) != '') {
	get_template_part( 'template-parts/related-posts' );
}