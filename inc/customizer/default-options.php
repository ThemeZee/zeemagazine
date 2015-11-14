<?php
/**
 * Returns theme options
 *
 * Uses sane defaults in case the user has not configured any theme options yet.
 *
 * @package zeeMagazine
 */


/**
 * Get saved user settings from database or theme defaults
 *
 * @return array
 */
function zeemagazine_theme_options() {
    
	// Merge Theme Options Array from Database with Default Options Array
	$theme_options = wp_parse_args( 
		
		// Get saved theme options from WP database
		get_option( 'zeemagazine_theme_options', array() ), 
		
		// Merge with Default Options if setting was not saved yet
		zeemagazine_default_options() 
		
	);

	// Return theme options
	return $theme_options;
	
}


/**
 * Returns the default settings of the theme
 *
 * @return array
 */
function zeemagazine_default_options() {

	$default_options = array(
		'layout' 							=> 'right-sidebar',
		'post_content' 						=> 'excerpt',
		'excerpt_length' 					=> 40,
		'post_thumbnail_archives'			=> true,
		'post_thumbnail_single'				=> true,
		'meta_date'							=> true,
		'meta_author'						=> true,
		'meta_category'						=> true,
		'meta_comments'						=> true,
		'meta_tags'							=> true
	);
	
	return $default_options;
}