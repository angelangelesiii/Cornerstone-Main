

<!-- UPDATES -->
<section class="latest-updates">

    <div class="wrapper-medium">
        <div class="row clearfix">

            <!-- EVENTS -->
            <div class="latest-events-column column medium-6 small-12">
                <?php // Custom loop args for EVENTS
                $eventQuery = new WP_Query(array(
                    'post_type' 			=> 'event',
                    'posts_per_page' 		=> '3',
                    'meta_key'				=> 'start_date',
                    'orderby'				=> 'meta_value',
                    'order'					=> 'ASC',
                    'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
                        array(
                            'key' => 'start_date', // Check the start date field
                            'value' => date("Y-m-d"), // Set today's date (note the similar format)
                            'compare' => '>=', // Return the ones greater than or equal to today's date
                            'type' => 'DATE' // Let WordPress know we're working with date
                        )
                    )
                ));
                // if custom loop have posts (event)
                if($eventQuery->have_posts()): ?>
                <h1 class="column-title">Upcoming Events</h1>
                <div class="latest-events-container">
                    <?php while ($eventQuery->have_posts()): $eventQuery->the_post(); ?>
                    <?php 
                    $month = date('M', strtotime(get_field('start_date')));
                    $day = date('j', strtotime(get_field('start_date'))); ?>
                    <article class="event-item clearfix">
                        <div class="date-block">
                            <div class="contents">
                                <span class="month"><?php echo $month; ?></span>
                                <span class="day"><?php echo $day ?></span>
                            </div>
                        </div>
                        <div class="event-details">
                            <h2 class="event-title post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p class="address"><?php the_field('address_to_display'); ?></p>
                            <hr/>
                        </div>
                    </article>
                    <?php endwhile; ?>
                    <p class="button-container">
                        <a href="<?php echo home_url( '/events', 'relative' ) ?>" class="read-more-btn btn--white">View All Events &raquo;</a>
                    </p>
                </div>
                <?php endif; 
                wp_reset_postdata(); ?>
            </div>

            <!-- POSTS -->
            <div class="latest-posts-column column medium-6 small-12">
            <?php // Custom loop args for BLOG POSTS
                $eventQuery = new WP_Query(array(
                    'post_type' 			=> ';post',
                    'posts_per_page' 		=> '3',
                ));
                // if custom loop have posts (event)
                if($eventQuery->have_posts()): ?>
                <h1 class="column-title">Latest Posts</h1>
                <div class="latest-posts-container">
                    <?php while ($eventQuery->have_posts()): $eventQuery->the_post(); ?>
                    <article class="blog-post">
                        <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="blog-item">
                            <div class="item-meta category">
                                <?php $categoryName = get_the_category($post->ID)[0];
                                // var_dump( $categoryName );
                                ?>
                                <a href="<?php echo get_term_link($categoryName); ?>"><?php echo $categoryName->name; ?></a>
                            </div>
                            <div class="item-meta author">
                                By <?php the_author(); ?> <?php the_date( 'F j, Y', ' on '); ?>
                            </div>
                        </div>
                        
                    </article>
                    <?php endwhile; ?>
                    <p class="button-container">
                        <a href="<?php echo home_url( '/blog', 'relative' ) ?>" class="read-more-btn btn--white">View More Posts &raquo;</a>
                    </p>
                </div>
                <?php endif; 
                wp_reset_postdata(); ?>
            </div>  
        </div>
    </div>
</section>