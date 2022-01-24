<?php
/**
 * Module part for displaying vertical promotion module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( beOneKirki::get_option( 'front_page_ver_promo_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( beOneKirki::get_option( 'front_page_ver_promo_module_bg' ) == 'image' && beOneKirki::get_option( 'front_page_ver_promo_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( beOneKirki::get_option( 'front_page_ver_promo_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . beOneKirki::get_option( 'front_page_ver_promo_module_bg_video' ) . '"';
	}
?>

<section id="<?php echo beOneKirki::get_option( 'front_page_ver_promo_module_id' ); ?>" class="module promo-box-ver-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="container">
		<div class="row">
			<div class="promo-box-ver col-md-10 col-md-offset-1 text-center">
				<?php
					$title = get_post_meta( get_the_ID(), '_beonepage_option_front_page_ver_promo_title', true );
					if ( $title != '' ) {
						$animation = beOneKirki::get_option( 'front_page_ver_promo_title_animation' ) != 'none' ? ' class="wow ' . beOneKirki::get_option( 'front_page_ver_promo_title_animation' ) . '" data-wow-delay=".3s"' : '';

						echo '<h2' . $animation . '>' . strip_tags( html_entity_decode( $title ), '<span>' ) . '</h2>';
					}
				?>

				<?php
					$subtitle = get_post_meta( get_the_ID(), '_beonepage_option_front_page_ver_promo_content', true );
					if ( $subtitle != '' ) {
						$animation = beOneKirki::get_option( 'front_page_ver_promo_content_animation' ) != 'none' ? ' class="wow ' . beOneKirki::get_option( 'front_page_ver_promo_content_animation' ) . '" data-wow-delay=".3s"' : '';

						echo '<p' . $animation . '>' . strip_tags( html_entity_decode( $subtitle ), '<span>' ) . '</p>';
					}
				?>

				<?php 
				$btn_text = get_post_meta( get_the_ID(), '_beonepage_option_front_page_ver_promo_btn_text', true );
				$btn_url = get_post_meta( get_the_ID(), '_beonepage_option_front_page_ver_promo_btn_url', true );
				
				if ( $btn_text != '' ) : ?>
					<?php $animation = beOneKirki::get_option( 'front_page_ver_promo_btn_animation' ) != 'none' ? ' wow ' . beOneKirki::get_option( 'front_page_ver_promo_btn_animation' ) . '" data-wow-delay=".3s' : ''; ?>

					<div class="promo-btn<?php echo $animation; ?>">
						<a href="<?php echo $btn_url; ?>" class="btn <?php echo beOneKirki::get_option( 'front_page_ver_promo_btn_style' ) == '1' ? 'btn-light' : 'btn-dark'; ?>"><?php echo $btn_text; ?></a>
					</div><!-- .promo-btn -->
				<?php endif; ?>
			</div><!-- .promo-box-ver -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #promo-box-ver -->
