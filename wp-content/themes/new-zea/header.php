<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package New Zea
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'new-zea' ); ?></a>
	
    <?php if ( has_nav_menu( 'social' ) ) { ?>
        <div class="top-bar">
            <div class="container">
                <div class="row">
                
                    <div class="col-md-12">
                        <?php 
                            wp_nav_menu(
                                array(
                                    'theme_location'  => 'social',
                                    'container'       => 'div',
                                    'container_id'    => 'menu-social',
                                    'container_class' => 'menu',
                                    'menu_id'         => 'menu-social-items',
                                    'menu_class'      => 'menu-items',
                                    'depth'           => 1,
                                    'link_before'     => '<span class="screen-reader-text">',
                                    'link_after'      => '</span>',
                                    'fallback_cb'     => '',
                                )
                            );
                        ?>
                    </div>
              
                </div>
            </div>
        </div>
    <?php } ?>
    
	<header id="masthead" class="site-header" role="banner">
        
        <div class="head-t1 <?php if ( has_header_image() ) { echo 'has_header-image';} ?>">
        	<?php if ( has_header_image() ) { ?>
                <img src="<?php header_image(); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" class="header-image" />
            <?php } ?>
            <div class="container">
                <div class="site-branding">
                    <?php 
                        if ( function_exists( 'the_custom_logo' ) ) {
                            the_custom_logo();
                        }
                    ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <p class="site-description"><?php bloginfo( 'description' ); ?></p>
    
                </div><!-- .site-branding -->
            </div>
        </div>
        
        <div class="head-t1">
            <div class="container">
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                </nav><!-- #site-navigation -->
            </div>
        </div>
        
	</header><!-- #masthead -->
    
                    
	<div id="content" class="site-content">
