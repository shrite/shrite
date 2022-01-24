<?php
/**
 * Module part for displaying skill bar module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( beOneKirki::get_option( 'front_page_skill_bar_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( beOneKirki::get_option( 'front_page_skill_bar_module_bg' ) == 'image' && beOneKirki::get_option( 'front_page_skill_bar_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( beOneKirki::get_option( 'front_page_skill_bar_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . beOneKirki::get_option( 'front_page_skill_bar_module_bg_video' ) . '"';
	}
?>

<section id="<?php echo beOneKirki::get_option( 'front_page_skill_bar_module_id' ); ?>" class="module skill-bar-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="container">
		<div class="row">
			<?php 
			$title = get_post_meta( get_the_ID(), '_beonepage_option_front_page_skill_bar_module_title', true );
			$subtitle = get_post_meta( get_the_ID(), '_beonepage_option_front_page_skill_bar_module_subtitle', true );
			
			if ( $title != '' ) : ?>
				<?php $animation = beOneKirki::get_option( 'front_page_skill_bar_module_animation' ) != 'none' ? ' wow ' . beOneKirki::get_option( 'front_page_skill_bar_module_animation' ) . '" data-wow-delay=".2s' : ''; ?>

				<div class="module-caption col-md-12 text-center<?php echo $animation; ?>">
					<h2><?php echo strip_tags( html_entity_decode( $title ), '<span>' ); ?></h2>

					<?php if ( $subtitle != '' ) : ?>
						<p><?php echo $subtitle; ?></p>
					<?php endif; ?>

					<div class="separator">
						<span><i class="fa fa-circle"></i></span>
					</div><!-- .separator -->

					<div class="spacer"></div>
				</div><!-- .module-caption -->
			<?php endif; ?>

			<?php 
			$description = get_post_meta( get_the_ID(), '_beonepage_option_front_page_skill_bar_module_text', true );
			$animation = beOneKirki::get_option( 'front_page_skill_bar_module_text_animation' ) != 'none' ? ' wow ' . beOneKirki::get_option( 'front_page_skill_bar_module_text_animation' ) . '" data-wow-delay=".5s' : ''; ?>

			<div class="content-box col-sm-6<?php echo $animation; ?>">
				<?php echo html_entity_decode( $description ); ?>
			</div><!-- .content-box -->

			<?php $skill_bars = get_post_meta( get_the_ID(), '_beonepage_option_front_page_skill_bar_module_skill_bar', true ); ?>

			<?php if ( ! empty( $skill_bars ) ) : ?>
				<div id="skill-bar" class="skill-bar-container col-sm-6">
					<?php $i = 0; ?>

					<?php foreach ( $skill_bars as $skill_bar ) : ?>
						<?php
							$skill_bar_label = isset( $skill_bar['skill_bar_label'] ) && ! empty( $skill_bar['skill_bar_label'] ) ? $skill_bar['skill_bar_label'] : '';
							$skill_bar_pct = isset( $skill_bar['skill_bar_pct'] ) && ! empty( $skill_bar['skill_bar_pct'] ) ? $skill_bar['skill_bar_pct'] : '';
							$skill_bar_pct = preg_replace( '/[^0-9]/', '', $skill_bar_pct );
						?>

						<div class="skill-bar wow fadeInUp" data-wow-delay="<?php echo $i * .3 . 's'; ?>">
							<h3><?php echo $skill_bar_label; ?></h3>

							<div class="bar-line">
								<div class="line-active">
									<span class="bar-timer" data-to="<?php echo $skill_bar_pct; ?>" data-speed="3000"><?php echo $skill_bar_pct; ?></span>
								</div>
							</div>
						</div>
						<?php $i++; ?>
					<?php endforeach; ?> 
				</div><!-- .skill-bar -->
			<?php endif; ?>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #skill-bar -->
