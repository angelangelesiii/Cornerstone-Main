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
				<article class="article page-article overlapping">
					<div class="article-title-container">
						<h1 class="article-title"><?php the_title(); ?></h1>
					</div>
					<div class="article-content">
						<?php 
						$content_post = get_post($post->ID);
						$content = $content_post->post_content;
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]&gt;', $content);
						echo $content;
						?>

						<?php 
						// Custom loop args
						$eventQuery = new WP_Query(array(
							'post_type' 			=> 'event',
							'posts_per_page' 		=> '10',
							'meta_key'				=> 'start_date',
							'orderby'				=> 'meta_value',
							'order'					=> 'ASC',
							'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
								array(
									'key' => 'start_date', // Check the start date field
									'value' => date("Y-m-d"), // Set today's date (note the similar format)
									'compare' => '>=', // Return the ones greater than or equal to today's date
									'type' => 'DATE' // Let WordPress know we're working with date
								)
							)
						));

						// if custom loop have posts (event)
						if($eventQuery->have_posts()):
							// start looping through posts
							while($eventQuery->have_posts()): $eventQuery->the_post();
						?>
						
						<div class="article">
							<h1><?php the_title(); ?></h1>
						</div>

						<?php
							// end looping
							endwhile;
						//end the loop and restore global post data
						endif;
						wp_reset_query();
						?>	
					</div>
				</article>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	
	<div class="wrapper-medium">
		<?php get_sidebar(); ?>
	</div>

<?php
get_footer();
