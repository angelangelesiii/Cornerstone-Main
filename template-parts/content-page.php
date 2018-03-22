<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cornerstone_Main
 */

?>

<div class="wrapper-medium">
	<article class="article page-article overlapping">
		<div class="article-title-container">
			<h1 class="article-title"><?php the_title(); ?></h1>
		</div>
		<div class="article-content">
			<?php the_content(); ?>
		</div>
	</article>
</div>
