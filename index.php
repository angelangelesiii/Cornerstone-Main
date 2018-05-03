<?php
/**
 * @package Cornerstone_Main
 */

get_header(); ?>
<div class="spacer"></div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="wrapper-big row collapse">
				<div class="column large-9 small-12 main-container">
					<?php if ( have_posts() ) : ?>
	
					<div class="blog-container">
	
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();
					?>
			
						<article class="blog-item">
							<div class="content">
								<h1><?php the_title(); ?></h1>
								<?php the_excerpt(); ?>
							</div>
						</article>
						
					<?php endwhile; ?>
	
					</div>
	
					<?php the_posts_navigation();
					endif; ?>
				</div>
			
				<div class="column large-3 small-12 sidebar-container">
					<?php get_sidebar(); ?>
				</div>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
