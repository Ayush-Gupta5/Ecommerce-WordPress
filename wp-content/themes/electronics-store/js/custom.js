jQuery(function($){
	"use strict";
	jQuery('.main-menu-navigation > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},
		speed:'fast'
	});
});

function electronics_store_menu_open() {
	jQuery(".side-menu").addClass('open');
}
function electronics_store_menu_close() {
	jQuery(".side-menu").removeClass('open');
}

(function( $ ) {

	$(window).scroll(function(){
		var sticky = $('.sticky-header'),
		scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('fixed-header px-lg-3 px-2');
		else sticky.removeClass('fixed-header px-lg-3 px-2');
	});

	// Back to top
	jQuery(document).ready(function () {
    jQuery(window).scroll(function () {
      if (jQuery(this).scrollTop() > 0) {
      	jQuery('.scrollup').fadeIn();
      } else {
        jQuery('.scrollup').fadeOut();
      }
    });
    jQuery('.scrollup').click(function () {
      jQuery("html, body").animate({
        scrollTop: 0
      }, 600);
      return false;
    });
	});

	// Window load function
	window.addEventListener('load', (event) => {
		jQuery(".preloader").delay(2000).fadeOut("slow");
	});

})( jQuery );

( function( window, document ) {
	function electronics_store_keepFocusInMenu() {
		document.addEventListener( 'keydown', function( e ) {
			const electronics_store_nav = document.querySelector( '.side-menu' );

			if ( ! electronics_store_nav || ! electronics_store_nav.classList.contains( 'open' ) ) {
				return;
			}

			const elements = [...electronics_store_nav.querySelectorAll( 'input, a, button' )],
				electronics_store_lastEl = elements[ elements.length - 1 ],
				electronics_store_firstEl = elements[0],
				electronics_store_activeEl = document.activeElement,
				tabKey = e.keyCode === 9,
				shiftKey = e.shiftKey;

			if ( ! shiftKey && tabKey && electronics_store_lastEl === electronics_store_activeEl ) {
				e.preventDefault();
				electronics_store_firstEl.focus();
			}

			if ( shiftKey && tabKey && electronics_store_firstEl === electronics_store_activeEl ) {
				e.preventDefault();
				electronics_store_lastEl.focus();
			}
		} );
	}

	electronics_store_keepFocusInMenu();
} )( window, document );
