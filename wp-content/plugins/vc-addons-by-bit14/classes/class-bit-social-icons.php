<?php

class PBWB_Social_Icons extends WPBakeryShortCode {
function __construct(){

        // add_action( 'admin_init', array( $this, 'pbwb_mapping' ) );
        add_action( 'wp_loaded', array( $this, 'pbwb_mapping' ) );
        add_shortcode('social_icons',array($this,'pbwb_shortcode_html'));

    }
  
    function pbwb_mapping(){

        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

        // Map the block with vc_map()
        vc_map(
            array(
                'name'          => __('Social Icons', 'bit14'),
                'base'          => 'social_icons',
                'description'   => __('Display the most popular social media icons beautifully', 'bit14'),
                'category'      => __('PB Addons', 'bit14'),
                'icon'          => plugin_dir_url(__DIR__) . 'assets/images/social-icon.png',
                'params'        => array(
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Themes', 'bit14' ),
                        'param_name'    => 'theme_style',
                        'value'         => array(
                            'Theme One'         => 'social-icons-theme-one',
                            'Theme Two'         => 'social-icons-theme-two',
                            'Theme Three'       => 'social-icons-theme-three',
                            'Theme Four'        => 'social-icons-theme-four',
                            'Theme Five'        => 'social-icons-theme-five'
                        ),
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Themes', 'bit14' ),
                        'param_name'    => 'size',
                        'value'         => array(
                            'Small'         => 'small',
                            'Medium'        => 'medium',
                            'Large'         => 'large',
                        ),
                    ),
                    array(
                        'type'          =>  'param_group',
                        'value'         =>  '',
                        'param_name'    =>  'items',
                        'params'        =>  array(
                            array(
                                'type'          => 'dropdown',
                                'heading'       => __( 'Show Icon', 'bit14' ),
                                'param_name'    => 'is_icon',
                                'description'   => __( 'Show/Hide icon.', 'bit14' ),
                                'value'         => array(
                                    "Font Awesome"      =>  'fontawesome',
                                    "Custom Icon"       =>  'custom'
                                ),
                            ),
                            array(
                                'type'          => 'iconpicker',
                                'heading'       => __( 'Icon', 'bit14' ),
                                'param_name'    => 'icon',
                                'value'         => 'vc_pixel_icon vc_pixel_icon-alert',
                                'settings'      => array(
                                    'emptyIcon'     => false,
                                    'type'          => 'fontawesome',
                                ),
                                'dependency'    => array(
                                    'element'       => 'is_icon',
                                    'value'         => 'fontawesome',
                                ),
                                'description'   => __( 'Select icon from library.', 'bit14' ),
                            ),   
                            array(
                                'type'          =>  'colorpicker',
                                'heading'       =>  __( 'Icon Color', 'bit14' ),
                                'param_name'    =>  'icon_color',
                                'dependency'    => array(
                                    'element'       => 'is_icon',
                                    'value'         => 'fontawesome',
                                ),
                            ),
                            array(
                                'type'          =>  'colorpicker',
                                'heading'       =>  __( 'Icon Background Color', 'bit14' ),
                                'param_name'    =>  'icon_background_color',
                                'dependency'    => array(
                                    'element'       => 'is_icon',
                                    'value'         => 'fontawesome',
                                ),
                            ),
                            array(
                                'type'          =>  'attach_image',
                                'heading'       =>  __( 'Attach Custom Icon', 'bit14' ),
                                'description'   =>  'Attached icon will be add in the iconic list',
                                'param_name'    =>  'image',
                                'dependency'    => array(
                                    'element'       => 'is_icon',
                                    'value'         => 'custom',
                                ),
                            ),
                            array(
                                'type'          =>  'textfield',
                                'heading'       =>  __( 'Attachment Alternate Text', 'bit14' ),
                                'param_name'    =>  'image_alt',
                                'dependency'    => array(
                                    'element'       => 'is_icon',
                                    'value'         => 'custom',
                                ),
                            ),
                            array(
                                'type'          =>  'textfield',
                                'class'         =>  'icon_link',
                                'heading'       =>  __( 'Icon Link', 'bit14' ),
                                'param_name'    =>  'content_link',
                            ),
                            array(
                                'type'          =>  'checkbox',
                                'heading'       =>  __( 'External Link', 'bit14' ),
                                'param_name'    =>  'external_link',
                                'value'         =>  '1',
                            ),
                            array(
                                'type'          =>  'checkbox',
                                'heading'       =>  __('Icon Tag?','bit14'),
                                'param_name'    =>  'is_icon_tag',
                                'value'         =>  '1',
                            ),
                            array(
                                'type'          =>  'textfield',
                                'heading'       =>  __( 'Tag', 'bit14' ),
                                'param_name'    =>  'tag_content',
                                'dependency'    => array(
                                    'element'       => 'is_icon_tag',
                                    'not_empty'   => true
                                ),
                            ),
                            array(
                                'type'          =>  'colorpicker',
                                'heading'       =>  __( 'Tag Color', 'bit14' ),
                                'param_name'    =>  'tag_color',
                                'dependency'    => array(
                                    'element'       => 'is_icon_tag',
                                    'not_empty'   => true
                                ),
                            ),
                            array(
                                'type'          =>  'colorpicker',
                                'heading'       =>  __( 'Tag Background Color', 'bit14' ),
                                'param_name'    =>  'tag_background_color',
                                'dependency'    => array(
                                    'element'       => 'is_icon_tag',
                                    'not_empty'   => true
                                ),
                            ),
                        ),
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => __( 'Element ID', 'bit14' ),
                        'param_name'    => 'id',
                        'description'   => __( 'Element ID', 'bit14' ),
                        'group'         =>  'Attributes',
                    ),

                    array(
                        'type'          => 'textfield',
                        'heading'       => __( 'Extra Class Name', 'bit14' ),
                        'param_name'    => 'class',
                        'description'   => __( 'Extra Class Name', 'bit14' ),
                        'group'         =>  'Attributes',
                    ),
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

        $items = vc_param_group_parse_atts( $atts['items'] );
        extract( shortcode_atts( array(
            'theme_style'           =>  '',
            'size'                  =>  '',
            'id'                    =>  '',
            'class'                 =>  '',
        ), $atts ) );

        $theme_style                    = ($theme_style != "") ? $theme_style : 'social-icons-theme-one';
        $size                           = ($size != "") ? $size : 'social-icons-theme-one';

        $output  = '<div '.esc_attr($id).' class="bi14-social-icon '.esc_attr($class).' '.esc_attr($theme_style).'" data-theme-style="'.$theme_style.'" data-size="'.$size.'">';
            if(is_array($items) &&  !empty($items)){
                foreach( $items as $item) {

                    $icon                       = ( isset($item['icon']) && $item['icon'] != '' )                                   ? esc_attr($item['icon'], "large")  : '';
                    $image                      = ( isset($item['image'])  && $item['image'] != '' )                                ? wp_get_attachment_image_src($item["image"], "large") : '';
                    $image_alt                  = ( isset($item['image_alt']) && $item['image_alt'] != '' )                         ? esc_html($item['image_alt']) : '';
                    $icon_color                 = ( isset($item['icon_color']) && $item['icon_color'] != '' )                       ? $item['icon_color'] : '';
                    $icon_background_color      = ( isset($item['icon_background_color']) && $item['icon_background_color'] != '' ) ? $item['icon_background_color'] : '';
                    $tag_color                  = ( isset($item['tag_color']) && $item['tag_color'] != '' ) ? $item['tag_color'] : '';
                    $tag_content                = ( isset($item['tag_content']) && $item['tag_content'] != '' )                     ? $item['tag_content'] : '';
                    $external_link              = ( isset($item['external_link']) && $item['external_link'] === 'true' )     ? 'target="_blank"' : '';
                    $tag_background_color       = ( isset($item['tag_background_color']) && $item['tag_background_color'] != '' )   ? $item['tag_background_color'] : '';
                    $content_link_open          = ( isset($item['content_link']) && $item['content_link'] != '' )                   ? '<a href="'. esc_html($item['content_link']) .' " '.$external_link.'>' : '';
                    $content_link_close         = ( isset($item['content_link']) && $item['content_link'] != '' )                   ? '</a>' : '';
                    $is_icon_tag                = ( isset($item['is_icon_tag']) && $item['is_icon_tag'] != '' )     ? $item['is_icon_tag'] : '';

                    if( isset($item['is_icon']) && $item['is_icon'] == 'fontawesome' ){
                        $is_icon = '<span class="icon ' . esc_attr($icon) .'" ></span>';
                    }
        
                    if( isset($item['is_icon']) && $item['is_icon'] == 'custom' ){
                        $is_icon = is_array($image) ? '<img class="pba-img" src="'.esc_url($image[0]) .'" alt="'.esc_attr($image_alt).'" />' : '';
                    }

                    $output .= '<div class="social-icon" data-icon-bg-color="' . esc_attr($icon_background_color) .'" data-icon-color="' . esc_attr($icon_color) .'" >';
                        $output .= '<div class="social-icon-data">';
                            $output .= wp_kses($content_link_open , $this->pbwb_get_allowed_tags());
                                $output .= $is_icon;
                            $output .= wp_kses($content_link_close , $this->pbwb_get_allowed_tags());
                        $output .= '</div>';
                        if($is_icon_tag === 'true'){
                            $output .= '<div class="social-icon-tag" style="background-color:'.esc_attr($tag_background_color).'; color:'.esc_attr($tag_color).';">';
                                $output .= '<p>'.esc_html($tag_content).'</p>';
                                if($theme_style === 'social-icons-theme-three' && $is_icon_tag === 'true'){
                                    $output .= '<div class="mpc-arrow" style="border-top-color:'.esc_attr($tag_background_color).'"></div>';        
                                }
                            $output .= '</div>';
                        }
                    $output .= '</div>';
                }
            }
            $output .= '</div>';
        
        $output .= wp_enqueue_style( 'pro-bit14-vc-addons-social-icon', PBWB_ASSETS_URL.'css/social-icon.css', false );
        $output .= wp_enqueue_script( 'pb-social-icon-script', PBWB_ASSETS_URL.'js/social-icon.js', array('jquery'), false );

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

new PBWB_Social_Icons;
