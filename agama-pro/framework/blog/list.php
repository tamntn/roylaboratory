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

$img_src = agama_return_image_src('blog-large'); ?>

<?php if( Agama::get_meta( '_agama_post_video', '', get_the_ID() ) ): ?>
<header class="entry-header">
    <?php echo Agama::get_meta( '_agama_post_video', '', get_the_ID() ); ?>
</header>
<?php elseif( has_post_thumbnail() ): ?>
<header class="entry-header">
	<figure <?php Agama::blog_thumbs_hover_class(); ?>>
		<?php if( get_theme_mod( 'agama_blog_thumbnails_permalink', true ) ): ?>
			<?php printf( '<a href="%s" %s><img src="%s" class="%s"></a>', $img_href, $data_lightbox, $img_src, 'img-responsive' ); ?>
		<?php else: ?>
			<?php printf( '<img src="%s" class="%s">', $img_src, 'img-responsive' ); ?>
		<?php endif; ?>
	</figure>
</header>
<?php endif; ?>

<!-- Article Entry Wrapper -->
<div class="article-entry-wrapper">
	
	<?php 
	/**
	 * agama_blog_post_date_and_format hook
	 *
	 * @hooked agama_render_blog_post_date - 10 (output HML post date & format)
	 */
	do_action( 'agama_blog_post_date_and_format' ); ?>
	
	<!-- Entry Content -->
	<div class="entry-content">
	
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		
		<?php Agama::post_meta(); ?>
		
		<?php the_excerpt(); ?>
	
	</div><!-- Entry Content End -->
	
</div><!-- Article Entry Wrapper End -->