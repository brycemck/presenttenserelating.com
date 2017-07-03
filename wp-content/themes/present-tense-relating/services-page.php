<?php
/**
 * Template Name: Services Page
 * Description: Template for the Services page
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
                        <div class="col-xs-12 col-md-6 col-centered services-intro">
                            <p><?php echo get_field('services_intro'); ?></p>
                        </div>
                    </div>
                    <?php
                        if ( have_rows('services') ):
                            while ( have_rows('services') ) : the_row();
                                echo "<div class='row'>";
                                    echo "<div class='col-xs-12'>";
                                        echo "<div class='service'>";
                                            echo "<h1>"; echo the_sub_field( 'title' ); echo "</h1>";
                                            echo "<p>"; echo the_sub_field( 'content' ); echo "</p>";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class='row'>";
                                    echo "<div class='col-xs-8 col-xs-offset-2'>";
                                        echo "<div class='service-separator'></div>";
                                    echo "</div>";
                                echo "</div>";
                            endwhile;
                        endif;
                    ?>
                </div><!-- white-background -->
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
