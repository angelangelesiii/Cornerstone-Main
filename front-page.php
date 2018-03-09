<?php
/**
 * @package Cornerstone_Main
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="full-section hero-banner" style="background-image: url(<?php echo get_template_directory_uri().'/dist/images/background/placeholder.jpg' ?>);">
				<div class="parallaxBG" style="background-image: url(<?php echo get_template_directory_uri().'/dist/images/background/placeholder.jpg' ?>);"></div>
				<div class="overlay"></div>
				<div class="hero-container">
					<div class="wrapper">
						<img src="<?php echo get_template_directory_uri().'/dist/images/hero-1.png' ?>" alt="" class="hero-image">
					</div>
					<a href="javascript:void(0)" class="btn btn--white btn--large">View our locations</a>
				</div>
			</section>

			<div class="transition-mark"></div>

			<section class="core">
				<div class="wrapper-big">
					
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
