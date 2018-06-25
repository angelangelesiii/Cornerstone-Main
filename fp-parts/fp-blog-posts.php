<?php 

$featuredPostID = get_field('featured_blog_post','option')->ID;
// echo '<pre>';
// print_r( $featuredPostID );
// echo '</pre>';

$featuredPostIDcollection = array();

?>

<!-- BLOG POSTS -->
<section class="blog-posts">
        
    <div class="blog-slider-container">

        <?php if (have_rows('featured_blog_posts','options')): ?>
        
        <!-- Featured Posts -->

        <?php while (have_rows('featured_blog_posts','options')): the_row(); ?>

        <article class="blog-slider-item featured-item">
            <div class="content" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_sub_field('featured_post'), 'bg_small' ) ?>);">
                <span class="label">Featured</span>
                <a href="<?php echo get_the_permalink(get_sub_field('featured_post')); ?>">
                    <div class="link-overlay">
                        
                    </div>
                </a>
                <a href="<?php echo get_the_permalink(get_sub_field('featured_post')); ?>">
                    <h3 class="title"><?php echo get_the_title(get_sub_field('featured_post')); ?></h3>
                </a>
            </div>
        </article>

        <?php 
        $featuredPostIDcollection[] = get_sub_field('featured_post');
        endwhile;
        endif; 
        ?>

        <?php 
        // Custom loop args
        $blogQuery = new WP_Query(array(
            'post_type' 			=> 'post',
            'posts_per_page' 		=> '5',
            'post__not_in'          => $featuredPostIDcollection,
        ));

        if ( $blogQuery->have_posts() ) : // If have posts ?>

        <!-- Latest Posts -->
            
        <?php while ( $blogQuery->have_posts() ) : $blogQuery->the_post(); // Start loop?>

        <article class="blog-slider-item">
            <div class="content" style="background-image: url(<?php the_post_thumbnail_url( 'bg_small' ); ?>);">
                <a href="<?php the_permalink(); ?>">
                    <div class="link-overlay">
                        
                    </div>
                </a>
                <a href="<?php the_permalink(); ?>">
                    <h3 class="title"><?php the_title(); ?></h3>
                </a>
            </div>
        </article>
            
    
        <?php 
        // Close latest posts loop
        endwhile; 
        endif; 
        wp_reset_postdata();
        ?>
        
    </div>

</section>