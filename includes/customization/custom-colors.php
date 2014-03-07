<?php
/***
 * Custom Color Options
 *
 * Get custom colors from theme options and embed CSS color settings 
 * in the <head> area of the theme. 
 *
 */


// Add Custom Colors
add_action('wp_head', 'themezee_custom_colors');
function themezee_custom_colors() { 
	
	// Get Theme Options
	$options = get_option('zeemagazine_options');
	
	// Get Color Scheme and set color scheme to default if nothing is selected)
	$color_scheme = $options['themeZee_color_scheme'] <> '' ? esc_attr($options['themeZee_color_scheme']) : 'default';
	
	$link_color = $color_scheme;
	$navi_color = $color_scheme;
	$title_color = $color_scheme;
	$footer_color = $color_scheme;
	$sidebar_title_color = '#333333';
	$sidebar_link_color = $color_scheme;
	$sidebar_title_style = 'light';

	// Set CSS settings except color scheme is default (=> default colors are already defined in style.css)
	if( $color_scheme <> 'default') :
	
		$color_css = '<style type="text/css">';
		$color_css .= '
			a, a:link, a:visited, .comment a:link, .comment a:visited,
			.wp-pagenavi a:link, .wp-pagenavi a:visited, #image-nav .nav-previous a, #image-nav .nav-next a {
				color: '. $link_color .';
			}
			.wp-pagenavi .current {
				background-color: '. $link_color .';
			}
			#navi-wrap {
				border-top: 1px solid '. $navi_color .';
				border-bottom: 1px solid '. $navi_color .';
			}
			#mainnav, #mainnav-menu, #mainnav-icon {
				background: '. $navi_color .';
			}
			#footer-wrap {
				background-color: '. $footer_color .';
			}
			#logo .site-title, .page-title, .post-title, 
			.post-title a:link, .post-title a:visited, .archive-title span {
				color: '. $title_color .';
			}
			.post-title a:hover, .post-title a:active {
				color: #303030;
			}
			#sidebar .widgettitle {
				color: '. $sidebar_title_color .';
			}
			#sidebar .widget a:link, #sidebar .widget a:visited {
				color: '. $sidebar_link_color .';
			}
			#sidebar .widget-tabnav li a {
				background-color: '. $sidebar_link_color .';
			}
			#sidebar .widget-tabnav li a:hover {
				background-color: #303030;
			}
		';
		
		if ( $sidebar_title_style == 'dark') {
			
			$color_css .= '#sidebar .widgettitle { color: #fff; background: '. $sidebar_title_color .'; }';
		
		}
		
		$color_css .= '</style>';
		
		// Print Color CSS
		echo $color_css;
	
	endif;
}