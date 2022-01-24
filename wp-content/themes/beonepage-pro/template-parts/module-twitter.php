<?php
/**
 * Module part for displaying twitter module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( beOneKirki::get_option( 'front_page_twitter_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( beOneKirki::get_option( 'front_page_twitter_module_bg' ) == 'image' && beOneKirki::get_option( 'front_page_twitter_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( beOneKirki::get_option( 'front_page_twitter_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . beOneKirki::get_option( 'front_page_twitter_module_bg_video' ) . '"';
	}
?>

<section id="<?php echo beOneKirki::get_option( 'front_page_twitter_module_id' ); ?>" class="module twitter-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="container-fluid">
		<div class="row row-nopadding">
			<div class="twitter-container text-center">
				<?php $animation = beOneKirki::get_option( 'front_page_twitter_twitter_animation' ) != 'none' ? ' wow ' . beOneKirki::get_option( 'front_page_twitter_twitter_animation' ) . '" data-wow-delay=".3s' : ''; ?>

				<div class="twitter-icon<?php echo $animation; ?>"><i class="fa fa-twitter"></i></div>

				<?php if ( class_exists( 'beOnePageTwitterModule' ) ) : ?>

					<?php
						$obj = new beOnePageTwitterModule;

						try {
							$tweets = $obj->getTweets();
						}

						catch ( Exception $e ) {
							if ( $e->getMessage() != '' ) {
								echo '<p>' . esc_html( 'Connection Timed Out', 'beonepage' ) . '</p>';
							} else {
								$tweets = $obj->getTweets();
							}
						}
					?>

					<?php if ( isset( $tweets['error'] ) ) : ?>
						<p><?php echo esc_html( $tweets['error'] ); ?></p>
					<?php elseif ( ! empty( $tweets ) ) : ?>
						<div class="tweet-container owl-carousel wow fadeIn" data-wow-delay=".3s">
							<?php foreach ( $tweets as $tweet ) : ?>
								<?php
									$text = $obj->link_replace( $tweet['text'] );
									$text = preg_replace( '/RT/', '<i class="fa fa-retweet"></i>', $text, 1 );
								?>

								<div class="tweet col-md-6 col-md-offset-3">
									<p><?php echo $text; ?></p>
									<span class="tweet-timestamp"><?php echo $obj->changeTimeFormat( strtotime( $tweet['timestamp'] ) ); ?></span>
								</div>
							<?php endforeach; ?> 
						</div><!-- .tweet-container -->
					<?php endif; ?>
				<?php endif; ?>

				<?php
				$btn_text = get_post_meta( get_the_ID(), '_beonepage_option_front_page_twitter_btn_text', true );
				$btn_url = get_post_meta( get_the_ID(), '_beonepage_option_front_page_twitter_btn_url', true );
				
				if ( $btn_text != '' ) : ?>
					<?php $animation = beOneKirki::get_option( 'front_page_twitter_btn_animation' ) != 'none' ? ' wow ' . beOneKirki::get_option( 'front_page_twitter_btn_animation' ) . '" data-wow-delay=".3s' : ''; ?>

					<div class="twitter-btn<?php echo $animation; ?>">
						<a href="<?php echo $btn_url; ?>" target="_blank" class="btn <?php echo beOneKirki::get_option( 'front_page_twitter_btn_style' ) == '1' ? 'btn-light' : 'btn-dark'; ?>"><?php echo $btn_text; ?></a>
					</div><!-- .twitter-btn -->
				<?php endif; ?>
			</div><!-- .twitter-container -->
		</div><!-- .row -->
	</div><!-- .container-fluid -->
</section><!-- #twitter -->