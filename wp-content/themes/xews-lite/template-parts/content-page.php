<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Xews Lite
 */


$xews_lite_thumbclass = 'thumbnail-disabled';
if( !is_singular() ){
	$xews_lite_thumbclass = 'thumb-enabled';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($xews_lite_thumbclass); ?>>
	
	<header class="entry-header">
		<?php
		if ( is_singular() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		}
		else{
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
	</header><!-- .entry-header -->

	<div class="entry-meta-wrapper">
		<?php
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php 
					echo '<span class="author-by">';
					esc_html_e('BY','xews-lite');
					echo '</span>';
					xews_lite_posted_by();	
					xews_lite_posted_on();	
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</div><!-- .entry-meta-wrapper -->
	
	<?php xews_lite_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'xews-lite' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'xews-lite' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<div class="single_post_pagination_wrapper cww-flex">
		<div class="prev-link post-nav-link-wrapp"> 
			<div class="prev-link-wrapper">
				<?php
				$prevPost = get_previous_post();
				if ( is_a( $prevPost , 'WP_Post' ) ) :
					$prevtitle = get_the_title($prevPost->ID); ?> 
					<div class="prev-text">
						<span><i class="fas fa-chevron-left"></i><?php previous_post_link('%link', 'Previous Post'); ?></span>
						<h4><?php previous_post_link('%link', $prevtitle) ;?></h4>
					</div>
				<?php endif; ?>
			</div>
		</div>

		
		<div class="next-link post-nav-link-wrapp"> 
			<div class="next-link-wrapper">
				<?php
				$nextPost = get_next_post();
				if ( is_a( $nextPost , 'WP_Post' ) ) :
				
					$nextitle = get_the_title($nextPost->ID); ?>
					<div class="next-text">
						<span><?php next_post_link('%link', 'Next Post'); ?><i class="fas fa-chevron-right"></i></span>
						<h4><?php next_post_link('%link',$nextitle); ?></h4>
					</div>
				<?php endif; ?>
			</div>
		</div>
    </div> <!-- .single_post_pagination_wrapper -->

	<?php 
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) : ?>
		<div class="comment-toggle-wrapp">
			<h3 class="comment-toggle">
				<span><?php esc_html_e('Leave a Comment','xews-lite');?></span>
				<i class="fas fa-chevron-down"></i>
				<i class="fas fa-chevron-up" style="display:none"></i>
			</h3>
		</div>
		<?php comments_template();
	endif; ?>


	<?php 
	do_action('xews_lite_single_post_footer');
	
	
	?>
</article><!-- #post-<?php the_ID(); ?> -->
