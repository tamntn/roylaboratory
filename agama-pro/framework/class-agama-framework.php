<?php
/**
 * @author    ThemeVision <support@theme-vision.com>
 * @link      https://www.theme-vision.com
 * @copyright ThemeVision
 */

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Agama Framework Class
 *
 * @since 1.0.1
 * @updated @since 1.3.8
 */
class Agama_Framework {
	
	/**
	 * Class Constructor
	 *
	 * @since 1.3.8
	 */
	public function __construct() {
		
		
		add_action( 'tgmpa_register', array( $this, 'register_required_plugins' ) );
		
		self::get_template_parts();
		
	}
	
	/**
	 * Get Template Parts
	 *
	 * @since 1.3.8
	 */
	private static function get_template_parts() {
		get_template_part( 'framework/class-agama-body-bg-animation' );
		get_template_part( 'framework/class-agama-frontpage-boxes' );
		get_template_part( 'framework/class-agama-helper' );
		get_template_part( 'framework/class-agama' );
		get_template_part( 'framework/class-agama-core' );
        get_template_part( 'framework/class-agama-demo-import' );
		get_template_part( 'framework/class-agama-preloader' );
		get_template_part( 'framework/class-agama-sliders' );
		get_template_part( 'framework/class-agama-header-image' );
		get_template_part( 'framework/class-agama-custom-header' );
		get_template_part( 'framework/class-agama-woocommerce' );
		get_template_part( 'framework/admin/admin-init' );
		get_template_part( 'framework/polylang' );
		get_template_part( 'framework/class-agama-nav-walker' );
		get_template_part( 'framework/class-agama-breadcrumb' );
		get_template_part( 'framework/frontpage-boxes' );
		get_template_part( 'framework/class-agama-plugin-activation' );
		get_template_part( 'framework/widgets/widgets' );
		get_template_part( 'framework/agama-functions' );
	}

	/**
	 * Register Required Plugins
	 *
	 * @since 1.0.1
	 */
	public function register_required_plugins() {
        $defaults = array(
            'license'  => '43383523da06d532b4e09139f303bc7f7a0fc7094eded42e85f1bfa0fa36ca3c'
        ); 
        
        $source = array();
        
        // Vision Core Plugin
        $source['vision-core'] = array(
            'url' => 'http://theme.vision/updates/?action=download&slug=vision-core&order_id=670&license=' . esc_attr( $defaults['license'] )
        );
        
        // WPBakery Page Builder Plugin
        $source['js_composer'] = array(
            'url' => 'http://theme.vision/updates/?action=download&slug=js_composer&order_id=670&license=' . esc_attr( $defaults['license'] )
        );
        
        // LayerSlider Plugin
        $source['LayerSlider'] = array(
            'url' => 'http://theme.vision/updates/?action=download&slug=LayerSlider&order_id=670&license=' . esc_attr( $defaults['license'] )
        );
        
        // Revolution Slider Plugin
        $source['revslider'] = array(
            'url' => 'http://theme.vision/updates/?action=download&slug=revslider&order_id=670&license=' . esc_attr( $defaults['license'] )
        );
        
		$plugins = array(
			array(
				'name'				 	=> 'Vision Core',
				'slug'					=> 'vision-core',
				'source'			 	=> $source['vision-core']['url'],
				'required'			 	=> true,
				'version'			 	=> '',
				'force_activation'	 	=> false,
				'force_deactivation' 	=> false,
				'image_url'				=> AGAMA_FMW_URI . 'admin/assets/img/visioncore-logo.jpg'
			),
			array(
				'name'               => 'WPBakery Page Builder',
				'slug'               => 'js_composer',
				'source'             => $source['js_composer']['url'],
				'required'           => true,
				'version'            => '',
				'force_activation'   => false,
				'force_deactivation' => false,
				'image_url'			=> AGAMA_FMW_URI . 'admin/assets/img/visualcomposer-logo.png'
			),
			array(
				'name'               => 'Layer Slider',
				'slug'               => 'LayerSlider',
				'source'             => $source['LayerSlider']['url'],
				'required'           => false,
				'version'            => '',
				'force_activation'   => false,
				'force_deactivation' => false,
				'image_url'			 => AGAMA_FMW_URI . 'admin/assets/img/layerslider-logo.jpg'
			),
			array(
				'name'               => 'Revolution Slider',
				'slug'               => 'revslider',
				'source'             => $source['revslider']['url'],
				'required'           => false,
				'version'            => '',
				'force_activation'   => false,
				'force_deactivation' => false,
				'image_url'			 => AGAMA_FMW_URI . 'admin/assets/img/revslider-logo.jpg'
			),
		);

		$config = array(
            'id'           => 'agama-pro',
			'default_path' => '',
			'menu'         => 'tgmpa-install-plugins',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => false,
			'message'      => '',
			'strings'      => array(
				'page_title'                      => __( 'Install Required Plugins', 'agama-pro' ),
				'menu_title'                      => __( 'Install Plugins', 'agama-pro' ),
				'installing'                      => __( 'Installing Plugin: %s', 'agama-pro' ), // %s = plugin name.
				'oops'                            => __( 'Something went wrong with the plugin API.', 'agama-pro' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
				'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
				'return'                          => __( 'Return to Required Plugins Installer', 'agama-pro' ),
				'plugin_activated'                => __( 'Plugin activated successfully.', 'agama-pro' ),
				'complete'                        => __( 'All plugins installed and activated successfully. %s', 'agama-pro' ), // %s = dashboard link.
				'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
			)
		);
		tgmpa( $plugins, $config );
	}
}

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
