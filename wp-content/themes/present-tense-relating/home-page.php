<?php
/**
 * Template Name: Home Page
 * Description: Template for the homepage
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
                    <div class="carousel-content-bg">
                        <img width="2600" height="904" src="<?php echo the_post_thumbnail_url(); ?>" class="full-slide wp-post-image" alt="" srcset="<?php echo the_post_thumbnail_url(); ?> 1024w" sizes="1024px">
                        <div class="container">
                            <div class="col-sm-9 col-md-7 slide-post-details">
                                <h1><?php echo get_field( 'marquee_title' ); ?></h1>
                                <p>
                                    <?php echo get_field( 'marquee_content' ); ?>
                                </p>
                                <a href="./about" class="cta">About ></a>
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
                        <div class="col-xs-12 col-sm-12 col-md-6 col-centered">
                            <div class="homepage-mission">
                                <p><?php echo get_field( 'mission_statement' ); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h2 class="homepage-cluster-intro">I take clients through the steps of...</h2>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row cluster-row">
                    <div class="col-xs-12 col-md-8">
                        <img class="cluster-img" src="<?php echo get_field( 'cluster_one_img' ); ?>"></img>
                    </div>
                    <div class="col-xs-6 col-xs-push-3 col-md-4 col-md-push-8 cluster-content-container">
                        <div class="cluster-content">
                            <h3><?php echo get_field( 'cluster_one_title' ); ?></h3>
                            <p>
                                <?php echo get_field( 'cluster_one_content' ); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row cluster-row cluster-flipped">
                    <div class="col-xs-6 col-xs-push-3 col-md-4 cluster-content-container">
                        <div class="cluster-content">
                            <h3><?php echo get_field( 'cluster_two_title' ); ?></h3>
                            <p>
                                <?php echo get_field( 'cluster_two_content' ); ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-8 col-md-offset-4">
                        <img class="cluster-img" src="<?php echo get_field( 'cluster_two_img' ); ?>"></img>
                    </div>
                </div>
                <div class="row cluster-row">
                    <div class="col-xs-12 col-md-8">
                        <img class="cluster-img" src="<?php echo get_field( 'cluster_three_img' ); ?>"></img>
                    </div>
                    <div class="col-xs-6 col-xs-push-3 col-md-4 col-md-push-8 cluster-content-container">
                        <div class="cluster-content">
                            <h3><?php echo get_field( 'cluster_three_title' ); ?></h3>
                            <p>
                                <?php echo get_field( 'cluster_three_content' ); ?>
                            </p>
                        </div>
                    </div>
                </div>
                    <!--<div class="col-xs-12 col-md-6">
                        <div class="homepage-cluster justified-left">
                            <div class="cluster-bg" style="background-color: <?php echo get_field( 'cluster_one_bg' ); ?>"></div>
                            <div class="cluster-img" style="background-image: url(<?php echo get_field( 'cluster_one_img' ); ?>); <?php echo get_field( 'cluster_one_custom_css' ); ?>"></div>
                            <div class="cluster-content">
                                <div class="cluster-inner-content" style="border-color: <?php echo get_field( 'cluster_one_bg' ); ?>">
                                    <h3><?php echo get_field( 'cluster_one_title' ); ?></h3>
                                    <p>
                                        <?php echo get_field( 'cluster_one_content' ); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="homepage-cluster justified-right" style="margin-top: 230px;">
                            <div class="cluster-bg" style="background-color: <?php echo get_field( 'cluster_two_bg' ); ?>"></div>
                            <div class="cluster-img" style="background-image: url(<?php echo get_field( 'cluster_two_img' ); ?>); <?php echo get_field( 'cluster_two_custom_css' ); ?>"></div>
                            <div class="cluster-content">
                                <div class="cluster-inner-content" style="border-color: <?php echo get_field( 'cluster_two_bg' ); ?>">
                                    <h3><?php echo get_field( 'cluster_two_title' ); ?></h3>
                                    <p>
                                        <?php echo get_field( 'cluster_two_content' ); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="homepage-cluster justified-left" style="margin-top: -60px;">
                            <div class="cluster-bg" style="background-color: <?php echo get_field( 'cluster_three_bg' ); ?>"></div>
                            <div class="cluster-img" style="background-image: url(<?php echo get_field( 'cluster_three_img' ); ?>); <?php echo get_field( 'cluster_three_custom_css' ); ?>"></div>
                            <div class="cluster-content">
                                <div class="cluster-inner-content" style="border-color: <?php echo get_field( 'cluster_three_bg' ); ?>">
                                    <h3><?php echo get_field( 'cluster_three_title' ); ?></h3>
                                    <p>
                                        <?php echo get_field( 'cluster_three_content' ); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
