<!-- OUTREACH -->

<?php 
// Define outreach parallax strength
$outreach = get_field('outreach_segment','options');
$parallaxStrength = '40';
if ($outreach) $parallaxStrength = $outreach['outreach_parallax_strength'];
?>

<section class="outreach-section" style="background-image: url(<?php echo get_template_directory_uri().'/dist/images/background/outreach_2.jpg' ?>);" data-parallax-strength="<?php echo $parallaxStrength; ?>">
    <div class="shadow"></div><div class="shadow"></div>
    <img src="<?php echo get_template_directory_uri().'/dist/images/background/outreach_2.jpg' ?>" alt="" class="outreach-bg invisible-sizer">
    <img src="<?php echo get_template_directory_uri().'/dist/images/background/outreach_2.jpg' ?>" alt="" class="outreach-bg outreach-parallax-bg" style="
        top:-<?php echo ($parallaxStrength/2) ?>%;
        transform: translateX(-<?php echo ($parallaxStrength/4) ?>%) scale(1.<?php echo ($parallaxStrength*0.5) ?>);
        right: 0;
    ">
    
    
    <div class="content">
        <div class="wrapper-medium">
            <div class="text">
                <h2 class="title">Helping the least of these</h2>
                <p class="subtext">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab provident laudantium consectetur voluptatum.</p>
                <p><a href="#" class="btn btn--white">Give Now</a></p>
            </div>
        </div>
    </div>
    
</section>