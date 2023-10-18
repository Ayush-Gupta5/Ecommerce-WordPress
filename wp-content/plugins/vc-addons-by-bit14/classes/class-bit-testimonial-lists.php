<?php

class PBWB_Testimonial_Lists extends WPBakeryShortCode {
    
    function __construct(){

        // add_action( 'admin_init', array( $this, 'pbwb_mapping' ) );
        add_action( 'wp_loaded', array( $this, 'pbwb_mapping' ) );
        add_shortcode('testimonial-lists',array($this,'pbwb_shortcode_html'));

    }

    function pbwb_mapping(){

        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

        /*$testimonial_category = get_terms( array(
            'taxonomy' => 'testimonial_category',
        ) );

        $testimonial_categories = array();
        $testimonial_categories['All'] = 'all';
        foreach ($testimonial_category as $category) {
            $testimonial_categories[$category->name] = $category->slug;
        }*/
        
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
                'name'          => __('Testimonials', 'bit14'),
                'base'          => 'testimonial-lists',
                'description'   => __(' Showcase customer reviews and testimonials', 'bit14'), 
                'category'      => __('PB Addons', 'bit14'),
                'icon'          => plugin_dir_url(__DIR__) . 'assets/images/testimonial-lists.png',           
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
                            'Theme Style 1' => 'testimonial-style-one-pro',
                            'Theme Style 2' => 'testimonial-style-two-pro',
                            'Theme Style 3' => 'testimonial-style-three-pro',
                        ),
                    ),


                    array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Slider', 'bit14' ),
                        'param_name'    => 'is_slider',
                        'value'         => array('No','Yes'),
                        'group'         => 'General',
                        'dependency'    => array(
                            'element'       =>  'theme_style',
                            'value'         =>  array('testimonial-style-two-pro'),
                        ),
                    ),

                    array(
                        'type'          => 'checkbox',
                        'heading'       => __('Prev/Next Arrows?','bit14'),
                        'param_name'    => 'is_arrows',
                        'value'         => '1',
                        'group'         => 'General',
                        'dependency'    => array('element' => 'is_slider','value'=>'Yes'),
                    ),

                    array(
                        'type'          => 'checkbox',
                        'heading'       => __( 'Dynamic adaptive height', 'bit14' ),
                        'param_name'    => 'adaptive_height',
                        'value'         => '1',
                        'group'         => 'General',
                        'dependency'    => array('element' => 'is_slider','value'=>'Yes'),
                    ),


                    array(
                        'type'          => 'checkbox',
                        'heading'       => __('Autoplay?','bit14'),
                        'param_name'    => 'is_autoplay',
                        'value'         => '1',
                        'group'         => 'General',
                        'dependency'    => array('element' => 'is_slider','value'=>'Yes'),
                    ),

                    array(
                        'type'          => 'dropdown',
                        'heading'       => __('Autoplay Speed?','bit14'),
                        'param_name'    => 'autoplay_speed',
                        'value'         => array('500','1000','1500','2000','2500','3000','4000','5000','6000','7000'),
                        'group'         => 'General',
                        'dependency'    => array('element' => 'is_slider','value'=>'Yes'),
                    ),

                    array(
                        'type'          => 'checkbox',
                        'heading'       => __('Pause on Hover?','bit14'),
                        'param_name'    => 'is_pause_onhover',
                        'value'         => '1',
                        'group'         => 'General',
                        'dependency'    => array('element' => 'is_slider','value'=>'Yes'),
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
                        'group'  => 'General',
                    ),  

                    array(
                        'type'          => 'dropdown',
                        'heading'       => __('Slides in a row','bit14'),
                        'param_name'    => 'desktop_num_slides',
                        'value'         => array(1,2,3,4),
                        'group'         => 'Desktop',
                        'dependency'    => array(
                            'element'       =>  'theme_style',
                            'value'         =>  array('testimonial-style-one-pro')
                        ),
                    ),


                    array(
                        'type'          => 'dropdown',
                        'heading'       => __('Slides in a row','bit14'),
                        'param_name'    => 'tablet_num_slides',
                        'value'         => array(1,2),
                        'group'         => 'Tablet',
                        'dependency'    => array(
                            'element'       =>  'theme_style',
                            'value'         =>  'testimonial-style-one-pro'
                        ),
                    ),

                    array(
                        'type' => 'param_group',
                        'heading' => __( 'Testimonial', 'bit14' ),
                        'param_name' => 'testimonials',
                        'value' => '',
                        'group' => 'Testimonials',
                        'params' => array(
                            array(
                                'type' => 'textfield',
                                'heading' => __( 'Author Name', 'bit14' ),
                                'param_name' => 'author_name',
                                'description' => __( 'Enter Author Name For Testimonial.', 'bit14' ),
                                'admin_label' => true,
                                'value' => '',
                            ),
                            array(
                                'type' => 'attach_image',
                                'heading' => __( 'Author Image', 'bit14' ),
                                'param_name' => 'author_image',
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => __( 'Author Image Alternate Text', 'bit14' ),
                                'param_name' => 'author_image_alt',
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => __( 'Author Position', 'bit14' ),
                                'param_name' => 'author_details',
                                'value' => '',
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => __( 'Author Company', 'bit14' ),
                                'param_name' => 'author_company',
                                'value' => '',
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => __( 'Author URL', 'bit14' ),
                                'param_name' => 'author_url',
                                'value' => '',
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => __( 'Rating Stars', 'bit14' ),
                                'param_name' => 'rating_stars',
                                'value'         => array(
                                    'Please Select' => 'please_select',
                                    '1' => 1,
                                    '2' => 2,
                                    '3' => 3,
                                    '4' => 4,
                                    '5' => 5,
                                ),
                            ),
                            array(
                                'type' => 'textarea',
                                'heading' => __( 'Text', 'bit14' ),
                                'param_name' => 'testimonial',
                                'description' => __( 'What your client/customer has to say.', 'bit14' ),
                            ),
                        ),
                    ), 
                   $google_fonts,
                    array(
                        "type"          => "vc_links",
                        "param_name"    => "bit_caption_url",
                        "description"   => __( '<span style="Background: #1688b8;padding: 10px; display: block; color: white;font-weight:600;"><a href="https://pagebuilderaddons.com/plan-and-pricing/" target="_blank" style="color:white;">Get the Pro version for more elements and customization options.</a></span>', 'bit14' ),
                        'group'         => 'General',
                    ), 
                ),
            )
        );
    }

    function pbwb_shortcode_html($atts, $content = null){

        $testimonials = is_array($atts) && !empty($atts) && array_key_exists('testimonials' , $atts) ? vc_param_group_parse_atts( $atts['testimonials'] ) : '' ;



        extract( shortcode_atts( array(
            'id'                        => '',
            'class'                     => '',
            'theme_style'               => '',
            'rating_stars'              => '',
            'is_slider'                 => '',
            'is_arrows'                 => '',
            'is_dots'                   => '',
            'is_autoplay'               => '',
            'autoplay_speed'            => '',
            'is_pause_onhover'          => '',
            'is_fade'                   => '',
            'desktop_num_slides'        => '',
            'desktop_num_slides_move'   => '',
            'tablet_num_slides'         => '',
            'tablet_num_slides_move'    => '',
            'adaptive_height'           => '',
            'google_text_font'          => ''
        ), $atts ) );

        
        $output =   "
        [bit_testimonial
            id                        = '".$id."'
            class                     = '".$class."'
            theme_style               = '".$theme_style."'
            rating_stars              = '".$rating_stars."'
            is_slider                 = '".$is_slider."'
            is_arrows                 = '".$is_arrows."'
            is_dots                   = '".$is_dots."'
            is_autoplay               = '".$is_autoplay."'
            autoplay_speed            = '".$autoplay_speed."'
            is_pause_onhover          = '".$is_pause_onhover."'
            is_fade                   = '".$is_fade."'
            desktop_num_slides        = '".$desktop_num_slides."'
            desktop_num_slides_move   = '".$desktop_num_slides_move."'
            tablet_num_slides         = '".$tablet_num_slides."'
            tablet_num_slides_move    = '".$tablet_num_slides_move."'
            adaptive_height           = '".$adaptive_height."'
            google_text_font          = '".$google_text_font."'
        ]";
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
        
        $id =
        ( $id    != '' ) ?
        'id="' . esc_attr( $id ) . '"' :
        '';

        $class =
        ( $class != '' ) ?
        'testimonial ' . esc_attr( $class ) :
        'testimonial';

        $theme_style =
        $theme_style != "" ?
        $theme_style :
        'testimonial-style-one-pro';

        $class .=
        $is_slider &&  ($theme_style == 'testimonial-style-two-pro') ?
        ' bit14-slider-pro' :
        '';

        /*$testimonial_category =
        $testimonial_category != "" && $testimonial_category != "all" ?
        $testimonial_category :
        '';*/

        $data_attributes =
        $is_arrows || ($theme_style == 'testimonial-style-two-pro') ?
        'data-arrows="true"' :
        'data-arrows="false"';


        $data_attributes .=
        $adaptive_height && ($theme_style == 'testimonial-style-two-pro') ?
        ' data-adaptive-height="true"' :
        ' data-adaptive-height="false"';

        $data_attributes .=
        $is_autoplay  &&  ($theme_style == 'testimonial-style-two-pro') ?
        ' data-autoplay="true"' :
        ' data-autoplay="false"';

        $data_attributes .=
        $autoplay_speed ?
        ' data-autoplay-speed="'.esc_attr($autoplay_speed).'"' :
        ' data-autoplay-speed="3000"';

        $data_attributes .=
        $is_pause_onhover  &&  ($theme_style == 'testimonial-style-two-pro') ?
        ' data-pause-onhover="true"' :
        ' data-pause-onhover="false"';


        if($theme_style == 'testimonial-style-two-pro'){
            $data_attributes .= 'data-display-columns="1"';
        } else if($theme_style == 'testimonial-style-one-pro'){
            $data_attributes .= 'data-display-columns="'.$desktop_num_slides.'"';
        }


        $data_attributes .=
        $tablet_num_slides ?
        ' data-tablet-display-columns="'.esc_attr($tablet_num_slides).'"' :
       (($theme_style == 'testimonial-style-two-pro') ?
            ' data-tablet-display-columns="1"' :
            ' data-tablet-display-columns="2"');

        if ( $theme_style == 'testimonial-style-three-pro'){
            $desktop_num_slides = 2;
            $tablet_num_slides = 1;
        }
        
        if(!empty($desktop_num_slides) && !empty($tablet_num_slides)){
            $col = 'pb-col-md-'.(12/$desktop_num_slides).' pb-col-sm-'.(12/$tablet_num_slides).' pb-col-xs-12';
        } else {
            $col = '';
        }
        $rtl = get_option('bit14_rtl_language') === '1' ? 'dir="rtl"' : '';

            $output = '<div id="bit-testimonials-pro" class="'.esc_attr($theme_style).'">';
            $output .= '<div '.esc_attr($id).' class="'.esc_attr($class).' row" '.esc_html($data_attributes).'" '.esc_attr($rtl).'>';
            if(is_array($testimonials) && !empty($testimonials)){
                foreach($testimonials as $testimonial){
                
                    $title = isset($testimonial['author_name']) && !empty($testimonial['author_name']) ? $testimonial['author_name']: '';
                    $testimonial['author_url'] = isset($testimonial['author_url']) && !empty($testimonial['author_url']) ? $testimonial['author_url'] : '';
                    $author_url =
                            "<a  class='link-testimonial' target='_blank' href='". $testimonial['author_url'] ."' style='".$text_font_inline_style."'>" . $testimonial['author_url'] ."</a>";
                    
                    $author_company = isset($testimonial['author_company']) && !empty($testimonial['author_company']) ? $testimonial['author_company'] : '';
                    
                    $author_position = isset($testimonial['author_details']) && !empty($testimonial['author_details']) ? $testimonial['author_details'] : '';
                    
                    $content = isset($testimonial['testimonial']) && !empty($testimonial['testimonial']) ? $testimonial['testimonial'] : '';

                    $testimonial['author_image'] = isset($testimonial['author_image']) && !empty($testimonial['author_image']) ? $testimonial['author_image'] : '';
                    
                    $author_image_arr = wp_get_attachment_image_src($testimonial['author_image'],'medium');

                    $testimonial['author_image_alt'] = isset($testimonial['author_image_alt']) && !empty($testimonial['author_image_alt']) ? $testimonial['author_image_alt'] : '' ;
                
                    $author_image_alt = ($testimonial['author_image_alt'] != '') ? $testimonial['author_image_alt'] : 'author_image';

                    $media =  '<img src="'.$author_image_arr[0].'" width="'.$author_image_arr[1].'" height="'.$author_image_arr[2].'" alt="'.$author_image_alt.'">';

                    $ratings = isset($testimonial['rating_stars']) && !empty($testimonial['rating_stars']) ? $testimonial['rating_stars'] : '';
                    
                    $stars = '';
                    for($i = 0; $i < 5; $i++){
                        if($i < $ratings){
                            $stars .= '<i class="fa fa-star color"></i>';
                        }elseif($ratings == 'please_select'){
                            $stars .= '';
                        } else {
                            $stars .= '<i class="fa fa-star"></i>';
                        }
                        
                    }
                        $output .= '<div class="bit-testimonial-pro '. esc_attr($col) .'" style="display:inline-block;float:none;vertical-align:top;">';
                        $output .= '<div itemscope itemtype ="http://schema.org/Review" class="bit-testimonial-container-pro" style="'.esc_attr($text_font_inline_style).'">';
                            /*==========
                            Theme One
                            ==========*/
                            if ( $theme_style == 'testimonial-style-one-pro' ){
                               
                                // Content
                                if ( $content ){
                                    $output .= ''.$content.'';
                                }
                                // Image
                                if ( $media ){
                                    $output .= '<div itemprop="image" class="testimonial-author-image">'.wp_kses($media, $this->pbwb_get_allowed_tags()).'</div>';
                                }
                                // Author Details
                                $output .= '<div itemscope itemtype ="http://schema.org/Person" class="testimonial-author-meta">';
                                if($stars){
                                    $output .= '<div class="rating-stars-three middle-stars theme-one">';
                                        $output .= esc_attr($stars);
                                    $output .= '</div>';
                                }
                                if ( $title ){
                                    $output .= '<span itemprop="givenName" class="testimonial-author-name" style="'.esc_attr($text_font_inline_style).'">'.esc_html($title).'</span>';
                                }
                                if ( $author_position || $author_company || $author_url ){
                                    $output .= '<span class="testimonial-author-details">';
                                    $output .= '<span itemprop="jobTitle" style="'.esc_attr($text_font_inline_style).'">' . esc_html($author_position) . '</span>';
                                    $output .= ($author_position && ($author_company || $author_url)) ? esc_html__( ', ', 'bit14' ) : ' ' ;
                                    $output .= '<span itemprop="worksFor" style="'.esc_attr($text_font_inline_style).'">' . esc_attr($author_company) . '</span>';
                                    $output .= $author_url ? esc_html__( ', ', 'bit14' ) : ' ' ;
                                    $allowed_html = $this->pbwb_get_allowed_tags();
                                    $output .= wp_kses($author_url, $allowed_html);
                                    $output .= '</span>';
                                }
                                $output .= '</div>';

                            }

                            /*==========
                            Theme Two
                            ==========*/
                            elseif ( $theme_style == 'testimonial-style-two-pro' ){
                               
                                // Content
                                if ( $content ){
                                    $output .= ''.$content.'';
                                }
                                $theme_two_media = isset($theme_two_media) && $theme_two_media != '' ? $theme_two_media : '' ;
                                // Image
                                if ( $media ){
                                    $theme_two_media .= '<div itemprop="image" class="testimonial-author-image">'.wp_kses($media, $this->pbwb_get_allowed_tags()).'</div>';
                                    if(!empty($get_description)){//If description is not empty show the div
                                        echo '<div class="featured_caption" style="'.esc_attr($text_font_inline_style).'">' . esc_html($get_description) . '</div>';
                                    }
                                }else {
                                    $theme_two_media .= '<div itemprop="image" class="testimonial-author-image"><img src="'.plugin_dir_url(__DIR__) .'assets/images/dummy-person.png" /></div>';
                                }
                                // Author Details
                                $output .= '<div itemscope itemtype ="http://schema.org/Person" class="testimonial-author-meta">';
                                if ( $title ){
                                    $output .= '<span itemprop="givenName" class="testimonial-author-name" style="'.($text_font_inline_style).'">'.esc_html($title).'</span>';
                                }
                                if($stars){
                                    $output .= '<div class="rating-stars-three middle-stars theme-three">';
                                        $output .= esc_attr($stars);
                                    $output .= '</div>';
                                }
                                if ( $author_position || $author_company || $author_url ){
                                    $output .= '<span class="testimonial-author-details" style="'.esc_attr($text_font_inline_style).'">';
                                    $output .= '<span itemprop="jobTitle" style="'.esc_attr($text_font_inline_style).'">' . esc_html($author_position) . '</span>';
                                    $output .= ($author_position && ($author_company || $author_url)) ? esc_html__( ' , ', 'bit14' ) : ' ' ;
                                    $output .= '<span itemprop="worksFor" style="'.esc_attr($text_font_inline_style).'">' . esc_html($author_company) . '</span>';
                                    $output .= ($author_company && $author_url) ? esc_html__( ' , ', 'bit14' ) : ' ' ;
                                    $allowed_html = $this->pbwb_get_allowed_tags();
                                    $output .= wp_kses($author_url, $allowed_html);
                                    $output .= '</span>';
                                }
                                $output .= '</div>';
                            }
                            /*==========
                            Theme Three
                            ==========*/
                            elseif ( $theme_style == 'testimonial-style-three-pro' ){
                                // Content
                               
                                if ( $content && $author_url){
                                    $allowed_html = $this->pbwb_get_allowed_tags();
                                    $output .= ''.esc_html($content).' '.wp_kses($author_url, $allowed_html).'';
                                }
                                
                                $output .= '<div class="bit-author-details">';

                                    $output .= '<div class="author-details-three">';
                                        // Image
                                        if ( $media ){
                                            $output .= '<div itemprop="image" class="testimonial-author-image">'.wp_kses($media, $this->pbwb_get_allowed_tags()).'</div>';
                                            if(!empty($get_description)){//If description is not empty show the div
                                                echo '<div class="featured_caption" style="'.esc_attr($text_font_inline_style).'">' . esc_html($get_description) . '</div>';
                                            }
                                        }
                                        // Author Details
                                        $output .= '<div itemscope itemtype ="http://schema.org/Person" class="testimonial-author-meta">';
                                        if ( $title ){
                                            $output .= '<span itemprop="givenName" class="testimonial-author-name" style="'.esc_attr($text_font_inline_style).'">'.esc_html($title).'</span>';
                                        }
                                        if ( $author_position || $author_company ){
                                            $output .= '<span class="testimonial-author-details" style="'.esc_attr($text_font_inline_style).'">';
                                            $output .= '<span itemprop="jobTitle" style="'.esc_attr($text_font_inline_style).'">' . $author_position . '</span>';
                                            $output .= ($author_position && ($author_company || $author_url)) ? esc_html__( ' , ', 'bit14' ) : ' ' ;
                                            $output .= '<span itemprop="worksFor" style="'.esc_attr($text_font_inline_style).'">' . esc_html($author_company) . '</span>';
                                            $output .= '</span>';
                                        }
                                        $output .= '</div>';
                                    $output .= '</div>';
                                    if($stars){
                                        $output .= '<div class="rating-stars-three middle-stars">';
                                            $output .= esc_attr($stars);
                                        $output .= '</div>';
                                    }    
                                $output .= '</div>';
                            }



                        $output .= '</div>';
                    $output .= '</div>';

                }
            }    
            $output .= "</div>";
            /*==========
             Theme Two Thumbnails
            ==========*/
            $theme_two_media = isset($theme_two_media) && $theme_two_media != '' ? $theme_two_media : '' ;
            if ( $theme_style == 'testimonial-style-two-pro' && $theme_two_media ){
                $output .= '<div class="bit14-thumbnail" '.esc_attr($rtl).'>';
                    $allowed_html = $this->pbwb_get_allowed_tags();
                    $output .= wp_kses($theme_two_media, $allowed_html);
                $output .= '</div>';
            }
        $output .= "</div>";

       $output .= wp_enqueue_style( 'pro-bit14-vc-addons-team', PBWB_ASSETS_URL.'css/team.css', false );        
       $output .= wp_enqueue_style( 'pro-bit14-vc-addons-testimonial-pro', PBWB_ASSETS_URL.'css/testimonial-pro.css', false );
       $output .= wp_enqueue_style( 'slick-free', PBWB_ASSETS_URL.'css/slick.css', false );
       $output .= wp_enqueue_script( 'bit14-vc-addons-free', PBWB_ASSETS_URL.'js/script.js', array('jquery'), false );
       $output .= wp_enqueue_script( 'slick-free', PBWB_ASSETS_URL.'js/slick.min.js', array('jquery'), false );
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

new PBWB_Testimonial_Lists;
