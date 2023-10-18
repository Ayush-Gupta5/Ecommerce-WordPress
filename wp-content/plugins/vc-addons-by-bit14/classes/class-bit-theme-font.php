<?php
/**
 * Created by Bit14.
 * User: Rida Fatima
 * Date: 3/4/2020
 * Time: 9:24 PM
 */

class PBWB_Theme_Fonts extends WPBakeryShortCode {

    function __construct()
    {
        add_filter( 'vc_google_fonts_get_fonts_filter', array( $this,'pbwb_helper_vc_fonts' ) ); 
    }

    function pbwb_helper_vc_fonts( $fonts_list ) {
        
        $inherit = new Vc_Google_Fonts();
        $inherit->font_family = 'Inherit';
        $inherit->font_styles = 'inherit';
        $inherit->font_types = 'inherit';
        array_unshift($fonts_list ,$inherit );
        return $fonts_list;
    }

}

new PBWB_Theme_Fonts;