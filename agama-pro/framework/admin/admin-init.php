<?php

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Load All Necessary Admin Files
 *
 * @since 1.3.5
 */
get_template_part( 'framework/admin/options-migrate' );
get_template_part( 'framework/admin/class-agama-animate' );
get_template_part( 'framework/admin/class-agama-choices' );
get_template_part( 'framework/admin/kirki/kirki' );
get_template_part( 'framework/admin/customizer' );
get_template_part( 'framework/admin/class-agama-metaboxes' );

/**
 * Checks if Vision Core Plugin is Installed
 * - If not installed send notice to admin users.
 *
 * @since 1.3.5
 */
class Agama_VisionCore {
	public static function init() {
		if( is_admin() && ! is_plugin_active( 'vision-core/vision-core.php' ) ) {
			
			self::notice();
			
		}
	}
	public static function notice() {
		$html = '<div class="notice notice-warning">';
			$html .= sprintf( 
				'<p><strong>%s</strong> %s %s <a href="%s">%s</a>', 
				__( 'Vision Core', 'agama-pro' ), 
				__( 'plugin is not active or installed ! All themes from theme-vision.com must have enabled Vision Core plugin.', 'agama-pro' ),
				__( 'Theme updates, shortcodes & portfolio features are disabled!', 'agama-pro' ),
				admin_url( 'themes.php?page=tgmpa-install-plugins' ), __( 'Activate or Install Vision Core Plugin', 'agama-pro' ) 
			);
		$html .= '</div>';
		
		echo $html;
	}
}
add_action( 'admin_notices', array( 'Agama_VisionCore', 'init' ) );

/**
 * Checks if Agama theme is Registered
 * - If not send notice to admin users.
 * 
 * @since 1.3.5
 */
class Agama_is_Registered {
	public static function init() {
		if( is_admin() && ! get_option( 'vision_license' ) && is_plugin_active( 'vision-core/vision-core.php' ) ) {
			
			self::notice();
			
		}
	}
	public static function notice() {
		$html = '<div class="notice notice-warning">';
			$html .= sprintf(
				'<p>%s <a href="%s">%s</a></p>',
				__( 'Agama Pro theme is not registered! Automatic theme & bundled plugins updates are disabled!', 'agama-pro' ),
				admin_url( 'admin.php?page=vision-product' ),
				__( 'Register Agama Pro Theme', 'agama-pro' )
			);
		$html .= '</div>';
		
		echo $html;
	}
}
add_action( 'admin_notices', array( 'Agama_is_Registered', 'init' ) );

/* Omit closing PHP tag to avoid "Headers already sent" issues. */

