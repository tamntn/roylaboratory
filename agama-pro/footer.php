<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama 1.0
 */

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
} ?>		
			
				<?php if( get_theme_mod( 'agama_frontpage_boxes_position', 'top' ) == 'bottom' ): ?>
					<?php Agama::get_front_page_boxes(); ?>
				<?php endif; ?>
			
			</div><!-- Container End -->
		</div><!-- Main Wrapper End -->
	</div><!-- Page End -->
	
	<!-- Footer Wrapper -->
	<div id="footer-wrapper">
    <?php 
        $count  = 0;
        $offset = false;
        
        if( is_active_sidebar( 'footer-widget-1' ) )
            $count++;
        
        if( is_active_sidebar( 'footer-widget-2' ) )
            $count++;
        
        if( is_active_sidebar( 'footer-widget-3' ) )
            $count++;
        
        if( is_active_sidebar( 'footer-widget-4' ) )
            $count++;
        
        if( is_active_sidebar( 'footer-widget-5' ) )
            $count++;
        
        if( is_active_sidebar( 'footer-widget-6' ) )
            $count++;
        
        switch( $count ) {
            case '1':
                $class = 'col-md-12';
            break;
            case '2':
                $class = 'col-md-6';
            break;
            case '3':
                $class = 'col-md-4';
            break;
            case '4':
                $class = 'col-md-3';
            break;
            case '5':
                $offset = 'col-md-offset-1';
                $class  = 'col-md-2';
            break;
            case '6':
                $class = 'col-md-2';
            break;
        }
        
		if( $count ): ?>
		<!-- Footer Widgets -->
		<div class="footer-widgets">
			<div class="container">
				
				<?php if( is_active_sidebar( 'footer-widget-1' ) ): ?>
				<div class="<?php echo esc_attr( $class ) . ' ' . esc_attr( $offset ); ?>">
					<?php dynamic_sidebar( 'footer-widget-1' ); ?>
				</div>
				<?php endif; ?>
				
				<?php if( is_active_sidebar( 'footer-widget-2' ) ): ?>
				<div class="<?php echo esc_attr( $class ); ?>">
					<?php dynamic_sidebar( 'footer-widget-2' ); ?>
				</div>
				<?php endif; ?>
				
				<?php if( is_active_sidebar( 'footer-widget-3' ) ): ?>
				<div class="<?php echo esc_attr( $class ); ?>">
					<?php dynamic_sidebar( 'footer-widget-3' ); ?>
				</div>
				<?php endif; ?>
				
				<?php if( is_active_sidebar( 'footer-widget-4' ) ): ?>
				<div class="<?php echo esc_attr( $class ); ?>">
					<?php dynamic_sidebar( 'footer-widget-4' ); ?>
				</div>
				<?php endif; ?>
                
                <?php if( is_active_sidebar( 'footer-widget-5' ) ): ?>
				<div class="<?php echo esc_attr( $class ); ?>">
					<?php dynamic_sidebar( 'footer-widget-5' ); ?>
				</div>
				<?php endif; ?>
                
                <?php if( is_active_sidebar( 'footer-widget-6' ) ): ?>
				<div class="<?php echo esc_attr( $class ); ?>">
					<?php dynamic_sidebar( 'footer-widget-6' ); ?>
				</div>
				<?php endif; ?>
				
			</div>
		</div><!-- Footer Widgets End -->
		<?php endif; ?>
		
		<?php
		$footer_social	= esc_attr( get_theme_mod( 'agama_footer_social', true ) );
		$back_to_top	= esc_attr( get_theme_mod( 'agama_to_top', true ) );
		
		if( $footer_social ) {
			$cp_class = 'col-md-6';
		} else {
			$cp_class = 'col-md-12';
		} ?>
		
		<!-- Footer Start -->
		<footer id="colophon" class="clear" role="contentinfo">
			<div class="footer-sub-wrapper clear">
				<div class="site-info <?php echo esc_attr( $cp_class ); ?>">
					<?php do_action('agama_credits'); ?>
				</div>
				
				<?php if( $footer_social ): ?>
				<div class="social <?php echo esc_attr( $cp_class ); ?>">
					<?php Agama::sociali( 'top' ); ?>
				</div>
				<?php endif; ?>
			</div>
		</footer><!-- Footer End -->
	
	</div><!-- Footer Wrapper End -->
	
</div><!-- Main Wrapper End -->

<?php if( $back_to_top ): ?>
    <?php if( is_customize_preview() ): ?>
        <?php echo sprintf( '<span class="to-top-cpreview"><a id="%s"><i class="%s"></i></a></span>', 'toTop', 'fa fa-angle-up' ); ?>
    <?php else: ?>
        <?php echo sprintf( '<a id="%s"><i class="%s"></i></a>', 'toTop', 'fa fa-angle-up' ); ?>
    <?php endif; ?>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
