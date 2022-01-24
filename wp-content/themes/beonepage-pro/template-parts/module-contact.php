<?php
/**
 * Module part for displaying contact module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( beOneKirki::get_option( 'front_page_contact_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( beOneKirki::get_option( 'front_page_contact_module_bg' ) == 'image' && beOneKirki::get_option( 'front_page_contact_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( beOneKirki::get_option( 'front_page_contact_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . beOneKirki::get_option( 'front_page_contact_module_bg_video' ) . '"';
	}
?>

<section id="<?php echo beOneKirki::get_option( 'front_page_contact_module_id' ); ?>" class="module contact-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="container">
		<div class="row">
			<?php 
			$title = get_post_meta( get_the_ID(), '_beonepage_option_front_page_contact_module_title', true );
			$subtitle = get_post_meta( get_the_ID(), '_beonepage_option_front_page_contact_module_subtitle', true );
			$send_button_text = get_post_meta( get_the_ID(), '_beonepage_option_front_page_contact_module_send', true );

			if ($title != '' ) : ?>
				<?php $animation = beOneKirki::get_option( 'front_page_contact_module_animation' ) != 'none' ? ' wow ' . beOneKirki::get_option( 'front_page_contact_module_animation' ) . '" data-wow-delay=".2s' : ''; ?>

				<div class="module-caption col-md-12 text-center<?php echo $animation; ?>">
					<h2><?php echo strip_tags( html_entity_decode( $title ), '<span>' ); ?></h2>

					<?php if ( $subtitle != '' ) : ?>
						<p><?php echo 	$subtitle; ?></p>
					<?php endif; ?>

					<div class="separator">
						<span><i class="fa fa-circle"></i></span>
					</div><!-- .separator -->

					<div class="spacer"></div>
				</div><!-- .module-caption -->
			<?php endif; ?>

			<?php $contact_boxes = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_contact_box', true ); ?>

			<?php if ( ! empty( $contact_boxes ) ) : ?>
				<div class="contact-info col-md-4 clearfix">
					<?php foreach ( $contact_boxes as $contact_box ) : ?>
						<div class="contact-item<?php echo isset( $contact_box['animation'] ) && $contact_box['animation'] != '' ? ' wow ' . $contact_box['animation'] . '" data-wow-delay=".5s' : ''; ?>">
							<?php if ( isset( $contact_box['icon'] ) && $contact_box['icon'] != '' ) : ?>
								<div class="ci-icon"><i class="fa fa-<?php echo $contact_box['icon']; ?>"></i></div>
							<?php endif; ?>

							<?php if ( isset( $contact_box['label'] ) && $contact_box['label'] != '' ) : ?>
								<div class="ci-title"><?php echo $contact_box['label']; ?></div>
							<?php endif; ?>

							<?php if ( isset( $contact_box['description'] ) && $contact_box['description'] != '' ) : ?>
								<?php if ( isset( $contact_box['url'] ) && $contact_box['url'] != '' ) : ?>
									<div class="ci-content"><a href="<?php echo $contact_box['url']; ?>"><?php echo $contact_box['description']; ?></a></div>
								<?php else : ?>
									<div class="ci-content"><?php echo $contact_box['description']; ?></div>
								<?php endif; ?>
							<?php endif; ?>
						</div><!-- .contact-info -->
					<?php endforeach; ?> 
				</div><!-- .contact-item  -->
			<?php endif; ?>

			<?php $animation = beOneKirki::get_option( 'front_page_contact_module_cf_animation' ) != 'none' ? ' wow ' . beOneKirki::get_option( 'front_page_contact_module_cf_animation' ) . '" data-wow-delay=".5s' : ''; ?>

			<div class="contact-form col-md-7 col-md-offset-1 clearfix<?php echo $animation; ?>">
				<?php
					$a = rand( 0, 9 );
					$b = rand( 0, 9 );
					$required = esc_attr__( 'This field is required.', 'beonepage' );
					$equalto = esc_attr__( 'Please check your math.', 'beonepage' );
					$email = esc_attr__( 'Invalid email address.', 'beonepage' );
				?>

				<form id="contact-form" class="contact-form clearfix">
					<div class="contact-form-process">
						<i class="fa fa-spinner fa-pulse"></i>
					</div><!-- .contact-form-process -->

					<div id="contact-form-result"><span></span></div>

					<fieldset class="col-sm-4">
						<input type="text" id="contact-form-name" name="name" placeholder="<?php echo esc_html__( 'Name', 'beonepage' ); ?>" value="<?php if( isset( $_POST['name'] ) ) { echo esc_attr( $_POST['name'] ); } ?>" class="cf-form-control required" data-msg-required="<?php echo $required; ?>" />
					</fieldset>

					<fieldset class="col-sm-4">
						<input type="email" id="contact-form-email" name="email" placeholder="<?php esc_html_e( 'Email', 'beonepage' ); ?>" value="<?php if( isset( $_POST['email'] ) ) { echo esc_attr( $_POST['email'] ); } ?>" class="required email cf-form-control" data-msg-required="<?php echo $required; ?>" data-msg-email="<?php echo $email; ?>" />
					</fieldset>

					<fieldset class="col-sm-4">
						<input type="text" id="contact-form-phone" name="phone" placeholder="<?php esc_html_e( 'Phone', 'beonepage' ); ?>" value="<?php if( isset( $_POST['phone'] ) ) { echo esc_attr( $_POST['phone'] ); } ?>" class="cf-form-control" />
					</fieldset>

					<fieldset class="col-sm-12">
						<input type="text" id="contact-form-subject" name="subject" placeholder="<?php esc_html_e( 'Subject', 'beonepage' ); ?>" value="<?php if( isset( $_POST['subject'] ) ) { echo esc_attr( $_POST['subject'] ); } ?>" class="required cf-form-control" data-msg-required="<?php echo $required; ?>" />
					</fieldset>

					<fieldset class="col-sm-12">
						<textarea rows="3" id="contact-form-message" name="message" placeholder="<?php esc_html_e( 'Message', 'beonepage' ); ?>" class="required cf-form-control" data-msg-required="<?php echo $required; ?>"><?php if( isset( $_POST['message'] ) ) { echo esc_attr( $_POST['message'] ); } ?></textarea>
					</fieldset>

					<fieldset class="captcha col-sm-6">
						<input type="text" id="contact-form-captcha" name="captcha" placeholder="<?php echo $a . ' + ' . $b . ' = ?'; ?>" class="required cf-form-control" data-msg-required="<?php echo $required; ?>" data-rule-equalto="#captcha-value" data-msg-equalto="<?php echo $equalto; ?>" />
						<input type="hidden" id="captcha-value" value="<?php echo $a + $b; ?>">
					</fieldset><!-- .captcha -->
					
					<?php 
						if( beOneKirki::get_option( 'front_page_contact_module_enable_privacy' ) == '1'){ 
						$page_id = beOneKirki::get_option( 'front_page_contact_module_cf_privacy_page' );
							?>
					<fieldset class="checkbox col-sm-12">
						<input type="checkbox" id="contact-form-checkbox" data-rule-required="true"required name="checkbox" class="required cf-form-control"  value="0" />
						<span><?php 
							$page_url = get_the_permalink($page_id);
							$page_title = get_the_title($page_id);
							echo sprintf( esc_html__( ' By filling out this form and clicking submit, you agree to our %s.', 'beonepage' ), '<a href="' . esc_url( $page_url ) . '" rel="developer" target="_blank">'.$page_title.'</a>' );
							 ?>
						</span>
					</fieldset><!-- .checkbox -->
					<?php } ?>
					
					<fieldset class="submit col-sm-6">
						<input type="hidden" name="action" value="contact_form">

						<?php wp_nonce_field( 'ajax_contact_form', 'ajax_contact_form_nonce' ); ?>

						<button class="btn <?php echo beOneKirki::get_option( 'front_page_contact_module_btn_style' ) == '1' ? 'btn-light' : 'btn-dark'; ?>" type="submit" id="contact-form-submit" name="submit"  value="submit"><?php echo $send_button_text; ?></button>
					</fieldset><!-- .submit -->
				</form>
			</div><!-- .contact-form -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #contact -->

<?php if ( beOneKirki::get_option( 'front_page_contact_module_gmap' ) == '1' ) : ?>
	<div id="gmap" class="wow fadeInUp" data-wow-delay="1s">
		<a href="#google-map" data-original-title="<?php echo strtoupper( esc_attr__( 'Locate us on the map', 'beonepage' ) ); ?>"><i class="fa fa-street-view"></i></span></i></a>
		<div class="circle-left"></div>
		<div class="square"></div>
		<div class="rectangle"></div>
		<div class="circle-right"></div>
	</div><!-- #gmap -->

	<div id="gmap-container" data-gmap-lat="<?php echo beOneKirki::get_option( 'front_page_contact_module_gmap_lat' ); ?>" data-gmap-lng="<?php echo beOneKirki::get_option( 'front_page_contact_module_gmap_lng' ); ?>"></div>
<?php endif; ?>
