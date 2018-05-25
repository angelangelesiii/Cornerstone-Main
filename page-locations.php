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

get_header(); 

$content_post = get_post($post->ID);
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main events-type">
			<div class="wrapper-big">

				<?php 
				// Custom loop args
				$eventQuery = new WP_Query(array(
					'post_type' 			=> 'location',
					'posts_per_page' 		=> '10',
				));

				// if custom loop have posts (event)
				if($eventQuery->have_posts()): ?>

				<h2 class="event-heading">Locations</h2>

				<div class="events-container row small-up-1 medium-up-3 collapse">

				<?php
					// start looping through posts
					while($eventQuery->have_posts()): $eventQuery->the_post();
					$thumbnailStyle = '';
					if (has_post_thumbnail()) {
						$thumbnailStyle = 'background-image: url('.get_the_post_thumbnail_url(get_the_ID(), 'bg-small').');';
					} elseif (get_field('fallback_thumbnail', 'options')) {
						$thumbnailStyle = 'background-image: url('.wp_get_attachment_image_src(get_field('fallback_thumbnail', 'options'), 'bg-small')[0].');';
					} else {
						$thumbnailStyle = 'background-color: #3F9AB1;';
					}

					//print_r(wp_get_attachment_image_src(get_field('fallback_thumbnail', 'options'), 'bg-small'));
				?>
				
					<article class="event-item column column-block">
						<div class="inner">
							<a href="<?php the_permalink(); ?>"><span class="event-thumbnail" style="<?php echo $thumbnailStyle; ?>"><div class="padder"></div></span></a>
							<div class="content">
								<h3 class="event-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p><?php the_excerpt(); ?></p>
								
								<div class="btn-container">
									<a href="<?php the_permalink(); ?>" class="btn">Details</a>
								</div>
							</div>
						</div>
					</article>

				<?php
					// end looping
					endwhile; ?>
				
				</div>

				<?php
				//end the loop and restore global post data
				endif;
				wp_reset_query();
				?>

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	
	<div class="wrapper-medium">
		<?php //get_sidebar(); ?>
	</div>

<?php
get_footer();
