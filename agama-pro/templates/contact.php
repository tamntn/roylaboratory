<?php

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Template Name: Contact Page
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama 1.1.9
 */
get_header(); ?>

	<?php 
    $agama_contact_title    = esc_html( get_theme_mod( 'agama_contact_title', __( 'Send us an Email', 'agama-pro' ) ) );
	$recaptcha_public		= esc_attr( get_theme_mod( 'agama_contact_recaptcha_public', '6LcQPBATAAAAAPcFZuuB1xU6f2soSvfGSY9z7kWj' ) );
	$recaptcha_private		= esc_attr( get_theme_mod( 'agama_contact_recaptcha_secret', '6LcQPBATAAAAAEQrIHe9sN82eCLuGrmOKfmuA6oE' ) );
	$agama_contact_phone	= esc_attr( get_theme_mod( 'agama_contact_phone', '(381) 000 111 22' ) );
	$agama_contact_fax	  	= esc_attr( get_theme_mod( 'agama_contact_fax', '(381) 000 111 23' ) );
	$agama_contact_email	= esc_attr( get_theme_mod( 'agama_contact_email', get_option('admin_email') ) );
	$agama_contact_address  = get_theme_mod( 'agama_contact_address', 'Test Address' ); 
	$agama_contact_map_type = esc_attr( get_theme_mod( 'agama_contact_map_type', 'roadmap' ) ); 
	$agama_contact_country  = esc_attr( get_theme_mod( 'agama_contact_country', 'Australia, Melbourn' ) ); 
	$agama_contact_map_api 	= esc_attr( get_theme_mod( 'agama_contact_map_api', 'AIzaSyDHJua6agj_4ZkTQwMwNgD3fo-svqXlN8Q' ) );
    $agama_contact_btn_txt  = esc_html( get_theme_mod( 'agama_contact_btn_txt', __( 'Send Message', 'agama-pro' ) ) );
	
	if( is_ssl() ) {
		$url = '';
	}
	
	if( isset( $_POST['formsubmit'] ) ){
		
		$namefrom	 = isset( $_POST['namefrom'] ) ? sanitize_text_field( $_POST['namefrom'] ) : '';
		$emailfrom	 = isset( $_POST['emailfrom'] ) ? sanitize_email( $_POST['emailfrom'] ) : '';
		$subjectfrom = isset( $_POST['subjectfrom'] ) ? sanitize_text_field( $_POST['subjectfrom'] ) : '';
		$messagefrom = isset( $_POST['messagefrom'] ) ? sanitize_text_field( $_POST['messagefrom'] ) : '';
		
		if( empty( $namefrom ) ) 	$error = true;
		if( empty( $emailfrom ) )	$error = true;
		if( empty( $subjectfrom ) ) $error = true;
		if( empty( $messagefrom ) ) $error = true;
		
		// reCaptcha v2
		if( $recaptcha_public && $recaptcha_private ) {
			
			$response = $_POST['g-recaptcha-response'];
			
			if( ! empty( $response ) ) {
				$verified = Agama::verifyCaptcha( $response );
				
				if( ! $verified ) {
					$recaptcha_error = true;
				}
			} else {
				$recaptcha_error = true;
			}
			
		}
		
		// If there is no error, proceed with sending message
		if( $error == '' && $verified ) {
			$body  = __( 'Name:', 'agama-pro' )." $namefrom \n\n";
			$body .= __( 'Email:', 'agama-pro' )." $emailfrom \n\n";
			$body .= __( 'Subject:', 'agama-pro' )." $subjectfrom \n\n";
			$body .= __( 'Message:', 'agama-pro' )."\n $messagefrom";
			
			$headers  = 'Reply-To: ' . $namefrom . ' <' . $emailfrom . '>' . "\r\n";
			$headers .= 'From: '. get_bloginfo('name') . ' <' . $agama_contact_email . '>' . "\r\n";
			
			$mail = mail( $agama_contact_email, $subjectfrom, $body, $headers );
		}
		
	} ?>

	<!-- Contact Form & Map Overlay Section
	============================================= -->
	<section id="map-overlay" style="margin-top:-50px; margin-left:-20px; margin-right:-20px;">

		<div class="container clearfix">

			<!-- Contact Form Overlay -->
			<div id="contact-form-overlay" class="clearfix">

				<div class="fancy-title title-dotted-border">
					<h3><?php echo $agama_contact_title; ?></h3>
				</div>

				<div id="contact-form-result">
					<?php if( $error ): ?>
					
						<div class="alert alert-warning">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<i class="fa fa-warning"></i> 
							<strong><?php _e( 'Warning!', 'agama-pro' ); ?></strong> 
							<?php _e( 'All fields must be filled!', 'agama-pro' ); ?>
						</div>
					
					<?php elseif( isset( $recaptcha_error ) ): ?>
					
						<div class="alert alert-warning">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<i class="fa fa-warning"></i> 
							<strong><?php _e( 'Warning!', 'agama-pro' ); ?></strong> 
							<?php _e( 'reCAPTCHA error!', 'agama-pro' ); ?>
						</div>
						
					<?php elseif( isset( $mail ) ): ?>
					 
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<i class="fa fa-check"></i> 
							<strong><?php _e( 'Well done!', 'agama-pro' ); ?></strong> 
							<?php _e( 'Your message was sent successfully!', 'agama-pro' ); ?>
						</div>
					 
					<?php endif; ?>
				</div>

				<!-- Contact Form -->
				<form class="nobottommargin" id="template-contactform" name="template-contactform" method="post">
					
					<div class="row" style="margin-bottom:25px;">
						<div class="col-md-6">
							<label for="template-contactform-name"><?php _e( 'Name', 'agama-pro' ); ?> <small>*</small></label>
							<input type="text" id="template-contactform-name" name="namefrom" value="" class="sm-form-control required" />
						</div>

						<div class="col-md-6">
							<label for="template-contactform-email"><?php _e( 'Email', 'agama-pro' ); ?> <small>*</small></label>
							<input type="email" id="template-contactform-email" name="emailfrom" value="" class="required email sm-form-control" />
						</div>
					</div>

					<div class="clear"></div>
				
					
					<div class="row" style="margin-bottom:25px;">
						<div class="col-md-12">
							<label for="template-contactform-subject"><?php _e( 'Subject', 'agama-pro' ); ?> <small>*</small></label>
							<input type="text" id="template-contactform-subject" name="subjectfrom" value="" class="required sm-form-control" />
						</div>
					</div>
					
					<div class="row" style="margin-bottom:25px;">
						<div class="col-md-12">
							<label for="template-contactform-message"><?php _e( 'Message', 'agama-pro' ); ?> <small>*</small></label>
							<textarea class="required sm-form-control" id="template-contactform-message" name="messagefrom" rows="6" cols="30"></textarea>
						</div>
					</div>

					<div class="col_full" style="margin-bottom: 25px;">
						<div class="g-recaptcha" data-sitekey="<?php echo $recaptcha_public; ?>"></div>
					</div>

					<div class="col_full vision-contact-submit">
						<button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="formsubmit" value="submit"><?php echo $agama_contact_btn_txt; ?></button>
					</div>

				</form>

				<div class="line" style="margin: 30px 0;"></div>

				<!-- Contact Info -->
				<div class="col-md-6 nobottommargin vision-contact-address" style="line-height:1.8;">
				
					<?php if( $agama_contact_address ): ?>
					<i class="fa fa-home"></i>
					<address style="position:relative; top:-25px; left: 20px;">
						<?php echo $agama_contact_address; ?>
					</address>
					<?php endif; ?>
				
				</div>
				<div class="col-md-6 nobottommargin" style="line-height:1.8;">
					
					<?php if( $agama_contact_phone ): ?>
                    <div class="vision-contact-phone">
				        <i class="fa fa-phone"></i> <abbr title="<?php _e( 'Phone Number', 'agama-pro' ); ?>"><strong><?php _e( 'Phone', 'agama-pro' ); ?>:</strong></abbr> <?php echo $agama_contact_phone; ?><br>
                    </div>
					<?php endif; ?>
					
					<?php if( $agama_contact_fax ): ?>
                    <div class="vision-contact-fax">
						<i class="fa fa-fax"></i> <abbr title="<?php _e( 'Fax', 'agama-pro' ); ?>"><strong><?php _e( 'Fax', 'agama-pro' ); ?>:</strong></abbr> <?php echo $agama_contact_fax; ?><br>
                    </div>
					<?php endif; ?>
					
					<?php if( $agama_contact_email ): ?>
                    <div class="vision-contact-email">
						<i class="fa fa-paper-plane"></i> <abbr title="<?php _e( 'Email Address', 'agama-pro' ); ?>"><strong><?php _e( 'Email', 'agama-pro' ); ?>:</strong></abbr> <?php echo $agama_contact_email; ?>
                    </div>
					<?php endif; ?>

				</div><!-- Contact Info End -->

			</div><!-- Contact Form Overlay End -->

		</div>

		<!-- Google Map
		============================================= -->
		<section id="google-map" class="gmap"></section>

		<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=<?php echo esc_attr( $agama_contact_map_api ); ?>"></script>
		<script type="text/javascript" src="<?php echo AGAMA_JS; ?>jquery.gmap.js"></script>

		<script type="text/javascript">

			jQuery('#google-map').gMap({

				address: '<?php echo esc_html( $agama_contact_country ); ?>',
				maptype: '<?php echo strtoupper( $agama_contact_map_type ); ?>',
				zoom: 14,
				doubleclickzoom: false,
				controls: {
					panControl: true,
					zoomControl: true,
					mapTypeControl: true,
					scaleControl: false,
					streetViewControl: false,
					overviewMapControl: false
				}

			});

		</script><!-- Google Map End -->

	</section><!-- Contact Form & Map Overlay Section End -->

<?php get_footer(); ?>