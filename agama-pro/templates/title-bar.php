<?php 

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
} 
	
global $post;
	
$breadcrumb['enable'] 	= esc_attr( get_theme_mod( 'agama_breadcrumb', true ) );
$breadcrumb['on_home'] 	= esc_attr( get_theme_mod( 'agama_breadcrumb_on_home', true ) );
$breadcrumb['single']	= esc_attr( Agama::get_meta( '_agama_breadcrumb', 'on' ) ); 
$breadcrumb['on_shop']  = '';

// Enables breadcrumb on Shop Page.
if( class_exists( 'Woocommerce' ) ) {
    $breadcrumb['on_shop'] = is_shop();
} ?>

<?php 
if( $breadcrumb['enable'] && $breadcrumb['on_home'] && is_home() && is_front_page() || 
	$breadcrumb['enable'] && $breadcrumb['single'] == 'on' && is_single() ||
    $breadcrumb['enable'] && $breadcrumb['single'] == 'on' && is_page() ||
    $breadcrumb['enable'] && $breadcrumb['on_shop'] ): ?>

<div class="vision-page-title-bar vision-page-title-bar-breadcrumbs vision-page-title-bar-left">
	<div class="vision-page-title-row">
		<div class="vision-page-title-wrapper">
		
			<div class="vision-page-title-captions">
				<h1 class="bc-title">
				<?php
					if( Agama::get_meta( '_agama_breadcrumb_title', '' ) ) {
						echo esc_html( Agama::get_meta('_agama_breadcrumb_title', '') );
					}
					else
					if( is_home() && is_front_page() || is_front_page() ) {
						_e( 'Home', 'agama-pro' );
					} else {
						wp_title( '' );
					}
				?>
				</h1>
			</div>
			
			<div class="vision-page-title-secondary">
				<?php do_action( 'vision_breadcrumb' ); ?>
			</div>
		
		</div>
	</div>
</div>

<?php endif; ?>
