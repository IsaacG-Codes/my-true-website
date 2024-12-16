<?php
/**
 * Xews Theme Customizer
 *
 * @package Xews Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function xews_lite_customize_register( $wp_customize ) {

	$defaults = xews_lite_customizer_defaults();

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'xews_lite_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'xews_lite_customize_partial_blogdescription',
			)
		);
	}



$wp_customize->add_setting( 'xews_lite_theme_color', array( 
	'default' 			=> $defaults['xews_lite_theme_color'],
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new Image_Radio_Buttons( $wp_customize, 'xews_lite_theme_color', array(
	'label'    => __( 'Theme color','xews-lite'),
	'section' => 'colors',
	'type'    => 'select',
	'choices' => xews_lite_theme_color_filter()
) ) );


	$wp_customize->register_control_type( 'Xews_Heading' );
	


	require get_template_directory() . '/inc/customizer/header-settings/header-settings.php';
	
	require get_template_directory() . '/inc/customizer/header-settings/social-settings.php';
	require get_template_directory() . '/inc/customizer/header-settings/search.php';;
	require get_template_directory() . '/inc/customizer/header-settings/date.php';
	require get_template_directory() . '/inc/customizer/header-settings/nav-menu.php';
	require get_template_directory() . '/inc/customizer/header-settings/dark-mode.php';

	require get_template_directory() . '/inc/customizer/inner-pages/archive-pages.php';
	require get_template_directory() . '/inc/customizer/inner-pages/single-post.php';
	require get_template_directory() . '/inc/customizer/inner-pages/category-colors.php';


	require get_template_directory() . '/inc/customizer/general-settings/general-settings.php';

	require get_template_directory() . '/inc/customizer/footer-settings/footer-settings.php';

}
add_action( 'customize_register', 'xews_lite_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function xews_lite_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function xews_lite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function xews_lite_customize_preview_js() {
	wp_enqueue_script( 'xews-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), XEWS_LITE_VERSION, true );
}
add_action( 'customize_preview_init', 'xews_lite_customize_preview_js' );




/** Custom Controls on Customizer */
require get_template_directory() . '/inc/customizer/controls/custom/custom-controls.php';

/** Customizer settings default values */
require get_template_directory() . '/inc/customizer/customizer-defaults.php';

/** Functions for theme customizer */
require get_template_directory() . '/inc/customizer/customizer-functions.php';


include_once get_template_directory() . '/inc/customizer/customizer-custom-controls/inc/custom-controls.php';