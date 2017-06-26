<?php
/**
 * Template Name: Contact Page
 * Description: Template for the Contact page
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
    <section id="home-slider">    
        <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item bg bg1 active">    	
                    <div class="carousel-content-bg carousel-content-right-aligned">
                        <img width="2600" height="904" src="<?php echo the_post_thumbnail_url(); ?>" class="full-slide wp-post-image" alt="" srcset="<?php echo the_post_thumbnail_url(); ?> 1024w" sizes="1024px">
                        <div class="container">
                            <div class="col-sm-9 col-sm-offset-3 col-md-7 col-md-offset-5 slide-post-details">
                                <h1><?php echo get_field( 'marquee_title' ); ?></h1>
                                <p>
                                    <?php echo get_field( 'marquee_content' ); ?>
                                </p>
                            </div>      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        	<div class="container">
            	<div class="white-background">
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <div class="contact-method">
                                <a href="tel:<?php echo preg_replace('/[^A-Za-z0-9\-]/', '', get_field( 'phone' )); ?>">
                                    <div class="icon"></div>
                                    <h3><?php echo get_field( 'phone' ); ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="contact-method">
                                <a href="https://goo.gl/maps/96dhTwJYfFR2">
                                    <div class="icon"></div>
                                    <h3><?php echo get_field( 'location' ); ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="contact-method">
                                <a href="mailto:<?php echo get_field( 'email' ); ?>">
                                    <div class="icon"></div>
                                    <h3><?php echo get_field( 'email' ); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!-- white-background -->
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
