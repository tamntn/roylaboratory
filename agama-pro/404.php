<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama 1.0
 */

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
} ?>

<?php get_header(); ?>
    
    <!-- Primary -->
	<div id="primary" class="site-content col-md-12">
		<div id="content" role="main">
			<article id="post-0" class="post error404 no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title align-center"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'agama-pro' ); ?></h1>
				</header>

				<div class="entry-content">
					<p class="desc-404 align-center"><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'agama-pro' ); ?></p>
                    <p class="num-404 align-center">404</p>
					<?php get_search_form(); ?>
				</div>
			</article>
		</div>
	</div><!-- Primary End -->

<?php get_footer(); ?>
