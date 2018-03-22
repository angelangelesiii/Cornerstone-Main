<?php
/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cornerstone_Main
 */

?>
<div class="wrapper-medium">
	<article <?php post_class( 'article page-article overlapping' ) ?>>
		<div class="article-title-container">
			<h1 class="article-title"><?php the_title(); ?></h1>
		</div>
		<div class="row">
			<div class="location-description column large-5 medium-12">
				<?php the_content(); ?>
			</div>
			<div class="article-content no-padding column large-7 medium-12">
				<div class="location-container">
					<?php $location = get_field('location_location'); ?>
					<div class="acf-map">
						<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					</div>
				</div>
				<div class="services">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</article>
</div>
