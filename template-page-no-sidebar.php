<?php
/**
 * Template Name: No Sidebar
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main template-page-no-sidebar">
			<div class="wrapper-medium">
					<?php
				while ( have_posts() ) : the_post(); ?>
	
				<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
					
				<?php
				endwhile; // End of the loop.
					?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php
get_footer();
