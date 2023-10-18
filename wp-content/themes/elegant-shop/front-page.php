<?php
/**
 * Front Page
 * 
 * @package Elegant_Shop
 */

$home_sections = array( 'banner', 'featured', 'featured-products', 'new-arrivals', 'product-cat', 'blog', 'category' );

if ( 'posts' == get_option( 'show_on_front' ) ) { //Show Static Blog Page
    include( get_home_template() );
}elseif( $home_sections ){ 

    get_header();

//If any one section are enabled then show custom home page.

foreach( $home_sections as $section ){
    get_template_part( 'sections/home/' . esc_attr( $section ) );  
}
get_footer();

}else {
    //If all section are disabled then show respective page template. 
    include( get_page_template() );
}