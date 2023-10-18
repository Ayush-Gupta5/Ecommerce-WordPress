<?php

class PBWB_Audio_Player extends WPBakeryShortCode {
    function __construct(){

        // add_action( 'admin_init', array( $this, 'pbwb_mapping' ) );
        add_action( 'wp_loaded', array( $this, 'pbwb_mapping' ) );
        add_shortcode('audio_player',array($this,'pbwb_shortcode_html'));

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
                'name'          => __('Audio Player', 'bit14'),
                'base'          => 'audio_player',
                'description'   => __('Add audio player on your web page with multiple styling options', 'bit14'),
                'category'      => __('PB Addons', 'bit14'),
                'icon'          => plugin_dir_url(__DIR__) . 'assets/images/audio-player.png',
                'params'        => array(
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Themes', 'bit14' ),
                        'param_name'    => 'theme_style',
                        'value'         => array(
                            'Theme One'         => 'audio-player-theme-one',
                            'Theme Two'         => 'audio-player-theme-two',
                            'Theme Three'       => 'audio-player-theme-three',
                            'Theme Four'        => 'audio-player-theme-four',
                            'Theme Five'        => 'audio-player-theme-five'
                        ),
                    ),
                    array(
                        'type'          =>  'attach_image',
                        'heading'       =>  __( 'Audio Image', 'bit14' ),
                        'param_name'    =>  'audio_image',
                        'dependency'    => array(
                            'element'       => 'theme_style',
                            'value'         => array('audio-player-theme-three' , 'audio-player-theme-four' , 'audio-player-theme-five')
                        ),
                    ), 
                    array(
                        'type'          =>  'attach_image',
                        'heading'       =>  __( 'Background Audio Image', 'bit14' ),
                        'param_name'    =>  'bg_audio_image',
                        'dependency'    => array(
                            'element'       => 'theme_style',
                            'value'         => 'audio-player-theme-two'
                        ),
                    ), 
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Audio Category', 'bit14' ),
                        'param_name'    => 'audio_category',
                        'value'         => array(
                            'Link'         => 'link',
                            'Upload'       => 'upload'
                        ),
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => __( 'Audio Link', 'bit14' ),
                        'param_name'    => 'audio_link',
                        'admin_label'   => true,
                        'dependency'    => array(
                            'element'       => 'audio_category',
                            'value'         => 'link'
                        ),
                    ),
                    array(
                        'type'          => 'attach_image',
                        'heading'       => __( 'Upload Audio', 'bit14' ),
                        'param_name'    => 'audio_upload',
                        'dependency'    => array(
                            'element'       => 'audio_category',
                            'value'         => 'upload'
                        ),
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Audio Extension', 'bit14' ),
                        'param_name'    => 'audio_extension',
                        'value'         => array(
                            'mp3'         => 'mp3',
                            'ogg'         => 'ogg',
                            'flac'        => 'flac',
                            'm4a'         => 'm4a',
                            'wav'         => 'wav'
                        ),
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => __( 'Audio Title', 'bit14' ),
                        'param_name'    => 'audio_title',
                        'admin_label'   => true,
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => __( 'Artist Name', 'bit14' ),
                        'param_name'    => 'artist_name',
                        'admin_label'   => true,
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Preload', 'bit14' ),
                        'param_name'    => 'preload_audio',
                        'value'         => array(
                            'Auto'          => 'auto',
                            'Metadata'      => 'metadata',
                            'None'          => 'none'
                        ),
                    ),
                    array(
                        'type'          => 'checkbox',
                        'heading'       => __('Autoplay','bit14'),
                        'param_name'    => 'is_autoplay',
                        'value'         => '1',                        
                    ),
                    // array(
                    //     'type'          => 'checkbox',
                    //     'heading'       => __('Loop','bit14'),
                    //     'param_name'    => 'is_loop',
                    //     'value'         => '1',                        
                    // ),
                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Background Color', 'bit14' ),
                        'param_name'    => 'background_color',
                        'group'         => 'Style'    
                    ),
                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Audio Title Color', 'bit14' ),
                        'param_name'    => 'audio_title_color',
                        'group'         => 'Style'    
                    ),
                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Artist Name Color', 'bit14' ),
                        'param_name'    => 'artist_name_color',
                        'group'         => 'Style'    
                    ),
                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Timer Color', 'bit14' ),
                        'param_name'    => 'timer_color',
                        'group'         => 'Style'    
                    ),
                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Control Button Color', 'bit14' ),
                        'param_name'    => 'control_button_color',
                        'group'         => 'Style'    
                    ),
                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Slider Color', 'bit14' ),
                        'param_name'    => 'slider_color',
                        'group'         => 'Style'
                    ),
                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Control Button Background Color', 'bit14' ),
                        'param_name'    => 'control_bg_button_color',
                        'group'         => 'Style',
                        'dependency'    => array(
                            'element'       => 'theme_style',
                            'value'         => array('audio-player-theme-three' , 'audio-player-theme-one')
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
            'theme_style'               =>  '',
            'audio_image'               =>  '',
            'audio_category'            =>  '',
            'audio_link'                =>  '',
            'audio_upload'              =>  '',
            'audio_title'               =>  '',
            'artist_name'               =>  '',
            'preload_audio'             =>  '',
            'is_autoplay'               =>  '',
            // 'is_loop'                   =>  '',
            'audio_extension'           =>  '',
            'background_color'          =>  '',
            'audio_title_color'         =>  '',
            'artist_name_color'         =>  '',
            'timer_color'               =>  '',
            'control_button_color'      =>  '',
            'control_bg_button_color'   =>  '',
            'slider_color'              =>  '',
            'bg_audio_image'            =>  '',
            'id'                        =>  '',
            'class'                     =>  '',
            'google_text_font'          =>  ''
        ), $atts ) );

        $theme_style                    = ($theme_style != "") ? $theme_style : 'audio-player-theme-one';
        $audio_image                    = ($audio_image != "") ? wp_get_attachment_image_src($audio_image, "large") : '';
        $bg_audio_image                 = ($bg_audio_image != "") ?wp_get_attachment_image_src($bg_audio_image, "large")  : '';
        $audio_link                     = ($audio_link != "") ? $audio_link : '';
        $audio_upload                   = ($audio_upload != "") ? wp_get_attachment_url($audio_upload) : '';
        $audio                          = ($audio_link != "") ? $audio_link : $audio_upload;
        $audio_title                    = ($audio_title != "") ? $audio_title : '';
        $artist_name                    = ($artist_name != "") ? $artist_name : '';
        $background_color               = ($background_color != "") ? $background_color : '';
        $audio_title_color              = ($audio_title_color != "") ? $audio_title_color : '';
        $artist_name_color              = ($artist_name_color != "") ? $artist_name_color : '';
        $timer_color                    = ($timer_color != "") ? $timer_color : '';
        $control_button_color           = ($control_button_color != "") ? $control_button_color : '';
        $control_bg_button_color        = ($control_bg_button_color != "") ? $control_bg_button_color : '';
        $slider_color                   = ($slider_color != "") ? $slider_color : '';
        $audio_extension                = $audio_extension ? $audio_extension : 'mp3';
        $preload_audio                  = $preload_audio ? $preload_audio : 'auto';
        $bg_audio_image                 = isset($bg_audio_image[0]) ? $bg_audio_image[0] : '';
        $audio_image                    = isset($audio_image[0]) ? $audio_image[0] : '';
        // $is_loop                        = isset($is_loop) ? $is_loop : 'false';
        $is_autoplay                    = isset($is_autoplay) && $is_autoplay === 'true' ? 'autoplay' : '';
       

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
        
        $output  = '<div '.esc_attr($id).' class="bi14-audio-player '.esc_attr($class).' '.esc_attr($theme_style).'" data-theme-style="'.esc_attr($theme_style).'" data-control-button-color="'.esc_attr($control_button_color).'">';
            $output .= '<div class="player" style="background:'.esc_attr($background_color).';">';
                if($theme_style !== 'audio-player-theme-two' && $theme_style !== 'audio-player-theme-one'){
                    $output .= '<div class="audio-image">';
                        $output .=  '<img src="'.esc_url($audio_image).'"/>';
                    $output .= '</div>';
                }
                $output .= '<div class="audio-info" style="background-image:url('.$bg_audio_image.')">';
                    $output .= '<p class="audio-title" style="color:'.esc_attr($audio_title_color).'; '.esc_attr($text_font_inline_style).'">'.esc_html($audio_title).'</p>';
                    $output .= '<p class="artist-name" style="color:'.esc_attr($artist_name_color).'; '.esc_attr($text_font_inline_style).'">'.esc_html($artist_name).'</p>';
                    if($theme_style === 'audio-player-theme-five'){
                        $output .= '</div>';
                    }

                $output .= '<div class="button-items">';
                    $output .= '<audio id="music" preload="'.esc_attr($preload_audio).'" '.esc_attr($is_autoplay).' >
                            <source src="'.esc_url($audio).'"  type="audio/'.esc_attr($audio_extension).'">';
                    $output .= '</audio>';
                  
                    if($theme_style === 'audio-player-theme-five' || $theme_style === 'audio-player-theme-two' || $theme_style === 'audio-player-theme-three' || $theme_style === 'audio-player-theme-one' ){
                        if($theme_style === 'audio-player-theme-five'  || $theme_style === 'audio-player-theme-one' ){
                            $output .= '<p id="timer" style="color:'.esc_attr($timer_color).'; '.esc_attr($text_font_inline_style).'">0:00</p>';
                        }
                        $output .= '<div id="slider"><div id="elapsed" style="background:'.esc_attr($slider_color).'"></div></div>';   
                    }                    
                    $output .= '<div class="controls">';
                        
                        $output .= '<svg id="backward" viewBox="0 0 25 25" xml:space="preserve" style="fill: '.esc_attr($control_button_color).'; background:'.esc_attr($control_bg_button_color).'" >
                        <g>
                            <polygon points="4.9,4.3 9,4.3 9,11.6 21.4,4.3 21.4,20.7 9,13.4 9,20.7 4.9,20.7"/>
                        </g>';
                        $output .= ' </svg>';

                        $output .= '<svg id="play" viewBox="0 0 25 25" xml:space="preserve" style="fill: '.esc_attr($control_button_color).'; background:'.esc_attr($control_bg_button_color).'" >
                            <defs><rect x="-49.5" y="-132.9" width="446.4" height="366.4"/></defs>
                        <g><circle fill="none" cx="12.5" cy="12.5" r="10.8"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.7,6.9V18c0,0,0.2,1.4,1.8,0l8.1-4.8c0,0,1.2-1.1-1-2L9.8,6.5 C9.8,6.5,9.1,6,8.7,6.9z"/>
                        </g>';
                        $output .= '</svg>';
                    

                        $output .= '<svg id="pause" viewBox="0 0 25 25" xml:space="preserve" style="fill: '.esc_attr($control_button_color).'; background:'.esc_attr($control_bg_button_color).'" >
                        <g>
                            <rect x="6" y="4.6" width="3.8" height="15.7"/>
                            <rect x="14" y="4.6" width="3.9" height="15.7"/>
                        </g>';
                        $output .= '</svg>';

                        $output .= '<svg id="forward" viewBox="0 0 25 25" xml:space="preserve" style="fill: '.esc_attr($control_button_color).'; background:'.esc_attr($control_bg_button_color).'" >
                        <g>
                            <polygon points="20.7,4.3 16.6,4.3 16.6,11.6 4.3,4.3 4.3,20.7 16.7,13.4 16.6,20.7 20.7,20.7"/>
                        </g>';
                        $output .= ' </svg>';

                $output .= '</div>';
                $output .= '</div>';
                if($theme_style === 'audio-player-theme-four'){
                    $output .= '<div id="slider"><div id="elapsed" style="background:'.esc_attr($slider_color).'"></div></div>';   
                }  
                $output .= '</div>';
        $output .= '</div>';
        
        $output .= wp_enqueue_style( 'pro-bit14-vc-addons-audio-player', PBWB_ASSETS_URL.'css/audio-player.css', false );
        $output .= wp_enqueue_script( 'pb-audio-player-script', PBWB_ASSETS_URL.'js/audio-player.js', array('jquery'), false );

        return $output;
    }
}

new PBWB_Audio_Player;
