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

// parse date
// $t = strtotime(get_field('start_date'));
// $articleDate = date('F j, Y', $t);
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main events-type">
			<div class="wrapper-big">

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
				if($eventQuery->have_posts()): ?>

				<h2 class="event-heading">Events</h2>

				<div class="events-container grid clearfix">
					<div class="grid-sizer"></div>

				<?php
					// start looping through posts
					$itemCount = 1;
					while($eventQuery->have_posts()): $eventQuery->the_post();
					$thumbnailStyle = '';
					$thumbnailSize = 'bg-small';
					if ($itemCount == 1 || get_field('major_event') == true) $thumbnailSize = 'bg-medium';

					if (has_post_thumbnail()) {
						$thumbnailStyle = get_the_post_thumbnail_url(get_the_ID(), $thumbnailSize);
					} elseif (get_field('fallback_thumbnail', 'options')) {
						$thumbnailStyle = wp_get_attachment_image_src(get_field('fallback_thumbnail', 'options'), $thumbnailSize)[0];
					}
					
					if(get_field('single_date_boolean') == 'false') {
						$displayDate = date('M j', strtotime(get_field('start_date'))).' to '.date('M j, Y', strtotime(get_field('end_date')));
					} else {
						$displayDate = date('M j, Y', strtotime(get_field('start_date')));
					}

					//print_r(wp_get_attachment_image_src(get_field('fallback_thumbnail', 'options'), 'bg-small'));
				?>
				
					<article class="event-item grid-item item-<?php 
						echo $itemCount;
						if ($itemCount == 1 || get_field('major_event') == true) echo ' wide-2';
						if ($itemCount == 1) echo ' upcoming';
					?>">
						<div class="inner">
							<a href="<?php the_permalink(); ?>" class="image-link">
								<img src="<?php echo $thumbnailStyle; ?>" class="event-thumbnail">
								<?php if($itemCount==1): ?>
								<span class="upcoming-label">UPCOMING!</span>
								<?php endif; ?>
							</a>
							<div class="content">
								<div class="event-meta date"><?php echo $displayDate; ?></div>
								<h3 class="event-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p class="excerpt"><?php echo get_the_excerpt($post->ID); ?></p>
								<div class="link-container">
									<a href="<?php the_permalink(); ?>" class="read-more-btn btn--white">Read More</a>
								</div>
							</div>
							
						</div>
					</article>

				<?php
					// end looping
					$itemCount++;
					endwhile; ?>
				
				</div>

				<?php
				//end the loop and restore global post data
				endif;
				wp_reset_postdata();
				?>

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	
	<div class="wrapper-medium">
		<?php //get_sidebar(); ?>
	</div>

<?php
get_footer();
