<?php

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Agama WooCommerc Support
 *
 * @since Agama v1.0
 */
if( class_exists( 'Woocommerce' ) ):
	class Agama_WooCommerce {
        
        /**
         * Class Constructor
         */
		function __construct() {
            global $woocommerce;
			
			if( get_option( 'woo_first_activation' ) == false ){ 
				add_option( 'woo_first_activation', 'hotcake', '', 'no' ); 
			}
			
			if ( $this->check_woo_status() == true && get_option( 'woo_first_activation' ) !== 'activated' ) 
				 add_action( 'init', array( $this, 'woocommerce_defaults' ), 1 );
            
            // Products per Page
			add_filter( 'loop_shop_per_page', array( $this, 'products_per_page' ), 20 );
			
			// Disable the default WooCommerce stylesheet
			add_filter( 'woocommerce_enqueue_styles', '__return_false' );
			 
			// Remove add to cart 
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
			
			// Unhook WooCommerce Wrappers
			remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
			remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
			
			// Remove showing results functionality site-wide
			remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
			
			// Hook Agama Wrappers
			add_action( 'woocommerce_before_main_content', array( $this, 'agama_wrapper_start' ), 10 );
			add_action( 'woocommerce_after_main_content', array( $this, 'agama_wrapper_end' ), 10 );
			
			// Remove Shop Title
			add_filter( 'woocommerce_show_page_title', array( $this, 'shop_title' ), 10 );
			
			// Remove WooCommerce Breadcrumb
			remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
			
			// Related Products Number
			add_filter( 'woocommerce_output_related_products_args', array( $this, 'related_products_args' ) );
			
			// Set the shop columns layout
			add_filter( 'loop_shop_columns', array( $this, 'shop_columns' ) );
			
			// Remove Sidebar from WooCommerce
			remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
			
			// Add custom shop sidebar
			add_action( 'woocommerce_sidebar', array( $this, 'shop_sidebar' ), 10 );
			
            if( version_compare( $woocommerce->version, '3.2.1', '>' ) ) {
                // Header add to Cart Fragment Init
                add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'header_add_to_cart_fragment' ) );
                // Header Cart Fragment Init
                add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'header_dropdown_cart_fragment' ) );
            } else { // WooCommerce 3.2.1 < Compatibility
                // Header add to Cart Fragment Init
                add_filter( 'add_to_cart_fragments', array( $this, 'header_add_to_cart_fragment' ) );
                // Header Cart Fragment Init
                add_filter( 'add_to_cart_fragments', array( $this, 'header_dropdown_cart_fragment' ) );
            }
			
			// Product Filter Init
			if( get_theme_mod( 'agama_products_filter', true ) ) {
				add_action( 'woocommerce_before_shop_loop', array( $this, 'products_filter' ), 20 );
			}
			
			// Change checkout coupon position
			remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
			add_action( 'rd_checkout_coupon_form', 'woocommerce_checkout_coupon_form', 10 );
			
			// Remove woocommerce ordering dropdown
			remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
			
			// Overwrite Products Ordering Init
			add_action( 'woocommerce_get_catalog_ordering_args', array( $this, 'overwrite_products_ordering' ), 20 );
			
			// Clear the Cart Init
			add_action( 'init', array( $this, 'clear_cart_url' ) );
			
			// Before Main Content Init
			add_action( 'woocommerce_before_shop_loop', array( $this, 'before_shop_loop' ), 20 );
			
			// Before Shop Loop Item Title
			add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'before_shop_loop_item_title' ), 20 );
			add_action( 'woocommerce_after_shop_loop_item_title',  array( $this, 'close_div' ), 1000 );
			
			// Products Thumbnail
			add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'thumbnail' ), 10 );
			remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
			
			// Reorder OnSale
			remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
			add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 19 );
			
			// Change rating position
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15 );
			
			// Wrap products on overview pages into an extra div for improved styling options
			add_action( 'woocommerce_before_shop_loop_item', array( $this, 'shop_overview_extra_div' ), 5 );
			add_action( 'woocommerce_after_shop_loop_item',  array( $this, 'close_div' ), 1000 );
			
			// add ajax cart / options buttons to the product init
			add_action( 'woocommerce_after_shop_loop_item', array( $this, 'add_cart_button' ), 16 );
			
			// Remove cross sells from cart page
			remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
			
			// Checkout steps init
			//add_action( 'woocommerce_before_checkout_form', array( $this, 'checkout_steps' ) );
			
			// Remove single product titles
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
			
			// Remove upsell products on single product page
			remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
			
			// Reorder single product excerpt
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 35 );
			
			// After single product summary (Before related products)
			add_action( 'woocommerce_after_single_product_summary', array( $this, 'related_products_script' ), 19 );
			
			// Custom product search widget init
			add_filter( 'get_product_search_form', array( $this, 'product_search_widget' ) );
		}
		
		/**
		 * Check WooCommerce Status
		 *
		 * @since 1.2.0
		 */
		function check_woo_status() {
			if( class_exists( 'Woocommerce' ) ) {
				return true;
            }
            return false;
		}
		
		/**
		 * Shop Columns
		 *
		 * @since 1.2.0
		 */
		function shop_columns() {
			global $woocommerce;
			$columns = esc_attr( get_theme_mod( 'agama_shop_columns', '3' ) );
			return $columns;
		}
        
        /**
         * Products Per Page
         *
         * @since 1.4.0
         */
        function products_per_page( $per_page ) {
            $per_page = isset( $_GET['product_count'] ) ? esc_attr( $_GET['product_count'] ) : esc_attr( get_theme_mod( 'agama_products_per_page', '12' ) );
            return $per_page;
        }
		
		/**
		 * Shop Wrapper Start
		 *
		 * @since 1.0.0
		 */
		function agama_wrapper_start() {
			$shop_columns = esc_attr( get_theme_mod( 'agama_shop_columns', '3' ) );
			if( ! is_active_sidebar( 'agama-shop-sidebar' ) || is_product()  ) {
				$class = 'col-md-12';
			} else {
				$class = 'col-md-9';
			}
			echo '<div id="primary" class="site-content ' . esc_attr( $class ) . '">';
				echo '<div id="content" role="main">';
		}
		
		/**
		 * Shop Wrapper End
		 *
		 * @since 1.0.0
		 */
		function agama_wrapper_end() {
				echo '</div>';
			echo '</div><!-- Primary End -->';
		}
		
		/**
		 * Remove Shop Title
		 *
		 * @since 1.0.3
		 */
		function shop_title() {
			return false;
		}
		
		/**
		 * Define Image Sizes
		 *
		 * @since 1.2.0
		 */
		function woocommerce_defaults() {
			$catalog = array(
				'width' 	=> '535',	// px
				'height'	=> '696',	// px
				'crop'		=> 1 		// true
			);
			$single = array(
				'width' 	=> '535',	// px
				'height'	=> '950',	// px
				'crop'		=> 0 		// true
			);
			$thumbnail = array(
				'width' 	=> '165',	// px
				'height'	=> '165',	// px
				'crop'		=> 1 		// false
			);
			// Image sizes
			update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
			update_option( 'shop_single_image_size', $single ); 		// Single product image
			update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
			update_option( 'woocommerce_frontend_css' , false );
			update_option( 'woocommerce_enable_lightbox' , false );
			update_option( 'woocommerce_single_image_crop', 'no' ); 
			update_option( 'woo_first_activation', 'activated' ); 
		}
		
		/**
		 * WooCommerce Extra Feature
		 * --------------------------
		 *
		 * Change number of related products on product page
		 * Set your own value for 'posts_per_page'
		 *
		 * @since 1.0.3
		 */ 
		function related_products_args( $args ) {
			$args['posts_per_page'] = 4; // 4 related products
			$args['columns'] = 4; // arranged in 1 column
			return $args;
		}
		
		/**
		 * Helper function to create the active list class
		 *
		 * @since 1.2.0
		 */
		function active_class( $key1, $key2 ) {
			if($key1 == $key2) return 'class="current_option"';
		}
		
		/**
		 * Helper function to build the query strings for the catalog ordering menu
		 *
		 * @since 1.2.0
		 */
		function build_query_string( $params = array(), $overwrite_key, $overwrite_value ) {
			$params[$overwrite_key] = $overwrite_value;
			return "?" . http_build_query($params);
		}
		
		/**
		 * Shop Sidebar
		 * 
		 * @since 1.2.0
		 */
		function shop_sidebar() {
			$shop_columns = esc_attr( get_theme_mod( 'agama_shop_columns', '3' ) );
			if( is_active_sidebar( 'agama-shop-sidebar' ) && ! is_product() ) {
				echo '<div id="secondary" class="widget-area col-md-3" role="complementary">';
					dynamic_sidebar( 'agama-shop-sidebar' );
				echo '</div>';
			}
		}
		
		/**
		 * Header add to Cart Fragment
		 *
		 * @since 1.2.0
		 */
		function header_add_to_cart_fragment( $fragments ) {
			global $woocommerce;
			
			ob_start(); ?>
			<a class="shopping_cart" href="<?php echo wc_get_cart_url(); ?>" ></a>
			<?php
			$fragments['a.shopping_cart'] = ob_get_clean();
	
			return $fragments;
		}
		
		/**
		 * Header Cart Fragment
		 *
		 * @since 1.2.0
		 */
		function header_dropdown_cart_fragment( $fragments ) {
			global $woocommerce;
	
			ob_start();?>
			<div class="cart_count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'agama-pro'), $woocommerce->cart->cart_contents_count); ?></div>
			<?php $fragments['.cart_count'] = ob_get_clean();
			
			return $fragments;
		}
		
		/**
		 * Products Filter
		 *
		 * @since 1.2.0
		 */
		function products_filter() {
			global $tv_config;
			
			$product_order['default'] 	 = __( 'Default Order', 'agama-pro' );
			$product_order['title'] 	 = __( 'Name', 'agama-pro' );
			$product_order['price'] 	 = __( 'Price', 'agama-pro' );
			$product_order['date'] 		 = __( 'Date', 'agama-pro' );
			$product_order['popularity'] = __( 'Popularity', 'agama-pro' );

			$product_sort['asc'] 		 = __( 'Click to order products ascending', 'agama-pro' );
			$product_sort['desc'] 		 = __( 'Click to order products descending', 'agama-pro' );

			$per_page_string 		 	 = __( 'Products per page', 'agama-pro' );

			$per_page 					 = esc_attr( get_theme_mod( 'agama_products_per_page', '12' ) );
			
			parse_str( $_SERVER['QUERY_STRING'], $params );
			
			$order  = ! empty( $tv_config['woocommerce']['product_order'] ) ? $tv_config['woocommerce']['product_order'] : 'default';
			$sort	= ! empty( $tv_config['woocommerce']['product_sort'] )  ? $tv_config['woocommerce']['product_sort'] : 'asc';
			$count	= ! empty( $tv_config['woocommerce']['product_count'] ) ? $tv_config['woocommerce']['product_count'] : $per_page;
			
			$sort = strtolower($sort);
			
			$output  = '<div class="product_filtering clearfix">';
				####################################################################
				### PRODUCTS ORDER
				####################################################################
				$output .= '<ul class="filter_param filter_param_order" onclick="">';
					$output .= '<li><span class="current_li">' . __( 'Sort by', 'agama-pro' ) . ': <strong>' . $product_order[$order] . '</strong></span>';
						$output .= '<ul>';
							$output .= '<li ' . $this->active_class( $order, 'default' ) . '><a href="' . $this->build_query_string( $params, 'product_order', 'default' ) . '">' . $product_order['default'] . '</a></li>';
							$output .= '<li ' . $this->active_class( $order, 'title' ) . '><a href="' . $this->build_query_string( $params, 'product_order', 'title' ) . '">' . $product_order['title'] . '</a></li>';
							$output .= '<li ' . $this->active_class( $order, 'price' ) . '><a href="' . $this->build_query_string( $params, 'product_order', 'price' ) . '">' . $product_order['price'] . '</a></li>';
							$output .= '<li ' . $this->active_class( $order, 'date' ) . '><a href="' . $this->build_query_string( $params, 'product_order', 'date' ) . '">' . $product_order['date'] . '</a></li>';
							$output .= '<li ' . $this->active_class( $order, 'popularity' ) . '><a href="' . $this->build_query_string( $params, 'product_order', 'popularity' ) . '">' . $product_order['popularity'] . '</a></li>';
						$output .= '</ul>';
					$output .= '</li>';
				$output .= '</ul>';
				####################################################################
				### PRODUCTS SORT
				####################################################################
				$output .= '<ul class="filter_param filter_param_sort" onclick="">';
					$output .= '<li>';
					if( $sort == 'desc' ) $output .= '<a title="' . $product_sort['asc'] . '" class="filter_param_asc fa fa-arrow-down"  href="' . $this->build_query_string( $params, 'product_sort', 'asc' ) . '"></a>';
					if( $sort == 'asc' )  $output .= '<a title="' . $product_sort['desc'] . '" class="filter_param_desc fa fa-arrow-up" href="' . $this->build_query_string( $params, 'product_sort', 'desc' ) . '"></a>';
					$output .= '</li>';
				$output .= '</ul>';
				####################################################################
				### PRODUCTS PER PAGE
				####################################################################
				$output .= '<ul class="filter_param filter_param_count" onclick="">';
					$output .= '<li><span class="current_li">' . __( 'Show', 'agama-pro' ) . ': <strong>' . $count . ' ' . $per_page_string . '</strong></span>';
						$output .= '<ul>';
							$output .= '<li ' . $this->active_class( $count, $per_page ) . '><a href="' . $this->build_query_string( $params, 'product_count', $per_page ) . '">' . $per_page . ' ' . $per_page_string .'</a></li>';
							$output .= '<li ' . $this->active_class( $count, $per_page * 2 ) . '><a href="' . $this->build_query_string( $params, 'product_count', $per_page * 2 ). '">' . ( $per_page * 2 ) . ' ' . $per_page_string . '</a></li>';
							$output .= '<li ' . $this->active_class( $count, $per_page * 3 ) . '><a href="' . $this->build_query_string( $params, 'product_count', $per_page * 3 ). '">' . ( $per_page * 3 ) . ' ' . $per_page_string . '</a></li>';
						$output .= '</ul>';
					$output .= '</li>';
				$output .= '</ul>';
			$output .= '</div>';
			
			echo ! empty( $output ) ? $output : '';
		}
		
		/**
		 * Custom Products Ordering
		 *
		 * @since 1.2.0
		 */
		function overwrite_products_ordering( $args ) {
			global $tv_config;
			
			if( ! empty( $tv_config['woocommerce']['disable_sorting_options'] ) ) return $args;
			
			// check the folllowing get parameters and session vars. if they are set overwrite the defaults
			$check = array( 'product_order', 'product_count', 'product_sort' );
			
			if( empty( $tv_config['woocommerce'] ) ) $tv_config['woocommerce'] = array();
			
			foreach( $check as $key ) {
				if( isset( $_GET[$key] ) ) $_SESSION['tv_woocommerce'][$key] = esc_attr( $_GET[$key] );
				if( isset( $_SESSION['tv_woocommerce'][$key] ) ) $tv_config['woocommerce'][$key] = $_SESSION['tv_woocommerce'][$key];
			}
			
			// is user wants to use new product order remove the old sorting parameter
			if( isset( $_GET['product_order'] ) && ! isset( $_GET['product_sort'] ) && isset( $_SESSION['tv_woocommerce']['product_sort'] ) ) {
				unset( $_SESSION['tv_woocommerce']['product_sort'], $tv_config['woocommerce']['product_sort'] );
			}
			
			extract( $tv_config['woocommerce'] );
			
			// set the product order
			if( ! empty( $product_order ) ) {
				switch ( $product_order ) {
					case 'date'  : $orderby = 'date'; $order = 'desc'; $meta_key = ''; break;
					case 'price' : $orderby = 'meta_value_num'; $order = 'asc'; $meta_key = '_price'; break;
					case 'popularity' : $orderby = 'meta_value_num'; $order = 'desc'; $meta_key = 'total_sales'; break;
					case 'title' : $orderby = 'title'; $order = 'asc'; $meta_key = ''; break;
					case 'default':
					default : $orderby = 'menu_order title'; $order = 'asc'; $meta_key = ''; break;
				}
			}
			
			// set the product count
			if( ! empty( $product_count ) && is_numeric( $product_count ) ) {
				$tv_data["tv_newshop_item_per_page"] = (int) $product_count;
			}
			
			// set the product sorting
			if( ! empty( $product_sort ) )
			{
				switch ( $product_sort ) {
					case 'desc' : $order = 'desc'; break;
					case 'asc' : $order = 'asc'; break;
					default : $order = 'asc'; break;
				}
			}
			
			if( isset( $orderby ) ) $args['orderby'] = $orderby;
			if( isset( $order ) ) 	$args['order'] = $order;
			if( ! empty( $meta_key ) ) {
				$args['meta_key'] = $meta_key;
			}
		
			$tv_config['woocommerce']['product_sort'] = $args['order'];
			
			return $args;
		}
		
		/**
		 * Check for empty-cart get param to clear the cart
		 *
		 * @since 1.2.0
		 */
		function clear_cart_url() {
			global $woocommerce;
	
			if( isset( $_GET['empty-cart'] ) ) {
				$woocommerce->cart->empty_cart(); 
			}
		}
		
		/**
		 * Before Main Content
		 *
		 * @hook woocommerce_before_main_content
		 * @since 1.2.0
		 */
		function before_shop_loop() {
			if( ! is_product() ) {
				$col_class = esc_attr( get_theme_mod( 'agama_shop_columns', '3' ) ); 
				if( $col_class == 4 ) {
					$col_class = 'shop_four_col';
				} elseif( $col_class == 2 ) {
					$col_class = 'shop_two_col';
				} else {
					$col_class = 'shop_three_col';
				} ?>
				<script type='application/javascript'>
				var j$ = jQuery;

				j$.noConflict();
				j$(window).load(function() {
					j$(".product").addClass("<?php echo esc_js( $col_class ); ?>");
					j$(".products").css("opacity","1");
				})
				</script>
		<?php
			}
		}
		
		/**
		 * Before Shop Loop Item Title
		 *
		 * @hook woocommerce_before_shop_loop_item_title
		 * @since 1.2.0
		 */
		function before_shop_loop_item_title() {
			echo '<div class="product_title">';
		}
		
		/**
		 * Close DIV
		 *
		 * @since 1.2.0
		 */
		function close_div() {
			echo '</div>';
		}
		
		/**
		 * Products Thumbnail
		 *
		 * @since 1.2.0
		 */
		function thumbnail( $asdf ) {
			global $product;
			
			//$rating = $product->get_rating_html(); // get rating
			
			$id = get_the_ID();
			$size = 'shop_catalog';
			
			echo '<div class="thumbnail_wrapper">';
			echo $this->gallery_first_thumb( $id, $size );
			echo get_the_post_thumbnail( $id , $size );
			if( $product->get_type() == 'simple' ) echo '<div class="item_current_status"><i class="icon_status_inner"></i></div>';
			echo '</div>';
		}
		
		/**
		 * First Thumb
		 *
		 * @since 1.2.0
		 */
		function gallery_first_thumb( $id, $size ) {
			$active_hover = get_post_meta( $id, 'agama_product_hover', true );

			if($active_hover == 'yes') {
				$product_gallery = get_post_meta( $id, '_product_image_gallery', true );
				
				if( ! empty( $product_gallery ) ) {
					$gallery	= explode( ',', $product_gallery );
					$image_id 	= $gallery[0];
					$image 		= wp_get_attachment_image( $image_id, $size, false, array( 'class' => "attachment-$size woo_product_hover" ));
					
					if( ! empty( $image ) ) return $image;
				}
			}
		}
		
		/**
		 * Add ajax cart / options buttons to the product
		 *
		 * @hook woocommerce_after_shop_loop_item
		 * @since 1.2.0
		 */
		function add_cart_button() {
			global $product;

			if( $product->get_type() == 'bundle' ){
				$product = new WC_Product_Bundle( $product->get_id() );
			}

			$extraClass  = "";

			ob_start();
			woocommerce_template_loop_add_to_cart();
			$output = ob_get_clean();

			if(!empty($output))
			{
				$pos = strpos($output, ">");

				if( $pos !== false ) {
					$output = substr_replace($output,"> ", $pos , strlen(1));
				}
			}


			if( $product->get_type() == 'variable' && empty( $output ) )
			{
				$output = '<a class="add_to_cart_button button product_type_variable" href="'. get_permalink( $product->get_id() ) .'"> ' . __( 'Select options', 'agama-pro' ) .'</a>';
			}
			if( in_array( $product->get_type(), array('subscription', 'simple', 'bundle') ) )
			{
				$output .= '<a class="button show_details_button" href="'. get_permalink( $product->get_id() ) .'">'. __( 'Details', 'agama-pro' ) .'</a>';
			}
			if (!$product->is_in_stock()) {
                $output =  '<a href="'.get_permalink().'" rel="nofollow" class="button add_to_cart_button more_info_button out_stock_button"> ' . __( 'Out of Stock', 'agama-pro' ) . '</a>';
			}
			else
			{
				$extraClass  = 'single_button';
			}

			if( empty( $extraClass ) ) $output .= ' <span class="button-mini-delimiter"></span>';


			if( $output && ! post_password_required() ) echo '<div class="custom_cart_button '. $extraClass .' clear">' . $output . '</div>';
		}
		
		/**
		 * Wrap products on overview pages into an extra div for improved styling options. adds "product_on_sale" class if prodct is on sale
		 * 
		 * @since 1.2.0
		 */
		function shop_overview_extra_div() {
			global $product;
			
			$product_class = $product->is_on_sale() ? 'product_on_sale' : '';
			
			echo '<div class="inner_product ' . $product_class . '">';
		}
		
		/** 
		 * Checkout Steps
		 *
		 * @since 1.2.0
		 */
		function checkout_steps() {
			echo '<div class="checkout_steps">';
			if( ! is_user_logged_in() ) {
				echo '<div class="checkout_step step_signin active_step">1. ' . __( 'Sign in', 'agama-pro' ) . '</div>';
				echo '<div class="checkout_step step_billing">2. ' . __( 'Billing', 'agama-pro' ) . '</div>';
				echo '<div class="checkout_step step_payment">3. ' . __( 'Payment', 'agama-pro' ) . '</div>';
				echo '<div class="checkout_step last_step">4. ' . __( 'Confirmation', 'agama-pro' ) . '</div>';
			} else {
				echo '<div class="checkout_step logged step_billing active_step">1. ' . __( 'Billing', 'agama-pro' ) . '</div>';
				echo '<div class="checkout_step logged step_payment ">2. ' . __( 'Payment', 'agama-pro' ) . '</div>';
				echo '<div class="checkout_step logged last_step">3. ' . __( 'Confirmation', 'agama-pro' ) . '</div>';
			}
			echo '</div>';
		}
		
		/**
		 * Related Products Script
		 *
		 * @since 1.2.0
		 */
		function related_products_script() { ?>
			<script>
			jQuery(window).load(function() {
				jQuery('ul.products li').addClass('shop_four_col');
				jQuery('ul.products').css('opacity', '1');
			});
			</script>
		<?php
		}
		
		/**
		 * Custom Product Search Widget
		 *
		 * @since 1.2.0
		 */
		function product_search_widget() {
			$form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/'  ) ) . '">
				<div class="vision-search-form">
						<span class="screen-reader-text">' . _x( 'Search for:', 'screen-reader', 'agama-pro' ) . '</span>
						<input type="text" class="vision-search-field" placeholder="' . __( 'Search products ...', 'agama-pro' ) . '" value="' . get_search_query() .'" name="s" title="' . esc_attr_x( 'Search for:', 'agama-pro' ) . '" />
						<input type="submit" class="vision-search-submit" value="&#xf002;" />
						<input type="hidden" name="post_type" value="product" />
				</div>
			</form>';
			return $form;
		}
	}
	new Agama_WooCommerce();
endif;

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
