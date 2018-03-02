<?php 

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $meta_custom_logo;

$cart_icon = esc_attr( get_theme_mod( 'agama_header_cart_icon', true ) ); ?>

<!-- Top Wrapper -->
<div class="top-nav-wrapper">
	
	<div class="top-nav-sub-wrapper">
		
		<?php if( get_theme_mod( 'agama_top_navigation', true ) ): ?>
		<nav id="top-navigation" class="top-navigation agama-top-nav pull-left" role="navigation">
			
			<?php echo Agama::menu( 'agama_nav_top', 'top-nav-menu' ); ?>
			
		</nav>
		<?php endif; ?>
		
		<?php if( get_theme_mod( 'agama_top_nav_social', true ) ): ?>
			<div id="top-social" class="pull-right">
				<?php Agama::sociali( false, 'animated' ); ?>
			</div>
		<?php endif; ?>
		
	</div>
	
</div><!-- Top Wrapper End -->

<hgroup>
    
    <?php if( $meta_custom_logo ): ?>
        <a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="vision-logo-url">
            <img src="<?php echo esc_url( $meta_custom_logo ); ?>" class="logo">
        </a>
	<?php elseif( get_theme_mod( 'agama_logo', '' ) ): ?>
		<a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="vision-logo-url">
			<img src="<?php echo esc_url( get_theme_mod( 'agama_logo', '' ) ); ?>" class="logo">
		</a>
	<?php else: ?>
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="vision-logo-url"><?php bloginfo( 'name' ); ?></a></h1>
		<?php if( get_bloginfo( 'description' ) ): ?>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		<?php endif; ?>
	<?php endif; ?>
	
	<ul class="mobile-menu-icons clear">
		<?php if( class_exists( 'Woocommerce' ) && $cart_icon ): ?>
		<li id="agama_wc_cart">
			<a href="<?php echo wc_get_cart_url(); ?>" class="shopping_cart"></a>
			<div class="cart_count"></div>
		</li>
		<?php endif; ?>
		<li><a href="#mobile-menu" data-toggle="collapse" class="mobile-menu-toggle collapsed"></a></li>
	</ul>
	
</hgroup>

<!-- Primary Navigation -->
<nav id="site-navigation" class="main-navigation agama-primary-nav clear" role="navigation">
	<div class="main-navigation-sub-wrapper">
		<?php echo Agama::menu( 'agama_nav_primary', 'nav-menu' ); ?>
	</div>
</nav><!-- Primary Navigation -->

<?php Agama::mobileNav(); ?>