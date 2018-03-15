<section class="grid-section">
    <div class="wrapper-medium">
        <div id="grid-container">
            <div class="grid-sizer"></div>
    
            <div class="grid-item wide-2 header">
                <div class="container">
                    <span class="grid-header">What's <br/>up in <br/>Cornerstone?</span>
                </div>
            </div>
        
            <?php 
    
            // POSTS
    
            // These arguments will be the filter that we'll use for the custom WordPress loop query.
            // $postCount = get_field('fp_latest_post_count','options');
            $args = array(
                'post_type'				=> 'post',
                'posts_per_page'		=> 20
            );
            
            // We'll create a new instance of WP_Query using $args.
            $gridQuery = new WP_Query($args);
            
            // Loop through the query (looks like the regular WordPress loop from here on).
            if($gridQuery->have_posts()): 
                while($gridQuery->have_posts()): $gridQuery->the_post();
    
                // output:
            ?>
        
            <div class="grid-item generated">
                <div class="container">
                    <img class="thumbnail" src="<?php echo the_post_thumbnail_url( 'masonry' ) ?>" alt="">
                    <!-- <div class="content">
                        <h3><?php the_title(); ?></h3>
                    </div> -->
                </div>
            </div>
                    
    
            <?php endwhile; ?>
    
    
            <?php endif; ?>
    
        </div>
    </div>
</section>