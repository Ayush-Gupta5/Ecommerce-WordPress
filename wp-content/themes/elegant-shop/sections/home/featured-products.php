<?php
/**
 * Featured Products Section
 * 
 * @package Elegant_Shop
 */ 

$ed_section   = get_theme_mod( 'ed_featured_prod_sec', false );
$sec_title    = get_theme_mod( 'featured_prod_sec_title', __( 'Our Featured Products', 'elegant-shop' ) );
$prod_select  = get_theme_mod( 'cat_tab_custom' );

if( $ed_section && elegant_shop_is_woocommerce_activated() && ( $sec_title || $prod_select ) ){ 
    $shop_url = wc_get_page_permalink( 'shop' ); ?>
    <section class="featured-products" id="featured-products">
        <div class="container">
            <?php if( $sec_title ) echo '<div class="heading"><h2 class="heading__title heading__underlined heading__underlined--center">' . esc_html( $sec_title ) . '</h2></div>'; ?>
            <div id="temp" style="display: none;"></div>
			<?php elegant_shop_get_category_tabs(); ?>
        </div>
    </section>
<?php }