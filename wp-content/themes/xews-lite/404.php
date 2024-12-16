<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Xews Lite
 */

get_header();
?>

	<main id="primary" class="site-main">
	<div class="container">
		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'xews-lite' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Please try searching for some other page.', 'xews-lite' ); ?></p>

					<?php get_search_form(); ?>

					<a href="<?php echo esc_url(home_url()) ?>" class="back-home-btn"><?php esc_html_e('Back To Home','xews-lite'); ?></a>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->
	</div>
	</main><!-- #main -->

<?php
get_footer();