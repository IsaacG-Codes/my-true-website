<?php
/**
 * Customizer settings default values
 * 
 */


/* A function that returns an array of default values for the theme. */
if( ! function_exists('xews_lite_customizer_defaults') ):
    function xews_lite_customizer_defaults(){
        $defaults = array();
        $theme_color = '#ff3d4f';

        $defaults['xews_lite_theme_color']                   = $theme_color;
      
    
        $defaults['xews_lite_search_icon_color']             = '#fff';
        $defaults['xews_lite_date_display_enable']           = true;
        $defaults['xews_lite_darkmode_enable']               = true;
        $defaults['xews_lite_search_display_enable']         = true;
        $defaults['xews_lite_date_display_type']             = 'date-only';
        $defaults['xews_lite_date_text_color']               = '#fff';
        $defaults['xews_lite_nav_font_size']                 = 16;
        $defaults['xews_lite_nav_text_transform']            = 'none';
        $defaults['xews_lite_nav_hover_effect']              = 'none';
        $defaults['xews_lite_nav_bg_color']                  = '#333';
        $defaults['xews_lite_nav_underline_color']           = $theme_color;


        $defaults['xews_lite_title_tagline_color']           = '#333';

        
        $defaults['xews_lite_container_width']               = 1200;
        $defaults['xews_lite_related_posts_title']           = esc_html__('Related Posts','xews-lite');
        $defaults['xews_lite_related_post_type']             = 'cat';
        $defaults['xews_lite_related_post_count']            = 3;
        $defaults['xews_lite_related_post_offset']           = 0;
        $defaults['xews_lite_related_post_excerpts']         = 200;


        $defaults['xews_lite_inner_single_sidebar']          = 'sidebar-right';
        $defaults['xews_lite_inner_blog_sidebar']            = 'sidebar-right';
        $defaults['xews_lite_post_sidebar_area']             = 'sidebar-1';
        $defaults['xews_lite_post_sidebar_sticky_enable']    = true;
        $defaults['xews_lite_blog_sidebar_sticky_enable']    = true;
        $defaults['xews_lite_inner_blog_excerpt']            = 350;
        $defaults['xews_lite_post_readmore_enable']          = false;
        
        $defaults['xews_lite_blog_sidebar_area']             = 'sidebar-1';
        

        $defaults['xews_lite_nav_color']                     = '#fff';

        $defaults = apply_filters('xews_lite_default_theme_options', $defaults);
        return $defaults;

    }
endif;

$xews_lite_customizer_defaults = xews_lite_customizer_defaults();