<?php
/**
 * Template Name: Blog Page
 * Description: Template for the Blog page
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

$latestPostArgs = array(
    'numberposts' => 1,
    'orderby' => 'post_date',
    'post_type' => 'post'
);
$recentPost = wp_get_recent_posts( $latestPostArgs )[0];
	
get_header(); ?>
    <section id="home-slider">    
        <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item bg bg1 active">    	
                    <div class="carousel-content-bg">
                        <?php
                        if ( has_post_thumbnail($recentPost["ID"]) ) {
                            $thumbnail = get_the_post_thumbnail_url($recentPost["ID"]);
                        } else {
                            $thumbnail = get_the_post_thumbnail_url($page_ID);
                        }
                        ?>
                        <img width="2600" height="904" src="<?php echo $thumbnail; ?>" class="full-slide wp-post-image" alt="" srcset="<?php echo $thumbnail; ?> 1024w" sizes="1024px">
                        <div class="container">
                            <div class="col-sm-9 col-md-7 slide-post-details">
                                <a href="<?php echo get_permalink($recentPost['ID']); ?>"><h1><?php echo $recentPost["post_title"]; ?></h1></a>
                                <p>
                                    <?php echo wp_trim_words( $recentPost["post_content"], $num_words = 45 ); ?>
                                </p>
                                <a href="<?php echo get_permalink($recentPost['ID']); ?>" class="cta">Read More ></a>
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
                    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
                        echo "<div class='row'>";
                            echo "<div class='col-xs-12'>";
                                echo "<div class='blog-post'>";
                                    echo "<a href='"; echo get_permalink(); echo "'>"; echo "<h1>"; echo get_the_title(); echo "</h1></a><br>";
                                    echo "<span>"; echo the_date(); echo "</span>";
                                    echo "<p>"; echo get_the_excerpt(); echo "</p>";
                                    echo "<a href='"; echo get_permalink(); echo "'>Read More...</a>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='row'>";
                            echo "<div class='col-xs-12'>";
                                echo "<div class='blog-post-separator'></div>";
                            echo "</div>";
                        echo "</div>";
                    endwhile; else : ?>
                        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php endif; ?>
                </div><!-- white-background -->
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
