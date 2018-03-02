jQuery.noConflict();

jQuery(document).ready(function($){

    "use strict";
    
	$('body').on('added_to_cart', shopping_cart_dropdown_show);
	
	$('body').on('click', '.custom_cart_button .add_to_cart_button', function(){
		var product = $(this).parents('.product:eq(0)').addClass('adding_to_cart_working').removeClass('adding_to_cart_completed');
	});

	$('body').bind('added_to_cart', function(){
		$('.adding_to_cart_working').removeClass('adding_to_cart_working').addClass('adding_to_cart_completed');
	});
	
	var timeout;

	var productToAdd;

	// Notification
	$('body').on('click','.custom_cart_button .add_to_cart_button', function(){
		productToAdd = $(this).parents('li').find('h2').text();
		$('#masthead .cart-notification span.item-name').html(productToAdd);
	});
	
	/**
	 * Shopping Cart Dropdown
	 *
	 * @since 1.2.0
	 */
	function shopping_cart_dropdown_show(e) {
		clearTimeout(timeout);
        
		if( $('.agama-shopping-cart-dropdown .cart_list .empty').length && $('.agama-shopping-cart-content .cart_list').length > 0 && typeof e.type !== 'undefined' ) {
            
			//before cart has slide in
			if($('#masthead .cart-notification').is(':visible')) {
				$('#masthead .cart-notification').fadeIn(400);				
				$('#masthead .cart-notification').addClass('notification_on');
			} else {
				$('#masthead .cart-notification').fadeIn(400);				
				$('#masthead .cart-notification').addClass('notification_on');
			}
			
			timeout = setTimeout(hideCart,2700);

			$('.cart-menu a, .widget_shopping_cart a').addClass('no-ajaxy');
		}
	}
	
	/**
	 * Hide Cart
	 *
	 * @since 1.2.0
	 */
	function hideCart() {
		$('#masthead .cart-notification').removeClass('notification_on');
		$('#masthead .cart-notification').stop(true,true).fadeOut();
	}
    
    /* CUSTOM jQuery Styling ------------------------------------------------------------------------>
     *************************************************************************************************/
	
	// WooCommerce Page
	$('body.woocommerce-page div.woocommerce').addClass('clear');
	
	// Price slider widget
	$('.price_slider_amount button').addClass('button-3d button-mini button-rounded');
	
	// Wrap update cart button with div wrappers | Cart Page
	$('input[name=update_cart]').wrap('<div class="update_cart"></div>');
	
	// Add 'button-black' class to calculate shipping 'update totals' button | Cart Page
	$('.woocommerce-shipping-calculator button[type=submit]').addClass('button-black');
	
	// Checkout button add 'button-border' class | Cart Page
	$('.woocommerce-cart .wc-proceed-to-checkout .checkout-button').addClass('button-linear');
	$('.woocommerce-cart .wc-proceed-to-checkout .checkout-button').append(' <i class="fa fa-long-arrow-right"></i>');
	
	// Single product add to cart button
	$('.single-product .single_add_to_cart_button').prepend('<i class="fa fa-shopping-basket"></i>');
	$('.single-product .single_add_to_cart_button').addClass('button-liner');
	$('.single-product .single_add_to_cart_button').css('opacity', '1');
	
	// Single product 'Additional Information' tab
	$('#tab-additional_information .shop_attributes').addClass('table table-striped table-bordered');
	
	// Single product 'Reviews' tab
	$('#review_form .form-submit input[type=submit]').addClass('button');
	
	// Checkout page, "Place Order" button
	setTimeout( function() {
		$('.place-order #place_order').addClass('button-3d');
	}, 1500 );
	
	// My Account Page
	$('.shop_table.shop_table_responsive.my_account_orders td.order-actions a').addClass('button-mini button-border').css('line-height', '0');
	
	// Products Widget
	$('.widget.woocommerce.widget_products').addClass('clear');
	
	// WooCommerce cart page buttons
	$('.woocommerce-cart .button.wc-backward').addClass('button-3d button-mini button-rounded');
});