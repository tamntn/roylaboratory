<?php

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Agama Metaboxes
 *
 * @since agama v1.0.1
 */
class Agama_Metaboxes {

	/**
	 * Class constructor
	 *
	 * @since Agama v1.0.1
	 */
	public function __construct() {
        if( ! is_admin() ) {
            return;
        }
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}
    
    /**
     * Enqueue Meta Box Styles & Scripts
     *
     * @since 1.3.9.3
     */
    function admin_enqueue_scripts() {
         wp_enqueue_media();
        // Enqueue Modernizr custom build jQuery.
        wp_register_script( 'agama-modernizr-custom', AGAMA_ADMIN_DIR_URI . 'js/modernizr.custom.js', array(), Agama_Core::version() );
        wp_enqueue_script( 'agama-modernizr-custom' );
        // Enqueue Meta Box jQuery.
        wp_register_script( 'agama-meta-box', AGAMA_ADMIN_DIR_URI . 'js/meta-boxes.js', array(),  Agama_Core::version(), true );
        wp_enqueue_script( 'agama-meta-box' );
        // Enqueue Meta Box styles stylesheet file.
        wp_register_style( 'agama-meta-box-styles', AGAMA_ADMIN_DIR_URI . 'css/meta-boxes-styles.css', array(), Agama_Core::version() );
        wp_enqueue_style( 'agama-meta-box-styles' );
        // Enqueue Meta Box stylesheet.
        wp_register_style( 'agama-meta-box', AGAMA_ADMIN_DIR_URI . 'css/meta-boxes.css', array(),  Agama_Core::version() );
        wp_enqueue_style( 'agama-meta-box' );
    }

	/**
	 * Adds the meta box container.
	 *
	 * @since Agama v1.0.1
	 */
	public function add_meta_box( $post_type ) {
		add_meta_box(
			'agama_options_metabox',
			__( 'Agama Options', 'agama-pro' ),
			array( $this, 'render_meta_box_content' ),
			$post_type,
			'advanced',
			'high'
		);
	}
	
	/**
	 * Get Post or Page Meta
	 *
	 * @since 1.3.8
	 */
	private function get_meta( $meta_key, $default = false, $post_id = false ) {
		global $post;
		
		// If post id is not set, get it from global $post object.
		if( ! $post_id && ! empty( $post->ID ) ) {
			$post_id = $post->ID;
		}
		
		// If default value set & there is no meta_key in post meta, return default
		if( ! empty( $default ) && ! get_post_meta( $post_id, $meta_key, true ) ) {
			return $default;
		} else {
			return get_post_meta( $post_id, $meta_key, true );
		}
	}

	/**
	 * Save the meta when the post is saved.
	 *
	 * @param int $post_id The ID of the post being saved.
	 * @since Agama v1.0.1
	 */
	public function save( $post_id ) {

		/*
		 * We need to verify this came from the our screen and with proper authorization,
		 * because save_post can be triggered at other times.
		 */

		// Check if our nonce is set.
		if ( ! isset( $_POST['agama_options_nonce'] ) )
			return $post_id;

		$nonce = $_POST['agama_options_nonce'];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, 'agama_options' ) )
			return $post_id;

		// If this is an autosave, our form has not been submitted,
                //     so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		// Check the user's permissions.
		if ( 'page' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		/* OK, its safe for us to save the data now. */

		// Sanitize and prepare options for saving into database.
		$options = array();

		// Portfolio article, created by input field.
		if( isset( $_POST['_agama_pt_created_by'] ) && ! empty( $_POST['_agama_pt_created_by'] ) ) {
			$option['_agama_pt_created_by'] = esc_attr( $_POST['_agama_pt_created_by'] );
			$options = array_merge( $options, $option );
		}

		// Portfolio article, completed on input field.
		if( isset( $_POST['_agama_pt_completed_on'] ) && ! empty( $_POST['_agama_pt_completed_on'] ) ) {
			$option['_agama_pt_completed_on'] = esc_attr( $_POST['_agama_pt_completed_on'] );
			$options = array_merge( $options, $option );
		}

		// Portfolio article, project url input field.
		if( isset( $_POST['_agama_pt_project_url'] ) && ! empty( $_POST['_agama_pt_project_url'] ) ) {
			$option['_agama_pt_project_url'] = esc_url_raw( $_POST['_agama_pt_project_url'] );
			$options = array_merge( $options, $option );
		}

		// Portfolio article, project url text input field. <a href="">Text</a>
		if( isset( $_POST['_agama_pt_project_url_txt'] ) && ! empty( $_POST['_agama_pt_project_url_txt'] ) ) {
			$option['_agama_pt_project_url_txt'] = sanitize_text_field( $_POST['_agama_pt_project_url_txt'] );
			$options = array_merge( $options, $option );
		}
        
        // Portfolio article, project embed video.
        if( isset( $_POST['_agama_pt_video'] ) ) {
            $option['_agama_pt_video'] = $_POST['_agama_pt_video'];
            $options = array_merge( $options, $option );
        }
        
        // Posts - Page - custom logo.
        if( isset( $_POST['_agama_custom_logo'] ) ) {
            $option['_agama_custom_logo'] = esc_attr( $_POST['_agama_custom_logo'] );
            $options = array_merge( $options, $option );
        }

		// Posts || Pages - enable slider.
		if( isset( $_POST['_agama_enable_slider'] ) && ! empty( $_POST['_agama_enable_slider'] ) ) {
			$option['_agama_enable_slider'] = esc_attr( $_POST['_agama_enable_slider'] );
			$options = array_merge( $options, $option );
		}

		// Posts || Pages - slider type.
		if( isset( $_POST['_agama_slider_type'] ) && ! empty( $_POST['_agama_slider_type'] ) ) {
			$option['_agama_slider_type'] = sanitize_text_field( $_POST['_agama_slider_type'] );
			$options = array_merge( $options, $option );
		}

		// Posts || Pages - select slider from layer slider sliders.
		if( isset( $_POST['_layer_slider'] ) && ! empty( $_POST['_layer_slider'] ) ) {
			$option['_layer_slider'] = esc_attr( $_POST['_layer_slider'] );
			$options = array_merge( $options, $option );
		}

		// Posts || Pages - select slider from revolution slider sliders.
		if( isset( $_POST['_revolution_slider'] ) && ! empty( $_POST['_revolution_slider'] ) ) {
			$option['_revolution_slider'] = esc_attr( $_POST['_revolution_slider'] );
			$options = array_merge( $options, $option );
		}
		
		// Posts || Pages - Breadcrumb enable / disable.
		if( isset( $_POST['_agama_breadcrumb'] ) ) {
			$option['_agama_breadcrumb'] = esc_attr( $_POST['_agama_breadcrumb'] );
			$options = array_merge( $options, $option );
		}
		
		// Posts || Pages - Breadcrum custom title.
		if( isset( $_POST['_agama_breadcrumb_title'] ) ) {
			$option['_agama_breadcrumb_title'] = esc_attr( $_POST['_agama_breadcrumb_title'] );
			$options = array_merge( $options, $option );
		}
		
		// Posts || Pages - set content top padding.
		if( isset( $_POST['_vision_row_top_padding'] ) ) {
			$option['_vision_row_top_padding'] = esc_attr( $_POST['_vision_row_top_padding'] );
			$options = array_merge( $options, $option );
		}
		
		// Posts || Pages - set content bottom padding.
		if( isset( $_POST['_vision_row_bottom_padding'] ) ) {
			$option['_vision_row_bottom_padding'] = esc_attr( $_POST['_vision_row_bottom_padding'] );
			$options = array_merge( $options, $option );
		}

		// Posts || Pages - enable / disable sidebar.
		if( isset( $_POST['_agama_enable_sidebar'] ) && ! empty( $_POST['_agama_enable_sidebar'] ) ) {
			$option['_agama_enable_sidebar'] = esc_attr( $_POST['_agama_enable_sidebar'] );
			$options = array_merge( $options, $option );
		}
		
		// Posts || Pages - enable / disable social share icons.
		if( isset( $_POST['_agama_enable_social_share'] ) && ! empty( $_POST['_agama_enable_social_share'] ) ) {
			$option['_agama_enable_social_share'] = esc_attr( $_POST['_agama_enable_social_share'] );
			$options = array_merge( $options, $option );
		}
        
        // Posts || Pages - video embed code.
        if( isset( $_POST['_agama_post_video'] ) ) {
            $option['_agama_post_video'] = $_POST['_agama_post_video'];
            $options = array_merge( $options, $option );
        }
        
		// Update post or page meta fields.
		foreach( $options as $key => $value ) {
			update_post_meta( $post_id, $key, $value );
		}
	}

	/**
	 * Render Meta Box content.
	 *
	 * @param WP_Post $post The post object.
	 * @since Agama v1.0.1
	 */
	public function render_meta_box_content( $post ) {
		$current_screen = get_current_screen();
		$portfolio_slug = esc_attr( get_theme_mod( 'agama_portfolio_page_slug', 'agama_portfolio' ) );
        
        if( $current_screen->post_type == 'post' ) {
            $tab['page_title'] = __( 'Post', 'agama-pro' );
        }
        else
        if( $current_screen->post_type == 'page' ) {
            $tab['page_title'] = __( 'Page', 'agama-pro' );
        } else {
            $tab['page_title'] = __( 'Post', 'agama-pro' );
        }
        
		// Add an nonce field so we can check for it later.
		wp_nonce_field( 'agama_options', 'agama_options_nonce' );
        
        $post_video['embed'] = '';
        if( $this->get_meta( '_agama_post_video', '' ) ) {
            $post_video['embed'] = $this->get_meta( '_agama_post_video', '' );
        }
        
		$sliders = array( 
			'none' 	=> __( 'Select Slider', 'agama-pro' ),
			'agama'	=> __( 'Agama Slider', 'agama-pro' )
		);

		// Detect if LayerSlider is installed & put it into slider option array
		if( class_exists( 'LS_Sliders' ) ) {
			$slider['layer'] = __( 'Layer Slider', 'agama-pro' );
			$sliders = array_merge( $sliders, $slider );
		}
		// Detect if Revolution slider is installed & put it into slider option array
		if( class_exists( 'RevSliderAdmin' ) ) {
			$slider['revolution'] = __( 'Revolution Slider', 'agama-pro' );
			$sliders = array_merge( $sliders, $slider );
		}
        
        // Get WordPress' media upload URL
        $upload_link = esc_url( get_upload_iframe_src( 'image', $post->ID ) );
        
        // See if there's a media id already saved as post meta
        $custom_logo_img_id = get_post_meta( $post->ID, '_agama_custom_logo', true );
        
        // Get the image src
        $custom_logo_img_src = wp_get_attachment_image_src( $custom_logo_img_id, 'full' );
        
        // For convenience, see if the array is valid
        $have_custom_logo_img = is_array( $custom_logo_img_src ); ?>
        
        <!-- Agama Meta Box Wrapper -->
        <div class="agama-tabs agama-tabs-style-underline">
            <nav>
                <ul>
                    <?php if( $current_screen->post_type == $portfolio_slug ): ?>
                    <li>
                        <a href="#agama-portfolio-section" class="agama-meta-icon agama-meta-icon-portfolio"><span><?php _e( 'Portfolio', 'agama-pro' ); ?></span></a>
                    </li>
                    <?php endif; ?>
                    <li>
                        <a href="#agama-header-section" class="agama-meta-icon agama-meta-icon-browser"><span><?php _e( 'Header', 'agama-pro' ); ?></span></a>
                    </li>
                    <li>
                        <a href="#agama-post-section" class="agama-meta-icon agama-meta-icon-news-paper"><span><?php echo $tab['page_title']; ?></span></a>
                    </li>
                    <li>
                        <a href="#agama-slider-section" class="agama-meta-icon agama-meta-icon-map"><span><?php _e( 'Slider', 'agama-pro' ); ?></span></a>
                    </li>
                    <li>
                        <a href="#agama-breadcrumb-section" class="agama-meta-icon agama-meta-icon-albums"><span><?php _e( 'Breadcrumb', 'agama-pro' ); ?></span></a>
                    </li>
                </ul>
            </nav>
            <div class="agama-content-wrap">
                
                <?php if( $current_screen->post_type == $portfolio_slug ): ?>
                <!-- Portfolio Section -->
                <section id="agama-portfolio-section">
                    <p>
                    <div class="agama-row">
						<div class="agama-row-left">
							<label for="agama_pt_created_by"><?php _e( 'Created By', 'agama-pro' ); ?></label>
							<p class="description"><?php _e( 'Write portfolio author name.', 'agama-pro' ); ?></p>
						</div>
						<div class="agama-row-right">
							<input id="agama_pt_created_by" name="_agama_pt_created_by" type="text" placeholder="John Doe" value="<?php echo $this->get_meta('_agama_pt_created_by', ''); ?>">
						</div>
					</div>

					<div class="agama-row">
						<div class="agama-row-left">
							<label for="agama_pt_completed_on"><?php _e( 'Completed On', 'agama-pro' ); ?></label>
							<p class="description"><?php _e( 'Enter the date of project completion.', 'agama-pro' ); ?></p>
						</div>
						<div class="agama-row-right">
							<input id="agama_pt_completed_on" name="_agama_pt_completed_on" type="text" placeholder="31 December 2015" value="<?php echo $this->get_meta('_agama_pt_completed_on', ''); ?>">
						</div>
					</div>

					<div class="agama-row">
						<div class="agama-row-left">
							<label for="agama_pt_project_url"><?php _e( 'Project URL', 'agama-pro' ); ?></label>
							<p class="description"><?php _e( 'The URL the project text links to.', 'agama-pro' ); ?></p>
						</div>
						<div class="agama-row-right">
							<input id="agama_pt_project_url" name="_agama_pt_project_url" type="text" placeholder="http://" value="<?php echo $this->get_meta('_agama_pt_project_url', '#'); ?>">
						</div>
					</div>

					<div class="agama-row">
						<div class="agama-row-left">
							<label for="agama_pt_project_url_txt"><?php _e( 'Project URL Text', 'agama-pro' ); ?></label>
							<p class="description"><?php _e( 'The custom project text that will link.', 'agama-pro' ); ?></p>
						</div>
						<div class="agama-row-right">
							<input id="agama_pt_project_url_txt" name="_agama_pt_project_url_txt" type="text" placeholder="My Project" value="<?php echo $this->get_meta('_agama_pt_project_url_txt', 'My Project'); ?>">
						</div>
					</div>

					<div class="agama-row">
						<div class="agama-row-left">
							<label for="agama_pt_video"><?php _e( 'Video Embed Code', 'agama-pro' ); ?></label><br>
							<p class="description"><?php _e( 'Insert Youtube or Vimeo embed code.', 'agama-pro' ); ?></p>
						</div>
						<div class="agama-row-right">
							<textarea id="agama_pt_video" name="_agama_pt_video" rows="10"><?php echo $this->get_meta( '_agama_pt_video', '' ); ?></textarea>
						</div>
					</div>
                    </p>
                </section><!-- Portfolio Section End -->
                <?php endif; ?>
                
                <!-- Header Section -->
                <section id="agama-header-section">
                    <p>
                    <div class="agama-row">
                        <div class="agama-row-left">
                            <label for="agama_custom_logo"><?php _e( 'Custom Logo', 'agama-pro' ); ?></label>
                            <p class="description"><?php _e( 'Upload custom logo if you want different logo than on home page.', 'agama-pro' ); ?></p>
                        </div>
                        <div class="agama-row-right">
                            <?php if( $have_custom_logo_img ): ?>
                            <div class="agama_custom_logo_container">
                                <img src="<?php echo $custom_logo_img_src[0]; ?>" alt="" style="max-height:50px;">
                            </div>
                            <?php endif; ?>
                            <a class="agama-upload-custom-logo <?php if ( $have_custom_logo_img  ) { echo 'hidden'; } ?> button" href="<?php echo $upload_link; ?>">
                                <?php _e( 'Upload Logo', 'agama-pro' ); ?>
                            </a>
                            <a class="agama-delete-custom-logo <?php if ( ! $have_custom_logo_img  ) { echo 'hidden'; } ?> button" href="#">
                                <?php _e( 'Remove Logo', 'agama-pro' ); ?>
                            </a>
                            <input class="agama-custom-logo" name="_agama_custom_logo" type="hidden" value="<?php echo esc_attr( $custom_logo_img_id ); ?>" />
                        </div>
                    </div>
                    </p>
                </section><!-- Header Section End -->
                
                <!-- Post - Page Section -->
                <section id="agama-post-section">
                    <p>
					<div class="agama-row">
						<div class="agama-row-left">
							<label for="agama_content_padding"><?php _e( 'Page Content Padding', 'agama-pro' ); ?></label>
							<p class="description"><?php _e( 'In pixels. Leave empty for default value of 50px, 50px. Example: 20px', 'agama-pro' ); ?></p>
						</div>
						<div class="agama-row-right">
							<div class="vision-dimension">
								<span class="vision-input-icon">
									<i class="dashicons dashicons-arrow-up-alt"></i>
								</span>
								<input id="agama_content_padding" type="text" name="_vision_row_top_padding" value="<?php echo esc_attr( $this->get_meta('_vision_row_top_padding', '') ); ?>">
							</div>
							<div class="vision-dimension">
								<span class="vision-input-icon">
									<i class="dashicons dashicons-arrow-down-alt"></i>
								</span>
								<input type="text" name="_vision_row_bottom_padding" value="<?php echo esc_attr( $this->get_meta('_vision_row_bottom_padding', '') ); ?>">
							</div>
						</div>
					</div>
					<div class="agama-row">
						<div class="agama-row-left">
							<label for="agama_enable_sidebar"><?php _e( 'Enable Sidebar', 'agama-pro' ); ?></label>
							<p class="description"><?php _e( 'You can disable sidebar for this post / page.', 'agama-pro' ); ?></p>
						</div>
						<div class="agama-row-right">
							<select id="agama_enable_sidebar" name="_agama_enable_sidebar">
								<option value="on" <?php selected( 'on', $this->get_meta('_agama_enable_sidebar', 'on' ), true ); ?>><?php _e( 'Enable', 'agama-pro' ); ?></option>
								<option value="off" <?php selected( 'off', $this->get_meta('_agama_enable_sidebar', 'on' ), true ); ?>><?php _e( 'Disable', 'agama-pro' ); ?></option>
							</select>
						</div>
					</div>
					<div class="agama-row">
						<div class="agama-row-left">
							<label for="agama_enable_social_share"><?php _e( 'Enable Social Share', 'agama-pro' ); ?></label>
							<p class="description"><?php _e( 'You can disable social share icons for this post / page.', 'agama-pro' ); ?></p>
						</div>
						<div class="agama-row-right">
							<select id="agama_enable_social_share" name="_agama_enable_social_share">
								<option value="on" <?php selected( 'on', $this->get_meta('_agama_enable_social_share', 'on'), true ); ?>><?php _e( 'Enable', 'agama-pro' ); ?></option>
								<option value="off" <?php selected( 'off', $this->get_meta('_agama_enable_social_share', 'on'), true ); ?>><?php _e( 'Disable', 'agama-pro' ); ?></option>
							</select>
						</div>
					</div>   
                    <?php if( $current_screen->post_type == 'post' ): ?>
                    <div class="agama-row">
                        <div class="agama-row-left">
                            <label for="agama_post_embed_video"><?php _e( 'Embed Video Code', 'agama-pro' ); ?></label>
                            <p class="description"><?php _e( 'Insert Youtube or Vimeo embed code.', 'agama-pro' ); ?></p>
                        </div>
                        <div class="agama-row-right">
                            <textarea id="agama_post_embed_video" name="_agama_post_video" rows="10"><?php echo $post_video['embed']; ?></textarea>
                        </div>
                    </div>
                    <?php endif; ?>
                    </p>
                </section><!-- Post - Page Section End -->
                
                <!-- Slider Section -->
                <section id="agama-slider-section">
                    <p>
                    <div class="agama-row">
						<div class="agama-row-left">
							<label for="agama_enable_slider" class="agama-control-label"><?php _e( 'Enable Slider', 'agama-pro' ); ?></label>
							<p class="description"><?php _e( 'You can enable slider for this post / page.', 'agama-pro' ); ?></p>
						</div>
						<div class="agama-row-right">
                            <select id="agama_enable_slider" name="_agama_enable_slider">
                                <option value="on" <?php selected( 'on', $this->get_meta('_agama_enable_slider', 'off'), true ); ?>><?php _e( 'Enable', 'agama-pro' ); ?></option>
                                <option value="off" <?php selected( 'off', $this->get_meta('_agama_enable_slider', 'off'), true ); ?>><?php _e( 'Disable', 'agama-pro' ); ?></option>
                            </select>
						</div>
					</div>
					<div id="agama_slider_type" class="agama-row">
						<div class="agama-row-left">
							<label for="agama-slider-type-select"><?php _e( 'Slider Type', 'agama-pro' ); ?></label>
							<p class="description"><?php _e( 'Select what type of slider you want to use for post / page.', 'agama-pro' ); ?></p>
						</div>
						<div class="agama-row-right">
							<select id="agama-slider-type-select" name="_agama_slider_type">
							<?php foreach( $sliders as $key => $value ): ?>
								<option value="<?php echo $key; ?>" <?php selected( $key, $this->get_meta('_agama_slider_type'), true ); ?>><?php echo $value; ?></option>
							<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div id="agama_layer_slider" class="agama-row">
						<div class="agama-row-left">
							<label for="agama_layer_slider"><?php _e( 'Layer Slider', 'agama-pro' ); ?></label>
							<p class="description"><?php _e( 'Select Layer slider you want display on post / page.', 'agama-pro' ); ?></p>
						</div>
						<div class="agama-row-right">
							<select id="agama_layer_slider" name="_layer_slider">
								<option value="0"><?php _e( 'Select Slider', 'agama-pro' ); ?></option>
								<?php $this->slider_dropdown('layer'); ?>
							</select>
						</div>
					</div>
					<div id="agama_revolution_slider" class="agama-row">
						<div class="agama-row-left">
							<label for="agama_revolution_slider"><?php _e( 'Revolution Slider', 'agama-pro' ); ?></label>
							<p class="description"><?php _e( 'Select Revolution slider you want display on post / page.', 'agama-pro' ); ?></p>
						</div>
						<div class="agama-row-right">
							<select id="agama_revolution_slider" name="_revolution_slider">
								<option value="0"><?php _e( 'Select Slider', 'agama-pro' ); ?></option>
								<?php $this->slider_dropdown('revolution'); ?>
							</select>
						</div>
					</div>
                    </p>
                </section><!-- Slider Section End -->
                
                <!-- Breadcrumb Section -->
                <section id="agama-breadcrumb-section">
                    <p>
                    <div class="agama-row">
						<div class="agama-row-left">
							<label for="agama_enable_breadcrumb"><?php _e( 'Breadcrumb', 'agama-pro' ); ?></label>
							<p class="description"><?php _e( 'Enable or disalbe the breadcrumb for this post | page.', 'agama-pro' ); ?></p>
						</div>
						<div class="agama-row-right">
							<select id="agama_enable_breadcrumb" name="_agama_breadcrumb">
								<option value="on" <?php selected( 'on', $this->get_meta('_agama_breadcrumb', 'on'), true ); ?>><?php _e( 'Enabled', 'agama-pro' ); ?></option>
								<option value="off" <?php selected( 'off', $this->get_meta('_agama_breadcrumb', 'on'), true ); ?>><?php _e( 'Disabled', 'agama-pro' ); ?></option>
							</select>
						</div>
					</div>
					<div class="agama-row">
						<div class="agama-row-left">
							<label for="agama_breadcrumb_title"><?php _e( 'Breadcrumb Page Title', 'agama-pro' ); ?></label>
							<p class="description"><?php _e( 'Set custom breadcrum page title. This will override default page title.', 'agama-pro' ); ?></p>
						</div>
						<div class="agama-row-right">
							<input id="agama_breadcrumb_title" type="text" name="_agama_breadcrumb_title" value="<?php echo $this->get_meta('_agama_breadcrumb_title', ''); ?>">
						</div>
					</div>
                    </p>
                </section><!-- Breadcrumb Section End -->
                
            </div>
        </div><!-- Agama Meta Box Wrapper End -->
	<?php
	}

	/**
	 * Sliders Dropdown Select
	 *
	 * @since Agama v1.0.1
	 */
	function slider_dropdown( $slider ) {
		global $wpdb;
		if( $slider == 'layer' && class_exists( 'LS_Sliders' ) ) {
			$table_name = $wpdb->prefix . "layerslider";
			// Get sliders
			$sliders = $wpdb->get_results(
				"SELECT $table_name.id, $table_name.name FROM $table_name
				WHERE flag_hidden = '0' AND flag_deleted = '0'
				ORDER BY date_c ASC"
			);
			// Output dropdown
			if( $sliders ):
			foreach( $sliders as $slider ){

				echo '<option value="'.$slider->id.'" '.selected( $this->get_meta('_layer_slider'), $slider->id, false ).'>'.$slider->name.'</option>';
			}
			endif;
		}
		else
		if( $slider == 'revolution' && class_exists( 'RevSliderAdmin' ) ) {
			$table = $wpdb->prefix.'revslider_sliders';
			// Get sliders
			$revquery = "SELECT $table.id, $table.title FROM $table ORDER BY $table.id DESC";
			$revsliders = $wpdb->get_results($revquery, ARRAY_A);
			// Output dropdown
			if( $revsliders ):
			foreach( $revsliders as $slider ) {
				echo '<option value="'.$slider['id'].'" '.selected( $this->get_meta('_revolution_slider'), $slider['id'], false ).'>'.$slider['title'].'</option>';
			}
			endif;
		}
	}
}

/**
 * Calls the class on the post edit screen.
 *
 * @since Agama v1.0.1
 */
function Agama_Metaboxes_Callback() {
    new Agama_Metaboxes();
}

// Fire callback on admin dashboard
if ( is_admin() ) {
    add_action( 'load-post.php', 'Agama_Metaboxes_Callback' );
    add_action( 'load-post-new.php', 'Agama_Metaboxes_Callback' );
}
