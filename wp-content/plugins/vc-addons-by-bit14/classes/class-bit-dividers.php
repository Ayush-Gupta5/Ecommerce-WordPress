<?php

class PBWB_Divider extends WPBakeryShortCode {
	
	function __construct(){

		// add_action( 'admin_init', array( $this, 'pbwb_mapping' ) );
        add_action( 'wp_loaded', array( $this, 'pbwb_mapping' ) );
		add_shortcode('bit_divider',array($this,'pbwb_shortcode_html'));

	}

	function pbwb_mapping(){

		// Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

        // Map the block with vc_map()
        vc_map( 
            array(
                'name'          => __('Divider', 'bit14'),
                'description'          => __('Upload and show videos of different formats on your website', 'bit14'),
                'base'          => 'bit_divider',
                'category'      => __('PB Addons', 'bit14'),
                'icon'          => plugin_dir_url(__DIR__) . 'assets/images/divider.png',
                'params'        => array(
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Theme Style', 'bit14' ),
                        'param_name'    => 'theme_style',
                        'value'         => array(
                            'Theme Style 1' => 'video-style-one',
                            'Theme Style 2' => 'video-style-two',
                            'Theme Style 3' => 'video-style-three'
                        ),
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Type Divider', 'bit14' ),
                        'param_name'    => 'divider_type',
                        'value'         => array(
                            'Single Line Divider' => 'single-line-divider',
                            'Double Line Divider' => 'double-line-divider',
                            'Dashed Line Divider' => 'dashed-line-divider'
                        ),
                        'dependency'    => array(
                            'element'       => 'theme_style',
                            'value'         => 'video-style-one',
                        ),
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Type Divider', 'bit14' ),
                        'param_name'    => 'divider_type_three',
                        'value'         => array(
                            'Solid'         => 'solid',
                            'Dotted'        => 'dotted',
                            'Dashed'        => 'dashed'
                        ),
                        'dependency'    => array(
                            'element'       => 'theme_style',
                            'value'         => 'video-style-three',
                        ),
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Alignment', 'bit14' ),
                        'param_name'    => 'alignment',
                        'value'         => array(
                            'Left'          => 'left',
                            'Right'         => 'right',
                            'Center'        => 'center'
                        ),
                        // 'dependency'    => array(
                        //     'element'       => 'theme_style',
                        //     'value'         => array('video-style-one', 'video-style-two'),
                        // ),
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => __('Width','bit14'),
                        'param_name'    => 'width',
                        'value'         => '50',
                        'dependency'    => array(
                            'element'       => 'theme_style',
                            'value'         => 'video-style-one',
                        ),
                    ),
                    array(
                        'type'          =>  'colorpicker',
                        'heading'       =>  __( 'Divider Color', 'bit14' ),
                        'param_name'    =>  'divider_color',
                    ),
                    array(
                        'type'          =>  'colorpicker',
                        'heading'       =>  __( 'Icon Color', 'bit14' ),
                        'param_name'    =>  'icon_color',
                        'dependency'    => array(
                            'element'       => 'theme_style',
                            'value'         => 'video-style-two',
                        ),
                    ),
                    array(
                        'type'          => 'iconpicker',
                        'heading'       => __( 'Icon', 'bit14' ),
                        'param_name'    => 'icon',
                        'settings'      => array(
                            'emptyIcon'     => true,
                            'type'          => 'fontawesome',
                        ),
                        'dependency'    => array(
                            'element'       => 'theme_style',
                            'value'         => 'video-style-two',
                        ),
                    ),
                    array(
                        'type'          =>  'attach_image',
                        'heading'       =>  __( 'Icon Image', 'bit14' ),
                        'param_name'    =>  'icon_image',
                        'dependency'    => array(
                            'element'       => 'theme_style',
                            'value'         => 'video-style-three',
                        ),
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
                ),
            )
        );
	}

	function pbwb_shortcode_html($atts, $content = null){

		extract( shortcode_atts( array(
		    'id'                        => '',
            'class'                     => '',
            'theme_style'               => '',
            'divider_type'              => '',
            'alignment'                 => '',
            'width'                     => '',
            'icon'                      => '',
            'divider_color'             => '',
            'icon_color'                => '',
            'icon_image'                => '',
            'divider_type_three'        => '',
        ), $atts ) );
        
        $output =   "
        [bit_divider
            id                        = '".$id."'
            class                     = '".$class."'
            theme_style               = '".$theme_style."'
            divider_type              = '".$divider_type."'
            alignment                 = '".$alignment."'
            width                     = '".$width."'
            icon                      = '".$icon."'
            divider_color             = '".$divider_color."'
            icon_color                = '".$icon_color."'
            icon_image                = '".$icon_image."'
            divider_type_three        = '".$divider_type_three."'
            ]";
            
        $id                     = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';

        $class                  = ( $class != '' ) ? 'bit14-divider ' . esc_attr( $class ) : 'bit14-divider';

        $theme_style            = ( $theme_style != '' ) ?  $theme_style : 'video-style-one';

        $divider_type           = ( $divider_type != '' ) ?  $divider_type : 'single-line-divider';

        $divider_type_three     = ( $divider_type_three != '' ) ?  $divider_type_three : 'solid';

        $alignment              = ( $alignment != '' ) ?  $alignment : 'left';

        $width                  = ( $width != '' ) ?  $width : '50';

        $icon                   = ( $icon != '' ) ?  $icon : '';

        $icon_image             = ($icon_image != "") ? wp_get_attachment_image_src($icon_image, "thumbnail") : '';

        $data_attributes        = $theme_style ? 'data-theme-style="'.$theme_style.'"' : '';

        $data_attributes        .= $divider_type ? 'data-divider-type="'.$divider_type.'"' : '';

        $data_attributes        .= $alignment ? 'data-alignment="'.$alignment.'"' : '';

        $data_attributes        .= $width ? 'data-width="'.$width.'"' : '';

        $data_attributes        .= $divider_color ? 'data-divider-color="'.$divider_color.'"' : '';

        $data_attributes        .= $icon_color ? 'data-icon-color="'.$icon_color.'"' : '';

        $data_attributes        .= $divider_type_three ? 'data-divider-type-three="'.$divider_type_three.'"' : '';
           
           
        $output = '<div '.esc_attr($id).' class="'.esc_attr($class).' '.esc_attr($theme_style).'" '.$data_attributes.'>';    
            $output .= '<div class="divider">';    
                if($theme_style === 'video-style-two' && $alignment === 'left'){
                    $output .= '<div class="icon-div">';
                        $output .= '<i class="'.esc_attr($icon).'"></i>';
                    $output .= '</div>';
                }
                if($theme_style === 'video-style-three' && $alignment === 'left'){
                    $output .= '<div class="icon-image">';
                        $output .=  '<img src="'.esc_url($icon_image[0]).'"/>';
                    $output .= '</div>';
                }                
                $output .= '<span></span>';
                if($theme_style === 'video-style-two' && $alignment === 'center'){
                    $output .= '<div class="icon-div">';
                        $output .= '<i class="'.esc_attr($icon).'"></i>';
                    $output .= '</div>';
                    $output .= '<span></span>';
                }
                if($theme_style === 'video-style-three' && $alignment === 'center'){
                    $output .= '<div class="icon-image">';
                        $output .=  '<img src="'.esc_url($icon_image[0]).'"/>';
                    $output .= '</div>';
                    $output .= '<span></span>';
                }
                if($theme_style === 'video-style-one' && $divider_type === 'double-line-divider'){
                    $output .= '<span style="border-width: 1px;"></span>';
                }
                if($theme_style === 'video-style-three' && $alignment === 'right'){
                    $output .= '<div class="icon-image">';
                        $output .=  '<img src="'.esc_url($icon_image[0]).'"/>';
                    $output .= '</div>';
                }                
                if($theme_style === 'video-style-two' && $alignment === 'right'){
                    $output .= '<div class="icon-div">';
                        $output .= '<i class="'.esc_attr($icon).'"></i>';
                    $output .= '</div>';
                }
            $output .= "</div>"; 
        $output .= "</div>"; 
        
        $output .= wp_enqueue_style( 'pro-bit14-vc-addons-divider', PBWB_ASSETS_URL.'css/divider.css', false );
        $output .= wp_enqueue_script( 'pro-bit14-divider', PBWB_ASSETS_URL.'js/divider.js', array('jquery'), 10, true );

        return $output;
	}
}

new PBWB_Divider;
