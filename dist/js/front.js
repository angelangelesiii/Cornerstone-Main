// ==================================
//    FRONT PAGE SCRIPT
// ==================================

(function($) {})( jQuery ); // JQuery WordPress workaround

jQuery(document).ready(function($){ // Document Ready

    // =====================================
    // core items interaction
    // =====================================

    // set core item text container size 
    function setCoreItemTextContainerSize() {
        var textContainerWidth = ($(window).width()) * 0.70;
        $('.core-item .text-container').outerWidth(textContainerWidth);
    }

    setCoreItemTextContainerSize();
    $(window).resize(function(){
        setCoreItemTextContainerSize();
    })

    function coreItemsReset() {
        $('.core-items-container .core-item').removeClass('active inactive');
    }

    function coreItemActivate(el) {
        $(el).removeClass('inactive');
        $(el).addClass('active');
        $(el).siblings().addClass('inactive');
        $(el).siblings().removeClass('active');
    }

    $('.core-item').click(function(e) {
        if ($(this).hasClass('active')) {
            coreItemsReset();
        } else {
            coreItemActivate($(this));
        }
    });


});