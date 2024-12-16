<?php 
/**
 * Add General Settings panel
 */
$defaults = xews_lite_customizer_defaults();

$wp_customize->add_panel( 'xews_lite_general_settings', array(
    'priority'         => 1,
    'capability'       => 'edit_theme_options',
    'theme_supports'   => '',
    'title'            => esc_html__( 'General Settings', 'xews-lite' ),
    'description'      => esc_html__( 'This allows to edit general theme settings', 'xews-lite' ),
));

/**
* General options
*
*/
$wp_customize->add_section( 'xews_lite_general_options', array(
    'title'           => esc_html__('General Options', 'xews-lite'),
    'panel'           => 'xews_lite_general_settings'
  ));

/**
 * Upload image control for fallback image
 */
$wp_customize->add_setting('xews_lite_post_fallback_image',array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw'
)
);
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'xews_lite_post_fallback_image',
  array(
        'label'       => esc_html__( 'Fallback Image', 'xews-lite' ),
        'description' => esc_html__( 'Upload image to display when featured image is not available','xews-lite' ),
        'section'     => 'xews_lite_general_options',
        
    )
)
);

/**
 * Container width
 * 
 */
$wp_customize->add_setting( 'xews_lite_container_width',
		array(
			'default' 			=> $defaults['xews_lite_container_width'],
			'transport' 		=> 'postMessage',
			'sanitize_callback' => 'xews_lite_range_sanitization'
		)
	);
	$wp_customize->add_control( new Xews_Slider_Custom_Control( $wp_customize, 'xews_lite_container_width',
		array(
			'label' 		=> esc_html__( 'Container Width (px)','xews-lite' ),
			'section' 		=> 'xews_lite_general_options',
			'input_attrs' 	=> array(
				'min' 	=> 800, // Required. Minimum value for the slider
				'max' 	=> 1920, // Required. Maximum value for the slider
				'step' 	=> 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
			),
		)
	) );