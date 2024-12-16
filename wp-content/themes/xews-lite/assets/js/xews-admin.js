(function($){
    "use strict";

 /**
* Header & Footer Scrolling
*/
$('body').on('click', '#accordion-panel-xews_lite_header_panel,#accordion-panel-xews_lite_header_elements,#accordion-panel-xews_lite_footer_panel,#accordion-panel-xews_lite_footer_elements', function(event) {
    var section_id = $(this).attr('id');
    headerScrollToSection( section_id );
});

function headerScrollToSection( section_id ){
var preview_section_id = "masthead";

var $contents = jQuery('#customize-preview iframe').contents();

switch ( section_id ) {

    case 'accordion-panel-xews_lite_header_panel':
        preview_section_id = "masthead";
        break;

    case 'accordion-panel-xews_lite_header_elements':
        preview_section_id = "masthead";
        break;    

    case 'accordion-panel-xews_lite_footer_panel':
        preview_section_id = "colophon";
        break;

    case 'accordion-panel-xews_lite_footer_elements':
        preview_section_id = "colophon";
        break;
                
}

if( $contents.find('#'+preview_section_id).length > 0 ){
    $contents.find("html, body").animate({
    scrollTop: $contents.find( "#" + preview_section_id ).offset().top - 82
    }, 500);
}
}



})(jQuery);