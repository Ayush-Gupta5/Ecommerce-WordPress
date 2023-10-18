if (typeof(jQuery) != 'undefined') {

    jQuery.noConflict(); // Reverts '$' variable back to other JS libraries

    (function($) {
        "use strict";

        $(function() {
            if ($().slick != undefined) {
                
                if ($('.bit14-slider-pro').length > 0) {
                    
                   
                    var slider = $('.bit14-slider-pro');
                    function rtl_slick(){
                        if ($('body').hasClass("bit14-rtl-content")) {
                           return true;
                        } else {
                           return false;
                        }
                    }
                    slider.each(function() {
                        var elem = $(this);
                        var arrows = elem.data('arrows') ? true : false;
                        var adaptive_height = elem.data('adaptive-height') ? true : false;
                        var dots = elem.data('dots') ? true : false;
                        var autoplay = elem.data('autoplay') ? true : false;
                        var autoplay_speed = elem.data('autoplay-speed') || 3000;
                        var fade = elem.data('fade') ? true : false;
                        var pause_on_hover = elem.data('pause-onhover') ? true : false;
                        var display_columns = elem.data('display-columns') || 3;
                        var scroll_columns = elem.data('scroll-columns') || 3;
                        var tablet_display_columns = elem.data('tablet-display-columns') || 2;
                        var tablet_scroll_columns = elem.data('tablet-scroll-columns') || 2;
                        var mobile_display_columns = elem.data('mobile-display-columns') || 1;
                        var mobile_scroll_columns = elem.data('mobile-scroll-columns') || 1;

                        var thumbs = $(elem).siblings('.bit14-thumbnail');

                        var bitElement = $(elem).hasClass('bit-team');
                        if(bitElement == true){
                            elem.slick({
                                rtl:rtl_slick(),
                                cssEase: 'linear',
                                arrows: arrows,
                                dots: dots,
                                infinite: true,
                                autoplay: autoplay,
                                adaptiveHeight: adaptive_height,
                                autoplaySpeed: autoplay_speed,
                                fade: fade,
                                pauseOnHover: pause_on_hover,
                                slidesToShow: display_columns,
                                slidesToScroll: scroll_columns,
                                responsive: [{
                                    breakpoint: 700,
                                    settings: {
                                        slidesToShow: tablet_display_columns,
                                        slidesToScroll: tablet_scroll_columns
                                    }
                                },
                                    {
                                        breakpoint: 480,
                                        settings: {
                                            slidesToShow: mobile_display_columns,
                                            slidesToScroll: mobile_scroll_columns
                                        }
                                    }
                                ]

                            });
                        } else{
                            elem.slick({
                                rtl:rtl_slick(),
                                cssEase: 'linear',
                                arrows: arrows,
                                dots: dots,
                                infinite: true,
                                autoplay: autoplay,
                                adaptiveHeight: adaptive_height,
                                autoplaySpeed: autoplay_speed,
                                fade: fade,
                                pauseOnHover: pause_on_hover,
                                asNavFor: thumbs,
                                slidesToShow: display_columns,
                                slidesToScroll: 1,
                                responsive: [{
                                    breakpoint: 700,
                                    settings: {
                                        slidesToShow: tablet_display_columns,
                                        slidesToScroll: 1
                                    }
                                },
                                    {
                                        breakpoint: 480,
                                        settings: {
                                            slidesToShow: mobile_display_columns,
                                            slidesToScroll: 1
                                        }
                                    }
                                ]

                            });
                        }

                        if ($(thumbs).length > 0) {

                            if ($(thumbs).find('.testimonial-author-image').length >= 9) {
                                var desktopSlides = 9
                            } else {
                                var desktopSlides = $(thumbs).find('.testimonial-author-image').length - 1
                            }
                            if ($(thumbs).find('.testimonial-author-image').length >= 5) {
                                var tabletSlides = 5
                            } else {
                                var tabletSlides = $(thumbs).find('.testimonial-author-image').length - 1
                            }
                            if ($(thumbs).find('.testimonial-author-image').length >= 3) {
                                var mobileSlides = 3
                            } else {
                                var mobileSlides = $(thumbs).find('.testimonial-author-image').length - 1
                            }


                            $(thumbs).slick({
                                rtl:rtl_slick(),
                                cssEase: 'linear',
                                asNavFor: elem,
                                slidesToShow: desktopSlides,
                                focusOnSelect: true,
                                arrows: false,
                                dots: false,
                                autoplay: false,
                                centerMode: true,
                                responsive: [{
                                        breakpoint: 800,
                                        settings: {
                                            slidesToShow: tabletSlides,
                                        }
                                    },
                                    {
                                        breakpoint: 480,
                                        settings: {
                                            slidesToShow: mobileSlides,
                                        }
                                    }
                                ]
                            });
                            $(thumbs).find('.testimonial-author-image').each(function(){
                                var width = $(this).width();
                                $(this).css({ "height": width });
                            })
                            $(window).resize(function(){
                                $(thumbs).find('.testimonial-author-image').each(function(){
                                    var width = $(this).width();
                                    $(this).css({ "height": width });
                                })
                            });
                            $(thumbs).on('init' , function(){
                                $(window).on('resize' , function(){
                                    $(thumbs).each(function(){
                                        var qty = $(this).find('.slick-active').length;
                                        $(this).width(qty * 100);
                                    })
                                }).trigger('resize');
                            });
                        }
                    });
                }
                if( $('.bit14-slider').length > 0 ){

                    var slider = $('.bit14-slider');

                    slider.each(function(){

                        var elem = $(this);
                        var arrows = elem.data('arrows') ? true : false;
                        var adaptive_height = elem.data('adaptive-height') ? true : false;
                        var dots = elem.data('dots') ? true : false;
                        var autoplay = elem.data('autoplay') ? true : false;
                        var autoplay_speed = elem.data('autoplay-speed') || 3000;
                        var fade = elem.data('fade') ? true : false;
                        var pause_on_hover = elem.data('pause-onhover') ? true : false;
                        var display_columns = elem.data('display-columns') || 3;
                        var scroll_columns = elem.data('scroll-columns') || 3;
                        var tablet_display_columns = elem.data('tablet-display-columns') || 2;
                        var tablet_scroll_columns = elem.data('tablet-scroll-columns') || 2;
                        var mobile_display_columns = elem.data('mobile-display-columns') || 1;
                        var mobile_scroll_columns = elem.data('mobile-scroll-columns') || 1;

                        elem.slick({
                            arrows: arrows,
                            dots: dots,
                            infinite: true,
                            autoplay: autoplay,
                            adaptiveHeight: adaptive_height,
                            autoplaySpeed: autoplay_speed,
                            fade: fade,
                            rtl:rtl_slick(),
                            cssEase: 'linear',
                            pauseOnHover: pause_on_hover,
                            slidesToShow: display_columns,
                            slidesToScroll: scroll_columns,
                            responsive: [
                                {
                                    breakpoint: 800,
                                    settings: {
                                        slidesToShow: tablet_display_columns,
                                        slidesToScroll: tablet_scroll_columns
                                    }
                                },
                                {
                                    breakpoint: 480,
                                    settings: {
                                        slidesToShow: mobile_display_columns,
                                        slidesToScroll: mobile_scroll_columns
                                    }
                                }
                                // You can unslick at a given breakpoint now by adding:
                                // settings: "unslick"
                                // instead of a settings object
                            ]

                        });
                    });
                }
            }

            function initMasonaryBitTestimonialsPro(){
                if ($('.testimonial-style-three-pro .bit-testimonial').length > 0) {
                    $('.testimonial-style-three-pro .testimonial').masonry({
                        itemSelector: '.bit-testimonial',
                    });
                }
                if ($('.testimonial-style-one-pro .testimonial').length > 0) {
                    $('.testimonial-style-one-pro .testimonial').masonry({
                        itemSelector: '.bit-testimonial',
                    });
                }
            }
            
        });
    }(jQuery));

}
    