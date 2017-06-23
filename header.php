<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Solebroadway_Theme_1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body id="start" <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'solebroadway-theme-1' ); ?></a>

	<nav id="solebroadway-nav" class="navbar navbar-default navbar-not-front">
			
		<div class="container-fluid">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo get_home_url(); ?>">
					Solebroadway Inc
				</a>
			</div>

			<?php
				wp_nav_menu( array(
					'menu'					=> 'menu-under-header',
					'theme_location'		=> 'menu-under-header',
					'depth'					=> 2,
					'container'				=> 'div',
					'container_class'		=> 'collapse navbar-collapse',
					'container_id'			=> 'bs-example-navbar-collapse-1',
					'menu_class'			=> 'nav navbar-nav navbar-right',
					'fallback_cb'			=> 'WP_Bootstrap_Navwalker::fallback',
					'walker'				=> new WP_Bootstrap_Navwalker())
				);
			?>

		</div>

	</nav><!-- /.navbar -->

	<?php if( is_page( 'about' ) ) : ?>
		
		<div class="shop-header">
			<h1>About</h1>
			<?php woocommerce_breadcrumb(); ?>
		</div><!-- /.shop-header -->

	<?php endif; ?>

	<?php if( is_page( 'contact-us' ) ) : ?>
		
		<div class="shop-header">
			<h1>Contact Us</h1>
			<?php woocommerce_breadcrumb(); ?>
		</div><!-- /.shop-header -->

	<?php endif; ?>

	<?php if( is_page( 'terms-conditions' ) ) : ?>
		
		<div class="shop-header">
			<h1>Terms &amp; Conditions</h1>
			<?php woocommerce_breadcrumb(); ?>
		</div><!-- /.shop-header -->

	<?php endif; ?>

	<div id="content" class="site-content">
