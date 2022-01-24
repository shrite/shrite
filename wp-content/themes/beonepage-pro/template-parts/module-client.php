<?php
/**
 * Module part for displaying client module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( beOneKirki::get_option( 'front_page_client_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( beOneKirki::get_option( 'front_page_client_module_bg' ) == 'image' && beOneKirki::get_option( 'front_page_client_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}
?>

<section id="<?php echo beOneKirki::get_option( 'front_page_client_module_id' ); ?>" class="sm-section module client-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="container">
		<div class="row">
			<div class="client-container col-md-12 owl-carousel">
				<?php $clients = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_client', true ); ?>

				<?php if ( ! empty( $clients ) ) : ?>
					<?php foreach ( $clients as $client ) : ?>
						<div class="client-item">
							<?php if ( isset( $client['url'] ) && $client['url'] != '' ) : ?>
								<a href="<?php echo $client['url']; ?>" target="_blank" rel="nofollow"><img src="<?php echo isset( $client['img_url'] ) ? $client['img_url'] : ''; ?>" alt="<?php echo isset( $client['name'] ) ? $client['name'] : ''; ?>"></a>
							<?php else : ?>
								<img src="<?php echo isset( $client['img_url'] ) ? $client['img_url'] : ''; ?>" alt="<?php echo isset( $client['name'] ) ? $client['name'] : ''; ?>">
							<?php endif; ?>
						</div><!-- .client-item -->
					<?php endforeach; ?> 
				<?php endif; ?>
			</div><!-- .client-container -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #client -->
