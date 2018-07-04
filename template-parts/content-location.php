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
			<div class="article-content location-content no-padding column large-7 medium-12">
				<div class="location-container">
					<?php $location = get_field('location_location'); ?>
					<div class="acf-map">
						<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					</div>
					<?php // print_r($location); ?>
				</div>
				<div class="details">
					<div class="address-container">
						<?php // Address
						if(get_field('location_address')) the_field('location_address'); ?>
					</div>
					
					<?php if(have_rows('location_service_times')): // Service Times?>
					<div class="services">
						<?php while(have_rows('location_service_times')): the_row(); 
						// Start loop ?>
						
						<?php if(get_row_layout() == 'service_multiple_times'): 
						// Multiple time service ?>
						<h2 class="service-description"><?php the_sub_field('description'); ?></h2>
						<div class="service-times">
							<?php if(have_rows('times')):
							$day = '';
							$count = 0;
							while(have_rows('times')): the_row();
							$time = "<span class='time'>".get_sub_field('time')."</span>";
							?>
								<?php if($day != get_sub_field('day')): 
								$day = get_sub_field('day');
								echo "<span class='day'>";
								the_sub_field('day');
								echo ":</span><br/>";
								echo $time;
								?>
								
								<?php else: 
								echo " <span class='separator'>&bull;</span> ";
								echo $time;
								?>

								<?php endif; ?>
							
							<?php endwhile; endif; ?>
						</div>
						
						
						<?php elseif(get_row_layout() == 'service_with_single_time'): 
						//Single time service ?>
						<h2 class="service-description"><?php the_sub_field('description'); ?></h2>
						<div class="service-times">
							<span class="day"><?php the_sub_field('day'); ?></span>: <span class="time"><?php the_sub_field('time'); ?></span>
						</div>

						<?php endif; ?>

						<?php // End loop
						endwhile; ?>

					</div>
					<p class="button-container"><a href="#" class="btn btn--white">Plan Your Visit</a></p>	
					
					<?php endif; ?>
				</div>
				
			</div>
		</div>
	</article>
</div>
