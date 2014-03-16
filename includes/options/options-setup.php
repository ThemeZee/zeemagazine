<?php
/***
 * Setup Theme Options
 *
 * Includes all settings from the /includes/options/settings/ folder
 * (setting arrays are splitted in multiple files for reasons of clarity)
 *
 * Defines the theme options array containing all tabs, sections and settings.
 * Contain functions to display the welcome screen and sidebar content on options screen.
 *
 */

// Include all Setting Files
require( get_template_directory() . '/includes/options/settings/settings-general.php' );
require( get_template_directory() . '/includes/options/settings/settings-colors.php' );
require( get_template_directory() . '/includes/options/settings/settings-frontpage.php' );


// Creates theme options array with all sections and settings
function themezee_options_array() {

	/* Section and Setting functions come from setting files included above */
	
	$theme_options = array();
	
	$theme_options['general'] = array(
			"name" => __('General', 'zeeMagazine_language'),
			"sections" => themezee_sections_general(),
			"settings" => themezee_settings_general());
	
	$theme_options['colors'] = array(
			"name" => __('Colors', 'zeeMagazine_language'),
			"sections" => themezee_sections_colors(),
			"settings" => themezee_settings_colors());
			
	$theme_options['frontpage'] = array(
			"name" => __('Front Page', 'zeeMagazine_language'),
			"sections" => themezee_sections_frontpage(),
			"settings" => themezee_settings_frontpage());
	
	return $theme_options;
}
	

// Display Sidebar
function themezee_options_sidebar() {
	$theme_data = wp_get_theme(); 
?>

	<dl><dt><h4><?php _e('Theme Data', 'zeeMagazine_language'); ?></h4></dt>
		<dd>
			<p><?php _e('Name', 'zeeMagazine_language'); ?>: <?php echo $theme_data->Name; ?><br/>
			<?php _e('Version', 'zeeMagazine_language'); ?>: <b><?php echo $theme_data->Version; ?></b>
			<a href="<?php echo get_template_directory_uri(); ?>/changelog.txt" target="_blank"><?php _e('(Changelog)', 'zeeMagazine_language'); ?></a><br/>
			<?php _e('Author', 'zeeMagazine_language'); ?>: <a href="http://themezee.com/" target="_blank">ThemeZee</a><br/>
			</p>
		</dd>
	</dl>
	
	<dl><dt><h4><?php echo $theme_data->Name; ?> <?php _e('Quick Links', 'zeeMagazine_language'); ?> </h4></dt>
		<dd>
			<ul>
				<li><a href="http://themezee.com/themes/zeemagazine/#PROVersion-1" target="_blank"><?php _e('Learn more about the PRO Version', 'zeeMagazine_language'); ?></a></li>
				<li><a href="http://themezee.com/docs/" target="_blank"><?php _e('Theme Documentation', 'zeeMagazine_language'); ?></a></li>
				<li><a href="http://wordpress.org/support/view/theme-reviews/zeemagazine" target="_blank"><?php _e('Rate zeeMagazine on wordpress.org', 'zeeMagazine_language'); ?></a></li>
			</ul>
		</dd>
	</dl>
	
	<dl><dt><h4><?php _e('Subscribe Now', 'zeeMagazine_language'); ?></h4></dt>
		<dd>
			<p><?php _e('Subscribe now and get informed about each <b>Theme Release</b> from ThemeZee.', 'zeeMagazine_language'); ?></p>
			<ul class="subscribe">
				<li><img src="<?php echo get_template_directory_uri(); ?>/includes/options/images/rss.png"/><a href="http://themezee.com/feed/" target="_blank"><?php _e('RSS Feed', 'zeeMagazine_language'); ?></a></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/includes/options/images/email.png"/><a href="http://feedburner.google.com/fb/a/mailverify?uri=Themezee" target="_blank"><?php _e('Email Subscription', 'zeeMagazine_language'); ?></a></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/includes/options/images/twitter.png"/><a href="http://twitter.com/ThemeZee" target="_blank"><?php _e('Follow me on Twitter', 'zeeMagazine_language'); ?></a></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/includes/options/images/facebook.png"/><a href="http://www.facebook.com/ThemeZee" target="_blank"><?php _e('Become a Facebook Fan', 'zeeMagazine_language'); ?></a></li>
			</ul>
		</dd>
	</dl>
	
	<dl><dt><h4><?php _e('Help to translate', 'zeeMagazine_language'); ?> </h4></dt>
		<dd>
			<p><?php _e('You want to use this WordPress theme in your native language? Then help out to translate it!', 'zeeMagazine_language'); ?></p>
			<p><a href="http://translate.themezee.org/projects/zeemagazine" target="_blank"><?php _e('Join the Online Translation Project', 'zeeMagazine_language'); ?></a></p>
		</dd>
	</dl>

<?php
}


// Display Welcome Page
function themezee_options_welcome_page() { 
	$theme_data = wp_get_theme();
	$pro_url = 'http://themezee.com/themes/zeemagazine/';
	$docs_url = '<a href="http://themezee.com/docs/" target="_blank">' . __('Theme Documentation', 'zeeMagazine_language') . '</a>';
?>
	<div id="themezee-admin-welcome">
		<h3><?php _e('Thank you for installing this theme!', 'zeeMagazine_language'); ?></h3>
		<div class="container">
			<h1><?php _e('Welcome to', 'zeeMagazine_language'); ?> <?php echo $theme_data->Name; ?></h1>
			<div class="welcome-intro">
				<?php _e("First of all, the theme options might alarm you, <b>but don't panic</b>. Everything is organized and documented well enough for you.", 'zeeMagazine_language'); ?>
			</div>
		</div>
		<div id="themezee-admin-welcome-columns" class="themezee-admin-clearfix">
			<div class="column-left">
				<h3><?php _e('Want more features?', 'zeeMagazine_language'); ?></h3>
				<div class="container">
					<h2><?php printf( _x('Upgrade to %s', 'PRO version', 'zeeMagazine_language'), $theme_data->Name .'Pro'); ?></h2>
					<p><?php _e('The <b>PRO Version</b> provide additional features to <b>customize</b> and configure your Theme.', 'zeeMagazine_language'); ?></p>
					<p><h4><?php _e('Some Pro Features:', 'zeeMagazine_language'); ?></h4>
						<ul>
							<li><?php _e('+ Custom Theme Colors', 'zeeMagazine_language'); ?></li>
							<li><?php _e('+ Unlimited Google Fonts', 'zeeMagazine_language'); ?></li>
							<li><?php _e('+ Header Content feature', 'zeeMagazine_language'); ?></li>
							<li><?php _e('+ Footer Widget areas', 'zeeMagazine_language'); ?></li>
							<li><?php _e('+ custom PRO Widgets', 'zeeMagazine_language'); ?></li>
						</ul>
						<a class="themezee-admin-button" href="<?php echo $pro_url; ?>#PROVersion-1" target="_blank"><?php _e('Learn more about the PRO Version', 'zeeMagazine_language'); ?></a>
					</p>
				</div>
			</div>
			<div class="column-right">
				<h3><?php _e('Need help?', 'zeeMagazine_language'); ?></h3>
				<div class="container">
					<h2><?php _e('About Theme Support', 'zeeMagazine_language'); ?></h2>
					<p><?php printf( _x('You can find <b>detailed tutorials</b> how to install and configure this theme on the %s pages.', 'theme docs link', 'zeeMagazine_language'), $docs_url); ?></p>
					<p><?php _e('<b>Video tutorials</b> and personal help via <b>support forum</b> is only available for purchasers of the PRO version.', 'zeeMagazine_language'); ?></p>
				</div>
				<h3><?php _e('Like this theme?', 'zeeMagazine_language'); ?></h3>
				<div class="container">
					<h2><?php _e('Support theme development', 'zeeMagazine_language'); ?></h2>
					<p><?php _e("If you like this free theme I'd highly appreciate your feedback. Thank you very much.", 'zeeMagazine_language'); ?></p>
					<p><a href="http://wordpress.org/support/view/theme-reviews/zeemagazine" target="_blank"><?php _e('Rate zeeMagazine on wordpress.org', 'zeeMagazine_language'); ?></a></p>
				</div>
			</div>
		</div>
		
		<h3><?php _e('Not happy with', 'zeeMagazine_language'); ?> <?php echo $theme_data->Name; ?>?</h3>
		<div class="container">
			<p>
				<?php _e('ThemeZee.com provide several other <b>free WordPress Themes</b>.', 'zeeMagazine_language'); ?>
				<a href="http://themezee.com/themes/" target="_blank"><?php _e('Click here to browse through all of my themes.', 'zeeMagazine_language'); ?></a>
			</p>
		</div>
	</div>
<?php
}
?>