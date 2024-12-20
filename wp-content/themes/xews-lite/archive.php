<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Xews Lite
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<div class="inner-content-wrapp">
			<div class="wrapp-inner">
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;


		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>
		<?php xews_lite_numeric_posts_nav(); ?>
		</div>
		
		<?php get_sidebar(); ?>
	</div>
	</main><!-- #main -->

<?php
get_footer();
