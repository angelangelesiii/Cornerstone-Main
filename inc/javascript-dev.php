<?php 

// GSAP
wp_enqueue_script( 'GSAP', get_template_directory_uri().'/dist/js/src/TweenMax.min.js', false, false, true);
wp_enqueue_script( 'GSAP-scroll', get_template_directory_uri().'/dist/js/src/ScrollToPlugin.min.js', false, false, true);

// ScrollMagic
wp_enqueue_script( 'scrollmagic-main', get_template_directory_uri().'/dist/js/src/ScrollMagic.min.js', false, false, true);
wp_enqueue_script( 'scrollmagic-gsap', get_template_directory_uri().'/dist/js/src/animation.gsap.js', false, false, true);
wp_enqueue_script( 'scrollmagic-indicators', get_template_directory_uri().'/dist/js/src/debug.addIndicators.min.js', false, false, true);


?>