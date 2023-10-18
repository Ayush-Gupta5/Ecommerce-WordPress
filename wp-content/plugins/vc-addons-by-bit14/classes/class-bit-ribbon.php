<?php

class PBWB_Ribbon extends WPBakeryShortCode {
    function __construct(){

        // add_action( 'admin_init', array( $this, 'pbwb_mapping' ) );
        add_action( 'wp_loaded', array( $this, 'pbwb_mapping' ) );
        add_shortcode('ribbon',array($this,'pbwb_shortcode_html'));

    }
  
    function pbwb_mapping(){

        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
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
                'name'          => __('Ribbon', 'bit14'),
                'base'          => 'ribbon',
                'description'   => __('Mark single/multiple posts to make them prominent', 'bit14'),
                'category'      => __('PB Addons', 'bit14'),
                'icon'          => plugin_dir_url(__DIR__) . 'assets/images/ribbon.png',
                'params'        => array(
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Themes', 'bit14' ),
                        'param_name'    => 'theme_style',
                        'value'         => array(
                            'Theme One'         => 'ribbon-theme-one',
                            'Theme Two'         => 'ribbon-theme-two',
                            'Theme Three'       => 'ribbon-theme-three',
                            'Theme Four'        => 'ribbon-theme-four'
                        ),
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Variation', 'bit14' ),
                        'param_name'    => 'variation_t1',
                        'value'         => array(
                            'Variation One'         => 'ribbon-t1-variation-one',
                            'Variation Two'         => 'ribbon-t1-variation-two',
                            'Variation Three'       => 'ribbon-t1-variation-three',
                            'Variation Four'        => 'ribbon-t1-variation-four'
                        ),
                        'dependency'    => array(
                            'element'       => 'theme_style',
                            'value'         => 'ribbon-theme-one',
                        ),
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Variation', 'bit14' ),
                        'param_name'    => 'variation_t2',
                        'value'         => array(
                            'Variation One'         => 'ribbon-t2-variation-one',
                            'Variation Two'         => 'ribbon-t2-variation-two',
                            'Variation Three'       => 'ribbon-t2-variation-three',
                            'Variation Four'        => 'ribbon-t2-variation-four',
                            'Variation Five'        => 'ribbon-t2-variation-five'
                        ),
                        'dependency'    => array(
                            'element'       => 'theme_style',
                            'value'         => 'ribbon-theme-two',
                        ),
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Variation', 'bit14' ),
                        'param_name'    => 'variation_t3',
                        'value'         => array(
                            'Variation One'         => 'ribbon-t3-variation-one',
                            'Variation Two'         => 'ribbon-t3-variation-two',
                            'Variation Three'       => 'ribbon-t3-variation-three'
                        ),
                        'dependency'    => array(
                            'element'       => 'theme_style',
                            'value'         => 'ribbon-theme-three',
                        ),
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Variation', 'bit14' ),
                        'param_name'    => 'variation_t4',
                        'value'         => array(
                            'Variation One'         => 'ribbon-t4-variation-one',
                            'Variation Two'         => 'ribbon-t4-variation-two',
                            'Variation Three'       => 'ribbon-t4-variation-three'
                        ),
                        'dependency'    => array(
                            'element'       => 'theme_style',
                            'value'         => 'ribbon-theme-four',
                        ),
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => __( 'Ribbon Heading', 'bit14' ),
                        'param_name'    => 'ribbon_heading',
                        'admin_label'   => true,
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => __( 'Ribbon Text', 'bit14' ),
                        'param_name'    => 'ribbon_text',
                        'admin_label'   => true,
                    ),
                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Content Background Color', 'bit14' ),
                        'param_name'    => 'content_bg_t2_v2_color',
                        'dependency'    => array(
                            'element'       => 'variation_t2',
                            'value'         => array('ribbon-t2-variation-two','ribbon-t2-variation-four')
                        ),
                    ),
                    array(
                        'type'          => 'attach_image',
                        'heading'       => __( 'Content Background Image', 'bit14' ),
                        'param_name'    => 'content_bg_t2_v2_image',
                        'dependency'    => array(
                            'element'       => 'variation_t2',
                            'value'         => array('ribbon-t2-variation-five', 'ribbon-t2-variation-three')
                        ),
                    ),
                    // array(
                    //     'type'          => 'attach_image',
                    //     'heading'       => __( 'Content Image', 'bit14' ),
                    //     'param_name'    => 'content_t3_v3_image',
                    //     'dependency'    => array(
                    //         'element'       => 'variation_t4',
                    //         'value'         => 'ribbon-t4-variation-one',
                    //     ),
                    // ),
                    array(
                        'type'          => 'attach_image',
                        'heading'       => __( 'Content Image', 'bit14' ),
                        'param_name'    => 'content_t3_v3_image',
                        'dependency'    => array(
                            'element'       => 'variation_t3',
                            'value'         => 'ribbon-t3-variation-one',
                        ),
                    ),
                    array(
                        'type'          => 'attach_image',
                        'heading'       => __( 'Content Background Image', 'bit14' ),
                        'param_name'    => 'content_bg_t3_v3_image',
                        'dependency'    => array(
                            'element'       => 'variation_t3',
                            'value'         => 'ribbon-t3-variation-three',
                        ),
                    ),
                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Content Background Color', 'bit14' ),
                        'param_name'    => 'content_bg_t3_v3_color',
                        'dependency'    => array(
                            'element'       => 'variation_t3',
                            'value'         => 'ribbon-t3-variation-two',
                        ),
                    ),
                    array(
                        'type'          => 'attach_image',
                        'heading'       => __( 'Content Image', 'bit14' ),
                        'param_name'    => 'content_t4_v4_image',
                        'dependency'    => array(
                            'element'       => 'variation_t4',
                            'value'         => 'ribbon-t4-variation-one',
                        ),
                    ),
                    array(
                        'type'          => 'attach_image',
                        'heading'       => __( 'Content Background Image', 'bit14' ),
                        'param_name'    => 'content_bg_t4_v4_image',
                        'dependency'    => array(
                            'element'       => 'variation_t4',
                            'value'         => 'ribbon-t4-variation-three',
                        ),
                    ),
                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Content Background Color', 'bit14' ),
                        'param_name'    => 'content_bg_t4_v4_color',
                        'dependency'    => array(
                            'element'       => 'variation_t4',
                            'value'         => 'ribbon-t4-variation-two',
                        ),
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Content Background', 'bit14' ),
                        'param_name'    => 'background',
                        'value'         => array(
                            'Image'         => 'image',
                            'Color'         => 'color',
                        ),
                        'dependency'    => array(
                            'element'       => 'theme_style',
                            'value'         => 'ribbon-theme-one',
                        ),
                    ),
                    array(
                        'type'          => 'attach_image',
                        'heading'       => __( 'Content Background Image', 'bit14' ),
                        'param_name'    => 'content_bg_image',
                        'dependency'    => array(
                            'element'       => 'background',
                            'value'         => 'image',
                        ),
                    ),
                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Content Background Color', 'bit14' ),
                        'param_name'    => 'content_bg_color',  
                        'dependency'    => array(
                            'element'       => 'background',
                            'value'         => 'color',
                        ),
                    ),
                    array(
                        'type'          => 'attach_image',
                        'heading'       => __( 'Ribbon Image', 'bit14' ),
                        'param_name'    => 'ribbon_image_t2_v3',  
                        'dependency'    => array(
                            'element'       => 'variation_t2',
                            'value'         => 'ribbon-t2-variation-three',
                        ),
                    ),
                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Ribbon Text Color', 'bit14' ),
                        'param_name'    => 'ribbon_text_color',  
                    ),
                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Ribbon Background Color', 'bit14' ),
                        'param_name'    => 'ribbon_background_color', 
                    ),
                    array(
                        'type'          => 'attach_image',
                        'heading'       => __( 'Ribbon Background Image', 'bit14' ),
                        'param_name'    => 'ribbon_bg_image',
                        'dependency'    => array(
                            'element'       => 'variation_t4',
                            'value'         => array('ribbon-t4-variation-one', 'ribbon-t4-variation-three'),
                        ),
                    ),
                    array(
                        "type"          => "textarea_html",
                        "heading"       => __( "Tab Content", "Bit14" ),
                        "param_name"    => "content",
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => __( 'Element ID', 'bit14' ),
                        'param_name'    => 'id',
                        'description'   => __( 'Element ID', 'bit14' ),
                        'group'         => 'Attributes'
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => __( 'Extra Class Name', 'bit14' ),
                        'param_name'    => 'class',
                        'description'   => __( 'Extra Class Name', 'bit14' ),
                        'group'         => 'Attributes'
                    ),
                    $google_fonts,
                    array(
                        "type"          => "vc_links",
                        "param_name"    => "bit_caption_url",
                        "description"   => __( '<span style="Background: #1688b8;padding: 10px; display: block; color: white;font-weight:600;"><a href="https://pagebuilderaddons.com/plan-and-pricing/" target="_blank" style="color:white;text-decoration: none;">Get the Pro version for more elements and customization options.</a></span>', 'ihover' ),
                    ),
                ),
            )
        );
    }

    function pbwb_shortcode_html($atts, $content = null){

        extract( shortcode_atts( array(
            'theme_style'                   =>  '',
            'variation_t1'                  =>  '',
            'variation_t3'                  =>  '',
            'variation_t2'                  =>  '',
            'variation_t4'                  =>  '',
            'background'                    =>  '',
            'content_bg_t2_v2_color'        =>  '',
            'content_bg_t2_v2_image'        =>  '',
            'content_t3_v3_image'           =>  '',
            'content_bg_t3_v3_image'        =>  '',
            'content_bg_t3_v3_color'        =>  '',
            'content_t4_v4_image'           =>  '',
            'content_bg_t4_v4_image'        =>  '',
            'content_bg_t4_v4_color'        =>  '',
            'content_bg_image'              =>  '',
            'content_bg_color'              =>  '',
            'ribbon_image_t2_v3'            =>  '',
            // 'ribbon_image_t4_v3'            =>  '',
            'ribbon_bg_image'               =>  '',
            'ribbon_heading'                =>  '',
            'ribbon_text'                   =>  '',
            'ribbon_background_color'       =>  '',
            'ribbon_text_color'             =>  '',
            'content_background_color'      =>  '',
            'id'                            =>  '',
            'class'                         =>  '',
            'google_text_font'              =>  ''
        ), $atts ) );

        $theme_style                    = ($theme_style != "") ? $theme_style :'ribbon-theme-one';
        $variation_t1                   = ($variation_t1 != "") ? $variation_t1 : 'ribbon-t1-variation-one';
        $variation_t2                   = ($variation_t2 != "") ? $variation_t2 : 'ribbon-t2-variation-one';
        $variation_t3                   = ($variation_t3 != "") ? $variation_t3 : 'ribbon-t3-variation-one';
        $variation_t4                   = ($variation_t4 != "") ? $variation_t4 : 'ribbon-t4-variation-one';
        $variation                      = '';        
        if($theme_style === 'ribbon-theme-one'){
            $variation = $variation_t1;
        }else if($theme_style === 'ribbon-theme-two'){
            $variation = $variation_t2;
        }else if($theme_style === 'ribbon-theme-three'){
            $variation = $variation_t3;
        }else{
            $variation = $variation_t4;
        }
        $content_bg_image                   = ($content_bg_image != "") ? wp_get_attachment_image_src($content_bg_image, "large") : '';
        $content_bg_image                   = isset($content_bg_image[0]) ? $content_bg_image[0] : '';
        $content_bg_color                   = ($content_bg_color != "") ? $content_bg_color : '';
        
        $content_bg_t2_v2_color             = ($content_bg_t2_v2_color != "") ? $content_bg_t2_v2_color : '';
        $content_bg_t2_v2_image             = ($content_bg_t2_v2_image != "") ? wp_get_attachment_image_src($content_bg_t2_v2_image, "large") : '';
        $content_bg_t2_v2_image             = isset($content_bg_t2_v2_image[0]) ? $content_bg_t2_v2_image[0] : '';

        $content_t3_v3_image                = ($content_t3_v3_image != "") ? wp_get_attachment_image_src($content_t3_v3_image, "large") : '';
        $content_t3_v3_image                = isset($content_t3_v3_image[0]) ? $content_t3_v3_image[0] : '';
        $content_bg_t3_v3_image             = ($content_bg_t3_v3_image != "") ? wp_get_attachment_image_src($content_bg_t3_v3_image, "large") : '';
        $content_bg_t3_v3_image             = isset($content_bg_t3_v3_image[0]) ? $content_bg_t3_v3_image[0] : '';
        $content_bg_t3_v3_color             = ($content_bg_t3_v3_color != "") ? $content_bg_t3_v3_color : '';

        $content_t4_v4_image                = ($content_t4_v4_image != "") ? wp_get_attachment_image_src($content_t4_v4_image, "large") : '';
        $content_t4_v4_image                = isset($content_t4_v4_image[0]) ? $content_t4_v4_image[0] : '';
        $content_bg_t4_v4_image             = ($content_bg_t4_v4_image != "") ? wp_get_attachment_image_src($content_bg_t4_v4_image, "large") : '';
        $content_bg_t4_v4_image             = isset($content_bg_t4_v4_image[0]) ? $content_bg_t4_v4_image[0] : '';
        $content_bg_t4_v4_color             = ($content_bg_t4_v4_color != "") ? $content_bg_t4_v4_color : '';
        $ribbon_bg_image                = ($ribbon_bg_image != "") ? wp_get_attachment_image_src($ribbon_bg_image, "large") : '';
        $ribbon_bg_image                = isset($ribbon_bg_image[0]) ? $ribbon_bg_image[0] : '';

        $ribbon_image_t2_v3             = ($ribbon_image_t2_v3 != "") ? wp_get_attachment_image_src($ribbon_image_t2_v3, "large") : '';
        $ribbon_image_t2_v3             = isset($ribbon_image_t2_v3[0]) ? $ribbon_image_t2_v3[0] : '';
        
        if($theme_style === 'ribbon-theme-two'){
            $ribbon_image = $ribbon_image_t2_v3;
        }
        
        $background                         = ($background != "") ? $background : 'image';
        $background                         = ($background === "image") ? "background-image:url('$content_bg_image');" : "background-color:$content_bg_color";
        $content                            = wpb_js_remove_wpautop($content, true);
        $background_t2_v2                   = $variation_t2 === 'ribbon-t2-variation-two' || $variation_t2 === 'ribbon-t2-variation-four' ? "background-color:$content_bg_t2_v2_color" : "background-image:url($content_bg_t2_v2_image)";
        
        $background_t3_v3                   = $variation_t3 === 'ribbon-t3-variation-three' || $variation_t3 === 'ribbon-t3-variation-three' ? "background-image:url('$content_bg_t3_v3_image');" : "background-color:$content_bg_t3_v3_color";

        // $background_t3_v3                  =  '';
        // if($variation_t3 === 'ribbon-t4-variation-one'){
        //     $background_t4_v4 = "background-color:$content_bg_t4_v4_color";
        // }else if($variation_t4 === 'ribbon-t4-variation-three'){
        //     $background_t4_v4 = "background-image:url($content_bg_t4_v4_image)";
        // }

        $background_t4_v4                  =  '';
        if($variation_t4 === 'ribbon-t4-variation-two'){
            $background_t4_v4 = "background-color:$content_bg_t4_v4_color";
        }else if($variation_t4 === 'ribbon-t4-variation-three'){
            $background_t4_v4 = "background-image:url($content_bg_t4_v4_image)";
        }

        $background_styles                  =  '';
        if($theme_style === 'ribbon-theme-one'){
            $background_styles = $background;
        }else if($theme_style === 'ribbon-theme-three'){
            $background_styles = $background_t3_v3;
        }else if($theme_style === 'ribbon-theme-four'){
            $background_styles = $background_t4_v4;
        }else{
            $background_styles = $background_t2_v2;
        }
        $content_image                  =  '';
        if($theme_style === 'ribbon-theme-three'){
            $content_image = $content_t3_v3_image;
        }else if($theme_style === 'ribbon-theme-four'){
            $content_image = $content_t4_v4_image;
        }
        
        $data_attributes                    = ($theme_style ) ? 'data-theme-style="'.$theme_style.'"' : ''; 
        $data_attributes                    .= ($variation ) ? 'data-theme-variation="'.$variation.'"' : '';
        $data_attributes                    .= ($ribbon_background_color ) ? 'data-ribbon-background-color="'.$ribbon_background_color.'"' : ''; 
        $data_attributes                    .= ($ribbon_bg_image ) ? 'data-ribbon-background-image="'.$ribbon_bg_image.'"' : ''; 
        $data_attributes                    .= ($ribbon_text_color ) ? 'data-ribbon-text-color="'.$ribbon_text_color.'"' : '';

        //******************//
        // MANAGE FONT DATA //
        //******************//
         
        $enable_googlefonts     = get_option( 'bit14_enable_googlefonts' , '1');
        $text_font_inline_style = '';
        if($enable_googlefonts == "1"){ 
            // Build the data array
            $text_font_data = PBWB_bit14_helper::pbwb_getFontsData( $google_text_font );
         
            // Build the inline style
            $text_font_inline_style = PBWB_bit14_helper::pbwb_googleFontsStyles( $text_font_data );   
                 
            // Enqueue the right font   
            PBWB_bit14_helper::pbwb_enqueueGoogleFonts( $text_font_data );
        }
        
        $output  = '<div '.esc_attr($id).' class="bi14-ribbon '.esc_attr($class).' '.esc_attr($theme_style).' '.esc_attr($variation).' " '.$data_attributes.'>';

            $output .= '<div class="ribbon-data">';
                if($variation === 'ribbon-t3-variation-one' || $variation === 'ribbon-t4-variation-one'){
                    $output .= '<img class="ribbon-image" src="'.esc_url($content_image).'">';
                }
                $output .= '<div class="ribbon">';
                    if($theme_style === 'ribbon-theme-two' && $variation === 'ribbon-t2-variation-three' ){
                        $output .= '<div class="ribbon-icon-image">';
                            $output .= '<img src="'.esc_url($ribbon_image).'">';
                        $output .= '</div>';
                    }
                    $output .= '<span class="ribbon-style-right"></span>';
                    $output .= '<span class="ribbon-style-left"></span>';
                    $output .= '<h3 style="'. esc_attr($text_font_inline_style).'">'.esc_html($ribbon_heading).'</h3>';
                    $output .= '<p style="'. esc_attr($text_font_inline_style).'">'.esc_html($ribbon_text).'</p>';
                    $output .= '<span class="ribbon-border"></span>';
                $output .= '</div>';
                if($variation !== 'ribbon-t3-variation-one' && $variation !== 'ribbon-t4-variation-one'){
                    $output .= '<div class="ribbon-content" style="'.esc_attr($background_styles).'">'.wp_kses($content , $this->pbwb_get_allowed_tags()).'</div>';
                }
            $output .= '</div>';
        $output .= '</div>';

        
        $output .= wp_enqueue_style( 'pro-bit14-vc-addons-ribbon', PBWB_ASSETS_URL.'css/ribbon.css', false );
        $output .= wp_enqueue_script( 'pb-ribbon-script', PBWB_ASSETS_URL.'js/ribbon.js', array('jquery'), false );

        return $output;
    }

    function pbwb_get_allowed_tags() {

		$allowed_tags = array(
            'a' => array(
                'class' => array(),
                'href'  => array(),
                'rel'   => array(),
                'title' => array(),
            ),
            'abbr' => array(
                'title' => array(),
            ),
            'b' => array(),
            'blockquote' => array(
                'cite'  => array(),
            ),
            'cite' => array(
                'title' => array(),
            ),
            'code' => array(),
            'del' => array(
                'datetime' => array(),
                'title' => array(),
            ),
            'dd' => array(),
            'div' => array(
                'class' => array(),
                'title' => array(),
                'style' => array(),
            ),
            'dl' => array(),
            'dt' => array(),
            'em' => array(),
            'h1' => array(),
            'h2' => array(),
            'h3' => array(),
            'h4' => array(),
            'h5' => array(),
            'h6' => array(),
            'i' => array(),
            'img' => array(
                'alt'    => array(),
                'class'  => array(),
                'height' => array(),
                'src'    => array(),
                'width'  => array(),
            ),
            'li' => array(
                'class' => array(),
            ),
            'ol' => array(
                'class' => array(),
            ),
            'p' => array(
                'class' => array(),
            ),
            'q' => array(
                'cite' => array(),
                'title' => array(),
            ),
            'span' => array(
                'class' => array(),
                'title' => array(),
                'style' => array(),
            ),
            'strike' => array(),
            'strong' => array(),
            'ul' => array(
                'class' => array(),
            ),
        );
        
        return $allowed_tags;
	}
}

new PBWB_Ribbon;