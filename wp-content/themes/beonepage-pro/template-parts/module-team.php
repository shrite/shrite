<?php
/**
 * Module part for displaying team module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( beOneKirki::get_option( 'front_page_team_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( beOneKirki::get_option( 'front_page_team_module_bg' ) == 'image' && beOneKirki::get_option( 'front_page_team_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( beOneKirki::get_option( 'front_page_team_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . beOneKirki::get_option( 'front_page_team_module_bg_video' ) . '"';
	}
?>

<section id="<?php echo beOneKirki::get_option( 'front_page_team_module_id' ); ?>" class="module team-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="container">
		<div class="row">
			<?php 
			$title = get_post_meta( get_the_ID(), '_beonepage_option_front_page_team_module_title', true );
			$subtitle = get_post_meta( get_the_ID(), '_beonepage_option_front_page_team_module_subtitle', true );
			
			if ( $title != '' ) : ?>
				<?php $animation = beOneKirki::get_option( 'front_page_team_module_animation' ) != 'none' ? ' wow ' . beOneKirki::get_option( 'front_page_team_module_animation' ) . '" data-wow-delay=".2s' : ''; ?>

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

			<div class="team-container col-md-12 owl-carousel wow fadeIn" data-wow-delay=".5s">
				<?php $members = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_team', true ); ?>

				<?php if ( ! empty( $members ) ) : ?>
					<?php foreach ( $members as $member ) : ?>
						<div class="team-member col-md-12">
							<div class="member-image">
								<img src="<?php echo $member['img_url']; ?>" alt="<?php echo isset( $member['name'] ) ? $member['name'] : ''; ?>">
							</div><!-- .member-image -->

							<div class="member-card">
								<?php if ( isset( $member['name'] ) ) : ?>
									<h3 class="member-name"><?php echo $member['name']; ?></h3>
								<?php endif; ?>

								<?php if ( isset( $member['title'] ) ) : ?>
									<p class="member-title"><?php echo $member['title']; ?></p>
								<?php endif; ?>
							</div><!-- .member-card -->

							<div class="member-profile">
								<?php if ( isset( $member['bio'] ) ) : ?>
									<div class="member-bio">
										<?php echo wpautop( $member['bio'] ); ?>
									</div><!-- .member-bio -->
								<?php endif; ?>

								<ul class="member-social">
									<?php 
										for ( $i = 1; $i <= 4; $i++ ) {
											if ( isset( $member['social_label_' . $i] ) && isset( $member['social_url_' . $i] ) && $member['social_label_' . $i] != '' ) {
												$social_label = strtolower( str_replace( ' ', '-', $member['social_label_' . $i] ) );
												$social_link = $member['social_url_' . $i];

												echo '<li><a href="' . $social_link . '"><i class="fa fa-' . $social_label . '"></i></a></li>';
											}
										}
									?> 
								</ul><!-- .member-social -->
							</div><!-- .member-profile -->
						</div><!-- .team-member -->
					<?php endforeach; ?> 
				<?php endif; ?>
			</div><!-- .team-container -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #team -->