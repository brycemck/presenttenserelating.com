<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package New Zea
 */

?>
	<?php
		$colCount = 0;
		if ( is_active_sidebar( 'new-zea-footer-one-widget' ) ){
			$colCount++;
		}
		if ( is_active_sidebar( 'new-zea-footer-two-widget' ) ){
			$colCount++;
		}
		if ( is_active_sidebar( 'new-zea-footer-three-widget' ) ){
			$colCount++;
		}
		if($colCount < 1){ $colCount = 1;}
		
		$colCount = 12/$colCount;
	?>
	</div><!-- #content -->
	<div class="footer-widget-container">
        <div class="container">
            <div class="row">
            	<?php if ( is_active_sidebar( 'new-zea-footer-one-widget' ) ){ ?>
                    <div class="col-md-<?php echo $colCount; ?>">                    
                        <?php dynamic_sidebar('new-zea-footer-one-widget'); ?>
                    </div>
                <?php } ?>
                <?php if ( is_active_sidebar( 'new-zea-footer-two-widget' ) ){ ?>
                    <div class="col-md-<?php echo $colCount; ?>">                    
                        <?php dynamic_sidebar('new-zea-footer-two-widget'); ?>
                    </div>
                <?php } ?>
                <?php if ( is_active_sidebar( 'new-zea-footer-three-widget' ) ){ ?>
                    <div class="col-md-<?php echo $colCount; ?>">                    
                        <?php dynamic_sidebar('new-zea-footer-three-widget'); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
	<footer id="colophon" class="site-footer" role="contentinfo">
    	<div class="container">
            
            <div class="site-info">
            	<?php if(is_home() && !is_paged()){
					$theme = wp_get_theme(); ?> 
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'new-zea' ) ); ?>" title="<?php esc_attr_e( 'WordPress' ,'new-zea' ); ?>"><?php printf( __( 'This site runs on %s', 'new-zea' ), 'WordPress' ); ?></a>
					<?php
						$url = $theme['Author URI'];
						$link = sprintf( wp_kses( __( 'and <a href="%s">Themesforbloggers.com</a>', 'new-zea' ), array(  'a' => array( 'href' => array() ) ) ), esc_url( $url ) );
						echo $link;
					?>
					
				<?php } else{?>
					<?php echo __('&copy; ', 'new-zea') . esc_attr( get_bloginfo( 'name' ) );  ?>
					<?php } ?>
                            
				
            </div><!-- .site-info -->
            
        </div>
	</footer><!-- #colophon -->
    
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
