<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Electronics Gadgets
 */
?>
    <footer role="contentinfo">
        <?php //Set widget areas classes based on user choice
            $electronics_store_widget_areas = get_theme_mod('electronics_store_footer_widget_layout', '4');
            if ($electronics_store_widget_areas == '3') {
                $cols = 'col-lg-4 col-md-4';
            } elseif ($electronics_store_widget_areas == '4') {
                $cols = 'col-lg-3 col-md-3';
            } elseif ($electronics_store_widget_areas == '2') {
                $cols = 'col-lg-6 col-md-6';
            } else {
                $cols = 'col-lg-12 col-md-12';
            }
        ?>
        <div class="footertown">
            <div class="container">
                <div class="row">
                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                      <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
                        <?php dynamic_sidebar( 'footer-1'); ?>
                      </div>
                    <?php endif; ?> 
                    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                      <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
                        <?php dynamic_sidebar( 'footer-2'); ?>
                      </div>
                    <?php endif; ?> 
                    <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                      <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
                        <?php dynamic_sidebar( 'footer-3'); ?>
                      </div>
                    <?php endif; ?> 
                    <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
                      <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
                        <?php dynamic_sidebar( 'footer-4'); ?>
                      </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div id="footer">
        	<div class="container">
                <p class="mb-0"><?php electronics_gadgets_credit_link(); ?> <?php echo esc_html(get_theme_mod('electronics_store_footer_copy',__('By ThemesCaliber','electronics-gadgets'))); ?> </p>
            </div>
        </div>

        <?php if( get_theme_mod( 'electronics_store_show_back_to_top',true) != '' || get_theme_mod('electronics_store_responsive_show_back_to_top',true) != '') { ?>
            <?php $electronics_store_scroll_lay = get_theme_mod( 'electronics_store_back_to_top_alignment','Right');
            if($electronics_store_scroll_lay == 'Left'){ ?>
                <a href="#" class="scrollup left"><span><?php echo esc_html( get_theme_mod('electronics_store_back_to_top_text',__('Back to Top', 'electronics-gadgets' )) ); ?><?php if(get_theme_mod('electronics_store_back_to_top_icon') != 'None') {?><i class="<?php echo esc_html(get_theme_mod('electronics_store_back_to_top_icon','fas fa-arrow-up')); ?> ms-2"></i><?php }?></span><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('electronics_store_back_to_top_text',__('Back to Top', 'electronics-gadgets' )) ); ?></span></a>
            <?php }else if($electronics_store_scroll_lay == 'Center'){ ?>
                <a href="#" class="scrollup center"><span><?php echo esc_html( get_theme_mod('electronics_store_back_to_top_text',__('Back to Top', 'electronics-gadgets' )) ); ?><?php if(get_theme_mod('electronics_store_back_to_top_icon') != 'None') {?><i class="<?php echo esc_html(get_theme_mod('electronics_store_back_to_top_icon','fas fa-arrow-up')); ?> ms-2"></i><?php }?></span><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('electronics_store_back_to_top_text',__('Back to Top', 'electronics-gadgets' )) ); ?></span></a>
            <?php }else{ ?>
                <a href="#" class="scrollup right"><span><?php echo esc_html( get_theme_mod('electronics_store_back_to_top_text',__('Back to Top', 'electronics-gadgets' )) ); ?><?php if(get_theme_mod('electronics_store_back_to_top_icon') != 'None') {?><i class="<?php echo esc_attr(get_theme_mod('electronics_store_back_to_top_icon','fas fa-arrow-up')); ?> ms-2"></i><?php }?></span><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('electronics_store_back_to_top_text',__('Back to Top', 'electronics-gadgets' )) ); ?></span></a>
            <?php }?>
        <?php }?>
        <?php wp_footer(); ?>
    </footer>
</body>
</html>