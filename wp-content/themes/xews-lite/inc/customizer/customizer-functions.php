<?php
/**
 * Important functions for theme customizer
 * 
 */

/** Checkbox Sanitization Callback 
 * 
 * Sanitization callback for 'checkbox' type controls.
 * This callback sanitizes $input as a Boolean value, either
 * TRUE or FALSE.
 */
function xews_lite_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
}




function xews_lite_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function xews_lite_sanitize_integer($input){
	return intval( $input );
}

/**
 * Number sanitization callback
 *
 */
function xews_lite_sanitize_number( $val ) {
	return is_numeric( $val ) ? $val : 0;
}




function xews_lite_sanitize_sidebar( $input ) {
	$valid_keys = array(
		'sidebar-left' => array('image'=> get_template_directory_uri().'/assets/img/sidebar-layouts/left-sidebar.png',
			'name'=>__('Left Sidebar', 'xews-lite')
		),
		'sidebar-right' => array('image'=> get_template_directory_uri().'/assets/img/sidebar-layouts/right-sidebar.png',
			'name'=>__('Right Sidebar', 'xews-lite')
		),
		'sidebar-none' => array('image'=> get_template_directory_uri().'/assets/img/sidebar-layouts/no-sidebar.png',
			'name'=>__('No Sidebar', 'xews-lite')
		),
		
	);

	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function xews_lite_sanitize_th_color( $input ) {
	$valid_keys = array(
		'#ff3d4f' => array(
			'image'=> get_template_directory_uri().'/assets/img/color3.png',
		),
		'#00bbf0' => array(
			'image'=> get_template_directory_uri().'/assets/img/color1.png',
		),
		'#f70776' => array(
			'image'=> get_template_directory_uri().'/assets/img/color2.png',
		),
		'#42b883' => array(
			'image'=> get_template_directory_uri().'/assets/img/color4.png',
		),
		'#fe31aa' => array(
			'image'=> get_template_directory_uri().'/assets/img/color5.png',
		),
		
	);

	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}