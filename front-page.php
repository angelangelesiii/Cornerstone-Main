<?php
/**
 * @package Cornerstone_Main
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="full-section hero-banner" style="background-image: url(<?php echo get_template_directory_uri().'/dist/images/background/placeholder.jpg' ?>);">
				<div class="overlay"></div>
				<div class="hero-container">
					<div class="wrapper">
						<h2 class="hero-text">
							We are Cornerstone.
						</h2>
						<p class="hero-subtext">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
					</div>
				</div>
			</section>

			<section class="core">
				<div class="wrapper-medium">
					<div class="row">
						<div class="core-item column medium-4 small-12">
							<div class="image-container">
								<div class="image"></div>
							</div>
						</div>
						<div class="core-item column medium-4 small-12"></div>
						<div class="core-item column medium-4 small-12"></div>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
