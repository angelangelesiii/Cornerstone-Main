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
			<section class="location-section clearfix">
				<?php 
				$locationQuery = new WP_Query(array(
					'post_type' 			=> 'location',
					'posts_per_page' 		=> 15,
					'orderby'				=> 'title',
					'order'					=> 'ASC'
				));
	
				if ($locationQuery->have_posts()): ?>

				<!-- START MAP -->
				<div class="wrapper-medium">
					<div class="location-map acf-map">
		
					<?php
						while($locationQuery->have_posts()): $locationQuery->the_post();
						$location = get_field('location_location');
					?>
		
						<!-- LOCATION: <?php the_title(); ?> -->
						<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
							<img src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" alt="">
							<h3><?php the_title(); ?></h3>
						</div>
		
					<?php endwhile; ?>
					
					</div>
				</div>
				<!-- END MAP -->
	
				<?php
				endif; 
				wp_reset_postdata(); ?>

				<?php 
				$locationQuery = new WP_Query(array(
					'post_type' 			=> 'location',
					'posts_per_page' 		=> 15,
					'orderby'				=> 'title',
					'order'					=> 'ASC'
				));
	
				if ($locationQuery->have_posts()): ?>

				<!-- START LIST -->
				<div class="wrapper">

					<div class="location-list">
		
					<?php
						while($locationQuery->have_posts()): $locationQuery->the_post();
						$location = get_field('location_location');
					?>
		
						<article class="location location-container clearfix">
							<?php if(has_post_thumbnail($post->ID)): ?>
								<div class="location-image" style="background-image: url('<?php the_post_thumbnail_url( 'bg_small' ); ?>')">
									<div class="sizer"></div>
								</div>
							<?php else: ?>
								<div class="location-image" style="background-image: url('<?php echo wp_get_attachment_image_src(get_field('fallback_thumbnail', 'options'), 'bg_small')[0]; ?>')">
									<div class="sizer"></div>
								</div>
							<?php endif; ?>
							<div class="text-container">
								<h2 class="location-name"><?php the_title(); ?></h2>
								<?php the_excerpt(); ?>
								<p class="btn-container">
									<a href="<?php the_permalink(); ?>" class="read-more-btn btn--white">View Schedules</a>
								</p>
							</div>
						</article>
		
					<?php endwhile; ?>
					
					</div>
				</div>
				<!-- END LIST -->
	
				<?php
				endif; 
				wp_reset_postdata(); ?>

				<div class="trigger"></div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
