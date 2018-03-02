<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama 1.0
 */

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
} ?>
	
<?php if( Agama::get_meta( '_agama_enable_sidebar', 'on' ) == 'on' && is_active_sidebar( 'sidebar-1' ) ): ?>
    <!-- Sidebar -->
    <div id="secondary" class="widget-area col-md-3" role="complementary">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div><!-- Sidebar End -->
<?php endif; ?>