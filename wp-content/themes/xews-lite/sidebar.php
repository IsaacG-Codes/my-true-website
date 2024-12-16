<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Xews Lite
 */

global $post;

$defaults 						= xews_lite_customizer_defaults();
$post_meta 						= empty(xews_lite_get_post_meta('xews_lite_sidebar_layout')) ? 'default' : xews_lite_get_post_meta('xews_lite_sidebar_layout');
$xews_lite_sidebar 				= xews_lite_get_post_meta('xews_lite_sidebar'); //meta sidebar area
$xews_lite_post_sidebar_area  	= get_theme_mod( 'xews_lite_post_sidebar_area', $defaults['xews_lite_post_sidebar_area'] );
$xews_lite_inner_single_sidebar = get_theme_mod( 'xews_lite_inner_single_sidebar', $defaults['xews_lite_inner_single_sidebar']);
$xews_lite_blog_sidebar_area 	= get_theme_mod( 'xews_lite_blog_sidebar_area', $defaults['xews_lite_blog_sidebar_area']);
$xews_lite_inner_blog_sidebar 	= get_theme_mod( 'xews_lite_inner_blog_sidebar', $defaults['xews_lite_inner_blog_sidebar']);
$post_sidebar 					= '';
$sidebar 						= '';

if(!is_search() && is_single()){
	
	if( ($post_meta == 'default') && ($xews_lite_inner_single_sidebar == 'sidebar-left' || $xews_lite_inner_single_sidebar == 'sidebar-right') ) {

		$post_sidebar 	=  $xews_lite_inner_single_sidebar;
		$sidebar 		= $xews_lite_post_sidebar_area;

	}else if( $post_meta == 'sidebar-left' || 'sidebar-right' ){

		$post_sidebar 	=  $post_meta;
		$sidebar 		= $xews_lite_sidebar;
	}else{
		$post_sidebar 	=  $post_meta;
		$sidebar 		= '';
	}

	
}

if(!is_search() && is_page() && !is_front_page()){

	if( ($post_meta == 'default') && ($xews_lite_inner_single_sidebar == 'sidebar-left' || $xews_lite_inner_single_sidebar == 'sidebar-right') ) {

		$post_sidebar 	=  $xews_lite_inner_single_sidebar;
		$sidebar 		= $xews_lite_post_sidebar_area;

	}else if( $post_meta == 'sidebar-left' || 'sidebar-right' ){

		$post_sidebar 	=  $post_meta;
		$sidebar 		= $xews_lite_sidebar;
	}else{
		$post_sidebar 	=  $post_meta;
		$sidebar 		= '';
	}

}

if ( is_archive() || is_404() ) {
     $post_sidebar 	= $xews_lite_inner_blog_sidebar;
     $sidebar 		= $xews_lite_blog_sidebar_area;
}

if( is_search() ){
	$post_sidebar 	= $xews_lite_inner_blog_sidebar;
	$sidebar 		= $xews_lite_blog_sidebar_area;	
}



if( is_home() ){
	$post_sidebar 	= $xews_lite_inner_blog_sidebar;
	$sidebar 		= $xews_lite_blog_sidebar_area;
}


          

if ( ($post_sidebar ==  'sidebar-none')  ) {
	return;
}



if( ($post_sidebar == 'sidebar-left' || $post_sidebar == 'sidebar-right')  && is_active_sidebar($sidebar)){
	?>
		<aside class="widget-area secondary <?php echo esc_attr($post_sidebar);?>" role="complementary">
			<?php dynamic_sidebar( $sidebar ); ?>
		</aside><!-- #secondary -->
	<?php
}
