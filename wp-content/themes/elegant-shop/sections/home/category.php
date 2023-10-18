<?php
/**
 * Category Section
 * 
 * @package Elegant_Shop
 */

$ed_section   = get_theme_mod( 'ed_category_sec', false );
$categories   = get_theme_mod( 'cat_select_repeater' );
$open_new_tab = get_theme_mod( 'cat_sec_new_tab', false ); 
$new_tab      = ( $open_new_tab ) ? 'target=_blank' : '';

if( $ed_section && $categories ){ ?>
    <section class="spacing" id="category-section">
        <div class="categories">
            <div class="container">
                <?php if( $categories ){
                    echo '<div class="row">'; 
                    foreach( $categories as $cat ){
                        $catID     = ( isset( $cat['choose_cat'] ) && $cat['choose_cat'] ) ? $cat['choose_cat'] : '';
                        if( $catID ){
                            $cat_name = get_the_category_by_ID( $catID );
                            $image    = wp_get_attachment_image( get_term_meta( $catID, 'thumbnail_id', true ) );
                            echo '<div class="col">';
                                echo '<a href="' . esc_url( get_category_link( $catID ) ) . '" class="categories__item"' . esc_attr( $new_tab ) . '>';
                                    if( $image ) echo '<figure class="categories__img">' . $image . '</figure>';
                                    if( $cat_name ) echo '<h5>' . esc_html( $cat_name ) . '</h5>';
                                echo '</a>';
                            echo '</div>';
                        }
                    }
                }
                echo '</div>'; ?>
            </div>
        </div>
    </section>
<?php }