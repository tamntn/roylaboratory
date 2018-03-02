<?php 

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Agama Slider Class
 *
 * @updated @since 1.3.8
 */
if( ! class_exists( 'Agama_Slider' ) ) {
	class Agama_Slider {
		
		/**
		 * Is Slider Enabled ?
		 *
		 * @since 1.3.8
		 * @access private
		 */
		private $enabled;
		
		/**
		 * Is Slider Enabled for Home Page ?
		 *
		 * @since 1.3.8
		 * @access private
		 */
		private $on_home;
		
		/**
		 * Agama Particles
		 *
		 * @since 1.3.8
		 * @access private
		 */
		private $agama_particles;
		
		/**
		 * Slider Type
		 *
		 * @since 1.3.8
		 * @access private
		 */
		private $slider_type;
		
		/**
		 * Agama Slider
		 *
		 * @since 1.3.8
		 * @access private
		 */
		private $agama_slider;
		
		/**
		 * Layer Slider
		 *
		 * @since 1.3.8
		 * @access private
		 */
		private $layer_slider;
		
		/**
		 * Revolution Slider
		 *
		 * @since 1.3.8
		 * @access private
		 */
		private $revolution_slider;
		
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
			
			$this->enabled 				= esc_attr( Agama::get_meta( '_agama_enable_slider', 'off' ) );
			$this->on_home				= esc_attr( get_theme_mod( 'agama_slider', false ) );
			$this->agama_particles		= esc_attr( get_theme_mod( 'agama_slider_particles', true ) );
			$this->slider_type			= esc_attr( Agama::get_meta( '_agama_slider_type' ) );
			$this->agama_slider			= esc_attr( Agama::get_meta( '_agama_slider' ) );
			$this->layer_slider			= esc_attr( Agama::get_meta( '_layer_slider' ) );
			$this->revolution_slider	= esc_attr( Agama::get_meta( '_revolution_slider' ) );
			
			$this->get_slider();
		}
		
		/**
		 * Get a unique instance of this object.
		 *
		 * @since 1.3.8
		 * @return object
		 */
		public static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new Agama_Slider();
			}
			return self::$instance;
		}
		
		/**
		 * Get Slider Options
		 *
		 * @since 1.3.8
		 */
		private static function get_options() {
			global $button, $slide;
			
			// SSL Support
			if( is_ssl() ) {
				$slide['1']['img']			= str_replace( 'http://', 'https://', esc_url( get_theme_mod( 'agama_slider_image_1', false ) ) );
				$slide['2']['img']			= str_replace( 'http://', 'https://', esc_url( get_theme_mod( 'agama_slider_image_2', false ) ) );
				$slide['3']['img']			= str_replace( 'http://', 'https://', esc_url( get_theme_mod( 'agama_slider_image_3', false ) ) );
				$slide['4']['img']			= str_replace( 'http://', 'https://', esc_url( get_theme_mod( 'agama_slider_image_4', false ) ) );
				$slide['5']['img']			= str_replace( 'http://', 'https://', esc_url( get_theme_mod( 'agama_slider_image_5', false ) ) );
				$slide['6']['img']			= str_replace( 'http://', 'https://', esc_url( get_theme_mod( 'agama_slider_image_6', false ) ) );
				$slide['7']['img']			= str_replace( 'http://', 'https://', esc_url( get_theme_mod( 'agama_slider_image_7', false ) ) );
				$slide['8']['img']			= str_replace( 'http://', 'https://', esc_url( get_theme_mod( 'agama_slider_image_8', false ) ) );
				$slide['9']['img']			= str_replace( 'http://', 'https://', esc_url( get_theme_mod( 'agama_slider_image_9', false ) ) );
				$slide['10']['img']			= str_replace( 'http://', 'https://', esc_url( get_theme_mod( 'agama_slider_image_10', false ) ) );
			} else {
				$slide['1']['img']			= esc_url( get_theme_mod( 'agama_slider_image_1', false ) );
				$slide['2']['img']			= esc_url( get_theme_mod( 'agama_slider_image_2', false ) );
				$slide['3']['img']			= esc_url( get_theme_mod( 'agama_slider_image_3', false ) );
				$slide['4']['img']			= esc_url( get_theme_mod( 'agama_slider_image_4', false ) );
				$slide['5']['img']			= esc_url( get_theme_mod( 'agama_slider_image_5', false ) );
				$slide['6']['img']			= esc_url( get_theme_mod( 'agama_slider_image_6', false ) );
				$slide['7']['img']			= esc_url( get_theme_mod( 'agama_slider_image_7', false ) );
				$slide['8']['img']			= esc_url( get_theme_mod( 'agama_slider_image_8', false ) );
				$slide['9']['img']			= esc_url( get_theme_mod( 'agama_slider_image_9', false ) );
				$slide['10']['img']			= esc_url( get_theme_mod( 'agama_slider_image_10', false ) );
			}
			
			// Slide Title
			$slide['1']['title']			= esc_attr( get_theme_mod( 'agama_slider_title_1', 'Welcome to Agama' ) );
			$slide['2']['title']			= esc_attr( get_theme_mod( 'agama_slider_title_2', 'Welcome to Agama' ) );
			$slide['3']['title']			= esc_attr( get_theme_mod( 'agama_slider_title_3', 'Welcome to Agama' ) );
			$slide['4']['title']			= esc_attr( get_theme_mod( 'agama_slider_title_4', 'Welcome to Agama' ) );
			$slide['5']['title']			= esc_attr( get_theme_mod( 'agama_slider_title_5', 'Welcome to Agama' ) );
			$slide['6']['title']			= esc_attr( get_theme_mod( 'agama_slider_title_6', 'Welcome to Agama' ) );
			$slide['7']['title']			= esc_attr( get_theme_mod( 'agama_slider_title_7', 'Welcome to Agama' ) );
			$slide['8']['title']			= esc_attr( get_theme_mod( 'agama_slider_title_8', 'Welcome to Agama' ) );
			$slide['9']['title']			= esc_attr( get_theme_mod( 'agama_slider_title_9', 'Welcome to Agama' ) );
			$slide['10']['title']			= esc_attr( get_theme_mod( 'agama_slider_title_10', 'Welcome to Agama' ) );

			// Slide Animation
			$slide['1']['animate'] 			= esc_attr( get_theme_mod( 'agama_slider_title_animation_1', 'bounceInLeft' ) );
			$slide['2']['animate'] 			= esc_attr( get_theme_mod( 'agama_slider_title_animation_2', 'bounceInLeft' ) );
			$slide['3']['animate'] 			= esc_attr( get_theme_mod( 'agama_slider_title_animation_3', 'bounceInLeft' ) );
			$slide['4']['animate'] 			= esc_attr( get_theme_mod( 'agama_slider_title_animation_4', 'bounceInLeft' ) );
			$slide['5']['animate'] 			= esc_attr( get_theme_mod( 'agama_slider_title_animation_5', 'bounceInLeft' ) );
			$slide['6']['animate'] 			= esc_attr( get_theme_mod( 'agama_slider_title_animation_6', 'bounceInLeft' ) );
			$slide['7']['animate'] 			= esc_attr( get_theme_mod( 'agama_slider_title_animation_7', 'bounceInLeft' ) );
			$slide['8']['animate'] 			= esc_attr( get_theme_mod( 'agama_slider_title_animation_8', 'bounceInLeft' ) );
			$slide['9']['animate'] 			= esc_attr( get_theme_mod( 'agama_slider_title_animation_9', 'bounceInLeft' ) );
			$slide['10']['animate'] 		= esc_attr( get_theme_mod( 'agama_slider_title_animation_10', 'bounceInLeft' ) );

			// Button Enabled
			$button['1']['enabled']			= esc_attr( get_theme_mod( 'agama_slider_button_1', true ) );
			$button['2']['enabled']			= esc_attr( get_theme_mod( 'agama_slider_button_2', true ) );
			$button['3']['enabled']			= esc_attr( get_theme_mod( 'agama_slider_button_3', true ) );
			$button['4']['enabled']			= esc_attr( get_theme_mod( 'agama_slider_button_4', true ) );
			$button['5']['enabled']			= esc_attr( get_theme_mod( 'agama_slider_button_5', true ) );
			$button['6']['enabled']			= esc_attr( get_theme_mod( 'agama_slider_button_6', true ) );
			$button['7']['enabled']			= esc_attr( get_theme_mod( 'agama_slider_button_7', true ) );
			$button['8']['enabled']			= esc_attr( get_theme_mod( 'agama_slider_button_8', true ) );
			$button['9']['enabled']			= esc_attr( get_theme_mod( 'agama_slider_button_9', true ) );
			$button['10']['enabled']		= esc_attr( get_theme_mod( 'agama_slider_button_10', true ) );
            
            // Button Style
            $button['1']['style']  = esc_attr( get_theme_mod( 'agama_slider_button_style_1', 'button-border' ) );
            $button['2']['style']  = esc_attr( get_theme_mod( 'agama_slider_button_style_2', 'button-border' ) );
            $button['3']['style']  = esc_attr( get_theme_mod( 'agama_slider_button_style_3', 'button-border' ) );
            $button['4']['style']  = esc_attr( get_theme_mod( 'agama_slider_button_style_4', 'button-border' ) );
            $button['5']['style']  = esc_attr( get_theme_mod( 'agama_slider_button_style_5', 'button-border' ) );
            $button['6']['style']  = esc_attr( get_theme_mod( 'agama_slider_button_style_6', 'button-border' ) );
            $button['7']['style']  = esc_attr( get_theme_mod( 'agama_slider_button_style_7', 'button-border' ) );
            $button['8']['style']  = esc_attr( get_theme_mod( 'agama_slider_button_style_8', 'button-border' ) );
            $button['9']['style']  = esc_attr( get_theme_mod( 'agama_slider_button_style_9', 'button-border' ) );
            $button['10']['style'] = esc_attr( get_theme_mod( 'agama_slider_button_style_10', 'button-border' ) );
			
			// Button Title
			$button['1']['title'] 			= esc_attr( get_theme_mod( 'agama_slider_button_title_1', 'Learn More' ) );
			$button['2']['title'] 			= esc_attr( get_theme_mod( 'agama_slider_button_title_2', 'Learn More' ) );
			$button['3']['title'] 			= esc_attr( get_theme_mod( 'agama_slider_button_title_3', 'Learn More' ) );
			$button['4']['title'] 			= esc_attr( get_theme_mod( 'agama_slider_button_title_4', 'Learn More' ) );
			$button['5']['title'] 			= esc_attr( get_theme_mod( 'agama_slider_button_title_5', 'Learn More' ) );
			$button['6']['title'] 			= esc_attr( get_theme_mod( 'agama_slider_button_title_6', 'Learn More' ) );
			$button['7']['title'] 			= esc_attr( get_theme_mod( 'agama_slider_button_title_7', 'Learn More' ) );
			$button['8']['title'] 			= esc_attr( get_theme_mod( 'agama_slider_button_title_8', 'Learn More' ) );
			$button['9']['title'] 			= esc_attr( get_theme_mod( 'agama_slider_button_title_9', 'Learn More' ) );
			$button['10']['title'] 			= esc_attr( get_theme_mod( 'agama_slider_button_title_10', 'Learn More' ) );

			// Button Animation
			$button['1']['animate']			= esc_attr( get_theme_mod( 'agama_slider_button_animation_1', 'bounceInRight' ) );
			$button['2']['animate']			= esc_attr( get_theme_mod( 'agama_slider_button_animation_2', 'bounceInRight' ) );
			$button['3']['animate']			= esc_attr( get_theme_mod( 'agama_slider_button_animation_3', 'bounceInRight' ) );
			$button['4']['animate']			= esc_attr( get_theme_mod( 'agama_slider_button_animation_4', 'bounceInRight' ) );
			$button['5']['animate']			= esc_attr( get_theme_mod( 'agama_slider_button_animation_5', 'bounceInRight' ) );
			$button['6']['animate']			= esc_attr( get_theme_mod( 'agama_slider_button_animation_6', 'bounceInRight' ) );
			$button['7']['animate']			= esc_attr( get_theme_mod( 'agama_slider_button_animation_7', 'bounceInRight' ) );
			$button['8']['animate']			= esc_attr( get_theme_mod( 'agama_slider_button_animation_8', 'bounceInRight' ) );
			$button['9']['animate']			= esc_attr( get_theme_mod( 'agama_slider_button_animation_9', 'bounceInRight' ) );
			$button['10']['animate']		= esc_attr( get_theme_mod( 'agama_slider_button_animation_10', 'bounceInRight' ) );

			// Button URL
			$button['1']['url'] 			= esc_url( get_theme_mod( 'agama_slider_button_url_1', '#' ) );
			$button['2']['url'] 			= esc_url( get_theme_mod( 'agama_slider_button_url_2', '#' ) );
			$button['3']['url'] 			= esc_url( get_theme_mod( 'agama_slider_button_url_3', '#' ) );
			$button['4']['url'] 			= esc_url( get_theme_mod( 'agama_slider_button_url_4', '#' ) );
			$button['5']['url'] 			= esc_url( get_theme_mod( 'agama_slider_button_url_5', '#' ) );
			$button['6']['url'] 			= esc_url( get_theme_mod( 'agama_slider_button_url_6', '#' ) );
			$button['7']['url'] 			= esc_url( get_theme_mod( 'agama_slider_button_url_7', '#' ) );
			$button['8']['url'] 			= esc_url( get_theme_mod( 'agama_slider_button_url_8', '#' ) );
			$button['9']['url'] 			= esc_url( get_theme_mod( 'agama_slider_button_url_9', '#' ) );
			$button['10']['url'] 			= esc_url( get_theme_mod( 'agama_slider_button_url_10', '#' ) );
		}
		
		/**
		 * Output Particles
		 *
		 * @since 1.3.8
		 */
		private function particles() {
			if( $this->agama_particles ) {
				echo '<div id="particles-js" class="agama-particles"></div>';
			}
		}
		
		/**
		 * Get Slider
		 *
		 * @since 1.3.8
		 */
		private function get_slider() {
			if( $this->on_home && is_home() && is_front_page() || $this->enabled == 'on' && $this->slider_type == 'agama' ) {
				$this->get_agama_slider();
			}
			if( $this->enabled == 'on' && $this->slider_type == 'layer' && $this->layer_slider !== false ) {
				$this->get_layer_slider();
			}
			if( $this->enabled == 'on' && $this->slider_type == 'revolution' && $this->revolution_slider !== false ) {
				$this->get_revolution_slider();
			}
		}
		
		/**
		 * Agama Slider
		 *
		 * @since 1.3.8
		 */
		private function get_agama_slider() {
			global $button, $slide;
			
			self::get_options();
			
			// If slider is enabled but none images are uploaded throws warning message.
			if( ! $slide['1']['img'] && ! $slide['2']['img'] && ! $slide['3']['img'] && 
				! $slide['4']['img'] && ! $slide['5']['img'] && ! $slide['6']['img'] && 
				! $slide['7']['img'] && ! $slide['8']['img'] && ! $slide['9']['img'] && 
				! $slide['10']['img'] 
			) {
				$slider['warning'] 	= true;
				$slider['class'] 	= esc_attr( ' agama-slider-warning' );
			} else {
				$slider['warning'] 	= false;
				$slider['class']	= '';
			}
			
			echo '<div id="agama-slider-wrapper" class="agama-slider-wrapper'. $slider['class'] .'">';
				echo '<div id="agama_slider" class="camera_wrap">';
					if( $slider['warning'] ) {
						echo '<h2>'. __( 'Agama slider has not any images for sliding! Please add images to the slider from Appearance -> Customize -> Slider', 'agama-pro' ) .'</h2>';
					} else {
						if( $slide['1']['img'] ) {
							echo '<div data-src="'. $slide['1']['img'] .'" data-alt="'. $slide['1']['title'] .'">';
								echo '<div class="slide-content slide-1">';
									if( $slide['1']['title'] ) {
										echo '<h2 class="slide-title animated '. $slide['1']['animate'] .'">';
											echo $slide['1']['title'];
										echo '</h2>';
									}
									if( $button['1']['enabled'] ) {
										echo '<a href="'. $button['1']['url'] .'" class="button button-xlarge '.$button['1']['style'].' animated '. $button['1']['animate'] .'">';
											echo $button['1']['title'];
										echo '</a>';
									}
								echo '</div>';
							echo '</div>';
						}
						if( $slide['2']['img'] ) {
							echo '<div data-src="'. $slide['2']['img'] .'" data-alt="'. $slide['2']['title'] .'">';
								echo '<div class="slide-content slide-2">';
									if( $slide['2']['title'] ) {
										echo '<h2 class="slide-title animated '. $slide['2']['animate'] .'">';
											echo $slide['2']['title'];
										echo '</h2>';
									}
									if( $button['2']['enabled'] ) {
										echo '<a href="'. $button['2']['url'] .'" class="button button-xlarge '.$button['2']['style'].' animated '. $button['2']['animate'] .'">';
											echo $button['2']['title'];
										echo '</a>';
									}
								echo '</div>';
							echo '</div>';
						}
						if( $slide['3']['img'] ) {
							echo '<div data-src="'. $slide['3']['img'] .'" data-alt="'. $slide['3']['title'] .'">';
								echo '<div class="slide-content slide-3">';
									if( $slide['3']['title'] ) {
										echo '<h2 class="slide-title animated '. $slide['3']['animate'] .'">';
											echo $slide['3']['title'];
										echo '</h2>';
									}
									if( $button['3']['enabled'] ) {
										echo '<a href="'. $button['3']['url'] .'" class="button button-xlarge '.$button['3']['style'].' animated '. $button['3']['animate'] .'">';
											echo $button['3']['title'];
										echo '</a>';
									}
								echo '</div>';
							echo '</div>';
						}
						if( $slide['4']['img'] ) {
							echo '<div data-src="'. $slide['4']['img'] .'" data-alt="'. $slide['4']['title'] .'">';
								echo '<div class="slide-content slide-4">';
									if( $slide['4']['title'] ) {
										echo '<h2 class="slide-title animated '. $slide['4']['animate'] .'">';
											echo $slide['4']['title'];
										echo '</h2>';
									}
									if( $button['4']['enabled'] ) {
										echo '<a href="'. $button['4']['url'] .'" class="button button-xlarge '.$button['4']['style'].' animated '. $button['4']['animate'] .'">';
											echo $button['4']['title'];
										echo '</a>';
									}
								echo '</div>';
							echo '</div>';
						}
						if( $slide['5']['img'] ) {
							echo '<div data-src="'. $slide['5']['img'] .'" data-alt="'. $slide['5']['title'] .'">';
								echo '<div class="slide-content slide-5">';
									if( $slide['5']['title'] ) {
										echo '<h2 class="slide-title animated '. $slide['5']['animate'] .'">';
											echo $slide['5']['title'];
										echo '</h2>';
									}
									if( $button['5']['enabled'] ) {
										echo '<a href="'. $button['5']['url'] .'" class="button button-xlarge '.$button['5']['style'].' animated '. $button['5']['animate'] .'">';
											echo $button['5']['title'];
										echo '</a>';
									}
								echo '</div>';
							echo '</div>';
						}
						if( $slide['6']['img'] ) {
							echo '<div data-src="'. $slide['6']['img'] .'" data-alt="'. $slide['6']['title'] .'">';
								echo '<div class="slide-content slide-6">';
									if( $slide['6']['title'] ) {
										echo '<h2 class="slide-title animated '. $slide['6']['animate'] .'">';
											echo $slide['6']['title'];
										echo '</h2>';
									}
									if( $button['6']['enabled'] ) {
										echo '<a href="'. $button['6']['url'] .'" class="button button-xlarge '.$button['6']['style'].' animated '. $button['6']['animate'] .'">';
											echo $button['6']['title'];
										echo '</a>';
									}
								echo '</div>';
							echo '</div>';
						}
						if( $slide['7']['img'] ) {
							echo '<div data-src="'. $slide['7']['img'] .'" data-alt="'. $slide['7']['title'] .'">';
								echo '<div class="slide-content slide-7">';
									if( $slide['7']['title'] ) {
										echo '<h2 class="slide-title animated '. $slide['7']['animate'] .'">';
											echo $slide['7']['title'];
										echo '</h2>';
									}
									if( $button['7']['enabled'] ) {
										echo '<a href="'. $button['7']['url'] .'" class="button button-xlarge '.$button['7']['style'].' animated '. $button['7']['animate'] .'">';
											echo $button['7']['title'];
										echo '</a>';
									}
								echo '</div>';
							echo '</div>';
						}
						if( $slide['8']['img'] ) {
							echo '<div data-src="'. $slide['8']['img'] .'" data-alt="'. $slide['8']['title'] .'">';
								echo '<div class="slide-content slide-8">';
									if( $slide['8']['title'] ) {
										echo '<h2 class="slide-title animated '. $slide['8']['animate'] .'">';
											echo $slide['8']['title'];
										echo '</h2>';
									}
									if( $button['8']['enabled'] ) {
										echo '<a href="'. $button['8']['url'] .'" class="button button-xlarge '.$button['8']['style'].' animated '. $button['8']['animate'] .'">';
											echo $button['8']['title'];
										echo '</a>';
									}
								echo '</div>';
							echo '</div>';
						}
						if( $slide['9']['img'] ) {
							echo '<div data-src="'. $slide['9']['img'] .'" data-alt="'. $slide['9']['title'] .'">';
								echo '<div class="slide-content slide-9">';
									if( $slide['9']['title'] ) {
										echo '<h2 class="slide-title animated '. $slide['9']['animate'] .'">';
											echo $slide['9']['title'];
										echo '</h2>';
									}
									if( $button['9']['enabled'] ) {
										echo '<a href="'. $button['9']['url'] .'" class="button button-xlarge '.$button['9']['style'].' animated '. $button['9']['animate'] .'">';
											echo $button['9']['title'];
										echo '</a>';
									}
								echo '</div>';
							echo '</div>';
						}
						if( $slide['10']['img'] ) {
							echo '<div data-src="'. $slide['10']['img'] .'" data-alt="'. $slide['10']['title'] .'">';
								echo '<div class="slide-content slide-10">';
									if( $slide['10']['title'] ) {
										echo '<h2 class="slide-title animated '. $slide['10']['animate'] .'">';
											echo $slide['10']['title'];
										echo '</h2>';
									}
									if( $button['10']['enabled'] ) {
										echo '<a href="'. $button['10']['url'] .'" class="button button-xlarge '.$button['10']['style'].' animated '. $button['10']['animate'] .'">';
											echo $button['10']['title'];
										echo '</a>';
									}
								echo '</div>';
							echo '</div>';
						}
					}
				echo '</div>';
				if( ! $slider['warning'] ) {
					$this->particles();
				}
			echo '</div>';
		}
		
		/**
		 * Layer Slider
		 *
		 * @since 1.3.8
		 */
		private function get_layer_slider() {
			echo '<div id="slider-wrapper" class="agama-slider">';
				echo do_shortcode( '[layerslider id="'. $this->layer_slider .'"]' );
			echo '</div>';
		}
		
		/**
		 * Revolution Slider
		 *
		 * @since 1.3.8
		 */
		private function get_revolution_slider() {
			if( function_exists( 'putRevSlider' ) ) {
				echo '<div id="slider-wrapper" class="agama-slider">';
					putRevSlider( $this->revolution_slider );
				echo '</div>';
			}
		}
	}
}

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
