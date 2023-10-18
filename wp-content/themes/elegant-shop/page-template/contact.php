<?php 
/**
 * Template Name: Contact page
 * 
 * @package Elegant_Shop
 */

$contact_title   = get_theme_mod( 'contact_title', __( 'Keep in touch with us', 'elegant-shop' ) ); 
$contact_content = get_theme_mod( 'contact_content' ); 

get_header(); ?>

    <div id="page" class="site">
        <div class="contact">
            <div class="container">
                <?php if( $contact_title || $contact_content ){
                    echo '<div class="heading">'; 
                        if( $contact_title ) echo '<h2 class="heading__title heading__underlined--center">' . esc_html( $contact_title ) . '</h2>';
                        if( $contact_content ) echo '<span class="heading__text">' . wp_kses_post( wpautop( $contact_content ) ) . '</span>'; 
                    echo '</div>';
                } 
                echo '<ul class="icon-grid">';
                    /**
                     * 
                     * @hooked elegant_shop_location        - 10
                     * @hooked elegant_shop_contact_info    - 20
                     * @hooked elegant_shop_timing          - 30
                     */
                    do_action( 'elegant_shop_contact_page_details' );
                echo '</ul>'; 

                /**
                 * 
                 * @hooked elegant_shop_google_map      - 10
                 * @hooked elegant_shop_contact_form    - 20
                 * @hooked elegant_shop_social          - 30
                 */
                do_action( 'elegant_shop_contact_page_footer' );
                ?>
            </div>
        </div>
    </div>

<?php get_footer(); 