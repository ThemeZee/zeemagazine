<?php
/**
 * Implement theme options in the Customizer
 *
 * @package zeeMagazine
 */

 
// Load Customizer Helper Functions
require( get_template_directory() . '/inc/customizer/functions/custom-controls.php' );
require( get_template_directory() . '/inc/customizer/functions/sanitize-functions.php' );
require( get_template_directory() . '/inc/customizer/functions/callback-functions.php' );

// Load Customizer Section Files
require( get_template_directory() . '/inc/customizer/sections/customizer-general.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-post.php' );


/**
 * Registers Theme Options panel and sets up some WordPress core settings
 *
 */
function zeemagazine_customize_register_options( $wp_customize ) {

	// Add Theme Options Panel
	$wp_customize->add_panel( 'zeemagazine_options_panel', array(
		'priority'       => 180,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Theme Options', 'zeemagazine' ),
		'description'    => '',
	) );
	
	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
} // zeemagazine_customize_register_options()
add_action( 'customize_register', 'zeemagazine_customize_register_options' );


/**
 * Embed JS file to make Theme Customizer preview reload changes asynchronously.
 *
 */
function zeemagazine_customize_preview_js() {
	wp_enqueue_script( 'zeemagazine-customizer-js', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20150723', true );
}
add_action( 'customize_preview_init', 'zeemagazine_customize_preview_js' );


/**
 * Embed CSS styles for the theme options in the Customizer
 *
 */
function zeemagazine_customize_preview_css() {
	wp_enqueue_style( 'zeemagazine-customizer-css', get_template_directory_uri() . '/css/customizer.css', array(), '20150723' );
}
add_action( 'customize_controls_print_styles', 'zeemagazine_customize_preview_css' );