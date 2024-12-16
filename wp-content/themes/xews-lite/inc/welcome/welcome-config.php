<?php
	
include get_template_directory() . '/inc/welcome/welcome.php';

/** Plugins **/
$plugins = array(
	// *** Companion Plugins
	'companion_plugins' => array(),

	// *** Required Plugins
	'required_plugins' => array(
		'cww-companion' => array(
			'slug' => 'cww-companion',
			'name' => esc_html__('Demo importer plugin', 'xews-lite'),
			'filename' =>'cww-companion.php',
			'host_type' => 'wordpress', // Use either bundled, remote, wordpress
			'class' => 'CWW_Companion',
			'info' => esc_html__('Adds ability to theme with one click demo import feature, which will help to publish your websies within few minutes.', 'xews-lite'),
		),
	
	),

	// *** Recommended Plugins
	'recommended_plugins' => array(
		// Free Plugins
		'free_plugins' => array(

			'cww-companion' => array(
				'slug' 		=> 'cww-companion',
				'filename' 	=> 'cww-companion.php',
				'class' 	=> 'CWW_Companion'
			),

			'contact-form-7' => array(
				'slug' 		=> 'contact-form-7',
				'filename' 	=> 'wp-contact-form-7.php',
				'class' 	=> 'WPCF7'
			),

			'cww-connector-lite' => array(
				'slug' 		=> 'cww-connector-lite',
				'filename' 	=> 'cww-connector-lite.php',
				'class' 	=> 'CWW_Connector_Lite'
			),

			'sticky-floating-forms-lite' => array(
				'slug' 		=> 'sticky-floating-forms-lite',
				'filename' 	=> 'sticky-floating-forms-lite.php',
				'class' 	=> 'Sticky_Floating_Forms_Lite'
			),
			
		),

		// Pro Plugins
		'pro_plugins' => array(
		)
	),
);
$theme = wp_get_theme();
$thname = $theme->Name; 
$strings = array(
	// Welcome Page General Texts
	'welcome_menu_text' 		=> $thname. esc_html__( ' Info', 'xews-lite' ),
	'theme_short_description' 	=> esc_html__( 'This is a perfect theme to create perfect news, blog, magazine website, please follow all the actions displayed below to create your website with an ease.', 'xews-lite' ),

	// Plugin Action Texts
	'install_n_activate' 	=> esc_html__('Install and Activate', 'xews-lite'),
	'deactivate' 			=> esc_html__('Deactivate', 'xews-lite'),
	'activate' 				=> esc_html__('Activate', 'xews-lite'),

	// Recommended Plugins Section
	'pro_plugin_title' 			=> esc_html__( 'Pro Plugins', 'xews-lite' ),
	'pro_plugin_description' 	=> esc_html__( 'Take Advantage of some of our Premium Plugins.', 'xews-lite' ),
	'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'xews-lite' ),
	'free_plugin_description' 	=> esc_html__( 'These Free Plugins might be handy for you.', 'xews-lite' ),

	// Demo Actions
	'activate_btn' 		=> esc_html__('Activate', 'xews-lite'),
	'installed_btn' 	=> esc_html__('Activated', 'xews-lite'),
	'demo_installing' 	=> esc_html__('Installing Demo', 'xews-lite'),
	'demo_installed' 	=> esc_html__('Demo Installed', 'xews-lite'),
	'demo_confirm' 		=> esc_html__('Are you sure to import demo content ?', 'xews-lite'),
	'doc_link'			=> 'https://codeworkweb.com/docs/xews/',

	//free vs pro
	'free_vs_pro' => array(
    ),


);

/**
 * Initiating Welcome Page
*/
$my_theme_wc_page = new CWW_Welcome( $plugins, $strings );
