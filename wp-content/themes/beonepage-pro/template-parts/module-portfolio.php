<?php
/**
 * Module part for displaying portfolio module.
 *
 * @package BeOnePage
 */
?>

<?php
	$class = '';
	$attribute = '';

	if ( beOneKirki::get_option( 'front_page_portfolio_module_bg' ) == 'color' ) {
		$class = ' no-background';
	} else {
		$class = ' img-background';
	}

	if ( beOneKirki::get_option( 'front_page_portfolio_module_bg' ) == 'image' && beOneKirki::get_option( 'front_page_portfolio_module_bg_parallax' ) == '1' ) {
		$class .= ' parallax';
		$attribute = ' data-stellar-background-ratio="0.5"';
	}

	if ( beOneKirki::get_option( 'front_page_portfolio_module_bg' ) == 'video' ) {
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . beOneKirki::get_option( 'front_page_portfolio_module_bg_video' ) . '"';
	}
	$title = get_post_meta( get_the_ID(), '_beonepage_option_front_page_portfolio_module_title', true );
	$subtitle = get_post_meta( get_the_ID(), '_beonepage_option_front_page_portfolio_module_subtitle', true );
	$filter_all_button = get_post_meta( get_the_ID(), '_beonepage_option_front_page_portfolio_module_all', true );
?>

<section id="<?php echo beOneKirki::get_option( 'front_page_portfolio_module_id' ); ?>" class="module portfolio-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
	<div class="container-fluid">
		<div class="row row-nopadding">
			<?php if ( $title != '' ) : ?>
				<?php $animation = beOneKirki::get_option( 'front_page_portfolio_module_animation' ) != 'none' ? ' wow ' . beOneKirki::get_option( 'front_page_portfolio_module_animation' ) . '" data-wow-delay=".2s' : ''; ?>

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
				$tags = get_terms( 'portfolio_tag' );
				//$count = count( $tags );
				$count = (is_array($tags)) ? count($tags) : 0;
			?>

			<?php if ( ! is_wp_error( $tags ) && $count > 0 && beOneKirki::get_option( 'front_page_portfolio_module_filter' ) == '1'  ) : ?>
				<?php $animation = beOneKirki::get_option( 'front_page_portfolio_module_filter_animation' ) != 'none' ? ' wow ' . beOneKirki::get_option( 'front_page_portfolio_module_filter_animation' ) . '" data-wow-delay=".3s' : ''; ?>

				<div id="portfolio-filter" class="portfolio-filters col-md-12 text-center<?php echo $animation; ?>">
					<?php if(beOneKirki::get_option( 'front_page_portfolio_module_show_all_hide' ) != "1"){	 ?>
						<a href="#" class="active" data-filter="*"><?php echo $filter_all_button ; ?></a>
					<?php
					}					
						$t=0;
						foreach ( $tags as $tag ) {
							$tag_name = str_replace( ' ', '-', strtolower( $tag->name ) );
							if(beOneKirki::get_option( 'front_page_portfolio_module_show_all_hide' ) == "1" && $t==0){
								printf( '<a href="#" class="active" data-filter=".portfolio-tag-%1s">%2s</a>', $tag_name, $tag->name );
							}else{
								printf( '<a href="#" data-filter=".portfolio-tag-%1s">%2s</a>', $tag_name, $tag->name );
							}
						$t++;	
						}
					?>
				</div><!-- #portfolio-filter -->
			<?php endif; ?>

			<div id="portfolio-container" class="col-md-10 col-md-offset-1"></div>

			<div id="portfolio-loader">
				<i class="fa fa-spinner fa-pulse"></i>
			</div><!-- .portfolio-loader -->

			<div class="portfolio-wrap col-md-12 clearfix" data-itemcolumn="<?php echo beOneKirki::get_option('front_page_portfolio_module_item_column_number'); ?>">
				<?php					
					$number_of_portfolio_item_limitation = beOneKirki::get_option('front_page_portfolio_module_item_limitation_switch');
					$number_of_portfolio_item = -1;
					$display_showall_button = "";
					
					if($number_of_portfolio_item_limitation == 2){						
						$number_of_portfolio_item = beOneKirki::get_option('front_page_portfolio_module_item_limitation_number');
						
						$number_of_portfolio_showall_button_text = beOneKirki::get_option('front_page_portfolio_module_item_showall_button_text');
						
						$display_showall_button_url = beOneKirki::get_option('front_page_portfolio_module_item_showall_button_url');
						
						$display_showall_button = '<div ="clearfix"><a href="'.$display_showall_button_url.'" target="_blank" class="btn btn-light">'.$number_of_portfolio_showall_button_text.'</a></div>';
					}			
					//echo $number_of_portfolio_item;
					$args = array(
						'post_type' => 'portfolio',
						'posts_per_page' => $number_of_portfolio_item
					);
					$query = new WP_Query( $args );

					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) : $query->the_post();

							get_template_part( 'template-parts/content', 'portfolio' );

						endwhile;
						
						
						
					} else {
						global $switch_portfolio_post;

						$switch_portfolio_post = 'portfolio';

						get_template_part( 'template-parts/content', 'none' );
					}

					wp_reset_postdata();
				?>
			</div><!-- #portfolio-wrap -->
			<div class="col-md-12 text-center showall_btn_wrap">
			<?php	
			echo $display_showall_button;
				?>
			</div>
		</div><!-- .row -->
	</div><!-- .container-fluid -->
</section><!-- #portfolio -->