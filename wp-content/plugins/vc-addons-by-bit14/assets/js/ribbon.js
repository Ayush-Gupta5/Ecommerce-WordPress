if (typeof(jQuery) != 'undefined') {

    jQuery.noConflict(); // Reverts '$' variable back to other JS libraries

    (function($) {
        "use strict";

        $(function() {
        	function lighten_darker_shades(col, amt) {
  
                var usePound = false;
                if (col[0] == "#") {
                    col = col.slice(1);
                    usePound = true;
                }
                var num = parseInt(col,16);
                var r = (num >> 16) + amt;

                if (r > 255) r = 255;
                else if  (r < 0) r = 0;

                var b = ((num >> 8) & 0x00FF) + amt;
             
                if (b > 255) b = 255;
                else if  (b < 0) b = 0;
             
                var g = (num & 0x0000FF) + amt;
             
                if (g > 255) g = 255;
                else if (g < 0) g = 0;

                return (usePound?"#":"") + (g | (b << 8) | (r << 16)).toString(16);
              
            }
        	
            $('.bi14-ribbon').each(function(){
                var theme_style                 = $(this).attr('data-theme-style');
                var variation                   = $(this).attr('data-theme-variation');
                var ribbon_background_color     = $(this).attr('data-ribbon-background-color');
                var ribbon_background_image     = $(this).attr('data-ribbon-background-image');
                var ribbon_text_color           = $(this).attr('data-ribbon-text-color');
                
                if(theme_style === 'ribbon-theme-four' && variation === 'ribbon-t4-variation-one' || variation === 'ribbon-t4-variation-three'){
                    if(ribbon_background_image !== ''){
                        $(this).find('.ribbon').css({'background-image' : 'url('+ribbon_background_image+')', 'background-repeat' : 'no-repeat','background-size' : 'cover' });
                    }
                }else{
                    $(this).find('.ribbon').css({'background-color' : ribbon_background_color , 'color' : ribbon_text_color});
                }
                $(this).find('.ribbon h3').css('color' , ribbon_text_color);
                $(this).find('.ribbon p').css('color' , ribbon_text_color);
                if(theme_style === 'ribbon-theme-one' && variation === 'ribbon-t1-variation-one'){
                    $(this).find('.ribbon-border').css('border-top',' 19px solid '+ribbon_background_color+'')
                }
                if(theme_style === 'ribbon-theme-one' && variation === 'ribbon-t1-variation-two' || theme_style === 'ribbon-theme-two' && variation === 'ribbon-t2-variation-two'){
                    $(this).find('.ribbon-border').css({
                        'border-right':' 40px solid '+ribbon_background_color+'',
                        'border-left':' 40px solid '+ribbon_background_color+''
                    })
                }
                if(theme_style === 'ribbon-theme-one' && variation === 'ribbon-t1-variation-three'){
                    $(this).find('.ribbon-style-left , .ribbon-style-right').css('border-top',' 9px  solid '+lighten_darker_shades(ribbon_background_color , -50)+'');
                    
                    $(this).find('.ribbon-border').css({
                        'border-top':' 32px solid '+ribbon_background_color+'',
                        'border-bottom':' 32px solid '+ribbon_background_color+''
                    })
                }
                if(theme_style === 'ribbon-theme-one' && variation === 'ribbon-t1-variation-four'){
                    
                    $(this).find(' .ribbon-style-left').css('background',lighten_darker_shades(ribbon_background_color , -50));
                    
                    $(this).find('.ribbon-border').css({
                        'border-top':' 25px solid '+ribbon_background_color+'',
                        'border-bottom':' 25px solid '+ribbon_background_color+''
                    })
                }
                if(theme_style === 'ribbon-theme-one' && variation === 'ribbon-t1-variation-one' || variation === 'ribbon-t1-variation-two'){
                    $(this).find('.ribbon-style-left , .ribbon-style-right').css('border-bottom',' 14px  solid '+lighten_darker_shades(ribbon_background_color , -50)+'')
                }

                if(theme_style === 'ribbon-theme-three' && variation === 'ribbon-t3-variation-one'){
                    $(this).find('.ribbon-style-left , .ribbon-style-right').css('border-top',' 12px  solid '+lighten_darker_shades(ribbon_background_color , -50)+'');
                }
                if(theme_style === 'ribbon-theme-three' && variation === 'ribbon-t3-variation-two' || variation === 'ribbon-t3-variation-three'){
                    $(this).find('.ribbon-style-left , .ribbon-style-right').css('border-top',' 9px  solid '+lighten_darker_shades(ribbon_background_color , -50)+'');
                }
                if(theme_style === 'ribbon-theme-four' && variation === 'ribbon-t4-variation-one'){
                    $(this).find('.ribbon-style-left , .ribbon-style-right').css('border-top',' 12px  solid '+lighten_darker_shades(ribbon_background_color , -50)+'');
                }
                if(theme_style === 'ribbon-theme-two' && variation === 'ribbon-t2-variation-one'){
                    $(this).find('.ribbon-style-left , .ribbon-style-right').css('border-top',' 7px  solid '+ribbon_background_color+'');
                    $(this).find('.ribbon').css('border-bottom',' 4px  solid '+lighten_darker_shades(ribbon_background_color , -50)+'');
                }
                if(theme_style === 'ribbon-theme-two' && variation === 'ribbon-t2-variation-two' ||  variation === 'ribbon-t2-variation-five'){
                    $(this).find('.ribbon').css('border','4px solid'+lighten_darker_shades(ribbon_background_color , -50)+'');
                }
                if(theme_style === 'ribbon-theme-two' && variation === 'ribbon-t2-variation-four'){
                    $(this).find('.ribbon-style-left , .ribbon-style-right').css({'border-top':' 32px  solid '+ribbon_background_color +'' , 'border-bottom':' 32px  solid '+ribbon_background_color +''});

                }
            })
            
        });
    }(jQuery));

}
    