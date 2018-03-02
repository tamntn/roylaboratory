<?php

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_template_part('framework/widgets/flickr_widget');
get_template_part('framework/widgets/facebook_like_widget');
get_template_part('framework/widgets/tabs_widget');

/**
 * Register Widgets & Sidebars
 * 
 * @since Agama v1.0
 */
if( ! class_exists( 'Agama_Widgets' ) ) {
	class Agama_Widgets
	{
		public function __construct() {
			add_action( 'widgets_init', array( $this, 'init' ) );
		}
		
		function init() {
			register_sidebar( array(
				'name'			=> __( 'Main Sidebar', 'agama-pro' ),
				'id'			=> 'sidebar-1',
				'description'	=> __( 'Appears on posts and pages.', 'agama-pro' ),
				'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
				'after_widget'	=> '</aside>',
				'before_title'	=> '<h3 class="widget-title">',
				'after_title'	=> '</h3>',
			) );
			
			if( class_exists( 'Woocommerce' ) ) {
				register_sidebar( array(
					'name'			=> __( 'Shop Sidebar', 'agama-pro' ),
					'id'			=> 'agama-shop-sidebar',
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget' 	=> '</aside>',
					'before_title' 	=> '<h3 class="widget-title">',
					'after_title' 	=> '</h3>',
				) );
			}

			register_sidebar( array(
				'name' 			=> __( 'Footer Widget 1', 'agama-pro' ),
				'id' 			=> 'footer-widget-1',
				'description' 	=> __( 'Appears on footer area.', 'agama-pro' ),
				'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
				'after_widget'	=> '</aside>',
				'before_title'	=> '<h3 class="widget-title">',
				'after_title' 	=> '</h3>',
			) );
			
			register_sidebar( array(
				'name' 			=> __( 'Footer Widget 2', 'agama-pro' ),
				'id' 			=> 'footer-widget-2',
				'description'	=> __( 'Appears on footer area.', 'agama-pro' ),
				'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
				'after_widget'	=> '</aside>',
				'before_title'	=> '<h3 class="widget-title">',
				'after_title'	=> '</h3>',
			) );
			
			register_sidebar( array(
				'name'			=> __( 'Footer Widget 3', 'agama-pro' ),
				'id' 			=> 'footer-widget-3',
				'description' 	=> __( 'Appears on footer area.', 'agama-pro' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> '</aside>',
				'before_title' 	=> '<h3 class="widget-title">',
				'after_title' 	=> '</h3>',
			) );
			
			register_sidebar( array(
				'name' 			=> __( 'Footer Widget 4', 'agama-pro' ),
				'id' 			=> 'footer-widget-4',
				'description' 	=> __( 'Appears on footer area.', 'agama-pro' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> '</aside>',
				'before_title' 	=> '<h3 class="widget-title">',
				'after_title' 	=> '</h3>',
			) );
            
            register_sidebar( array(
				'name' 			=> __( 'Footer Widget 5', 'agama-pro' ),
				'id' 			=> 'footer-widget-5',
				'description' 	=> __( 'Appears on footer area.', 'agama-pro' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> '</aside>',
				'before_title' 	=> '<h3 class="widget-title">',
				'after_title' 	=> '</h3>',
			) );
            
            register_sidebar( array(
				'name' 			=> __( 'Footer Widget 6', 'agama-pro' ),
				'id' 			=> 'footer-widget-6',
				'description' 	=> __( 'Appears on footer area.', 'agama-pro' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> '</aside>',
				'before_title' 	=> '<h3 class="widget-title">',
				'after_title' 	=> '</h3>',
			) );
		}
	}
	new Agama_Widgets;
}