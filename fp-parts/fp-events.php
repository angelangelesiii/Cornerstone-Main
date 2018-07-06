<?php 

// Custom loop args
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
if($eventQuery->have_posts()):
?>

<!-- UPCOMING EVENTS -->
<section class="upcoming-events">

    <div class="wrapper-big">

        <h1 class="section-title">Upcoming Events</h1>

        <div class="row large-up-3 small-up-1">
            <?php while($eventQuery->have_posts()): // main loop 
            $eventQuery->the_post();
            
            if(get_field('single_date_boolean') == 'false') { // date format
                $displayDate = date('M j', strtotime(get_field('start_date'))).' to '.date('M j, Y', strtotime(get_field('end_date')));
            } else {
                $displayDate = date('M j, Y', strtotime(get_field('start_date')));
            }
            ?>
            <article class="event-item column column-block">
                <div class="content clearfix">
                    <img src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" alt="<?php the_title(); ?>" class="event-thumbnail">
                    <div class="text-content">
                        <h2 class="event-name"><?php the_title(); ?></h2>
                        <div class="meta">
                            <span class="event-date"><?php echo $displayDate; ?></span>
                        </div>
                        <p class="read-more-container">
                            <a href="<?php the_permalink(); ?>" class="event-btn">View Event Details &raquo;</a>
                        </p>
                    </div>
                </div>
            </article>        
            <?php endwhile; ?>
        </div>
    
    </div>
    
</section>

<?php endif; ?>

<?php wp_reset_postdata(); ?>