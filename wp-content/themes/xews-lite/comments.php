<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Xews Lite
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$xews_lite_comment_count = get_comments_number();
			if ( '1' === $xews_lite_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'xews-lite' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $xews_lite_comment_count, 'comments title', 'xews-lite' ) ),
					number_format_i18n( $xews_lite_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'xews-lite' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	$comment_author 	= esc_html__('Name','xews-lite');
	$comment_email 		= esc_html__('E-Mail','xews-lite');
	$comment_url 		= esc_html__('Website','xews-lite');
	$comment_cookies_1 	= esc_html__('Save my name, email, and website in this browser for the next time I comment.','xews-lite');

	$comments_args = array(
		'fields' => array(
			//Author field
			'author' => '<div class="name-email"><p class="comment-form-author"><label for="author">'.esc_html($comment_author).'</label><input id="author" name="author" aria-required="true"></input></p>',
			//Email Field
			'email' => '<p class="comment-form-email"><label for="email">'.esc_html($comment_email).'</label><input id="email" name="email"></input></p></div>',
			//URL Field
			'url' => '<p class="comment-form-url"><label for="url">'.esc_html($comment_url).'</label><input id="url" name="url"></input></p>',
			//Cookies
			'cookies' => '<input type="checkbox" id="cookies" required><label for="cookies">'.esc_html($comment_cookies_1).'</label>',
		),
	);
	comment_form($comments_args);
	?>

</div><!-- #comments -->
