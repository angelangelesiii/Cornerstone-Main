<?php
/**
 * @package Cornerstone_Main
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="transition-mark"></div>

			<?php // CONTENT--------------------

			// OUTREACH MESSAGE
			get_template_part( 'fp-parts/fp-outreach');

			// CORNERSTONE INTRO
			get_template_part( 'fp-parts/fp-cs-video');

			// BLOG POSTS
			get_template_part( 'fp-parts/fp-blog-posts');
			
			// EVENTS
			get_template_part( 'fp-parts/fp-events');

			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
