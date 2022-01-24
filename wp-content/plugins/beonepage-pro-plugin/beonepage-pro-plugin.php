<?php
/*
Plugin Name: BeOnePage Pro Plugin
Description: This plugin is required for BeOnePage Pro theme.
Author:      BeTheme
Version:     1.2.5
Author URI:  http://betheme.me/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: beonepage
*/

class beOnePageProPlugin {
    public static function init() {
        $class = __CLASS__;

        new $class;
    }

    public function __construct() {
		// Add Custom Menu plugin.
		require_once plugin_dir_path( __FILE__ ) . 'inc/custom-menu/array-column.php';
		require_once plugin_dir_path( __FILE__ ) . 'inc/custom-menu/menu-item-custom-field.php';

		// Add Custom Post Type plugin.
		require_once plugin_dir_path( __FILE__ ) . 'inc/cpt/CPT.php';
		require_once plugin_dir_path( __FILE__ ) . 'inc/cpt/portfolio-post-type.php';

		// Add Custom Meta Box 2 plugin.
		require_once plugin_dir_path( __FILE__ ) . 'inc/cmb2/CMB.php';

		// Add TwitterOAuth plugin.
		require_once plugin_dir_path( __FILE__ ) . 'inc/twitteroauth/autoload.php';

		// Add MailChimp plugin.
		require_once plugin_dir_path( __FILE__ ) . 'inc/mailchimp/mailchimp.php';
		
		// Add Demo importer.
		require_once plugin_dir_path( __FILE__ ) . 'demo-importer/theme-demo-import.php';
    }
}
add_action( 'plugins_loaded', array( 'beOnePageProPlugin', 'init' ) );

function beonepage_olddata_fetch($beonepage_key, $beonepage_field_name){
	$beonepage_setting="";
	if($beonepage_field_name=="option"){
		$beonepage_setting = Kirki::get_option( $beonepage_key );
	}
	return $beonepage_setting;
}
function beonepage_olddata_fetch_redux($beonepage_key, $beonepage_field_name){
	$beonepage_setting="";
	return $beonepage_setting;
}
function beonepage_theme_animate() {
	$animate = array(
		'none'          => __( 'none', 'beonepage' ),
		'flash'         => __( 'flash', 'beonepage' ),
		'pulse'         => __( 'pulse', 'beonepage' ),
		'rubberBand'    => __( 'rubberBand', 'beonepage' ),
		'shake'         => __( 'shake', 'beonepage' ),
		'swing'         => __( 'swing', 'beonepage' ),
		'tada'          => __( 'tada', 'beonepage' ),
		'wobble'        => __( 'wobble', 'beonepage' ),
		'jello'         => __( 'jello', 'beonepage' ),
		'bounce'        => __( 'bounce', 'beonepage' ),
		'bounceIn'      => __( 'bounceIn', 'beonepage' ),
		'bounceInLeft'  => __( 'bounceInLeft', 'beonepage' ),
		'bounceInRight' => __( 'bounceInRight', 'beonepage' ),
		'bounceInUp'    => __( 'bounceInUp', 'beonepage' ),
		'bounceInDown'  => __( 'bounceInDown', 'beonepage' ),
		'fadeIn'        => __( 'FadeIn', 'beonepage' ),
		'fadeInLeft'    => __( 'FadeInLeft', 'beonepage' ),
		'fadeInRight'   => __( 'FadeInRight', 'beonepage' ),
		'fadeInUp'      => __( 'FadeInUp', 'beonepage' ),
		'fadeInDown'    => __( 'FadeInDown', 'beonepage' ),
		'flipInX'       => __( 'flipInX', 'beonepage' ),
		'flipInY'       => __( 'flipInY', 'beonepage' ),
		'slideInLeft'   => __( 'slideInLeft', 'beonepage' ),
		'slideInRight'  => __( 'slideInRight', 'beonepage' ),
		'slideInUp'     => __( 'slideInUp', 'beonepage' ),
		'slideInDown'   => __( 'slideInDown', 'beonepage' ),
		'zoomIn'        => __( 'zoomIn', 'beonepage' ),
		'zoomInLeft'    => __( 'zoomInLeft', 'beonepage' ),
		'zoomInRight'   => __( 'zoomInRight', 'beonepage' ),
		'zoomInUp'      => __( 'zoomInUp', 'beonepage' ),
		'zoomInDown'    => __( 'zoomInDown', 'beonepage' )
	);

	return $animate;
}

class ElementorCustomElement {

   private static $instance = null;

   public static function get_instance() {
      if ( ! self::$instance )
         self::$instance = new self;
      return self::$instance;
   }

   public function init(){
      add_action( 'elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ) );
   }

   public function widgets_registered() {

      // We check if the Elementor plugin has been installed / activated.
      if(defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base')){

         // We look for any theme overrides for this custom Elementor element.
         // If no theme overrides are found we use the default one in this plugin.

         $widget_file = get_template_directory() .'/include.php';
         $template_file = locate_template($widget_file);
         if ( !$template_file || !is_readable( $template_file ) ) {
            $template_file = plugin_dir_path(__FILE__).'elementor/include.php' ;
         }
         if ( $template_file && is_readable( $template_file ) ) {
            require_once $template_file;
         }
      }
   }
}

ElementorCustomElement::get_instance()->init();

?>
