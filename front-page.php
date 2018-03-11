<?php
/**
 * @package Cornerstone_Main
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="transition-mark"></div>

			<!-- CORE -->
			<section class="core">
				<div class="wrapper">
					<div class="intro">
						<h2 class="title">We believe in giving</h2>
						<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem nulla adipisci quae dolorum nemo voluptatibus! Esse dolorum maxime rerum, impedit libero ea culpa vero autem!</p>
					</div>
				</div>
				<div class="wrapper">
					<div class="row core-items">
						<div class="column medium-4 small-12 core-item">
							<div class="image-container">
								<div class="image" style="background-image: url('<?php echo get_template_directory_uri().'/dist/images/core-1.jpg' ?>');"></div>
							</div>
							<h3 class="core-item-name">Outreach</h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil?</p>
							<a href="#" class="btn">Learn More</a>
						</div>
						<div class="column medium-4 small-12 core-item">
							<div class="image-container">
								<div class="image" style="background-image: url('<?php echo get_template_directory_uri().'/dist/images/core-2.jpg' ?>');"></div>
							</div>
							<h3 class="core-item-name">Ipsum</h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, praesentium.</p>
							<a href="#" class="btn">Learn More</a>
						</div>
						<div class="column medium-4 small-12 core-item">
							<div class="image-container">
								<div class="image" style="background-image: url('<?php echo get_template_directory_uri().'/dist/images/core-3.jpg' ?>');"></div>
							</div>
							<h3 class="core-item-name">Dolor</h3>
							<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae?</p>
							<a href="#" class="btn">Learn More</a>
						</div>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
