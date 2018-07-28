<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cornerstone_Main
 */

?>

	</div><!-- #content -->
	<?php 
	if (!is_front_page()):
	if (is_single() || is_page() || get_post_type() == 'event' || get_post_type() == 'location'): ?>
	<?php edit_post_link('<i class="fas fa-edit"></i>', NULL, NULL, NULL, 'post-edit-floater'); ?> 
	<?php endif; endif;?>
	<footer id="colophon" class="site-footer">
		<nav class="footer-nav">
			<div class="wrapper-medium">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'footer-menu-1',
						'menu_id'        => 'footer-menu',
					));
				?>
			</div>
		</nav>
		<div class="wrapper-medium row footer-main">
			<div class="column large-4 small-12">
				<h2>Follow us on social media</h2>
				<ul class="social-links">
					<li class="social-link"><a href="#"><i class="fab fa-facebook-square"></i></a></li>
					<li class="social-link"><a href="#"><i class="fab fa-twitter"></i></a></li>
					<li class="social-link"><a href="#"><i class="fab fa-instagram"></i></a></li>
					<li class="social-link"><a href="#"><i class="fab fa-youtube"></i></a></li>
				</ul>
			</div>
			<div class="column large-4 small-12">
				<div class="details">
					<h2>Business Office Address</h2>
					<p>2nd Level Robinsons Novaliches, Novaliches Quezon City</p>
				</div>
			</div>
			<div class="column large-4 small-12">
				<div class="details">
					<h2>Contact Numbers</h2>
					<p>+63-2-332-8743  |  +63-905-501-0165</p>
				</div>
			</div>
		</div>
		<div class="wrapper-medium">
			<div class="footer-info">
				<div class="divider"></div>
				<img src="<?php echo get_template_directory_uri().'/dist/images/logo/cs_white.png' ?>" alt="Cornerstone" class="footer-logo">
				<p class="info">&copy; <?php echo date('Y'); ?> Cornerstone Global Inc. All rights reserved.</p>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
