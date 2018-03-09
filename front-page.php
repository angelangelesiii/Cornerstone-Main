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
					<a href="javascript:void(0)" class="btn btn--white btn--large">Find us near you</a>
				</div>
			</section>

			<div class="transition-mark"></div>

			<section class="core">
				<div class="core-items-container clearfix">
					<div class="core-item">
						<div class="core-item-image" style="background-image: url(<?php echo get_template_directory_uri().'/dist/images/core-1.jpg' ?>);">
						</div>
						<div class="overlay"></div>
						<div class="text-container">
							<h2>Outreach</h2>
							<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
							<a href="#" class="btn btn--white">Learn more</a>
						</div>
					</div>
					<div class="core-item">
						<div class="core-item-image" style="background-image: url(<?php echo get_template_directory_uri().'/dist/images/core-2.jpg' ?>);">
						</div>
						<div class="overlay"></div>
						<div class="text-container">
							<h2>Medical</h2>
							<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium excepturi voluptate beatae.</p>
							<a href="#" class="btn btn--white">Learn more</a>
						</div>
					</div>
					<div class="core-item">
						<div class="core-item-image" style="background-image: url(<?php echo get_template_directory_uri().'/dist/images/core-3.jpg' ?>);">
						</div>
						<div class="overlay"></div>
						<div class="text-container">
							<h2>Indigenous</h2>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci.</p>
							<a href="#" class="btn btn--white">Learn more</a>
						</div>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
