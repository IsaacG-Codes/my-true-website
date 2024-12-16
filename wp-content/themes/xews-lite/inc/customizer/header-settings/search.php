<?php
$xews_lite_customizer_defaults = xews_lite_customizer_defaults();

$wp_customize->add_section( 'xews_lite_headersearch_section', array(
	'title' => __('Search', 'xews-lite' ),
	'capability' => 'edit_theme_options',
	'panel' => 'xews_lite_header_panel',
	
) );


$wp_customize->add_setting( 'xews_lite_search_display_enable', array( 
    'default' 			=> $defaults['xews_lite_search_display_enable'],
    'sanitize_callback' => 'xews_lite_sanitize_checkbox' 
) );

$wp_customize->add_control( 'xews_lite_search_display_enable', array(
    'label'         => esc_html__( 'Display Search','xews-lite'),
    'section'       => 'xews_lite_headersearch_section',
    'type'          => 'checkbox',
) );


$wp_customize->add_setting('xews_lite_search_icon_color', array(
    'default'           => $defaults['xews_lite_search_icon_color'],
    'sanitize_callback' => 'sanitize_hex_color',
    
)
);
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'xews_lite_search_icon_color', array(
        'label'         => esc_html__( 'Icon Color', 'xews-lite' ),
        'section'       => 'xews_lite_headersearch_section',
)));