<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package zeeMagazine
 */
 
// Get Theme Options from Database
$theme_options = zeemagazine_theme_options();
	
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="hfeed site">
		
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'zeemagazine' ); ?></a>
		
		<header id="masthead" class="site-header clearfix" role="banner">
			
			<div class="header-main clearfix">
						
				<div id="logo" class="site-branding clearfix">
				
					<?php do_action('zeemagazine_site_title'); ?>
				
				</div><!-- .site-branding -->
				
				<div class="header-content-wrap">
				
					<?php get_template_part( 'template-parts/header-content' ); ?>
				
				</div>

			</div><!-- .header-main -->
			
			<nav id="main-navigation" class="primary-navigation navigation clearfix" role="navigation">
				<?php 
					// Display Main Navigation
					wp_nav_menu( array(
						'theme_location' => 'primary', 
						'container' => false, 
						'menu_class' => 'main-navigation-menu', 
						'echo' => true, 
						'fallback_cb' => 'zeemagazine_default_menu')
					);
				?>
			</nav><!-- #main-navigation -->
		
		</header><!-- #masthead -->
		
		<?php // Display Custom Header Image
		zeemagazine_header_image(); ?>
		
		<div id="content" class="site-content clearfix">
		