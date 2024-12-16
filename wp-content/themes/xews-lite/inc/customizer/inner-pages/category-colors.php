<?php


$wp_customize->add_section( 'xews_lite_inner_blog_cat_color', array(
	'title' => __('Category Colors', 'xews-lite' ),
	'capability' => 'edit_theme_options',
	'panel' => 'xews_lite_inner_panel',
	'priority' => 20,
) );



global $xews_lite_cat_array;
foreach ( $xews_lite_cat_array as $key => $value ) {
  	/**
	 * Category color option
	 */
	$wp_customize->add_setting('xews_lite_cat_color_'.$key, array(
			'default'           => '#ff3d4f',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'xews_lite_cat_color_'.$key,
			array(
				'label'         => esc_html( $value ),
				'section'       => 'xews_lite_inner_blog_cat_color',
			)
		)
	);
}