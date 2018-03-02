<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama 1.0
 */

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
} ?>
    
    <!-- Article -->
	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h1 class="entry-title"><?php _e( 'Nothing Found', 'agama-pro' ); ?></h1>
		</header>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'agama-pro' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</article><!-- Article End -->
