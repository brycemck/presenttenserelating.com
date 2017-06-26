<?php
/**
 * Template part for displaying slider.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package New Zea
 */
	$slider_display = get_theme_mod( 'new_zea_display_slider_setting', 1);
	$slider_cat = get_theme_mod( 'new_zea_category_setting');
 
	//query posts
	$args =	array(
		'offset'           => 0,
		'posts_per_page'   => 10,
		'category_name'    => $slider_cat,
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true
	);

	$counter = 1;
	$the_query = new WP_Query( $args );
?>

<?php if($slider_display == 1){ ?> 
	<?php if ($the_query->have_posts()) : ?>    	
        <section id="home-slider">    
            <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
               <div class="carousel-inner">
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?> 
                        <?php
                        if ( has_post_thumbnail() ) { 
                        ?>
                        <div class="item bg bg<?php echo $counter; ?> <?php if($counter == 1) {echo "active";} ?>" >    	
                            <div class="carousel-content-bg">
                            	<?php the_post_thumbnail( 'full', array( 'class' => 'full-slide' ) ); ?>
                                <div class="blue-overlay"></div>
                                <div class="container">
                                	<div class="slide-post-details">
                                        <h1><a class="more" href="<?php the_permalink('') ?>"><?php the_title(); ?></a></h1>
                                        <div class="slide-meta">
											<?php new_zea_posted_on(); ?>
                                        </div><!-- .entry-meta -->     
                                    </div>      
                                </div>
                            </div>
                        </div>
                         <?php $counter = $counter + 1; ?>
                        <?php } ?>
                    <?php endwhile; ?> 
                </div>

                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </section>
    <?php endif; ?> 
<?php } ?> 
<?php wp_reset_postdata(); ?>