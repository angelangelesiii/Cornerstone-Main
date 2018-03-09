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
					<a href="javascript:void(0)" class="btn btn--white btn--large">Find us</a>
				</div>
			</section>

			<div class="transition-mark"></div>

			<section class="core">
				<div class="wrapper-medium">
					<div class="row">
						<div class="core-item column medium-4 small-12">
							<div class="image-container">
								<div class="image-round" style="background: #B9DAE2"></div>
							</div>
							<h3 class="core-item-title">Outreach</h3>
							<p class="core-item-subtext">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia, est! Inventore obcaecati aliquid maxime iusto.</p>
							<a href="#" class="btn">Learn more</a>
						</div>
						<div class="core-item column medium-4 small-12">
							<div class="image-container">
								<div class="image-round" style="background: #B9DAE2"></div>
							</div>
							<h3 class="core-item-title">Medical</h3>
							<p class="core-item-subtext">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam sed voluptatem obcaecati qui unde ex ipsa similique libero magni molestias.</p>
							<a href="#" class="btn">Learn more</a>
						</div>
						<div class="core-item column medium-4 small-12">
							<div class="image-container">
								<div class="image-round" style="background: #B9DAE2"></div>
							</div>
							<h3 class="core-item-title">Indigenous</h3>
							<p class="core-item-subtext">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut modi libero officiis consectetur?</p>
							<a href="#" class="btn">Learn more</a>
						</div>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
