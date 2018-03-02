<?php 

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $meta_custom_logo;

$cart_icon = esc_attr( get_theme_mod( 'agama_header_cart_icon', true ) ); ?>

<div class="sticky-header clearfix">
	<div class="sticky-header-inner clear">
		
		<div class="pull-left">
            <?php if( $meta_custom_logo ): ?>
                <a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="vision-logo-url">
                    <img src="<?php echo esc_url( $meta_custom_logo ); ?>" class="logo">
                </a>
			<?php elseif( get_theme_mod( 'agama_logo', '' ) ): ?>
				<a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="vision-logo-url">
					<img src="<?php echo esc_url( get_theme_mod( 'agama_logo', '' ) ); ?>" class="logo">
				</a>
			<?php else: ?>
				<h1 class="site-title" style="padding: 0 15px;"><a href="<?php echo esc_url( home_url('/') ); ?>" class="vision-logo-url"><?php bloginfo( 'name' ); ?></a></h1>
			<?php endif; ?>
		</div>
		
		<!-- Primary Navigation -->
		<nav role="navigation" class="pull-right agama-primary-nav">
			<?php echo Agama::menu( 'agama_nav_primary', 'sticky-nav' ); ?>
		</nav><!-- Primary Navigation -->
		
		<ul class="mobile-menu-icons">
			<?php if( class_exists( 'Woocommerce' ) && $cart_icon ): ?>
			<li id="agama_wc_cart">
				<a href="<?php echo wc_get_cart_url(); ?>" class="shopping_cart"></a>
				<div class="cart_count"></div>
			</li>
			<?php endif; ?>
			<li><a href="#mobile-menu" data-toggle="collapse" class="mobile-menu-toggle collapsed"></a></li>
		</ul>
	</div>
</div>

<?php Agama::mobileNav(); ?>