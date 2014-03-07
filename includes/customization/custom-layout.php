<?php 
add_action('wp_head', 'themezee_css_layout');
function themezee_css_layout() {
	
	echo '<style type="text/css">';
	$options = get_option('zeemagazine_options');
	
	// Switch Sidebar to left?
	if ( isset($options['themeZee_general_sidebars']) and $options['themeZee_general_sidebars'] == 'left' ) {
	
		echo '
			@media only screen and (min-width: 60em) {
				#content {
					float: right;
				}
				#sidebar {
					margin-left: 0;
					margin-right: 70%;
					background: -moz-linear-gradient(left, #f3f3f3 0%, #e6e6e6 100%); /* FF3.6+ */
					background: -webkit-gradient(linear, left top, right top, color-stop(0%,#f3f3f3), color-stop(100%,#e6e6e6)); /* Chrome,Safari4+ */
					background: -webkit-linear-gradient(left, #f3f3f3 0%,#e6e6e6 100%); /* Chrome10+,Safari5.1+ */
					background: -o-linear-gradient(left, #f3f3f3 0%,#e6e6e6 100%); /* Opera 11.10+ */
					background: -ms-linear-gradient(left, #f3f3f3 0%,#e6e6e6 100%); /* IE10+ */
					background: linear-gradient(to right, #f3f3f3 0%,#e6e6e6 100%); /* W3C */
				}
					
			}
			@media only screen and (max-width: 70em) {
				#sidebar {
					margin-right: 67%;
				}
			}
		';
	}
	
	// Add Custom CSS
	if ( isset($options['themeZee_general_css']) and $options['themeZee_general_css'] <> '' ) {
		echo wp_kses_post($options['themeZee_general_css']);
	}
	
	echo '</style>';
}