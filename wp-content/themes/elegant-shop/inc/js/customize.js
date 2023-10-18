( function( api ) {

    // Extends our custom "example-1" section.
    api.sectionConstructor['pro-section'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );

} )( wp.customize );

jQuery(document).ready(function($){

    //Scroll to front page section
    $('body').on('click', '#sub-accordion-panel-frontpage_settings .control-subsection .accordion-section-title', function(event) {
        var section_id = $(this).parent('.control-subsection').attr('id');
        scrollToSection( section_id );
    }); 
    
});

function scrollToSection( section_id ){

    var preview_section_id = "banner_section";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch ( section_id ) {

        case 'accordion-section-featured_sec_home':
        preview_section_id = "sale-section";
        break;

        case 'accordion-section-category_sec':
        preview_section_id = "category-section";
        break;

        case 'accordion-section-new_arrivals_sec_home':
        preview_section_id = "new-arrivals";
        break;

        case 'accordion-section-offer_sec_home':
        preview_section_id = "offer";
        break;

        case 'accordion-section-featured_product_section':
        preview_section_id = "featured-products";
        break;

        case 'accordion-section-prod_deal':
        preview_section_id = "deals";
        break;

        case 'accordion-section-prod_cat_section':
        preview_section_id = "product-category";
        break;

        case 'accordion-section-blogs_news_sec':
        preview_section_id = "news-blog";
        break;

        case 'accordion-section-footer_top_sec':
        preview_section_id = "footer-top";
        break;

    }

    if( $contents.find('#'+preview_section_id).length > 0 && $contents.find('.home').length > 0 ){
        $contents.find("html, body").animate({
        scrollTop: $contents.find( "#" + preview_section_id ).offset().top
        }, 1000);
    }
}