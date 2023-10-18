<?php
/**
 * The template part for displaying slider
 *
 * @package Electronics Store
 * @subpackage electronics_store
 * @since Electronics Store 1.0
 */
?>
<div class="col-lg-4 col-md-4">
  <article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="services-box p-3">    
      <?php if(has_post_thumbnail() && get_theme_mod( 'electronics_store_feature_image_hide',true) != '') { ?>
        <div class="service-image my-2 p-3">
          <a href="<?php echo esc_url( get_permalink() ); ?>">
            <?php  the_post_thumbnail(); ?>
            <span class="screen-reader-text"><?php the_title(); ?></span>
          </a>
        </div>
      <?php }?>
      <h2 class="pt-0"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h2>
      <div class="lower-box">
        <?php if(get_the_excerpt()) { ?>
          <p><?php $electronics_store_excerpt = get_the_excerpt(); echo esc_html( electronics_store_string_limit_words( $electronics_store_excerpt, esc_attr(get_theme_mod('electronics_store_post_excerpt_length','20')))); ?><?php echo esc_html( get_theme_mod('electronics_store_button_excerpt_suffix','[...]') ); ?></p>
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
</div>
<div class="clearfix"></div>