jQuery(document).ready(function ($) {

    //Close btn to sow and hide notification bar
    $(".close-btn").click(function(){
        $(".notification-wrap").slideToggle();
        });
    $('.secondary-menu .close').click(function () {
        $('.menu-secondary-container').animate({
            width: 'toggle',
        });
    });

    //sumbenutoggle
    $('<button class="angle-down"> </button>').insertAfter($('.secondary-menu ul .menu-item-has-children > a'));
    $('.secondary-menu  ul li .angle-down').click(function () {
        $(this).next().slideToggle();
        $(this).toggleClass('active');
    });
    //Header search
    $('.header-search .search').click(function () {
        $(".header-search-inner").slideToggle();
        return false;
    });
    $('.header-search-inner').click(function(event) {
        event.stopPropagation();
    }); 

    if (esp_data.rtl == '1') {
        rtl = true;
    } else {
        rtl = false;
    }

    $('.new-arrivals__wrap').owlCarousel({
        rtl: rtl,
        loop: false,
        nav: false,
        margin: 30,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            575: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                margin: 50,
                items: 4
            }
        }
    });

    $('.mobile-header .toggle-main').on('click', function(){
        $('.mobile-header .menu-container-wrapper').addClass('open');
        $('body').addClass('site-toggled');
    });
    $('.mobile-header .toggle-off').on('click', function () {
        $('.mobile-header .menu-container-wrapper').removeClass('open');
        $('body').removeClass('site-toggled');
    });
    $(document).on('click', 'body', function (e) {
        if ($(e.target).is('.site-toggled')){
            $('.mobile-header .menu-container-wrapper').removeClass('open');
            $('body').removeClass('site-toggled');
        }
    });
    //mobile-menu inserting the dropdown icon
    $('<button class="angle-down"> </button>').insertAfter($(".mobile-header ul .menu-item-has-children > a"));
    $('.mobile-header ul li .angle-down').on('click', function () {
        $(this).next().slideToggle();
        $(this).toggleClass('active');
    });

    //scroll to top
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 300) {
            $('#esp-top').fadeIn();
        } else {
            $('#esp-top').fadeOut();
        }
    });

    $("#esp-top").on('click', function () {
        $('html,body').animate({
            scrollTop: 0
        }, 100);
    });

    //isotope
    $('.filter-button-group').on( 'click', 'li', function() {
        var filterValue = $(this).attr('data-filter');
        $('.grid').isotope({ filter: filterValue });
        $('.filter-button-group li').removeClass('active');
        $(this).addClass('active');
    });

    // Tabs section 
    $('body').on('click', '.tab-btn-wrap button', function () {
        var $this = $(this);
        var id = $this.data("id");
        if (!$('.tab-btn-wrap button').hasClass('ajax-process')) {
            if (!$this.hasClass('ajax')) {
                //console.log('button');
                $('.tab-btn-wrap button').removeClass('active');
                $this.addClass('active');
                $('.tab-content').hide();
                $('.' + id).show();
            }
        }
    });

    $('body').on('click', '.tab-btn-wrap button.ajax', function () {
        var $this = $(this);
        var id = $this.data("id");

        $('.tab-btn-wrap button').addClass('ajax-process');
        $('.item-loader').show();
        $('.tab-btn-wrap button').removeClass('active');
        $this.addClass('active');

        $('#temp').load(esp_data.home_url + ' .tab-content', 'shop_theme_nonce=' + esp_data.theme_nonce + '&rre_theme_type=' + id, function () {
            var load_html = $('#temp').html();

            $('#temp').html('');
            $('.tab-content').hide();
            $('.tab-content-wrap').append(load_html);

            $('.tab-btn-wrap button').removeClass('ajax-process');
            $this.removeClass('ajax');
            $('.item-loader').hide();
        });
    });

    $('.menu li a, .menu li').on('focus', function() {
        $(this).parents('li').addClass('focus');
    }).blur(function() {
        $(this).parents('li').removeClass('focus');
    });

    $('.wpforms-error-noscript,.wpforms-field-container,.wpforms-submit-container').wrapAll('<div class="wp-fieldWrap"></div>');
    $('.wpforms-field-container,.wpforms-submit-container').wrapAll('<div class="wp-submitWrap"></div>');
});