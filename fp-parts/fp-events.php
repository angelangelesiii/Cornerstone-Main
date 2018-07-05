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

    <div class="wrapper-medium">

        <div class="row medium-up-3 small-up-1">
            <?php while($eventQuery->have_posts()): // main loop ?>
            <article class="event-item">

            </article>        
            <?php endwhile; ?>
        </div>
    
    </div>
    
</section>

<?php endif; ?>