<?php

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

################################################################
# Animate Return Options | @since 1.2.0 | using in customizer
################################################################
if( ! class_exists( 'AgamaAnimate' ) ) {
	class AgamaAnimate {
		static function choices() {
			return array(
				'bounce'				=> __( 'Bounce', 'agama-pro' ),
				'flash'					=> __( 'Flash', 'agama-pro' ),
				'pulse'					=> __( 'Pulse', 'agama-pro' ),
				'rubberBand'			=> __( 'Rubber Band', 'agama-pro' ),
				'shake'					=> __( 'Shake', 'agama-pro' ),
				'swing'					=> __( 'Swing', 'agama-pro' ),
				'tada'					=> __( 'Tada', 'agama-pro' ),
				'wobble'				=> __( 'Wobble', 'agama-pro' ),
				'jello'					=> __( 'Jello', 'agama-pro' ),
				'bounceIn'				=> __( 'Bounce In', 'agama-pro' ),
				'bounceInDown'			=> __( 'Bounce In Down', 'agama-pro' ),
				'bounceInLeft'			=> __( 'Bounce In Left', 'agama-pro' ),
				'bounceInRight'			=> __( 'Bounce In Right', 'agama-pro' ),
				'bounceInUp'			=> __( 'Bounce In Up', 'agama-pro' ),
				'bounceOut'				=> __( 'Bounce Out', 'agama-pro' ),
				'bounceOutDown'			=> __( 'Bounce Out Down', 'agama-pro' ),
				'bounceOutLeft'			=> __( 'Bounce Out Left', 'agama-pro' ),
				'bounceOutRight'		=> __( 'Bounce Out Right', 'agama-pro' ),
				'bounceOutUp'			=> __( 'Bounce Out Up', 'agama-pro' ),
				'fadeIn'				=> __( 'Fade In', 'agama-pro' ),
				'fadeInDown'			=> __( 'Fade In Down', 'agama-pro' ),
				'fadeInDownBig'			=> __( 'Fade In Down Big', 'agama-pro' ),
				'fadeInLeft'			=> __( 'Fade In Left', 'agama-pro' ),
				'fadeInLeftBig'			=> __( 'Fade In Left Big', 'agama-pro' ),
				'fadeInRight'			=> __( 'Fade In Right', 'agama-pro' ),
				'fadeInRightBig'		=> __( 'Fade In Right Big', 'agama-pro' ),
				'fadeInUp'				=> __( 'Fade In Up', 'agama-pro' ),
				'fadeInUpBig'			=> __( 'Fade In Up Big', 'agama-pro' ),
				'fadeOut'				=> __( 'Fade Out', 'agama-pro' ),
				'fadeOutDown'			=> __( 'Fade Out Down', 'agama-pro' ),
				'fadeOutDownBig'		=> __( 'Fade Out Down Big', 'agama-pro' ),
				'fadeOutLeft'			=> __( 'Fade Out Left', 'agama-pro' ),
				'fadeOutLeftBig'		=> __( 'Fade Out Left Big', 'agama-pro' ),
				'fadeOutRight'			=> __( 'Fade Out Right', 'agama-pro' ),
				'fadeOutRightBig'		=> __( 'Fade Out Right Big', 'agama-pro' ),
				'fadeOutUp'				=> __( 'Fade Out Up', 'agama-pro' ),
				'fadeOutUpBig'			=> __( 'Fade Out Up Big', 'agama-pro' ),
				'flip'					=> __( 'Flip', 'agama-pro' ),
				'flipInX'				=> __( 'Flip In X', 'agama-pro' ),
				'flipInY'				=> __( 'Flip In Y', 'agama-pro' ),
				'flipOutX'				=> __( 'Flip Out X', 'agama-pro' ),
				'flipOutY'				=> __( 'Flip Out Y', 'agama-pro' ),
				'lightSpeedIn'			=> __( 'Light Speed In', 'agama-pro' ),
				'lightSpeedOut'			=> __( 'Light Speed Out', 'agama-pro' ),
				'rotateIn'				=> __( 'Rotate In', 'agama-pro' ),
				'rotateInDownLeft'		=> __( 'Rotate In Down Left', 'agama-pro' ),
				'rotateInDownRight'		=> __( 'Rotate In Down Right', 'agama-pro' ),
				'rotateInUpLeft'		=> __( 'Rotate In Up Left', 'agama-pro' ),
				'rotateInUpRight'		=> __( 'Rotate In Up Right', 'agama-pro' ),
				'rotateOut'				=> __( 'Rotate Out', 'agama-pro' ),
				'rotateOutDownLeft'		=> __( 'Rotate Out Down Left', 'agama-pro' ),
				'rotateOutDownRight'	=> __( 'Rotate Out Down Right', 'agama-pro' ),
				'rotateOutUpLeft'		=> __( 'Rotate Out Up Left', 'agama-pro' ),
				'rotateOutUpRight'		=> __( 'Rotate Out Up Right', 'agama-pro' ),
				'slideInUp'				=> __( 'Slide In Up', 'agama-pro' ),
				'slideInDown'			=> __( 'Slide In Down', 'agama-pro' ),
				'slideInLeft'			=> __( 'Slide In Left', 'agama-pro' ),
				'slideInRight'			=> __( 'Slide In Right', 'agama-pro' ),
				'slideOutUp'			=> __( 'Slide Out Up', 'agama-pro' ),
				'slideOutDown'			=> __( 'Slide Out Down', 'agama-pro' ),
				'slideOutLeft'			=> __( 'Slide Out Left', 'agama-pro' ),
				'slideOutRight'			=> __( 'Slide Out Right', 'agama-pro' ),
				'zoomIn'				=> __( 'Zoom In', 'agama-pro' ),
				'zoomInDown'			=> __( 'Zoom In Down', 'agama-pro' ),
				'zoomInLeft'			=> __( 'Zoom In Left', 'agama-pro' ),
				'zoomInRight'			=> __( 'Zoom In Right', 'agama-pro' ),
				'zoomInUp'				=> __( 'Zoom In Up', 'agama-pro' ),
				'zoomOut'				=> __( 'Zoom Out', 'agama-pro' ),
				'zoomOutDown'			=> __( 'Zoom Out Down', 'agama-pro' ),
				'zoomOutLeft'			=> __( 'Zoom Out Left', 'agama-pro' ),
				'zoomOutRight'			=> __( 'Zoom Out Right', 'agama-pro' ),
				'zoomOutUp'				=> __( 'Zoom Out Up', 'agama-pro' ),
				'hinge'					=> __( 'Hinge', 'agama-pro' ),
				'rollIn'				=> __( 'Roll In', 'agama-pro' ),
				'rollOut'				=> __( 'Roll Out', 'agama-pro' ) 
			); 
		}
	}
}