<?php 	
/*
* Default search form template
* @package Xews Lite
*
*/
 ?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<div class="container">
	<label>
		<span class="screen-reader-text"><?php esc_html_e('Search for:','xews-lite')?></span>
		<i class="fas fa-spinner fa-spin" style="display:none"></i>
		<input type="search" autocomplete="off" class="search-field" placeholder="<?php esc_attr_e( 'Type and hit enter to search ...', 'xews-lite' ); ?>" value="" name="s">
		<button type="submit" class="search-submit">
			<i class="fa-solid fa-magnifying-glass"></i>
		</button>
	</label>
</div>
</form>

