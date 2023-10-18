<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-ma">
 *
 * @package Electronics Gadgets
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class="main-bodybox">
	<?php if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}?>
	<?php if(get_theme_mod('electronics_store_preloader_hide',false)!= '' || get_theme_mod('electronics_store_responsive_preloader_hide',false) != ''){ ?>
    <?php if(get_theme_mod( 'electronics_store_preloader_type','center-square') == 'center-square'){ ?>
	    <div class='preloader'>
		    <div class='preloader-squares'>
				<div class='square'></div>
				<div class='square'></div>
				<div class='square'></div>
				<div class='square'></div>
		    </div>
			</div>
    <?php }else if(get_theme_mod( 'electronics_store_preloader_type') == 'chasing-square') {?>    
      <div class='preloader'>
				<div class='preloader-chasing-squares'>
					<div class='square'></div>
					<div class='square'></div>
					<div class='square'></div>
					<div class='square'></div>
				</div>
			</div>
    <?php }?>
	<?php }?>
	<header role="banner">
		<a class="screen-reader-text skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'electronics-gadgets' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'electronics-gadgets' );?></span></a>
		<div id="header">
			<?php if(get_theme_mod('electronics_store_show_topbar',false) == true) {?>
		  	<div class="topbar">
		  		<div class="container">
		  			<div class="row">
		  				<div class="col-lg-3 col-md-12 topbar-links text-lg-start text-center mb-lg-0 mb-3 align-self-center">
		  					<?php if(get_theme_mod('electronics_store_topbar_shipping_text') != '' || get_theme_mod('electronics_store_topbar_shipping_url') != ''){?>
		  						<span class="shipping-link"><a href="<?php echo esc_url(get_theme_mod('electronics_store_topbar_shipping_url')); ?>"><?php echo esc_html(get_theme_mod('electronics_store_topbar_shipping_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('electronics_store_topbar_shipping_text')); ?></span></a></span>
		  					<?php }?>
		  					<?php if(get_theme_mod('electronics_store_topbar_faqs_text') != '' || get_theme_mod('electronics_store_topbar_faqs_url') != ''){?>
		  						<span class="faqs-link"><a href="<?php echo esc_url(get_theme_mod('electronics_store_topbar_faqs_url')); ?>"><?php echo esc_html(get_theme_mod('electronics_store_topbar_faqs_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('electronics_store_topbar_faqs_text')); ?></span></a></span>
		  					<?php }?>
		  					<?php if(get_theme_mod('electronics_store_topbar_contact_text') != '' || get_theme_mod('electronics_store_topbar_contact_url') != ''){?>
		  						<span class="contact-link"><a href="<?php echo esc_url(get_theme_mod('electronics_store_topbar_contact_url')); ?>"><?php echo esc_html(get_theme_mod('electronics_store_topbar_contact_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('electronics_store_topbar_contact_text')); ?></span></a></span>
		  					<?php }?>
		  				</div>
		  				<div class="col-lg-6 col-md-12 align-self-center">
		  					<?php if(get_theme_mod('electronics_store_topbar_sale_text') != ''){?>
		  						<p class="sale-text mb-lg-0 text-center"><?php echo esc_html(get_theme_mod('electronics_store_topbar_sale_text')); ?></p>
		  					<?php }?>
		  				</div>
		  				<div class="col-lg-3 col-md-12 align-self-center">
		  					<?php if(get_theme_mod('electronics_store_topbar_guarantee_text') != ''){?>
		  						<p class="guarantee-text text-lg-end text-center mb-0"><?php echo esc_html(get_theme_mod('electronics_store_topbar_guarantee_text')); ?></p>
		  					<?php }?>
		  				</div>
		  			</div>
		  		</div>
		  	</div>
		  <?php }?>
		  <div class="middle-header">
		  	<div class="container">
		  		<div class="row">
		  			<div class="col-lg-3 col-md-4 align-self-center">
		  				<div class="logo text-md-start text-center">
				     	 	<?php if ( has_custom_logo() ) : ?>
			     	    	<div class="site-logo"><?php the_custom_logo(); ?></div>
		            <?php endif; ?>
		            <?php if( get_theme_mod( 'electronics_store_site_title',true) != '') { ?>
			            <?php $blog_info = get_bloginfo( 'name' ); ?>
			            <?php if ( ! empty( $blog_info ) ) : ?>
				            <?php if ( is_front_page() && is_home() ) : ?>
				              <h1 class="site-title mt-0 p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				            <?php else : ?>
				              <p class="site-title mt-0 p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				            <?php endif; ?>
			            <?php endif; ?>
				        <?php }?>
				        <?php if( get_theme_mod( 'electronics_store_site_tagline',true) != '') { ?>
			            <?php
			            $description = get_bloginfo( 'description', 'display' );
			            if ( $description || is_customize_preview() ) :
			            ?>
				            <p class="site-description">
				              <?php echo esc_html($description); ?>
				            </p>
			            <?php endif; ?>
				        <?php }?>
					    </div>
		  			</div>
		  			<div class="col-lg-6 col-md-5 align-self-center">
		  				<?php if(class_exists('WooCommerce')){ ?>
			  				<div class="header-search">
			  					<?php get_product_search_form(); ?>
			  				</div>
			  			<?php }?>
		  			</div>
		  			<div class="col-lg-3 col-md-3 cart-icons align-self-center text-md-end text-center my-md-0 my-3">
              <?php if(get_theme_mod('electronics_store_wishlist_url') != ''){ ?>
                <span class="wishlist"><a href="<?php echo esc_url(get_theme_mod('electronics_store_wishlist_url')); ?>"><i class="far fa-heart"></i><span class="screen-reader-text"><?php esc_html_e( 'Wishlist','electronics-gadgets' );?></span></a></span>
              <?php } ?>
              <?php if(class_exists('woocommerce')){ ?>
                <span class="myaccount-link"><a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="far fa-user"></i><span class="screen-reader-text"><?php esc_html_e( 'My Account','electronics-gadgets' );?></span></a></span>
              <?php }?>
		  				<?php if(class_exists('woocommerce')){ ?>
                <span class="cart_no"><a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>"><i class="fas fa-shopping-bag"></i><span class="screen-reader-text"><?php esc_html_e( 'Cart item','electronics-gadgets' );?></span></a></span>
              <?php } ?>
		  			</div>
		  		</div>
		  	</div>
		  </div>
	  	<div class="menu-section">
	  		<div class="container">
	  			<div class="row">
	  				<div class="col-lg-3 col-md-4">
	  					<?php if(class_exists('woocommerce')){ ?>
				        <div class="product-category position-relative">
			            <button class="product-btn"><?php esc_html_e('All Categories','electronics-gadgets'); ?><i class="fas fa-angle-down"></i></button>
				          <div class="product-cat">
				            <?php
				              $args = array(
				               'orderby'    => 'title',
				               'order'      => 'ASC',
				               'hide_empty' => 0,
				               'parent'  => 0
				              );
				             $product_categories = get_terms( 'product_cat', $args );
				             $count = count($product_categories); ?>
				             <ul>
				              <?php if ( $count > 0 ){
				                foreach ( $product_categories as $product_category) {
				                  $cats_id   = $product_category->term_id;
				                  $cat_link = get_category_link( $cats_id );
				                  if ($product_category->category_parent == 0) { ?>
				                  <li class="drp_dwn_menu py-2 mx-3"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
				                  <?php
				                  }
				                  echo esc_html( $product_category->name ); ?></a><i class="fas fa-chevron-right"></i></li>
				                  <?php
				                }
				              } ?>
				            </ul>
				          </div>
				        </div>
				      <?php }?>
	  				</div>
		  			<div class="<?php if(class_exists('woocommerce')){ ?>col-lg-9 col-md-8 text-lg-end <?php } else {?> col-lg-12 col-md-12 text-lg-center <?php }?> align-self-center">
		  				<div class="menubox <?php if( get_theme_mod( 'electronics_store_sticky_header') != '' || get_theme_mod('electronics_store_responsive_sticky_header') != '') { ?> sticky-header<?php } else { ?>close-sticky <?php } ?>">
								<?php if(has_nav_menu('primary')){ ?>
							   	<div class="toggle-menu responsive-menu text-end">
		               	<button role="tab" onclick="electronics_store_menu_open()"><i class="<?php echo esc_attr(get_theme_mod('electronics_store_responsive_open_menu_icon','fas fa-bars'));?> py-1 px-2"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','electronics-gadgets'); ?></span></button>
		             	</div>
		             	<div id="menu-sidebar" class="nav side-menu">
		                <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'electronics-gadgets' ); ?>">
		                  <?php 
		                    wp_nav_menu( array( 
		                      'theme_location' => 'primary',
		                      'container_class' => 'main-menu-navigation clearfix' ,
		                      'menu_class' => 'clearfix',
		                      'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav m-0 p-0">%3$s</ul>',
		                      'fallback_cb' => 'wp_page_menu',
		                    ) ); 
		                  ?>
		                  <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="electronics_store_menu_close()"><i class="<?php echo esc_attr(get_theme_mod('electronics_store_responsive_close_menu_icon','fas fa-times'));?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','electronics-gadgets'); ?></span></a>
		                </nav>
		            	</div>
		          	<?php }?>
		          </div>
						</div>
					</div>
	  		</div>
	  	</div>
		</div>
	</header>