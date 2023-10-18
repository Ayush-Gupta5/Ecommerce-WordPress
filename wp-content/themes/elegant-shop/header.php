<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elegant_Shop
 */
    /**
     * Doctype Hook
     * 
     * @hooked elegant_shop_doctype
    */
    do_action( 'elegant_shop_doctype' );
?>
<head itemscope itemtype="http://schema.org/WebSite">
	<?php 
    /**
     * Before wp_head
     * 
     * @hooked elegant_shop_head
    */
    do_action( 'elegant_shop_before_wp_head' );
    
    wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<?php
    wp_body_open();
    
    /**
     * Before Header
     * 
     * @hooked elegant_shop_page_start - 20 
    */
    do_action( 'elegant_shop_before_header' );
    
    /**
     * Header
     * 
     * @hooked elegant_shop_sticky_bar     - 10     
     * @hooked elegant_shop_header         - 20
     * @hooked elegant_shop_banner         - 25
     * @hooked elegant_shop_before_content - 30 
     * @hooked elegant_shop_content_start  - 40    
    */
    do_action( 'elegant_shop_header' );