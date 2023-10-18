if (typeof (jQuery) != 'undefined') {
    
    jQuery.noConflict(); // Reverts '$' variable back to other JS libraries
    
    "use strict";
    var pb_addons = jQuery.noConflict();
    
    pb_addons(document).ready(function($) {
        jQuery('.rtl-checkbox').on('click',function(){
            var checked  = jQuery(this).is(':checked') ;
            var checked = (checked == true) ? 1 : 0;
            jQuery.ajax({
                    type:"post",
                    url : pb_data.ajaxurl,
                    data:{
                        'action' : 'rtl_check', 
                        'security' : pb_data.rtl_nonce,
                        'rtl_check' : checked,
                    },
                    success: function( response ){                                          
                },
            }); 
        });
        jQuery('.fontawesone-checkbox').on('click',function(){
            var checked  = jQuery(this).is(':checked') ;
            var checked = (checked == true) ? 1 : 0;
            jQuery.ajax({
                type:"post",
                url : pb_data.ajaxurl,
                data:{
                    'action' : 'enable_fontawesone', 
                    'security' : pb_data.fontawesome_nonce,
                    'enable_fontawesone' : checked
                },
                success: function( response ){                                          
                },
            }); 
        });
        jQuery('.googlefonts-checkbox').on('click',function(){
            var checked  = jQuery(this).is(':checked') ;
            var checked = (checked == true) ? 1 : 0;
            jQuery.ajax({
                type:"post",
                url : pb_data.ajaxurl,
                data:{
                    'action' : 'enable_googlefonts', 
                    'security' : pb_data.google_nonce,
                    'enable_googlefonts' : checked
                },
                success: function( response ){                                          
                },
            }); 
        });
});

// Declare jQuery Object to $.
$ = jQuery;
}