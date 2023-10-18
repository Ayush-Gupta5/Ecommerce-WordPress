if (typeof(jQuery) != 'undefined') {

    jQuery.noConflict(); // Reverts '$' variable back to other JS libraries

    (function($) {
        "use strict";
       $(function() {
           $('.bit-banner-container .bit-banner').each(function(){
                var btn_bgcolor = $(this).data('btn-bgcolor');
                $(this).css('background-color',btn_bgcolor)
                
                $(this).find('.bit-col-wrapper .btn a').on({
                    mouseenter: function() {
                       $(this).css('background-color',btn_bgcolor);
                    },
                    mouseleave: function() {
                       $(this).css('background-color','');
                    }
                });

           });
       });
        

    }(jQuery));

}
