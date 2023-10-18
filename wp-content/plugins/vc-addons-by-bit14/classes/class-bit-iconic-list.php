<?php

class PBWB_Iconic_List extends WPBakeryShortCode {

    function __construct(){
        // add_action( 'admin_init', array( $this, 'pbwb_mapping' ) );
        add_action( 'wp_loaded', array( $this, 'pbwb_mapping' ) );
        add_shortcode('iconic-list',array($this,'pbwb_shortcode_html'));

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
                'name'          => __('Iconic List', 'bit14'),
                'base'          => 'iconic-list',
                'description'   => __('Add iconic lists to make the website vibrant and interactive', 'bit14'),
                'category'      => __('PB Addons', 'bit14'),
                'icon'          => plugin_dir_url(__DIR__) . 'assets/images/iconic-list.png',
                'params'        => array(
                    array(
                        'type'          =>  'textfield',
                        'class'         =>  'iconiclist_id',
                        'heading'       =>  __( 'ID', 'bit14' ),
                        'description'   =>  'ID for your list',
                        'param_name'    =>  'id',
                    ),
                    array(
                        'type'          =>  'textfield',
                        'class'         =>  'iconiclist_class',
                        'heading'       =>  __( 'class', 'bit14' ),
                        'description'   =>  'Class for your list',
                        'param_name'    =>  'class',
                    ),
                    array(
                        'type'          =>  'dropdown',
                        'class'         =>  'iconiclist_type',
                        'heading'       =>  __( 'List type', 'bit14' ),
                        'description'   =>  'Select the type of list to be displayed',
                        'param_name'    =>  'type',
                        'value'         =>  array(
                            'Horizontal'    =>  'horizontal',
                            'Vertical'      =>  'vertical'
                        )
                    ),
                    array(
                        'type'          =>  'dropdown',
                        'class'         =>  'iconiclist_theme',
                        'heading'       =>  __( 'List Theme', 'bit14' ),
                        'description'   =>  'Select the type of Icon to be displayed',
                        'param_name'    =>  'theme_list',
                        'value'         =>  array(
                            'Theme 1'   =>  'theme_1',
                            'Theme 2'   =>  'theme_2'
                        ),
                        'dependency'    => array(
                            'element'       => 'type',
                            'value'         => 'horizontal',
                        ),
                    ),
                    array(
                        'type'          =>  'dropdown',
                        'class'         =>  'iconiclist_quantity',
                        'heading'       =>  __( 'List item(s) in a row', 'bit14' ),
                        'description'   =>  'Number of list item(s) to be displayed in one row',
                        'param_name'    =>  'quantity',
                        'value'         =>  array(
                            'One'           =>  1,
                            'Two'           =>  2,
                            'Three'         =>  3,
                            'Four'          =>  4
                        )
                    ),
                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Background Color', 'bit14' ),
                        'param_name'    => 'bg_color',
                        'description'   => __( 'Color for background.', 'bit14' ),
                        'value'         => '',
                       /* 'dependency'    => array(
                            'element'       => 'theme_list',
                            'value'         => '1',
                        ),*/
                    ),
                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Hover', 'bit14' ),
                        'param_name'    => 'hover_color',
                        'description'   => __( 'Color for background hover.', 'bit14' ),
                        'value'         => '',
                       /* 'dependency'    => array(
                            'element'       => 'theme_list',
                            'value'         => '1',
                        ),*/
                    ),
                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Text Color', 'bit14' ),
                        'param_name'    => 'text_color',
                        'value'         => '#000000',
                    ),
                    array(
                        'type'          => 'colorpicker',
                        'heading'       => __( 'Hover Text Color', 'bit14' ),
                        'param_name'    => 'hover_text_color',
                        'description'   => __( 'Text color on hover.', 'bit14' ),
                    ),
                    /*array(
                        'type'          => 'dropdown',
                        'heading'       => __( 'Background Hover Animation', 'bit14' ),
                        'param_name'    => 'bg_hover_animation',
                        'description'   => __( 'Background color on hover animation.', 'bit14' ),
                        'value'         =>  array(
                            'None'          =>  1,
                            'Bounce In'     =>  2,
                            'Flip'          =>  3,
                            'Flip In Y'     =>  4,
                            'Flip In X'     =>  5,
                            'Rotate In'     =>  6,
                            'Tada'          =>  7,
                        ),
                    ),*/
                    array(
                        'type'          =>  'param_group',
                        'value'         =>  '',
                        'param_name'    =>  'items',
                        'params'        =>  array(

                            array(
                                'type'          => 'dropdown',
                                'heading'       => __( 'Show icon', 'bit14' ),
                                'param_name'    => 'is_icon',
                                'description'   => __( 'Show/Hide icon.', 'bit14' ),
                                'value'         => array(
                                    "Font Awesome"      =>  'fontawesome',
                                    /*"PB icons"          =>  'icomoon',*/
                                    "Custom Icon"       =>  'custom'
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
                                'dependency'    => array(
                                    'element'       => 'is_icon',
                                    'value'         => 'fontawesome',
                                ),
                                'description'   => __( 'Select icon from library.', 'js_composer' ),
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
                                'type'          => 'colorpicker',
                                'heading'       => __( 'Hover Icon Color', 'bit14' ),
                                'param_name'    => 'hover_icon_color',
                                'description'   => __( 'Icon color on hover.', 'bit14' ),
                                'dependency' => array(
                                    'element' => 'is_icon',
                                    'value' => 'fontawesome',
                                ),
                            ),
                            array(
                                'type'          =>  'textfield',
                                'class'         =>  'iconiclist_title',
                                'heading'       =>  __( 'Title', 'bit14' ),
                                'description'   =>  'Title of your list item',
                                'param_name'    =>  'title',
                                'admin_label'   => true,
                            ),
                            array(
                                'type'          => 'dropdown',
                                'heading'       => __( 'Add Description', 'bit14' ),
                                'param_name'    => 'is_description',
                                'description'   => __( 'Show/Hide Description.', 'bit14' ),
                                'value'         => array(
                                    "Yes"      =>  'show',
                                    "No"       =>  'hide'
                                )
                            ),
                            array(
                                'type'          =>  'textarea',
                                'class'         =>  'iconiclist_description',
                                'heading'       =>  __( 'Description', 'bit14' ),
                                'description'   =>  'Description of your list item',
                                'param_name'    =>  'description',
                                'dependency'    => array(
                                    'element'       => 'is_description',
                                    'value'         => 'show',
                                ),
                            ),
                            array(
                                'type'          =>  'textfield',
                                'class'         =>  'iconiclist_content_link',
                                'heading'       =>  __( 'Content Link', 'bit14' ),
                                'description'   =>  'Link On your content',
                                'param_name'    =>  'content_link',
                            ),
                            array(
                                'type'          =>  'textfield',
                                'class'         =>  'iconiclist_id',
                                'heading'       =>  __( 'ID', 'bit14' ),
                                'description'   =>  'ID for your list item',
                                'param_name'    =>  'id',
                            ),
                            array(
                                'type'          =>  'textfield',
                                'class'         =>  'iconiclist_class',
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
                        "description"   => __( '<span class="bit14-pro-link" style="Background: #1688b8;padding: 10px; display: block; color: white;font-weight:600;"><a href="https://pagebuilderaddons.com/plan-and-pricing/" target="_blank" style="color:white;">Get the Pro version for more elements and customization options.</a></span>', 'bit14' ),
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
            'type'                  =>  '',
            'quantity'              =>  '',
            'bg_color'              =>  '',
            'hover_color'           =>  '',
            'hover_text_color'      =>  '',
            'text_color'            =>  '',
            'theme_list'            =>  '',
            'google_text_font'      =>  '',
            /*'bg_hover_animation'    =>  '',*/

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
        
        $id                     = ( $id != '' )                 ? 'id="' . esc_attr( $id ) . '"'                : '';
        $class                  = ( $class != '' )              ? 'list ' . esc_attr( $class )                  : 'list';

        $type                   = ( $type != '' )               ? (( $type == 'horizontal' ) ? 'horizontal' : 'vertical') : 'horizontal';

        $shape                  = ( $type == "vertical" )       ? 'listitem-circle'                             : '';
        $quantity               = ( $quantity != '' )           ? esc_attr( $quantity )                         : '';
        $bg_color               = ( $bg_color != '' )           ? $bg_color                                     : 'transparent';
        $hover_color            = ( $hover_color != '' )        ? $hover_color                                  : 'transparent';
        $hover_text_color       = ( $hover_text_color != '' )   ? $hover_text_color                             : '';
        $text_color             = ( $text_color != '' )         ? $text_color                                   : '';
        $col                    = ( $quantity !== '' )          ? 'pb-col-sm-' . 12 / $quantity                    : 'pb-col-sm-12' ;

        if ($type == 'horizontal') {
            # code...
            if ($theme_list != "") {
                if($theme_list == 'theme_1'){

                    $theme_list = 'theme-1';

                }elseif($theme_list == 'theme_2'){

                    $theme_list = 'theme-2';

                }
            }else{
                $theme_list = 'theme_1';
            }

        }

        /*if ($bg_hover_animation != "") {
            if($bg_hover_animation == 1){

                $bg_hover_animation = 'none';

            }elseif($bg_hover_animation == 2){

                $bg_hover_animation = 'bounceIn';

            }elseif($bg_hover_animation == 3){

                $bg_hover_animation = 'flip';

            }elseif($bg_hover_animation == 4){

                $bg_hover_animation = 'flipInY';

            }elseif($bg_hover_animation == 5){

                $bg_hover_animation = 'flipInX';

            }elseif($bg_hover_animation == 6){

                $bg_hover_animation = 'rotateIn';

            }elseif($bg_hover_animation == 7){

                $bg_hover_animation = 'tada';

            }
        }else{
            $bg_hover_animation = '';
        }*/

        $html = "<div ". $id ." class='". esc_attr($class) . ' row '  . esc_attr($type) ." " . esc_attr($theme_list)."'>";

        $items = vc_param_group_parse_atts( $atts['items'] );

        foreach( $items as $item) {


            $id                         = ( isset($item['id'])  && $item['id'] != '' ) ? 'id="' . esc_attr( $item['id'] ) . '"' : '';
            $class                      = ( isset($item['class']) && $item['class'] != '' ) ? 'list-item ' . esc_attr( $item['class'] ) :  'list-item';
            $icon                       = ( isset($item['icon']) && $item['icon'] != '' ) ? esc_attr($item['icon'], "large") : '';
            $custom_icon                = ( isset($item['custom_icon']) && $item['custom_icon'] != '' ) ? esc_attr($item['custom_icon'], "large") : '';
            $image                      = ( isset($item['image'])  && $item['image'] != '' ) ? wp_get_attachment_image_src($item["image"], "large") : '';
            $image_alt                  = ( isset($item['image_alt']) && $item['image_alt'] != '' ) ? esc_html($item['image_alt']) : '';
            $hover_icon_color                      = ( isset($item['hover_icon_color']) && $item['hover_icon_color'] != '' ) ? $item['hover_icon_color'] : '';

            $title                      = ( isset($item['title']) && $item['title'] != '' ) ? $item['title'] : '';
            $description                = ( isset($item['description']) && $item['description'] != '' && $item['is_description'] == 'show' )  ? $item['description'] : '';

            $content_link_open          = ( isset($item['content_link']) && $item['content_link'] != '' ) ? '<a href="'. esc_html($item['content_link']) .'">' : '';

            $content_link_close         = ( isset($item['content_link']) && $item['content_link'] != '' ) ? '</a>' : '';

            $description_p_horizontal   = ( $type == "horizontal" ) ? '<p style="'.$text_font_inline_style.'">'. esc_html($description) .'</p>' : '';

            $description_p_vertical     = ( $type == "vertical" ) ? '<p style="'.$text_font_inline_style.'">'. esc_html($description) .'</p>' : '';

            if( isset($item['is_icon']) && $item['is_icon'] == 'fontawesome' ){
                /*data-animation="'.$bg_hover_animation.'"*/
                $is_icon = '<span class="icon ' . esc_attr($icon) .'" ></span>';
            }

            if( isset($item['is_icon']) && $item['is_icon'] == 'custom' ){
                $is_icon = is_array($image) ? '<img class="pba-img" src="'.esc_url($image[0]) .'" alt="'.esc_html($image_alt).'" />' : '';
            }
            if( 'vertical' == $type ){
                $button = "";
            }

            $html .=
                '<div  class="bit-iconic-list ' . esc_attr($col) .' " >
                    <div ' . esc_html($id) . ' class="'. esc_html($class) . ' '. esc_attr($shape) .' bit-iconic-list-item" data-bg-color="' . esc_attr($bg_color) . '" data-hover-color="' . esc_attr($hover_color) . '" data-text-color="' . esc_attr($text_color) . '" data-hover-text-color="' . esc_attr($hover_text_color) . '" data-hover-icon-color="' . esc_attr($hover_icon_color) . '" style="background: ' . esc_attr($bg_color) . '" >
                        <div class="bit-iconic-list-inner">
                            '.$is_icon.'
                            <div class="bit-iconic-list-content">
                                '.esc_url( $content_link_open) .'
                                    <h4 style="'.esc_attr($text_font_inline_style).'">'. esc_html($title) .'</h4>
                                   '. esc_html($description_p_horizontal) .'
                                '. esc_html($content_link_close) .'
                            </div>
                        </div>
                    </div>
                    '. esc_html($description_p_vertical). '
                </div>' ;
        }

        $html .= "</div>";

        $output = $html;
        $output .= wp_enqueue_style( 'pro-bit14-vc-addons-iconic-list', PBWB_ASSETS_URL.'css/iconic-list.css', false );
        $output .= wp_enqueue_script( 'pro-bit14-vc-addons-iconic-list', PBWB_ASSETS_URL.'js/iconic-list-script.js', array('jquery'), false, true );
        return $output;
    }
}

new PBWB_Iconic_List;
