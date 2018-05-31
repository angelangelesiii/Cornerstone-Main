<?php 

// GSAP
wp_enqueue_script( 'GSAP', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js', false, false, true);
wp_enqueue_script( 'GSAP-scroll', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/plugins/ScrollToPlugin.min.js', false, false, true);

// ScrollMagic
wp_enqueue_script( 'scrollmagic-main', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js', false, false, true);
wp_enqueue_script( 'scrollmagic-gsap', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js', false, false, true);
wp_enqueue_script( 'scrollmagic-indicators', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js', false, false, true);


?>