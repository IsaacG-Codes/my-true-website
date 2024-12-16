<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Xews Lite
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php if ( is_singular() ) {
		echo '<progress value="0"></progress>'; //post read progress bar
	} ?>
	<div class="container">
		<div class="inner-content-wrapp">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );


			endwhile; // End of the loop.
			 ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
	
</main><!-- #main -->

<?php
get_footer();
