<?php
/**
* Strip whitespace in dynamic style
*/
if( !function_exists('xews_lite_strip_css_whitespace') ){
    function xews_lite_strip_css_whitespace($css){
        $replace = array(
        "#/\*.*?\*/#s" => "",  // Strip C style comments.
        "#\s\s+#"      => " ", // Strip excess whitespace.
        );
        $search = array_keys($replace);
        $css = preg_replace($search, $replace, $css);
        
        $replace = array(
        ": "  => ":",
        "; "  => ";",
        " {"  => "{",
        " }"  => "}",
        ", "  => ",",
        "{ "  => "{",
        ";}"  => "}", // Strip optional semicolons.
        ",\n" => ",", // Don't wrap multiple selectors.
        "\n}" => "}", // Don't wrap closing braces.
        //"} "  => "}\n", // Put each rule on it's own line.
        );
        $search = array_keys($replace);
        $css = str_replace($search, $replace, $css);
        
        return trim($css);
    }
}

add_action( 'wp_enqueue_scripts', 'xews_lite_dynamic_styles' );

if( ! function_exists('xews_lite_dynamic_styles')):
	function xews_lite_dynamic_styles(){

		ob_start();

		$defaults 					                = xews_lite_customizer_defaults();
        $xews_lite_theme_color                      = get_theme_mod('xews_lite_theme_color', $defaults['xews_lite_theme_color']);
        $xews_lite_container_width                  = get_theme_mod('xews_lite_container_width', $defaults['xews_lite_container_width']);
        $xews_lite_date_text_color                  = get_theme_mod('xews_lite_date_text_color', $defaults['xews_lite_date_text_color']);
        $xews_lite_nav_text_transform               = get_theme_mod('xews_lite_nav_text_transform', $defaults['xews_lite_nav_text_transform']);
        $xews_lite_nav_font_size                    = get_theme_mod('xews_lite_nav_font_size', $defaults['xews_lite_nav_font_size']);
        $xews_lite_nav_color                        = get_theme_mod('xews_lite_nav_color', $defaults['xews_lite_nav_color']);
        $xews_lite_nav_bg_color                     = get_theme_mod('xews_lite_nav_bg_color', $defaults['xews_lite_nav_bg_color']);
        $xews_lite_search_icon_color                = get_theme_mod( 'xews_lite_search_icon_color', $defaults['xews_lite_search_icon_color'] );
        
        ?>

        
        .header-date{
            color: <?php echo esc_attr($xews_lite_date_text_color) ?>;
        }

       
        .search-wrapper button.search-icon.btn-no-effect i{
            color: <?php echo esc_attr($xews_lite_search_icon_color) ?>;
        }


        .container{
            max-width: <?php echo esc_attr($xews_lite_container_width) ?>px;
        }
        
        :root{
            --theme-color: <?php echo esc_attr($xews_lite_theme_color); ?>;
        }

       
        .main-navigation .menu-primary-menu-container ul li a{
            text-transform: <?php echo esc_attr($xews_lite_nav_text_transform); ?>;
            font-size: <?php echo esc_attr($xews_lite_nav_font_size); ?>px;
            color: <?php echo esc_attr($xews_lite_nav_color); ?>;
        }

        .header-main-menu.bg-underline .main-navigation .menu-primary-menu-container > ul > li:hover > a,
        .header-main-menu.background .main-navigation .menu-primary-menu-container > ul > li:hover > a{
            background-color: <?php echo esc_attr($xews_lite_nav_bg_color); ?>
        }


        <?php
        /**
         * Category Colors
         */
        global $xews_lite_cat_array;
        if( $xews_lite_cat_array ):
            foreach ( $xews_lite_cat_array as $key => $value ) {

                $cat_color               = get_theme_mod('xews_lite_cat_color_' . $key, '#ff3d4f');
                
                ?>

                span.cat-links .cat-<?php echo esc_html($key) ?>{
                        background: <?php echo esc_attr($cat_color) ?>;
                        color: #fff;
                }
        
            <?php
            }
        
        endif;

		$custom_css = ob_get_clean();
		$custom_css = xews_lite_strip_css_whitespace( $custom_css );

		wp_add_inline_style( 'xews-style', $custom_css );

	}
endif;