<?php

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Agama Frontpage Boxes Class
 *
 * @since 1.1.99
 * @updated since 1.3.8
 */
class Agama_Front_Page_Boxes {
	
	/**
	 * Class Constructor
	 *
	 * @since 1.3.8
	 */
	public static function init() {
		self::render();
	}
	
	/**
	 * Get Front Page Boxes Options
	 *
	 * @since 1.3.8
	 */
	private static function get_options() {
		global $box, $boxes, $enabled;
		
		$enabled = esc_attr( get_theme_mod( 'agama_frontpage_boxes', true ) );
		
		$box[1]['enabled'] = esc_attr( get_theme_mod( 'agama_frontpage_box_1_enable', true ) );
		$box[2]['enabled'] = esc_attr( get_theme_mod( 'agama_frontpage_box_2_enable', true ) );
		$box[3]['enabled'] = esc_attr( get_theme_mod( 'agama_frontpage_box_3_enable', true ) );
		$box[4]['enabled'] = esc_attr( get_theme_mod( 'agama_frontpage_box_4_enable', true ) );
		$box[5]['enabled'] = esc_attr( get_theme_mod( 'agama_frontpage_box_5_enable', false ) );
		$box[6]['enabled'] = esc_attr( get_theme_mod( 'agama_frontpage_box_6_enable', false ) );
		$box[7]['enabled'] = esc_attr( get_theme_mod( 'agama_frontpage_box_7_enable', false ) );
		$box[8]['enabled'] = esc_attr( get_theme_mod( 'agama_frontpage_box_8_enable', false ) );
		
		if( $box[1]['enabled'] || $box[2]['enabled'] || $box[3]['enabled'] || $box[4]['enabled'] ) {
			$boxes['1-4']['enabled'] = true;
		} else {
			$boxes['1-4']['enabled'] = false;
		}
		
		if( $box[5]['enabled'] || $box[6]['enabled'] || $box[7]['enabled'] || $box[8]['enabled'] ) {
			$boxes['5-8']['enabled'] = true;
		} else {
			$boxes['5-8']['enabled'] = false;
		}
		
		$boxes['visibility'] = esc_attr( get_theme_mod( 'agama_frontpage_boxes_visibility', 'homepage' ) );
		
		$boxes['1-4']['count'] = 0;
		if( $box[1]['enabled'] ) {
			$boxes['1-4']['count']++;
		}
		if( $box[2]['enabled'] ) {
			$boxes['1-4']['count']++;
		}
		if( $box[3]['enabled'] ) {
			$boxes['1-4']['count']++;
		}
		if( $box[4]['enabled'] ) {
			$boxes['1-4']['count']++;
		}
		
		switch( $boxes['1-4']['count'] ) {
			case '1':
				$boxes['1-4']['class'] = esc_attr( 'col-md-12' );
			break;
			case '2':
				$boxes['1-4']['class'] = esc_attr( 'col-md-6' );
			break;
			case '3':
				$boxes['1-4']['class'] = esc_attr( 'col-md-4' );
			break;
			case '4':
				$boxes['1-4']['class'] = esc_attr( 'col-md-3' );
			break;
			default: $boxes['1-4']['class'] = '';
		}
		
		$boxes['5-8']['count'] = 0;
		if( $box[5]['enabled'] ) {
			$boxes['5-8']['count']++;
		}
		if( $box[6]['enabled'] ) {
			$boxes['5-8']['count']++;
		}
		if( $box[7]['enabled'] ) {
			$boxes['5-8']['count']++;
		}
		if( $box[8]['enabled'] ) {
			$boxes['5-8']['count']++;
		}
		
		switch( $boxes['5-8']['count'] ) {
			case '1':
				$boxes['5-8']['class'] = esc_attr( 'col-md-12' );
			break;
			case '2':
				$boxes['5-8']['class'] = esc_attr( 'col-md-6' );
			break;
			case '3':
				$boxes['5-8']['class'] = esc_attr( 'col-md-4' );
			break;
			case '4':
				$boxes['5-8']['class'] = esc_attr( 'col-md-3' );
			break;
			default: $boxes['5-8']['class'] = '';
		}
		
		// Box Title
		$box[1]['title'] = esc_html( get_theme_mod( 'agama_frontpage_box_1_title', __( 'Responsive Layout', 'agama-pro' ) ) );
		$box[2]['title'] = esc_html( get_theme_mod( 'agama_frontpage_box_2_title', __( 'Endless Possibilities', 'agama-pro' ) ) );
		$box[3]['title'] = esc_html( get_theme_mod( 'agama_frontpage_box_3_title', __( 'Boxed & Wide Layouts', 'agama-pro' ) ) );
		$box[4]['title'] = esc_html( get_theme_mod( 'agama_frontpage_box_4_title', __( 'Powerful Performance', 'agama-pro' ) ) );
		$box[5]['title'] = esc_html( get_theme_mod( 'agama_frontpage_box_5_title', __( 'Powerful Performance', 'agama-pro' ) ) );
		$box[6]['title'] = esc_html( get_theme_mod( 'agama_frontpage_box_6_title', __( 'Boxed & Wide Layouts', 'agama-pro' ) ) );
		$box[7]['title'] = esc_html( get_theme_mod( 'agama_frontpage_box_7_title', __( 'Endless Possibilities', 'agama-pro' ) ) );
		$box[8]['title'] = esc_html( get_theme_mod( 'agama_frontpage_box_8_title', __( 'Responsive Layout', 'agama-pro' ) ) );
		
		// Box Description
		$box[1]['desc'] = get_theme_mod( 'agama_frontpage_box_1_text', __( 'Powerful Layout with Responsive functionality that can be adapted to any screen size.', 'agama-pro' ) );
		$box[2]['desc'] = get_theme_mod( 'agama_frontpage_box_2_text', __( 'Complete control on each & every element that provides endless customization possibilities.', 'agama-pro' ) );
		$box[3]['desc'] = get_theme_mod( 'agama_frontpage_box_3_text', __( 'Stretch your Website to the Full Width or make it boxed to surprise your visitors.', 'agama-pro' ) );
		$box[4]['desc'] = get_theme_mod( 'agama_frontpage_box_4_text', __( 'Optimized code that are completely customizable and deliver unmatched fast performance.', 'agama-pro' ) );
		$box[5]['desc'] = get_theme_mod( 'agama_frontpage_box_5_text', __( 'Optimized code that are completely customizable and deliver unmatched fast performance.', 'agama-pro' ) );
		$box[6]['desc'] = get_theme_mod( 'agama_frontpage_box_6_text', __( 'Stretch your Website to the Full Width or make it boxed to surprise your visitors.', 'agama-pro' ) );
		$box[7]['desc'] = get_theme_mod( 'agama_frontpage_box_7_text', __( 'Complete control on each & every element that provides endless customization possibilities.', 'agama-pro' ) );
		$box[8]['desc'] = get_theme_mod( 'agama_frontpage_box_8_text', __( 'Powerful Layout with Responsive functionality that can be adapted to any screen size.', 'agama-pro' ) );
		
		// Box Icon Url
		$box[1]['icon_url'] = esc_url( get_theme_mod( 'agama_frontpage_box_1_icon_url', false ) );
		$box[2]['icon_url'] = esc_url( get_theme_mod( 'agama_frontpage_box_2_icon_url', false ) );
		$box[3]['icon_url'] = esc_url( get_theme_mod( 'agama_frontpage_box_3_icon_url', false ) );
		$box[4]['icon_url'] = esc_url( get_theme_mod( 'agama_frontpage_box_4_icon_url', false ) );
		$box[5]['icon_url'] = esc_url( get_theme_mod( 'agama_frontpage_box_5_icon_url', false ) );
		$box[6]['icon_url'] = esc_url( get_theme_mod( 'agama_frontpage_box_6_icon_url', false ) );
		$box[7]['icon_url'] = esc_url( get_theme_mod( 'agama_frontpage_box_7_icon_url', false ) );
		$box[8]['icon_url'] = esc_url( get_theme_mod( 'agama_frontpage_box_8_icon_url', false ) );
		
		// Box 1 Icon
        if( get_theme_mod( 'agama_frontpage_box_1_ico_or_img', 'icon' ) == 'icon' ) {
            $box[1]['icon'] = '<i class="fa '. esc_attr( get_theme_mod( 'agama_frontpage_box_1_icon', 'fa-tablet' ) ) .'"></i>';
        } else {
            $box[1]['icon'] = '<img src="'. esc_url( get_theme_mod( 'agama_frontpage_1_img', '' ) ) .'">';
        }
        // Box 2 Icon
        if( get_theme_mod( 'agama_frontpage_box_2_ico_or_img', 'icon' ) == 'icon' ) {
            $box[2]['icon'] = '<i class="fa '. esc_attr( get_theme_mod( 'agama_frontpage_box_2_icon', 'fa-cogs' ) ) .'"></i>';
        } else {
            $box[2]['icon'] = '<img src="'. esc_url( get_theme_mod( 'agama_frontpage_2_img', '' ) ) .'">';
        }
        // Box 3 Icon
        if( get_theme_mod( 'agama_frontpage_box_3_ico_or_img', 'icon' ) == 'icon' ) {
            $box[3]['icon'] = '<i class="fa '. esc_attr( get_theme_mod( 'agama_frontpage_box_3_icon', 'fa-laptop' ) ) .'"></i>';
        } else {
            $box[3]['icon'] = '<img src="'. esc_url( get_theme_mod( 'agama_frontpage_3_img', '' ) ) .'">';
        }
        // Box 4 Icon
        if( get_theme_mod( 'agama_frontpage_box_4_ico_or_img', 'icon' ) == 'icon' ) {
            $box[4]['icon'] = '<i class="fa '. esc_attr( get_theme_mod( 'agama_frontpage_box_4_icon', 'fa-magic' ) ) .'"></i>';
        } else {
            $box[4]['icon'] = '<img src="'. esc_url( get_theme_mod( 'agama_frontpage_4_img', '' ) ) .'">';
        }
        // Box 5 Icon
        if( get_theme_mod( 'agama_frontpage_box_5_ico_or_img', 'icon' ) == 'icon' ) {
            $box[5]['icon'] = '<i class="fa '. esc_attr( get_theme_mod( 'agama_frontpage_box_5_icon', 'fa-magic' ) ) .'"></i>';
        } else {
            $box[5]['icon'] = '<img src="'. esc_url( get_theme_mod( 'agama_frontpage_5_img', '' ) ) .'">';
        }
        // Box 6 Icon
        if( get_theme_mod( 'agama_frontpage_box_6_ico_or_img', 'icon' ) == 'icon' ) {
            $box[6]['icon'] = '<i class="fa '. esc_attr( get_theme_mod( 'agama_frontpage_box_6_icon', 'fa-laptop' ) ) .'"></i>';
        } else {
            $box[6]['icon'] = '<img src="'. esc_url( get_theme_mod( 'agama_frontpage_6_img', '' ) ) .'">';
        }
        // Box 7 Icon
        if( get_theme_mod( 'agama_frontpage_box_7_ico_or_img', 'icon' ) == 'icon' ) {
            $box[7]['icon'] = '<i class="fa '. esc_attr( get_theme_mod( 'agama_frontpage_box_7_icon', 'fa-cogs' ) ) .'"></i>';
        } else {
            $box[7]['icon'] = '<img src="'. esc_url( get_theme_mod( 'agama_frontpage_7_img', '' ) ) .'">';
        }
        // Box 8 Icon
        if( get_theme_mod( 'agama_frontpage_box_8_ico_or_img', 'icon' ) == 'icon' ) {
            $box[8]['icon'] = '<i class="fa '. esc_attr( get_theme_mod( 'agama_frontpage_box_8_icon', 'fa-tablet' ) ) .'"></i>';
        } else {
            $box[8]['icon'] = '<img src="'. esc_url( get_theme_mod( 'agama_frontpage_8_img', '' ) ) .'">';
        }
		
		// Box Read-More Button
		$box[1]['readmore'] = esc_attr( get_theme_mod( 'agama_frontpage_box_1_readmore', true ) );
		$box[2]['readmore'] = esc_attr( get_theme_mod( 'agama_frontpage_box_2_readmore', true ) );
		$box[3]['readmore'] = esc_attr( get_theme_mod( 'agama_frontpage_box_3_readmore', true ) );
		$box[4]['readmore'] = esc_attr( get_theme_mod( 'agama_frontpage_box_4_readmore', true ) );
		$box[5]['readmore'] = esc_attr( get_theme_mod( 'agama_frontpage_box_5_readmore', true ) );
		$box[6]['readmore'] = esc_attr( get_theme_mod( 'agama_frontpage_box_6_readmore', true ) );
		$box[7]['readmore'] = esc_attr( get_theme_mod( 'agama_frontpage_box_7_readmore', true ) );
		$box[8]['readmore'] = esc_attr( get_theme_mod( 'agama_frontpage_box_8_readmore', true ) );
		
		// Box Read-More Button Url
		$box[1]['readmore_url'] = esc_url( get_theme_mod( 'agama_frontpage_box_1_readmore_url', '#' ) );
		$box[2]['readmore_url'] = esc_url( get_theme_mod( 'agama_frontpage_box_2_readmore_url', '#' ) );
		$box[3]['readmore_url'] = esc_url( get_theme_mod( 'agama_frontpage_box_3_readmore_url', '#' ) );
		$box[4]['readmore_url'] = esc_url( get_theme_mod( 'agama_frontpage_box_4_readmore_url', '#' ) );
		$box[5]['readmore_url'] = esc_url( get_theme_mod( 'agama_frontpage_box_5_readmore_url', '#' ) );
		$box[6]['readmore_url'] = esc_url( get_theme_mod( 'agama_frontpage_box_6_readmore_url', '#' ) );
		$box[7]['readmore_url'] = esc_url( get_theme_mod( 'agama_frontpage_box_7_readmore_url', '#' ) );
		$box[8]['readmore_url'] = esc_url( get_theme_mod( 'agama_frontpage_box_8_readmore_url', '#' ) );
		
		// Box Read-More Button Title
		$box[1]['readmore_title'] = esc_html( get_theme_mod( 'agama_frontpage_box_1_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
		$box[2]['readmore_title'] = esc_html( get_theme_mod( 'agama_frontpage_box_2_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
		$box[3]['readmore_title'] = esc_html( get_theme_mod( 'agama_frontpage_box_3_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
		$box[4]['readmore_title'] = esc_html( get_theme_mod( 'agama_frontpage_box_4_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
		$box[5]['readmore_title'] = esc_html( get_theme_mod( 'agama_frontpage_box_5_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
		$box[6]['readmore_title'] = esc_html( get_theme_mod( 'agama_frontpage_box_6_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
		$box[7]['readmore_title'] = esc_html( get_theme_mod( 'agama_frontpage_box_7_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
		$box[8]['readmore_title'] = esc_html( get_theme_mod( 'agama_frontpage_box_8_readmore_txt', __( 'Read More', 'agama-pro' ) ) );
		
		// Box Animated ?
		$box[1]['animated'] = esc_attr( get_theme_mod( 'agama_frontpage_box_1_animated', true ) );
		$box[2]['animated'] = esc_attr( get_theme_mod( 'agama_frontpage_box_2_animated', true ) );
		$box[3]['animated'] = esc_attr( get_theme_mod( 'agama_frontpage_box_3_animated', true ) );
		$box[4]['animated'] = esc_attr( get_theme_mod( 'agama_frontpage_box_4_animated', true ) );
		$box[5]['animated'] = esc_attr( get_theme_mod( 'agama_frontpage_box_5_animated', true ) );
		$box[6]['animated'] = esc_attr( get_theme_mod( 'agama_frontpage_box_6_animated', true ) );
		$box[7]['animated'] = esc_attr( get_theme_mod( 'agama_frontpage_box_7_animated', true ) );
		$box[8]['animated'] = esc_attr( get_theme_mod( 'agama_frontpage_box_8_animated', true ) );
		
		// Box Animation
		$box[1]['animation'] = esc_attr( get_theme_mod( 'agama_frontpage_box_1_animation', 'bounceIn' ) );
		$box[2]['animation'] = esc_attr( get_theme_mod( 'agama_frontpage_box_2_animation', 'bounceIn' ) );
		$box[3]['animation'] = esc_attr( get_theme_mod( 'agama_frontpage_box_3_animation', 'bounceIn' ) );
		$box[4]['animation'] = esc_attr( get_theme_mod( 'agama_frontpage_box_4_animation', 'bounceIn' ) );
		$box[5]['animation'] = esc_attr( get_theme_mod( 'agama_frontpage_box_5_animation', 'bounceIn' ) );
		$box[6]['animation'] = esc_attr( get_theme_mod( 'agama_frontpage_box_6_animation', 'bounceIn' ) );
		$box[7]['animation'] = esc_attr( get_theme_mod( 'agama_frontpage_box_7_animation', 'bounceIn' ) );
		$box[8]['animation'] = esc_attr( get_theme_mod( 'agama_frontpage_box_8_animation', 'bounceIn' ) ); 
		
		// Box Animation Delay
		$box[1]['animation_delay'] = esc_attr( get_theme_mod( 'agama_frontpage_box_1_animation_delay', '200' ) );
		$box[2]['animation_delay'] = esc_attr( get_theme_mod( 'agama_frontpage_box_2_animation_delay', '400' ) );
		$box[3]['animation_delay'] = esc_attr( get_theme_mod( 'agama_frontpage_box_3_animation_delay', '600' ) );
		$box[4]['animation_delay'] = esc_attr( get_theme_mod( 'agama_frontpage_box_4_animation_delay', '800' ) );
		$box[5]['animation_delay'] = esc_attr( get_theme_mod( 'agama_frontpage_box_5_animation_delay', '1000' ) );
		$box[6]['animation_delay'] = esc_attr( get_theme_mod( 'agama_frontpage_box_6_animation_delay', '1200' ) );
		$box[7]['animation_delay'] = esc_attr( get_theme_mod( 'agama_frontpage_box_7_animation_delay', '1400' ) );
		$box[8]['animation_delay'] = esc_attr( get_theme_mod( 'agama_frontpage_box_8_animation_delay', '1600' ) );
		
		if( $box[1]['animated'] ) {
			$box[1]['data_animate']		= ' data-animate="'. $box[1]['animation'] .'" ';
			$box[1]['data_delay']		= 'data-delay="'. $box[1]['animation_delay'] .'"';
		} else {
			$box[1]['data_animate']		= '';
			$box[1]['data_delay']		= '';
		}
		if( $box[2]['animated'] ) {
			$box[2]['data_animate']		= ' data-animate="'. $box[2]['animation'] .'" ';
			$box[2]['data_delay']		= 'data-delay="'. $box[2]['animation_delay'] .'"';
		} else {
			$box[2]['data_animate']		= '';
			$box[2]['data_delay']		= '';
		}
		if( $box[3]['animated'] ) {
			$box[3]['data_animate']		= ' data-animate="'. $box[3]['animation'] .'" ';
			$box[3]['data_delay']		= 'data-delay="'. $box[3]['animation_delay'] .'"';
		} else {
			$box[3]['data_animate']		= '';
			$box[3]['data_delay']		= '';
		}
		if( $box[4]['animated'] ) {
			$box[4]['data_animate']		= ' data-animate="'. $box[4]['animation'] .'" ';
			$box[4]['data_delay']		= 'data-delay="'. $box[4]['animation_delay'] .'"';
		} else {
			$box[4]['data_animate']		= '';
			$box[4]['data_delay']		= '';
		}
		if( $box[5]['animated'] ) {
			$box[5]['data_animate']		= ' data-animate="'. $box[5]['animation'] .'" ';
			$box[5]['data_delay']		= 'data-delay="'. $box[5]['animation_delay'] .'"';
		} else {
			$box[5]['data_animate']		= '';
			$box[5]['data_delay']		= '';
		}
		if( $box[6]['animated'] ) {
			$box[6]['data_animate']		= ' data-animate="'. $box[6]['animation'] .'" ';
			$box[6]['data_delay']		= 'data-delay="'. $box[6]['animation_delay'] .'"';
		} else {
			$box[6]['data_animate']		= '';
			$box[6]['data_delay']		= '';
		}
		if( $box[7]['animated'] ) {
			$box[7]['data_animate']		= ' data-animate="'. $box[7]['animation'] .'" ';
			$box[7]['data_delay']		= 'data-delay="'. $box[7]['animation_delay'] .'"';
		} else {
			$box[7]['data_animate']		= '';
			$box[7]['data_delay']		= '';
		}
		if( $box[8]['animated'] ) {
			$box[8]['data_animate']		= ' data-animate="'. $box[8]['animation'] .'" ';
			$box[8]['data_delay']		= 'data-delay="'. $box[8]['animation_delay'] .'"';
		} else {
			$box[8]['data_animate']		= '';
			$box[8]['data_delay']		= '';
		}
	}
	
	/**
	 * Dynamic CSS
	 *
	 * @since 1.3.8
	 */
	public static function hook_css() {
		global $box;
		
		self::get_options();
		
		if( $box[1]['enabled'] && $box[1]['readmore'] || 
			$box[2]['enabled'] && $box[2]['readmore'] || 
			$box[3]['enabled'] && $box[3]['readmore'] || 
			$box[4]['enabled'] && $box[4]['readmore'] || 
			$box[5]['enabled'] && $box[5]['readmore'] || 
			$box[6]['enabled'] && $box[6]['readmore'] || 
			$box[7]['enabled'] && $box[7]['readmore'] || 
			$box[8]['enabled'] && $box[8]['readmore'] ) 
		{
			echo '<style id="agama-front-page-boxes-css" type="text/css">';
				echo '#frontpage-boxes div[class^="fbox"], #frontpage-boxes div[class*="fbox"] { text-align: center; }';
				if( $box[1]['enabled'] && $box[1]['readmore'] ) {
					echo '.fbox-1 a.button {';
						echo 'margin-top: 15px;';
					echo '}';
				}
				if( $box[2]['enabled'] && $box[2]['readmore'] ) {
					echo '.fbox-2 a.button {';
						echo 'margin-top: 15px;';
					echo '}';
				}
				if( $box[3]['enabled'] && $box[3]['readmore'] ) {
					echo '.fbox-3 a.button {';
						echo 'margin-top: 15px;';
					echo '}';
				}
				if( $box[4]['enabled'] && $box[4]['readmore'] ) {
					echo '.fbox-4 a.button {';
						echo 'margin-top: 15px;';
					echo '}';
				}
				if( $box[5]['enabled'] && $box[5]['readmore'] ) {
					echo '.fbox-5 a.button {';
						echo 'margin-top: 15px;';
					echo '}';
				}
				if( $box[6]['enabled'] && $box[6]['readmore'] ) {
					echo '.fbox-6 a.button {';
						echo 'margin-top: 15px;';
					echo '}';
				}
				if( $box[7]['enabled'] && $box[7]['readmore'] ) {
					echo '.fbox-7 a.button {';
						echo 'margin-top: 15px;';
					echo '}';
				}
				if( $box[8]['enabled'] && $box[8]['readmore'] ) {
					echo '.fbox-8 a.button {';
						echo 'margin-top: 15px;';
					echo '}';
				}
			echo '</style>';
		}
	}
	
	/**
	 * Front Page Boxes Visibility
	 *
	 * @since 1.3.8
	 */
	private static function visibility() {
		global $boxes;
		
		self::get_options();
		
		if( 
			$boxes['visibility'] == 'allpages' || 
			$boxes['visibility'] == 'homepage' && is_home() && is_front_page() || 
			$boxes['visibility'] == 'frontpage' && is_front_page()  
		) {
			return true;
		}
		return false;
	}
	
	/**
	 * Render Front Page Boxes
	 *
	 * @since 1.3.8
	 */
	private static function render() {
		global $box, $boxes, $enabled;
		
		self::get_options();
		
		if( $enabled && $boxes['1-4']['enabled'] && self::visibility() || 
			$enabled && $boxes['5-8']['enabled'] && self::visibility() ) {
			
			echo '<div class="clearfix"></div>';
			
			echo '<!-- Front Page Boxes -->';
			echo '<div id="frontpage-boxes" class="clearfix">';
				
				// Frontpage Box #1
				if( $box[1]['enabled'] ) {
					echo '<!-- Frontpage Box 1 -->';
					echo '<div class="'. $boxes['1-4']['class'] .' fbox-1"'. $box[1]['data_animate'].$box[1]['data_delay'].'>';
						if( $box[1]['icon_url'] ) {
							echo '<a href="'. $box[1]['icon_url'] .'">';
						}
                        if( is_customize_preview() ) {
                            echo '<span class="vision-fa vision-preview">';
                        }
                        if( $box[1]['icon'] ) {
                            echo $box[1]['icon'];
                        }
                        if( is_customize_preview() ) {
                            echo '</span>';
                        }
						if( $box[1]['icon_url'] ) {
							echo '</a>';
						}
						if( $box[1]['title'] ) {
							echo '<h2>'; Agama_Helper::pll_e( $box[1]['title'] ); echo '</h2>';
						}
						if( $box[1]['desc'] ) {
							echo '<p>'; Agama_Helper::pll_e( $box[1]['desc'] ); echo '</p>';
						}
						if( $box[1]['readmore'] ) {
                            if( is_customize_preview() ) {
                                echo '<span class="vision-fbox-button vision-preview">';
                            }
							echo '<a href="'. $box[1]['readmore_url'] .'" class="button button-small button-rounded button-reveal button-border tright">';
								echo '<i class="fa fa-link"></i> ';
								echo '<span>'; Agama_Helper::pll_e( $box[1]['readmore_title'] ); echo '</span>';
							echo '</a>';
                            if( is_customize_preview() ) {
                                echo '</span>';   
                            }
						}
					echo '</div><!-- Frontpage Box 1 End -->';
				}
				
				// Frontpage Box #2
				if( $box[2]['enabled'] ) {
					echo '<!-- Frontpage Box 2 -->';
					echo '<div class="'. $boxes['1-4']['class'] .' fbox-2"'. $box[2]['data_animate'].$box[2]['data_delay'].'>';
						if( $box[2]['icon_url'] ) {
							echo '<a href="'. $box[2]['icon_url'] .'">';
						}
                        if( is_customize_preview() ) {
                            echo '<span class="vision-fa vision-preview">';
                        }
						if( $box[2]['icon'] ) {
							echo $box[2]['icon'];
						}
                        if( is_customize_preview() ) {
                            echo '</span>';
                        }
						if( $box[2]['icon_url'] ) {
							echo '</a>';
						}
						if( $box[2]['title'] ) {
							echo '<h2>'; Agama_Helper::pll_e( $box[2]['title'] ); echo '</h2>';
						}
						if( $box[2]['desc'] ) {
							echo '<p>'; Agama_Helper::pll_e( $box[2]['desc'] ); echo '</p>';
						}
						if( $box[2]['readmore'] ) {
                            if( is_customize_preview() ) {
                                echo '<span class="vision-fbox-button vision-preview">';
                            }
							echo '<a href="'. $box[2]['readmore_url'] .'" class="button button-small button-rounded button-reveal button-border tright">';
								echo '<i class="fa fa-link"></i> ';
								echo '<span>'; Agama_Helper::pll_e( $box[2]['readmore_title'] ); echo '</span>';
							echo '</a>';
                            if( is_customize_preview() ) {
                                echo '</span>';
                            }
						}
					echo '</div><!-- Frontpage Box 2 End -->';
				}
				
				// Frontpage Box #3
				if( $box[3]['enabled'] ) {
					echo '<!-- Frontpage Box 3 -->';
					echo '<div class="'. $boxes['1-4']['class'] .' fbox-3"'. $box[3]['data_animate'].$box[3]['data_delay'].'>';
						if( $box[3]['icon_url'] ) {
							echo '<a href="'. $box[3]['icon_url'] .'">';
						}
                        if( is_customize_preview() ) {
                            echo '<span class="vision-fa vision-preview">';
                        }
						if( $box[3]['icon'] ) {
							echo $box[3]['icon'];
						}
                        if( is_customize_preview() ) {
                            echo '</span>';
                        }
						if( $box[3]['icon_url'] ) {
							echo '</a>';
						}
						if( $box[3]['title'] ) {
							echo '<h2>'; Agama_Helper::pll_e( $box[3]['title'] ); echo '</h2>';
						}
						if( $box[3]['desc'] ) {
							echo '<p>'; Agama_Helper::pll_e( $box[3]['desc'] ); echo '</p>';
						}
						if( $box[3]['readmore'] ) {
                            if( is_customize_preview() ) {
                                echo '<span class="vision-fbox-button vision-preview">';
                            }
							echo '<a href="'. $box[3]['readmore_url'] .'" class="button button-small button-rounded button-reveal button-border tright">';
								echo '<i class="fa fa-link"></i> ';
								echo '<span>'; Agama_Helper::pll_e( $box[3]['readmore_title'] ); echo '</span>';
							echo '</a>';
                            if( is_customize_preview() ) {
                                echo '</span>';
                            }
						}
					echo '</div><!-- Frontpage Box 3 End -->';
				}
				
				// Frontpage Box #4
				if( $box[4]['enabled'] ) {
					echo '<!-- Frontpage Box 4 -->';
					echo '<div class="'. $boxes['1-4']['class'] .' fbox-4"'. $box[4]['data_animate'].$box[4]['data_delay'].'>';
						if( $box[4]['icon_url'] ) {
							echo '<a href="'. $box[4]['icon_url'] .'">';
						}
                        if( is_customize_preview() ) {
                            echo '<span class="vision-fa vision-preview">';
                        }
						if( $box[4]['icon'] ) {
							echo $box[4]['icon'];
						}
                        if( is_customize_preview() ) {
                            echo '</span>';
                        }
						if( $box[4]['icon_url'] ) {
							echo '</a>';
						}
						if( $box[4]['title'] ) {
							echo '<h2>'; Agama_Helper::pll_e( $box[4]['title'] ); echo '</h2>';
						}
						if( $box[4]['desc'] ) {
							echo '<p>'; Agama_Helper::pll_e( $box[4]['desc'] ); echo '</p>';
						}
						if( $box[4]['readmore'] ) {
                            if( is_customize_preview() ) {
                                echo '<span class="vision-fbox-button vision-preview">';
                            }
							echo '<a href="'. $box[4]['readmore_url'] .'" class="button button-small button-rounded button-reveal button-border tright">';
								echo '<i class="fa fa-link"></i> ';
								echo '<span>'; Agama_Helper::pll_e( $box[4]['readmore_title'] ); echo '</span>';
							echo '</a>';
                            if( is_customize_preview() ) {
                                echo '</span>';
                            }
						}
					echo '</div><!-- Frontpage Box 4 End -->';
				}
				
				// Divide second row of front page boxes.
				if( $boxes['5-8']['enabled'] ) {
					echo '<div class="clearfix" style="margin-bottom: 65px;"></div>';
					echo '<!-- Second Row Front Page Boxes -->';
				}
				
				// Frontpage Box #5
				if( $box[5]['enabled'] ) {
					echo '<!-- Frontpage Box 5 -->';
					echo '<div class="'. $boxes['5-8']['class'] .' fbox-5"'. $box[5]['data_animate'].$box[5]['data_delay'].'>';
						if( $box[5]['icon_url'] ) {
							echo '<a href="'. $box[5]['icon_url'] .'">';
						}
                        if( is_customize_preview() ) {
                            echo '<span class="vision-fa vision-preview">';
                        }
						if( $box[5]['icon'] ) {
							echo $box[5]['icon'];
						}
                        if( is_customize_preview() ) {
                            echo '</span>';
                        }
						if( $box[5]['icon_url'] ) {
							echo '</a>';
						}
						if( $box[5]['title'] ) {
							echo '<h2>'; Agama_Helper::pll_e( $box[5]['title'] ); echo '</h2>';
						}
						if( $box[5]['desc'] ) {
							echo '<p>'; Agama_Helper::pll_e( $box[5]['desc'] ); echo '</p>';
						}
						if( $box[5]['readmore'] ) {
                            if( is_customize_preview() ) {
                                echo '<span class="vision-fbox-button vision-preview">';
                            }
							echo '<a href="'. $box[5]['readmore_url'] .'" class="button button-small button-rounded button-reveal button-border tright">';
								echo '<i class="fa fa-link"></i> ';
								echo '<span>'; Agama_Helper::pll_e( $box[5]['readmore_title'] ); echo '</span>';
							echo '</a>';
                            if( is_customize_preview() ) {
                                echo '</span>';
                            }
						}
					echo '</div><!-- Frontpage Box 5 End -->';
				}
				
				// Frontpage Box #6
				if( $box[6]['enabled'] ) {
					echo '<!-- Frontpage Box 6 -->';
					echo '<div class="'. $boxes['5-8']['class'] .' fbox-6"'. $box[6]['data_animate'].$box[6]['data_delay'].'>';
						if( $box[6]['icon_url'] ) {
							echo '<a href="'. $box[6]['icon_url'] .'">';
						}
                        if( is_customize_preview() ) {
                            echo '<span class="vision-fa vision-preview">';
                        }
						if( $box[6]['icon'] ) {
							echo $box[6]['icon'];
						}
                        if( is_customize_preview() ) {
                            echo '</span>';
                        }
						if( $box[6]['icon_url'] ) {
							echo '</a>';
						}
						if( $box[6]['title'] ) {
							echo '<h2>'; Agama_Helper::pll_e( $box[6]['title'] ); echo '</h2>';
						}
						if( $box[6]['desc'] ) {
							echo '<p>'; Agama_Helper::pll_e( $box[6]['desc'] ); echo '</p>';
						}
						if( $box[6]['readmore'] ) {
                            if( is_customize_preview() ) {
                                echo '<span class="vision-fbox-button vision-preview">';
                            }
							echo '<a href="'. $box[6]['readmore_url'] .'" class="button button-small button-rounded button-reveal button-border tright">';
								echo '<i class="fa fa-link"></i> ';
								echo '<span>'; Agama_Helper::pll_e( $box[6]['readmore_title'] ); echo '</span>';
							echo '</a>';
                            if( is_customize_preview() ) {
                                echo '</span>';
                            }
						}
					echo '</div><!-- Frontpage Box 6 End -->';
				}
				
				// Frontpage Box #7
				if( $box[7]['enabled'] ) {
					echo '<!-- Frontpage Box 7 -->';
					echo '<div class="'. $boxes['5-8']['class'] .' fbox-7"'. $box[7]['data_animate'].$box[7]['data_delay'].'>';
						if( $box[7]['icon_url'] ) {
							echo '<a href="'. $box[7]['icon_url'] .'">';
						}
                        if( is_customize_preview() ) {
                            echo '<span class="vision-fa vision-preview">';
                        }
						if( $box[7]['icon'] ) {
							echo $box[7]['icon'];
						}
                        if( is_customize_preview() ) {
                            echo '</span>';
                        }
						if( $box[7]['icon_url'] ) {
							echo '</a>';
						}
						if( $box[7]['title'] ) {
							echo '<h2>'; Agama_Helper::pll_e( $box[7]['title'] ); echo '</h2>';
						}
						if( $box[7]['desc'] ) {
							echo '<p>'; Agama_Helper::pll_e( $box[7]['desc'] ); echo '</p>';
						}
						if( $box[7]['readmore'] ) {
                            if( is_customize_preview() ) {
                                echo '<span class="vision-fbox-button vision-preview">';
                            }
							echo '<a href="'. $box[7]['readmore_url'] .'" class="button button-small button-rounded button-reveal button-border tright">';
								echo '<i class="fa fa-link"></i> ';
								echo '<span>'; Agama_Helper::pll_e( $box[7]['readmore_title'] ); echo '</span>';
							echo '</a>';
                            if( is_customize_preview() ) {
                                echo '</span>';
                            }
						}
					echo '</div><!-- Frontpage Box 7 End -->';
				}
				
				// Frontpage Box #8
				if( $box[8]['enabled'] ) {
					echo '<!-- Frontpage Box 8 -->';
					echo '<div class="'. $boxes['5-8']['class'] .' fbox-8"'. $box[8]['data_animate'].$box[8]['data_delay'].'>';
						if( $box[8]['icon_url'] ) {
							echo '<a href="'. $box[8]['icon_url'] .'">';
						}
                        if( is_customize_preview() ) {
                            echo '<span class="vision-fa vision-preview">';
                        }
						if( $box[8]['icon'] ) {
							echo $box[8]['icon'];
						}
                        if( is_customize_preview() ) {
                            echo '</span>';
                        }
						if( $box[8]['icon_url'] ) {
							echo '</a>';
						}
						if( $box[8]['title'] ) {
							echo '<h2>'; Agama_Helper::pll_e( $box[8]['title'] ); echo '</h2>';
						}
						if( $box[8]['desc'] ) {
							echo '<p>'; Agama_Helper::pll_e( $box[8]['desc'] ); echo '</p>';
						}
						if( $box[8]['readmore'] ) {
                            if( is_customize_preview() ) {
                                echo '<span class="vision-fbox-button vision-preview">';
                            }
							echo '<a href="'. $box[8]['readmore_url'] .'" class="button button-small button-rounded button-reveal button-border tright">';
								echo '<i class="fa fa-link"></i> ';
								echo '<span>'; Agama_Helper::pll_e( $box[8]['readmore_title'] ); echo '</span>';
							echo '</a>';
                            if( is_customize_preview() ) {
                                echo '</span>';
                            }
						}
					echo '</div><!-- Frontpage Box 8 End -->';
				}
				
			echo '</div><!-- Front Page Boxes End -->';
		}
	}
	
}
add_action( 'wp_head', array( 'Agama_Front_Page_Boxes', 'hook_css' ) );

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
