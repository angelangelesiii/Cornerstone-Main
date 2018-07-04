<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Cornerstone_Main
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main page-404 not-found">

			<div class="wrapper-medium row collapse">
				<div class="column large-9 small-12 main-container">
					<div class="page-404-container">
						<h1 class="title-404">404</h1>
						<h2 class="description">Oops! The page you are looking for is not here. Are you're lost?</h2>
						<p>Maybe you're looking for Jesus because He's looking for you! Christ came to the world to save the lost.</p>
					</div>
				</div>
				<div class="column large-3 small-12 sidebar-container">
					<?php get_sidebar(); ?>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
