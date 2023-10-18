<?php

class PBWB_Pieforms extends WPBakeryShortCode {
    function __construct(){

        // add_action( 'admin_init', array( $this, 'pbwb_mapping' ) );
        vc_add_shortcode_param( 'search_select',array($this, 'pbwb_search_select') );
        add_action( 'wp_loaded', array( $this, 'pbwb_mapping' ) );
        add_shortcode('pieforms',array($this,'pbwb_shortcode_html'));

    }
    function pbwb_search_select( $param, $value ) {
        $param_line = '';
        $param_line .= '<select name="'. esc_attr( $param['param_name'] ).'" class="vc-search-select wpb_vc_param_value wpb-input wpb-select'. esc_attr( $param['param_name'] ).' '. esc_attr($param['type']).'">';

        foreach ( $param['value'] as $val => $text_val ) {

                $text_val = __($text_val, "js_composer");
                $selected = '';

                if(!is_array($value)) {
                    $param_value_arr = explode(',',$value);
                } else {
                    $param_value_arr = $value;
                }

                if ($value!=='' && in_array($val, $param_value_arr)) {
                    $selected = ' selected="selected"';
                }
                $param_line .= '<option value="'.esc_attr($val).'"'.esc_attr($selected).'>'.esc_attr($text_val).'</option>';
            }
        $param_line .= '</select>';
        $param_line .= '<script>
            jQuery(document).ready(function() {
                jQuery(".vc-search-select").select2();
            });
        </script>';
                
        return  $param_line;
    }
    function pbwb_mapping(){

        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
        $forms_id = [];
        if (is_plugin_active('pie-forms-for-wp/pie-forms-for-wp.php') || is_plugin_active('pie-forms-for-wp-premium/pie-forms-for-wp-premium.php') ) {
            $forms = Pie_Forms()->core()->pform_get_all_forms();
            foreach($forms as $key => $value){
                $forms_id[$key] = $value;
            }
        }
        // Map the block with vc_map()
        vc_map(
            array(
                'name'          => __('Pieforms', 'bit14'),
                'base'          => 'pieforms',
                'description'   => __('The Easiest Drag and Drop WordPress Form Plugin', 'bit14'),
                'category'      => __('PB Addons', 'bit14'),
                'icon'          => plugin_dir_url(__DIR__) . 'assets/images/pie-forms-element.png',
                'params'        => array(
                    array(
                        "type"          => "vc_links",
                        "param_name"    => "bit_caption_url",
                        "description"   => __( '<span style="text-decoration: none;font-style: normal;">To use this element, the <a href="https://wordpress.org/plugins/pie-forms-for-wp/" target="_blank">Pie Forms plugin</a> must be installed and activated on your WordPress website.</span>', 'bit14' ),
                    ),
                    array(
                        "type"          => "search_select",
                        "heading"       => esc_html__("Forms", 'bit14'),
                        "param_name"    => "form_id",
                        "value"         =>  $forms_id,
                    ),
                ),
            )
        );
    }

    function pbwb_shortcode_html($atts, $content = null){

        extract( shortcode_atts( array(
            'form_id'   =>  '',
        ), $atts ) );
 
        $output = '<div>';
            $output .= do_shortcode("[pie_form id='".esc_html($form_id)."']");
        $output .= '</div>';
        return $output;
    }
}

new PBWB_Pieforms;
