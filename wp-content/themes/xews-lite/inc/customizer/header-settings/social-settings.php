<?php 
/* social Section */
$wp_customize->add_section( 'xews_lite_headersocial_section', array(
	'title' => __('Header/Footer Social', 'xews-lite' ),
	'capability' => 'edit_theme_options',
	'panel' => 'xews_lite_header_panel',
	
) );

$social_profiles = array(
    'facebook'  => esc_html__('Facebook','xews-lite'),
    'instagram' => esc_html__('Instagram','xews-lite'),
    'linkedin'  => esc_html__('LinkedIn','xews-lite'),
    'twitter'   => esc_html__('X','xews-lite'),
);

foreach( $social_profiles as $key => $value ){

    $wp_customize->add_setting( 'xews_lite_header_icons_'.$key, array( 
        'sanitize_callback' => 'sanitize_url',
    ) );
    
    $wp_customize->add_control( 'xews_lite_header_icons_'.$key, array(
        'label'    	=> $value.esc_html__( ' profile URL','xews-lite'),
        'section' 	=> 'xews_lite_headersocial_section',
        'type'    	=> 'url',
    ) );

}