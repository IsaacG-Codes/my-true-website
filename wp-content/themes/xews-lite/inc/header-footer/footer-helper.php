<?php

add_action('xews_lite_bottom_footer','xews_lite_footer_copyrights', 10 );
add_action('xews_lite_bottom_footer','xews_lite_header_social_icons', 20 );
add_action('xews_lite_main_footer','xews_lite_footer_structure', 10 );

function xews_lite_footer_copyrights(){
    $xews_lite_footer_copyright_text = get_theme_mod('xews_lite_footer_copyright_text','');
?>
    <div class="site-info">
        <?php
        if(!empty($xews_lite_footer_copyright_text)){
            echo wp_kses_post($xews_lite_footer_copyright_text);
        }else{
            esc_html_e('Copyright','xews-lite');echo esc_html(' &copy; '.date('Y'));
        }
        ?>
        <span class="sep"> | </span>
        <?php
        /* translators: 1: Theme name, 2: Theme author. */
        printf( esc_html__( 'WordPress Theme: %1$s', 'xews-lite' ),'<a href="'.esc_url('https://codeworkweb.com/wordpress-themes/xews-lite').'">Xews Lite</a>' );
        ?>
    </div>

<?php }


function xews_lite_footer_structure(){
    ?>
    <footer id="colophon" class="site-footer">
			<div class="xews-footer-wrap">
                <div class="bottom-footer xews-footer-container">
                    <div class="bottom-footer-xews-wrapper bottom-footer-elem-wrap footer-elements-wrap cww-flex container">
                        <?php  do_action('xews_lite_bottom_footer'); ?>
                    </div>
                </div>
            </div>
    </footer>

<?php }