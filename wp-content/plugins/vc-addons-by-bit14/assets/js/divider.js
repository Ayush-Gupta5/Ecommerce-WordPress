if (typeof(jQuery) != 'undefined') {

    jQuery.noConflict(); // Reverts '$' variable back to other JS libraries

    (function($) {
        "use strict";

        $(function() {

            // Accordion 
            $('.bit14-divider').each(function(){
            
                var theme_style             = $(this).attr('data-theme-style'),
                    divider_type            = $(this).attr('data-divider-type'),
                    alignment               = $(this).attr('data-alignment'),
                    width                   = $(this).attr('data-width'),
                    divider_color           = $(this).attr('data-divider-color'),
                    icon_color              = $(this).attr('data-icon-color'),
                    divider_type_three      = $(this).attr('data-divider-type-three');

                $(this).css({
                    'text-align' : alignment
                });
                if(theme_style === 'video-style-one'){
                    $(this).find('.divider').css({
                        'width' : width+'%',
                    });
                }
                $(this).find('span').css({
                    'border-top-color' : divider_color,
                });
                if(theme_style === 'video-style-one' && divider_type === 'dashed-line-divider'){
                    $(this).find('span').css({
                        'border-top-style' : 'dashed',
                    });
                }
                if(theme_style === 'video-style-two'){
                    $(this).find('.icon-div').css({
                        'color' : icon_color,
                        'background-color' : divider_color,
                    });
                    if(alignment === 'center'){
                        $(this).find('span').css({
                            'width' : '35%',
                        }); 
                    }
                }
                if(theme_style === 'video-style-three'){
                    if(divider_type_three === 'dotted'){
                        $(this).find('span').css({
                            'border-top-style': 'dotted',
                            'border-top-width': '12px'
                        }); 
                    }
                    if(divider_type_three === 'dashed'){
                        $(this).find('span').css({
                            'border-top-style': 'dashed'
                        }); 
                    }
                    if(alignment === 'center'){
                        $(this).find('span').css({
                            'width' : '30%',
                        }); 
                    }
                }
            })
    });
    }(jQuery));

}
