<?php
/**
 * The template for displaying home page.
 *
 * Template Name: Custom Home Page
 *
 * @package Electronics Gadgets
 */
get_header(); ?>

<main id="main" role="main">
  
  <?php if( get_theme_mod( 'electronics_store_slider_hide_show', false) != ''){ ?>
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="3000"> 
        <?php $electronics_store_slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'electronics_store_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $electronics_store_slider_pages[] = $mod;
            }
          }
          if( !empty($electronics_store_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $electronics_store_slider_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <a href="<?php echo esc_url( get_permalink() );?>"><?php if(has_post_thumbnail()){
                the_post_thumbnail();
              } else{?>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner-image.png" alt="" />
              <?php } ?>
            <span class="screen-reader-text"><?php esc_html_e( 'Slider Image','electronics-gadgets');?> </a>
            <div class="carousel-caption">
              <div class="inner_carousel">
                <?php if( get_theme_mod('electronics_store_slider_title',true) != ''){ ?>
                  <h1><?php the_title(); ?></h1>
                <?php }?>  
                <?php if( get_theme_mod('electronics_store_slider_content',true) != ''){ ?>
                  <p class="mb-3"><?php $electronics_gadgets_excerpt = get_the_excerpt(); echo esc_html( electronics_store_string_limit_words( $electronics_gadgets_excerpt,esc_attr(get_theme_mod('electronics_store_slider_excerpt_length','20')))); ?></p>
                <?php }?>   
                <div class="read-btn mt-lg-4 text-md-start text-center">
                  <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small"><?php echo esc_html('LEARN MORE', 'electronics-gadgets'); ?><span class="screen-reader-text"><?php echo esc_html('LEARN MORE', 'electronics-gadgets'); ?></span></a>
                </div>
              </div>
            </div>
          </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Previous','electronics-gadgets');?></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Next','electronics-gadgets');?></span>
        </a>
      </div>  
      <div class="clearfix"></div>
    </section> 
  <?php }?>

  <?php do_action( 'electronics_store_before_product_section' ); ?>

  <section id="product-section" class="py-4">
    <div class="container">
      <?php if(get_theme_mod('electronics_store_section_title') != ''){ ?>
        <strong class="text-center mb-5 d-block"><?php echo esc_html(get_theme_mod('electronics_store_section_title')); ?></strong>
      <?php }?>
      <?php $electronics_store_product_page = array();
        $mod = absint( get_theme_mod( 'electronics_store_product_page'));
        if ( 'page-none-selected' != $mod ) {
          $electronics_store_product_page[] = $mod;
        }
        if( !empty($electronics_store_product_page) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $electronics_store_product_page,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $count = 0;
            while ( $query->have_posts() ) : $query->the_post(); ?>
              <?php the_content(); ?>
            <?php $count++; endwhile; ?>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
        endif;
        wp_reset_postdata();
      ?>
    </div>
  </section>

  <?php do_action( 'electronics_store_after_product_section' ); ?>

  <div id="content-ma">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>