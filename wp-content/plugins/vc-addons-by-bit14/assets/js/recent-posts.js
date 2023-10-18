if (typeof(jQuery) != 'undefined') {

    jQuery.noConflict(); // Reverts '$' variable back to other JS libraries

    (function($) {
        "use strict";

        $(function() {

            $(document).ready(function(){

                $('.bit-recent-posts-container').each(function(){
                    if ( $(this).children('.row').hasClass('post-grid-style-one') ) {
                        $(this).find('.bit-recent-posts-thumbnail img').each(function(){
                            $(this).height( $(this).width() );
                        })
                    } else {
                        $(this).find('.bit-recent-posts-thumbnail img').each(function(){
                            $(this).height( $(this).width() - ($(this).width() * (35/100)) );
                        })
                    }
                })

                $('.bit-recent-posts-container').each(function(){
                    var primary_color = $(this).attr('data-primary-color');
                    var secondary_color = $(this).attr('data-secondary-color');

                    var pagination_hover_bg = $(this).attr('data-pagination-hover-bg');
                    var pagination_hover_color = $(this).attr('data-pagination-hover-color');
                    var pagination_color = $(this).css("color");

                    if($(this).find('.bit-recent-posts-pagination').hasClass('post_pagination-style-one')){
                        var prevNext = '.bit-recent-posts-pagination .bit-recent-posts-pagination-wrap .page-numbers';
                        $(this).find('.bit-recent-posts-pagination .bit-recent-posts-pagination-wrap').css({'background-color': primary_color});
                    }

                    $(this).find(prevNext).each(function(){
                        if($(this).hasClass('current')){
                            $(this).css({'background-color':pagination_hover_bg});
                            $(this).css({'color':pagination_hover_color});
                        } else {
                            $(this).css({'background-color': 'transparent'});
                            $(this).css({'color':pagination_color});
                        }
                        $(this).hover(function(){
                            $(this).css({'background-color':pagination_hover_bg});
                            $(this).css({'color':pagination_hover_color});
                        }).mouseout(function(){
                            if($(this).hasClass('current')){
                                $(this).css({'background-color':pagination_hover_bg});
                                $(this).css({'color':pagination_hover_color});
                            } else {
                                $(this).css({'background-color': 'transparent'});
                                $(this).css({'color':pagination_color});
                            }
                        })
                    });

                    if ( $(this).children('.row').hasClass('post-grid-style-one') ) {
                        $(this).find('.bit-recent-posts-content-container').css({'color':primary_color});
                        $(this).find('.bit-recent-posts-thumbnail a:after').css({'background-color':secondary_color});
                    }else if ( $(this).children('.row').hasClass('post-grid-style-two') ) {
                        $(this).find('.bit-recent-posts-content-container').css({'color':primary_color});
                        $(this).find('.bit-recent-posts-meta-read-more-button').css({'color':primary_color , 'background-color':secondary_color});
                    }
                })
            })
        });
    }(jQuery));

}
    
            