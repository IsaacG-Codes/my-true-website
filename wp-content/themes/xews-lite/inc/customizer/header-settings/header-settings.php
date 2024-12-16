<?php
$defaults = xews_lite_customizer_defaults();

/*Add New Panel for header Setups */
$wp_customize->add_panel( 'xews_lite_header_panel', array (
	'priority' 			=> '20',
	'capability' 		=> 'edit_theme_options',
	'theme_supports' 	=> '',
	'title' 			=> esc_html__( 'Header Settings', 'xews-lite' ),
	'description' 		=> esc_html__( 'Setup header of the site.', 'xews-lite' )
) );

/* Header Section */
$wp_customize->get_section('header_image')->panel = 'xews_lite_header_panel';
$wp_customize->get_section('header_image')->title = esc_html__('Header Background Image','xews-lite');





/* Add Default Sections to General Panel */
$wp_customize->get_section('title_tagline')->panel 		= 'xews_lite_header_panel';


$wp_customize->add_section( 'xews_lite_headermenu_section', array(
	'title' 		=> esc_html__('Primary Menu', 'xews-lite' ),
	'capability' 	=> 'edit_theme_options',
	'panel' 		=> 'xews_lite_header_panel',
	
) );




//Title & tagline color
$wp_customize->add_setting('xews_lite_title_tagline_color', array(
    'default'           => $defaults['xews_lite_title_tagline_color'],
    'sanitize_callback' => 'sanitize_hex_color',
	'transport' 		=> 'postMessage'
    
)
);
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'xews_lite_title_tagline_color', array(
        'label'         => esc_html__( 'Title & Tagline Color', 'xews-lite' ),
        'section'       => 'title_tagline',
)));