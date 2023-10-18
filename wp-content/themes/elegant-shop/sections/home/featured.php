<?php
/**
 * Featured Section
 * 
 * @package Elegant_Shop
 */ 

$ed_section         = get_theme_mod( 'ed_featured_sec', false );
$featured_repeater  = get_theme_mod( 'featured_repeater_home' );
$open_new_tab       = get_theme_mod( 'featured_new_tab_home', false );
$new_tab            = ( $open_new_tab ) ? 'target=_blank' : '';

if( $ed_section && $featured_repeater ){ ?>
    <section class="sale" id="sale-section">
        <div class="container">
            <?php if( $featured_repeater ){
                echo '<div class="row">';
                    foreach( $featured_repeater as $items ){
                        $tag        = ( isset( $items['tag'] ) && $items['tag'] ) ? $items['tag'] : '';
                        $itemTitle  = ( isset( $items['title'] ) && $items['title'] ) ? $items['title'] : '';
                        $label      = ( isset( $items['label'] ) && $items['label'] ) ? $items['label'] : '';
                        $link       = ( isset( $items['link'] ) && $items['link'] ) ? $items['link'] : '';
                        $itemImg    = ( isset( $items['image'] ) && $items['image'] ) ? $items['image'] : '';
                        if( $tag || $itemTitle || $label || $link || $itemImg ){
                            echo '<div class="sale__item-wrap">';
                                echo '<div class="sale__item" style="background-image: url(' . wp_get_attachment_image_url( $itemImg, 'full' ) . '")>';
                                    if( $tag || $itemTitle || ( $label && $link ) ){
                                        echo '<div class="sale__text">';
                                            if( $tag ) echo '<span class="label-lg text-primary">' . esc_html( $tag ) . '</span>';
                                            if( $itemTitle ) echo '<h3>' . esc_html( $itemTitle ) . '</h3>';
                                            if( $label && $link ) echo '<a href="' . esc_url( $link ) . '" class="btn btn-underlined"' . esc_attr( $new_tab ) . '>' . esc_html( $label ) . '</a>';
                                        echo '</div>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        }
                    }
                echo '</div>';
            } ?>
        </div>
    </section>
<?php }