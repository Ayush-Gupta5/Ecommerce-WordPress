if (typeof(jQuery) != 'undefined') {

    jQuery.noConflict(); // Reverts '$' variable back to other JS libraries

    (function($) {
        "use strict";

        // Counters
        animateCounterPro();
        //bitCounterDivHeightPro($('.bit-counters-list-pro').find('.counter-item-pro'));
        $(window).scroll(function() {
            animateCounterPro();
        });
        $(window).on('resize', function() {
            //bitCounterDivHeightPro($('.bit-counters-list-pro').find('.counter-item-pro'));
        });
        function bitCounterDivHeightPro($container){
            var maxHeight = 0;
            $($container).each(function(){
                if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
            });
            $($container).height(maxHeight);
        }
        function animateCounterPro() {

            $('.bit-counters-list-pro').each(function() {

                
               
                var textColor = $(this).find('.counter-item-pro').attr('data-text-color');
                
                var isPerc    = $(this).find('.counter-item-pro').attr('data-is-percentage');
                isPerc        = ( isPerc == 'yes') ? '%' : '';
                
                var counterOffsetBottom = $(this).offset().top + $(this).find('.counter-item-pro').height();
                var windowHeight = $(window).height();
                var scrollAmount = $(window).scrollTop();

                 $(this).find('.counter-item-pro').each(function() {

                    var iconColor = $(this).attr('data-icon-color');
                    $(this).find(' span.counter-item-icon-pro i').css({'color': iconColor});
                    if ($(this).parent('.counter-pro').hasClass('theme-3')) {
                        if($('body').hasClass('bit14-rtl-content')){
                            $(this).find('.counter-border').css({'border-right':'3px solid' + iconColor});
                        }else{
                            $(this).find('.counter-border').css({'border-left':'3px solid' + iconColor});
                        }
                    }
                    var descriptionColor = $(this).attr('data-description-color');
                    var titleColor = $(this).attr('data-title-color');
                    $(this).find(' .counter-item-title-pro').css({'color':titleColor});
                    $(this).find(' .counter-item-description-pro').css({'color':descriptionColor});
                    $(this).find(' span.counter-item-icon-pro.is-circle-border i').css({'border':'1px solid' + titleColor});

                    if ($(this).parent('.counter-pro').hasClass('theme-2')) {
                        $(this).find('.counter-border').css({'border':'1px solid' + titleColor});
                    }
                    $(this).find('.percent-container-pro svg text   ').css('fill',textColor);

                 })

                if (scrollAmount > (counterOffsetBottom - windowHeight)) {

                    if ($(this).find('.counter-item-pro').length > 0) {

                        $(this).find('.counter-item-pro').each(function() {
                            $(this).find('.tobe-pro').removeClass('tobe-pro');
                        });

                        $(this).find('.counter-item-number-pro.count-pro').each(function() {
                            var $this = $(this),
                              countTo = $this.attr('data-counter-value');
                              var size = countTo.split(".")[1] ? countTo.split(".")[1].length : 0;

                              $(this).prop('Counter', 0).animate({
                                Counter: countTo
                                },
                                {
                                  duration: 5000,
                                  easing: 'swing',
                                  step: function(func) {
                                    $(this).text(parseFloat(func).toFixed(size) + isPerc);
                                  }

                                });
                        });
                        $(this).find('.counter-item-number-pro').removeClass('count-pro').addClass('counted-pro');

                    }
                }
                
            })
            $('.counter-item-pro').each(function() {
                var desktop_num_slides = $(this).attr('data-desktop-num-slides');

                if(desktop_num_slides == 1){
                    $(this).find('#svg').each(function(){
                        $(this).css('width','50%');
                    })
                }
            })
        }

    }(jQuery));

}