<?php
/**
 * The template for displaying all pages
 *
 * @package Theme-Vision
 * @subpackage Agama
 */

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
} ?>

<?php get_header(); ?>
    
    <!-- Primary -->
	<div id="primary" class="site-content <?php Agama::bs_class(); ?>">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				
				<?php comments_template( '', true ); ?>
			<?php endwhile; ?>

		</div>
	</div><!-- Primary End -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
