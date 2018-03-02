<?php

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

#####################################################################
# MIGRATE THEME OPTIONS FROM REDUX TO CUSTOMIZER | @since 1.3.0
#####################################################################

/**
 * Start Migration Process
 *
 * @since 1.3.0
 */
if( ! get_option( 'agama_pro_options_migrated' ) ) {
	if( agama_pro_options_migrate() ) {
		remove_action( 'admin_notices', 'agama_pro_migrate_theme_options_warning' );
		add_action( 'admin_notices', 'agama_pro_migrate_theme_options_success' );
	}
}

/**
 * Migrating Core
 *
 * @since 1.3.0
 */
function agama_pro_options_migrate() {
	$my_theme = wp_get_theme();
	$version  = $my_theme->get( 'Version' );
	
	// Check if migration is needed or not, ReduX theme options are stored into "agama_pro" table
	if( get_option( 'agama_pro' ) ) {
		add_action( 'admin_notices', 'agama_pro_migrate_theme_options_warning' );
	}
	
	// If admin fires migration link start with theme options migration
	if( isset( $_GET['options_migrate'] ) && $_GET['options_migrate'] == 'agama-pro' ) {
		
		##################################################################################
		# GENERAL OPTIONS | 100%
		##################################################################################
		if( Agama::setting( 'agama_fontawesome', 'on' ) == 'on' ) {
			$agama_fontawesome = true;
		} else {
			$agama_fontawesome = false;
		}
		##################################################################################
		# LAYOUT OPTIONS | 100%
		##################################################################################
		$agama_layout_style = Agama::setting( 'agama_layout_style', 'boxed' );
		// Sidebar Position
		if( Agama::setting( 'agama_sidebar_position', '2cr' ) == '2cr' ) {
			$agama_sidebar_position = 'right';
		} else {
			$agama_sidebar_position = 'left';
		}
		// NiceScroll
		if( Agama::setting( 'agama_nicescroll', 'on' ) == 'on' ) {
			$agama_nicescroll = true;
		} else {
			$agama_nicescroll = false;
		}
		// Back to top
		if( Agama::setting( 'agama_back_to_top', 'on' ) == 'on' ) {
			$agama_back_to_top = true;
		} else {
			$agama_back_to_top = false;
		}
		// Preloader
		if( Agama::setting( 'agama_preloader', 'on' ) == 'on' ) {
			$agama_preloader = true;
		} else {
			$agama_preloader = false;
		}
		// Preloader Background Color
		$agama_preloader_bg_color = Agama::setting( 'agama_preloader_bg_color', '#000' );
		##################################################################################
		# HEADER OPTIONS | 100%
		##################################################################################
		// Header Logo
		if( Agama::setting( 'agama_logo', '' ) ) {
			$agama_logo = Agama::setting( 'agama_logo', '' );
			$agama_logo_url = $agama_logo['url'];
		}
		// Header Style
		if( Agama::setting( 'agama_header_style', 'v3' ) == 'default' ) {
			$agama_header_style = 'v1';
		} 
		else
		if( Agama::setting( 'agama_header_style', 'v3' ) == 'sticky' ) {
			$agama_header_style = 'v2';
		}
		else
		if( Agama::setting( 'agama_header_style', 'v3' ) == 'v3' ) {
			$agama_header_style = 'v3';
		}
		// Top Navigation
		if( Agama::setting( 'agama_top_navigation', 'on' ) == 'on' ) {
			$agama_top_navigation = true;
		} else {
			$agama_top_navigation = false;
		}
		// Top Social Icons
		if( Agama::setting( 'agama_top_nav_social', 'on' ) == 'on' ) {
			$agama_top_nav_social = true;
		} else {
			$agama_top_nav_social = false;
		}
		// Header Top Margin
		$agama_header_top_margin = Agama::setting( 'agama_header_top_margin', '0' );
		// Header Inner Margin
		$agama_header_inner_margin = Agama::setting( 'agama_header_inner_margin', '24' );
		// Header Top Border Size
		$agama_header_top_border_size = Agama::setting( 'agama_header_top_border_size', array( 'border-style' => 'solid', 'border-top' => '3px' ) );
		$agama_header_top_border_size_width = str_replace( 'px', '', $agama_header_top_border_size['border-top'] );
		$agama_header_top_border_style = $agama_header_top_border_size['border-style'];
		// Header Image
		if( Agama::setting( 'agama_header_image_type', 'single' ) == 'single' ) {
			$agama_header_image = Agama::setting( 'agama_header_image', '' );
			$agama_header_image = $agama_header_image['url'];
		}
		// Multi Header Images | Take just 1
		if( Agama::setting( 'agama_header_image_type', 'single' ) == 'multi' ) {
			$agama_header_image = Agama::setting( 'agama_header_images', '' );
			// Detect if more than 1 image
			if( preg_match( '/,/', $agama_header_image ) ) {
				$agama_header_image = explode( ',', $agama_header_image );
				$agama_header_image = $agama_header_image[0];
				$agama_header_image = wp_get_attachment_image_src( $agama_header_image, 'full' );
				$agama_header_image = $agama_header_image[0];
			} else {
				$agama_header_image = wp_get_attachment_image_src( $agama_header_image, 'full' );
				$agama_header_image = $agama_header_image[0];
			}
		}
		// Header Image Visibility
		$agama_header_image_visibility = Agama::setting( 'agama_header_image_visibility', 'homepage' );
		// Header Video
		if( Agama::setting( 'agama_header_image_video', false ) == true ) {
			$agama_header_image_video = true;
		} else {
			$agama_header_image_video = false;
		}
		$agama_header_image_video_position = Agama::setting( 'agama_header_image_video_position', 'center' );
		// Header Search Icon
		if( Agama::setting( 'agama_header_search', 'on' ) == 'on' ) {
			$agama_header_search = true;
		} else {
			$agama_header_search = false;
		}
		##################################################################################
		# BREADCRUMB OPTIONS | 100%
		##################################################################################
		if( Agama::setting( 'agama_title_bar', 'on' ) == 'on' ) {
			$agama_breadcrumb = true;
		} else {
			$agama_breadcrumb = false;
		}
		$agama_breadcrumb_style = Agama::setting( 'agama_breadcrumb_size', 'mini' );
		$agama_breadcrumb_background = Agama::setting( 'agama_breadcrumb_background', array( 'background-color' => '#f5f5f5' ) );
		// Breadcrumb Background Color
		if( $agama_breadcrumb_background['background-color'] ) {
			$agama_breadcrumb_bg_color = $agama_breadcrumb_background['background-color'];
		} else {
			$agama_breadcrumb_bg_color = '';
		}
		// Breadcrumb Background Image
		if( $agama_breadcrumb_background['background-image'] ) {
			$agama_breadcrumb_bg_img = $agama_breadcrumb_background['background-image'];
		} else {
			$agama_breadcrumb_bg_img = '';
		}
		// Breadcrumb Background Image Repeat
		if( $agama_breadcrumb_background['background-repeat'] ) {
			$agama_breadcrumb_bg_img_repeat = $agama_breadcrumb_background['background-repeat'];
		} else {
			$agama_breadcrumb_bg_img_repeat = 'no-repeat';
		}
		// Breadcrumb Background Image Size
		if( $agama_breadcrumb_background['background-size'] ) {
			$agama_breadcrumb_bg_img_size = $agama_breadcrumb_background['background-size'];
		} else {
			$agama_breadcrumb_bg_img_size = 'inherit';
		}
		// Breadcrumb Background Image Attachment
		if( $agama_breadcrumb_background['background-attachment'] ) {
			$agama_breadcrumb_bg_img_attachment = $agama_breadcrumb_background['background-attachment'];
		} else {
			$agama_breadcrumb_bg_img_attachment = 'inherit';
		}
		// Breadcrumb Background Image Position
		if( $agama_breadcrumb_background['background-position'] ) {
			$agama_breadcrumb_bg_img_position = $agama_breadcrumb_background['background-position'];
		} else {
			$agama_breadcrumb_bg_img_position = 'inherit';
		}
		// Breadcrumb Links Color
		$agama_breadcrumb_links_color = Agama::setting( 'agama_breadcrumb_links_color', '#444' );
		$agama_breadcrumb_text_color = Agama::setting( 'agama_breadcrumb_text_color', '#444' );
		##################################################################################
		# FRONTPAGE BOXES OPTIONS | 100%
		##################################################################################
		if( Agama::setting( 'agama_frontpage_boxes', 'on' ) == 'on' ) {
			$agama_frontpage_boxes = true;
		} else {
			$agama_frontpage_boxes = false;
		}
		// Frontpage Boxes Visibility
		$agama_frontpage_boxes_visibility = Agama::setting( 'agama_frontpage_boxes_visibility', 'homepage' );
		// Frontpage Box 1 Enable
		if( Agama::setting( 'agama_frontpage_box_1', 'on' ) == 'on' ) {
			$agama_frontpage_box_1_enable = true;
		} else {
			$agama_frontpage_box_1_enable = false;
		}
		// Frontpage Box 2 Enable
		if( Agama::setting( 'agama_frontpage_box_2', 'on' ) == 'on' ) {
			$agama_frontpage_box_2_enable = true;
		} else {
			$agama_frontpage_box_2_enable = false;
		}
		// Frontpage Box 3 Enable
		if( Agama::setting( 'agama_frontpage_box_3', 'on' ) == 'on' ) {
			$agama_frontpage_box_3_enable = true;
		} else {
			$agama_frontpage_box_3_enable = false;
		}
		// Frontpage Box 4 Enable
		if( Agama::setting( 'agama_frontpage_box_4', 'on' ) == 'on' ) {
			$agama_frontpage_box_4_enable = true;
		} else {
			$agama_frontpage_box_4_enable = false;
		}
		// Frontpage Box 1 Title
		$agama_frontpage_box_1_title = Agama::setting( 'agama_frontpage_box_1_title', __( 'Responsive Layout', 'agama-pro' ) );
		// Frontpage Box 2 Title
		$agama_frontpage_box_2_title = Agama::setting( 'agama_frontpage_box_2_title', __( 'Endless Possibilities', 'agama-pro' ) );
		// Frontpage Box 3 Title
		$agama_frontpage_box_3_title = Agama::setting( 'agama_frontpage_box_3_title', __( 'Boxed & Wide Layouts', 'agama-pro' ) );
		// Frontpage Box 4 Title
		$agama_frontpage_box_4_title = Agama::setting( 'agama_frontpage_box_4_title', __( 'Powerful Performance', 'agama-pro' ) );
		// Frontpage Box 1 Image
		if( Agama::setting( 'agama_frontpage_box_1_icon_type', 'custom' ) == 'custom' ) {
			$agama_frontpage_box_1_image = Agama::setting( 'agama_frontpage_box_1_image', false );
		} else {
			$agama_frontpage_box_1_image = '';
		}
		// Frontpage Box 2 Image
		if( Agama::setting( 'agama_frontpage_box_2_icon_type', 'custom' ) == 'custom' ) {
			$agama_frontpage_box_2_image = Agama::setting( 'agama_frontpage_box_2_image', false );
		} else {
			$agama_frontpage_box_2_image = '';
		}
		// Frontpage Box 3 Image
		if( Agama::setting( 'agama_frontpage_box_3_icon_type', 'custom' ) == 'custom' ) {
			$agama_frontpage_box_3_image = Agama::setting( 'agama_frontpage_box_3_image', false );
		} else {
			$agama_frontpage_box_3_image = '';
		}
		// Frontpage Box 4 Image
		if( Agama::setting( 'agama_frontpage_box_4_icon_type', 'custom' ) == 'custom' ) {
			$agama_frontpage_box_4_image = Agama::setting( 'agama_frontpage_box_4_image', false );
		} else {
			$agama_frontpage_box_4_image = '';
		}
		// Frontpage Box 1 Image URL
		if( Agama::setting( 'agama_frontpage_box_1_icon_type', 'custom' ) == 'custom' && $agama_frontpage_box_1_image['url'] ) {
			$agama_frontpage_box_1_image_url = $agama_frontpage_box_1_image['url'];
		} else {
			$agama_frontpage_box_1_image_url = '';
		}
		// Frontpage Box 2 Image URL
		if( Agama::setting( 'agama_frontpage_box_2_icon_type', 'custom' ) == 'custom' && $agama_frontpage_box_2_image['url'] ) {
			$agama_frontpage_box_2_image_url = $agama_frontpage_box_2_image['url'];
		} else {
			$agama_frontpage_box_2_image_url = '';
		}
		// Frontpage Box 3 Image URL
		if( Agama::setting( 'agama_frontpage_box_3_icon_type', 'custom' ) == 'custom' && $agama_frontpage_box_3_image['url'] ) {
			$agama_frontpage_box_3_image_url = $agama_frontpage_box_3_image['url'];
		} else {
			$agama_frontpage_box_3_image_url = '';
		}
		// Frontpage Box 4 Image URL
		if( Agama::setting( 'agama_frontpage_box_4_icon_type', 'custom' ) == 'custom' && $agama_frontpage_box_4_image['url'] ) {
			$agama_frontpage_box_4_image_url = $agama_frontpage_box_4_image['url'];
		} else {
			$agama_frontpage_box_4_image_url = '';
		}
		// Frontpage Box 1 Image Size
		$frontpage_box_image_1_size = Agama::setting( 'agama_frontpage_box_1_image_size', array( 'width' => '100', 'height' => '80' ) );
		// Frontpage Box 2 Image Size
		$frontpage_box_image_2_size = Agama::setting( 'agama_frontpage_box_2_image_size', array( 'width' => '100', 'height' => '80' ) );
		// Frontpage Box 3 Image Size
		$frontpage_box_image_3_size = Agama::setting( 'agama_frontpage_box_3_image_size', array( 'width' => '100', 'height' => '80' ) );
		// Frontpage Box 4 Image Size
		$frontpage_box_image_4_size = Agama::setting( 'agama_frontpage_box_4_image_size', array( 'width' => '100', 'height' => '80' ) );
		// Frontpage Box 1 Icon
		$agama_frontpage_box_1_icon = Agama::setting( 'agama_frontpage_box_1_icon', 'fa-tablet' );
		// Frontpage Box 2 Icon
		$agama_frontpage_box_2_icon = Agama::setting( 'agama_frontpage_box_2_icon', 'fa-cogs' );
		// Frontpage Box 3 Icon
		$agama_frontpage_box_3_icon = Agama::setting( 'agama_frontpage_box_3_icon', 'fa-laptop' );
		// Frontpage Box 4 Icon
		$agama_frontpage_box_4_icon = Agama::setting( 'agama_frontpage_box_4_icon', 'fa-magic' );
		// Frontpage Box 1 Icon Color
		$agama_frontpage_box_1_icon_color = Agama::setting( 'agama_frontpage_box_1_icon_color', '#f7a805' );
		// Frontpage Box 2 Icon Color
		$agama_frontpage_box_2_icon_color = Agama::setting( 'agama_frontpage_box_2_icon_color', '#f7a805' );
		// Frontpage Box 3 Icon Color
		$agama_frontpage_box_3_icon_color = Agama::setting( 'agama_frontpage_box_3_icon_color', '#f7a805' );
		// Frontpage Box 4 Icon Color
		$agama_frontpage_box_4_icon_color = Agama::setting( 'agama_frontpage_box_4_icon_color', '#f7a805' );
		// Frontpage Box 1 Text
		$agama_frontpage_box_1_text = Agama::setting( 'agama_frontpage_box_1_text', __( 'Powerful Layout with Responsive functionality that can be adapted to any screen size.', 'agama-pro' ) );
		// Frontpage Box 2 Text
		$agama_frontpage_box_2_text = Agama::setting( 'agama_frontpage_box_2_text', __( 'Complete control on each & every element that provides endless customization possibilities.', 'agama-pro' ) );
		// Frontpage Box 3 Text
		$agama_frontpage_box_3_text = Agama::setting( 'agama_frontpage_box_3_text', __( 'Stretch your Website to the Full Width or make it boxed to surprise your visitors.', 'agama-pro' ) );
		// Frontpage Box 4 Text
		$agama_frontpage_box_4_text = Agama::setting( 'agama_frontpage_box_4_text', __( 'Optimized code that are completely customizable and deliver unmatched fast performance.', 'agama-pro' ) );
		// Frontpage Box 1 Read More Button
		if( Agama::setting( 'agama_frontpage_box_1_readmore', 'on' ) == 'on' ) {
			$agama_frontpage_box_1_readmore = true;
		} else {
			$agama_frontpage_box_1_readmore = false;
		}
		// Frontpage Box 2 Read More Button
		if( Agama::setting( 'agama_frontpage_box_2_readmore', 'on' ) == 'on' ) {
			$agama_frontpage_box_2_readmore = true;
		} else {
			$agama_frontpage_box_2_readmore = false;
		}
		// Frontpage Box 3 Read More Button
		if( Agama::setting( 'agama_frontpage_box_3_readmore', 'on' ) == 'on' ) {
			$agama_frontpage_box_3_readmore = true;
		} else {
			$agama_frontpage_box_3_readmore = false;
		}
		// Frontpage Box 4 Read More Button
		if( Agama::setting( 'agama_frontpage_box_4_readmore', 'on' ) == 'on' ) {
			$agama_frontpage_box_4_readmore = true;
		} else {
			$agama_frontpage_box_4_readmore = false;
		}
		// Frontpage Box 1 Read More Button Text
		$agama_frontpage_box_1_readmore_txt = Agama::setting( 'agama_frontpage_box_1_readmore_txt', __( 'Read More', 'agama-pro' ) );
		// Frontpage Box 2 Read More Button Text
		$agama_frontpage_box_2_readmore_txt = Agama::setting( 'agama_frontpage_box_2_readmore_txt', __( 'Read More', 'agama-pro' ) );
		// Frontpage Box 3 Read More Button Text
		$agama_frontpage_box_3_readmore_txt = Agama::setting( 'agama_frontpage_box_3_readmore_txt', __( 'Read More', 'agama-pro' ) );
		// Frontpage Box 4 Read More Button Text
		$agama_frontpage_box_4_readmore_txt = Agama::setting( 'agama_frontpage_box_4_readmore_txt', __( 'Read More', 'agama-pro' ) );
		// Frontpage Box 1 Read More Button URL
		$agama_frontpage_box_1_readmore_url = Agama::setting( 'agama_frontpage_box_1_readmore_url', '#' );
		// Frontpage Box 2 Read More Button URL
		$agama_frontpage_box_2_readmore_url = Agama::setting( 'agama_frontpage_box_2_readmore_url', '#' );
		// Frontpage Box 3 Read More Button URL
		$agama_frontpage_box_3_readmore_url = Agama::setting( 'agama_frontpage_box_3_readmore_url', '#' );
		// Frontpage Box 4 Read More Button URL
		$agama_frontpage_box_4_readmore_url = Agama::setting( 'agama_frontpage_box_4_readmore_url', '#' );
		##################################################################################
		# BLOG OPTIONS | 100%
		##################################################################################
		$agama_blog_layout = Agama::setting( 'agama_blog_layout', 'list' );
		// Blog Thumbnails Permalink
		if( Agama::setting( 'agama_blog_thumbnails_permalink', 'on' ) == 'on' ) {
			$agama_blog_thumbnails_permalink = true;
		} else {
			$agama_blog_thumbnails_permalink = false;
		}
		// Blog Excerpt
		$agama_blog_excerpt = Agama::setting( 'agama_blog_excerpt', '60' );
		// Blog Read More Link
		if( Agama::setting( 'agama_blog_readmore_url', 'on' ) == 'on' ) {
			$agama_blog_readmore_url = true;
		} else {
			$agama_blog_readmore_url = false;
		}
		// Blog Tags
		if( Agama::setting( 'agama_blog_tags', 'on' ) == 'on' ) {
			$agama_blog_tags = true;
		} else {
			$agama_blog_tags = false;
		}
		// Blog Pagination
		if( Agama::setting( 'agama_blog_pagination', 'on' ) == 'on' ) {
			$agama_blog_pagination = true;
		} else {
			$agama_blog_pagination = false;
		}
		// Blog Date
		if( Agama::setting( 'agama_blog_date', 'on' ) == 'on' ) {
			$agama_blog_date = true;
		} else {
			$agama_blog_date = false;
		}
		// Blog Author
		if( Agama::setting( 'agama_blog_author', 'on' ) == 'on' ) {
			$agama_blog_author = true;
		} else {
			$agama_blog_author = false;
		}
		// Blog Category
		if( Agama::setting( 'agama_blog_category', 'on' ) == 'on' ) {
			$agama_blog_category = true;
		} else {
			$agama_blog_category = false;
		}
		// Blog Comments Count
		if( Agama::setting( 'agama_blog_comments_count', 'on' ) == 'on' ) {
			$agama_blog_comments_count = true;
		} else {
			$agama_blog_comments_count = false;
		}
		// Blog Infinite Scroll
		if( Agama::setting( 'agama_blog_infinite_scroll', 'off' ) == 'off' ) {
			$agama_blog_infinite_scroll = false;
		} else {
			$agama_blog_infinite_scroll = true;
		}
		// Blog Infinite Trigger
		$agama_blog_infinite_trigger = Agama::setting( 'agama_blog_infinite_trigger', 'button' );
		// Blog Images Lightbox
		if( Agama::setting( 'agama_blog_lightbox', 'on' ) == 'on' ) {
			$agama_blog_lightbox = true;
		} else {
			$agama_blog_lightbox = false;
		}
		##################################################################################
		# PORTFOLIO OPTIONS | 100%
		##################################################################################
		$agama_portfolio_per_page = Agama::setting( 'agama_portfolio_per_page', '12' );
		// Portfolio Navigation Filter
		if( Agama::setting( 'agama_portfolio_nav_filter', 'on' ) == 'on' ) {
			$agama_portfolio_nav_filter = true;
		} else {
			$agama_portfolio_nav_filter = false;
		}
		// Portfolio Excerpt
		$agama_portfolio_excerpt = Agama::setting( 'agama_portfolio_excerpt', '80' );
		// Portfolio Pagination
		if( Agama::setting( 'agama_portfolio_pagination', 'on' ) == 'on' ) {
			$agama_portfolio_pagination = true;
		} else {
			$agama_portfolio_pagination = false;
		}
		##################################################################################
		# SOCIAL ICONS OPTIONS | 100%
		##################################################################################
		if( Agama::setting( 'agama_footer_social', 'on' ) == 'on' ) {
			$agama_footer_social = true;
		} else {
			$agama_footer_social = false;
		}
		##################################################################################
		# SOCIAL SHARE OPTIONS | 100%
		##################################################################################
		if( Agama::setting( 'agama_share', 'on' ) == 'on' ) {
			$agama_share_box = true;
		} else {
			$agama_share_box = false;
		}
		// Social Share Box Visibility
		$agama_share_box_visibility = Agama::setting( 'agama_share_area', 'posts' );
		// Social Share Facebook
		if( Agama::setting( 'agama_share_facebook', 'on' ) == 'on' ) {
			$agama_share_facebook = true;
		} else {
			$agama_share_facebook = false;
		}
		// Social Share Twitter
		if( Agama::setting( 'agama_share_twitter', 'on' ) == 'on' ) {
			$agama_share_twitter = true;
		} else {
			$agama_share_twitter = false;
		}
		// Social Share Pinterest
		if( Agama::setting( 'agama_share_pinterest', 'on' ) == 'on' ) {
			$agama_share_pinterest = true;
		} else {
			$agama_share_pinterest = false;
		}
		// Social Share Google+
		if( Agama::setting( 'agama_share_google_plus', 'on' ) == 'on' ) {
			$agama_share_google_plus = true;
		} else {
			$agama_share_google_plus = false;
		}
		// Social Share RSS
		if( Agama::setting( 'agama_share_rss', 'on' ) == 'on' ) {
			$agama_share_rss = true;
		} else {
			$agama_share_rss = false;
		}
		// Social Share Email
		if( Agama::setting( 'agama_share_email', 'on' ) == 'on' ) {
			$agama_share_email = true;
		} else {
			$agama_share_email = false;
		}
		##################################################################################
		# STYLING | 100%
		##################################################################################
		// Agama Skin
		$agama_skin = Agama::setting( 'agama_skin', 'light' );
		// Agama Primary Color
		$agama_primary_color = Agama::setting( 'agama_primary_color', '#f7a805' );
		// Agama Links Color
		$agama_link_color = Agama::setting( 'agama_primary_color', '#f7a805' );
		// Agama Links Hover Color
		$agama_link_hover_color = Agama::setting( 'agama_link_hover_color', '#333' );
		// Agama Headers Background
		$agama_header_background = Agama::setting( 'agama_header_background', array( 'background-color' => '#fff' ) );
		// Agama Headers Background Color
		if( ! $agama_header_background['background-color'] ) {
			$agama_header_bg_color = '#fff';
		} else {
			$agama_header_bg_color = $agama_header_background['background-color'];
		}
		// Agama Headers Backgorund Image
		if( $agama_header_background['background-image'] ) {
			$agama_header_bg_image = $agama_header_background['background-image'];
		} else {
			$agama_header_bg_image = '';
		}
		// Agama Headers Background Repeat
		if( $agama_header_background['background-repeat'] ) {
			$agama_header_bg_image_repeat = $agama_header_background['background-repeat'];
		} else {
			$agama_header_bg_image_repeat = 'no-repeat';
		}
		// Agama Headers Background Size
		if( $agama_header_background['background-size'] ) {
			$agama_header_bg_image_size = $agama_header_background['background-size'];
		} else {
			$agama_header_bg_image_size = 'inherit';
		}
		// Agama Headers Background Attachment
		if( $agama_header_background['background-attachment'] ) {
			$agama_header_bg_image_attachment = $agama_header_background['background-attachment'];
		} else {
			$agama_header_bg_image_attachment = 'inherit';
		}
		// Agama Headers Background Position
		if( $agama_header_background['background-position'] ) {
			$agama_header_bg_image_position = $agama_header_background['background-position'];
		} else {
			$agama_header_bg_image_position = 'inherit';
		}
		// Agama Header Links Color
		$agama_header_links_color = Agama::setting( 'agama_header_links_color', '#757575' );
		// Agama Header Links Hover Color
		$agama_header_links_hover_color = Agama::setting( 'agama_header_links_hover_color', '#333' );
		// Body Animate Enable
		if( Agama::setting( 'agama_body_animate', 'on' ) == 'on' ) {
			$agama_body_animate = true;
		} else {
			$agama_body_animate = false;
		}
		// Agama Body Animate Images
		$agama_body_animate_images = Agama::setting( 'agama_body_animate_images', '' );
		// Check if more than one image used
		if( preg_match( '/,/', $agama_body_animate_images ) ) {
			$agama_body_animate_images  = explode( ',', $agama_body_animate_images );
			$agama_body_animate_image_1  = $agama_body_animate_images[0];
			$agama_body_animate_image_1  = wp_get_attachment_image_src( $agama_body_animate_image_1, 'full' );
			$agama_body_animate_image_1 = $agama_body_animate_image_1[0];
			// Second Image
			if( $agama_body_animate_images[1] ) {
				$agama_body_animate_image_2 = $agama_body_animate_images[1];
				$agama_body_animate_image_2 = wp_get_attachment_image_src( $agama_body_animate_image_2, 'full' );
				$agama_body_animate_image_2 = $agama_body_animate_image_2[0];
			} else {
				$agama_body_animate_image_2 = '';
			}
			// Third Image
			if( $agama_body_animate_images[2] ) {
				$agama_body_animate_image_3 = $agama_body_animate_images[2];
				$agama_body_animate_image_3 = wp_get_attachment_image_src( $agama_body_animate_image_3, 'full' );
				$agama_body_animate_image_3 = $agama_body_animate_image_3[0];
			} else {
				$agama_body_animate_image_3 = '';
			}
		} else { // Singe Image Used
			$agama_body_animate_images  = wp_get_attachment_image_src( $agama_body_animate_images, 'full' );
			$agama_body_animate_image_1 = $agama_body_animate_images[0];
		}
		// Body Animate Background Color
		$agama_body_animate_color = Agama::setting( 'agama_body_animate_color', array( 'rgba' => 'rgba(0, 0, 0, .7)' ) );
		// Body Animate Background Delay
		$agama_body_animate_delay = Agama::setting( 'agama_body_animate_delay', '6000' );
		// Footer Widget Background Color
		$agama_footer_widget_bg_color = Agama::setting( 'agama_footer_widget_bg_color', '#314150' );
		// Footer Bottom Background Color
		$agama_footer_bottom_bg_color = Agama::setting( 'agama_footer_bottom_bg_color', '#293744' );
		##################################################################################
		# TYPOGRAPHY
		##################################################################################
		$agama_typo_body = Agama::setting( 'agama_typo_body', '' );
		$agama_body_font = array( 
			'font-family' => $agama_typo_body['font-family'],
			'font-style' => $agama_typo_body['font-style'],
			'font-size' => $agama_typo_body['font-size'],
			'line-height' => $agama_typo_body['line-height'],
			'font-weight' => $agama_typo_body['font-weight']
		);
		// Logo font
		$agama_typo_logo = Agama::setting( 'agama_typo_logo', '' );
		$agama_logo_font = array(
			'font-family' => $agama_typo_logo['font-family'],
			'font-style' => $agama_typo_logo['font-style'],
			'font-size' => $agama_typo_logo['font-size'],
			'line-height' => $agama_typo_logo['line-height'],
			'font-weight' => $agama_typo_logo['font-weight']
		);
		// Navigation font
		$agama_typo_navigation = Agama::setting( 'agama_typo_navigation', '' );
		$agama_navigation_font = array(
			'font-family' => $agama_typo_navigation['font-family'],
			'font-style' => $agama_typo_navigation['font-style'],
			'font-size' => $agama_typo_navigation['font-size'],
			'font-weight' => $agama_typo_navigation['font-weight']
		);
		// Breadcrumb font
		$agama_typo_breadcrumb = Agama::setting( 'agama_typo_breadcrumb', '' );
		$agama_breadcrumb_font = array(
			'font-family' => $agama_typo_breadcrumb['font-family']
		);
		// H1 font
		$agama_typo_h1 = Agama::setting( 'agama_typo_h1', '' );
		$agama_heading_h1_font = array(
			'font-family' => $agama_typo_h1['font-family'],
			'font-style' => $agama_typo_h1['font-style'],
			'font-size' => $agama_typo_h1['font-size'],
			'line-height' => $agama_typo_h1['line-height'],
			'font-weight' => $agama_typo_h1['font-weight']
		);
		// H2 font
		$agama_typo_h2 = Agama::setting( 'agama_typo_h2', '' );
		$agama_heading_h2_font = array(
			'font-family' => $agama_typo_h2['font-family'],
			'font-style' => $agama_typo_h2['font-style'],
			'font-size' => $agama_typo_h2['font-size'],
			'line-height' => $agama_typo_h2['line-height'],
			'font-weight' => $agama_typo_h2['font-weight']
		);
		// H3 font
		$agama_typo_h3 = Agama::setting( 'agama_typo_h3', '' );
		$agama_heading_h3_font = array(
			'font-family' => $agama_typo_h3['font-family'],
			'font-style' => $agama_typo_h3['font-style'],
			'font-size' => $agama_typo_h3['font-size'],
			'line-height' => $agama_typo_h3['line-height'],
			'font-weight' => $agama_typo_h3['font-weight']
		);
		// H4 font
		$agama_typo_h4 = Agama::setting( 'agama_typo_h4', '' );
		$agama_heading_h4_font = array(
			'font-family' => $agama_typo_h4['font-family'],
			'font-style' => $agama_typo_h4['font-style'],
			'font-size' => $agama_typo_h4['font-size'],
			'line-height' => $agama_typo_h4['line-height'],
			'font-weight' => $agama_typo_h4['font-weight']
		);
		// H5 font
		$agama_typo_h5 = Agama::setting( 'agama_typo_h5', '' );
		$agama_heading_h5_font = array(
			'font-family' => $agama_typo_h5['font-family'],
			'font-style' => $agama_typo_h5['font-style'],
			'font-size' => $agama_typo_h5['font-size'],
			'line-height' => $agama_typo_h5['line-height'],
			'font-weight' => $agama_typo_h5['font-weight']
		);
		// H6 font
		$agama_typo_h6 = Agama::setting( 'agama_typo_h6', '' );
		$agama_heading_h6_font = array(
			'font-family' => $agama_typo_h6['font-family'],
			'font-style' => $agama_typo_h6['font-style'],
			'font-size' => $agama_typo_h6['font-size'],
			'line-height' => $agama_typo_h6['line-height'],
			'font-weight' => $agama_typo_h6['font-weight']
		);
		##################################################################################
		# WOOCOMMERCE | 100%
		##################################################################################
		// Shop Columns
		$agama_shop_columns = Agama::setting( 'agama_shop_columns', '3' );
		// Display Shop Cart Icon in Header
		if( Agama::setting( 'agama_header_cart_icon', 'on' ) == 'on' ) {
			$agama_header_cart_icon = true;
		} else {
			$agama_header_cart_icon = false;
		}
		// Products per Page
		$agama_products_per_page = Agama::setting( 'agama_products_per_page', '12' );
		##################################################################################
		# CUSTOM CSS | 100%
		##################################################################################
		$agama_custom_css = Agama::setting( 'agama_custom_css', '' );
		##################################################################################
		# CONTACT PAGE | 100%
		##################################################################################
		// reCaptch Public Key
		$agama_contact_recaptcha_public = Agama::setting( 'agama_contact_recaptcha_public', '' );
		// reCaptcha Secret Key
		$agama_contact_recaptcha_secret = Agama::setting( 'agama_contact_recaptcha_secret', '' );
		// Contact Page Style
		$agama_contact_style = Agama::setting( 'agama_contact_style', 'style_1' );
		// Contact Map Type
		$agama_contact_map_type = Agama::setting( 'agama_contact_map_type', 'roadmap' );
		// Contact Email
		$agama_contact_email = Agama::setting( 'agama_contact_email', get_option('admin_email') );
		// Contact Phone
		$agama_contact_phone = Agama::setting( 'agama_contact_phone', '' );
		// Contact Fax
		$agama_contact_fax = Agama::setting( 'agama_contact_fax', '' );
		// Contact Country
		$agama_contact_country = Agama::setting( 'agama_contact_country', 'Australia, Melbourn' );
		// Contact Address
		$agama_contact_address = Agama::setting( 'agama_contact_address', '' );
		##################################################################################
		# FOOTER | 100%
		##################################################################################
		$agama_footer_copyright = Agama::setting( 'agama_footer_copyright', '2015 - 2016 &copy; Powered by <a href="http://www.theme-vision.com" target="_blank">Theme-Vision</a>' );
		##################################################################################
		# LICENSE | 100%
		##################################################################################
		$license['tv_username']	= esc_attr( Agama::setting( 'themevision_username', '' ) );
		$license['tv_email'] 	= esc_attr( Agama::setting( 'themevision_email', '' ) );
		$license['tv_order_id'] = esc_attr( Agama::setting( 'themevision_product_id', '' ) );
		if( $license['tv_username'] && $license['tv_email'] && $license['tv_order_id'] ) {
			update_option( 'themevision_license', serialize( $license ) );
		}
		
		$redux_options = array(
			// General Options
			'agama_fontawesome' => esc_attr( $agama_fontawesome ),
			// Layout Options
			'agama_layout_style' => esc_attr( $agama_layout_style ),
			'agama_sidebar_position' => esc_attr( $agama_sidebar_position ),
			'agama_nicescroll' => esc_attr( $agama_nicescroll ),
			'agama_to_top' => esc_attr( $agama_back_to_top ),
			// Preloader Options
			'agama_preloader' => esc_attr( $agama_preloader ),
			'agama_preloader_bg_color' => esc_attr( $agama_preloader_bg_color ),
			// Header Options
			'agama_logo' => esc_url_raw( $agama_logo_url ),
			'agama_header_style' => esc_attr( $agama_header_style ),
			'header_image' => esc_url_raw( $agama_header_image ),
			'agama_header_image_visibility' => esc_attr( $agama_header_image_visibility ),
			'agama_top_navigation' => esc_attr( $agama_top_navigation ),
			'agama_header_top_margin' => esc_attr( $agama_header_top_margin ),
			'agama_header_inner_margin' => esc_attr( $agama_header_inner_margin ),
			'agama_header_top_border_size' => esc_attr( $agama_header_top_border_size_width ),
			'agama_header_top_border_style' => esc_attr( $agama_header_top_border_style ),
			'agama_header_image_video' => esc_attr( $agama_header_image_video ),
			'agama_header_image_video_position' => esc_attr( $agama_header_image_video_position ),
			'agama_header_search' => esc_attr( $agama_header_search ),
			'agama_analytics_code' => Agama::setting( 'agama_analytics_code', '' ),
			// Breadcrumb Options
			'agama_breadcrumb' => esc_attr( $agama_breadcrumb ),
			'agama_breadcrumb_style' => esc_attr( $agama_breadcrumb_style ),
			'agama_breadcrumb_bg_img' => esc_url_raw( $agama_breadcrumb_bg_img ),
			'agama_breadcrumb_bg_img_repeat' => esc_attr( $agama_breadcrumb_bg_img_repeat ),
			'agama_breadcrumb_bg_img_size' => esc_attr( $agama_breadcrumb_bg_img_size ),
			'agama_breadcrumb_bg_img_attachment' => esc_attr( $agama_breadcrumb_bg_img_attachment ),
			'agama_breadcrumb_bg_img_position' => esc_attr( $agama_breadcrumb_bg_img_position ),
			'agama_breadcrumb_bg_color' => esc_attr( $agama_breadcrumb_bg_color ),
			'agama_breadcrumb_links_color' => esc_attr( $agama_breadcrumb_links_color ),
			'agama_breadcrumb_text_color' => esc_attr( $agama_breadcrumb_text_color ),
			// Frontpage Boxes Options
			'agama_frontpage_boxes' => esc_attr( $agama_frontpage_boxes ),
			'agama_frontpage_boxes_visibility' => esc_attr( $agama_frontpage_boxes_visibility ),
			'agama_frontpage_box_1_enable' => esc_attr( $agama_frontpage_box_1_enable ),
			'agama_frontpage_box_2_enable' => esc_attr( $agama_frontpage_box_2_enable ),
			'agama_frontpage_box_3_enable' => esc_attr( $agama_frontpage_box_3_enable ),
			'agama_frontpage_box_4_enable' => esc_attr( $agama_frontpage_box_4_enable ),
			'agama_frontpage_box_1_title' => esc_attr( $agama_frontpage_box_1_title ),
			'agama_frontpage_box_2_title' => esc_attr( $agama_frontpage_box_2_title ),
			'agama_frontpage_box_3_title' => esc_attr( $agama_frontpage_box_3_title ),
			'agama_frontpage_box_4_title' => esc_attr( $agama_frontpage_box_4_title ),
			'agama_frontpage_box_1_icon' => esc_attr( $agama_frontpage_box_1_icon ),
			'agama_frontpage_box_2_icon' => esc_attr( $agama_frontpage_box_2_icon ),
			'agama_frontpage_box_3_icon' => esc_attr( $agama_frontpage_box_3_icon ),
			'agama_frontpage_box_4_icon' => esc_attr( $agama_frontpage_box_4_icon ),
			'agama_frontpage_1_img' => esc_url_raw( $agama_frontpage_box_1_image_url ),
			'agama_frontpage_2_img' => esc_url_raw( $agama_frontpage_box_2_image_url ),
			'agama_frontpage_3_img' => esc_url_raw( $agama_frontpage_box_3_image_url ),
			'agama_frontpage_4_img' => esc_url_raw( $agama_frontpage_box_4_image_url ),
			'agama_frontpage_1_img_width' => esc_attr( $frontpage_box_image_1_size['width'] ),
			'agama_frontpage_2_img_width' => esc_attr( $frontpage_box_image_2_size['width'] ),
			'agama_frontpage_3_img_width' => esc_attr( $frontpage_box_image_3_size['width'] ),
			'agama_frontpage_4_img_width' => esc_attr( $frontpage_box_image_4_size['width'] ),
			'agama_frontpage_box_1_icon_color' => esc_attr( $agama_frontpage_box_1_icon_color ),
			'agama_frontpage_box_2_icon_color' => esc_attr( $agama_frontpage_box_2_icon_color ),
			'agama_frontpage_box_3_icon_color' => esc_attr( $agama_frontpage_box_3_icon_color ),
			'agama_frontpage_box_4_icon_color' => esc_attr( $agama_frontpage_box_4_icon_color ),
			'agama_frontpage_box_1_text' => $agama_frontpage_box_1_text,
			'agama_frontpage_box_2_text' => $agama_frontpage_box_2_text,
			'agama_frontpage_box_3_text' => $agama_frontpage_box_3_text,
			'agama_frontpage_box_4_text' => $agama_frontpage_box_4_text,
			'agama_frontpage_box_1_readmore' => esc_attr( $agama_frontpage_box_1_readmore ),
			'agama_frontpage_box_2_readmore' => esc_attr( $agama_frontpage_box_2_readmore ),
			'agama_frontpage_box_3_readmore' => esc_attr( $agama_frontpage_box_3_readmore ),
			'agama_frontpage_box_4_readmore' => esc_attr( $agama_frontpage_box_4_readmore ),
			'agama_frontpage_box_1_readmore_txt' => esc_attr( $agama_frontpage_box_1_readmore_txt ),
			'agama_frontpage_box_2_readmore_txt' => esc_attr( $agama_frontpage_box_2_readmore_txt ),
			'agama_frontpage_box_3_readmore_txt' => esc_attr( $agama_frontpage_box_3_readmore_txt ),
			'agama_frontpage_box_4_readmore_txt' => esc_attr( $agama_frontpage_box_4_readmore_txt ),
			'agama_frontpage_box_1_readmore_url' => esc_url_raw( $agama_frontpage_box_1_readmore_url ),
			'agama_frontpage_box_2_readmore_url' => esc_url_raw( $agama_frontpage_box_2_readmore_url ),
			'agama_frontpage_box_3_readmore_url' => esc_url_raw( $agama_frontpage_box_3_readmore_url ),
			'agama_frontpage_box_4_readmore_url' => esc_url_raw( $agama_frontpage_box_4_readmore_url ),
			// Blog Options
			'agama_blog_layout' => esc_attr( $agama_blog_layout ),
			'agama_blog_thumbnails_permalink' => esc_attr( $agama_blog_thumbnails_permalink ),
			'agama_blog_lightbox' => esc_attr( $agama_blog_lightbox ),
			'agama_blog_excerpt' => esc_attr( $agama_blog_excerpt ),
			'agama_blog_readmore_url' => esc_attr( $agama_blog_readmore_url ),
			'agama_blog_tags' => esc_attr( $agama_blog_tags ),
			'agama_blog_pagination' => esc_attr( $agama_blog_pagination ),
			'agama_blog_date' => esc_attr( $agama_blog_date ),
			'agama_blog_author' => esc_attr( $agama_blog_author ),
			'agama_blog_category' => esc_attr( $agama_blog_category ),
			'agama_blog_comments_count' => esc_attr( $agama_blog_comments_count ),
			'agama_blog_infinite_scroll' => esc_attr( $agama_blog_infinite_scroll ),
			'agama_blog_infinite_trigger' => esc_attr( $agama_blog_infinite_trigger ),
			// Portfolio Options
			'agama_portfolio_per_page' => esc_attr( $agama_portfolio_per_page ),
			'agama_portfolio_nav_filter' => esc_attr( $agama_portfolio_nav_filter ),
			'agama_portfolio_excerpt' => esc_attr( $agama_portfolio_excerpt ),
			'agama_portfolio_pagination' => esc_attr( $agama_portfolio_pagination ),
			// Social Icons Options
			'agama_top_nav_social' => esc_attr( $agama_top_nav_social ),
			'agama_footer_social' => esc_attr( $agama_footer_social ),
			'agama_social_url_target' => esc_attr( Agama::setting( 'agama_social_url_target', '_blank' ) ),
			'social_facebook' => esc_url_raw( Agama::setting( 'social_facebook', '' ) ),
			'social_twitter' => esc_url_raw( Agama::setting( 'social_twitter', '' ) ),
			'social_flickr' => esc_url_raw( Agama::setting( 'social_flickr', '' ) ),
			'social_rss' => esc_url_raw( Agama::setting( 'social_rss', get_bloginfo('rss2_url') ) ),
			'social_vimeo' => esc_url_raw( Agama::setting( 'social_vimeo', '' ) ),
			'social_youtube' => esc_url_raw( Agama::setting( 'social_youtube', '' ) ),
			'social_instagram' => esc_url_raw( Agama::setting( 'social_instagram', '' ) ),
			'social_pinterest' => esc_url_raw( Agama::setting( 'social_pinterest', '' ) ),
			'social_tumblr' => esc_url_raw( Agama::setting( 'social_tumblr', '' ) ),
			'social_google' => esc_url_raw( Agama::setting( 'social_google', '' ) ),
			'social_dribbble' => esc_url_raw( Agama::setting( 'social_dribbble', '' ) ),
			'social_digg' => esc_url_raw( Agama::setting( 'social_digg', '' ) ),
			'social_linkedin' => esc_url_raw( Agama::setting( 'social_linkedin', '' ) ),
			'social_blogger' => esc_url_raw( Agama::setting( 'social_blogger', '' ) ),
			'social_skype' => esc_html( Agama::setting( 'social_skype', '' ) ),
			'social_forrst' => esc_url_raw( Agama::setting( 'social_forrst', '' ) ),
			'social_myspace' => esc_url_raw( Agama::setting( 'social_myspace', '' ) ),
			'social_deviantart' => esc_url_raw( Agama::setting( 'social_deviantart', '' ) ),
			'social_yahoo' => esc_url_raw( Agama::setting( 'social_yahoo', '' ) ),
			'social_reddit' => esc_url_raw( Agama::setting( 'social_teddit', '' ) ),
			'social_paypal' => esc_url_raw( Agama::setting( 'social_paypal', '' ) ),
			'social_dropbox' => esc_url_raw( Agama::setting( 'social_dropbox', '' ) ),
			'social_soundcloud' => esc_url_raw( Agama::setting( 'social_soundcloud', '' ) ),
			'social_vk' => esc_url_raw( Agama::setting( 'social_vk', '' ) ),
			'social_email' => esc_html( Agama::setting( 'social_email', '' ) ),
			// Share Icons Options
			'agama_share_box' => esc_attr( $agama_share_box ),
			'agama_share_box_visibility' => esc_attr( $agama_share_box_visibility ),
			'agama_share_facebook' => esc_attr( $agama_share_facebook ),
			'agama_share_twitter' => esc_attr( $agama_share_twitter ),
			'agama_share_pinterest' => esc_attr( $agama_share_pinterest ),
			'agama_share_google_plus' => esc_attr( $agama_share_google_plus ),
			'agama_share_rss' => esc_attr( $agama_share_rss ),
			'agama_share_email' => esc_attr( $agama_share_email ),
			// Styling Options
			'agama_skin' => esc_attr( $agama_skin ),
			'agama_primary_color' => esc_attr( $agama_primary_color ),
			'agama_link_color' => esc_attr( $agama_link_color ),
			'agama_link_hover_color' => esc_attr( $agama_link_hover_color ),
			'agama_header_bg_color' => esc_attr( $agama_header_bg_color ),
			'agama_header_bg_image' => esc_url_raw( $agama_header_bg_image ),
			'agama_header_bg_image_repeat' => esc_attr( $agama_header_bg_image_repeat ),
			'agama_header_bg_image_size' => esc_attr( $agama_header_bg_image_size ),
			'agama_header_bg_image_attachment' => esc_attr( $agama_header_bg_image_attachment ),
			'agama_header_bg_image_position' => esc_attr( $agama_header_bg_image_position ),
			'agama_header_links_color' => esc_attr( $agama_header_links_color ),
			'agama_header_links_hover_color' => esc_attr( $agama_header_links_hover_color ),
			'agama_body_animate' => esc_attr( $agama_body_animate ),
			'agama_body_animate_image_1' => esc_url_raw( $agama_body_animate_image_1 ),
			'agama_body_animate_image_2' => esc_url_raw( $agama_body_animate_image_2 ),
			'agama_body_animate_image_3' => esc_url_raw( $agama_body_animate_image_3 ),
			'agama_body_animate_color' => esc_attr( $agama_body_animate_color['rgba'] ),
			'agama_body_animate_delay' => esc_attr( $agama_body_animate_delay ),
			'agama_custom_css' => $agama_custom_css,
			'agama_footer_widget_bg_color' => esc_attr( $agama_footer_widget_bg_color ),
			'agama_footer_bottom_bg_color' => esc_attr( $agama_footer_bottom_bg_color ),
			// Typography Options
			'agama_body_font' => $agama_body_font,
			'agama_logo_font' => $agama_logo_font,
			'agama_navigation_font' => $agama_navigation_font,
			'agama_breadcrumb_font' => $agama_breadcrumb_font,
			'agama_heading_h1_font' => $agama_heading_h1_font,
			'agama_heading_h2_font' => $agama_heading_h2_font,
			'agama_heading_h3_font' => $agama_heading_h3_font,
			'agama_heading_h4_font' => $agama_heading_h4_font,
			'agama_heading_h5_font' => $agama_heading_h5_font,
			'agama_heading_h6_font' => $agama_heading_h6_font,
			// WooCommerce Options
			'agama_shop_columns' => esc_attr( $agama_shop_columns ),
			'agama_header_cart_icon' => esc_attr( $agama_header_cart_icon ),
			'agama_products_per_page' => esc_attr( $agama_products_per_page ),
			// Contact Page Options
			'agama_contact_recaptcha_public' => esc_attr( $agama_contact_recaptcha_public ),
			'agama_contact_recaptcha_secret' => esc_attr( $agama_contact_recaptcha_secret ),
			'agama_contact_style' => esc_attr( $agama_contact_style ),
			'agama_contact_map_type' => esc_attr( $agama_contact_map_type ),
			'agama_contact_email' => esc_attr( $agama_contact_email ),
			'agama_contact_phone' => esc_attr( $agama_contact_phone ),
			'agama_contact_fax' => esc_attr( $agama_contact_fax ),
			'agama_contact_country' => esc_attr( $agama_contact_country ),
			'agama_contact_address' => esc_attr( $agama_contact_address ),
			// Footer Options
			'agama_footer_copyright' => $agama_footer_copyright
		);
		
		foreach( $redux_options as $key => $value ) {
			set_theme_mod( $key, $value );
		}
		
		if( update_option( 'agama_pro_options_migrated', true ) ) {
			return true;
		}
	}
}

/**
 * Display Warning Message
 *
 * @since 1.3.0
 */
function agama_pro_migrate_theme_options_warning() { ?>
	<div class="notice notice-warning">
		<p><?php printf( '%s: %s', __( 'You need to migrate Agama PRO theme options into customizer by clicking on next link ', 'agama-pro' ), '<a href="?options_migrate=agama-pro">Migrate Now</a>' ); ?></p>
	</div>
<?php
}

/**
 * Display Success Message
 *
 * @since 1.3.0
 */
function agama_pro_migrate_theme_options_success() { ?>
	<div class="notice notice-success is-dismissible">
		<p><?php printf( '%s: <a href="%s">%s</a>', __( 'Agama PRO theme options was successfuly migrated into Customizer. Go to', 'agama-pro' ), admin_url( 'customize.php' ), __( 'Customize', 'agama-pro') ); ?></p>
	</div>
<?php
}