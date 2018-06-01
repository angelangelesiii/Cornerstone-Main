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
			<?php 
			$locationQuery = new WP_Query(array(
				'post_type' 			=> 'location',
				'posts_per_page' 		=> '6',
				'orderby'				=> 'title',
				'order'					=> 'ASC'
			));

			if ($locationQuery->have_posts()): ?>

			<div class="location-map acf-map">

			<?php
				while($locationQuery->have_posts()): $locationQuery->the_post();
				$location = get_field('location_location');
			?>

				<!-- LOCATION: <?php the_title(); ?> -->
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
					<h3><?php the_title(); ?></h3>
				</div>

			<?php endwhile; ?>
			
			</div>

			<?php
			endif; 
			wp_reset_postdata(); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
