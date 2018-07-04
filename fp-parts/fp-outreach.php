<!-- OUTREACH -->

<?php 
// Define outreach parallax strength
$outreach = get_field('outreach_segment','options');
$parallaxStrength = '40';
if ($outreach) $parallaxStrength = $outreach['outreach_parallax_strength'];
?>

<?php $outreachBG = wp_get_attachment_image_src( $outreach['outreach_bg'], 'bg_medium')[0]; ?>

<section class="outreach-section" style="background-image: url(<?php echo $outreachBG; ?>);" data-parallax-strength="<?php echo $parallaxStrength; ?>">
    <div class="shadow"></div><div class="shadow"></div>
    <img src="<?php echo $outreachBG; ?>" alt="" class="outreach-bg invisible-sizer">
    <img src="<?php echo $outreachBG; ?>" alt="" class="outreach-bg outreach-parallax-bg" style="
        top:-<?php echo ($parallaxStrength/2) ?>%;
        transform: translateX(-<?php echo ($parallaxStrength/4) ?>%) scale(1.<?php echo ($parallaxStrength*0.5) ?>);
        right: 0;
    ">
    
    <div class="overlay"></div>
    
    <div class="content">
        <div class="wrapper-big">
            <div class="text" style="<?php 
            if ($outreach['outreach_text_position'] == 'right') {
                echo 'margin: 0 0 0 auto; ';
            } elseif ($outreach['outreach_text_position'] == 'center') {
                echo 'margin: 0 auto; ';
            }
            if ($outreach['outreach_text_align'] == 'left') {
                echo 'text-align: left; ';
            } elseif ($outreach['outreach_text_align'] == 'right') {
                echo 'text-align: right; ';
            }
            ?>">
                <h2 class="title">
                    <?php 
                    if ($outreach['outreach_heading']) {
                        echo $outreach['outreach_heading'];
                    } else {
                        echo 'Please Edit This Heading in The Site Options Menu';
                    }
                    ?>
                </h2>
                <p class="subtext">
                <?php 
                    if ($outreach['outreach_subtext']) {
                        echo $outreach['outreach_subtext'];
                    } else {
                        echo 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem quod totam sapiente.';
                    }
                ?>
                </p>
                <?php if($outreach['show_link']): ?>
                    <p><a href="<?php echo $outreach['link_button_url']; ?>" class="btn btn--white btn--large"><?php echo $outreach['link_button_text']; ?></a></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
</section>