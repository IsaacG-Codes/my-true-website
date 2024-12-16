<?php
add_action('xews_lite_top_header','xews_lite_site_branding', 10 );
add_action('xews_lite_top_header','xews_lite_top_left_header', 20 );
add_action('xews_lite_bottom_header','xews_lite_header_nav', 10 );
add_action('xews_lite_bottom_header','xews_lite_header_search', 20 );
add_action('xews_lite_main_header','xews_lite_header_structure_controller', 10 );

$defaults 			        = xews_lite_customizer_defaults();
$xews_lite_darkmode_enable  = get_theme_mod('xews_lite_darkmode_enable', $defaults['xews_lite_darkmode_enable']);
if( true == $xews_lite_darkmode_enable ){
    add_action( 'wp_head', 'xews_lite_head_scripts' );
}

function xews_lite_site_branding(){
    ?>
        
        <div class="site-branding">
            <?php
            if ( has_custom_logo() ) {
                the_custom_logo();
            }
            ?>
            <div class="site-title-desc-wrap">
                <?php
                $theme_name = get_bloginfo( 'name' );

                if ( is_front_page() && is_home() ) :
                    ?>
                <h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php echo esc_html( $theme_name ); ?>
                    </a>
                </h1>
                <?php
                else : ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( $theme_name ); ?></a></p>
                    <?php
                endif;
                $xews_lite_description = get_bloginfo( 'description', 'display' );
                if ( $xews_lite_description || is_customize_preview() ) :
                    ?>
                    <p class="site-description"><?php echo esc_html($xews_lite_description);?></p>
                    <?php 
                endif; ?>
            </div>
        </div><!-- .site-branding -->
<?php 
}


function xews_lite_header_nav(){
    $defaults 				        = xews_lite_customizer_defaults();
    $xews_lite_nav_hover_effect 	= get_theme_mod('xews_lite_nav_hover_effect', $defaults['xews_lite_nav_hover_effect']);

    ?>

    <div class="header-main-menu <?php echo esc_attr($xews_lite_nav_hover_effect)?> clear">
        <nav id="site-navigation" class="main-navigation">
            <button class="button is-text" id="mob-toggle-menu-button">
                <span class="button-inner-wrapper">
                    <span class="icon menu-icon"></span>
                </span>
            </button>
            
            <div class="menu-item-inner-wrapper">
                <button class="button btn-menu-close is-text" id="mob-menu-collapse">
                    <i class="fas fa-times"></i>
                </button>

                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                    'container_class' => 'menu-primary-menu-container'
                ) );
                ?>
            </div>
            <div class="menu-last-focus-item"></div>       
        </nav><!-- #site-navigation -->

    </div>

    <?php 
}


function xews_lite_header_social_icons(){

    

    $social_profiles = array(
        'facebook'  => 'fa-brands fa-facebook-f',
        'instagram' => 'fa-brands fa-instagram',
        'linkedin'  => 'fa-brands fa-linkedin-in',
        'twitter'   => 'fa-brands fa-x-twitter',
    );
    
    
    echo '<div class="social-icon-wrapp">';
    echo '<ul>';
    foreach( $social_profiles as $key => $val ){
        
        $xews_lite_header_icons = get_theme_mod( 'xews_lite_header_icons_'.$key );

        if( $xews_lite_header_icons ){
            wp_print_styles( array('fontawesome') );
        echo '<li>';
            echo  '<a href="'.esc_url($xews_lite_header_icons).'">';
            echo  '<i class="'.esc_attr($val).'"></i></a>';
        echo '</li>';
        }

      
    }
    echo '</ul>';
    echo '</div>'; 

}



/**
 * Header search
 */
function xews_lite_header_search(){

    $defaults 			        = xews_lite_customizer_defaults();
    $xews_lite_search_display_enable = get_theme_mod( 'xews_lite_search_display_enable', $defaults['xews_lite_search_display_enable'] );

    if( false == $xews_lite_search_display_enable ){
        return;
    }

    wp_print_styles( array('fontawesome') );
	?>

    <div class="right-wrapp cww-flex">
        <div class="search-wrapper layout-one">
            <button class="search-icon btn-no-effect">
                <i class="fa-solid fa-magnifying-glass active"></i>
                <i class="fas fa-times"></i>
            </button>
            <?php  echo xews_lite_search_content_form(); ?>
        </div>
        <?php xews_lite_dark_toggle(); ?>
    </div>
	<?php 
}



function xews_lite_search_content_form(){
	?>
    <div class="header-search-content layout-one">
        
        <div class="xews-search-form">
            <?php echo get_search_form(); ?>
        </div>
        
        <?php // Ajax search result area ?>
        <div class="xews-ajax-search-area search-content">
        </div>
    </div>
	<?php 
}


function xews_lite_header_date(){

    $defaults 			        = xews_lite_customizer_defaults();
    $xews_lite_date_display_enable   = get_theme_mod( 'xews_lite_date_display_enable', $defaults['xews_lite_date_display_enable'] );
    $xews_lite_date_display_type     = get_theme_mod( 'xews_lite_date_display_type', $defaults['xews_lite_date_display_type'] );

    if( false == $xews_lite_date_display_enable ){
        return;
    }
    wp_print_styles( array('fontawesome') );
    ?>
    <div class="header-date">
        <?php if( $xews_lite_date_display_type == 'date-only' || $xews_lite_date_display_type == 'date-time'){ ?>
            <span class="date">
            <i class="fa-solid fa-calendar-days"></i>
                <?php echo date_i18n("l, F j")?>
            </span>
        <?php } ?>
        
        <?php if( $xews_lite_date_display_type == 'time-only' || $xews_lite_date_display_type == 'date-time'){ ?> 
            <i class="fa-regular fa-clock"></i>
            <span class="time"></span>
        <?php } ?>

    </div>

<?php }

function xews_lite_top_left_header(){
    ?>
    <div class="left-wrapp cww-flex">
    <?php 
    xews_lite_header_social_icons();
    xews_lite_header_date();
    ?>
    </div>
    <?php 
}

function xews_lite_dark_toggle(){
    $defaults 			        = xews_lite_customizer_defaults();
    $xews_lite_darkmode_enable  = get_theme_mod('xews_lite_darkmode_enable', $defaults['xews_lite_darkmode_enable']);
    if( false == $xews_lite_darkmode_enable ){
        return;
    }
    
    wp_print_styles( array('fontawesome') );
    ?>
    <button class="xews-dark-mode-toggle cww-flex">
        <span class="light">
            <i class="fa-regular fa-sun"></i>
        </span>
        <span class="dark">
            <i class="fa-regular fa-moon"></i>
        </span>
        <span class="light-dark-switch"></span>
    </button>
    <?php
}

function xews_lite_header_structure_controller(){
    $headerImage =  get_header_image() ?  get_header_image() : '';
    $headerClass = $headerImage ? 'has-img': '';

    do_action('xews_lite_top_top_header');
    ?>
    <div class="main-header xews-header-container <?php echo esc_attr($headerClass)?>" style="background-image:url(<?php echo esc_url($headerImage)?>)">
        <div class="container">
            <div class="main-header-xews-wrapper main-header-elem-wrap header-elements-wrap cww-flex">
                <?php  do_action('xews_lite_top_header'); ?>
            </div>
        </div>
    </div>

    <div class="bottom-header xews-header-container">
        <div class="container">
            <div class="bottom-header-xews-wrapper bottom-header-elem-wrap header-elements-wrap cww-flex">
                <?php  do_action('xews_lite_bottom_header'); ?>
            </div>
        </div>
    </div>

    <?php 
    
}


function xews_lite_head_scripts()
{
    ?>
    <script type="text/javascript">
        let xews_lite_storageKey = 'theme-preference';

        let xews_lite_getColorPreference = function () {
            if (localStorage.getItem(xews_lite_storageKey))
                return localStorage.getItem(xews_lite_storageKey);
            else
                return window.matchMedia('(prefers-color-scheme: dark)').matches
                    ? 'dark'
                    : 'light';
        };

        let xews_lite_theme = {
            value: xews_lite_getColorPreference()
        };

        let xews_lite_setPreference = function () {
            localStorage.setItem(xews_lite_storageKey, xews_lite_theme.value);
            xews_lite_reflectPreference();
        };

        let xews_lite_reflectPreference = function () {
            document.firstElementChild.setAttribute("data-theme", xews_lite_theme.value);
            document.querySelector(".xews-dark-mode-toggle")?.setAttribute("aria-label", xews_lite_theme.value);
        };

        // Set early so no page flashes / CSS is made aware
        xews_lite_reflectPreference();

        window.addEventListener('load', function () {
            xews_lite_reflectPreference();
            let toggleBtn = document.querySelector(".xews-dark-mode-toggle");
            if (toggleBtn) {
                toggleBtn.addEventListener("click", function () {
                    xews_lite_theme.value = xews_lite_theme.value === 'light' ? 'dark' : 'light';
                    xews_lite_setPreference();
                });
            }
        });

        // Sync with system changes
        window
            .matchMedia('(prefers-color-scheme: dark)')
            .addEventListener('change', ({matches: isDark}) => {
                xews_lite_theme.value = isDark ? 'dark' : 'light';
                xews_lite_setPreference();
            });
    </script>
    <?php
}