<?php
/**
 * Template Name: About Page
 * Description: Template for the About page
 */
// Define page_id
$page_ID = get_the_ID();
 
// Define paginated posts
$page    = get_query_var( 'page' );
 
// Define custom query parameters
$args    = array(
    'post_type'      => 'post',
    'paged'          => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1
);

if ( is_front_page() )
    $args['paged'] = $page;
	
$the_query = new WP_Query( $args );
	
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        	<div class="container">
            	<div class="white-background">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="full-width-title"><span>Jonathan Chiaravalle</span></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-offset-1 col-md-4">
                            <div class="about-headshot">
                                <?php echo the_post_thumbnail(); ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-7">
                            <p><?php echo apply_filters('the_content', get_post($page_ID)->post_content); ?></p>
                        </div>
                    </div>
                </div><!-- white-background -->
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
