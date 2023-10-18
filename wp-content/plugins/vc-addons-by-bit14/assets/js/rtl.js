if (typeof (jQuery) != 'undefined') {

    jQuery.noConflict(); // Reverts '$' variable back to other JS libraries

    (function ($) {
        "use strict";
        var progressbar = $( ".bit-progress-bar .progressbar" );
        $(progressbar).each(function(){
            $(this).parent('.bit-progress-bar').find('.progressbar-counter-wrap .progress-label').css({'right': count + "%" , 'left' : '0' } );
        })
    }(jQuery));
}
