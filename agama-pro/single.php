<?php 
/**
 * Display Single Posts
 *
 * @package ThemeVision
 * @subpackage Agama
 * @since Agama 1.0
 */

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
 
get_header(); 

$breadcrumb       = esc_attr( get_theme_mod( 'agama_breadcrumb', true ) );
$breadcrumb_meta  = esc_attr( Agama::get_meta( '_agama_breadcrumb', true ) );
$agama_share_area = get_theme_mod( 'agama_share_box_visibility', 'posts' ); 
$img_src          = agama_return_image_src('blog-large'); ?>

	<!-- Single Article -->
	<div id="primary" class="site-content <?php Agama::bs_class(); ?>">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<!-- Article Wrapper -->
				<div class="article-wrapper <?php agama_article_wrapper_class(); ?>">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="article-entry-wrapper">
						
							<?php if( has_post_thumbnail() && get_theme_mod( 'agama_blog_single_featured_thumbs', false ) ): ?>
							<!-- Article Header -->
							<header class="entry-header">
								<figure <?php Agama::blog_thumbs_hover_class(); ?>>
									<?php printf( '<img src="%s" class="%s">', $img_src, 'img-responsive' ); ?>
								</figure>
							</header><!-- Article Header End -->
							<?php endif; ?>
						
							<?php 
							/**
							 * agama_blog_post_date_and_format hook
							 *
							 * @hooked agama_render_blog_post_date - 10 (output HML post date & format)
							 */
							do_action( 'agama_blog_post_date_and_format' ); ?>
							
							<!-- Entry Content -->
							<div class="entry-content">
								
								<?php if( ! $breadcrumb || $breadcrumb_meta == 'off' ): ?>
								<h1 class="entry-title"><?php the_title(); ?></h1>
                                <?php endif; ?>
								
								
								<?php Agama::post_meta(); ?>
								
								<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'agama-pro' ) ); ?>
								
								<?php Agama::tags(); ?>
								
								<?php if( $agama_share_area == 'posts' || $agama_share_area == 'all' ): ?>
									
									<?php Agama::share(); ?>
									
								<?php endif; ?>
								
								<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'agama-pro' ), 'after' => '</div>' ) ); ?>
							
							</div><!-- Entry Content End -->
						
						
							<!-- Entry Meta -->
							<footer class="entry-meta">
								<?php edit_post_link( __( 'Edit', 'agama-pro' ), '<span class="edit-link">', '</span>' ); ?>
								<?php if ( is_singular() && get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on his entries. ?>
									<div class="author-info">
										<div class="author-avatar">
											<?php
											/** This filter is documented in author.php */
											$author_bio_avatar_size = apply_filters( 'agama_author_bio_avatar_size', 68 );
											echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
											?>
										</div><!-- .author-avatar -->
										<div class="author-description">
											<h2><?php printf( __( 'About %s', 'agama-pro' ), get_the_author() ); ?></h2>
											<p><?php the_author_meta( 'description' ); ?></p>
											<div class="author-link">
												<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
													<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'agama-pro' ), get_the_author() ); ?>
												</a>
											</div><!-- .author-link	-->
										</div><!-- .author-description -->
									</div><!-- .author-info -->
								<?php endif; ?>
							</footer><!-- Entry Meta End -->
						
						</div>
					</article>
				</div><!-- Article Wrapper End -->
				
				<?php Agama_Helper::get_single_post_nav(); ?>
				
				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div>
	</div><!-- Single Article End -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
