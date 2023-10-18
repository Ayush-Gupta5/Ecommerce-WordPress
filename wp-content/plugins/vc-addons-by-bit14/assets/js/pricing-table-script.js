if (typeof(jQuery) != 'undefined') {

    jQuery.noConflict(); // Reverts '$' variable back to other JS libraries

    (function($) {
        "use strict";

        $(function() {


        $(document).ready(function() {
            function hexToRgbAPro(hex , opacity){
                var c;
                if(/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)){
                    c= hex.substring(1).split('');
                    if(c.length== 3){
                        c= [c[0], c[0], c[1], c[1], c[2], c[2]];
                    }
                    c= '0x'+c.join('');
                    return 'rgba('+[(c>>16)&255, (c>>8)&255, c&255].join(',')+','+ opacity +')';
                }
                throw new Error('Bad Hex');
            }
            $('.bit_table_group').each(function() {
                var tableGroup  = $(this).closest( '.bit_table_group' );
                var columns     = 'pb-col-md-' + $(this).attr('data-columns') + ' pb-col-sm-12 pb-col-xs-12';

                $(this).find('.bit_table').each(function() {
                    $(this).addClass(columns);

                    var primary_color = $(tableGroup).attr('data-primary-color');
                    var alternative_color = $(tableGroup).attr('data-alternate-color');

                    $(this).find('.bit_pricing_table_list').css('border-color' , hexToRgbAPro(primary_color , 0.2));
                    $(this).find('h2').css('color' , primary_color);
                    $(this).find('.price').css('color' , primary_color);
                    $(this).children('div').css({'border-color' :hexToRgbAPro(primary_color , 0.2) , 'background-color': alternative_color});

                    if( tableGroup.hasClass('theme-one') || tableGroup.hasClass('theme-three') ){
                        $(this).find('.pricing_table_list_button a').css({'background-color':primary_color , 'color':alternative_color});

                    }
                    if( tableGroup.hasClass('theme-two') ){
                        $(this).find('.pricing_table_list_button a').css({'border-color':primary_color , 'color':primary_color});
                    }
                    if( tableGroup.hasClass('theme-three') ){
                        $(this).find('h2').css({'background-color':hexToRgbAPro(primary_color , 0.3)});
                    }
                    if( tableGroup.hasClass('theme-one') || tableGroup.hasClass('theme-two') ){
                        $(this).find('.is_featured ').each(function(){
                            $(this).css({'background-color': primary_color , 'color': alternative_color});
                            $(this).find('h2').css('color' , alternative_color);
                            $(this).find('.price').css('color' , alternative_color);
                            $(this).find('.bit_pricing_table_list').css('border-color' , hexToRgbAPro(alternative_color , 1));
                            $(this).find('.pricing_table_list_button a').css({'background-color':alternative_color , 'color':primary_color})
                        });
                    }



                })

            });
        });


    });
    }(jQuery));

}
    