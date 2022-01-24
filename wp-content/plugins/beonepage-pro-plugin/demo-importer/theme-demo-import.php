<?php 
	
function beone_importer_styles() {
	wp_enqueue_style( 'beone-importer-style', plugin_dir_url( __FILE__ ) . 'assets/css/demo-import.css', false );
	wp_enqueue_script( 'beone-importer-script', plugin_dir_url( __FILE__ ) . 'assets/js/demo-import.js', false );
}
add_action('admin_enqueue_scripts', 'beone_importer_styles');

function beOne_import_files() {
	
    return array(
        array(
            'import_file_name'           => 'Beone Demo',
            'import_file_url'            => plugin_dir_url( __FILE__ ) . 'all.xml',
            'import_redux'               => array(
                array(
                    'file_url'    =>  plugin_dir_url( __FILE__ ) . 'redux_options.json',
                    'option_name' => 'redux_demo',
                ),
            ),
            'import_preview_image_url'   => get_template_directory_uri(). '/screenshot.png',
            'preview_url'                => 'https://beonepage.betheme.me/',
        )
    );
}
add_filter( 'pt-ocdi/import_files', 'beOne_import_files' );

function beOne_after_import_setup() {
    // Assign menus to their locations.
    $beOne_main_menu = get_term_by( 'name', 'Header Menu', 'nav_menu' );
    set_theme_mod( 'nav_menu_locations', array(
            'main-menu' => $beOne_main_menu->term_id,
        )
    );
    // Assign front page and posts page (blog page).
    $beOne_front_page_id = get_page_by_title( 'Home' );
    $beOne_blog_page_id  = get_page_by_title( 'Blog' );
    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $beOne_front_page_id->ID );
    update_option( 'page_for_posts', $beOne_blog_page_id->ID );
}
add_action( 'pt-ocdi/after_import', 'beOne_after_import_setup' );