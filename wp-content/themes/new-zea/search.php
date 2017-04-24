<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
                	<h1 class="page-title single-title entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'new-zea' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                </div>
            </div>
        </div>
        
    </div>
</header><!-- .entry-header -->

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
        	<div class="white-background">
				<?php
                if ( have_posts() ) : ?>
        
                    <div class="row">
                        <div class="col-md-12">
                    
                            <?php
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                
                                /**
                                 * Run the loop for the search to output the results.
                                 * If you want to overload this in a child theme then include a file
                                 * called content-search.php and that will be used instead.
                                 */
                                get_template_part( 'template-parts/content', 'search' );
                
                            endwhile;
                
                        else :
                
                            get_template_part( 'template-parts/content', 'none' ); ?>
                    </div>
                </div>
               <?php
                endif; 
                 the_posts_pagination( array(
                        'mid_size' => 2,
                        'prev_text' => '<span class="fa fa-chevron-left"></span>',  
                        'next_text' => '<span class="fa fa-chevron-right"></span>'
                    ) );
                ?>
            </div>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
