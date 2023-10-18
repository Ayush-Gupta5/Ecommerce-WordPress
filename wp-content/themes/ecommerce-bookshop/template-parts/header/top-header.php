<?php 
/*
* Display contact details
*/
?>

<div class="top-header py-2">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 align-self-center">
        <?php if( get_theme_mod( 'author_writer_announcement_bar' ) != '') { ?>
          <p class="mb-0"><i class="fas fa-bullhorn mr-2"></i><?php echo esc_html( get_theme_mod('author_writer_announcement_bar','')); ?></p>
        <?php } ?>
      </div>
      <div class="col-lg-4 col-md-4 align-self-center">
        <div class="media-links text-md-right">
          <?php if( get_theme_mod( 'author_writer_facebook_url' ) != '' || get_theme_mod( 'author_writer_twitter_url' ) != '' || get_theme_mod( 'author_writer_instagram_url' ) != '' || get_theme_mod( 'author_writer_youtube_url' ) != '' || get_theme_mod( 'author_writer_pint_url' ) != '') { ?>
            <?php if( get_theme_mod( 'author_writer_facebook_url' ) != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'author_writer_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'author_writer_twitter_url' ) != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'author_writer_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'author_writer_instagram_url' ) != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'author_writer_instagram_url','' ) ); ?>"><i class="fab fa-instagram"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'author_writer_youtube_url' ) != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'author_writer_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'author_writer_pint_url' ) != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'author_writer_pint_url','' ) ); ?>"><i class="fab fa-pinterest"></i></a>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>