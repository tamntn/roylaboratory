/**
 * cbpFWTabs.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2014, Codrops
 * http://www.codrops.com
 */
;( function( window ) {
	
	'use strict';

	function extend( a, b ) {
		for( var key in b ) { 
			if( b.hasOwnProperty( key ) ) {
				a[key] = b[key];
			}
		}
		return a;
	}

	function CBPFWTabs( el, options ) {
		this.el = el;
		this.options = extend( {}, this.options );
  		extend( this.options, options );
  		this._init();
	}

	CBPFWTabs.prototype.options = {
		start : 0
	};

	CBPFWTabs.prototype._init = function() {
		// tabs elems
		this.tabs = [].slice.call( this.el.querySelectorAll( 'nav > ul > li' ) );
		// content items
		this.items = [].slice.call( this.el.querySelectorAll( '.agama-content-wrap > section' ) );
		// current index
		this.current = -1;
		// show current content item
		this._show();
		// init events
		this._initEvents();
	};

	CBPFWTabs.prototype._initEvents = function() {
		var self = this;
		this.tabs.forEach( function( tab, idx ) {
			tab.addEventListener( 'click', function( ev ) {
				ev.preventDefault();
				self._show( idx );
			} );
		} );
	};

	CBPFWTabs.prototype._show = function( idx ) {
		if( this.current >= 0 ) {
			this.tabs[ this.current ].className = this.items[ this.current ].className = '';
		}
		// change current
		this.current = idx != undefined ? idx : this.options.start >= 0 && this.options.start < this.items.length ? this.options.start : 0;
		this.tabs[ this.current ].className = 'agama-tab-current';
		this.items[ this.current ].className = 'agama-content-current';
	};

	// add to global namespace
	window.CBPFWTabs = CBPFWTabs;

})( window );

// Initialize Metabox Tabs
(function() {
    [].slice.call( document.querySelectorAll( '.agama-tabs' ) ).forEach( function( el ) {
        new CBPFWTabs( el );
    });
})();

jQuery(document).ready(function ($) {
    
    /**
     * Slider Options Dropdown
     *
     * @since 1.3.8
     */
    function Slider_Options() {

        var $slider = $('#agama_enable_slider').val();

        // If slider is disabled, hide all dropdowns.
        if( $slider == 'off' ) {
            $('#agama_slider_type').hide();
            $('#agama_layer_slider').hide();
            $('#agama_revolution_slider').hide();
        } else {
            $('#agama_slider_type').fadeIn();
        }

        // If slider is turned on and agama slider selected, hide rest options.
        if( $slider == 'on' && $('#agama-slider-type-select').val() == 'agama' ) {
            $('#agama_layer_slider').hide();
            $('#agama_revolution_slider').hide();
        }

        // If slider is turned on and layer slider selected, hide rest options.
        if( $slider == 'on' && $('#agama-slider-type-select').val() == 'layer' ) {
            $('#agama_revolution_slider').hide();
        }

        // If slider is turned on and revolution slider selected, hide rest options.
        if( $slider == 'on' && $('#agama-slider-type-select').val() == 'revolution' ) {
            $('#agama_layer_slider').hide();
        }

        // Enable or disable slider on change.
        $('#agama_enable_slider').on( 'change', function() {
            if( $('#agama_enable_slider').val() == 'on' ) {
                $('#agama_slider_type').fadeIn();
                if( $('#agama-slider-type-select').val() == 'layer' ) {
                    $('#agama_layer_slider').fadeIn();
                }
                if( $('#agama-slider-type-select').val() == 'revolution' ) {
                    $('#agama_revolution_slider').fadeIn();
                }
            } else {
                $('#agama_slider_type').hide();
                $('#agama_layer_slider').hide();
                $('#agama_revolution_slider').hide();
            }
        });

        // Slider type on change.
        $('#agama-slider-type-select').on( 'change', function(){
            if( $('#agama-slider-type-select').val() == 'layer' ) {
                $('#agama_layer_slider').fadeIn();
            } else {
                $('#agama_layer_slider').hide();
            }
            if( $('#agama-slider-type-select').val() == 'revolution' ) {
                $('#agama_revolution_slider').fadeIn();
            } else {
                $('#agama_revolution_slider').hide();
            }
        });
    }
    Slider_Options();
});

jQuery(function($){

  // Set all variables to be used in scope
  var frame,
      metaBox = $('#agama_options_metabox.postbox'), // Your meta box id here
      addImgLink = metaBox.find('.agama-upload-custom-logo'),
      delImgLink = metaBox.find( '.agama-delete-custom-logo'),
      imgContainer = metaBox.find( '.agama_custom_logo_container'),
      imgIdInput = metaBox.find( '.agama-custom-logo' );
  
  // ADD IMAGE LINK
  addImgLink.on( 'click', function( event ){
    
    event.preventDefault();
    
    // If the media frame already exists, reopen it.
    if ( frame ) {
      frame.open();
      return;
    }
    
    // Create a new media frame
    frame = wp.media({
      title: 'Select or Upload Media Of Your Chosen Persuasion',
      button: {
        text: 'Use this media'
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    
    // When an image is selected in the media frame...
    frame.on( 'select', function() {
      
      // Get media attachment details from the frame state
      var attachment = frame.state().get('selection').first().toJSON();

      // Send the attachment URL to our custom image input field.
      imgContainer.append( '<img src="'+attachment.url+'" alt="" style="max-height:50px;"/>' );

      // Send the attachment id to our hidden input
      imgIdInput.val( attachment.id );

      // Hide the add image link
      addImgLink.addClass( 'hidden' );

      // Unhide the remove image link
      delImgLink.removeClass( 'hidden' );
    });

    // Finally, open the modal on click
    frame.open();
  });
  
  
  // DELETE IMAGE LINK
  delImgLink.on( 'click', function( event ){

    event.preventDefault();

    // Clear out the preview image
    imgContainer.html( '' );

    // Un-hide the add image link
    addImgLink.removeClass( 'hidden' );

    // Hide the delete image link
    delImgLink.addClass( 'hidden' );

    // Delete the image id from the hidden input
    imgIdInput.val( '' );

  });

});
