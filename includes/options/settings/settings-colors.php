<?php
	
	function themezee_sections_colors() {
		$themezee_sections = array();
		
		$themezee_sections[] = array("id" => "themeZee_colors_schemes",
					"name" => __('Predefined Color Schemes', 'zeeMagazine_language'));
		
		return $themezee_sections;
	}
	
	function themezee_settings_colors() {
	
		$color_schemes = array(
			'#725639' => __('Brown', 'zeeMagazine_language'),
			'#777777' => __('Gray', 'zeeMagazine_language'),
			'#2d912e' => __('Green', 'zeeMagazine_language'),
			'#e34c00' => __('Orange', 'zeeMagazine_language'),
			'#9215a5' => __('Purple', 'zeeMagazine_language'),
			'#ed1700' => __('Red', 'zeeMagazine_language'),
			'#007896' => __('Teal', 'zeeMagazine_language'),
			'default' => __('Standard', 'zeeMagazine_language'));
		
		$themezee_settings = array();
	
		### COLOR SETTINGS
		#######################################################################################
							
		$themezee_settings[] = array("name" => __('Set Color Scheme', 'zeeMagazine_language'),
						"desc" => __('Please select your color scheme here.', 'zeeMagazine_language'),
						"id" => "themeZee_color_scheme",
						"std" => "default",
						"type" => "select",
						'choices' => $color_schemes,
						"section" => "themeZee_colors_schemes"
						);
		
		return $themezee_settings;
	}

?>