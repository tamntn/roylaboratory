<?php
/**
 * The template for displaying posts in the Aside post format
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama 1.0
 */

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
} ?>

	<div class="article-wrapper <?php agama_article_wrapper_class(); ?>">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="aside">
				<header><i class="fa fa-2x fa-outdent"></i></header>
				
				<?php if( get_theme_mod( 'agama_blog_layout', 'list' ) == 'grid' ):  ?>
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				<?php
				/**
				 * agama_blog_post_meta hook
				 *
				 * @hooked agama_render_blog_post_meta - 10  (output HTML post meta details)
				 */
				do_action( 'agama_blog_post_meta' ); ?>
				<?php endif; ?>
				
				<?php
				if( get_theme_mod( 'agama_blog_layout', 'list' ) == 'list' ):
				/**
				 * agama_blog_post_date_and_format hook
				 *
				 * @hooked agama_render_blog_post_date - 10 (output HML post date & format)
				 */
				do_action( 'agama_blog_post_date_and_format' ); 
				endif;
				?>
				
				<div class="entry-content">
				
					<?php if( get_theme_mod( 'agama_blog_layout', 'list' ) == 'list' ):  ?>
					<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					<?php
						/**
						 * agama_blog_post_meta hook
						 *
						 * @hooked agama_render_blog_post_meta - 10  (output HTML post meta details)
						 */
						echo '<p class="single-line-meta">';
						do_action( 'agama_blog_post_meta' );
						echo '</p>';
					?>
					<?php endif; ?>
					
					<?php if( ! is_sticky() && get_theme_mod( 'agama_blog_layout', 'list' ) !== 'list' ): // Separator ?>
					<div class="entry-sep"></div>
					<?php endif; ?>
				
					<?php if( is_single() ): ?>
						<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'agama-pro' ) ); ?>
					<?php else: ?>
						<?php the_excerpt(); ?>
					<?php endif; ?>
				</div><!-- .entry-content -->
			</div><!-- .aside -->
			
			<footer class="entry-meta">
				<?php edit_post_link( __( 'Edit', 'agama-pro' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->
		</article><!-- #post -->
	</div><!-- .article-wrapper -->
