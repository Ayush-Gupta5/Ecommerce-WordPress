if (typeof(jQuery) != 'undefined') {

    jQuery.noConflict(); // Reverts '$' variable back to other JS libraries

    (function($) {
        "use strict";

        $(function() {

            // Iconic List
            $(document).ready(function() {
                $(".bit-iconic-list-item").each(function(){

                    var icon_selector = $('.bit-iconic-list-inner span');
                    var get_animation = $(this).find(icon_selector).attr('data-animation');



                    $(this).on({
                        mouseenter: function() {
                            
                            var hover_color = $(this).attr('data-hover-color');
                            var hover_text_color = $(this).attr('data-hover-text-color');
                            var hover_icon_color = $(this).attr('data-hover-icon-color');

                            $(this).find(icon_selector).addClass(get_animation + ' animated');

                            $(this).css({
                                "background-color": hover_color,
                                "color": hover_text_color
                            });
                            $(this).find('.bit-iconic-list-inner .bit-iconic-list-content h4, .bit-iconic-list-inner .bit-iconic-list-content p').css({
                                "color": hover_text_color
                            });
                            $(this).find('.bit-iconic-list-inner .icon').css({
                                "color": hover_icon_color
                            });
                        },
                        mouseleave: function() {
                            $(this).find(icon_selector).removeClass(get_animation + ' animated');
                            var bg_color = $(this).attr('data-bg-color');
                            var text_color = $(this).attr('data-text-color');
                            $(this).css({
                                "background-color": bg_color,
                                "color": text_color
                            });

                            $(this).find('.bit-iconic-list-inner .bit-iconic-list-content h4, .bit-iconic-list-inner .icon, .bit-iconic-list-inner .bit-iconic-list-content p').css({
                                "color": text_color
                            });
                        }
                    });
                    var bg_color = $(this).attr('data-bg-color');
                    var text_color = $(this).attr('data-text-color');
                    $(this).css({
                        "background-color": bg_color,
                        "color": text_color
                    });
                    $(this).find('.bit-iconic-list-inner .bit-iconic-list-content h4, .bit-iconic-list-inner .bit-iconic-list-content p').css({
                        "color": text_color
                    });
                });
    /*
                $(".vertical").each(function(){
                    bitIconicDivHeightPro($(this).find(' .bit-iconic-list .bit-iconic-list-item'));
                });*/
            });

         /*   $(window).on('resize' , function(){
                $(".vertical").each(function(){
                    bitIconicDivHeightPro($(this).find(' .bit-iconic-list .bit-iconic-list-item'));
                });
            }).trigger('resize');*/

            function bitIconicDivHeightPro($container){

                var maxHeight = 0;
                $($container).each(function(){
                    if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
                });
                $($container).height(maxHeight);
            }
            
        });
    }(jQuery));

}
                