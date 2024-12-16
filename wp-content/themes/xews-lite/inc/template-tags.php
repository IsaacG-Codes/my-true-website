<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Xews Lite
 */

if ( ! function_exists( 'xews_lite_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function xews_lite_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'xews-lite' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'xews_lite_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function xews_lite_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'xews-lite' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'xews_lite_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function xews_lite_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'xews-lite' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( '%1$s', 'xews-lite' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'xews-lite' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'xews-lite' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'xews_lite_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function xews_lite_post_thumbnail() {
		if ( post_password_required() || is_attachment() ||  ( empty(xews_lite_home_element_img()) && ! has_post_thumbnail() ) ) {
			return;
		}
		

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php if( has_post_thumbnail() ){ 
					the_post_thumbnail();
				}else{ ?>
					<img src="<?php echo esc_url(xews_lite_home_element_img())?>" alt="<?php the_title_attribute() ?>">
				<?php } ?>
			</div>

		<?php else : ?>
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php if( has_post_thumbnail() ){ 
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				}else{ ?>
					<img src="<?php echo esc_url(xews_lite_home_element_img())?>" alt="<?php the_title_attribute() ?>">
				<?php } ?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

/** 
 * Get comment counts
 * 
*/
if( ! function_exists( 'xews_lite_comment_count') ){
	function xews_lite_comment_count(){
		$comment_count = get_comments_number();
		echo '<span class="comment-count"> ' . esc_html($comment_count) . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}



/**
 * Post tags
 */
add_action('xews_lite_post_tags','xews_lite_post_tags');
if( ! function_exists('xews_lite_post_tags')):
	function xews_lite_post_tags(){
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list();
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( '%1$s', 'xews-lite' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

	}
endif;


/**
 * Related Posts
 * 
 * 
 */
add_action('xews_lite_main_footer','xews_lite_related_posts', 5);
if( ! function_exists('xews_lite_related_posts')):
	function xews_lite_related_posts(){
		if ( ! is_singular('post') ) {
			return;
		}
    global $xews_lite_customizer_defaults;
    $xews_lite_related_posts_title   = get_theme_mod( 'xews_lite_related_posts_title', $xews_lite_customizer_defaults['xews_lite_related_posts_title'] );
    $xews_lite_related_post_type     = get_theme_mod( 'xews_lite_related_post_type', $xews_lite_customizer_defaults['xews_lite_related_post_type'] );
    $xews_lite_related_post_count    = get_theme_mod('xews_lite_related_post_count', $xews_lite_customizer_defaults['xews_lite_related_post_count']);
    $xews_lite_related_post_offset   = get_theme_mod('xews_lite_related_post_offset', $xews_lite_customizer_defaults['xews_lite_related_post_offset']);
    $xews_lite_related_post_excerpts = get_theme_mod('xews_lite_related_post_excerpts', $xews_lite_customizer_defaults['xews_lite_related_post_excerpts']);
    

    global $post;
    if( empty( $post ) ) {
        $post_id = '';
    } else {
        $post_id = $post->ID;
    }

  

    // Define related post arguments
    $related_args = array(
        'no_found_rows'            => true,
        'update_post_meta_cache'   => false,
        'update_post_term_cache'   => false,
        'ignore_sticky_posts'      => 1,
        'orderby'                  => 'rand',
        'post__not_in'             => array( $post_id ),
        'posts_per_page'           => absint($xews_lite_related_post_count),
        'offset'                   => $xews_lite_related_post_offset,
    );

    
    if ( $xews_lite_related_post_type == 'tags' ) {
        $tags = wp_get_post_tags( $post_id );
        if ( $tags ) {
            $tag_ids = array();
            foreach( $tags as $individual_tag ) $tag_ids[] = $individual_tag->term_id;
            $related_args['tag__in'] = $tag_ids;
        }
    } else {
        $categories = get_the_category( $post_id );
        if ( $categories ) {
            $category_ids = array();
            foreach( $categories as $individual_category ) {
                $category_ids[] = $individual_category->term_id;
            }
            $related_args['category__in'] = $category_ids;
        }
    }

    $related_query = new WP_Query( $related_args );
    if( $related_query->have_posts() ) { ?>
	<div class="xews-related-posts-outer">
        <div class="xews-related-wrapper container layout1">
            <h4 class="related-title">
                <span class="title-bg"><?php echo esc_html( $xews_lite_related_posts_title ); ?></span>
            </h4>
        
            <div class="related-posts-wrapper cww-flex">
                <?php 
				
				while( $related_query->have_posts() ) {
                    $related_query->the_post();
                    $image_id   = get_post_thumbnail_id();
                    $image_path = wp_get_attachment_image_src( $image_id, 'xews-rectangle-thumb', true );
                    $img_src    = xews_lite_home_element_img('xews-rectangle-thumb');
                    $image_alt  = get_post_meta( $image_id, '_wp_attachment_image_alt', true ); 
					

					?>
                    <div class="single-post col-3">
                        <?php if( $img_src ): ?>
                            <div class="post-thumb">
                                <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                    <img src="<?php echo esc_url( $img_src ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" title="<?php the_title_attribute(); ?>" />
                                </a>
								
                            </div>
                        <?php endif; ?>
                        <div class="related-content-wrapper">
						<?php do_action( 'xews_lite_post_cat_or_tag_lists' ); ?>
                            <h3 class="small-font"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                           
                            <?php if($xews_lite_related_post_excerpts): ?>
                                <div class="post-contents">
                                    <p><?php echo xews_lite_get_excerpt_content( absint($xews_lite_related_post_excerpts) )?></p>
                                </div>   
                            <?php endif; ?>
							
                        </div>
                    </div><!--. single-post -->
                <?php 
				
				}
                wp_reset_postdata(); ?>
        
            </div>
        </div><!-- .xews-related-wrapper -->
	</div>
    <?php }
	}
endif;

/**
 * Define categories lists in array
 */
$xews_lite_categories = get_categories( array( 'hide_empty' => true ) );
foreach ( $xews_lite_categories as $xews_lite_category ) {
    $xews_lite_cat_array[$xews_lite_category->term_id] = $xews_lite_category->cat_name.' ('. $xews_lite_category->category_count.')';
}