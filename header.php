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

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta name="theme-color" content="#3F9AB1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cornerstone-main' ); ?></a>

	<div id="top"></div>
	<header id="mainheader" class="full-header top-position">
		<div class="navbar-bg"></div>
		<div class="wrapper-header">
			<nav id="mainnav" class="clearfix">
				<div class="logo-container">
					<a href="<?php the_permalink(); ?>">
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
					<div class="spacer"></div>
					<div class="header-menu-container">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'header-menu-1',
								'menu_id'        => 'header-menu',
							) );
						?>
					</div>
				</nav>
			</nav>
		</div>
		<section class="full-section hero-banner" style="background-image: url(<?php echo get_template_directory_uri().'/dist/images/background/placeholder.jpg' ?>);">
			<div class="parallaxBG" style="background-image: url(<?php echo get_template_directory_uri().'/dist/images/background/placeholder.jpg' ?>);"></div>
			<div class="overlay"></div>
			<div class="hero-container">
				<div class="wrapper">
					<img src="<?php echo get_template_directory_uri().'/dist/images/hero-1.png' ?>" alt="" class="hero-image">
				</div>
				<a href="javascript:void(0)" class="btn btn--white btn--large">Find us near you</a>
			</div>
			<div id="belt-menu-trigger"></div>
			<nav id="belt-menu-nav">
				<div class="wrapper-big">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'belt-menu',
							'menu_id'        => 'belt-menu',
						) );
					?>
				</div>
			</nav>
		</section>
	</header>

	<div id="menu-overlay"></div>

	
	<div id="content" class="site-content">

		
