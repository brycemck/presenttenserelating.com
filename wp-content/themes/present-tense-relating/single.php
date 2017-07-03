<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package New Zea
 */

get_header(); ?>
	
    <?php if ( has_post_thumbnail() ) : ?>
    <section id="home-slider">    
        <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item bg bg1 active">    	
                    <div class="carousel-content-bg">
                        <img width="2600" height="904" src="<?php echo the_post_thumbnail_url(); ?>" class="full-slide wp-post-image" alt="" srcset="<?php echo the_post_thumbnail_url(); ?> 1024w" sizes="1024px">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-centered slide-post-details">
                                    <?php the_title( '<h1>', '</h1>' );
                                    echo "<span>"; echo get_the_date(); echo "</span>"; ?>
                                </div>
                            </div>      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php else : ?>
    <div class="col-xs-12 col-md-6 col-centered">
    <?php
        the_title( '<h1 class="post-title">', '</h1>' );
        echo "<span>"; echo get_the_date(); echo "</span>";
    ?>
    </div>
    <?php endif; ?>
    
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
            	<div class="white-background">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            while ( have_posts() ) : the_post();
                    
                                get_template_part( 'template-parts/content', 'single' );
                    
                                the_post_navigation();
                    
                            endwhile; // End of the loop.
                            ?>
                        </div>
                    </div>
                </div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
