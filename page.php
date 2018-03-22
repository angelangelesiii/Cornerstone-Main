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
		<main id="main" class="site-main">
			<?php
			while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
				
			<?php
			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
	
	<div class="wrapper-medium">
		<?php get_sidebar(); ?>
	</div>

<?php
get_footer();
