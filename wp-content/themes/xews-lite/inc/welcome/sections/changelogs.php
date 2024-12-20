<div class="cww-theme-steps-list">
	<div class="left-box-wrapper-outer cww-changelogs">
		<h3 class="cww-box-header"><?php esc_html_e('Changelogs','xews-lite'); ?></h3>
		
		<?php
			WP_Filesystem();
			global $wp_filesystem;
			$changelog 			= $wp_filesystem->get_contents( get_stylesheet_directory().'/changelog.txt' );
			$changelog 			= str_replace('=== v1','<br/><br/><strong>=== 1',$changelog);
			$changelog 			= str_replace('-','</strong><br/>-',$changelog);

			echo ''.wp_kses_post($changelog);
			echo '<hr />';
		?>
</div>
<?php $this->admin_sidebar_contents(); ?>
</div>