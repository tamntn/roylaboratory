var THEMEVISION = THEMEVISION || {};

(function($){
	
	"use strict";
	
	THEMEVISION.initialize = {
	
		init: function(){
			
			THEMEVISION.initialize.responsiveClasses();
            THEMEVISION.initialize.niceScroll();
			THEMEVISION.initialize.slider();
			THEMEVISION.initialize.categoryChildren();
            THEMEVISION.initialize.blogGridIsotope();
            THEMEVISION.initialize.blogInfiniteScroll();
			THEMEVISION.initialize.goToTop();
			THEMEVISION.initialize.verticalMiddle();
			THEMEVISION.initialize.lightbox();
			THEMEVISION.initialize.resizeVideos();
			THEMEVISION.initialize.imageFade();
			/*THEMEVISION.initialize.pageTransition();*/

		},
		
		responsiveClasses: function(){
			var jRes = jRespond([
				{
					label: 'smallest',
					enter: 0,
					exit: 479
				},{
					label: 'handheld',
					enter: 480,
					exit: 767
				},{
					label: 'tablet',
					enter: 768,
					exit: 991
				},{
					label: 'laptop',
					enter: 992,
					exit: 1199
				},{
					label: 'desktop',
					enter: 1200,
					exit: 10000
				}
			]);
			jRes.addFunc([
				{
					breakpoint: 'desktop',
					enter: function() { $body.addClass('device-lg'); },
					exit: function() { $body.removeClass('device-lg'); }
				},{
					breakpoint: 'laptop',
					enter: function() { $body.addClass('device-md'); },
					exit: function() { $body.removeClass('device-md'); }
				},{
					breakpoint: 'tablet',
					enter: function() { $body.addClass('device-sm'); },
					exit: function() { $body.removeClass('device-sm'); }
				},{
					breakpoint: 'handheld',
					enter: function() { $body.addClass('device-xs'); },
					exit: function() { $body.removeClass('device-xs'); }
				},{
					breakpoint: 'smallest',
					enter: function() { $body.addClass('device-xxs'); },
					exit: function() { $body.removeClass('device-xxs'); }
				}
			]);
		},
        
        /**
         * Nice Scroll
         */
        niceScroll: function() {
            if( agama_pro.niceScroll ) {
                $("html").niceScroll({
                    background: "#ddd",
                    cursorcolor: agama_pro.primary_color, // change cursor color in hex
                    cursoropacitymin: 0, // change opacity when cursor is inactive (scrollabar "hidden" state), range from 1 to 0
                    cursoropacitymax: 1, // change opacity when cursor is active (scrollabar "visible" state), range from 1 to 0
                    cursorwidth: "12px", // cursor width in pixel (you can also write "5px")
                    cursorborder: "1px solid transparent", // css definition for cursor border
                    cursorborderradius: "5px" // border radius in pixel for cursor
                });
            }
        },
		
		/**
		 * Particles
		 */
		particles: function( $circles_color, $lines_color ) {
			if( $( '#particles-js' ).hasClass( 'agama-particles' ) ) {
				particlesJS('particles-js', {
					"particles": {
					  "number": {
						"value": 80,
						"density": {
						  "enable": true,
						  "value_area": 800
						}
					  },
					  "color": {
					  "value": $circles_color
					  },
					  "shape": {
						"type": "circle",
						"stroke": {
						  "width": 0,
						  "color": $circles_color
						},
						"polygon": {
						  "nb_sides": 5
						},
						"image": {
						  "src": "img/github.svg",
						  "width": 100,
						  "height": 100
						}
					  },
					  "opacity": {
						"value": 0.5,
						"random": false,
						"anim": {
						  "enable": false,
						  "speed": 1,
						  "opacity_min": 0.1,
						  "sync": false
						}
					  },
					  "size": {
						"value": 5,
						"random": true,
						"anim": {
						  "enable": false,
						  "speed": 40,
						  "size_min": 0.1,
						  "sync": false
						}
					  },
					  "line_linked": {
						"enable": true,
						"distance": 150,
						"color": $lines_color,
						"opacity": 0.4,
						"width": 1
					  },
					  "move": {
						"enable": true,
						"speed": 6,
						"direction": "none",
						"random": false,
						"straight": false,
						"out_mode": "out",
						"attract": {
						  "enable": false,
						  "rotateX": 600,
						  "rotateY": 1200
						}
					  }
					},
					"interactivity": {
					  "detect_on": "canvas",
					  "events": {
						"onhover": {
						  "enable": true,
						  "mode": "repulse"
						},
						"onclick": {
						  "enable": false,
						  "mode": "push"
						},
						"resize": true
					  },
					  "modes": {
						"grab": {
						  "distance": 400,
						  "line_linked": {
							"opacity": 1
						  }
						},
						"bubble": {
						  "distance": 400,
						  "size": 40,
						  "duration": 2,
						  "opacity": 8,
						  "speed": 3
						},
						"repulse": {
						  "distance": 200
						},
						"push": {
						  "particles_nb": 4
						},
						"remove": {
						  "particles_nb": 2
						}
					  }
					},
					"retina_detect": true,
					"config_demo": {
					  "hide_card": false,
					  "background_color": "#b61924",
					  "background_image": "",
					  "background_position": "50% 50%",
					  "background_repeat": "no-repeat",
					  "background_size": "cover"
					}
				});
			}
		},
		
		width: function() {
			return $window.width();
		},
		
		height: function() {
			return $window.height();
		},
		
		slider: function() {
			if( agama_pro.slider == true && agama_pro.slider_img_1 !== '' ) {
				
				var $height = agama_pro.slider_height + "%";
				
				if( $height == '%' || $height == '0%' ) {
					$height = $(window).height() - $('header#masthead').height() + "px";
				}
				
				if( $slider.hasClass('camera_wrap') ) {
					$slider.camera({
						time: agama_pro.slider_time,
						height: $height,
						minHeight: '300px',
						barPosition: 'top',
						loader: agama_pro.slider_loader,
						loaderColor: agama_pro.primary_color,
						fx: 'simpleFade',
						pagination: false,
						thumbnails: false,
						transPeriod: 1000,
						overlayer: true,
						playPause: false,
						hover: false,
					});
					if( agama_pro.slider_particles == true ) {
						THEMEVISION.initialize.particles( agama_pro.slider_particles_circle_color, agama_pro.slider_particles_lines_color );
					}
				}
			}
		},

		categoryChildren: function() {
			$(".cat-item").has("ul").addClass("cat-has-children");
			$(".children .cat-item").has("ul").addClass("subcat-has-children");

			var children = $(".cat-item .children");

			children.prev('a').click(function(event) {
					event.preventDefault();
					$(this).next('.children').slideToggle();
				}
			);

			$('.cat-has-children a').click(function (event) {
				if ($(this).parent('li').hasClass('cat-open')) {
					$(this).parent('li').removeClass('cat-open');
				} else {
					$(this).parent('li').addClass('cat-open');
				}
			});

			$('.subcat-has-children a').click(function (event) {
				if ($(this).parent('li').hasClass('subcat-open')) {
					$(this).parent('li').removeClass('subcat-open');
				} else {
					$(this).parent('li').addClass('subcat-open');
				}
			});

			$('.subcat-has-children').click(function (event) {});
		},
        
        blogGridIsotope: function() {
            if( agama_pro.blog_layout == 'grid' && agama_pro.infinite_scroll !== '1' && ! $('body').hasClass('single-post') && $('div.article-wrapper').hasClass('grid-style') ) {
                $('#content').imagesLoaded( function(){
                    var $grid = $('#content').isotope({
                        itemSelector: 'div.article-wrapper'
                    });
                });
             }
        },
        
        blogInfiniteScroll: function() {
            if( agama_pro.infinite_scroll == '1' && $('#vision-pagination a').hasClass('next') ) {
                
                var $container = $('#content');
                
                // If blog layout grid, setup isotope.
                if( agama_pro.blog_layout == 'grid' ) {
                    $container.isotope({
                        itemSelector: '.article-wrapper'
                    });
                    var iso = $container.data('isotope');
                    $( window ).smartresize(function(){
                        $container.isotope({
                            itemSelector: '.article-wrapper',
                            masonry: { columnWidth: $container.width() / 5 }
                        });
                    });
                }
                
                // If blog layout == list && infinite trigger == button.
                if( agama_pro.blog_layout == 'list' && agama_pro.infinite_trigger == 'button' ) {
                    var options = {
                        path: '#vision-pagination a.next',
                        append: '.article-wrapper',
                        button: '#infinite-loadmore',
                        scrollThreshold: false,
                        status: '.infscr-load-status',
                        history: false
                    };
                }
                // If blog layout == grid && infinite trigger == button.
                else if( agama_pro.blog_layout == 'grid' && agama_pro.infinite_trigger == 'button' ) {
                    var options = {
                        path: '#vision-pagination a.next',
                        button: '#infinite-loadmore',
                        scrollThreshold: false,
                        append: '.article-wrapper',
                        outlayer: iso,
                        status: '.infscr-load-status',
                        history: false
                    };
                }
                // If blog layout == small_thumbs && infinite trigger == button.
                else if ( agama_pro.blog_layout == 'small_thumbs' && agama_pro.infinite_trigger == 'button' ) {
                    var options = {
                        path: '#vision-pagination a.next',
                        append: '.article-wrapper',
                        button: '#infinite-loadmore',
                        scrollThreshold: false,
                        status: '.infscr-load-status',
                        history: false
                    };
                }
                // If blog layout == list && infinite trigger == auto.
                else if( agama_pro.blog_layout == 'list' && agama_pro.infinite_trigger == 'auto' ) {
                    var options = {
                        path: '#vision-pagination a.next',
                        append: '.article-wrapper',
                        scrollThreshold: 50,
                        status: '.infscr-load-status',
                        history: false,
                        debug: true
                    };
                }
                // If blog layout == grid && infinite trigger == auto.
                else if( agama_pro.blog_layout == 'grid' && agama_pro.infinite_trigger == 'auto' ) {
                    var options = {
                        path: '#vision-pagination a.next',
                        append: '.article-wrapper',
                        outlayer: iso,
                        scrollThreshold: 50,
                        status: '.infscr-load-status',
                        history: false,
                        debug: true
                    };
                }
                // If blog layout == small_thumbs && infinite trigger == auto.
                else if( agama_pro.blog_layout == 'small_thumbs' && agama_pro.infinite_trigger == 'auto' ) {
                    var options = {
                        path: '#vision-pagination a.next',
                        append: '.article-wrapper',
                        scrollThreshold: 50,
                        status: '.infscr-load-status',
                        history: false,
                        debug: true
                    };
                }
                $container.infiniteScroll(options);
            }
        },
		
		goToTop: function(){
			$goToTopEl.click(function() {
				$('body,html').stop(true).animate({scrollTop:0},400);
				return false;
			});
		},
		
		goToTopScroll: function(){
			if( $body.hasClass('device-lg') || $body.hasClass('device-md') || $body.hasClass('device-sm') || $body.hasClass('device-xs')  || $body.hasClass('device-xxs') ) {
				if($window.scrollTop() > 450) {
					$goToTopEl.slideDown();
				} else {
					$goToTopEl.slideUp();
				}
			}
		},
		
		testimonialsGrid: function(){
			if( $testimonialsGridEl.length > 0 ) {
				
				var attrs = { };

				$.each($(".testimonial-item")[0].attributes, function(idx, attr) {
					attrs[attr.nodeName] = attr.nodeValue;
				});
				
				$(".testimonial-item").replaceWith(function () {
					return $("<li />", attrs).append($(this).contents());
				});
				
				if( $body.hasClass('device-sm') || $body.hasClass('device-md') || $body.hasClass('device-lg') ) {
					var maxHeight = 0;
					$testimonialsGridEl.each( function(){
						$(this).find("li > .testimonial").each(function(){
						   if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
						});
						$(this).find("li").height(maxHeight);
						maxHeight = 0;
					});
				} else {
					$testimonialsGridEl.find("li").css({ 'height': 'auto' });
				}
			}
		},
		
		verticalMiddle: function(){
			if( $verticalMiddleEl.length > 0 ) {
				$verticalMiddleEl.each( function(){
					var element = $(this),
						verticalMiddleH = element.outerHeight(),
						headerHeight = $header.outerHeight();

					if( element.parents('#slider').length > 0 && !element.hasClass('ignore-header') ) {
						if( $header.hasClass('transparent-header') && ( $body.hasClass('device-lg') || $body.hasClass('device-md') ) ) {
							verticalMiddleH = verticalMiddleH - 70;
							if( $slider.next('#header').length > 0 ) { verticalMiddleH = verticalMiddleH + headerHeight; }
						}
					}

					if( $body.hasClass('device-xs') || $body.hasClass('device-xxs') ) {
						if( element.parents('.full-screen').length && !element.parents('.force-full-screen').length ){
							element.css({ position: 'relative', top: '0', width: 'auto', marginTop: '0', padding: '60px 0' }).addClass('clearfix');
						} else {
							element.css({ position: 'absolute', top: '50%', width: '100%', marginTop: -(verticalMiddleH/2)+'px' });
						}
					} else {
						element.css({ position: 'absolute', top: '50%', width: '100%', marginTop: -(verticalMiddleH/2)+'px' });
					}
				});
			}
		},
	
		lightbox: function(){
			var $lightboxImageEl = $('[data-lightbox="image"]'),
				$lightboxGalleryEl = $('[data-lightbox="gallery"]'),
				$lightboxIframeEl = $('[data-lightbox="iframe"]');

			if( $lightboxImageEl.length > 0 ) {
				$lightboxImageEl.magnificPopup({
					type: 'image',
					closeOnContentClick: true,
					closeBtnInside: false,
					fixedContentPos: true,
					mainClass: 'mfp-no-margins mfp-fade', // class to remove default margin from left and right side
					image: {
						verticalFit: true
					}
				});
			}

			if( $lightboxGalleryEl.length > 0 ) {
				$lightboxGalleryEl.each(function() {
					var element = $(this);

					if( element.find('a[data-lightbox="gallery-item"]').parent('.clone').hasClass('clone') ) {
						element.find('a[data-lightbox="gallery-item"]').parent('.clone').find('a[data-lightbox="gallery-item"]').attr('data-lightbox','');
					}

					element.magnificPopup({
						delegate: 'a[data-lightbox="gallery-item"]',
						type: 'image',
						closeOnContentClick: true,
						closeBtnInside: false,
						fixedContentPos: true,
						mainClass: 'mfp-no-margins mfp-fade', // class to remove default margin from left and right side
						image: {
							verticalFit: true
						},
						gallery: {
							enabled: true,
							navigateByImgClick: true,
							preload: [0,1] // Will preload 0 - before current, and 1 after the current image
						}
					});
				});
			}

			if( $lightboxIframeEl.length > 0 ) {
				$lightboxIframeEl.magnificPopup({
					disableOn: 600,
					type: 'iframe',
					removalDelay: 160,
					preloader: false,
					fixedContentPos: false
				});
			}
		},
		
		resizeVideos: function() {
			if( !$().fitVids ) {
				console.log('resizeVideos: FitVids not Defined.');
				return true;
			}
            
			$("#primary,#content,#footer,#slider:not(.revslider-wrap),.landing-offer-media,.portfolio-ajax-modal,.mega-menu-column").fitVids({
				customSelector: "iframe[src^='http://www.dailymotion.com/embed'], iframe[src*='maps.google.com'], iframe[src*='google.com/maps']",
				ignore: '.no-fv'
			});
		},
		
		imageFade: function(){
			$('.image_fade').hover( function(){
				$(this).filter(':not(:animated)').animate({opacity: 0.8}, 400);
			}, function() {
				$(this).animate({opacity: 1}, 400);
			});
		},
		
		/*
		pageTransition: function(){
			if( !$body.hasClass('no-transition') ){
				var animationIn = $body.attr('data-animation-in'),
					animationOut = $body.attr('data-animation-out'),
					durationIn = $body.attr('data-speed-in'),
					durationOut = $body.attr('data-speed-out'),
					loaderStyle = $body.attr('data-loader'),
					loaderStyleHtml = '<div class="css3-spinner-bounce1"></div><div class="css3-spinner-bounce2"></div><div class="css3-spinner-bounce3"></div>';

				if( !animationIn ) { animationIn = 'fadeIn'; }
				if( !animationOut ) { animationOut = 'fadeOut'; }
				if( !durationIn ) { durationIn = 1500; }
				if( !durationOut ) { durationOut = 800; }

				if( loaderStyle == '2' ) {
					loaderStyleHtml = '<div class="css3-spinner-flipper"></div>';
				} else if( loaderStyle == '3' ) {
					loaderStyleHtml = '<div class="css3-spinner-double-bounce1"></div><div class="css3-spinner-double-bounce2"></div>';
				} else if( loaderStyle == '4' ) {
					loaderStyleHtml = '<div class="css3-spinner-rect1"></div><div class="css3-spinner-rect2"></div><div class="css3-spinner-rect3"></div><div class="css3-spinner-rect4"></div><div class="css3-spinner-rect5"></div>';
				} else if( loaderStyle == '5' ) {
					loaderStyleHtml = '<div class="css3-spinner-cube1"></div><div class="css3-spinner-cube2"></div>';
				} else if( loaderStyle == '6' ) {
					loaderStyleHtml = '<div class="css3-spinner-scaler"></div>';
				}

				$wrapper.animsition({
					inClass : animationIn,
					outClass : animationOut,
					inDuration : Number(durationIn),
					outDuration : Number(durationOut),
					linkElement : '#primary-menu ul li a:not([target="_blank"]):not([href^=#])',
					loading : true,
					loadingParentElement : 'body',
					loadingClass : 'css3-spinner',
					loadingHtml : loaderStyleHtml,
					unSupportCss : [
									 'animation-duration',
									 '-webkit-animation-duration',
									 '-o-animation-duration'
								   ],
					overlay : false,
					overlayClass : 'animsition-overlay-slide',
					overlayParentElement : 'body'
				});
			}
		},*/
		
		defineColumns: function( element ){
			var column = 4;

			if( element.hasClass('portfolio-full') ) {
				if( element.hasClass('portfolio-3') ) column = 3;
				else if( element.hasClass('portfolio-5') ) column = 5;
				else if( element.hasClass('portfolio-6') ) column = 6;
				else column = 4;

				if( $body.hasClass('device-sm') && ( column == 4 || column == 5 || column == 6 ) ) {
					column = 3;
				} else if( $body.hasClass('device-xs') && ( column == 3 || column == 4 || column == 5 || column == 6 ) ) {
					column = 2;
				} else if( $body.hasClass('device-xxs') ) {
					column = 1;
				}
			} else if( element.hasClass('masonry-thumbs') ) {
				if( element.hasClass('col-2') ) column = 2;
				else if( element.hasClass('col-3') ) column = 3;
				else if( element.hasClass('col-5') ) column = 5;
				else if( element.hasClass('col-6') ) column = 6;
				else column = 4;
			}

			return column;
		},
		
		setFullColumnWidth: function( element ){

			if( element.hasClass('portfolio-full') ) {
				var columns = THEMEVISION.initialize.defineColumns( element );
				var containerWidth = element.width();
				if( containerWidth == ( Math.floor(containerWidth/columns) * columns ) ) { containerWidth = containerWidth - 1; }
				var postWidth = Math.floor(containerWidth/columns);
				if( $body.hasClass('device-xxs') ) { var deviceSmallest = 1; } else { var deviceSmallest = 0; }
				element.find(".portfolio-item").each(function(index){
					if( deviceSmallest == 0 && $(this).hasClass('wide') ) { var elementSize = ( postWidth*2 ); } else { var elementSize = postWidth; }
					$(this).css({"width":elementSize+"px"});
				});
			} else if( element.hasClass('masonry-thumbs') ) {
				var columns = THEMEVISION.initialize.defineColumns( element ),
					containerWidth = element.innerWidth(),
					windowWidth = $window.width();
				if( containerWidth == windowWidth ){
					containerWidth = windowWidth*1.004;
					element.css({ 'width': containerWidth+'px' });
				}
				var postWidth = (containerWidth/columns);

				postWidth = Math.floor(postWidth);

				if( ( postWidth * columns ) >= containerWidth ) { element.css({ 'margin-right': '-1px' }); }

				element.children('a').css({"width":postWidth+"px"});

				var firstElementWidth = element.find('a:eq(0)').outerWidth();

				element.isotope({
					masonry: {
						columnWidth: firstElementWidth
					}
				});

				var bigImageNumbers = element.attr('data-big');
				if( bigImageNumbers ) {
					bigImageNumbers = bigImageNumbers.split(",");
					var bigImageNumber = '',
						bigi = '';
					for( bigi = 0; bigi < bigImageNumbers.length; bigi++ ){
						bigImageNumber = Number(bigImageNumbers[bigi]) - 1;
						element.find('a:eq('+bigImageNumber+')').css({ width: firstElementWidth*2 + 'px' });
					}
					var t = setTimeout( function(){
						element.isotope('layout');
					}, 1000 );
				}
			}

		},
	};
	
	THEMEVISION.header = {
		
		init: function(){
			
			THEMEVISION.header.transparent();
			THEMEVISION.header.sticky();
			THEMEVISION.header.superfish();
			THEMEVISION.header.Search();
			THEMEVISION.header.mobilemenu();
			THEMEVISION.header.header_image();
			
		},
		
		transparent: function() {
			/**
			 * If transparent header is enabled but no any background image 
			 * or slider is set than apply position relative.
			 */
			if( agama_pro.header_transparent == true ) {
				if( agama_pro.header_image !== true && ! $slider.hasClass('camera_wrap') && ! $('div').hasClass('agama-slider') && ! $('div').hasClass('wp-custom-header') ) {
					$header_v2.css('position', 'relative');
					$window.on('scroll', function() {
						if( jQuery(this).scrollTop() > 1 ) {
							$header_v2.css('position', 'fixed');
						}
						else if( jQuery(this).scrollTop() < 1 ) {
							$header_v2.css('position', 'relative');
						}
					});
				}
			}
		},
		
		sticky: function( headerOffset ){
			
			if ($window.scrollTop() > headerOffset) {
				$stickyheader.addClass("sticky-header-shrink");
				if( agama_pro.header_style == 'v3' ) { 
					$body.addClass('top-bar-out');
					$topbar.hide();
				}
			} else {
				$stickyheader.removeClass("sticky-header-shrink");
				if( agama_pro.header_style == 'v3' ) { 
					$body.removeClass('top-bar-out');
					$topbar.show(); 
				}
			}
			
		},
		
		superfish: function(){
			
			if( $().superfish ){
				$('nav[role="navigation"] ul').superfish();
				$('nav[role="navigation"] ul.sticky-nav').superfish();
			}
			
		},
		
		topsocial: function(){
			if( $topSocialEl.length > 0 ){
				if( $body.hasClass('device-md') || $body.hasClass('device-lg') ) {
					$topSocialEl.show();
					$topSocialEl.find('a').css({width: 40});

					$topSocialEl.find('.tv-text').each( function(){
						var $clone = $(this).clone().css({'visibility': 'hidden', 'display': 'inline-block', 'font-size': '13px', 'font-weight':'bold'}).appendTo($body),
							cloneWidth = $clone.innerWidth() + 52;
						$(this).parent('a').attr('data-hover-width',cloneWidth);
						$clone.remove();
					});

					$topSocialEl.find('a').hover(function() {
						if( $(this).find('.tv-text').length > 0 ) {
							$(this).css({width: $(this).attr('data-hover-width')});
						}
					}, function() {
						$(this).css({width: 40});
					});
				} else {
					$topSocialEl.show();
					$topSocialEl.find('a').css({width: 40});

					$topSocialEl.find('a').each(function() {
						var topIconTitle = $(this).find('.tv-text').text();
						$(this).attr('title', topIconTitle);
					});

					$topSocialEl.find('a').hover(function() {
						$(this).css({width: 40});
					}, function() {
						$(this).css({width: 40});
					});

					if( $body.hasClass('device-xxs') ) {
						$topSocialEl.hide();
						$topSocialEl.slice(0, 8).show();
					}
				}
			}
		},
		
		Search: function() {
            if( agama_pro.header_search == true ) {
                var $top = $('.vision-main-menu-search').height();
                $('#vision-search-box').css('top', $top);
                $('#top-search-trigger').on('click', function() {
                    $('#top-search-trigger').toggleClass('active');
                    $('#vision-search-box').toggleClass('active');
                });
                
            }
		},
		
		mobilemenu: function(){
			
			// If transparent header is on.
			if( agama_pro.header_transparent == true ) {
				
				var $mobile_nav   = $('nav.mobile-menu');
				var $stickyheight = $('div.sticky-header').height() + 'px';
				
				$window.on('resize', function(){
					var $stickyheight = $('div.sticky-header').height() + 'px';
					$mobile_nav.css('top', $stickyheight);
				});
				
				$mobile_nav.css('top', $stickyheight);
			}
			
			$(".mobile-menu ul.menu > li.menu-item-has-children").each(function(index) {
				var menuItemId = "mobile-menu-submenu-item-" + index;
				$('.mobile-menu ul.sub-menu').id = index;
				$('<button class="dropdown-toggle collapsed" data-toggle="collapse" data-target="#' + menuItemId + '"></button>').insertAfter($(this).children("a"));
				
				$(this).children("ul").prop("id", menuItemId);
				$(this).children("ul").addClass("collapse");

				$("#" + menuItemId).on("show.bs.collapse", function() {
					$(this).parent().addClass("open");
				});
				$("#" + menuItemId).on("hidden.bs.collapse", function() {
					$(this).parent().removeClass("open");
				});
			});
			$('.mobile-menu-toggle.collapsed').click(function() {
				$('#masthead .sticky-header').css('box-shadow', 'none');
				$('nav.mobile-menu').slideToggle();
			});
			$window.on('resize', function(){
				if( $window.width() > 992 ) {
					$('#masthead .sticky-header').css('box-shadow', '');
					$('nav.mobile-menu').hide();
				}
			});
		},
		
		header_image: function() {
			if( agama_pro.header_image == true && agama_pro.has_header_image && agama_pro.header_image_particles == true ) {
				THEMEVISION.initialize.particles( agama_pro.header_img_particles_c_color, agama_pro.header_img_particles_l_color );
			}
		}
	};
	
	THEMEVISION.portfolio = {
		
		init: function() {
			
			
			
		},
		
		portfolioDescMargin: function(){
			var $portfolioOverlayEl = $('.portfolio-overlay');
			if( $portfolioOverlayEl.length > 0 ){
				$portfolioOverlayEl.each(function() {
					var element = $(this);
					if( element.find('.portfolio-desc').length > 0 ) {
						var portfolioOverlayHeight = element.outerHeight();
						var portfolioOverlayDescHeight = element.find('.portfolio-desc').outerHeight();
						if( element.find('a.left-icon').length > 0 || element.find('a.right-icon').length > 0 || element.find('a.center-icon').length > 0 ) {
							var portfolioOverlayIconHeight = 40 + 20;
						} else {
							var portfolioOverlayIconHeight = 0;
						}
						var portfolioOverlayMiddleAlign = ( portfolioOverlayHeight - portfolioOverlayDescHeight - portfolioOverlayIconHeight ) / 2
						element.find('.portfolio-desc').css({ 'margin-top': portfolioOverlayMiddleAlign });
					}
				});
			}
		},
		
		arrange: function(){
			THEMEVISION.initialize.setFullColumnWidth( $portfolio );
			$('#portfolio.portfolio-full').isotope('layout');
		},
		
		
	};
	
	THEMEVISION.widgets = {
		
		init: function(){
			
			THEMEVISION.widgets.animations();
			THEMEVISION.widgets.youtubeBgVideo();
			THEMEVISION.widgets.tabs();
			THEMEVISION.widgets.toggles();
			THEMEVISION.widgets.accordions();
			THEMEVISION.widgets.counter();
			THEMEVISION.widgets.progress();
			THEMEVISION.widgets.extras();
			THEMEVISION.widgets.contact7form();
			
		},
		
		parallax: function(){
			if( !THEMEVISION.isMobile.any() ){
				$.stellar({
					horizontalScrolling: false,
					verticalOffset: 150,
					responsive: true
				});
			} else {
				$parallaxEl.addClass('mobile-parallax');
				$parallaxPageTitleEl.addClass('mobile-parallax');
			}
		},
		
		animations: function(){
			var $dataAnimateEl = $('[data-animate]');
			if( $dataAnimateEl.length > 0 ){
				if( $body.hasClass('device-lg') || $body.hasClass('device-md') || $body.hasClass('device-sm') ){
					$dataAnimateEl.each(function(){
						var element = $(this),
							animationDelay = element.attr('data-delay'),
							animationDelayTime = 0;

						if( animationDelay ) { animationDelayTime = Number( animationDelay ) + 500; } else { animationDelayTime = 500; }

						if( !element.hasClass('animated') ) {
							element.addClass('not-animated');
							var elementAnimation = element.attr('data-animate');
							element.appear(function () {
								setTimeout(function() {
									element.removeClass('not-animated').addClass( elementAnimation + ' animated');
								}, animationDelayTime);
							},{accX: 0, accY: -120},'easeInCubic');
						}
					});
				}
			}
		},
		
		loadFlexSlider: function(){
			var $flexSliderEl = $('.fslider').find('.flexslider');
			if( $flexSliderEl.length > 0 ){
				$flexSliderEl.each(function() {
					var $flexsSlider = $(this),
						flexsAnimation = $flexsSlider.parent('.fslider').attr('data-animation'),
						flexsEasing = $flexsSlider.parent('.fslider').attr('data-easing'),
						flexsDirection = $flexsSlider.parent('.fslider').attr('data-direction'),
						flexsSlideshow = $flexsSlider.parent('.fslider').attr('data-slideshow'),
						flexsPause = $flexsSlider.parent('.fslider').attr('data-pause'),
						flexsSpeed = $flexsSlider.parent('.fslider').attr('data-speed'),
						flexsVideo = $flexsSlider.parent('.fslider').attr('data-video'),
						flexsPagi = $flexsSlider.parent('.fslider').attr('data-pagi'),
						flexsArrows = $flexsSlider.parent('.fslider').attr('data-arrows'),
						flexsThumbs = $flexsSlider.parent('.fslider').attr('data-thumbs'),
						flexsHover = $flexsSlider.parent('.fslider').attr('data-hover'),
						flexsSheight = true,
						flexsUseCSS = false;

					if( !flexsAnimation ) { flexsAnimation = 'slide'; }
					if( !flexsEasing || flexsEasing == 'swing' ) {
						flexsEasing = 'swing';
						flexsUseCSS = true;
					}
					if( !flexsDirection ) { flexsDirection = 'horizontal'; }
					if( !flexsSlideshow ) { flexsSlideshow = true; } else { flexsSlideshow = false; }
					if( !flexsPause ) { flexsPause = 5000; }
					if( !flexsSpeed ) { flexsSpeed = 600; }
					if( !flexsVideo ) { flexsVideo = false; }
					if( flexsDirection == 'vertical' ) { flexsSheight = false; }
					if( flexsPagi == 'false' ) { flexsPagi = false; } else { flexsPagi = true; }
					if( flexsThumbs == 'true' ) { flexsPagi = 'thumbnails'; } else { flexsPagi = flexsPagi; }
					if( flexsArrows == 'false' ) { flexsArrows = false; } else { flexsArrows = true; }
					if( flexsHover == 'false' ) { flexsHover = false; } else { flexsHover = true; }
					
					$('.testimonial-item').addClass('slide');
					$('.slide .testimonial').removeClass('testimonial');
					
					$flexsSlider.flexslider({
						selector: ".slider-wrap > .slide",
						animation: flexsAnimation,
						easing: flexsEasing,
						direction: flexsDirection,
						slideshow: flexsSlideshow,
						slideshowSpeed: Number(flexsPause),
						animationSpeed: Number(flexsSpeed),
						pauseOnHover: flexsHover,
						video: flexsVideo,
						controlNav: flexsPagi,
						directionNav: flexsArrows,
						smoothHeight: flexsSheight,
						useCSS: flexsUseCSS,
						start: function(slider){
							THEMEVISION.widgets.animations();
							THEMEVISION.initialize.verticalMiddle();
							slider.parent().removeClass('preloader2');
							var t = setTimeout( function(){ $('#portfolio.portfolio-masonry,#portfolio.portfolio-full,#posts.post-masonry').isotope('layout'); }, 1200 );
							THEMEVISION.initialize.lightbox();
							$('.flex-prev').html('<i class="fa fa-angle-left"></i>');
							$('.flex-next').html('<i class="fa fa-angle-right"></i>');
							THEMEVISION.portfolio.portfolioDescMargin();
						},
						after: function(){
							if( $portfolio.has('portfolio-full') ) {
								$('#portfolio.portfolio-full').isotope('layout');
								THEMEVISION.portfolio.portfolioDescMargin();
							}
						}
					});
				});
			}
		},
		
		html5Video: function(){
			var videoEl = $('.video-wrap:has(video)');
			if( videoEl.length > 0 ) {
				videoEl.each(function(){
					var element = $(this),
						elementVideo = element.find('video'),
						outerContainerWidth = element.outerWidth(),
						outerContainerHeight = element.outerHeight(),
						innerVideoWidth = elementVideo.outerWidth(),
						innerVideoHeight = elementVideo.outerHeight();

					if( innerVideoHeight < outerContainerHeight ) {
						var videoAspectRatio = innerVideoWidth/innerVideoHeight,
							newVideoWidth = outerContainerHeight * videoAspectRatio,
							innerVideoPosition = (newVideoWidth - outerContainerWidth) / 2;
						elementVideo.css({ 'width': newVideoWidth+'px', 'height': outerContainerHeight+'px', 'left': -innerVideoPosition+'px' });
					} else {
						var innerVideoPosition = (innerVideoHeight - outerContainerHeight) / 2;
						elementVideo.css({ 'width': innerVideoWidth+'px', 'height': innerVideoHeight+'px', 'top': -innerVideoPosition+'px' });
					}

					if( THEMEVISION.isMobile.any() ) {
						var placeholderImg = elementVideo.attr('poster');

						if( placeholderImg != '' ) {
							element.append('<div class="video-placeholder" style="background-image: url('+ placeholderImg +');"></div>')
						}
					}
				});
			}
		},
		
		youtubeBgVideo: function(){
			if( $youtubeBgPlayerEl.length > 0 ){
				$youtubeBgPlayerEl.each( function(){
					var element = $(this),
						ytbgVideo = element.attr('data-video'),
						ytbgMute = element.attr('data-mute'),
						ytbgRatio = element.attr('data-ratio'),
						ytbgQuality = element.attr('data-quality'),
						ytbgOpacity = element.attr('data-opacity'),
						ytbgContainer = element.attr('data-container'),
						ytbgOptimize = element.attr('data-optimize'),
						ytbgLoop = element.attr('data-loop'),
						ytbgVolume = element.attr('data-volume'),
						ytbgStart = element.attr('data-start'),
						ytbgStop = element.attr('data-stop'),
						ytbgAutoPlay = element.attr('data-autoplay'),
						ytbgFullScreen = element.attr('data-fullscreen');

					if( ytbgMute == 'false' ) { ytbgMute = false; } else { ytbgMute = true; }
					if( !ytbgRatio ) { ytbgRatio = '16/9'; }
					if( !ytbgQuality ) { ytbgQuality = 'hd720'; }
					if( !ytbgOpacity ) { ytbgOpacity = 1; }
					if( !ytbgContainer ) { ytbgContainer = 'self'; }
					if( ytbgOptimize == 'false' ) { ytbgOptimize = false; } else { ytbgOptimize = true; }
					if( ytbgLoop == 'false' ) { ytbgLoop = false; } else { ytbgLoop = true; }
					if( !ytbgVolume ) { ytbgVolume = 1; }
					if( !ytbgStart ) { ytbgStart = 0; }
					if( !ytbgStop ) { ytbgStop = 0; }
					if( ytbgAutoPlay == 'false' ) { ytbgAutoPlay = false; } else { ytbgAutoPlay = true; }
					if( ytbgFullScreen == 'true' ) { ytbgFullScreen = true; } else { ytbgFullScreen = false; }

					element.mb_YTPlayer({
						videoURL: ytbgVideo,
						mute: ytbgMute,
						ratio: ytbgRatio,
						quality: ytbgQuality,
						opacity: ytbgOpacity,
						containment: ytbgContainer,
						optimizeDisplay: ytbgOptimize,
						loop: ytbgLoop,
						vol: ytbgVolume,
						startAt: ytbgStart,
						stopAt: ytbgStop,
						autoplay: ytbgAutoPlay,
						realfullscreen: ytbgFullScreen,
						showYTLogo: false,
						showControls: false
					});
				});
			}
		},
		
		tabs: function(){
			
			$('#tabs a:first').tab('show');
			$('#tabs a').click(function (e) {
				e.preventDefault()
				$(this).tab('show');
			});
			
		},
		
		toggles: function(){
			var $toggle = $('.toggle');
			if( $toggle.length > 0 ) {
				$toggle.each( function(){
					var element = $(this),
						elementState = element.attr('data-state');

					if( elementState != 'open' ){
						element.find('.togglec').hide();
					} else {
						element.find('.togglet').addClass("toggleta");
					}

					element.find('.togglet').click(function(){
						$(this).toggleClass('toggleta').next('.togglec').slideToggle(300);
						return true;
					});
				});
			}
		},
		
		accordions: function(){
			var $accordionEl = $('.accordion');
			if( $accordionEl.length > 0 ){
				$accordionEl.each( function(){
					var element = $(this),
						elementState = element.attr('data-state'),
						accordionActive = element.attr('data-active');

					if( !accordionActive ) { accordionActive = 0; } else { accordionActive = accordionActive - 1; }

					element.find('.acc_content').hide();

					if( elementState != 'closed' ) {
						element.find('.acctitle:eq('+ Number(accordionActive) +')').addClass('acctitlec').next().show();
					}

					element.find('.acctitle').click(function(){
						if( $(this).next().is(':hidden') ) {
							element.find('.acctitle').removeClass('acctitlec').next().slideUp("normal");
							$(this).toggleClass('acctitlec').next().slideDown("normal");
						}
						return false;
					});
				});
			}
		},
		
		counter: function(){
			var $counterEl = $('.counter:not(.counter-instant)');
			if( $counterEl.length > 0 ){
				$counterEl.each(function(){
					var element = $(this);
					var counterElementComma = $(this).find('span').attr('data-comma');
					if( !counterElementComma ) { counterElementComma = false; } else { counterElementComma = true; }
					if( $body.hasClass('device-lg') || $body.hasClass('device-md') ){
						element.appear( function(){
							THEMEVISION.widgets.runCounter( element, counterElementComma );
						},{accX: 0, accY: -120},'easeInCubic');
					} else {
						THEMEVISION.widgets.runCounter( element, counterElementComma );
					}
				});
			}
		},
		
		runCounter: function( counterElement,counterElementComma ){
			if( counterElementComma == true ) {
				counterElement.find('span').countTo({
					formatter: function (value, options) {
						value = value.toFixed(options.decimals);
						value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
						return value;
					}
				});
			} else {
				counterElement.find('span').countTo();
			}
		},
		
		progress: function(){
			var $progressEl = $('.progress');
			if( $progressEl.length > 0 ){
				$progressEl.each(function(){
					var element = $(this),
						skillsBar = element.parent('li'),
						skillValue = skillsBar.attr('data-percent');

					if( $body.hasClass('device-lg') || $body.hasClass('device-md') ){
						element.appear( function(){
							if (!skillsBar.hasClass('skills-animated')) {
								element.find('.counter-instant span').countTo();
								skillsBar.find('.progress').css({width: skillValue + "%"}).addClass('skills-animated');
							}
						},{accX: 0, accY: -120},'easeInCubic');
					} else {
						element.find('.counter-instant span').countTo();
						skillsBar.find('.progress').css({width: skillValue + "%"});
					}
				});
			}
		},
		
		notifications: function( element ){
			toastr.clear();
			var notifyElement = $(element),
				notifyPosition = notifyElement.attr('data-notify-position'),
				notifyType = notifyElement.attr('data-notify-type'),
				notifyMsg = notifyElement.attr('data-notify-msg'),
				notifyCloseButton = notifyElement.attr('data-notify-close');

			if( !notifyPosition ) { notifyPosition = 'toast-top-right'; } else { notifyPosition = 'toast-' + notifyElement.attr('data-notify-position'); }
			if( !notifyMsg ) { notifyMsg = 'Please set a message!'; }
			if( notifyCloseButton == 'true' ) { notifyCloseButton = true; } else { notifyCloseButton = false; }

			toastr.options.positionClass = notifyPosition;
			toastr.options.closeButton = notifyCloseButton;
			toastr.options.closeHtml = '<button><i class="icon-remove"></i></button>';

			if( notifyType == 'warning' ) {
				toastr.warning(notifyMsg);
			} else if( notifyType == 'error' ) {
				toastr.error(notifyMsg);
			} else if( notifyType == 'success' ) {
				toastr.success(notifyMsg);
			} else {
				toastr.info(notifyMsg);
			}

			return false;
		},
		
		extras: function(){
			
			// Tooltips init
			$('[data-toggle="tooltip"]').tooltip();
			
			// Add reply icon to reply link - comments area
			$('a.comment-reply-link').append('<i class="fa fa-reply"></i>');
			
			if( THEMEVISION.isMobile.any() ){
				$body.addClass('device-touch');
			}
			
			// Contact Form 7 Form Submit Button
			$('.ccf-form .form-submit input[type=submit]').addClass('button button-3d');
			
			// Contact Form Plugin
			if( $('div').hasClass('cntctfrm_submit_wrap') ) {
				$('.cntctfrm_submit_wrap input[type=submit]').addClass('button button-3d');
			}
			
			// If WooCommerce not active, reduce search icon area width from 100px to 50px
			if( $('div').hasClass('cart_count') ) {
				
			} else {
				$('.sticky-header .navigation-icons').css('width', '50');
			}
		},
		
		contact7form: function() {
			
			// If device screen size is lower than 450px.
			if( $(window).width() < 450 ) {
				$('.wpcf7-form-control').css('width', '100%');
			} else {
				$('.wpcf7-form-control').css('width', 'auto');
			}
			
			$('.wpcf7-form-control').addClass('sm-form-control');
			$('.wpcf7-submit').removeClass('sm-form-control');
			
			// Add button class to Contact Form 7 Submit Button
			if( $('input').hasClass('wpcf7-submit') ) {
				$('input.wpcf7-submit').addClass( 'button button-3d' );
			}
		}
		
	};
	
	THEMEVISION.isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
		BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
		iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
		Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
		Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
		any: function() {
			return (THEMEVISION.isMobile.Android() || THEMEVISION.isMobile.BlackBerry() || THEMEVISION.isMobile.iOS() || THEMEVISION.isMobile.Opera() || THEMEVISION.isMobile.Windows());
		}
	};
	
	THEMEVISION.isBrowser = {
		Safari: function() {
			var is_safari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
			return is_safari;
		}
	};
	
	THEMEVISION.woocommerce = {
		
		init: function(){

			THEMEVISION.woocommerce.quantity();
			
		},
		
		quantity: function(){
			
			$('.quantity input[type="number"]').prop('type', 'text');
			$('.quantity').prepend('<input type="button" value="-" class="minus">');
			$('.quantity').append('<input type="button" value="+" class="plus">');
			
			$( document ).on('click', '.plus, .minus', function() {
				// Get values
				var $qty = $( this ).closest( '.quantity' ).find( '.qty' ),
					currentVal = parseFloat( $qty.val() ),
					max = parseFloat( $qty.attr( 'max' ) ),
					min = parseFloat( $qty.attr( 'min' ) ),
					step = $qty.attr( 'step' );

				// Format values
				if ( !currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
				if ( max === '' || max === 'NaN' ) max = '';
				if ( min === '' || min === 'NaN' ) min = 0;
				if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

				// Change the value
				if ( $( this ).is( '.plus' ) ) {

					if ( max && ( max == currentVal || currentVal > max ) ) {
						$qty.val( max );
					} else {
						$qty.val( currentVal + parseFloat( step ) );
					}

				} else {

					if ( min && ( min == currentVal || currentVal < min ) ) {
						$qty.val( min );
					} else if ( currentVal > 0 ) {
						$qty.val( currentVal - parseFloat( step ) );
					}

				}

				// Trigger change event
				$qty.trigger( 'change' );
			});
		}
		
	};
	
	THEMEVISION.slider = {
		
		init: function() {
			
			
			
		},
		
		owlCaptionInit: function(){
			if( $owlCarouselEl.length > 0 ){
				$owlCarouselEl.each( function(){
					var element = $(this);
					if( element.find('.owl-dot').length > 0 ) {
						element.find('.owl-controls').addClass('with-carousel-dots');
					}
				});
			}
		}
		
	};
	
	THEMEVISION.documentOnResize = {
		
		init: function(){
			
			var t = setTimeout( function(){
				THEMEVISION.header.topsocial();
				THEMEVISION.initialize.verticalMiddle();
				THEMEVISION.initialize.testimonialsGrid();
				THEMEVISION.widgets.html5Video();
				THEMEVISION.portfolio.arrange();
			}, 500 );
			
		}
		
	};
	
	THEMEVISION.documentOnReady = {
		
		init: function(){
			
			THEMEVISION.initialize.init();
			THEMEVISION.header.init();
			if( $portfolio.length > 0 ) { THEMEVISION.portfolio.init(); }
			THEMEVISION.widgets.init();
			THEMEVISION.woocommerce.init();
			THEMEVISION.documentOnReady.windowscroll();
			
		},
		
		windowscroll: function(){
			
			var headerOffset = $header.offset().top;
			var headerWrapOffset = $headerWrap.offset().top;

			var headerDefinedOffset = $header.attr('data-sticky-offset');
			if( typeof headerDefinedOffset !== 'undefined' ) {
				if( headerDefinedOffset == 'full' ) {
					headerWrapOffset = $window.height();
					var headerOffsetNegative = $header.attr('data-sticky-offset-negative');
					if( typeof headerOffsetNegative !== 'undefined' ) { headerWrapOffset = headerWrapOffset - headerOffsetNegative - 1; }
				} else {
					headerWrapOffset = Number(headerDefinedOffset);
				}
			}
			
			$window.on( 'scroll', function(){
				
				THEMEVISION.initialize.goToTopScroll();
				THEMEVISION.header.sticky( headerWrapOffset );
				
			});
			
		}
		
	};
	
	THEMEVISION.documentOnLoad = {
		
		init: function(){
			
			THEMEVISION.initialize.testimonialsGrid();
			THEMEVISION.portfolio.portfolioDescMargin();
			THEMEVISION.initialize.verticalMiddle();
			THEMEVISION.portfolio.arrange();
			THEMEVISION.widgets.parallax();
			THEMEVISION.widgets.loadFlexSlider();
			THEMEVISION.widgets.html5Video();
			THEMEVISION.header.topsocial();
			THEMEVISION.slider.owlCaptionInit();
			
		}
		
	};
	
	var $window 				= $(window),
		$body					= $('body'),
		$wrapper 				= $('#main-wrapper'),
		$header 				= $('#masthead'),
		$header_v2				= $('.header_v2 .sticky-header'),
		$topbar					= $('#top-bar'),
		$stickyheader			= $('.sticky-header'),
		$headerWrap 			= $('#masthead, .sticky-header'),
		$topSocialEl 			= $('#top-social').find('li'),
		$slider					= $('#agama_slider'),
		$portfolio 				= $('#portfolio'),
		$goToTopEl 				= $('#toTop'),
		$testimonialsGridEl 	= $('.testimonials-grid'),
		$verticalMiddleEl 		= $('.vertical-middle'),
		$owlCarouselEl 			= $('.owl-carousel'),
		$parallaxEl 			= $('.parallax'),
		$youtubeBgPlayerEl 		= $('.yt-bg-player'),
		$parallaxPageTitleEl 	= $('.page-title-parallax'),
		$portfolio 				= $('#portfolio'),
		$portfolioItems 		= $('.portfolio-ajax').find('.portfolio-item');
		
	$(document).ready( THEMEVISION.documentOnReady.init );
	$window.load( THEMEVISION.documentOnLoad.init );
	$window.on( 'resize', THEMEVISION.documentOnResize.init );
	
})(jQuery);