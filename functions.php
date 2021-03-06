<?php
/**
 * zeeMagazine functions and definitions
 *
 * @package zeeMagazine
 */

/**
 * zeeMagazine only works in WordPress 4.2 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.2', '<' ) ) :
	require get_template_directory() . '/inc/back-compat.php';
endif;


if ( ! function_exists( 'zeemagazine_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function zeemagazine_setup() {

	// Make theme available for translation. Translations can be filed in the /languages/ directory.
	load_theme_textdomain( 'zeemagazine', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	
	// Set detfault Post Thumbnail size
	set_post_thumbnail_size( 450, 325, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Main Navigation', 'zeemagazine' ),
		'social' => esc_html__( 'Social Icons', 'zeemagazine' ),
		'footer' => esc_html__( 'Footer Navigation', 'zeemagazine' ),
	) );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'zeemagazine_custom_background_args', array( 'default-color' => '225588' ) ) );
	
	// Set up the WordPress core custom header feature.
	add_theme_support('custom-header', apply_filters( 'zeemagazine_custom_header_args', array(
		'header-text' => false,
		'width'	=> 1270,
		'height' => 200,
		'flex-height' => true
	) ) );
	
}
endif; // zeemagazine_setup
add_action( 'after_setup_theme', 'zeemagazine_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function zeemagazine_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'zeemagazine_content_width', 810 );
}
add_action( 'after_setup_theme', 'zeemagazine_content_width', 0 );


/**
 * Register widget areas and custom widgets.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function zeemagazine_widgets_init() {
	
	register_sidebar( array(
		'name' => esc_html__( 'Sidebar', 'zeemagazine' ),
		'id' => 'sidebar',
		'description' => esc_html__( 'Appears on posts and pages except Magazine Homepage and Fullwidth template.', 'zeemagazine' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-header"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	));
	
	register_sidebar( array(
		'name' => esc_html__( 'Header', 'zeemagazine' ),
		'id' => 'header',
		'description' => esc_html__( 'Appears on header area. You can use a search or ad widget here.', 'zeemagazine' ),
		'before_widget' => '<aside id="%1$s" class="header-widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="header-widget-title">',
		'after_title' => '</h4>',
	));
	
} // zeemagazine_widgets_init
add_action( 'widgets_init', 'zeemagazine_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function zeemagazine_scripts() {
	global $wp_scripts;
	
	// Register and Enqueue Stylesheet
	wp_enqueue_style( 'zeemagazine-stylesheet', get_stylesheet_uri() );
	
	// Register Genericons
	wp_enqueue_style( 'zeemagazine-genericons', get_template_directory_uri() . '/css/genericons/genericons.css' );
	
	// Register and Enqueue HTML5shiv to support HTML5 elements in older IE versions
	wp_enqueue_script( 'zeemagazine-html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js', array(), '3.7.2', false );
	$wp_scripts->add_data( 'zeemagazine-html5shiv', 'conditional', 'lt IE 9' );

	// Register and enqueue navigation.js
	wp_enqueue_script( 'zeemagazine-jquery-navigation', get_template_directory_uri() .'/js/navigation.js', array('jquery') );
	
	// Register and enqueue sidebar.js
	wp_enqueue_script( 'zeemagazine-jquery-sidebar', get_template_directory_uri() .'/js/sidebar.js', array('jquery') );
	
	// Register and Enqueue Google Fonts
	wp_enqueue_style( 'zeemagazine-default-fonts', zeemagazine_google_fonts_url(), array(), null );

	// Register Comment Reply Script for Threaded Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
} // zeemagazine_scripts
add_action( 'wp_enqueue_scripts', 'zeemagazine_scripts' );


/**
 * Retrieve Font URL to register default Google Fonts
 */
function zeemagazine_google_fonts_url() {
    
	// Set default Fonts
	$font_families = array( 'Open Sans', 'Hind' );

	// Build Fonts URL
	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);
	$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return apply_filters( 'zeemagazine_google_fonts_url', $fonts_url );
}


/**
 * Add custom sizes for featured images
 */
function zeemagazine_add_image_sizes() {
	
	// Add Custom Header Image Size
	add_image_size( 'zeemagazine-header-image', 1270, 200, true );
	
}
add_action( 'after_setup_theme', 'zeemagazine_add_image_sizes' );


/**
 * Include Files
 */
 
// include Theme Customizer Options
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/default-options.php';

// Include Extra Functions
require get_template_directory() . '/inc/extras.php';

// include Template Functions
require get_template_directory() . '/inc/template-tags.php';

// Include support functions for Theme Addons
require get_template_directory() . '/inc/addons.php';