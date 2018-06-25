
<?php if (have_rows('featured_posts', 'options')): ?>
<!-- FEATURED SLIDER -->

<section class="featured-section">
    
    <div class="featured-slider-container">

    <?php while (have_rows('featured_posts', 'options')): the_row(); //While there is a row in featured posts 
    
    $featuredID = get_sub_field('featured_post');
    
    ?>
        <div class="featured-item relative-parent" style="background-image: url(<?php echo get_the_post_thumbnail_url( $featuredID, 'bg_medium' ); ?>)">
            <div class="overlay"></div>
            <div class="featured-content center-center">
                <h2 class="title"><?php echo get_the_title( $featuredID ); ?></h2>
                <a href="<?php echo get_the_permalink( $featuredID ) ?>" class="btn btn--white">Read More</a>
            </div>
        </div>
    <?php endwhile; // end while loop ?>
        
    </div>

</section>


<?php endif; ?>