<?php 

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Body Background Animation Class
 *
 * @since 1.1.1
 * @updated @since 1.3.8
 */
class Agama_Body_Background_Animation {
	
	/**
	 * Is Animation Enabled ?
	 *
	 * @since 1.3.8
	 */
	private $enabled;
	
	/**
	 * Contain Pages ID's
	 *
	 * @since 1.3.8
	 */
	private $page_id;
	
	/** 
	 * By Default the Image Is not Set
	 *
	 * @since 1.3.8
	 */
	private $image = false;
	
	/**
	 * Contains First Image URL
	 *
	 * @since 1.3.8
	 */
	private $first_image;
	
	/**
	 * Contains Second Image URL
	 *
	 * @since 1.3.8
	 */
	private $second_image;
	
	/**
	 * Contains Third Image URL
	 *
	 * @since 1.3.8
	 */
	private $third_image;
	
	/**
	 * Animation Delay
	 *
	 * @since 1.3.8
	 */
	private $delay;
	
	/**
	 * The one, true instance of this object.
	 *
	 * @static
	 * @since 1.3.8
	 * @access private
	 * @var null|object
	 */
	private static $instance = null;
	
	/**
	 * Class Constructor
	 *
	 * @since 1.3.8
	 */
	function __construct() {
		
		$this->enabled		= esc_attr( get_theme_mod( 'agama_body_animate', false ) );
		$this->first_image 	= esc_url( get_theme_mod( 'agama_body_animate_image_1', false ) );
		$this->second_image	= esc_url( get_theme_mod( 'agama_body_animate_image_2', false ) );
		$this->third_image	= esc_url( get_theme_mod( 'agama_body_animate_image_3', false ) );
		$this->delay		= esc_attr( get_theme_mod( 'agama_body_animate_delay', '6000' ) );
		
		// If image is set.
		if( ! empty( $this->first_image ) || ! empty( $this->second_image ) || ! empty( $this->third_image ) ) {
			$this->image = true;
		}
		
		// Enqueue script in <head></head> section.
		if( $this->enabled && $this->image ) {
			add_action( 'wp_head', array( $this, 'init' ) );
		}
	}
	
	/**
	 * Get a unique instance of this object.
	 *
	 * @since 1.3.8
	 * @return object
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new Agama_Body_Background_Animation();
		}
		return self::$instance;
	}
	
	/**
	 * Class Initialization
	 *
	 * @since 1.3.8
	 */
	public function init() {
			$this->jQuery(); 
	}
	
	/**
	 * jQuery
	 *
	 * @since 1.3.8
	 */
	private function jQuery() { ?>
		<script>
		jQuery(document).ready(function($) {
			"use strict";

			// Methods/polyfills.
			// classList | (c) @remy | github.com/remy/polyfills | rem.mit-license.org
			!function(){function t(t){this.el=t;for(var n=t.className.replace(/^\s+|\s+$/g,"").split(/\s+/),i=0;i<n.length;i++)e.call(this,n[i])}function n(t,n,i){Object.defineProperty?Object.defineProperty(t,n,{get:i}):t.__defineGetter__(n,i)}if(!("undefined"==typeof window.Element||"classList"in document.documentElement)){var i=Array.prototype,e=i.push,s=i.splice,o=i.join;t.prototype={add:function(t){this.contains(t)||(e.call(this,t),this.el.className=this.toString())},contains:function(t){return-1!=this.el.className.indexOf(t)},item:function(t){return this[t]||null},remove:function(t){if(this.contains(t)){for(var n=0;n<this.length&&this[n]!=t;n++);s.call(this,n,1),this.el.className=this.toString()}},toString:function(){return o.call(this," ")},toggle:function(t){return this.contains(t)?this.remove(t):this.add(t),this.contains(t)}},window.DOMTokenList=t,n(Element.prototype,"classList",function(){return new t(this)})}}();

			// canUse
			window.canUse=function(p){if(!window._canUse)window._canUse=document.createElement("div");var e=window._canUse.style,up=p.charAt(0).toUpperCase()+p.slice(1);return p in e||"Moz"+up in e||"Webkit"+up in e||"O"+up in e||"ms"+up in e};

			// window.addEventListener
			(function(){if("addEventListener"in window)return;window.addEventListener=function(type,f){window.attachEvent("on"+type,f)}})();

			// Vars.
			var	$body = document.querySelector('body');

			// Disable animations/transitions until everything's loaded.
			$body.classList.add('is-loading');

			window.addEventListener('load', function() {
				window.setTimeout(function() {
					$body.classList.remove('is-loading');
				}, 100);
			});

			// Slideshow Background.
			(function() {

				// Settings.
				var settings = {
					// Images (in the format of 'url': 'alignment').
					images: {
						<?php if( $this->first_image ): ?>
							'<?php echo $this->first_image; ?>':'center',
						<?php endif; ?>
						<?php if( $this->second_image ): ?>
							'<?php echo $this->second_image; ?>':'center',
						<?php endif; ?>
						<?php if( $this->third_image ): ?>
							'<?php echo $this->third_image; ?>':'center',
						<?php endif; ?>
					},
					// Delay.
					delay: <?php echo $this->delay; ?>
				};

				// Vars.
				var	pos = 0, lastPos = 0,
				$wrapper, $bgs = [], $bg,
				k, v;

				// Create BG wrapper, BGs.
				$wrapper = document.createElement('div');
				$wrapper.id = 'agama_background_animated';
				$body.appendChild($wrapper);

				for (k in settings.images) {
					// Create BG.
					$bg = document.createElement('div');
					$bg.style.backgroundImage = 'url("' + k + '")';
					$bg.style.backgroundPosition = settings.images[k];
					$wrapper.appendChild($bg);

					// Add it to array.
					$bgs.push($bg);
				}

				// Main loop.
				$bgs[pos].classList.add('visible');
				$bgs[pos].classList.add('top');

				// Bail if we only have a single BG or the client doesn't support transitions.
				if ($bgs.length == 1
				||	!canUse('transition'))
					return;

				window.setInterval(function() {

					lastPos = pos;
					pos++;

					// Wrap to beginning if necessary.
					if (pos >= $bgs.length)
						pos = 0;

					// Swap top images.
					$bgs[lastPos].classList.remove('top');
					$bgs[pos].classList.add('visible');
					$bgs[pos].classList.add('top');

					// Hide last image after a short delay.
					window.setTimeout(function() {
						$bgs[lastPos].classList.remove('visible');
					}, settings.delay / 2);

				}, settings.delay);
			})();
		});
		</script>
	<?php 
	}
}

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
