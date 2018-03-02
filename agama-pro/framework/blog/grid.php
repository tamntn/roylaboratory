<?php 

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

$agama_share_area 	= get_theme_mod( 'agama_share_box_visibility', 'posts' );

$img_src = agama_return_image_src('post-thumbnail'); ?>

<!-- Article Header -->
<header class="entry-header">

    <?php if( Agama::get_meta( '_agama_post_video', '', get_the_ID() ) ): ?>
        <?php echo Agama::get_meta( '_agama_post_video', '', get_the_ID() ); ?>
	<?php elseif( has_post_thumbnail() ): ?>
	<figure <?php Agama::blog_thumbs_hover_class(); ?>>
		<?php if( get_theme_mod( 'agama_blog_thumbnails_permalink', true ) ): ?>
			<?php printf( '<a href="%s" %s><img src="%s" class="%s"></a>', $img_href, $data_lightbox, $img_src, 'img-responsive' ); ?>
		<?php else: ?>
			<?php printf( '<img src="%s" class="%s">', $img_src, 'img-responsive' ); ?>
		<?php endif; ?>
	</figure>
	<?php endif; ?>
	
	<h1 class="entry-title">
		<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h1>
	
	<?php Agama::post_meta(); ?>

</header><!-- Article Header End -->

<div class="entry-sep"></div>

<!-- Article Entry Wrapper -->
<div class="article-entry-wrapper">

	<div class="entry-content">
	
		<?php the_excerpt(); ?>
		
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'agama-pro' ), 'after' => '</div>' ) ); ?>
	
	</div>
	
	<footer class="entry-meta">
		
		<?php edit_post_link( __( 'Edit', 'agama-pro' ), '<span class="edit-link">', '</span>' ); ?>
		
	</footer>

</div><!-- Article Entry Wrapper End -->