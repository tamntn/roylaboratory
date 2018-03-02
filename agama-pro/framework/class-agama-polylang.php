<?php

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register PolyLang Strings for Translation
 *
 * @since 1.3.6.10
 */
if( function_exists( 'pll_register_string' ) ) {
	add_action( 'admin_init', 'agama_register_polylang_strings' );
	function agama_register_polylang_strings() {
		pll_register_string( 'Frontpage Box #1 Title', get_theme_mod( 'agama_frontpage_box_1_title', __( 'Responsive Layout', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #2 Title', get_theme_mod( 'agama_frontpage_box_2_title', __( 'Endless Possibilities', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #3 Title', get_theme_mod( 'agama_frontpage_box_3_title', __( 'Boxed & Wide Layouts', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #4 Title', get_theme_mod( 'agama_frontpage_box_4_title', __( 'Powerful Performance', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #5 Title', get_theme_mod( 'agama_frontpage_box_5_title', __( 'Powerful Performance', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #6 Title', get_theme_mod( 'agama_frontpage_box_6_title', __( 'Boxed & Wide Layouts', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #7 Title', get_theme_mod( 'agama_frontpage_box_7_title', __( 'Endless Possibilities', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #8 Title', get_theme_mod( 'agama_frontpage_box_8_title', __( 'Responsive Layout', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #1 Text', get_theme_mod( 'agama_frontpage_box_1_text', __( 'Powerful Layout with Responsive functionality that can be adapted to any screen size.', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #2 Text', get_theme_mod( 'agama_frontpage_box_2_text', __( 'Complete control on each & every element that provides endless customization possibilities.', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #3 Text', get_theme_mod( 'agama_frontpage_box_3_text', __( 'Stretch your Website to the Full Width or make it boxed to surprise your visitors.', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #4 Text', get_theme_mod( 'agama_frontpage_box_4_text', __( 'Optimized code that are completely customizable and deliver unmatched fast performance.', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #5 Text', get_theme_mod( 'agama_frontpage_box_5_text', __( 'Optimized code that are completely customizable and deliver unmatched fast performance.', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #6 Text', get_theme_mod( 'agama_frontpage_box_6_text', __( 'Stretch your Website to the Full Width or make it boxed to surprise your visitors.', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #7 Text', get_theme_mod( 'agama_frontpage_box_7_text', __( 'Complete control on each & every element that provides endless customization possibilities.', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #8 Text', get_theme_mod( 'agama_frontpage_box_8_text', __( 'Powerful Layout with Responsive functionality that can be adapted to any screen size.', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #1 Button', get_theme_mod( 'agama_frontpage_box_1_readmore_txt', __( 'Read More', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #2 Button', get_theme_mod( 'agama_frontpage_box_2_readmore_txt', __( 'Read More', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #3 Button', get_theme_mod( 'agama_frontpage_box_3_readmore_txt', __( 'Read More', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #4 Button', get_theme_mod( 'agama_frontpage_box_4_readmore_txt', __( 'Read More', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #5 Button', get_theme_mod( 'agama_frontpage_box_5_readmore_txt', __( 'Read More', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #6 Button', get_theme_mod( 'agama_frontpage_box_6_readmore_txt', __( 'Read More', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #7 Button', get_theme_mod( 'agama_frontpage_box_7_readmore_txt', __( 'Read More', 'agama-pro' ) ), 'agama-pro' );
		pll_register_string( 'Frontpage Box #8 Button', get_theme_mod( 'agama_frontpage_box_8_readmore_txt', __( 'Read More', 'agama-pro' ) ), 'agama-pro' );
	}
}

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
