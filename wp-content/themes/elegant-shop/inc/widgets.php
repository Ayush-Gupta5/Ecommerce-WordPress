<?php
/**
 * Widget Areas
 * 
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package Elegant_Shop_pro
 */

function elegant_shop_widgets_init(){    
    $sidebars = array(
        'sidebar'   => array(
            'name'        => __( 'Sidebar', 'elegant-shop' ),
            'id'          => 'sidebar', 
            'description' => __( 'Default Sidebar', 'elegant-shop' ),
        ),
        'footer-one'=> array(
            'name'        => __( 'Footer One', 'elegant-shop' ),
            'id'          => 'footer-one', 
            'description' => __( 'Add footer one widgets here.', 'elegant-shop' ),
        ),
        'footer-two'=> array(
            'name'        => __( 'Footer Two', 'elegant-shop' ),
            'id'          => 'footer-two', 
            'description' => __( 'Add footer two widgets here.', 'elegant-shop' ),
        ),
        'footer-three'=> array(
            'name'        => __( 'Footer Three', 'elegant-shop' ),
            'id'          => 'footer-three', 
            'description' => __( 'Add footer three widgets here.', 'elegant-shop' ),
        ),
        'footer-four'=> array(
            'name'        => __( 'Footer Four', 'elegant-shop' ),
            'id'          => 'footer-four', 
            'description' => __( 'Add footer four widgets here.', 'elegant-shop' ),
        ),
        'footer-five'=> array(
            'name'        => __( 'Footer Five', 'elegant-shop' ),
            'id'          => 'footer-five', 
            'description' => __( 'Add footer five widgets here.', 'elegant-shop' ),
        )
    );
    
    foreach( $sidebars as $sidebar ){
        register_sidebar( array(
    		'name'          => esc_html( $sidebar['name'] ),
    		'id'            => esc_attr( $sidebar['id'] ),
    		'description'   => esc_html( $sidebar['description'] ),
    		'before_widget' => '<section id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</section>',
    		'before_title'  => '<h2 class="widget-title" itemprop="name">',
    		'after_title'   => '</h2>',
    	) );
    }
    
}
add_action( 'widgets_init',  'elegant_shop_widgets_init' );