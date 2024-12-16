<?php 
/**
 * Main Nav menu settings
 * 
 */
$wp_customize->add_setting( 'xews_lite_nav_hover_effect', array( 
	'default' 			=> $defaults['xews_lite_nav_hover_effect'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'xews_lite_nav_hover_effect', array(
	'label'    	=> esc_html__( 'Menu Hover Effect','xews-lite'),
	'section' 	=> 'xews_lite_headermenu_section',
	'type'    	=> 'select',
	'choices' 	=> array(
		'none' 	=> esc_html__( 'None', 'xews-lite' ),
		'underline' 	=> esc_html__( 'Underline', 'xews-lite' ),
		'background'  	=> esc_html__( 'With Background', 'xews-lite' ),
		'bg-underline' 	=> esc_html__( 'Background & Underline', 'xews-lite' ),
	),
) );

$wp_customize->add_setting('xews_lite_nav_bg_color', array(
    'default'           => $defaults['xews_lite_nav_bg_color'],
    'sanitize_callback' => 'sanitize_hex_color',
    
)
);

$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'xews_lite_nav_bg_color', array(
        'label'         => esc_html__( 'Menu Hover Bacgkround Color', 'xews-lite' ),
        'section'       => 'xews_lite_headermenu_section',
)));

$wp_customize->add_setting('xews_lite_nav_underline_color', array(
    'default'           => $defaults['xews_lite_nav_underline_color'],
    'sanitize_callback' => 'sanitize_hex_color',
    
)
);

$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'xews_lite_nav_underline_color', array(
        'label'         => esc_html__( 'Menu Hover Underline Color', 'xews-lite' ),
        'section'       => 'xews_lite_headermenu_section',
)));

/**
 * accordion
 */
$wp_customize->add_setting( 'cww_header_nav_styles_accordion', 
			array(
			    'capability'        => 'edit_theme_options',
			    'sanitize_callback' => 'sanitize_text_field'
	        )
		);

$wp_customize->add_control( new Xews_Heading($wp_customize, 'cww_header_nav_styles_accordion', 
	array(
	    'label' 			=> esc_html__( 'Color & Typography', 'xews-lite' ),
	    'section'     		=> 'xews_lite_headermenu_section',
	    'class'			    => 'advanced-header-options-accordion',
	    'accordion'			=> false,
	    'expanded'         	=> false,
	    'controls_to_wrap'  => 9,
	    
       )
    )
);

//menu link color
$wp_customize->add_setting('xews_lite_nav_color', array(
    'default'           => $defaults['xews_lite_nav_color'],
    'sanitize_callback' => 'sanitize_hex_color',
    
)
);
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'xews_lite_nav_color', array(
        'label'         => esc_html__( 'Text Color', 'xews-lite' ),
        'section'       => 'xews_lite_headermenu_section',
)));



$wp_customize->add_setting( 'xews_lite_nav_font_size',
		array(
			'default' 			=> $defaults['xews_lite_nav_font_size'],
			'transport' 		=> 'postMessage',
			'sanitize_callback' => 'xews_lite_range_sanitization'
		)
	);
$wp_customize->add_control( new Xews_Slider_Custom_Control( $wp_customize, 'xews_lite_nav_font_size',
		array(
			'label' 		=> esc_html__( 'Font size (px)','xews-lite' ),
			'section' 		=> 'xews_lite_headermenu_section',
			'input_attrs' 	=> array(
				'min' 	=> 1, // Required. Minimum value for the slider
				'max' 	=> 45, // Required. Maximum value for the slider
				'step' 	=> 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
			),
		)
	) );


$wp_customize->add_setting( 'xews_lite_nav_text_transform', array( 
	'default' 			=> $defaults['xews_lite_nav_text_transform'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport' 		=> 'postMessage',
) );

$wp_customize->add_control( 'xews_lite_nav_text_transform', array(
	'label'    	=> esc_html__( 'Text Transform','xews-lite'),
	'section' 	=> 'xews_lite_headermenu_section',
	'type'    	=> 'select',
	'choices' 	=> array(
		'uppercase' 	=> esc_html__( 'Uppercase', 'xews-lite' ),
		'capitalize' 	=> esc_html__( 'Capitalize', 'xews-lite' ),
		'lowercase'  	=> esc_html__( 'Lowercase', 'xews-lite' ),
		'none' 			=> esc_html__( 'none', 'xews-lite' ),
	),
) );