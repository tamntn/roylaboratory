<?php

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Agama Class
 *
 * @since Agama v1.0.1
 */
if( ! class_exists( 'Agama' ) ) {
	class Agama {

		/**
		 * Class Constructor
		 *
		 * @since 1.1.2
		 */
		function __construct() {

			// Extends body class init
			add_filter( 'body_class', array( $this, 'body_class' ) );

			// Excerpt lenght init
			add_filter( 'excerpt_length', array( $this, 'excerpt_length' ), 999 );

			// Add button class to post edit links init
			add_filter( 'edit_post_link', array( $this, 'edit_post_link' ) );

			// Add button class to comment edit links init
			add_filter( 'edit_comment_link', array( $this, 'edit_comment_link' ) );
		}
		
		/**
		 * Agama Header Style
		 *
		 * @since 1.3.0
		 * @updated @since 1.3.8
		 */
		public static function get_header() {
            global $meta_custom_logo;
            $header           = esc_attr( get_theme_mod('agama_header_style', 'v3') );
            $meta_custom_logo = esc_attr( Agama::get_meta( '_agama_custom_logo', '' ) );
            if( ! empty( $meta_custom_logo ) ) {
                $meta_custom_logo = wp_get_attachment_image_src( $meta_custom_logo, 'full' );
                $meta_custom_logo = esc_url( $meta_custom_logo[0] );
            }
			switch( $header ) {
				case 'v1':
					get_template_part('framework/headers/header_v1');
				break;
				case 'v2':
					 get_template_part('framework/headers/header_v2');
				break;
				case 'v3':
					 get_template_part('framework/headers/header_v3');
				break;
			}
		}
		
		/**
		 * Agama Header Image
		 *
		 * @since 1.3.0
		 * @updated @since 1.3.8
		 */
		public static function get_header_image() {
			Agama_Header_Image::get_instance();
		}
		
		/**
		 * Agama WooCommerce Cart Notifications
		 *
		 * @since 1.3.8
		 */
		public static function get_wc_cart_notifications() {
			if( class_exists( 'Woocommerce' ) ) {
				echo '<div class="cart-notification">';
					echo '<span class="item-name"></span>&nbsp;';
					echo __( ' was successfully added to your cart.', 'agama-pro' );
				echo '</div>';
			}
		}
		
		/**
		 * Agama Preloader
		 * 
		 * @since 1.3.8
		 */
		public static function get_preloader() {
			Agama_Preloader::get_instance();
		}
		
		/**
		 * Agama Slider
		 *
		 * @since 1.3.8
		 */
		public static function get_slider() {
			Agama_Slider::get_instance();
		}
		
		/**
		 * Agama Front Page Boxes
		 *
		 * @since 1.3.8
		 */
		public static function get_front_page_boxes() {
			Agama_Front_Page_Boxes::init();
		}

		/**
		 * Extend the default WordPress body classes.
		 *
		 * @since Agama 1.0.0
		 * @param array $classes Existing class values.
		 * @return array Filtered class values.
		 */
		function body_class( $classes ) {
            
            if( is_404() ) {
                $classes[] = 'vision-404';
            }
            
			if( get_theme_mod( 'agama_body_animate', false ) ) {
				$classes[] = 'body_bg_animated';
			}

			switch( get_theme_mod( 'agama_header_style', 'v3' ) ) {
				case 'v1':
					 $classes[] = 'header_v1';
				break;
				case 'v2':
					 $classes[] = 'header_v2';
				break;
				case 'v3':
					 $classes[] = 'header_v3';
				break;
				case 'v4':
					 $classes[] = 'header_v4';
				break;
			}

			if( get_theme_mod( 'agama_header_style', 'v3' ) == 'v2' && get_theme_mod( 'agama_header_transparent', false ) ) {
				$classes[] = 'header_transparent';
			}

			if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
				$classes[] = 'full-width';

			if ( is_page_template( 'page-templates/front-page.php' ) ) {
				$classes[] = 'template-front-page';
				if ( has_post_thumbnail() )
					$classes[] = 'has-post-thumbnail';
				if ( is_active_sidebar( 'sidebar-2' ) )
					$classes[] = 'two-sidebars';
			}
			
			// If sidebar left position.
			if( get_theme_mod( 'agama_sidebar_position', 'right' ) == 'left' ) {
				$classes[] = 'sidebar-left';
			}

			// Enable custom font class only if the font CSS is queued to load.
			if ( wp_style_is( 'PTSans', 'queue' ) )
				$classes[] = 'custom-font-enabled';

			if ( ! is_multi_author() )
				$classes[] = 'single-author';

			return $classes;
		}

		/**
		 * Bootstrap Content Width Class Helper
		 *
		 * @since 1.2.0
		 */
		static function bs_class() {
			$meta_box = Agama::get_meta('_agama_enable_sidebar', 'on');
			$sidebar_main = is_active_sidebar( 'sidebar-1' );

			if ( $meta_box == 'on' && $sidebar_main ) {
				$bs_class = 'col-md-9';
			} else {
				$bs_class = 'col-md-12';
			}
			echo $bs_class;
		}
		
		/**
		 * Blog Posts Animated
		 *
		 * @since 1.3.7
		 */
		static function data_animated() {
			if( get_theme_mod( 'agama_blog_layout', 'list' ) !== 'grid' ) {
				$posts['animated']  = esc_attr( get_theme_mod( 'agama_blog_posts_animated', true ) );
				$posts['animation'] = esc_attr( get_theme_mod( 'agama_blog_posts_animation', 'bounceInUp' ) );
				if( $posts['animated'] ) {
					echo 'data-animate="'. $posts['animation'] .'"';
				}
			}
		}
		
		/**
		 * Display Post Meta
		 *
		 * @since 1.3.5
		 */
		static function post_meta() {
			$blog['post_meta'] 	 = esc_attr( get_theme_mod( 'agama_post_meta', true ) );
			$single['post_meta'] = esc_attr( get_theme_mod( 'agama_blog_single_post_meta', true ) );
			
			// If post meta enabled on blog loop.
			if( $blog['post_meta'] && ! is_single() || $single['post_meta'] && is_single() ) {
				do_action( 'agama_blog_post_meta' );
			}
		}

		/**
		 * Agama Social Icons
		 *
		 * @since 1.1.6
		 */
		static function sociali( $tip_position = false, $style = false ) {
			$_target = esc_attr( get_theme_mod( 'agama_social_url_target', '_blank' ) ); // URL target
			$social  = array(
				__( 'Phone', 'agama-pro' )	=> esc_html( get_theme_mod('social_phone', '' ) ),
				'Facebook'					=> esc_url( get_theme_mod('social_facebook', '') ),
				'Twitter'					=> esc_url( get_theme_mod('social_twitter', '') ),
				'Flickr'					=> esc_url( get_theme_mod('social_flickr', '') ),
				'Vimeo'						=> esc_url( get_theme_mod('social_vimeo', '') ),
				'Youtube'					=> esc_url( get_theme_mod('social_youtube', '') ),
				'Instagram'					=> esc_url( get_theme_mod('social_instagram', '') ),
				'Pinterest'					=> esc_url( get_theme_mod('social_pinterest', '') ),
				'Telegram'                  => esc_url( get_theme_mod('social_telegram', '') ),
                'Tumblr'					=> esc_url( get_theme_mod('social_tumblr', '') ),
				'Google'					=> esc_url( get_theme_mod('social_google', '') ),
				'Dribbble'					=> esc_url( get_theme_mod('social_dribbble', '') ),
				'Digg'						=> esc_url( get_theme_mod('social_digg', '') ),
				'Linkedin'					=> esc_url( get_theme_mod('social_linkedin', '') ),
				'Blogger'					=> esc_url( get_theme_mod('social_blogger', '') ),
				'Skype'						=> esc_html( get_theme_mod('social_skype', '') ),
				'Myspace'					=> esc_url( get_theme_mod('social_myspace', '') ),
				'Deviantart'				=> esc_url( get_theme_mod('social_deviantart', '') ),
				'Yahoo'						=> esc_url( get_theme_mod('social_yahoo', '') ),
				'Reddit'					=> esc_url( get_theme_mod('social_reddit', '') ),
				'PayPal'					=> esc_url( get_theme_mod('social_paypal', '') ),
				'Dropbox'					=> esc_url( get_theme_mod('social_dropbox', '') ),
				'Soundcloud'				=> esc_url( get_theme_mod('social_soundcloud', '') ),
				'VK'						=> esc_url( get_theme_mod('social_vk', '') ),
				__( 'Email', 'agama-pro' )	=> esc_html( get_theme_mod('social_email', '') ),
				'RSS'						=> esc_url( get_theme_mod('social_rss', get_bloginfo('rss2_url')) ),
			);
			if( $style == 'animated' ) {
				echo '<ul>';
				foreach( $social as $name => $url ) {
					if( ! empty( $url ) ) {
						
                        if( $name == 'Phone' ) {
							$url = 'tel:' . $url;
						}
						if( $name == 'Skype' ) {
							$url = 'skype:'. $url .'?call';
						}
						if( $name == 'Email' ) {
							$url = 'mailto:' . $url;
						}
                        
                        // Generate FontAwesome icon class.
                        $fa_class = 'fa-' . strtolower( $name );
                        
                        // Change email icon from "fa-email" to "fa-at".
                        if( $name == 'Email' ) {
                            $fa_class = 'fa-at';
                        }
                        
						echo sprintf
						(
							'<li><a class="tv-%s" href="%s" target="%s"><span class="tv-icon"><i class="fa %s"></i></span><span class="tv-text">%s</span></a></li>',
							esc_attr( strtolower($name) ), $url, $_target, esc_attr( $fa_class ), esc_attr( $name )
						);
					}
				}
				echo '</ul>';
			} else {
				foreach( $social as $name => $url ) {
					if( ! empty( $url ) ) {
						if( $name == 'Phone' ) {
							$url = 'tel:' . $url;
						}
						if( $name == 'Skype' ) {
							$url = 'skype:'. $url .'?call';
						}
						if( $name == 'Email' ) {
							$url = 'mailto:' . $url;
						}
                        
                        // Generate FontAwesome icon class.
                        $fa_class = 'fa-' . strtolower( $name );
                        
                        // Change email icon from "fa-email" to "fa-at".
                        if( $name == 'Email' ) {
                            $fa_class = 'fa-at';
                        }
                        
						echo sprintf
						(
							'<a class="social-icons %s" href="%s" target="%s" data-toggle="tooltip" data-placement="%s" title="%s"></a>',
							esc_attr( strtolower($name) ), $url, $_target, esc_attr( $tip_position ), esc_attr( $name )
						);
					}
				}
			}
		}

		/**
		 * Excerpt Lenght
		 *
		 * @since 1.0.0
		 */
		function excerpt_length( $length ) {
			if( get_post_type() == 'agama_portfolio' ) {
				return esc_attr( get_theme_mod( 'agama_portfolio_excerpt', '80' ) );
            } else {
				return esc_attr( get_theme_mod( 'agama_blog_excerpt', '70' ) );
            }
		}

		/**
		 * Add Class to Post Edit Link
		 *
		 * @since 1.1.2
		 */
		function edit_post_link( $output ) {
			$output = str_replace('class="post-edit-link"', 'class="button button-3d button-mini button-rounded"', $output);
			return $output;
		}

		/**
		 * Add Class to Post Edit Comment Link
		 *
		 * @since 1.1.2
		 */
		function edit_comment_link( $output ) {
			$output = str_replace('class="comment-edit-link"', 'class="button button-3d button-mini button-rounded"', $output);
			return $output;
		}

		/**
		 * Render Menu Content
		 *
		 * @since 1.1.2
		 */
		public static function menu( $location = false, $class = false ) {

			// If location not set
			if( ! $location )
				return;
            
			if( has_nav_menu( $location ) ) {
				$args = array(
					'theme_location' 	=> $location,
					'menu_class' 		=> $class,
					'container' 		=> false,
					'echo' 				=> '0',
					'walker' 			=> new Agama_Nav_Walker()
				);

				$menu = wp_nav_menu( $args );
			} else {
				$menu = sprintf
				(
					'<ul class="%s"><li><a href="%s"><strong>NO MENU ASSIGNED</strong> Go To Appearance > Menus and create a Menu</a></li></ul>',
					esc_attr( $class ),
					get_admin_url( null, 'nav-menus.php' )
				);
			}

			return $menu;
		}

		/**
		 * Get Theme Options
		 *
		 * @since 1.0.5
		 * @return string
		 */
		public static function setting( $option, $default = null ) {

			if( is_customize_preview() ) {
				$agama_options = get_theme_mod('agama_pro');
			} else {
				$agama_options = get_option('agama_pro');
			}

			if( empty( $agama_options[$option] ) ) {
				$agama_options[$option] = $default;
			}

			return $agama_options[$option];
		}

		/**
		 * Get Post Meta
		 *
		 * @since Agama v1.0.1
		 * @return string
		 */
		public static function get_meta( $meta_key, $default = false, $post_id = false ) {
			global $post;
			
			// If post id is not set, get it from global $post object.
			if( ! $post_id && ! empty( $post->ID ) && is_single() ) {
				$post_id = $post->ID;
			}
			else
			if( ! $post_id && ! empty( $post->ID ) && is_page() ) {
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
		 * Agama Get Portfolio Skills
		 *
		 * @since 1.1.3
		 */
		public static function portfolio_skills( $args ) {
			global $post;

			$defaults = array(
				'before'		=> '',
				'after'			=> '',
				'before_title'	=> '',
				'after_title'	=> '',
				'title'			=> '',
				'before_href'	=> '',
				'after_href'	=> '',
				'separator'		=> ''
			);

			$args = wp_parse_args( $args, $defaults );

			extract( $args );

			$terms = get_the_terms(
				$post->ID,
				'portfolio_skills'
			);

			if ( $terms && ! is_wp_error( $terms ) ) {
				$skills = array();

				if( $before ) echo $before;

					if( $title ) echo $before_title . $title . $after_title;

					if( $before_href ) echo $before_href;

					foreach ( $terms as $term ) {
						$skills[] = ' <a href="">'.$term->name.'</a>';
					}

					if( $after_href ) echo $after_href;

					$output = join( $separator, $skills );

					echo $output;

				if( $after ) echo $after;
			}

			return;
		}

		/**
		 * Agama Post Tags
		 *
		 * @since 1.1.8
		 */
		static function tags() {
			if( get_theme_mod( 'agama_blog_tags', true ) && has_tag() ) {
				echo '<div class="tagcloud clearfix bottommargin">';
					 the_tags(false, false, false);
				echo '</div>';
			}
		}

		/**
		 * Agama Share Post
		 *
		 * @since 1.1.8
		 */
		static function share() {
			$share['facebook'] 		= esc_attr( get_theme_mod( 'agama_share_facebook', true ) );
			$share['twitter']		= esc_attr( get_theme_mod( 'agama_share_twitter', true ) );
			$share['pinterest']		= esc_attr( get_theme_mod( 'agama_share_pinterest', true ) );
			$share['google_plus']	= esc_attr( get_theme_mod( 'agama_share_google_plus', true ) );
			$share['linkedIn']		= esc_attr( get_theme_mod( 'agama_share_linkedin', true ) );
			$share['rss']			= esc_attr( get_theme_mod( 'agama_share_rss', true ) );
			$share['email']			= esc_attr( get_theme_mod( 'agama_share_email', true ) );

			if( get_theme_mod( 'agama_share_box', true ) ) {
				
				if( self::get_meta( '_agama_enable_social_share', 'on' ) == 'on' ) {

					echo '<div class="si-share clearfix">';

						if( is_single() ) {
							echo sprintf('<span>%s:</span>', __( 'Share this Post', 'agama-pro' ) );
						}
						
						if( is_page() ) {
							echo sprintf('<span>%s:</span>', __( 'Share this Page', 'agama-pro' ) );
						}

						// Share icons
						echo '<div>';

							if( $share['facebook'] ) {
								printf( '<a href="https://www.facebook.com/sharer/sharer.php?u=%s" class="social-icon si-borderless si-facebook" data-toggle="tooltip" data-placement="top" title="Facebook" target="_blank"><i class="fa fa-facebook"></i><i class="fa fa-facebook"></i></a>', get_permalink() );
							}

							if( $share['twitter'] ) {
								printf( '<a href="https://twitter.com/intent/tweet?url=%s" class="social-icon si-borderless si-twitter" data-toggle="tooltip" data-placement="top" title="Twitter" target="_blank"><i class="fa fa-twitter"></i><i class="fa fa-twitter"></i></a>', get_permalink() );
							}

							if( $share['pinterest'] ) {
								printf( '<a href="http://pinterest.com/pin/create/button/?url=%s&media=%s" class="social-icon si-borderless si-pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i><i class="fa fa-pinterest"></i></a>', get_permalink(), get_the_post_thumbnail_url() );
							}

							if( $share['google_plus'] ) {
								printf( '<a href="https://plus.google.com/share?url=%s" class="social-icon si-borderless si-google" data-toggle="tooltip" data-placement="top" title="Google+" target="_blank"><i class="fa fa-google-plus"></i><i class="fa fa-google-plus"></i></a>', get_permalink() );
							}
							
							if( $share['linkedIn'] ) {
                                $excerpt = get_the_excerpt();
								printf( '<a href="https://www.linkedin.com/shareArticle?mini=true&url=%s&title=%s&summary=%s&source=%s" class="social-icon si-borderless si-linkedin" data-toggle="tooltip" data-placement="top" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i><i class="fa fa-linkedin"></i></a>', get_permalink(), rawurlencode( get_the_title() ), rawurlencode( mb_substr( html_entity_decode( $excerpt , ENT_QUOTES, 'UTF-8' ), 0, 256 ) ), get_bloginfo( 'name' ) );
							}

							if( $share['rss'] ) {
								printf('<a href="%s?feed=rss2&withoutcomments=1" class="social-icon si-borderless si-rss" data-toggle="tooltip" data-placement="top" title="RSS" target="_blank"><i class="fa fa-rss"></i><i class="fa fa-rss"></i></a>', get_permalink());
							}

							if( $share['email']
							) {
								printf('<a href="mailto:?&subject=%s&body=%s" class="social-icon si-borderless si-email3" data-toggle="tooltip" data-placement="top" title="Email" target="_blank"><i class="fa fa-at"></i><i class="fa fa-at"></i></a>', rawurlencode( get_the_title() ), get_permalink());
							}

						echo '</div>';

					echo '</div>';
					
				}

			}
		}

		/**
		 * Retrive Post Categories
		 *
		 * @since 1.1.9
		 */
		static function post_categories( $taxonomy = false ){
			global $post;

			// get post by post id
			$post = get_post( $post->ID );

			// get post type by post
			$post_type = $post->post_type;

			// get post type taxonomies
			$taxonomies = get_object_taxonomies( $post_type, 'objects' );

			$out = array();
			foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){

				// get the terms related to post
				$terms = get_the_terms( $post->ID, $taxonomy_slug );

				if( ! empty( $terms ) ) {
					foreach( $terms as $term ) {
						$out[] = '<a href="' . get_term_link( $term->slug, $taxonomy_slug ) .'">'. $term->name ."</a>";
					}
				}
			}
			return implode('', $out );
		}

		/**
		 * Verify Google Captcha
		 *
		 * @since 1.1.9
		 */
		static function verifyCaptcha( $response ){

			$remote_ip 		= $_SERVER["REMOTE_ADDR"];
			$secret 		= get_theme_mod( 'agama_contact_recaptcha_secret', '6LcQPBATAAAAAEQrIHe9sN82eCLuGrmOKfmuA6oE' );
			$request 		= wp_remote_get( 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $response . '&remoteip=' . $remote_ip );
			$response_body 	= wp_remote_retrieve_body( $request );
			$res 			= json_decode( $response_body, true );

			if( $res['success'] == 'true' ) {
				return true;
            } else {
				return false;
            }
		}

		/**
		 * Mobile Navigation
		 *
		 * @since 1.1.99
		 */
		static function mobileNav() { 
			$top_nav 		= esc_attr( get_theme_mod( 'agama_mobile_top_nav', false ) ); 
			$header_style 	= esc_attr( get_theme_mod( 'agama_header_style', 'v3' ) ); ?>
			<!-- Mobile Navigation -->
			<nav class="mobile-menu collapse">
				<?php echo self::menu('agama_nav_primary', 'menu'); ?>
				<?php if( $top_nav && $header_style == 'v1' || $top_nav && $header_style == 'v3' ): ?>
					<?php echo self::menu( 'agama_nav_top', 'mobile-topnav container' ); ?>
				<?php endif; ?>
			</nav><!-- Mobile Navigation End -->
		<?php
		}

		/**
		 * Theme Version
		 *
		 * @since 1.3.0
		 */
		static function version() {
			return esc_attr( Agama_Core::version() );
		}

		/**
		 * Get Post Format
		 *
		 * @since 1.3.3
		 */
		public static function post_format() {
			$post_format = get_post_format();

			switch( $post_format ) {

				case 'aside':
					$icon = '<i class="fa fa-outdent"></i>';
				break;

				case 'chat':
					$icon = '<i class="fa fa-wechat"></i>';
				break;

				case 'gallery':
					$icon = '<i class="fa fa-photo"></i>';
				break;

				case 'link':
					$icon = '<i class="fa fa-link"></i>';
				break;

				case 'image':
					$icon = '<i class="fa fa-image"></i>';
				break;

				case 'quote':
					$icon = '<i class="fa fa-quote-left"></i>';
				break;

				case 'status':
					$icon = '<i class="fa fa-check-circle"></i>';
				break;

				case 'video':
					$icon = '<i class="fa fa-video-camera"></i>';
				break;

				case 'audio':
					$icon = '<i class="fa fa-volume-up"></i>';
				break;

				default: $icon = '<i class="fa fa-camera-retro"></i>';

			}

			return $icon;
		}

		/**
		 * Count Comments
		 *
		 * @since 1.3.3
		 */
		public static function comments_count() {
			$comments = 0;

			if( comments_open() ) {
				$comments = sprintf('<a href="%s">%s</a>', get_comments_link(), get_comments_number() . __( ' comments', 'agama-pro' ) );
			}

			return $comments;
		}

		/**
		 * Blog thumbnails hover effect class
		 *
		 * @since 1.3.3
		 * @return string
		 */
		public static function blog_thumbs_hover_class() {
			$blog_thumbs_hover = esc_attr( get_theme_mod( 'agama_blog_thumbnails_hover_effect', true ) );
			$blog_layout = esc_attr( get_theme_mod( 'agama_blog_layout', 'list' ) );

			// If list or grid layout
			if( $blog_thumbs_hover && $blog_layout !== 'small_thumbs' ) {
				echo 'class="hover1"';
			}
			else // If small_thumbs layout
			if( $blog_thumbs_hover && $blog_layout == 'small_thumbs' ) {
				return 'class="image_fade img-responsive image-grow"';
			}
		}
	}
	new Agama;
}

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
