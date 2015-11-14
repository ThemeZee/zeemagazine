<?php
/**
 * General Settings
 *
 * Register General section, settings and controls for Theme Customizer
 *
 * @package zeeMagazine
 */


/**
 * Adds all general settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object
 */
function zeemagazine_customize_register_general_settings( $wp_customize ) {

	// Add Section for Theme Options
	$wp_customize->add_section( 'zeemagazine_section_general', array(
        'title'    => esc_html__( 'General Settings', 'zeemagazine' ),
        'priority' => 10,
		'panel' => 'zeemagazine_options_panel' 
		)
	);
	
	// Add Settings and Controls for Layout
	$wp_customize->add_setting( 'zeemagazine_theme_options[layout]', array(
        'default'           => 'right-sidebar',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'zeemagazine_sanitize_layout'
		)
	);
    $wp_customize->add_control( 'zeemagazine_control_layout', array(
        'label'    => esc_html__( 'Theme Layout', 'zeemagazine' ),
        'section'  => 'zeemagazine_section_general',
        'settings' => 'zeemagazine_theme_options[layout]',
        'type'     => 'radio',
		'priority' => 1,
        'choices'  => array(
            'left-sidebar' => esc_html__( 'Left Sidebar', 'zeemagazine' ),
            'right-sidebar' => esc_html__( 'Right Sidebar', 'zeemagazine' )
			)
		)
	);
	
}
add_action( 'customize_register', 'zeemagazine_customize_register_general_settings' );