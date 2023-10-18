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

        	// heading
            $('.bi14-social-icon').each(function(){
                var theme_style             = $(this).attr('data-theme-style');
                var size                    = $(this).attr('data-size');
                var social_icon             = $(this).find('.social-icon');
                
                social_icon.each(function(){
                    if(size === 'large'){
                        $(this).find('a').css({'width': '60px' ,'height': '60px'});
                        $(this).find('a > span').css('font-size' , '32px');
                    }
                    if(size === 'medium'){
                        $(this).find('a').css({'width': '50px' ,'height': '50px'});
                        $(this).find('a > span').css('font-size' , '28px');
                    }
                    var icon_background_color   = $(this).attr('data-icon-bg-color');
                    var icon_color              = $(this).attr('data-icon-color');
                    $(this).hover(function(){
                        $(this).find('.social-icon-tag').css('visibility' , 'visible');
                    },function(){
                        $(this).find('.social-icon-tag').css('visibility' , 'hidden');
                    })
                    if(theme_style === 'social-icons-theme-one'){
                        $(this).find('a').css({'color' : icon_color, 'background-color' : icon_background_color });
                        if(icon_background_color === ''){
                            $(this).hover(function(){
                                $(this).find('span').css('box-shadow' ,'1px 1px 10px grey');
                            }, function(){
                                $(this).find('span').css('box-shadow' ,'none');
                            })
                        }else{
                            $(this).hover(function(){
                                $(this).find('a').css('box-shadow' ,'1px 1px 10px grey');
                            }, function(){
                                $(this).find('a').css('box-shadow' ,'none');
                            })
                        }
                    }
                    if(theme_style === 'social-icons-theme-two'){
                        $(this).hover(function(){
                            $(this).find('a').css({'color' : icon_color, 'background-color' : icon_background_color});
                            $(this).find('a img').css({'filter' : 'none'});
                        }, function(){
                            $(this).find('a').css({'color' : '#6e6d6d', 'background-color' : '#ccc8c7'});
                            $(this).find('a img').css({'filter' : 'grayscale(100%)'});
                        })
                    }
                    if(theme_style === 'social-icons-theme-three'){
                        // $(this).find('.tag-arrow').css('border-top-color' , )
                        var border_color = lighten_darker_shades(icon_background_color, -40);
                        $(this).find('a').css({'color' : icon_color, 'background-color' : icon_background_color , 'border-bottom' : '3px solid '+border_color+''});
                        $(this).hover(function(){
                            $(this).find('a').css({'color' : '#6e6d6d', 'background-color' : '#ccc8c7' , 'border-bottom' : '3px solid transparent'});
                            $(this).find('a img').css({'filter' : 'grayscale(100%)'});
                        }, function(){
                            $(this).find('a').css({'color' : icon_color, 'background-color' : icon_background_color, 'border-bottom' : '3px solid '+border_color+''});
                            $(this).find('a img').css({'filter' : 'none'})
                        })  
                    }
                    if(theme_style === 'social-icons-theme-four'){
                        $(this).find('a').css({'color' : icon_color, 'background-color' : icon_background_color });
                        $(this).hover(function(){
                            $(this).find('a').css({'color' : icon_background_color, 'background-color' : icon_color , 'border' : '2px solid '+icon_background_color+''});
                        }, function(){
                            $(this).find('a').css({'color' : icon_color, 'background-color' : icon_background_color, 'border' : '5px double #ffffff'});
                        })  
                    }
                });
            });

            
        });
    }(jQuery));

}
    