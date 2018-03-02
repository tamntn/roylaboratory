<?php

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Agama Header Image Class
 *
 * @since 1.3.0
 * @updated @since 1.3.8
 */
if( ! class_exists( 'Agama_Header_Image' ) ) {
	class Agama_Header_Image {
		
		/**
		 * Is Header Image Enabled ?
		 *
		 * @since 1.3.8
		 * @access private
		 */
		private $enabled;
		
		/**
		 * Show on Frontpage ?
		 *
		 * @since 1.3.8
		 * @access private
		 */
		private $show_on_front;
		
		/**
		 * Is Particles Enabled ?
		 *
		 * @since 1.3.8
		 * @access private
		 */
		private $particles;
		
		/**
		 * Pages in Array
		 *
		 * @since 1.3.8
		 * @access private
		 */
		private $pages;
		
		/**
		 * Get Pages IDs
		 *
		 * @since 1.3.8
		 * @access private
		 */
		private $pages_id;
		
		/**
		 * The one, true instance of this object.
		 *
		 * @static
		 * @since 1.3.8
		 * @access private
		 * @var null|object
		 */
		private static $instance = null;
		
		/**
		 * Class Constructor
		 * 
		 * @since 1.3.8
		 */
		function __construct() {
			
			$this->enabled 			= esc_attr( get_theme_mod( 'agama_header_image', false ) );
			$this->show_on_front	= get_option( 'show_on_front' );
			$this->particles		= esc_attr( get_theme_mod( 'agama_header_image_particles', true ) );
			$this->pages			= get_theme_mod( 'agama_header_image_pages', '' );
			$this->pages_id			= Agama_Helper::get_pages_id( $this->pages );
			
			$this->get_custom_header();
		}
		
		/**
		 * Get a unique instance of this object.
		 *
		 * @since 1.3.8
		 * @return object
		 */
		public static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new Agama_Header_Image();
			}
			return self::$instance;
		}
		
		/**
		 * Render Particles
		 *
		 * @since 1.3.8
		 */
		private function get_particles() {
			if( $this->particles ) {
				echo '<div id="particles-js" class="agama-particles"></div>';
			}
		}
		
		/**
		 * Render Header Image or Header Video
		 *
		 * @since 1.3.8
		 */
		public function get_custom_header() {
			if( 
				$this->enabled && has_custom_header() && is_home() && $this->show_on_front !== 'page' && empty( $this->pages_id ) || // Show on homepage.
				$this->enabled && has_custom_header() && ! empty( $this->pages_id ) && is_page( $this->pages_id ) // Show on selected pages. 
			) {
				echo '<div id="agama-header-object" class="agama-header-object">';
					
					// Output particles.
					self::get_particles();
					
					// Output header image.
					the_custom_header_markup();
					
				echo '</div>';
			}
		}
	}
}

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
