<?php
// Register 'New Zea Recent Posts' widget
add_action( 'widgets_init', 'new_zea_init_recent_posts' );

function new_zea_init_recent_posts() { return register_widget('new_zea_recent_posts'); }

class new_zea_recent_posts extends WP_Widget {
	/** constructor */
	function __construct() {
		// Instantiate the parent object
		parent::__construct( 'new-zea-recent-post', __( 'New Zea Recent Post', 'new-zea' ) );
	}
	
	// Widget	
	function widget( $args, $instance ) {
		global $post;
		extract($args);

		// Widget options
		$title 	 = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'New Zea Recent Post', 'new-zea' ) : $instance['title'], $instance, $this->id_base ); // Title	
		/*$cpt 	 = $instance['types'];*/ // Post type(s) 		
	    $types   = 'post';
		$number	 = absint($instance['number']); // Number of posts to show
		
        // Output
		echo $before_widget;
		
	    if ( $title ) echo $before_title . $title . $after_title;
			
		$fzq = new WP_Query(array( 'post_type' => $types, 'showposts' => $number ));
		if( $fzq->have_posts() ) : 
		?>
		<ul id="new_zea_recent_posts">
		<?php while($fzq->have_posts()) : $fzq->the_post(); ?>
		<li class="clearfix">
        	<div class="new_zea_post_recent post-image">
				<?php if ( $instance['display_featured_image'] && has_post_thumbnail() ) {?>
                    <a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">
                <?php
                    the_post_thumbnail('new-zea-widget-post-thumb', array('class' => 'alignleft'));
                ?>
                    </a>
            
				<?php
                } ?>
        	</div>
            <div class="new_zea_post_recent post-details">
                <h5><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a></h5>
                <div class="meta-info">
                    <span class="meta-info-date"><?php the_time('F j, Y');  ?></span> 
                    <?php 
					if( comments_open() ) {?>
						<a href="<?php comments_link(); ?>" class="meta-info-comment"><i class="fa fa-comments"></i> <?php _e( 'Leave a Comment', 'new-zea' ); ?></a>
                        <?php } 
					else {?>
						<span class="meta-info-comment"><i class="fa fa-comments"></i> <?php _e( 'Comment is Closed', 'new-zea' ); ?></a></span>
					<?php } ?>
                </div>
            </div>
        </li>
		<?php wp_reset_postdata(); 
		endwhile; ?>
		</ul>
			
		<?php endif; ?>			
		<?php
		// echo widget closing tag
		echo $after_widget;
	}

	/** Widget control update */
	function update( $new_instance, $old_instance ) {
		$instance    = $old_instance;	
		
		//Let's turn that array into something the Wordpress database can store
		$instance['title']  = sanitize_text_field( $new_instance['title'] );
		$instance['types'] = ( in_array( $new['types'], array( 'posts', 'pages' ) ) ) ? $new['types'] : 'posts';
		$instance['number'] = absint( $new_instance['number'] );
		$instance['display_featured_image'] = (bool) $new_instance['display_featured_image'];
		return $instance;
	}
	
	
	// Widget settings	
	function form( $instance ) {	
			$number = 5;
			$display_featured_image = 0;
		    // instance exist? if not set defaults
		    if ( $instance ) {
				$title  = $instance['title'];
		        $types  = $instance['types'];
		        $number = absint($instance['number']);
				$display_featured_image = (bool) $instance['display_featured_image'];
		    } 
			
			//Let's turn $types into an array
			$types = 'post';
			// The widget form
			?>
			<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"> <?php _e( 'Title:', 'new-zea' ); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php if(isset($title)) { echo esc_attr($title); } ?>" class="widefat" />
			</p>
			<p>
            	<input type="checkbox" name="<?php echo $this->get_field_name('display_featured_image'); ?>"  <?php checked( $display_featured_image, 1 ); ?> value="1" /> 			
                <label for="<?php echo $this->get_field_id('display_featured_image'); ?>"><?php _e( 'Display Thumbnail', 'new-zea' ); ?></label>
            </p>
			<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"> <?php _e( 'Number of posts to show:', 'new-zea' ); ?></label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
			</p>
	<?php 
	}
	

} // class rcp_recent_posts

// Register and load the widget
function social_load_widget() {
	register_widget( 'social_widget' );
}
add_action( 'widgets_init', 'social_load_widget' );

// Creating the widget 
class social_widget extends WP_Widget {
	function __construct() {
		parent::__construct('social_widget', __('Social', 'social_widget_domain'), array( 'description' => __( 'Custom made widget to include social links within the footer.', 'social_widget_domain' ), ) );
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', $instance['title'] );
		$phone = $instance['phone'];
		$email = $instance['email'];
		$contactLink = $instance['contactLink'];
		$contactText = $instance['contactText'];

		// before and after widget arguments are defined by themes
		echo $before_widget;
		?>
		<div class="footer-left">
			<?php if ( ! empty( $title ) ) echo $args['before_title'] . $title . $args['after_title']; ?>
		</div>
		<div class="footer-bar"></div>
		<div class="footer-right">
			<h3><a href="tel:<?php echo esc_attr( $phone ); ?>"><span><?php echo esc_attr( $phone ); ?></span></a></h3>
			<h3><a href="mailto:<?php echo esc_attr( $email ); ?>"><span><?php echo esc_attr( $email ); ?></span></a></h3>
			<h3><a href="<?php echo esc_attr( $contactLink ); ?>"><span><?php echo esc_attr( $contactText ); ?></span></a></h3>
		</div>
		<?php
		echo $after_widget;
	}
			
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
			$phone = $instance[ 'phone' ];
			$email = $instance[ 'email' ];
			$contactLink = $instance[ 'contactLink' ];
			$contactText = $instance[ 'contactText' ];
		}
		else {
			$title = __( 'Make an Appointment', 'social_widget_domain' );
		}
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Phone:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'contactLink' ); ?>"><?php _e( 'Contact Page Link:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'contactLink' ); ?>" name="<?php echo $this->get_field_name( 'contactLink' ); ?>" type="text" value="<?php echo esc_attr( $contactLink ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'contactText' ); ?>"><?php _e( 'Contact Page Text:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'contactText' ); ?>" name="<?php echo $this->get_field_name( 'contactText' ); ?>" type="text" value="<?php echo esc_attr( $contactText ); ?>" />
		</p>
		<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['phone'] = ( ! empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';
		$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
		$instance['contactLink'] = ( ! empty( $new_instance['contactLink'] ) ) ? strip_tags( $new_instance['contactLink'] ) : '';
		$instance['contactText'] = ( ! empty( $new_instance['contactText'] ) ) ? strip_tags( $new_instance['contactText'] ) : '';
		return $instance;
	}
} // Class social_widget ends here
?>
