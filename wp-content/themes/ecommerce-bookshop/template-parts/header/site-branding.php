<?php
/*
* Display Logo and nav
*/
?>
<?php
$author_writer_sticky = get_theme_mod('author_writer_sticky');
    $author_writer_data_sticky = "false";
    if ($author_writer_sticky) {
    $author_writer_data_sticky = "true";
    }
    global $wp_customize;
?>

<div class="headerbox py-3 <?php if( is_user_logged_in() && !isset( $wp_customize ) ){ echo "login-user";} ?>" data-sticky="<?php echo esc_attr($author_writer_data_sticky); ?>">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-5 col-9 align-self-center">
        <?php $author_writer_logo_settings = get_theme_mod( 'author_writer_logo_settings','Different Line');
        if($author_writer_logo_settings == 'Different Line'){ ?>
          <div class="logo mb-md-0">
            <?php if( has_custom_logo() ) author_writer_the_custom_logo(); ?>
            <?php if(get_theme_mod('author_writer_site_title',true) != ''){ ?>
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php }?>
            <?php $author_writer_description = get_bloginfo( 'description', 'display' );
            if ( $author_writer_description || is_customize_preview() ) : ?>
              <?php if(get_theme_mod('author_writer_site_tagline',true) != ''){ ?>
                <p class="site-description mb-0"><?php echo esc_html($author_writer_description); ?></p>
              <?php }?>
            <?php endif; ?>
          </div>
        <?php }else if($author_writer_logo_settings == 'Same Line'){ ?>
          <div class="logo logo-same-line mb-md-0">
            <div class="row">
              <div class="col-lg-5 col-md-5 align-self-md-center">
                <?php if( has_custom_logo() ) author_writer_the_custom_logo(); ?>
              </div>
              <div class="col-lg-7 col-md-7 align-self-md-center">
                <?php if(get_theme_mod('author_writer_site_title',true) != ''){ ?>
                  <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php }?>
                <?php $author_writer_description = get_bloginfo( 'description', 'display' );
                if ( $author_writer_description || is_customize_preview() ) : ?>
                  <?php if(get_theme_mod('author_writer_site_tagline',true) != ''){ ?>
                    <p class="site-description mb-0"><?php echo esc_html($author_writer_description); ?></p>
                  <?php }?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-7 col-md-3 col-3 align-self-center">
        <?php get_template_part( 'template-parts/navigation/site', 'nav' ); ?>
      </div>
      <div class="col-lg-2 col-md-4 align-self-center">
        <div class="book-tkt-btn my-4 my-md-0 text-center text-md-right">
          <?php if( get_theme_mod( 'author_writer_sign_in_link' ) != '' || get_theme_mod( 'author_writer_sign_in_button' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'author_writer_sign_in_link','' ) ); ?>" class="register-btn"><?php echo esc_html( get_theme_mod( 'author_writer_sign_in_button','' ) ); ?></a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>