<?php 
// Custom loop args
$blogQuery = new WP_Query(array(
    'post_type' 			=> 'post',
    'posts_per_page' 		=> '3',
));

$featuredPostID = get_field('featured_blog_post','option')->ID;
// echo '<pre>';
// print_r( $featuredPostID );
// echo '</pre>';
?>

<!-- BLOG POSTS -->
<section class="latest-blog-posts">
    <div class="wrapper-medium row">

        <?php if ($featuredPostID): // if there is a featured post ?>

        <div class="featured-post column small-12 medium-5">
            <div class="card" style="background-image: url(<?php echo get_the_post_thumbnail_url( $featuredPostID, 'bg-medium' ) ?>);">
            <div class="sizer"></div>
            </div>
        </div>

        <div class="latest-posts half column small-12 medium-7">

        <?php else: // if none then make latest posts take up the whole space ?>
        <div class="latest-posts full column small-12">
        <?php endif; 
        
        if ( $blogQuery->have_posts() ) : ?>
            <!-- <h2 class="column-title">Latest Blog Posts</h2> -->
            
        <?php while ( $blogQuery->have_posts() ) : $blogQuery->the_post(); ?>
            
            <article class="blog-post clearfix">
                <img src="<?php the_post_thumbnail_url( 'square-medium' ) ?>" alt="<?php the_title(); ?>" class="thumbnail">
                <div class="text">
                    <h3 class="article-title"><?php the_title(); ?></h3>
                    <p class="excerpt"><?php the_excerpt() ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn">Read More</a>
                </div>
            </article>

        <?php 
        endwhile; 
        endif; 
        wp_reset_postdata();
        ?>

        </div>
    </div>
</section>