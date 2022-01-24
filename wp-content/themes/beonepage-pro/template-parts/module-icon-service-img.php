<?php
/**
 * Module part for displaying icon service with image module.
 *
 * @package BeOnePage
 */
$class = '';
	$attribute = '';

	if ( beOneKirki::get_option( 'front_page_icon_service_img_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( beOneKirki::get_option( 'front_page_icon_service_img_module_bg' ) == 'image' && beOneKirki::get_option( 'front_page_icon_service_img_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( beOneKirki::get_option( 'front_page_icon_service_img_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . beOneKirki::get_option( 'front_page_icon_service_img_module_bg_video' ) . '"';
	}
?>

<section id="<?php echo beOneKirki::get_option( 'front_page_icon_service_img_module_id' ); ?>" class="module icon-service-img-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="<?php echo beOneKirki::get_option( 'front_page_icon_service_img_module_layout' ) == 'fixed' ? 'container' : 'container-fluid'; ?>">
		<div class="row">
			<?php
			
			$title = get_post_meta( get_the_ID(), '_beonepage_option_front_page_icon_service_img_module_title', true );
			$subtitle = get_post_meta( get_the_ID(), '_beonepage_option_front_page_icon_service_img_module_subtitle', true );

			if ( $title != '' ) : ?>
				<?php $animation = beOneKirki::get_option( 'front_page_icon_service_img_module_animation' ) != 'none' ? ' wow ' . beOneKirki::get_option( 'front_page_icon_service_img_module_animation' ) . '" data-wow-delay=".2s' : ''; ?>

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
				$icon_service_img_boxes = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_icon_service_img_box', true );
				$service_item_number = "Odd";
				if ( ! empty( $icon_service_img_boxes ) ) {
					$len = count( $icon_service_img_boxes );
					$numberCheck = number_check($len);
					if($numberCheck == "Even"){
						$service_item_number = "Even";
					}else{
						$service_item_number = "Odd";
					}
					$left_boxes = array_slice( $icon_service_img_boxes, 0, ceil( $len / 2 ) );
					$right_boxes = array_slice( $icon_service_img_boxes, floor( $len / 2 ) );
				}
				
			?>

			<?php if ( ! empty( $left_boxes ) ) : ?>
				<div class="left-icon-boxes col-md-4">
					<?php foreach ( $left_boxes as $left_box ) : ?>
					
						<div class="icon-service-box<?php echo isset( $left_box['animation'] ) && $left_box['animation'] != '' ? ' wow ' . $left_box['animation'] . '" data-wow-delay=".5s' : ''; ?>">
							<?php if ( isset( $left_box['url'] ) && $left_box['url'] != '' ) : ?>
								<a href="<?php echo $left_box['url']; ?>">
							<?php endif; ?>

							<div class="service-icon text-center">
							<?php
							if(isset( $left_box['icon_img_url_2'] ) && $left_box['icon_img_url_2'] !=''){
							?>
							<img src="<?php echo $left_box['icon_img_url_2'];?>"  width="40" height="40" alt="<?php echo $left_box['title']; ?>">
						   <?php         
							}else{
							?>
						   <i class="fa fa-<?php echo isset( $left_box['icon'] ) ? $left_box['icon'] : ''; ?>"></i>      
						   <?php
							}
						   ?>
								
							</div><!-- .service-icon -->

							<?php if ( isset( $left_box['title'] ) && $left_box['title'] != '' ) : ?>
								<h3 class="service-title"><?php echo $left_box['title']; ?></h3>
							<?php endif; ?>

							<?php if ( isset( $left_box['description'] ) && $left_box['description'] != '' ) : ?>
								<p class="service-content"><?php echo $left_box['description']; ?></p>
							<?php endif; ?>

							<?php if ( isset( $left_box['url'] ) && $left_box['url'] != '' ) : ?>
								</a>
							<?php endif; ?>

							<div class="spacer"></div>
						</div><!-- .icon-service-box -->
						
					<?php endforeach; ?> 
				</div><!-- .left-icon-boxes -->
			<?php endif; ?>

			<?php if ( beOneKirki::get_option( 'front_page_icon_service_img_module_img' ) != '' ) : ?>
				<?php $img_animation = beOneKirki::get_option( 'front_page_icon_service_img_animation' ) != 'none' ? ' wow ' . beOneKirki::get_option( 'front_page_icon_service_img_animation' ) . '" data-wow-delay=".5s' : ''; 
				$img_box = beOneKirki::get_option( 'front_page_icon_service_img_module_img' );
				?>

				<div class="icon-box-img col-md-4<?php echo $img_animation; ?>">
					<img src="<?php echo esc_url($img_box['url']); ?>" >
				</div><!-- .icon-box-img -->
			<?php endif; ?>

			<?php if ( ! empty( $right_boxes ) ) : ?>
				<div class="right-icon-boxes col-md-4">
					<?php 
					$rb=0;
					foreach ( $right_boxes as $right_box ) : 
					if($service_item_number=="Odd"){
						if($rb == 0){
							// Nothing to show
						}else{
						?>
							<div class="icon-service-box<?php echo isset( $right_box['animation'] ) && $right_box['animation'] != '' ? ' wow ' . $right_box['animation'] . '" data-wow-delay=".5s' : ''; ?>">
								<?php if ( isset( $right_box['url'] ) && $right_box['url'] != '' ) : ?>
									<a href="<?php echo $right_box['url']; ?>">
								<?php endif; ?>
								<div class="service-icon text-center">
								<?php
										if(isset( $right_box['icon_img_url_2'] ) && $right_box['icon_img_url_2'] !=''){
										?>
										<img src="<?php echo $right_box['icon_img_url_2'];?>"  width="40" height="40">
									   <?php         
										}else{
										?>
									   <i class="fa fa-<?php echo isset( $right_box['icon'] ) ? $right_box['icon'] : ''; ?>"></i>      
									   <?php
										}
									   ?>
								</div><!-- .service-icon -->
								<?php if ( isset( $right_box['title'] ) && $right_box['title'] != '' ) : ?>
									<h3 class="service-title"><?php echo $right_box['title']; ?></h3>
								<?php endif; ?>
								<?php if ( isset( $right_box['description'] ) && $right_box['description'] != '' ) : ?>
									<p class="service-content"><?php echo $right_box['description']; ?></p>
								<?php endif; ?>
								<?php if ( isset( $right_box['url'] ) && $right_box['url'] != '' ) : ?>
									</a>
								<?php endif; ?>
								<div class="spacer"></div>
							</div><!-- .icon-service-box -->
						<?php 
						}
					}
					if($service_item_number=="Even"){					
						?>
						
						<div class="icon-service-box<?php echo isset( $right_box['animation'] ) && $right_box['animation'] != '' ? ' wow ' . $right_box['animation'] . '" data-wow-delay=".5s' : ''; ?>">
							<?php if ( isset( $right_box['url'] ) && $right_box['url'] != '' ) : ?>
								<a href="<?php echo $right_box['url']; ?>">
							<?php endif; ?>

							<div class="service-icon text-center">
							  <?php
								if(isset( $right_box['icon_img_url_2'] ) && $right_box['icon_img_url_2'] !=''){
								?>
								<img src="<?php echo $right_box['icon_img_url_2'];?>"  width="40" height="40" >
							   <?php         
								}else{
								?>
							   <i class="fa fa-<?php echo isset( $right_box['icon'] ) ? $right_box['icon'] : ''; ?>"></i>      
							   <?php
								}
							   ?>
							</div><!-- .service-icon -->
							<?php if ( isset( $right_box['title'] ) && $right_box['title'] != '' ) : ?>
								<h3 class="service-title"><?php echo $right_box['title']; ?></h3>
							<?php endif; ?>

							<?php if ( isset( $right_box['description'] ) && $right_box['description'] != '' ) : ?>
								<p class="service-content"><?php echo $right_box['description']; ?></p>
							<?php endif; ?>

							<?php if ( isset( $right_box['url'] ) && $right_box['url'] != '' ) : ?>
								</a>
							<?php endif; ?>

							<div class="spacer"></div>
						</div><!-- .icon-service-box -->
						<?php
					}
					$rb++;
					endforeach; ?> 
				</div><!-- .right-icon-boxes -->
			<?php endif; ?>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #icon-service -->