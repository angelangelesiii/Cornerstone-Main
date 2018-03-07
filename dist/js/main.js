// ==================================
//    MAIN SCRIPT
// ==================================

(function($) {})( jQuery ); // JQuery WordPress workaround

jQuery(document).ready(function($){ // Document Ready

    // Main menu button interaction

    function toggleMenu() {
        $('body').toggleClass('menu-opened')
        $('#mainheader').toggleClass('opened')
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

    // Navbar scrolling toggle
    var navBarToggle = new ScrollMagic.Scene({
        triggerElement: '.transition-mark',
        triggerHook: 0,
        offset: -30
    })
    .on('enter', function() { // if viewport moved by 50px, remove 'top-position' class
        $('#mainheader').toggleClass('top-position');
        $('#mainheader').toggleClass('not-top-position');
	})
	.on('leave', function() {// if viewport is < 50px from top, add 'top-position' class
        $('#mainheader').toggleClass('top-position');
        $('#mainheader').toggleClass('not-top-position');
    })
    .addIndicators()
	.addTo(mainController);

});