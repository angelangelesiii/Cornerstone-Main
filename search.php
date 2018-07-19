<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Cornerstone_Main
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="spacer"></div>

			<div class="wrapper">

				<section class="search-box">
					<?php get_search_form(); ?>
				</section>

				<header class="page-header">
					<h1 class="search-title"><?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'cornerstone-main' ), '<span>' . get_search_query() . '</span>' );
					?></h1>
				</header><!-- .page-header -->
	
				<?php
				if ( have_posts() ) : ?>

				<section class="search-results">

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post(); ?>
	
						<article class="search-item">
							<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p class="meta">
								<span class="link"><a href="<?php the_permalink(); ?>"><?php echo get_the_permalink(); ?></a></span>
							</p>
							<p class="excerpt">
								<?php echo get_the_excerpt( $post->ID ); ?>
							</p>
						</article>

					<?php
					endwhile;
	
					the_posts_navigation(); ?>

				</section>

				<?php
	
				else :
	
					get_template_part( 'template-parts/content', 'none' );
	
				endif; ?>
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
// get_sidebar();
get_footer();
