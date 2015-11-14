<?php
/***
 * Header Content
 *
 * Displays the social icons menu and header widgets in the main header area
 *
 * @package zeeMagazine
 */

?>

	<div id="header-content" class="header-content clearfix">
		
		<?php
		// Check if there is a social menu
		if( has_nav_menu( 'social' ) ) : ?>

			<div id="header-social-icons" class="social-icons-navigation clearfix">

				<?php
				// Display Social Icons Menu
				wp_nav_menu( array(
					'theme_location' => 'social',
					'container' => false,
					'menu_class' => 'social-icons-menu',
					'echo' => true,
					'fallback_cb' => '',
					'link_before' => '<span class="screen-reader-text">',
					'link_after' => '</span>',
					'depth' => 1
					)
				); 
				?>
			
			</div>
		
		<?php endif;
		
		// Display Header Widgets
		if( is_active_sidebar( 'header' ) ) : ?>
			
			<div class="header-widgets clearfix">
					
				<?php dynamic_sidebar( 'header' ); ?>
					
			</div><!-- .header-widgets -->
		
		<?php endif; ?>

	</div>