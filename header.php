<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cornerstone_Main
 */

function belt_menu_call($menuID = 'belt-menu') {
	echo '<nav id="belt-menu-nav"> <div class="wrapper-big">';
		wp_nav_menu( array(
			'theme_location' => 'belt-menu',
			'menu_id'        => $menuID,
		) );
	echo '</div> </nav>';
	return $menuID;
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta name="theme-color" content="#000000">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cornerstone-main' ); ?></a>

	<div id="top"></div>
	<header id="mainheader" class="full-header top-position
		<?php
		if (!is_front_page()) echo 'nfp';
		?>
	">
		<div class="navbar-bg"></div>
		<div class="wrapper-header">
			<nav id="mainnav" class="clearfix">
				<div class="logo-container">
					<a href="<?php bloginfo( 'url' ) ?>">
						<img src="<?php echo get_template_directory_uri().'/dist/images/logo/cs_white_block.png' ?>" alt="Cornerstone Logo" class="logo logo-white">
						<h1 id="website-title">CORNERSTONE</h1>
					</a>
				</div>
				<div class="menu-button-container clearfix">
					<button class="menu-button" id="mainmenubutton">
						<span class="bar"></span>
						<span class="bar"></span>
						<span class="bar"></span>
						<div class="hint hint--closed">Menu</div>
					</button>
				</div>
				<nav class="main-menu clearfix" id="mainmenupanel">
					<!-- <div class="spacer"></div> -->
					<div class="header-menu-container custom-scrollbar">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'header-menu-1',
								'menu_id'        => 'header-menu',
							) );
						?>
					</div>
				</nav>
			</nav>

			<nav id="belt-menu-alt-nav">
				<div class="wrapper-big">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'belt-menu',
							'menu_id'        => 'belt-menu-alt',
						) );
					?>
				</div>
			</nav>
		</div>

		<?php //hero banner
		$heroBannerClasses = 'hero-banner '.'type-'.get_post_type( $post->ID );
		if(is_front_page()):
			$heroBannerClasses .=' full-section';
		elseif(is_home() || is_archive() || is_search()):
			$heroBannerClasses .=' blog-hero';
		else:
			$heroBannerClasses .= ' post-banner';
		endif;
		
		if(is_front_page()): // ===== IF YOU ARE IN THE FRONT PAGE

			$hero = get_field('hero_banner_group', 'options');
			if (get_field('use_temporary_hero_banner', 'options')) { // use alternate hero banner
				$hero = get_field('alternate_hero_banner_group', 'options');
			}
			$heroImage = get_template_directory_uri().'/dist/images/background/placeholder.jpg';
			$heroFront = get_template_directory_uri().'/dist/images/hero-1.png';

			// Hero Background
			if ($hero['background_image']) $heroImage = wp_get_attachment_image_src( $hero['background_image'], 'bg_large')[0];

			// Hero Image
			if ($hero['image']) $heroFront = wp_get_attachment_image_src( $hero['image'], 'bg_large')[0];

			// Hero Link
			$heroLinkText = "Learn More";
			if ($hero['link_text']) $heroLinkText = $hero['link_text'];

			$heroLinkURL = get_home_url();
			if ($hero['link_url']) $heroLinkURL = $hero['link_url'];

			?>
			
			<!-- Hero Banner -->
			<section class="<?php echo $heroBannerClasses; ?>" style="background-image: url(<?php echo $heroImage ?>);" data-dim="<?php echo ($hero['dim_intensity']*0.01); ?>">

			<?php if($hero['background_select'] == 'image'): // PARALLAX IMAGE BACKGROUND ?>

				<div class="parallaxBG" style="background-image: url(<?php echo $heroImage; ?>);"></div>
				<div class="overlay" style="opacity: <?php echo ($hero['dim_intensity']*0.01); ?>;"></div>
				<div class="shadow"></div>
				<div class="hero-container">
					<div class="wrapper">
						<img src="<?php echo $heroFront; ?>" alt="" class="hero-image">
					</div>
					<a href="<?php echo $heroLinkURL ?>" class="btn btn--white btn--large"><?php echo $heroLinkText ?></a>
				</div>

			<?php elseif ($hero['background_select'] == 'video'): // VIDEO BACKGROUND ?>
				
				<video id="front-page-video" playsinline autoplay muted loop data-keepplaying>
					<source src="<?php echo $hero['background_video']; ?>" type="video/mp4">
				</video>
				<div class="overlay" style="opacity: <?php echo ($hero['dim_intensity']*0.01); ?>;"></div>
				<div class="hero-container">
					<div class="wrapper">
						<img src="<?php echo get_template_directory_uri().'/dist/images/hero-1.png' ?>" alt="" class="hero-image">
					</div>
					<a href="<?php echo $heroLinkURL ?>" class="btn btn--white btn--large"><?php echo $heroLinkText ?></a>
				</div>

			<?php endif; ?>


				<div id="belt-menu-trigger"></div>
				<?php belt_menu_call(); ?>
			</section>

		<!-- <?php print_r($hero); ?> -->

		<?php elseif(is_home() || is_archive() || is_search()): // ===== IF YOU ARE IN THE BLOG PAGE OR ARCHIVE OR SEARCH ?>

		<!-- Home Banner -->
		<section class="<?php echo $heroBannerClasses; ?>" >
			<?php belt_menu_call(); ?>
		</section>

		<?php elseif(!has_post_thumbnail( $post->ID ) || is_404() || is_page_template('template-full-page.php')): // ===== IF POST HAS NO THUMBNAIL OR 404 ?>

		<section class="<?php echo $heroBannerClasses; ?> no-thumbnail">
			<?php belt_menu_call(); ?>
		</section>

		<?php else: // ===== ELSE... ?>

		<!-- Post Banner -->
		<section class="<?php echo $heroBannerClasses; ?>" style="background-image: url(<?php echo get_the_post_thumbnail_url( $post->ID, 'bg_medium' ) ?>);">
			<div class="parallaxBG" style="background-image: url(<?php echo get_the_post_thumbnail_url( $post->ID, 'bg_medium' ) ?>);"></div>
			<div class="overlay" style="opacity: <?php echo ($hero['dim_intensity']*0.01); ?>;"></div>
			<?php belt_menu_call(); ?>
		</section>

		<?php endif; ?>
		
	</header>

	<div id="menu-overlay"></div>

	<?php
	$thumbnailSiteClass = '';
	if (!has_post_thumbnail($post->ID)) $thumbnailSiteClass = 'no-thumbnail';
	?>
	<div id="content" class="site-content <?php echo $thumbnailSiteClass; ?>">

		
