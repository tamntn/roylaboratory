<?php

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Extend Kirki control with FontAwesome icon picker.
get_template_part( 'framework/admin/modules/icon-picker/icon-picker-control' );

// Include Partial Refresh File
get_template_part( 'framework/admin/partial-refresh' );
 
// Embedding Kirki in theme.
if ( ! function_exists( 'agama_theme_kirki_update_url' ) ) {
    function agama_theme_kirki_update_url( $config ) {
        $config['url_path'] = AGAMA_URI . 'framework/admin/kirki/';
        return $config;
    }
}
add_filter( 'kirki/config', 'agama_theme_kirki_update_url' );

##############################################
# THEME CONFIG
##############################################
    Kirki::add_config( 'agama_options', array(
        'option_type' => 'theme_mod',
        'capability'  => 'edit_theme_options'
    ) );
###################################################
# GENERAL PANEL
###################################################
	Kirki::add_panel( 'agama_general_panel', array(
		'title'			=> __( 'General', 'agama-pro' ),
		'priority'		=> 10
	) );
	##############################################
	# BODY BACKGROUND SECTION
	##############################################
	Kirki::add_section( 'background_image', array(
		'title'			=> __( 'Body', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_general_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Body Font', 'agama-pro' ),
		'tooltip'	=> __( 'Select body font.', 'agama-pro' ),
		'section'		=> 'background_image',
		'settings'		=> 'agama_body_font',
		'type'			=> 'typography',
		'default'		=> array(
			'font-family' 	=> 'Raleway',
			'font-size'		=> '14px'
		),
        'output'		=> array(
			array(
				'element' => 'body'
			)
		),
		'priority'		=> 1
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Background Color', 'agama-pro' ),
		'tooltip'		=> __( 'Select body background color.', 'agama-pro' ),
		'section'			=> 'background_image',
		'settings'			=> 'agama_body_background_color',
		'type'				=> 'color',
		'choices'			=> array(
			'alpha'			=> true
		),
		'default'			=> '#e6e6e6',
        'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> 'body',
				'property'	=> 'background-color',
				'suffix'	=> '!important'
			)
		),
		'priority'			=> 1
	) );
	#########################################
	# BACKGROUND BODY ANIMATE
	#########################################
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Body Backgrount Animated', 'agama-pro' ),
		'tooltip'		=> __( 'Enable body animated background. Working with Boxed layout only.', 'agama-pro' ),
		'section'			=> 'background_image',
		'settings'			=> 'agama_body_animate',
		'type'				=> 'switch',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_layout_style',
				'operator'	=> '==',
				'value'		=> 'boxed'
			)
		),
		'default'			=> false
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Upload Image 1', 'agama-pro' ),
		'tooltip'	=> __( 'Use full hd images ex: 1920x1080. Add atlast 2 images.', 'agama-pro' ),
		'section'		=> 'background_image',
		'settings'		=> 'agama_body_animate_image_1',
		'type'			=> 'image',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_layout_style',
				'operator'	=> '==',
				'value'		=> 'boxed'
			)
		),
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Upload Image 2', 'agama-pro' ),
		'tooltip'	=> __( 'Use full hd images ex: 1920x1080. Add atlast 2 images.', 'agama-pro' ),
		'section'		=> 'background_image',
		'settings'		=> 'agama_body_animate_image_2',
		'type'			=> 'image',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_layout_style',
				'operator'	=> '==',
				'value'		=> 'boxed'
			)
		),
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Upload Image 3', 'agama-pro' ),
		'tooltip'	=> __( 'Use full hd images ex: 1920x1080. Add atlast 2 images.', 'agama-pro' ),
		'section'		=> 'background_image',
		'settings'		=> 'agama_body_animate_image_3',
		'type'			=> 'image',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_layout_style',
				'operator'	=> '==',
				'value'		=> 'boxed'
			)
		),
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Animation Delay', 'agama-pro' ),
		'tooltip'	=> __( 'Set animation delay. 6000 = 6sec', 'agama-pro' ),
		'section'		=> 'background_image',
		'settings'		=> 'agama_body_animate_delay',
		'type'			=> 'number',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_layout_style',
				'operator'	=> '==',
				'value'		=> 'boxed'
			)
		),
		'default'		=> '6000'
	) );
	#################################################
	# SKINS SECTION
	#################################################
	Kirki::add_section( 'agama_skins_section', array(
		'title'			=> __( 'Skins', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_general_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Skin', 'agama-pro' ),
		'tooltip'	=> __( 'Select theme skin.', 'agama-pro' ),
		'section'		=> 'agama_skins_section',
		'settings'		=> 'agama_skin',
		'type'			=> 'select',
		'choices'		=> array(
			'light'		=> __( 'Light', 'agama-pro' ),
			'dark'		=> __( 'Dark', 'agama-pro' )
		),
		'default'		=> 'light'
	) );
	if( class_exists( 'Woocommerce' ) ) {
		$woo_element_color 				= '.custom_cart_button .add_to_cart_button.added, .cart_totals table tr:last-child span.amount, .product-title h3 a:hover, .single-product .product-title h2 a:hover, .product-price ins, .icon_status_inner, .product_title .price ins, span.item-name:before, .single-product p.price, .woocommerce-variation-price .price, p.woocommerce-thankyou-order-received, .woocommerce ul.product_list_widget li ins, .woocommerce ul.cart_list li ins, .woocommerce-page ul.product_list_widget li ins, .woocommerce-page ul.cart_list li ins, .widget.woocommerce.widget_product_tag_cloud .tagcloud a:hover, body:not(.woocommerce) div.woocommerce ul.products li h3 mark, .shop_two_col.product-category h3 mark, .shop_three_col.product-category h3 mark, .shop_four_col.product-category h3 mark, .woocommerce-checkout-review-order-table tr.order-total span.amount, div.wpb_wrapper .woocommerce ul.products li.product-category h2 mark';
		$woo_element_bg					= '#wp-calendar td#today, .sale-flash, .vision-main-menu-cart .cart_count, #agama_wc_cart .cart_count, .woocommerce span.onsale, .woocommerce-page span.onsale, .ui-slider-handle.ui-state-default.ui-corner-all, .woocommerce #respond input#submit';
		$woo_element_border_top_color	= '.woocommerce-checkout .shop_table.woocommerce-checkout-review-order-table tfoot';
		$woo_element_border_left_color	= '#masthead .cart-notification';
	} else {
		$woo_element_color 				= '.woocommerce';
		$woo_element_bg					= '.woocommerce';
		$woo_element_border_top_color	= '.woocommerce';
		$woo_element_border_left_color	= '.woocommerce';
	}
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Primary Color', 'agama-pro' ),
		'tooltip'	    => __( 'Set theme primary color.', 'agama-pro' ),
		'section'		=> 'agama_skins_section',
		'settings'		=> 'agama_primary_color',
		'type'			=> 'color',
        'transport'	    => 'auto',
		'output'		=> array(
			array(
				'element'	=> 'body:not(.top-bar-out) #top-bar, .top-bar-out .sticky-header, .header_v2 .sticky-header, .top-nav-wrapper, .footer-widgets,' . $woo_element_border_top_color,
				'property'	=> 'border-top-color'
			),
			array(
				'element'	=> '.top-navigation li ul li a:hover, .top-navigation li ul li a:focus, .main-navigation li ul li a:hover, .sticky-nav > li > ul.sub-menu > li:hover, ' . $woo_element_border_left_color,
				'property'	=> 'border-left-color'
			),
			array(
				'element'	=> $woo_element_bg,
				'property'	=> 'background'
			),
            array(
                'element'   => '#top-search-trigger.active',
                'property'  => 'color',
                'suffix'    => '!important'
            ),
			array(
				'element'	=> '.vision-search-form .vision-search-submit:hover, #vision-search-box i.fa-search, .thx_msg, #vision-pagination span, .entry-date .entry-date .format-box i, .entry-content .more-link, .format-box i, #comments .comments-title span, #respond .comment-reply-title span,' . $woo_element_color,
				'property' 	=> 'color'
			),
			array(
				'element'	=> '.fancy-title.title-bottom-border h1, .fancy-title.title-bottom-border h2, .fancy-title.title-bottom-border h3, .fancy-title.title-bottom-border h4, .fancy-title.title-bottom-border h5, .fancy-title.title-bottom-border h6, .search__input, .sm-form-control:focus, .cart-product-thumbnail img:hover, #vision-pagination span.current',
				'property' 	=> 'border-color'
			),
			array(
				'element'	=> 'input[type="submit"], .button, .button-3d:hover, .tagcloud a:hover, .entry-date .date-box, #respond #submit, .owl-theme .owl-controls .owl-nav [class*=owl-]:hover, .owl-theme .owl-dots .owl-dot span, .testimonial .flex-control-nav li a, #portfolio-filter li.activeFilter a, .feature-box .fbox-icon i, .feature-box .fbox-icon img, #vision-pagination span.current, #toTop:hover',
				'property'	=> 'background-color'
			),
			array(
				'element'	=> '.loader-ellips__dot, .footer-widgets .widget-title:after',
				'property'	=> 'background'
			),
            array(
                'element'   => '.sticky-nav > ul > li > ul > li > ul > li:hover, .sticky-nav > li > ul > li > ul > li:hover, .vision-main-menu-cart .cart_count:before, #agama_wc_cart .cart_count:before',
                'property'  => 'border-right-color'
            ),
			array(
				'element'	=> '.top-navigation li ul, .main-navigation li ul, .main-navigation .current-menu-item > a, .main-navigation .current-menu-ancestor > a:not(.sub-menu-link), .main-navigation .current_page_item > a:not(.sub-menu-link), .main-navigation .current_page_ancestor > a:not(.sub-menu-link), .sticky-nav > li.current_page_item a:not(.sub-menu-link), .sticky-nav > li.current-menu-item a:not(.sub-menu-link), .sticky-nav > li > ul, .sticky-nav > ul > li > ul > li > ul, .sticky-nav > li > ul > li > ul, .entry-content .more-link',
				'property'	=> 'border-bottom-color'
			),
			array(
				'element' 	=> 'footer#colophon .site-info a:hover, footer#colophon .social-icons:hover',
				'property' 	=> 'color'
			)
		),
		'default'			=> '#A2C605'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Links Color', 'agama-pro' ),
		'tooltip'		=> __( 'Set theme links color.', 'agama-pro' ),
		'section'			=> 'agama_skins_section',
		'settings'			=> 'agama_link_color',
		'type'				=> 'color',
		'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> 'a, .entry-content .single-line-meta a, #vision-pagination a',
				'property'	=> 'color'
			)
		),
		'default'			=> '#A2C605'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Links Hover Color', 'agama-pro' ),
		'tooltip'	=> __( 'Set theme links hover color.', 'agama-pro' ),
		'section'		=> 'agama_skins_section',
		'settings'		=> 'agama_link_hover_color',
		'type'			=> 'color',
		'output'		=> array(
			array(
				'element'	=> 'a:hover, h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, .entry-title a:hover, .single-line-meta a:hover, .widget-area .widget a:hover, footer[role="contentinfo"] a:hover, .product_title h3:hover, #portfolio-filter li a:hover, .portfolio-desc h3 a:hover, .portfolio-overlay a:hover, nav[role="navigation"]:hover, nav[role="navigation"] .nav-next a:hover, nav[role="navigation"] .nav-previous a:hover, a[rel="next"]:hover, a[rel="prev"]:hover, #secondary .cat-item a:hover',
				'property'	=> 'color'
			)
		),
		'default'		=> '#333'
	) );
	#################################################
	# EXTRA SECTION
	#################################################
	Kirki::add_section( 'agama_extra_section', array(
		'title'			=> __( 'Extra', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_general_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Development Mode', 'agama-pro' ),
		'tooltip'	    => __( 'Enable development mode.', 'agama-pro' ),
		'settings'		=> 'agama_development_mode',
		'section'		=> 'agama_extra_section',
		'type'			=> 'switch',
		'default'		=> false
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'FontAwesome', 'agama-pro' ),
		'tooltip'	    => __( 'Enable fontawesome icons ?', 'agama-pro' ),
		'section'		=> 'agama_extra_section',
		'settings'		=> 'agama_fontawesome',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Rich Snippets', 'agama-pro' ),
		'tooltip'	    => __( 'Turn on to enable rich snippets data site wide.', 'agama-pro' ),
		'section'		=> 'agama_extra_section',
		'settings'		=> 'agama_rich_snippets',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Nicescroll', 'agama-pro' ),
		'tooltip'	=> __( 'Enable browser nicescroll ?', 'agama-pro' ),
		'section'		=> 'agama_extra_section',
		'settings'		=> 'agama_nicescroll',
		'type'			=> 'switch',
		'default'		=> false
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			   => __( 'Back to Top', 'agama-pro' ),
		'tooltip'	       => __( 'Enable back to top button ?', 'agama-pro' ),
		'section'		   => 'agama_extra_section',
		'settings'		   => 'agama_to_top',
		'type'			   => 'switch',
		'default'		   => true,
        'partial_refresh'  => array(
            'agama_to_top' => array(
                'selector'        => '.to-top-cpreview',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_to_top' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Custom jQuery Head', 'agama-pro' ),
		'tooltip'	    => __( 'Add custom jQuery code into html head area.', 'agama-pro' ),
		'section'		=> 'agama_extra_section',
		'settings'		=> 'agama_analytics_code',
		'type'			=> 'textarea',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Custom jQuery Footer', 'agama-pro' ),
		'tooltip'	    => __( 'Add custom jQuery code into html footer area.', 'agama-pro' ),
		'section'		=> 'agama_extra_section',
		'settings'		=> 'agama_jquery_footer_code',
		'type'			=> 'textarea',
		'default'		=> ''
	) );
	####################################################
	# HEADINGS SECTION
	####################################################
	Kirki::add_section( 'agama_headings_section', array(
		'title'			=> __( 'Headings', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_general_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Heading H1 Font', 'agama-pro' ),
		'tooltip'	=> __( 'Select heading h1 font.', 'agama-pro' ),
		'section'		=> 'agama_headings_section',
		'settings'		=> 'agama_heading_h1_font',
		'type'			=> 'typography',
		'output'		=> array(
			array(
				'element' => 'h1, h1 a'
			)
		),
		'default'		=> array(
			'font-family' 	=> 'Raleway',
			'font-size'		=> '20px',
			'variant'		=> '600'
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Heading H1 Color', 'agama-pro' ),
		'tooltip'		=> __( 'Select heading h1 font color.', 'agama-pro' ),
		'section'			=> 'agama_headings_section',
		'settings'			=> 'agama_h1_color',
		'type'				=> 'color',
		'output'			=> array(
			array(
				'element'	=> 'h1, h1 a',
				'property'	=> 'color'
			)
		),
		'transport'			=> 'auto',
		'default'			=> '#444'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Heading H2 Font', 'agama-pro' ),
		'tooltip'	=> __( 'Select heading h2 font.', 'agama-pro' ),
		'section'		=> 'agama_headings_section',
		'settings'		=> 'agama_heading_h2_font',
		'type'			=> 'typography',
		'output'		=> array(
			array(
				'element' => 'h2, h2 a'
			)
		),
		'default'		=> array(
			'font-family' 	=> 'Raleway',
			'font-size'		=> '18px',
			'variant'		=> '600'
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Heading H2 Color', 'agama-pro' ),
		'tooltip'		=> __( 'Select heading h2 font color.', 'agama-pro' ),
		'section'			=> 'agama_headings_section',
		'settings'			=> 'agama_h2_color',
		'type'				=> 'color',
		'output'			=> array(
			array(
				'element'	=> 'h2, h2 a',
				'property'	=> 'color'
			)
		),
		'transport'			=> 'auto',
		'default'			=> '#444'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Heading H3 Font', 'agama-pro' ),
		'tooltip'	=> __( 'Select heading h3 font.', 'agama-pro' ),
		'section'		=> 'agama_headings_section',
		'settings'		=> 'agama_heading_h3_font',
		'type'			=> 'typography',
		'output'		=> array(
			array(
				'element' => 'h3, h3 a'
			)
		),
		'default'		=> array(
			'font-family' 	=> 'Raleway',
			'font-size'		=> '16px',
			'variant'		=> '600'
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Heading H3 Color', 'agama-pro' ),
		'tooltip'		=> __( 'Select heading h3 font color.', 'agama-pro' ),
		'section'			=> 'agama_headings_section',
		'settings'			=> 'agama_h3_color',
		'type'				=> 'color',
		'output'			=> array(
			array(
				'element'	=> 'h3, h3 a',
				'property'	=> 'color'
			)
		),
		'transport'			=> 'auto',
		'default'			=> '#444'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Heading H4 Font', 'agama-pro' ),
		'tooltip'	=> __( 'Select heading h4 font.', 'agama-pro' ),
		'section'		=> 'agama_headings_section',
		'settings'		=> 'agama_heading_h4_font',
		'type'			=> 'typography',
		'output'		=> array(
			array(
				'element' => 'h4, h4 a'
			)
		),
		'default'		=> array(
			'font-family' 	=> 'Raleway',
			'font-size'		=> '14px',
			'variant'		=> '600'
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Heading H4 Color', 'agama-pro' ),
		'tooltip'		=> __( 'Select heading h4 font color.', 'agama-pro' ),
		'section'			=> 'agama_headings_section',
		'settings'			=> 'agama_h4_color',
		'type'				=> 'color',
		'output'			=> array(
			array(
				'element'	=> 'h4, h4 a',
				'property'	=> 'color'
			)
		),
		'transport'			=> 'auto',
		'default'			=> '#444'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Heading H5 Font', 'agama-pro' ),
		'tooltip'	=> __( 'Select heading h5 font.', 'agama-pro' ),
		'section'		=> 'agama_headings_section',
		'settings'		=> 'agama_heading_h5_font',
		'type'			=> 'typography',
		'output'		=> array(
			array(
				'element' => 'h5, h5 a'
			)
		),
		'default'		=> array(
			'font-family' 	=> 'Raleway',
			'font-size'		=> '13px',
			'variant'		=> '600'
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Heading H5 Color', 'agama-pro' ),
		'tooltip'		=> __( 'Select heading h5 font color.', 'agama-pro' ),
		'section'			=> 'agama_headings_section',
		'settings'			=> 'agama_h5_color',
		'type'				=> 'color',
		'output'			=> array(
			array(
				'element'	=> 'h5, h5 a',
				'property'	=> 'color'
			)
		),
		'transport'			=> 'auto',
		'default'			=> '#444'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Heading H6 Font', 'agama-pro' ),
		'tooltip'		=> __( 'Select heading h6 font.', 'agama-pro' ),
		'section'			=> 'agama_headings_section',
		'settings'			=> 'agama_heading_h6_font',
		'type'				=> 'typography',
		'output'			=> array(
			array(
				'element' 	=> 'h6, h6 a'
			)
		),
		'default'			=> array(
			'font-family' 	=> 'Raleway',
			'font-size'		=> '12px',
			'variant'		=> '600'
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Heading H6 Color', 'agama-pro' ),
		'tooltip'		=> __( 'Select heading h6 font color.', 'agama-pro' ),
		'section'			=> 'agama_headings_section',
		'settings'			=> 'agama_h6_color',
		'type'				=> 'color',
		'output'			=> array(
			array(
				'element'	=> 'h6, h6 a',
				'property'	=> 'color'
			)
		),
		'transport'			=> 'auto',
		'default'			=> '#444'
	) );
	#################################################
	# PAGES SECTION
	#################################################
    Kirki::add_section( 'agama_pages_section', array(
		'title'			=> __( 'Pages', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_general_panel'
	) );
    Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Pages Title Font', 'agama-pro' ),
		'tooltip'		=> __( 'Page titles will be hidden if breadcrumb is turned on.', 'agama-pro' ),
		'settings'			=> 'agama_page_title_font',
		'section'			=> 'agama_pages_section',
		'type'				=> 'typography',
		'output'			=> array(
			array(
				'element'	=> 'body.page h1.entry-title'
			)
		),
		'default'			=> array(
			'font-family'	=> 'Raleway',
			'variant'		=> 'normal',
			'font-size'		=> '22px',
			'line-height'	=> '1.2',
			'color'			=> '#444'
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Pages Background Color', 'agama-pro' ),
		'tooltip'		    => __( 'Set pages | posts background color widely across site.', 'agama-pro' ),
		'settings'			=> 'agama_pages_bg_color',
		'section'			=> 'agama_pages_section',
		'type'				=> 'color',
		'transport'			=> 'auto',
		'output'			=> array(
            array(
                'element'	=> '#page.site',
                'property'	=> 'background-color'
            )
		),
		'default'			=> ''
	) );
	####################################################
	# COMMENTS SECTION
	####################################################
	Kirki::add_section( 'agama_comments_section', array(
		'title'			=> __( 'Comments', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_general_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable Comments', 'agama-pro' ),
		'tooltip'	    => __( 'Enable globally comments.', 'agama-pro' ),
		'settings'		=> 'agama_comments_enable',
		'section'		=> 'agama_comments_section',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'HTML Tags Suggestion', 'agama-pro' ),
		'tooltip'	=> __( 'Enable tags usage suggestion below comment form ?', 'agama-pro' ),
		'settings'		=> 'agama_comments_tags_suggestion',
		'section'		=> 'agama_comments_section',
		'type'			=> 'switch',
		'default'		=> true
	) );
	#####################################################
	# PRE-LOADER SECTION
	#####################################################
	Kirki::add_section( 'agama_preloader_section', array(
		'title'			=> __( 'Pre-Loader', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_general_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable', 'agama-pro' ),
		'tooltip'	=> __( 'Enable preloader ?', 'agama-pro' ),
		'section'		=> 'agama_preloader_section',
		'settings'		=> 'agama_preloader',
		'type'			=> 'switch',
		'default'		=> false
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Disable', 'agama-pro' ),
		'tooltip'		=> __( 'Select on what pages you want disable preloader.', 'agama-pro' ),
		'section'			=> 'agama_preloader_section',
		'settings'			=> 'agama_preloader_pages',
		'type'				=> 'select',
		'choices'			=> AgamaChoice::pages(),
		'multiple'			=> '100',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_preloader',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Background Color', 'agama-pro' ),
		'tooltip'	=> __( 'Select preloader background color.', 'agama-pro' ),
		'section'		=> 'agama_preloader_section',
		'settings'		=> 'agama_preloader_bg_color',
		'type'			=> 'color',
		'output'		=> array(
			array(
				'element'	=> '#loader-wrapper .loader-section',
				'property'	=> 'background'
			)
		),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_preloader',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> '#000'
	) );
    ###############################################
    # STATIC FRONT PAGE
    ###############################################
    Kirki::add_section( 'static_front_page', array(
		'title'			=> __( 'Static Front Page', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_general_panel'
	) );
	########################################
	# ADDITIONAL CSS
	########################################
	Kirki::add_section( 'custom_css', array(
		'title'			=> __( 'Additional CSS', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_general_panel'
	) );
##################################################
# HEADER
##################################################
	Kirki::add_panel( 'agama_header_panel', array(
		'title'			=> __( 'Header', 'agama-pro' ),
		'priority'		=> 20
	) );
	##################################################
	# HEADER GENERAL SECTION
	##################################################
	Kirki::add_section( 'agama_header_section', array(
		'title'			=> __( 'General', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_header_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Header Style', 'agama-pro' ),
		'tooltip'	=> __( 'Select header style.', 'agama-pro' ),
		'section'		=> 'agama_header_section',
		'settings'		=> 'agama_header_style',
		'type'			=> 'radio-buttonset',
		'choices'		=> array(
			'v1'			=> __( 'Header V1', 'agama-pro' ),
			'v2'			=> __( 'Header V2', 'agama-pro' ),
			'v3'			=> __( 'Header V3', 'agama-pro' )
		),
		'default'		=> 'v3'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Top Margin', 'agama-pro' ),
		'tooltip'	=> __( 'Set header top margin in PX.', 'agama-pro' ),
		'section'		=> 'agama_header_section',
		'settings'		=> 'agama_header_top_margin',
		'type'			=> 'number',
		'output'		=> array(
			array(
				'element'	=> 'body:not(.header_v2):not(.header_v3) #main-wrapper',
				'property'	=> 'margin-top',
				'units'		=> 'px'
			)
		),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_header_style',
				'operator'	=> '==',
				'value'		=> 'v1'
			)
		),
		'default'		=> '0'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Inner Margin', 'agama-pro' ),
		'tooltip'	=> __( 'Set header inner margin in PX.', 'agama-pro' ),
		'section'		=> 'agama_header_section',
		'settings'		=> 'agama_header_inner_margin',
		'type'			=> 'number',
		'output'		=> array(
			array(
				'element'	=> 'header.header_v1 hgroup',
				'property'	=> 'margin-top',
				'units'		=> 'px'
			),
			array(
				'element'	=> 'header.header_v1 hgroup',
				'property'	=> 'margin-bottom',
				'units'		=> 'px'
			)
		),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_header_style',
				'operator'	=> '==',
				'value'		=> 'v1'
			)
		),
		'default'		=> '24'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Transparent Header', 'agama-pro' ),
		'tooltip'		    => __( 'Enable transparent header ? Working with header V2 style.', 'agama-pro' ),
		'section'			=> 'agama_header_section',
		'settings'			=> 'agama_header_transparent',
		'type'				=> 'switch',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_header_style',
				'operator'	=> '==',
				'value'		=> 'v2'
			)
		),
		'default'			=> false
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Top Border', 'agama-pro' ),
		'tooltip'	=> __( 'Select header top border height in PX.', 'agama-pro' ),
		'section'		=> 'agama_header_section',
		'settings'		=> 'agama_header_top_border_size',
		'type'			=> 'number',
		'output'		=> array(
			array(
				'element'	=> 'body:not(.top-bar-out) #top-bar, .top-bar-out .sticky-header, body.header_v2:not(.header_transparent) .sticky-header, .top-nav-wrapper',
				'property'	=> 'border-top-width',
				'units'		=> 'px'
			)
		),
		'default'		=> '3'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Top Border Style', 'agama-pro' ),
		'tooltip'	=> __( 'Set header top border style.', 'agama-pro' ),
		'section'		=> 'agama_header_section',
		'settings'		=> 'agama_header_top_border_style',
		'type'			=> 'select',
		'choices'		=> array(
			'solid'		=> __( 'Solid', 'agama-pro' ),
			'dashed'	=> __( 'Dashed', 'agama-pro' ),
			'dotted'	=> __( 'Dotted', 'agama-pro' ),
			'double'	=> __( 'Double', 'agama-pro' ),
			'none'		=> __( 'None', 'agama-pro' )
		),
		'output'		=> array(
			array(
				'element'	=> 'body:not(.top-bar-out) #top-bar, .top-bar-out .sticky-header, .header_v2 .sticky-header, .top-nav-wrapper',
				'property'	=> 'border-top-style'
			)
		),
		'default'		=> 'solid'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Search Icon', 'agama-pro' ),
		'tooltip'		    => __( 'Enable search icon on primary navigation.', 'agama-pro' ),
		'section'			=> 'agama_header_section',
		'settings'			=> 'agama_header_search',
		'type'				=> 'switch',
		'default'			=> true,
        'partial_refresh'   => array(
            'agama_header_search' => array(
                'selector'        => '.vision-custom-menu-item.vision-main-menu-search #top-search-trigger',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_nav_search_icon' )
            )
        )
	) );
	#######################################################
	# HEADER LOGO SECTION
	#######################################################
	Kirki::add_section( 'agama_header_logo_section', array(
		'title'			=> __( 'Logo', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_header_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Logo', 'agama-pro' ),
		'tooltip'	      => __( 'Upload custom logo.', 'agama-pro' ),
		'section'		  => 'agama_header_logo_section',
		'settings'		  => 'agama_logo',
		'type'			  => 'image',
		'default'		  => '',
        'partial_refresh' => array(
            'agama_logo'  => array(
                'selector'        => 'a.vision-logo-url',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_logo' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Logo Align', 'agama-pro' ),
		'tooltip'	=> __( 'Select logo align.', 'agama-pro' ),
		'section'		=> 'agama_header_logo_section',
		'settings'		=> 'agama_logo_align',
		'type'			=> 'radio-buttonset',
		'choices'		=> array(
			'left'		=> __( 'Left', 'agama-pro' ),
			'center'	=> __( 'Center', 'agama-pro' )
		),
		'default'		=> 'left'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Logo Max-Height', 'agama-pro' ),
		'tooltip'		    => __( 'Set logo max-height (pixels).', 'agama-pro' ),
		'section'			=> 'agama_header_logo_section',
		'settings'			=> 'agama_logo_max_height',
		'type'				=> 'slider',
		'choices'			=> array(
			'min'			=> '0',
			'max'			=> '500',
			'step'			=> '1'
		),
		'transport'			=> 'auto',
		'output'		    => array(
			array(
				'element'	=> '#masthead .logo',
				'property'	=> 'max-height',
				'units'		=> 'px'
			)
		),
		'default'			=> '87'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Logo Shrinked Max-Height', 'agama-pro' ),
		'tooltip'		=> __( 'Set logo shrinked max-height (pixels).', 'agama-pro' ),
		'section'			=> 'agama_header_logo_section',
		'settings'			=> 'agama_logo_shrinked_max_height',
		'type'				=> 'slider',
		'choices'			=> array(
			'min'			=> '0',
			'max'			=> '500',
			'step'			=> '1'
		),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_header_style',
				'operator'	=> '!==',
				'value'		=> 'v1'
			)
		),
		'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> '#masthead .sticky-header-shrink .logo',
				'property'	=> 'max-height',
				'units'		=> 'px'
			)
		),
		'default'			=> '62'
	) );
	##########################################
	# HEADER VIDEO & IMAGE SECTION
	##########################################
	Kirki::add_section( 'header_image', array(
		'title'			=> __( 'Image & Video', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_header_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable', 'agama-pro' ),
		'tooltip'	=> __( 'Enable header image - video ?', 'agama-pro' ),
		'section'		=> 'header_image',
		'settings'		=> 'agama_header_image',
		'type'			=> 'switch',
		'default'		=> false,
		'priority'		=> 1
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable on Pages', 'agama-pro' ),
		'tooltip'	=> __( 'Select on what pages you want to show header video or image.', 'agama-pro' ),
		'section'		=> 'header_image',
		'settings'		=> 'agama_header_image_pages',
		'type'			=> 'select',
		'choices'		=> AgamaChoice::pages(),
		'multiple'		=> '100',
		'default'		=> '',
		'priority'		=> 1
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Particles', 'agama-pro' ),
		'tooltip'	=> __( 'Enable particles ?', 'agama-pro' ),
		'settings'		=> 'agama_header_image_particles',
		'section'		=> 'header_image',
		'type'			=> 'switch',
		'default'		=> true,
		'priority'		=> 1
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Particles Circles Color', 'agama-pro' ),
		'tooltip'	=> __( 'Set particles circles custom color.', 'agama-pro' ),
		'settings'		=> 'agama_header_image_particles_circle_color',
		'section'		=> 'header_image',
		'type'			=> 'color',
		'default'		=> '#A2C605',
		'priority'		=> 1
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Particles Lines Color', 'agama-pro' ),
		'tooltip'	=> __( 'Set particles lines custom color.', 'agama-pro' ),
		'settings'		=> 'agama_header_image_particles_lines_color',
		'section'		=> 'header_image',
		'type'			=> 'color',
		'default'		=> '#A2C605',
		'priority'		=> 1
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Video Height', 'agama-pro' ),
		'tooltip'	=> __( 'Set header video custom height.', 'agama-pro' ),
		'settings'		=> 'agama_header_video_height',
		'section'		=> 'header_image',
		'type'			=> 'number',
		'choices'		=> array(
			'min'		=> 1,
			'max'		=> 2000,
			'step'		=> 1
		),
		'default'		=> '960',
		'priority'		=> 9
	) );
	##########################################################
	# HEADER STYLING SECTION
	##########################################################
	Kirki::add_section( 'agama_header_styling_section', array(
		'title'			=> __( 'Styling', 'agama-pro' ),
		'panel'			=> 'agama_header_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Header BG Color', 'agama-pro' ),
		'tooltip'		    => __( 'Set header background color. Not working with transparent header.', 'agama-pro' ),
		'section'			=> 'agama_header_styling_section',
		'settings'			=> 'agama_header_bg_color',
		'type'				=> 'color',
        'choices'           => array(
            'alpha'			=> true,
        ),
		'output'			=> array(
			array(
				'element'	=> '#masthead, .sticky-header-shrink, #masthead nav:not(.mobile-menu) ul.sub-menu',
				'property'	=> 'background-color'
			)
		),
		'transport'			=> 'auto',
		'default'			=> 'rgba(255, 255, 255, 1)'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Header Shrink BG Color', 'agama-pro' ),
		'tooltip'		    => __( 'Set header shrink background color. Working with header V2 & V3 style.', 'agama-pro' ),
		'section'			=> 'agama_header_styling_section',
		'settings'			=> 'agama_transparent_header_shrink_bg_color',
		'type'				=> 'color-alpha',
		'output'			=> array(
			array(
				'element'	=> 'header.header_v2 .sticky-header-shrink',
				'property'	=> 'background-color'
			),
			array(
				'element'	=> 'header.header_v3 .sticky-header-shrink',
				'property'	=> 'background-color'
			)
		),
		'transport'			=> 'auto',
		'default'			=> 'rgba(255, 255, 255, .95)'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Header BG Image', 'agama-pro' ),
		'tooltip'		=> __( 'Set header background image.', 'agama-pro' ),
		'section'			=> 'agama_header_styling_section',
		'settings'			=> 'agama_header_bg_image',
		'type'				=> 'image',
		'output'			=> array(
			array(
				'element'	=> '#masthead, .sticky-header-shrink',
				'property'	=> 'background-image'
			)
		),
		'transport'			=> 'auto',
		'default'			=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Background Image Repeat', 'agama-pro' ),
		'tooltip'		=> __( 'Header background image repeat.', 'agama-pro' ),
		'section'			=> 'agama_header_styling_section',
		'settings'			=> 'agama_header_bg_image_repeat',
		'type'				=> 'select',
		'choices'			=> array(
			'no-repeat'		=> __( 'No Repeat', 'agama-pro' ),
			'repeat'		=> __( 'Repeat All', 'agama-pro' ),
			'repeat-x'		=> __( 'Repeat Horizontally', 'agama-pro' ),
			'repeat-y'		=> __( 'Repeat Vertically', 'agama-pro' ),
			'inherit'		=> __( 'Inherit', 'agama-pro' )
		),
		'output'			=> array(
			array(
				'element'	=> '#masthead, .sticky-header-shrink, #masthead nav ul.sub-menu, #masthead .mobile-menu',
				'property'	=> 'background-repeat'
			)
		),
		'transport'			=> 'auto',
		'default'			=> 'no-repeat'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Background Image Size', 'agama-pro' ),
		'tooltip'		=> __( 'Header background image size.', 'agama-pro' ),
		'section'			=> 'agama_header_styling_section',
		'settings'			=> 'agama_header_bg_image_size',
		'type'				=> 'select',
		'choices'			=> array(
			'inherit'		=> __( 'Inherit', 'agama-pro' ),
			'cover'			=> __( 'Cover', 'agama-pro' ),
			'contain'		=> __( 'Contain', 'agama-pro' ),
		),
		'output'			=> array(
			array(
				'element'	=> '#masthead, .sticky-header-shrink, #masthead nav ul.sub-menu, #masthead .mobile-menu',
				'property'	=> 'background-size'
			)
		),
		'transport'			=> 'auto',
		'default'			=> 'inherit'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Background Image Attachment', 'agama-pro' ),
		'tooltip'		=> __( 'Header background image attachment.', 'agama-pro' ),
		'section'			=> 'agama_header_styling_section',
		'settings'			=> 'agama_header_bg_image_attachment',
		'type'				=> 'select',
		'choices'			=> array(
			'fixed'			=> __( 'Fixed', 'agama-pro' ),
			'scroll'		=> __( 'Scroll', 'agama-pro' ),
			'inherit'		=> __( 'Inherit', 'agama-pro' ),
		),
		'output'			=> array(
			array(
				'element'	=> '#masthead, .sticky-header-shrink, #masthead nav ul.sub-menu, #masthead .mobile-menu',
				'property'	=> 'background-attachment'
			)
		),
		'transport'			=> 'auto',
		'default'			=> 'inherit'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Background Image Position', 'agama-pro' ),
		'tooltip'		=> __( 'Header background image position.', 'agama-pro' ),
		'section'			=> 'agama_header_styling_section',
		'settings'			=> 'agama_header_bg_image_position',
		'type'				=> 'select',
		'choices'			=> array(
			'left top'		=> __( 'Left Top', 'agama-pro' ),
			'left center'	=> __( 'Left Center', 'agama-pro' ),
			'left bottom'	=> __( 'Left Bottom', 'agama-pro' ),
			'center top'	=> __( 'Center Top', 'agama-pro' ),
			'center center'	=> __( 'Center Center', 'agama-pro' ),
			'center bottom'	=> __( 'Center Bottom', 'agama-pro' ),
			'right top'		=> __( 'Right Top', 'agama-pro' ),
			'right center'	=> __( 'Right Center', 'agama-pro' ),
			'right bottom'	=> __( 'Right Bottom', 'agama-pro' ),
		),
		'output'			=> array(
			array(
				'element'	=> '#masthead, .sticky-header-shrink, #masthead nav ul.sub-menu, #masthead .mobile-menu',
				'property'	=> 'background-position'
			)
		),
		'transport'			=> 'auto',
		'default'			=> 'inherit'
	) );
#######################################################
# NAVIGATIONS
#######################################################
	Kirki::add_panel( 'agama_navigations_panel', array( 
		'title'			=> __( 'Navigations', 'agama-pro' ),
		'priority'		=> 30,
	) );
	##########################################################
	# TOP NAVIGATION SECTION
	##########################################################
	Kirki::add_section( 'agama_navigation_top_section', array(
		'title'			=> __( 'Navigation Top', 'agama-pro' ),
		'panel'			=> 'agama_navigations_panel',
		'capability'	=> 'edit_theme_options'
	) );
    Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Top Navigation', 'agama-pro' ),
		'tooltip'		    => __( 'Enable top navigation on top navigation area left side.', 'agama-pro' ),
		'section'			=> 'agama_navigation_top_section',
		'settings'			=> 'agama_top_navigation',
		'type'				=> 'switch',
		'default'			=> true,
        'partial_refresh'   => array(
            'agama_top_navigation' => array(
                'selector'         => '.agama-top-nav',
                'render_callback'  => array( 'Agama_Partial_Refresh', 'preview_top_navigation' )
            )
        )
	) );
    Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Social Icons', 'agama-pro' ),
		'tooltip'		    => __( 'Enable social icons on top navigation area right side.', 'agama-pro' ),
		'section'			=> 'agama_navigation_top_section',
		'settings'			=> 'agama_top_nav_social',
		'type'				=> 'switch',
		'default'			=> true,
        'partial_refresh'   => array(
            'agama_top_nav_social' => array(
                'selector'        => '#masthead #top-social',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_top_nav_social_icons' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Select Font', 'agama-pro' ),
		'tooltip'	=> __( 'Select font for primary navigation.', 'agama-pro' ),
		'section'		=> 'agama_navigation_top_section',
		'settings'		=> 'agama_navigation_top_font',
		'type'			=> 'typography',
		'output'		=> array(
			array( 'element' => '#masthead .agama-top-nav a' )
		),
		'default'		=> array(
			'font-family'	=> 'Roboto Condensed',
			'variant'		=> '700',
			'font-size'		=> '14px'
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Links Color', 'agama-pro' ),
		'tooltip'		=> __( 'Select top navigation links color.', 'agama-pro' ),
		'section'			=> 'agama_navigation_top_section',
		'settings'			=> 'agama_navigation_top_links_color',
		'type'				=> 'color',
		'output'			=> array(
			array(
				'element'	=> '#masthead .agama-top-nav a',
				'property' 	=> 'color'
			)
		),
		'transport'			=> 'auto',
		'default'			=> '#757575'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Links Hover Color', 'agama-pro' ),
		'tooltip'		=> __( 'Select top navigation links hover color.', 'agama-pro' ),
		'section'			=> 'agama_navigation_top_section',
		'settings'			=> 'agama_navigation_top_links_hover_color',
		'type'				=> 'color',
		'output'			=> array(
			array(
				'element'	=> '#masthead .agama-top-nav a:hover',
				'property' 	=> 'color'
			)
		),
		'transport'			=> 'auto',
		'default'			=> '#333'
	) );
	##############################################################
	# PRIMARY NAVIGATION SECTION
	##############################################################
	Kirki::add_section( 'agama_navigation_primary_section', array(
		'title'				=> __( 'Navigation Primary', 'agama-pro' ),
		'panel'				=> 'agama_navigations_panel',
		'capability'		=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Select Font', 'agama-pro' ),
		'tooltip'		=> __( 'Select font for primary navigation.', 'agama-pro' ),
		'section'			=> 'agama_navigation_primary_section',
		'settings'			=> 'agama_navigation_primary_font',
		'type'				=> 'typography',
		'output'			=> array(
			array( 
				'element'	=> '#masthead .agama-primary-nav a' 
			)
		),
		'default'			=> array(
			'font-family'	=> 'Roboto Condensed',
			'variant'		=> '700',
			'font-size'		=> '14px'
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Links Color', 'agama-pro' ),
		'tooltip'		=> __( 'Select primary navigation links color.', 'agama-pro' ),
		'section'			=> 'agama_navigation_primary_section',
		'settings'			=> 'agama_navigation_primary_links_color',
		'type'				=> 'color',
		'output'			=> array(
			array(
				'element'	=> '#masthead .agama-primary-nav a',
				'property' 	=> 'color'
			)
		),
		'transport'			=> 'auto',
		'default'			=> '#757575'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Links Hover Color', 'agama-pro' ),
		'tooltip'		=> __( 'Select primary navigation links hover color.', 'agama-pro' ),
		'section'			=> 'agama_navigation_primary_section',
		'settings'			=> 'agama_navigation_primary_links_hover_color',
		'type'				=> 'color',
		'output'			=> array(
			array(
				'element'	=> '#masthead .agama-primary-nav a:hover',
				'property' 	=> 'color'
			)
		),
		'transport'			=> 'auto',
		'default'			=> '#333'
	) );
	#############################################################
	# MOBILE NAVIGATION SECTION
	#############################################################
	Kirki::add_section( 'agama_navigation_mobile_section', array(
		'title'				=> __( 'Navigation Mobile', 'agama-pro' ),
		'panel'				=> 'agama_navigations_panel',
		'capability'		=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Mobile Top Navigation', 'agama-pro' ),
		'tooltip'		=> __( 'Enable mobile top navigation ?', 'agama-pro' ),
		'settings'			=> 'agama_mobile_top_nav',
		'section'			=> 'agama_navigation_mobile_section',
		'type'				=> 'switch',
		'default'			=> false
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Mobile Navigation Font', 'agama-pro' ),
		'tooltip'		=> __( 'Select font for mobile navigation.', 'agama-pro' ),
		'section'			=> 'agama_navigation_mobile_section',
		'settings'			=> 'agama_mobile_navigation_font',
		'type'				=> 'typography',
		'output'			=> array(
			array( 
				'element' 	=> 'nav.mobile-menu ul li a' 
			)
		),
		'default'			=> array(
			'font-family'	=> 'Raleway',
			'variant'		=> '700',
			'font-size'		=> '13px'
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Mobile Navigation Background Color', 'agama-pro' ),
		'tooltip'		=> __( 'Set custom mobile navigation background color.', 'agama-pro' ),
		'section'			=> 'agama_navigation_mobile_section',
		'settings'			=> 'agama_mobile_nav_bg_color',
		'type'				=> 'color',
		'output'			=> array(
			array(
				'element'	=> 'nav.mobile-menu',
				'property'	=> 'background'
			)
		),
		'transport'			=> 'auto',
		'default'			=> '#FFFFFF'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Mobile Navigation Links Color', 'agama-pro' ),
		'tooltip'		=> __( 'Set cutom mobile navigation links color.', 'agama-pro' ),
		'section'			=> 'agama_navigation_mobile_section',
		'settings'			=> 'agama_mobile_nav_link_color',
		'type'				=> 'color',
		'output'			=> array(
			array(
				'element'	=> 'ul.mobile-menu-icons li a, nav.mobile-menu ul li a',
				'property'	=> 'color'
			)
		),
		'transport'			=> 'auto',
		'default'			=> '#757575'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Mobile Navigation Links Hover Color', 'agama-pro' ),
		'tooltip'		=> __( 'Set custom mobile navigation links hover color.', 'agama-pro' ),
		'section'			=> 'agama_navigation_mobile_section',
		'settings'			=> 'agama_mobile_nav_link_hover_color',
		'type'				=> 'color',
		'output'			=> array(
			array(
				'element'	=> 'ul.mobile-menu-icons li a:hover, nav.mobile-menu ul li a:hover',
				'property'	=> 'color'
			)
		),
		'transport'			=> 'auto',
		'default'			=> '#333'
	) );
##################################################
# LAYOUT
##################################################
	Kirki::add_panel( 'agama_layout_panel', array(
		'title'			=> __( 'Layout', 'agama-pro' ),
		'priority'		=> 40
	) );
	Kirki::add_section( 'agama_layout_section', array(
		'title'			=> __( 'General', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_layout_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Layout Style', 'agama-pro' ),
		'tooltip'	=> __( 'Select layout style.', 'agama-pro' ),
		'section'		=> 'agama_layout_section',
		'settings'		=> 'agama_layout_style',
		'type'			=> 'select',
		'choices'		=> array(
			'fullwidth'	=> __( 'Full-Width', 'agama-pro' ),
			'boxed'		=> __( 'Boxed', 'agama-pro' )
		),
		'default'		=> 'fullwidth'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Layout Width', 'agama-pro' ),
		'tooltip'	=> __( 'Set custom layout width. Default: 1100px', 'agama-pro' ),
		'section'		=> 'agama_layout_section',
		'settings'		=> 'agama_layout_max_width',
		'type'			=> 'text',
		'default'		=> '1200px'
	) );
	###################################################
	# SIDEBAR SECTION
	###################################################
	Kirki::add_section( 'agama_sidebar_section', array(
		'title'				=> __( 'Sidebar', 'agama-pro' ),
		'capability'		=> 'edit_theme_options',
		'panel'				=> 'agama_layout_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Sidebar Position', 'agama-pro' ),
		'tooltip'	=> __( 'Select sidebar position.', 'agama-pro' ),
		'section'		=> 'agama_sidebar_section',
		'settings'		=> 'agama_sidebar_position',
		'type'			=> 'select',
		'choices'		=> array(
			'left'		=> __( 'Left', 'agama-pro' ),
			'right'		=> __( 'Right', 'agama-pro' )
		),
		'default'		=> 'right'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Sidebar Headings', 'agama-pro' ),
		'tooltip'		=> __( 'Customize sidebar headings.', 'agama-pro' ),
		'settings'			=> 'agama_sidebar_widget_headings',
		'section'			=> 'agama_sidebar_section',
		'type'				=> 'typography',
		'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> '#secondary .widget .widget-title'
			)
		),
		'default'			=> array(
			'font-family'	=> 'Raleway',
			'variant'		=> '700',
			'font-size'		=> '11px',
			'line-height'	=> '2.181818182',
			'color'			=> '#636363'
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Sidebar Body', 'agama-pro' ),
		'tooltip'		=> __( 'Customize sidebar body text.', 'agama-pro' ),
		'settings'			=> 'agama_sidebar_widget_body_font',
		'section'			=> 'agama_sidebar_section',
		'type'				=> 'typography',
		'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> '#secondary .widget'
			)
		),
		'default'			=> array(
			'font-family'	=> 'inherit',
			'variant'		=> 'inherit',
			'font-size'		=> '13px',
			'line-height'	=> '1.846153846',
			'color'			=> '#9f9f9f'
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Sidebar Links Color', 'agama-pro' ),
		'tooltip'		=> __( 'Customize sidebar links color.', 'agama-pro' ),
		'settings'			=> 'agama_sidebar_widget_body_links',
		'section'			=> 'agama_sidebar_section',
		'type'				=> 'color',
		'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> '#secondary .widget a',
				'property'	=> 'color'
			)
		),
		'default'			=> '#9f9f9f'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Sidebar Links Hover Color', 'agama-pro' ),
		'tooltip'		=> __( 'Customize sidebar links hover color.', 'agama-pro' ),
		'settings'			=> 'agama_sidebar_widget_body_links_hover',
		'section'			=> 'agama_sidebar_section',
		'type'				=> 'color',
		'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> '#secondary .widget a:hover',
				'property'	=> 'color'
			)
		),
		'default'			=> '#444'
	) );
##################################################
# SLIDER
##################################################
	Kirki::add_panel( 'agama_slider_panel', array(
		'title'			=> __( 'Slider', 'agama-pro' ),
		'priority'		=> 50,
	) );
	##########################################################
	# SLIDER GENERAL SECTION
	##########################################################
	Kirki::add_section( 'agama_slider_general_section', array(
		'title'			=> __( 'General', 'agama-pro' ),
		'panel'			=> 'agama_slider_panel',
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'On Home', 'agama-pro' ),
		'tooltip'	    => __( 'Enable Agama slider on Home page ?', 'agama-pro' ),
		'section'		=> 'agama_slider_general_section',
		'settings'		=> 'agama_slider',
		'type'			=> 'switch',
		'default'		=> false
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Loader', 'agama-pro' ),
		'tooltip'	=> __( 'Select slider loader style.', 'agama-pro' ),
		'section'		=> 'agama_slider_general_section',
		'settings'		=> 'agama_slider_loader',
		'type'			=> 'select',
		'choices'		=> array(
			'bar'		=> __( 'Bar', 'agama-pro' ),
			'pie'		=> __( 'Pie', 'agama-pro' ),
			'off'		=> __( 'Disabled', 'agama-pro' )
		),
		'default'		=> 'bar'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Time', 'agama-pro' ),
		'tooltip'	    => __( 'Milliseconds between the end of the sliding effect and the start of the nex one. 1000ms = 1sec', 'agama-pro' ),
		'section'		=> 'agama_slider_general_section',
		'settings'		=> 'agama_slider_time',
		'type'			=> 'number',
		'choices'		=> array(
			'min'		=> '1',
			'max'		=> '70000',
			'step'		=> '1000'
		),
		'default'		=> '7000'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Slider Height', 'agama-pro' ),
		'tooltip'	    => __( 'Select slider height in percentage. If zero value set, min-height 300px will be applied.', 'agama-pro' ),
		'section'		=> 'agama_slider_general_section',
		'settings'		=> 'agama_slider_height',
		'type'			=> 'number',
		'choices'		=> array(
			'min'		=> 0,
			'max'		=> 100,
			'step'		=> 1
		),
		'default'		=> '40'
	) );
	############################################################
	# PARTICLES SECTION
	############################################################
	Kirki::add_section( 'agama_slider_particles_section', array(
		'title'			=> __( 'Particles', 'agama-pro' ),
		'panel'			=> 'agama_slider_panel',
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Particles', 'agama-pro' ),
		'tooltip'	=> __( 'Enable particles on slider ?', 'agama-pro' ),
		'settings'		=> 'agama_slider_particles',
		'section'		=> 'agama_slider_particles_section',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Particle Circles Color', 'agama-pro' ),
		'tooltip'	=> __( 'Set particles custom circles color ?', 'agama-pro' ),
		'settings'		=> 'agama_slider_particles_circle_color',
		'section'		=> 'agama_slider_particles_section',
		'type'			=> 'color',
		'default'		=> '#A2C605'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Particles Lines Color', 'agama-pro' ),
		'tooltip'	=> __( 'Set particles custom lines color', 'agama-pro' ),
		'settings'		=> 'agama_slider_particles_lines_color',
		'section'		=> 'agama_slider_particles_section',
		'type'			=> 'color',
		'default'		=> '#A2C605'
	) );
	###########################################################
	# SLIDER STYLING SECTION
	###########################################################
	Kirki::add_section( 'agama_slide_1_styling_section', array(
		'title'			=> __( 'Styling', 'agama-pro' ),
		'panel'			=> 'agama_slider_panel',
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Overlay', 'agama-pro' ),
		'tooltip'	=> __( 'Enable slider overlay ?', 'agama-pro' ),
		'section'		=> 'agama_slide_1_styling_section',
		'settings'		=> 'agama_slider_overlay',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Overlay BG Color', 'agama-pro' ),
		'tooltip'		=> __( 'Set custom overlay background color.', 'agama-pro' ),
		'section'			=> 'agama_slide_1_styling_section',
		'settings'			=> 'agama_slider_overlay_bg_color',
		'type'				=> 'color',
		'choices'			=> array(
			'alpha'			=> true
		),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_overlay',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'output'			=> array(
            array(
                'element'		=> '.camera_overlayer',
                'property'		=> 'background'
            )
		),
		'default'			=> 'rgba(11, 57, 84, .5)'
	) );
	###################################################
	# SLIDE 1 SECTION
	###################################################
	Kirki::add_section( 'agama_slide_1_section', array(
		'title'			=> __( 'Slide #1', 'agama-pro' ),
		'panel'			=> 'agama_slider_panel',
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Image', 'agama-pro' ),
		'settings'		=> 'agama_slider_image_1',
		'section'		=> 'agama_slide_1_section',
		'type'			=> 'image',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			    => __( 'Title', 'agama-pro' ),
		'tooltip'	        => __( 'Add custom slide title.', 'agama-pro' ),
		'section'		    => 'agama_slide_1_section',
		'settings'		    => 'agama_slider_title_1',
		'type'			    => 'text',
		'default'		    => __( 'Welcome to Agama', 'agama-pro' ),
        'partial_refresh'   => array(
            'agama_slider_title_1' => array(
                'selector'         => '.agama-slider-wrapper .slide-1 h2.slide-title',
                'render_callback'  => array( 'Agama_Partial_Refresh', 'preview_slide_1_title' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Title Styling', 'agama-pro' ),
		'tooltip'	=> __( 'Select title font styling.', 'agama-pro' ),
		'section'		=> 'agama_slide_1_section',
		'settings'		=> 'agama_slider_title_1_typo',
		'type'			=> 'typography',
		'default'		=> array(
			'font-family'	=> 'Crete Round',
			'font-size'		=> '46px',
			'color'			=> '#fff'
		),
		'output'=> array(
			array(
				'element'	=> '#agama_slider .slide-1 h2.slide-title'

			)
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Title Animation', 'agama-pro' ),
		'tooltip'	=> __( 'Select title slide animation.', 'agama-pro' ),
		'section'		=> 'agama_slide_1_section',
		'settings'		=> 'agama_slider_title_animation_1',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'default'		=> 'bounceInLeft'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable Button ?', 'agama-pro' ),
		'tooltip'	=> __( 'Enable slider button.', 'agama-pro' ),
		'section'		=> 'agama_slide_1_section',
		'settings'		=> 'agama_slider_button_1',
		'type'			=> 'switch',
		'default'		=> true
	) );
    Kirki::add_field( 'agama_options', array(
        'label'         => __( 'Button Style', 'agama-pro' ),
        'tooltip'   => __( 'Select button style.', 'agama-pro' ),
        'section'       => 'agama_slide_1_section',
        'settings'      => 'agama_slider_button_style_1',
        'type'          => 'select',
        'choices'       => array(
            'button-3d'       => __( '3D Button', 'agama-pro' ),
            'button-border'   => __( 'Border Button', 'agama-pro' )
        ),
        'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_1',
				'operator'	=> '==',
				'value'		=> true
			)
		),
        'default'       => 'button-border'
    ) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Button Title', 'agama-pro' ),
		'tooltip'		=> __( 'Set custom button title.', 'agama-pro' ),
		'section'			=> 'agama_slide_1_section',
		'settings'			=> 'agama_slider_button_title_1',
		'type'				=> 'text',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_1',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> __( 'Learn More', 'agama-pro' ),
        'partial_refresh'   => array(
            'agama_slider_button_title_1' => array(
                'selector'                => '.agama-slider-wrapper .slide-1 a.button',
                'render_callback'         => array( 'Agama_Partial_Refresh', 'preview_slide_1_button' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button Animation', 'agama-pro' ),
		'tooltip'	=> __( 'Select button slide animation.', 'agama-pro' ),
		'section'		=> 'agama_slide_1_section',
		'settings'		=> 'agama_slider_button_animation_1',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_1',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> 'bounceInRight'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set button url.', 'agama-pro' ),
		'section'		=> 'agama_slide_1_section',
		'settings'		=> 'agama_slider_button_url_1',
		'type'			=> 'text',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_1',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> '#'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Button BG Color', 'agama-pro' ),
		'tooltip'		=> __( 'Select button background color.', 'agama-pro' ),
		'section'			=> 'agama_slide_1_section',
		'settings'			=> 'agama_slider_button_bg_color_1',
		'type'				=> 'color',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_1',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> '#A2C605'
	) );
	###################################################
	# SLIDE 2 SECTION
	###################################################
	Kirki::add_section( 'agama_slide_2_section', array(
		'title'			=> __( 'Slide #2', 'agama-pro' ),
		'panel'			=> 'agama_slider_panel',
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Image', 'agama-pro' ),
		'settings'		=> 'agama_slider_image_2',
		'section'		=> 'agama_slide_2_section',
		'type'			=> 'image',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			    => __( 'Title', 'agama-pro' ),
		'tooltip'	        => __( 'Add custom slide title.', 'agama-pro' ),
		'section'		    => 'agama_slide_2_section',
		'settings'		    => 'agama_slider_title_2',
		'type'			    => 'text',
		'default'		    => __( 'Welcome to Agama', 'agama-pro' ),
        'partial_refresh'   => array(
            'agama_slider_title_2' => array(
                'selector'         => '.agama-slider-wrapper .slide-2 h2.slide-title',
                'render_callback'  => array( 'Agama_Partial_Refresh', 'preview_slide_2_title' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Title Styling', 'agama-pro' ),
		'tooltip'	=> __( 'Select title font styling.', 'agama-pro' ),
		'section'		=> 'agama_slide_2_section',
		'settings'		=> 'agama_slider_title_2_typo',
		'type'			=> 'typography',
		'default'		=> array(
			'font-family'	=> 'Crete Round',
			'font-size'		=> '46px',
			'color'			=> '#fff'
		),
		'output'=> array(
			array(
				'element'	=> '#agama_slider .slide-2 h2.slide-title'

			)
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Title Animation', 'agama-pro' ),
		'tooltip'	=> __( 'Select title slide animation.', 'agama-pro' ),
		'section'		=> 'agama_slide_2_section',
		'settings'		=> 'agama_slider_title_animation_2',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'default'		=> 'bounceInLeft'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable Button ?', 'agama-pro' ),
		'tooltip'	=> __( 'Enable slider button.', 'agama-pro' ),
		'section'		=> 'agama_slide_2_section',
		'settings'		=> 'agama_slider_button_2',
		'type'			=> 'switch',
		'default'		=> true
	) );
    Kirki::add_field( 'agama_options', array(
        'label'         => __( 'Button Style', 'agama-pro' ),
        'tooltip'   => __( 'Select button style.', 'agama-pro' ),
        'section'       => 'agama_slide_2_section',
        'settings'      => 'agama_slider_button_style_2',
        'type'          => 'select',
        'choices'       => array(
            'button-3d'       => __( '3D Button', 'agama-pro' ),
            'button-border'   => __( 'Border Button', 'agama-pro' )
        ),
        'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_2',
				'operator'	=> '==',
				'value'		=> true
			)
		),
        'default'       => 'button-border'
    ) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button Title', 'agama-pro' ),
		'tooltip'	    => __( 'Set custom button title.', 'agama-pro' ),
		'section'		=> 'agama_slide_2_section',
		'settings'		=> 'agama_slider_button_title_2',
		'type'			=> 'text',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_2',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		  => __( 'Learn More', 'agama-pro' ),
        'partial_refresh' => array(
            'agama_slider_button_title_2' => array(
                'selector'                => '.agama-slider-wrapper .slide-2 a.button',
                'render_callback'         => array( 'Agama_Partial_Refresh', 'preview_slide_2_button' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button Animation', 'agama-pro' ),
		'tooltip'	=> __( 'Select button slide animation.', 'agama-pro' ),
		'section'		=> 'agama_slide_2_section',
		'settings'		=> 'agama_slider_button_animation_2',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_2',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> 'bounceInRight'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set button url.', 'agama-pro' ),
		'section'		=> 'agama_slide_2_section',
		'settings'		=> 'agama_slider_button_url_2',
		'type'			=> 'text',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_2',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> '#'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button BG Color', 'agama-pro' ),
		'tooltip'	=> __( 'Select button background color.', 'agama-pro' ),
		'section'		=> 'agama_slide_2_section',
		'settings'		=> 'agama_slider_button_bg_color_2',
		'type'			=> 'color',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_2',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> '#A2C605'
	) );
	###################################################
	# SLIDE 3 SECTION
	###################################################
	Kirki::add_section( 'agama_slide_3_section', array(
		'title'			=> __( 'Slide #3', 'agama-pro' ),
		'panel'			=> 'agama_slider_panel',
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Image', 'agama-pro' ),
		'settings'		=> 'agama_slider_image_3',
		'section'		=> 'agama_slide_3_section',
		'type'			=> 'image',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			    => __( 'Title', 'agama-pro' ),
		'tooltip'	        => __( 'Add custom slide title.', 'agama-pro' ),
		'section'		    => 'agama_slide_3_section',
		'settings'		    => 'agama_slider_title_3',
		'type'			    => 'text',
		'default'		    => __( 'Welcome to Agama', 'agama-pro' ),
        'partial_refresh'   => array(
            'agama_slider_title_3' => array(
                'selector'         => '.agama-slider-wrapper .slide-3 h2.slide-title',
                'render_callback'  => array( 'Agama_Partial_Refresh', 'preview_slide_3_title' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Title Styling', 'agama-pro' ),
		'tooltip'	=> __( 'Select title font styling.', 'agama-pro' ),
		'section'		=> 'agama_slide_3_section',
		'settings'		=> 'agama_slider_title_3_typo',
		'type'			=> 'typography',
		'default'		=> array(
			'font-family'	=> 'Crete Round',
			'font-size'		=> '46px',
			'color'			=> '#fff'
		),
		'output'=> array(
			array(
				'element'	=> '#agama_slider .slide-3 h2.slide-title'

			)
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Title Animation', 'agama-pro' ),
		'tooltip'	=> __( 'Select title slide animation.', 'agama-pro' ),
		'section'		=> 'agama_slide_3_section',
		'settings'		=> 'agama_slider_title_animation_3',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'default'		=> 'bounceInLeft'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable Button ?', 'agama-pro' ),
		'tooltip'	=> __( 'Enable slider button.', 'agama-pro' ),
		'section'		=> 'agama_slide_3_section',
		'settings'		=> 'agama_slider_button_3',
		'type'			=> 'switch',
		'default'		=> true
	) );
    Kirki::add_field( 'agama_options', array(
        'label'         => __( 'Button Style', 'agama-pro' ),
        'tooltip'   => __( 'Select button style.', 'agama-pro' ),
        'section'       => 'agama_slide_3_section',
        'settings'      => 'agama_slider_button_style_3',
        'type'          => 'select',
        'choices'       => array(
            'button-3d'       => __( '3D Button', 'agama-pro' ),
            'button-border'   => __( 'Border Button', 'agama-pro' )
        ),
        'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_3',
				'operator'	=> '==',
				'value'		=> true
			)
		),
        'default'       => 'button-border'
    ) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button Title', 'agama-pro' ),
		'tooltip'	=> __( 'Set custom button title.', 'agama-pro' ),
		'section'		=> 'agama_slide_3_section',
		'settings'		=> 'agama_slider_button_title_3',
		'type'			=> 'text',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_3',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		  => __( 'Learn More', 'agama-pro' ),
        'partial_refresh' => array(
            'agama_slider_button_title_3' => array(
                'selector'                => '.agama-slider-wrapper .slide-3 a.button',
                'render_callback'         => array( 'Agama_Partial_Refresh', 'preview_slide_3_button' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button Animation', 'agama-pro' ),
		'tooltip'	=> __( 'Select button slide animation.', 'agama-pro' ),
		'section'		=> 'agama_slide_3_section',
		'settings'		=> 'agama_slider_button_animation_3',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_3',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> 'bounceInRight'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set button url.', 'agama-pro' ),
		'section'		=> 'agama_slide_3_section',
		'settings'		=> 'agama_slider_button_url_3',
		'type'			=> 'text',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_3',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> '#'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button BG Color', 'agama-pro' ),
		'tooltip'	=> __( 'Select button background color.', 'agama-pro' ),
		'section'		=> 'agama_slide_3_section',
		'settings'		=> 'agama_slider_button_bg_color_3',
		'type'			=> 'color',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_3',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> '#A2C605'
	) );
	###################################################
	# SLIDE 4 SECTION
	###################################################
	Kirki::add_section( 'agama_slide_4_section', array(
		'title'			=> __( 'Slide #4', 'agama-pro' ),
		'panel'			=> 'agama_slider_panel',
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Image', 'agama-pro' ),
		'settings'		=> 'agama_slider_image_4',
		'section'		=> 'agama_slide_4_section',
		'type'			=> 'image',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			    => __( 'Title', 'agama-pro' ),
		'tooltip'	        => __( 'Add custom slide title.', 'agama-pro' ),
		'section'		    => 'agama_slide_4_section',
		'settings'		    => 'agama_slider_title_4',
		'type'			    => 'text',
		'default'		    => __( 'Welcome to Agama', 'agama-pro' ),
        'partial_refresh'   => array(
            'agama_slider_title_4' => array(
                'selector'         => '.agama-slider-wrapper .slide-4 h2.slide-title',
                'render_callback'  => array( 'Agama_Partial_Refresh', 'preview_slide_4_title' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Title Styling', 'agama-pro' ),
		'tooltip'	=> __( 'Select title font styling.', 'agama-pro' ),
		'section'		=> 'agama_slide_4_section',
		'settings'		=> 'agama_slider_title_4_typo',
		'type'			=> 'typography',
		'default'		=> array(
			'font-family'	=> 'Crete Round',
			'font-size'		=> '46px',
			'color'			=> '#fff'
		),
		'output'=> array(
			array(
				'element'	=> '#agama_slider .slide-4 h2.slide-title'

			)
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Title Animation', 'agama-pro' ),
		'tooltip'	=> __( 'Select title slide animation.', 'agama-pro' ),
		'section'		=> 'agama_slide_4_section',
		'settings'		=> 'agama_slider_title_animation_4',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'default'		=> 'bounceInLeft'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable Button ?', 'agama-pro' ),
		'tooltip'	=> __( 'Enable slider button.', 'agama-pro' ),
		'section'		=> 'agama_slide_4_section',
		'settings'		=> 'agama_slider_button_4',
		'type'			=> 'switch',
		'default'		=> true
	) );
    Kirki::add_field( 'agama_options', array(
        'label'         => __( 'Button Style', 'agama-pro' ),
        'tooltip'   => __( 'Select button style.', 'agama-pro' ),
        'section'       => 'agama_slide_4_section',
        'settings'      => 'agama_slider_button_style_4',
        'type'          => 'select',
        'choices'       => array(
            'button-3d'       => __( '3D Button', 'agama-pro' ),
            'button-border'   => __( 'Border Button', 'agama-pro' )
        ),
        'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_4',
				'operator'	=> '==',
				'value'		=> true
			)
		),
        'default'       => 'button-border'
    ) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button Title', 'agama-pro' ),
		'tooltip'	=> __( 'Set custom button title.', 'agama-pro' ),
		'section'		=> 'agama_slide_4_section',
		'settings'		=> 'agama_slider_button_title_4',
		'type'			=> 'text',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_4',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		  => __( 'Learn More', 'agama-pro' ),
        'partial_refresh' => array(
            'agama_slider_button_title_4' => array(
                'selector'                => '.agama-slider-wrapper .slide-4 a.button',
                'render_callback'         => array( 'Agama_Partial_Refresh', 'preview_slide_4_button' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button Animation', 'agama-pro' ),
		'tooltip'	=> __( 'Select button slide animation.', 'agama-pro' ),
		'section'		=> 'agama_slide_4_section',
		'settings'		=> 'agama_slider_button_animation_4',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_4',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> 'bounceInRight'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set button url.', 'agama-pro' ),
		'section'		=> 'agama_slide_4_section',
		'settings'		=> 'agama_slider_button_url_4',
		'type'			=> 'text',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_4',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> '#'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button BG Color', 'agama-pro' ),
		'tooltip'	=> __( 'Select button background color.', 'agama-pro' ),
		'section'		=> 'agama_slide_4_section',
		'settings'		=> 'agama_slider_button_bg_color_4',
		'type'			=> 'color',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_4',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> '#A2C605'
	) );
	###################################################
	# SLIDE 5 SECTION
	###################################################
	Kirki::add_section( 'agama_slide_5_section', array(
		'title'			=> __( 'Slide #5', 'agama-pro' ),
		'panel'			=> 'agama_slider_panel',
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Image', 'agama-pro' ),
		'settings'		=> 'agama_slider_image_5',
		'section'		=> 'agama_slide_5_section',
		'type'			=> 'image',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			    => __( 'Title', 'agama-pro' ),
		'tooltip'	        => __( 'Add custom slide title.', 'agama-pro' ),
		'section'		    => 'agama_slide_5_section',
		'settings'		    => 'agama_slider_title_5',
		'type'			    => 'text',
		'default'		    => __( 'Welcome to Agama', 'agama-pro' ),
        'partial_refresh'   => array(
            'agama_slider_title_5' => array(
                'selector'         => '.agama-slider-wrapper .slide-5 h2.slide-title',
                'render_callback'  => array( 'Agama_Partial_Refresh', 'preview_slide_5_title' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Title Styling', 'agama-pro' ),
		'tooltip'	=> __( 'Select title font styling.', 'agama-pro' ),
		'section'		=> 'agama_slide_5_section',
		'settings'		=> 'agama_slider_title_5_typo',
		'type'			=> 'typography',
		'default'		=> array(
			'font-family'	=> 'Crete Round',
			'font-size'		=> '46px',
			'color'			=> '#fff'
		),
		'output'=> array(
			array(
				'element'	=> '#agama_slider .slide-5 h2.slide-title'

			)
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Title Animation', 'agama-pro' ),
		'tooltip'	=> __( 'Select title slide animation.', 'agama-pro' ),
		'section'		=> 'agama_slide_5_section',
		'settings'		=> 'agama_slider_title_animation_5',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'default'		=> 'bounceInLeft'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable Button ?', 'agama-pro' ),
		'tooltip'	=> __( 'Enable slider button.', 'agama-pro' ),
		'section'		=> 'agama_slide_5_section',
		'settings'		=> 'agama_slider_button_5',
		'type'			=> 'switch',
		'default'		=> true
	) );
    Kirki::add_field( 'agama_options', array(
        'label'         => __( 'Button Style', 'agama-pro' ),
        'tooltip'   => __( 'Select button style.', 'agama-pro' ),
        'section'       => 'agama_slide_5_section',
        'settings'      => 'agama_slider_button_style_5',
        'type'          => 'select',
        'choices'       => array(
            'button-3d'       => __( '3D Button', 'agama-pro' ),
            'button-border'   => __( 'Border Button', 'agama-pro' )
        ),
        'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_5',
				'operator'	=> '==',
				'value'		=> true
			)
		),
        'default'       => 'button-border'
    ) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button Title', 'agama-pro' ),
		'tooltip'	=> __( 'Set custom button title.', 'agama-pro' ),
		'section'		=> 'agama_slide_5_section',
		'settings'		=> 'agama_slider_button_title_5',
		'type'			=> 'text',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_5',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		  => __( 'Learn More', 'agama-pro' ),
        'partial_refresh' => array(
            'agama_slider_button_title_5' => array(
                'selector'                => '.agama-slider-wrapper .slide-5 a.button',
                'render_callback'         => array( 'Agama_Partial_Refresh', 'preview_slide_5_button' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button Animation', 'agama-pro' ),
		'tooltip'	=> __( 'Select button slide animation.', 'agama-pro' ),
		'section'		=> 'agama_slide_5_section',
		'settings'		=> 'agama_slider_button_animation_5',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_5',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> 'bounceInRight'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set button url.', 'agama-pro' ),
		'section'		=> 'agama_slide_5_section',
		'settings'		=> 'agama_slider_button_url_5',
		'type'			=> 'text',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_5',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> '#'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button BG Color', 'agama-pro' ),
		'tooltip'	=> __( 'Select button background color.', 'agama-pro' ),
		'section'		=> 'agama_slide_5_section',
		'settings'		=> 'agama_slider_button_bg_color_5',
		'type'			=> 'color',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_5',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> '#A2C605'
	) );
	###################################################
	# SLIDE 6 SECTION
	###################################################
	Kirki::add_section( 'agama_slide_6_section', array(
		'title'			=> __( 'Slide #6', 'agama-pro' ),
		'panel'			=> 'agama_slider_panel',
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Image', 'agama-pro' ),
		'settings'		=> 'agama_slider_image_6',
		'section'		=> 'agama_slide_6_section',
		'type'			=> 'image',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			    => __( 'Title', 'agama-pro' ),
		'tooltip'	        => __( 'Add custom slide title.', 'agama-pro' ),
		'section'		    => 'agama_slide_6_section',
		'settings'		    => 'agama_slider_title_6',
		'type'			    => 'text',
		'default'		    => __( 'Welcome to Agama', 'agama-pro' ),
        'partial_refresh'   => array(
            'agama_slider_title_6' => array(
                'selector'         => '.agama-slider-wrapper .slide-6 h2.slide-title',
                'render_callback'  => array( 'Agama_Partial_Refresh', 'preview_slide_6_title' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Title Styling', 'agama-pro' ),
		'tooltip'	=> __( 'Select title font styling.', 'agama-pro' ),
		'section'		=> 'agama_slide_6_section',
		'settings'		=> 'agama_slider_title_6_typo',
		'type'			=> 'typography',
		'default'		=> array(
			'font-family'	=> 'Crete Round',
			'font-size'		=> '46px',
			'color'			=> '#fff'
		),
		'output'=> array(
			array(
				'element'	=> '#agama_slider .slide-6 h2.slide-title'

			)
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Title Animation', 'agama-pro' ),
		'tooltip'	=> __( 'Select title slide animation.', 'agama-pro' ),
		'section'		=> 'agama_slide_6_section',
		'settings'		=> 'agama_slider_title_animation_6',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'default'		=> 'bounceInLeft'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable Button ?', 'agama-pro' ),
		'tooltip'	=> __( 'Enable slider button.', 'agama-pro' ),
		'section'		=> 'agama_slide_6_section',
		'settings'		=> 'agama_slider_button_6',
		'type'			=> 'switch',
		'default'		=> true
	) );
    Kirki::add_field( 'agama_options', array(
        'label'         => __( 'Button Style', 'agama-pro' ),
        'tooltip'   => __( 'Select button style.', 'agama-pro' ),
        'section'       => 'agama_slide_6_section',
        'settings'      => 'agama_slider_button_style_6',
        'type'          => 'select',
        'choices'       => array(
            'button-3d'       => __( '3D Button', 'agama-pro' ),
            'button-border'   => __( 'Border Button', 'agama-pro' )
        ),
        'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_6',
				'operator'	=> '==',
				'value'		=> true
			)
		),
        'default'       => 'button-border'
    ) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button Title', 'agama-pro' ),
		'tooltip'	    => __( 'Set custom button title.', 'agama-pro' ),
		'section'		=> 'agama_slide_6_section',
		'settings'		=> 'agama_slider_button_title_6',
		'type'			=> 'text',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_6',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		  => __( 'Learn More', 'agama-pro' ),
        'partial_refresh' => array(
            'agama_slider_button_title_6' => array(
                'selector'                => '.agama-slider-wrapper .slide-6 a.button',
                'render_callback'         => array( 'Agama_Partial_Refresh', 'preview_slide_6_button' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button Animation', 'agama-pro' ),
		'tooltip'	=> __( 'Select button slide animation.', 'agama-pro' ),
		'section'		=> 'agama_slide_6_section',
		'settings'		=> 'agama_slider_button_animation_6',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_6',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> 'bounceInRight'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set button url.', 'agama-pro' ),
		'section'		=> 'agama_slide_6_section',
		'settings'		=> 'agama_slider_button_url_6',
		'type'			=> 'text',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_6',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> '#'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button BG Color', 'agama-pro' ),
		'tooltip'	=> __( 'Select button background color.', 'agama-pro' ),
		'section'		=> 'agama_slide_6_section',
		'settings'		=> 'agama_slider_button_bg_color_6',
		'type'			=> 'color',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_6',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> '#A2C605'
	) );
	###################################################
	# SLIDE 7 SECTION
	################################################### 
	Kirki::add_section( 'agama_slide_7_section', array(
		'title'			=> __( 'Slide #7', 'agama-pro' ),
		'panel'			=> 'agama_slider_panel',
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Image', 'agama-pro' ),
		'settings'		=> 'agama_slider_image_7',
		'section'		=> 'agama_slide_7_section',
		'type'			=> 'image',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			    => __( 'Title', 'agama-pro' ),
		'tooltip'	        => __( 'Add custom slide title.', 'agama-pro' ),
		'section'		    => 'agama_slide_7_section',
		'settings'		    => 'agama_slider_title_7',
		'type'			    => 'text',
		'default'		    => __( 'Welcome to Agama', 'agama-pro' ),
        'partial_refresh'   => array(
            'agama_slider_title_7' => array(
                'selector'         => '.agama-slider-wrapper .slide-7 h2.slide-title',
                'render_callback'  => array( 'Agama_Partial_Refresh', 'preview_slide_7_title' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Title Styling', 'agama-pro' ),
		'tooltip'	=> __( 'Select title font styling.', 'agama-pro' ),
		'section'		=> 'agama_slide_7_section',
		'settings'		=> 'agama_slider_title_7_typo',
		'type'			=> 'typography',
		'default'		=> array(
			'font-family'	=> 'Crete Round',
			'font-size'		=> '46px',
			'color'			=> '#fff'
		),
		'output'=> array(
			array(
				'element'	=> '#agama_slider .slide-7 h2.slide-title'

			)
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Title Animation', 'agama-pro' ),
		'tooltip'	=> __( 'Select title slide animation.', 'agama-pro' ),
		'section'		=> 'agama_slide_7_section',
		'settings'		=> 'agama_slider_title_animation_7',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'default'		=> 'bounceInLeft'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable Button ?', 'agama-pro' ),
		'tooltip'	=> __( 'Enable slider button.', 'agama-pro' ),
		'section'		=> 'agama_slide_7_section',
		'settings'		=> 'agama_slider_button_7',
		'type'			=> 'switch',
		'default'		=> true
	) );
    Kirki::add_field( 'agama_options', array(
        'label'         => __( 'Button Style', 'agama-pro' ),
        'tooltip'   => __( 'Select button style.', 'agama-pro' ),
        'section'       => 'agama_slide_7_section',
        'settings'      => 'agama_slider_button_style_7',
        'type'          => 'select',
        'choices'       => array(
            'button-3d'       => __( '3D Button', 'agama-pro' ),
            'button-border'   => __( 'Border Button', 'agama-pro' )
        ),
        'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_7',
				'operator'	=> '==',
				'value'		=> true
			)
		),
        'default'       => 'button-border'
    ) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button Title', 'agama-pro' ),
		'tooltip'	=> __( 'Set custom button title.', 'agama-pro' ),
		'section'		=> 'agama_slide_7_section',
		'settings'		=> 'agama_slider_button_title_7',
		'type'			=> 'text',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_7',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		  => __( 'Learn More', 'agama-pro' ),
        'partial_refresh' => array(
            'agama_slider_button_title_7' => array(
                'selector'                => '.agama-slider-wrapper .slide-7 a.button',
                'render_callback'         => array( 'Agama_Partial_Refresh', 'preview_slide_7_button' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button Animation', 'agama-pro' ),
		'tooltip'	=> __( 'Select button slide animation.', 'agama-pro' ),
		'section'		=> 'agama_slide_7_section',
		'settings'		=> 'agama_slider_button_animation_7',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_7',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> 'bounceInRight'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set button url.', 'agama-pro' ),
		'section'		=> 'agama_slide_7_section',
		'settings'		=> 'agama_slider_button_url_7',
		'type'			=> 'text',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_7',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> '#'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button BG Color', 'agama-pro' ),
		'tooltip'	=> __( 'Select button background color.', 'agama-pro' ),
		'section'		=> 'agama_slide_7_section',
		'settings'		=> 'agama_slider_button_bg_color_7',
		'type'			=> 'color',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_7',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> '#A2C605'
	) );
	###################################################
	# SLIDE 8 SECTION
	###################################################
	Kirki::add_section( 'agama_slide_8_section', array(
		'title'			=> __( 'Slide #8', 'agama-pro' ),
		'panel'			=> 'agama_slider_panel',
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Image', 'agama-pro' ),
		'settings'		=> 'agama_slider_image_8',
		'section'		=> 'agama_slide_8_section',
		'type'			=> 'image',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			    => __( 'Title', 'agama-pro' ),
		'tooltip'	        => __( 'Add custom slide title.', 'agama-pro' ),
		'section'		    => 'agama_slide_8_section',
		'settings'		    => 'agama_slider_title_8',
		'type'	            => 'text',
		'default'		    => __( 'Welcome to Agama', 'agama-pro' ),
        'partial_refresh'   => array(
            'agama_slider_title_8' => array(
                'selector'         => '.agama-slider-wrapper .slide-8 h2.slide-title',
                'render_callback'  => array( 'Agama_Partial_Refresh', 'preview_slide_8_title' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Title Styling', 'agama-pro' ),
		'tooltip'	=> __( 'Select title font styling.', 'agama-pro' ),
		'section'		=> 'agama_slide_8_section',
		'settings'		=> 'agama_slider_title_8_typo',
		'type'			=> 'typography',
		'default'		=> array(
			'font-family'	=> 'Crete Round',
			'font-size'		=> '46px',
			'color'			=> '#fff'
		),
		'output'=> array(
			array(
				'element'	=> '#agama_slider .slide-8 h2.slide-title'

			)
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Title Animation', 'agama-pro' ),
		'tooltip'	=> __( 'Select title slide animation.', 'agama-pro' ),
		'section'		=> 'agama_slide_8_section',
		'settings'		=> 'agama_slider_title_animation_8',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'default'		=> 'bounceInLeft'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable Button ?', 'agama-pro' ),
		'tooltip'	=> __( 'Enable slider button.', 'agama-pro' ),
		'section'		=> 'agama_slide_8_section',
		'settings'		=> 'agama_slider_button_8',
		'type'			=> 'switch',
		'default'		=> true
	) );
    Kirki::add_field( 'agama_options', array(
        'label'         => __( 'Button Style', 'agama-pro' ),
        'tooltip'   => __( 'Select button style.', 'agama-pro' ),
        'section'       => 'agama_slide_8_section',
        'settings'      => 'agama_slider_button_style_8',
        'type'          => 'select',
        'choices'       => array(
            'button-3d'       => __( '3D Button', 'agama-pro' ),
            'button-border'   => __( 'Border Button', 'agama-pro' )
        ),
        'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_8',
				'operator'	=> '==',
				'value'		=> true
			)
		),
        'default'       => 'button-border'
    ) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button Title', 'agama-pro' ),
		'tooltip'	=> __( 'Set custom button title.', 'agama-pro' ),
		'section'		=> 'agama_slide_8_section',
		'settings'		=> 'agama_slider_button_title_8',
		'type'			=> 'text',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_8',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		  => __( 'Learn More', 'agama-pro' ),
        'partial_refresh' => array(
            'agama_slider_button_title_8' => array(
                'selector'                => '.agama-slider-wrapper .slide-8 a.button',
                'render_callback'         => array( 'Agama_Partial_Refresh', 'preview_slide_8_button' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button Animation', 'agama-pro' ),
		'tooltip'	=> __( 'Select button slide animation.', 'agama-pro' ),
		'section'		=> 'agama_slide_8_section',
		'settings'		=> 'agama_slider_button_animation_8',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_8',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> 'bounceInRight'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set button url.', 'agama-pro' ),
		'section'		=> 'agama_slide_8_section',
		'settings'		=> 'agama_slider_button_url_8',
		'type'			=> 'text',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_8',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> '#'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button BG Color', 'agama-pro' ),
		'tooltip'	=> __( 'Select button background color.', 'agama-pro' ),
		'section'		=> 'agama_slide_8_section',
		'settings'		=> 'agama_slider_button_bg_color_8',
		'type'			=> 'color',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_8',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> '#A2C605'
	) );
	###################################################
	# SLIDE 9 SECTION
	###################################################
	Kirki::add_section( 'agama_slide_9_section', array(
		'title'			=> __( 'Slide #9', 'agama-pro' ),
		'panel'			=> 'agama_slider_panel',
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Image', 'agama-pro' ),
		'settings'		=> 'agama_slider_image_9',
		'section'		=> 'agama_slide_9_section',
		'type'			=> 'image',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			    => __( 'Title', 'agama-pro' ),
		'tooltip'	        => __( 'Add custom slide title.', 'agama-pro' ),
		'section'		    => 'agama_slide_9_section',
		'settings'		    => 'agama_slider_title_9',
		'type'			    => 'text',
		'default'		    => __( 'Welcome to Agama', 'agama-pro' ),
        'partial_refresh'   => array(
            'agama_slider_title_9' => array(
                'selector'         => '.agama-slider-wrapper .slide-9 h2.slide-title',
                'render_callback'  => array( 'Agama_Partial_Refresh', 'preview_slide_9_title' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Title Styling', 'agama-pro' ),
		'tooltip'	=> __( 'Select title font styling.', 'agama-pro' ),
		'section'		=> 'agama_slide_9_section',
		'settings'		=> 'agama_slider_title_9_typo',
		'type'			=> 'typography',
		'default'		=> array(
			'font-family'	=> 'Crete Round',
			'font-size'		=> '46px',
			'color'			=> '#fff'
		),
		'output'=> array(
			array(
				'element'	=> '#agama_slider .slide-9 h2.slide-title'

			)
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Title Animation', 'agama-pro' ),
		'tooltip'	=> __( 'Select title slide animation.', 'agama-pro' ),
		'section'		=> 'agama_slide_9_section',
		'settings'		=> 'agama_slider_title_animation_9',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'default'		=> 'bounceInLeft'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable Button ?', 'agama-pro' ),
		'tooltip'	=> __( 'Enable slider button.', 'agama-pro' ),
		'section'		=> 'agama_slide_9_section',
		'settings'		=> 'agama_slider_button_9',
		'type'			=> 'switch',
		'default'		=> true
	) );
    Kirki::add_field( 'agama_options', array(
        'label'         => __( 'Button Style', 'agama-pro' ),
        'tooltip'   => __( 'Select button style.', 'agama-pro' ),
        'section'       => 'agama_slide_9_section',
        'settings'      => 'agama_slider_button_style_9',
        'type'          => 'select',
        'choices'       => array(
            'button-3d'       => __( '3D Button', 'agama-pro' ),
            'button-border'   => __( 'Border Button', 'agama-pro' )
        ),
        'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_9',
				'operator'	=> '==',
				'value'		=> true
			)
		),
        'default'       => 'button-border'
    ) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button Title', 'agama-pro' ),
		'tooltip'	=> __( 'Set custom button title.', 'agama-pro' ),
		'section'		=> 'agama_slide_9_section',
		'settings'		=> 'agama_slider_button_title_9',
		'type'			=> 'text',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_9',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		  => __( 'Learn More', 'agama-pro' ),
        'partial_refresh' => array(
            'agama_slider_button_title_9' => array(
                'selector'                => '.agama-slider-wrapper .slide-9 a.button',
                'render_callback'         => array( 'Agama_Partial_Refresh', 'preview_slide_9_button' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button Animation', 'agama-pro' ),
		'tooltip'	=> __( 'Select button slide animation.', 'agama-pro' ),
		'section'		=> 'agama_slide_9_section',
		'settings'		=> 'agama_slider_button_animation_9',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_9',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> 'bounceInRight'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set button url.', 'agama-pro' ),
		'section'		=> 'agama_slide_9_section',
		'settings'		=> 'agama_slider_button_url_9',
		'type'			=> 'text',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_9',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> '#'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button BG Color', 'agama-pro' ),
		'tooltip'	=> __( 'Select button background color.', 'agama-pro' ),
		'section'		=> 'agama_slide_9_section',
		'settings'		=> 'agama_slider_button_bg_color_9',
		'type'			=> 'color',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_9',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> '#A2C605'
	) );
	####################################################
	# SLIDE 10 SECTION
	####################################################
	Kirki::add_section( 'agama_slide_10_section', array(
		'title'			=> __( 'Slide #10', 'agama-pro' ),
		'panel'			=> 'agama_slider_panel',
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Image', 'agama-pro' ),
		'settings'		=> 'agama_slider_image_10',
		'section'		=> 'agama_slide_10_section',
		'type'			=> 'image',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			    => __( 'Title', 'agama-pro' ),
		'tooltip'	        => __( 'Add custom slide title.', 'agama-pro' ),
		'section'		    => 'agama_slide_10_section',
		'settings'		    => 'agama_slider_title_10',
		'type'			    => 'text',
		'default'		    => __( 'Welcome to Agama', 'agama-pro' ),
        'partial_refresh'   => array(
            'agama_slider_title_10' => array(
                'selector'         => '.agama-slider-wrapper .slide-10 h2.slide-title',
                'render_callback'  => array( 'Agama_Partial_Refresh', 'preview_slide_10_title' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Title Styling', 'agama-pro' ),
		'tooltip'	=> __( 'Select title font styling.', 'agama-pro' ),
		'section'		=> 'agama_slide_10_section',
		'settings'		=> 'agama_slider_title_10_typo',
		'type'			=> 'typography',
		'default'		=> array(
			'font-family'	=> 'Crete Round',
			'font-size'		=> '46px',
			'color'			=> '#fff'
		),
		'output'=> array(
			array(
				'element'	=> '#agama_slider .slide-10 h2.slide-title'

			)
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Title Animation', 'agama-pro' ),
		'tooltip'	=> __( 'Select title slide animation.', 'agama-pro' ),
		'section'		=> 'agama_slide_10_section',
		'settings'		=> 'agama_slider_title_animation_10',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'default'		=> 'bounceInLeft'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable Button ?', 'agama-pro' ),
		'tooltip'	=> __( 'Enable slider button.', 'agama-pro' ),
		'section'		=> 'agama_slide_10_section',
		'settings'		=> 'agama_slider_button_10',
		'type'			=> 'switch',
		'default'		=> true
	) );
    Kirki::add_field( 'agama_options', array(
        'label'         => __( 'Button Style', 'agama-pro' ),
        'tooltip'   => __( 'Select button style.', 'agama-pro' ),
        'section'       => 'agama_slide_10_section',
        'settings'      => 'agama_slider_button_style_10',
        'type'          => 'select',
        'choices'       => array(
            'button-3d'       => __( '3D Button', 'agama-pro' ),
            'button-border'   => __( 'Border Button', 'agama-pro' )
        ),
        'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_10',
				'operator'	=> '==',
				'value'		=> true
			)
		),
        'default'       => 'button-border'
    ) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button Title', 'agama-pro' ),
		'tooltip'	    => __( 'Set custom button title.', 'agama-pro' ),
		'section'		=> 'agama_slide_10_section',
		'settings'		=> 'agama_slider_button_title_10',
		'type'			=> 'text',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_10',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		  => __( 'Learn More', 'agama-pro' ),
        'partial_refresh' => array(
            'agama_slider_button_title_10' => array(
                'selector'                => '.agama-slider-wrapper .slide-10 a.button',
                'render_callback'         => array( 'Agama_Partial_Refresh', 'preview_slide_10_button' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button Animation', 'agama-pro' ),
		'tooltip'	=> __( 'Select button slide animation.', 'agama-pro' ),
		'section'		=> 'agama_slide_10_section',
		'settings'		=> 'agama_slider_button_animation_10',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_10',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> 'bounceInRight'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set button url.', 'agama-pro' ),
		'section'		=> 'agama_slide_10_section',
		'settings'		=> 'agama_slider_button_url_10',
		'type'			=> 'text',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_10',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> '#'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Button BG Color', 'agama-pro' ),
		'tooltip'	=> __( 'Select button background color.', 'agama-pro' ),
		'section'		=> 'agama_slide_10_section',
		'settings'		=> 'agama_slider_button_bg_color_10',
		'type'			=> 'color',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_slider_button_10',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> '#A2C605'
	) );
#########################################
# NAV MENUS - WordPress Default
#########################################
	Kirki::add_panel( 'nav_menus', array(
		'title'			=> __( 'Menus', 'agama-pro' ),
		'priority'		=> 60
	) );
######################################################
# BREADCRUMB
######################################################
	Kirki::add_panel( 'agama_breadcrumb_panel', array(
		'title'			=> __( 'Breadcrumb', 'agama-pro' ),
		'priority'		=> 70
	) );
	##############################################################
	# BREADCRUMB GENERAL SECTION
	##############################################################
	Kirki::add_section( 'agama_breadcrumb_general_section', array(
		'title'			=> __( 'General', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_breadcrumb_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Breadcrumb', 'agama-pro' ),
		'tooltip'	      => __( 'Enable / disable globally breadcrumb ?', 'agama-pro' ),
		'section'		  => 'agama_breadcrumb_general_section',
		'settings'		  => 'agama_breadcrumb',
		'type'			  => 'switch',
		'default'		  => true,
        'partial_refresh' => array(
            'agama_breadcrumb'    => array(
                'selector'        => '.vision-page-title-wrapper',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_breadcrumb' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'On Home', 'agama-pro' ),
		'tooltip'		    => __( 'Enable / disable breadcrumb on non-static home page. This will not disable breadcrumb on static front page, you will need to edit static front page breadcrumb from page edit metabox.', 'agama-pro' ),
		'section'			=> 'agama_breadcrumb_general_section',
		'settings'			=> 'agama_breadcrumb_on_home',
		'type'				=> 'switch',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_breadcrumb',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Breadcrumb Height', 'agama-pro' ),
		'tooltip'		=> __( 'Set custom height for breadcrumb.', 'agama-pro' ),
		'settings'			=> 'agama_breadcrum_height',
		'section'			=> 'agama_breadcrumb_general_section',
		'type'				=> 'slider',
		'choices'			=> array(
			'min'			=> '37',
			'max'			=> '570',
			'step'			=> '1'
		),
		'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> '.vision-page-title-bar',
				'property'	=> 'height',
				'units'		=> 'px'
			)
		),
		'default'			=> '87'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Breadcrumb Prefix', 'agama-pro' ),
		'tooltip'	=> __( 'Controls the text before the breadcrumb menu.', 'agama-pro' ),
		'settings'		=> 'agama_breadcrum_prefix',
		'section'		=> 'agama_breadcrumb_general_section',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Breadcrumb Separator', 'agama-pro' ),
		'tooltip'	=> __( 'Controls the type of separator between each breadcrumb.', 'agama-pro' ),
		'settings'		=> 'agama_breadcrum_separator',
		'section'		=> 'agama_breadcrumb_general_section',
		'type'			=> 'text',
		'default'		=> '/'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Post Categories on Breadcrumbs', 'agama-pro' ),
		'tooltip'	=> __( 'Turn on to display the post categories in the breadcrumbs path.', 'agama-pro' ),
		'settings'		=> 'agama_breadcrumb_show_categories',
		'section'		=> 'agama_breadcrumb_general_section',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Custom Post Type Archives on Breadcrumbs', 'agama-pro' ),
		'tooltip'	=> __( 'Turn on to display custom post type archives in the breadcrumbs path.', 'agama-pro' ),
		'settings'		=> 'agama_breadcrumb_show_post_type_archive',
		'section'		=> 'agama_breadcrumb_general_section',
		'type'			=> 'switch',
		'default'		=> false
	) );
	##############################################################
	# BREADCRUMB STYLING SECTION
	##############################################################
	Kirki::add_section( 'agama_breadcrumb_styling_section', array(
		'title'				=> __( 'Styling', 'agama-pro' ),
		'capability'		=> 'edit_theme_options',
		'panel'				=> 'agama_breadcrumb_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Background Color', 'agama-pro' ),
		'tooltip'		=> __( 'Select breadcrumb background color.', 'agama-pro' ),
		'section'			=> 'agama_breadcrumb_styling_section',
		'settings'			=> 'agama_breadcrumb_bg_color',
		'type'				=> 'color',
        'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> '.vision-page-title-bar',
				'property'	=> 'background-color'
			)
		),
		'default'			=> '#f5f5f5'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Border Color', 'agama-pro' ),
		'tooltip'		    => __( 'Customize breadcrumb top & bottom borders color.', 'agama-pro' ),
		'settings'			=> 'agama_breadcrumb_border_color',
		'section'			=> 'agama_breadcrumb_styling_section',
		'type'				=> 'color',
		'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> '.vision-page-title-bar',
				'property'	=> 'border-color'
			)
		),
		'default'			=> '#EEE'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Background Image', 'agama-pro' ),
		'tooltip'		=> __( 'Upload breadcrumb background image.', 'agama-pro' ),
		'section'			=> 'agama_breadcrumb_styling_section',
		'settings'			=> 'agama_breadcrumb_bg_img',
		'type'				=> 'image',
		'output'			=> array(
			array(
				'element'	=> '.vision-page-title-bar',
				'property'	=> 'background-image'
			)
		),
		'transport'			=> 'auto',
		'default'			=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Background Image Repeat', 'agama-pro' ),
		'tooltip'	=> __( 'Breadcrumb background image repeat.', 'agama-pro' ),
		'section'		=> 'agama_breadcrumb_styling_section',
		'settings'		=> 'agama_breadcrumb_bg_img_repeat',
		'type'			=> 'select',
		'choices'		=> array(
			'no-repeat'	=> __( 'No Repeat', 'agama-pro' ),
			'repeat'	=> __( 'Repeat All', 'agama-pro' ),
			'repeat-x'	=> __( 'Repeat Horizontally', 'agama-pro' ),
			'repeat-y'	=> __( 'Repeat Vertically', 'agama-pro' ),
			'inherit'	=> __( 'Inherit', 'agama-pro' )
		),
        'transport'		=> 'auto',
		'output'		=> array(
			array(
				'element'	=> '.vision-page-title-bar',
				'property'	=> 'background-repeat'
			)
		),
		'default'		=> 'no-repeat'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Background Image Size', 'agama-pro' ),
		'tooltip'	=> __( 'Breadcrumb background image size.', 'agama-pro' ),
		'section'		=> 'agama_breadcrumb_styling_section',
		'settings'		=> 'agama_breadcrumb_bg_img_size',
		'type'			=> 'select',
		'choices'		=> array(
			'inherit'	=> __( 'Inherit', 'agama-pro' ),
			'cover'		=> __( 'Cover', 'agama-pro' ),
			'contain'	=> __( 'Contain', 'agama-pro' ),
		),
        'transport'		=> 'auto',
		'output'		=> array(
			array(
				'element'	=> '.vision-page-title-bar',
				'property'	=> 'background-size'
			)
		),
		'default'		=> 'inherit'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Background Image Attachment', 'agama-pro' ),
		'tooltip'	=> __( 'Breadcrumb background image attachment.', 'agama-pro' ),
		'section'		=> 'agama_breadcrumb_styling_section',
		'settings'		=> 'agama_breadcrumb_bg_img_attachment',
		'type'			=> 'select',
		'choices'		=> array(
			'fixed'		=> __( 'Fixed', 'agama-pro' ),
			'scroll'	=> __( 'Scroll', 'agama-pro' ),
			'inherit'	=> __( 'Inherit', 'agama-pro' ),
		),
        'transport'		=> 'auto',
		'output'		=> array(
			array(
				'element'	=> '.vision-page-title-bar',
				'property'	=> 'background-attachment'
			)
		),
		'default'		=> 'inherit'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Background Image Position', 'agama-pro' ),
		'tooltip'	=> __( 'Breadcrumb background image position.', 'agama-pro' ),
		'section'		=> 'agama_breadcrumb_styling_section',
		'settings'		=> 'agama_breadcrumb_bg_img_position',
		'type'			=> 'select',
		'choices'		=> array(
			'left top'			=> __( 'Left Top', 'agama-pro' ),
			'left center'		=> __( 'Left Center', 'agama-pro' ),
			'left bottom'		=> __( 'Left Bottom', 'agama-pro' ),
			'center top'		=> __( 'Center Top', 'agama-pro' ),
			'center center'		=> __( 'Center Center', 'agama-pro' ),
			'center bottom'		=> __( 'Center Bottom', 'agama-pro' ),
			'right top'			=> __( 'Right Top', 'agama-pro' ),
			'right center'		=> __( 'Right Center', 'agama-pro' ),
			'right bottom'		=> __( 'Right Bottom', 'agama-pro' ),
		),
        'transport'		=> 'auto',
		'output'		=> array(
			array(
				'element'	=> '.vision-page-title-bar',
				'property'	=> 'background-position'
			)
		),
		'default'		=> 'inherit'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Text Color', 'agama-pro' ),
		'tooltip'	=> __( 'Select breadcrumb text color.', 'agama-pro' ),
		'section'		=> 'agama_breadcrumb_styling_section',
		'settings'		=> 'agama_breadcrumb_text_color',
		'type'			=> 'color',
        'transport'		=> 'auto',
		'output'		=> array(
			array(
				'element'	=> '.vision-page-title-bar, .vision-page-title-bar h1, .vision-page-title-bar span',
				'property'	=> 'color'
			)
		),
		'default'		=> '#444'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Links Color', 'agama-pro' ),
		'tooltip'	=> __( 'Select breadcrumb links color.', 'agama-pro' ),
		'section'		=> 'agama_breadcrumb_styling_section',
		'settings'		=> 'agama_breadcrumb_links_color',
		'type'			=> 'color',
        'transport'		=> 'auto',
		'output'		=> array(
			array(
				'element'	=> '.vision-page-title-bar a span',
				'property'	=> 'color'
			)
		),
		'default'		=> '#444'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Links Hover Color', 'agama-pro' ),
		'tooltip'	=> __( 'Select breadcrumb links hover color.', 'agama-pro' ),
		'section'		=> 'agama_breadcrumb_styling_section',
		'settings'		=> 'agama_breadcrumb_links_hover_color',
		'type'			=> 'color',
        'transport'		=> 'auto',
		'output'		=> array(
			array(
				'element'	=> '.vision-page-title-bar a:hover span',
				'property'	=> 'color'
			)
		),
		'default'		=> '#A2C605'
	) );
	Kirki::add_field( 'aagama_options', array(
		'label'				=> __( 'Separator Color', 'agama-pro' ),
		'tooltip'		=> __( 'Select breadcrumb separator color.', 'agama-pro' ),
		'settings'			=> 'agama_breadcrumb_sep_color',
		'section'			=> 'agama_breadcrumb_styling_section',
		'type'				=> 'color',
		'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> '.vision-page-title-bar .vision-breadcrumb-sep',
				'property'	=> 'color'
			)
		),
		'default'		=> '#444'
	) );
	#################################################################
	# BREADCRUMB TYPOGRAPHY SECTION
	#################################################################
	Kirki::add_section( 'agama_breadcrumb_typography_section', array(
		'title'				=> __( 'Typography', 'agama-pro' ),
		'capability'		=> 'edit_theme_options',
		'panel'				=> 'agama_breadcrumb_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Breadcrumb Font', 'agama-pro' ),
		'tooltip' 		=> __( 'Customize breadcrumb font.', 'agama-pro' ),
		'section'			=> 'agama_breadcrumb_typography_section',
		'settings'			=> 'agama_breadcrumb_font',
		'type'				=> 'typography',
        'transport'         => 'auto',
		'default'			=> array(
			'font-family' 	=> 'Raleway'
		),
        'output'			=> array(
			array(
				'element' 	=> '.vision-page-title-bar, .vision-page-title-bar h1'
			)
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Breadcrumb Heading Font Size', 'agama-pro' ),
		'tooltip'		=> __( 'Customize breadcrumb heading font size.', 'agama-pro' ),
		'section'			=> 'agama_breadcrumb_typography_section',
		'settings'			=> 'agama_breadcrumb_font_h1',
		'type'				=> 'typography',
		'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element' 	=> '.vision-page-title-bar h1'
			)
		),
		'default'			=> array(
			'font-size'		=> '18px'
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Breadcrumb Text / Links Size', 'agama-pro' ),
		'tooltip'		=> __( 'Customize breadcrumb text and links font size.', 'agama-pro' ),
		'section'			=> 'agama_breadcrumb_typography_section',
		'settings'			=> 'agama_breadcrumb_font_links',
		'type'				=> 'typography',
		'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element' 	=> '.vision-page-title-bar span, .vision-page-title-bar span a'
			)
		),
		'default'			=> array(
			'font-size'		=> '12px'
		)
	) );
###########################################################
# FRONTPAGE BOXES
###########################################################
	Kirki::add_panel( 'agama_frontpage_boxes_panel', array(
		'title'			=> __( 'Front Page Boxes', 'agama-pro' ),
		'priority'		=> 80
	) );
	###################################################################
	# FRONTPAGE BOXES GENERAL SECTION
	###################################################################
	Kirki::add_section( 'agama_frontpage_boxes_general_section', array(
		'title'			=> __( 'General', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_frontpage_boxes_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable', 'agama-pro' ),
		'tooltip'	=> __( 'Enable front page boxes ?', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_general_section',
		'settings'		=> 'agama_frontpage_boxes',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Visibility', 'agama-pro' ),
		'tooltip'	=> __( 'Select where you want show front page boxes.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_general_section',
		'settings'		=> 'agama_frontpage_boxes_visibility',
		'type'			=> 'select',
		'choices'		=> array(
			'homepage'	=> __( 'Homepage', 'agama-pro' ),
			'frontpage'	=> __( 'Front Page', 'agama-pro' ),
			'allpages'	=> __( 'All Pages', 'agama-pro' )
		),
		'default'		=> 'homepage'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Position', 'agama-pro' ),
		'tooltip'	=> __( 'Select front page boxes position.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_general_section',
		'settings'		=> 'agama_frontpage_boxes_position',
		'type'			=> 'select',
		'choices'		=> array(
			'top'		=> __( 'Above Page Content', 'agama-pro' ),
			'bottom'	=> __( 'Below Page Content', 'agama-pro' )
		),
		'default'		=> 'top'
	) );
	#############################################################
	# FRONTPAGE BOXES SECTION 1
	#############################################################
	Kirki::add_section( 'agama_frontpage_boxes_section_1', array(
		'title'			=> __( 'Front Page Box #1', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_frontpage_boxes_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable', 'agama-pro' ),
		'tooltip'	=> __( 'Enable box 1.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_1',
		'settings'		=> 'agama_frontpage_box_1_enable',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Title', 'agama-pro' ),
		'tooltip'	      => __( 'Set box title.', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_1',
		'settings'		  => 'agama_frontpage_box_1_title',
		'type'			  => 'text',
		'default'		  => 'Responsive Layout',
        'partial_refresh' => array(
            'agama_frontpage_box_1_title' => array(
                'selector'                => '.fbox-1 h2',
                'render_callback'         => array( 'Agama_Partial_Refresh', 'preview_fbox_1_title' )
            )
        )
	) );
    Kirki::add_field( 'agama_options', array(
        'label'           => __( 'Icon or Image', 'agama-pro' ),
        'tooltip'         => __( 'Select what do you want use for front page box.', 'agama-pro' ),
        'section'         => 'agama_frontpage_boxes_section_1',
        'settings'        => 'agama_frontpage_box_1_ico_or_img',
        'type'            => 'radio-buttonset',
        'choices'         => array(
            'icon'        => __( 'Icon', 'agama-pro' ),
            'image'       => __( 'Image', 'agama-pro' )
        ),
        'default'         => 'icon',
        'partial_refresh' => array(
            'agama_frontpage_box_1_ico_or_img' => array(
                'selector'        => '.fbox-1 .vision-fa.vision-preview',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_1_ico_or_img' )
            )
        )
    ) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Select Icon', 'agama-pro' ),
        'tooltip'         => __( 'Select box icon.', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_1',
		'settings'		  => 'agama_frontpage_box_1_icon',
		'type'			  => 'agip',
		'default'		  => 'fa-tablet',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_1_ico_or_img',
                'operator' => '==',
                'value'    => 'icon'
            )
        ),
        'partial_refresh' => array(
            'agama_frontpage_box_1_icon' => array(
                'selector'               => '.fbox-1 .vision-fa.vision-preview',
                'render_callback'        => array( 'Agama_Partial_Refresh', 'preview_fbox_1_icon' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Icon Color', 'agama-pro' ),
		'tooltip'	    => __( 'Set icon color.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_1',
		'settings'		=> 'agama_frontpage_box_1_icon_color',
		'type'			=> 'color',
        'transport'     => 'auto',
		'output'		=> array(
			array(
				'element'  => '.fbox-1 i.fa:not(.fa-link)',
				'property' => 'color'
			)
		),
		'default'		   => '#A2C605',
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_1_ico_or_img',
                'operator' => '==',
                'value'    => 'icon'
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Image', 'agama-pro' ),
		'tooltip'	    => __('You can use image instead of FontAwesome icon, just upload it here.', 'agama-pro'),
		'section'		=> 'agama_frontpage_boxes_section_1',
		'settings'		=> 'agama_frontpage_1_img',
		'type'			=> 'image',
		'default'		=> '',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_1_ico_or_img',
                'operator' => '==',
                'value'    => 'image'
            )
        ),
        'partial_refresh' => array(
            'agama_frontpage_1_img' => array(
                'selector'          => '.fbox-1 .vision-fa.vision-preview',
                'render_callback'   => array( 'Agama_Partial_Refresh', 'preview_fbox_1_image' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Image Width', 'agama-pro' ),
		'tooltip'	=> __( 'Set box image width.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_1',
		'settings'		=> 'agama_frontpage_1_img_width',
		'type'			=> 'slider',
        'choices'       => array(
            'min'       => '0',
            'max'       => '1000',
            'step'      => '1'
        ),
        'transport'		=> 'auto',
		'output'		=> array(
			array(
				'element'	=> '.fbox-1 img',
				'property'	=> 'max-width',
				'units'		=> 'px',
				'suffix'	=> '!important'
			)
		),
		'default'		   => '100',
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_1_ico_or_img',
                'operator' => '==',
                'value'    => 'image'
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Box Icon / Image URL', 'agama-pro' ),
		'tooltip'	=> __( 'Starting with: http://', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_1',
		'settings'		=> 'agama_frontpage_box_1_icon_url',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Box Text', 'agama-pro' ),
		'tooltip'	      => __( 'Add custom text.', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_1',
		'settings'		  => 'agama_frontpage_box_1_text',
		'type'			  => 'textarea',
		'default'		  => 'Powerful Layout with Responsive functionality that can be adapted to any screen size.',
        'partial_refresh' => array(
            'agama_frontpage_box_1_text' => array(
                'selector'               => '.fbox-1 p',
                'render_callback'        => array( 'Agama_Partial_Refresh', 'preview_fbox_1_desc' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Read More', 'agama-pro' ),
		'tooltip'	      => __( 'Enable read more button ?', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_1',
		'settings'		  => 'agama_frontpage_box_1_readmore',
		'type'			  => 'switch',
		'default'		  => true,
        'partial_refresh' => array(
            'agama_frontpage_box_1_readmore' => array(
                'selector'        => '.fbox-1 .vision-fbox-button.vision-preview',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_1_read_more' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			   => __( 'Button Title', 'agama-pro' ),
		'tooltip'	       => __( 'Set button custom title.', 'agama-pro' ),
		'section'		   => 'agama_frontpage_boxes_section_1',
		'settings'		   => 'agama_frontpage_box_1_readmore_txt',
		'type'			   => 'text',
		'default'		   => __( 'Read More', 'agama-pro' ),
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_1_readmore',
                'operator' => '==',
                'value'    => true
            )
        ),
        'partial_refresh'  => array(
            'agama_frontpage_box_1_readmore_txt' => array(
                'selector'        => '.fbox-1 .vision-fbox-button.vision-preview a.button span',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_1_read_more_txt' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			   => __( 'Button URL', 'agama-pro' ),
		'tooltip'	       => __( 'Set button url.', 'agama-pro' ),
		'section'		   => 'agama_frontpage_boxes_section_1',
		'settings'		   => 'agama_frontpage_box_1_readmore_url',
		'type'			   => 'text',
		'default'		   => '#',
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_1_readmore',
                'operator' => '==',
                'value'    => true
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Box Animated', 'agama-pro' ),
		'tooltip'	=> __( 'Enable box loading animation ?', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_1',
		'settings'		=> 'agama_frontpage_box_1_animated',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Box Animation', 'agama-pro' ),
		'tooltip'		=> __( 'Select box loading animation.', 'agama-pro' ),
		'section'			=> 'agama_frontpage_boxes_section_1',
		'settings'			=> 'agama_frontpage_box_1_animation',
		'type'				=> 'select',
		'choices'			=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_frontpage_box_1_animated',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> 'bounceIn'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Animation Delay', 'agama-pro' ),
		'tooltip'		    => __( 'Set box animation delay. 1000ms = 1sec', 'agama-pro' ),
		'settings'			=> 'agama_frontpage_box_1_animation_delay',
		'section'			=> 'agama_frontpage_boxes_section_1',
		'type'				=> 'slider',
		'choices'			=> array(
			'min'			=> 0,
			'max'			=> 10000,
			'step'			=> 1
		),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_frontpage_box_1_animated',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> '200'
	) );
	#############################################################
	# FRONTPAGE BOXES SECTION 2
	#############################################################
	Kirki::add_section( 'agama_frontpage_boxes_section_2', array(
		'title'			=> __( 'Front Page Box #2', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_frontpage_boxes_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable', 'agama-pro' ),
		'tooltip'	=> __( 'Enable box 2.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_2',
		'settings'		=> 'agama_frontpage_box_2_enable',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Title', 'agama-pro' ),
		'tooltip'	      => __( 'Set box title.', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_2',
		'settings'		  => 'agama_frontpage_box_2_title',
		'type'			  => 'text',
		'default'		  => 'Endless Possibilities',
        'partial_refresh' => array(
            'agama_frontpage_box_2_title' => array(
                'selector'                => '.fbox-2 h2',
                'render_callback'         => array( 'Agama_Partial_Refresh', 'preview_fbox_2_title' )
            )
        )
	) );
    Kirki::add_field( 'agama_options', array(
        'label'           => __( 'Icon or Image', 'agama-pro' ),
        'tooltip'         => __( 'Select what do you want use for front page box.', 'agama-pro' ),
        'section'         => 'agama_frontpage_boxes_section_2',
        'settings'        => 'agama_frontpage_box_2_ico_or_img',
        'type'            => 'radio-buttonset',
        'choices'         => array(
            'icon'        => __( 'Icon', 'agama-pro' ),
            'image'       => __( 'Image', 'agama-pro' )
        ),
        'default'         => 'icon',
        'partial_refresh' => array(
            'agama_frontpage_box_2_ico_or_img' => array(
                'selector'        => '.fbox-2 .vision-fa.vision-preview',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_2_ico_or_img' )
            )
        )
    ) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Select Icon', 'agama-pro' ),
		'tooltip'	      => __( 'Select box icon.', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_2',
		'settings'		  => 'agama_frontpage_box_2_icon',
		'type'			  => 'agip',
		'default'		  => 'fa-cogs',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_2_ico_or_img',
                'operator' => '==',
                'value'    => 'icon'
            )
        ),
        'partial_refresh' => array(
            'agama_frontpage_box_2_icon' => array(
                'selector'               => '.fbox-2 .vision-fa.vision-preview',
                'render_callback'        => array( 'Agama_Partial_Refresh', 'preview_fbox_2_icon' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Icon Color', 'agama-pro' ),
		'tooltip'	=> __( 'Set icon color.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_2',
		'settings'		=> 'agama_frontpage_box_2_icon_color',
		'type'			=> 'color',
        'transport'     => 'auto',
		'output'		=> array(
			array(
				'element'	=> '.fbox-2 i.fa:not(.fa-link)',
				'property'	=> 'color'
			)
		),
		'default'		=> '#A2C605',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_2_ico_or_img',
                'operator' => '==',
                'value'    => 'icon'
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Image', 'agama-pro' ),
		'tooltip'	      => __( 'You can use image instead of FontAwesome icon, just upload it here.', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_2',
		'settings'		  => 'agama_frontpage_2_img',
		'type'			  => 'image',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_2_ico_or_img',
                'operator' => '==',
                'value'    => 'image'
            )
        ),
        'partial_refresh' => array(
            'agama_frontpage_2_img' => array(
                'selector'          => '.fbox-2 .vision-fa.vision-preview',
                'render_callback'   => array( 'Agama_Partial_Refresh', 'preview_fbox_2_image' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Image Width', 'agama-pro' ),
		'tooltip'	    => __( 'Set box image width.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_2',
		'settings'		=> 'agama_frontpage_2_img_width',
		'type'			=> 'slider',
        'choices'       => array(
            'min'       => '0',
            'max'       => '1000',
            'step'      => '1'
        ),
        'transport'		=> 'auto',
		'output'		=> array(
			array(
				'element'	=> '.fbox-2 img',
				'property'	=> 'max-width',
				'units'		=> 'px',
				'suffix'	=> '!important'
			)
		),
		'default'		  => '100',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_2_ico_or_img',
                'operator' => '==',
                'value'    => 'image'
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Box Icon / Image URL', 'agama-pro' ),
		'tooltip'	=> __( 'Starting with: http://', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_2',
		'settings'		=> 'agama_frontpage_box_2_icon_url',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Box Text', 'agama-pro' ),
		'tooltip'	      => __( 'Add custom text.', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_2',
		'settings'		  => 'agama_frontpage_box_2_text',
		'type'			  => 'textarea',
		'default'		  => 'Complete control on each & every element that provides endless customization possibilities.',
        'partial_refresh' => array(
            'agama_frontpage_box_2_text' => array(
                'selector'               => '.fbox-2 p',
                'render_callback'        => array( 'Agama_Partial_Refresh', 'preview_fbox_2_desc' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Read More', 'agama-pro' ),
		'tooltip'	      => __( 'Enable read more button ?', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_2',
		'settings'		  => 'agama_frontpage_box_2_readmore',
		'type'			  => 'switch',
		'default'		  => true,
        'partial_refresh' => array(
            'agama_frontpage_box_2_readmore' => array(
                'selector'        => '.fbox-2 .vision-fbox-button.vision-preview',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_2_read_more' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			   => __( 'Button Title', 'agama-pro' ),
		'tooltip'	       => __( 'Set button custom title.', 'agama-pro' ),
		'section'		   => 'agama_frontpage_boxes_section_2',
		'settings'		   => 'agama_frontpage_box_2_readmore_txt',
		'type'			   => 'text',
		'default'		   => __( 'Read More', 'agama-pro' ),
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_2_readmore',
                'operator' => '==',
                'value'    => true
            )
        ),
        'partial_refresh'  => array(
            'agama_frontpage_box_2_readmore_txt' => array(
                'selector'        => '.fbox-2 .vision-fbox-button.vision-preview a.button span',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_2_read_more_txt' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			   => __( 'Button URL', 'agama-pro' ),
		'tooltip'	       => __( 'Set button url.', 'agama-pro' ),
		'section'		   => 'agama_frontpage_boxes_section_2',
		'settings'		   => 'agama_frontpage_box_2_readmore_url',
		'type'			   => 'text',
		'default'		   => '#',
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_2_readmore',
                'operator' => '==',
                'value'    => true
            )
        ),
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Box Animated', 'agama-pro' ),
		'tooltip'	=> __( 'Enable box loading animation ?', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_2',
		'settings'		=> 'agama_frontpage_box_2_animated',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Box Animation', 'agama-pro' ),
		'tooltip'		=> __( 'Select box loading animation.', 'agama-pro' ),
		'section'			=> 'agama_frontpage_boxes_section_2',
		'settings'			=> 'agama_frontpage_box_2_animation',
		'type'				=> 'select',
		'choices'			=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_frontpage_box_2_animated',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> 'bounceIn'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Animation Delay', 'agama-pro' ),
		'tooltip'		=> __( 'Set box animation delay. 1000ms = 1sec', 'agama-pro' ),
		'settings'			=> 'agama_frontpage_box_2_animation_delay',
		'section'			=> 'agama_frontpage_boxes_section_2',
		'type'				=> 'slider',
		'choices'			=> array(
			'min'			=> 0,
			'max'			=> 10000,
			'step'			=> 1
		),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_frontpage_box_2_animated',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> '400'
	) );
	#############################################################
	# FRONTPAGE BOXES SECTION 3
	#############################################################
	Kirki::add_section( 'agama_frontpage_boxes_section_3', array(
		'title'			=> __( 'Front Page Box #3', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_frontpage_boxes_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable', 'agama-pro' ),
		'tooltip'	=> __( 'Enable box 3.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_3',
		'settings'		=> 'agama_frontpage_box_3_enable',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Title', 'agama-pro' ),
		'tooltip'	      => __( 'Set box title.', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_3',
		'settings'		  => 'agama_frontpage_box_3_title',
		'type'			  => 'text',
		'default'		  => 'Boxed & Wide Layouts',
        'partial_refresh' => array(
            'agama_frontpage_box_3_title' => array(
                'selector'                => '.fbox-3 h2',
                'render_callback'         => array( 'Agama_Partial_Refresh', 'preview_fbox_3_title' )
            )
        )
	) );
    Kirki::add_field( 'agama_options', array(
        'label'           => __( 'Icon or Image', 'agama-pro' ),
        'tooltip'         => __( 'Select what do you want use for front page box.', 'agama-pro' ),
        'section'         => 'agama_frontpage_boxes_section_3',
        'settings'        => 'agama_frontpage_box_3_ico_or_img',
        'type'            => 'radio-buttonset',
        'choices'         => array(
            'icon'        => __( 'Icon', 'agama-pro' ),
            'image'       => __( 'Image', 'agama-pro' )
        ),
        'default'         => 'icon',
        'partial_refresh' => array(
            'agama_frontpage_box_3_ico_or_img' => array(
                'selector'        => '.fbox-3 .vision-fa.vision-preview',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_3_ico_or_img' )
            )
        )
    ) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Select Icon', 'agama-pro' ),
		'tooltip'	    => __( 'Select box icon.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_3',
		'settings'		=> 'agama_frontpage_box_3_icon',
		'type'			=> 'agip',
		'default'		=> 'fa-laptop',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_3_ico_or_img',
                'operator' => '==',
                'value'    => 'icon'
            )
        ),
        'partial_refresh' => array(
            'agama_frontpage_box_3_icon' => array(
                'selector'               => '.fbox-3 .vision-fa.vision-preview',
                'render_callback'        => array( 'Agama_Partial_Refresh', 'preview_fbox_3_icon' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Icon Color', 'agama-pro' ),
		'tooltip'	=> __( 'Set icon color.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_3',
		'settings'		=> 'agama_frontpage_box_3_icon_color',
		'type'			=> 'color',
        'transport'     => 'auto',
		'output'		=> array(
			array(
				'element'	=> '.fbox-3 i.fa:not(.fa-link)',
				'property'	=> 'color'
			)
		),
		'default'		=> '#A2C605',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_3_ico_or_img',
                'operator' => '==',
                'value'    => 'icon'
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Image', 'agama-pro' ),
		'tooltip'	=> __('You can use image instead of FontAwesome icon, just upload it here.', 'agama-pro'),
		'section'		=> 'agama_frontpage_boxes_section_3',
		'settings'		=> 'agama_frontpage_3_img',
		'type'			=> 'image',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_3_ico_or_img',
                'operator' => '==',
                'value'    => 'image'
            )
        ),
        'partial_refresh' => array(
            'agama_frontpage_3_img' => array(
                'selector'          => '.fbox-3 .vision-fa.vision-preview',
                'render_callback'   => array( 'Agama_Partial_Refresh', 'preview_fbox_3_image' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Image Width', 'agama-pro' ),
		'tooltip'		    => __( 'Set box image width.', 'agama-pro' ),
		'section'			=> 'agama_frontpage_boxes_section_3',
		'settings'			=> 'agama_frontpage_3_img_width',
		'type'				=> 'slider',
        'choices'           => array(
            'min'           => '0',
            'max'           => '1000',
            'step'          => '1'
        ),
        'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> '.fbox-3 img',
				'property'	=> 'max-width',
				'units'		=> 'px',
				'suffix'	=> '!important'
			)
		),
		'default'		  => '100',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_3_ico_or_img',
                'operator' => '==',
                'value'    => 'image'
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Box Icon / Image URL', 'agama-pro' ),
		'tooltip'	=> __( 'Starting with: http://', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_3',
		'settings'		=> 'agama_frontpage_box_3_icon_url',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Box Text', 'agama-pro' ),
		'tooltip'	      => __( 'Add custom text.', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_3',
		'settings'		  => 'agama_frontpage_box_3_text',
		'type'			  => 'textarea',
		'default'		  => 'Stretch your Website to the Full Width or make it boxed to surprise your visitors.',
        'partial_refresh' => array(
            'agama_frontpage_box_3_text' => array(
                'selector'               => '.fbox-3 p',
                'render_callback'        => array( 'Agama_Partial_Refresh', 'preview_fbox_3_desc' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Read More', 'agama-pro' ),
		'tooltip'	      => __( 'Enable read more button ?', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_3',
		'settings'		  => 'agama_frontpage_box_3_readmore',
		'type'			  => 'switch',
		'default'		  => true,
        'partial_refresh' => array(
            'agama_frontpage_box_3_readmore' => array(
                'selector'        => '.fbox-3 .vision-fbox-button.vision-preview',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_3_read_more' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			   => __( 'Button Title', 'agama-pro' ),
		'tooltip'	       => __( 'Set button custom title.', 'agama-pro' ),
		'section'		   => 'agama_frontpage_boxes_section_3',
		'settings'		   => 'agama_frontpage_box_3_readmore_txt',
		'type'			   => 'text',
		'default'		   => __( 'Read More', 'agama-pro' ),
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_3_readmore',
                'operator' => '==',
                'value'    => true
            )
        ),
        'partial_refresh'  => array(
            'agama_frontpage_box_3_readmore_txt' => array(
                'selector'        => '.fbox-3 .vision-fbox-button.vision-preview a.button span',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_3_read_more_txt' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			   => __( 'Button URL', 'agama-pro' ),
		'tooltip'	       => __( 'Set button url.', 'agama-pro' ),
		'section'		   => 'agama_frontpage_boxes_section_3',
		'settings'		   => 'agama_frontpage_box_3_readmore_url',
		'type'			   => 'text',
		'default'		   => '#',
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_3_readmore',
                'operator' => '==',
                'value'    => true
            )
        ),
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Box Animated', 'agama-pro' ),
		'tooltip'	=> __( 'Enable box loading animation ?', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_3',
		'settings'		=> 'agama_frontpage_box_3_animated',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Box Animation', 'agama-pro' ),
		'tooltip'		=> __( 'Select box loading animation.', 'agama-pro' ),
		'section'			=> 'agama_frontpage_boxes_section_3',
		'settings'			=> 'agama_frontpage_box_3_animation',
		'type'				=> 'select',
		'choices'			=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_frontpage_box_3_animated',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> 'bounceIn'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Animation Delay', 'agama-pro' ),
		'tooltip'		=> __( 'Set box animation delay. 1000ms = 1sec', 'agama-pro' ),
		'settings'			=> 'agama_frontpage_box_3_animation_delay',
		'section'			=> 'agama_frontpage_boxes_section_3',
		'type'				=> 'slider',
		'choices'			=> array(
			'min'			=> 0,
			'max'			=> 10000,
			'step'			=> 1
		),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_frontpage_box_3_animated',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> '600'
	) );
	#############################################################
	# FRONTPAGE BOXES SECTION 4
	#############################################################
	Kirki::add_section( 'agama_frontpage_boxes_section_4', array(
		'title'			=> __( 'Front Page Box #4', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_frontpage_boxes_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable', 'agama-pro' ),
		'tooltip'	=> __( 'Enable box 4.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_4',
		'settings'		=> 'agama_frontpage_box_4_enable',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Title', 'agama-pro' ),
		'tooltip'	      => __( 'Set box title.', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_4',
		'settings'		  => 'agama_frontpage_box_4_title',
		'type'			  => 'text',
		'default'		  => 'Powerful Performance',
        'partial_refresh' => array(
            'agama_frontpage_box_4_title' => array(
                'selector'                => '.fbox-4 h2',
                'render_callback'         => array( 'Agama_Partial_Refresh', 'preview_fbox_4_title' )
            )
        )
	) );
    Kirki::add_field( 'agama_options', array(
        'label'           => __( 'Icon or Image', 'agama-pro' ),
        'tooltip'         => __( 'Select what do you want use for front page box.', 'agama-pro' ),
        'section'         => 'agama_frontpage_boxes_section_4',
        'settings'        => 'agama_frontpage_box_4_ico_or_img',
        'type'            => 'radio-buttonset',
        'choices'         => array(
            'icon'        => __( 'Icon', 'agama-pro' ),
            'image'       => __( 'Image', 'agama-pro' )
        ),
        'default'         => 'icon',
        'partial_refresh' => array(
            'agama_frontpage_box_4_ico_or_img' => array(
                'selector'        => '.fbox-4 .vision-fa.vision-preview',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_4_ico_or_img' )
            )
        )
    ) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Select Icon', 'agama-pro' ),
		'tooltip'	    => __( 'Select box icon.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_4',
		'settings'		=> 'agama_frontpage_box_4_icon',
		'type'			=> 'agip',
		'default'		=> 'fa-magic',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_4_ico_or_img',
                'operator' => '==',
                'value'    => 'icon'
            )
        ),
        'partial_refresh' => array(
            'agama_frontpage_box_4_icon' => array(
                'selector'               => '.fbox-4 .vision-fa.vision-preview',
                'render_callback'        => array( 'Agama_Partial_Refresh', 'preview_fbox_4_icon' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Icon Color', 'agama-pro' ),
		'tooltip'	    => __( 'Set icon color.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_4',
		'settings'		=> 'agama_frontpage_box_4_icon_color',
		'type'			=> 'color',
        'transport'     => 'auto',
		'output'		=> array(
			array(
				'element'  => '.fbox-4 i.fa:not(.fa-link)',
				'property' => 'color'
			)
		),
		'default'		   => '#A2C605',
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_4_ico_or_img',
                'operator' => '==',
                'value'    => 'icon'
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Image', 'agama-pro' ),
		'tooltip'	=> __('You can use image instead of FontAwesome icon, just upload it here.', 'agama-pro'),
		'section'		=> 'agama_frontpage_boxes_section_4',
		'settings'		=> 'agama_frontpage_4_img',
		'type'			=> 'image',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_4_ico_or_img',
                'operator' => '==',
                'value'    => 'image'
            )
        ),
        'partial_refresh' => array(
            'agama_frontpage_4_img' => array(
                'selector'          => '.fbox-4 .vision-fa.vision-preview',
                'render_callback'   => array( 'Agama_Partial_Refresh', 'preview_fbox_4_image' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Image Width', 'agama-pro' ),
		'tooltip'		    => __( 'Set box image width.', 'agama-pro' ),
		'section'			=> 'agama_frontpage_boxes_section_4',
		'settings'			=> 'agama_frontpage_4_img_width',
		'type'				=> 'slider',
        'choices'           => array(
            'min'           => '0',
            'max'           => '1000',
            'step'          => '1'
        ),
        'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> '.fbox-4 img',
				'property'	=> 'max-width',
				'units'		=> 'px',
				'suffix'	=> '!important'
			)
		),
		'default'		  => '100',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_4_ico_or_img',
                'operator' => '==',
                'value'    => 'image'
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Box Icon / Image URL', 'agama-pro' ),
		'tooltip'	=> __( 'Starting with: http://', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_4',
		'settings'		=> 'agama_frontpage_box_4_icon_url',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Box Text', 'agama-pro' ),
		'tooltip'	      => __( 'Add custom text.', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_4',
		'settings'		  => 'agama_frontpage_box_4_text',
		'type'			  => 'textarea',
		'default'		  => 'Optimized code that are completely customizable and deliver unmatched fast performance.',
        'partial_refresh' => array(
            'agama_frontpage_box_4_text' => array(
                'selector'               => '.fbox-4 p',
                'render_callback'        => array( 'Agama_Partial_Refresh', 'preview_fbox_4_desc' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Read More', 'agama-pro' ),
		'tooltip'	      => __( 'Enable read more button ?', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_4',
		'settings'		  => 'agama_frontpage_box_4_readmore',
		'type'			  => 'switch',
		'default'		  => true,
        'partial_refresh' => array(
            'agama_frontpage_box_4_readmore' => array(
                'selector'        => '.fbox-4 .vision-fbox-button.vision-preview',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_4_read_more' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			   => __( 'Button Title', 'agama-pro' ),
		'tooltip'	       => __( 'Set button custom title.', 'agama-pro' ),
		'section'		   => 'agama_frontpage_boxes_section_4',
		'settings'		   => 'agama_frontpage_box_4_readmore_txt',
		'type'			   => 'text',
		'default'		   => __( 'Read More', 'agama-pro' ),
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_4_readmore',
                'operator' => '==',
                'value'    => true
            )
        ),
        'partial_refresh'  => array(
            'agama_frontpage_box_4_readmore_txt' => array(
                'selector'        => '.fbox-4 .vision-fbox-button.vision-preview a.button span',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_4_read_more_txt' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			   => __( 'Button URL', 'agama-pro' ),
		'tooltip'	       => __( 'Set button url.', 'agama-pro' ),
		'section'		   => 'agama_frontpage_boxes_section_4',
		'settings'		   => 'agama_frontpage_box_4_readmore_url',
		'type'			   => 'text',
		'default'		   => '#',
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_4_readmore',
                'operator' => '==',
                'value'    => true
            )
        ),
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Box Animated', 'agama-pro' ),
		'tooltip'	=> __( 'Enable box loading animation ?', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_4',
		'settings'		=> 'agama_frontpage_box_4_animated',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Box Animation', 'agama-pro' ),
		'tooltip'		=> __( 'Select box loading animation.', 'agama-pro' ),
		'section'			=> 'agama_frontpage_boxes_section_4',
		'settings'			=> 'agama_frontpage_box_4_animation',
		'type'				=> 'select',
		'choices'			=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_frontpage_box_4_animated',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> 'bounceIn'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Animation Delay', 'agama-pro' ),
		'tooltip'		=> __( 'Set box animation delay. 1000ms = 1sec', 'agama-pro' ),
		'settings'			=> 'agama_frontpage_box_4_animation_delay',
		'section'			=> 'agama_frontpage_boxes_section_4',
		'type'				=> 'slider',
		'choices'			=> array(
			'min'			=> 0,
			'max'			=> 10000,
			'step'			=> 1
		),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_frontpage_box_4_animated',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> '800'
	) );
	#############################################################
	# FRONTPAGE BOXES SECTION 5
	#############################################################
	Kirki::add_section( 'agama_frontpage_boxes_section_5', array(
		'title'			=> __( 'Front Page Box #5', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_frontpage_boxes_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable', 'agama-pro' ),
		'tooltip'	=> __( 'Enable box 5.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_5',
		'settings'		=> 'agama_frontpage_box_5_enable',
		'type'			=> 'switch',
		'default'		=> false
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Title', 'agama-pro' ),
		'tooltip'	      => __( 'Set box title.', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_5',
		'settings'		  => 'agama_frontpage_box_5_title',
		'type'			  => 'text',
		'default'		  => 'Powerful Performance',
        'partial_refresh' => array(
            'agama_frontpage_box_5_title' => array(
                'selector'                => '.fbox-5 h2',
                'render_callback'         => array( 'Agama_Partial_Refresh', 'preview_fbox_5_title' )
            )
        )
	) );
    Kirki::add_field( 'agama_options', array(
        'label'           => __( 'Icon or Image', 'agama-pro' ),
        'tooltip'         => __( 'Select what do you want use for front page box.', 'agama-pro' ),
        'section'         => 'agama_frontpage_boxes_section_5',
        'settings'        => 'agama_frontpage_box_5_ico_or_img',
        'type'            => 'radio-buttonset',
        'choices'         => array(
            'icon'        => __( 'Icon', 'agama-pro' ),
            'image'       => __( 'Image', 'agama-pro' )
        ),
        'default'         => 'icon',
        'partial_refresh' => array(
            'agama_frontpage_box_5_ico_or_img' => array(
                'selector'        => '.fbox-5 .vision-fa.vision-preview',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_5_ico_or_img' )
            )
        )
    ) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Select Icon', 'agama-pro' ),
		'tooltip'	    => __( 'Select box icon.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_5',
		'settings'		=> 'agama_frontpage_box_5_icon',
		'type'			=> 'agip',
		'default'		=> 'fa-magic',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_5_ico_or_img',
                'operator' => '==',
                'value'    => 'icon'
            )
        ),
        'partial_refresh' => array(
            'agama_frontpage_box_5_icon' => array(
                'selector'               => '.fbox-5 .vision-fa.vision-preview',
                'render_callback'        => array( 'Agama_Partial_Refresh', 'preview_fbox_5_icon' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Icon Color', 'agama-pro' ),
		'tooltip'	=> __( 'Set icon color.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_5',
		'settings'		=> 'agama_frontpage_box_5_icon_color',
		'type'			=> 'color',
        'transport'     => 'auto',
		'output'		=> array(
			array(
				'element'  => '.fbox-5 i.fa:not(.fa-link)',
				'property' => 'color'
			)
		),
		'default'		   => '#A2C605',
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_5_ico_or_img',
                'operator' => '==',
                'value'    => 'icon'
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Image', 'agama-pro' ),
		'tooltip'	=> __('You can use image instead of FontAwesome icon, just upload it here.', 'agama-pro'),
		'section'		=> 'agama_frontpage_boxes_section_5',
		'settings'		=> 'agama_frontpage_5_img',
		'type'			=> 'image',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_5_ico_or_img',
                'operator' => '==',
                'value'    => 'image'
            )
        ),
        'partial_refresh' => array(
            'agama_frontpage_5_img' => array(
                'selector'          => '.fbox-5 .vision-fa.vision-preview',
                'render_callback'   => array( 'Agama_Partial_Refresh', 'preview_fbox_5_image' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Image Width', 'agama-pro' ),
		'tooltip'		    => __( 'Set box image width.', 'agama-pro' ),
		'section'			=> 'agama_frontpage_boxes_section_5',
		'settings'			=> 'agama_frontpage_5_img_width',
		'type'				=> 'slider',
        'choices'           => array(
            'min'           => '0',
            'max'           => '1000',
            'step'          => '1'
        ),
        'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> '.fbox-5 img',
				'property'	=> 'max-width',
				'units'		=> 'px',
				'suffix'	=> '!important'
			)
		),
		'default'		   => '100',
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_5_ico_or_img',
                'operator' => '==',
                'value'    => 'image'
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Box Icon / Image URL', 'agama-pro' ),
		'tooltip'	=> __( 'Starting with: http://', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_5',
		'settings'		=> 'agama_frontpage_box_5_icon_url',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Box Text', 'agama-pro' ),
		'tooltip'	      => __( 'Add custom text.', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_5',
		'settings'		  => 'agama_frontpage_box_5_text',
		'type'			  => 'textarea',
		'default'		  => 'Optimized code that are completely customizable and deliver unmatched fast performance.',
        'partial_refresh' => array(
            'agama_frontpage_box_5_text' => array(
                'selector'               => '.fbox-5 p',
                'render_callback'        => array( 'Agama_Partial_Refresh', 'preview_fbox_5_desc' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Read More', 'agama-pro' ),
		'tooltip'	      => __( 'Enable read more button ?', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_5',
		'settings'		  => 'agama_frontpage_box_5_readmore',
		'type'			  => 'switch',
		'default'		  => true,
        'partial_refresh' => array(
            'agama_frontpage_box_5_readmore' => array(
                'selector'        => '.fbox-5 .vision-fbox-button.vision-preview',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_5_read_more' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			   => __( 'Button Title', 'agama-pro' ),
		'tooltip'	       => __( 'Set button custom title.', 'agama-pro' ),
		'section'		   => 'agama_frontpage_boxes_section_5',
		'settings'		   => 'agama_frontpage_box_5_readmore_txt',
		'type'			   => 'text',
		'default'		   => __( 'Read More', 'agama-pro' ),
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_5_readmore',
                'operator' => '==',
                'value'    => true
            )
        ),
        'partial_refresh'  => array(
            'agama_frontpage_box_5_readmore_txt' => array(
                'selector'        => '.fbox-5 .vision-fbox-button.vision-preview a.button span',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_5_read_more_txt' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			   => __( 'Button URL', 'agama-pro' ),
		'tooltip'	       => __( 'Set button url.', 'agama-pro' ),
		'section'		   => 'agama_frontpage_boxes_section_5',
		'settings'		   => 'agama_frontpage_box_5_readmore_url',
		'type'			   => 'text',
		'default'		   => '#',
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_5_readmore',
                'operator' => '==',
                'value'    => true
            )
        ),
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Box Animated', 'agama-pro' ),
		'tooltip'	=> __( 'Enable box loading animation ?', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_5',
		'settings'		=> 'agama_frontpage_box_5_animated',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Box Animation', 'agama-pro' ),
		'tooltip'		=> __( 'Select box loading animation.', 'agama-pro' ),
		'section'			=> 'agama_frontpage_boxes_section_5',
		'settings'			=> 'agama_frontpage_box_5_animation',
		'type'				=> 'select',
		'choices'			=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_frontpage_box_5_animated',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> 'bounceIn'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Animation Delay', 'agama-pro' ),
		'tooltip'		=> __( 'Set box animation delay. 1000ms = 1sec', 'agama-pro' ),
		'settings'			=> 'agama_frontpage_box_5_animation_delay',
		'section'			=> 'agama_frontpage_boxes_section_5',
		'type'				=> 'slider',
		'choices'			=> array(
			'min'			=> 0,
			'max'			=> 10000,
			'step'			=> 1
		),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_frontpage_box_5_animated',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> '1000'
	) );
	#############################################################
	# FRONTPAGE BOXES SECTION 6
	#############################################################
	Kirki::add_section( 'agama_frontpage_boxes_section_6', array(
		'title'			=> __( 'Front Page Box #6', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_frontpage_boxes_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable', 'agama-pro' ),
		'tooltip'	=> __( 'Enable box 6.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_6',
		'settings'		=> 'agama_frontpage_box_6_enable',
		'type'			=> 'switch',
		'default'		=> false
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Title', 'agama-pro' ),
		'tooltip'	      => __( 'Set box title.', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_6',
		'settings'		  => 'agama_frontpage_box_6_title',
		'type'			  => 'text',
		'default'		  => 'Powerful Performance',
        'partial_refresh' => array(
            'agama_frontpage_box_6_title' => array(
                'selector'                => '.fbox-6 h2',
                'render_callback'         => array( 'Agama_Partial_Refresh', 'preview_fbox_6_title' )
            )
        )
	) );
    Kirki::add_field( 'agama_options', array(
        'label'           => __( 'Icon or Image', 'agama-pro' ),
        'tooltip'         => __( 'Select what do you want use for front page box.', 'agama-pro' ),
        'section'         => 'agama_frontpage_boxes_section_6',
        'settings'        => 'agama_frontpage_box_6_ico_or_img',
        'type'            => 'radio-buttonset',
        'choices'         => array(
            'icon'        => __( 'Icon', 'agama-pro' ),
            'image'       => __( 'Image', 'agama-pro' )
        ),
        'default'         => 'icon',
        'partial_refresh' => array(
            'agama_frontpage_box_6_ico_or_img' => array(
                'selector'        => '.fbox-6 .vision-fa.vision-preview',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_6_ico_or_img' )
            )
        )
    ) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Select Icon', 'agama-pro' ),
		'tooltip'	    => __( 'Select box icon.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_6',
		'settings'		=> 'agama_frontpage_box_6_icon',
		'type'			=> 'agip',
		'default'		=> 'fa-magic',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_6_ico_or_img',
                'operator' => '==',
                'value'    => 'icon'
            )
        ),
        'partial_refresh' => array(
            'agama_frontpage_box_6_icon' => array(
                'selector'               => '.fbox-6 .vision-fa.vision-preview',
                'render_callback'        => array( 'Agama_Partial_Refresh', 'preview_fbox_6_icon' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Icon Color', 'agama-pro' ),
		'tooltip'	=> __( 'Set icon color.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_6',
		'settings'		=> 'agama_frontpage_box_6_icon_color',
		'type'			=> 'color',
        'transport'     => 'auto',
		'output'		=> array(
			array(
				'element'	=> '.fbox-6 i.fa:not(.fa-link)',
				'property'	=> 'color'
			)
		),
		'default'		=> '#A2C605',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_6_ico_or_img',
                'operator' => '==',
                'value'    => 'icon'
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Image', 'agama-pro' ),
		'tooltip'	=> __('You can use image instead of FontAwesome icon, just upload it here.', 'agama-pro'),
		'section'		=> 'agama_frontpage_boxes_section_6',
		'settings'		=> 'agama_frontpage_6_img',
		'type'			=> 'image',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_6_ico_or_img',
                'operator' => '==',
                'value'    => 'image'
            )
        ),
        'partial_refresh' => array(
            'agama_frontpage_6_img' => array(
                'selector'          => '.fbox-6 .vision-fa.vision-preview',
                'render_callback'   => array( 'Agama_Partial_Refresh', 'preview_fbox_6_image' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Image Width', 'agama-pro' ),
		'tooltip'		    => __( 'Set box image width.', 'agama-pro' ),
		'section'			=> 'agama_frontpage_boxes_section_6',
		'settings'			=> 'agama_frontpage_6_img_width',
		'type'				=> 'slider',
        'choices'           => array(
            'min'           => '0',
            'max'           => '1000',
            'step'          => '1'
        ),
        'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> '.fbox-6 img',
				'property'	=> 'max-width',
				'units'		=> 'px',
				'suffix'	=> '!important'
			)
		),
		'default'		   => '100',
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_6_ico_or_img',
                'operator' => '==',
                'value'    => 'image'
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Box Icon / Image URL', 'agama-pro' ),
		'tooltip'	=> __( 'Starting with: http://', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_6',
		'settings'		=> 'agama_frontpage_box_6_icon_url',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Box Text', 'agama-pro' ),
		'tooltip'	      => __( 'Add custom text.', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_6',
		'settings'		  => 'agama_frontpage_box_6_text',
		'type'			  => 'textarea',
		'default'		  => 'Stretch your Website to the Full Width or make it boxed to surprise your visitors.',
        'partial_refresh' => array(
            'agama_frontpage_box_6_text' => array(
                'selector'               => '.fbox-6 p',
                'render_callback'        => array( 'Agama_Partial_Refresh', 'preview_fbox_6_desc' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Read More', 'agama-pro' ),
		'tooltip'	      => __( 'Enable read more button ?', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_6',
		'settings'		  => 'agama_frontpage_box_6_readmore',
		'type'			  => 'switch',
		'default'		  => true,
        'partial_refresh' => array(
            'agama_frontpage_box_6_readmore' => array(
                'selector'        => '.fbox-6 .vision-fbox-button.vision-preview',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_6_read_more' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			   => __( 'Button Title', 'agama-pro' ),
		'tooltip'	       => __( 'Set button custom title.', 'agama-pro' ),
		'section'		   => 'agama_frontpage_boxes_section_6',
		'settings'		   => 'agama_frontpage_box_6_readmore_txt',
		'type'			   => 'text',
		'default'		   => __( 'Read More', 'agama-pro' ),
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_6_readmore',
                'operator' => '==',
                'value'    => true
            )
        ),
        'partial_refresh'  => array(
            'agama_frontpage_box_6_readmore_txt' => array(
                'selector'        => '.fbox-6 .vision-fbox-button.vision-preview a.button span',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_6_read_more_txt' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			   => __( 'Button URL', 'agama-pro' ),
		'tooltip'	       => __( 'Set button url.', 'agama-pro' ),
		'section'		   => 'agama_frontpage_boxes_section_6',
		'settings'		   => 'agama_frontpage_box_6_readmore_url',
		'type'			   => 'text',
		'default'		   => '#',
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_6_readmore',
                'operator' => '==',
                'value'    => true
            )
        ),
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Box Animated', 'agama-pro' ),
		'tooltip'	=> __( 'Enable box loading animation ?', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_6',
		'settings'		=> 'agama_frontpage_box_6_animated',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Box Animation', 'agama-pro' ),
		'tooltip'		=> __( 'Select box loading animation.', 'agama-pro' ),
		'section'			=> 'agama_frontpage_boxes_section_6',
		'settings'			=> 'agama_frontpage_box_6_animation',
		'type'				=> 'select',
		'choices'			=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_frontpage_box_6_animated',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> 'bounceIn'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Animation Delay', 'agama-pro' ),
		'tooltip'		=> __( 'Set box animation delay. 1000ms = 1sec', 'agama-pro' ),
		'settings'			=> 'agama_frontpage_box_6_animation_delay',
		'section'			=> 'agama_frontpage_boxes_section_6',
		'type'				=> 'slider',
		'choices'			=> array(
			'min'			=> 0,
			'max'			=> 10000,
			'step'			=> 1
		),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_frontpage_box_6_animated',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> '1200'
	) );
	#############################################################
	# FRONTPAGE BOXES SECTION 7
	#############################################################
	Kirki::add_section( 'agama_frontpage_boxes_section_7', array(
		'title'			=> __( 'Front Page Box #7', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_frontpage_boxes_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable', 'agama-pro' ),
		'tooltip'	=> __( 'Enable box 7.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_7',
		'settings'		=> 'agama_frontpage_box_7_enable',
		'type'			=> 'switch',
		'default'		=> false
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Title', 'agama-pro' ),
		'tooltip'	      => __( 'Set box title.', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_7',
		'settings'		  => 'agama_frontpage_box_7_title',
		'type'			  => 'text',
		'default'		  => 'Powerful Performance',
        'partial_refresh' => array(
            'agama_frontpage_box_7_title' => array(
                'selector'                => '.fbox-7 h2',
                'render_callback'         => array( 'Agama_Partial_Refresh', 'preview_fbox_7_title' )
            )
        )
	) );
    Kirki::add_field( 'agama_options', array(
        'label'           => __( 'Icon or Image', 'agama-pro' ),
        'tooltip'         => __( 'Select what do you want use for front page box.', 'agama-pro' ),
        'section'         => 'agama_frontpage_boxes_section_7',
        'settings'        => 'agama_frontpage_box_7_ico_or_img',
        'type'            => 'radio-buttonset',
        'choices'         => array(
            'icon'        => __( 'Icon', 'agama-pro' ),
            'image'       => __( 'Image', 'agama-pro' )
        ),
        'default'         => 'icon',
        'partial_refresh' => array(
            'agama_frontpage_box_7_ico_or_img' => array(
                'selector'        => '.fbox-7 .vision-fa.vision-preview',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_7_ico_or_img' )
            )
        )
    ) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Select Icon', 'agama-pro' ),
		'tooltip'	    => __( 'Select box icon.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_7',
		'settings'		=> 'agama_frontpage_box_7_icon',
		'type'			=> 'agip',
		'default'		=> 'fa-magic',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_7_ico_or_img',
                'operator' => '==',
                'value'    => 'icon'
            )
        ),
        'partial_refresh' => array(
            'agama_frontpage_box_7_icon' => array(
                'selector'               => '.fbox-7 .vision-fa.vision-preview',
                'render_callback'        => array( 'Agama_Partial_Refresh', 'preview_fbox_7_icon' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Icon Color', 'agama-pro' ),
		'tooltip'	    => __( 'Set icon color.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_7',
		'settings'		=> 'agama_frontpage_box_7_icon_color',
		'type'			=> 'color',
        'transport'     => 'auto',
		'output'		=> array(
			array(
				'element'	=> '.fbox-7 i.fa:not(.fa-link)',
				'property'	=> 'color'
			)
		),
		'default'		=> '#A2C605',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_7_ico_or_img',
                'operator' => '==',
                'value'    => 'icon'
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Image', 'agama-pro' ),
		'tooltip'	=> __('You can use image instead of FontAwesome icon, just upload it here.', 'agama-pro'),
		'section'		=> 'agama_frontpage_boxes_section_7',
		'settings'		=> 'agama_frontpage_7_img',
		'type'			=> 'image',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_7_ico_or_img',
                'operator' => '==',
                'value'    => 'image'
            )
        ),
        'partial_refresh' => array(
            'agama_frontpage_7_img' => array(
                'selector'          => '.fbox-7 .vision-fa.vision-preview',
                'render_callback'   => array( 'Agama_Partial_Refresh', 'preview_fbox_7_image' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Image Width', 'agama-pro' ),
		'tooltip'		    => __( 'Set box image width.', 'agama-pro' ),
		'section'			=> 'agama_frontpage_boxes_section_7',
		'settings'			=> 'agama_frontpage_7_img_width',
		'type'				=> 'slider',
        'choices'           => array(
            'min'           => '0',
            'max'           => '1000',
            'step'          => '1'
        ),
        'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> '.fbox-7 img',
				'property'	=> 'max-width',
				'units'		=> 'px',
				'suffix'	=> '!important'
			)
		),
		'default'			=> '100',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_7_ico_or_img',
                'operator' => '==',
                'value'    => 'image'
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Box Icon / Image URL', 'agama-pro' ),
		'tooltip'	=> __( 'Starting with: http://', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_7',
		'settings'		=> 'agama_frontpage_box_7_icon_url',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Box Text', 'agama-pro' ),
		'tooltip'	      => __( 'Add custom text.', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_7',
		'settings'		  => 'agama_frontpage_box_7_text',
		'type'			  => 'textarea',
		'default'		  => 'Complete control on each & every element that provides endless customization possibilities.',
        'partial_refresh' => array(
            'agama_frontpage_box_7_text' => array(
                'selector'               => '.fbox-7 p',
                'render_callback'        => array( 'Agama_Partial_Refresh', 'preview_fbox_7_desc' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Read More', 'agama-pro' ),
		'tooltip'	      => __( 'Enable read more button ?', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_7',
		'settings'		  => 'agama_frontpage_box_7_readmore',
		'type'			  => 'switch',
		'default'		  => true,
        'partial_refresh' => array(
            'agama_frontpage_box_7_readmore' => array(
                'selector'        => '.fbox-7 .vision-fbox-button.vision-preview',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_7_read_more' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			   => __( 'Button Title', 'agama-pro' ),
		'tooltip'	       => __( 'Set button custom title.', 'agama-pro' ),
		'section'		   => 'agama_frontpage_boxes_section_7',
		'settings'		   => 'agama_frontpage_box_7_readmore_txt',
		'type'			   => 'text',
		'default'		   => __( 'Read More', 'agama-pro' ),
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_7_readmore',
                'operator' => '==',
                'value'    => true
            )
        ),
        'partial_refresh'  => array(
            'agama_frontpage_box_7_readmore_txt' => array(
                'selector'        => '.fbox-7 .vision-fbox-button.vision-preview a.button span',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_7_read_more_txt' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			   => __( 'Button URL', 'agama-pro' ),
		'tooltip'	       => __( 'Set button url.', 'agama-pro' ),
		'section'		   => 'agama_frontpage_boxes_section_7',
		'settings'		   => 'agama_frontpage_box_7_readmore_url',
		'type'			   => 'text',
		'default'		   => '#',
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_7_readmore',
                'operator' => '==',
                'value'    => true
            )
        ),
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Box Animated', 'agama-pro' ),
		'tooltip'	=> __( 'Enable box loading animation ?', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_7',
		'settings'		=> 'agama_frontpage_box_7_animated',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Box Animation', 'agama-pro' ),
		'tooltip'		=> __( 'Select box loading animation.', 'agama-pro' ),
		'section'			=> 'agama_frontpage_boxes_section_7',
		'settings'			=> 'agama_frontpage_box_7_animation',
		'type'				=> 'select',
		'choices'			=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_frontpage_box_7_animated',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> 'bounceIn'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Animation Delay', 'agama-pro' ),
		'tooltip'		=> __( 'Set box animation delay. 1000ms = 1sec', 'agama-pro' ),
		'settings'			=> 'agama_frontpage_box_7_animation_delay',
		'section'			=> 'agama_frontpage_boxes_section_7',
		'type'				=> 'slider',
		'choices'			=> array(
			'min'			=> 0,
			'max'			=> 10000,
			'step'			=> 1
		),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_frontpage_box_7_animated',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> '1400'
	) );
	#############################################################
	# FRONTPAGE BOXES SECTION 8
	#############################################################
	Kirki::add_section( 'agama_frontpage_boxes_section_8', array(
		'title'			=> __( 'Front Page Box #8', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_frontpage_boxes_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable', 'agama-pro' ),
		'tooltip'	    => __( 'Enable box 8.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_8',
		'settings'		=> 'agama_frontpage_box_8_enable',
		'type'			=> 'switch',
		'default'		=> false
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Title', 'agama-pro' ),
		'tooltip'	      => __( 'Set box title.', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_8',
		'settings'		  => 'agama_frontpage_box_8_title',
		'type'			  => 'text',
		'default'		  => 'Powerful Performance',
        'partial_refresh' => array(
            'agama_frontpage_box_8_title' => array(
                'selector'                => '.fbox-8 h2',
                'render_callback'         => array( 'Agama_Partial_Refresh', 'preview_fbox_8_title' )
            )
        )
	) );
    Kirki::add_field( 'agama_options', array(
        'label'           => __( 'Icon or Image', 'agama-pro' ),
        'tooltip'         => __( 'Select what do you want use for front page box.', 'agama-pro' ),
        'section'         => 'agama_frontpage_boxes_section_8',
        'settings'        => 'agama_frontpage_box_8_ico_or_img',
        'type'            => 'radio-buttonset',
        'choices'         => array(
            'icon'        => __( 'Icon', 'agama-pro' ),
            'image'       => __( 'Image', 'agama-pro' )
        ),
        'default'         => 'icon',
        'partial_refresh' => array(
            'agama_frontpage_box_8_ico_or_img' => array(
                'selector'        => '.fbox-8 .vision-fa.vision-preview',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_8_ico_or_img' )
            )
        )
    ) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Select Icon', 'agama-pro' ),
		'tooltip'	    => __( 'Select box icon.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_8',
		'settings'		=> 'agama_frontpage_box_8_icon',
		'type'			=> 'agip',
		'default'		=> 'fa-magic',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_8_ico_or_img',
                'operator' => '==',
                'value'    => 'icon'
            )
        ),
        'partial_refresh' => array(
            'agama_frontpage_box_8_icon' => array(
                'selector'               => '.fbox-8 .vision-fa.vision-preview',
                'render_callback'        => array( 'Agama_Partial_Refresh', 'preview_fbox_8_icon' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Icon Color', 'agama-pro' ),
		'tooltip'	    => __( 'Set icon color.', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_8',
		'settings'		=> 'agama_frontpage_box_8_icon_color',
		'type'			=> 'color',
        'transport'     => 'auto',
		'output'		=> array(
			array(
				'element'	=> '.fbox-8 i.fa:not(.fa-link)',
				'property'	=> 'color'
			)
		),
		'default'		=> '#A2C605',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_8_ico_or_img',
                'operator' => '==',
                'value'    => 'icon'
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Image', 'agama-pro' ),
		'tooltip'	=> __('You can use image instead of FontAwesome icon, just upload it here.', 'agama-pro'),
		'section'		=> 'agama_frontpage_boxes_section_8',
		'settings'		=> 'agama_frontpage_8_img',
		'type'			=> 'image',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_8_ico_or_img',
                'operator' => '==',
                'value'    => 'image'
            )
        ),
        'partial_refresh' => array(
            'agama_frontpage_8_img' => array(
                'selector'          => '.fbox-8 .vision-fa.vision-preview',
                'render_callback'   => array( 'Agama_Partial_Refresh', 'preview_fbox_8_image' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Image Width', 'agama-pro' ),
		'tooltip'		    => __( 'Set box image width.', 'agama-pro' ),
		'section'			=> 'agama_frontpage_boxes_section_8',
		'settings'			=> 'agama_frontpage_8_img_width',
		'type'				=> 'slider',
        'choices'           => array(
            'min'           => '0',
            'max'           => '1000',
            'step'          => '1'
        ),
        'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> '.fbox-8 img',
				'property'	=> 'max-width',
				'units'		=> 'px',
				'suffix'	=> '!important'
			)
		),
		'default'			=> '100',
        'active_callback' => array(
            array(
                'setting'  => 'agama_frontpage_box_8_ico_or_img',
                'operator' => '==',
                'value'    => 'image'
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Box Icon / Image URL', 'agama-pro' ),
		'tooltip'	=> __( 'Starting with: http://', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_8',
		'settings'		=> 'agama_frontpage_box_8_icon_url',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Box Text', 'agama-pro' ),
		'tooltip'	      => __( 'Add custom text.', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_8',
		'settings'		  => 'agama_frontpage_box_8_text',
		'type'			  => 'textarea',
		'default'		  => 'Powerful Layout with Responsive functionality that can be adapted to any screen size.',
        'partial_refresh' => array(
            'agama_frontpage_box_8_text' => array(
                'selector'               => '.fbox-8 p',
                'render_callback'        => array( 'Agama_Partial_Refresh', 'preview_fbox_8_desc' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Read More', 'agama-pro' ),
		'tooltip'	      => __( 'Enable read more button ?', 'agama-pro' ),
		'section'		  => 'agama_frontpage_boxes_section_8',
		'settings'		  => 'agama_frontpage_box_8_readmore',
		'type'			  => 'switch',
		'default'		  => true,
        'partial_refresh' => array(
            'agama_frontpage_box_8_readmore' => array(
                'selector'        => '.fbox-8 .vision-fbox-button.vision-preview',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_8_read_more' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			   => __( 'Button Title', 'agama-pro' ),
		'tooltip'	       => __( 'Set button custom title.', 'agama-pro' ),
		'section'		   => 'agama_frontpage_boxes_section_8',
		'settings'		   => 'agama_frontpage_box_8_readmore_txt',
		'type'			   => 'text',
		'default'		   => __( 'Read More', 'agama-pro' ),
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_8_readmore',
                'operator' => '==',
                'value'    => true
            )
        ),
        'partial_refresh'  => array(
            'agama_frontpage_box_8_readmore_txt' => array(
                'selector'        => '.fbox-8 .vision-fbox-button.vision-preview a.button span',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_fbox_8_read_more_txt' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			   => __( 'Button URL', 'agama-pro' ),
		'tooltip'	       => __( 'Set button url.', 'agama-pro' ),
		'section'		   => 'agama_frontpage_boxes_section_8',
		'settings'		   => 'agama_frontpage_box_8_readmore_url',
		'type'			   => 'text',
		'default'		   => '#',
        'active_callback'  => array(
            array(
                'setting'  => 'agama_frontpage_box_8_readmore',
                'operator' => '==',
                'value'    => true
            )
        ),
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Box Animated', 'agama-pro' ),
		'tooltip'	=> __( 'Enable box loading animation ?', 'agama-pro' ),
		'section'		=> 'agama_frontpage_boxes_section_8',
		'settings'		=> 'agama_frontpage_box_8_animated',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Box Animation', 'agama-pro' ),
		'tooltip'		=> __( 'Select box loading animation.', 'agama-pro' ),
		'section'			=> 'agama_frontpage_boxes_section_8',
		'settings'			=> 'agama_frontpage_box_8_animation',
		'type'				=> 'select',
		'choices'			=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_frontpage_box_8_animated',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> 'bounceIn'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Animation Delay', 'agama-pro' ),
		'tooltip'		    => __( 'Set box animation delay. 1000ms = 1sec', 'agama-pro' ),
		'settings'			=> 'agama_frontpage_box_8_animation_delay',
		'section'			=> 'agama_frontpage_boxes_section_8',
		'type'				=> 'slider',
		'choices'			=> array(
			'min'			=> 0,
			'max'			=> 10000,
			'step'			=> 1
		),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_frontpage_box_8_animated',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> '1600'
	) );
################################################
# BLOG
################################################
	Kirki::add_panel( 'agama_blog_panel', array(
		'title'			=> __( 'Blog', 'agama-pro' ),
		'priority'		=> 90
	) );
	################################################
	# BLOG GENERAL SECTION
	################################################
	Kirki::add_section( 'agama_blog_section', array(
		'title'			=> __( 'General', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_blog_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'            => __( 'Layout', 'agama-pro' ),
		'tooltip'          => __( 'Select blog layout.', 'agama-pro' ),
		'section'          => 'agama_blog_section',
		'settings'         => 'agama_blog_layout',
		'type'             => 'select',
		'choices'          => array(
			'list'		   => __( 'List Layout', 'agama-pro' ),
			'grid'		   => __( 'Grid Layout', 'agama-pro' ),
			'small_thumbs' => __( 'Small Thumbs Layout', 'agama-pro' )
		),
		'default'          => 'list'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Posts Animated', 'agama-pro' ),
		'tooltip'		=> __( 'Enable posts loading animation ?', 'agama-pro' ),
		'section'			=> 'agama_blog_section',
		'settings'			=> 'agama_blog_posts_animated',
		'type'				=> 'switch',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_blog_layout',
				'operator'	=> '!==',
				'value'		=> 'grid'
			)
		),
		'default'			=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Posts Animation', 'agama-pro' ),
		'tooltip'	=> __( 'Select posts loading animation.', 'agama-pro' ),
		'section'		=> 'agama_blog_section',
		'settings'		=> 'agama_blog_posts_animation',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_blog_posts_animated',
				'operator'	=> '==',
				'value'		=> true
			),
			array(
				'setting'	=> 'agama_blog_layout',
				'operator'	=> '!==',
				'value'		=> 'grid'
			)
		),
		'default'		=> 'bounceInUp'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Thumbnails Hover Effect', 'agama-pro' ),
		'tooltip'	=> __( 'Enable blog thumbnails hover effect ?', 'agama-pro' ),
		'section'		=> 'agama_blog_section',
		'settings'		=> 'agama_blog_thumbnails_hover_effect',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Thumbnails Permalink', 'agama-pro' ),
		'tooltip'	    => __( 'Enable blog thumbnails permalinks ?', 'agama-pro' ),
		'section'		=> 'agama_blog_section',
		'settings'		=> 'agama_blog_thumbnails_permalink',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Lightbox', 'agama-pro' ),
		'tooltip'	=> __( 'Enable lightbox for blog posts images ?', 'agama-pro' ),
		'section'		=> 'agama_blog_section',
		'settings'		=> 'agama_blog_lightbox',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Excerpt', 'agama-pro' ),
		'tooltip'	      => __( 'Set posts lenght on blog loop page.', 'agama-pro' ),
		'section'		  => 'agama_blog_section',
		'settings'		  => 'agama_blog_excerpt',
		'type'			  => 'slider',
		'choices'		  => array(
			'step'		  => '1',
			'min'		  => '0',
			'max'		  => '500'
		),
		'default'		  => '70'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Read More', 'agama-pro' ),
		'tooltip'	      => __( 'Enable read more url on blog excerpt ?', 'agama-pro' ),
		'section'		  => 'agama_blog_section',
		'settings'		  => 'agama_blog_readmore_url',
		'type'			  => 'switch',
		'default'		  => true,
        'partial_refresh' => array(
            'agama_blog_readmore_url' => array(
                'selector'        => 'body.blog article span.more-link-cpreview',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_blog_read_more' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Pagination', 'agama-pro' ),
		'tooltip'	    => __( 'Enable blog pagination ?', 'agama-pro' ),
		'section'		=> 'agama_blog_section',
		'settings'		=> 'agama_blog_pagination',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			    => __( 'Infinite Scroll', 'agama-pro' ),
		'tooltip'	        => __( 'If enabled, the blog posts will be automatically loaded.', 'agama-pro' ),
		'section'		    => 'agama_blog_section',
		'settings'		    => 'agama_blog_infinite_scroll',
		'type'			    => 'switch',
		'default'		    => false,
        'active_callback'   => array(
            array(
                'setting'   => 'agama_blog_pagination',
                'operator'  => '==',
                'value'     => true
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Infinite Trigger', 'agama-pro' ),
		'tooltip'		    => __( 'Select infinite scroll trigger.', 'agama-pro' ),
		'section'			=> 'agama_blog_section',
		'settings'			=> 'agama_blog_infinite_trigger',
		'type'				=> 'select',
		'choices'			=> array(
			'auto'			=> __( 'Automatic', 'agama-pro' ),
			'button'		=> __( 'Button', 'agama-pro' )
		),
		'active_callback'	=> array(
			array(
                'setting'   => 'agama_blog_pagination',
                'operator'  => '==',
                'value'     => true
            )
		),
		'default'			=> 'button'
	) );
	############################################################
	# BLOG SINGLE POST SECTION
	############################################################
	Kirki::add_section( 'agama_blog_single_post_section', array(
		'title'			=> __( 'Single Post', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_blog_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Featured Thumbanil', 'agama-pro' ),
		'tooltip'	    => __( 'Enable featured thumbnail on single blog posts ?', 'agama-pro' ),
		'settings'		=> 'agama_blog_single_featured_thumbs',
		'section'		=> 'agama_blog_single_post_section',
		'type'			=> 'switch',
		'default'		=> false
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Single Post Meta', 'agama-pro' ),
		'tooltip'	    => __( 'Enables post author, date, category, comments counter features.', 'agama-pro' ),
		'section'		=> 'agama_blog_single_post_section',
		'settings'		=> 'agama_blog_single_post_meta',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Post Tags', 'agama-pro' ),
		'tooltip'	=> __( 'Enable blog single posts tags ?', 'agama-pro' ),
		'section'		=> 'agama_blog_single_post_section',
		'settings'		=> 'agama_blog_tags',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Prev | Next - Post Navigation', 'agama-pro' ),
		'tooltip'	=> __( 'Enable single post prev | next navigation ?', 'agama-pro' ),
		'settings'		=> 'agama_blog_post_prev_next_nav',
		'section'		=> 'agama_blog_single_post_section',
		'type'			=> 'switch',
		'default'		=> true
	) );
	#####################################################
	# BLOG META SECTION
	#####################################################
	Kirki::add_section( 'agama_blog_meta_section', array(
		'title'			=> __( 'Post Meta', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_blog_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Post Meta', 'agama-pro' ),
		'tooltip'	=> __( 'Enable blog post meta ?', 'agama-pro' ),
		'section'		=> 'agama_blog_meta_section',
		'settings'		=> 'agama_post_meta',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Post Meta Author', 'agama-pro' ),
		'tooltip'		=> __( 'Enable blog post author ?', 'agama-pro' ),
		'section'			=> 'agama_blog_meta_section',
		'settings'			=> 'agama_blog_author',
		'type'				=> 'switch',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_post_meta',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Post Meta Date', 'agama-pro' ),
		'tooltip'	=> __( 'Enable blog post date ?', 'agama-pro' ),
		'section'		=> 'agama_blog_meta_section',
		'settings'		=> 'agama_blog_date',
		'type'			=> 'switch',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_post_meta',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Post Meta Category', 'agama-pro' ),
		'tooltip'	=> __( 'Enable blog post category ?', 'agama-pro' ),
		'section'		=> 'agama_blog_meta_section',
		'settings'		=> 'agama_blog_category',
		'type'			=> 'switch',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_post_meta',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Post Meta Comments Count', 'agama-pro' ),
		'tooltip'	=> __( 'Enable blog post comments count feature ?', 'agama-pro' ),
		'section'		=> 'agama_blog_meta_section',
		'settings'		=> 'agama_blog_comments_count',
		'type'			=> 'switch',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_post_meta',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> true
	) );
#########################################################
# PORTFOLIO
#########################################################
	Kirki::add_section( 'agama_portfolio_section', array(
		'title'			=> __( 'Portfolio', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 100
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Portfolio Page Slug', 'agama-pro' ),
		'tooltip'	=> __( 'Set portfolio page custom slug.', 'agama-pro' ),
		'section'		=> 'agama_portfolio_section',
		'settings'		=> 'agama_portfolio_page_slug',
		'type'			=> 'text',
		'default'		=> 'agama_portfolio'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Items per Page', 'agama-pro' ),
		'tooltip'	=> __( 'Set portfolio items per page.', 'agama-pro' ),
		'section'		=> 'agama_portfolio_section',
		'settings'		=> 'agama_portfolio_per_page',
		'type'			=> 'number',
		'default'		=> '12'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Filter Navigation', 'agama-pro' ),
		'tooltip'	=> __( 'Enable filter navigation on portfolio pages ?', 'agama-pro' ),
		'section'		=> 'agama_portfolio_section',
		'settings'		=> 'agama_portfolio_nav_filter',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Excerpt', 'agama-pro' ),
		'tooltip'	=> __( 'Set portfolio excerpt lenght.', 'agama-pro' ),
		'section'		=> 'agama_portfolio_section',
		'settings'		=> 'agama_portfolio_excerpt',
		'type'			=> 'number',
		'default'		=> '80'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Share Icons', 'agama-pro' ),
		'tooltip'	=> __( 'Enable share icons ?', 'agama-pro' ),
		'section'		=> 'agama_portfolio_section',
		'settings'		=> 'agama_portfolio_share',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Pagination', 'agama-pro' ),
		'tooltip'	=> __( 'Enable portfolio pagination ?', 'agama-pro' ),
		'section'		=> 'agama_portfolio_section',
		'settings'		=> 'agama_portfolio_pagination',
		'type'			=> 'switch',
		'default'		=> true
	) );
############################################################
# SOCIAL ICONS
############################################################
	Kirki::add_section( 'agama_social_icons_section', array(
		'title'			=> __( 'Social Icons', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 110,
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'URL Target', 'agama-pro' ),
		'tooltip'	    => __( 'If "blank" selected all urls will be open in new tab.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'agama_social_url_target',
		'type'			=> 'select',
		'choices'		=> array(
			'_self'		=> '_self',
			'_blank'	=> '_blank'
		),
		'default'		=> '_blank'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Phone Number', 'agama-pro' ),
		'tooltip'	=> __( 'Example: +381 555 333', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_phone',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'E-mail URL', 'agama-pro' ),
		'tooltip'	=> __( 'Example: john.doe@gmail.com', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_email',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Facebook URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your facebook page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_facebook',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Twitter URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your twitter page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_twitter',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Flickr URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your flickr page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_flickr',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'RSS URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your rss page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_rss',
		'type'			=> 'text',
		'default'		=> esc_url_raw( get_bloginfo('rss2_url') )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Vimeo URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your vimeo page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_vimeo',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Youtube URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your youtube page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_youtube',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Instagram URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your instagram page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_instagram',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Pinterest URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your pinterest page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_pinterest',
		'type'			=> 'text',
		'default'		=> ''
	) );
    Kirki::add_field( 'agama_options', array(
        'label'         => __( 'Telegram URL', 'agama-pro' ),
        'tooltip'   => __( 'Set your telegram messenger page url.', 'agama-pro' ),
        'section'       => 'agama_social_icons_section',
        'settings'      => 'social_telegram',
        'type'          => 'text',
        'default'       => ''
    ) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Tumblr URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your tumblr page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_tumblr',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Google+ URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your google+ page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_google',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Dribbble URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your dribbble page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_dribbble',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Digg URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your digg page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_digg',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'LinkedIn URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your linkedin page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_linkedin',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Blogger URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your blogger page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_blogger',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Skype URL', 'agama-pro' ),
		'tooltip'	=> __( 'Example: john-doe', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_skype',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'MySpace URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your myspace page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_myspace',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Deviantart URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your deviantart page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_deviantart',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Yahoo URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your yahoo page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_yahoo',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Reddit URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your reddit page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_reddit',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'PayPal URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your paypal page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_paypal',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Dropbox URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your dropbox page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_dropbox',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'SoundCloud URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your soundcloud page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_soundcloud',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'VK URL', 'agama-pro' ),
		'tooltip'	=> __( 'Set your vk page url.', 'agama-pro' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_vk',
		'type'			=> 'text',
		'default'		=> ''
	) );
###########################################################
# SHARE ICONS
###########################################################
	Kirki::add_section( 'agama_share_icons_section', array(
		'title'			=> __( 'Social Share', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 120,
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Enable', 'agama-pro' ),
		'tooltip'	=> __( 'Enable social share icons ?', 'agama-pro '),
		'section'		=> 'agama_share_icons_section',
		'settings'		=> 'agama_share_box',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Visibility', 'agama-pro' ),
		'tooltip'	=> __( 'Select where to show share box.', 'agama-pro' ),
		'section'		=> 'agama_share_icons_section',
		'settings'		=> 'agama_share_box_visibility',
		'type'			=> 'select',
		'choices'		=> array(
			'posts'		=> __( 'Posts', 'agama-pro' ),
			'pages'		=> __( 'Pages', 'agama-pro' ),
			'all'		=> __( 'Post & Pages', 'agama-pro' )
		),
		'default'		=> 'posts'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Facebook Share', 'agama-pro' ),
		'tooltip'	=> __( 'Enable facebook share icon ?', 'agama-pro' ),
		'section'		=> 'agama_share_icons_section',
		'settings'		=> 'agama_share_facebook',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Twitter Share', 'agama-pro' ),
		'tooltip'	=> __( 'Enable twitter share icon ?', 'agama-pro' ),
		'section'		=> 'agama_share_icons_section',
		'settings'		=> 'agama_share_twitter',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Pinterest Share', 'agama-pro' ),
		'tooltip'	=> __( 'Enable pinterest share icon ?', 'agama-pro' ),
		'section'		=> 'agama_share_icons_section',
		'settings'		=> 'agama_share_pinterest',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Google+ Share', 'agama-pro' ),
		'tooltip'	=> __( 'Enable google+ share icon ?', 'agama-pro' ),
		'section'		=> 'agama_share_icons_section',
		'settings'		=> 'agama_share_google_plus',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'LinkedIn Share', 'agama-pro' ),
		'tooltip'	=> __( 'Enable LinkedIn share icon ?', 'agama-pro' ),
		'section'		=> 'agama_share_icons_section',
		'settings'		=> 'agama_share_linkedin',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'RSS Share', 'agama-pro' ),
		'tooltip'	=> __( 'Enable rss share icon ?', 'agama-pro' ),
		'section'		=> 'agama_share_icons_section',
		'settings'		=> 'agama_share_rss',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Email Share', 'agama-pro' ),
		'tooltip'	=> __( 'Enable email share icon ?', 'agama-pro' ),
		'section'		=> 'agama_share_icons_section',
		'settings'		=> 'agama_share_email',
		'type'			=> 'switch',
		'default'		=> true
	) );
#######################################################
# WOOCOMMERCE
#######################################################
	Kirki::add_panel( 'agama_woocommerce_panel', array(
		'title'			=> __( 'WooCommerce', 'agama-pro' ),
		'priority'		=> 150
	) );
	Kirki::add_section( 'agama_woocommerce_general_section', array(
		'title'			=> __( 'WooCommerce General', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_woocommerce_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			   => __( 'Cart Icon', 'agama-pro' ),
		'tooltip'          => __( 'Enable WooCommerce cart icon in header primary navigation.', 'agama-pro' ),
		'section'		   => 'agama_woocommerce_general_section',
		'settings'		   => 'agama_header_cart_icon',
		'type'			   => 'switch',
		'default'		   => true,
        'partial_refresh'  => array(
            'agama_header_cart_icon' => array(
                'selector'        => '.vision-custom-menu-item.vision-main-menu-cart',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_wc_cart_icon' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Shop Columns', 'agama-pro' ),
		'tooltip'	=> __( 'Select shop columns.', 'agama-pro' ),
		'section'		=> 'agama_woocommerce_general_section',
		'settings'		=> 'agama_shop_columns',
		'type'			=> 'select',
		'choices'		=> array(
			'2'			=> __( '2 Columns', 'agama-pro' ),
			'3'			=> __( '3 Columns', 'agama-pro' ),
			'4'			=> __( '4 Columns', 'agama-pro' )
		),
		'default'		=> '3'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Products  Filter', 'agama-pro' ),
		'tooltip'	=> __( 'Enable products filter ?', 'agama-pro' ),
		'section'		=> 'agama_woocommerce_general_section',
		'settings'		=> 'agama_products_filter',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Products per Page', 'agama-pro' ),
		'tooltip'	=> __( 'Set products per page.', 'agama-pro' ),
		'section'		=> 'agama_woocommerce_general_section',
		'settings'		=> 'agama_products_per_page',
		'type'			=> 'select',
		'choices'		=> array(
			'12'		=> '12',
			'24'		=> '24',
			'36'		=> '36'
		),
		'default'		=> '12'
	) );
#######################################################
# CONTACT PAGE
#######################################################
	Kirki::add_section( 'agama_contact_section', array(
		'title'			=> __( 'Contact', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 160
	) );
    Kirki::add_field( 'agama_options', array(
        'label'           => __( 'Title', 'agama-pro' ),
        'tooltip'         => __( 'Set contact page form custom title.', 'agama-pro' ),
        'section'         => 'agama_contact_section',
        'settings'        => 'agama_contact_title',
        'type'            => 'text',
        'default'         => __( 'Send us an Email', 'agama-pro' ),
        'partial_refresh' => array(
            'agama_contact_title' => array(
                'selector'        => '.page-template-contact .fancy-title.title-dotted-border',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_contact_title' )
            )
        )
    ) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'reCaptcha Site Key', 'agama-pro' ),
		'tooltip'	    => sprintf( '%s <a href="%s" target="_blank">%s</a>', __( 'Get reCaptcha keys', 'agama-pro' ), esc_url( 'https://www.google.com/recaptcha/admin' ), __( 'here', 'agama-pro' ) ),
		'section'		=> 'agama_contact_section',
		'settings'		=> 'agama_contact_recaptcha_public',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'reCaptcha Secret Key', 'agama-pro' ),
		'tooltip'	=> sprintf( '%s <a href="%s" target="_blank">%s</a>', __( 'Get reCaptcha keys', 'agama-pro' ), esc_url( 'https://www.google.com/recaptcha/admin' ), __( 'here', 'agama-pro' ) ),
		'section'		=> 'agama_contact_section',
		'settings'		=> 'agama_contact_recaptcha_secret',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Page Style', 'agama-pro' ),
		'tooltip'	=> __( 'Select contact page style.', 'agama-pro' ),
		'section'		=> 'agama_contact_section',
		'settings'		=> 'agama_contact_style',
		'type'			=> 'select',
		'choices'		=> array(
			'style_1'	=> __( 'Style 1', 'agama-pro' )
		),
		'default'		=> 'style_1'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Map API Key', 'agama-pro' ),
		'tooltip'	=> sprintf( '%s <a href="%s" target="_blank">%s</a>.', __( 'Create your own API key', 'agama-pro' ), esc_url( 'https://console.developers.google.com/flows/enableapi?apiid=maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend,places_backend&reusekey=true' ), __( 'here', 'agama-pro' ) ),
		'section'		=> 'agama_contact_section',
		'settings'		=> 'agama_contact_map_api',
		'type'			=> 'text',
		'default'		=> 'AIzaSyDHJua6agj_4ZkTQwMwNgD3fo-svqXlN8Q'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Map Type', 'agama-pro' ),
		'tooltip'	=> __( 'Select map type.', 'agama-pro' ),
		'section'		=> 'agama_contact_section',
		'settings'		=> 'agama_contact_map_type',
		'type'			=> 'select',
		'choices'		=> array(
			'roadmap' 	=> __( 'Roadmap', 'agama-pro' ),
			'satellite'	=> __( 'Satellite', 'agama-pro' ),
			'hybrid'	=> __( 'Hybrid', 'agama-pro' ),
			'terrain'	=> __( 'Terrain', 'agama-pro' )
		),
		'default'		=> 'roadmap'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'E-mail', 'agama-pro' ),
		'tooltip'	      => __( 'Enter your email address.', 'agama-pro' ),
		'section'		  => 'agama_contact_section',
		'settings'		  => 'agama_contact_email',
		'type'			  => 'text',
		'default'		  => get_option('admin_email'),
        'partial_refresh' => array(
            'agama_contact_email' => array(
                'selector'        => '.page-template-contact .vision-contact-email',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_contact_email' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Phone Number', 'agama-pro' ),
		'tooltip'	      => __( 'Enter your phone number.', 'agama-pro' ),
		'section'		  => 'agama_contact_section',
		'settings'		  => 'agama_contact_phone',
		'type'			  => 'text',
		'default'		  => '',
        'partial_refresh' => array(
            'agama_contact_phone' => array(
                'selector'        => '.page-template-contact .vision-contact-phone',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_contact_phone' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Fax Number', 'agama-pro' ),
		'tooltip'	      => __( 'Enter your fax number.', 'agama-pro' ),
		'section'		  => 'agama_contact_section',
		'settings'		  => 'agama_contact_fax',
		'type'			  => 'text',
		'default'		  => '',
        'partial_refresh' => array(
            'agama_contact_fax' => array(
                'selector'        => '.page-template-contact .vision-contact-fax',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_contact_fax' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Country / City', 'agama-pro' ),
		'tooltip'	    => __( 'Enter your company country & city. Separated by (,) comma.', 'agama-pro' ),
		'section'		=> 'agama_contact_section',
		'settings'		=> 'agama_contact_country',
		'type'			=> 'text',
		'default'		=> 'Australia, Melbourn',
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Address', 'agama-pro' ),
		'tooltip'	      => __( 'Enter your address.', 'agama-pro' ),
		'section'		  => 'agama_contact_section',
		'settings'		  => 'agama_contact_address',
		'type'			  => 'editor',
		'default'		  => '',
        'partial_refresh' => array(
            'agama_contact_address' => array(
                'selector'          => '.page-template-contact .vision-contact-address',
                'render_callback'   => array( 'Agama_Partial_Refresh', 'preview_contact_address' )
            )
        )
	) );
    Kirki::add_field( 'agama_options', array(
        'label'           => __( 'Submit Button Text', 'agama-pro' ),
        'tooltip'         => __( 'Set submit button custom text.', 'agama-pro' ),
        'section'         => 'agama_contact_section',
        'settings'        => 'agama_contact_btn_txt',
        'type'            => 'text',
        'default'         => __( 'Send Message', 'agama-pro' ),
        'partial_refresh' => array(
            'agama_contact_btn_txt' => array(
                'selector'        => '.page-template-contact .vision-contact-submit',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_contact_submit' )
            )
        )
    ) );
##################################################
# FOOTER
##################################################
	Kirki::add_panel( 'agama_footer_panel', array(
		'title'			=> __( 'Footer', 'agama-pro' ),
		'priority'		=> 170
	) );
	##########################################################
	# FOOTER GENERAL SECTION
	##########################################################
	Kirki::add_section( 'agama_footer_general_section', array(
		'title'			=> __( 'General', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_footer_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			  => __( 'Social Icons', 'agama-pro' ),
		'tooltip'	      => __( 'Enable social icons on footer right area.', 'agama-pro' ),
		'section'		  => 'agama_footer_general_section',
		'settings'		  => 'agama_footer_social',
		'type'			  => 'switch',
		'default'		  => true,
        'partial_refresh' => array(
            'agama_footer_social' => array(
                'selector'         => '.footer-sub-wrapper .social',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_footer_social_icons' )
            )
        )
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			    => __( 'Copyright', 'agama-pro' ),
		'tooltip'	        => __( 'Add custom footer copyright.', 'agama-pro' ),
		'section'		    => 'agama_footer_general_section',
		'settings'		    => 'agama_footer_copyright',
		'type'			    => 'editor',
		'default'		    => '2015 - 2017 &copy; Powered by <a href="http://www.theme-vision.com" target="_blank">Theme-Vision</a>',
        'partial_refresh'   => array(
            'agama_footer_copyright' => array(
                'selector'        => '.footer-sub-wrapper .site-info',
                'render_callback' => array( 'Agama_Partial_Refresh', 'preview_footer_copyright' )
            )
        )
	) );
	##########################################################
	# FOOTER STYLING SECTION
	##########################################################
	Kirki::add_section( 'agama_footer_styling_section', array(
		'title'			=> __( 'Styling', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_footer_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Widget Area BG Color', 'agama-pro' ),
		'tooltip'		=> __( 'Select widget area background color.', 'agama-pro' ),
		'section'			=> 'agama_footer_styling_section',
		'settings'			=> 'agama_footer_widget_bg_color',
		'type'				=> 'color',
        'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'  => '.footer-widgets',
				'property' => 'background-color'
			)
		),
		'default'			=> '#314150'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Copyright Area BG Color', 'agama-pro' ),
		'tooltip'		=> __( 'Copyright area background color.', 'agama-pro' ),
		'section'			=> 'agama_footer_styling_section',
		'settings'			=> 'agama_footer_bottom_bg_color',
		'type'				=> 'color',
        'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'  => 'footer[role=contentinfo]',
				'property' => 'background-color'
			)
		),
		'default'			=> '#293744'
	) );
    Kirki::add_field( 'agama_options', array(
        'label'             => __( 'Footer Background Image', 'agama-pro' ),
        'tooltip'       => __( 'Set footer custom bacground image.', 'agama-pro' ),
        'section'           => 'agama_footer_styling_section',
        'settings'          => 'agama_footer_bg_image',
        'type'              => 'upload',
        'default'           => '',
        'output'            => array(
            array( 
                'element'   => '#footer-wrapper',
                'property'  => 'background-image'
            )
        )
    ) );
    Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Background Image Repeat', 'agama-pro' ),
		'tooltip'		=> __( 'Header background image repeat.', 'agama-pro' ),
		'section'			=> 'agama_footer_styling_section',
		'settings'			=> 'agama_footer_bg_image_repeat',
		'type'				=> 'select',
		'choices'			=> array(
			'no-repeat'		=> __( 'No Repeat', 'agama-pro' ),
			'repeat'		=> __( 'Repeat All', 'agama-pro' ),
			'repeat-x'		=> __( 'Repeat Horizontally', 'agama-pro' ),
			'repeat-y'		=> __( 'Repeat Vertically', 'agama-pro' ),
			'inherit'		=> __( 'Inherit', 'agama-pro' )
		),
        'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> '#footer-wrapper',
				'property'	=> 'background-repeat'
			)
		),
		'default'			=> 'no-repeat'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Background Image Size', 'agama-pro' ),
		'tooltip'		=> __( 'Header background image size.', 'agama-pro' ),
		'section'			=> 'agama_footer_styling_section',
		'settings'			=> 'agama_footer_bg_image_size',
		'type'				=> 'select',
		'choices'			=> array(
			'inherit'		=> __( 'Inherit', 'agama-pro' ),
			'cover'			=> __( 'Cover', 'agama-pro' ),
			'contain'		=> __( 'Contain', 'agama-pro' ),
		),
        'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> '#footer-wrapper',
				'property'	=> 'background-size'
			)
		),
		'default'			=> 'inherit'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Background Image Attachment', 'agama-pro' ),
		'tooltip'		=> __( 'Header background image attachment.', 'agama-pro' ),
		'section'			=> 'agama_footer_styling_section',
		'settings'			=> 'agama_footer_bg_image_attachment',
		'type'				=> 'select',
		'choices'			=> array(
			'fixed'			=> __( 'Fixed', 'agama-pro' ),
			'scroll'		=> __( 'Scroll', 'agama-pro' ),
			'inherit'		=> __( 'Inherit', 'agama-pro' ),
		),
        'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> '#footer-wrapper',
				'property'	=> 'background-attachment'
			)
		),
		'default'			=> 'inherit'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Background Image Position', 'agama-pro' ),
		'tooltip'		=> __( 'Header background image position.', 'agama-pro' ),
		'section'			=> 'agama_footer_styling_section',
		'settings'			=> 'agama_footer_bg_image_position',
		'type'				=> 'select',
		'choices'			=> array(
			'left top'		=> __( 'Left Top', 'agama-pro' ),
			'left center'	=> __( 'Left Center', 'agama-pro' ),
			'left bottom'	=> __( 'Left Bottom', 'agama-pro' ),
			'center top'	=> __( 'Center Top', 'agama-pro' ),
			'center center'	=> __( 'Center Center', 'agama-pro' ),
			'center bottom'	=> __( 'Center Bottom', 'agama-pro' ),
			'right top'		=> __( 'Right Top', 'agama-pro' ),
			'right center'	=> __( 'Right Center', 'agama-pro' ),
			'right bottom'	=> __( 'Right Bottom', 'agama-pro' ),
		),
        'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> '#footer-wrapper',
				'property'	=> 'background-position'
			)
		),
		'default'			=> 'inherit'
	) );
	#############################################################
	# FOOTER TYPOGRAPHY SECTION
	#############################################################
	Kirki::add_section( 'agama_footer_typography_section', array(
		'title'			=> __( 'Typography', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_footer_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Widgets Heading Font', 'agama-pro' ),
		'tooltip'		=> __( 'Select widgets heading font style.', 'agama-pro' ),
		'section'			=> 'agama_footer_typography_section',
		'settings'			=> 'agama_footer_widgets_heading_font',
		'type'				=> 'typography',
		'output'			=> array(
			array(
				'element'	=> '.footer-widgets .widget h3'
			)
		),
		'default'			=> array(
			'font-family'	=> 'Raleway',
			'variant'		=> '600',
			'font-size'		=> '15px',
			'color'			=> '#fff'
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Widgets Body Font', 'agama-pro' ),
		'tooltip'		=> __( 'Select widgets body font style.', 'agama-pro' ),
		'section'			=> 'agama_footer_typography_section',
		'settings'			=> 'agama_footer_widgets_body_font',
		'type'				=> 'typography',
		'output'			=> array(
			array(
				'element'	=> '.footer-widgets .widget, .footer-widgets .widget ul li a'
			)
		),
		'default'			=> array(
			'font-family'	=> 'Montserrat Alternates',
			'variant'		=> '400',
			'font-size'		=> '12px',
			'color'			=> '#cddeee'
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Widgets Body Links Hover', 'agama-pro' ),
		'tooltip'		=> __( 'Select widgets body links hover color.', 'agama-pro' ),
		'section'			=> 'agama_footer_typography_section',
		'settings'			=> 'agama_footer_widgets_body_font_hover',
		'type'				=> 'typography',
		'output'			=> array(
			array(
				'element'	=> '.footer-widgets .widget ul li a:hover'
			)
		),
		'default'			=> array(
			'color'			=> '#fff'
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Footer Copyright Font', 'agama-pro' ),
		'tooltip'	=> __( 'Customize footer copyright area font style.', 'agama-pro' ),
		'section'		=> 'agama_footer_typography_section',
		'settings'		=> 'agama_footer_font',
		'type'			=> 'typography',
		'output'		=> array(
			array(
				'element'	=> 'footer .site-info'
			)
		),
		'default'		=> array(
			'font-family'	=> 'Lato',
			'variant'		=> '400',
			'font-size'		=> '12px'
		)
	) );
###################################################
# WordPress Options
###################################################
	Kirki::add_panel( 'title_tagline_panel', array(
		'title'			=> __( 'Site Identity', 'agama-pro' ),
		'priority'		=> 1
	) );
	###########################################
	# TITLE TAGLINE SECTION
	###########################################
	Kirki::add_section( 'title_tagline', array( 
		'title'			=> __( 'General', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'title_tagline_panel'
	) );
	###################################################
	# TITLE TAGLINE STYLING SECTION
	###################################################
	Kirki::add_section( 'title_tagline_styling', array( 
		'title'			=> __( 'Styling', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'title_tagline_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Site Title Color', 'agama-pro' ),
		'tooltip'		=> __( 'Select site title color.', 'agama-pro' ),
		'section'			=> 'title_tagline_styling',
		'settings'			=> 'agama_header_logo_color',
		'type'				=> 'color',
        'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> '#masthead .site-title a',
				'property'	=> 'color'
			)
		),
		'default'			=> '#515151'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'				=> __( 'Site Title Hover Color', 'agama-pro' ),
		'tooltip'		    => __( 'Select site title hover color.', 'agama-pro' ),
		'section'			=> 'title_tagline_styling',
		'settings'			=> 'agama_header_logo_hover_color',
		'type'				=> 'color',
        'transport'			=> 'auto',
		'output'			=> array(
			array(
				'element'	=> '#masthead .site-title a:hover',
				'property'	=> 'color'
			)
		),
		'default'			=> '#333'
	) );
	################################################
	# TITLE TAGLINE TYPOGRAPHY SECTION
	################################################
	Kirki::add_section( 'title_tagline_typo', array(
		'title'			=> __( 'Typography', 'agama-pro' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'title_tagline_panel'
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Site Title Font', 'agama-pro' ),
		'tooltip'	    => __( 'Select site title font.', 'agama-pro' ),
		'section'		=> 'title_tagline_typo',
		'settings'		=> 'agama_logo_font',
		'type'			=> 'typography',
		'default'			=> array(
			'font-family' 	=> 'Crete Round',
			'font-size'		=> '35px'
		),
        'output'			=> array(
			array(
				'element' 	=> '#masthead .site-title a'
			)
		)
	) );
	Kirki::add_field( 'agama_options', array(
		'label'			=> __( 'Site Title Shrinked', 'agama-pro' ),
		'tooltip'	    => __( 'Select header shrinked site title font size.', 'agama-pro' ),
		'section'		=> 'title_tagline_typo',
		'settings'		=> 'agama_logo_shrink_font',
		'type'			=> 'typography',
		'output'		=> array(
			array(
				'element' => '#masthead .sticky-header-shrink .site-title a'
			)
		),
		'default'		=> array(
			'font-size'	=> '28px'
		)
	) );
	###############################################
	# WIDGETS PANEL
	###############################################
	Kirki::add_panel( 'widgets', array(
		'title'			=> __( 'Widgets', 'agama-pro' ),
		'priority'		=> 150
	) );

/**
 * Define Customizer Settings, Controls etc...
 *
 * @since Agama 1.0
 */
function agama_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('static_front_page');
}
add_action( 'customize_register', 'agama_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Agama 1.0
 */
function agama_customize_preview_js() {
	wp_register_script( 'agama-customizer', get_template_directory_uri() . '/assets/js/theme-customizer.js', array( 'customize-preview' ), uniqid(), true );
	$localize = array(
		'skin_url' 			=> get_stylesheet_directory_uri() . '/assets/css/skins/',
		'top_nav_enable'	=> esc_attr( get_theme_mod( 'agama_top_navigation', true ) )
	);
	wp_localize_script( 'agama-customizer', 'agama-pro', $localize );
	wp_enqueue_script( 'agama-customizer' );
    
    wp_register_style( 'agama-partial-refresh', get_template_directory_uri() . '/assets/css/partial-refresh.css', array(), uniqid() );
    wp_enqueue_style( 'agama-partial-refresh' );
}
add_action( 'customize_preview_init', 'agama_customize_preview_js' );

/**
 * Agama Upgrade to PRO
 *
 * @since 1.2.0
 */
function agama_pro_customizer() {
	wp_register_script( 'agama_customizer_script', AGAMA_JS . 'agama-customizer.js', array('jquery'), uniqid(), true );
    wp_enqueue_script( 'agama_customizer_script' );
    wp_localize_script( 'agama_customizer_script', 'themevision', array(
        'wikiURL'   => esc_url( 'http://docs.theme-vision.com' ),
        'wikiLabel' => __( 'Documentation', 'agama-pro' ),
		'supportURL' => esc_url( 'https://theme-vision.com/support/' ),
		'supportLabel' => __( 'Theme Support', 'agama-pro' )
    ) );
}
add_action( 'customize_controls_enqueue_scripts', 'agama_pro_customizer' );

/**
 * Generating Dynamic CSS
 *
 * @since Agama 1.0
 */
function agama_customize_css() { ?>
	<style type="text/css" id="agama-customize-css">
    <?php
    Agama_Helper::generate_logo_align_css();
    Agama_Helper::generate_vision_row_css();
    Agama_Helper::generate_layout_width_css(); 
    Agama_Helper::generate_404_page_css(); ?>

	<?php if( is_page_template( 'page-templates/full-width.php' ) ): ?>
	body .site { padding: 0 !important; }
	body .site,
	.vision-row { max-width: 100% !important; }
	<?php endif; ?>

	<?php if( get_theme_mod( 'agama_header_style', 'v3' ) == 'v2' && get_theme_mod( 'agama_header_transparent', false ) ): ?>
	.header_transparent header.header_v2 .sticky-header:not(.sticky-header-shrink) { background: transparent; border-top-color: transparent; position: fixed; box-shadow: none; -moz-box-shadow: none; -webkit-box-shadow: none; border-bottom: 2px solid rgba(255,255,255, .1); }
	<?php endif; ?>

	.comment-content .comment-author cite {
		background-color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
		border: 1px solid <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
	}

	<?php if( is_rtl() ): ?>
	blockquote {
		border-right: 3px solid <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
	}
	<?php else: ?>
	blockquote {
		border-left: 3px solid <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
	}
	<?php endif; ?>
        
    <?php 
    #####################################################################################
    # AGAMA SLIDER BUTTONS STYLE
    #####################################################################################
    Agama_Helper::generate_slider_btns_css(); ?>
	
	<?php if( ! get_theme_mod( 'agama_blog_date', true ) && get_theme_mod( 'agama_blog_layout', 'list' ) == 'list' ): ?>
	.list-style .entry-content { margin-left: 0 !important; }
	<?php endif; ?>

	<?php if( get_theme_mod( 'agama_blog_infinite_scroll', false ) && get_theme_mod( 'agama_blog_layout', 'list' ) == 'grid' ): ?>
	#infscr-loading {
		position: absolute;
		bottom: 0;
		left: 25%;
	}
	<?php endif; ?>

	.vision_tabs #tabs li.active a {
		border-top: 3px solid <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
	}

	<?php if( class_exists( 'Woocommerce' ) ): ?>
	.vision-main-menu-cart .cart_count:before,
	#agama_wc_cart .cart_count:before {
		border-color: transparent <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?> transparent;
	}
	<?php endif; ?>

	<?php if( get_theme_mod( 'agama_sidebar_position', 'right' ) == 'left' ): // 2 Column Left ?>
		#primary { float: right; }
		#vision-pagination, #infinite-loadmore { float: right; }
	<?php endif; ?>


	<?php if( is_page_template( 'page-templates/contact.php' ) ): ?>
	/* Contact Page
	 *-----------------------------------------------------------------------*/
	 .vision-row { max-width: 100% !important; }
	<?php endif; ?>
    <?php if( get_theme_mod( 'agama_footer_bg_image', '' ) !== '' ): ?>
        .footer-widgets, footer[role=contentinfo] {
            background-color: transparent;
        }
    <?php endif; ?>
	</style>
	<?php
}
add_action( 'wp_head', 'agama_customize_css' );

/**
 * Styling Agama Support Section
 *
 * @since 1.0.7
 */
function customize_styles_agama_support( $input ) { ?>
	<style type="text/css">
		a:-webkit-any-link {
			text-decoration: none;
		}
        li.accordion-section.control-section.control-panel.control-panel-default h3:before,
        li.accordion-section.control-section.control-section-kirki-default h3:before {
            font-family: FontAwesome;
        }
        #accordion-panel-title_tagline_panel h3:before {
            content: '\f2ba';
        }
        #accordion-panel-agama_general_panel h3:before {
            content: '\f085';
        }
        #accordion-panel-agama_header_panel h3:before {
            content: '\f1dc';
        }
        #accordion-panel-agama_navigations_panel h3:before {
            content: '\f0c9';
        }
        #accordion-panel-agama_layout_panel h3:before {
            content: '\f0db';
        }
        #accordion-panel-agama_slider_panel h3:before {
            content: '\f1de';
        }
        #accordion-panel-nav_menus h3:before {
            content: '\f0c9';
        }
        #accordion-panel-agama_breadcrumb_panel h3:before {
            content: '\f09d';
        }
        #accordion-panel-agama_frontpage_boxes_panel h3:before {
            content: '\f009';
        }
        #accordion-panel-agama_blog_panel h3:before {
            content: '\f1ad';
        }
        #accordion-section-agama_portfolio_section h3:before {
            content: '\f00a';
        }
        #accordion-section-agama_social_icons_section h3:before {
            content: '\f230';
        }
        #accordion-section-agama_share_icons_section h3:before {
            content: '\f1e0';
        }
        #accordion-panel-agama_woocommerce_panel h3:before {
            content: '\f291';
        }
        #accordion-panel-widgets h3:before {
            content: '\f0ca';
        }
        #accordion-section-agama_contact_section h3:before {
            content: '\f1d9';
        }
        #accordion-panel-agama_footer_panel h3:before {
            content: '\f2d1';
        }
		#customize-theme-controls #accordion-section-agama_support_section .accordion-section-title:after {
			color: #fff;
		}
		#customize-theme-controls #accordion-section-agama_support_section .accordion-section-title {
			background-color: rgba(247, 168, 5, 0.9);
			color: #fff;
		}
		#customize-theme-controls #accordion-section-agama_support_section .accordion-section-title:hover {
			background-color: rgba(247, 168, 5, 1);
		}
		#customize-theme-controls #accordion-section-agama_support_section .theme-info a {
			padding: 10px 8px;
			display: block;
			border-bottom: 1px solid #eee;
			color: #555;
		}
		#customize-theme-controls #accordion-section-agama_support_section .theme-info a:hover {
			color: #222;
			background-color: #f5f5f5;
		}
		.theme-headers label > input[type="radio"] {
		  display: none;
		}
		.theme-headers label > input[type="radio"] + img{
		  cursor: pointer;
		  border: 2px solid transparent;
		}
		.theme-headers label > input[type="radio"]:checked + img{
		  border: 2px solid #f00;
		}
	</style>
<?php }
add_action( 'customize_controls_print_styles', 'customize_styles_agama_support');
