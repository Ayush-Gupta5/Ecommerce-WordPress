if (typeof(jQuery) != 'undefined') {

    jQuery.noConflict(); // Reverts '$' variable back to other JS libraries

    (function ($) {
        "use strict";



            // Bit14 Tabs Start
            $(document).ready(function(){

                $('.bit-tab-container').each(function ($i) {

                    var verticalPadding = $(this).find(".bit14-tabs").attr('data-vertical-padding');
                    var horizontalPadding = $(this).find(".bit14-tabs").attr('data-horizontal-padding');
                    var labelPadding = verticalPadding + "px " + horizontalPadding + "px";
                    $(this).find(".bit14-tabs li").children('label').css({"padding": labelPadding});

                    var class_name = 'tabsgroup' + $i;
                    $(this).find(".bit14-tabs li").children('input').attr('name', class_name);
                    $(this).find(".bit14-tabs li").first().children('input').attr('checked', 'checked');

                    var theme_class = $(this).attr('set-name');
                    var height = $(this).find('.bit14-tabs').height();
                    if($(window).width() <= 768) {
                        $(this).find('.tab-content').css('margin-top',height+'px');
                        $(this).css('margin','0px 0 '+height+'px');
                    }
                    $(this).children('.bit14-tabs').each(function () {
                        var active_tab_color    = $(this).attr('data-primary-color');
                        var inactive_tab_color  = $(this).attr('data-secondary-color');
                        var tab_font_color      = $(this).attr('data-font-color');

                        $(this).find('.bit-tab-li').css({"color": tab_font_color });

                        $(this).find("li").children('label').css({"background-color": inactive_tab_color});
                        $(this).find("li").first().children('label').css({"background-color": active_tab_color});

                        if( theme_class == 'tab-style-two'){
                            $(this).find("li").first().children('.tab-content').css({"background-color": active_tab_color});
                        }

                    });
                });
                if($(window).width() > 768) {
                    $('.bit14-tabs li .tab-content').each(function () {
                        var max_height = get_height_bit_tab_li().content;
                        $(this).css({"height": max_height});
                    });
                 
                }
                if($(window).width() < 768){
                    $('.bit14-tabs li').each(function(){
                        $(this).click(function(){
                            toggleTAB( $(this).closest('.tab-content') );
                            $(this).closest('.tab-content').hide();
                            $(this).closest('li').siblings('li').each(function(){
                                collapseTAB( $(this).find('.tab-content') );
                            });
                        })
                       
                    })
                }

                $('.bit14-tabs li').click(function() {
                    var active_tab_color = $(this).parent('.bit14-tabs').attr('data-primary-color');
                    var inactive_tab_color = $(this).parent('.bit14-tabs').attr('data-secondary-color');
                    var theme_class = $(this).parent('.bit14-tabs').parent('.bit-tab-container').attr('set-name');
                    $(this).children('label').css('background', active_tab_color);
                    if( theme_class == 'tab-style-two'){
                        $(this).children('.tab-content').css('background', active_tab_color);
                    }
                    $(this).closest('li').siblings('li').each(function () {
                        $(this).children('label').css('background', inactive_tab_color);
                    });
                })
            });


            $(window).resize(function(){
                if($(window).width() > 768) {
                    set_height_bit_tab_ul();
                    $('.bit14-tabs li .tab-content').each(function () {
                        var max_height = get_height_bit_tab_li().content;
                        $(this).css({"height": max_height});
                    });
                }
            });

            function toggleTAB( container ) {
                $(container).find('.tab-content').stop().slideToggle();
            }

            function collapseTAB( container ) {
                $(container).find('.tab-content').stop().slideUp();
            }

            function get_height_bit_tab_li(){

                var heights_content             = [];
                var heights_ul                  = [];

                $('.bit14-tabs li .tab-content').each(function() {
                    var div_height = $(this).outerHeight();
                    heights_content.push(div_height);
                });

                $( '.bit14-tabs' ).each(function() {
                    var div_height = $(this).outerHeight();
                    heights_ul.push(div_height);
                });

                var max_height_content          = Math.max.apply(Math,heights_content);
                var max_height_ul               = Math.max.apply(Math,heights_ul);
                if($(window).width() > 768) {
                    var total_height = max_height_content + max_height_ul;
                } else{
                    var total_height =  max_height_ul;
                }
                var obj                         = {
                    'total'     : total_height,
                    'content'   : max_height_content,
                    'li'        : max_height_ul
                };

                return obj;
            }


            function set_height_bit_tab_ul(){

                var height = get_height_bit_tab_li().total;
                $('.bit14-tabs').parent().css({ "height": height });
            }
            // Bit14 Tabs End



       




    }(jQuery));

}
