<?php 

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Agama Helper Class
 *
 * @since 1.3.7
 */
if( ! function_exists( 'Agama_Helper' ) ) {
	class Agama_Helper {
		
		/**
		 * Echo PolyLang Strings Registered for Translation
		 *
		 * @since 1.3.6.10
		 */
		public static function pll_e( $string ) {
			if( function_exists( 'pll__' ) ) {
				echo pll__( $string );
			} else {
				echo $string;
			}
		}
		
		/**
		 * Initialize Body Background Animation
		 *
		 * @since 1.3.8
		 */
		public static function get_body_background_animation() {
			Agama_Body_Background_Animation::get_instance();
		}
		
		/**
		 * Header Class
		 *
		 * @since 1.3.0
		 */
		public static function the_header_class() {
			switch( get_theme_mod( 'agama_header_style', 'v3' ) ) {
				case 'v1':
					 $class = 'header_v1';
				break;
				case 'v2':
					 $class = 'header_v2';
				break;
				case 'v3':
					 $class = 'header_v3';
				break;
				case 'v4':
					 $class = 'header_v4';
				break;
				default: $class = 'header_v3';
			}
			echo esc_attr( $class );
		}
		
		/**
		 * Get Pages ID
		 *
		 * @since 1.3.0
		 */
		public static function get_pages_id( $pages ) {
			if( ! empty( $pages ) && is_array( $pages ) ) {
				foreach( $pages as $page ) {
					$page_id[] = $page;
				}
				return $page_id;
			}
			return false;
		}
        
        /**
         * Get Blog Grid Wrapper Isotope Data
         *
         * @since 1.3.9
         */
        public static function get_blog_isotope_class() {
            if( ! is_single() && get_theme_mod( 'agama_blog_layout', 'list' ) == 'grid' ) {
                echo 'class="js-isotope"';
            }
        }
        
         /**
         * Search Box
         *
         * @since 1.4.0
         */
        public static function get_search_box() {
            if( get_theme_mod( 'agama_header_search', true ) ) {
                $output = '<div id="vision-search-box">';
                    $output .= '<form id="vision-search-form" method="get" action="'. home_url( '/' ) .'">';
                        $output .= '<input class="vision-search-input" name="s" type="text" value="'. get_search_query() .'" placeholder="'. __( 'Search...', 'agama-pro') .'" />';
                        $output .= '<input type="submit" class="vision-search-submit" value>';
                        $output .= '<i class="fa fa-search"></i>';
                    $output .= '</form>';
                $output .= '</div>';
                
                return $output;
            }
        }
        
        /**
		 * Agama Pagination
		 *
		 * @since 1.1.2
		 */
		public static function get_pagination( $post_type = null ) {
			global $wp_query, $loop;
            $enabled_blog      = esc_attr( get_theme_mod( 'agama_blog_pagination', true ) );
            $enabled_portfolio = esc_attr( get_theme_mod( 'agama_portfolio_pagination', true ) );
            $infinite_scroll   = esc_attr( get_theme_mod( 'agama_blog_infinite_scroll', false ) );
            if( $enabled_blog && $post_type == null || $enabled_portfolio && $post_type == 'agama_portfolio' ) {
                $big = 999999999;
                $translated = __( 'Page', 'agama-pro' );

                $prev_link = get_previous_posts_link( __('&laquo; Older Entries', 'agama-pro' ) );
                $next_link = get_next_posts_link( __('Newer Entries &raquo;', 'agama-pro' ) );

                if( $post_type == 'agama_portfolio' ) {
                    $total = $loop->max_num_pages;
                } else {
                    $total = $wp_query->max_num_pages;
                }

                // Fix Paged on Static Homepage
                if( get_query_var('paged') ) {
                    $paged = get_query_var('paged');
                }
                elseif( get_query_var('page') ) {
                    $paged = get_query_var('page');
                }
                else { $paged = 1; }

                if( $total > 1 ) {
                    if( $infinite_scroll ) {
                        $class = esc_attr( 'clear display-none' );
                    } else {
                        $class = esc_attr( 'clear' );
                    }
                    echo '<div id="vision-pagination" class="'. $class .'">';
                    
                    echo paginate_links( array(
                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, $paged ),
                        'total' => $total,
                        'before_page_number' => '<span class="screen-reader-text">' . $translated . '</span>'
                    ) );

                    echo '</div>';
                }
            }
		}
        
        /**
         * Single Post Prev - Next Article Navigation
         */
        public static function get_single_post_nav() {
            $enabled = esc_attr( get_theme_mod( 'agama_blog_post_prev_next_nav', true ) );
            if( $enabled ) { ?>
                <!-- Article Navigation -->
				<nav class="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'agama-pro' ); ?></h3>
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'agama-pro' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'agama-pro' ) . '</span>' ); ?></span>
				</nav><!-- Article Navigation End -->
            <?php }
        }
        
        /**
         * Blog Infinite Scroll Load More Button
         *
         * @since 1.4.1.1
         */
        public static function get_infinite_scroll_load_more_btn() {
            $enabled    = esc_attr( get_theme_mod( 'agama_blog_infinite_scroll', false ) );
            $trigger    = esc_attr( get_theme_mod( 'agama_blog_infinite_trigger', 'button' ) );
            $pagination = esc_attr( get_theme_mod( 'agama_blog_pagination', true ) );
            if( $enabled && $pagination ) {
                echo '<div class="infscr-load-status">';
                    echo '<div class="loader-ellips infinite-scroll-request">';
                        echo '<span class="loader-ellips__dot"></span>';
                        echo '<span class="loader-ellips__dot"></span>';
                        echo '<span class="loader-ellips__dot"></span>';
                        echo '<span class="loader-ellips__dot"></span>';
                    echo '</div>';
                echo '</div>';
            }
            if( $enabled && $trigger == 'button' && $pagination ) {
                echo '<a id="infinite-loadmore" class="button button-3d button-rounded">';
                    echo '<i class="fa fa-spinner fa-spin"></i> ' . __( 'Load More', 'agama-pro' );
                echo '</a>';
            }
        }
        
        /**
         * Generate CSS from Array
         *
         * @since 1.3.9
         */
        public static function generate_slider_btns_css() {
            $buttons = array(
                1  => esc_attr( get_theme_mod( 'agama_slider_button_style_1', 'button-border' ) ),
                2  => esc_attr( get_theme_mod( 'agama_slider_button_style_2', 'button-border' ) ),
                3  => esc_attr( get_theme_mod( 'agama_slider_button_style_3', 'button-border' ) ),
                4  => esc_attr( get_theme_mod( 'agama_slider_button_style_4', 'button-border' ) ),
                5  => esc_attr( get_theme_mod( 'agama_slider_button_style_5', 'button-border' ) ),
                6  => esc_attr( get_theme_mod( 'agama_slider_button_style_6', 'button-border' ) ),
                7  => esc_attr( get_theme_mod( 'agama_slider_button_style_7', 'button-border' ) ),
                8  => esc_attr( get_theme_mod( 'agama_slider_button_style_8', 'button-border' ) ),
                9  => esc_attr( get_theme_mod( 'agama_slider_button_style_9', 'button-border' ) ),
                10 => esc_attr( get_theme_mod( 'agama_slider_button_style_10', 'button-border' ) ),
            ); 
            foreach( $buttons as $key => $value ) {
                $enabled_opt    = 'agama_slider_button_'.esc_attr( $key );
                $enabled        = esc_attr( get_theme_mod( $enabled_opt, true ) );
                
                $bg_color_opt   = 'agama_slider_button_bg_color_'.esc_attr( $key );
                $bg_color       = esc_attr( get_theme_mod( $bg_color_opt, '#A2C605' ) );
                
                // Generate CSS code for selected button style only if button is enabled.
                if( $enabled && $value == 'button-3d' ) {
                    echo '#agama_slider .slide-'.$key.' .button-3d{';
                        echo 'background-color:'.$bg_color.';';
                    echo '}';
                }
                if( $enabled && $value == 'button-border' ) {
                    echo '#agama_slider .slide-'.$key.' .button-border{';
                        echo 'border-color:'.$bg_color.';';
                         echo 'color:'.$bg_color.';';
                    echo '}';
                    echo '#agama_slider .slide-'.$key.' .button-border:hover{';
                        echo 'background-color:'.$bg_color.';';
                    echo '}';
                }
            }
        }
        
        /**
         * Generate Layout Width CSS
         *
         * @since 1.4.0
         */
        public static function generate_layout_width_css() {
            $style     = esc_attr( get_theme_mod( 'agama_layout_style', 'fullwidth' ) );
            $max_width = esc_attr( get_theme_mod( 'agama_layout_max_width', '1200' ) );
            $max_width = str_replace( 'px', '', $max_width );
            $max_width = str_replace( '%', '', $max_width );
           
            $vision_row['max_width'] = $max_width - 100;
            
            switch( $style ) {
                case 'fullwidth':
                    echo '#main-wrapper { max-width: 100%; }';
                    echo '.site-header .sticky-header .sticky-header-inner, .vision-row, .footer-sub-wrapper {';
                        echo 'max-width: '. $max_width .'px;';
                    echo '}';
                    echo '#page-title .container {';
                        echo 'width: '. $max_width .'px;';
                    echo '}';
                break;
                case 'boxed':
                    echo '#main-wrapper, header .sticky-header, .site-header .sticky-header .sticky-header-inner, .footer-sub-wrapper {';
                        echo 'max-width: '. $max_width . 'px;';
                    echo '}';
                    echo '#page-title .container {';
                        echo 'width: '. $max_width .'px;';
                    echo '}';
                    echo '.vision-row {';
                        echo 'max-width: '. $vision_row['max_width'] .'px;';
                    echo '}';
                break;
            }
        }
        
        /**
         * Generate Logo Align CSS
         *
         * @since 1.4.0
         */
        public static function generate_logo_align_css() {
            $align = esc_attr( get_theme_mod( 'agama_logo_align', 'left' ) );
            if( $align == 'center' ) {
                if( get_theme_mod( 'agama_header_style', 'v3' ) == 'v1' ) {
                    echo '#masthead .site-title, #masthead .site-description, #masthead .logo {';
                        echo 'display: block;';
                        echo 'text-align: center;';
                        echo 'margin: 0 auto;';
                    echo '}';
                }
                if( get_theme_mod( 'agama_header_style', 'v2' ) == 'v2' ) {
                    echo '#masthead .pull-left, #masthead .site-title {';
                        echo 'float: none;';
                        echo 'text-align: center;';
                    echo '}';
                    echo '#masthead .pull-right {';
                        echo 'float: none;';
                        echo 'width: 100%;';
                    echo '}';
                    echo '#masthead .sticky-header ul {';
                        echo 'float: none;';
                    echo '}';
                }
                if( get_theme_mod( 'agama_header_style', 'v3' ) == 'v3' ) {
                    echo '#masthead .sticky-header .pull-left, #masthead .site-title {';
                        echo 'float: none;';
                        echo 'text-align: center;';
                    echo '}';
                    echo '#masthead .sticky-header .pull-right {';
                        echo 'float: none;';
                        echo 'width: 100%;';
                    echo '}';
                    echo '#masthead .sticky-header ul {';
                        echo 'float: none;';
                    echo '}';
                }
            }
        }
        
        /**
         * Generate Vision Row CSS
         *
         * @since 1.4.0
         */
        public static function generate_vision_row_css() {
            $vision_row['padding-top'] 		= esc_attr( Agama::get_meta( '_vision_row_top_padding', '' ) );
            $vision_row['padding-bottom'] 	= esc_attr( Agama::get_meta( '_vision_row_bottom_padding', '' ) );
            if( $vision_row['padding-top'] ) {
                $vision_row['padding-top'] = 'padding-top: '. str_replace( 'px', '', $vision_row['padding-top'] ) .'px !important;';
            }
            if( $vision_row['padding-bottom'] ) {
                $vision_row['padding-bottom'] = 'padding-bottom: '. str_replace( 'px', '', $vision_row['padding-bottom'] ) .'px !important;';
            }
            if( $vision_row['padding-top'] || $vision_row['padding-bottom'] ) {
                echo '.vision-row {';
                    echo $vision_row['padding-top'];
                    echo $vision_row['padding-bottom'];
                echo '}';
            }
        }
        
        /**
         * Generate 404 Page CSS
         *
         * @since 1.4.0
         */
        public static function generate_404_page_css() {
            switch( is_404() ) {
                case true:
                    echo '.vision-page-title-secondary {';
                        echo 'display: none;';
                    echo '}';
                    echo 'body.vision-404 h1.entry-title {';
                        echo 'font-size: 30px;';
                    echo '}';
                    echo 'body.vision-404 .entry-content p.desc-404 {';
                        echo 'font-size: 18px;';
                    echo '}';
                    echo 'body.vision-404 .entry-content p.num-404 {';
                        echo 'font-size: 240px;';
                        echo 'line-height: 1;';
                    echo '}';
                break;
            }
        }
        
        /**
         * Get WooCommerce Cart Contents
         *
         * @since 1.4.0
         */
        public static function get_wc_cart_content() {
            if( class_exists( 'Woocommerce' ) ) {
                echo '<div class="agama-shopping-cart-dropdown">';
                    echo '<div class="agama-shopping-cart-content">';
                        echo '<ul class="cart_list product_list">';
                            echo '<li class="empty">'. __( 'No products in the cart.', 'agama-pro' ) .'</li>';
                        echo '</ul>';
                    echo '</div>';
                echo '</div>';
            }
        }
		
		/**
		 * Check if we're in an events archive.
		 *
		 * @since 1.3.7
		 * @return bool
		 */
		public static function is_events_archive() {
			if ( function_exists( 'tribe_is_event' ) ) {
				return ( tribe_is_event() && is_archive() );
			}
			return false;
		}
	}
}

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
