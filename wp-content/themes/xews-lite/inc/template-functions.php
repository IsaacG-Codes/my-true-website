<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Xews Lite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function xews_lite_body_classes( $classes ) {

    $defaults                       = xews_lite_customizer_defaults();

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

   
    if( ! is_singular() ){
        $classes[] = 'blog-list';
    }

	return $classes;
}
add_filter( 'body_class', 'xews_lite_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function xews_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'xews_lite_pingback_header' );



/**
 * Function for excerpt length
 */
if( ! function_exists( 'xews_lite_get_excerpt_content' ) ):
    function xews_lite_get_excerpt_content( $limit ) {

        $striped_contents   = strip_shortcodes( get_the_excerpt() );
        $striped_content    = strip_tags( $striped_contents );
        $limit_content      = mb_substr( $striped_content, 0 , $limit );
       
        return $limit_content;
    }
    endif;


/**
* Fallback image if featured image is not available
*
*/
if( !function_exists( 'xews_lite_home_element_img' ) ) :
    function xews_lite_home_element_img($img_size='full') {
      
        
        $fallback_img_url = get_theme_mod( 'xews_lite_post_fallback_image' );
        $img_src = '';
        if( has_post_thumbnail() ) {
             $image_id      = get_post_thumbnail_id();
             $image_path    = wp_get_attachment_image_src( $image_id, $img_size, true );
             $img_src       = $image_path[0];
            
        } elseif( $fallback_img_url  ) {
            $fallback_img_id    = attachment_url_to_postid( $fallback_img_url );
            $fallback_image_url = wp_get_attachment_image_src( $fallback_img_id, $img_size, true );
            $img_src       = $fallback_image_url[0];
        } 
        return $img_src;
    }
endif;


/**
 * Function to display post categories or tags lists
 *
 * @since 1.0.0
 */
add_action( 'xews_lite_post_cat_or_tag_lists', 'xews_lite_post_cat_or_tag_lists_cb' );
if( ! function_exists( 'xews_lite_post_cat_or_tag_lists_cb' ) ) :
    function xews_lite_post_cat_or_tag_lists_cb() {

        if ( 'post' === get_post_type() ) {
            
                global $post;
                $categories = get_the_category();
                $separator = ' ';
                $output = '';
                if( $categories ) {

                    $output .= '<span class="cat-links layout3">';
                    
                    foreach( $categories as $category ) {
                        $output .= '<a href="'.get_category_link( $category->term_id ).'" class="cat-' . $category->term_id . '" rel="category tag">'.$category->cat_name.'</a>';                       
                    }
                       
                    $output .='</span>';
                    echo trim( $output, $separator );
                   
                }
        }
    }
endif;


/**
* Retrieve post meta and default value of metabox
* @since 1.0.0
*/
function xews_lite_get_post_meta( $key, $defaults = '' ){
    global $post;
  
    if(! $post )
      return;
      
      $default = $defaults;
      $meta_val =  get_post_meta( $post->ID, $key , true ); 
  
      if( empty($meta_val) && ($defaults != '') ){
          $meta_val = $default;
      }
  
      return $meta_val;
  
  }


  /**
   * Get all registered widget areas list
   * 
   */
/* Creating a function that will return an array of all the registered widget areas. */
  if ( ! function_exists('xews_lite_get_widget_areas')):
    function xews_lite_get_widget_areas(){
        global $wp_registered_sidebars;
        $widgets_areas 		= array();
        $get_widget_areas 	= $wp_registered_sidebars;
        if ( ! empty( $get_widget_areas ) ) {
            foreach ( $get_widget_areas as $widget_area ) {
                $name 	= isset ( $widget_area['name'] ) ? $widget_area['name'] : '';
                $id 	= isset ( $widget_area['id'] ) ? $widget_area['id'] : '';
                if ( $name && $id ) {
                    $widgets_areas[$id] = $name;
                }
            }
        }
        return $widgets_areas;
    }
  endif;


  /**
   * Sidebar body class Controller function
   * 
   */
  add_filter( 'body_class', 'xews_lite_sidebar_body_class' );
  if( ! function_exists( 'xews_lite_sidebar_body_class' ) ):
    function xews_lite_sidebar_body_class($classes) {
        global $post;
        $defaults                   = xews_lite_customizer_defaults();
        $post_meta 					= empty(xews_lite_get_post_meta('xews_lite_sidebar_layout')) ? 'default' : xews_lite_get_post_meta('xews_lite_sidebar_layout');
        $xews_lite_inner_single_sidebar 	= get_theme_mod( 'xews_lite_inner_single_sidebar', $defaults['xews_lite_inner_single_sidebar']);
        $xews_lite_inner_blog_sidebar    = get_theme_mod( 'xews_lite_inner_blog_sidebar', $defaults['xews_lite_inner_blog_sidebar']);


        if(!is_search() && is_singular()){
	
            if( $post_meta == 'default' ) {
                $classes[] 	=  $xews_lite_inner_single_sidebar;
            }else{
                $classes[] 	=  $post_meta;   
            }
        }
        if ( is_archive() || is_home()  || is_search() ) {
            $classes[] 	=  $xews_lite_inner_blog_sidebar;
        }

        return $classes;

    }
    endif;



/**
* Numeric post navigation for archive pages
*
*/
if( ! function_exists('xews_lite_numeric_posts_nav')){
    function xews_lite_numeric_posts_nav() {
     
        if( is_singular() )
            return;
     
        global $wp_query;
     
        /** Stop execution if there's only 1 page */
        if( $wp_query->max_num_pages <= 1 )
            return;
     
        $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
        $max   = intval( $wp_query->max_num_pages );
     
        /** Add current page to the array */
        if ( $paged >= 1 )
            $links[] = $paged;
     
        /** Add the pages around the current page to the array */
        if ( $paged >= 3 ) {
            $links[] = $paged - 1;
            $links[] = $paged - 2;
        }
     
        if ( ( $paged + 2 ) <= $max ) {
            $links[] = $paged + 2;
            $links[] = $paged + 1;
        }
     
        echo '<div class="xews-archive-navigation clear">';
        printf( '<span class="total-page-text opcty">%s %s %s %s</span>' . "\n", esc_html__('Page','xews-lite'), $paged, esc_html__('of','xews-lite'), $max );
        /** Previous Post Link */
        if ( get_previous_posts_link() )
            printf( '<span class="prev">%s</span>' . "\n", get_previous_posts_link('<i class="fas fa-angle-double-left"></i>') );


        echo '<ul>';
        /** Link to first page, plus ellipses if necessary */
        if ( ! in_array( 1, $links ) ) {
            $class = 1 == $paged ? ' class="active"' : '';
     
            printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
     
            if ( ! in_array( 2, $links ) )
                echo '<li>...</li>';
        }
     
        /** Link to current page, plus 2 pages in either direction if necessary */
        sort( $links );
        foreach ( (array) $links as $link ) {
            $class = $paged == $link ? ' class="active"' : '';
            printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
        }
     
        /** Link to last page, plus ellipses if necessary */
        if ( ! in_array( $max, $links ) ) {
            if ( ! in_array( $max - 1, $links ) )
                echo '<li>...</li>' . "\n";
     
            $class = $paged == $max ? ' class="active"' : '';
            printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
        }
        echo '</ul>';
        /** Next Post Link */
        if ( get_next_posts_link() )
            printf( '<span class="next">%s</span>' . "\n", get_next_posts_link('<i class="fas fa-angle-double-right"></i>') );
     
        echo '</div>' . "\n";
     
    }
}



/**
 * Search Ajax Function
 * 
 * 
 */
function xews_lite_ajax_search_function(){

    $key = $_POST['key'];
    ob_start();
    $args = array(
            'posts_per_page'    => 3,
            's'                 => $key,
            'post_type'         => 'post',
            'post_status'       => 'publish',
            'orderby'           => 'title', 
            'order'             => 'ASC' 
    );
            
    $the_query = new WP_Query( $args);
    
    ?>
      <div class="search-res-wrap">   
        <?php
        if( $the_query->have_posts() ){
            
            while( $the_query->have_posts() ): $the_query->the_post(); ?>
                
                <div class="search-content-wrap cww-flex">
                    <?php if( has_post_thumbnail() ){
                            $has_img = '';
                        ?>
                        <div class="img-wrap">
                            <a href="<?php the_permalink()?>">
                                <?php the_post_thumbnail(); ?>    
                            </a>
                        </div>
                    <?php }else{
                            $has_img = 'no-image';
                    } ?>
                    <div class="cont-search-wrap <?php echo esc_attr($has_img);?>">
                        <div class="title">
                            <a href="<?php the_permalink()?>">
                                <?php the_title(); ?>
                            </a>
                        </div>
                        <div class="post-meta">
                            <?php  xews_lite_posted_on(); ?>
                        </div>
                    </div>
                </div>
                <div class="ajax-search-view-all">
                <i class="fa-solid fa-magnifying-glass"></i>
                    <a href="<?php echo esc_url( home_url( '/' ).'?s='.$key ); ?>"><?php esc_html_e('View All Result','xews-lite') ?></a>
                </div>
                
            <?php endwhile;
        }else{ ?>
            <div class="no-match">
                <?php esc_html_e('No Match Found','xews-lite'); ?>
            </div>
        <?php 
        }
        wp_reset_query(); ?>
    </div>
    <?php 
    $return = ob_get_contents();
    ob_get_clean();
    echo ''.$return; //Escaping of all variables already done above
    die();
}
add_action('wp_ajax_xews_lite_ajax_search_function','xews_lite_ajax_search_function');
add_action( 'wp_ajax_nopriv_xews_lite_ajax_search_function', 'xews_lite_ajax_search_function' );


/**
 * Generate theme colors and pass it in filter for modification.
 * @since 1.0.7
 */
function xews_lite_theme_color_filter(){

    $colors = array(
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

    $colors = apply_filters('xews_lite_theme_color_filter', $colors);
    return $colors;

}