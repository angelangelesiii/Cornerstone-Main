<?php
/**
 * @package Cornerstone_Main
 */

get_header(); ?>
<div class="spacer"></div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="wrapper-big row collapse">
				<div class="main-container">
					<?php if ( have_posts() ) : ?>
					
					<header class="title-container">
						<h1 class="main-title">Latest</h1>
					</header>
	
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
								<a href="#"><img src="<?php the_post_thumbnail_url( 'bg-medium' ) ?>" alt="" class="post-image"></a>
								<div class="content">
									<h2 class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<div class="item-meta">
										
										<p class="meta">
											<div class="avatar-container" style="background-image: url('<?php echo get_avatar_url( get_the_author_meta( 'ID' ), array('default' => 'mm', 'size' => '50') ) ?>');"></div>
											<span class="author">By <span class="author-name"><?php the_author(); ?></span></span>
											<br/><span class="date"><?php the_date(); ?></span>
										</p>
									</div>
									<div class="excerpt">
										<?php //the_excerpt(); ?>
									</div>
									<div class="btn-container">
										<a href="<?php the_permalink(); ?>" class="btn">Read More</a>
									</div>
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
