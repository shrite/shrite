<?php
/**
 * Module part for displaying widget module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( beOneKirki::get_option( 'front_page_widget_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( beOneKirki::get_option( 'front_page_widget_module_bg' ) == 'image' && beOneKirki::get_option( 'front_page_widget_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( beOneKirki::get_option( 'front_page_widget_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . beOneKirki::get_option( 'front_page_widget_module_bg_video' ) . '"';
	}
?>

<section id="<?php echo beOneKirki::get_option( 'front_page_widget_module_id' ); ?>" class="module widget-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="<?php echo beOneKirki::get_option( 'front_page_widget_module_layout' ) == 'fixed' ? 'container' : 'container-fluid'; ?>">
		<div class="row">
			<?php
			$title = get_post_meta( get_the_ID(), '_beonepage_option_front_page_widget_module_title', true );
			$subtitle = get_post_meta( get_the_ID(), '_beonepage_option_front_page_widget_module_subtitle', true );
				
			if ($title  != '' ) : ?>
				<?php $animation = beOneKirki::get_option( 'front_page_widget_module_animation' ) != 'none' ? ' wow ' . beOneKirki::get_option( 'front_page_widget_module_animation' ) . '" data-wow-delay=".2s' : ''; ?>

				<div class="module-caption col-md-12 text-center<?php echo $animation; ?>">
					<h2><?php echo strip_tags( html_entity_decode($title ), '<span>' ); ?></h2>

					<?php if ( $subtitle!= '' ) : ?>
						<p><?php echo $subtitle; ?></p>
					<?php endif; ?>

					<div class="separator">
						<span><i class="fa fa-circle"></i></span>
					</div><!-- .separator -->

					<div class="spacer"></div>
				</div><!-- .module-caption -->
			<?php endif; ?>

			<?php $widgets = beOneKirki::get_option( 'front_page_widget_module_widget' ); ?>

			<?php if ( ! empty( $widgets ) ) : 
			
			?>
				<?php foreach ( $widgets as $widget ) : ?>
					<div class="widget-area col-md-12">
			
						<?php dynamic_sidebar( $widget['title'] ); ?>
					</div><!-- .widget-area -->
				<?php endforeach; ?> 
			<?php endif; ?>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #widget -->
