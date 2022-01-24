<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BeOnePage
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php 
	wp_body_open();
	$animsition_class = '';
	if ( beOneKirki::get_option( 'general_page_transition' ) == '1') {
		$animsition_class = 'animsition';
	}
?>
<div class="preloader_main_wrapper" style="background-color:<?php echo beOneKirki::get_option( 'loading_background_color' ) ?>">
	<div class="preloader_main_wrapper_inner <?php echo $animsition_class; ?>">
	</div>
</div>
<div id="page" class="hfeed site">
	<a class="skip-link sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'beonepage' ); ?></a>

	<header id="masthead" class="site-header <?php echo beOneKirki::get_option( 'general_sticky_menu' ) == '1' ? 'sticky' : 'no-sticky'; ?>" role="banner">
		<?php if ( is_front_page() && beOneKirki::get_option( 'general_sticky_menu' ) == '1' && beOneKirki::get_option( 'general_progress_bar' ) == '1') : ?>
			<div id="scroll-progress-bar" class="scroll-progress-bar">
				<div><span class="scroll-shadow"></span></div>
			</div><!-- #scroll-progress-bar -->
		<?php endif; ?>

		<div class="<?php echo beOneKirki::get_option( 'menu_style_layout' ) == 'fixed' ? 'container' : 'container-fluid'; ?>">
			<div class="row">
				<div class="col-md-12 clearfix">
					<div class="site-branding">
						<?php if ( beOneKirki::get_option( 'icon_logo_type' ) == '1' ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_attr( beOneKirki::get_option( 'icon_logo_title' ) ); ?></a></h1>
						<?php else : ?>
							<div class="site-logo">
								<?php
									$icon_logo_logo_url = '';
									$icon_logo_logo_array = array();
									$icon_logo_retina_logo_url = '';
									$icon_logo_retina_logo_array = array();

									$icon_logo_logo_array = beOneKirki::get_option( 'icon_logo_logo' );
									$icon_logo_retina_logo_array = beOneKirki::get_option( 'icon_logo_retina_logo' );

									if( !empty( $icon_logo_logo_array[ 'url' ] ) ) {
										$icon_logo_logo_url = $icon_logo_logo_array[ 'url' ];
									}

									if( !empty( $icon_logo_retina_logo_array[ 'url' ] ) ) {
										$icon_logo_retina_logo_url = $icon_logo_retina_logo_array[ 'url' ];
									}

									$site_logo_alt = get_post_meta( beonepage_get_attachment_id_by_url( $icon_logo_logo_url ), '_wp_attachment_image_alt', true );
									$site_logo_alt = $site_logo_alt != '' ? $site_logo_alt : 'logo';

									if ( $icon_logo_retina_logo_url != '' ) {
										$site_retina_logo_alt = get_post_meta( beonepage_get_attachment_id_by_url( $icon_logo_retina_logo_url ), '_wp_attachment_image_alt', true );
										$site_retina_logo_alt = $site_retina_logo_alt != '' ? $site_retina_logo_alt : 'logo';
									}
								?>

								<a class="standard-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php
								if( !empty( $icon_logo_logo_url ) ) {
									?>
									<img src="<?php echo esc_url( $icon_logo_logo_url ); ?>" alt="<?php echo esc_attr( $site_logo_alt ); ?>"></a>
									<?php
								}
								?>

								<?php $site_retina_logo = $icon_logo_retina_logo_url != '' ? $icon_logo_retina_logo_url : $icon_logo_logo_url; ?>

								<a class="retina-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php
								if( !empty( $site_retina_logo ) ) {
									?>
									<img src="<?php echo $site_retina_logo; ?>" alt="<?php echo esc_attr( $site_retina_logo_alt ); ?>">
									<?php
								}
								?>
								</a>
							</div><!-- .site-logo -->
						<?php endif; ?>
					</div><!-- .site-branding -->

					<span id="mobile-menu" class="mobile-menu"></span>

					<nav id="site-navigation" class="main-navigation" role="navigation">
						<?php
							wp_nav_menu( array(
								'menu'            => 'primary',
								'theme_location'  => 'primary',
								'menu_id'         => 'primary-menu',
								'menu_class'      => 'menu clearfix',
								'container'       => false,
								'depth'           => 2,
								'walker'          => class_exists( 'beonepage_Walker_Nav_Menu' ) ? new beonepage_Walker_Nav_Menu :'',
								'fallback_cb'     => class_exists( 'beonepage_Walker_Nav_Menu' ) ? 'beonepage_Walker_Nav_Menu::fallback' :''
								)
							);
						?>
					</nav><!-- #site-navigation -->
				</div><!-- .col-md-12 -->
			</div><!-- .row -->
		</div><!-- .container -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
