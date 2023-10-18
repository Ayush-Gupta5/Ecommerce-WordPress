<?php
/**
 * The template part for displaying slider
 *
 * @package Electronics Store
 * @subpackage electronics_store
 * @since Electronics Store 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="services-box p-3">    
    <?php if(has_post_thumbnail() && get_theme_mod( 'electronics_store_feature_image_hide',true) != '') { ?>
      <div class="service-image my-3 ">
        <a href="<?php echo esc_url( get_permalink() ); ?>">
          <?php  the_post_thumbnail(); ?>
          <span class="screen-reader-text"><?php the_title(); ?></span>
        </a>
      </div>
    <?php }?>
    <h2 class="pt-1"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
    <div class="lower-box">
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
      <?php if(get_theme_mod('electronics_store_post_content') == 'Full Content'){ ?>
        <?php the_content(); ?>
      <?php }
      if(get_theme_mod('electronics_store_post_content', 'Excerpt Content') == 'Excerpt Content'){ ?>
        <?php if(get_the_excerpt()) { ?>
          <p><?php $electronics_store_excerpt = get_the_excerpt(); echo esc_html( electronics_store_string_limit_words( $electronics_store_excerpt, esc_attr(get_theme_mod('electronics_store_post_excerpt_length','20')))); ?><?php echo esc_html( get_theme_mod('electronics_store_button_excerpt_suffix','[...]') ); ?></p>
        <?php }?>
      <?php }?>
      <?php if ( get_theme_mod('electronics_store_post_button_text','READ MORE') != '' ) {?>
        <div class="read-btn mt-4">
          <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" ><?php echo esc_html( get_theme_mod('electronics_store_post_button_text',__( 'READ MORE','electronics-store' )) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('electronics_store_post_button_text',__( 'READ MORE','electronics-store' )) ); ?></span>
          </a>
        </div>
      <?php }?>
    </div>
  </div>
  <hr>
</article>