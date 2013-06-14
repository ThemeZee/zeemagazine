<?php 
add_action('wp_head', 'themezee_css_colors');
function themezee_css_colors() {
	
	$options = get_option('themezee_options');
	
	if ( isset($options['themeZee_color_activate']) and $options['themeZee_color_activate'] == 'true' ) {
		
		echo '<style type="text/css">';
		echo '
			a, a:link, a:visited, #sidebar a,
			.post-title, .page-title, .post-title a:link, .post-title a:visited, #slideshow .post-title a { 
				color: #'.esc_attr($options['themeZee_colors_full']).';
			}
			.wp-pagenavi .current { 
				background: #'.esc_attr($options['themeZee_colors_full']).';
			}
			#header, #head {
				border-bottom: 1px solid #'.esc_attr($options['themeZee_colors_full']).';
			}
			#navi, #foot {
				background-color: #'.esc_attr($options['themeZee_colors_full']).';
			}
			.post {
				border-bottom: 1px dashed #'.esc_attr($options['themeZee_colors_full']).';
			}
		';
		echo '</style>';
	}
}