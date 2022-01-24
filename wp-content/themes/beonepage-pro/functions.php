<?php
/**
 * BeOnePage functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BeOnePage
 */

if ( ! function_exists( 'beonepage_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function beonepage_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on BeOnePage, use a find and replace
	 * to change 'beonepage' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'beonepage', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add style sheet for WordPress visual editor.
	add_editor_style( 'layouts/editor.style.css' );
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	/*
	 * custom header image for the header
	 *
	*/
	add_theme_support( 'custom-header' );
	/*
	 *  custom background images or solid colors for the background
	 *
	*/
	add_theme_support( 'custom-background' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'featured-thumb', 720, 480, true  );
	add_image_size( 'gallery-thumb', 925, 695, true );
	add_image_size( 'gallery-thumb-sm', 100, 75, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => esc_html__( 'Header Menu', 'beonepage' ),
		'secondary' => esc_html__( 'Social Menu', 'beonepage' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'image',
		'gallery',
		'audio',
		'video'
	) );
	remove_theme_support( 'widgets-block-editor' );
}
endif; // beonepage_setup
add_action( 'after_setup_theme', 'beonepage_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function beonepage_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'beonepage_content_width', 1140 );
}
add_action( 'after_setup_theme', 'beonepage_content_width', 0 );

/**
 * Add support for WooCommerce.
 */
function beonepage_woocommerce_support() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	update_option( 'shop_catalog_image_size', array( 'width' => '280', 'height' => '370', 'crop' => 1 ) );
}
add_action( 'after_setup_theme', 'beonepage_woocommerce_support' );

//add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

add_filter( 'loop_shop_per_page', 'beonepage_product_column', 20);
function beonepage_product_column(){
		$cols = 4; 
		return $cols;
	}
/**
 * Load theme updater functions.
 * Action is used so that child themes can easily disable.
 */
function beonepage_theme_updater() {
	require_once( get_template_directory() . '/updater/theme-updater.php' );
}
add_action( 'after_setup_theme', 'beonepage_theme_updater' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function beonepage_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'beonepage' ),
		'id'            => 'sidebar-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce', 'beonepage' ),
		'id'            => 'sidebar-woocommerce',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	$widgets = beOneKirki::get_option( 'front_page_widget_module_widget' );

	if ( ! empty( $widgets ) ) {
		foreach ( $widgets as $widget ) {
			if ( ! empty( $widget['title'] ) ) {
			register_sidebar( array(
				'name'          => $widget['title'],
				'id'            => str_replace( ' ', '-', $widget['title'] ),
				'description'   => esc_html__( 'Widget Areas for Front Page', 'beonepage' ),
				'before_widget' => '<aside id="%1$s" class="col-md-' . 12 / $widget['url'] . ' %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
			}
		}
	}
}
add_action( 'widgets_init', 'beonepage_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function beonepage_scripts() {

	wp_enqueue_style( 'beonepage-bootstrap-style', get_template_directory_uri() . '/layouts/bootstrap.min.css', array(), '3.3.7' );

	wp_enqueue_style( 'beonepage-font-awesome-style', get_template_directory_uri() . '/layouts/font.awesome.min.css', array(), '4.7.0' );

	wp_enqueue_style( 'beonepage-animate-style', get_template_directory_uri() . '/layouts/animate.min.css', array(), '3.5.2' );

	wp_enqueue_style( 'beonepage-magnific-popup-style', get_template_directory_uri() . '/layouts/magnific.popup.css', array(), '1.1.0' );

	wp_enqueue_style( 'beonepage-owl-carousel-style', get_template_directory_uri() . '/layouts/owl.carousel.min.css', array(), '2.3.0' );

	wp_enqueue_style( 'beonepage-YTPlayer-style', get_template_directory_uri() . '/layouts/ytplayer/css/jquery.mb.YTPlayer.min.css', array(), '4.4.1' );

	wp_enqueue_style( 'beonepage-swiper-style', get_template_directory_uri() . '/layouts/swiper.min.css', array(), '4.4.1' );
	
	wp_enqueue_style( 'beonepage-jquery-fancybox-style', get_template_directory_uri() . '/assets/fancymedia/css/jquery.fancybox.css', array(), '2.1.5' );

	$redux_inline_css = '::selection, ::-moz-selection, ::-moz-selection{background:'. beOneKirki::get_option( 'blog_page_accent_color' ) .'}';

    wp_add_inline_style( 'beonepage-jquery-fancybox-style', $redux_inline_css );

	wp_enqueue_style( 'beonepage-style', get_stylesheet_uri() );

	wp_enqueue_style( 'beonepage-responsive-style', get_template_directory_uri() . '/layouts/responsive.css', array(), beonepage_get_version() );
	
	
	wp_enqueue_script( 'beonepage-bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.7', true );
	
	
	wp_enqueue_script( 'beonepage-jquery-fancybox-pack-script', get_template_directory_uri() . '/assets/fancymedia/js/jquery.fancybox.pack.js', array(), '2.1.5', true );
	
	wp_enqueue_script( 'beonepage-jquery-fancybox-media-script', get_template_directory_uri() . '/assets/fancymedia/js/jquery.fancybox-media.js', array(), '1.0.6', true );
	

	wp_enqueue_script( 'beonepage-jRespond-script', get_template_directory_uri() . '/js/jrespond.min.js', array(), '0.10', true );

	wp_enqueue_script( 'beonepage-smoothscroll-script', get_template_directory_uri() . '/js/smooth.scroll.min.js', array(), '1.4.6', true );

	wp_enqueue_script( 'beonepage-stellar-script', get_template_directory_uri() . '/js/jquery.stellar.min.js', array(), '0.6.2', true );

	wp_enqueue_script( 'beonepage-wow-script', get_template_directory_uri() . '/js/wow.min.js', array(), '1.1.3', true );

	wp_enqueue_script( 'beonepage-transit-script', get_template_directory_uri() . '/js/jquery.transit.js', array(), '0.9.12', true );

	wp_enqueue_script( 'beonepage-easing-script', get_template_directory_uri() . '/js/jquery.easing.min.js', array(), '1.4.0', true );

	wp_enqueue_script( 'beonepage-ytplayer-script', get_template_directory_uri() . '/js/jquery.mb.ytplayer.min.js', array(), '3.0.20', true );

	wp_enqueue_script( 'beonepage-imagesloaded-script', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), '4.1.3', true );

	wp_enqueue_script( 'beonepage-isotope-script', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), '3.0.4', true );

	wp_enqueue_script( 'beonepage-nicescroll-script', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array(), '3.7.3', true );

	wp_enqueue_script( 'beonepage-smooth-scroll-script', get_template_directory_uri() . '/js/jquery.smooth.scroll.min.js', array(), '2.2.0', true );

	wp_enqueue_script( 'beonepage-magnific-popup-script', get_template_directory_uri() . '/js/jquery.magnific.popup.min.js', array(), '1.1.0', true );

	wp_enqueue_script( 'beonepage-owl-carousel-script', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '2.3.0', true );

	wp_enqueue_script( 'beonepage-flexslider-script', get_template_directory_uri() . '/js/jquery.flexslider.min.js', array(), '2.6.3', true );
	wp_enqueue_script( 'beonepage-swiper-script', get_template_directory_uri() . '/js/swiper.min.js', array(), '4.4.1', true );

	wp_enqueue_script( 'beonepage-validate-script', get_template_directory_uri() . '/js/jquery.validate.min.js', array(), '1.16.0', true );

	wp_enqueue_script( 'beonepage-count-script', get_template_directory_uri() . '/js/jquery.count.to.js', array(), '1.2.0', true );

	wp_enqueue_script( 'beonepage-waypoint-script', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array(), '4.0.1', true );
	
	
	

	//google map
	if(Kirki::get_option( 'front_page_contact_module_gmap') == 1){
		wp_enqueue_script( 'beonepage-gmaps-script', '//maps.googleapis.com/maps/api/js?key=' . Kirki::get_option( 'front_page_contact_module_gmap_api_key' ), array(), '3', true );
	}
	wp_enqueue_script( 'beonepage-app-script', get_template_directory_uri() . '/js/app.js', array( 'jquery' ), beonepage_get_version(), true );

	// Localize the script with new data.
	wp_localize_script( 'beonepage-app-script', 'app_vars', array(
		'ajax_url'                 => admin_url( 'admin-ajax.php' ),
		'home_url'                 => esc_url( home_url( '/' ) ),
		'current_page_url'         => beonepage_get_current_url(),
		'page_transition_spinner'  => beOneKirki::get_option( 'page_transition_spinner' ),
		'loading_spinner_color'    => beOneKirki::get_option( 'loading_spinner_color' ),
		'loading_background_color' => beOneKirki::get_option( 'loading_background_color' ),
		'progress_bar_color'       => beOneKirki::get_option( 'progress_bar_color' ),
		'accent_color'             => Kirki::get_option( 'blog_page_accent_color' ),
		'btn_style'                => Kirki::get_option( 'blog_page_button_style' ),
		'close_map'                => esc_attr__( 'Close the map', 'beonepage' ),
		'play'                     => esc_attr__( 'Play', 'beonepage' ),
		'pause'                    => esc_attr__( 'Pause', 'beonepage' ),
		'mute'                     => esc_attr__( 'Mute', 'beonepage' ),
		'unmute'                   => esc_attr__( 'Unmute', 'beonepage' ),
		'popup'                    => esc_attr__( 'Show player in popup window', 'beonepage' ),
		'added_to_cart'            => esc_html__( 'Added to cart', 'beonepage' )
	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'beonepage_scripts' );

/**
 * Include admin style CSS.
 */
function beonepropage_admin_styles() {

	$add_theme_slug = 'beonproepage_';
	
    wp_enqueue_style( $add_theme_slug .'redux-custom', get_template_directory_uri() . '/layouts/redux-demo-style.css' );     
	
}
add_action( 'admin_enqueue_scripts', 'beonepropage_admin_styles' );

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/inc/tgmpa/tgm-plugin-activation.php';

/**
 * Load Kirki Customizer Toolkit.
 */
require_once get_template_directory() . '/inc/kirki/kirki.php';

/**
 * Load Customizer configuration.
 */

require_once get_template_directory() . '/inc/kirki/config.php';

/**
 * Load Theme Option.
 */
require_once get_template_directory() . '/inc/admin/admin-init.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Comments Callback.
 */
require_once get_template_directory() . '/inc/comments-callback.php';

/**
 * Add breadcrumb.
 */
require_once get_template_directory() . '/inc/breadcrumb.php';


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
function number_check($number){
    if($number % 2 == 0){
        return "Even";
    }
    else{
        return "Odd";
    }
}
/*Elementor Widget custom category */
function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'beonepage-widgets',
		[
			'title' => __( 'BeOnePage Widgets', 'beonepage' ),
			'icon' 	=> 'fa fa-plug',
		]

	);

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories');

/*Elementor widget custom category */

/**
 * All pagese array.
 */
function beonepage_page_list() {

	$page_list = [];
	$page_id = get_all_page_ids();
	foreach($page_id as $key => $id){
		$page_list[$id] = get_the_title($id);
	}
	return $page_list;
}


class beOneKirki{
	public static function get_option( $key = '') {
		$redux_demo = get_option( 'redux_demo' );
		if(isset($redux_demo[$key]) && !empty($redux_demo[$key])){
			return $redux_demo[$key];
		}
		else{
			return '';
		}
	}
}