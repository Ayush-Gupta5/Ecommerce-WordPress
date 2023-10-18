<?php

class PBWB_Counter_Lists extends WPBakeryShortCode {
    function __construct(){

        // add_action( 'admin_init', array( $this, 'pbwb_mapping' ) );
        add_action( 'wp_loaded', array( $this, 'pbwb_mapping' ) );
        add_shortcode('counter-lists',array($this,'pbwb_shortcode_html'));

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
                'name'          => __('Counters', 'bit14'),
                'base'          => 'counter-lists',
                'description'   => __('Add animated statistic counters to display numbers', 'bit14'),
                'category'      => __('PB Addons', 'bit14'),
                'icon'          => plugin_dir_url(__DIR__) . 'assets/images/counter.png',
                'params'        => array(

                    array(
                        'type'          => 'textfield',
                        'heading'       => __( 'Extra Class Name', 'bit14' ),
                        'param_name'    => 'class',
                        'description'   => __( 'Extra Class Name', 'bit14' ),
                    ),

                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Counter type', 'bit14' ),
                        'param_name'    => 'countertype',
                        'description'   => __( 'Select counter type.(if "progress meter" selected, numbers should be between 1-100)', 'bit14' ),
                        'value'         => array(
                            "Numbers"           =>  'numbers',
                            "Progress Meter"    =>  'progress'
                        )
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Percentage', 'bit14' ),
                        'param_name'    => 'is_percentage',
                        'value'         => array(
                            "Yes"         =>  'yes',
                            "No"          =>  'no'
                        )
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Themes for Counter', 'bit14' ),
                        'param_name'    => 'theme',
                        'value'         => array(
                            "Theme 1"           =>  'theme-1',
                            "Theme 2"           =>  'theme-2',
                            "Theme 3"           =>  'theme-3',
                        ),
                        'dependency'    => array(
                            'element'       => 'countertype',
                            'value'         => 'numbers',
                        ),
                    ),
                    array(
                        'type'              =>  'checkbox',
                        'heading'           =>  __('Circle Border In Icon?','bit14'),
                        'param_name'        =>  'is_circle',
                        'value'             =>  '1',
                        'dependency'        =>  array(

                            'element'   =>  'theme',
                            'value'     =>  'theme-1'
                        ),
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __('Counters in a row','bit14'),
                        'param_name'    => 'desktop_num_slides',
                        'value'         => array(1,2,3,4),
                        'group'         => 'Desktop',
                    ),

                    array(
                        'type'          => 'dropdown',
                        'heading'       => __('Counters in a row','bit14'),
                        'param_name'    => 'tablet_num_slides',
                        'value'         => array(1,2,3),
                        'group'         => 'Tablet',
                    ),

                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Border Foreground', 'bit14' ),
                        'param_name'    => 'brdrfg',
                        'description'   => __( 'Highlighted border color', 'bit14' ),
                        'value'         => '#2c9579',
                        'dependency'    => array(
                            'element'       => 'countertype',
                            'value'         => 'progress',
                        ),
                    ),

                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Border Background', 'bit14' ),
                        'param_name'    => 'brdrbg',
                        'description'   => __( 'Border color', 'bit14' ),
                        'value'         => '#4c4c4c',
                        'dependency'    => array(
                            'element'       => 'countertype',
                            'value'         => 'progress',
                        ),
                    ),

                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Counter Background', 'bit14' ),
                        'param_name'    => 'circlebg',
                        'description'   => __( 'Background color of circle', 'bit14' ),
                        'value'         => '#2b2c2c',
                        'dependency'    => array(
                            'element'       => 'countertype',
                            'value'         => 'progress',
                        ),
                    ),

                    array(
                        'type'          => 'param_group',
                        'param_name'    => 'counters',
                        'description'   => __( 'Enter values for counters', 'bit14' ),
                        'value'         => '',
                        'params'        => array(

                            array(
                                'type'          => 'dropdown',
                                'heading'       => __( 'Show icon', 'bit14' ),
                                'param_name'    => 'is_icon',
                                'description'   => __( 'Show/Hide icon. Icons will not be displayed on Progress Meter', 'bit14' ),
                                'value'         => array(
                                    "Show"          =>  'show',
                                    "Hide"          =>  'hide'
                                )
                            ),
                            array(
                                'type'          => 'iconpicker',
                                'heading'       => __( 'Icon', 'js_composer' ),
                                'param_name'    => 'icon',
                                'value'         => 'vc_pixel_icon vc_pixel_icon-alert',
                                'settings'      => array(
                                    'emptyIcon'     => false,
                                    'type'          => 'fontawesome',
                                ),
                                'description'   => __( 'Select icon from library.', 'js_composer' ),
                                'dependency'    => array(
                                    'element'       => 'is_icon',
                                    'value'         => 'show',
                                ),
                            ),
                            array(
                                'type'          => 'colorpicker',
                                'heading'       => __( 'Icon Color', 'bit14' ),
                                'param_name'    => 'icon_color',
                                'description'   => __( 'The selected color will be applied on icon and number depending on the theme selected', 'bit14' ),
                                'value'         => '#000000',
                                'dependency'    => array(
                                    'element'       => 'is_icon',
                                    'value'         => 'show',
                                ),
                            ),
                            array(
                                'type'          => 'textfield',
                                'heading'       => __( 'Number', 'bit14' ),
                                'param_name'    => 'number',
                                'description'   => __( 'Enter Only Number Not Special Character For Counter / Progress Meter. (If "progress meter" is selected, numbers must be between 1-100)', 'bit14' ),
                                'admin_label'   => true,
                                'value'         => '',
                            ),
                            array(
                                'type'          => 'textfield',
                                'heading'       => __( 'Title', 'bit14' ),
                                'param_name'    => 'title',
                                'description'   => __( 'Enter Text For Counter.', 'bit14' ),
                                'admin_label'   => true,
                                'value'         => '',
                            ),
                            array(
                                'type'          => 'textarea',
                                'heading'       => __( 'Title', 'bit14' ),
                                'param_name'    => 'description',
                                'description'   => __( 'Enter Description For Counter.', 'bit14' ),
                                'value'         => '',
                            ),
                            array(
                                'type'          => 'colorpicker',
                                'heading'       => __( 'Color', 'bit14' ),
                                'param_name'    => 'color',
                                'description'   => __( 'Color theme for counter.', 'bit14' ),
                                'value'         => '#ffffff',
                            ),
                            array(
                                'type'          => 'colorpicker',
                                'heading'       => __( 'Color For Counter Title', 'bit14' ),
                                'param_name'    => 'color_title',
                                'description'   => __( 'Color For Counter Title.', 'bit14' ),
                                'value'         => '#ffffff',
                            ),
                            array(
                                'type'          => 'colorpicker',
                                'heading'       => __( 'Color For Counter Description', 'bit14' ),
                                'param_name'    => 'color_description',
                                'description'   => __( 'Color For Counter Description.', 'bit14' ),
                                'value'         => '#ffffff',
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

        $counters = vc_param_group_parse_atts( $atts['counters'] );

        extract( shortcode_atts( array(
            'class'                   => '',
            'is_percentage'           => '',
            'desktop_num_slides'      => '',
            'tablet_num_slides'       => '',
            'countertype'             => '',
            'brdrfg'                  => '',
            'brdrbg'                  => '',
            'circlebg'                => '',
            'theme'                   => '',
            'is_circle'               => '',
            'google_text_font'        => '',
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
        
        $class                      = ( $class != '' ) ? 'counter-pro ' . esc_attr( $class ) : 'counter-pro';
        $is_percentage              = ( $is_percentage != '' ) ? $is_percentage : 'yes' ;
        $desktop_num_slides         = ( $desktop_num_slides != '' ) ? $desktop_num_slides : 3;
        $tablet_num_slides          = ( $tablet_num_slides != '' ) ? $tablet_num_slides : 2;
        $countertype                = ( $countertype != '' ) ? $countertype : 'numbers';
        $brdrbg                     = ( $brdrbg != '' ) ? $brdrbg : '#2c9579';
        $brdrfg                     = ( $brdrfg != '' ) ? $brdrfg : '#4c4c4c';
        $circlebg                   = ( $circlebg != '' ) ? $circlebg : '#2b2c2c';
        $is_circle                  = ( $is_circle != '' ) ? 'is-circle-border' : '';
        $theme                      = ($theme != '') ? $theme : 'theme-1';


        $col                        = 'pb-col-md-'.(12/$desktop_num_slides).' pb-col-sm-'.(12/$tablet_num_slides).' pb-col-xs-12';

        $output = '<div class="bit-counters-list-pro">';

        $output .= '<div class="'.esc_attr($class).' row outer '. esc_attr($theme) .'">';
        $i = 1;
        foreach ($counters as $key => $counter) {

            if ( $countertype == "numbers" ) {

                $icon_color = ( $counter['icon_color'] != '' ) ? $counter['icon_color'] : '#000000';


                //Counter TYpe : Numbers
                $output .= '<div class="counter-item-pro counter-seperated-pro '. esc_attr($col) .'" data-icon-color="'.esc_attr($icon_color).'" data-text-color="'.esc_attr($counter['color']).'" data-is-percentage="'.esc_attr($is_percentage).'" data-description-color="'.esc_attr($counter['color_description']).'" data-title-color="'.esc_attr($counter['color_title']).'">';


                $output .= '<div class="counter-border">';


                if( isset($counter['is_icon']) ) {
                    if ( $counter['is_icon'] !== "hide" ) {
                        $counter_is_icon = "show";
                    }else {
                        $counter_is_icon = "hide";
                    }
                }else{
                    $counter_is_icon = "show";
                };

                if ( $counter_is_icon !== "hide" ) {
                    $output .= '<span class="counter-item-icon-pro '.esc_attr($is_circle).'"><i class="'.esc_attr($counter['icon']).'" aria-hidden="true"></i></span>';
                }

                if ( $theme == "theme-3" ){
                    $output .= "<div class='counter-content-container'>";
                }

                if ( isset($counter['number']) && $counter['number'] != "" ){
                    $output .= '<span class="counter-item-number-pro count-pro" data-counter-value="'.esc_html($counter['number']).'" style="color:'. esc_attr($counter['color']) . ';'.esc_attr($text_font_inline_style) .'">0</span>';
                }

                if ( isset($counter['title']) && $counter['title'] != "" ){
                    $output .= '<span class="counter-item-title-pro" style="'.esc_attr($text_font_inline_style).'">'.esc_attr($counter['title']).'</span>';
                }
                if ( isset($counter['description']) && $counter['description'] != "" ){
                    $output .= '<p class="counter-item-description-pro" style="'.esc_attr($text_font_inline_style).'">'.esc_attr($counter['description']).'</p>';
                }
                if ( $theme == "theme-3" ){
                    $output .= '</div>';
                }
                $output .= '</div>';

                $output .= '</div>';

            }
            else {

                //Counter TYpe : Progress Meter

                $output .= '<div class="counter-item-pro '. esc_attr($col) .'" style="color:'. esc_attr($counter['color']) .'" data-is-percentage="'.$is_percentage.'" data-desktop-num-slides="'.esc_attr($desktop_num_slides).'" data-description-color="'.esc_attr($counter['color_description']).'" data-title-color="'.esc_attr($counter['color_title']).'" data-text-color="'.esc_attr($counter['color']).'">';
                
                $counter['number'] = isset($counter['number']) && $counter['number'] != '' ? ($counter['number']) : 0 ;
                
                $counter_number = ( $counter['number'] > 100 ) ? 100 : ( ($counter['number'] < 0) ? 0 : $counter['number'] ) ;

                $output .= '<div class="percent-container-pro">';


                $dashoffset = 565.48 - ( 565.48 * $counter['number'] / 150);

                $output .=
                    '<svg id="svg" viewBox="0 0 140 140" preserveAspectRatio="xMinYMin meet">
                            <g>
                              <circle r="43%" cx="50%" cy="50%" fill="transparent" stroke-dasharray="585.5" stroke-dashoffset="0" style=" stroke: '. esc_attr($brdrfg) .'; fill: '. esc_attr($circlebg) .'" />
                              <circle r="43%" cx="50%" cy="50%" fill="transparent" stroke-dasharray="585.5" stroke-dashoffset="0" style=" stroke-dashoffset: '. esc_attr($dashoffset) .'; stroke: '. esc_attr($brdrbg) .' " id="bar" class="tobe-pro" fill="transparent" stroke-dasharray="585.5" stroke: #2c9579 stroke-dashoffset="0" style="stroke: #4c4c4c; fill: #2b2c2c" /> ';
                if ( isset($counter['number']) && $counter['number'] != "" ){
                    $output .= '<text x="50%" y="50%" text-anchor="middle" dy="0.3em" class="counter-item-number-pro circularbg-pro count-pro" data-counter-value="'.esc_html($counter_number).'" style="'.esc_attr($text_font_inline_style).'">0</text>';
                }
                $output .='</g>
                              </svg>';

                $output .= '</div>';

                if ( isset($counter['title']) && $counter['title'] != "" ){
                    $output .= '<span class="counter-item-title-pro" style="'.esc_attr($text_font_inline_style).'">'.esc_html($counter['title']).'</span>';
                }
                if ( isset($counter['description']) && $counter['description'] != "" ){
                    $output .= '<p class="counter-item-description-pro" style="'.esc_attr($text_font_inline_style).'">'.esc_attr($counter['description']).'</p>';
                }
                $output .= '</div>';

            }

//                if ($i % $number == 0) {
//                    $output .= '</div><div class="'.esc_attr($class).' row">';
//
//                }
//                $i++;
        }

        $output .= '</div>';

        $output .= '</div>';
        
        $output .= wp_enqueue_style( 'pro-bit14-vc-addons-counter-list', PBWB_ASSETS_URL.'css/counter-list.css', false );
        $output .= wp_enqueue_script( 'pro-bit14-vc-addons-counter', PBWB_ASSETS_URL.'js/counter-script.js', array('jquery'), false, true );

        return $output;
    }

}

new PBWB_Counter_Lists;
