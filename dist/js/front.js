// ==================================
//    FRONT PAGE SCRIPT
// ==================================

(function($) {})( jQuery ); // JQuery WordPress workaround

jQuery(document).ready(function($){ // Document Ready

    var frontController = new ScrollMagic.Controller();

    // MASONRY
    $('#grid-container').masonry({
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer',
        percentPosition: true,
    });


});