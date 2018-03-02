<?php

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

#####################################################################
# AGAMA CHOICES CLASS | used in Kirki | @since 1.3.0
#####################################################################
if( ! class_exists( 'AgamaChoice' ) ) {
	class AgamaChoice {
		
		/**
		 * Return All Pages
		 *
		 * @since 1.3.0
		 * @return array
		 */
		static function pages() {
			$pages = get_pages();
			if( is_array( $pages ) ) {
				foreach( $pages as $page ) {
					$output[$page->ID] = $page->post_title; 
				}
			}
			if( is_admin() ) {
				return $output;
			}
		}
	}
}