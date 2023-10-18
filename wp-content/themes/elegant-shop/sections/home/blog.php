<?php
/**
 * Blogs Section
 * 
 * @package Elegant_Shop
 */
$sec_title      = get_theme_mod( 'blog_title', __( 'News And Blogs', 'elegant-shop' ) );
$label          = get_theme_mod( 'blog_btn_label', __( 'Read More', 'elegant-shop' ) );
$open_new_tab   = get_theme_mod( 'blog_new_tab', false );
$new_tab        = ( $open_new_tab ) ? 'target=_blank' : '';
$ed_blog        = get_theme_mod( 'ed_blog_sec', false );

$args   = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
);

$qry = new WP_Query( $args );

if( $ed_blog && ( $sec_title || $qry->have_posts() ) ){ ?>
    <section class="news-blog" id="news-blog">
        <div class="container">
            <?php if( $sec_title ) echo '<div class="heading"><h2 class="heading__title heading__underlined heading__underlined--center">' . esc_html( $sec_title ) . '</h2></div>';
            if( $qry->have_posts() ){
                echo '<div class="row">';
                    while( $qry->have_posts() ){ $qry->the_post();
                        echo '<div class="col">';
                            echo '<article class="post">';
                                echo '<div class="blog-card card">';
                                    echo '<a href="' . esc_url( get_permalink() ) . '"' . esc_attr( $new_tab ) . '>';
                                        echo '<figure class="card__img">';
                                            if( has_post_thumbnail() ){
                                                the_post_thumbnail( 'elegant-shop-blog' );    
                                            }else{
                                                elegant_shop_fallback_svg( 'elegant-shop-blog' );
                                            }
                                        echo '</figure>';
                                    echo '</a>';
                                    echo '<div class="card__content">';
                                        echo '<div class="category">';
                                            elegant_shop_category();
                                        echo '</div>';
                                        the_title('<a href="' . esc_url( get_permalink() ) . '" ' . esc_attr( $new_tab ) . '><h4>', '</h4></a>');
                                        if( $label ) echo '<a href="' . esc_url( get_permalink() ) . '" class="btn btn-underlined"' . esc_attr( $new_tab ) . '>' . esc_html( $label ) . '</a>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</article>';
                        echo '</div>';
                    } wp_reset_postdata();
                echo '</div>';
            } ?>
        </div>
    </section>
<?php }