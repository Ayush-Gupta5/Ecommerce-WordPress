<?php 


class PBWB_bit14_helper {
    //********************************//
    // GOOGLE FONTS PRIVATE FUNCTIONS // 
    //********************************//
     
    // Build the string of values in an Array
    static function pbwb_getFontsData( $fontsString ) {   
     
        // Font data Extraction
        $googleFontsParam = new Vc_Google_Fonts();      
        $fieldSettings = array();
        $fontsData = strlen( $fontsString ) > 0 ? $googleFontsParam->_vc_google_fonts_parse_attributes( $fieldSettings, $fontsString ) : '';
        return $fontsData;
         
    }
     
    // Build the inline style starting from the data
    static function pbwb_googleFontsStyles( $fontsData ) {
         
        // Inline styles
        $styles         = array();
        if(!empty($fontsData) && is_array($fontsData)){

            $fontFamily = explode( ':', $fontsData['values']['font_family'] );
            $styles[] = 'font-family:' . $fontFamily[0] . ' !important';
            $fontStyles = explode( ':', $fontsData['values']['font_style'] );
            $fontStyles[1] = (!isset($fontStyles[1])) ?  $fontStyles[1] = null : $fontStyles[1] ;
            $fontStyles[2] = (!isset($fontStyles[2])) ?  $fontStyles[2] = null : $fontStyles[2] ;
            $styles[] = 'font-weight:' . $fontStyles[1] . ' !important';
            $styles[] = 'font-style:' . $fontStyles[2] . ' !important';
        }
         
        $inline_style = '';     
        foreach( $styles as $attribute ){           
            $inline_style .= $attribute.'; ';       
        }   
         
        return $inline_style;
         
    }
     
    // Enqueue right google font from Googleapis
    static function pbwb_enqueueGoogleFonts( $fontsData ) {
         
        // Get extra subsets for settings (latin/cyrillic/etc)
        $settings = get_option( 'wpb_js_google_fonts_subsets' );
        if ( is_array( $settings ) && ! empty( $settings ) ) {
            $subsets = '&subset=' . implode( ',', $settings );
        } else {
            $subsets = '';
        }
         
        // We also need to enqueue font from googleapis
        if ( isset( $fontsData['values']['font_family'] ) ) {
            wp_enqueue_style( 
                'vc_google_fonts_' . vc_build_safe_css_class( esc_url($fontsData['values']['font_family']) ), 
                '//fonts.googleapis.com/css?family=' . esc_url($fontsData['values']['font_family']) . $subsets
            );
        }
         
    }
}

 ?>