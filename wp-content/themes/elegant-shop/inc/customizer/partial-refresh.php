<?php
/**
 * Customizer Partials
 *
 * @package Elegant_Shop
 */
    

if( ! function_exists( 'elegant_shop_get_footer_copyright' ) ) :
/**
 * Footer Copyright
*/
function elegant_shop_get_footer_copyright(){
    $copyright = get_theme_mod( 'footer_copyright' );
    echo '<span class="copyright">';
    if( $copyright ){
        echo wp_kses_post( elegant_shop_apply_theme_shortcode( $copyright ) );
    }else{
        esc_html_e( '&copy; Copyright ', 'elegant-shop' );
        echo date_i18n( esc_html__( 'Y', 'elegant-shop' ) );
        echo ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>. ';
        esc_html_e( 'All Rights Reserved.', 'elegant-shop' );
    }
    echo '</span>'; 
}
endif;

if( ! function_exists( 'elegant_shop_get_author_link' ) ) :
/**
 * Show/Hide Author link in footer
 * 
*/
function elegant_shop_get_author_link(){
    echo '<span class="author-link">'; 
    esc_html_e( 'Developed By ', 'elegant-shop' );
    echo '<a href="' . esc_url( 'https://glthemes.com/' ) .'" rel="nofollow" target="_blank">' . esc_html__( 'Good Looking Themes.', 'elegant-shop' ) . '</a>';
    echo '</span>';
}
endif;

if( ! function_exists( 'elegant_shop_get_wp_link' ) ) :
/**
 * Show/Hide WordPress link in footer
*/
function elegant_shop_get_wp_link(){
    printf( esc_html__( '%1$s Powered by %2$s%3$s', 'elegant-shop' ), '<span class="wp-link">', '<a href="'. esc_url( __( 'https://wordpress.org/', 'elegant-shop' ) ) .'" target="_blank">WordPress</a>.', '</span>' );
    
    if ( function_exists( 'the_privacy_policy_link' ) ) {
        the_privacy_policy_link( '<span class="policy_link">', '</span>');
    }
}
endif;

if( ! function_exists( 'elegant_shop_pro_get_banner_subtitle' ) ) :
function elegant_shop_pro_get_banner_subtitle(){
    return get_theme_mod( 'banner_subtitle', __( 'NEW ARRIVALS 2022', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_get_banner_title' ) ) :
function elegant_shop_get_banner_title(){
    return get_theme_mod( 'banner_title', __( 'Best Higher End Level Smartphone', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_pro_get_banner_content' ) ) :
function elegant_shop_pro_get_banner_content(){
    return get_theme_mod( 'banner_content' );
}
endif;

if( ! function_exists( 'elegant_shop_topbar_notification_text' ) ) :
function elegant_shop_topbar_notification_text(){
    return get_theme_mod( 'notification_text', __( 'Due to the COVID 19 pandamic, our shipping may be delayed ! ','elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_notification_btn_text' ) ) :
function elegant_shop_notification_btn_text(){
    return get_theme_mod( 'notification_label', __( 'Click here to know more','elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_get_new_arrivals_sec_title' ) ) :
/**
 * Active Callback for new arrivals title
 */
function elegant_shop_get_new_arrivals_sec_title(){
    return get_theme_mod( 'new_arrivals_sec_title', __( 'New Arrivals', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_get_featured_prod_sec_title' ) ) :
/**
 * Active Callback for Featured product title
 */
function elegant_shop_get_featured_prod_sec_title(){
    return get_theme_mod( 'featured_prod_sec_title', __( 'Our Featured Products', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_get_prod_deal_title' ) ) :
/**
 * Active Callback for Deals section
 */
function elegant_shop_get_prod_deal_title(){
    return get_theme_mod( 'prod_deal_title', __( 'Golder Plated TAG Heuer Carrera Watch', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_get_prod_deal_subtitle' ) ) :
/**
 * Active Callback for Deals section
 */
function elegant_shop_get_prod_deal_subtitle(){
    return get_theme_mod( 'prod_deal_subtitle', __( 'Deal Ends At', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_get_prod_deal_button' ) ) :
/**
 * Active Callback for Deals section
 */
function elegant_shop_get_prod_deal_button(){
    return get_theme_mod( 'prod_deal_button', __( 'Shop Now', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_get_prod_cat_btn' ) ) :
/**
 * Active Callback for Product Cat 
 */
function elegant_shop_get_prod_cat_btn(){
    return get_theme_mod( 'prod_cat_btn', __( 'Shop Now', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_get_blog_btn_label' ) ) :
/**
 * Active Callback for News and blog
 */
function elegant_shop_get_blog_btn_label(){
    return get_theme_mod( 'blog_btn_label', __( 'Read More', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_blog_title' ) ) :
/**
 * Active Callback for News and blog
 */
function elegant_shop_blog_title(){
    return get_theme_mod( 'blog_title', __( 'News And Blogs', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_services_title' ) ) :
function elegant_shop_services_title(){
    return get_theme_mod( 'services_title', __( 'Our Services', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_services_subtitle' ) ) :
function elegant_shop_services_subtitle(){
    return get_theme_mod( 'services_subtitle' );
}
endif;

if( ! function_exists( 'elegant_shop_services_cta_title' ) ) :
function elegant_shop_services_cta_title(){
    return get_theme_mod( 'services_cta_title',  __( 'Browse Through Our Products Library', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_services_cta_subtitle' ) ) :
function elegant_shop_services_cta_subtitle(){
    return get_theme_mod( 'services_cta_subtitle' );
}
endif;

if( ! function_exists( 'elegant_shop_services_cta_btn_lbl' ) ) :
function elegant_shop_services_cta_btn_lbl(){
    return get_theme_mod( 'services_cta_btn_lbl', __( 'Shop Now', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_partner_title_services' ) ) :
function elegant_shop_partner_title_services(){
    return get_theme_mod( 'partner_title_services', __( 'Our Trusted Branding Partners', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_partner_subtitle_services' ) ) :
function elegant_shop_partner_subtitle_services(){
    return get_theme_mod( 'partner_subtitle_services' );
}
endif;

if( ! function_exists( 'elegant_shop_team_title' ) ) :
function elegant_shop_team_title(){
    return get_theme_mod( 'team_title', __( 'Team Members', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_team_subtitle' ) ) :
function elegant_shop_team_subtitle(){
    return get_theme_mod( 'team_subtitle' );
}
endif;

if( ! function_exists( 'elegant_shop_testimonial_title' ) ) :
function elegant_shop_testimonial_title(){
    return get_theme_mod( 'testimonial_title', __( 'Our Testimonials', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_testimonial_content' ) ) :
function elegant_shop_testimonial_content(){
    return get_theme_mod( 'testimonial_content' );
}
endif;

if( ! function_exists( 'elegant_shop_test_cta_title' ) ) :
function elegant_shop_test_cta_title(){
    return get_theme_mod( 'test_cta_title', __( 'Browse Through Our Products Library', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_test_cta_subtitle' ) ) :
function elegant_shop_test_cta_subtitle(){
    return get_theme_mod( 'test_cta_subtitle' );
}
endif;

if( ! function_exists( 'elegant_shop_test_cta_btn_lbl' ) ) :
function elegant_shop_test_cta_btn_lbl(){
    return get_theme_mod( 'test_cta_btn_lbl', __( 'Shop Now', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_partner_title_test' ) ) :
function elegant_shop_partner_title_test(){
    return get_theme_mod( 'partner_title_test', __( 'Our Trusted Branding Partners', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_partner_subtitle_test' ) ) :
function elegant_shop_partner_subtitle_test(){
    return get_theme_mod( 'partner_subtitle_test' );
}
endif;

if( ! function_exists( 'elegant_shop_about_featured_subtitle' ) ) :
function elegant_shop_about_featured_subtitle(){
    return get_theme_mod( 'about_featured_subtitle', __( 'Our Story', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_about_featured_title' ) ) :
function elegant_shop_about_featured_title(){
    return get_theme_mod( 'about_featured_title', __( 'Producing', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_get_abt_readmore_lbl' ) ) :
function elegant_shop_get_abt_readmore_lbl(){
    return get_theme_mod( 'abt_readmore_lbl', __( 'Go To Shop', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_about_second_featured_subtitle' ) ) :
function elegant_shop_about_second_featured_subtitle(){
    return get_theme_mod( 'about_second_featured_subtitle', __( 'Our Story', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_about_second_featured_title' ) ) :
function elegant_shop_about_second_featured_title(){
    return get_theme_mod( 'about_second_featured_title', __( 'Producing', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_abt_cta_title' ) ) :
function elegant_shop_abt_cta_title(){
    return get_theme_mod( 'abt_cta_title', __( 'Browse Through Our Products Library', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_abt_cta_subtitle' ) ) :
function elegant_shop_abt_cta_subtitle(){
    return get_theme_mod( 'abt_cta_subtitle' );
}
endif;

if( ! function_exists( 'elegant_shop_abt_cta_contact_lbl' ) ) :
function elegant_shop_abt_cta_contact_lbl(){
    return get_theme_mod( 'abt_cta_btn_lbl', __( 'Shop Now', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_partner_title_abt' ) ) :
function elegant_shop_partner_title_abt(){
    return get_theme_mod( 'partner_title_abt', __( 'Our Trusted Branding Partners', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_partner_subtitle_abt' ) ) :
function elegant_shop_partner_subtitle_abt(){
    return get_theme_mod( 'partner_subtitle_abt' );
}
endif;

if( ! function_exists( 'elegant_shop_abt_team_title' ) ) :
function elegant_shop_abt_team_title(){
    return get_theme_mod( 'abt_team_title', __( 'Team Members', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_abt_team_subtitle' ) ) :
function elegant_shop_abt_team_subtitle(){
    return get_theme_mod( 'abt_team_subtitle' );
}
endif;

if( ! function_exists( 'elegant_shop_abt_testimonial_title' ) ) :
function elegant_shop_abt_testimonial_title(){
    return get_theme_mod( 'abt_testimonial_title', __( 'Testimonials', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_abt_testimonial_subtitle' ) ) :
function elegant_shop_abt_testimonial_subtitle(){
    return get_theme_mod( 'abt_testimonial_subtitle' );
}
endif;

if( ! function_exists( 'elegant_shop_contact_title' ) ) :
function elegant_shop_contact_title(){
    return get_theme_mod( 'contact_title', __( 'Keep in touch with us', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_contact_social_title' ) ) :
function elegant_shop_contact_social_title(){
    return get_theme_mod( 'social_title', __( 'Follow Us:', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_contact_form_title' ) ) :
function elegant_shop_contact_form_title(){
    return get_theme_mod( 'contact_form_title', __( 'Get In Touch', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_topics_title' ) ) :
function elegant_shop_topics_title(){
    return get_theme_mod( 'topics_title', __( 'Topics', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_partner_title' ) ) :
function elegant_shop_partner_title(){
    return get_theme_mod( 'partner_title', __( 'Our Clients', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_partner_subtitle' ) ) :
function elegant_shop_partner_subtitle(){
    return get_theme_mod( 'partner_subtitle' );
}
endif;

if( ! function_exists( 'elegant_shop_partner_cta_title' ) ) :
function elegant_shop_partner_cta_title(){
    return get_theme_mod( 'partner_cta_title', __( 'Browse Through Our Products Library', 'elegant-shop' ) );
}
endif;

if( ! function_exists( 'elegant_shop_partner_cta_subtitle' ) ) :
function elegant_shop_partner_cta_subtitle(){
    return get_theme_mod( 'partner_cta_subtitle' );
}
endif;

if( ! function_exists( 'elegant_shop_partner_cta_btn_lbl' ) ) :
function elegant_shop_partner_cta_btn_lbl(){
    return get_theme_mod( 'partner_cta_btn_lbl', __( 'Shop Now', 'elegant-shop' ) );
}
endif;