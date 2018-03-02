<?php
/**
 * The Header template
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama 1.0
 */

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit; 
} ?>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- Main Wrappe -->
<div id="main-wrapper" class="main-wrapper">
	
	<!-- Header -->
	<header id="masthead" class="site-header <?php Agama_Helper::the_header_class(); ?> clearfix" role="banner">
	
		<?php Agama::get_header(); ?>
        
        <?php Agama_Helper::get_wc_cart_content(); ?>
		
		<?php Agama::get_wc_cart_notifications(); ?>
		
		<?php Agama::get_header_image(); ?>
		
	</header><!-- Header End -->
	
	<?php Agama::get_preloader(); ?>
	
	<?php Agama::get_slider(); ?>
	
	
	<?php 
	/**
	 * Render Title Bar & Breadcrumbs
	 *
	 * @updated since 1.3.7
	 */
	get_template_part( 'templates/title-bar' ); ?>
	
	<div id="page" class="hfeed site">
		<div id="main" class="wrapper">
			<div class="vision-row clearfix">
		
				<?php if( get_theme_mod( 'agama_frontpage_boxes_position', 'top' ) == 'top' ): ?>
					<?php Agama::get_front_page_boxes(); ?>
				<?php endif; ?>
				