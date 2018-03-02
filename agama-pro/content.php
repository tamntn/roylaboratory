<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama 1.0
 */

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

$agama_lightbox = get_theme_mod( 'agama_blog_lightbox', true );

if( $agama_lightbox == 'on' ) {
	$data_lightbox 	= 'data-lightbox="image"';
	$img_href 		= agama_return_image_src('full');
} else {
	$data_lightbox	= '';
	$img_href 		= get_permalink();
} 

$agama_share_area 	= get_theme_mod( 'agama_share_box_visibility', 'posts' ); ?>
    
    <!-- Article Wrapper -->
	<div class="article-wrapper <?php agama_article_wrapper_class(); ?>"<?php Agama::data_animated(); ?>>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php 
		###################################################################
		# SWITCH BLOG LAYOUTS
		###################################################################
		$layout = esc_attr( get_theme_mod( 'agama_blog_layout', 'list' ) );
		switch( $layout ):
			case 'list':
				get_template_part( 'framework/blog/list' );
			break;
			case 'grid':
				get_template_part( 'framework/blog/grid' );
			break;
			case 'small_thumbs':
				get_template_part( 'framework/blog/small_thumbs' );
			break;
		endswitch; ?>
		</article>
	</div><!-- Article Wrapper End -->
