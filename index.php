<?php
/**
 * @package Cornerstone_Main
 */

get_header(); ?>
<div class="spacer"></div>

	<div id="primary" class="content-area blog-area">
		<main id="main" class="site-main">

			<div class="wrapper-big row collapse">
				<div class="main-container">
					
				<?php 
				// FEATURED LOOP
				if (have_rows('featured_blog_posts','options')):
				?>
					
					<!-- START FEATURED POSTS SLIDER -->
					<div class="featured-posts-slider" id="blogpageslider">
					
					<?php while (have_rows('featured_blog_posts','options')): the_row(); ?>

						<!-- <?php echo 'POST ITEM '.get_the_title( get_sub_field('featured_post') ).' - #'.get_sub_field('featured_post'); ?> -->
						<div class="featured-item">
							<div class="featured-item-contents" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_sub_field('featured_post'), 'bg-medium' ) ?>);">
								<div class="text">
									<!-- <h2><?php echo get_the_title( get_sub_field('featured_post') ); ?></h2> -->
								</div>
							</div>
						</div>

					<?php endwhile; ?>
					
					</div>
					<!-- END FEATURED POSTS SLIDER -->

				<?php 
				endif;
				?>

				<?php 
				// MAIN LOOP
				if ( have_posts() ) : 
				?>

				<div class="blog-container grid-container clearfix">

					<div class="grid-sizer"></div>

				<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();
					$significanceClass = '';
					if(get_field('significant')) $significanceClass = 'wide-2';
					
				?>
		
					<article class="blog-item grid-item <?php echo $significanceClass; ?>">
						<div class="container">
							<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url( 'bg-medium' ) ?>" alt="" class="post-image"></a>
							<div class="content">

								<span class="category item-meta">
									<?php $categoryName = get_the_category($post->ID)[0];
									// var_dump( $categoryName );
									?>
									<a href="<?php echo get_term_link($categoryName); ?>"><?php echo $categoryName->name; ?></a>
								</span>
								<h2 class="title"><?php the_title(); ?></h2>
								<span class="author date item-meta">
								By <?php the_author(); ?> <?php the_date( 'F j, Y', 'on '); ?>
							</span>	
								
							</div>
						</div>
					</article>
					
				<?php endwhile; ?>

				</div>

				<?php the_posts_navigation();
				endif; 
				wp_reset_postdata();
				?>

				</div>
			
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
