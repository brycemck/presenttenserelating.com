<?php
/**
 * New Zea functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package New Zea
 */

if ( ! function_exists( 'new_zea_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function new_zea_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on New Zea, use a find and replace
	 * to change 'new-zea' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'new-zea', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_editor_style();
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'new-zea-large-thumbnails',  1170, 630, true );
	add_image_size( 'new-zea-widget-post-thumb',  80, 80, true );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'new-zea' ),
		'social'	=> esc_html__( 'Social', 'new-zea' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'new_zea_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'new_zea_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function new_zea_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'new_zea_content_width', 640 );
}
add_action( 'after_setup_theme', 'new_zea_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function new_zea_widgets_init() {
	
	register_sidebar( array(
		'name' => __( 'Footer One', 'new-zea' ),
		'id' => 'new-zea-footer-one-widget',
		'before_widget' => '<div id="footer-one" class="widget footer-widget">',
		'after_widget' => "</div>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Two', 'new-zea' ),
		'id' => 'new-zea-footer-two-widget',
		'before_widget' => '<div id="footer-two" class="widget footer-widget">',
		'after_widget' => "</div>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Three', 'new-zea' ),
		'id' => 'new-zea-footer-three-widget',
		'before_widget' => '<div id="footer-three" class="widget footer-widget">',
		'after_widget' => "</div>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	
}
add_action( 'widgets_init', 'new_zea_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function new_zea_scripts() {

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'new-zea-ie-responsive-js', get_template_directory_uri() . '/js/ie-responsive.min.js', array('jquery') );
	wp_script_add_data( 'new-zea-ie-responsive-js', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'new-zea-ie-shiv', get_template_directory_uri() . "/js/html5shiv.min.js");
	wp_script_add_data( 'new-zea-ie-shiv', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'new-zea-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'new-zea-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.min.css', array(), false ,'screen' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'new-zea-ie-style', get_stylesheet_directory_uri() . "/assets/css/ie.css", array()  );
    wp_style_add_data( 'new-zea-ie-style', 'conditional', 'IE' );
	wp_enqueue_style('new-zea-google-fonts', '//fonts.googleapis.com/css?family=Lora:400,400i,700,700i|Raleway:100,300,300i,400,400i,500,600,700,900');
	wp_enqueue_style( 'new-zea-style', get_stylesheet_uri() . "?cachebuster=" . rand(0, 1000) );
	
	$new_zea_slider_speed = 6000;
	if ( get_theme_mod( 'new_zea_slider_speed_setting' ) ) {
		$new_zea_slider_speed = get_theme_mod( 'new_zea_slider_speed_setting' ) ;
	}
	wp_localize_script( "new-zea-custom-js", "new_zea_slider_speed", array('vars' => intval($new_zea_slider_speed)) );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'new_zea_scripts' );

function new_zea_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Custom Widget.
 */
require get_template_directory() . '/inc/widget.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
