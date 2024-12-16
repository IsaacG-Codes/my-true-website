<?php
/**
 * Blog list layout
 * 
 */
$defaults = xews_lite_customizer_defaults();


$xews_lite_inner_blog_excerpt = get_theme_mod('xews_lite_inner_blog_excerpt',$defaults['xews_lite_inner_blog_excerpt']);
$xews_lite_post_readmore_enable = get_theme_mod('xews_lite_post_readmore_enable', $defaults['xews_lite_post_readmore_enable']);

?>



<div class="blog-list cww-flex">
    
    <div class="img-wrapp">
        <?php xews_lite_post_thumbnail(); ?>
    </div>
    <div class="content-left">
    
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
                
        <?php // Hide category and tag text for pages.
        do_action('xews_lite_post_cat_or_tag_lists'); ?>

        <div class="entry-content">
            <p><?php echo xews_lite_get_excerpt_content($xews_lite_inner_blog_excerpt);	?></p>
            
            <?php if( $xews_lite_post_readmore_enable ){ ?>
                <a href="<?php the_permalink();?>" class="btn read-more"><?php esc_html_e('Read More','xews-lite');?>
                <i class="fas fa-long-arrow-alt-right"></i>
                </a>
            <?php } ?>
            
        </div><!-- .entry-content -->


    </div>
    
</div>   
