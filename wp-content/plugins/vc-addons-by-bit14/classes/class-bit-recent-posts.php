<?php

class PBWB_Recent_Posts extends WPBakeryShortCode {
	
	function __construct(){
   
		// add_action( 'admin_init', array( $this, 'pbwb_mapping' ) );
        add_action( 'wp_loaded', array( $this, 'pbwb_mapping' ) );
		add_shortcode('recent-post',array($this,'pbwb_shortcode_html'));

	}

	function pbwb_mapping(){

		// Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

        $post_category = get_terms( array(
            'taxonomy' => 'category',
        ) );

        $post_categories = array();
        $post_categories['All'] = 'all';
        foreach ($post_category as $category) {
            $post_categories[$category->name] = $category->slug;
        }
        
        $enable_googlefonts     = get_option( 'bit14_enable_googlefonts' , '1');
                      $google_fonts           = array(
                        "type"          => "vc_links",
                        "param_name"    => "bit_caption_url",
                        "description"   => __( '<span style="Background: #1688b8;padding: 10px; display: block; color: white;font-weight:600;">Enable google fonts form settings for exciting google fonts.</span>', 'bit14' ),
                    );

        if($enable_googlefonts == "1"){
            $google_fonts = array(
                'type' => 'google_fonts',
                'param_name' => 'google_text_font',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => __( 'Select Font Family.', 'bit14' ),
                        'font_style_description' => __( 'Select Font Style.', 'bit14' ),
                    ),
                ), 
                'weight' => 0,
                'group'         => 'Attributes'
            );
        }
        // Map the block with vc_map()
        vc_map( 
            array(
                'name'          => __('Recent Post', 'bit14'),
                'base'          => 'recent-post',
                'description'   => __('Categorize your posts in a grid format to keep them organized', 'bit14'),
                'category'      => __('PB Addons', 'bit14'),
                'icon'          => plugin_dir_url(__DIR__) . 'assets/images/recent-posts.png',
                'params'        => array(

                    array(
                        'type'          => 'textfield',
                        'heading'       => __( 'Element ID', 'bit14' ),
                        'param_name'    => 'id',
                        'description'   => __( 'Element ID', 'bit14' ),
                        'group'         => 'General'
                    ),

                    array(
                        'type'          => 'textfield',
                        'heading'       => __( 'Extra Class Name', 'bit14' ),
                        'param_name'    => 'class',
                        'description'   => __( 'Extra Class Name', 'bit14' ),
                        'group'         => 'General'
                    ),

                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Theme Style', 'bit14' ),
                        'param_name'    => 'theme_style',
                        'group'         => 'General',
                        'value'         => array(
                            'Theme Style 1' => 'post-grid-style-one',
                            'Theme Style 2' => 'post-grid-style-two'
                        ),
                    ),

                    array(
                        'type'          => 'checkbox',
                        'heading'       => __( 'Hide Featured Image', 'bit14' ),
                        'param_name'    => 'hide_featured',
                        'group'         => 'General',
                        'dependency'    => array(
                            'element'       =>  'theme_style',
                            'value'         =>  'post-grid-style-two'                        
                        ),
                    ),

                    array(
                        'type'          => 'checkbox',
                        'heading'       => __( 'Show Pagination', 'bit14' ),
                        'param_name'    => 'is_pagination',
                        'group'         => 'General',
                    ),

                    array(
                        'type'          => 'textfield',
                        'heading'       => __( 'Posts per page', 'bit14' ),
                        'param_name'    => 'posts_per_page',
                        'description'   => __( 'Number of posts to show on one page(Numeric values only.)', 'bit14' ),
                        'group'         => 'General',
                        'dependency'    => array(
                            'element'       =>  'is_pagination',
                            'not_empty'         =>  true
                        )
                    ),

                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Pagination Theme', 'bit14' ),
                        'param_name'    => 'pagination_theme',
                        'group'         => 'General',
                        'value'         => array(
                            'Theme Style 1' => 'post_pagination-style-one',
                            'Theme Style 2' => 'post_pagination-style-two',
                            'Theme Style 3' => 'post_pagination-style-three'
                        ),
                        'dependency'    => array(
                            'element'       =>  'is_pagination',
                            'not_empty'         =>  true
                        )
                    ),

                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Pagination hover background', 'bit14' ),
                        'param_name'    => 'pagination_hover_bg',
                        'group'         => 'General',
                        'dependency'    => array(
                            'element'       =>  'is_pagination',
                            'not_empty'         =>  true
                        )
                    ),

                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Pagination hover color', 'bit14' ),
                        'param_name'    => 'pagination_hover_color',
                        'group'         => 'General',
                        'dependency'    => array(
                            'element'       =>  'is_pagination',
                            'not_empty'         =>  true
                        )
                    ),

                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Primary Color', 'bit14' ),
                        'param_name'    => 'primary_color',
                        'group'         => 'General',
                    ),

                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Secondary Color', 'bit14' ),
                        'param_name'    => 'secondary_color',
                        'group'         => 'General',
                    ),

                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Category', 'bit14' ),
                        'param_name'    => 'post_category',
                        'description'   => __( 'Posts with the selected category will be shown only', 'bit14' ),
                        'group'         => 'General',
                        'value'         => $post_categories,
                    ),
                    $google_fonts,
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __('Slides in a row','bit14'),
                        'param_name'    => 'desktop_num_slides',
                        'value'         => array(1,2,3,4),
                        'group'         => 'Desktop',
                    ),

                    array(
                        'type'          => 'dropdown',
                        'heading'       => __('Slides in a row','bit14'),
                        'param_name'    => 'tablet_num_slides',
                        'value'         => array(1,2,3),
                        'group'         => 'Tablet'
                    ),

                    array(
                        'type'          => 'dropdown',
                        'heading'       => __('Slides in a row','bit14'),
                        'param_name'    => 'mobile_num_slides',
                        'value'         => array(1,2),
                        'group'         => 'Mobile',
                    ),
                    
                ),
            )
        );
	}

	function pbwb_shortcode_html($atts, $content = null){

		extract( shortcode_atts( array(
		    'id'        	            => '',
            'class'                     => '',
            'theme_style'               => '',
            'post_category'             => '',
		    'desktop_num_slides'        => '',
            'tablet_num_slides'         => '',
            'mobile_num_slides'         => '',
            'primary_color'             => '',
            'secondary_color'           => '',
            'hide_featured'             => '',
            'is_pagination'             => '',
            'pagination_theme'          => '',
            'posts_per_page'            => '',
            'pagination_hover_bg'       => '',
            'pagination_hover_color'    => '',
            'google_text_font'          => '',
        ), $atts ) );

        
        $output =   "
        [bit_recent_post
            id                        = '".$id."'
            class                     = '".$class."'
            theme_style               = '".$theme_style."'
            post_category             = '".$post_category."'
            desktop_num_slides        = '".$desktop_num_slides."'
            tablet_num_slides         = '".$tablet_num_slides."'
            mobile_num_slides         = '".$mobile_num_slides."'
            primary_color             = '".$primary_color."'
            secondary_color           = '".$secondary_color."'
            hide_featured             = '".$hide_featured."'
            is_pagination             = '".$is_pagination."'
            pagination_theme          = '".$pagination_theme."'
            posts_per_page            = '".$posts_per_page."'
            pagination_hover_bg       = '".$pagination_hover_bg."'
            pagination_hover_color    = '".$pagination_hover_color."'
            google_text_font          = '".$google_text_font."'
        ]";
		  
		return do_shortcode( $output );
	}
}

new PBWB_Recent_Posts;
