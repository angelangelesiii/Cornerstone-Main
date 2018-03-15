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

    // FEATURED SLIDER
    $('.featured-slider-container').slick({
        autoplay: true,
        autoplaySpeed: 8000,
        speed: 1000,
        arrows: false,
    });


});