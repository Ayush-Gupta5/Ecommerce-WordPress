<?php

class PBWB_Info_Banner extends WPBakeryShortCode {
    function __construct(){
       // add_action( 'admin_init', array( $this, 'pbwb_mapping' ) );
        add_action( 'wp_loaded', array( $this, 'pbwb_mapping' ) );
        add_shortcode('info_banner',array($this,'pbwb_shortcode_html'));
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
                'name'          => __('Info Banner', 'bit14'),
                'base'          => 'info_banner',
                'description'   => __('Add the key message or your slogan using the info banner', 'bit14'),
                'category'      => __('PB Addons', 'bit14'),
                'icon'          => plugin_dir_url(__DIR__) . 'assets/images/info-banner.png',
                'params'        => array(

                    array(
                        'type'          => 'textfield',
                        'heading'       => __( 'Element ID', 'bit14' ),
                        'param_name'    => 'id',
                        'description'   => __( 'Element ID', 'bit14' ),
                    ),

                    array(
                        'type'          => 'textfield',
                        'heading'       => __( 'Extra Class Name', 'bit14' ),
                        'param_name'    => 'class',
                        'description'   => __( 'Extra Class Name', 'bit14' ),
                    ),

                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'List item(s) in a row', 'bit14' ),
                        'param_name'    => 'cols',
                        'description'   => __( 'Number of list item(s) to be displayed in one row', 'bit14' ),
                        'value'         => array(
                            "One"     =>  'one',
                            "Two"     =>  'two',
                            "Three"   =>  'three',
                        )
                    ),

                     array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Text Color', 'bit14' ),
                        'param_name'    => 'txt_color',
                        'description'   => __( 'Select Text color for all', 'bit14' ),
                        
                    ),

                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Button Background Hover Color', 'bit14' ),
                        'param_name'    => 'btn_bg_color',
                        'description'   => __( 'Select Button Background color', 'bit14' ),
                        
                    ),
                     array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Button Text Color', 'bit14' ),
                        'param_name'    => 'btn_text_color',
                        'description'   => __( 'Select text color for button', 'bit14' ),
                        
                    ),

                     array(
                        'type'          => 'checkbox',
                        'heading'       => __( 'Hover Box', 'bit14' ),
                        'param_name'    => 'is_hover',
                        'description'   => __( 'Select checkbox for hover', 'bit14' ),
                        'value'         =>  '1',
                        'dependency'    => array(
                                'element'       => 'cols',
                                'value'         => 'three',
                        ),
                    ),

                    array(
                        'type' => 'google_fonts',
                        'param_name' => 'google_text_font',
                        'settings' => array(
                            'fields' => array(
                                'font_family_description' => __( 'Select Font Family.', 'bit14' ),
                                'font_style_description' => __( 'Select Font Style.', 'bit14' ),
                            ),
                        ), 
                        'weight' => 0,
                    ),     

                    array(
                        'type'          => 'param_group',
                        'param_name'    => 'info-banner',
                        'description'   => __( 'Enter details for info banners', 'bit14' ),
                        'value'         => '',
                        'params'        => array(

                            array(
                                'type'          =>  'attach_image',
                                'heading'       =>  __( 'Attach Image', 'bit14' ),
                                'description'   =>  'Attached Image will be added to the banner',
                                'param_name'    =>  'image',
                            ),
                            array(
                                'type'          => 'textfield',
                                'heading'       => __( 'Title', 'bit14' ),
                                'param_name'    => 'title',
                                'description'   => __( 'Enter Title For Banner.', 'bit14' ),
                                'admin_label'   => true,
                                
                            ),
                            array(
                                "type"          => "textarea",
                                "class"         => "",
                                "heading"       => __( "Content", "Bit14" ),
                                "param_name"    => "content",
                               
                            ),
                            array(
                                'heading'       => __('Button','bit14'),
                                'param_name'    => 'btn',
                                'group'         => 'General',
                                'type'          => 'dropdown',
                                'value'         => array(
                                    'Yes'   => 'Yes',
                                    'No'    => 'No',
                                ),
                            ),
                            array(
                                'type'          => 'textfield',
                                'heading'       => __( 'Button Text', 'bit14' ),
                                'param_name'    => 'btn_txt',
                                'description'   => __( 'Enter Text For Button.', 'bit14' ),
                                'admin_label'   => true,
                                'value'         => '',
                                'dependency'    => array('element' => 'btn','value'=>'Yes'),
                            ),
                            array(
                                'type'          => 'textfield',
                                'heading'       => __( 'Button Link', 'bit14' ),
                                'param_name'    => 'btn_link',
                                'description'   => __( 'Enter Link For Button.', 'bit14' ),
                                'admin_label'   => true,
                                'value'         => '',
                                'dependency'    => array('element' => 'btn','value'=>'Yes'),
                            ),
                        ),
                    ),

                    $google_fonts,
                    array(
                        "type"          => "vc_links",
                        "param_name"    => "bit_caption_url",
                        "description"   => __( '<span style="Background: #1688b8;padding: 10px; display: block; color: white;font-weight:600;"><a href="https://pagebuilderaddons.com/plan-and-pricing/" target="_blank" style="color:white;">Get the Pro version for more elements and customization options.</a></span>', 'bit14' ),
                    ),  
                ),
            )
        );
    }

    function pbwb_shortcode_html($atts, $content = null){
        
        $items = vc_param_group_parse_atts( $atts['info-banner'] );
        
        extract( shortcode_atts( array(
            'id'                => '',
            'class'             => '',
            'cols'              => '',
            'is_hover'          => '',
            'btn_bg_color'      => '',
            'txt_color'         => '',
            'btn_text_color'    => '',
            'google_text_font'  => '',

        ), $atts ) );
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
        
        $id                 = ( $id    != '' )              ? '' . esc_attr( $id ) . '"'    : '';
        $class              = ( $class != '' )              ? 'info-banner ' . esc_attr( $class ) : 'info-banner';
        $cols    = ( $cols != '' )    ? $cols                  : 'one';
        
        $is_hover    = ( $is_hover != '' )    ? 'hover-box'                  : '';

        $btn_bg_color               = ( $btn_bg_color != '' )           ? $btn_bg_color                                     : '';

        $txt_color               = ( $txt_color != '' )           ? $txt_color                                     : '';

        $btn_text_color          = ( $btn_text_color != '' )           ? $btn_text_color                                     : '';

        $output  = '<div '.esc_attr($id).' class="bit-banner-container '.esc_attr($class).' '.esc_attr($is_hover).'">';
            $output .= '<div id="" class="row bit14-banners" >';
            if(is_array($items) &&  !empty($items)){
                foreach ($items as $item) {

                    $image =
                            ( isset($item['image'])  && $item['image'] != '' ) ?
                                wp_get_attachment_image_src($item["image"], "large") :
                                ''.PBWB_ASSETS_URL.'images/info-banner-background.jpg';   
                    $title                      = ( isset($item['title']) && $item['title'] != '' ) ? esc_attr($item['title']) : '';  

                     $content                      = ( isset($item['content']) && $item['content'] != '' ) ? esc_attr($item['content']) : '';  
                

                     $btn_txt                      = ( isset($item['btn_txt']) && $item['btn_txt'] != '' ) ? esc_attr($item['btn_txt']) : '';  

                     $btn_link                      = ( isset($item['btn_link']) && $item['btn_link'] != '' ) ? esc_attr($item['btn_link']) : '';  


                    $output .= '<div class="bit-banner column-'.esc_attr($cols).'" data-btn-bgcolor="'. esc_attr($btn_bg_color) .'">';
                    
                    $output .= is_array($image) && !empty($image) ?  '<div class="bit-col-wrapper" style="background-image: url('.esc_url($image[0]).');">' : '<div class="bit-col-wrapper" style="background-image: url('.esc_attr($image).');">' ;

                    $output .= '<h2 class="bit-banner-title" style="color:'.esc_attr($txt_color).';'.esc_attr($text_font_inline_style).'">'.esc_html($title).'</h2>';
                    $output .= '<div class="bit-banner-content"><p style="color:'.esc_attr($txt_color).';'.esc_attr($text_font_inline_style).'">'.esc_html($content).'</p></div>';


                   if( $item['btn'] == 'Yes' && !empty($item['btn_txt'])){
                        $output .= '<div class="btn">';
                        $output .= '<a href="'.esc_url($btn_link).' " target="_blank" style="color:'.esc_attr($btn_text_color).';'.esc_attr($text_font_inline_style).'">'.esc_html($btn_txt).'</a>';
                        $output .= '</div>';
                    }

                    $output .= '</div>';
                    $output .= '</div>';


                }
            }

            $output .= '</div>';

        $output .= '</div>';
        $output .= wp_enqueue_style( 'pro-bit14-vc-addons-info-banner', PBWB_ASSETS_URL.'css/info-banner.css', false );
        $output .= wp_enqueue_script( 'pb-info-banner', PBWB_ASSETS_URL.'js/info-banner-script.js', array('jquery'), false );

        return $output;
    }

}

new PBWB_Info_Banner;