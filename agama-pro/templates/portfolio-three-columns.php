<?php
/**
 * Template Name: Portfolio 3 Columns
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since 1.0.1
 */

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
} ?>
	
    <?php get_header(); ?>
	
	<?php
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$slug  = esc_attr( get_theme_mod( 'agama_portfolio_page_slug', 'agama_portfolio' ) );
	$args  = array( 
		'post_type' => $slug, 
		'posts_per_page' => esc_attr( get_theme_mod( 'agama_portfolio_per_page', '12' ) ),
		'paged' => $paged
	); 
	
	$loop = new WP_Query( $args ); 
	
	// Get portfolio item category names
    $category  = array();
	$tax_terms = get_terms('portfolio_categories');
	foreach ($tax_terms as $tax_term) {
		$category[] = $tax_term->name;
	} ?>
	
	<div id="primary">
		<div class="container" role="main">
		<?php if( $loop->have_posts() ): ?>
		
			<?php if( is_array( $category ) && get_theme_mod( 'agama_portfolio_nav_filter', true ) ): ?>
			<!-- Portfolio Filter -->
			<ul id="portfolio-filter" class="single clearfix">

				<li class="activeFilter"><a href="#" data-filter="*"><?php _e( 'Show All', 'agama-pro' ); ?></a></li>
				
				<?php foreach( $category as $filter ): ?>
				<li><a href="#" data-filter="<?php echo '.'.strtolower($filter); ?>"><?php echo $filter; ?></a></li>
				<?php endforeach; ?>

			</ul><!-- Portfolio Filter End -->
			<?php endif; ?>
			
			<div class="clear"></div>
			
			<!-- Portfolio Items -->
			<div id="portfolio" class="portfolio-3 clearfix">
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					
					<?php get_template_part( 'content', 'portfolio' ); ?>
					
				<?php endwhile; wp_reset_postdata(); ?>
			</div><!-- Portfolio Items End -->
		
		<?php endif; ?>
		</div>
		
		<?php Agama_Helper::get_pagination( 'agama_portfolio' ); ?>
		
	</div>
	
	 <!-- Portfolio Script -->
	<script type="text/javascript">
	jQuery(window).load(function(){
		var $container = jQuery('#portfolio');

		$container.isotope({ transitionDuration: '0.65s' });

		jQuery('#portfolio-filter a').click(function(){
			jQuery('#portfolio-filter li').removeClass('activeFilter');
			jQuery(this).parent('li').addClass('activeFilter');
			var selector = jQuery(this).attr('data-filter');
			$container.isotope({ filter: selector });
			return false;
		});

		jQuery('#portfolio-shuffle').click(function(){
			$container.isotope('updateSortData').isotope({
				sortBy: 'random'
			});
		});

		jQuery(window).resize(function() {
			$container.isotope('layout');
		});
	});
	</script><!-- Portfolio Script End -->

<?php get_footer(); ?>