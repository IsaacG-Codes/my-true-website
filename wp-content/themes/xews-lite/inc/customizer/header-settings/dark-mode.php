<?php
$xews_lite_customizer_defaults = xews_lite_customizer_defaults();

$wp_customize->add_section( 'xews_lite_darkmode_section', array(
	'title' => __('Dark Mode', 'xews-lite' ),
	'capability' => 'edit_theme_options',
	'panel' => 'xews_lite_header_panel',
	
) );


$wp_customize->add_setting( 'xews_lite_darkmode_enable', array( 
    'default' 			=> $defaults['xews_lite_darkmode_enable'],
    'sanitize_callback' => 'xews_lite_sanitize_checkbox' 
) );

$wp_customize->add_control( 'xews_lite_darkmode_enable', array(
    'label'         => esc_html__( 'Enable Dark Mode','xews-lite'),
    'section'       => 'xews_lite_darkmode_section',
    'type'          => 'checkbox',
) );