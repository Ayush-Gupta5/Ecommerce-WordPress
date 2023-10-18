(function( $ ) {
	jQuery(document).ready(function(){
		jQuery(".product-cat").hide();
	  jQuery("button.product-btn").click(function(){
	    jQuery(".product-cat").toggle();
	  });
	});
})( jQuery );