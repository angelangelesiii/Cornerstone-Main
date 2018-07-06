<?php
/**
 * Template Name: Full Page
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main page template-full-page">
			<?php 
			$appearance = get_field('appearance');
			// var_dump($appearance);
			if($appearance['use_custom_width']): ?>
				<?php if($appearance['full_wide']): ?>
			<div class="full-wide">
				<?php else: ?>
			<div class="custom-width" style="width: 100%; max-width: <?php echo $appearance['custom_width'] ?>px; ">
				<?php endif; ?>	
			<?php else: ?>
			<div class="wrapper-medium">
			<?php endif; ?>
					<?php
				while ( have_posts() ) : the_post(); ?>
	
				<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
					
				<?php
				endwhile; // End of the loop.
					?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php
get_footer();
