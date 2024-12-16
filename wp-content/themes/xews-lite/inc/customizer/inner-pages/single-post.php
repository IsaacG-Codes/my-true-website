<?php 
$defaults = xews_lite_customizer_defaults();
/* Single Post/Page Section */
$wp_customize->add_section( 'xews_lite_inner_single_section', array(
	'title' => __('Single Page / Post Settings', 'xews-lite' ),
	'capability' => 'edit_theme_options',
	'panel' => 'xews_lite_inner_panel',
	'priority' => 20,
) );




$wp_customize->add_setting( 'xews_lite_inner_single_sidebar', array( 
	'default' 			=> $defaults['xews_lite_inner_single_sidebar'],
	'sanitize_callback' => 'xews_lite_sanitize_sidebar' 
) );

$wp_customize->add_control( new Image_Radio_Buttons( $wp_customize, 'xews_lite_inner_single_sidebar', array(
	'label'    => __( 'Single Page / Post Sidebar Style','xews-lite'),
	'section' => 'xews_lite_inner_single_section',
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


$xews_lite_get_widget_areas = xews_lite_get_widget_areas();

$wp_customize->add_setting( 'xews_lite_post_sidebar_area', array( 
    'default' 			=> $defaults['xews_lite_post_sidebar_area'],
    'sanitize_callback' => 'esc_html' 
) );

$wp_customize->add_control( 'xews_lite_post_sidebar_area', array(
    'label'         => esc_html__( 'Sidebar Area','xews-lite'),
	'description' 	=> esc_html__( 'Choose area for sidebar to display.','xews-lite'),
    'section'       => 'xews_lite_inner_single_section',
    'type'          => 'select',
    'choices'       => $xews_lite_get_widget_areas
) );


$wp_customize->add_setting( 'xews_lite_post_sidebar_sticky_enable', array( 
    'default' 			=> $defaults['xews_lite_post_sidebar_sticky_enable'],
    'sanitize_callback' => 'xews_lite_sanitize_checkbox' 
) );

$wp_customize->add_control( 'xews_lite_post_sidebar_sticky_enable', array(
    'label'         => esc_html__( 'Sticky Sidebar','xews-lite'),
	'description' 	=> esc_html__( 'Make sidebar sticky as you scroll down?','xews-lite'),
    'section'       => 'xews_lite_inner_single_section',
    'type'          => 'checkbox',
) );



/**
 * Accordion
 */
$wp_customize->add_setting( 'cww_related_post_accordion', 
	array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control( new Xews_Heading($wp_customize, 'cww_related_post_accordion', 
	array(
	    'label' 			=> esc_html__( 'Related Posts', 'xews-lite' ),
	    'section'     		=> 'xews_lite_inner_single_section',
	    'class'			    => 'related-posts-options-accordion',
	    'accordion'			=> true,
	    'expanded'         	=> false,
	    'controls_to_wrap'  => 6,
	    
       )
    )
);



$wp_customize->add_setting( 'xews_lite_related_posts_title', array(
    'default' 			=> $defaults['xews_lite_related_posts_title'],
    'sanitize_callback' => 'esc_html' 
) );

$wp_customize->add_control( 'xews_lite_related_posts_title', array(
    'label'    => __( 'Related Post Title','xews-lite'),
    'section' => 'xews_lite_inner_single_section',
    'type'    => 'text',
) );


$wp_customize->add_setting( 'xews_lite_related_post_type', array( 
    'default' 			=> $defaults['xews_lite_related_post_type'],
    'sanitize_callback' => 'esc_html' 
) );

$wp_customize->add_control( 'xews_lite_related_post_type', array(
    'label'         => esc_html__( 'Related Post Type','xews-lite'),
    'section'       => 'xews_lite_inner_single_section',
    'type'          => 'select',
    'choices'       => array(

        'cat'  => esc_html__( 'Related By Category', 'xews-lite' ),
        'tags'         => esc_html__( 'Related By Tags', 'xews-lite' ),
    ),
) );

/** Posts per page */
$wp_customize->add_setting( 'xews_lite_related_post_count', array( 
    'default' 			=> $defaults['xews_lite_related_post_count'],
    'sanitize_callback' => 'sanitize_text_field' 
) );

$wp_customize->add_control( 'xews_lite_related_post_count', array(
    'label'    => esc_html__( 'Posts Per Page','xews-lite'),
    'section'  => 'xews_lite_inner_single_section',
    'type'    => 'number',
    
) );

/** offset */
$wp_customize->add_setting( 'xews_lite_related_post_offset', array( 
    'default' 			=> $defaults['xews_lite_related_post_offset'],
    'sanitize_callback' => 'sanitize_text_field' 
) );

$wp_customize->add_control( 'xews_lite_related_post_offset', array(
    'label'    => esc_html__( 'Offset','xews-lite'),
    'section'  => 'xews_lite_inner_single_section',
    'type'    => 'number',
    
) );

// post excerpts
$wp_customize->add_setting( 'xews_lite_related_post_excerpts', array( 
    'default' 			=> $defaults['xews_lite_related_post_excerpts'],
    'sanitize_callback' => 'sanitize_text_field' 
) );

$wp_customize->add_control( 'xews_lite_related_post_excerpts', array(
    'label'    => esc_html__( 'Excerpts','xews-lite'),
    'section'  => 'xews_lite_inner_single_section',
    'type'    => 'number',
    
) );
