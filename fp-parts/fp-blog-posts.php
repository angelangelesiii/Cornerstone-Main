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

        <?php while (have_rows('featured_blog_posts','options')): the_row(); 
        $fallbackImage = wp_get_attachment_image_url( get_field('fallback_thumbnail','options'), 'bg_small');
        $postID = get_sub_field('featured_post');
        ?>

        <article class="blog-slider-item featured-item">
            <?php if(has_post_thumbnail($postID)): ?>
            <div class="content" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_sub_field('featured_post'), 'bg_small' ) ?>);">
            <?php else: ?>
            <div class="content" style="background-image: url(<?php echo $fallbackImage; ?>);">
            <?php endif; ?>
                <span class="label">Featured</span>
                <a href="<?php echo get_the_permalink(get_sub_field('featured_post')); ?>">
                    <div class="link-overlay">
                        
                    </div>
                </a>
                
                <div class="inner">
                    <div class="category">
                        <?php $categoryName = get_the_category($postID)[0];
                        // var_dump( $categoryName );
                        ?>
                        <a href="<?php echo get_term_link($categoryName); ?>"><?php echo $categoryName->name; ?></a>
                    </div>
                    <h3 class="title"><a href="<?php echo get_the_permalink(get_sub_field('featured_post')); ?>"><?php echo get_the_title(get_sub_field('featured_post')); ?></a></h3>
                </div>
            </div>
        </article>

        <?php 
        $featuredPostIDcollection[] = get_sub_field('featured_post');
        endwhile;
        endif; 
        ?>

        
        
    </div>

</section>