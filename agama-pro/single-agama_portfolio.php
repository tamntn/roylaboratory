<?php
/**
 * The template for displaying single portfolio posts
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama 1.1.3
 */

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); 
    
    $embed = Agama::get_meta( '_agama_pt_video', '' );
    
	$pt_skills_args = array(
		'before'		=> '<li>',
		'after'			=> '</li>',
		'before_title'	=> '<span><i class="fa fa-lightbulb-o"></i>',
		'after_title'	=> '</span>',
		'title'			=> __( 'Skills', 'agama-pro' ).':',
		'separator'		=> ' / '
	); ?>
	
	<div id="primary" class="site-content col-md-12">
		<div role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
                <?php if( ! empty( $embed ) ): ?>
                    <!-- Video Embed -->
                    <div class="col-md-8 portfolio-single-image nobottommargin">
                        <?php echo $embed; ?>
                    </div><!-- Video Embed End -->
				<?php elseif( has_post_thumbnail() ): ?>
				<!-- Portfolio Image -->
				<div class="col-md-8 portfolio-single-image nobottommargin">
					<a href="<?php echo agama_return_image_src('portfolio-full'); ?>" data-lightbox="image">
						<img src="<?php echo agama_return_image_src('portfolio-one'); ?>" class="img-responsive" alt="<?php the_title(); ?>">
					</a>
				</div><!-- Portfolio Image End -->
				<?php endif; ?>
				
				<!-- Portfolio Content -->
				<div class="col-md-4 portfolio-single-content nobottommargin">

					<!-- Portfolio Description-->
					<div class="fancy-title title-bottom-border">
						<h2><?php _e( 'Project Info', 'agama-pro' ); ?>:</h2>
					</div>
					
					<?php the_excerpt(); ?>
					
					<!-- Portfolio Description End -->
					<div class="line"></div>

					<!-- Portfolio Meta -->
					<ul class="portfolio-meta bottommargin">
						
						<?php if( Agama::get_meta('_agama_pt_created_by', '') ): ?>
						<li><span><i class="fa fa-user"></i><?php _e( 'Created by', 'agama-pro' ); ?>:</span> <?php echo esc_html( Agama::get_meta('_agama_pt_created_by', '') ); ?></li>
						<?php endif; ?>
						
						<?php if( Agama::get_meta('_agama_pt_completed_on', '') ): ?>
						<li><span><i class="fa fa-calendar"></i><?php _e( 'Completed on', 'agama-pro' ); ?>:</span> <?php echo Agama::get_meta('_agama_pt_completed_on', ''); ?></li>
						<?php endif; ?>
						
						<?php Agama::portfolio_skills( $pt_skills_args ); ?>
						
						<?php if( Agama::get_meta('_agama_pt_project_url') || Agama::get_meta('_agama_pt_project_url_txt') ): ?>
						<li><span><i class="fa fa-link"></i><?php _e( 'Client', 'agama-pro' ); ?>:</span> <a href="<?php echo esc_url( Agama::get_meta('_agama_pt_project_url', '#') ); ?>"><?php echo esc_attr( Agama::get_meta('_agama_pt_project_url_txt', 'Client') ); ?></a></li>
						<?php endif; ?>
						
					</ul><!--.portfolio-meta-->

					<?php if( get_theme_mod( 'agama_portfolio_share', true ) ): ?>
					<!-- Portfolio Share -->
					<div class="si-share clearfix">
						<span><?php _e( 'Share', 'agama-pro' ); ?>:</span>
						<div>
							<a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="social-icon si-borderless si-facebook">
								<i class="fa fa-facebook"></i>
								<i class="fa fa-facebook"></i>
							</a>
							<a target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" class="social-icon si-borderless si-twitter">
								<i class="fa fa-twitter"></i>
								<i class="fa fa-twitter"></i>
							</a>
							<a target="_blank" href="http://pinterest.com/pinthis?url=<?php the_permalink(); ?>" class="social-icon si-borderless si-pinterest">
								<i class="fa fa-pinterest"></i>
								<i class="fa fa-pinterest"></i>
							</a>
							<a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="social-icon si-borderless si-gplus">
								<i class="fa fa-google-plus"></i>
								<i class="fa fa-google-plus"></i>
							</a>
							<a target="_blank" href="<?php echo esc_url( get_bloginfo('rss2_url') ); ?>" class="social-icon si-borderless si-rss">
								<i class="fa fa-rss"></i>
								<i class="fa fa-rss"></i>
							</a>
							<a target="_blank" href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>" class="social-icon si-borderless si-email3">
								<i class="fa fa-envelope"></i>
								<i class="fa fa-envelope"></i>
							</a>
						</div>
					</div><!-- Portfolio Share End -->
					<?php endif; ?>
				
				</div>
			<?php endwhile; // end of the loop. ?>
			
			<div class="clear"></div>

            <div class="divider divider-center"><i class="fa fa-circle"></i></div>

		</div><!-- #content -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>