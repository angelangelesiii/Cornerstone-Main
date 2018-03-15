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

			<div class="wrapper-medium">
				<?php
				while ( have_posts() ) : the_post(); ?>
	
				<article class="article page-article overlapping">
					<div class="article-title-container">
						<h1 class="article-title"><?php the_title(); ?></h1>
					</div>
					<div class="article-content">
						<?php the_content(); ?>
					</div>
				</article>
					
				<?php
				endwhile; // End of the loop.
				?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
