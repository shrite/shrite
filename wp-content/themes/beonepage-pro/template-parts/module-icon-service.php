<?php
/**
 * Module part for displaying icon service module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( beOneKirki::get_option( 'front_page_icon_service_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( beOneKirki::get_option( 'front_page_icon_service_module_bg' ) == 'image' && beOneKirki::get_option( 'front_page_icon_service_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( beOneKirki::get_option( 'front_page_icon_service_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . beOneKirki::get_option( 'front_page_icon_service_module_bg_video' ) . '"';
	}
?>

<section id="<?php echo beOneKirki::get_option( 'front_page_icon_service_module_id' ); ?>" class="module icon-service-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="<?php echo beOneKirki::get_option( 'front_page_icon_service_module_layout' ) == 'fixed' ? 'container' : 'container-fluid'; ?>">
		<div class="row">
			<?php 
			$title = get_post_meta( get_the_ID(), '_beonepage_option_front_page_icon_service_module_title', true );
			$subtitle = get_post_meta( get_the_ID(), '_beonepage_option_front_page_icon_service_module_subtitle', true );
			
			if ( $title != '' ) : ?>
				<?php $animation = beOneKirki::get_option( 'front_page_icon_service_module_animation' ) != 'none' ? ' wow ' . beOneKirki::get_option( 'front_page_icon_service_module_animation' ) . '" data-wow-delay=".2s' : ''; ?>

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

			<?php $icon_service_boxes = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_icon_service_box', true ); ?>

			<?php if ( ! empty( $icon_service_boxes ) ) : ?>
				<?php foreach ( $icon_service_boxes as $icon_service_box ) : ?>
					<?php
						if ( beOneKirki::get_option( 'front_page_icon_service_module_layout' ) == 'fixed' ) {
							$width = 'col-md-4';
						} else {
							$width = 'col-md-3';
						}
					?>

					<div class="icon-service-box <?php echo $width; ?> text-center<?php echo isset( $icon_service_box['animation'] ) && $icon_service_box['animation'] != '' ? ' wow ' . $icon_service_box['animation'] . '" data-wow-delay=".5s' : ''; ?>">
						<?php if ( isset( $icon_service_box['url'] ) && $icon_service_box['url'] != '' ) : ?>
							<a href="<?php echo $icon_service_box['url']; ?>">
						<?php endif; ?>

						<div class="service-icon">
							<?php
							//echo $icon_service_box['icon_img_url'];
							if(isset( $icon_service_box['icon_img_url'] ) && $icon_service_box['icon_img_url'] !=''){
							?>
							<img src="<?php echo $icon_service_box['icon_img_url'];?>"  width="40" height="40" alt="<?php echo $icon_service_box['title']; ?>">
						   <?php         
							}else{
							?>
						   <i class="fa fa-<?php echo isset( $icon_service_box['icon'] ) ? $icon_service_box['icon'] : ''; ?>"></i>       
						   <?php
							}
						   ?>
						</div><!-- .service-icon -->

						<?php if ( isset( $icon_service_box['title'] ) && $icon_service_box['title'] != '' ) : ?>
							<h3 class="service-title"><?php echo $icon_service_box['title']; ?></h3>
						<?php endif; ?>

						<?php if ( isset( $icon_service_box['description'] ) && $icon_service_box['description'] != '' ) : ?>
							<p class="service-content"><?php echo $icon_service_box['description']; ?></p>
						<?php endif; ?>

						<?php if ( isset( $icon_service_box['url'] ) && $icon_service_box['url'] != '' ) : ?>
							</a>
						<?php endif; ?>

						<div class="spacer"></div>
					</div><!-- .icon-service-box -->
				<?php endforeach; ?> 
			<?php endif; ?>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #icon-service -->
