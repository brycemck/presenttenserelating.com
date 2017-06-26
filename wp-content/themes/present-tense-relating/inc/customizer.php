<?php
/**
 * New Zea Theme Customizer.
 *
 * @package New Zea
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function new_zea_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	$categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}
	
	$wp_customize->add_panel( 'new_zea_home_featured_panel', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'          => __('Alt Home Page Features', 'new-zea' ),
		'description'    => __('Section that will show on Home page', 'new-zea' ),
	) );
	
	//slider
	$wp_customize->add_section( 'new_zea_slider_section' , array(
		'title'       => __( 'Slider', 'new-zea' ),
		'priority'    => 20,
		'description' => __( 'Slider Option', 'new-zea' ),
		'panel'  => 'new_zea_home_featured_panel',
	) );

	$wp_customize->add_setting('new_zea_display_slider_setting', array(
		'default'        => 1,
		'sanitize_callback' => 'new_zea_sanitize_checkbox',
	));

	$wp_customize->add_control('new_zea_display_slider_control', array(
		'settings' => 'new_zea_display_slider_setting',
		'label'    => __('Display Slider', 'new-zea'),
		'section'  => 'new_zea_slider_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));
	//  =============================
	//  Select Box               
	//  =============================
	$wp_customize->add_setting('new_zea_category_setting', array(
		'default' => '',
		'sanitize_callback' => 'new_zea_sanitize_category',
	));

	$wp_customize->add_control('new_zea_category_control', array(
		'settings' => 'new_zea_category_setting',
		'type' => 'select',
		'label' => __('Select Category:','new-zea'),
		'section' => 'new_zea_slider_section',
		'active_callback' =>'new_zea_slider_active_callback',
		'choices' => $cats,
		'priority'	=> 25
	));
		
	//  Set Speed
	$wp_customize->add_setting( 'new_zea_slider_speed_setting', array (
		'default' => '6000',
		'sanitize_callback' => 'new_zea_sanitize_integer',
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'new_zea_slider_speed', array(
		'label'    => __( 'Slider Speed (milliseconds)', 'new-zea' ),
		'section'  => 'new_zea_slider_section',
		'settings' => 'new_zea_slider_speed_setting',
		'active_callback' =>'new_zea_slider_active_callback',
		'priority'	=> 26
	) ) );
	
	/* color option */
	$wp_customize->add_setting( 'new_zea_primary_color_setting', array (
		'default'     => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'new_zea_primary_color', array(
			'label'    => __( 'Theme Primary Color', 'new-zea' ),
			'section'  => 'colors',
			'settings' => 'new_zea_primary_color_setting',
	) ) );
	
	/* Background color Header and fOOTER */
	$wp_customize->add_setting( 'new_zea_hf_bgcolor_setting', array (
		'default'     => '#252525',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'new_zea_hf_bgcolor', array(
			'label'    => __( 'Footer Background Color', 'new-zea' ),
			'section'  => 'colors',
			'settings' => 'new_zea_hf_bgcolor_setting',
	) ) );
	
	/* Background color Sub Menu */
	$wp_customize->add_setting( 'new_zea_smenu_bgcolor_setting', array (
		'default'     => '#ececec',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'new_zea_smenu_bgcolor', array(
			'label'    => __( 'Submenu Background Color', 'new-zea' ),
			'section'  => 'colors',
			'settings' => 'new_zea_smenu_bgcolor_setting',
	) ) );
	
}
add_action( 'customize_register', 'new_zea_customize_register' );

function new_zea_slider_active_callback() {
	if ( get_theme_mod( 'new_zea_display_slider_setting', 0 ) ) {
		return true;
	}
	return false;
}

/**
 * Sanitize checkbox
 */

if (!function_exists( 'new_zea_sanitize_checkbox' ) ) :
	function new_zea_sanitize_checkbox( $input ) {
		if ( $input != 1 ) {
			return 0;
		} else {
			return 1;
		}
	}
endif;

/**
 * Sanitize integer input
 */
if ( ! function_exists( 'new_zea_sanitize_integer' ) ) :
	function new_zea_sanitize_integer( $input ) {		
		return absint($input);
	}
endif;

if ( ! function_exists( 'new_zea_sanitize_category' ) ){
	function new_zea_sanitize_category( $input ) {
		$categories = get_categories();
		$cats = array();
		$i = 0;
		foreach($categories as $category){
			if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cats[$category->slug] = $category->name;
		}
		$valid = $cats;

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';

		}
	}
}

/**
* Apply Color Scheme
*/
if ( ! function_exists( 'new_zea_apply_color' ) ) :
  function new_zea_apply_color() {
	?>
	<style id="color-settings">
  <?php if (esc_html(get_theme_mod('new_zea_primary_color_setting')) ) { ?>
		.top-bar, .hentry:before, .blog .hentry:hover, .archive .hentry:hover, .search .hentry:hover, .page-numbers .fa-chevron-right, .page-numbers .fa-chevron-left{background:<?php echo esc_html(get_theme_mod('new_zea_primary_color_setting')); ?>} a, .main-navigation a:hover, .footer-widget-container a:hover{color:<?php echo esc_html(get_theme_mod('new_zea_primary_color_setting')); ?>}
		.widget-title, .dashed-border {border-color:<?php echo esc_html(get_theme_mod('new_zea_primary_color_setting')); ?>}
	<?php } ?>
	<?php if (esc_html(get_theme_mod('new_zea_hf_bgcolor_setting')) ) { ?>
		.footer-widget-container {background: <?php echo esc_html(get_theme_mod('new_zea_hf_bgcolor_setting')); ?>}
	<?php } ?>
	<?php if (esc_html(get_theme_mod('new_zea_smenu_bgcolor_setting')) ) { ?>
		.main-navigation ul ul {background: <?php echo esc_html(get_theme_mod('new_zea_smenu_bgcolor_setting')); ?>}
		@media only screen and (max-width: 599px){
			#primary-menu {background: <?php echo esc_html(get_theme_mod('new_zea_smenu_bgcolor_setting')); ?>}
		}
	<?php } ?>
	</style>
	<?php	  
  }
endif;
add_action( 'wp_head', 'new_zea_apply_color' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function new_zea_customize_preview_js() {
	wp_enqueue_script( 'new_zea_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'new_zea_customize_preview_js' );
