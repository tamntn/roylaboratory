<?php

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Agama PreLoader Class
 *
 * @since 1.1.1
 */
if( ! class_exists( 'Agama_Preloader' ) ) {
	class Agama_Preloader {
		
		/**
		 * Is Preloader Enabled ?
		 *
		 * @since 1.3.8
		 * @access private
		 */
		private $enabled;
		
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
		 * @since 1.1.1
		 */
		public function __construct() {
			
			$this->enabled	= esc_attr( get_theme_mod( 'agama_preloader', false ) );
			$this->pages	= get_theme_mod( 'agama_preloader_pages', '' );
			$this->pages_id = Agama_Helper::get_pages_id( $this->pages );
			
			if( 
				$this->enabled && empty( $this->pages_id ) || 
				$this->enabled && ! empty( $this->pages_id ) && ! is_page( $this->pages_id ) 
			) {
				
				// Enqueue JS Script
				add_action( 'wp_footer', array( $this, 'render_js' ) );
				
				// Render HTML
				$this->render_html();
			}
	
		}
		
		/**
		 * Get a unique instance of this object.
		 *
		 * @since 1.3.8
		 * @return object
		 */
		public static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new Agama_Preloader();
			}
			return self::$instance;
		}
		
		/**
		 * Render HTML
		 *
		 * @since 1.1.1
		 */
		private function render_html() {
			echo '<div id="loader-wrapper">';
				echo '<div id="loader"></div>';
					echo '<div class="loader-section section-left"></div>';
					echo '<div class="loader-section section-right"></div>';
				echo '</div>';
		}
		
		/**
		 * Render jQuery Init
		 *
		 * @since 1.1.1
		 */
		public function render_js() {
			echo 
			"
			<script>
			jQuery(document).ready(function() {
				setTimeout(function(){
					jQuery('body').addClass('loaded');
				}, 2000);
			 
			});
			</script>
			";
		}
	}
}

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
