<?php
/**
 * New Arrivals Section
 *
 * @package Elegant_Shop
 */

$ed_section      = get_theme_mod( 'ed_new_arrivals_sec', false );
$sec_title       = get_theme_mod( 'new_arrivals_sec_title', __( 'New Arrivals', 'elegant-shop' ) );
$prod_type       = get_theme_mod( 'new_arrivals_select', 'latest' );
$prod_cat        = get_theme_mod( 'new_arrivals_cat' );
$prod_no         = get_theme_mod( 'new_arrivals_no', 5 );
$open_new_tab    = get_theme_mod( 'new_arrivals_new_tab', false );
$new_tab         = ( $open_new_tab ) ? 'target=_blank' : '';

$args = array(
    'post_status'    => 'publish',
    'post_type'      => 'product',
    'posts_per_page' => $prod_no,
    'tax_query'      => array(
        array(
            'taxonomy' => 'product_cat',
            'terms'    => $prod_cat
        )
    )
);

$qry = new WP_Query( $args );

if( $ed_section && ( $sec_title || $qry->have_posts() ) ) { ?>
    <section class="new-arrivals" id="new-arrivals">
        <div class="container">
            <?php if( $sec_title ) echo '<div class="heading"><h2 class="heading__title heading__underlined heading__underlined--center">' . esc_html( $sec_title ) . '</h2></div>';
            if( $qry->have_posts() ){
                echo '<div class="new-arrivals__wrap owl-carousel">';
                    while( $qry->have_posts() ){ $qry->the_post(); global $product; ?>
                        <div class="new-arrivals__item">
                            <div class="new-arrivals__img">
                                <?php
                                echo '<a href="' . esc_url( get_permalink() ) . '"' . esc_attr( $new_tab ) . '>';
                                    if( has_post_thumbnail() ){
                                        the_post_thumbnail( 'elegant-shop-product' );
                                    }else{
                                        elegant_shop_fallback_svg( 'elegant-shop-product' );
                                    }
                                echo '</a>';
                                elegant_shop_get_products_sale( $product );
                                elegant_shop_overlay_content(); ?>
                            </div>
                            <div class="new-arrivals__content">
                                <?php
                                    the_title( '<h6><a href="' . esc_url( get_permalink() ) . '"' . esc_attr( $new_tab ) . '>', '</a></h6>' );
                                    woocommerce_template_single_price();
                                ?>
                            </div>
                        </div>
                    <?php } wp_reset_postdata();
                echo '</div>';
            } ?>
        </div>
    </section>
<?php }