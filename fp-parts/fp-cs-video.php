<!-- INTRO TO CORNERSTONE -->

<section class="cs-video clearfix">
    <div class="video-window">
        <div class="video-image" style="background-image: url(<?php echo get_template_directory_uri().'/dist/images/background/outreach_2.jpg' ?>);">
        <a href="javascript:void(0);" data-modal="#cs-video-modal" class="modal-button cs-video-button"><span class="overlay">
            <i class="fas fa-play play-icon"></i>
        </span></a>
        </div>
    </div>
    <div class="text-window">
        <div class="text">
        <?php
        $intro = get_field('intro_segment', 'options');
        ?>
            <h3>
                <?php if($intro['heading']): 
                    echo $intro['heading'];
                else:
                    echo 'Lorem Ipsum Dolor';
                endif;  
                ?>
            </h3>
            <?php if ($intro['subtext']):
                echo '<p>'.$intro['subtext'].'</p>';
            else: ?>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis iusto suscipit vel enim? Tempora, reiciendis blanditiis! Debitis maiores hic possimus eos.</p>
            <?php endif; ?>
        </div>
    </div>
    
</section>

<div class="modal video-modal youtube-video" id="cs-video-modal">
    <div class="modal-inner">
        <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/gysmSobGxSM?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
</div>