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

$img_src = agama_return_image_src('blog-small'); 
$img_hover_class = Agama::blog_thumbs_hover_class(); ?>

<!-- Small Thumbs Layout -->
<div class="small-thumbs">

	 <div class="entry clearfix">
		
        <?php if( Agama::get_meta( '_agama_post_video', '', get_the_ID() ) ): ?>
        <div class="entry-image">
             <?php echo Agama::get_meta( '_agama_post_video', '', get_the_ID() ); ?>
        </div>
		<?php elseif( has_post_thumbnail() ): ?>
		<div class="entry-image">
			<?php if( get_theme_mod( 'agama_blog_thumbnails_permalink', true ) ): ?>
				<?php printf( '<a href="%s" %s><img src="%s" %s></a>', $img_href, $data_lightbox, $img_src, $img_hover_class ); ?>
			<?php else: ?>
				<?php printf( '<img src="%s" %s>', $img_src, $img_hover_class ); ?>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		
		<div class="entry-c">
			
			<div class="entry-title">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			</div>
			
			<?php if( get_theme_mod( 'agama_post_meta', true ) ): ?>
			<ul class="entry-meta clearfix">
				
				<?php if( get_theme_mod( 'agama_blog_author', true ) ): ?>
				<li><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><i class="fa fa-user"></i> <?php the_author(); ?></a></li>
				<?php endif; ?>
				
				<?php if( get_theme_mod( 'agama_blog_date', true ) ): ?>
				<li><i class="fa fa-calendar"></i> <?php echo get_the_date();  ?></li>
				<?php endif; ?>
				
				<?php if( get_theme_mod( 'agama_blog_category', true ) ): ?>
				<li><i class="fa fa-folder-open"></i> <?php echo get_the_category_list(', '); ?></li>
				<?php endif; ?>
				
				<?php if( get_theme_mod( 'agama_blog_comments_count', true ) ): ?>
				<li><a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comments"></i> <?php echo Agama::comments_count(); ?></a></li>
				<?php endif; ?>
				
			</ul>
			<?php endif; ?>
			
			<!-- Entry Content -->
			<div class="entry-content">
				
				<?php the_excerpt(); ?>

			</div><!-- Entry Content End -->
			
		</div>
	
	</div>

</div><!-- Small Thumbs Layout End-->