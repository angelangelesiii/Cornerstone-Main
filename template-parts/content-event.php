<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cornerstone_Main
 */

?>

<article class="article page-article overlapping">
	<div class="article-title-container">
		<h1 class="article-title"><?php the_title(); ?></h1>
	</div>
	<div class="article-content">
		<div class="event-date-meta">
			<?php 
			$st = strtotime(get_field('start_date'));
			$startDate = date('F j, Y', $st);
			$et = strtotime(get_field('end_date'));
			$endDate = date('F j, Y', $et);
			if (get_field('single_date_boolean')): ?>
				<span class="date single-date"><strong>Date:</strong> <?php echo $startDate; ?></span>
			<?php else: ?>
				<span class="date span-date">Starting <strong><?php echo $startDate; ?></strong> to <strong><?php echo $endDate; ?></strong></span>
			<?php endif; ?>
			<?php if (!get_field('all_day_event')): ?>
				<span class="time not-all-day-event"><?php the_field('start_time'); ?> to <?php the_field('end_time'); ?></span>
			<?php endif; ?>
		</div>
		<?php the_content(); ?>
	</div>
</article>
