<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Cornerstone_Main
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="wrapper-medium row collapse">
				<div class="column large-9 small-12 main-container">
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
				<div class="column large-3 small-12 sidebar-container">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
