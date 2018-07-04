<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cornerstone_Main
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main page">
			<div class="wrapper-medium row collapse">
				<div class="column large-9 small-12 main-container">
					<?php
					while ( have_posts() ) : the_post(); ?>
		
					<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
						
					<?php
					endwhile; // End of the loop.
					?>
				</div>
				<div class="column large-3 small-12 sidebar-container">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	
	<div class="wrapper-medium">
		
	</div>

<?php
get_footer();
