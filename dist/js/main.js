// ==================================
//    MAIN SCRIPT
// ==================================

(function($) {})( jQuery ); // JQuery WordPress workaround

jQuery(document).ready(function($){ // Document Ready

    // Main menu button interaction

    function toggleMenu() {
        $('body').toggleClass('menu-opened')
        $('#mainmenubutton').toggleClass('opened');
        $('#mainmenupanel').toggleClass('opened');
        $('#menu-overlay').toggleClass('opened');
    }

    $('#mainmenubutton').click(function(e) {
       toggleMenu();
    });

    $('#menu-overlay').click(function(e) {
        toggleMenu();
    });

    // Parallax effect
    var mainController = new ScrollMagic.Controller();

    var frontPageParallax = new ScrollMagic.Scene({
        triggerElement: '.hero-banner',
        triggerHook: 0,
        duration: '130%'
    })
    .setTween(TweenMax.to('.parallaxBG', 1, {
        y: '30%',
    }))
    // .addIndicators()
    .addTo(mainController);

});