<?php
/**
 * Front Page
 *
 * @package Elegant_Shop
 */

$home_sections = array( 'category', 'featured-products', 'product-cat', 'new-arrivals', 'blog' );

if ('posts' == get_option('show_on_front') ) { //Show Static Blog Page
    include get_home_template();
} elseif ($home_sections) {
    get_header();
    foreach ( $home_sections as $section ){
        get_template_part('sections/home/' . esc_attr($section));
    }
    get_footer();
} else {
    //If all section are disabled then show respective page template.
    include get_page_template();
}