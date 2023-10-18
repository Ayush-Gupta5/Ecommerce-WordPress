<?php

class PBWB_Progress_Bar extends WPBakeryShortCode {

	function __construct(){
		// add_action( 'admin_init', array( $this, 'pbwb_mapping' ) );
        add_action( 'wp_loaded', array( $this, 'pbwb_mapping' ) );
		add_shortcode('progress-bar',array($this,'pbwb_shortcode_html'));

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
                'name' => __('Progress Bar', 'bit14'),
                'base' => 'progress-bar',
                'description' => __('Display statistical information in the form of a stats bar', 'bit14'),
                'category' => __('PB Addons', 'bit14'),
                'icon' => plugin_dir_url(__DIR__) . 'assets/images/progress-bar.png',           
                'params' => array(
                    array(
                        'type'          =>  'textfield',
                        'class'         =>  'progressbar_id',
                        'heading'       =>  __( 'ID', 'bit14' ),
                        'description'   =>  'ID for your list',
                        'param_name'    =>  'id',
                    ),
                    array(
                        'type'          =>  'textfield',
                        'class'         =>  'progressbar_class',
                        'heading'       =>  __( 'class', 'bit14' ),
                        'description'   =>  'Class for your list',
                        'param_name'    =>  'class',
                    ),
                    array(
                        'type'          =>  'dropdown',
                        'class'         =>  'progressbar_quantity',
                        'heading'       =>  __( 'List item(s) in a row', 'bit14' ),
                        'description'   =>  'Number of list item(s) to be displayed in one row',
                        'param_name'    =>  'quantity',
                        'value'         =>  array(
                            'One'           =>  1,
                            'Two'           =>  2,
                            'Three'         =>  3
                        )
                    ),
                    array(
                        'type'          =>  'dropdown',
                        'class'         =>  'progressbar_theme',
                        'heading'       =>  __( 'List Theme', 'bit14' ),
                        'description'   =>  'Select the type of progress bar to be displayed',
                        'param_name'    =>  'theme_list',
                        'value'         =>  array(
                            'Theme 1'   =>  1,
                            'Theme 2'   =>  2,
                            'Theme 3'   =>  3,
                            'Theme 4'   =>  4
                        )
                    ),
                    array(
                        'type'          =>  'param_group',
                        'value'         =>  '',
                        'param_name'    =>  'items',
                        'params'        =>  array(

                            array(
                                'type'          =>  'textfield',
                                'class'         =>  'progressbar_title',
                                'heading'       =>  __( 'Title', 'bit14' ),
                                'description'   =>  'Title of your list item',
                                'param_name'    =>  'title',
                                'admin_label'   => true,
                            ),
                            array(
                                'type'          =>  'textfield',
                                'class'         =>  'progressbar_counter',
                                'heading'       =>  __( 'Counter Number', 'bit14' ),
                                'description'   =>  'Use only number no decimal (value numbers should be between 1-100)',
                                'param_name'    =>  'counter',
                                'admin_label'   => true,
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => __( 'Bar Background Color', 'bit14' ),
                                'param_name' => 'bg_color',
                                'description' => __( 'Color for background.', 'bit14' ),
                                'value' => '#ffffff',
                            ),
                            array(
                                'type'          =>  'textfield',
                                'class'         =>  'progressbar_id',
                                'heading'       =>  __( 'ID', 'bit14' ),
                                'description'   =>  'ID for your list item',
                                'param_name'    =>  'id',
                            ),
                            array(
                                'type'          =>  'textfield',
                                'class'         =>  'progressbar_class',
                                'heading'       =>  __( 'class', 'bit14' ),
                                'description'   =>  'Class for your list item',
                                'param_name'    =>  'class',
                            ),
                        )
                    ),

                    $google_fonts,     
                    array(
                        "type"          => "vc_links",
                        "param_name"    => "bit_caption_url",
                        "description"   => __( '<span style="Background: #1688b8;padding: 10px; display: block; color: white;font-weight:600;"><a href="https://pagebuilderaddons.com/plan-and-pricing/" target="_blank" style="color:white;">Get the Pro version for more elements and customization options.</a></span>', 'bit14' ),
                    ), 
                )
            )
        );

        vc_map_update( "icon_type" , array(__( 'icomoon', 'js_composer' ) => 'icomoon'));

	}

	function pbwb_shortcode_html($atts, $content = null){

        extract( shortcode_atts( array(
            'id'                    =>  '',
            'class'                 =>  '',
            'quantity'              =>  '',
            'bg_color'              =>  '',
            'theme_list'            =>  '',
            'google_text_font'      =>  '',
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

        $id = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
        $class = ( $class != '' ) ? 'list ' . esc_attr( $class ) : 'list';
        $quantity = ( $quantity != '' ) ? esc_attr( $quantity ) : '';
        $bg_color = ( $bg_color != '' ) ? $bg_color : '#ffffff';
        
        if ($theme_list != "") {
            if($theme_list == 1){
               
               $theme_list = 'theme-1'; 

            }elseif($theme_list == 2){
               
               $theme_list = 'theme-2'; 
                
            }elseif($theme_list == 3){
               
               $theme_list = 'theme-3'; 

            }elseif($theme_list == 4){
               
               $theme_list = 'theme-4'; 

            }
        }else{
            $theme_list = '';
        }

        $col = ( $quantity !== '' ) ? 'pb-col-sm-' . 12 / $quantity : 'pb-col-sm-12' ;

        $html = "<div ". $id ." class='" . esc_attr($class) . " row progress-bar-class " .esc_attr($theme_list)."'>";

            $items = vc_param_group_parse_atts( $atts['items'] );
            foreach( $items as $item) {


                $id                         = ( isset($item['id'])  && $item['id'] != '' ) ? 'id="' . esc_attr( $item['id'] ) . '"' : '';
                $class                      = ( isset($item['class']) && $item['class'] != '' ) ? 'list-item ' . esc_attr( $item['class'] ) :  'list-item';
                $icon                       = ( isset($item['icon']) && $item['icon'] != '' ) ? esc_attr($item['icon'], "large") : '';
                
                $title                      = ( isset($item['title']) && $item['title'] != '' ) ? $item['title'] : '';

                $counter                = ( isset($item['counter']) && $item['counter'] != '' ) ? $item['counter'] : '';
               
                $bg_color                = ( isset($item['bg_color']) && $item['bg_color'] != '' ) ? $item['bg_color'] : '';
                if(!empty($counter) && $counter != 0 ){                
                    $html .=
                    '<div  class="bit-progress-bar ' . esc_attr($col) .'" >
                        <h2 style="'.esc_attr($text_font_inline_style).'">'.esc_html($title).'</h2>
                        <div class="progressbar-counter-wrap">
                            <div class="progress-label" style="'.esc_attr($text_font_inline_style).'">
                            </div>
                        </div>
                        <div style="'.esc_attr($text_font_inline_style).'" class="progressbar" data-counter="'. esc_attr($counter) .'" data-bar-bg="'.esc_attr($bg_color).'">
                        
                        </div>
                    </div>' ;
                }
            }

        $html .= "</div>";

        $output = $html;

        $output .= wp_enqueue_style( 'pro-bit14-vc-addons-progress-bar', PBWB_ASSETS_URL.'css/progress-bar.css', false );
        $output .= wp_enqueue_script( 'pb-progress-bar-script', PBWB_ASSETS_URL.'js/progress-bar-script.js',  array('jquery'), false );
        $output .=  wp_enqueue_script( 'progress-bar', PBWB_ASSETS_URL.'js/progress-bar.min.js', array('jquery'), false );

        return $output;
    }
}

new PBWB_Progress_Bar;