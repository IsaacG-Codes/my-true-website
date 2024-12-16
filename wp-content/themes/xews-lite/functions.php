<?php
/**
 * Xews functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Xews Lite
 */
if ( ! defined( 'XEWS_LITE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'XEWS_LITE_VERSION', '1.0.9' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function xews_lite_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Xews, use a find and replace
		* to change 'xews-lite' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'xews-lite', get_template_directory() . '/languages' );

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
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'xews-lite' ),
			'menu-2' => esc_html__( 'Secondary', 'xews-lite' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'xews_lite_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	//custom image sizes
    add_image_size( 'xews-rectangle-thumb', 510, 369, true );
	add_image_size( 'xews-small-thumb', 150, 150, true );
	add_image_size( 'xews-single-large', 1920, 1000, true );
	add_image_size( 'xews-large-category', 1200, 500, true );
	add_image_size( 'xews-single-third', 1920, 500, true );
	add_image_size( 'xews-archive-large', 1250, 550, true );
	add_image_size( 'xews-long-thumb', 300, 423, true );
	add_image_size( 'xews-small-square-thumb', 321, 257, true );
	add_image_size( 'xews-large-square-thumb', 612, 588, true ); //540, 519
	add_image_size( 'xews-large-square-middle', 540, 565, true );
    add_image_size( 'xews-long-post-thumb', 600, 800, true );
    add_image_size( 'xews-rect-post-thumb', 425, 475, true );
    add_image_size( 'xews-slider-thumb', 300, 200, true );
    add_image_size( 'xews-ftr-slider-thumb', 800, 448, true );    
    add_image_size( 'xews-vertical-slider-thumb', 400, 340, true );
    add_image_size( 'xews-rect-post-carousel', 400, 600, true );
    add_image_size( 'xews-post-slider-lg', 600, 400, true );
    add_image_size( 'xews-cat-post-sm', 100, 70, true );

}
add_action( 'after_setup_theme', 'xews_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function xews_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'xews_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'xews_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function xews_lite_widgets_init() {
	

	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'xews-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'xews-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title"><span class="title-bg">',
		'after_title'   => '</span></h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'xews-lite' ),
		'id'            => 'xews_lite_left_sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'xews-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title"><span class="title-bg">',
		'after_title'   => '</span></h4>',
	) );


}
add_action( 'widgets_init', 'xews_lite_widgets_init' );


/**
 * Register Google Fonts
 */
function xews_lite_fonts_url() {

	$fonts_url 		= '';
	$jost 			= esc_html_x( 'on', 'Jost font: on or off', 'xews-lite' );
	$poppins 		= esc_html_x( 'on', 'Poppins font: on or off', 'xews-lite' );
	$rubik 			= esc_html_x( 'on', 'Rubik font: on or off', 'xews-lite' );
	$muli 			= esc_html_x( 'on', 'Muli font: on or off', 'xews-lite' );
	$aleo 			= esc_html_x( 'on', 'Aleo font: on or off', 'xews-lite' );
	$inter 			= esc_html_x( 'on', 'Inter font: on or off', 'xews-lite' );
	$interTight 	= esc_html_x( 'on', 'Inter Tight font: on or off', 'xews-lite' );

	$font_families 	= array();

	if ( 'off' !== $jost ) {
		$font_families[] = 'Jost:ital,wght@0,400;0,500;1,600&display=swap';
	}
	if ( 'off' !== $poppins ) {
		$font_families[] = 'Poppins:wght@0,400;0,500;1,600;2,700;3,800&display=swap';
	}

	if ( 'off' !== $rubik ) {
		$font_families[] = 'Rubik:wght@300;400;500;600&display=swap';
	}

	if ( 'off' !== $muli ) {
		$font_families[] = 'Muli:wght@300;400;500;600&display=swap';
	}

	if ( 'off' !== $aleo ) {
		$font_families[] = 'Aleo:wght@400;700&display=swap';
	}

	if ( 'off' !== $inter ) {
		$font_families[] = 'Inter:wght@400;500;600&display=swap';
	}

	if ( 'off' !== $interTight ) {
		$font_families[] = 'Inter+Tight:wght@400;500;600&display=swap';
	}

	if ( in_array( 'on', array( $jost, $poppins, $rubik, $muli, $aleo, $inter, $interTight ) ) ) {
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}


/**
 * Enqueue scripts and styles for frontend.
 */
function xews_lite_scripts() {

	$default 								= xews_lite_customizer_defaults();
	$xews_lite_post_sidebar_sticky_enable 	= get_theme_mod('xews_lite_post_sidebar_sticky_enable', $default['xews_lite_post_sidebar_sticky_enable']);
	$xews_lite_blog_sidebar_sticky_enable 	= get_theme_mod('xews_lite_blog_sidebar_sticky_enable', $default['xews_lite_blog_sidebar_sticky_enable']);
	$xews_lite_darkmode_enable 				= get_theme_mod('xews_lite_darkmode_enable', $default['xews_lite_darkmode_enable']);
	
	wp_enqueue_style( 'xews-fonts', xews_lite_fonts_url(), array(), null );
	wp_register_style( 'fontawesome', get_template_directory_uri().'/assets/icons/fontawesome/css/all.min.css', XEWS_LITE_VERSION );
	if( true == $xews_lite_darkmode_enable ){
	wp_enqueue_style( 'xews-dark-mode', get_template_directory_uri() . '/assets/css/dark-mode.css', XEWS_LITE_VERSION );
	}
	wp_enqueue_style( 'xews-style', get_stylesheet_uri(), array(), XEWS_LITE_VERSION );
	wp_style_add_data( 'xews-style', 'rtl', 'replace' );
	wp_enqueue_style( 'xews-responsive', get_template_directory_uri() . '/assets/css/responsive.css', XEWS_LITE_VERSION );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	

	if( $xews_lite_post_sidebar_sticky_enable == true || $xews_lite_blog_sidebar_sticky_enable == true ){
		wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array('jquery'), XEWS_LITE_VERSION, true );
	}

	wp_register_script( 'xews-scripts', get_template_directory_uri() . '/assets/js/xews-scripts.js', array('jquery'), XEWS_LITE_VERSION, true );
	$localize_options =  array(
        'stickySidebar'		=> esc_html($xews_lite_post_sidebar_sticky_enable),
		'stickySidebarBlog'	=> esc_html($xews_lite_blog_sidebar_sticky_enable),
        'ajaxurl'			=> esc_url(admin_url( 'admin-ajax.php'))
        );

    wp_localize_script( 'xews-scripts', 'xewsLocalizeScript', $localize_options  );
    wp_enqueue_script( 'xews-scripts' );

}
add_action( 'wp_enqueue_scripts', 'xews_lite_scripts' );


/**
 * Enqueue scripts and styles for backend.
 */
function xews_lite_admin_scripts() {
	
	wp_enqueue_style( 'xews-admin', get_template_directory_uri() . '/assets/css/xews-admin.css', XEWS_LITE_VERSION );
		
	wp_enqueue_script( 'xews-admin', get_template_directory_uri() . '/assets/js/xews-admin.js', array('jquery'), XEWS_LITE_VERSION, true );
	
}
add_action( 'admin_enqueue_scripts', 'xews_lite_admin_scripts' );





/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';



/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/controls/controls-main.php';


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

require get_template_directory() . '/inc/header-footer/header-helper.php';
require get_template_directory() . '/inc/header-footer/footer-helper.php';


/**
 * Dynamic styles
 * 
 */
require get_template_directory() . '/inc/dynamic-styles.php';



/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


if ( is_admin() ) {
	require get_template_directory() . '/inc/welcome/welcome-config.php';
}