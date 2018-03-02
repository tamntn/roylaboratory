<?php

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Agama Core Class
 *
 * @since Agama v1.0.1
 */
if( ! class_exists( 'Agama_Core' ) ) {
	class Agama_Core {
		
		/**
		 * Refers to a single instance of this class.
		 * 
		 * @since 1.1.99
		 */
		static private $instance = null;
		
		/**
		 * Theme Version
		 *
		 * @since 1.1.99
		 */
		static private $version = '1.4.2';
		
		/**
		 * Development in Progress ?
		 *
		 * @since 1.3.7
		 */
		static private $development = false;
		
		/**
		 * Class constructor
		 *
		 * @since 1.0.1
		 */
		function __construct() {
			
			/**
			 * If development mode enabled through Customizer
			 *
			 * @since 1.3.7
			 */
			if( get_theme_mod( 'agama_development_mode', false ) ) {
				self::$development = true;
			}
			
			/**
			 * If development under progress,
			 * generate unique id for scripts
			 * and styles enqueue process.
			 *
			 * @since 1.3.7
			 */
			if( self::$development ) {
				self::$version = esc_attr( uniqid() );
			}
			
			$this->defines();
			$this->reset_options();

			// Enqueue Frontend Scripts
			add_action( 'wp_head', array( $this, 'IE_Scripts' ) );
			
			// Custom jQuery for header
			if( get_theme_mod( 'agama_analytics_code', false ) ) {
				add_action( 'wp_head', array( $this, 'analitics_code' ) );
			}
			
			// Initialize Body Background Animation
			Agama_Helper::get_body_background_animation();
			
			// Custom jQuery for footer
			if( get_theme_mod( 'agama_jquery_footer_code', false ) ) {
				add_action( 'wp_footer', array( $this, 'jquery_footer' ) );
			}
			
			add_action( 'wp_enqueue_scripts', array( $this, 'scripts_styles' ) );
		}
		
		/**
		 * Creates or returns an instance of this class.
		 *
		 * @since 1.1.99
		 */
		public static function get_instance() {
			if( null == self::$instance ) {
				self::$instance = new self;
			}
			
			return self::$instance;
		}
		
		/**
		 * Agama Defines
		 *
		 * @since Agama v1.0.1
		 */
		function defines() {
			// Defina Agama URI
			if( ! defined( 'AGAMA_URI' ) ) {
				define( 'AGAMA_URI', get_template_directory_uri() . '/' );
			}
			
			// Define Agama DIR
			if( ! defined( 'AGAMA_DIR' ) ) {
				define( 'AGAMA_DIR', get_template_directory() . '/' );
			}
			
			// Define Agama framework DIR
			if( ! defined( 'AGAMA_FMW' ) ) {
				define( 'AGAMA_FMW', AGAMA_DIR . 'framework/' );
			}
			
			// Define Agama framework URI
			if( ! defined( 'AGAMA_FMW_URI' ) ) {
				define( 'AGAMA_FMW_URI', get_template_directory_uri() . '/framework/' );
			}
            
            // Defina Agama admin directory uri.
            if( ! defined( 'AGAMA_ADMIN_DIR_URI' ) ) {
                define( 'AGAMA_ADMIN_DIR_URI', AGAMA_FMW_URI . 'admin/assets/' );
            }
			
			// Define Agama INC
			if( ! defined( 'AGAMA_INC' ) ) {
				define( 'AGAMA_INC', AGAMA_DIR.'includes/' );
			}
			
			// Define Agama CSS
			if( ! defined( 'AGAMA_CSS' ) ) {
				define( 'AGAMA_CSS', AGAMA_URI.'assets/css/' );
			}
			
			// Define Agama JS
			if( ! defined( 'AGAMA_JS' ) ) {
				define( 'AGAMA_JS', AGAMA_URI.'assets/js/' );
			}
			
			// Define Agama IMG
			if( ! defined( 'AGAMA_IMG' ) ) {
				define( 'AGAMA_IMG', AGAMA_URI.'assets/img/' );
			}
		}
		
		/**
		 * Enqueue scripts and styles for front-end.
		 *
		 * @since Agama 1.0
		 */
		function scripts_styles() {
			global $wp_styles;
			
			// Enqueue jQuery
			wp_enqueue_script( 'jquery' );
			
			/*
			 * Adds JavaScript to pages with the comment form to support
			 * sites with threaded comments (when in use).
			 */
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );
			 
			// magnificPopup CSS
			wp_register_style( 'magnificPopup', AGAMA_CSS . 'magnific-popup.min.css', array(), self::$version );
			wp_enqueue_style( 'magnificPopup' );
			
			// FontAwesome
			if( get_theme_mod( 'agama_fontawesome', true ) ) {
				// Deregister & Dequeue
				wp_deregister_style('font-awesome');
				wp_dequeue_style('font-awesome');
				// Register & Enqueue
				wp_register_style( 'font-awesome', AGAMA_CSS . 'font-awesome.min.css', array(), self::$version );
				wp_enqueue_style( 'font-awesome' );
			}
			
			// reCaptcha v2
			if( is_page_template( 'templates/contact.php' ) ) {
				wp_register_script( 'recaptcha', '//google.com/recaptcha/api.js' );
				wp_enqueue_script( 'recaptcha' );
			}
			
			// Slider enabled or disabled extended check.
			if( is_home() && is_front_page() ) {
				$slider['enabled'] = esc_attr( get_theme_mod( 'agama_slider', false ) );
			} else {
				if( Agama::get_meta( '_agama_enable_slider', 'off' ) == 'on' ) {
					$slider['enabled'] = true;
				} else {
					$slider['enabled'] = false;
				}
			}
			
			// Enqueue Agama Slider stylesheet.
			if( $slider['enabled'] ) {
				wp_register_style( 'agama-slider', AGAMA_CSS . 'camera.min.css', array(), self::$version );
				wp_enqueue_style( 'agama-slider' );
			}

			// All JS Scripts
			wp_register_script('agama-plugins', AGAMA_JS . 'plugins.js', array(), self::$version );
			$plugins_translation = array(
				'niceScroll' 				=> esc_attr( get_theme_mod( 'agama_nicescroll', false ) ),
				'slider'					=> $slider['enabled'],
				'header_image_particles'	=> esc_attr( get_theme_mod( 'header_img_particles', true ) ),
				'slider_particles'			=> esc_attr( get_theme_mod( 'agama_slider_particles', true ) )
			);
			wp_localize_script( 'agama-plugins', 'plugin', $plugins_translation );
			wp_enqueue_script( 'agama-plugins' );
			
			// Agama Functions JS
			wp_register_script( 'agama-functions', AGAMA_JS . 'functions.js', array(), self::$version, true );
			$functions_translation = array(
				'is_admin_bar_showing'			=> esc_attr( is_admin_bar_showing() ),
				'header_style'					=> esc_attr( get_theme_mod( 'agama_header_style', 'v3' ) ),
				'header_transparent'			=> esc_attr( get_theme_mod( 'agama_header_transparent', false ) ),
				'logo_align'					=> esc_attr( get_theme_mod( 'agama_logo_align', 'left' ) ),
				'header_image'					=> esc_attr( get_theme_mod( 'agama_header_image', false ) ),
				'has_header_image'				=> esc_attr( has_header_image() ),
				'header_image_particles'		=> esc_attr( get_theme_mod( 'agama_header_image_particles', true ) ),
				'header_img_particles_c_color'	=> esc_attr( get_theme_mod( 'agama_header_image_particles_circle_color', '#A2C605' ) ),
				'header_img_particles_l_color'	=> esc_attr( get_theme_mod( 'agama_header_image_particles_lines_color', '#A2C605' ) ),
				'header_search'					=> esc_attr( get_theme_mod( 'agama_header_search', true ) ),
				'niceScroll'					=> esc_attr( get_theme_mod( 'agama_nicescroll', false ) ),
				'primary_color' 				=> esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ),
				'header_top_margin'				=> esc_attr( get_theme_mod( 'agama_header_top_margin', '0' ) ),
				'slider'						=> $slider['enabled'],
				'slider_particles'				=> esc_attr( get_theme_mod( 'agama_slider_particles', true ) ),
				'slider_particles_circle_color'	=> esc_attr( get_theme_mod( 'agama_slider_particles_circle_color', '#A2C605' ) ),
				'slider_particles_lines_color'	=> esc_attr( get_theme_mod( 'agama_slider_particles_lines_color', '#A2C605' ) ),
				'slider_loader'					=> esc_attr( get_theme_mod( 'agama_slider_loader', 'bar' ) ),
				'slider_time'					=> esc_attr( get_theme_mod( 'agama_slider_time', '7000' ) ),
				'slider_height'					=> esc_attr( get_theme_mod( 'agama_slider_height', '500' ) ),
				'slider_img_1'					=> esc_attr( get_theme_mod( 'agama_slider_image_1', false ) ),
				'slider_img_2'					=> esc_attr( get_theme_mod( 'agama_slider_image_2', false ) ),
				'slider_img_3'					=> esc_attr( get_theme_mod( 'agama_slider_image_3', false ) ),
				'slider_img_4'					=> esc_attr( get_theme_mod( 'agama_slider_image_4', false ) ),
				'slider_img_5'					=> esc_attr( get_theme_mod( 'agama_slider_image_5', false ) ),
				'slider_img_6'					=> esc_attr( get_theme_mod( 'agama_slider_image_6', false ) ),
				'slider_img_7'					=> esc_attr( get_theme_mod( 'agama_slider_image_7', false ) ),
				'slider_img_8'					=> esc_attr( get_theme_mod( 'agama_slider_image_8', false ) ),
				'slider_img_9'					=> esc_attr( get_theme_mod( 'agama_slider_image_9', false ) ),
				'slider_img_10'					=> esc_attr( get_theme_mod( 'agama_slider_image_10', false ) ),
                'blog_layout'                   => esc_attr( get_theme_mod( 'agama_blog_layout', 'list' ) ),
                'blog_pagination'               => esc_attr( get_theme_mod( 'agama_blog_pagination', true ) ),
                'infinite_scroll'               => esc_attr( get_theme_mod( 'agama_blog_infinite_scroll', false ) ),
                'infinite_trigger'              => esc_attr( get_theme_mod( 'agama_blog_infinite_trigger', 'button' ) )
			);
			wp_localize_script('agama-functions', 'agama_pro', $functions_translation);
			wp_enqueue_script('agama-functions');
			
			// Enqueue Agama Woocommerce stylesheet
			if( class_exists( 'Woocommerce' ) ) {
				wp_register_script( 'agama-pro-woocommerce', AGAMA_JS . 'woocommerce.js', array(), self::$version );
				wp_enqueue_script( 'agama-pro-woocommerce' );
				
				wp_register_style( 'agama-pro-woocommerce', AGAMA_CSS . 'woocommerce.css', array(), self::$version );
				wp_enqueue_style( 'agama-pro-woocommerce' );
			}
			
			// Agama stylesheet
			wp_register_style( 'agama-pro-style', get_stylesheet_uri(), array(), self::$version );
			wp_enqueue_style( 'agama-pro-style' );
			
			// Agama stylesheet minimized
			wp_register_style( 'agama-pro-minimized', AGAMA_CSS . 'style.min.css', array(), self::$version );
			wp_enqueue_style( 'agama-pro-minimized' );
			 
			// Agama shortcodes stylesheet
			wp_register_style( 'agama-pro-shortcodes', AGAMA_CSS . 'shortcodes.css', array(), self::$version );
			wp_enqueue_style( 'agama-pro-shortcodes' );
			
			// If dark skin selected, enqueue it's stylesheet
			if( get_theme_mod( 'agama_skin', 'light' ) == 'dark' ) {
				wp_register_style( 'agama-pro-dark', AGAMA_CSS . 'skins/dark.css', array(), self::$version );
				wp_enqueue_style( 'agama-pro-dark' );
			}

			// Loads the Internet Explorer specific stylesheet.
			wp_register_style( 'agama-pro-ie', AGAMA_CSS . 'ie.min.css', array( 'agama-pro-style' ), self::$version );
			wp_enqueue_style( 'agama-pro-ie' );
			$wp_styles->add_data( 'agama-pro-ie', 'conditional', 'lt IE 9' );
			
			// Animate Stylesheet
			wp_register_style('animate', AGAMA_CSS . 'animate.css');
			wp_enqueue_style('animate');
			
			// Responsive Stylesheet
			wp_register_style( 'agama-responsive', AGAMA_CSS . 'responsive.css', array('agama-pro-style'), self::$version );
			wp_enqueue_style( 'agama-responsive' );
		}
		
		/**
		 * Enqueue Script for IE versions
		 *
		 * @since Agama v1.0.2
		 */
		function IE_Scripts() {
			echo '<!--[if lt IE 9]><script src="'. AGAMA_JS .'html5.js"></script><![endif]-->'; // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions.
		}
		
		/**
		 * Enqueue Analitics Code
		 *
		 * @since 1.1.0
		 */
		function analitics_code() {
			$jQuery = get_theme_mod( 'agama_analytics_code', false );
			if( $jQuery ) {
				printf( '<script>%s</script>',  strip_tags( $jQuery ) );
			}
		}
		
		/**
		 * Enqueue Custom jQuery code for Footer Area
		 *
		 * @since 1.3.6
		 */
		function jquery_footer() {
			$jQuery = get_theme_mod( 'agama_jquery_footer_code', false );
			if( $jQuery ) {
				printf( '<script>%s</script>', strip_tags( $jQuery ) );
			}
		}
		
		/**
		 * Reset theme options to match current theme state.
		 *
		 * @since 1.3.4
		 * @return null
		 */
		public static function reset_options() {
			$Agama = wp_get_theme();
			$ver = $Agama->get( 'Version' );
			
			// If current theme version is bigger than v1.3.3 apply next options update.
			// If slider height is bigger than 100 we must update slider height option below 100, 
			// since slider height accepts only percentages value from now (v1.3.4) (removed pixels).
			if( version_compare( '1.3.3', $ver, '<' ) ) {
				$slider['height'] = esc_attr( get_theme_mod( 'agama_slider_height', '500' ) );
				if( $slider['height'] > 100 ) {
					set_theme_mod( 'agama_slider_height', '40' );
				}
			}
			// If current theme version is bigger than v1.3.5.20 apply next options update.
			// Update top & primary navigations color & typography from previous options for navigations.
			// since we removed old option for styling & added 2 new options for navigations styling (top|primary).
			// Migrated Agama Custom CSS to WordPress Additional CSS.
			if( version_compare( '1.3.5.20', $ver, '<' ) ) {
				$body['background-color'] = esc_attr( get_theme_mod( 'background_color', '#e6e6e6' ) );
				$nav['color'] 			  = esc_attr( get_theme_mod( 'agama_header_links_color', '#757575' ) );
				$nav['hover_color'] 	  = esc_attr( get_theme_mod( 'agama_header_links_hover_color', '#333' ) );
				$styling['custom_css'] 	  = esc_attr( get_theme_mod( 'agama_custom_css', '' ) );
				if( ! get_option( 'agama_v136_migrated' ) ) {
					if( $body['background-color'] ) {
						set_theme_mod( 'agama_body_background_color', $body['background-color'] );
					}
					if( $nav['color'] ) {
						set_theme_mod( 'agama_navigation_top_links_color', $nav['color'] );
						set_theme_mod( 'agama_navigation_primary_links_color', $nav['color'] );
					}
					if( $nav['hover_color'] ) {
						set_theme_mod( 'agama_navigation_top_links_hover_color', $nav['hover_color'] );
						set_theme_mod( 'agama_navigation_primary_links_hover_color', $nav['hover_color'] );
					}
					if( $styling['custom_css'] ) {
						wp_update_custom_css_post( $styling['custom_css'] );
					}
					update_option( 'agama_v136_migrated', true );
				}
			}
			// If current theme version is bigger than 1.3.7.7 apply next migration changes.
			// The "_agama_slider" was actually handled slider type data (Agama, Revolution, Layer).
			// The "_agama_slider" post meta is changed to "_agama_slider_type" so we need to export settigs to this new post meta.
			// "_agama_slider_type" is much better key name for this purpose.
			if( version_compare( '1.3.7.7', $ver, '<' ) ) {
				if( ! get_option( 'agama_v1377_migrated' ) ) {
					// Change posts _agama_slider to _agama_slider_type meta.
					$posts = get_posts( array( 'numberposts' => -1 ) );
					if( ! empty( $posts ) ) {
						foreach( $posts as $post ) {
							$post_meta_value = esc_attr( get_post_meta( $post->ID, '_agama_slider', true ) );
							if( $post_meta_value ) {
								update_post_meta( $post->ID, '_agama_slider_type', $post_meta_value );
							}
						}
					}
					// Change pages _agama_slider to _agama_slider_type meta.
					$page_ids = get_all_page_ids();
					if( ! empty( $page_ids ) ) {
						foreach( $page_ids as $page_id ) {
							$page_meta_value = esc_attr( get_post_meta( $page_id, '_agama_slider', true ) );
							if( $page_meta_value ) {
								update_post_meta( $page_id, '_agama_slider_type', $page_meta_value );
							}
						}
					}
					// Migrate Agama slider enabled on pages.
					$on_pages = get_theme_mod( 'agama_slider_pages', '' );
					if( ! empty( $on_pages ) && is_array( $on_pages ) ) {
						if( get_theme_mod( 'agama_slider', false ) ) {
							foreach( $on_pages as $PID ) {
								update_post_meta( $PID, '_agama_enable_slider', 'on' );
								update_post_meta( $PID, '_agama_slider_type', 'agama' );
							}
						}
					}
					update_option( 'agama_v1377_migrated', true );
				}
			}
		}
		
		/**
		 * Return theme version
		 *
		 * @since 1.1.99
		 */
		static function version() {
			return self::$version;
		}
	}
	Agama_Core::get_instance();
}

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
