<?php
/**
 * Products Category Section
 * 
 * @package Elegant_Shop
 */

$ed_section   = get_theme_mod( 'ed_prod_cat_sec', false ); 
$cat_repeater = get_theme_mod( 'cat_list_custom' ); 
$label        = get_theme_mod( 'prod_cat_btn', __( 'Shop Now', 'elegant-shop' ) ); 
$open_new_tab = get_theme_mod( 'prod_cat_new_tab', false );
$new_tab      = ( $open_new_tab ) ? 'target=_blank' : '';
$product_type = get_theme_mod( 'cat_listing_type', 'latest' );

if( $ed_section && $cat_repeater ){ ?>
    <section class="product-category" id="product-category">
        <div class="container">
            <div class="row">
                <?php foreach( $cat_repeater as $cat ){
                    $catTitle  = ( isset( $cat['title'] ) && $cat['title'] ) ? $cat['title'] : '';
                    $catID     = ( isset( $cat['choose_cat'] ) && $cat['choose_cat'] ) ? $cat['choose_cat'] : '';
                    
                    if( $catTitle || $catID ){
                        $args = array(
                            'post_type'      => 'product',
                            'tax_query'      => array( array( 'taxonomy' => 'product_cat', 'terms' => $catID ) ),
                            'posts_per_page' => 3,
                        );

                        $qry = new WP_Query( $args );
                        echo '<div class="col">';  
                            if( $catTitle ) echo '<div class="heading"><h2 class="heading__title heading__underlined">' . esc_html( $catTitle ) . '<h2></div>'; 
                            if( $qry->have_posts() ){
                                while( $qry->have_posts() ){ $qry->the_post();
                                    echo '<div class="product__wrap">';
                                        echo '<div class="image">';
                                            echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"' . esc_attr( $new_tab ) . '>';
                                                if( has_post_thumbnail() ){
                                                    the_post_thumbnail( 'thumbnail' );    
                                                }else{
                                                    elegant_shop_fallback_svg( 'thumbnail' );
                                                }
                                            echo '</a>';
                                        echo '</div>';
                                        echo '<div class="product__details">';
                                            the_title('<div class="product__title"><a href="' . esc_url( get_permalink() ) . '"' . esc_attr( $new_tab ) . '>', '</a></div>' );
                                            woocommerce_template_single_price();
                                            if( $label ) echo '<a href="' . esc_url( get_permalink() ) . '" class="btn btn-underlined"' . esc_attr( $new_tab ) . '>' . esc_html( $label ) . '</a>';
                                        echo '</div>';
                                    echo '</div>';
                                }
                            }
                        echo '</div>';
                    }
                } ?>
            </div>
        </div>
    </section>
<?php }