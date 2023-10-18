( function( api ) {

	// Extends our custom "electronics-store" section.
	api.sectionConstructor['electronics-store'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

	jQuery(document).ready(function($) {
	    $('body').on('click', '.icon-list li', function(){
	        var icon_class = $(this).find('i').attr('class');
	        $(this).addClass('icon-active').siblings().removeClass('icon-active');
	        $(this).parent('.icon-list').prev('.selected-icon').children('i').attr('class','').addClass(icon_class);
	        $(this).parent('.icon-list').next('input').val(icon_class).trigger('change');
	    });

	    $('body').on('click', '.selected-icon', function(){
	        $(this).next().slideToggle();
	    });

	    $(".socialInput").on("keyup", function() {
	        var value = $(this).val().toLowerCase();
	        $(".icon-list li").filter(function() {
	          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	        });
	    });
	});

} )( wp.customize );