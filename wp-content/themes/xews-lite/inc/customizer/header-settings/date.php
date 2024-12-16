<?php
$defaults = xews_lite_customizer_defaults();

/** Date section */
$wp_customize->add_section( 'xews_lite_headerdate_section', array(
	'title' 		=> esc_html__('Date', 'xews-lite' ),
	'capability' 	=> 'edit_theme_options',
	'panel' 		=> 'xews_lite_header_panel',
	
) );

$wp_customize->add_setting( 'xews_lite_date_display_enable', array( 
    'default' 			=> $defaults['xews_lite_date_display_enable'],
    'sanitize_callback' => 'xews_lite_sanitize_checkbox' 
) );

$wp_customize->add_control( 'xews_lite_date_display_enable', array(
    'label'         => esc_html__( 'Display Date','xews-lite'),
    'section'       => 'xews_lite_headerdate_section',
    'type'          => 'checkbox',
) );


$wp_customize->add_setting( 'xews_lite_date_display_type', array( 
    'default' 			=> $defaults['xews_lite_date_display_type'],
    'sanitize_callback' => 'esc_html' 
) );

$wp_customize->add_control( 'xews_lite_date_display_type', array(
    'label'         => esc_html__( 'Display Option','xews-lite'),
    'description'   => esc_html__('Select what to display.','xews-lite'),
    'section'       => 'xews_lite_headerdate_section',
    'type'          => 'select',
    'choices'       => array(

        'date-only'   => esc_html__( 'Date Only', 'xews-lite' ),
        'time-only'   => esc_html__( 'Time Only', 'xews-lite' ),
        'date-time'   => esc_html__( 'Date & Time', 'xews-lite' ),

    ),
) );


$wp_customize->add_setting('xews_lite_date_text_color', array(
    'default'           => $defaults['xews_lite_date_text_color'],
    'sanitize_callback' => 'sanitize_hex_color',
    
)
);
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'xews_lite_date_text_color', array(
        'label'         => esc_html__( 'Text Color', 'xews-lite' ),
        'section'       => 'xews_lite_headerdate_section',
)));