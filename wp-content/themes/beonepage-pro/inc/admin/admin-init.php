<?php
// Load the theme/plugin options

if (file_exists(dirname(__FILE__) . '/options-init.php')){
	require_once (dirname(__FILE__) . '/options-init.php');
}

function beOne_customizer_update_default(){

	$page_on_reset = Kirki::get_option( 'front_page_skill_bar_module_skill_bar' );
	$page_on_fun   = Kirki::get_option( 'front_page_fun_fact_module_fact' );

	update_post_meta( get_option( 'page_on_front' ), '_beonepage_option_front_page_skill_bar_module_skill_bar', $page_on_reset);	
	update_post_meta( get_option( 'page_on_front' ), '_beonepage_option_front_page_fun_fact_module_fact', $page_on_fun);
	
}
add_action ("redux/options/redux_demo/reset", "beOne_customizer_update_default" );

function register_beonepage_general_settings() {

	$blog_page_read_more = apply_filters('beonepage_get_key', 'blog_page_read_more');
	$footer_copyright = apply_filters('beonepage_get_key', 'footer_copyright');
	// add Setting
	register_setting('general', $blog_page_read_more);
	register_setting('general', $footer_copyright);
	
	// add Setting fields for Blog Button
	add_settings_field( $blog_page_read_more, '<label for=" ' . $blog_page_read_more . ' ">'.__('Read More Button Text' , 'beonepage' ).'</label>' , 'general_settings_blog_fields', 'general' );
	// add Setting fields for Footer Copy Write
	add_settings_field( $footer_copyright, '<label for="'.$footer_copyright.'">'.__('Copyright Information' , 'beonepage' ).'</label>' , 'general_settings_footer_fields', 'general' );
}
// Callback function for Footer Copy Write
function general_settings_blog_fields(){

	$blog_page_read_more = apply_filters('beonepage_get_key', 'blog_page_read_more');
	$blog_page_input = get_option( $blog_page_read_more );

	if( empty( $blog_page_input ) ) {
		$blog_page_input  = Kirki::get_option( 'blog_page_read_more' );
		update_option( $blog_page_read_more, $blog_page_input );
	}
	echo '<input type="text" id="'.$blog_page_read_more.'" name="'.$blog_page_read_more.'" value="' . $blog_page_input . '" />';
}

// Callback function for Footer Copy Write
function general_settings_footer_fields() {
	
	$footer_copyright = apply_filters('beonepage_get_key', 'footer_copyright');
	$blog_footer_info = html_entity_decode( get_option( $footer_copyright ) );
	
	if( empty( $blog_footer_info ) ) {
		$blog_footer_info  = Kirki::get_option( 'footer_copyright' );
		update_option( $footer_copyright, $blog_footer_info );
	}
	echo wp_editor( 
        $blog_footer_info, 
        'sitepublishingguidelines', 
        array( 
		'textarea_name' => $footer_copyright,
		'textarea_rows' => 5,
		'media_buttons' => FALSE,
		)
    );
}
add_filter('admin_init', 'register_beonepage_general_settings');

function beonepage_get_key_function( $setting_key ){
	$language_code = '';
	if ( class_exists('SitePress') ) {
		 $my_current_lang = apply_filters( 'wpml_current_language', NULL );
		 $default_language = apply_filters( 'wpml_default_language', NULL );
		 if( ( $my_current_lang != 'all' ) && ( $my_current_lang != $default_language ) ) {
			$language_code = '_'.$my_current_lang;
		 }
	}
	if( function_exists( 'pll_current_language' ) ) {
		if( !empty( pll_current_language() ) && ( pll_current_language() != pll_default_language() ) ) {
			$language_code = '_'.pll_current_language();
		}
	}
	$footer_copyright = $setting_key.$language_code;
	return $footer_copyright;
}
add_filter('beonepage_get_key', 'beonepage_get_key_function');
