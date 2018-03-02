<?php
/**
 * Template Name: Full-width Page
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
	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php get_template_part( 'content', 'page' ); ?>
				
				<?php if( ! is_front_page() && Agama::get_meta('_agama_enable_comments', 'on') == 'on' ): ?>
					<?php comments_template( '', true ); ?>
				<?php endif; ?>
				
			<?php endwhile; // end of the loop. ?>

		</div>
	</div><!-- Primary End -->

<?php get_footer(); ?>