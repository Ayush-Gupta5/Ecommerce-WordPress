<?php

class WPBakeryShortCode_bit14_pricing_tables extends WPBakeryShortCodesContainer {

    protected function content($atts, $content = null){
        
        extract(
            shortcode_atts( array(
                "id"                =>  "",
                "class"             =>  "",
                "primary_color"     =>  "",
                "alternate_color"   =>  "",
                "theme"             =>  "",
                "columns"           =>  ""
            ), $atts)
        );

        $this->table_id         =   ( $id != "" )               ?   esc_attr($id)               :   "" ;
        $this->table_class      =   ( $class != "" )            ?   esc_attr($class)            :   "" ;
        $this->primary_color    =   ( $primary_color != "" )    ?   esc_attr($primary_color)    :   "#7f7f7f" ;
        $this->alternate_color  =   ( $alternate_color != "" )  ?   esc_attr($alternate_color)  :   "#ffffff" ;
        $this->theme            =   ( $theme != "" )            ?   esc_attr($theme)            :   "theme-one" ;
        $this->columns          =   ( $columns != "" )          ?   12 / $columns               :   "3";

        $this->columns          =   ( $theme == "theme-three" ) ?   "12"                        :   $this->columns;

        return "<div id='".esc_attr($this->table_id)."' class='".esc_attr($this->table_class).' '.esc_attr($this->theme)." bit_table_group row' data-columns='".esc_attr($this->columns)."' data-primary-color='".esc_attr($this->primary_color)."' data-alternate-color='".esc_attr($this->alternate_color)."' >" . apply_filters('the_content', $content). "</div>";


    }
}
  // Map the block with vc_map()
  vc_map(
    array(
        "name"                      =>   __( 'Pricing Tables', 'bit14' ),
        "description"               =>   __( 'Present your pricing plans in a comprehensive layout', 'bit14' ),
        "base"                      =>  "Bit14_Pricing_Tables",
        "class"                     =>  "Bit14_Pricing_Tables",
        "category"                  => __('PB Addons', 'bit14'),
        "as_parent"                 =>  array('only' => 'Bit_Pricing_Table'),
        "content_element"           =>  true,
        "is_container"              =>  true,
        'icon'                      =>  'icon-bit-table',
        "show_settings_on_create"   =>  true,
        "js_view"                   =>  'VcColumnView',
        'params'                    =>  array(
            array(
                'type'          => 'vc_links',
                'param_name'    => 'notice_1',
                'description'   => __( "For more themes and advance options, check <a href='https://pagebuilderaddons.com/pricing-table-advance/'> Pricing Table (Advance)</a>", 'bit14' ),
            ),
            array(
                'type'          =>  'textfield',
                'heading'       =>  __( 'Element ID', 'bit14' ),
                'param_name'    =>  'id',
                'description'   =>  __( 'Element ID', 'bit14' ),
            ),

            array(
                'type'          =>  'textfield',
                'heading'       =>  __( 'Extra Class Name', 'bit14' ),
                'param_name'    =>  'class',
                'description'   =>  __( 'Extra Class Name', 'bit14' ),
            ),

            array(
                'type'          =>  'colorpicker',
                'heading'       =>  __( 'Primary Color', 'bit14' ),
                'param_name'    =>  'primary_color',
                'value'         =>  '#7f7f7f'
            ),

            array(
                'type'          =>  'colorpicker',
                'heading'       =>  __( 'Alternate Color', 'bit14' ),
                'param_name'    =>  'alternate_color',
                'value'         =>  '#ffffff'
            ),

            array(
                'type'          =>  'dropdown',
                'heading'       =>  __( 'Theme', 'bit14' ),
                'param_name'    =>  'theme',
                'description'   =>  __( 'Theme style for your table', 'bit14' ),
                'value'         =>  array(
                    'Theme One'     =>  'theme-one',
                    'Theme Two'     =>  'theme-two',
                    'Theme Three'   =>  'theme-three',
                )
            ),

            array(
                'type'          =>  'dropdown',
                'heading'       =>  __( 'Tables in a row', 'bit14' ),
                'param_name'    =>  'columns',
                'description'   =>  __( 'Number of tables in a row', 'bit14' ),
                'dependency'    =>  array(
                    'element'       =>  'theme',
                    'value'         =>  array( 'theme-one' , 'theme-two' )
                ),
                'value'         => array(
                    "One"   =>  '1',
                    "Two"   =>  '2',
                    "Three" =>  '3',
                    "Four"  =>  '4',
                )
            ),
            array(
                'type'          => 'vc_links',
                'param_name'    => 'notice_2',
                'description'   => __( "For more themes and advance options, check <a href='https://pagebuilderaddons.com/pricing-table-advance/'> Pricing Table (Advance)</a>", 'bit14' ),
            ),
            array(
                "type"          => "vc_links",
                "param_name"    => "bit_caption_url",
                "description"   => __( '<span style="Background: #1688b8;padding: 10px; display: block; color: white;font-weight:600;"><a href="https://pagebuilderaddons.com/plan-and-pricing/" target="_blank" style="color:white;">Get the Pro version for more elements and customization options.</a></span>', 'bit14' ),
            ), 
        ),
    )
);
//new WPBakeryShortCode_Bit14_Pricing_Tables;
//===================
// Child
//===================

