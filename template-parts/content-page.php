<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cornerstone_Main
 */

?>

<article class="article page-article overlapping">
	<?php 
	$contentPaddingClass = '';
	if(is_page_template('template-full-page.php') && get_field('show_title')): 
		$contentPaddingClass = 'vertical-space'
		?>
	<div class="article-title-container">
		<h1 class="article-title"><?php the_title(); ?></h1>
	</div>
	<?php endif; ?>

	<div class="article-content <?php echo $contentPaddingClass; ?>">
		<?php the_content(); ?>
	</div>
</article>
