<div class="cww-theme-steps-list">
<div class="left-box-wrapper-outer">
<div class="cww-box-wrapper cww-welcome-box-white">
	<div class="cww-box-header"><?php esc_html_e('Welcome','xews-lite'); ?></div>
	<div class="box-content">
		<?php $theme = wp_get_theme();
		$theme_name  = $theme->Name;
		?>
		<p><?php printf( '%1$s %2$s !! %3$s', esc_html__( 'Welcome! Thank you for choosing', 'xews-lite' ), $theme_name, esc_html__( 'Please make sure to install all recommended plugins to enjoy editing the theme.', 'xews-lite' ) ); ?></p>
	</div>
</div>	
<div class="cww-box-wrapper cww-welcome-box-white">
	<div class="cww-box-header"><?php esc_html_e('Links to Customizer Settings','xews-lite'); ?></div>
	<div class="cww-box-content">
		<ul class="cww-list clearfix">
			<?php
			 $url = admin_url( 'customize.php' );

	        $links = array(
	            array(
	                'label' => __( 'Logo & Site Identity', 'xews-lite' ),
	                'url' 	=> add_query_arg( array( 'autofocus' => array( 'section' => 'title_tagline' ) ), $url ),
	                'icon' 	=> 'dashicons dashicons-format-image',
	            ),
	            array(
	                'label' => __( 'Header Settings', 'xews-lite' ),
	                'url' 	=> add_query_arg( array( 'autofocus' => array( 'panel' => 'xews_lite_header_panel' ) ), $url ),
	                'icon' 	=> 'dashicons dashicons-align-center',
	            ),
	            array(
	                'label' => __( 'General Options', 'xews-lite' ),
	                'url' 	=> add_query_arg( array( 'autofocus' => array( 'section' => 'xews_lite_general_options' ) ), $url ),
	                'icon' 	=> 'dashicons dashicons-align-center',
	            ),
	            array(
	                'label' => __( 'Colors', 'xews-lite' ),
	                'url' 	=> add_query_arg( array( 'autofocus' => array( 'section' => 'colors' ) ), $url ),
	                'icon' 	=> 'dashicons dashicons-admin-generic',
	            ),
	            array(
	                'label' => __( 'Social Icons', 'xews-lite' ),
	                'url' 	=> add_query_arg( array( 'autofocus' => array( 'section' => 'xews_lite_headersocial_section' ) ), $url ),
	                'icon' 	=> 'dashicons dashicons-share',
	            ),
	            array(
	                'label' => __( 'Footer Settings', 'xews-lite' ),
	                'url' 	=> add_query_arg( array( 'autofocus' => array( 'section' => 'xews_lite_footer_copyright_section' ) ), $url ),
	                'icon' 	=> 'dashicons dashicons-admin-generic',
	            ),
	           
	        );

	        $links = apply_filters( 'cwwPortfolio/dashboard/links', $links );
	        ?> 

			<?php foreach( $links as $l ) { ?>
                <li>
                	<span class="<?php echo esc_attr($l['icon'])?>"></span>
                    <a class="cww-quick-setting-link" href="<?php echo esc_url( $l['url'] ); ?>" target="_blank"><?php echo esc_html( $l['label'] ); ?></a>
                </li>
            <?php } ?>
		</ul>
	</div>
</div>


</div>


<?php $this->admin_sidebar_contents(); ?>

</div>