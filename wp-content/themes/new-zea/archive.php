<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package New Zea
 */

get_header(); ?>

    <header class="entry-header article-header">
        <div class="blue-overlay"></div>
        <div class="container">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="entry-detail">
                         <?php
                            the_archive_title( '<h1 class="page-title entry-title">', '</h1>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                    </div>
                </div>
            </div>
            
        </div>
    </header><!-- .entry-header -->
            
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
       
			<div class="container">
            	<div class="white-background">
                
                
                     <div class="row">
                        <div class="col-md-12">
							<?php
                            if ( have_posts() ) : ?>
        
                                    <?php
                                    /* Start the Loop */
                                    while ( have_posts() ) : the_post();
                        
                                        /*
                                         * Include the Post-Format-specific template for the content.
                                         * If you want to override this in a child theme, then include a file
                                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                         */
                                        get_template_part( 'template-parts/content', get_post_format() );
                        
                                    endwhile;
                        
                        
                                else :
                    
                                get_template_part( 'template-parts/content', 'none' ); ?>
    
                           <?php  endif; ?>
                            <?php
                                the_posts_pagination( array(
                                    'mid_size' => 2,
                                    'prev_text' => '<span class="fa fa-chevron-left"></span>',
                                    'next_text' => '<span class="fa fa-chevron-right"></span>'
                                ) ); 
                            ?>
                        
                        </div>
                    </div>
                </div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
