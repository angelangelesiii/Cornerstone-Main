<!-- INTRO TO CORNERSTONE -->

<section class="cs-video clearfix">
    <div class="video-window">
        <?php 
        $videoGroup = get_field('intro_segment', 'options');
        $thumbnail = wp_get_attachment_image_url( $videoGroup['video_link_thumbnail'], 'bg-medium' );
        $youtubeSrc = str_replace('/watch?v=', '/embed/', $videoGroup['video_youtube']);
        ?>

        <div class="video-image" style="background-image: url(<?php echo $thumbnail; ?>);">

        <a href="javascript:void(0);" data-modal="#cs-video-modal" class="modal-button cs-video-button" data-video-src="<?php echo $youtubeSrc; ?>"><span class="overlay">
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
        <iframe width="560" height="315" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen allowscriptaccess="always"></iframe>
    </div>
</div>