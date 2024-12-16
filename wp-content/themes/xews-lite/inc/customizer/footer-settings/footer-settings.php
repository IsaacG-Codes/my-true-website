<?php
$defaults = xews_lite_customizer_defaults();

/*Add New Panel for footer Setups */
$wp_customize->add_panel( 'xews_lite_footer_panel', array (
	'priority' 			=> 20,
	'capability' 		=> 'edit_theme_options',
	'theme_supports' 	=> '',
	'title' 			=> esc_html__( 'Footer Settings', 'xews-lite' ),
	'description' 		=> esc_html__( 'Setup footer of the site.', 'xews-lite' )
) );




$wp_customize->add_section( 'xews_lite_footer_copyright_section', array(
	'title' 		=> esc_html__('Footer Copyright', 'xews-lite' ),
	'capability' 	=> 'edit_theme_options',
	'panel' 		=> 'xews_lite_footer_panel',
	
) );

$wp_customize->add_setting( 'xews_lite_footer_copyright_text', array( 
	'default' 			=> '',
	'sanitize_callback' => 'wp_kses_post' 
) );

$wp_customize->add_control('xews_lite_footer_copyright_text', array(
	'type'     => 'textarea',
	'section'  => 'xews_lite_footer_copyright_section',
	'label'    => esc_html__( 'Footer Copyright Text','xews-lite'),	
) );


/**
 *  Upsell Section
 */
$wp_customize->add_section( new Xews_Upsell_Section( $wp_customize, 'upsell_section',
	array(
		'title' => __( 'Premium Version', 'xews-lite' ),
		'url' => 'https://codeworkweb.com/wordpress-themes/xews',
		'backgroundcolor' => '#ff3d4f',
		'textcolor' => '#fff',
		'priority' => 0,
	)
) );