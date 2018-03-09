// ==================================
//    FRONT PAGE SCRIPT
// ==================================

(function($) {})( jQuery ); // JQuery WordPress workaround

jQuery(document).ready(function($){ // Document Ready

    var frontController = new ScrollMagic.Controller();

    // =====================================
    // core items interaction
    // =====================================

    // Title animation
    var coreTitleAnimation = new ScrollMagic.Scene({
        triggerElement: '.core',
        triggerHook: 1,
        duration: '70%',
    })
    .setTween(TweenMax.fromTo('.core .section-title', 0.5, {
        y: 0,
        scale: 0.5
    }, {
        y: '-100%',
        scale: 1
    }))
    // .addIndicators()
    .addTo(frontController);


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