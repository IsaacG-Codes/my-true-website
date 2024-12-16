<?php
$defaults 						= xews_lite_customizer_defaults();
$xews_lite_get_widget_areas 	= xews_lite_get_widget_areas();

/*Add New Panel for Inner Page Setups */
$wp_customize->add_panel( 'xews_lite_inner_panel', array (
	'priority' => '20',
	'capability' => 'edit_theme_options',
	'theme_supports' => '',
	'title' => __( 'Inner Pages Settings', 'xews-lite' ),
	'description' => __( 'Setup general options of the site.', 'xews-lite' )
) );

/* Blog / Archive Section */
$wp_customize->add_section( 'xews_lite_inner_blog_section', array(
	'title' => __('Blog / Archive Settings', 'xews-lite' ),
	'capability' => 'edit_theme_options',
	'panel' => 'xews_lite_inner_panel',
	'priority' => 20,
) );



$wp_customize->add_setting( 'xews_lite_inner_blog_sidebar', array( 
	'default' 			=> $defaults['xews_lite_inner_blog_sidebar'],
	'sanitize_callback' => 'xews_lite_sanitize_sidebar' 
) );

$wp_customize->add_control( new Image_Radio_Buttons( $wp_customize, 'xews_lite_inner_blog_sidebar', array(
	'label'    => __( 'Blog / Archive Sidebar Style','xews-lite'),
	'section' => 'xews_lite_inner_blog_section',
	'type'    => 'select',
	'choices' => array(
		'sidebar-left' => array(
			'image'=> get_template_directory_uri().'/assets/img/sidebar-layouts/left-sidebar.png',
			'name'=> esc_html__('Left Sidebar', 'xews-lite')
		),
		'sidebar-right' => array(
			'image'=> get_template_directory_uri().'/assets/img/sidebar-layouts/right-sidebar.png',
			'name'=> esc_html__('Right Sidebar', 'xews-lite')
		),
		'sidebar-none' => array(
			'image'=> get_template_directory_uri().'/assets/img/sidebar-layouts/no-sidebar.png',
			'name'=> esc_html__('No Sidebar', 'xews-lite')
		),
	)
) ) );


$wp_customize->add_setting( 'xews_lite_blog_sidebar_area', array( 
    'default' 			=> $xews_lite_customizer_defaults['xews_lite_blog_sidebar_area'],
    'sanitize_callback' => 'esc_html' 
) );

$wp_customize->add_control( 'xews_lite_blog_sidebar_area', array(
    'label'         => esc_html__( 'Sidebar Area','xews-lite'),
	'description' 	=> esc_html__( 'Choose area for sidebar to display.','xews-lite'),
    'section'       => 'xews_lite_inner_blog_section',
    'type'          => 'select',
    'choices'       => $xews_lite_get_widget_areas
) );


$wp_customize->add_setting( 'xews_lite_blog_sidebar_sticky_enable', array( 
    'default' 			=> $defaults['xews_lite_blog_sidebar_sticky_enable'],
    'sanitize_callback' => 'xews_lite_sanitize_checkbox' 
) );

$wp_customize->add_control( 'xews_lite_blog_sidebar_sticky_enable', array(
    'label'         => esc_html__( 'Sticky Sidebar','xews-lite'),
	'description' 	=> esc_html__( 'Make sidebar sticky as you scroll down?','xews-lite'),
    'section'       => 'xews_lite_inner_blog_section',
    'type'          => 'checkbox',
) );


$wp_customize->add_setting( 'xews_lite_inner_blog_excerpt', array( 
	'default' 			=> $defaults['xews_lite_inner_blog_excerpt'],
	'sanitize_callback' => 'xews_lite_sanitize_integer' 
) );

$wp_customize->add_control( 'xews_lite_inner_blog_excerpt', array(
	'type'    		=> 'number',
	'label'    		=> __( 'Blog / Archive Excerpt Length','xews-lite'),
	'description'   => __( 'Number of Words, will affect the "excerpt_length" hook and overall excerpts.','xews-lite'),
	'section' 		=> 'xews_lite_inner_blog_section',
) );


$wp_customize->add_setting( 'xews_lite_post_readmore_enable', array( 
    'default' 			=> $defaults['xews_lite_post_readmore_enable'],
    'sanitize_callback' => 'xews_lite_sanitize_checkbox' 
) );

$wp_customize->add_control( 'xews_lite_post_readmore_enable', array(
    'label'         => esc_html__( 'Enable Read More Button','xews-lite'),
    'section'       => 'xews_lite_inner_blog_section',
    'type'          => 'checkbox',
) );