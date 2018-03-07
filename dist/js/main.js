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

});