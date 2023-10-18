<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Elegant_Shop
 */

if( ! function_exists( 'elegant_shop_doctype' ) ) :
/**
 * Doctype Declaration
*/
function elegant_shop_doctype(){ ?>
	<!DOCTYPE html>
	<html <?php language_attributes(); ?>>
	<?php
}
endif;
add_action( 'elegant_shop_doctype', 'elegant_shop_doctype' );

if( ! function_exists( 'elegant_shop_head' ) ) :
/**
 * Before wp_head 
*/
function elegant_shop_head(){ ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
}
endif;
add_action( 'elegant_shop_before_wp_head', 'elegant_shop_head' );

if( ! function_exists( 'elegant_shop_page_start' ) ) :
/**
 * Page Start
*/
function elegant_shop_page_start(){ ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content (Press Enter)', 'elegant-shop' ); ?></a>
    <?php
}
endif;
add_action( 'elegant_shop_before_header', 'elegant_shop_page_start', 20 );

if( ! function_exists( 'elegant_shop_sticky_bar' ) ) :
/**
 * Sticky Bar
*/
function elegant_shop_sticky_bar(){ 
    $ed_top_bar          = get_theme_mod( 'ed_top_bar', false );
    $notification_text   = get_theme_mod( 'notification_text', __( 'End of Season SALE now on thru 1/21.','elegant-shop' ) );
    $notification_btn_url= get_theme_mod( 'notification_btn_url', '#' );
    $notification_label  = get_theme_mod( 'notification_label', __( 'SHOP NOW', 'elegant-shop' ) );
    $top_bar_type        = get_theme_mod( 'top_bar_type', 'top_button_link' );
    $new_tab      = get_theme_mod( 'ed_open_new_target', false );
    $target = $new_tab ? ' target="_blank"' : '';

    if( $ed_top_bar ){
        if( $top_bar_type == 'top_button_link' && ( $notification_text || ( $notification_label && $notification_btn_url ) ) ) : ?>
            <div class="notification-wrap">
                <div class="container">
                    <div class="notification-bar">
                        <span class="get-notification-text"><?php echo '<span class="notification-text">' . esc_html( $notification_text ) . '</span>'; ?>
                        <a href="<?php echo esc_url( $notification_btn_url ); ?>" class="btn-readmore"<?php echo $target ?>><?php echo esc_html( $notification_label ); ?></a>
                        </span>
                        <button class="btn btn-outline close-btn times"></button>
                    </div>
                </div>
            </div> <!-- notification-bar -->
        <?php endif;
    } 
}
endif;
add_action( 'elegant_shop_header', 'elegant_shop_sticky_bar', 10 );

if( ! function_exists( 'elegant_shop_header' ) ) :
/**
 * Header Start
*/
function elegant_shop_header(){ 
    $ed_cart                  = get_theme_mod( 'ed_shopping_cart', true );
    ?>
    <header id="masthead" class="site-header layout-three" itemscope itemtype="http://schema.org/WPHeader">
        <?php elegant_shop_top_bar(); ?>
        <div class="desktop-header">        
            <div class="header-mid">
                <div class="container">
                    <?php 
                    elegant_shop_site_branding(); 

                    elegant_shop_primary_navigation(); ?>

                    <div class="right">
                        <?php 
                        elegant_shop_user_block();
                        elegant_shop_favourite_block(); 
                        if( elegant_shop_is_woocommerce_activated() && $ed_cart ) elegant_shop_wc_cart_count(); 
                        elegant_shop_header_search();
                        ?>
                    </div>
                </div>
            </div><!-- Headermid -->
        </div>
        <?php 
        elegant_shop_mobile_navigation(); ?>
    </header>
<?php }
endif;
add_action( 'elegant_shop_header', 'elegant_shop_header', 20 );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function elegant_shop_body_classes( $classes ) {
    $sticky_header = get_theme_mod( 'ed_sticky_header', false );

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

    if( $sticky_header ){ 
        $classes[] = 'sticky-header';
    }

    $classes[] = elegant_shop_sidebar();

	return $classes;
}
add_filter( 'body_class', 'elegant_shop_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function elegant_shop_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'elegant_shop_pingback_header' );

function elegant_shop_banner(){
    if( is_front_page() ) elegant_shop_get_banner();
}
add_action( 'elegant_shop_header', 'elegant_shop_banner', 25 );

if( ! function_exists( 'elegant_shop_footer_top' ) ) :
/**
 * Footer Top
*/
function elegant_shop_footer_top(){    
    $footer_sidebars = array( 'footer-one', 'footer-two', 'footer-three', 'footer-four' );
    $active_sidebars = array();
    $sidebar_count   = 0;
    
    foreach ( $footer_sidebars as $sidebar ) {
        if( is_active_sidebar( $sidebar ) ){
            array_push( $active_sidebars, $sidebar );
            $sidebar_count++ ;
        }
    }
                 
    if( $active_sidebars ){ ?>
        <div class="footer-top">
    		<div class="container">
    			<div class="grid column-<?php echo esc_attr( $sidebar_count ); ?>">
                <?php foreach( $active_sidebars as $active ){ ?>
    				<div class="col">
    				   <?php dynamic_sidebar( $active ); ?>	
    				</div>
                <?php } ?>
                </div>
    		</div>
    	</div>
        <?php 
    } if( is_active_sidebar( 'footer-five' ) ){
        echo '<div class="footer-newsletter">';
            echo '<div class="container">';
                dynamic_sidebar( 'footer-five' );
            echo '</div>';
        echo '</div>';
    }   
}
endif;
add_action( 'elegant_shop_footer', 'elegant_shop_footer_top', 30 );

if( ! function_exists( 'elegant_shop_footer_bottom' ) ) :
/**
 * Footer Bottom
*/
function elegant_shop_footer_bottom(){ 
    $footer_img  = get_theme_mod( 'footer_image' ); 
    $footer_link = get_theme_mod( 'footer_image_link', '#' ); ?>
    <div class="footer-bottom">
		<div class="container">
            <div class="footer-bottom__wrap">
                <div class="site-info">            
                    <?php
                        elegant_shop_get_footer_copyright();
                        elegant_shop_get_author_link();
                        elegant_shop_get_wp_link();
                        if ( function_exists( 'the_privacy_policy_link' ) ) {
                            the_privacy_policy_link();
                        }
                    ?>               
                </div>
                <?php if( $footer_img ){
                    echo '<div class="footer-logo">';
                        if( $footer_link ) echo '<a href="' . $footer_link . '">';
                            if( $footer_img ) echo wp_get_attachment_image( $footer_img, 'full', false, array( 'itemprop' => 'image' ) );
                        if( $footer_link ) echo '</a>';
                    echo '</div>';
                } ?>
            </div>
		</div>
	</div>
    <?php
}
endif;
add_action( 'elegant_shop_footer', 'elegant_shop_footer_bottom', 40 );

if( ! function_exists( 'elegant_shop_post_thumbnail' ) ) :
/**
 * Post Thumbnail
*/
function elegant_shop_post_thumbnail(){ 
    $image_size = ( is_singular() ? 'full' : 'elegant-shop-blog' );
    if( ( is_single() && 'product' == get_post_type() ) || ( is_cart() || ( elegant_shop_is_yith_whislist_activated() && is_page( 'wishlist' ) ) ) ){
        return;
    } ?>
    <a href="<?php echo esc_url( get_permalink() ); ?>">
        <figure class="card__img">
            <?php 
            if( has_post_thumbnail() ){                        
                the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    	
            }elseif( ! is_singular() ){
                elegant_shop_fallback_svg( $image_size );//fallback    
            } ?> 
        </figure>
    </a>
<?php }
endif;
add_action( 'elegant_shop_before_entry_content', 'elegant_shop_post_thumbnail', 10 );

if( ! function_exists( 'elegant_shop_entry_header' ) ) :
/**
 * Content Header
*/
function elegant_shop_entry_header(){ 
    $ed_post_date   = get_theme_mod( 'ed_post_date', false );
    $ed_post_author = get_theme_mod( 'ed_post_author', false );
    $ed_category    = get_theme_mod( 'ed_category', false ); ?>
    <div class="entry-meta">
        <?php if( ! $ed_category ){
            echo '<div class="category">';
                elegant_shop_category();
            echo '</div>'; 
        } if( is_single() && 'post' == get_post_type() ){ ?>
            <span class="author-details">
                <?php
                    echo get_avatar( get_the_author_meta( 'ID' ), 32 );
                    if( ! $ed_post_author ) elegant_shop_posted_by();
                    if( ! $ed_post_date ) elegant_shop_posted_on();
                    echo '<span class="comment-count">' . get_comments_number( get_the_ID() ) . '</span>';
                ?>
            </span>
        <?php } ?>
    </div>
    <?php if( is_single() ){
        echo '<div class="entry-title-wrapper">';
            the_title( '<h1 class="entry-title">', '</h1>' );
        echo '</div>';
    }else{
        the_title( '<a href="' . esc_url(get_permalink()) . '"><h4>', '</h4></a>' ); 
    }
}
endif;
add_action( 'elegant_shop_content', 'elegant_shop_entry_header', 10 );

if( ! function_exists( 'elegant_shop_entry_content' ) ) :
/**
 * Content
*/
function elegant_shop_entry_content(){
    $ed_excerpt     = get_theme_mod( 'ed_excerpt', true ); 
    if( is_singular() || ! $ed_excerpt || ( get_post_format() != false ) ){
        echo '<div class="entry-content">';
            the_content();    
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'elegant-shop' ),
                'after'  => '</div>',
            ) );
        echo '</div>';
    }else{
        the_excerpt();
    }
}
endif;
add_action( 'elegant_shop_content', 'elegant_shop_entry_content', 20 );

if( ! function_exists( 'elegant_shop_content_entry_footer' ) ) :
/**
 * Content Footer
*/
function elegant_shop_content_entry_footer(){ 
    if( elegant_shop_is_woocommerce_activated() && 'product' == get_post_type() ) return;
    if( is_single() && 'post' == get_post_type() ){
        echo '<div class="entry-footer">';
            echo get_the_tag_list( '<div class="tag-list">', ' ', '</div>' );
        echo '</div>';
        elegant_shop_author_box();
    }else{ 
        $read_more = get_theme_mod( 'read_more_text', __( 'Read More', 'elegant-shop' ) );
        if( $read_more ) echo '<a href="' . esc_url( get_permalink() ) . '" class="btn btn-underlined">' . esc_html( $read_more ) . '</a>';
    }
}
endif;
add_action( 'elegant_shop_content', 'elegant_shop_content_entry_footer', 30 );

if( ! function_exists( 'elegant_shop_before_content' ) ) :
/**
 * Breadcrumb wrapper
*/
function elegant_shop_before_content(){
    if( ( is_archive() || is_search() || is_404() || is_singular() || is_home() ) && ! is_front_page() ){ ?>
        <div class="breadcrumb-wrapper">
            <div class="container">
                <?php elegant_shop_breadcrumb(); ?>
            </div>
        </div>
    <?php }
}
endif;
add_action( 'elegant_shop_header', 'elegant_shop_before_content', 30 );


if( ! function_exists( 'elegant_shop_content_start' ) ) :
/**
 * Content Start
*/
function elegant_shop_content_start(){ ?>
    <div id="content" class="site-content">
<?php }
endif;
add_action( 'elegant_shop_header', 'elegant_shop_content_start', 40 );

if( ! function_exists( 'elegant_shop_navigation' ) ) :
/**
 * navigation
 */
function elegant_shop_navigation(){
    if( is_single() && 'product' == get_post_type() ) return;
    if( is_singular() ){ 
        $next_post	= get_next_post();
        $prev_post  = get_previous_post();
        
        if( $next_post || $prev_post ){ ?>
            <nav class="post-navigation pagination">
                <div class="nav-links">
                    <?php if( $prev_post ){ ?>
                        <div class="nav-previous">
                            <a href="<?php the_permalink( $prev_post->ID ); ?>" rel="prev">
                                <article class="post">
                                    <figure class="post-thumbnail">
                                        <?php $prev_img = get_post_thumbnail_id( $prev_post->ID ); 
                                        if( $prev_img ){
                                            echo wp_get_attachment_image( $prev_img, 'thumbnail', false, array( 'itemprop' => 'image' ) );
                                        }else{
                                            elegant_shop_fallback_svg( 'thumbnail' );
                                        }?>
                                    </figure>
                                    <div class="pagination-details">
                                        <header class="entry-header">
                                            <h3 class="entry-title"><?php echo esc_html( get_the_title( $prev_post->ID ) ); ?></h3>  
                                        </header>
                                        <span class="meta-nav"><?php echo esc_html__( 'Prev', 'elegant-shop' ); ?></span>
                                    </div>
                                </article>
                            </a>
                        </div>
                    <?php }
                    if( $next_post ){ ?>
                        <div class="nav-next">
                            <a href="<?php the_permalink( $next_post->ID ); ?>" rel="next">
                                <article class="post">
                                    <figure class="post-thumbnail">
                                        <?php $next_img = get_post_thumbnail_id( $next_post->ID ); 
                                        if( $next_img ){
                                            echo wp_get_attachment_image( $next_img, 'thumbnail', false, array( 'itemprop' => 'image' ) );
                                        }else{
                                            elegant_shop_fallback_svg( 'thumbnail' );
                                        }?>									
                                    </figure>
                                    <div class="pagination-details">
                                        <header class="entry-header">
                                            <h3 class="entry-title"><?php echo esc_html( get_the_title( $next_post->ID ) ); ?></h3>
                                        </header>
                                        <span class="meta-nav"><?php echo esc_html__( 'Next', 'elegant-shop' ); ?></span>
                                    </div>
                                </article>
                            </a>
                        </div>
                    <?php } ?>
                </div>	
            </nav>
        <?php }
    }
}
endif;
add_action( 'elegant_shop_after_post_content', 'elegant_shop_navigation', 10 );
add_action( 'elegant_shop_after_posts_content', 'elegant_shop_navigation' );

if( ! function_exists( 'elegant_shop_comment' ) ) :
/**
 * Comments Template 
*/
function elegant_shop_comment(){
    // If comments are open or we have at least one comment, load up the comment template.
    if( ( comments_open() || get_comments_number() ) ) :
        comments_template();
    endif;
}
endif;
add_action( 'elegant_shop_after_post_content', 'elegant_shop_comment', 20 );

if( ! function_exists( 'elegant_shop_related_posts' ) ) :
/**
 * Related Posts 
*/
function elegant_shop_related_posts(){ 
    $ed_related = get_theme_mod( 'ed_related', true );
    if( is_single() && 'product' == get_post_type() ) return;
    if( is_single() && $ed_related ) elegant_shop_get_posts_list( 'related' );    
}
endif;                                                                               
add_action( 'elegant_shop_after_post_content', 'elegant_shop_related_posts', 15 );

if( ! function_exists( 'elegant_shop_latest_post' ) ) :
/**
 * Latest Posts
*/
function elegant_shop_latest_post(){ 
    elegant_shop_get_posts_list( 'latest' );
}
endif;
add_action( 'elegant_shop_latest_post', 'elegant_shop_latest_post' );

if( ! function_exists( 'elegant_shop_location' ) ) :
/**
 * Contact Location
 */
function elegant_shop_location(){ 
    $loc_title  = get_theme_mod( 'location_title', __( 'Address', 'elegant-shop' ) );
    $details    = get_theme_mod( 'location', __( '4140 Parker Rd. Allentown, New Mexico 31134', 'elegant-shop' ) ); 
    
    if( $loc_title || $details ){ ?>
        <li class="icon-grid__item">
            <div class="icon-grid__img">
                <?php echo elegant_shop_social_icons_svg_list( 'location' ); ?>
            </div>
            <div class="icon-grid__content">
                <?php 
                    if( $loc_title ) echo '<h4>' . esc_html( $loc_title ) . '</h4>';
                    if( $details ) echo wp_kses_post( wpautop( $details ) );
                ?>
            </div>
        </li>
    <?php }
}
endif;
add_action( 'elegant_shop_contact_page_details', 'elegant_shop_location', 10 );

if( ! function_exists( 'elegant_shop_contact_info' ) ) :
/**
 * Contact Mail
 */
function elegant_shop_contact_info(){ 
    $info_title    = get_theme_mod( 'contact_info_title', __( 'Contact', 'elegant-shop' ) );
    $mail_title    = get_theme_mod( 'mail_title', __( 'Email', 'elegant-shop' ) );
    $mail_details  = get_theme_mod( 'mail_description', __( 'debra.holt@example.com', 'elegant-shop' ) ); 
    $emails        = explode( ',', $mail_details);
    $phone_title   = get_theme_mod( 'phone_title', __( 'Phone', 'elegant-shop' ) );
    $phone_details = get_theme_mod( 'phone_number', __( '+1 (800) 123 456 789', 'elegant-shop' ) ); 
    $numbers       = explode( ',', $phone_details);

    if( $info_title || $mail_title || $mail_details || $phone_title || $phone_details ){ ?>
        <li class="icon-grid__item">
            <div class="icon-grid__img">
                <?php echo wp_kses( elegant_shop_social_icons_svg_list( 'phone' ), get_kses_extended_ruleset() ); ?>
            </div>
            <div class="icon-grid__content">
                <?php 
                    if( $info_title ) echo '<h4>' . esc_html( $info_title ) . '</h4>';
                    if( $phone_title || $phone_details ){
                        echo '<span>';
                            if( $phone_title ) echo '<strong>' . esc_html( $phone_title ) . '</strong>';
                            if( $phone_details ){
                                foreach( $numbers as $phone ){ ?>
                                    <a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $phone ) ); ?>" class="tel-link">
                                        <?php echo esc_html( $phone ); ?>
                                    </a>
                                <?php }
                            }
                        echo '</span>';
                    }

                    if( $mail_title || $mail_details ){
                        echo '<span>';
                            if( $mail_title ) echo '<strong>' . esc_html( $mail_title ) . '</strong>';
                            if( $mail_details ){
                                foreach( $emails as $email ){ ?>
                                    <a href="<?php echo esc_url( 'mailto:' . sanitize_email( $email ) ); ?>" class="email-link">
                                        <?php echo esc_html( $email ); ?>
                                    </a>
                                <?php }
                            }
                        echo '</span>';
                    }
                ?>
            </div>
        </li>
    <?php }
}
endif;
add_action( 'elegant_shop_contact_page_details', 'elegant_shop_contact_info', 20 );

if( ! function_exists( 'elegant_shop_timing' ) ) :
/**
 * Contact Hours
 */
function elegant_shop_timing(){ 
    $timing_title = get_theme_mod( 'contact_hours', __( 'Hours of Operation', 'elegant-shop' ) );
    $details      = get_theme_mod( 'contact_hrs_content', __( 'Monday - Friday: 09.00 - 20.00', 'elegant-shop' ) ); 
    $hours        = explode( ',', $details);

    if( $timing_title || $details ){ ?>
        <li class="icon-grid__item">
            <div class="icon-grid__img">
                <?php echo wp_kses( elegant_shop_social_icons_svg_list( 'clock' ), get_kses_extended_ruleset() ); ?>
            </div>
            <div class="icon-grid__content">
                <?php 
                    if( $timing_title ) echo '<h4>' . esc_html( $timing_title ) . '</h4>';
                    if( $details ) {
                        foreach( $hours as $hour ){ ?> 
                            <?php echo '<span class="contact-hours">' . esc_html( $hour ) . '</span>'; ?>
                        <?php }
                    }
                ?>
            </div>
        </li>
    <?php }
}
endif;
add_action( 'elegant_shop_contact_page_details', 'elegant_shop_timing', 30 );

if( ! function_exists( 'elegant_shop_google_map' ) ) :
/**
 * Contact Google Maps
 */
function elegant_shop_google_map(){ 
    $ed_map          = get_theme_mod( 'ed_googlemap', true );
    $google_map      = get_theme_mod( 'contact_google_map_iframe' );

    if( $ed_map && $google_map ){
        echo '<div class="contact__map">';
            echo htmlspecialchars_decode( $google_map );
        echo '</div>';
    }
}
endif;
add_action( 'elegant_shop_contact_page_footer', 'elegant_shop_google_map', 10 );

if( ! function_exists( 'elegant_shop_contact_form' ) ) :
/**
 * Contact Form
 */
function elegant_shop_contact_form(){ 
    $contact_title  = get_theme_mod( 'contact_form_title', __( 'Get In Touch', 'elegant-shop' ) );
    $shortcode      = get_theme_mod( 'contact_form_shortcode' ); 
    if( $contact_title || $shortcode ){ ?>
        <div class="contact__form">
            <div class="contact__form-wrap">
                <?php 
                    if( $contact_title ) echo '<h3>' . esc_html( $contact_title ) . '</h3>';
                    if( $shortcode ) echo do_shortcode( $shortcode );
                ?>
            </div>
        </div>
    <?php }
}
endif;
add_action( 'elegant_shop_contact_page_footer', 'elegant_shop_contact_form', 20 );

if( ! function_exists( 'elegant_shop_social' ) ) :
/**
 * Contact Social Profile
 */
function elegant_shop_social(){ 
    $social_title  = get_theme_mod( 'social_title', __( 'Follow Us:', 'elegant-shop' ) );
    $defaults = array(
        array(
            'icon' => 'facebook',
            'link' => 'https://www.facebook.com/',                        
        ),
        array(
            'icon' => 'twitter',
            'link' => 'https://twitter.com/',
        ),
        array(
            'icon' => 'pinterest',
            'link' => 'https://www.pinterest.com/',
        ),
        array(
            'icon' => 'instagram',
            'link' => 'https://www.instagram.com/',
        ),
    );
    $social_links = get_theme_mod( 'social_links', $defaults );
    $ed_social    = get_theme_mod( 'ed_social_contact', true );

    if( $ed_social && $social_title ){ ?>
        <div class="contact__social">
            <?php 
                if( $social_title ) echo '<h6>' . esc_html( $social_title ) . '</h6>';
                if( $social_links ){
                    echo '<div class="social-wrap"><ul class="social-networks">';
                        foreach( $social_links as $link ){
                            $new_tab = isset( $link['new_tab'] ) && $link['new_tab'] ? '_blank' : '_self';
                            if( isset( $link['link'] ) ){ ?>
                                <li>
                                    <a href="<?php echo esc_url( $link['link'] ); ?>" target="<?php echo esc_attr( $new_tab ); ?>" rel="nofollow noopener">
                                        <?php echo wp_kses( elegant_shop_social_icons_svg_list( $link['icon'] ), get_kses_extended_ruleset() ); ?>
                                    </a>
                                </li>
                            <?php
                            } 
                        } 
                    echo '</ul></div>';
                } ?>
        </div>
    <?php }
}
endif;
add_action( 'elegant_shop_contact_page_footer', 'elegant_shop_social', 30 );