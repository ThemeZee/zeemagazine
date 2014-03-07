<?php
	
	function themezee_sections_frontpage() {
		$themezee_sections = array();
		
		$themezee_sections[] = array("id" => "themeZee_frontpage_template",
					"name" => __('Activate Frontpage Template', 'zeeMagazine_language'));
					
		$themezee_sections[] = array("id" => "themeZee_frontpage_slider",
					"name" => __('Frontpage Slider', 'zeeMagazine_language'));
					
		$themezee_sections[] = array("id" => "themeZee_frontpage_area_one",
					"name" => __('#1 Posts from Category (horizontal)', 'zeeMagazine_language'));
					
		$themezee_sections[] = array("id" => "themeZee_frontpage_area_two",
					"name" => __('#2 Posts from Category  (boxed)', 'zeeMagazine_language'));
					
		$themezee_sections[] = array("id" => "themeZee_frontpage_area_three",
					"name" => __('#3 Posts from two Categories (2 columns)', 'zeeMagazine_language'));
					
		$themezee_sections[] = array("id" => "themeZee_frontpage_area_four",
					"name" => __('#4 Posts from Category (boxed)', 'zeeMagazine_language'));
					
		$themezee_sections[] = array("id" => "themeZee_frontpage_posts",
					"name" => __('Normal Blog Posts', 'zeeMagazine_language'));

		return $themezee_sections;
	}
	
	function themezee_settings_frontpage() {
	
		// Create Categories Array
		$categories = array();
		$categories[] = '';
		$categories_slider = array();
		$categories_slider[''] = 'All Categories';
		
		$cats = get_categories(); 
		foreach ($cats as $cat) {
			$categories[$cat->category_nicename] = $cat->cat_name;
			$categories_slider[$cat->category_nicename] = $cat->cat_name;
		}
	
		
		### FRONTPAGE Template
		#######################################################################################
		$themezee_settings[] = array("name" => __('Turn on Frontpage Template?', 'zeeMagazine_language'),
						"desc" => __('Check this to automatically display the frontpage template on HOME page. You can also manually create a page and select the "Frontpage Template" page template instead of using this option.', 'zeeMagazine_language'),
						"id" => "themeZee_frontpage_activate",
						"std" => "false",
						"type" => "checkbox",
						"section" => "themeZee_frontpage_template");
		
		### FRONTPAGE Slider
		#######################################################################################
		$themezee_settings[] = array("name" => __('Show Frontpage Slider?', 'zeeMagazine_language'),
						"desc" => __('Check this to activate the Slideshow displayed on the front page template.', 'zeeMagazine_language'),
						"id" => "themeZee_frontpage_slider_active",
						"std" => "false",
						"type" => "checkbox",
						"section" => "themeZee_frontpage_slider");
						
		$themezee_settings[] = array("name" => __('Slider Animation', 'zeeMagazine_language'),
						"desc" => "",
						"id" => "themeZee_frontpage_slider_animation",
						"std" => "slide",
						"type" => "radio",
						'choices' => array(
									'slide' => __('Horizontal Slider', 'zeeMagazine_language'),
									'fade' => __('Fade Slider', 'zeeMagazine_language')),
						"section" => "themeZee_frontpage_slider"
						);
									
		$themezee_settings[] = array("name" => __('Slider Speed', 'zeeMagazine_language'),
						"desc" => __('Enter the speed of the slideshow cycling (timeout between slides), in milliseconds.', 'zeeMagazine_language'),
						"id" => "themeZee_frontpage_slider_speed",
						"std" => "7000",
						"type" => "text",
						"section" => "themeZee_frontpage_slider");
						
		$themezee_settings[] = array("name" => __('Slider Content', 'zeeMagazine_language'),
						"desc" => "",
						"id" => "themeZee_frontpage_slider_content",
						"std" => "recent",
						"type" => "radio",
						'choices' => array(
									'recent' => __('Show recent posts', 'zeeMagazine_language'),
									'popular' => __('Show popular posts', 'zeeMagazine_language')),
						"section" => "themeZee_frontpage_slider");
						
		$themezee_settings[] = array("name" => __('Slider Category', 'zeeMagazine_language'),
						"desc" => __("Select a category which posts are displayed at the featured posts slider .", 'zeeMagazine_language'),
						"id" => "themeZee_frontpage_slider_category",
						"std" => "",
						"type" => "select",
						'choices' => $categories_slider,
						"section" => "themeZee_frontpage_slider");

		$themezee_settings[] = array("name" => __('Number of Posts', 'zeeMagazine_language'),
						"desc" => __('Enter the number how much posts should be displayed in the post slider.', 'zeeMagazine_language'),
						"id" => "themeZee_frontpage_slider_limit",
						"std" => "5",
						"type" => "text",
						"section" => "themeZee_frontpage_slider");
								
		### CATEGORY ONE AREA SETTINGS
		#######################################################################################							
		$themezee_settings[] = array("name" => __('Category Posts Title', 'zeeMagazine_language'),
						"desc" => __('Enter here the title which is displayed above the category posts.', 'zeeMagazine_language'),
						"id" => "themeZee_frontpage_category_one_title",
						"std" => '',
						"type" => "text",
						"section" => "themeZee_frontpage_area_one");
						
		$themezee_settings[] = array("name" => __('Category', 'zeeMagazine_language'),
						"desc" => __("Select the category of which posts should be displayed.", 'zeeMagazine_language'),
						"id" => "themeZee_frontpage_category_one",
						"std" => "",
						"type" => "select",
						'choices' => $categories,
						"section" => "themeZee_frontpage_area_one");
						
		### CATEGORY TWO AREA SETTINGS
		#######################################################################################							
		$themezee_settings[] = array("name" => __('Category', 'zeeMagazine_language'),
						"desc" => __("Select the category of which posts should be displayed.", 'zeeMagazine_language'),
						"id" => "themeZee_frontpage_category_two",
						"std" => "",
						"type" => "select",
						'choices' => $categories,
						"section" => "themeZee_frontpage_area_two");
						
		### CATEGORY THREE AREA SETTINGS
		#######################################################################################							
		$themezee_settings[] = array("name" => __('First Category ', 'zeeMagazine_language'),
						"desc" => __("Select the first category of which posts should be displayed.", 'zeeMagazine_language'),
						"id" => "themeZee_frontpage_category_three",
						"std" => "",
						"type" => "select",
						'choices' => $categories,
						"section" => "themeZee_frontpage_area_three");
						
		$themezee_settings[] = array("name" => __('Category', 'zeeMagazine_language'),
						"desc" => __("Select the category of which posts should be displayed.", 'zeeMagazine_language'),
						"id" => "themeZee_frontpage_category_four",
						"std" => "",
						"type" => "select",
						'choices' => $categories,
						"section" => "themeZee_frontpage_area_three");
						
		### CATEGORY FOUR AREA SETTINGS
		#######################################################################################							
		$themezee_settings[] = array("name" => __('Category', 'zeeMagazine_language'),
						"desc" => __("Select the category of which posts should be displayed.", 'zeeMagazine_language'),
						"id" => "themeZee_frontpage_category_five",
						"std" => "",
						"type" => "select",
						'choices' => $categories,
						"section" => "themeZee_frontpage_area_four");
		
		### FRONTPAGE POSTS
		#######################################################################################		
		$themezee_settings[] = array("name" => __('Display Latest Blog Posts?', 'zeeMagazine_language'),
						"desc" => __('Check this to show the latest blog posts in the normal blog layout on the frontpage template', 'zeeMagazine_language'),
						"id" => "themeZee_frontpage_posts_active",
						"std" => "false",
						"type" => "checkbox",
						"section" => "themeZee_frontpage_posts");
						
		$themezee_settings[] = array("name" => __('Latest Blog Posts Category', 'zeeMagazine_language'),
						"desc" => __("Select the category of which the latest blog posts should be displayed.", 'zeeMagazine_language'),
						"id" => "themeZee_frontpage_posts_category",
						"std" => "",
						"type" => "select",
						'choices' => $categories_slider,
						"section" => "themeZee_frontpage_posts");
		
		return $themezee_settings;
	}

?>