<?php
/**
 * Module part for displaying MailChimp subscribe module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( beOneKirki::get_option( 'front_page_subscribe_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( beOneKirki::get_option( 'front_page_subscribe_module_bg' ) == 'image' && beOneKirki::get_option( 'front_page_subscribe_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}
?>

<section id="<?php echo beOneKirki::get_option( 'front_page_subscribe_module_id' ); ?>" class="module subscribe-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<?php
					$title = get_post_meta( get_the_ID(), '_beonepage_option_front_page_subscribe_title', true );
				
					if ( $title != '' ) {
						$animation = beOneKirki::get_option( 'front_page_subscribe_title_animation' ) != 'none' ? ' class="wow ' . beOneKirki::get_option( 'front_page_subscribe_title_animation' ) . '" data-wow-delay=".3s"' : '';

						echo '<h2' . $animation . '>' . strip_tags( html_entity_decode( $title ), '<span>' ) . '</h2>';
					}
				?>

				<?php
					$subtitle = get_post_meta( get_the_ID(), '_beonepage_option_front_page_subscribe_content', true );
					
					if ( $subtitle != '' ) {
						$animation = beOneKirki::get_option( 'front_page_subscribe_content_animation' ) != 'none' ? ' class="wow ' . beOneKirki::get_option( 'front_page_subscribe_content_animation' ) . '" data-wow-delay=".3s"' : '';

						echo '<p' . $animation . '>' . strip_tags( html_entity_decode( $subtitle ), '<span>' ) . '</p>';
					}
				?>
			</div><!-- .col-md-7 -->

			<?php 
			$btn_text = get_post_meta( get_the_ID(), '_beonepage_option_front_page_subscribe_btn_text', true );
			
			if ( $btn_text != '' ) : ?>
				<?php $animation = beOneKirki::get_option( 'front_page_subscribe_btn_animation' ) != 'none' ? ' wow ' . beOneKirki::get_option( 'front_page_subscribe_btn_animation' ) . '" data-wow-delay=".3s' : ''; ?>

				<div class="col-md-5<?php echo $animation; ?>">
					<?php
						$required = esc_attr__( 'Please fill out this field.', 'beonepage' );
						$email = esc_attr__( 'Please enter a valid email address.', 'beonepage' );
					?>

					<form id="subscribe-form" class="subscribe-form input-group">
						<input type="email" id="subscribe-email" name="email" placeholder="<?php esc_html_e( 'Enter your email address...', 'beonepage' ); ?>" class="required email form-control" data-msg-required="<?php echo $required; ?>" data-msg-email="<?php echo $email; ?>" />

						<span class="input-group-btn">
							<button class="btn subscribe-btn" type="submit" id="subscribe-form-submit" name="submit" value="submit"><span><?php echo $btn_text; ?></span></button>
						</span>

						<div id="subscribe-form-result"></div>

						<input type="hidden" name="action" value="subscribe_form">

						<?php wp_nonce_field( 'ajax_subscribe_form', 'ajax_subscribe_form_nonce' ); ?>
					</form>
				</div><!-- .col-md-5-->
			<?php endif; ?>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #subscribe -->
