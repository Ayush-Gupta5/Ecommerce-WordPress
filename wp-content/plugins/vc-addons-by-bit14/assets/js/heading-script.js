if (typeof(jQuery) != 'undefined') {

    jQuery.noConflict(); // Reverts '$' variable back to other JS libraries

    (function($) {
        "use strict";

        $(function() {
        	
        	// heading
            $('.bit-pb-heading').each(function(){
                var heading_position = $(this).attr('data-heading-position');
                var icon_position    = $(this).attr('data-icon-position');
                var border_color     = $(this).attr('data-border-color');
                var icon_color       = $(this).attr('data-icon-color');
                var heading_color    = $(this).attr('data-heading-color');
                var heading_tags     = $(this).attr('data-heading-tags');
                var background_color = $(this).attr('data-background-color');

                $(this).css('text-align',heading_position );
                $(this).find(''+heading_tags+'').css({ 'color': heading_color, 'background-color': background_color});
                $(this).find(''+heading_tags+'.top-bordered').css({'border-top':'3px solid ' + border_color, 'padding-top' : '30px'});
                if($(this).find(''+heading_tags+'').hasClass('top-bordered') || $(this).find(''+heading_tags+'').hasClass('border_bottom_icon') || $(this).find(''+heading_tags+'').hasClass('border_top_icon')){
                    $(this).parent().css({'text-align':heading_position});
                }
                $(this).find(''+heading_tags+'.bottom-bordered').css({'border-bottom':'3px solid ' + border_color, 'padding-bottom' : '15px'});
                $(this).find('span').find('i').css({'text-align':icon_position, 'color': icon_color});
            });

            
        });
    }(jQuery));

}
    