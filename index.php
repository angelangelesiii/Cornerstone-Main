<?php
/**
 * @package Cornerstone_Main
 */

get_header();

// FEATURED LOOP
if (!have_rows('featured_blog_posts','options')):
?>
<div class="spacer"></div>
<?php endif; ?>

	<div id="primary" class="content-area blog-area">
		<main id="main" class="site-main">

			
			<div class="blog-main-container">
					
				<?php 
				// FEATURED LOOP
				if (have_rows('featured_blog_posts','options')):
				?>
					
					<!-- START FEATURED POSTS SLIDER -->
					<div class="featured-posts-slider" id="blogpageslider">
					
					<?php while (have_rows('featured_blog_posts','options')): the_row(); 
						$featuredItemCategory = get_the_category(get_sub_field('featured_post'))[0];
						// var_dump(get_the_category(get_sub_field('featured_post'))[0]);
					?>

						<!-- <?php echo 'POST ITEM '.get_the_title( get_sub_field('featured_post') ).' - #'.get_sub_field('featured_post'); ?> -->
						<div class="featured-item">
							<div class="featured-item-contents" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_sub_field('featured_post'), 'bg_medium' ) ?>);">
								<a href="<?php echo get_the_permalink( get_sub_field('featured_post') ); ?>">
									<div class="text">
										<div class="overlay"></div>
										<div class="content">
											<div class="wrapper-big">
												<span class="category-meta">
													<?php echo $featuredItemCategory->name; ?>
												</span>
												<h2><?php echo get_the_title( get_sub_field('featured_post') ); ?></h2>
											</div>
										</div>
									</div>
								</a>
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

				<div class="wrapper-big main-wrapper">

				<div class="blog-container grid-container clearfix">

					<div class="grid-sizer"></div>

				<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();
					$significanceClass = '';
					if(get_field('significant')) $significanceClass.= ' wide-2';
					if(!has_post_thumbnail( $post->ID )) $significanceClass.= ' no-thumb';
				?>
		
					<article class="blog-item grid-item <?php echo $significanceClass; ?>">

						<?php if(!get_field('significant')): // IF NOT SIGNIFICANT ?>

						<div class="container">
							<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url( 'bg_small' ) ?>" alt="" class="post-image"></a>
							<div class="content">
								<?php if(has_post_thumbnail( $post->ID )): // IF HAS THUMBNAIL ?>
								<span class="category item-meta">
									<?php $categoryName = get_the_category($post->ID)[0];
									// var_dump( $categoryName );
									?>
									<a href="<?php echo get_term_link($categoryName); ?>"><?php echo $categoryName->name; ?></a>
								</span>
								<?php endif; ?>
								<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php if(!has_post_thumbnail( $post->ID )): // IF HAS NO THUMBNAIL ?>
								<span class="category item-meta">
									<?php $categoryName = get_the_category($post->ID)[0];
									// var_dump( $categoryName );
									?>
									<a href="<?php echo get_term_link($categoryName); ?>"><?php echo $categoryName->name; ?></a>
								</span>
								<?php endif; ?>
								<span class="author date item-meta">
									By <?php the_author(); ?> <?php the_date( 'F j, Y', 'on '); ?>
								</span>	
								<?php if(!has_post_thumbnail( $post->ID )): ?>
								<p class="excerpt">
									<?php echo get_the_excerpt( $post->ID ); ?>
									<span class="fade"></span>
								</p>
								<p class="read-more"><a href="<?php the_permalink(); ?>">Read More &raquo;</a></p>
								<?php endif; ?>
							</div>
						</div>

						<?php elseif(get_field('significant')): // IF SIGNIFICANT ?>

						<div class="container" style="background-image: url('<?php the_post_thumbnail_url( 'bg_medium' ) ?>')">
							<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url( 'bg_medium' ) ?>" alt="" class="post-image"></a>

							<a href="<?php the_permalink(); ?>"><span class="overlay"></span></a>

							<div class="content">

								<span class="category item-meta">
									<?php $categoryName = get_the_category($post->ID)[0];
									// var_dump( $categoryName );
									?>
									<a href="<?php echo get_term_link($categoryName); ?>"><?php echo $categoryName->name; ?></a>
								</span>
								<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<span class="author date item-meta">
									By <?php the_author(); ?> <?php the_date( 'F j, Y', 'on '); ?>
								</span>	
								
							</div>
						</div>


						<?php endif; ?>

					</article>
					
				<?php endwhile; ?>

				</div>

				<nav class="load-more-nav">
					<button class="load-more-button" id="post-loader">
						Load Older Posts
					</button>
					<span id="post-end">- No more posts to load -</span>
				</nav>

				</div>

				<?php //the_posts_navigation();
				endif; 
				// wp_reset_postdata();
				?>

			</div>
			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
