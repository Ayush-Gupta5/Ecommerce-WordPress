<?php

class PBWB_Animatedtext extends WPBakeryShortCode {
	
	function __construct(){

		// add_action( 'admin_init', array( $this, 'pbwb_mapping' ) );
        add_action( 'wp_loaded', array( $this, 'pbwb_mapping' ) );
		add_shortcode('bit_animatedtext',array($this,'pbwb_shortcode_html'));

	}

	function pbwb_mapping(){

		// Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

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
                'name'          => __('Simple Animated Text', 'bit14'),
                'description'          => __('Create eye-catching animated text to keep your audience engaged.', 'bit14'),
                'base'          => 'bit_animatedtext',
                'category'      => __('PB Addons', 'bit14'),
                'icon'          => plugin_dir_url(__DIR__) . 'assets/images/animated-text.png',
                'params'        => array(
                    array(
                        'type'          => 'textarea',
                        'heading'       => __('Text','bit14'),
                        'param_name'    => 'text',
                    ),
                    array(
                        'type'          =>  'colorpicker',
                        'heading'       =>  __( 'Text Color', 'bit14' ),
                        'param_name'    =>  'text_color',
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Animations', 'bit14' ),
                        'param_name'    => 'animations',
                        'value'         => array(
                            'Bounce'        => 'bounce',
                            'Flash'         => 'flash',
                            'Pulse'         => 'pulse',
                            'RubberBand'    => 'rubberBand',
                            'ShakeX'        => 'shakeX',
                            'ShakeY'        => 'shakeY',
                            'HeadShake'     => 'headShake',
                            'Swing'         => 'swing',
                            'Tada'          => 'tada',
                            'Wobble'        => 'wobble',
                        )
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
                        "description"   => __( '<span style="Background: #1688b8;padding: 10px; display: block; color: white;font-weight:600;"><a href="https://pagebuilderaddons.com/plan-and-pricing/" target="_blank" style="color:white;">Get the Pro version for more elements and customization options.</a></span>', 'bit14' ),
                    ), 
                ),
            )
        );
	}

	function pbwb_shortcode_html($atts, $content = null){

		extract( shortcode_atts( array(
		    'id'                        => '',
            'class'                     => '',
            'text_color'                => '',
            'animations'                => '',
            'text'                      => '',
            'google_text_font'          => '',
        ), $atts ) );
        
        $output =   "
        [bit_animatedtext
            id                        = '".$id."'
            class                     = '".$class."'
            animations                = '".$animations."'
            text                      = '".$text."'
            text_color                = '".$text_color."'
            google_text_font          = '".$google_text_font."'
            ]";
            
        $id                     = ( $id != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';

        $class                  = ( $class != '' ) ? 'bit14-animated-text ' . esc_attr( $class ) : 'bit14-animated-text';

        $animations             = ( $animations != '' ) ?  $animations : 'bounce';

        $text_color             = ( $text_color != '' ) ?  $text_color : '#000';

        $text                   = ( $text != '' ) ?  $text : '';           
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

        $output = '<div '.esc_attr($id).' class="'.esc_attr($class).'">';    
            $output .= '<div class="animated-text animate__animated animate__'.esc_attr($animations).' animate__infinite animate__slower">';    
                $output .= '<p style="color:'.esc_attr($text_color).'; '.esc_attr($text_font_inline_style).'">'.esc_html($text).'</p>';
            $output .= "</div>"; 
        $output .= "</div>"; 
        
        $output .= wp_enqueue_style( 'pro-bit14-vc-addons-animate', PBWB_ASSETS_URL.'css/animate.css', false );

        return $output;
	}
}

new PBWB_Animatedtext;
