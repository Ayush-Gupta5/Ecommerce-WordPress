<?php

/**
 * Extra functions to enhance the theme functionality
 *
 * @package Elegant_Shop
 */

 /**
  * Remove elegant shop top bar.
  *
  * @return void
  */
 function elegant_shop_top_bar() {
	 return;
}

/**
 * Banner section.
 *
 * @since 1.0.0
 *
 * @return html
 */
function elegant_shop_get_banner(){
    $ed_banner         = get_theme_mod( 'ed_banner_section', 'static_banner' );
    $btn_lbl           = get_theme_mod( 'banner_btn_lbl', __( 'Shop Now', 'electronics-shop' ) );
    $btn_link          = get_theme_mod( 'banner_btn_link', '#' );
    $slider_target     = get_theme_mod( 'slider_btn_new_tab', false ) ? 'target=_blank' : '';
    $banner_title      = get_theme_mod( 'banner_title', esc_html__( 'Find Your Best Holiday', 'electronics-shop' ) );
    $banner_subtitle   = get_theme_mod( 'banner_subtitle', __( 'Find great adventure holidays and activities around the planet.', 'electronics-shop' ) );
    $banner_content    = get_theme_mod( 'banner_content' );
    $banner_overlay    = get_theme_mod( 'banner_overlay', true );
    $image_size        = 'elegant-shop-slider';

    if( ( $ed_banner == 'static_banner' ) && has_custom_header() ){ ?>
        <div id="banner_section" class="banner right-align <?php if( has_header_video() ) echo esc_attr( ' banner-video ' ); ?> <?php if( $banner_overlay ) echo esc_attr( 'banner-overlay' ); ?>">
            <?php
            the_custom_header_markup();
            if( $ed_banner == 'static_banner' && ( $banner_title || $banner_subtitle || $banner_content || ( $btn_lbl && $btn_link ) ) ){ ?>
                <div class="banner__wrap">
                    <div class="container">
                        <div class="banner__text">
                            <?php
                                if( $banner_subtitle ) echo '<span class="banner__stitle">' . esc_html( $banner_subtitle ) . '</span>';
                                if( $banner_title ) echo '<h2 class="banner__title">' . esc_html( $banner_title ) . '</h2>';
                                if( $banner_content ) echo wp_kses_post( wpautop( $banner_content ) );
                                if( $btn_lbl && $btn_link ) { ?>
                                    <div class="btn-wrap">
                                        <?php
                                            if( $btn_lbl && $btn_link ) echo '<a href="' . esc_url( $btn_link ) . '" class="btn btn-lg btn-primary"' . esc_attr( $slider_target ) . '>' . esc_html( $btn_lbl ) . '</a>';
                                        ?>
                                    </div>
                                <?php }
                            ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php
    }
}