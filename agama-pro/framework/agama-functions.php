<?php

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! isset( $content_width ) ) 
	$content_width = 1200;

/**
 * Agama setup
 *
 * @since Agama 1.0
 */
function agama_after_setup_theme() {
	
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	
	// Adds support for title tag
	add_theme_support( 'title-tag' );
	
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	
	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );
	
	register_nav_menu( 'agama_nav_top', __( 'Top Menu', 'agama-pro' ) );
	register_nav_menu( 'agama_nav_primary', __( 'Primary Menu', 'agama-pro' ) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 800, 9999 ); // Unlimited height, soft crop
	
	// Register custom image sizes
	add_image_size( 'blog-large', 776, 310, true );
    add_image_size( 'blog-medium', 320, 202, true );
	add_image_size( 'blog-small', 400, 300, true );
    add_image_size( 'related-img', 180, 138, true );
    add_image_size( 'portfolio-full', 800, 600, true );
    add_image_size( 'portfolio-one', 776, 470, true );
    add_image_size( 'portfolio-two', 527, 347, true );
    add_image_size( 'portfolio-three', 346, 226, true );
    add_image_size( 'portfolio-four', 256, 156, true );
    add_image_size( 'recent-posts', 700, 441, true );
	add_image_size( 'tabs-img', 50, 52, true );
	add_image_size( 'agama-testimonials', 250, 250, true );
	
	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );
	
	/*
	 * Declare WooCommerce Support
	 */
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'agama_after_setup_theme' );

/**
 * Backwards Compatibility for Title Tag
 *
 * @since Agama 1.0
 */
if ( ! function_exists( '_wp_render_title_tag' ) ) {
function agama_slug_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'agama_slug_render_title' );
}

/**
 * Add Search & Cart Icons to The Menu
 *
 * @since 1.3.7
 */
add_filter( 'wp_nav_menu_items', 'agama_nav_primary_menu_items', 10, 2 );
function agama_nav_primary_menu_items( $items, $args ) {
	// Add header search & cart icons on primary menu.
	if( $args->theme_location == 'agama_nav_primary' ) {
		// If WooCommerce cart icon enabled.
		if( class_exists( 'Woocommerce' ) && get_theme_mod( 'agama_header_cart_icon', true ) ) {
			$items .= sprintf(
				'<li class="vision-custom-menu-item vision-main-menu-cart">
					<a href="%s" class="shopping_cart"></a>
					<span class="cart_count"></span>
				</li>',
				wc_get_cart_url()
			);
		}
		// If search icon is enabled.
		if( get_theme_mod( 'agama_header_search', true ) ) {
			$items .= sprintf(
				'<li class="vision-custom-menu-item vision-main-menu-search">
					<a id="%s">%s</a>
                    %s
				</li>',
				esc_attr( 'top-search-trigger' ),
				'<i id="vision-search-open-icon" class="fa fa-search"></i>',
                Agama_Helper::get_search_box()
			);
		}
	}
	return $items;
}

/**
 * Agama Breadcrumbs
 *
 * @since 1.3.7
 */
add_action( 'vision_breadcrumb', 'vision_breadcrumbs' );
if ( ! function_exists( 'vision_breadcrumbs' ) ) {
	/**
	 * Render the breadcrumbs with help of class-breadcrumbs.php.
	 *
	 * @return void
	 */
	function vision_breadcrumbs() {
		$breadcrumbs = Agama_Breadcrumb::get_instance();
		$breadcrumbs->get_breadcrumbs();
	}
}

/**
 * Primary Class
 *
 * @since Agama v1.0.2
 */
function agama_primary_class() {
	echo 'col-md-12';
}

/**
 * Agama Thumb Title
 * Get post-page article title and separates it on two halfs
 *
 * @since Agama v1.0.1
 * @return string
 */
function agama_thumb_title() {
	$title = get_the_title();
	$findme   = ' ';
	$pos = strpos($title, $findme);
	if( $pos === false ) {
			$output = '<h2>'.$title.'</h2>';
		} else {
			// isolate part 1 and part 2.
			$title_part_one = strstr($title, ' ', true); // As of PHP 5.3.0
			$title_part_two = strstr($title, ' ');
			$output = '<h2>'.$title_part_one.'<span>'.$title_part_two.'</span></h2>';
		}
	echo $output;
}

/**
 * Get Attachment Image Src
 *
 * @since Agama v1.0.1
 * @return string
 */
function agama_return_image_src( $thumb_size ) {
	$att_id	 = get_post_thumbnail_id();
	$att_src = wp_get_attachment_image_src( $att_id, $thumb_size );
	return esc_url($att_src[0]);
}

/**
 * Replaces Excerpt "more" Text by Link
 *
 * @since 1.1.2
 */
add_filter('excerpt_more', 'agama_excerpt_more' );
function agama_excerpt_more( $more ) {
	global $post;
    $wrapper_start = '';
    $wrapper_end   = '';
    if( is_customize_preview() ) {
        $wrapper_start = '<span class="more-link-cpreview">';
        $wrapper_end   = '</span>';
    }
	if( get_theme_mod( 'agama_blog_readmore_url', true ) && get_post_type() !== 'agama_portfolio' && ! is_single() ) {
		return '<br><br>'. $wrapper_start .'<a class="more-link" href="'. get_permalink( $post->ID ) .'">'. __( 'Read More', 'agama-pro' ) .'</a>'. $wrapper_end;
	}
	return;
}

/**
 * Check if current page is template page
 *
 * @since Agama v1.0.1
 * @return string
 */
function agama_is_page_template( $page ) {
	if( is_page_template( 'page-templates/'.$page ) ) {
		return true;
	}
	return false;
}

/**
 * Get Portfolio Category Names
 *
 * @since Agama v1.0.1
 * @return string
 */
function agama_get_portfolio_categories( $tag ) {
	global $post;
	$categories = wp_get_object_terms( $post->ID,  'portfolio-categories' );
	if ( ! empty( $categories ) ) {
		if ( ! is_wp_error( $categories ) ) {
			echo $tag;
			foreach( $categories as $term ) {
				echo '<a href="' . get_term_link( $term->slug, 'portfolio-categories' ) . '">' . esc_html( $term->name ) . '</a>, '; 
			}
			echo str_replace( '<', '</', $tag );
		}
	}
}

/**
 * Filter the page menu arguments.
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since Agama 1.0
 */
function agama_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'agama_page_menu_args' );

if ( ! function_exists( 'agama_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Agama 1.0
 */
function agama_content_nav( $html_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo esc_attr( $html_id ); ?>" class="navigation clearfix" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'agama-pro' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'agama-pro' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'agama-pro' ) ); ?></div>
		</nav><!-- .navigation -->
	<?php endif;
}
endif;

/**
 * Comment form default fields
 *
 * @since 1.0.5
 */
add_filter( 'comment_form_default_fields', 'agama_comment_form_fields' );
function agama_comment_form_fields( $fields ) {
	
	// Get the current commenter if available
    $commenter = wp_get_current_commenter();
	
	// Core functionality
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html_req = ( $req ? " required='required'" : '' );
	
	$fields['author'] 	= '<div class="col-md-4"><label for="author">' . __( 'Name', 'agama-pro' ) . '</label>' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" class="sm-form-control"' . $aria_req . ' /></div>';
	$fields['email'] 	= '<div class="col-md-4"><label for="email">' . __( 'Email', 'agama-pro' ) . '</label>' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" class="sm-form-control"' . $aria_req . ' /></div>';
	$fields['url'] 		= '<div class="col-md-4"><label for="url">' . __( 'Website', 'agama-pro' ) . '</label><input id="url" name="url" type="text" value="' . esc_url( $commenter['comment_author_url'] ) . '" class="sm-form-control" /></div>';
	
	
	
	return $fields;
}

/**
 * Comment form defaults
 *
 * @since 1.0.5
 */
add_filter( 'comment_form_defaults', 'agama_comment_form_defaults' );
function agama_comment_form_defaults( $defaults ) {
	global $current_user;
	
	$comments['tags_suggestion'] 			= esc_attr( get_theme_mod( 'agama_comments_tags_suggestion', true ) );
	
	$defaults['title_reply']				= sprintf( '%s <span>%s</span>', __( 'Leave a', 'agama-pro' ), __( 'Comment', 'agama-pro' ) );
	$defaults['logged_in_as'] 				= '<div class="col-md-12 logged-in-as">' . sprintf(	'%s <a href="%s">%s</a>. <a href="%s" title="%s">%s</a>', __('Logged in as', 'agama-pro'), admin_url( 'profile.php' ), $current_user->display_name, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ), __('Log out of this account', 'agama-pro'), __('Log out?', 'agama-pro') ) . '</div>';
	$defaults['comment_field']  			= '<div class="col-md-12"><label for="comment">' . __( 'Comment', 'agama-pro' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="sm-form-control"></textarea></div>';
	
	// Comments HTML tags suggestion.
	if( $comments['tags_suggestion'] ) {
		$defaults['comment_notes_after'] 	= '<div class="col-md-12 abbr" style="margin-top: 15px; margin-bottom: 15px;">' . sprintf( '%s <abbr title="HyperText Markup Language">HTML</abbr> %s: %s', __( 'You may use these', 'agama-pro' ), __( 'tags and attributes', 'agama-pro' ), '<code>' . allowed_tags() . '</code>' ) . '</div>';
	}
	
	$defaults['class_submit'] 				= 'button button-3d button-large button-rounded';
	
	return $defaults;
}

if ( ! function_exists( 'agama_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own agama_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Agama 1.0
 */
function agama_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'agama-pro' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'agama-pro' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment-wrap clearfix">
			
			<div class="comment-meta">
				<div class="comment-author vcard">
					<span class="comment-avatar clearfix">
						<?php echo get_avatar( $comment, 44 ); ?>
					</span>
				</div>
			</div><!-- .comment-meta -->

			<div class="comment-content comment">
				<div class="comment-author">
				<?php
				printf( '<a href="%1$s">%2$s %3$s</a>', get_permalink(), get_comment_author_link(),
							// If current post author is also comment author, make it known visually.
							( $comment->user_id === $post->post_author ) ? '<cite>' . __( 'author', 'agama-pro' ) . '</cite>' : ''
				);
				printf( '<span><a href="%1$s"><time datetime="%2$s">%3$s</time></a></span>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'agama-pro' ), get_comment_date(), get_comment_time() )
				);
				?>
				</div>
				<?php comment_text(); ?>
				<?php //edit_comment_link( __( '<i class="fa fa-edit"></i> Edit', 'agama-pro' ), '<p class="edit-link">', '</p>' ); ?>
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .comment-content -->
			
			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'agama-pro' ); ?></p>
			<?php endif; ?>
			
		</div><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'agama_entry_meta' ) ) :
/**
 * Set up post entry meta.
 *
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own agama_entry_meta() to override in a child theme.
 *
 * @since Agama 1.0
 */
function agama_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'agama-pro' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'agama-pro' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'agama-pro' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'agama-pro' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'agama-pro' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'agama-pro' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/**
 * .article-wrapper Grid, List - Style
 *
 * @since Agama v1.0.1
 */
function agama_article_wrapper_class() {
    $layout = esc_attr( get_theme_mod( 'agama_blog_layout', 'list' ) );
    switch( $layout ) {
        case 'list':
            $output = 'list-style';
        break;
        case 'grid':
            $output = 'grid-style';
        break;
        case 'small_thumbs':
            $output = 'small_thumbs-style';
        break;
    }
	echo $output;
}

/**
 * Render HTML for blog post date / post format
 *
 * @since Agama v1.0.1
 */
if( ! function_exists( 'agama_render_blog_post_date' ) ) {
	function agama_render_blog_post_date() {
		global $post;
		
		// Get post format
		$format = get_post_format( $post->ID );
		
		switch( $format ):
			case 'aside':
				$fa_class = 'fa fa-2x fa-outdent';
			break;
			case 'image':
				$fa_class = 'fa fa-2x fa-picture-o';
			break;
			case 'link':
				$fa_class = 'fa fa-2x fa-link';
			break;
			case 'quote':
				$fa_class = 'fa fa-2x fa-quote-left';
			break;
			case 'status':
				$fa_class = 'fa fa-2x fa-comment';
			break;
			default: $fa_class = 'fa fa-2x fa-file-text';
		endswitch;
		
		// If not single post
		if( ! is_single() && get_theme_mod( 'agama_blog_date', true ) ) {
			echo '<div class="entry-date">';
			echo '<div class="date-box updated">';
				printf( '<span class="date">%s</span>', get_the_time('d') ); // Get day
				printf( '<span class="month-year">%s</span>', get_the_time('m, Y') ); // Get month, year
			echo '</div>';
			echo '<div class="format-box">';
				printf( '<i class="%s"></i>', $fa_class );
			echo '</div>';
			echo '</div><!-- .entry-date -->';
		}
	}
}
add_action( 'agama_blog_post_date_and_format', 'agama_render_blog_post_date', 10 );

/**
 * Render HTML blog post meta details
 *
 * @since Agama v1.0.1
 */
if( ! function_exists( 'agama_render_blog_post_meta' ) ) {
	function agama_render_blog_post_meta() {
		
		$blog = array(
			'layout'	=> esc_attr( get_theme_mod( 'agama_blog_layout', 'list' ) ),
			'author'	=> esc_attr( get_theme_mod( 'agama_blog_author', true ) ),
			'date'		=> esc_attr( get_theme_mod( 'agama_blog_date', true ) ),
			'category'	=> esc_attr( get_theme_mod( 'agama_blog_category', true ) ),
			'comments'	=> esc_attr( get_theme_mod( 'agama_blog_comments_count', true ) )
		);
	
		if( $blog['author'] || $blog['date'] || $blog['category'] || $blog['comments'] )
			echo '<p class="single-line-meta">';
		
		// Author
		if( $blog['author'] ) {
			printf( '
				%s <span class="vcard"><span class="fn">%s</span></span>', 
				__( 'By', 'agama-pro' ), get_the_author_link() 
			);
		}
		
		// Separator
		if( $blog['author'] ) {
			echo '<span class="inline-sep">|</span>';
		}
		
		// Date
		if( $blog['date'] ) {
			printf( '<span>%s</span>', get_the_date() );
		}
		
		// Separator
		if( $blog['date'] && $blog['layout'] == 'list' || $blog['date'] && is_single() ) { 
			echo '<span class="inline-sep">|</span>';
		}
		
		// Output next details only on list blog layout or on single post page
		if( $blog['layout'] == 'list' || is_single() ) {
			
			// Category
			if( $blog['category'] ) {
				printf( '%s', get_the_category_list( ', ' ) );
			}
			
			// Separator
			if( $blog['category'] && $blog['comments'] ) echo '<span class="inline-sep">|</span>';
			
			// Comments number
			if( comments_open() ) {
				if( $blog['comments'] ) {
					printf(
						'<a href="%s">%s %s</a>', 
						get_comments_link(), 
						get_comments_number(),
						__( 'comments', 'agama-pro' )
					);
				}
			}
		}
		
		if( $blog['author'] || $blog['date'] || $blog['category'] || $blog['comments'] )
			echo '</p>';
	}
}
add_action( 'agama_blog_post_meta', 'agama_render_blog_post_meta', 10 );

/**
 * Agama Credits
 *
 * @since Agama v1.0.1
 */
if( ! function_exists( 'agama_render_credits' ) ) {
	function agama_render_credits() {
		echo html_entity_decode( get_theme_mod( 'agama_footer_copyright', sprintf(__( '2015 - 2016 &copy; Powered by %s.', 'agama-pro' ), '<a href="http://www.theme-vision.com" target="_blank">Theme-Vision</a>' ) ) );
	}
}
add_action( 'agama_credits', 'agama_render_credits' );

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
