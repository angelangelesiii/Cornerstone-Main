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
		<main id="main" <?php post_class('site-main') ?>>
			<div class="wrapper-medium row collapse">
				<div class="column large-9 small-12 main-container">
					<?php
					while ( have_posts() ) : the_post(); ?>
		
					<article class="article page-article overlapping">
						<div class="article-title-container">
							<h1 class="article-title"><?php the_title(); ?></h1>
						</div>
						<div class="article-content">
							<div class="article-meta clearfix">
								<?php echo get_avatar(get_the_author_meta('ID'), 64) ?>
								<span class="meta">
									by <span class="author-name"><?php the_author(); ?></span><br/>
									on <span class="date"><?php the_date(); ?></span>
								</span>
							</div>
							<?php edit_post_link('<i class="fas fa-edit"></i> Edit'); ?>
							<?php the_content(); ?>
						</div>
					</article>
						
					<?php
					endwhile; // End of the loop.

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) : ?>
						<div class="comments">
							<?php comments_template(); ?>
						</div>
					<?php
					endif;
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
