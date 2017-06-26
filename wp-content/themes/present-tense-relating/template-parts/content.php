<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package New Zea
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if(has_post_thumbnail()){ $has_featured = 'has_featured';?>
        <div class="img-container">
            <a href="<?php the_permalink('') ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('new-zea-large-thumbnails'); ?></a>
        </div>
    <?php }else{$has_featured='';} ?>
    
    <div class="<?php echo $has_featured ?>">
    	<div class="post-desc">
            <header class="entry-header">
                <?php
                    if ( is_single() ) {
                        the_title( '<h1 class="entry-title">', '</h1>' );
                    } else {
                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                    }
        
                if ( 'post' === get_post_type() ) : ?>
                <div class="entry-meta">
                    <?php new_zea_posted_on(); ?>
                </div><!-- .entry-meta -->
                <?php
                endif; ?>
            </header><!-- .entry-header -->
        
            <div class="entry-content">
                <?php the_excerpt(); ?>
                <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'new-zea' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div><!-- .entry-content -->
        </div>
    </div><div style="clear:both"></div>

</article><!-- #post-## -->
