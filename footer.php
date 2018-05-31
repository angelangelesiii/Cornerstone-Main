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
		<div class="wrapper-medium">
			<h2>Follow us on social media</h2>
			<ul class="social-links">
				<li class="social-link"><a href="#"><i class="fab fa-facebook-square"></i></a></li>
				<li class="social-link"><a href="#"><i class="fab fa-twitter"></i></a></li>
				<li class="social-link"><a href="#"><i class="fab fa-instagram"></i></a></li>
				<li class="social-link"><a href="#"><i class="fab fa-youtube"></i></a></li>
			</ul>
		</div>
		<div class="wrapper-medium">
			<div class="details">
				<h2>Business Office Address</h2>
				<p>2nd Level Robinsons Novaliches, Novaliches Quezon City</p>
				<h2>Contact Numbers</h2>
				<p>+63-2-332-8743  |  +63-905-501-0165</p>
			</div>
			<div class="footer-info">
				<p>&copy; <?php echo date('Y'); ?> Cornerstone Global Inc.</p>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
