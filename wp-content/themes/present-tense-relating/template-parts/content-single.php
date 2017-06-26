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
    	
        <div class="entry-content">
            <?php the_content(); ?>
			<?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'new-zea' ),
                'after'  => '</div>',
            ) );
            ?>
            
        </div><!-- .entry-content -->
    
    </article><!-- #post-## -->
	<div class="dashed-border"></div>