<?php 

function xews_lite_customizer_controller_scripts(){

	wp_enqueue_style( 'xews-controller-heading', get_theme_file_uri( '/inc/customizer/controls/controller-heading/controller-heading.css' ), array(), XEWS_LITE_VERSION );
	
	wp_enqueue_script( 'xews-controller-heading', get_theme_file_uri('/inc/customizer/controls/controller-heading/controller-heading.js'), array('jquery','customize-controls'), XEWS_LITE_VERSION, true );
	
}
add_action('customize_controls_enqueue_scripts','xews_lite_customizer_controller_scripts');



/**
* Load controls for customizer
*
*/
$file 		= get_template_directory().'/inc/customizer/controls/';

$file_paths = array(

    $file.'controller-heading/controller-heading',

);

foreach ( $file_paths as $file_path ){

	require $file_path.'.php'; 
}