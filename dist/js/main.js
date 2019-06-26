// ==================================
//    MAIN SCRIPT
// ==================================

(function($) {})( jQuery ); // JQuery WordPress workaround

jQuery(document).ready(function($){ // Document Ready

    function mediumSizeScript() {
        if($(window).width() < 1024) {
            $('#belt-menu-trigger').addClass('medium-screen');
        } else {
            $('#belt-menu-trigger').removeClass('medium-screen');
        }
    }
    mediumSizeScript();

    $(window).resize(function() { // Window resize
       mediumSizeScript();
    });

    function toggleMenu() {
        $('body').toggleClass('menu-opened')
        $('#mainheader').toggleClass('opened')
        $('#mainmenubutton').toggleClass('opened');
        $('#mainmenupanel').toggleClass('opened');
        $('#menu-overlay').toggleClass('opened');
        $('#belt-menu-nav').toggleClass('menu-opened');
        $('#belt-menu-alt-nav').toggleClass('menu-opened');
    }

    var menuItem = $('ul#header-menu>li')
    var menuStaggerAnimation = new TimelineMax()
        .staggerFrom(menuItem, 0.5, {
            opacity: 0,
            x: 100,
            ease: Back.easeOut
        }, 0.1);

    $('#mainmenubutton').click(function(e) {
        toggleMenu();
        if ($('#mainmenupanel').hasClass('opened')) {
            console.log('menu is opened so I will play animation');
            menuStaggerAnimation.play(0);
        }
    });

    // $('#mainmenupanel').click(function(e) {
    //     toggleMenu();
    // });
    

    // Parallax effect
    var mainController = new ScrollMagic.Controller(),
        beltColor = $('#belt-menu-nav').css('background-color');

    // console.log(beltColor);

    var dimInitial = $('.hero-banner.full-section').data('dim');
    // console.log(dimInitial);
    var heroEffect = new TimelineMax()
        .to('.parallaxBG', 1, {
            y: '40%',
            ease: Power0.easeInOut,
        }, 'a')
        .fromTo('#belt-menu-nav', 1, {
            css: {background: beltColor},
        },{
            css: {background: 'rgba(0, 0, 0, 1)'},
        }, 'a')
        .to('#belt-menu li.menu-item a', 1, {
            opacity: 1
        }, 'a');

    var frontPageParallax = new ScrollMagic.Scene({
        triggerElement: '.hero-banner',
        triggerHook: 0,
        duration: '130%'
    })
    .setTween(heroEffect)
    // .addIndicators()
    .addTo(mainController);

    // Belt menu pinning
    var beltMenuHeight = $('#belt-menu-nav').outerHeight();
    // console.log(beltMenuHeight);
    $('#belt-menu-trigger').outerHeight(beltMenuHeight);
    $('#mainheader .navbar-bg').outerHeight(beltMenuHeight);

    var beltMenuPin = new ScrollMagic.Scene({
        triggerElement: "#belt-menu-trigger",
        triggerHook: 0,
    })
    .on('enter', function() {
        $('#belt-menu-nav').addClass('latch');
	})
	.on('leave', function() {
        $('#belt-menu-nav').removeClass('latch');
    })
    // .addIndicators()
    .addTo(mainController);

    // Navbar scrolling toggle
    var navbarToggle = new ScrollMagic.Scene({
        triggerElement: '#top',
        triggerHook: 0,
        offset: 100
    })
    .on('enter', function() { // if viewport moved by 50px, remove 'top-position' class
        $('#mainheader').toggleClass('top-position');
        $('#mainheader').toggleClass('not-top-position');
	})
	.on('leave', function() {// if viewport is < 50px from top, add 'top-position' class
        $('#mainheader').toggleClass('top-position');
        $('#mainheader').toggleClass('not-top-position');
    })
    // .addIndicators()
    .addTo(mainController);
    
    var navbarBGfade = new ScrollMagic.Scene({
        triggerElement: '#top',
        duration: 200,
        triggerHook: 0,
    })
    .setTween(TweenMax.to('#mainheader .navbar-bg', 1, {
        opacity: 1
    }))
    // .addIndicators()
    .addTo(mainController);

    // MASONRY
    var $indexGrid = $('.grid-container').imagesLoaded(function(){
        $indexGrid.masonry({
            itemSelector: '.grid-item',
            columnWidth: '.grid-sizer',
            percentPosition: true,
            transitionDuration: '0.2s',
        });
    });

    var $eventGrid = $('.events-container').imagesLoaded(function(){
        $eventGrid.masonry({
            itemSelector: '.grid-item',
            columnWidth: '.grid-sizer',
            percentPosition: true,
            transitionDuration: '0.2s',
        });
    });

    // BLOG FADERS
    function fadersInit() {
        $('.blog-item .excerpt').each(function(e) {
            console.log('excerpt: '+$(this).outerHeight());
            if($(this).outerHeight() >= 199) {
                console.log('higher');
                $(this).find('.fade').css('visibility','visible');
            }
        });
    }
    fadersInit();

    // HORIZONTAL SCROLL FOR MENU
    jQuery(function ($) {
        $.fn.hScroll = function (amount) {
            amount = amount || 120;
            $(this).bind("DOMMouseScroll mousewheel", function (event) {
                var oEvent = event.originalEvent, 
                    direction = oEvent.detail ? oEvent.detail * -amount : oEvent.wheelDelta, 
                    position = $(this).scrollLeft();
                position += direction > 0 ? -amount : amount;
                $(this).scrollLeft(position);
                event.preventDefault();
            })
        };
    });

    $(document).ready(function(){
        $('.header-menu-container').hScroll(40); // You can pass (optionally) scrolling amount
    });

    // --- MODALS ---

    function keepAspectRatio(iframe) {

        var iframeWidth = iframe.attr('width'),
            iframeHeight = iframe.attr('height'),
            innerPadding = iframeHeight/iframeWidth*100;
        
        var iframeNewHeight, iframeNewWidth, percentResize;

        iframe.attr('width', 100+'%');

        iframeNewWidth = iframe.outerWidth();
        iframe.attr('width', iframeNewWidth);
        percentResize = iframeNewWidth/iframeWidth;
        iframeNewHeight = iframeHeight*percentResize;
        iframe.attr('height',iframeNewHeight);
        // console.log(iframeNewHeight);
        // console.log(iframeNewWidth);
    }

    function modalOpen(link) {
        
        var targetModal = $(link.data('modal'));
        console.log(targetModal);
        console.log('Clicked: ' + link.attr('class'));
        console.log('Target: ' + targetModal.attr('class'));
        keepAspectRatio(targetModal.find('iframe'));
        TweenLite.to(targetModal, 0.5, {autoAlpha: 1, ease: Power4.easeOut});
    }

    function modalClose(modal) {
        TweenLite.to(modal, 0.5, {autoAlpha: 0, ease: Power4.easeIn});
        console.log('Close modal: '+modal);
        
    }

    $('.modal-button').each(function(e){
        $(this).click(function(){
            modalOpen($(this));
            var videoSrc = $(this).data('video-src');
            console.log(videoSrc);
            $($(this).data('modal')).find('iframe').attr('src', videoSrc+'?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;autoplay=1');
        });
    });

    $('.modal').each(function(e){
        $(this).prepend('<span class="modal-dim"></span>');
        $('.modal-dim').each(function(e){
            $(this).click(function() {
                modalClose($(this).parent('.modal'));
                $(this).parent('.modal').find('iframe').attr('src', '');
            })
        });
    });

    $(window).resize(function(e){
        $('.modal').each(function(e){
            if ($(this).hasClass('youtube-video')) {
                keepAspectRatio($(this).find('iframe'));
            }
        });
    });


    // LOCATION LIST ACF MAP

    

    // BLOG PAGE FEATURED SLIDER
    $('#blogpageslider').slick({
        autoplay: true,
        autoplaySpeed: 5000,
        fade: false,
        speed: 500,
        pauseOnHover: false,
        arrows: false,
        // prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-arrow-left"></i></button>',
        // nextArrow: '<button type="button" class="slick-next"><i class="fas fa-arrow-right"></i></button>',
        dots: true,        
        infinite: true,
        // centerMode: true,
    });


});