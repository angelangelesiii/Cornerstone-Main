<?php
/**
 * @package Cornerstone_Main
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="transition-mark"></div>

			<?php // CONTENT--------------------

			// GRID
			get_template_part( 'fp-parts/fp-blog-posts');
			
			// MESSAGE
			get_template_part( 'fp-parts/fp-message' );

			// FEATURED SLIDER
			// get_template_part( 'fp-parts/fp-featured-slider' ); 

			// CORE
			// get_template_part( 'fp-parts/fp-core' ); 

			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
