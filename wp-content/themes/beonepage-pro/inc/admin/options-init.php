<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
    */
	
	// Convert RGBA To Hex
	function beoneRgbaToHex( $color ){
		$include_alpha = true;
		$pattern = '~^rgba?\((25[0-5]|2[0-4]\d|1\d{2}|\d\d?)\s*,\s*(25[0-5]|2[0-4]\d|1\d{2}|\d\d?)\s*,\s*(25[0-5]|2[0-4]\d|1\d{2}|\d\d?)\s*(?:,\s*([01]\.?\d*?))?\)$~';
		if (!preg_match($pattern, $color, $matches)) {
			return [];  // disqualified / no match
		}
		$rgba_array = array_slice($matches, 1, $include_alpha ? 4 : 3);
		$r = $rgba_array[0];
		$g = $rgba_array[1];
		$b = $rgba_array[2];
		$alpha = $rgba_array[3];
		if (is_array($r) && sizeof($r) == 3)
		list($r, $g, $b) = $r;
		$r = intval($r); 
		$g = intval($g);
		$b = intval($b);
		$r = dechex($r<0?0:($r>255?255:$r));
		$g = dechex($g<0?0:($g>255?255:$g));
		$b = dechex($b<0?0:($b>255?255:$b));
		$color = (strlen($r) < 2?'0':'').$r;
		$color .= (strlen($g) < 2?'0':'').$g;
		$color .= (strlen($b) < 2?'0':'').$b;
		$color ='#'.$color;
		$hex_color = $color;
		return array( 'color' => $hex_color, 'alpha' => $alpha );
	}
	
	// General Values Variable
	
	$permalink_url = '<a href="'. admin_url() .'options-reading.php" target="_blank">here</a>';
	$general_front_page_url = __(' Please click '.$permalink_url.' to set static front page');
	$general_post_page_url = __(' Please click '.$permalink_url.' to set static Post page');
	$general_page_transition = (class_exists('Kirki') && !empty(Kirki::get_option('general_page_transition'))) ? Kirki::get_option('general_page_transition') : '1';
	$page_transition_spinner = (class_exists('Kirki') && !empty(Kirki::get_option('page_transition_spinner'))) ? Kirki::get_option('page_transition_spinner') : '16'; 
	$loading_spinner_color= (class_exists('Kirki') && !empty(Kirki::get_option('loading_spinner_color'))) ? Kirki::get_option('loading_spinner_color') : '#ffcc00';
	$loading_background_color = (class_exists('Kirki') && !empty(Kirki::get_option('loading_background_color'))) ? Kirki::get_option('loading_background_color') : '#181a1c';
	$general_progress_bar = (class_exists('Kirki') && !empty(Kirki::get_option('general_progress_bar'))) ? Kirki::get_option('general_progress_bar') : '1';
	$general_sticky_menu = (class_exists('Kirki') && !empty(Kirki::get_option('general_sticky_menu'))) ? Kirki::get_option('general_sticky_menu') : '1';
	$progress_bar_color = (class_exists('Kirki') && !empty(Kirki::get_option('progress_bar_color'))) ? Kirki::get_option('progress_bar_color') : '#ffcc00';
	$general_go_to_top = (class_exists('Kirki') && !empty(Kirki::get_option('general_go_to_top'))) ? Kirki::get_option('general_go_to_top') : '1';
	$general_go_to_top_btn_tyle = (class_exists('Kirki') && !empty(Kirki::get_option('general_go_to_top_btn_tyle'))) ? Kirki::get_option('general_go_to_top_btn_tyle') : '1';
	
	//  Menu Style Variable
	
	$menu_style_layout = (class_exists('Kirki') && !empty(Kirki::get_option('menu_style_layout'))) ? Kirki::get_option
	('menu_style_layout') : 'fixed';
	$menu_style_link_color = (class_exists('Kirki') && !empty(Kirki::get_option('menu_style_link_color'))) ? Kirki::get_option('menu_style_link_color') : '#fff';
	$menu_style_link_color_hover = (class_exists('Kirki') && !empty(Kirki::get_option('menu_style_link_color_hover'))) ? Kirki::get_option('menu_style_link_color_hover') : '#ffcc00';
	$menu_style_submenu_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('menu_style_submenu_bg_color'))) ? Kirki::get_option('menu_style_submenu_bg_color') : '#23282d';
	$menu_style_submenu_link_color =  (class_exists('Kirki') && !empty(Kirki::get_option('menu_style_submenu_link_color'))) ? Kirki::get_option('menu_style_submenu_link_color') : '#eee';
	$menu_style_submenu_link_color_hover = (class_exists('Kirki') && !empty(Kirki::get_option('menu_style_submenu_link_color_hover'))) ? Kirki::get_option('menu_style_submenu_link_color_hover') : '#000';
	$menu_style_submenu_separator_color = (class_exists('Kirki') && !empty(Kirki::get_option('menu_style_submenu_separator_color'))) ? Kirki::get_option('menu_style_submenu_separator_color') : '#333';
	$menu_style_sticky_menu_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('menu_style_sticky_menu_bg_color'))) ? Kirki::get_option('menu_style_sticky_menu_bg_color') : '#18191b';
	$menu_style_sticky_menu_link_color = (class_exists('Kirki') && !empty(Kirki::get_option('menu_style_sticky_menu_link_color'))) ? Kirki::get_option('menu_style_sticky_menu_link_color') : '#fff';
	$menu_style_sticky_menu_border_color = (class_exists('Kirki') && !empty(Kirki::get_option('menu_style_sticky_menu_border_color'))) ? Kirki::get_option('menu_style_sticky_menu_border_color') : '#333';
	
	// Typography Values Variable
	
	$typography_disable_google_font = (class_exists('Kirki') && !empty(Kirki::get_option('typography_disable_google_font'))) ? Kirki::get_option('typography_disable_google_font') : '0';
	$theme_font_choices = Kirki_Fonts::get_font_choices();
	$typography_primary_font_family = (class_exists('Kirki') && !empty(Kirki::get_option('typography_primary_font_family'))) ? Kirki::get_option('typography_primary_font_family') : 'Open Sans';
	$typography_secondary_font_family = (class_exists('Kirki') && !empty(Kirki::get_option('typography_secondary_font_family'))) ? Kirki::get_option('typography_secondary_font_family') : 'Dosis';
	$typography_tertiary_font_family = (class_exists('Kirki') && !empty(Kirki::get_option('typography_tertiary_font_family'))) ? Kirki::get_option('typography_tertiary_font_family') : 'Raleway';
	$typography_body_font_size = (class_exists('Kirki') && !empty(Kirki::get_option('typography_body_font_size'))) ? Kirki::get_option('typography_body_font_size') : '13';
	
	// Icon & Logo Values Variable
	
	$icon_logo_type = (class_exists('Kirki') && !empty(Kirki::get_option('icon_logo_type'))) ? Kirki::get_option('icon_logo_type') : '1';
	$icon_logo_logo = (class_exists('Kirki') && !empty(Kirki::get_option('icon_logo_logo'))) ? Kirki::get_option('icon_logo_logo') : '';
	$icon_logo_retina_logo = (class_exists('Kirki') && !empty(Kirki::get_option('icon_logo_retina_logo'))) ? Kirki::get_option('icon_logo_retina_logo') : '';
	
	// Front Page Module Manager
	
	$front_page_module_manager_array = Kirki::get_option('front_page_module_manager');
	$front_page_module_manager = array(
		'enabled' => array(),
		'disabled' => array()
	);
	if( is_array( $front_page_module_manager_array ) && !empty( $front_page_module_manager_array ) ) {
		foreach( $front_page_module_manager_array as $value ) {
			$front_page_module_manager[ 'enabled' ][ $value ] = $value;
		}
	}
	$front_page_slider_type = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_slider_type'))) ? Kirki::get_option('front_page_slider_type') : '1';
	$front_page_text_slider_title = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_text_slider_title'))) ? Kirki::get_option('front_page_text_slider_title') : 'Be <span>Imaginative</span> &bull; Be <span>Yourself</span>';
	$front_page_text_slider_content = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_text_slider_content'))) ? Kirki::get_option('front_page_text_slider_content') : 'We handcraft well-thought-out WordPress themes';
	$front_page_text_slider_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_text_slider_color'))) ? Kirki::get_option('front_page_text_slider_color') : '#fff';
	$front_page_text_slider_btn_text = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_text_slider_btn_text'))) ? Kirki::get_option('front_page_text_slider_btn_text') : 'Learn More';
	$front_page_text_slider_btn_url = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_text_slider_btn_url'))) ? Kirki::get_option('front_page_text_slider_btn_url') : 'http://betheme.me';
	$front_page_text_slider_btn_style = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_text_slider_btn_style'))) ? Kirki::get_option('front_page_text_slider_btn_style') : '1';
	$front_page_text_slider_bg = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_text_slider_bg'))) ? Kirki::get_option('front_page_text_slider_bg') : array(
		'background-image'      => get_template_directory_uri() . '/images/background.jpg',
		'background-repeat'     => 'no-repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	);
	$front_page_text_slider_parallax = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_text_slider_parallax'))) ? Kirki::get_option('front_page_text_slider_parallax') : '1';
	$front_page_text_slider_scroll_down = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_text_slider_scroll_down'))) ? Kirki::get_option('front_page_text_slider_scroll_down') : '1';
	$front_page_custom_module_bg = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_custom_module_bg'))) ? Kirki::get_option('front_page_custom_module_bg') : 'color';
	$front_page_swiper_slider_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_swiper_slider_color'))) ? Kirki::get_option('front_page_swiper_slider_color') : '#fff';
	$front_page_swiper_slider_btn_style = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_swiper_slider_btn_style'))) ? Kirki::get_option('front_page_swiper_slider_btn_style') : '1';
	$front_page_swiper_slider_parallax = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_swiper_slider_parallax'))) ? Kirki::get_option('front_page_swiper_slider_parallax') : '1';
	$front_page_swiper_slider_scroll_down = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_swiper_slider_scroll_down'))) ? Kirki::get_option('front_page_swiper_slider_scroll_down') : '1';
	$front_page_slider_switch = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_slider_switch'))) ? Kirki::get_option('front_page_slider_switch') : '1';
	$front_page_swiper_slider_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_swiper_slider_notice'))) ? Kirki::get_option('front_page_swiper_slider_notice') : '<p>' . __( "You can create slides from Slider Metabox by editing your Front Page.", 'beonepage' ) . '</p><p><i><a href="' . get_edit_post_link( get_option('page_on_front') ) . '" target="_blank">' . __( 'Edit Front Page', 'beonepage' ) . '</a></i></p>';
	$front_page_slider_time  = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_slider_time'))) ? Kirki::get_option('front_page_slider_time') : '5000';

	//Icon Service with Image Module Variable
	
	$front_page_icon_service_img_module_bg_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_img_module_bg_notice'))) ? Kirki::get_option('front_page_icon_service_img_module_bg_notice') : '<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so its better to define both Image and YouTube Video for best results.</p>';
	$front_page_icon_service_img_module_bg_video = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_img_module_bg_video'))) ? Kirki::get_option('front_page_icon_service_img_module_bg_video') : '';
	$front_page_icon_service_img_module_bg_parallax = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_img_module_bg_parallax'))) ? Kirki::get_option('front_page_icon_service_img_module_bg_parallax') : '1';
	$front_page_icon_service_img_module_bg_img = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_img_module_bg_img'))) ? Kirki::get_option('front_page_icon_service_img_module_bg_img') : 
	array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	);
	$front_page_icon_service_img_module_bg_color =(class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_img_module_bg_color'))) ? Kirki::get_option('front_page_icon_service_img_module_bg_color') : 'color';
	$front_page_icon_service_img_module_bg = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_img_module_bg'))) ? Kirki::get_option('front_page_icon_service_img_module_bg') : 'color';
	$front_page_icon_service_img_module_icon_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_img_module_icon_color'))) ? Kirki::get_option('front_page_icon_service_img_module_icon_color') : '#ffcc00';
	$front_page_icon_service_img_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_img_animation'))) ? Kirki::get_option('front_page_icon_service_img_animation') : 'none';
	$front_page_icon_service_img_module_img_url = Kirki::get_option('front_page_icon_service_img_module_img');
	$front_page_icon_service_img_module_img = array();
	$front_page_icon_service_img_module_img['url']=$front_page_icon_service_img_module_img_url;
	$front_page_icon_service_img_module_sp_i_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_img_module_sp_i_color'))) ? Kirki::get_option('front_page_icon_service_img_module_sp_i_color') : '#ffcc00';
	$front_page_icon_service_img_module_sp_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_img_module_sp_color'))) ? Kirki::get_option('front_page_icon_service_img_module_sp_color') : '#ffcc00';
	$front_page_icon_service_img_module_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_img_module_color'))) ? Kirki::get_option('front_page_icon_service_img_module_color') : '#eceff3';
	$front_page_icon_service_img_module_subtitle = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_img_module_subtitle'))) ? Kirki::get_option('front_page_icon_service_img_module_subtitle') : 'Subtitle for icon service with image module';
	$front_page_icon_service_img_module_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_img_module_animation'))) ? Kirki::get_option('front_page_icon_service_img_module_animation') : 'none';
	$front_page_icon_service_img_module_title = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_img_module_title'))) ? Kirki::get_option('front_page_icon_service_img_module_title') : 'Icon <span>Service</span> with Image Module';
	$front_page_icon_service_img_module_id = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_img_module_id'))) ? Kirki::get_option('front_page_icon_service_img_module_id') : 'icon-service-img-module';
	$front_page_icon_service_img_module_layout = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_img_module_layout'))) ? Kirki::get_option('front_page_icon_service_img_module_layout') : 'full';
	$front_page_icon_service_img_module_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_img_module_notice'))) ? Kirki::get_option('front_page_icon_service_img_module_notice') : '<p>' . __( "You can create icon service boxes from Icon Services with Image Metabox by editing your Front Page.", 'beonepage' ) . '</p><p><i><a href="' . get_edit_post_link( get_option('page_on_front') ) . '" target="_blank">' . __( 'Edit Front Page', 'beonepage' ) . '</a></i></p>';
	
	//Portfolio Promotion Variable
	
	$front_page_portfolio_module_modal_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_modal_bg_color'))) ? Kirki::get_option('front_page_portfolio_module_modal_bg_color') : '#181a1c';
	$front_page_portfolio_module_id = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_id'))) ? Kirki::get_option('front_page_portfolio_module_id') : 'portfolio-module';
	$front_page_portfolio_module_modal_sp_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_modal_sp_color'))) ? Kirki::get_option('front_page_portfolio_module_modal_sp_color') : '#333';
	$front_page_portfolio_module_modal_content_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_modal_content_color'))) ? Kirki::get_option('front_page_portfolio_module_modal_content_color') : '#eceff3';
	$front_page_portfolio_module_modal_title_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_modal_title_color'))) ? Kirki::get_option('front_page_portfolio_module_modal_title_color') : '#ffcc00';
	$front_page_portfolio_module_item_showall_button_url = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_item_showall_button_url'))) ? Kirki::get_option('front_page_portfolio_module_item_showall_button_url') : '';
	$front_page_portfolio_module_item_showall_button_text = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_item_showall_button_text'))) ? Kirki::get_option('front_page_portfolio_module_item_showall_button_text') : 'Show More';
	$front_page_portfolio_module_item_limitation_number = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_item_limitation_number'))) ? Kirki::get_option('front_page_portfolio_module_item_limitation_number') : '12';
	$front_page_portfolio_module_item_image_popup = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_item_image_popup'))) ? Kirki::get_option('front_page_portfolio_module_item_image_popup') : '1';
	$front_page_portfolio_module_item_limitation_switch = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_item_limitation_switch'))) ? Kirki::get_option('front_page_portfolio_module_item_limitation_switch') : '1';
	$front_page_portfolio_module_item_column_number = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_item_column_number'))) ? Kirki::get_option('front_page_portfolio_module_item_column_number') : '4';
	$front_page_portfolio_module_item_tag_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_item_tag_color'))) ? Kirki::get_option('front_page_portfolio_module_item_tag_color') : '#ddd';
	$front_page_portfolio_module_item_title_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_item_title_color'))) ? Kirki::get_option('front_page_portfolio_module_item_title_color') : '#ffcc00';
	$front_page_portfolio_module_item_bg_color  = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_item_bg_color'))) ? Kirki::get_option('front_page_portfolio_module_item_bg_color') : 'rgba(0,0,0,.8)';
	if (strpos($front_page_portfolio_module_item_bg_color, '#') !== false) {
		$front_page_portfolio_module_item_bg_color = array( 'color' => $front_page_portfolio_module_item_bg_color, 'alpha' => 1 );
	}else{
		$front_page_portfolio_module_item_bg_color = beoneRgbaToHex($front_page_portfolio_module_item_bg_color);
	}
	$front_page_portfolio_module_filter_bg_color  = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_filter_bg_color'))) ? Kirki::get_option('front_page_portfolio_module_filter_bg_color') : '#eee';
	$front_page_portfolio_module_filter_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_filter_color'))) ? Kirki::get_option('front_page_portfolio_module_filter_color') : '#333';
	$front_page_portfolio_module_all = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_all'))) ? Kirki::get_option('front_page_portfolio_module_all') : 'Show All';
	$front_page_portfolio_module_filter_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_filter_animation'))) ? Kirki::get_option('front_page_portfolio_module_filter_animation') : 'none';
	$front_page_portfolio_module_filter = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_filter'))) ? Kirki::get_option('front_page_portfolio_module_filter') : '#333';
	$front_page_portfolio_module_bg = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_bg'))) ? Kirki::get_option('front_page_portfolio_module_bg') : 'color';
	$front_page_portfolio_module_show_all_hide = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_show_all_hide'))) ? Kirki::get_option('front_page_portfolio_module_show_all_hide') : '';
	$front_page_portfolio_module_sp_i_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_sp_i_color'))) ? Kirki::get_option('front_page_portfolio_module_sp_i_color') : '#111';
	$front_page_portfolio_module_sp_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_sp_color'))) ? Kirki::get_option('front_page_portfolio_module_sp_color') : '#111';
	$front_page_portfolio_module_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_color'))) ? Kirki::get_option('front_page_portfolio_module_color') : '#181a1c';
	$front_page_portfolio_module_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_animation'))) ? Kirki::get_option('front_page_portfolio_module_animation') : 'none';
	$front_page_portfolio_module_subtitle = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_subtitle'))) ? Kirki::get_option('front_page_portfolio_module_subtitle') : 'Subtitle for portfolio module';
	$front_page_portfolio_module_title = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_title'))) ? Kirki::get_option('front_page_portfolio_module_title') : 'Portfolio Module';
	$front_page_portfolio_module_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_bg_color'))) ? Kirki::get_option('front_page_portfolio_module_bg_color') : '#ffcc00';
	$front_page_portfolio_module_bg_img = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_bg_img'))) ? Kirki::get_option('front_page_portfolio_module_bg_img') : array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	);
	$front_page_portfolio_module_bg_parallax = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_bg_parallax'))) ? Kirki::get_option('front_page_portfolio_module_bg_parallax') : '1';
	$front_page_portfolio_module_bg_video = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_bg_video'))) ? Kirki::get_option('front_page_portfolio_module_bg_video') : '';
	$front_page_portfolio_module_bg_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_bg_notice'))) ? Kirki::get_option('front_page_portfolio_module_bg_notice') : "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>";
	$front_page_portfolio_module_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_portfolio_module_notice'))) ? Kirki::get_option('front_page_portfolio_module_notice') : '';
	
	//Vertical Promotion Variable
	
	$front_page_ver_promo_module_bg_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_ver_promo_module_bg_notice'))) ? Kirki::get_option('front_page_ver_promo_module_bg_notice') : "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>";
	$front_page_ver_promo_module_bg = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_ver_promo_module_bg'))) ? Kirki::get_option('front_page_ver_promo_module_bg') : '';
	$front_page_ver_promo_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_ver_promo_color'))) ? Kirki::get_option('front_page_ver_promo_color') : '#eceff3';
	$front_page_ver_promo_btn_style = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_ver_promo_btn_style'))) ? Kirki::get_option('front_page_ver_promo_btn_style') : '1';
	$front_page_ver_promo_btn_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_ver_promo_btn_animation'))) ? Kirki::get_option('front_page_ver_promo_btn_animation') : 'none';
	$front_page_ver_promo_btn_url = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_ver_promo_btn_url'))) ? Kirki::get_option('front_page_ver_promo_btn_url') : 'http://betheme.me';
	$front_page_ver_promo_btn_text = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_ver_promo_btn_text'))) ? Kirki::get_option('front_page_ver_promo_btn_text') : 'Learn More';
	$front_page_ver_promo_content_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_ver_promo_content_animation'))) ? Kirki::get_option('front_page_ver_promo_content_animation') : 'none';
	$front_page_ver_promo_content = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_ver_promo_content'))) ? Kirki::get_option('front_page_ver_promo_content') : 'We build more than just Themes. We build User Experience for both, you and your visitors.';
	$front_page_ver_promo_title_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_ver_promo_title_animation'))) ? Kirki::get_option('front_page_ver_promo_title_animation') : 'none';
	$front_page_ver_promo_title = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_ver_promo_title'))) ? Kirki::get_option('front_page_ver_promo_title') : 'We are <span>BeTheme</span>';
	$front_page_ver_promo_module_id = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_ver_promo_module_id'))) ? Kirki::get_option('front_page_ver_promo_module_id') : 'ver-promo-module';
	$front_page_ver_promo_module_bg_parallax = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_ver_promo_module_bg_parallax'))) ? Kirki::get_option('front_page_ver_promo_module_bg_parallax') : '1';
	$front_page_ver_promo_module_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_ver_promo_module_bg_color'))) ? Kirki::get_option('front_page_ver_promo_module_bg_color') : '#181a1c';
	$front_page_ver_promo_module_bg_img = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_ver_promo_module_bg_img'))) ? Kirki::get_option('front_page_ver_promo_module_bg_img') : array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	);
	$front_page_ver_promo_module_bg_video = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_ver_promo_module_bg_video'))) ? Kirki::get_option('front_page_ver_promo_module_bg_video') : '';
	$front_page_ver_promo_module_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_ver_promo_module_notice'))) ? Kirki::get_option('front_page_ver_promo_module_notice') : '';
	
	//Horizontal Promotion Variable
	
	$front_page_hor_promo_module_bg = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_hor_promo_module_bg'))) ? Kirki::get_option('front_page_hor_promo_module_bg') : 'color';
	$front_page_hor_promo_module_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_hor_promo_module_bg_color'))) ? Kirki::get_option('front_page_hor_promo_module_bg_color') : '#181a1c';
	$front_page_hor_promo_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_hor_promo_color'))) ? Kirki::get_option('front_page_hor_promo_color') : '#eceff3';
	$front_page_hor_promo_btn_style = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_hor_promo_btn_style'))) ? Kirki::get_option('front_page_hor_promo_btn_style') : '1';
	$front_page_hor_promo_btn_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_hor_promo_btn_animation'))) ? Kirki::get_option('front_page_hor_promo_btn_animation') : 'none';
	$front_page_hor_promo_btn_url = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_hor_promo_btn_url'))) ? Kirki::get_option('front_page_hor_promo_btn_url') : 'http://betheme.me';
	$front_page_hor_promo_btn_text = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_hor_promo_btn_text'))) ? Kirki::get_option('front_page_hor_promo_btn_text') : 'Start Browsing';
	$front_page_hor_promo_content_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_hor_promo_content_animation'))) ? Kirki::get_option('front_page_hor_promo_content_animation') : 'none';
	$front_page_hor_promo_title_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_hor_promo_title_animation'))) ? Kirki::get_option('front_page_hor_promo_title_animation') : 'none';
	$front_page_hor_promo_title = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_hor_promo_title'))) ? Kirki::get_option('front_page_hor_promo_title') : '<span>WordPress Themes</span> That Make Your Life <span>Easier</span>';
	$front_page_hor_promo_module_id = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_hor_promo_module_id'))) ? Kirki::get_option('front_page_hor_promo_module_id') : 'hor-promo-module';
	$front_page_hor_promo_content = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_hor_promo_content'))) ? Kirki::get_option('front_page_hor_promo_content') : 'We build more than just Themes. We build User Experience for both, you and your visitors.';
	$front_page_hor_promo_module_bg_img = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_hor_promo_module_bg_img'))) ? Kirki::get_option('front_page_hor_promo_module_bg_img') : 
	array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	);

	//Blog Module Variable
	
	$front_page_blog_module_vw_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_vw_bg_color'))) ? Kirki::get_option('front_page_blog_module_vw_bg_color') : '#222';
	$front_page_blog_module_vw_icon_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_vw_icon_color'))) ? Kirki::get_option('front_page_blog_module_vw_icon_color') : '#eee';
	$front_page_blog_module_vw_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_vw_color'))) ? Kirki::get_option('front_page_blog_module_vw_color') : '#eee';
	$front_page_blog_module_view_more = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_view_more'))) ? Kirki::get_option('front_page_blog_module_view_more') : 'View More';
	$front_page_blog_module_rm_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_rm_bg_color'))) ? Kirki::get_option('front_page_blog_module_rm_bg_color') : 'rgba(255,204,0,.9)';
	if (strpos($front_page_blog_module_rm_bg_color, '#') !== false) {
		$front_page_blog_module_rm_bg_color = array( 'color' => $front_page_blog_module_rm_bg_color, 'alpha' => 1 );
	}else{
		$front_page_blog_module_rm_bg_color = beoneRgbaToHex($front_page_blog_module_rm_bg_color);
	}
	$front_page_blog_module_rm_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_rm_color'))) ? Kirki::get_option('front_page_blog_module_rm_color') : '#181a1c';
	$front_page_blog_module_read_more = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_read_more'))) ? Kirki::get_option('front_page_blog_module_read_more') : 'Read More';
	$front_page_blog_module_pd_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_pd_bg_color'))) ? Kirki::get_option('front_page_blog_module_pd_bg_color') : 'rgba(255,255,255,.9)';
	if (strpos($front_page_blog_module_pd_bg_color, '#') !== false) {
		$front_page_blog_module_pd_bg_color = array( 'color' => $front_page_blog_module_pd_bg_color, 'alpha' => 1 );
	}else{
		$front_page_blog_module_pd_bg_color = beoneRgbaToHex($front_page_blog_module_pd_bg_color);
	}
	$front_page_blog_module_pd_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_pd_color'))) ? Kirki::get_option('front_page_blog_module_pd_color') : '#222';
	$front_page_blog_module_bg_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_bg_notice'))) ? Kirki::get_option('front_page_blog_module_bg_notice') : "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>";
	$front_page_blog_module_bg = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_bg'))) ? Kirki::get_option('front_page_blog_module_bg') : "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>";
	$front_page_blog_module_sp_i_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_sp_i_color'))) ? Kirki::get_option('front_page_blog_module_sp_i_color') : '#111';
	$front_page_blog_module_sp_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_sp_color'))) ? Kirki::get_option('front_page_blog_module_sp_color') : '#111';
	$front_page_blog_module_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_color'))) ? Kirki::get_option('front_page_blog_module_color') : '#181a1c';
	$front_page_blog_module_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_animation'))) ? Kirki::get_option('front_page_blog_module_animation') : 'none';
	$front_page_blog_module_subtitle = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_subtitle'))) ? Kirki::get_option('front_page_blog_module_subtitle') : 'Subtitle for blog module';
	$front_page_blog_module_id = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_id'))) ? Kirki::get_option('front_page_blog_module_id') : 'blog-module';
	$front_page_blog_module_title = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_title'))) ? Kirki::get_option('front_page_blog_module_title') : 'Blog Module';
	$front_page_blog_module_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_bg_color'))) ? Kirki::get_option('front_page_blog_module_bg_color') : '#ffcc00';
	$front_page_blog_module_bg_img  = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_bg_img'))) ? Kirki::get_option('front_page_blog_module_bg_img') : array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	);
	$front_page_blog_module_bg_parallax = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_bg_parallax'))) ? Kirki::get_option('front_page_blog_module_bg_parallax') : '1';
	$front_page_blog_module_bg_video = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_bg_video'))) ? Kirki::get_option('front_page_blog_module_bg_video') : '';
	$front_page_blog_module_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_blog_module_notice'))) ? Kirki::get_option('front_page_blog_module_notice') : '';

	//Contact Module Variable
	
	$front_page_contact_module_email = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_email'))) ? Kirki::get_option('front_page_contact_module_email') : get_option('admin_email');
	$front_page_contact_module_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_notice'))) ? Kirki::get_option('front_page_contact_module_notice') : '<p>' . __( "You can create contact items from Contact Metabox by editing your Front Page.", 'beonepage' ) . '</p><p><i><a href="' . get_edit_post_link( get_option('page_on_front') ) . '" target="_blank">' . __( 'Edit Front Page', 'beonepage' ) . '</a></i></p>';
	$front_page_contact_module_gmap_api_link = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_gmap_api_link'))) ? Kirki::get_option('front_page_contact_module_gmap_api_link') : '<p><a href="' . esc_url( 'https://developers.google.com/maps/documentation/javascript/get-api-key' ) . '" target="_blank">' . __( 'How to get an API key?', 'beonepage' ) . '</a></p>';
	$front_page_contact_module_gmap_api_key = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_gmap_api_key'))) ? Kirki::get_option('front_page_contact_module_gmap_api_key') : '';
	$front_page_contact_module_gmap_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_gmap_notice'))) ? Kirki::get_option('front_page_contact_module_gmap_notice') : '<p><a href="' . esc_url( 'http://support.google.com/maps/answer/18539' ) . '" target="_blank">' . __( 'How to find latitude and longitude coordinates of a location?', 'beonepage' ) . '</a></p>';
	$front_page_contact_module_gmap_lng = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_gmap_lng'))) ? Kirki::get_option('front_page_contact_module_gmap_lng') : '-122.0844308' ;
	$front_page_contact_module_gmap_lat = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_gmap_lat'))) ? Kirki::get_option('front_page_contact_module_gmap_lat') : '37.4217429' ;
	$front_page_contact_module_gmap = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_gmap'))) ? Kirki::get_option('front_page_contact_module_gmap') : '1' ;
	$front_page_contact_module_btn_style = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_btn_style'))) ? Kirki::get_option('front_page_contact_module_btn_style') : '1' ;
	$front_page_contact_module_cf_privacy_page = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_cf_privacy_page'))) ? Kirki::get_option('front_page_contact_module_cf_privacy_page') : 'none' ;
	$front_page_contact_module_enable_privacy = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_enable_privacy'))) ? Kirki::get_option('front_page_contact_module_enable_privacy') : '1' ;
	$front_page_contact_module_send = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_send'))) ? Kirki::get_option('front_page_contact_module_send') : 'Send' ;
	$front_page_contact_module_cf_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_cf_animation'))) ? Kirki::get_option('front_page_contact_module_cf_animation') : 'none' ;
	$front_page_contact_module_bg_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_bg_notice'))) ? Kirki::get_option('front_page_contact_module_bg_notice') : "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>" ;
	$front_page_contact_module_bg = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_bg'))) ? Kirki::get_option('front_page_contact_module_bg') : 'color' ;
	$front_page_contact_module_sp_i_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_sp_i_color'))) ? Kirki::get_option('front_page_contact_module_sp_i_color') : '#ffcc00' ;
	$front_page_contact_module_sp_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_sp_color'))) ? Kirki::get_option('front_page_contact_module_sp_color') : '#888' ;
	$front_page_contact_module_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_color'))) ? Kirki::get_option('front_page_contact_module_color') : '#eceff3' ;
	$front_page_contact_module_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_animation'))) ? Kirki::get_option('front_page_contact_module_animation') : 'none' ;
	$front_page_contact_module_subtitle = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_subtitle'))) ? Kirki::get_option('front_page_contact_module_subtitle') : 'Subtitle for contact module' ;
	$front_page_contact_module_title = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_title'))) ? Kirki::get_option('front_page_contact_module_title') : '<span>Contact</span> Module' ;
	$front_page_contact_module_id = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_id'))) ? Kirki::get_option('front_page_contact_module_id') : 'contact-module' ;
	$front_page_contact_module_bg_video = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_bg_video'))) ? Kirki::get_option('front_page_contact_module_bg_video') : '' ;
	$front_page_contact_module_bg_parallax = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_bg_parallax'))) ? Kirki::get_option('front_page_contact_module_bg_parallax') : '1' ;
	$front_page_contact_module_bg_img = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_bg_img'))) ? Kirki::get_option('front_page_contact_module_bg_img') : array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	) ;
	$front_page_contact_module_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_bg_color'))) ? Kirki::get_option('front_page_contact_module_bg_color') : '#181a1c' ;

	//Process Module Variable
	
	$front_page_process_module_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_process_module_notice'))) ? Kirki::get_option('front_page_process_module_notice') : 
	'<p>' . __( "You can create process flow from Process Metabox by editing your Front Page.", 'beonepage' ) . '</p><p><i><a href="' . get_edit_post_link( get_option('page_on_front') ) . '" target="_blank">' . __( 'Edit Front Page', 'beonepage' ) . '</a></i></p>';
	$front_page_process_module_bg_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_process_module_bg_notice'))) ? Kirki::get_option('front_page_process_module_bg_notice') : 
	"<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>";
	$front_page_process_module_bg = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_process_module_bg'))) ? Kirki::get_option('front_page_process_module_bg') :
	'color';
	$front_page_process_module_active_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_process_module_active_color'))) ? Kirki::get_option('front_page_process_module_active_color') : 
	'#ffcc00';
	$front_page_process_module_label_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_process_module_label_color'))) ? Kirki::get_option('front_page_process_module_label_color') : 
	'#888';
	$front_page_process_module_sp_i_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_process_module_sp_i_color'))) ? Kirki::get_option('front_page_process_module_sp_i_color') :
	'#ffcc00';
	$front_page_process_module_sp_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_process_module_sp_color'))) ? Kirki::get_option('front_page_process_module_sp_color') : 
	'#888';
	$front_page_process_module_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_process_module_color'))) ? Kirki::get_option('front_page_process_module_color') :
	'#eceff3';
	$front_page_process_module_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_process_module_animation'))) ? Kirki::get_option('front_page_process_module_animation') : 
	'none';
	$front_page_process_module_subtitle = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_process_module_subtitle'))) ? Kirki::get_option('front_page_process_module_subtitle') :
	'Subtitle for process module';
	$front_page_process_module_title = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_process_module_title'))) ? Kirki::get_option('front_page_process_module_title') :
	'<span>Process</span> Module';
	$front_page_process_module_id = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_process_module_id'))) ? Kirki::get_option('front_page_process_module_id') : 
	'process-module';
	$front_page_process_module_bg_video = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_process_module_bg_video'))) ? Kirki::get_option('front_page_process_module_bg_video') : '';
	$front_page_process_module_bg_parallax = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_process_module_bg_parallax'))) ? Kirki::get_option('front_page_process_module_bg_parallax') : '1';
	$front_page_process_module_bg_img = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_process_module_bg_img'))) ? Kirki::get_option('front_page_process_module_bg_img') : array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	);
	$front_page_process_module_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_process_module_bg_color'))) ? Kirki::get_option('front_page_process_module_bg_color') : '#181a1c';

	//Team Module Module Variable
	
	$front_page_team_module_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_team_module_notice'))) ? Kirki::get_option('front_page_team_module_notice') : '<p>' . __( "You can create team members from Team Metabox by editing your Front Page.", 'beonepage' ) . '</p><p><i><a href="' . get_edit_post_link( get_option('page_on_front') ) . '" target="_blank">' . __( 'Edit Front Page', 'beonepage' ) . '</a></i></p>';
	$front_page_team_module_bg_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_team_module_bg_notice'))) ? Kirki::get_option('front_page_team_module_bg_notice') : "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>";
	$front_page_team_module_bg = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_team_module_bg'))) ? Kirki::get_option('front_page_team_module_bg') : 'color';
	$front_page_team_module_bio_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_team_module_bio_bg_color'))) ? Kirki::get_option('front_page_team_module_bio_bg_color') : '#111';
	$front_page_team_module_bio_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_team_module_bio_color'))) ? Kirki::get_option('front_page_team_module_bio_color') : '#ccc';
	$front_page_team_module_sp_i_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_team_module_sp_i_color'))) ? Kirki::get_option('front_page_team_module_sp_i_color') : '#ffcc00';
	$front_page_team_module_sp_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_team_module_sp_color'))) ? Kirki::get_option('front_page_team_module_sp_color') : '#888';
	$front_page_team_module_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_team_module_color'))) ? Kirki::get_option('front_page_team_module_color') : '#eceff3';
	$front_page_team_module_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_team_module_animation'))) ? Kirki::get_option('front_page_team_module_animation') : 'none';
	$front_page_team_module_subtitle = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_team_module_subtitle'))) ? Kirki::get_option('front_page_team_module_subtitle') : 'Subtitle for team module';
	$front_page_team_module_title = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_team_module_title'))) ? Kirki::get_option('front_page_team_module_title') : '<span>Team</span> Module';
	$front_page_team_module_id = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_team_module_id'))) ? Kirki::get_option('front_page_team_module_id') : 'team-module';
	$front_page_team_module_bg_video = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_team_module_bg_video'))) ? Kirki::get_option('front_page_team_module_bg_video') : '';
	$front_page_team_module_bg_parallax = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_team_module_bg_parallax'))) ? Kirki::get_option('front_page_team_module_bg_parallax') : '1';
	$front_page_team_module_bg_img = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_team_module_bg_img'))) ? Kirki::get_option('front_page_team_module_bg_img') : array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	);
	$front_page_team_module_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_team_module_bg_color'))) ? Kirki::get_option('front_page_team_module_bg_color') : '#181a1c';
	
	// Skill Bar Module Variable
	
	$front_page_skill_bar_module_skill_bar = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_skill_bar_module_skill_bar'))) ? Kirki::get_option('front_page_skill_bar_module_skill_bar') : array();
	$front_page_skill_bar_module_text_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_skill_bar_module_text_animation'))) ? Kirki::get_option('front_page_skill_bar_module_text_animation') : 'none';
	$front_page_skill_bar_module_text = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_skill_bar_module_text'))) ? Kirki::get_option('front_page_skill_bar_module_text') : '';
	$front_page_skill_bar_module_bg_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_skill_bar_module_bg_notice'))) ? Kirki::get_option('front_page_skill_bar_module_bg_notice') : "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>";
	$front_page_skill_bar_module_bg = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_skill_bar_module_bg'))) ? Kirki::get_option('front_page_skill_bar_module_bg') : 'color';
	$front_page_skill_bar_module_pct = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_skill_bar_module_pct'))) ? Kirki::get_option('front_page_skill_bar_module_pct') : '#272727';
	$front_page_skill_bar_module_sp_i_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_skill_bar_module_sp_i_color'))) ? Kirki::get_option('front_page_skill_bar_module_sp_i_color') : '#ffcc00';
	$front_page_skill_bar_module_sp_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_skill_bar_module_sp_color'))) ? Kirki::get_option('front_page_skill_bar_module_sp_color') : '#888';
	$front_page_skill_bar_module_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_skill_bar_module_color'))) ? Kirki::get_option('front_page_skill_bar_module_color') : '#eceff3';
	$front_page_skill_bar_module_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_skill_bar_module_animation'))) ? Kirki::get_option('front_page_skill_bar_module_animation') : 'none';
	$front_page_skill_bar_module_subtitle = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_skill_bar_module_subtitle'))) ? Kirki::get_option('front_page_skill_bar_module_subtitle') : 'Subtitle for skill bar module';
	$front_page_skill_bar_module_title = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_skill_bar_module_title'))) ? Kirki::get_option('front_page_skill_bar_module_title') : '<span>Skill Bar</span> Module';
	$front_page_skill_bar_module_id = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_skill_bar_module_id'))) ? Kirki::get_option('front_page_skill_bar_module_id') : 'skill-bar-module';
	$front_page_skill_bar_module_bg_video = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_skill_bar_module_bg_video'))) ? Kirki::get_option('front_page_skill_bar_module_bg_video') : '';
	$front_page_skill_bar_module_bg_parallax = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_skill_bar_module_bg_parallax'))) ? Kirki::get_option('front_page_skill_bar_module_bg_parallax') : '1';
	$front_page_skill_bar_module_bg_img = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_skill_bar_module_bg_img'))) ? Kirki::get_option('front_page_skill_bar_module_bg_img') : array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	);
	$front_page_skill_bar_module_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_skill_bar_module_bg_color'))) ? Kirki::get_option('front_page_skill_bar_module_bg_color') : '#181a1c';
	$front_page_skill_bar_module_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_skill_bar_module_notice'))) ? Kirki::get_option('front_page_skill_bar_module_notice') : '';
	$front_page_skill_bar_module_skill_bar_array = Kirki::get_option('front_page_skill_bar_module_skill_bar');
	$front_page_skill_bar_module_skill_bar = array();
	foreach( $front_page_skill_bar_module_skill_bar_array as $fun_index_key => $fun_index_value ) {
		foreach( $fun_index_value as $fun_key => $fun_value ) {
			if( $fun_key == 'skill_bar_label' ){
				$front_page_skill_bar_module_skill_bar[$fun_index_key]['title'] = $fun_value;
			}
			if( $fun_key == 'skill_bar_pct' ){
				$front_page_skill_bar_module_skill_bar[$fun_index_key]['url'] = $fun_value;
			}
		}
	}
	
	// Testimonial Module Variable
	
	$front_page_testimonial_module_id = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_testimonial_module_id'))) ? Kirki::get_option('front_page_testimonial_module_id') : 
	'testimonial-module';
	$front_page_testimonial_module_title = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_testimonial_module_title'))) ? Kirki::get_option('front_page_testimonial_module_title') : 
	'<span>Testimonial</span> Module';
	$front_page_testimonial_module_subtitle = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_testimonial_module_subtitle'))) ? Kirki::get_option('front_page_testimonial_module_subtitle') : 
	'Subtitle for testimonial module';
	$front_page_testimonial_module_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_testimonial_module_animation'))) ? Kirki::get_option('front_page_testimonial_module_animation') : 
	'none';
	$front_page_testimonial_module_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_testimonial_module_color'))) ? Kirki::get_option('front_page_testimonial_module_color') : 
	'#eceff3';
	$front_page_testimonial_module_sp_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_testimonial_module_sp_color'))) ? Kirki::get_option('front_page_testimonial_module_sp_color') : 
	'#888';
	$front_page_testimonial_module_sp_i_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_testimonial_module_sp_i_color'))) ? Kirki::get_option('front_page_testimonial_module_sp_i_color') : 
	'#ffcc00';
	$front_page_testimonial_module_box_rgba =  (class_exists('Kirki') && !empty(Kirki::get_option('front_page_testimonial_module_box'))) ? Kirki::get_option('front_page_testimonial_module_box') : 
	'rgba(17,17,17,.8)';
	
	if (strpos($front_page_testimonial_module_box_rgba, '#') !== false) {
		$front_page_testimonial_module_box = array( 'color' => $front_page_testimonial_module_box_rgba, 'alpha' => 1 );
	}else{
		$front_page_testimonial_module_box = beoneRgbaToHex($front_page_testimonial_module_box_rgba);
	}
	$front_page_testimonial_module_bg = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_testimonial_module_bg'))) ? Kirki::get_option('front_page_testimonial_module_bg') : 
	'color';
	$front_page_testimonial_module_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_testimonial_module_notice'))) ? Kirki::get_option('front_page_testimonial_module_notice') : 
	'<p>' . __( "You can create testimonials from Testimonial Metabox by editing your Front Page.", 'beonepage' ) . '</p><p><i><a href="' . get_edit_post_link( get_option('page_on_front') ) . '" target="_blank">' . __( 'Edit Front Page', 'beonepage' ) . '</a></i></p>';
	$front_page_testimonial_module_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_testimonial_module_bg_color'))) ? Kirki::get_option('front_page_testimonial_module_bg_color') : 
	'#181a1c';
	$front_page_testimonial_module_bg_video =(class_exists('Kirki') && !empty(Kirki::get_option('front_page_testimonial_module_bg_video'))) ? Kirki::get_option('front_page_testimonial_module_bg_video') : 
	'';
	$front_page_testimonial_module_bg_parallax = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_testimonial_module_bg_parallax'))) ? Kirki::get_option('front_page_testimonial_module_bg_parallax') : 
	'1';
	$front_page_testimonial_module_bg_img = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_testimonial_module_bg_img'))) ? Kirki::get_option('front_page_testimonial_module_bg_img') : 
	array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	);
	$front_page_testimonial_module_bg_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_testimonial_module_bg_notice'))) ? Kirki::get_option('front_page_testimonial_module_bg_notice') : 
	'<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so its better to define both Image and YouTube Video for best results.</p>';

	// Client Module Variable
	
	$front_page_client_module_id = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_client_module_id'))) ? Kirki::get_option('front_page_client_module_id') : 
	'client-module';
	$front_page_client_module_bg = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_client_module_bg'))) ? Kirki::get_option('front_page_client_module_bg') : 
	'color';
	$front_page_client_module_bg_color  =(class_exists('Kirki') && !empty(Kirki::get_option('front_page_client_module_bg_color'))) ? Kirki::get_option('front_page_client_module_bg_color') : 
	'#181a1c';
	$front_page_client_module_bg_img   = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_client_module_bg_img'))) ? Kirki::get_option('front_page_client_module_bg_img') : 
	array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	);
	
	// Fun Fact Module Variable
	
	$front_page_fun_fact_module_layout = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_fun_fact_module_layout'))) ? Kirki::get_option('front_page_fun_fact_module_layout') : 
	'fixed';
	$front_page_fun_fact_module_id = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_fun_fact_module_id'))) ? Kirki::get_option('front_page_fun_fact_module_id') : 
	'fun-fact-module';
	$front_page_fun_fact_module_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_fun_fact_module_color'))) ? Kirki::get_option('front_page_fun_fact_module_color') : '#eceff3';
	$front_page_fun_fact_module_label = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_fun_fact_module_label'))) ? Kirki::get_option('front_page_fun_fact_module_label') : '#ffcc00';
	$front_page_fun_fact_module_bg = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_fun_fact_module_bg'))) ? Kirki::get_option('front_page_fun_fact_module_bg') : 'color';
	$front_page_fun_fact_module_bg_color    = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_fun_fact_module_bg_color'))) ? Kirki::get_option('front_page_fun_fact_module_bg_color') : '#181a1c';
	$front_page_fun_fact_module_bg_img = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_fun_fact_module_bg_img'))) ? Kirki::get_option('front_page_fun_fact_module_bg_img') : array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	);
	$front_page_fun_fact_module_bg_parallax = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_fun_fact_module_bg_parallax'))) ? Kirki::get_option('front_page_fun_fact_module_bg_parallax') : '1';
	$front_page_fun_fact_module_fact_array = Kirki::get_option('front_page_fun_fact_module_fact');
	$front_page_fun_fact_module_fact = array();
	foreach( $front_page_fun_fact_module_fact_array as $fun_index_key => $fun_index_value ) {
		foreach( $fun_index_value as $fun_key => $fun_value ) {
			if( $fun_key == 'fact_label' ){
				$front_page_fun_fact_module_fact[$fun_index_key]['title'] = $fun_value;
			}
			if( $fun_key == 'fact_num' ){
				$front_page_fun_fact_module_fact[$fun_index_key]['url'] = $fun_value;
			}
		}
	}
	
	// Pricing Table Module Variable
	
	$front_page_pricing_table_module_id = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_pricing_table_module_id'))) ? Kirki::get_option('front_page_pricing_table_module_id') : 
	'pricing-table-module';
	$front_page_pricing_table_module_title = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_pricing_table_module_title'))) ? Kirki::get_option('front_page_pricing_table_module_title') : 
	'<span>Pricing Table</span> Module';
	$front_page_pricing_table_module_subtitle = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_pricing_table_module_subtitle'))) ? Kirki::get_option('front_page_pricing_table_module_subtitle') : 
	'Subtitle for pricing table module';
	$front_page_pricing_table_module_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_pricing_table_module_animation'))) ? Kirki::get_option('front_page_pricing_table_module_animation') : 
	'none';
	$front_page_pricing_table_module_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_pricing_table_module_color'))) ? Kirki::get_option('front_page_pricing_table_module_color') : 
	'#eceff3';
	$front_page_pricing_table_module_sp_color =(class_exists('Kirki') && !empty(Kirki::get_option('front_page_pricing_table_module_sp_color'))) ? Kirki::get_option('front_page_pricing_table_module_sp_color') : 
	'#888';
	$front_page_pricing_table_module_sp_i_color =(class_exists('Kirki') && !empty(Kirki::get_option('front_page_pricing_table_module_sp_i_color'))) ? Kirki::get_option('front_page_pricing_table_module_sp_i_color') : '#ffcc00';
	$front_page_pricing_table_module_box = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_pricing_table_module_box'))) ? Kirki::get_option('front_page_pricing_table_module_box') : 
	'#eceff3';
	$front_page_pricing_table_module_box_bg = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_pricing_table_module_box_bg'))) ? Kirki::get_option('front_page_pricing_table_module_box_bg') : 
	'#111';
	$front_page_pricing_table_module_btn_style = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_pricing_table_module_btn_style'))) ? Kirki::get_option('front_page_pricing_table_module_btn_style') : 
	'1';
	$front_page_pricing_table_module_bg = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_pricing_table_module_bg'))) ? Kirki::get_option('front_page_pricing_table_module_bg') : 
	'color';
	$front_page_pricing_table_module_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_pricing_table_module_bg_color'))) ? Kirki::get_option('front_page_pricing_table_module_bg_color') :
	'#181a1c';
	$front_page_pricing_table_module_bg_img = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_pricing_table_module_bg_img'))) ? Kirki::get_option('front_page_pricing_table_module_bg_img') : array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	);
	$front_page_pricing_table_module_bg_parallax = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_pricing_table_module_bg_parallax'))) ? Kirki::get_option('front_page_pricing_table_module_bg_parallax') : 
	'1';
	$front_page_pricing_table_module_bg_video = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_pricing_table_module_bg_video'))) ? Kirki::get_option('front_page_pricing_table_module_bg_video') :
	'';
	$front_page_pricing_table_module_bg_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_pricing_table_module_bg_notice'))) ? Kirki::get_option('front_page_pricing_table_module_bg_notice') : '<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so its better to define both Image and YouTube Video for best results.</p>';
	$front_page_pricing_table_module_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_pricing_table_module_notice'))) ? Kirki::get_option('front_page_pricing_table_module_notice') : 
	'<p>' . __( "You can create pricing items from Pricing Table Metabox by editing your Front Page.", 'beonepage' ) . '</p><p><i><a href="' . get_edit_post_link( get_option('page_on_front') ) . '" target="_blank">' . __( 'Edit Front Page', 'beonepage' ) . '</a></i></p>';
	
	// Twitter Values Variable
	
	$front_page_twitter_module_id = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_twitter_module_id'))) ? Kirki::get_option('front_page_twitter_module_id') : 'twitter-module';
	$front_page_twitter_twitter_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_twitter_twitter_animation'))) ? Kirki::get_option('front_page_twitter_twitter_animation') : 'none';
	$front_page_twitter_twitter_username = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_twitter_twitter_username'))) ? Kirki::get_option('front_page_twitter_twitter_username') : '';
	$front_page_twitter_twitter_tcs = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_twitter_twitter_tcs'))) ? Kirki::get_option('front_page_twitter_twitter_tcs') : '';
	$front_page_twitter_twitter_tat = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_twitter_twitter_tat'))) ? Kirki::get_option('front_page_twitter_twitter_tat') : '';
	$front_page_twitter_twitter_tck = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_twitter_twitter_tck'))) ? Kirki::get_option('front_page_twitter_twitter_tck') : '';
	$front_page_twitter_twitter_tats = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_twitter_twitter_tats'))) ? Kirki::get_option('front_page_twitter_twitter_tats') : '';
	$front_page_contact_module_twitter_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_contact_module_twitter_notice'))) ? Kirki::get_option('front_page_contact_module_twitter_notice') : '<p><a href="' . esc_url( 'http://docs.betheme.me/article/32-getting-twitter-api-consumer-and-secret-keys' ) . '" target="_blank">' . __( 'How to get Twitter API Consumer and Secret Keys?', 'beonepage' ) . '</a></p>';
	$front_page_twitter_btn_text = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_twitter_btn_text'))) ? Kirki::get_option('front_page_twitter_btn_text') : 'Follow Us';
	$front_page_twitter_btn_url = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_twitter_btn_url'))) ? Kirki::get_option('front_page_twitter_btn_url') : 'http://betheme.me';
	$front_page_twitter_btn_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_twitter_btn_animation'))) ? Kirki::get_option('front_page_twitter_btn_animation') : 'none';
	$front_page_twitter_btn_style = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_twitter_btn_style'))) ? Kirki::get_option('front_page_twitter_btn_style') : '1';
	$front_page_twitter_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_twitter_color'))) ? Kirki::get_option('front_page_twitter_color') : '#eceff3';
	$front_page_twitter_link_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_twitter_link_color'))) ? Kirki::get_option('front_page_twitter_link_color') : '#ffcc00';
	$front_page_twitter_module_bg = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_twitter_module_bg'))) ? Kirki::get_option('front_page_twitter_module_bg') : 'color';
	$front_page_twitter_module_bg_parallax = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_twitter_module_bg_parallax'))) ? Kirki::get_option('front_page_twitter_module_bg_parallax') : '1';
	$front_page_twitter_module_bg_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_twitter_module_bg_notice'))) ? Kirki::get_option('front_page_twitter_module_bg_notice') : "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>";
	$front_page_twitter_module_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_twitter_module_bg_color'))) ? Kirki::get_option('front_page_twitter_module_bg_color') : '';
	$front_page_twitter_module_bg_img = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_twitter_module_bg_img'))) ? Kirki::get_option('front_page_twitter_module_bg_img') : array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	);
	$front_page_twitter_module_bg_video = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_twitter_module_bg_video'))) ? Kirki::get_option('front_page_twitter_module_bg_video') : '';
	$front_page_twitter_module_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_twitter_module_notice'))) ? Kirki::get_option('front_page_twitter_module_notice') : '';
	
	// MailChimp Subscribe  Values Variable
	
	$front_page_subscribe_module_id = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_subscribe_module_id'))) ?Kirki::get_option('front_page_subscribe_module_id') : 'subscribe-module';
	$front_page_subscribe_title = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_subscribe_title'))) ? Kirki::get_option('front_page_subscribe_title') : '<span>Subscribe</span> to Our <span>Newsletter</span>';
	$front_page_subscribe_title_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_subscribe_title_animation'))) ? Kirki::get_option('front_page_subscribe_title_animation') : 'none';
	$front_page_subscribe_content = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_subscribe_content'))) ? Kirki::get_option('front_page_subscribe_content') : 'We make sure you do not miss any news.';
	$front_page_subscribe_content_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_subscribe_content_animation'))) ? Kirki::get_option('front_page_subscribe_content_animation') : 'none';
	$front_page_subscribe_mailchimp_api = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_subscribe_mailchimp_api'))) ? Kirki::get_option('front_page_subscribe_mailchimp_api') : '';
	$front_page_subscribe_mailchimp_list = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_subscribe_mailchimp_list'))) ? Kirki::get_option('front_page_subscribe_mailchimp_list') : '';
	$front_page_subscribe_mailchimp_api_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_subscribe_mailchimp_api_notice'))) ? Kirki::get_option('front_page_subscribe_mailchimp_api_notice') : '<p><a href="' . esc_url( 'http://docs.betheme.me/article/33-getting-mailchimp-api-key-and-list-id' ) . '" target="_blank">' . __( 'How to get MailChimp API Key and List ID?', 'beonepage' ) . '</a></p>';
	$front_page_subscribe_btn_text = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_subscribe_btn_text'))) ? Kirki::get_option('front_page_subscribe_btn_text') : 'Notify Me';
	$front_page_subscribe_btn_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_subscribe_btn_animation'))) ? Kirki::get_option('front_page_subscribe_btn_animation') : 'none';
	$front_page_subscribe_btn_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_subscribe_btn_color'))) ? Kirki::get_option('front_page_subscribe_btn_color') : '#ffcc00';
	$front_page_subscribe_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_subscribe_color'))) ? Kirki::get_option('front_page_subscribe_color') : '#eceff3';
	$front_page_subscribe_module_bg = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_subscribe_module_bg'))) ? Kirki::get_option('front_page_subscribe_module_bg') : 'color';
	$front_page_subscribe_module_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_subscribe_module_bg_color'))) ? Kirki::get_option('front_page_subscribe_module_bg_color') : '#181a1c';
	$front_page_subscribe_module_bg_parallax = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_subscribe_module_bg_parallax'))) ? Kirki::get_option('front_page_subscribe_module_bg_parallax') : '1';
	$front_page_subscribe_module_bg_img = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_subscribe_module_bg_img'))) ? Kirki::get_option('front_page_subscribe_module_bg_img') : array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	);
	
	// Widge Module Values Variable
	
	$front_page_widget_module_layout = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_widget_module_layout'))) ? Kirki::get_option('front_page_widget_module_layout') : 'fixed';
	$front_page_widget_module_id = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_widget_module_id'))) ? Kirki::get_option('front_page_widget_module_id') : 'widget-module';
	$front_page_widget_module_title = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_widget_module_title'))) ? Kirki::get_option('front_page_widget_module_title') : '<span>Widget</span> Module';
	$front_page_widget_module_subtitle = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_widget_module_subtitle'))) ? Kirki::get_option('front_page_widget_module_subtitle') : 'Subtitle for skill bar module';
	$front_page_widget_module_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_widget_module_animation'))) ? Kirki::get_option('front_page_widget_module_animation') : 'none';
	$front_page_widget_module_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_widget_module_color'))) ? Kirki::get_option('front_page_widget_module_color') : '#eceff3';
	$front_page_widget_module_sp_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_widget_module_sp_color'))) ? Kirki::get_option('front_page_widget_module_sp_color') : '#888';
	$front_page_widget_module_sp_i_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_widget_module_sp_i_color'))) ? Kirki::get_option('front_page_widget_module_sp_i_color') : '#ffcc00';
	$front_page_widget_module_bg_parallax = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_widget_module_bg_parallax'))) ? Kirki::get_option('front_page_widget_module_bg_parallax') : '1';
	$front_page_widget_module_bg = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_widget_module_bg'))) ? Kirki::get_option('front_page_widget_module_bg') : 'color';
	$front_page_widget_module_widget = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_widget_module_widget'))) ? Kirki::get_option('front_page_widget_module_widget') : array();
	$front_page_widget_module_bg_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_widget_module_bg_notice'))) ? Kirki::get_option('front_page_widget_module_bg_notice') : "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>";
	$front_page_widget_module_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_widget_module_bg_color'))) ? Kirki::get_option('front_page_widget_module_bg_color') : '#181a1c';
	$front_page_widget_module_bg_img = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_widget_module_bg_img'))) ? Kirki::get_option('front_page_widget_module_bg_img') : array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	);
	$front_page_widget_module_bg_video = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_widget_module_bg_video'))) ? Kirki::get_option('front_page_widget_module_bg_video') : '';
	$front_page_widget_module_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_widget_module_notice'))) ? Kirki::get_option('front_page_widget_module_notice') : '<p>' . __( 'First you need to create widget areas, save and refresh the page, then go to Customizer -> Widgets to manage widgets.', 'beonepage' ) . '</p>';
	$front_page_widget_module_widget_array = Kirki::get_option('front_page_widget_module_widget');
	$front_page_widget_module_widget = array();
	foreach( $front_page_widget_module_widget_array as $fun_index_key => $fun_index_value ) {
		foreach( $fun_index_value as $fun_key => $fun_value ) {
			if( $fun_key == 'widget_name' ){
				$front_page_widget_module_widget[$fun_index_key]['title'] = $fun_value;
			}
			if( $fun_key == 'widget_num' ){
				$front_page_widget_module_widget[$fun_index_key]['url'] = $fun_value;
			}
		}
	}
	
	// Custom Module Values Variable
	
	$front_page_custom_module_layout = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_custom_module_layout'))) ? Kirki::get_option('front_page_custom_module_layout') : 'fixed';
	$front_page_custom_module_id = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_custom_module_id'))) ? Kirki::get_option('front_page_custom_module_id') : 'custom-module';
	$front_page_custom_module_title = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_custom_module_title'))) ? Kirki::get_option('front_page_custom_module_title') : '<span>Custom</span> Module';
	$front_page_custom_module_subtitle = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_custom_module_subtitle'))) ? Kirki::get_option('front_page_custom_module_subtitle') : 'Subtitle for custom module';
	$front_page_custom_module_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_custom_module_animation'))) ? Kirki::get_option('front_page_custom_module_animation') : 'none';
	$front_page_custom_module_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_custom_module_color'))) ? Kirki::get_option('front_page_custom_module_color') : '#eceff3';
	$front_page_custom_module_sp_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_custom_module_sp_color'))) ? Kirki::get_option('front_page_custom_module_sp_color') : '#888';
	$front_page_custom_module_sp_i_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_custom_module_sp_i_color'))) ? Kirki::get_option('front_page_custom_module_sp_i_color') : '#ffcc00';
	$front_page_custom_module_content = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_custom_module_content'))) ? Kirki::get_option('front_page_custom_module_content') : '';
	$front_page_custom_module_bg_parallax = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_custom_module_bg_parallax'))) ? Kirki::get_option('front_page_custom_module_bg_parallax') : '1';
	$front_page_custom_module_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_custom_module_bg_color'))) ? Kirki::get_option('front_page_custom_module_bg_color') : '#181a1c';
	$front_page_custom_module_bg_img = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_custom_module_bg_img'))) ? Kirki::get_option('front_page_custom_module_bg_img') :  array(
		'image'    => '',
		'repeat'   => 'no-repeat',
		'size'     => 'cover',
		'position' => 'center-top'
	);
	$front_page_custom_module_bg_video = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_custom_module_bg_video'))) ? Kirki::get_option('front_page_custom_module_bg_video') :  '';
	$front_page_custom_module_bg_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_custom_module_bg_notice'))) ? Kirki::get_option('front_page_custom_module_bg_notice') :  "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>";
	$front_page_custom_module_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_custom_module_notice'))) ? Kirki::get_option('front_page_custom_module_notice') :  '';
	
	//Page Option Values Variable
	
	$blog_page_header_bg = (class_exists('Kirki') && !empty(Kirki::get_option('blog_page_header_bg'))) ? Kirki::get_option('blog_page_header_bg') :  array(
		'background-image'      => get_template_directory_uri() . '/images/header_bg.jpg',
		'background-repeat'     => 'no-repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	);
	$blog_page_header_color = (class_exists('Kirki') && !empty(Kirki::get_option('blog_page_header_color'))) ? Kirki::get_option('blog_page_header_color') :  '#eceff3';
	$blog_page_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('blog_page_bg_color'))) ? Kirki::get_option('blog_page_bg_color') :  '#18191b';
	$blog_page_accent_color = (class_exists('Kirki') && !empty(Kirki::get_option('blog_page_accent_color'))) ? Kirki::get_option('blog_page_accent_color') :  '#ffcc00';
	$blog_page_text_color = (class_exists('Kirki') && !empty(Kirki::get_option('blog_page_text_color'))) ? Kirki::get_option('blog_page_text_color') :  '#eee';
	$blog_page_additional_color_1 = (class_exists('Kirki') && !empty(Kirki::get_option('blog_page_additional_color_1'))) ? Kirki::get_option('blog_page_additional_color_1') :  '#111';
	$blog_page_additional_color_2 = (class_exists('Kirki') && !empty(Kirki::get_option('blog_page_additional_color_2'))) ? Kirki::get_option('blog_page_additional_color_2') :  '#aaa';
	$blog_page_sp_color = (class_exists('Kirki') && !empty(Kirki::get_option('blog_page_sp_color'))) ? Kirki::get_option('blog_page_sp_color') :  '#333';
	$blog_page_button_style = (class_exists('Kirki') && !empty(Kirki::get_option('blog_page_button_style'))) ? Kirki::get_option('blog_page_button_style') :  '1';
	$blog_page_read_more = (class_exists('Kirki') && !empty(Kirki::get_option('blog_page_read_more'))) ? Kirki::get_option('blog_page_read_more') :  'Read More';
	
	// Footer  Values Variable
	
	$footer_social_link_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('footer_social_link_bg_color'))) ? Kirki::get_option('footer_social_link_bg_color') :  '#272727';
	$footer_social_link = (class_exists('Kirki') && !empty(Kirki::get_option('footer_social_link'))) ? Kirki::get_option('footer_social_link') :  '1';
	$footer_site_logo_animation = (class_exists('Kirki') && !empty(Kirki::get_option('footer_site_logo_animation'))) ? Kirki::get_option('footer_site_logo_animation') :  'none';
	$footer_site_title_animation = (class_exists('Kirki') && !empty(Kirki::get_option('footer_site_title_animation'))) ? Kirki::get_option('footer_site_title_animation') :  'none';
	$footer_social_link_animation = (class_exists('Kirki') && !empty(Kirki::get_option('footer_social_link_animation'))) ? Kirki::get_option('footer_social_link_animation') :  'none';
	$footer_site_logo =  (class_exists('Kirki') && !empty(Kirki::get_option('footer_site_logo'))) ? Kirki::get_option('footer_site_logo') :  '0';
	$footer_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('footer_bg_color'))) ? Kirki::get_option('footer_bg_color') :  '#0b0b0b';
	$footer_color = (class_exists('Kirki') && !empty(Kirki::get_option('footer_color'))) ? Kirki::get_option('footer_color') :  '#eee';
	$footer_copyright = (class_exists('Kirki') && !empty(Kirki::get_option('footer_copyright'))) ? Kirki::get_option('footer_copyright') :  __( 'Copyrights &copy; 2016. All Rights Reserved.', 'beonepage');
	$footer_site_title = (class_exists('Kirki') && !empty(Kirki::get_option('footer_site_title'))) ? Kirki::get_option('footer_site_title') : '1';
	
	//icon Service Module Section 
	
	$front_page_icon_service_module_id = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_module_id'))) ? Kirki::get_option('front_page_icon_service_module_id') : 'icon-service-module';
	$front_page_icon_service_module_layout = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_module_layout'))) ? Kirki::get_option('front_page_icon_service_module_layout') : 'fixed';
	$front_page_icon_service_module_title =(class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_module_title'))) ? Kirki::get_option('front_page_icon_service_module_title') : 'Icon <span>Service</span> Module';
	$front_page_icon_service_module_subtitle = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_module_subtitle'))) ? Kirki::get_option('front_page_icon_service_module_subtitle') : 'Subtitle for icon service module';
	$front_page_icon_service_module_animation = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_module_animation'))) ? Kirki::get_option('front_page_icon_service_module_animation') : 'none';
	$front_page_icon_service_module_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_module_color'))) ? Kirki::get_option('front_page_icon_service_module_color') : '#eceff3';
	$front_page_icon_service_module_sp_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_module_sp_color'))) ? Kirki::get_option('front_page_icon_service_module_sp_color') : '#888';
	$front_page_icon_service_module_sp_i_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_module_sp_i_color'))) ? Kirki::get_option('front_page_icon_service_module_sp_i_color') : '#ffcc00';
	$front_page_icon_service_module_hover_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_module_hover_color'))) ? Kirki::get_option('front_page_icon_service_module_hover_color') : '#ffcc00';
	$front_page_icon_service_module_bg = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_module_bg'))) ? Kirki::get_option('front_page_icon_service_module_bg') : 'color';
	$front_page_icon_service_module_bg_color = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_module_bg_color'))) ? Kirki::get_option('front_page_icon_service_module_bg_color') : '#181a1c';
	$front_page_icon_service_module_bg_img = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_module_bg_img'))) ? Kirki::get_option('front_page_icon_service_module_bg_img') : '';
	$front_page_icon_service_module_bg_parallax = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_module_bg_parallax'))) ? Kirki::get_option('front_page_icon_service_module_bg_parallax') : '1';
	$front_page_icon_service_module_bg_video = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_module_bg_video'))) ? Kirki::get_option('front_page_icon_service_module_bg_video') : '';
	$front_page_icon_service_module_bg_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_module_bg_notice'))) ? Kirki::get_option('front_page_icon_service_module_bg_notice') : "<p><b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it's better to define both Image and YouTube Video for best results.</p>";
	$front_page_icon_service_module_notice = (class_exists('Kirki') && !empty(Kirki::get_option('front_page_icon_service_module_notice'))) ? Kirki::get_option('front_page_icon_service_module_notice') : '<p>' . __( "You can create icon service boxes from Icon Services Metabox by editing your Front Page.", 'beonepage' ) . '</p><p><i><a href="' . get_edit_post_link( get_option('page_on_front') ) . '" target="_blank">' . __( 'Edit Front Page', 'beonepage' ) . '</a></i></p>';

	//Multiple Page Translation

	$page_ids = get_all_page_ids();
	$all_page_array = array();
	foreach( $page_ids as $page_id ) {
    	$all_page_array[ $page_id ] = get_the_title( $page_id );
	}

	$upgrade_theme_info = Kirki::get_option('upgrade_theme_info');
	
	if ( ! class_exists( 'Redux' ) ) {
        return;
    }
	
    // This is your option name where all the Redux data is stored.
    $opt_name = "redux_demo";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::init_wp_filesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'beonepage' ),
        'page_title'           => __( 'Theme Options', 'beonepage' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'redux_demo',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'beonepage' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'beonepage' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'beonepage' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'beonepage' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'beonepage' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'beonepage' );

    Redux::set_args( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */
    /*
     * ---> START HELP TABS
     */


    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'beonepage' );
    Redux::set_help_sidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */
	 
	// -> START Basic Fields
	/* General Panel Start */
	Redux::setSection( $opt_name, array(
        'title'            => __( 'General', 'beonepage' ),
        'id'               => 'site_general',
        'desc'             => __( '', 'beonepage' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-user',
		'fields'           => array(
			array(
				'id'       		=> 'general_front_page',
				'type'     		=> 'raw',
				'title'    		=> __( 'Front Page', 'beonepage' ),
				'content'  		=> $general_front_page_url,
			),
			array(
				'id'      		=> 'general_posts_page',
				'type'     		=> 'raw',
				'title'    		=> __( 'Posts Page', 'beonepage' ),
				'content' 		=> $general_post_page_url,
			),
            array(
                'id'       		=> 'general_page_transition',
                'type'    		=> 'checkbox',
                'title'    		=> __( 'Enable Page Loading Transition?', 'beonepage' ),
                'subtitle' 		=> '',
                'desc'     		=> __( '', 'beonepage' ),
                'default'  		=> $general_page_transition,
			),
			array(
                'id'       		=> 'page_transition_spinner',
                'type'     		=> 'select',
                'title'    		=> __( 'Spinner', 'beonepage' ),
                'subtitle' 		=> '',
                'desc'     		=> __( '', 'beonepage' ),
                'default'  		=> $page_transition_spinner,
				'options'  		=> array(
					'1'  => __( 'Ball Pulse', 'beonepage' ),
					'2'  => __( 'Ball Grid Pulse', 'beonepage' ),
					'3'  => __( 'Ball Clip Rotate', 'beonepage' ),
					'4'  => __( 'Ball Clip Rotate Pulse', 'beonepage' ),
					'5'  => __( 'Ball Clip Rotate Multiple', 'beonepage' ),
					'6'  => __( 'Square Spin', 'beonepage' ),
					'7'  => __( 'Ball Pulse Rise', 'beonepage' ),
					'8'  => __( 'Ball Rotate', 'beonepage' ),
					'9'  => __( 'Cube Transition', 'beonepage' ),
					'10' => __( 'Ball Zig Zag', 'beonepage' ),
					'11' => __( 'Ball Zig Zag Deflect', 'beonepage' ),
					'12' => __( 'Ball Triangle Path', 'beonepage' ),
					'13' => __( 'Ball Scale', 'beonepage' ),
					'14' => __( 'Line Scale', 'beonepage' ),
					'15' => __( 'Line Scale Party', 'beonepage' ),
					'16' => __( 'Ball Scale Multiple', 'beonepage' ),
					'17' => __( 'Ball Pulse Sync', 'beonepage' ),
					'18' => __( 'Ball Beat', 'beonepage' ),
					'19' => __( 'Line Scale Pulse Out', 'beonepage' ),
					'20' => __( 'Line Scale Pulse Out Rapid', 'beonepage' ),
					'21' => __( 'Ball Scale Ripple', 'beonepage' ),
					'22' => __( 'Ball Scale Ripple Multiple', 'beonepage' ),
					'23' => __( 'Ball Spin Fade Loader', 'beonepage' ),
					'24' => __( 'Line Spin Fade Loader', 'beonepage' ),
					'25' => __( 'Triangle Skew Spin', 'beonepage' ),
					'26' => __( 'Pacman', 'beonepage' ),
					'27' => __( 'Ball Grid Beat', 'beonepage' ),
					'28' => __( 'Semi Circle Spin', 'beonepage' ),
				),
				'required' => array('general_page_transition','=', 1)
            ),
			array(
                'id'       		=> 'loading_spinner_color',
                'type'     		=> 'color',
                'title'    		=> __( 'Spinner Color', 'beonepage' ),
                'subtitle' 		=> '',
                'desc'     		=> __( '', 'beonepage' ),
                'default'  		=> $loading_spinner_color,
				'required' 		=> array('general_page_transition','=', 1)
            ),
			array(
                'id'       		=> 'loading_background_color',
                'type'     		=> 'color',
                'title'    		=> __( 'Background Color', 'beonepage' ),
                'subtitle' 		=> '',
                'desc'     		=> __( '', 'beonepage' ),
                'default'  		=> $loading_background_color,
				//'output'	   	=> array('background-color' => 'loading_background_color'),
				'required' 		=> array('general_page_transition','=', 1)
            ),
			array(
                'id'       		=> 'general_sticky_menu',
                'type'     		=> 'checkbox',
                'title'    		=> __( 'Enable Sticky Menu?', 'beonepage' ),
                'subtitle' 		=> '',
                'desc'     		=> __( 'If enable, the menu will be accessible from anywhere without having to scroll.', 'beonepage' ),
                'default'  		=> $general_sticky_menu,
            ),
			array(
                'id'       		=> 'general_progress_bar',
                'type'     		=> 'checkbox',
                'title'    		=> __( 'Enable Scrolling Progress Bar?', 'beonepage' ),
                'subtitle' 		=> '',
                'desc'     		=> __( '', 'beonepage' ),
                'default'  		=> $general_progress_bar,
				'required'  	=> array('general_sticky_menu','=', 1)
            ),
			array(
                'id'       		=> 'progress_bar_color',
                'type'     		=> 'color',
                'title'    		=> __( 'Progress Bar Color', 'beonepage' ),
                'subtitle' 		=> '',
                'desc'     		=> __( '', 'beonepage' ),
                'default'  		=> $progress_bar_color,
				'output'   		=> array (
					'background-color'=>'.scroll-progress-bar div'
				),
				'required'  	=> array( 
					array('general_sticky_menu','=', 1),
					array('general_progress_bar', '=', 1)
				)
			),
			array(
                'id'       		=> 'general_go_to_top',
                'type'     		=> 'checkbox',
                'title'    		=> __( 'Enable Go to Top Button?', 'beonepage' ),
                'subtitle' 		=> '',
                'desc'     		=> __( '', 'beonepage' ),
                'default'  		=> $general_go_to_top,
            ),
			array(
                'id'       		=> 'general_go_to_top_btn_tyle',
                'type'    		=> 'switch',
                'title'    		=> __( 'Button Style', 'beonepage' ),
                'subtitle' 		=> '',
                'desc'     		=> __( '', 'beonepage' ),
                'default'  		=> $general_go_to_top_btn_tyle,
                'on'  	   		=> __( 'Light', 'beonepage'),
				'off'  	   		=> __( 'Dark', 'beonepage'),
				'required' 		=> array('general_go_to_top','=',1)
			),
		)
    ) ); 
	/* General Panel End */
	/* Menu Style Panel Start */
	Redux::setSection( $opt_name, array(
		'id'               => 'nav_menu_style',
		'title'            => __( 'Menu Style', 'beonepage' ),
		'desc'    		   => __( 'Here you can customize your menu styles.', 'beonepage' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-lines',
		'fields'           => array(
			array(
				'id' 			=> 'menu_style_layout',
				'type'     		=> 'button_set',						
				'title'    		=> __( 'Layout', 'beonepage' ),
				'desc'     		=> __( 'Choose the layout for the menu.', 'beonepage' ),
				'default'  		=> $menu_style_layout,
				'options'    	=> array(
					'fixed' 	=> __( 'Fixed-width', 'beonepage' ),
					'full'  	=> __( 'Full-width', 'beonepage' ),
				),
			),
			array(
				'id' 			=> 'menu_style_link_color',
				'type'     		=> 'color',						
				'title'    		=> __( 'Link Color', 'beonepage' ),
				'default'  		=> $menu_style_link_color,
				'output'   		=> array (
					'.site-title a, .main-navigation a',
				)
			),
			array(
				'id' 			=> 'menu_style_link_color_hover',
				'type'     		=> 'color',						
				'title'    		=> __( 'Link Color on Hover', 'beonepage' ),
				'default'  		=> $menu_style_link_color_hover,
				'output'    	=> array(
					'color'  	=> '.site-title a:hover, .main-navigation li.current-menu-item a, .main-navigation a:hover',
					'border-top-color'  => '.main-navigation ul ul',
					'background-color'  => '.main-navigation li li a:hover, .mobile-menu, body.small-device .mobile-menu:hover',
				)
			),
			array(
				'id' 			=> 'menu_style_submenu_bg_color',
				'type'     		=> 'color',						
				'title'    		=> __( 'Submenu Background Color', 'beonepage' ),
				'default'  		=> $menu_style_submenu_bg_color,
				'output'    	=> array(
					'background-color' => 'body.front-page.small-device .main-navigation ul.sub-menu , .main-navigation ul ul',
				)
			),
			array(
				'id' 			=> 'menu_style_submenu_link_color',
				'type'     		=> 'color',						
				'title'    		=> __( 'Submenu Link Color', 'beonepage' ),
				'default'  		=> $menu_style_submenu_link_color,
				'output'    	=> array(
					'.main-navigation li li a, body.small-device .main-navigation li li a:hover',
				)
			),
			array(
				'id' 			=> 'menu_style_submenu_link_color_hover',
				'type'     		=> 'color',						
				'title'    		=> __( 'Submenu Link Color on Hover', 'beonepage' ),
				'default'  		=> $menu_style_submenu_link_color_hover,
				'output'    	=> array(
					'background-color' => '.main-navigation li li a:hover',
				)
			),
			array(
				'id' 			=> 'menu_style_submenu_separator_color',
				'type'     		=> 'color',						
				'title'    		=> __( 'Submenu Separator Color', 'beonepage' ),
				'default'  		=> $menu_style_submenu_separator_color,
				'output'    	=> array(
					'border-bottom-color'  => '.main-navigation li li, body.small-device .main-navigation li, body.small-device .main-navigation li ul a',
					'border-top-color'  => 'body.small-device .main-navigation li ul',
					'border-left-color' => 'body.small-device .main-navigation li ul a'
				)
			),
			array(
				'id' 			=> 'menu_style_sticky_menu_bg_color',
				'type'    		=> 'color',						
				'title'    		=> __( 'Sticky Menu Background Color', 'beonepage' ),
				'default'  		=> $menu_style_sticky_menu_bg_color,
				'output'    	=> array(
					'background-color'  => '.sticky-header',
					'color'  => '.mobile-menu',
				)
			),
			array(
				'id' 			=> 'menu_style_sticky_menu_link_color',
				'type'     		=> 'color',						
				'title'    		=> __( 'Sticky Menu Link Color', 'beonepage' ),
				'default'  		=> $menu_style_sticky_menu_link_color,
				'output'    	=> array(
					'background-color'  => '.mobile-menu:hover, body.small-device .mobile-menu.closed:hover',
					'color'  => '.sticky-header a',
				)
			),
			array(
				'id' 			=> 'menu_style_sticky_menu_border_color',
				'type'    		=> 'color',						
				'title'    		=> __( 'Sticky Menu Border Color', 'beonepage' ),
				'default'  		=> $menu_style_sticky_menu_border_color,
				'output'   		=> array(
					'border-bottom-color'  => '.sticky-header',
				)
			),	
		)
	) );	
	/* Menu Style Panel End */
	/* Typography Panel Start */
	Redux::setSection( $opt_name, array(
        'title'            => __( 'Typography', 'beonepage' ),
        'id'               => 'site_typography',
        'desc'             => __( 'Here you can change the fonts of your site.', 'beonepage' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-tumblr',
		'fields'           => array(
			array(
				'id' 				=> 'typography_disable_google_font',
				'type'     			=> 'checkbox',						
				'title'    			=> __( 'Disable Google Font?', 'beonepage' ),
				'section'  			=> 'site_typography',
				'desc'     			=> __( '', 'beonepage' ),
				'default'  			=> $typography_disable_google_font,
			),
			array(
				'id'       			=> 'typography_primary_font_family',
				'type'     			=> 'typography',
				'title'    			=> __( 'Primary Font Family', 'beonepage' ),
				'subtitle' 			=> __( 'The font family used for Body Text.', 'beonepage' ),
				'desc'     			=> __( '', 'beonepage' ),
				'font-backup' 		=> false,
				'font-style' 		=> false,
				'font-color' 		=> false,
				'font-weight' 		=> false,
				'font-size' 		=> false,
				'font-family' 		=> true,
				'subsets' 			=> false,
				'line-height' 		=> false,
				'word-spacing' 		=> false,
				'letter-spacing'	=> false,
				'text-align' 		=> false,
				'text-transform' 	=> false,
				'google' 			=> true,
				'required' 			=> array( 'typography_disable_google_font', '=', 0 ),
				'default'  			=>  array( 'font-family' => $typography_primary_font_family),
				'output'      		=> array('font-family' => 'body',)
			),
			array(
				'id'       			=> 'typography_secondary_font_family',
				'type'    			=> 'typography',
				'title'   			=> __( 'Secondary Font Family', 'beonepage' ),
				'section'     		=> 'site_typography',
				'subtitle' 			=> __( 'The font family used for H1-H6 Tags, Tooltips and Slider.', 'beonepage' ),
				'font-backup' 		=> false,
				'font-style' 		=> false,
				'font-color' 		=> false,
				'font-weight' 		=> false,
				'font-size' 		=> false,
				'font-family' 		=> true,
				'subsets' 			=> false,
				'line-height' 		=> false,
				'word-spacing' 		=> false,
				'letter-spacing'	=> false,
				'text-align' 		=> false,
				'text-transform' 	=> false,
				'desc'     			=> __( '', 'beonepage' ),
				'default'  			=>  array( 'font-family' => $typography_secondary_font_family),
				'required' 			=> array( 'typography_disable_google_font', '=', 0 ),
				'output'      		=> array('font-family' => 'h1, h2, h3, h4, h5, h6, .tooltip, .slider-caption h1, .slider-caption p, .slider-btn a, .process-label span, .team-member .member-title, .testimonial-name span, .fact-number, .item-price, .tweet-timestamp'),
			),
			array(
				'id'       			=> 'typography_tertiary_font_family',
				'type'     			=> 'typography',
				'title'    			=> __( 'Tertiary Font Family', 'beonepage' ),
				'subtitle' 			=> __( 'The font family used for Site Title, Menu, Module Subtitle and Contact Boxes.', 'beonepage' ),
				'desc'     			=> __( '', 'beonepage' ),
				'font-backup' 		=> false,
				'font-style' 		=> false,
				'font-weight' 		=> false,
				'font-size' 		=> false,
				'font-family' 		=> true,
				'subsets' 			=> false,
				'line-height' 		=> false,
				'word-spacing' 		=> false,
				'letter-spacing'	=> false,
				'text-align' 		=> false,
				'text-transform' 	=> false,
				'font-color' 		=> false,
				'default'  			=>  array( 'font-family' => $typography_tertiary_font_family),
				'required' 			=> array( 'typography_disable_google_font', '=', 0 ),
				'output'      		=> array(
					'font-family'  	=> '.site-title, .main-navigation, #slide-number, .module-caption p, .promo-box-ver p, .contact-item .ci-title, .skill-bar .line-active span, .testimonial-box .testimonial-name, .fact-text, .pb-detail ul li, .widget:not(.woocommerce) ul li span'),
			),
			array(
				'id'       			=> 'typography_body_font_size',
				'type'     			=> 'typography',
				'title'    			=> __( 'Font Size', 'beonepage' ),
				'subtitle' 			=> __( 'Choose from over 600+ %1$sGoogle Fonts%2$s and preview them instantly without refreshing the page.', 'beonepage' ),	
				'desc'     			=> __( '', 'beonepage' ),
				'default'  			=> $typography_body_font_size,
				'font-backup' 		=> false,
				'font-style' 		=> false,
				'font-color' 		=> false,
				'font-weight' 		=> false,
				'font-size' 		=> true,
				'font-family' 		=> false,
				'subsets' 			=> false,
				'line-height' 		=> false,
				'word-spacing' 		=> false,
				'letter-spacing'	=> false,
				'text-align' 		=> false,
				'text-transform' 	=> false,
				'font-display' 		=> false,
				'units'				=> 'px',
				'output'      		=> array(
					'font-size'  => 'body',
				),
				'default'  			=>  array( 'font-size' => $typography_body_font_size)
			),
		)
    ) );
	/* Typography Panel End */
	
	/* Icon Logo Panel Start */
	Redux::setSection( $opt_name, array(
        'title'            => __( 'Icon & Logo', 'beonepage' ),
        'id'               => 'site_icon_logo',
        'desc'             => __( '', 'beonepage' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-edit',
		'fields'           => array(
            array(
                'id'       		=> 'icon_logo_type',
                'type'     		=> 'switch',
                'title'    		=> __( 'Logo Type', 'beonepage' ),
                'subtitle' 		=> __( '', 'beonepage' ),
                'desc'     		=> __( '', 'beonepage' ),
                'default'  		=> $icon_logo_type,
				'on'  	   		=> 'Text',
                'off'  	   		=> 'Image',
            ),
			array(
                'id'       		=> 'icon_logo_title',
                'type'     		=> 'text',
                'title'    		=> __( 'Site Title', 'beonepage' ),
                'subtitle' 		=> __( '', 'beonepage' ),
                'desc'     		=> __( '', 'beonepage' ),
                'default'  		=> get_bloginfo( 'name' ),
            ),
			array(
                'id'      		=> 'icon_logo_logo',
                'type'     		=> 'media',
                'title'    		=> __( 'Upload Logo', 'beonepage' ),
                'subtitle' 		=> __( '', 'beonepage' ),
                'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> array(
					'url'	=> 	$icon_logo_logo
				),
            ),
			array(
                'id'       		=> 'icon_logo_retina_logo',
                'type'     		=> 'media',
                'title'    		=> __( 'Upload Retina Logo', 'beonepage' ),
                'subtitle' 		=> __( '', 'beonepage' ),
                'desc'     		=> __( '', 'beonepage' ),
				'default' 		=> array(
					'url'	=>  $icon_logo_retina_logo
				),
            ),
        )
    ) );
	/* Site Identity Panel End */
	
	/* Front Page Panel Start */
	Redux::setSection( $opt_name, array(
        'title'            => __( 'Front Page', 'beonepage' ),
        'id'               => 'site_front_page',
        'desc'             => __( 'These are really basic fields!', 'beonepage' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-file-alt'
    ) );
	/* Module Manager Section Start */
	Redux::setSection( $opt_name, array(
        'title'            => __( 'Module Manager', 'beonepage' ),
        'id'               => 'site_front_page_module_manager',
        'desc'             => __( 'These are really basic fields!', 'beonepage' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-cog',
		'subsection'       => true,
		'fields'           => array(
            array(
                'id'      		=> 'front_page_module_manager',
				'type'    		=> 'sorter',
				'title'  		=> 'Module Manager',
				'desc'   		=> 'Organize how you want the layout to appear on the homepage',
				'options' 		=> array(
					'enabled'  		=> array(
						'slider'           => __( 'Slider', 'beonepage' ),
						'icon-service'     => __( 'Icon Service', 'beonepage' ),
						'icon-service-img' => __( 'Icon Service with Image', 'beonepage' ),
						'portfolio'        => __( 'Portfolio', 'beonepage' ),
						'ver-promo'        => __( 'Vertical Promotion', 'beonepage' ),
						'hor-promo'        => __( 'Horizontal Promotion', 'beonepage' ),
						'blog'             => __( 'Blog', 'beonepage' ),
						'contact'          => __( 'Contact', 'beonepage' ),
						'process'          => __( 'Process', 'beonepage' ),
						'team'             => __( 'Team', 'beonepage' ),
						'skill-bar'        => __( 'Skill Bar', 'beonepage' ),
						'testimonial'      => __( 'Testimonial', 'beonepage' ),
						'client'           => __( 'Client', 'beonepage' ),
						'fun-fact'         => __( 'Fun Fact', 'beonepage' ),
						'pricing-table'    => __( 'Pricing Table', 'beonepage' ),
						'twitter'          => __( 'Twitter', 'beonepage' ),
						'subscribe'        => __( 'MailChimp Subscribe', 'beonepage' ),
						'widget'           => __( 'Widget', 'beonepage' ),
						'custom'           => __( 'Custom', 'beonepage' )
					),
					'disabled' => array()
				),
				'default'  => $front_page_module_manager,
            ),
        ),
    ) );
	/* Module Manager Section End */
	/* Slider Module Section Start */
   Redux::setSection( $opt_name, array(
        'title'            => __( 'Slider Module', 'beonepage' ),
        'id'               => 'site_front_page_slider_module',
        'desc'             => __( 'These are really basic fields!', 'beonepage' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-adjust-alt',
		'subsection'       => true,
		'fields'           => array(
            array(
                'id'       		=> 'front_page_slider_type',
                'type'     		=> 'button_set',
                'title'    		=> __( 'Slider Type', 'beonepage' ),
                'subtitle' 		=> '',
                'desc'     		=> __( '', 'beonepage' ),
                'default'  		=> true,
				'options'  		=> array(
					'1'	   		=> 'Text',
					'2'	   		=> 'Image'
				)
			),
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Heading and Content , Button Text <br> and  Button Url' , 'beonepage' ),
				'content'     		=> __( 'All this things are moved into home page meta boxes itself.<br>Please edit your homepage and check.', 'beonepage' ),
				'full_width' => false
			),
			/* array(
                'id'       		=> 'front_page_text_slider_title',
                'type'     		=> 'text',
                'title'   		=> __( 'Heading', 'beonepage' ),
                'subtitle' 		=> '',
                'desc'     		=> esc_html( 'If you want to color the word, just wrap it with "<span>" tag.', 'beonepage' ),
                'default'  		=> $front_page_text_slider_title,
				'required' 		=> array('front_page_slider_type','=','1')
            ), */
			/* array(
                'id'       		=> 'front_page_text_slider_content',
                'type'     		=> 'text',
                'title'    		=> __( 'Content', 'beonepage' ),
                'default'  		=> $front_page_text_slider_content,
				'required' 		=> array('front_page_slider_type','=','1')
            ), */
			array(
                'id'       		=> 'front_page_text_slider_color',
                'type'     		=> 'color',
                'title'    		=> __( 'Font Color', 'beonepage' ),
                'default'  		=> $front_page_text_slider_color,
                'output'  		=> array ('.slider-caption p'),
               'required' 		=> array('front_page_slider_type','=','1') 
			),
			/* array(
                'id'       		=> 'front_page_text_slider_btn_text',
                'type'     		=> 'text',
                'title'    		=> __( 'Button Text', 'beonepage' ),
                'default'  		=> $front_page_text_slider_btn_text,
				'required' 		=> array('front_page_slider_type','=','1')				
            ),
			array(
                'id'       		=> 'front_page_text_slider_btn_url',
                'type'     		=> 'text',
                'title'    		=> __( 'Button Url', 'beonepage' ),
                'default'  		=> $front_page_text_slider_btn_url,
				'required' 		=> array('front_page_slider_type','=','1')				
            ), */
			array(
                'id'       		=> 'front_page_text_slider_btn_style',
                'type'     		=> 'switch',
                'title'    		=> __( 'Button Style', 'beonepage' ),
                'default'  		=> $front_page_text_slider_btn_style,					
                'on'  	   		=> 'Light',					
                'off'      		=> 'Dark',
				'required' 		=> array('front_page_slider_type','=','1')
            ),
			array(
                'id'       		=> 'front_page_text_slider_bg',
                'type'     		=> 'background',
                'title'    		=> __( 'Background Image', 'beonepage' ),
                'subtitle' 		=> __( 'Body background with image, color, etc.', 'beonepage' ),
				'default'  		=> $front_page_text_slider_bg,	
				'output'    	=> array (
					'background-color'  => '.text-slider'
				),
				'required' 		=> array('front_page_slider_type','=','1')
            ), 
			array(
                'id'       		=> 'front_page_text_slider_parallax',
                'type'     		=> 'checkbox',
                'title'    		=> __( 'Enable Parallax Scrolling For Background Image?', 'beonepage' ),
                'default'  		=> $front_page_text_slider_parallax,	
				'required' 		=> array('front_page_slider_type','=','1')
            ),
			array(
                'id'       		=> 'front_page_text_slider_scroll_down',
                'type'     		=> 'checkbox',
                'title'    		=> __( 'Enable Scroll Down Button For Background Image?', 'beonepage' ),
                'default'  		=> $front_page_text_slider_scroll_down,
				'required' 		=> array('front_page_slider_type','=','1')
            ),
			array(
				'type'    		=> 'info',
				'id' 			=> 'front_page_swiper_slider_notice',
				'default'  		=> $front_page_swiper_slider_notice,
				'required' 		=> array('front_page_slider_type','=','1'),
			),
			array(
                'id'       		=> 'front_page_swiper_slider_color',
                'type'     		=> 'color',
                'title'    		=> __( 'Font Color', 'beonepage' ),
                'default'  		=> $front_page_swiper_slider_color,
				'output'    	=> array(
					'color'  => '.swiper-slider',
					'background-color'  => '.swiper-slider .scroll-down:before',
				),
				'required' 		=> array('front_page_slider_type','=','2'),
            ),
			array(
                'id'       		=> 'front_page_swiper_slider_btn_style',
                'type'     		=> 'switch',
                'title'    		=> __( 'Button Style', 'beonepage' ),
                'default'  		=> $front_page_swiper_slider_btn_style,					
                'on'  	  		=> 'Light',					
                'off'     		=> 'Dark',
				'required' 		=> array('front_page_slider_type','=','2'),
            ),
			array(
                'id'       		=> 'front_page_swiper_slider_parallax',
                'type'     		=> 'checkbox',
                'title'    		=> __( 'Enable Parallax Scrolling For Swiper Slider?', 'beonepage' ),
                'default'  		=> $front_page_swiper_slider_parallax,	
				'required' 		=> array('front_page_slider_type','=','2'),
            ),
			array(
                'id'       		=> 'front_page_swiper_slider_scroll_down',
                'type'     		=> 'checkbox',
                'title'    		=> __( 'Enable Scroll Down Button For Swiper Slider?' ),
                'default'  		=> $front_page_swiper_slider_scroll_down,
				'required' 		=> array('front_page_slider_type','=','2'),
            ),
			array(
				'id'       		=> 'front_page_slider_switch',
				'type'     		=> 'button_set',
				'title'    		=> __( 'Home Page Slider AutoPlay', 'beonepage' ),
				'default'  		=> $front_page_slider_switch,
				'options'  		=> array(
					'1' => __( 'AutoPlay On', 'beonepage' ),
					'2' => __( 'AutoPlay Off', 'beonepage' )
				),
				'required' => array('front_page_slider_type','=','2'),
			),
			array(
                'id'       		=> 'front_page_slider_time',
                'type'    		=> 'text',
                'title'    		=> __( 'Home Page Slider Time', 'beonepage' ),
				'desc' 			=> __( 'Its Default Value', 'beonepage' ),
                'default'  		=> $front_page_slider_time,
				'required' 		=> array('front_page_slider_switch','=','1')				
            ),
		)
    ) );
	/* Slider Module Section End */
	
	/* Icon Service Module Section Start */
		Redux::setSection( $opt_name, array(
        'title'            => __( 'Icon Service Module', 'beonepage' ),
        'id'               => 'site_front_page_icon_service_module',
        'desc'             => '',
        'customizer_width' => '400px',
        'icon'             => 'el el-wrench',
		'subsection'       => true,
		'fields'           => array(
			array(
				'id'       		=> 'front_page_icon_service_module_id',
				'type'     		=> 'text',
				'title'    		=> __( 'Module ID', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
				'default'  		=> $front_page_icon_service_module_id,
			),
			array(
				'id'       		=> 'front_page_icon_service_module_layout',
				'type'     		=> 'radio',
				'title'    		=> __( 'Layout', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> __( 'Choose the layout for the container.', 'beonepage' ),
				'default'  		=> $front_page_icon_service_module_layout,
				'options'  		=> array(
					'fixed'	=> 'Fixed-width', 
					'full' 	=> 'Full-width'
				),
			),
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Title and Subtitle', 'beonepage' ),
				'content'     	=> __( 'All this things are moved into home page meta boxes itself.<br> Please edit your homepage and check.', 'beonepage' ),
				'full_width' => false	
			),
			/* array(
				'id'       		=> 'front_page_icon_service_module_title',
				'type'    		=> 'text',
				'title'   		=> __( 'Title', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> esc_html( 'If you want to color the word, just wrap it with "<span>" tag.', 'beonepage' ),
				'default'  		=> $front_page_icon_service_module_title,
			),
			array(
				'id'       		=> 'front_page_icon_service_module_subtitle',
				'type'     		=> 'text',
				'title'   		=> __( 'Subtitle', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'    		=>'',
				'default' 		=> $front_page_icon_service_module_subtitle,
			), */
			array(
				'id'       		=> 'front_page_icon_service_module_animation',
				'type'     		=> 'select',
				'title'    		=> __( 'Caption Animation', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'default'  		=> $front_page_icon_service_module_animation,
				'options'  		=> beonepage_animate(),
			),
			array(
				'id'       		=> 'front_page_icon_service_module_color',
				'type'     		=> 'color',
				'title'    		=> __( 'Font Color', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'default'  		=> $front_page_icon_service_module_color,
				'output'  		=> array ('.icon-service-module'),
			),
			array(
				'id'       		=> 'front_page_icon_service_module_sp_color',
				'type'     		=> 'color',
				'title'   		=> __( 'Separator Line Color', 'beonepage' ),
				'subtitle'		=> '',
				'desc'    		=> '',
				'default'  		=> $front_page_icon_service_module_sp_color,
				'output'   		=> array ('.icon-service-module .separator span'),
			),
			array(
				'id'       		=> 'front_page_icon_service_module_sp_i_color',
				'type'     		=> 'color',
				'title'    		=> __( 'Separator Circle Color', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'default'  		=> $front_page_icon_service_module_sp_i_color,
				'output'   		=> array ('.icon-service-module .separator i'),
			),
			array(
				'id'       		=> 'front_page_icon_service_module_hover_color',
				'type'    	 	=> 'color',
				'title'    		=> __( 'Icon Background on Hover', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'default'  		=> $front_page_icon_service_module_hover_color,
				'output'   		=> array (
					'background-color' => '.icon-service-module .icon-service-box:hover .service-icon'
				)
			),
			array(
				'id'       		=> 'front_page_icon_service_module_bg',
				'type'     		=> 'button_set',
				'title'    		=> __( 'Background', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'default'  		=> $front_page_icon_service_module_bg,
				'options'  		=> array(
					'color'  	=> 'Color',
					'image' 	=> 'Image',
					'video' 	=> 'Video'
				)
			),
			array(
				'id'       		=> 'front_page_icon_service_module_bg_color',
				'type'     		=> 'color',
				'title'    		=> __( 'Background Color', 'beonepage' ),
				'subtitle'		=> '',
				'desc'     		=> '',
				'background-color'  => false,
				'required' 		=> array( 'front_page_icon_service_module_bg', '=', 'color' ),
				'default'  		=> $front_page_icon_service_module_bg_color,
				'output'   		=> array('background-color' => '.icon-service-module' ),
			),
			array(
				'id'       		=> 'front_page_icon_service_module_bg_img',
				'type'     		=> 'background',
				'title'    		=> __( 'Background Image', 'beonepage' ),
				'required' 		=> array( 'front_page_icon_service_module_bg', '=', 'image' ),
				'default'  		=> $front_page_icon_service_module_bg_img,
				'output'   		=> array ('.icon-service-module.img-background'),
			),
			array(
				'id'       		=> 'front_page_icon_service_module_bg_parallax',
				'type'     		=> 'checkbox',
				'title'    		=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'required' 		=> array( 'front_page_icon_service_module_bg', '=', 'image' ),
				'default'  		=> $front_page_icon_service_module_bg_parallax,
			),
			array(
				'id'       		=> 'front_page_icon_service_module_bg_video',
				'type'     		=> 'text',
				'title'    		=> __( 'YouTube URL', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'required'		=> array( 'front_page_icon_service_module_bg', '=', 'video' ),
				'default'  		=> $front_page_icon_service_module_bg_video,
			),
			array(
				'type'    		=> 'info',
				'id' 	   		=> 'front_page_icon_service_module_bg_notice',
				'default'  		=> $front_page_icon_service_module_bg_notice,
				'required' 		=> array('front_page_icon_service_module_bg','=','video')
			),
			array(
				'type'     => 'info',
				'id'       => 'front_page_icon_service_module_notice',
				'default'  => $front_page_icon_service_module_notice,
				'required' => array('front_page_icon_service_module_bg','=','video')
			),
		)
	) );
	/* Icon Service Module Section End */
	
	/* Icon Service with Image Module Start */
	Redux::setSection( $opt_name, array(
		'title'            => __( 'Icon Service with Image Module', 'beonepage' ),
		'id'               => 'site_front_page_icon_service_img_module',
		'subsection'       => true,
		'icon'             => 'el el-picture',
		'fields'           => array(
			array(
				'id'       		=> 'front_page_icon_service_img_module_layout',
				'type'     		=> 'button_set',
				'title'    		=> __( 'Layout', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=>  __( 'Choose the layout for the container.', 'beonepage' ),
				'default'  		=> $front_page_icon_service_img_module_layout,
				'options'  		=> array(
					'fixed' 	=> __( 'Fixed-width', 'beonepage' ),
					'full'  	=> __( 'Full-width', 'beonepage' ),
				),
			),
			array(
				'type'     		=> 'text',
				'id'   	   		=> 'front_page_icon_service_img_module_id',
				'title'    		=> __( 'Module ID', 'beonepage' ),
				'description' 	=> __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
				'default'  => $front_page_icon_service_img_module_id,
			),
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Title and Subtitle', 'beonepage' ),
				'content'     	=> __( 'All this things are moved into home page meta boxes itself.<br> Please edit your homepage and check.', 'beonepage' ),
				'full_width' => false,
			),
			/* array(
				'type'     		=> 'text',
				'id'       		=> 'front_page_icon_service_img_module_title',
				'title'    		=> __( 'Title', 'beonepage' ),
				'desc' 	   		=> __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
				'default'  		=> $front_page_icon_service_img_module_title,
			),
			array(
				'type'     		=> 'textarea',
				'id'       		=> 'front_page_icon_service_img_module_subtitle',
				'title'    		=> __( 'Subtitle', 'beonepage' ),
				'default' 	 	=> $front_page_icon_service_img_module_subtitle,
			), */
			array(
				'type'     		=> 'select',
				'id'       		=> 'front_page_icon_service_img_module_animation',
				'title'    		=> __( 'Caption Animation', 'beonepage' ),
				'default'  		=> $front_page_icon_service_img_module_animation,
				'options'  		=> beonepage_animate()
			),
			array(
				'type'     		=> 'color',
				'id'       		=> 'front_page_icon_service_img_module_color',
				'title'    		=> __( 'Font Color', 'beonepage' ),
				'default'  		=> $front_page_icon_service_img_module_color,
				'output'   		=> array ('.icon-service-img-module, .icon-service-img-module .icon-service-box:hover i'),
			),
			array(
				'type'     		=> 'color',
				'id'       		=> 'front_page_icon_service_img_module_sp_color',
				'title'    		=> __( 'Separator Line Color', 'beonepage' ),
				'default'  		=> $front_page_icon_service_img_module_sp_color,
				'output'   		=> array ('.icon-service-img-module .separator span'),
			),
			array(
				'type'     		=> 'color',
				'id'       		=> 'front_page_icon_service_img_module_sp_i_color',
				'title'    		=> __( 'Separator Circle Color', 'beonepage' ),
				'default'  		=> $front_page_icon_service_img_module_sp_i_color,
				'output'   		=> array ('.icon-service-img-module .separator i'),
			),
			array(
				'type'     		=> 'media',
				'id'  	   		=> 'front_page_icon_service_img_module_img',
				'title'    		=> __( 'Image', 'beonepage' ),
				'default'  		=> $front_page_icon_service_img_module_img,
			),
			array(
				'type'     		=> 'select',
				'id'       		=> 'front_page_icon_service_img_animation',
				'title'    		=> __( 'Image Animation', 'beonepage' ),
				'default'  		=> $front_page_icon_service_img_animation,
				'options'  		=> beonepage_animate()
			),
			array(
				'type'     		=> 'color',
				'id'       		=> 'front_page_icon_service_img_module_icon_color',
				'title'    		=> __( 'Icon Color', 'beonepage' ),
				'default'  		=> $front_page_icon_service_img_module_icon_color,
				'output'   		=> array('color' =>	'.icon-service-img-module .service-icon',
				'background-color' => '.icon-service-img-module .icon-service-box:hover .service-icon '),
			),
			array(
				'id'       		=> 'front_page_icon_service_img_module_bg',
				'type'     		=> 'button_set',
				'title'    		=> __( 'Background', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'default'  		=> $front_page_icon_service_img_module_bg,
				'options'  		=> array(
					'color' => 'Color',
					'image' => 'Image',
					'video' => 'Video'
				)
			),
			array(
				'id'       		=> 'front_page_icon_service_img_module_bg_color',
				'type'     		=> 'color',
				'title'   		=> __( 'Background Color', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'background-color' => false,
				'required' 		=> array( 'front_page_icon_service_img_module_bg', '=', 'color' ),
				'default'  		=> $front_page_icon_service_img_module_bg_color,
				'output'   		=> array('background-color' => '.icon-service-img-module' ),
			),
			array(
				'id'      		=> 'front_page_icon_service_img_module_bg_img',
				'type'     		=> 'background',
				'title'    		=> __( 'Background Image', 'beonepage' ),
				'required' 		=> array( 'front_page_icon_service_img_module_bg', '=', 'image' ),
				'default'  		=> $front_page_icon_service_img_module_bg_img,
				'output'  		=> array ('.icon-service-img-module.img-background'),
			),
			array(
				'id'       		=> 'front_page_icon_service_img_module_bg_parallax',
				'type'     		=> 'checkbox',
				'title'    		=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'required' 		=> array( 'front_page_icon_service_img_module_bg', '=', 'image' ),
				'default'  		=> $front_page_icon_service_img_module_bg_parallax,
			),
			array(
				'id'       		=> 'front_page_icon_service_img_module_bg_video',
				'type'     		=> 'text',
				'title'   		=> __( 'YouTube URL', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'required' 		=> array( 'front_page_icon_service_img_module_bg', '=', 'video' ),
				'default'  		=>  $front_page_icon_service_img_module_bg_video,
			),
			array(
				'type'     		=> 'info',
				'id'       		=> 'front_page_icon_service_img_module_bg_notice',
				'default'  		=> $front_page_icon_service_img_module_bg_notice,
				'required' 		=> array('front_page_icon_service_img_module_bg','=','video')
			),
			array(
				'type'     		=> 'info',
				'id'       		=> 'front_page_icon_service_img_module_notice',
				'default'  		=> $front_page_icon_service_img_module_notice,
				'required' 		=> array('front_page_icon_service_img_module_bg','=','video')
			),															
		),
	) );
	/* Icon Service with Image Module Section End */
	/* Portfolio Module Section Start */		
	Redux::setSection( $opt_name, array(
		'title'            => __( 'Portfolio Module', 'beonepage' ),
		'id'               => 'site_front_page_portfolio_module',
		'desc'             => '',
		'icon'             => 'el el-briefcase',
		'subsection'       => true,
		'fields'           => array(
			array(
				'type'     		=> 'text',
				'id'       		=> 'front_page_portfolio_module_id',
				'title'    		=> __( 'Module ID', 'beonepage' ),
				'description' 	=> __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
				'default'  		=> $front_page_portfolio_module_id,	
			),
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Title and Subtitle', 'beonepage' ),
				'content'     	=> __( 'All this things are moved into home page meta boxes itself.<br> Please edit your   homepage and check.', 'beonepage' ),
				'full_width' => false	
			),
			/* array(
				'type'      	=> 'text',
				'id' 			=> 'front_page_portfolio_module_title',
				'title'     	=> __( 'Title', 'beonepage' ),
				'desc'      	=> __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
				'default'   	=> $front_page_portfolio_module_title,
			),
			array(
				'type'      	=> 'textarea',
				'id'  			=> 'front_page_portfolio_module_subtitle',
				'title'     	=> __( 'Subtitle', 'beonepage' ),
				'default'   	=> $front_page_portfolio_module_subtitle,
			), */
			array(
				'type'        	=> 'select',
				'id'    		=> 'front_page_portfolio_module_animation',
				'title'       	=> __( 'Caption Animation', 'beonepage' ),
				'default'     	=> $front_page_portfolio_module_animation,
				'options'     	=> beonepage_animate()
			),
			array(
				'type'      	=> 'color',
				'id'  			=> 'front_page_portfolio_module_color',
				'title'     	=> __( 'Font Color', 'beonepage' ),
				'default'   	=> $front_page_portfolio_module_color,
				'output'  		=> array ('.portfolio-module'),
			),
			array(
				'type'      	=> 'color',
				'id'  			=> 'front_page_portfolio_module_sp_color',
				'title'     	=> __( 'Separator Line Color', 'beonepage' ),
				'default'   	=> $front_page_portfolio_module_sp_color,
				'output'  		=> array ('.portfolio-module .separator span'),	
			),
			array(
				'type'      	=> 'color',
				'id'  			=> 'front_page_portfolio_module_sp_i_color',
				'title'     	=> __( 'Separator Circle Color', 'beonepage' ),
				'default'   	=> $front_page_portfolio_module_sp_i_color,
				'output'  		=> array ('.portfolio-module .separator i'),
			),
			array(
				'type'     		=> 'checkbox',
				'id' 			=> 'front_page_portfolio_module_show_all_hide',
				'title'    		=> __( 'Disable Show All Button And It\'s Item', 'beonepage' ),
				'default'   	=> $front_page_portfolio_module_show_all_hide,
			),
			array(
				'id'       		=> 'front_page_portfolio_module_bg',
				'type'     		=> 'button_set',
				'title'    		=> __( 'Background', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'default'  		=> $front_page_portfolio_module_bg,
				'options'  		=> array(
					'color'  	=> 'Color',
					'image' 	=> 'Image',
					'video' 	=> 'Video'
				)
			),
			array(	
				'id'       		=> 'front_page_portfolio_module_bg_color',
				'type'     		=> 'color',
				'title'    		=> __('Background Color', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'required' 		=> array( 'front_page_portfolio_module_bg', '=', 'color' ),
				'default'  		=> $front_page_portfolio_module_bg_color,
				'output'   		=> array('background-color' => '.portfolio-module' ),				
			),
			array(
				'id'       		=> 'front_page_portfolio_module_bg_img',
				'type'     		=> 'background',
				'title'    		=> __( 'Background Image', 'beonepage' ),
				'required' 		=> array( 'front_page_portfolio_module_bg', '=', 'image' ),
				'default'  		=> $front_page_portfolio_module_bg_img,
				'output'  		=> array ('.portfolio-module.img-background'),
			),
			array(
				'id'       		=> 'front_page_portfolio_module_bg_parallax',
				'type'     		=> 'checkbox',
				'title'   		=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'required' 		=> array( 'front_page_portfolio_module_bg', '=', 'image' ),
				'default'  		=> $front_page_portfolio_module_bg_parallax,
			),
			array(
				'id'       		=> 'front_page_portfolio_module_bg_video',
				'type'     		=> 'text',
				'title'    		=> __( 'YouTube URL', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'required'		=> array( 'front_page_portfolio_module_bg', '=', 'video' ),
				'default'  		=>  $front_page_portfolio_module_bg_video,
			),
			array(
				'type'     		=> 'info',
				'id' 			=> 'front_page_portfolio_module_bg_notice',
				'default'  		=> $front_page_portfolio_module_bg_notice,
				'required' 		=> array('front_page_portfolio_module_bg','=','video')
			),
			array(
				'type'     		=> 'info',
				'id' 			=> 'front_page_portfolio_module_notice',
				'default'  		=> $front_page_portfolio_module_notice,
				'required' 		=> array('front_page_portfolio_module_bg','=','video')
			),
			array(
				'type'     		=> 'checkbox',
				'id' 			=> 'front_page_portfolio_module_filter',
				'title'    		=> __( 'Enable Portfolio Filter?', 'beonepage' ),
				'default'  		=> $front_page_portfolio_module_filter,
			),
			array(
				'type'        	=> 'select',
				'id'    		=> 'front_page_portfolio_module_filter_animation',
				'title'       	=> __( 'Filter Animation', 'beonepage' ),
				'default'     	=> $front_page_portfolio_module_filter_animation,
				'required' 		=> array( 'front_page_portfolio_module_filter', '=', 1 ),
				'options'     	=> beonepage_animate(),
			),
			/*array(
				'type'      	=> 'text',
				'id'  			=> 'front_page_portfolio_module_all',
				'title'     	=> __( 'Show All Button Text', 'beonepage' ),
				'default'   	=> $front_page_portfolio_module_all,
				'output'  		=> array ('#portfolio-filter a:first-child'),
				'required' 		=> array( 'front_page_portfolio_module_filter', '=', 1 ),
			),*/
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Show All Button Text', 'beonepage' ),
				'content'     	=> __( 'All this things are moved into home page meta boxes itself.<br> Please edit your homepage and check.', 'beonepage' ),
				'full_width' => false
			),
			array(
				'type'      	=> 'color',
				'id'  			=> 'front_page_portfolio_module_filter_color',
				'title'    		=> __( 'Filter Font Color', 'beonepage' ),
				'section'   	=> 'site_front_page_portfolio_module',
				'default'   	=> $front_page_portfolio_module_filter_color,
				'output'  		=> array (
					'background-color'  => '#portfolio-filter a:hover, #portfolio-filter .active',
					'color' => '#portfolio-filter a',
				),
				'required' 		=> array( 'front_page_portfolio_module_filter', '=', 1 ),
			),
			array(
				'type'      	=> 'color',
				'id'  			=> 'front_page_portfolio_module_filter_bg_color',
				'title'    		=> __( 'Filter Background Color', 'beonepage' ),
				'default'   	=> $front_page_portfolio_module_filter_bg_color,
				'output'    	=>array(
					'color' => '#portfolio-filter a:hover, #portfolio-filter .active',
					'background-color'  => '#portfolio-filter a',
				),
				'required' => array( 'front_page_portfolio_module_filter', '=', 1 ),
			),
			array(
				'type'      	=> 'color_rgba',
				'id'  			=> 'front_page_portfolio_module_item_bg_color',
				'title'     	=> __( 'Portfolio Item Background on Hover', 'beonepage' ),
				'default'   	=> $front_page_portfolio_module_item_bg_color,
				'output'  		=> array ('background-color' => '.portfolio-caption'),
			),
			array(
				'type'      	=> 'color',
				'id'  			=> 'front_page_portfolio_module_item_title_color',
				'title'     	=> __( 'Portfolio Item Title Color', 'beonepage' ),
				'default'   	=> $front_page_portfolio_module_item_title_color,
				'output'  		=> array ('.portfolio-caption .entry-title'),
			),
			array(
				'type'      	=> 'color',
				'title'     	=> __( 'Portfolio Item Tag Color', 'beonepage' ),
				'id'  			=> 'front_page_portfolio_module_item_tag_color',
				'default'   	=> $front_page_portfolio_module_item_tag_color,
				'output'  		=> array ('.portfolio-caption .entry-meta'),	
			),
			array(
				'type'      	=> 'select',
				'id'  			=> 'front_page_portfolio_module_item_column_number',
				'title'     	=> __( 'Portfolio Item column number', 'beonepage' ),
				'default'   	=> $front_page_portfolio_module_item_column_number,
				'options'		=>	array(
					'3'			=>	esc_html__('3', 'beonepage'),
					'4'			=>	esc_html__('4', 'beonepage'),
				)
			),
			array(
				'type'      	=> 'button_set',
				'id'  			=> 'front_page_portfolio_module_item_image_popup',
				'title'     	=> __( 'Portfolio Item Image Popup', 'beonepage' ),
				'default'   	=> $front_page_portfolio_module_item_image_popup,
				'options'		=>	array(
					'1'   	=> esc_html__( 'Full Content', 'beonepage' ),
					'2' 	=> esc_html__( 'Popup Image', 'beonepage' ),
				)
			),
			array(
				'type'     		=> 'button_set',
				'id'  			=> 'front_page_portfolio_module_item_limitation_switch',
				'title'     	=> __( 'Portfolio Item Limitation', 'beonepage' ),
				'section'   	=> 'site_front_page_portfolio_module',
				'default'   	=> $front_page_portfolio_module_item_limitation_switch,
				'options'		=>	array(
					'1'  	=> esc_html__( 'Show More', 'beonepage' ),
					'2' 	=> esc_html__( 'Limited Item', 'beonepage' ),		
				)
			),
			array(
				'type'      	=> 'text',
				'id'  			=> 'front_page_portfolio_module_item_limitation_number',
				'title'     	=> __( 'Portfolio Item Number To Show', 'beonepage' ),
				'default'   	=> $front_page_portfolio_module_item_limitation_number,
				'required' 		=> array('front_page_portfolio_module_item_limitation_switch','=','2')
			),
			array(
				'type'     		=> 'text',
				'id'  			=> 'front_page_portfolio_module_item_showall_button_text',
				'title'     	=> __( 'Show More Button text', 'beonepage' ),
				'default'   	=> $front_page_portfolio_module_item_showall_button_text,
				'required' 		=> array('front_page_portfolio_module_item_limitation_switch','=','2')
			),
			array(
				'type'      	=> 'text',
				'id'  			=> 'front_page_portfolio_module_item_showall_button_url',
				'title'     	=> __( 'Show More Button URL', 'beonepage' ),
				'default'   	=> $front_page_portfolio_module_item_showall_button_url,
				'required'		=> array('front_page_portfolio_module_item_limitation_switch','=','2')
			),
			array(
				'type'      	=> 'color',
				'id'  			=> 'front_page_portfolio_module_modal_title_color',
				'title'     	=> __( 'Portfolio Modal Title Color', 'beonepage' ),
				'default'   	=> $front_page_portfolio_module_modal_title_color,
				'output'  		=> array ('.portfolio-ajax-title h2', 'portfolio-navigation a:hover', '.portfolio-meta li span'),
				
			),
			array(
				'type'      	=> 'color',
				'id'  			=> 'front_page_portfolio_module_modal_content_color',
				'title'     	=> __( 'Portfolio Modal Content Color', 'beonepage' ),
				'default'		=> $front_page_portfolio_module_modal_content_color,
				'output'  		=> array ('.portfolio-ajax-single'),
			),
			array(
				'type'      	=> 'color',
				'id'  			=> 'front_page_portfolio_module_modal_sp_color',
				'title'     	=> __( 'Portfolio Modal Separator Color', 'beonepage' ),
				'default'   	=> $front_page_portfolio_module_modal_sp_color,
				'output'    	=> array(
					'border-bottom-color'  => '.portfolio-ajax-title',
					'border-top-color'  => '.portfolio-single-content .line',
				),
			),
			array(
				'type'      	=> 'color',
				'id'  			=> 'front_page_portfolio_module_modal_bg_color',
				'title'    		=> __( 'Portfolio Modal Background Color', 'beonepage' ),
				'default'   	=> $front_page_portfolio_module_modal_bg_color,
				'output'  		=> array ('background-color' => '.portfolio-ajax-single'),
			)
		),
	) );

	/* Portfolio Module Section end */
	
	/* Vertical Promotion Module start*/
	Redux::setSection( $opt_name, array(
		'title'            => __( 'Vertical Promotion Module', 'beonepage' ),
		'id'               => 'site_front_page_ver_promo_module',
		'desc'             => '',
		'subsection'       => true,
		'icon'             => 'el el-resize-vertical',
		'fields'           => array(
			array(
				'type'        	=> 'text',
				'id'    	  	=> 'front_page_ver_promo_module_id',
				'title'       	=> __( 'Module ID', 'beonepage' ),
				'description' 	=> __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
				'default'     	=> $front_page_ver_promo_module_id,
			),
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Heading, Content, Button Text and <br>Button URL' , 'beonepage' ),
				'content'     	=> __( 'All this things are moved into home page meta boxes itself.<br> Please edit your homepage and check.', 'beonepage' ),
				'full_width' => false	
			),
			/* array(
				'type'       	=> 'textarea',
				'id'         	=> 'front_page_ver_promo_title',
				'title'      	=> __( 'Heading', 'beonepage' ),
				'desc'       	=> __( '' ),
				'default'    	=> $front_page_ver_promo_title,
			), */
			array(
				'type'        	=> 'select',
				'id'    		=> 'front_page_ver_promo_title_animation',
				'title'       	=> __( 'Heading Animation', 'beonepage' ),
				'default'     	=> $front_page_ver_promo_title_animation,
				'options'     	=> beonepage_animate()
			),
			/* array(
				'type'     		=> 'textarea',
				'id'  			=> 'front_page_ver_promo_content',
				'title'     	=> __( 'Content', 'beonepage' ),
				'default'   	=> $front_page_ver_promo_content,
			), */
			array(
				'type'        	=> 'select',
				'id'    		=> 'front_page_ver_promo_content_animation',
				'title'       	=> __( 'Content Animation', 'beonepage' ),
				'default'     	=> $front_page_ver_promo_content_animation,
				'options'     	=> beonepage_animate()
			),
			/*array(
			 	'type'      	=> 'textarea',
				'id'  			=> 'front_page_ver_promo_btn_text',
				'title'     	=> __( 'Button Text', 'beonepage' ),
				'default'   	=> $front_page_ver_promo_btn_text,
			),
			array(
				'type'      	=> 'text',
				'id'  			=> 'front_page_ver_promo_btn_url',
				'title'     	=> __( 'Button URL', 'beonepage' ),
				'default'   	=> $front_page_ver_promo_btn_url,
			), */
			array(
				'type'       	=> 'select',
				'id'    		=> 'front_page_ver_promo_btn_animation',
				'title'       	=> __( 'Button Animation', 'beonepage' ),
				'default'     	=> $front_page_ver_promo_btn_animation,
				'options'     	=> beonepage_animate()
			),
			array(
				'type'     		=> 'button_set',
				'id' 			=> 'front_page_ver_promo_btn_style',
				'title'    		=> __( 'Button Style', 'beonepage' ),
				'default'  		=> $front_page_ver_promo_btn_style,
				'options'  		=> array(
					'1' => __( 'Light', 'beonepage' ),
					'2' => __( 'Dark', 'beonepage' )
				)
			),
			array(
				'type'      	=> 'color',
				'id'  			=> 'front_page_ver_promo_color',
				'title'     	=> __( 'Font Color', 'beonepage' ),
				'default'   	=> $front_page_ver_promo_color,
				'output'    	=> array('.promo-box-ver-module' , '.promo-box-ver h2'),
			),
			array(
				'id'       		=> 'front_page_ver_promo_module_bg',
				'type'     		=> 'button_set',
				'title'    		=> __( 'Background', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'default'  		=> $front_page_ver_promo_module_bg,
				'options'  		=> array(
					'color'  	=> 'Color',
					'image' 	=> 'Image',
					'video' 	=> 'Video'
				)
			),
			array(
				'id'       		=> 'front_page_ver_promo_module_bg_color',
				'type'     		=> 'color',
				'title'    		=> __( 'Background Color', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'background-color'  => false,
				'required' 		=> array( 'front_page_ver_promo_module_bg', '=', 'color' ),
				'default'  		=> $front_page_ver_promo_module_bg_color,
				'output'   		=> array('background-color' => '.promo-box-ver-module' ),
			),
			array(
				'id'       		=> 'front_page_ver_promo_module_bg_img',
				'type'     		=> 'background',
				'title'    		=> __( 'Background Image', 'beonepage' ),
				'required' 		=> array( 'front_page_ver_promo_module_bg', '=', 'image' ),
				'default'  		=> $front_page_ver_promo_module_bg_img,
				'output'  		=> array ('.promo-box-ver-module.img-background'),
			),
			array(
				'id'       		=> 'front_page_ver_promo_module_bg_parallax',
				'type'     		=> 'checkbox',
				'title'    		=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'required' 		=> array( 'front_page_ver_promo_module_bg', '=', 'image' ),
				'default'  		=> $front_page_ver_promo_module_bg_parallax,
			),
			array(
				'id'       		=> 'front_page_ver_promo_module_bg_video',
				'type'     		=> 'text',
				'title'    		=> __( 'YouTube URL', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'required' 		=> array( 'front_page_ver_promo_module_bg', '=', 'video' ),
				'default'  		=>  $front_page_ver_promo_module_bg_video,
			),
			array(
				'type'     		=> 'info',
				'id' 			=> 'front_page_ver_promo_module_bg_notice',
				'default'  		=> $front_page_ver_promo_module_bg_notice,
				'required' 		=> array('front_page_ver_promo_module_bg','=','video')
			),
			array(
				'type'     		=> 'info',
				'id' 			=> 'front_page_ver_promo_module_notice',
				'default'  		=> $front_page_ver_promo_module_notice,
				'required' 		=> array('front_page_ver_promo_module_bg','=','video')
			),
		)
	) );
	/* Vertical Promotion Module end*/
	
	/*Horizontal Promotion Module start */
	Redux::setSection( $opt_name, array(
		'title'    		   => __( 'Horizontal Promotion Module', 'beonepage' ),
		'id'               => 'site_front_page_hor_promo_module',
		'desc'             => '',
		'subsection'       => true,
		'icon'             => 'el el-resize-horizontal',
		'fields'           => array(
			array(
				'type'       => 'text',
				'id'    	 => 'front_page_hor_promo_module_id',
				'title'      => __( 'Module ID', 'beonepage' ),
				'description'=> __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
				'default'    => $front_page_hor_promo_module_id,
			),
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Heading, Content, Button Text and <br> Button URL' , 'beonepage' ),
				'content'     	=> __( 'All this things are moved into home page meta boxes itself.<br> Please edit your homepage and check.', 'beonepage' ),
				'full_width' => false
			),
			/* array(
				'type'      => 'text',
				'id'  		=> 'front_page_hor_promo_title',
				'title'     => __( 'Heading', 'beonepage' ),
				'desc'      => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
				'default'   => $front_page_hor_promo_title,
			), */
			array(
				'type'      => 'select',
				'id'   		=> 'front_page_hor_promo_title_animation',
				'title'     => __( 'Heading Animation', 'beonepage' ),
				'default'   => $front_page_hor_promo_title_animation,
				'options'   => beonepage_animate()
			),
			/* array(
				'type'      => 'text',
				'id'  		=> 'front_page_hor_promo_content',
				'title'     => __( 'Content', 'beonepage' ),
				'default'   => $front_page_hor_promo_content,
			), */
			array(
				'type'      => 'select',
				'id'    	=> 'front_page_hor_promo_content_animation',
				'title'     => __( 'Content Animation', 'beonepage' ),
				'default'   => $front_page_hor_promo_content_animation,
				'options'   => beonepage_animate()
			),
			/* array(
				'type'      => 'text',
				'id'  		=> 'front_page_hor_promo_btn_text',
				'title'     => __( 'Button Text', 'beonepage' ),
				'default'   => $front_page_hor_promo_btn_text,
			),
			array(
				'type'      => 'text',
				'id'  		=> 'front_page_hor_promo_btn_url',
				'title'     => __( 'Button URL', 'beonepage' ),
				'default'   => $front_page_hor_promo_btn_url,
			), */
			array(
				'type'      => 'select',
				'id'    	=> 'front_page_hor_promo_btn_animation',
				'title'     => __( 'Button Animation', 'beonepage' ),
				'default'   => $front_page_hor_promo_btn_animation,
				'options'   => beonepage_animate()
			),
			array(
				'type'     	=> 'button_set',
				'id' 		=> 'front_page_hor_promo_btn_style',
				'title'    	=> __( 'Button Style', 'beonepage' ),
				'default'  	=> $front_page_hor_promo_btn_style,
				'options'  	=> array(
					'1' => __( 'Light', 'beonepage' ),
					'2' => __( 'Dark', 'beonepage' )
				)
			),
			array(
				'type'      => 'color',
				'id'  		=> 'front_page_hor_promo_color',
				'title'     => __( 'Font Color', 'beonepage' ),
				'default'   => $front_page_hor_promo_color,
				'output'    => array('.promo-box-hor-module, .promo-box-ver h2'),
			),
			array(
				'type'      => 'button_set',
				'id'    	=> 'front_page_hor_promo_module_bg',
				'title'     => __( 'Background', 'beonepage' ),
				'default'   => $front_page_hor_promo_module_bg,
				'options'   => array(
					'color' =>'Color', 
					'image' => 'Image', 
				),
			),
			array(
				'id'  		=> 'front_page_hor_promo_module_bg_color',
				'type'      => 'color',
				'title'     => __( 'Background Color', 'beonepage' ),
				'default'   => $front_page_hor_promo_module_bg_color,
				'required' 	=> array( 'front_page_hor_promo_module_bg', '=', 'color' ),
				'output'    => array('background-color' => '.promo-box-hor-module'),
			), 
			array(
				'type'      => 'background',
				'id'     	=> 'front_page_hor_promo_module_bg_img',
				'title'     => __( 'Background Image', 'beonepage' ),
				'default'   => $front_page_hor_promo_module_bg_img,
				'required' 	=> array( 'front_page_hor_promo_module_bg', '=', 'image' ),
				'output'  	=> array ('.promo-box-hor-module'),
			), 
			array(
				'type'     	=> 'checkbox',
				'id' 		=> 'front_page_hor_promo_module_bg_parallax',
				'title'    	=> __( 'Enable Parallax Scrolling FOr Image?', 'beonepage' ),
				'default'  	=> '1',
				'required' 	=> array( 'front_page_hor_promo_module_bg', '=', 'image' ),
			),
			
		)
	) );
	/*Horizontal Promotion Module end */
	
	/* Blog Module Section Start */
	Redux::setSection( $opt_name, array(
		'title'    		   => __( 'Blog Module', 'beonepage' ),
		'id'               => 'site_front_page_blog_module',
		'desc'             => '',
		'subsection'       => true,
		'icon'             => 'el el-blogger',
		'fields'           => array(
			array(
				'type'        => 'text',
				'id'    	  => 'front_page_blog_module_id',
				'title'       => __( 'Module ID', 'beonepage' ),
				'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
				'section'     => 'site_front_page_blog_module',
				'default'     => $front_page_blog_module_id,
			),
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Title, Subtitle, Read More Button Text<br> and View More Button Text' , 'beonepage' ),
				'content'     	=> __( 'All this things are moved into home page meta boxes itself.<br> Please edit your homepage and check.', 'beonepage' ),
				'full_width' => false
			),
			/* array(
				'type'        => 'text',
				'id'  		  => 'front_page_blog_module_title',
				'title'       => __( 'Title', 'beonepage' ),
				'desc'        => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
				'default'     => $front_page_blog_module_title,
			),
			array(
				'type'        => 'textarea',
				'id'     	  => 'front_page_blog_module_subtitle',
				'title'       => __( 'Subtitle', 'beonepage' ),
				'default'     => $front_page_blog_module_subtitle,
			), */
			array(
				'type'        => 'select',
				'id'          => 'front_page_blog_module_animation',
				'title'       => __( 'Caption Animation', 'beonepage' ),
				'default'     => $front_page_blog_module_animation,
				'options'     => beonepage_animate()
			),
			array(
				'type'        => 'color',
				'id'          => 'front_page_blog_module_color',
				'title'       => __( 'Font Color', 'beonepage' ),
				'default'     => $front_page_blog_module_color,
				'output'      => array('.blog-module'),
			),
			array(
				'type'        => 'color',
				'id'          => 'front_page_blog_module_sp_color',
				'title'       => __( 'Separator Line Color', 'beonepage' ),
				'default'     => $front_page_blog_module_sp_color,
				'output'      => array ('.blog-module .separator span'),
			),
			array(
				'type'        => 'color',
				'id'          => 'front_page_blog_module_sp_i_color',
				'title'       => __( 'Separator Circle Color', 'beonepage' ),
				'default'     => $front_page_blog_module_sp_i_color,
				'output'      => array('.blog-module .separator i'),
			),
			array(
				'id'          => 'front_page_blog_module_bg',
				'type'        => 'button_set',
				'title'       => __( 'Background', 'beonepage' ),
				'subtitle'    => '',
				'desc'        => '',
				'default'     => $front_page_blog_module_bg,
				'options'     => array(
					'color'  	=> 'Color',
					'image' 	=> 'Image',
					'video' 	=> 'Video'
				)
			),
			array(
				'id'         => 'front_page_blog_module_bg_color',
				'type'       => 'color',
				'title'      => __( 'Background Color', 'beonepage' ),
				'subtitle'   => '',
				'desc'       => '',
				'required'   => array( 'front_page_blog_module_bg', '=', 'color' ),
				'default'    => $front_page_blog_module_bg_color,
				'output'     => array('background-color' => '.blog-module' ),
			),
			array(
				'id'         => 'front_page_blog_module_bg_img',
				'type'       => 'background',
				'title'      => __( 'Background Image', 'beonepage' ),
				'required'   => array( 'front_page_blog_module_bg', '=', 'image' ),
				'default'    => $front_page_blog_module_bg_img,
				'output'     => array ('.blog-module.img-background'),
			),
			array(
				'id'         => 'front_page_blog_module_bg_parallax',
				'type'       => 'checkbox',
				'title'      => __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'subtitle'   => '',
				'desc'       => '',
				'required'   => array( 'front_page_blog_module_bg', '=', 'image' ),
				'default'    => $front_page_blog_module_bg_parallax,
			),
			array(
				'id'         => 'front_page_blog_module_bg_video',
				'type'       => 'text',
				'title'      => __( 'YouTube URL', 'beonepage' ),
				'subtitle'   => '',
				'desc'       => '',
				'required'   => array( 'front_page_blog_module_bg', '=', 'video' ),
				'default'    =>  $front_page_blog_module_bg_video,
			),
			array(
				'type'       => 'info',
				'id'         => 'front_page_blog_module_bg_notice',
				'default'    => $front_page_blog_module_bg_notice,
				'required'   => array('front_page_blog_module_bg','=','video')
			),
			array(
				'type'       => 'info',
				'id'         => 'front_page_blog_module_notice',
				'default'    => $front_page_blog_module_notice,
				'required'   => array('front_page_blog_module_bg','=','video')
			),	
			array(
				'type'       => 'color',
				'id'  		 => 'front_page_blog_module_pd_color',
				'title'      => __( 'Post Date Font Color', 'beonepage' ),
				'default'    => $front_page_blog_module_pd_color,
				'output'     => array('.blog-item .entry-publish-date span'),
			),
			array(
				'id'  		 => 'front_page_blog_module_pd_bg_color',
				'type'       => 'color_rgba',
				'title'      => __( 'Post Date Background Color', 'beonepage' ),
				'default'    => $front_page_blog_module_pd_bg_color,
				'output'     => array('background-color' => '.blog-item .entry-publish-date'),
			), 
			/* array(
				'type'       => 'text',
				'id'  		 => 'front_page_blog_module_read_more',
				'title'      => __( 'Read More Button Text', 'beonepage' ),
				'default'    => $front_page_blog_module_read_more,
			), */
			array(
				'type'       => 'color',
				'id'  		 => 'front_page_blog_module_rm_color',
				'title'      => __( 'Read More Font Color', 'beonepage' ),
				'default'    => $front_page_blog_module_rm_color,
				'output'     => array('.blog-item .read-more'),
			),
			 array(
				'type'       => 'color_rgba',
				'id'  		 => 'front_page_blog_module_rm_bg_color',
				'title'      => __( 'Read More Background Color', 'beonepage' ),
				'default'    => $front_page_blog_module_rm_bg_color,
				'output'     => array('background-color' => '.blog-item .read-more'),
			), 
			/* array(
				'type'       => 'text',
				'id'  		 => 'front_page_blog_module_view_more',
				'title'      => __( 'View More Button Text', 'beonepage' ),
				'default'    => $front_page_blog_module_view_more,
			), */
			array(
				'type'       => 'color',
				'id'  		 => 'front_page_blog_module_vw_color',
				'title'      => __( 'View More Font Color', 'beonepage' ),
				'default'    => $front_page_blog_module_vw_color,
				'output'     => array('.see-more-wrap .sm-container'),
			),
			array(
				'type'       => 'color',
				'id'  		 => 'front_page_blog_module_vw_icon_color',
				'title'      => __( 'View More Icon Color', 'beonepage' ),
				'default'    => $front_page_blog_module_vw_icon_color,
				'output'     => array('.see-more-wrap .sm-icon'),
			),
			array(
				'type'       => 'color',
				'id'  		 => 'front_page_blog_module_vw_bg_color',
				'title'      => __( 'View More Background Color', 'beonepage' ),
				'default'    => $front_page_blog_module_vw_bg_color,
				'output'     => array('background-color'=>'.see-more-wrap'),
			),
		)
	));
	/* Blog Module Section End */
	/* Contact Module Section Start */
	Redux::setSection( $opt_name, array(
		'title'    		   => __( 'Contact Module', 'beonepage' ),
		'id'               => 'site_front_page_contact_module',
		'desc'             => '',
		'subsection'       => true,
		'icon'             => 'el el-phone',
		'fields'           => array(
			array(
				'type'        => 'text',
				'id'    	  => 'front_page_contact_module_id',
				'title'       => __( 'Module ID', 'beonepage' ),
				'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
				'default'     => $front_page_contact_module_id,
			),
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Title, Subtitle and Send <br>Button Text', 'beonepage' ),
				'content'     	=> __( 'All this things are moved into home page meta boxes itself.<br> Please edit your homepage and check.', 'beonepage' ),
				'full_width' => false
			),
		/* 	array(
				'type'        => 'text',
				'id'          => 'front_page_contact_module_title',
				'title'       => __( 'Title', 'beonepage' ),
				'desc'        => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
				'section'     => 'site_front_page_contact_module',
				'default'     => $front_page_contact_module_title,
			),
			array(
				'type'        => 'textarea',
				'id'  		  => 'front_page_contact_module_subtitle',
				'title'       => __( 'Subtitle', 'beonepage' ),
				'default'     => $front_page_contact_module_subtitle,
			), */
			array(
				'type'        => 'select',
				'id'    	  => 'front_page_contact_module_animation',
				'title'       => __( 'Caption Animation', 'beonepage' ),
				'default'     => $front_page_contact_module_animation,
				'options'     => beonepage_animate(),
			),
			array(
				'type'        => 'color',
				'id'          => 'front_page_contact_module_color',
				'title'       => __( 'Font Color', 'beonepage' ),
				'default'     => $front_page_contact_module_color,
				'output'      => array('.contact-module'),
			),
			array(
				'type'        => 'color',
				'id'          => 'front_page_contact_module_sp_color',
				'title'       => __( 'Separator Line Color', 'beonepage' ),
				'default'     => $front_page_contact_module_sp_color,
				'output'      => array('.contact-module .separator span')
			),
			array(
				'type'        => 'color',
				'id'          => 'front_page_contact_module_sp_i_color',
				'title'       => __( 'Separator Circle Color', 'beonepage' ),
				'default'     => $front_page_contact_module_sp_i_color,
				'output'      => array( '.contact-module .separator i'),
			),
			array(
				'id'          => 'front_page_contact_module_bg',
				'type'        => 'button_set',
				'title'       => __( 'Background', 'beonepage' ),
				'subtitle'    => '',
				'desc'        => '',
				'default'     => $front_page_contact_module_bg,
				'options'     => array(
					'color'  	=> 'Color',
					'image' 	=> 'Image',
					'video' 	=> 'Video'
				)
			),
			array(
				'id'          => 'front_page_contact_module_bg_color',
				'type'        => 'color',
				'title'       => __( 'Background Color', 'beonepage' ),
				'subtitle'    => '',
				'desc'        => '',
				'background-color' => false,
				'required' 	  => array( 'front_page_contact_module_bg', '=', 'color' ),
				'default'     => $front_page_contact_module_bg_color,
				'output'      => array('background-color' => '.contact-module, #gmap .circle-left, #gmap .circle-right' ),
			),
			
			array(
				'id'       	  => 'front_page_contact_module_bg_img',
				'type'        => 'background',
				'title'       => __( 'Background Image', 'beonepage' ),
				'required'    => array( 'front_page_contact_module_bg', '=', 'image' ),
				'default'     => $front_page_contact_module_bg_img,
				'output'      => array ('.contact-module.img-background'),
			),
			array(
				'id'          => 'front_page_contact_module_bg_parallax',
				'type'        => 'checkbox',
				'title'       => __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'subtitle'    => '',
				'desc'        => '',
				'required'    => array( 'front_page_contact_module_bg', '=', 'image' ),
				'default'     => $front_page_contact_module_bg_parallax,
			),
			array(
				'id'          => 'front_page_contact_module_bg_video',
				'type'        => 'text',
				'title'       => __( 'YouTube URL', 'beonepage' ),
				'subtitle'    => '',
				'desc'        => '',
				'required'    => array( 'front_page_contact_module_bg', '=', 'video' ),
				'default'     =>  $front_page_contact_module_bg_video,
			),
			array(
				'type'        => 'info',
				'id'          => 'front_page_contact_module_bg_notice',
				'default'     => $front_page_contact_module_bg_notice,
				'required'    => array('front_page_contact_module_bg','=','video')
			),
			array(
				'type'        => 'info',
				'id'          => 'front_page_contact_module_notice',
				'default'     => $front_page_contact_module_notice,
				'required'    => array('front_page_contact_module_bg','=','video')
			),
			array(
				'type'        => 'select',
				'id'    	  => 'front_page_contact_module_cf_animation',
				'title'       => __( 'Contact Form Animation', 'beonepage' ),
				'default'     => $front_page_contact_module_cf_animation,
				'options'     => beonepage_animate()
			),
			/* array(
				'type'        => 'text',
				'id' 		  => 'front_page_contact_module_send',
				'title'       => __( 'Send Button Text', 'beonepage' ),
				'default'     => $front_page_contact_module_send,
			), */
			array(
				'type'     	  => 'checkbox',
				'id' 		  => 'front_page_contact_module_enable_privacy',
				'title'   	  => __( 'Enable Privacy Checkbox?', 'beonepage' ),
				'default' 	  => $front_page_contact_module_enable_privacy,
			),
			array(
				'type'        => 'select',
				'id'    	  => 'front_page_contact_module_cf_privacy_page',
				'title'       => __( 'Select Privacy Page', 'beonepage' ),
				'default'     => $front_page_contact_module_cf_privacy_page,
				'options'     => beonepage_page_list(),
				'required'    => array( 'front_page_contact_module_enable_privacy', '=', 1 ),
			),
			array(
				'type'        => 'button_set',
				'id'          => 'front_page_contact_module_btn_style',
				'title'       => __( 'Button Style', 'beonepage' ),
				'default'     => $front_page_contact_module_btn_style,
				'options'     => array(
					'1' => __( 'Light', 'beonepage' ),
					'2' => __( 'Dark', 'beonepage' )
				)
			),
			array(
				'type'       => 'checkbox',
				'id'         => 'front_page_contact_module_gmap',
				'title'      => __( 'Enable Google Maps?', 'beonepage' ),
				'default'    => $front_page_contact_module_gmap,
			),
			array(
				'type'       => 'text',
				'id'  		 => 'front_page_contact_module_gmap_lat',
				'title'      => __( 'Latitude', 'beonepage' ),
				'default'    => $front_page_contact_module_gmap_lat,
				'required'   => array( 'front_page_contact_module_gmap', '=', 1 ),
			),
			array(
				'type'       => 'text',
				'id'         => 'front_page_contact_module_gmap_lng',
				'title'      => __( 'Longitude', 'beonepage' ),
				'default'    => $front_page_contact_module_gmap_lng,
				'required'   => array( 'front_page_contact_module_gmap', '=', 1 ),
			),	
			array(
				'type'       => 'info',
				'id'         => 'front_page_contact_module_gmap_notice',
				'default'    => $front_page_contact_module_gmap_notice,
				'required'   => array( 'front_page_contact_module_gmap', '=', 1 ),
			),
			array(
				'type'       => 'text',
				'id'  		 => 'front_page_contact_module_gmap_api_key',
				'title'      => __( 'Google Maps API key', 'beonepage' ),
				'default'    => $front_page_contact_module_gmap_api_key,
				'required'   => array( 'front_page_contact_module_gmap', '=', 1 ),
			),
			array(
				'type'       => 'info',
				'id' 		 => 'front_page_contact_module_gmap_api_link',
				'default'    => $front_page_contact_module_gmap_api_link,
				'required'   => array( 'front_page_contact_module_gmap', '=', 1 ),
			),
			array(
				'type'       => 'info',
				'id' 		 => 'front_page_contact_module_notice',
				'default'  	 => $front_page_contact_module_notice,
			),
			array(
				'type' 		 => 'text',
				'id' 		 => 'front_page_contact_module_email',
				'title'		 => __( 'Contact form Receiver Email', 'beonepage' ),
				'description'=> __( 'This is a custom email input.', 'beonepage' ),
				'default'  	 => $front_page_contact_module_email,
			),
		)
	) );
	/* Contact Module Section End */
	/* Process Module Section Start */
	Redux::setSection( $opt_name, array(
		'title'    		   => __( 'Process Module Section', 'beonepage' ),
		'id'               => 'site_front_page_process_module',
		'desc'             => '',
		'subsection'       => true,
		'icon'             => 'el el-cogs',
		'fields'           => array(
			array(
				'type'        => 'text',
				'id'    	  => 'front_page_process_module_id',
				'title'       => __( 'Module ID', 'beonepage' ),
				'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
				'default'     => $front_page_process_module_id,
			),
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Title and Subtitle', 'beonepage' ),
				'content'     	=> __( 'All this things are moved into home page meta boxes itself.<br> Please edit your homepage and check.', 'beonepage' ),
				'full_width' => false	
			),
		/* 	array(
				'type'        => 'text',
				'id'  		  => 'front_page_process_module_title',
				'title'       => __( 'Title', 'beonepage' ),
				'desc'        => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
				'default'     => $front_page_process_module_title,
			),
			array(
				'type'        => 'textarea',
				'id'          => 'front_page_process_module_subtitle',
				'title'       => __( 'Subtitle', 'beonepage' ),
				'default'     => $front_page_process_module_subtitle,
			), */
			array(
				'type'        => 'select',
				'title'       => 'front_page_process_module_animation',
				'id'          => __( 'Caption Animation', 'beonepage' ),
				'default'     => $front_page_process_module_animation,
				'options'     => beonepage_animate()
			),
			array(
				'type'        => 'color',
				'id'  		  => 'front_page_process_module_color',
				'title'       => __( 'Font Color', 'beonepage' ),
				'default'     => $front_page_process_module_color,
				'output'      => array(
					'background-color' => '.line-process-wrapper .owl-dot span',
					'color'       => '.process-module',
				),
			),
			array(
				'type'        => 'color',
				'id'  		  => 'front_page_process_module_sp_color',
				'title'       => __( 'Separator Line Color', 'beonepage' ),
				'default'     => $front_page_process_module_sp_color,
				'output'      => array ('.process-module .separator span'),
			),
			array(
				'type'        => 'color',
				']id'         => 'front_page_process_module_sp_i_color',
				'title'       => __( 'Separator Circle Color', 'beonepage' ),
				'default'     => $front_page_process_module_sp_i_color,
				'output'      => array ('.process-module .separator i'),
			),
			array(
				'type'        => 'color',
				'id'  		  => 'front_page_process_module_label_color',
				'title'       => __( 'Process Label Color', 'beonepage' ),
				'default'     => $front_page_process_module_label_color,
				'output'  	  => array (
					'color' 		   => '.process-label',
					'background-color' => '.line-process-container'
				),
			),
			array(
				'type'        => 'color',
				'id'  		  => 'front_page_process_module_active_color',
				'title'       => __( 'Active Process Color', 'beonepage' ),
				'default'     => $front_page_process_module_active_color,
				'output'      => array(
					'background-color' => '.line-process, .line-process-wrapper .owl-dot span:after',
					'color' => '.process-label .icon-clone, .process-label span:before',
				),
			),
			array(
				'id'          => 'front_page_process_module_bg',
				'type'        => 'button_set',
				'title'       => __( 'Background', 'beonepage' ),
				'subtitle'    => '',
				'desc'        => '',
				'default'     => $front_page_process_module_bg,
				'options'     => array(
					'color'  	=> 'Color',
					'image' 	=> 'Image',
					'video' 	=> 'Video'
				)
			),
			array(
				'id'         => 'front_page_process_module_bg_color',
				'type'       => 'color',
				'title'      => __( 'Background Color', 'beonepage' ),
				'required'   => array( 'front_page_process_module_bg', '=', 'color' ),
				'default'    => $front_page_process_module_bg_color,
				'output'     => array('background-color' => '.process-module,.process-modules, .line-process-wrapper .owl-dot.active span' ),
			),
			array(
				'id'         => 'front_page_process_module_bg_img',
				'type'       => 'background',
				'title'      => __( 'Background Image', 'beonepage' ),
				'required'   => array( 'front_page_process_module_bg', '=', 'image' ),
				'default'    => $front_page_process_module_bg_img,
				'output'     => array ('.process-module.img-background'),
			),
			array(
				'id'         => 'front_page_process_module_bg_parallax',
				'type'       => 'checkbox',
				'title'      => __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'subtitle'   => '',
				'desc'       => '',
				'required'   => array( 'front_page_process_module_bg', '=', 'image' ),
				'default'    => $front_page_process_module_bg_parallax,
			),
			array(
				'id'         => 'front_page_process_module_bg_video',
				'type'       => 'text',
				'title'      => __( 'YouTube URL', 'beonepage' ),
				'subtitle'   => '',
				'desc'       => '',
				'required'   => array( 'front_page_process_module_bg', '=', 'video' ),
				'default'    =>  $front_page_process_module_bg_video,
			),
			array(
				'type'       => 'info',
				'id' 		 => 'front_page_process_module_bg_notice',
				'default'    => $front_page_process_module_bg_notice,
				'required'   => array('front_page_process_module_bg','=','video')
			),
			array(
				'type'       => 'info',
				'id'         => 'front_page_process_module_notice',
				'default'    => $front_page_process_module_notice,
				'required'   => array('front_page_process_module_bg','=','video')
			),
		)
	) );
	
	/* Process Module Section End */
	/* Team Module Section Start */
	Redux::setSection( $opt_name, array(
		'title'   		   => __( 'Team Module', 'beonepage' ),
		'id'               => 'site_front_page_team_module',
		'subsection'       => true,
		'icon'             => 'el el-group',
		'fields'           => array(
			array(
				'type'        => 'text',
				'id'    	  => 'front_page_team_module_id',
				'title'       => __( 'Module ID', 'beonepage' ),
				'description' => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
			),
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Title and Subtitle', 'beonepage' ),
				'content'     	=> __( 'All this things are moved into home page meta boxes itself.<br> Please edit your homepage and check.', 'beonepage' ),
				'full_width' => false	
			),
			/* array(
				'type'        => 'text',
				'id'          => 'front_page_team_module_title',
				'title'       => __( 'Title', 'beonepage' ),
				'desc'        => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
				'default'     => $front_page_team_module_title,
			),
			array(
				'type'        => 'textarea',
				'id'          => 'front_page_team_module_subtitle',
				'title'       => __( 'Subtitle', 'beonepage' ),
				'default'     => $front_page_team_module_subtitle,
			), */
			array(
				'type'        => 'select',
				'id'          => 'front_page_team_module_animation',
				'title'       => __( 'Caption Animation', 'beonepage' ),
				'default'     => $front_page_team_module_animation,
				'options'     => beonepage_animate()
			),
			array(
				'type'        => 'color',
				'id'          => 'front_page_team_module_color',
				'title'       => __( 'Font Color', 'beonepage' ),
				'default'     => $front_page_team_module_color,
				'output'      => array('.team-module'),

			),
			array(
				'type'     	  => 'color',
				'id'          => 'front_page_team_module_sp_color',
				'title'       => __( 'Separator Line & Dots Color', 'beonepage' ),
				'default'	  => $front_page_team_module_sp_color,
				'output'      => array(
					'background-color' => '.team-module .owl-dot span, .team-module .owl-dot:after',
					'color' => '.team-module .separator span'
				),
			),
			array(
				'type'        => 'color',
				'id'          => 'front_page_team_module_sp_i_color',
				'title'       => __( 'Separator Circle & Active Dot Color', 'beonepage' ),
				'default'     => $front_page_team_module_sp_i_color,
				'output'      => array(
					'background-color' => '.team-module .owl-dot.active:after',
					'color' => '.team-module .separator i, .team-member .member-title'
				),
			),
			array(
				'type'        => 'color',
				'id'          => 'front_page_team_module_bio_color',
				'title'       => __( 'Font Color for Bio', 'beonepage' ),
				'default'     => $front_page_team_module_bio_color,
				'output'      => array('.team-member .member-profile'),
			),
			array(
				'type'        => 'color',
				'id'          => 'front_page_team_module_bio_bg_color',
				'title'       => __( 'Background Color for Bio', 'beonepage' ),
				'default'     => $front_page_team_module_bio_bg_color,
				'output'      => array('background-color' => ('.team-member .member-profile'),)	
			),	
			array(
				'id'         => 'front_page_team_module_bg',
				'type'       => 'button_set',
				'title'      => __( 'Background', 'beonepage' ),
				'subtitle'   => '',
				'desc'       => '',
				'default'    => $front_page_team_module_bg,
				'options'    => array(
					'color'  	=> 'Color',
					'image' 	=> 'Image',
					'video' 	=> 'Video'
				)
			),
			array(
				'id'         => 'front_page_team_module_bg_color',
				'type'       => 'color',
				'title'      => __( 'Background Color', 'beonepage' ),
				'subtitle'   => '',
				'desc'       => '',
				'background-color' => false,
				'required'   => array( 'front_page_team_module_bg', '=', 'color' ),
				'default'    => $front_page_team_module_bg_color,
				'output'     => array(
					'background-color' => '.team-module',
					'background-color' => '.team-member .member-card',
				),
			),
			
			array(
				'id'         => 'front_page_team_module_bg_img',
				'type'       => 'background',
				'title'      => __( 'Background Image', 'beonepage' ),
				'required'   => array( 'front_page_team_module_bg', '=', 'image' ),
				'default'    => $front_page_team_module_bg_img,
				'output'     => array ('.team-module.img-background'),
			),
			array(
				'id'         => 'front_page_team_module_bg_parallax',
				'type'       => 'checkbox',
				'title'      => __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'subtitle'   => '',
				'desc'       => '',
				'required'   => array( 'front_page_team_module_bg', '=', 'image' ),
				'default'    => $front_page_team_module_bg_parallax,
			),
			array(
				'id'         => 'front_page_team_module_bg_video',
				'type'       => 'text',
				'title'      => __( 'YouTube URL', 'beonepage' ),
				'subtitle'   => '',
				'desc'       => '',
				'required'   => array( 'front_page_team_module_bg', '=', 'video' ),
				'default'    =>  $front_page_team_module_bg_video,
			),
			array(
				'type'       => 'info',
				'id'         => 'front_page_team_module_bg_notice',
				'default'    => $front_page_team_module_bg_notice,
				'required'   => array('front_page_team_module_bg','=','video')
			),
			array(
				'type'       => 'info',
				'id'         => 'front_page_team_module_notice',
				'default'    => $front_page_team_module_notice,
				'required'   => array('front_page_team_module_bg','=','video')
			),
		)	
	) );
	/* Team Module Section End */
	
	/* Skill Bar Module Section Start */
	Redux::setSection( $opt_name, array(
		'title'    		   => __( 'Skill Bar Module', 'beonepage' ),
		'id'               => 'site_front_page_skill_bar_module',
		'desc'             => '',
		'subsection'       => true,
		'icon'             => 'el el-wrench',
		'fields'           => array(
			array(
				'type'         => 'text',
				'id'           => 'front_page_skill_bar_module_id',
				'title'        => __( 'Module ID', 'beonepage' ),
				'description'  => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
				'default'      => $front_page_skill_bar_module_id,
			),
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Title, Subtitle, Content Box and Skill Bar', 'beonepage' ),
				'content'     	=> __( 'All this things are moved into home page meta boxes itself.<br> Please edit your homepage and check.', 'beonepage' ),
				'full_width' => false
			),
		/* 	array(
				'type'         => 'text',
				'id'  		   => 'front_page_skill_bar_module_title',
				'title'        => __( 'Title', 'beonepage' ),
				'desc'         => __( 'If you want to color the word, just wrap it with \"span\" tag.', 'beonepage' ),
				'default'      => $front_page_skill_bar_module_title,
			),
			array(
				'type'         => 'textarea',
				'id'           => 'front_page_skill_bar_module_subtitle',
				'title'        => __( 'Subtitle', 'beonepage' ),
				'default'      => $front_page_skill_bar_module_subtitle,
			), */
			array(
				'type'         => 'select',
				'id'           => 'front_page_skill_bar_module_animation',
				'title'        => __( 'Caption Animation', 'beonepage' ),
				'default'      => $front_page_skill_bar_module_animation,
				'options'      => beonepage_animate()
			),
			array(
				'type'         => 'color',
				'id'  		   => 'front_page_skill_bar_module_color',
				'title'        => __( 'Font Color', 'beonepage' ),
				'default'      => $front_page_skill_bar_module_color,
				'output'       => array('.skill-bar-module'),
			),
			array(
				'type'         => 'color',
				'id'  		   => 'front_page_skill_bar_module_sp_color',
				'title'        => __( 'Separator Line & Progress Bar Color', 'beonepage' ),
				'default'      => $front_page_skill_bar_module_sp_color,
				'output'       => array(
					'background-color' => '.skill-bar .bar-line',
					'color' => '.skill-bar-module .separator span'
				),
			),
			array(
				'type'         => 'color',
				'id'           => 'front_page_skill_bar_module_sp_i_color',
				'title'        => __( 'Separator Circle & Active Bar Color', 'beonepage' ),
				'default'      => $front_page_skill_bar_module_sp_i_color,
				'output'       => array(
					'background-color' => '.skill-bar .line-active',
					'color'  => '.skill-bar-module .separator i'
				),
			),
			array(
				'type'         => 'color',
				'id'           => 'front_page_skill_bar_module_pct',
				'title'        => __( 'Percentage Background Color', 'beonepage' ),
				'default'      => $front_page_skill_bar_module_pct,
				'output'       => array('background-color' => '.skill-bar .line-active span'),
			),
			array(
				'id'           => 'front_page_skill_bar_module_bg',
				'type'         => 'button_set',
				'title'        => __( 'Background', 'beonepage' ),
				'subtitle'     => '',
				'desc'         => '',
				'default'      => $front_page_skill_bar_module_bg,
				'options'      => array(
					'color'  	=> 'Color',
					'image' 	=> 'Image',
					'video' 	=> 'Video'
				)
			),
			array(
				'id'       	  => 'front_page_skill_bar_module_bg_color',
				'type'        => 'color',
				'title'       => __( 'Background Color', 'beonepage' ),
				'subtitle'    => '',
				'desc'        => '',
				'background-color'=> false,
				'required'    => array( 'front_page_skill_bar_module_bg', '=', 'color' ),
				'default'     => $front_page_skill_bar_module_bg_color,
				'output'      => array('background-color' => '.skill-bar-module' ),
			),
			array(
				'id'          => 'front_page_skill_bar_module_bg_img',
				'type'        => 'background',
				'title'       => __( 'Background Image', 'beonepage' ),
				'required'    => array( 'front_page_skill_bar_module_bg', '=', 'image' ),
				'default'     => $front_page_skill_bar_module_bg_img,
				'output'      => array ('.skill-bar-module.img-background'),
			),
			array(
				'id'          => 'front_page_skill_bar_module_bg_parallax',
				'type'        => 'checkbox',
				'title'       => __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'subtitle'    => '',
				'desc'        => '',
				'required'    => array( 'front_page_skill_bar_module_bg', '=', 'image' ),
				'default'     => $front_page_skill_bar_module_bg_parallax,
			),
			array(
				'id'          => 'front_page_skill_bar_module_bg_video',
				'type'        => 'text',
				'title'       => __( 'YouTube URL', 'beonepage' ),
				'subtitle'    => '',
				'desc'        => '',
				'required'    => array( 'front_page_skill_bar_module_bg', '=', 'video' ),
				'default'     =>  $front_page_skill_bar_module_bg_video,
			),
			array(
				'type'     	  => 'info',
				'id'          => 'front_page_skill_bar_module_bg_notice',
				'default'     => $front_page_skill_bar_module_bg_notice,
				'required'    => array('front_page_skill_bar_module_bg','=','video')
			),
			array(
				'type'        => 'info',
				'id'   		  => 'front_page_skill_bar_module_notice',
				'default'     => $front_page_skill_bar_module_notice,
				'required'    => array('front_page_skill_bar_module_bg','=','video')
			),
			/* array(
				'type'        => 'editor',
				'id'    	  => 'front_page_skill_bar_module_text',
				'title'       => __( 'Content Box', 'beonepage' ),
				'default'     => $front_page_skill_bar_module_text,
			), */
			array(
				'type'     	  => 'select',
				'id' 		  => 'front_page_skill_bar_module_text_animation',
				'title'       => __( 'Content Box Animation', 'beonepage' ),
				'default'     => $front_page_skill_bar_module_text_animation,
				'options'     => beonepage_animate()
			),
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Skill Bar', 'beonepage' ),
				'content'     	=> __( 'All this things are moved into home page meta boxes itself.<br> Please edit your homepage and check.', 'beonepage' ),
				'full_width' => false	
			),
			
			/* array(
			'id'      		  => 'front_page_skill_bar_module_skill_bar',
			'type'    		  => 'slides',
			'title'   		  => __( 'Skill Bar', 'beonepage' ),
			'placeholder'	  => array(
				'title'       => __('skill bar label', 'beonepage'),
				'url'         => __('Skill Bar Percentage (e.g. 80%)', 'beonepage'),
			),
			'show'      	  => array( 'description' => false,'title' => true,'url' => true ),
			'default' 		  => $front_page_skill_bar_module_skill_bar,
		   ), */
		)
	) );
	
	/* Skill Bar Module Section End */
	
	/* Testimonial Module Section Start */
	Redux::setSection( $opt_name, array(
		'title'            => __( 'Testimonial Module', 'beonepage' ),
		'id'               => 'site_front_page_testimonial_module',
		'customizer_width' => '400px',
		'icon'             => 'el el-quote-right',
		'subsection'       => true,
		'fields'           => array(
			array(
                'id'      	  => 'front_page_testimonial_module_id',
				'type'    	  => 'text',
				'title'       => __( 'Module ID', 'beonepage' ),
				'subtitle'    => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
				'desc'        => __( '', 'beonepage' ),
				'default'     => $front_page_testimonial_module_id,
			),
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Title and Subtitle', 'beonepage' ),
				'content'     	=> __( 'All this things are moved into home page meta boxes itself.<br> Please edit your homepage and check.', 'beonepage' ),
				'full_width' => false	
			),
			/* array(
                'id'          => 'front_page_testimonial_module_title',
				'type'        => 'text',
				'title'       => __( 'Title', 'beonepage' ),
				'desc'        => __( '', 'beonepage' ),
				'default'     => $front_page_testimonial_module_title,
			),
			array(
                'id'          => 'front_page_testimonial_module_subtitle',
				'type'        => 'textarea',
				'title'       => __( 'Subtitle', 'beonepage' ),
				'desc'        => __( '', 'beonepage' ),
				'default'     => $front_page_testimonial_module_subtitle,
			), */
			array(
                'id'          => 'front_page_testimonial_module_animation',
				'type'        => 'select',
				'title'       => __( 'Caption Animation', 'beonepage' ),
				'desc'        => __( '', 'beonepage' ),
				'options'     =>  beonepage_animate(),
				'default'     => $front_page_testimonial_module_animation,
			),
			array(
                'id'          => 'front_page_testimonial_module_color',
				'type'        => 'color',
				'title'       => __( 'Font Color', 'beonepage' ),
				'default'     => $front_page_testimonial_module_color,
				'output'      => array('.testimonial-module, .testimonial-name span'),
			),
			array(
                'id'          => 'front_page_testimonial_module_sp_color',
				'type'        => 'color',
				'title'       => __( 'Separator Line & Dots Color', 'beonepage' ),
				'default'     => $front_page_testimonial_module_sp_color,
				'output'      => array(
					'color' => '.testimonial-module .separator span',
					'background-color' =>'.testimonial-module .owl-dot span, .testimonial-module .owl-dot:after'
				),
			),
			array(
                'id'         => 'front_page_testimonial_module_sp_i_color',
				'type'       => 'color',
				'title'      => __( 'Separator Circle & Active Dot Color', 'beonepage' ),
				'default'    => $front_page_testimonial_module_sp_i_color,
				'output'     =>
					array('background-color' => '.testimonial-module .owl-dot.active:after',
					'color' => '.testimonial-module .separator i, .testimonial-member .member-title, .testimonial-box 	blockquote:before, .testimonial-box .testimonial-name',
				),
			),
			array(
				'id'        => 'front_page_testimonial_module_box',
				'type'      => 'color_rgba',
				'title'     => __('Testimonial Box Background Color', 'beonepage' ),
				'subtitle'  => '',
				'desc'      => '',
				'default'   => $front_page_testimonial_module_box,
				'output'    => array('background-color' => '.testimonial-box blockquote' ),				
				),
			array(
				'id'        => 'front_page_testimonial_module_bg',
				'type'      => 'button_set',
				'title'     => __( 'Background', 'beonepage' ),
				'subtitle'  => '',
				'desc'      => '',
				'default'   => $front_page_testimonial_module_bg,
				'options'   => array(
					'color'  	=> 'Color',
					'image' 	=> 'Image',
					'video' 	=> 'Video'
				)
			),
			array(
				'id'        => 'front_page_testimonial_module_bg_color',
				'type'      => 'color',
				'title'     => __( 'Background Color', 'beonepage' ),
				'subtitle'  => '',
				'desc'      => '',
				'background-color' => false,
				'required'  => array( 'front_page_testimonial_module_bg', '=', 'color' ),
				'default'   => $front_page_testimonial_module_bg_color,
				'output'    => array('background-color' => '.testimonial-module' ),
			),
			array(
				'id'        => 'front_page_testimonial_module_bg_img',
				'type'      => 'background',
				'title'     => __( 'Background Image', 'beonepage' ),
				'required'  => array( 'front_page_testimonial_module_bg', '=', 'image' ),
				'default'   => $front_page_testimonial_module_bg_img,
				'output'    => array ('.testimonial-module.img-background'),
			),
			array(
				'id'        => 'front_page_testimonial_module_bg_parallax',
				'type'      => 'checkbox',
				'title'     => __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'subtitle'  => '',
				'desc'      => '',
				'required'  => array( 'front_page_testimonial_module_bg', '=', 'image' ),
				'default'   => $front_page_testimonial_module_bg_parallax,
			),
			array(
				'id'        => 'front_page_testimonial_module_bg_video',
				'type'      => 'text',
				'title'     => __( 'YouTube URL', 'beonepage' ),
				'subtitle'  => '',
				'desc'      => '',
				'required'  => array( 'front_page_testimonial_module_bg', '=', 'video' ),
				'default'   =>  $front_page_testimonial_module_bg_video,
			),
			array(
				'type'      => 'info',
				'id' 		=> 'front_page_testimonial_module_bg_notice',
				'default'   => $front_page_testimonial_module_bg_notice,
				'required'  => array('front_page_testimonial_module_bg','=','video')
			),
			array(
				'type'      => 'info',
				'id' 		=> 'front_page_testimonial_module_notice',
				'default'   => $front_page_testimonial_module_notice,
				'required'  => array('front_page_testimonial_module_bg','=','video')
			),
		),
	));
	/* Testimonial Module Section End */
	/* Client Module Section Start */
	Redux::setSection( $opt_name, array(
		'title'            => __( 'Client Module', 'beonepage' ),
		'id'               => 'site_front_page_client_module',
		'customizer_width' => '400px',
		'icon'             => 'el el-star-empty',
		'subsection'       => true,
		'fields'           => array(
			array(
                'id'         => 'front_page_client_module_id',
				'type'       => 'text',
				'title'      => __( 'Module ID', 'beonepage' ),
				'subtitle'   => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
				'desc'       => __( '', 'beonepage' ),
				'default'    => $front_page_client_module_id,
			),
			array(
				'id'         => 'front_page_client_module_bg',
				'type'       => 'button_set',
				'title'      => __( 'Background', 'beonepage' ),
				'default'    => $front_page_client_module_bg,
				'options'    => array(
					'color'  	=> 'Color',
					'image' 	=> 'Image',
				)
			),
			array(
				'id'         => 'front_page_client_module_bg_color',
				'type'       => 'color',
				'title'      => __( 'Background Color', 'beonepage' ),
				'required'   => array( 'front_page_client_module_bg', '=', 'color' ),
				'output'     => array('background-color' => '.client-module'),
				'default'    => $front_page_client_module_bg_color,
			),
			array(
				'id'         => 'front_page_client_module_bg_img',
				'type'       => 'background',
				'title'      => __( 'Background Image', 'beonepage' ),
				'required'   => array( 'front_page_client_module_bg', '=', 'image' ),
				'default'    => $front_page_client_module_bg_img,
				'output'     => array('.client-module'),
			),
			array(
				'id'         => 'front_page_client_module_bg_parallax',
				'type'       => 'checkbox',
				'title'      => __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'subtitle'   => '',
				'desc'       => '',
				'required'   => array( 'front_page_client_module_bg', '=', 'image' ),
				'default'    => '',
			),
		),
    ));

	/* Client Module Section End */
	
	/* Fun Fact Module Section Start */
	Redux::setSection( $opt_name, array(
		'title'            => __( 'Fun Fact Module', 'beonepage' ),
		'id'               => 'site_front_page_fun_fact_module',
		'customizer_width' => '400px',
		'icon'             => 'el el-friendfeed',
		'subsection'       => true,
		'fields'           => array(
			array(
				'id'         => 'front_page_fun_fact_module_layout',
				'type'       => 'switch',
				'title'      => __( 'Layout', 'beonepage' ),
				'subtitle'   => __( 'Choose the layout for the container.', 'beonepage' ),
				'default'    => $front_page_fun_fact_module_layout,
				'on'  	     => 'Fixed-width',
                'off'  	     => 'Full-width',	
			),
			array(
				'id'         => 'front_page_fun_fact_module_id',
				'type'       => 'text',
				'title'      => __( 'Module ID', 'beonepage' ),
				'subtitle'   => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
				'default'    => $front_page_fun_fact_module_id,
			),
			array(
				'id'         => 'front_page_fun_fact_module_color',
				'type'       => 'color',
				'title'      => __( 'Font Color', 'beonepage' ),
				'default'    => $front_page_fun_fact_module_color,
				'output'     => array('.fun-fact-module'),
			),
			array(
				'id'         => 'front_page_fun_fact_module_label',
				'type'       => 'color',
				'title'      => __( 'Label Color', 'beonepage' ),
				'default'    => $front_page_fun_fact_module_label,
				'output'     => array('.fun-fact-module .fact-text'),
			), 
			array(
				'id'         => 'front_page_fun_fact_module_bg',
				'type'       => 'button_set',
				'title'      => __( 'Background', 'beonepage' ),
				'subtitle'   => '',
				'default'    => $front_page_fun_fact_module_bg,
				'options'    => array(
					'color'  	=> 'Color',
					'image' 	=> 'Image',
				)
			),
			array(
				'id'         => 'front_page_fun_fact_module_bg_color',
				'type'       => 'color',
				'title'      => __( 'Background Color', 'beonepage' ),
				'required'   => array( 'front_page_fun_fact_module_bg', '=', 'color' ),
				'default'    => $front_page_fun_fact_module_bg_color,
				'output'     => array('background-color' => '.fun-fact-module'),
			),
			array(
				'id'         => 'front_page_fun_fact_module_bg_img',
				'type'       => 'background',
				'title'      => __( 'Background Image', 'beonepage' ),
				'required'   => array( 'front_page_fun_fact_module_bg', '=', 'image' ),
				'default'    => $front_page_fun_fact_module_bg_img,
				'output'     => array('.fun-fact-module'),
			),
			 array(
				'id'         => 'front_page_fun_fact_module_bg_parallax',
				'type'       => 'checkbox',
				'title'      => __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'required'   => array( 'front_page_fun_fact_module_bg', '=', 'image' ),
				'default'    => $front_page_fun_fact_module_bg_parallax,
			),
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Fun Fact', 'beonepage' ),
				'content'     	=> __( 'All this things are moved into home page meta boxes itself.<br> Please edit your homepage and check.', 'beonepage' ),
				'full_width' => false	
			),
		/*	array(
				'id'         => 'front_page_fun_fact_module_fact',
				'type'       => 'slides',
				'title'      => __( 'Fun Fact', 'beonepage' ),
				'placeholder' => array(
					'title'       => __('Fact Label', 'beonepage'),
					'url'         => __('Fact Number', 'beonepage'),
				),
				'show'        => array( 'description' => false,'title' => true,'url' => true ),
				'default'  => $front_page_fun_fact_module_fact
			 ),*/
		),
    ));
	
	/*Pricing Table Module Section start */
	Redux::setSection( $opt_name, array(
		'title'            => __( 'Pricing Table Module', 'beonepage' ),
		'id'               => 'site_front_page_pricing_table_module',
		'customizer_width' => '400px',
		'icon'             => 'el el-list-alt',
		'subsection'       => true,
		'fields'           => array(
			array(
				'id'         => 'front_page_pricing_table_module_id',
				'type'       => 'text',
				'title'      => __( 'Module ID', 'beonepage' ),
				'subtitle'   => __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
				'desc'       => __( '', 'beonepage' ),
				'default'    => $front_page_pricing_table_module_id,
			),
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Title and Subtitle', 'beonepage' ),
				'content'     	=> __( 'All this things are moved into home page meta boxes itself.<br> Please edit your homepage and check.', 'beonepage' ),
				'full_width' => false
			),
			/* array(
				'id'         => 'front_page_pricing_table_module_title',
				'type'       => 'text',
				'title'      => __( 'Title', 'beonepage' ),
				'desc'       => __( '', 'beonepage' ),
				'default'    => $front_page_pricing_table_module_title,
			),
			array(
				'id'         => 'front_page_pricing_table_module_subtitle',
				'type'       => 'textarea',
				'title'      => __( 'Subtitle', 'beonepage' ),
				'desc'       => __( '', 'beonepage' ),
				'default'    => $front_page_pricing_table_module_subtitle,
			), */
			array(
				'id'         => 'front_page_pricing_table_module_animation',
				'type'       => 'select',
				'title'      => __( 'Caption Animation', 'beonepage' ),
				'desc'       => __( '', 'beonepage' ),
				'options'    =>  beonepage_animate(),
				'default'    => $front_page_pricing_table_module_animation,
			),
			array(
				'id'         => 'front_page_pricing_table_module_color',
				'type'       => 'color',
				'title'      => __( 'Font Color', 'beonepage' ),
				'desc'       => __( '', 'beonepage' ),
				'default'    => $front_page_pricing_table_module_color,
				'output'     => array('.pricing-table-module'),
			),
			array(
				'id'        => 'front_page_pricing_table_module_sp_color',
				'type'      => 'color',
				'title'     => __( 'Separator Line Color', 'beonepage' ),
				'desc'      => __( '', 'beonepage' ),
				'default'   => $front_page_pricing_table_module_sp_color,
				'output'    => array ('.pricing-table-module .separator span'),
			),
		 	array(
				'id'        => 'front_page_pricing_table_module_sp_i_color',
				'type'      => 'color',
				'title'     => __( 'Separator Circle & Featured Table Color', 'beonepage' ),
				'desc'      => __( '', 'beonepage' ),
				'default'   => $front_page_pricing_table_module_sp_i_color,
				'output'    => array(
					'color' => '.pricing-table-module .separator i, .item-price',
					'background-color'  => '.pb-active-price, .pb-special-price, .pb-star',
					'border-color'  => '.item-price',
				)
			), 
			array(
				'id'        => 'front_page_pricing_table_module_box',
				'type'      => 'color',
				'title'     => __( 'Pricing Table Box  Font Color', 'beonepage' ),
				'desc'      => __( '', 'beonepage' ),
				'default'   => $front_page_pricing_table_module_box,
				'output'    => array(
					'color' => '.pricing-item,.pb-active-price,.pb-special-price',
					'border-bottom-color' => '.pb-star:after',
				),
			),
			array(
				'id'       => 'front_page_pricing_table_module_box_bg',
				'type'     => 'color',
				'title'    => __( 'Pricing Table Box Background Color', 'beonepage' ),
				'desc'     => __( '', 'beonepage' ),
				'default'  => $front_page_pricing_table_module_box_bg,
				'output'   => array('background-color' => '.pricing-item',),	
			),
			array(
				'id'       => 'front_page_pricing_table_module_btn_style',
				'type'     => 'switch',
				'title'    => __( 'Button Style', 'beonepage' ),
				'default'  => $front_page_pricing_table_module_btn_style,					
				'on'  	   => 'Light',					
				'off'      => 'Dark',
			),
			array(
				'id'       => 'front_page_pricing_table_module_bg',
				'type'     => 'button_set',
				'title'    => __( 'Background', 'beonepage' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => $front_page_pricing_table_module_bg,
				'options'  => array(
					'color'  	=> 'Color',
					'image' 	=> 'Image',
					'video' 	=> 'Video'
				)
			),
			array(
				'id'       => 'front_page_pricing_table_module_bg_color',
				'type'     => 'color',
				'title'    => __( 'Background Color', 'beonepage' ),
				'subtitle' => '',
				'desc'     => '',
				'background-color' => false,
				'required' => array( 'front_page_pricing_table_module_bg', '=', 'color' ),
				'default'  => $front_page_pricing_table_module_bg_color,
				'output'   => array('background-color' => '.pricing-table-module' ),
			),
			array(
				'id'       => 'front_page_pricing_table_module_bg_img',
				'type'     => 'background',
				'title'    => __( 'Background Image', 'beonepage' ),
				'required' => array( 'front_page_pricing_table_module_bg', '=', 'image' ),
				'default'  => $front_page_pricing_table_module_bg_img,
				'output'   => array ('.pricing-table-module.img-background'),
			),
			array(
				'id'       => 'front_page_pricing_table_module_bg_parallax',
				'type'     => 'checkbox',
				'title'    => __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'subtitle' => '',
				'desc'     => '',
				'required' => array( 'front_page_pricing_table_module_bg', '=', 'image' ),
				'default'  => $front_page_pricing_table_module_bg_parallax,
			),
			array(
				'id'       => 'front_page_pricing_table_module_bg_video',
				'type'     => 'text',
				'title'    => __( 'YouTube URL', 'beonepage' ),
				'subtitle' => '',
				'desc'     => '',
				'required' => array( 'front_page_pricing_table_module_bg', '=', 'video' ),
				'default'  =>  $front_page_pricing_table_module_bg_video,
			),
			array(
				'type'     => 'info',
				'id' 	   => 'front_page_pricing_table_module_bg_notice',
				'default'  => $front_page_pricing_table_module_bg_notice,
				'required' => array('front_page_pricing_table_module_bg','=','video')
			),
			array(
				'type'     => 'info',
				'id' 	   => 'front_page_pricing_table_module_notice',
				'default'  => $front_page_pricing_table_module_notice,
				'required' => array('front_page_pricing_table_module_bg','=','video')
			),	
		),
	));
	/*Pricing Table Module Section End */
		
	/*Twitter Module Section Start */
	Redux::setSection( $opt_name, array(
		'title'            => __( 'Twitter Module', 'beonepage' ),
		'id'               => 'site_front_page_twitter_module',
		'desc'             => __( '', 'beonepage' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-twitter',
		'subsection'       => true,
		'fields'           => array(
			array(
				'id'          	=> 'front_page_twitter_module_id',
				'type'        	=> 'text',
				'title'       	=> __( 'Module ID', 'beonepage' ),
				'subtitle' 	  	=> __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation', 'beonepage' ),
				'desc'        	=> __( '', 'beonepage' ),
				'default'    	 => $front_page_twitter_module_id,
			),
			array(
				'id'       		=> 'front_page_twitter_twitter_animation',
				'type'     		=> 'select',
				'title'    		=> __( 'Twitter Logo Animation', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_twitter_twitter_animation,
				'options'     	=>  beonepage_animate(),
			),
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Button Text and Button URL ', 'beonepage' ),
				'content'     	=> __( 'All this things are moved into home page meta boxes itself.<br> Please edit your homepage and check.', 'beonepage' ),
				'full_width' => false
			),
			array(
				'id'       		=> 'front_page_twitter_twitter_username',
				'type'     		=> 'text',
				'title'    		=> __( 'Twitter Username', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_twitter_twitter_username,	
			),
			array(
				'id'       		=> 'front_page_twitter_twitter_tck',
				'type'     		=> 'text',
				'title'    		=> __( 'Consumer Key', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_twitter_twitter_tck,		
			),
			array(
				'id'       		=> 'front_page_twitter_twitter_tcs',
				'type'     		=> 'text',
				'title'    		=> __( 'Consumer Secret', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_twitter_twitter_tcs,	
			),
			array(
				'id'       		=> 'front_page_twitter_twitter_tat',
				'type'     		=> 'text',
				'title'    		=> __( 'Access Tokent', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_twitter_twitter_tat,
			),
			array(
				'id'       		=> 'front_page_twitter_twitter_tats',
				'type'     		=> 'text',
				'title'    		=> __( 'Access Token Secret', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_twitter_twitter_tats,	
			),
			array(
				'id'       		=> 'front_page_contact_module_twitter_notice',
				'type'     		=> 'text',
				'title'   		=> __( '', 'beonepage' ),
				'desc' 			=> __( '<p><a href="' . esc_url( 'http://docs.betheme.me/article/32-getting-twitter-api-consumer-and-secret-keys' ) . '" target="_blank">' . __( 'How to get Twitter API Consumer and Secret Keys?', 'beonepage' ) . '</a></p>', 'beonepage' ),
				'subtitle'     	=> __( '', 'beonepage' ),
				'default'  		=> $front_page_contact_module_twitter_notice,
			),
		/*	array(
				'id'       		=> 'front_page_twitter_btn_text',
				'type'     		=> 'text',
				'title'    		=> __( 'Button Text', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_twitter_btn_text,
			),
			array(
				'id'       		=> 'front_page_twitter_btn_url',
				'type'     		=> 'text',
				'title'    		=> __( 'Button URL', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_twitter_btn_url,	
				),*/
			array(
				'id'       		=> 'front_page_twitter_btn_animation',
				'type'     		=> 'select',
				'title'    		=> __( 'Button Animation', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_twitter_btn_animation,
				'options'     	=>  beonepage_animate(),	
			),
			array(
				'id'       		=> 'front_page_twitter_btn_style',
				'type'     		=> 'switch',
				'title'    		=> __( 'Button Style', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_twitter_btn_style,
				'options'  		=> array(
					'on'  	   	=> 'Light',
					'off'  	   	=> 'Dark',
				)
			),
			array(
				'id'      		=> 'front_page_twitter_color',
				'type'     		=> 'color',
				'title'    		=> __( 'Tweet Color', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_twitter_color,
				'output'  		=>array(
					'background-color' => '.twitter-module .owl-dot span, .twitter-module .owl-dot:after',
					'color' => '.twitter-module',
				),
			),
			array(
				'id'       		=> 'front_page_twitter_link_color',
				'type'     		=> 'color',
				'title'    		=> __( 'Twitter Logo & Link Color', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_twitter_link_color,
				'output'  		=> array(
					'background-color' => '.twitter-module .owl-dot.active:after',
					'color' => '.twitter-module .twitter-icon, .twitter-module .tweet a',
				),
			),
			array(
				'id'       		=> 'front_page_twitter_module_bg',
				'type'     		=> 'button_set',
				'title'    		=> __( 'Background', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'default'  		=> $front_page_twitter_module_bg,
				'options'  		=> array(
					'color'  	=> 'Color',
					'image' 	=> 'Image',
					'video' 	=> 'Video'
				)
			),
			array(
				'id'       		=> 'front_page_twitter_module_bg_color',
				'type'     		=> 'color',
				'title'    		=> __( 'Background Color', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'background-color' => false,
				'required' 		=> array( 'front_page_twitter_module_bg', '=', 'color' ),
				'default'  		=> $front_page_twitter_module_bg_color,
				'output'   		=> array('background-color' => '.twitter-module' ),
			),
			array(
				'id'       		=> 'front_page_twitter_module_bg_img',
				'type'     		=> 'background',
				'title'    		=> __( 'Background Image', 'beonepage' ),
				'required' 		=> array( 'front_page_twitter_module_bg', '=', 'image' ),
				'default' 		=> $front_page_twitter_module_bg_img,
				'output'  		=> array ('.twitter-module.img-background'),
			),
			array(
				'id'      	 	=> 'front_page_twitter_module_bg_parallax',
				'type'     		=> 'checkbox',
				'title'    		=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'required' 		=> array( 'front_page_twitter_module_bg', '=', 'image' ),
				'default'  		=> $front_page_twitter_module_bg_parallax,
			),
			array(
				'id'       		=> 'front_page_twitter_module_bg_video',
				'type'     		=> 'text',
				'title'    		=> __( 'YouTube URL', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'required' 		=> array( 'front_page_twitter_module_bg', '=', 'video' ),
				'default'  		=>  $front_page_twitter_module_bg_video,
			),
			array(
				'type'     		=> 'info',
				'id' 			=> 'front_page_twitter_module_bg_notice',
				'default'  		=> $front_page_twitter_module_bg_notice,
				'required' 		=> array('front_page_twitter_module_bg','=','video')
			),
			array(
				'type'    		=> 'info',
				'id' 			=> 'front_page_twitter_module_notice',
				'default'  		=> $front_page_twitter_module_notice,
				'required' 		=> array('front_page_twitter_module_bg','=','video')
			),
		),
	));
	/* Twitter  Module Section End */
	
	/* MailChimp Subscribe  Module Section Start */
	Redux::setSection( $opt_name, array(
		'title'            => __( 'MailChimp Subscribe Module', 'beonepage' ),
		'id'               => 'site_front_page_subscribe_module',
		'desc'             => __( '', 'beonepage' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-bell',
		'subsection'       => true,
		'fields'           => array(
			array(
				'id'       		=> 'front_page_subscribe_module_id',
				'type'     		=> 'text',
				'title'    		=> __( 'Module ID', 'beonepage' ),
				'subtitle' 		=> __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_subscribe_module_id,	
			),
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Heading , Content and Button Text' , 'beonepage' ),
				'content'     	=> __( 'All this things are moved into home page meta boxes itself.<br> Please edit your homepage and check.', 'beonepage' ),
				'full_width' => false
			),
		/*  array(
				'id'       		=> 'front_page_subscribe_title',
				'type'     		=> 'text',
				'title'    		=> __( 'Heading ', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_subscribe_title,
			), */
			array(
				'id'       		=> 'front_page_subscribe_title_animation',
				'type'     		=> 'select',
				'title'    		=> __( 'Heading Animation', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'options'     	=>  beonepage_animate(),
				'default'  		=> $front_page_subscribe_title_animation,
			),
		/* 	array(
				'id'       		=> 'front_page_subscribe_content',
				'type'     		=> 'text',
				'title'    		=> __( 'Content', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_subscribe_content,
			), */
			array(
				'id'       		=> 'front_page_subscribe_content_animation',
				'type'     		=> 'select',
				'title'    		=> __( 'Content Animation', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_subscribe_content_animation,
				'options'     	=> beonepage_animate(),
			),
			array(
				'id'       		=> 'front_page_subscribe_mailchimp_api',
				'type'     		=> 'text',
				'title'    		=> __( 'MailChimp API Key', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_subscribe_mailchimp_api,
			),
			array(
				'id'       		=> 'front_page_subscribe_mailchimp_list',
				'type'     		=> 'text',
				'title'    		=> __( 'MailChimp List ID', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_subscribe_mailchimp_list,
			),
			array(
				'id'       		=> 'front_page_subscribe_mailchimp_api_notice',
				'type'     		=> 'text',
				'title'    		=> __( '', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '<p><a href="' . esc_url( 'http://docs.betheme.me/article/33-getting-mailchimp-api-key-and-list-id' ) . '" target="_blank">' . __( 'How to get MailChimp API Key and List ID?', 'beonepage' ) . '</a></p>', 'beonepage' ),
				'default'  		=> $front_page_subscribe_mailchimp_api_notice,
			),
		/* 	array(
				'id'       		=> 'front_page_subscribe_btn_text',
				'type'     		=> 'text',
				'title'    		=> __( 'Button Text', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_subscribe_btn_text,
			), */
			array(
				'id'       		=> 'front_page_subscribe_btn_animation',
				'type'     		=> 'select',
				'title'    		=> __( 'Button Animation', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_subscribe_btn_animation,
				'options'     	=> $theme_font_choices,
			),
			array(
				'id'       		=> 'front_page_subscribe_btn_color',
				'type'     		=> 'color',
				'title'    		=> __( 'Button Color', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_subscribe_btn_color,
				'output'  		=> array('background-color' => '.subscribe-module .input-group-btn' ),			
			),
			array(
				'id'       		=> 'front_page_subscribe_color',
				'type'     		=> 'color',
				'title'    		=> __( 'Font Color', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_subscribe_color,
				'output'   		=> array('.subscribe-module' ),
			),
			array(
				'id'       		=> 'front_page_subscribe_module_bg',
				'type'     		=> 'button_set',
				'title'    		=> __( 'Background', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'default'  		=> $front_page_subscribe_module_bg,
				'options'  		=> array(
					'color'  	=> 'Color',
					'image' 	=> 'Image',
				)
			),
			array(
				'id'       		=> 'front_page_subscribe_module_bg_color',
				'type'     		=> 'color',
				'title'    		=> __( 'Background Color', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'required'		=> array( 'front_page_subscribe_module_bg', '=', 'color' ),
				'default'  		=> $front_page_subscribe_module_bg_color,
				'output'   		=> array('background-color' => '.subscribe-module'),
			),
			array(
				'id'       		=> 'front_page_subscribe_module_bg_img',
				'type'     		=> 'background',
				'title'    		=> __( 'Background Image', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'default'  		=> $front_page_subscribe_module_bg_img ,
				'required' 		=> array( 'front_page_subscribe_module_bg', '=', 'image' ),
				'output'   		=> array('.subscribe-module')
			),
			array(
				'id'       		=> 'front_page_subscribe_module_bg_parallax',
				'type'     		=> 'checkbox',
				'title'    		=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'default'  		=> $front_page_subscribe_module_bg_parallax ,
				'required' 		=> array( 'front_page_subscribe_module_bg_img', '=', 'image' ),
			),	
		),
    ));
	/* MailChimp Subscribe Module Section End */
	
	/* Widget Module Section Start */
		Redux::setSection( $opt_name, array(
		'title'            => __( 'Widget Module', 'beonepage' ),
		'id'               => 'site_front_page_widget_module',
		'desc'             => __( '', 'beonepage' ),
		'customizer_width' => '400px',
		'icon'             => 'el  el-th',
		'subsection'       => true,
		'fields'           => array(
			array(
				'id'       		=> 'front_page_widget_module_layout',
				'type'     		=> 'switch',
				'title'    		=> __( 'Layout', 'beonepage' ),
				'subtitle' 		=> __( 'Choose the layout for the container', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_widget_module_layout,
				'on'  	   		=> 'Fixed-width',
				'off'  	   		=> 'Full-width',
			),
			array(
				'id'       		=> 'front_page_widget_module_id',
				'type'     		=> 'text',
				'title'    		=> __( 'Module ID', 'beonepage' ),
				'subtitle' 		=> __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_widget_module_id,
			),
			
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Title and Subtitle', 'beonepage' ),
				'content'     	=> __( 'All this things are moved into home page meta boxes itself.<br> Please edit your homepage and check.', 'beonepage' ),
				'full_width' => false
			),
		/*  array(
				'id'      		=> 'front_page_widget_module_title',
				'type'    		=> 'text',
				'title'    		=> __( 'Title', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_widget_module_title,
			),
			array(
				'id'       		=> 'front_page_widget_module_subtitle',
				'type'     		=> 'textarea',
				'title'    		=> __( 'Subtitle', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_widget_module_subtitle,
			), */
			array(
				'id'       		=> 'front_page_widget_module_animation',
				'type'     		=> 'select',
				'title'    		=> __( 'Caption Animation', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'options'     	=>  beonepage_animate(),
				'default'  		=> $front_page_widget_module_animation,
			),
			array(
				'id'       		=> 'front_page_widget_module_color',
				'type'     		=> 'color',
				'title'    		=> __( 'Font Color', 'beonepage' ),
				'default'  		=> $front_page_widget_module_color,	
				'output'    	=> array('.widget-module'),
			),
			array(
				'id'       		=> 'front_page_widget_module_sp_color',
				'type'     		=> 'color',
				'title'   		=> __( 'Separator Line Color', 'beonepage' ),
				'default'  		=> $front_page_widget_module_sp_color,
				'output' 		=> array ('.widget-module .separator span'),					
			),
			array(
				'id'       		=> 'front_page_widget_module_sp_i_color',
				'type'     		=> 'color',
				'title'    		=> __( 'Separator Circle Color', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_widget_module_sp_i_color,	
				'output'    	=> array('.widget-module .separator i'),
			),
			array(
				'id'       		=> 'front_page_widget_module_bg',
				'type'     		=> 'button_set',
				'title'    		=> __( 'Background', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'default'  		=> $front_page_widget_module_bg,
				'options'  		=> array(
					'color'  	=> 'Color',
					'image' 	=> 'Image',
					'video' 	=> 'Video'
				)
			),
			array(
				'id'       		=> 'front_page_widget_module_bg_color',
				'type'     		=> 'color',
				'title'    		=> __( 'Background Color', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'background-color' => false,
				'required' 		=> array( 'front_page_widget_module_bg', '=', 'color' ),
				'default'  		=> $front_page_widget_module_bg_color,
				'output'   		=> array('background-color' => '.widget-module' ),
			),
			array(
				'id'      		=> 'front_page_widget_module_bg_img',
				'type'    		=> 'background',
				'title'    		=> __( 'Background Image', 'beonepage' ),
				'required' 		=> array( 'front_page_widget_module_bg', '=', 'image' ),
				'default'  		=> $front_page_widget_module_bg_img,
				'output'  		=> array ('.widget-module.img-background'),
			),
			array(
				'id'       		=> 'front_page_widget_module_bg_parallax',
				'type'     		=> 'checkbox',
				'title'    		=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'required' 		=> array( 'front_page_widget_module_bg', '=', 'image' ),
				'default'  		=> $front_page_widget_module_bg_parallax,
			),
			array(
				'id'       		=> 'front_page_widget_module_bg_video',
				'type'     		=> 'text',
				'title'    		=> __( 'YouTube URL', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'required' 		=> array( 'front_page_widget_module_bg', '=', 'video' ),
				'default'  		=>  $front_page_widget_module_bg_video,
			),
			array(
				'type'     		=> 'info',
				'id' 			=> 'front_page_widget_module_bg_notice',
				'default'  		=> $front_page_widget_module_bg_notice,
				'required' 		=> array('front_page_widget_module_bg','=','video')
			),
			array(
				'type'     		=> 'info',
				'id' 			=> 'front_page_widget_module_notice',
				'default'  		=> $front_page_widget_module_notice,
				'required' 		=> array('front_page_widget_module_bg','=','video')
			),
			array(
				'id'       		=> 'front_page_widget_module_widget',
				'type'     		=> 'slides',
				'title'    		=> __( 'Widget Area', 'beonepage' ),
				'placeholder' 	=> array(
					'title'       => __('Widget Area Name', 'beonepage'),
					'url'         => __('Number of Widgets per Row', 'beonepage'),
				),
				'show'        	=> array( 'description' => false,'title' => true,'url' => true ),
				'default'  		=> $front_page_widget_module_widget
			),
		),
    ) );
	/* Widget  Module Section End */
	
	/* Custom Module Section End */
	
	Redux::setSection( $opt_name, array(
		'title'            => __( 'Custom Module', 'beonepage' ),
		'id'               => 'site_front_page_custom_module',
		'desc'             => __( '', 'beonepage' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-brush',
		'subsection'       => true,
		'fields'           => array(
			array(
				'id'       		=> 'front_page_custom_module_layout',
				'type'     		=> 'switch',
				'title'    		=> __( 'Layout', 'beonepage' ),
				'subtitle' 		=> __( 'Choose the layout for the container', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_custom_module_layout,
				'on'  	   		=> 'Fixed-width',
				'off'  	  		=> 'Full-width',
			),
			array(
				'id'       		=> 'front_page_custom_module_id',
				'type'     		=> 'text',
				'title'    		=> __( 'Module ID', 'beonepage' ),
				'subtitle' 		=> __( 'Set up a unique ID for the module, the ID will be used for page scrolling navigation.', 'beonepage' ),		
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_custom_module_id,
			),
			
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Title, Subtitle and Content Box', 'beonepage' ),
				'content'     	=> __( 'All this things are moved into home page meta boxes itself.<br> Please edit your   	homepage and check.', 'beonepage' ),
				'full_width' => false
			),
			
		 /* array(
				'id'       		=> 'front_page_custom_module_title',
				'type'     		=> 'text',
				'title'    		=> __( 'Title', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_custom_module_title,
			),
			array(
				'id'       		=> 'front_page_custom_module_subtitle',
				'type'     		=> 'textarea',
				'title'    		=> __( 'Subtitle', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_custom_module_subtitle,
			), */
			array(
				'id'       		=> 'front_page_custom_module_animation',
				'type'     		=> 'select',
				'title'    		=> __( 'Caption Animation', 'beonepage' ),
				'subtitle' 		=> __( '', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'options'     	=>  beonepage_animate(),
				'default'  		=> $front_page_custom_module_animation,
			),
			array(
				'id'       		=> 'front_page_custom_module_color',
				'type'     		=> 'color',
				'title'    		=> __( 'Font Color', 'beonepage' ),
				'default'  		=> $front_page_custom_module_color,	
				'output'    	=> array('.custom-module'),
			),
			array(
				'id'       		=> 'front_page_custom_module_sp_color',
				'type'     		=> 'color',
				'title'    		=> __( 'Separator Line Color', 'beonepage' ),
				'default'  		=> $front_page_custom_module_sp_color,
				'output'  		=> array ('.custom-module .separator span'),	
			),
			array(
				'id'       		=> 'front_page_custom_module_sp_i_color',
				'type'     		=> 'color',
				'title'    		=> __( 'Separator Circle Color', 'beonepage' ),
				'desc'     		=> __( '', 'beonepage' ),
				'default'  		=> $front_page_custom_module_sp_i_color,	
				'output'   		=> array('.custom-module .separator i'),
			),
			array(
				'id'       		=> 'front_page_custom_module_bg',
				'type'     		=> 'button_set',
				'title'    		=> __( 'Background', 'beonepage' ),
				'subtitle'		=> '',
				'desc'     		=> '',
				'default'  		=> $front_page_custom_module_bg,
				'options'  		=> array(
					'color'  	=> 'Color',
					'image' 	=> 'Image',
					'video' 	=> 'Video'
				)
			),
			array(
				'id'       		=> 'front_page_custom_module_bg_color',
				'type'     		=> 'color',
				'title'    		=> __( 'Background Color', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'background-color' => false,
				'required' 		=> array( 'front_page_custom_module_bg', '=', 'color' ),
				'default'  		=> $front_page_custom_module_bg_color,
				'output'   		=> array('background-color' => '.custom-module' ),
			),
			
			array(
				'id'       		=> 'front_page_custom_module_bg_img',
				'type'     		=> 'background',
				'title'    		=> __( 'Background Image', 'beonepage' ),
				'required' 		=> array( 'front_page_custom_module_bg', '=', 'image' ),
				'default'  		=> $front_page_custom_module_bg_img,
				'output'  		=> array ('.custom-module.img-background'),
			),
			array(
				'id'       		=> 'front_page_custom_module_bg_parallax',
				'type'     		=> 'checkbox',
				'title'    		=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> '',
				'required' 		=> array( 'front_page_custom_module_bg', '=', 'image' ),
				'default'  		=> $front_page_custom_module_bg_parallax,
			),
			array(
				'id'       		=> 'front_page_custom_module_bg_video',
				'type'     		=> 'text',
				'title'    		=> __( 'YouTube URL', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'    		=> '',
				'required' 		=> array( 'front_page_custom_module_bg', '=', 'video' ),
				'default'  		=>  $front_page_custom_module_bg_video,
			),
			array(
				'type'     		=> 'info',
				'id' 			=> 'front_page_custom_module_bg_notice',
				'default'  		=> $front_page_custom_module_bg_notice,
				'required' 		=> array('front_page_custom_module_bg','=','video')
			),
			array(
				'type'     		=> 'info',
				'id'		 	=> 'front_page_custom_module_notice',
				'default'  		=> $front_page_custom_module_notice,
				'required' 		=> array('front_page_custom_module_bg','=','video')
			),
			/*array(
				'type'     		=> 'editor',
				'title'    		=> __( 'Content Box', 'beonepage' ),
				'id' 			=> 'front_page_custom_module_content',
				'default'  		=> $front_page_custom_module_content,
			),*/
		),
	) );
	/* Custom Module Section End */
	
	/* Page option Panel Start */
	Redux::setSection( $opt_name, array(
        'title'            => __( 'Page Options', 'beonepage' ),
        'id'               => 'site_blog_page',
        'desc'             => __( 'Here you can customize your blog pages.', 'beonepage' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home',
		'fields'           => array(
			array(
                'id'       		=> 'blog_page_header_bg',
				'type'    		=> 'background',
                'title'   		=> __( '', 'beonepage' ),
				'default'     	=> $blog_page_header_bg,
				'output'    	=> array('.page-header'),
			),
			array(
                'id'       		=> 'blog_page_header_color',
				'type'    		=> 'color',
                'title'    		=> __( 'Header Font Color', 'beonepage' ),
				'default'     	=> $blog_page_header_color,
				'output'   		=> array( '.page-header',)
			),
			array(
				'id'       		=> 'blog_page_bg_color',
				'type'     		=> 'color',
				'title'    		=> __( 'Body Background Color', 'beonepage' ),
				'default'     	=> $blog_page_bg_color,
				'output'    	=> array(
					'background-color'=>'body, .woocommerce li.product .woocommerce-tabs ul.tabs li.active, .woocommerce ul.products li.product .woocommerce-tabs ul.tabs li.active',
				)
			),
			array(
                'id'      		=> 'blog_page_accent_color',
				'type'     		=> 'color',
                'title'    		=> __( 'Accent Color', 'beonepage' ),
				'default'     	=> $blog_page_accent_color,
				'output'   		=> array(
					'background-color' 		=> 'ins, #contact-form-result span, #subscribe-form-result, .blog-list .post-date-day, .blog-list .btn-more, .posts-navigation ul li.active a, .widget .widget-title:after, .woocommerce span.onsale, #oc-product .owl-dot.active:after',
					'border-top-color'		=> '.blog-list .entry-content, .woocommerce .woocommerce-info, .woocommerce .woocommerce-message',
					'color' 				=> 'h1 span, h2 span, h3 span, h4 span, h5 span, h6 span, .bcrumbs .active, article a, .woocommerce li.product p.price,.woocommerce ul.products li.product p.price, .woocommerce ul.products li.product span.price, .woocommerce li.product span.price, .woocommerce li.product .stock, .woocommerce ul.products li.product .stock, .woocommerce .woocommerce-info:before, .woocommerce .woocommerce-message:before, .woocommerce a.remove, .woocommerce ul.product_list_widget ins, .product_meta span a',
					'border-color' 			=> '.posts-navigation ul li.active a, .posts-navigation ul li.active a:hover',
					'border-left-color'		=> 'blockquote',
					'border-bottom-color'	=> '.single-post .entry-image'
				),
			),
			array(
                'id'       		=> 'blog_page_text_color',
				'type'     		=> 'color',
                'title'    		=> __( 'Text Color', 'beonepage' ),
				'default'     	=> $blog_page_text_color,
				'output'    	=> array('body, .posts-navigation ul li a:hover, .posts-navigation ul li.active a'),
			),
			array(
                'id'       		=> 'blog_page_additional_color_1',
				'type'     		=> 'color',
                'title'    		=> __( 'Additional  Color', 'beonepage' ),
				'subtitle' 		=> __( 'This additional color defines the color of Read More and Post Date.', 'beonepage', 'beonepage' ),
				'default'     	=> $blog_page_additional_color_1,
				'output'      	=> array('.blog-list .post-date-day, .blog-list .btn-more',)
			),
			array(
                'id'       		=> 'blog_page_additional_color_2',
				'type'     		=> 'color',
                'title'    		=> __( 'Additional Color', 'beonepage' ),
				'subtitle' 		=> __( 'This additional color defines the color of Navigation and Post Meta for Widgets.', 'beonepage' ),
				'default'     	=> $blog_page_additional_color_2,
				'output'     	=> array('.posts-navigation ul li a, .widget:not(.woocommerce) ul li span'),
			),
			array(
                'id'       		=> 'blog_page_sp_color',
				'type'     		=> 'color',
                'title'    		=> __( 'Border & Separator Line Color', 'beonepage' ),
				'default'     	=> $blog_page_sp_color,
				'output'      	=> array('border-bottom-color' => '.single-post .entry-meta, .single-post .entry-footer, .search-list 	article, .blog-list article, .blog-list .post-date-month, .comment-list, .widget'),
			),
			array(
                'id'      		=> 'blog_page_button_style',
				'type'     		=> 'switch',
                'title'    		=> __( 'Button Style', 'beonepage' ),
				'default'     	=> $blog_page_button_style,
				'on'  	   		=> 'Light',					
                'off'      		=> 'Dark',
			),
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Read More Button Text', 'beonepage' ),
				'content'     	=> __( 'All this things are moved into general settings. ( settings --> general )', 'beonepage' ),
				'full_width' => false
			),
			/*array(
                'id'       		=> 'blog_page_read_more',
				'type'     		=> 'text',
                'title'    		=> __( 'Read More Button Text', 'beonepage' ),
				'default'     	=> $blog_page_read_more,
			),*/
		
		),
	));
	/* Page option Panel End */
	
	/* Site Footer Panel Start */
	Redux::setSection( $opt_name, array(
		'title'            => __( 'Site Footer', 'beonepage' ),
		'id'               => 'site_footer',
		'desc'             => 'Here you can customize the footer on your site.',
		'customizer_width' => '400px',
		'icon'             => 'el el-photo',
		'fields'           => array(
			array(
				'type'      	=> 'color',
				'id' 			=> 'footer_color',
				'title'     	=> __( 'Front Color', 'beonepage' ),
				'default'   	=> $footer_color,
				'output'  		=> array ('.site-footer'),
			),
			array(
				'type'      	=> 'color',
				'id'  			=> 'footer_bg_color',
				'title'     	=> __( 'Background Color', 'beonepage' ),
				'default'   	=> $footer_bg_color,
				'output'  		=> array ( 'background-color' => '.site-footer' ),
			),
			array(
				'id' 			=> 'footer_site_logo',
				'type'     		=> 'checkbox',
				'settings' 		=> 'footer_site_logo',
				'title'    		=> __( 'Show Site Logo?', 'beonepage' ),
				'default'  		=> $footer_site_logo,
			),
			array(
				'id'       		=> 'footer_site_title',
				'type'     		=> 'checkbox',
				'title'    		=> esc_html__( 'Show Site Title?', 'beonepage' ),
				'desc'     		=> '',
				'default'  		=> $footer_site_title,
			),
			array(
				'type'        	=> 'select',
				'id'    	  	=> 'footer_site_logo_animation',
				'title'       	=> __( 'Site Logo Animation', 'beonepage' ),
				'default'     	=> $footer_site_logo_animation,
				'options'     	=>  beonepage_animate(),
				'required' 		=> array( 'footer_site_logo', '=', 1 ),
			),
			array(
				'type'     		=> 'checkbox',
				'id'	   		=> 'footer_social_link',
				'title'    		=> __( 'Enable Social Links?', 'beonepage' ),
				'default'  		=> $footer_social_link,
				'priority' 		=> 50
			),
			array(
				'type'        	=> 'select',
				'id'    		=> 'footer_site_title_animation',
				'title'      	=> __( 'Site Title Animation', 'beonepage' ),
				'default'     	=> $footer_site_title_animation,
				'options'     	=>  beonepage_animate(),
			),
			array(
				'type'        	=> 'select',
				'id'    		=> 'footer_social_link_animation',
				'title'       	=> __( 'Social Links Animation', 'beonepage' ),
				'default'     	=> $footer_social_link_animation,
				'priority'    	=> 51,
				'options'     	=>  beonepage_animate(),
			),
			array(
				'type'      	=> 'color',
				'id'  			=> 'footer_social_link_bg_color',
				'title'     	=> __( 'Icon Background Color', 'beonepage' ),
				'default'   	=> $footer_social_link_bg_color,
				'output'  		=> array ( 'background-color' => '.social-link a' ),
			),
		/*	array(
				'id'       		=> 'footer_copyright',
				'type'     		=> 'editor',
				'title'    		=> __( 'Copyright Information', 'beonepage' ),
				'subtitle' 		=> '',
				'desc'     		=> __( 'Want to remove the theme byline? See section "Upgrade" for more information.', 'beonepage' ),
				'default'  		=> $footer_copyright,
				'args'    		=> array(
				'wpautop'       => true,
				'media_buttons' => true,
				'textarea_rows' => 5,
				'teeny'         => false,
				'quicktags'     => true,
				)
			),*/
			array(
				'type'     		=> 'raw',
				'title'    		=> __( 'Copyright Information ', 'beonepage' ),
				'content'     	=> __( 'All this things are moved into general settings. ( settings --> general )', 'beonepage' ),
				'full_width' => false
			),
		)
	));
	/* Site Footer Panel End */

	/* Multiple Page Panel Start */
	Redux::setSection( $opt_name, array(
		'title'            => __( 'Multi-Home Page Translation', 'beonepage' ),
		'id'               => 'multiple_page_field',
		'desc'             => 'Here you can select multiple page for translation.',
		'customizer_width' => '400px',
		'icon'             => 'el el-file-new',
		'fields'           => array(
			array(
				'type'      	=> 'checkbox',
				'id' 			=> 'multi_lang_check',
				'title'     	=> __( 'Use Multiple page Translation', 'beonepage' ),
				'default'   	=> '0'
			),
			array(
				'type'      	=> 'select',
				'id' 			=> 'multi_lang_page_select',
				'multi'    		=> true,
				'title'     	=> __( 'Select Translated Homepage', 'beonepage' ),
				'options'		=> $all_page_array,
				'required' 		=> array( 'multi_lang_check', '=', 1 ),
			),
		)
	));
	/* Multiple Page Panel Start */

	if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'beonepage' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
			print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'beonepage' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'beonepage' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }