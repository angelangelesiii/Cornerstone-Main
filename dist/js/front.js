// ==================================
//    FRONT PAGE SCRIPT
// ==================================

(function($) {})( jQuery ); // JQuery WordPress workaround

jQuery(document).ready(function($){ // Document Ready

    var frontController = new ScrollMagic.Controller();

    // BLOG POSTS SLIDER
    $('.blog-slider-container').slick({
        autoplay: true,
        autoplaySpeed: 4000,
        speed: 1000,
        pauseOnHover: false,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-arrow-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-arrow-right"></i></button>',
        infinite: true,
        centerMode: true,
        slidesToShow: 3,
        centerPadding: '60px',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '60px'
                }
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '30px',
                    arrows: false,
                }
            }
        ]
    });

    // PARALLAX FOR OUTREACH

    var outreachParallaxStrength = $('.outreach-section').data('parallax-strength')+'%';
    // console.log('PS is '+outreachParallaxStrength);
    var outreachParallax = new ScrollMagic.Scene({
        triggerElement: '.outreach-section',
        triggerHook: 1,
        duration: ($(window).outerHeight()+$('.outreach-section').outerHeight()),
    })
    .setTween(TweenMax.to('.outreach-parallax-bg', 1, {
        y: outreachParallaxStrength,
        ease: Power0.easeInOut
    }))
    // .addIndicators()
    .addTo(frontController);

    // CS INTRO ANIMATIONS
    var csIntroAnimation = new ScrollMagic.Scene({
        triggerElement: '.cs-video',
        triggerHook: 0.5,
        reverse: false
    })
    .setTween(TweenMax.from('.text-window', 1.5, {
        x: '-100%',
        autoAlpha: 0.5,
        ease: Power4.easeOut,
    }))
    // .addIndicators()
    .addTo(frontController);

});