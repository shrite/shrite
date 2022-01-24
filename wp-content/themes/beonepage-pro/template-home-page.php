<?php
/**
 * Template Name: Home Page
 * 
 * @package BeOnePage
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
				$modules = maybe_unserialize( beoneKirki::get_option( 'front_page_module_manager' ) );
				
				if ( ! empty( $modules ) && isset( $modules['enabled'])) {
					$enabled_modules = $modules['enabled'];
					foreach ( $enabled_modules as $enabled_module_key => $enabled_module) {
						get_template_part( 'template-parts/module', $enabled_module_key );
					}
				}?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
