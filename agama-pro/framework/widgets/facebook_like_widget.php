<?php

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Vision_Facebook_Like_Widget' ) ) {
	
	add_action( 'widgets_init', 'register_vision_facebook_like_widget' );
	function register_vision_facebook_like_widget()
	{
		register_widget( 'Vision_Facebook_Like_Widget' );
	}

	class Vision_Facebook_Like_Widget extends WP_Widget {
		
		/**
		 * Register Widget with WordPress
		 *
		 * @since 1.0.5
		 */
		function __construct()
		{
			parent::__construct (
				'facebook-like-widget', // Base ID
				__( 'Agama: Facebook Like Box', 'agama-pro' ), // Name
				array( 'classname' => 'facebook_like', 'description' => __( 'Adds support for Facebook Like Box.', 'agama-pro' ) ) // Args
			);
		}

		function widget( $args, $instance )
		{
			extract( $args );

			$title 			= apply_filters('widget_title', $instance['title']);
			$app_id 		= $instance['app_id'];
			$language 		= get_locale();
			$page_url 		= $instance['page_url'];
			$widget_width 	= $instance['width'];
			$adapt_width	= isset( $instance['adapt_width'] ) ? 'true' : 'false';
			$small_header	= isset( $instance['small_header'] ) ? 'true' : 'false';
			$show_faces 	= isset( $instance['show_faces'] ) ? 'true' : 'false';
			$show_stream 	= isset( $instance['show_stream'] ) ? 'true' : 'false';
			$show_header 	= isset( $instance['show_header'] ) ? 'true' : 'false';
			$height 		= '65';

			if ( $show_faces == 'true' ) {
				$height = '240';
			}

			if ( $show_stream == 'true' ) {
				$height = '515';
			}

			if ( $show_stream == 'true' && $show_faces == 'true' && $show_header == 'true' ) {
				$height = '540';
			}

			if ( $show_stream == 'true' && $show_faces == 'true' && $show_header == 'false' ) {
				$height = '540';
			}

			if ( $show_header == 'true' ) {
				$height = $height + 30;
			}

			echo $before_widget;

			if ( $title ) {
				echo $before_title.$title.$after_title;
			}

			if ( $page_url ): 
			
				if ( $app_id ): 
					$show_header = isset( $instance['show_header'] ) ? 'false' : 'true';
					?>

					<div class="fb-like-box-container_<?php echo $args['widget_id']; ?> id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  var $app_id = <?php echo $app_id; ?>;
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/<?php echo $language; ?>/sdk.js#xfbml=1&appId=<?php echo $app_id; ?>&version=v2.3";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>			
					<div class="fb-page" data-href="<?php echo $page_url; ?>" data-small-header="<?php echo $small_header; ?>" data-adapt-container-width="<?php echo $adapt_width; ?>" data-width="<?php echo $widget_width; ?>" data-height="<?php echo $height; ?>" data-hide-cover="<?php echo $show_header; ?>" data-show-facepile="<?php echo $show_faces; ?>" data-show-posts="<?php echo $show_stream; ?>"></div>			

				<?php else: ?>

					<div class="fb-like-box-container_<?php echo $args['widget_id']; ?>"></div>
					<script type="text/javascript">
					var container_width_current = jQuery('.fb-like-box-container_<?php echo $args['widget_id']; ?>').width();
					jQuery(window).bind('load', function() {
					jQuery('.fb-like-box-container_<?php echo $args['widget_id']; ?>').html('<iframe src="http<?php echo (is_ssl())? 's' : ''; ?>://www.facebook.com/plugins/likebox.php?href=<?php echo urlencode($page_url); ?>&amp;small_header=<?php echo $small_header; ?>&amp;adapt_width=<?php echo $adapt_width; ?>&amp;width=' + container_width_current + '&amp;show_faces=<?php echo $show_faces; ?>&amp;stream=<?php echo $show_stream; ?>&amp;header=<?php echo $show_header; ?>&amp;height=<?php echo $height; ?>&amp;force_wall=true<?php if($show_faces == 'true'): ?>&amp;connections=<?php endif; ?>" style="border:none; overflow:hidden; width:100%; max-width:' + container_width_current + 'px; height: <?php echo $height; ?>px;"></iframe>');
					});
					jQuery(window).bind('resize', function() {
						var container_width_new = jQuery('.fb-like-box-container_<?php echo $args['widget_id']; ?>').width();
						if(container_width_new != container_width_current) {
							container_width_current = container_width_new;
							jQuery('.fb-like-box-container_<?php echo $args['widget_id']; ?>').html('<iframe src="http<?php echo (is_ssl())? 's' : ''; ?>://www.facebook.com/plugins/likebox.php?href=<?php echo urlencode($page_url); ?>&amp;small_header=<?php echo $small_header; ?>&amp;adapt_width=<?php echo $adapt_width; ?>&amp;width=' + container_width_current + '&amp;show_faces=<?php echo $show_faces; ?>&amp;stream=<?php echo $show_stream; ?>&amp;header=<?php echo $show_header; ?>&amp;height=<?php echo $height; ?>&amp;force_wall=true<?php if($show_faces == 'true'): ?>&amp;connections=<?php endif; ?>" style="border:none; overflow:hidden; width:100%; max-width:' + container_width_current + 'px; height: <?php echo $height; ?>px;"></iframe>');
						}
					});
					</script>			
				<?php endif;
			
			endif;

			echo $after_widget;
		}

		function update( $new_instance, $old_instance )
		{
			$instance = $old_instance;

			$instance['title'] 			= strip_tags($new_instance['title']);
			$instance['app_id'] 		= $new_instance['app_id'];
			$instance['page_url'] 		= $new_instance['page_url'];
			$instance['width']			= $new_instance['width'];
			$instance['adapt_width'] 	= $new_instance['adapt_width'];
			$instance['small_header']	= $new_instance['small_header'];
			$instance['show_faces'] 	= $new_instance['show_faces'];
			$instance['show_stream'] 	= $new_instance['show_stream'];
			$instance['show_header'] 	= $new_instance['show_header'];

			return $instance;
		}

		function form( $instance )
		{
			$defaults = array(
				'title' 		=> __( 'Find us on Facebook', 'agama-pro' ),
				'app_id' 		=> '', 
				'page_url' 		=> '', 
				'width' 		=> '275',
				'adapt_width'	=> true,
				'small_header'	=> false,
				'show_faces' 	=> 'on', 
				'show_stream' 	=> false, 
				'show_header' 	=> false
			);
			$instance = wp_parse_args( ( array ) $instance, $defaults ); ?>
			
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'agama-pro' ); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id( 'app_id' ); ?>"><?php _e( 'Facebook App ID:', 'agama-pro' ); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'app_id' ); ?>" name="<?php echo $this->get_field_name( 'app_id' ); ?>" value="<?php echo $instance['app_id']; ?>" />
			</p>			

			<p>
				<label for="<?php echo $this->get_field_id( 'page_url' ); ?>"><?php _e( 'Facebook Page URL:', 'agama-pro' ); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'page_url' ); ?>" name="<?php echo $this->get_field_name( 'page_url' ); ?>" value="<?php echo $instance['page_url']; ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e( 'Width:', 'agama-pro' ); ?></label>
				<input class="widefat" type="text" style="width: 80px;" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo $instance['width']; ?>" />
			</p>
			
			<p>
				<input class="widefat" type="checkbox" <?php checked( $instance['adapt_width'], 'on' ); ?> id="<?php echo $this->get_field_id( 'adapt_width' ); ?>" name="<?php echo $this->get_field_name( 'adapt_width' ); ?>" />
				<label for="<?php echo $this->get_field_id( 'adapt_width' ); ?>"><?php _e( 'Adapt to Condainer Width', 'agama-pro' ); ?></label>
			</p>

			<p>
				<input class="checkbox" type="checkbox" <?php checked( $instance['small_header'], 'on' ); ?> id="<?php echo $this->get_field_id( 'small_header' ); ?>" name="<?php echo $this->get_field_name('small_header'); ?>" />
				<label for="<?php echo $this->get_field_id( 'small_header' ); ?>"><?php _e( 'Use Small Header', 'agama-pro' ); ?></label>
			</p>

			<p>
				<input class="checkbox" type="checkbox" <?php checked( $instance['show_faces'], 'on' ); ?> id="<?php echo $this->get_field_id( 'show_faces' ); ?>" name="<?php echo $this->get_field_name('show_faces'); ?>" />
				<label for="<?php echo $this->get_field_id( 'show_faces' ); ?>"><?php _e( 'Show Friends Faces', 'agama-pro' ); ?></label>
			</p>

			<p>
				<input class="checkbox" type="checkbox" <?php checked($instance['show_stream'], 'on'); ?> id="<?php echo $this->get_field_id( 'show_stream' ); ?>" name="<?php echo $this->get_field_name('show_stream'); ?>" />
				<label for="<?php echo $this->get_field_id( 'show_stream' ); ?>"><?php _e( 'Show Posts', 'agama-pro' ); ?></label>
			</p>

			<p>
				<input class="checkbox" type="checkbox" <?php checked($instance['show_header'], 'on'); ?> id="<?php echo $this->get_field_id( 'show_header' ); ?>" name="<?php echo $this->get_field_name('show_header'); ?>" />
				<label for="<?php echo $this->get_field_id( 'show_header' ); ?>"><?php _e( 'Show Cover Photo', 'agama-pro' ); ?></label>
			</p>
		<?php
		}
	}
}
?>