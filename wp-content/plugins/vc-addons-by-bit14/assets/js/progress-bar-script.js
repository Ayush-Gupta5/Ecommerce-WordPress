if (typeof (jQuery) != 'undefined') {

    jQuery.noConflict(); // Reverts '$' variable back to other JS libraries

    (function ($) {
        "use strict";

        $(function () {

            var progressbar = $( ".bit-progress-bar .progressbar" );

            progressbar.progressbar(); 

            $(progressbar).each(function(){

                var $pVal = $(this).children('.ui-progressbar-value');
                var countr_value = $(this).attr('data-counter');
                var bar_bg_color = $(this).attr('data-bar-bg');

                $($pVal).css("background-color",bar_bg_color );

                var $this = $(this);
                var count = 0;
                var innterval = setInterval(function() {
                    if (count == countr_value-1){
                      clearInterval(innterval);
                    }
                    count++;
                    $($this).parent('.bit-progress-bar').find('.progressbar-counter-wrap .progress-label').text( count + "%" );
                });

                $pVal.animate({width: countr_value + '%'},4000);
                if($('body').hasClass('bit14-rtl-content')){
                    $($this).parent('.bit-progress-bar').find('.progressbar-counter-wrap .progress-label').animate({"right":countr_value + '%'},3000);
                }else{
                    $($this).parent('.bit-progress-bar').find('.progressbar-counter-wrap .progress-label').animate({"left":countr_value + '%'},3000);
                }

            });

        });




    }(jQuery));
}
