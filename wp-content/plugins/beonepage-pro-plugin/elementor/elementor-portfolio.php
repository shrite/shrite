<?php
namespace Elementor;

use Elementor\Core\Schemes\Color;

if ( ! defined( 'ABSPATH' ) ) exit;
class Widget_My_Custom_Elementor_Portfolio extends Widget_Base {
	
	public function get_categories() {
		return [ 'beonepage-widgets' ];
	}
	public function get_name() {
		return 'elementor-portfolio';
	}
	public function get_title() {
		return __( 'BeOne Portfolio', 'beonepage' );
	}
	public function get_icon() {
		return 'fa fa-briefcase';
	}
	protected function _register_controls() {
		$this->add_control(
			'elementor_portfolio',
			[
				'label' => __( 'Portfolio Option', 'beonepage' ),
				'type' 	=> Controls_Manager::SECTION,
			]
		);
		// Title
		$beonepage_portfolio_module_title = beonepage_olddata_fetch_redux('front_page_portfolio_module_title', 'option');
		if(!empty($beonepage_portfolio_module_title)){
			$beonepage_portfolio_module_title = beonepage_olddata_fetch_redux('front_page_portfolio_module_title', 'option');
			$beonepage_portfolio_module_title = html_entity_decode($beonepage_portfolio_module_title);
		}else{
			$beonepage_portfolio_module_title = wp_kses("Our Latest Works",array('span' => array()));
		}
		$this->add_control(
			'section_title',
			[
				'label' 	=> __( "Title", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_portfolio_module_title,
				'title'		=> __( 'Enter Title', 'beonepage' ),
				'section' 	=> 'elementor_portfolio',
			]
		);		
		//Sub title
		$beonepage_portfolio_module_subtitle = beonepage_olddata_fetch_redux('front_page_portfolio_module_subtitle', 'option');
		if(!empty($beonepage_portfolio_module_subtitle)){
			$beonepage_portfolio_module_subtitle = beonepage_olddata_fetch_redux('front_page_portfolio_module_subtitle', 'option');
		}else{
			$beonepage_portfolio_module_subtitle = esc_attr("An eye for detail makes our works excellent");
		}
		$this->add_control(
			'section_sub_title',
			[
				'label' 	=> __( "Sub Title", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_portfolio_module_subtitle,
				'title' 	=> __( 'Enter Sub Title', 'beonepage' ),
				'section' 	=> 'elementor_portfolio',
			]			
		);
		//Caption Animation
		$beonepage_portfolio_module_animation = beonepage_olddata_fetch_redux('front_page_portfolio_module_animation', 'option');
		if(!empty($beonepage_portfolio_module_animation)){
			$beonepage_portfolio_module_animation = beonepage_olddata_fetch_redux('front_page_portfolio_module_animation', 'option');
		}else{
			$beonepage_portfolio_module_animation = esc_attr("ZoomIn");
		}
		$this->add_control(
			'section_caption_animation',
			[
				'label'   => __( 'Caption Animation', 'beonepage' ),
				'type'    => Controls_Manager::SELECT,
				'default' => $beonepage_portfolio_module_animation,
				'options' => beonepage_theme_animate(),
				'section' => 'elementor_portfolio',
			]         
		);
		//Font Color
		$beonepage_portfolio_module_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_color', 'option');
		if(!empty($beonepage_portfolio_module_color)){
			$beonepage_portfolio_module_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_color', 'option');
		}else{
			$beonepage_portfolio_module_color = esc_attr("#181a1c");
		}
		$this->add_control(
			'section_font_color',
			[
				'label' 	=> __( "Font Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_portfolio_module_color,
				'scheme' 	=> [
					'type' 		=> Color::get_type(),
					'value' 	=> Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .portfolio-module' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_portfolio',
			]			
		);
		//Separator Circle Color
		$beonepage_portfolio_module_sp_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_sp_color', 'option');
		if(!empty($beonepage_portfolio_module_sp_color)){
			$beonepage_portfolio_module_sp_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_sp_color', 'option');
		}else{
			$beonepage_portfolio_module_sp_color = esc_attr("#111");
		}
		$this->add_control(
			'section_separator_line_color',
			[
				'label' 	=> __( "Separator Line Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_portfolio_module_sp_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .portfolio-module .separator span:after , .portfolio-module .separator span:before ' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_portfolio',
			]			
		);
		//Separator Circle Color
		$beonepage_portfolio_module_sp_i_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_sp_i_color', 'option');
		if(!empty($beonepage_portfolio_module_sp_i_color)){
			$beonepage_portfolio_module_sp_i_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_sp_i_color', 'option');
		}else{
			$beonepage_portfolio_module_sp_i_color = esc_attr("#111");
		}
		$this->add_control(
			'section_separator_circle_color',
			[
				'label' 	=> __( "Separator Circle Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_portfolio_module_sp_i_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}}  .separator i' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_portfolio',
			]			
		);
		//Show all button hide setting
		$beonepage_portfolio_module_show_all_hide = beonepage_olddata_fetch_redux('front_page_portfolio_module_show_all_hide', 'option');
		if(!empty($beonepage_portfolio_module_show_all_hide)){
			$beonepage_portfolio_module_show_all_hide = beonepage_olddata_fetch_redux('front_page_portfolio_module_show_all_hide', 'option');
			$beonepage_portfolio_module_show_all_hide = html_entity_decode($beonepage_portfolio_module_show_all_hide);
			if($beonepage_portfolio_module_show_all_hide == 1){
				$beonepage_portfolio_module_show_all_hide_d = esc_attr("yes");
			}else{
				$beonepage_portfolio_module_show_all_hide_d = esc_attr("no");
			}  
		}else{
		  $beonepage_portfolio_module_show_all_hide_d = esc_attr("yes");
		}
		$this->add_control(
			'section_show_all_hide',
			[
				'label' 		=> __( 'Hide "Show All Button"', 'beonepage' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Hide', 'beonepage' ),
				'label_off' 	=> __( 'Show', 'beonepage' ),
				'return_value' 	=> 'yes',
				'section' 		=> 'elementor_portfolio',
			]
		);
		//Background setting                
		$class = '';
		$attribute = '';    
		$beonepage_portfolio_module_bg = beonepage_olddata_fetch_redux('front_page_portfolio_module_bg', 'option');
		if(!empty($beonepage_portfolio_module_bg)){
			$beonepage_portfolio_module_bg = beonepage_olddata_fetch_redux('front_page_portfolio_module_bg', 'option');
		}else{
			$beonepage_portfolio_module_bg = esc_attr("color");
		}       
		$this->add_control(
			'section_background',
			[
				'label' 	=> __( "Background", 'beonepage' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'options' 	=> [
					'color' => [
						'title' => __( 'Color', 'beonepage' ),
						'icon' 	=> 'eicon-paint-brush',
					],
					'image' => [
						'title' => __( 'Image', 'beonepage' ),
						'icon' 	=> 'eicon-slideshow',
					],
					'video' => [
						'title' => __( 'Video', 'beonepage' ),
						'icon' 	=> '    eicon-video-camera',
					]
				],
				'default' 	=> $beonepage_portfolio_module_bg,
				'toggle' 	=> true,
				'section' 	=> 'elementor_portfolio',
			]         
		);
		//Background Color
		$beonepage_portfolio_module_bg_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_bg_color', 'option');
		if(!empty($beonepage_portfolio_module_bg_color)){
			$beonepage_portfolio_module_bg_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_bg_color', 'option');
		}else{
			$beonepage_portfolio_module_bg_color = esc_attr("#ffcc00");
		}
		$this->add_control(
			'section_background_color',
			[
				'label' 	=> __( "Background Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_portfolio_module_bg_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .portfolio-module' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'section_background' => 'color',
				],
				'section' 	=> 'elementor_portfolio',
			]         
		);        
		//Background image 
		$beonepage_portfolio_module_bg_img = beonepage_olddata_fetch_redux('front_page_portfolio_module_bg_img', 'option');
		if(!empty($beonepage_portfolio_module_bg_img['background-image'])){
			$beonepage_portfolio_module_bg_img = beonepage_olddata_fetch_redux('front_page_portfolio_module_bg_img', 'option');
			$beonepage_portfolio_module_bg_img_url = $beonepage_portfolio_module_bg_img['background-image'];
		}else{
			$beonepage_portfolio_module_bg_img_url = \Elementor\Utils::get_placeholder_image_src();
		}
		$this->add_control(
			'section_background_image',
			[
				'label' => __( "Bakground Image", 'beonepage' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => esc_url($beonepage_portfolio_module_bg_img_url),
				],
				'condition' => [
					'section_background' => 'image',
				],
				'section' => 'elementor_portfolio',
			]         
		);
		// Background Repeat
		$beonepage_portfolio_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_portfolio_module_bg_img', 'option');
		if(!empty($beonepage_portfolio_module_bg_img_rp['background-repeat'])){
		  $beonepage_portfolio_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_portfolio_module_bg_img', 'option');
		  $beonepage_portfolio_module_bg_img_rp = $beonepage_portfolio_module_bg_img_rp['background-repeat'];
		}else{
		   $beonepage_portfolio_module_bg_img_rp = esc_attr("No Repeat");
		}
		$this->add_control(
			'section_background_image_rp',
			[
				'label' 	=> __( 'Background Repeat', 'beonepage' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> $beonepage_portfolio_module_bg_img_rp,
				'options' 	=> [
					'no-repeat' => __( 'No Repeat', 'beonepage' ),
					'repeat' 	=> __( 'Repeat All', 'beonepage' ),
					'repeat-x' 	=> __( 'Repeat Horizontally', 'beonepage' ),
					'repeat-y' 	=> __( 'Repeat Vertically', 'beonepage' ),
				],
				'section' 	=> 'elementor_portfolio',
				'condition'	=> [
					'section_background' => 'image',
				],
			]         
		);
		//Background Position
		$beonepage_portfolio_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_portfolio_module_bg_img', 'option');
		if(!empty($beonepage_portfolio_module_bg_img_bp['background-position'])){
		  $beonepage_portfolio_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_portfolio_module_bg_img', 'option');
		  $beonepage_portfolio_module_bg_img_bp = $beonepage_portfolio_module_bg_img_bp['background-position'];
		}else{
		   $beonepage_portfolio_module_bg_img_bp = esc_attr("Left Top");
		}
		$this->add_control(
			'section_background_image_bp',
			[
				'label' 	=> __( 'Background Position', 'beonepage' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> $beonepage_portfolio_module_bg_img_bp,
				'options' 	=> [
					'left top'  	=> __( 'Left Top', 'beonepage' ),
					'left center' 	=> __( 'Left Center', 'beonepage' ),
					'left bottom' 	=> __( 'Left Bottom', 'beonepage' ),
					'right top' 	=> __( 'Right Top', 'beonepage' ),
					'right center'  => __( 'Right Center', 'beonepage' ),
					'right bottom' 	=> __( 'Right Bottom', 'beonepage' ),
					'center top' 	=> __( 'Center Top', 'beonepage' ),
					'center center' => __( 'Center Center', 'beonepage' ),
					'center bottom' => __( 'Center Bottom', 'beonepage' ),
				],
				'section' 	=> 'elementor_portfolio',
				'condition' => [
					'section_background' => 'image',
				],
			]        
		);
		//Background Size
		$beonepage_portfolio_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_portfolio_module_bg_img', 'option');
		if(!empty($beonepage_portfolio_module_bg_img_bs['background-size'])){
		  $beonepage_portfolio_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_portfolio_module_bg_img', 'option');
		  $beonepage_portfolio_module_bg_img_bs = $beonepage_portfolio_module_bg_img_bs['background-size'];
		}else{
		  $beonepage_portfolio_module_bg_img_bs = esc_attr("auto");
		}
		$this->add_control(
			'section_background_image_bs',
			[
				'label' 	=> __( "Background Size", 'beonepage' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'options' 	=> [
					'cover' => [
						'title' => __( 'Cover', 'beonepage' ),
						'icon' 	=> 'fa fa-arrows',
					],
					'contain' 	=> [
						'title' => __( 'Contain', 'beonepage' ),
						'icon' 	=> 'fa fa-arrows-v',
					],
					'auto' 	=> [
						'title' => __( 'Auto', 'beonepage' ),
						'icon' => 'fa fa-asterisk',
					]
				],
				'default' 		=> $beonepage_portfolio_module_bg_img_bs,
				'toggle' 		=> true,
				'condition' 	=> [
					'section_background' => 'image',
				],
				'section' => 'elementor_portfolio',
			]         
		);
		//Background Attachment
		$beonepage_portfolio_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_portfolio_module_bg_img', 'option');
		if(!empty($beonepage_portfolio_module_bg_img_ath['background-attachment'])){
		  $beonepage_portfolio_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_portfolio_module_bg_img', 'option');
		  $beonepage_portfolio_module_bg_img_ath = $beonepage_portfolio_module_bg_img_ath['background-attachment'];
		}else{
		  $beonepage_portfolio_module_bg_img_ath = esc_attr("Scroll");
		}   
		$this->add_control(
			'section_background_image_ath',
			[
				'label' => __( "Background Attachment", 'beonepage' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'scroll' => [
						'title' => __( 'Scroll', 'beonepage' ),
						'icon' => 'fa fa-arrow-circle-right',
					],
					'fixed' => [
						'title' => __( 'Fixed', 'beonepage' ),
						'icon' => 'fa fa-arrows-alt',
					],
				],
				'default' => $beonepage_portfolio_module_bg_img_ath,
				'toggle' => true,
				'condition' => [
					'section_background' => 'image',
				],
				'section' => 'elementor_portfolio',
			]         
		);
		//Background video field
		$beonepage_portfolio_module_bg_video = beonepage_olddata_fetch_redux('front_page_portfolio_module_bg_video', 'option');
		if(!empty($beonepage_portfolio_module_bg_video)){
			$beonepage_portfolio_module_bg_video = beonepage_olddata_fetch_redux('front_portfolio_table_module_bg_video', 'option');
			$beonepage_portfolio_module_bg_video = html_entity_decode($beonepage_portfolio_module_bg_video);
		}else{
			$beonepage_portfolio_module_bg_video =  esc_attr("Video Url");
		}
		$this->add_control(
			'section_youtube_url',
			[
				'label' 	=> __( "YouTube URL", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_portfolio_module_bg_video,
				'condition' => [
					'section_background' => 'video',
				],
				'description' => __( 'IMPORTANT NOTE: The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so its better to define both Image and YouTube Video for best results.', 'beonepage' ),
				'section' 	=> 'elementor_portfolio',
			]        
		);     
		//Parallax seting
		$beonepage_portfolio_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_portfolio_module_bg_parallax', 'option');
		if(!empty($beonepage_portfolio_module_bg_parallax)){
			$beonepage_portfolio_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_portfolio_module_bg_parallax', 'option');
			$beonepage_portfolio_module_bg_parallax = html_entity_decode($beonepage_portfolio_module_bg_parallax);
			if($beonepage_portfolio_module_bg_parallax == 1){
				$beonepage_portfolio_module_bg_parallax_d = esc_attr("yes");
			}else{
				$beonepage_portfolio_module_bg_parallax_d = esc_attr("no");
			}  
		}else{
		  $beonepage_portfolio_module_bg_parallax_d = esc_attr("yes");
		}
		$this->add_control(
			'section_bg_parallax',
			[
				'label' 		=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Enable', 'beonepage' ),
				'label_off' 	=> __( 'Disable', 'beonepage' ),
				'return_value' 	=> 'yes',
				'default' 		=> $beonepage_portfolio_module_bg_parallax_d,
				'section' 		=> 'elementor_portfolio',
			]
		);
		 //Enable Portfolio Filter
		$beonepage_portfolio_module_filter = beonepage_olddata_fetch_redux('front_page_portfolio_module_filter', 'option');
		if(!empty($beonepage_portfolio_module_filter)){
			$beonepage_portfolio_module_filter = beonepage_olddata_fetch_redux('front_page_portfolio_module_filter', 'option');
			$beonepage_portfolio_module_filter = html_entity_decode($beonepage_portfolio_module_filter);
			if($beonepage_portfolio_module_filter == 1){
				$beonepage_portfolio_module_filter_d = esc_attr("yes");
			}else{
				$beonepage_portfolio_module_filter_d = esc_attr("no");
			}  
		}else{
		  $beonepage_portfolio_module_filter_d = esc_attr("yes");
		}
		$this->add_control(
			'section_enable_port_filter',
			[
				'label' 		=> __( 'Enable Portfolio Filter?', 'beonepage' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Enable', 'beonepage' ),
				'label_off' 	=> __( 'Disable', 'beonepage' ),
				'return_value' 	=> 'yes',
				'default' 		=> $beonepage_portfolio_module_filter_d,
				'section' 		=> 'elementor_portfolio',
			]
		);
		//Filter Animation
		$beonepage_portfolio_module_filter_animation = beonepage_olddata_fetch_redux('front_page_portfolio_module_filter_animation', 'option');
		if(!empty($beonepage_portfolio_module_filter_animation)){
			$beonepage_portfolio_module_filter_animation = beonepage_olddata_fetch_redux('front_page_portfolio_module_filter_animation', 'option');
		}else{
			$beonepage_portfolio_module_filter_animation = esc_attr("flipInX");
		}
		$this->add_control(
			'section_filter_animation',
			[
				'label'   => __( 'Filter Animation', 'beonepage' ),
				'type'    => Controls_Manager::SELECT,
				'default' => $beonepage_portfolio_module_filter_animation,
				'options' => beonepage_theme_animate(),
				'section' => 'elementor_portfolio',
			]
		);
		//Show All Button Text
		$beonepage_portfolio_module_all = beonepage_olddata_fetch_redux('front_page_portfolio_module_all', 'option');
		if(!empty($beonepage_portfolio_module_all)){
			$beonepage_portfolio_module_all = beonepage_olddata_fetch_redux('front_page_portfolio_module_all', 'option');
		}else{
			$beonepage_portfolio_module_all = esc_attr("Read More");
		}
		$this->add_control(
		'section_all_btn_text',
			[
				'label' 	=> __( "Show All Button Text", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_portfolio_module_all,
				'section' 	=> 'elementor_portfolio',
			]
		);
		//Filter Font Color
		$beonepage_portfolio_module_filter_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_filter_color', 'option');
		if(!empty($beonepage_portfolio_module_filter_color)){
			$beonepage_portfolio_module_filter_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_filter_color', 'option');
		}else{
			$beonepage_portfolio_module_filter_color = esc_attr("#333");
		}			
		$this->add_control(
			'section_filter_font_color',
			[
				'label' 	=> __( "Filter Font Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_portfolio_module_filter_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} #portfolio-filter a' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_portfolio',
			]
		);
		//Filter Background Color
		$beonepage_portfolio_module_filter_bg_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_filter_bg_color', 'option');
		if(!empty($beonepage_portfolio_module_filter_bg_color)){
			$beonepage_portfolio_module_filter_bg_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_filter_bg_color', 'option');
		}else{
			$beonepage_portfolio_module_filter_bg_color = esc_attr("#eee");
		}
		$this->add_control(
			'section_filter_background_color',
			[
				'label' 	=> __( "Filter Background Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_portfolio_module_filter_bg_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} #portfolio-filter a' => 'background-color: {{VALUE}}',
				],
				'section' 	=> 'elementor_portfolio',
			]
		);
		//Portfolio Item Background on Hover
		$beonepage_portfolio_module_item_bg_color_array = beonepage_olddata_fetch_redux('front_page_portfolio_module_item_bg_color', 'option');
		if(!empty($beonepage_portfolio_module_item_bg_color_array)){
			$beonepage_portfolio_module_item_bg_color_array = beonepage_olddata_fetch_redux('front_page_portfolio_module_item_bg_color', 'option');
			$beonepage_portfolio_module_item_bg_color =  $beonepage_portfolio_module_item_bg_color_array['rgba'];
		}else{
			$beonepage_portfolio_module_item_bg_color = esc_attr("rgba(0,0,0,.8)");
		}			
		$this->add_control(
			'section_item_background_on_hover',
			[
				'label' 	=> __( "Portfolio Item Background on Hover", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_portfolio_module_item_bg_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .portfolio-caption' => 'background-color: {{VALUE}}',
				],
				'section' 	=> 'elementor_portfolio',
			]			
		);
		//Portfolio Item Title Color
		$beonepage_portfolio_module_item_title_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_item_title_color', 'option');
		if(!empty($beonepage_portfolio_module_item_title_color)){
			$beonepage_portfolio_module_item_title_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_item_title_color', 'option');
		}else{
			$beonepage_portfolio_module_item_title_color = esc_attr("rgba(255,204,0,0.9)");
		}
		$this->add_control(
			'section_item_title_color',
			[
				'label' 		=> __( "Portfolio Item Title Color", 'beonepage' ),
				'type' 			=> Controls_Manager::COLOR,
				'default' 		=> $beonepage_portfolio_module_item_title_color,
				'scheme' 		=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .entry-title' => 'color: {{VALUE}}',
				],
				'section' 		=> 'elementor_portfolio',
			]
		);
		//Portfolio Item Tag Color
		$beonepage_portfolio_module_item_tag_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_item_tag_color', 'option');
		if(!empty($beonepage_portfolio_module_item_tag_color)){
			$beonepage_portfolio_module_item_tag_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_item_tag_color', 'option');
		}else{
			$beonepage_portfolio_module_item_tag_color = esc_attr("#ddd");
		}			
		$this->add_control(
			'section_item_tag_color',
			[
				'label' 	=> __( "Portfolio Item Tag Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_portfolio_module_item_tag_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .entry-meta' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_portfolio',
			]	
		);
		//Add number of column
		$beonepage_portfolio_module_item_column_number = beonepage_olddata_fetch_redux('front_page_portfolio_module_item_column_number', 'option');
		if(!empty($beonepage_portfolio_module_item_column_number)){
			$beonepage_portfolio_module_item_column_number = beonepage_olddata_fetch_redux('front_page_portfolio_module_item_column_number', 'option');
		}else{
			$beonepage_portfolio_module_item_column_number = "4";
		}
		$this->add_control(
			'portfolio_module_item_column_number',
			[
				'label'   => __( 'Portfolio Item column number', 'beonepage' ),
				'type'    => Controls_Manager::SELECT,
				'default' => $beonepage_portfolio_module_item_column_number,
				'options' => array(
					'3'	  =>	esc_html__('3', 'beonepage'),
					'4'	  =>	esc_html__('4', 'beonepage'),
				),
				'section' => 'elementor_portfolio',
			]
		);
		// Add full content/image popup
		$this->add_control(
			'portfolio_item_image_popup',
			[
				'label' 		=> __( 'Portfolio Item Image Popup', 'beonepage' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Content', 'beonepage' ),
				'label_off' 	=> __( 'Image', 'beonepage' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'section' 		=> 'elementor_portfolio',
			]
		);
		// Add full content/image limitation switch
		$this->add_control(
			'portfolio_item_limitation',
			[
				'label' 		=> __( 'Portfolio Item Limitation', 'beonepage' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Limited', 'beonepage' ),
				'label_off' 	=> __( 'More', 'beonepage' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'section' 		=> 'elementor_portfolio',
			]
		);
		// Add full content/image limitation switch fields
		$this->add_control(
			'portfolio_item_number_to_show',
			[
				'label' 	=> __( "Portfolio Item To Show", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> '12',
				'title'		=> __( 'Portfolio Item Number', 'beonepage' ),
				'section' 	=> 'elementor_portfolio',
				'condition' => [
					'portfolio_item_limitation'  => 'yes'
				],
				'section' 	=> 'elementor_portfolio',
			]
		);
		$this->add_control(
			'portfolio_show_more_button',
			[
				'label' 	=> __( "Show More Button Text", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> 'Show More',
				'title'		=> __( 'Show More Button Text', 'beonepage' ),
				'section' 	=> 'elementor_portfolio',
				'condition' => [
					'portfolio_item_limitation'  => 'yes'
				],
				'section' 	=> 'elementor_portfolio',
			]
		);
		$this->add_control(
			'portfolio_show_more_button_url',
			[
				'label' 	=> __( "Show More Button URL", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> '',
				'title'		=> __( 'Show More Button URL', 'beonepage' ),
				'section' 	=> 'elementor_portfolio',
				'condition' => [
					'portfolio_item_limitation'  => 'yes'
				],
				'section' 	=> 'elementor_portfolio',
			]			
		);
		//Portfolio Modal Title Color
		$beonepage_portfolio_module_modal_title_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_modal_title_color', 'option');
		if(!empty($beonepage_portfolio_module_modal_title_color)){
			$beonepage_portfolio_module_modal_title_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_modal_title_color', 'option');
		}else{
			$beonepage_portfolio_module_modal_title_color = esc_attr("#ffcc00");
		}			
		$this->add_control(
			'section_model_title_color',
			[
				'label' 	=> __( "Portfolio Modal Title Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_portfolio_module_modal_title_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_portfolio',
			]			
		);
		//Portfolio Modal Content Color
		$beonepage_portfolio_module_modal_content_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_modal_content_color', 'option');
		if(!empty($beonepage_portfolio_module_modal_content_color)){
			$beonepage_portfolio_module_modal_content_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_modal_content_color', 'option');
		}else{
			$beonepage_portfolio_module_modal_content_color = esc_attr("#eceff3");
		}			
		$this->add_control(
			'section_model_content_color',
			[
				'label' 	=> __( "Portfolio Modal Content Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_portfolio_module_modal_content_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_portfolio',
			]	
		);
		//Portfolio Modal Separator Color
		$beonepage_portfolio_module_modal_sp_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_modal_sp_color', 'option');
		if(!empty($beonepage_portfolio_module_modal_sp_color)){
			$beonepage_portfolio_module_modal_sp_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_modal_sp_color', 'option');
		}else{
			$beonepage_portfolio_module_modal_sp_color = esc_attr("#333");
		}			
		$this->add_control(
			'section_model_separator_color',
			[
				'label' 	=> __( "Portfolio Modal Separator Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_portfolio_module_modal_sp_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_portfolio',
			]
		);
		//Portfolio Modal Background Color
		$beonepage_portfolio_module_modal_bg_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_modal_bg_color', 'option');
		if(!empty($portfolio_module_modal_bg_color)){
			$portfolio_module_modal_bg_color = beonepage_olddata_fetch_redux('front_page_portfolio_module_modal_bg_color', 'option');
		}else{
			$portfolio_module_modal_bg_color = esc_attr("#181a1c");
		}			
		$this->add_control(
			'section_model_bg_color',
			[
				'label' 	=> __( "Portfolio Modal Background Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $portfolio_module_modal_bg_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_portfolio',
			]			
		);
	}// End finction
    protected function render( $instance = [] ) {
    	$settings = $this->get_settings();
    	$class = '';
    	$attribute = '';    
		if ( $settings['section_background'] == 'color' ) {
			$class = ' no-background';
		} else {
			$class = ' img-background';
		}
		if ($settings['section_background'] == 'image' && $settings['section_bg_parallax'] == 'yes' ) {
			$class .= ' parallax';
			$attribute = ' data-stellar-background-ratio="0.5"';
		}
		if ( $settings['section_background'] == 'video' ) {
			$class .= ' yt-bg-player';
			$attribute .= ' data-yt-video="' .$settings['section_youtube_url']. '"';			
		}elseif( $settings['section_background'] == 'color'){
			$class = ' no-background';
		} else {
			$class = ' img-background';
		}			
    	//Conditions
    	$beonepage_section_background_image_url = '';
    	if(isset($settings['section_background_image']['url']) && $settings['section_background_image']['url'] != ''){
    		$beonepage_section_background_image_url = $settings['section_background_image']['url'];
    	}
    	$beonepage_section_font_color = '';
    	if(isset($settings['section_font_color']) && $settings['section_font_color'] != ''){
    		$beonepage_section_font_color = $settings['section_font_color'];
    	}
    	$beonepage_section_background_color = '';
    	if(isset($settings['section_background_color']) && $settings['section_background_color'] != ''){
    		$beonepage_section_background_color = $settings['section_background_color'];
    	}
    	$beonepage_section_separator_line_color = '';
    	if(isset($settings['section_separator_line_color']) && $settings['section_separator_line_color'] != ''){
    		$beonepage_section_separator_line_color = $settings['section_separator_line_color'];
    	}
    	$beonepage_section_separator_circle_color = '';
    	if(isset($settings['section_separator_circle_color']) && $settings['section_separator_circle_color'] != ''){
    		$beonepage_section_separator_circle_color = $settings['section_separator_circle_color'];
    	}
    	$beonepage_section_filter_font_color = '';
    	if(isset($settings['section_filter_font_color']) && $settings['section_filter_font_color'] != ''){
    		$beonepage_section_filter_font_color = $settings['section_filter_font_color'];
    	}
    	$beonepage_section_filter_background_color = '';
    	if(isset($settings['section_filter_background_color']) && $settings['section_filter_background_color'] != ''){
    		$beonepage_section_filter_background_color = $settings['section_filter_background_color'];
    	}
    	$beonepage_section_item_background_on_hover = '';
    	if(isset($settings['section_item_background_on_hover']) && $settings['section_item_background_on_hover'] != ''){
    		$beonepage_section_item_background_on_hover = $settings['section_item_background_on_hover'];
    	}
    	$beonepage_section_item_title_color = '';
    	if(isset($settings['section_item_title_color']) && $settings['section_item_title_color'] != ''){
    		$beonepage_section_item_title_color = $settings['section_item_title_color'];
    	}
    	$beonepage_section_item_tag_color = '';
    	if(isset($settings['section_item_tag_color']) && $settings['section_item_tag_color'] != ''){
    		$beonepage_section_item_tag_color = $settings['section_item_tag_color'];
    	}
    	$beonepage_section_model_content_color = '';
    	if(isset($settings['section_model_content_color']) && $settings['section_model_content_color'] != ''){
    		$beonepage_section_model_content_color = $settings['section_model_content_color'];
    	}
    	$beonepage_section_model_bg_color = '';
    	if(isset($settings['section_model_bg_color']) && $settings['section_model_bg_color'] != ''){
    		$beonepage_section_model_bg_color = $settings['section_model_bg_color'];
    	}
    	$beonepage_section_model_separator_color = '';
    	if(isset($settings['section_model_separator_color']) && $settings['section_model_separator_color'] != ''){
    		$beonepage_section_model_separator_color = $settings['section_model_separator_color'];
    	}
    	$beonepage_section_model_title_color = '';
    	if(isset($settings['section_model_title_color']) && $settings['section_model_title_color'] != ''){
    		$beonepage_section_model_title_color = $settings['section_model_title_color'];
    	}
    	$beonepage_section_background_image_rp = '';
    	if(isset($settings['section_background_image_rp']) && $settings['section_background_image_rp'] !=''){
    		$beonepage_section_background_image_rp = $settings['section_background_image_rp'];
    	}
    	$beonepage_section_background_image_bp = '';
    	if(isset($settings['section_background_image_bp']) && $settings['section_background_image_bp'] !=''){
    		$beonepage_section_background_image_bp = $settings['section_background_image_bp'];
    	}
    	$beonepage_section_background_image_bs = '';
    	if(isset($settings['section_background_image_bs']) && $settings['section_background_image_bs'] !=''){
    		$beonepage_section_background_image_bs = $settings['section_background_image_bs'];
    	}
    	$beonepage_section_background_image_ath = '';
    	if(isset($settings['section_background_image_ath']) && $settings['section_background_image_ath'] !=''){
    		$beonepage_section_background_image_ath = $settings['section_background_image_ath'];
    	}
		?>
		<style>
			<?php if(isset($beonepage_section_background_image_url) && $beonepage_section_background_image_url != ''){ ?>
				.portfolio-module{
					background-image: url(<?php echo $beonepage_section_background_image_url; ?>);
				}
			<?php } 
				if(isset($beonepage_section_font_color) && $beonepage_section_font_color != ''){ ?>
				.portfolio-module{
					color: <?php echo $beonepage_section_font_color; ?>;
				}
			<?php }	
				if(isset($beonepage_section_background_color) && $beonepage_section_background_color != ''){	?>
				.portfolio-module{				
					background-color: <?php echo $beonepage_section_background_color; ?>;
				}
			<?php }
				if(isset($beonepage_section_separator_line_color) && $beonepage_section_separator_line_color != ''){?>
				.portfolio-module .separator span{
					color: <?php echo $beonepage_section_separator_line_color; ?>;			
				}
			<?php }		
				if(isset($beonepage_section_separator_circle_color) && $beonepage_section_separator_circle_color != ''){ ?>
				.portfolio-module .separator i {
					color: <?php echo $beonepage_section_separator_circle_color; ?>;
				}
			<?php } if($beonepage_section_filter_font_color !='' || $beonepage_section_filter_background_color !=''){ ?>
				#portfolio-filter a {
			<?php if(isset($beonepage_section_filter_font_color)) {?>
					color: <?php echo $beonepage_section_filter_font_color; ?>;
			<?php }
				if(isset($beonepage_section_filter_background_color)){?>
					background-color: <?php echo $beonepage_section_filter_background_color; ?>;
			<?php } ?>
				}
			<?php  }
				if(isset($beonepage_section_item_background_on_hover) && $beonepage_section_item_background_on_hover != ''){
				?>				
				.portfolio-caption {
					background-color: <?php echo $beonepage_section_item_background_on_hover; ?>;
				}
			<?php } 
				if(isset($beonepage_section_item_tag_color ) && $beonepage_section_item_tag_color != ''){?>
				.portfolio-caption .entry-title {
					color: <?php echo $beonepage_section_item_title_color ; ?>;
				}
			<?php } 
				if(isset($beonepage_section_item_tag_color) && $beonepage_section_item_tag_color != ''){ ?>
				.portfolio-caption .entry-meta {
					color: <?php echo $beonepage_section_item_tag_color ?>;
				}
			<?php } 
				if($beonepage_section_model_content_color !='' || $beonepage_section_model_bg_color !=''){?>
				.portfolio-ajax-single {
			<?php if(isset($beonepage_section_model_content_color)){ ?>
					color: <?php echo $beonepage_section_model_content_color; ?>;
			<?php } 
				if(isset($beonepage_section_model_bg_color)){ ?>
					background-color: <?php echo $beonepage_section_model_bg_color; ?>;
			<?php } ?>
				}
			<?php }
				if(isset($beonepage_section_model_separator_color) && $beonepage_section_model_separator_color != ''){ ?>		
				.portfolio-ajax-title {
					border-bottom-color: <?php echo $beonepage_section_model_separator_color; ?>;
				}
			<?php } 
				if(isset($beonepage_section_model_title_color) && $beonepage_section_model_title_color != ''){  ?>
				.portfolio-ajax-title h2 {
					color: <?php echo $beonepage_section_model_title_color; ?>;
				}
			<?php }
				if(isset($beonepage_section_background_image_rp) && $beonepage_section_background_image_rp !=''){?>
				.portfolio-module{
					background-repeat: <?php echo $beonepage_section_background_image_rp; ?>;
				}
			<?php }
				if(isset($beonepage_section_background_image_bp) && $beonepage_section_background_image_bp !=''){?>
				.portfolio-module{
					background-position: <?php echo $beonepage_section_background_image_bp; ?>;
				}
			<?php }
				if(isset($beonepage_section_background_image_bs) && $beonepage_section_background_image_bs !=''){?>
				.portfolio-module{
					background-size: <?php echo $beonepage_section_background_image_bs; ?>;
				}
			<?php }
				if(isset($beonepage_section_background_image_ath) && $beonepage_section_background_image_ath !=''){?>
				.portfolio-module{
					background-attachment: <?php echo $beonepage_section_background_image_ath; ?>;
				}
			<?php } ?>
		</style>
		<section id="" class="module portfolio-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
			<div class="container-fluid">
				<div class="row row-nopadding">
					<?php if ( $settings['section_title'] != '' ) : ?>
					<?php $animation = $settings['section_caption_animation'] != 'none' ? ' wow ' . $settings['section_caption_animation'] . '" data-wow-delay=".2s' : ''; ?>
					<div class="module-caption col-md-12 text-center<?php echo $animation; ?>">
						<h2><?php echo strip_tags( html_entity_decode( $settings['section_title'] ), '<span>' ); ?></h2>
						<?php if ( $settings['section_sub_title'] != '' ) : ?>
						<p><?php echo $settings['section_sub_title']; ?></p>
						<?php endif; ?>
						<div class="separator">
							<span><i class="fa fa-circle"></i></span>
						</div>
						<!-- .separator -->
						<div class="spacer"></div>
					</div>
					<!-- .module-caption -->
					<?php endif; ?>
					<?php
						$tags = get_terms( 'portfolio_tag' );
						$count = count( $tags );
						?>
					<?php  if ( ! is_wp_error( $tags ) && $count > 0 && $settings['section_enable_port_filter'] == "yes"  ) : ?>
					<?php $animation = $settings['section_filter_animation'] != 'none' ? ' wow ' . $settings['section_filter_animation'] . '" data-wow-delay=".3s' : ''; ?>
					<div id="portfolio-filter" class="portfolio-filters  col-md-12 text-center<?php echo $animation; ?>">
						<?php if($settings['section_show_all_hide'] != "yes"){	 ?>
						<a href="#" class="active" data-filter="*"><?php echo $settings['section_all_btn_text']; ?></a>
						<?php
							}
								$t=0;
								foreach ( $tags as $tag ) {
									$tag_name = str_replace( ' ', '-', strtolower( $tag->name ) );
												   if($settings['section_show_all_hide'] == "yes" && $t==0){								
										printf( '<a href="#" class="active" data-filter=".portfolio-tag-%1s">%2s</a>', $tag_name, $tag->name );
									}else{
										printf( '<a href="#" data-filter=".portfolio-tag-%1s">%2s</a>', $tag_name, $tag->name );
									}
								$t++;	
								}
							?>
					</div>
					<!-- #portfolio-filter -->
					<?php endif; ?>
					<div id="portfolio-container" class="col-md-10 col-md-offset-1"></div>
					<div id="portfolio-loader">
						<i class="fa fa-spinner fa-pulse"></i>
					</div>
					<!-- .portfolio-loader -->
					<div class="portfolio-wrap col-md-12 clearfix" data-itemcolumn="<?php echo $settings['portfolio_module_item_column_number'];?>">
						<?php
						
						$number_of_portfolio_item_limitation = $settings['portfolio_item_limitation'];
						if(isset($settings['portfolio_item_number_to_show']) && !empty($settings['portfolio_item_number_to_show']) ){
							$beonepage_portfolio_post_number = $settings['portfolio_item_number_to_show'];
						}else{
							$beonepage_portfolio_post_number = -1;
						}
						$display_showall_button = "";	
						
						if($number_of_portfolio_item_limitation == 'yes'){				
							
							$number_of_portfolio_showall_button_text = $settings['portfolio_show_more_button'];
							
							$display_showall_button_url = $settings['portfolio_show_more_button_url'];
							
							$display_showall_button = '<div ="clearfix"><a href="'.$display_showall_button_url.'" target="_blank" class="btn btn-light">'.$number_of_portfolio_showall_button_text.'</a></div>';
							
						}	
						
							$args = array(
								'post_type' => 'portfolio',
								'posts_per_page' => $beonepage_portfolio_post_number,
							);
							$query = new \WP_Query( $args );
							
							if ( $query->have_posts() ) {
								global $post; 
								while ( $query->have_posts() ) : $query->the_post();
							
									$terms = get_the_terms( $post->ID, 'portfolio_tag' );
							
									if ( $terms && ! is_wp_error( $terms ) ) {
										$tag = array();
										$filter = array();
							
										foreach ( $terms as $term ) {
											$tag[] = $term->name;
											$filter[] = 'portfolio-tag-' . $term->name;
										}
							
										$filter = str_replace( ' ', '-', $filter );
										$portfolio_tag = ( join( ', ', $tag ) );
										$portfolio_filter = strtolower( join( ' ', $filter ) );
									}
									?>
						<article id="portfolio-item-<?php the_ID() ?>" class="portfolio-item<?php echo isset( $portfolio_filter ) ? ' ' . esc_attr( $portfolio_filter) : ''; ?> wow fadeIn" data-wow-delay=".5s">
							<?php
								$portfolio_thumbnail_url = get_the_post_thumbnail_url();
								$portfolio_preview_type = $settings['portfolio_item_image_popup'];
								if($portfolio_preview_type == 'yes'){						
								?>
							<a href="#<?php echo $post->post_name; ?>">
							<?php
								}else{
								?>
							<a href="<?php echo esc_url($portfolio_thumbnail_url);?>" class="fancybox" data-fancybox-group="group" title="<?php the_title(); ?>">
								<?php
									}
									?>
								<div class="portfolio-image">
									<?php
										if ( has_post_thumbnail() ) {
											the_post_thumbnail( 'featured-thumb' );
										} else {
											printf( '<img src="%s">', esc_url( get_template_directory_uri() . '/images/portfolio-placeholder.png' ) );
										}
										?>
								</div>
								<!--.portfolio-image -->
								<div class="portfolio-caption">
									<h3 class="entry-title"><?php the_title(); ?></h3>
									<?php echo isset( $portfolio_tag ) ? '<span class="entry-meta">' . esc_html( $portfolio_tag ) . '</span>' : ''; ?>
								</div>
								<!--.portfolio-caption -->
							</a>
							<?php if($portfolio_preview_type != 'yes'): ?>
							<div style="display:none;">	
								<?php 
									$args = array(
										'post_parent'    => $post->ID,
										'post_type'      => 'attachment',
										'numberposts'    => -1, // show all
										'post_status'    => 'any',
										'post_mime_type' => 'image',
										'orderby'        => 'menu_order',
										'order'           => 'ASC'
									);
									$images = get_posts($args);		
									foreach ( $images as $image ) : 
										if ( count( $images ) > 1 ) :		
										//$image_lg_url = wp_get_attachment_image_src( $image->ID, 'full' );
										?>
										<a href="<?php echo wp_get_attachment_url($image->ID); ?>" class="fancybox" data-fancybox-group="group" title="<?php echo __( 'Gallery: ', 'beonepage' ); the_title()." "; ?> "></a>		
										<?php 
										endif; 
									endforeach;
								?>			
							</div>
							<?php endif; ?>
						</article>
						<?php
							endwhile;
							} else {
							global $switch_portfolio_post;
							
							$switch_portfolio_post = 'portfolio';
							
							get_template_part( 'template-parts/content', 'none' );
							}
							
							wp_reset_postdata();
							?>
					</div>
					<!-- #portfolio-wrap -->
					<div class="col-md-12 text-center showall_btn_wrap">
					<?php echo $display_showall_button;?>
					</div>
				</div>
				<!-- .row -->
			</div>
			<!-- .container-fluid -->
		</section>
		<!-- #portfolio -->
		<?php
		if ( Plugin::$instance->editor->is_edit_mode() ) :  
			?>
			<script>
				(function($) {
					var $body = $('body'),
						$portfolioFilter = $('#portfolio-filter'),
						$portfolioWrap = $('.portfolio-wrap'),
						$portfolioContainer = $('#portfolio-container'),
						$portfolioItem = $('.portfolio-item'),
						$portfolioLoader = $('#portfolio-loader');
					
					APP.portfolio = {
						init: function() {
							APP.portfolio.load();
							APP.portfolio.filter();
							APP.portfolio.ajaxload();
						},
				
						load: function() {
							var portfolioItemWidth = 0,
								portfolioWrapWidth = $portfolioWrap.width();
				
							if ($body.hasClass('device-lg')) {
								portfolioItemWidth = portfolioWrapWidth / 4;
							} else if ($body.hasClass('device-md')) {
								portfolioItemWidth = portfolioWrapWidth / 3;
							} else if ($body.hasClass('device-sm') || $body.hasClass('device-xs')) {
								portfolioItemWidth = portfolioWrapWidth / 2;
							} else {
								portfolioItemWidth = portfolioWrapWidth;
							}
				
							$portfolioItem.css('width', portfolioItemWidth + 'px');
				
				
							var portfolioModules = $('.portfolio-module .portfolio-filters a.active').data('filter');
							//alert(portfolioModules);
							if (portfolioModules == "*") {
								$portfolioWrap.imagesLoaded(function() {
									$portfolioWrap.isotope({
										transitionDuration: '.65s'
									});
								});
							} else {
								$portfolioWrap.imagesLoaded(function() {
									$portfolioWrap.isotope({
										transitionDuration: '.65s',
										filter: portfolioModules
									});
								});
							}
				
						},
				
						filter: function() {
							$portfolioFilter.find('a').click(function(e) {
								$portfolioFilter.find('a.active').removeClass('active');
								$(this).addClass('active');
				
								$portfolioWrap.isotope({
									filter: $(this).attr('data-filter')
								});
				
								e.preventDefault();
							});
				
							$portfolioFilter.on({
								click: function(e) {
									e.preventDefault();
								}
							}, 'a.active');
						},
				
						ajaxload: function() {
							$portfolioItem.find( 'a:not(".fancybox")' ).click( function( e ) {
							var portfolioId = $( this ).parents( '.portfolio-item' ).attr( 'id' );

							if ( ! $( this ).parents( '.portfolio-item' ).hasClass( 'portfolio-active' ) ) {
							APP.portfolio.loadPortfolio( portfolioId );
							}

							e.preventDefault();
							} );
							$("a[rel=fancyimage_group]").fancybox({
								'transitionIn'		: 'elastic',
								'transitionOut'		: 'elastic',
								'titleShow' 	: false
							});
						},
				
						loadPortfolio: function(portfolioId) {
							var portfolioNext = APP.portfolio.getNextItem(portfolioId),
								portfolioPrev = APP.portfolio.getPrevItem(portfolioId);
				
							APP.portfolio.closePortfolio();
							$portfolioLoader.fadeIn();
				
							$portfolioContainer.load(
								$.ajax({
									type: 'POST',
									url: app_vars.ajax_url,
									data: {
										action: 'ajax_portfolio',
										portfolio_id: portfolioId,
										portfolio_next: portfolioNext,
										portfolio_prev: portfolioPrev
									},
				
									success: function(html) {
										$portfolioContainer.append(html);
										APP.portfolio.initializePortfolio(portfolioId);
										APP.portfolio.openPortfolio(portfolioId);
				
										$portfolioItem.removeClass('portfolio-active');
										$('#' + portfolioId).addClass('portfolio-active');
									}
								})
							);
						},
				
						getNextItem: function(portfolioId) {
							var portfolioNext = '',
								hasNext = $('#' + portfolioId).nextAll(':visible').first();
				
							if (hasNext.length != 0) {
								portfolioNext = hasNext.attr('id');
							}
				
							return portfolioNext;
						},
				
						getPrevItem: function(portfolioId) {
							var portfolioPrev = '',
								hasPrev = $('#' + portfolioId).prevAll(':visible').first();
				
							if (hasPrev.length != 0) {
								portfolioPrev = hasPrev.attr('id');
							}
				
							return portfolioPrev;
						},
				
						closePortfolio: function() {
							if ($portfolioContainer.find('#portfolio-ajax-single').length != 0) {
				
								$portfolioContainer.fadeOut(500, function() {
									$(this).find('#portfolio-ajax-single').remove();
								});
				
								$portfolioContainer.removeClass('ajax-portfolio-opened');
							}
						},
				
						initializePortfolio: function(portfolioId) {
							$('#next-portfolio, #prev-portfolio').click(function(e) {
								if ($body.hasClass('device-md') || $body.hasClass('device-lg')) {
									$portfolioContainer.height(0);
								}
				
								var portfolioId = $(this).attr('data-id');
				
								$portfolioItem.removeClass('portfolio-active');
								$('#' + portfolioId).addClass('portfolio-active');
				
								APP.portfolio.loadPortfolio(portfolioId);
				
								e.preventDefault();
							});
				
							$portfolioContainer.on('click', '#close-portfolio', function(e) {
								if ($body.hasClass('device-md') || $body.hasClass('device-lg')) {
									$portfolioContainer.height(0);
								}
				
								$portfolioContainer.fadeOut(500, function() {
									$portfolioContainer.find('#portfolio-ajax-single').remove();
								});
				
								$portfolioItem.removeClass('portfolio-active');
								$portfolioContainer.removeClass('ajax-portfolio-opened');
				
								e.preventDefault();
							});
						},
				
						openPortfolio: function(portfolioId) {
							var topOffsetScroll = APP.initialize.topScrollOffset();
				
							$portfolioContainer.addClass('ajax-portfolio-opened');
				
							setTimeout(function() {
								$portfolioContainer.imagesLoaded(function() {
									$portfolioContainer.fadeIn(500);
				
									APP.widget.flexSlider();
									APP.initialize.imageFade();
									APP.widget.magnificPopup();
				
									var containerHeight = 'auto';
				
									if ($portfolioContainer.find('.fslider').length > 0) {
										containerHeight = $('#master.fslider').height() + 78;
									} else {
										containerHeight = $('.portfolio-single-image').height();
									}
				
									if ($body.hasClass('device-md') || $body.hasClass('device-lg')) {
										$portfolioContainer.height(containerHeight);
										$('#portfolio-single-content').height(containerHeight);
				
										$('#portfolio-single-content').niceScroll('.portfolio-single-content', {
											cursorcolor: $('.portfolio-ajax-single').css('color'),
											cursorwidth: '5px',
											cursorfixedheight: 50,
											cursorborder: 0,
											cursorborderradius: 0,
											scrollspeed: 10,
											mousescrollstep: 10,
											horizrailenabled: false,
											autohidemode: false,
											zindex: 99
										});
									}
				
									$portfolioLoader.fadeOut();
				
									if ($body.hasClass('device-md') || $body.hasClass('device-lg')) {
										scrollToTop = $portfolioContainer.offset().top - topOffsetScroll - 90;
									} else {
										scrollToTop = $portfolioContainer.offset().top - topOffsetScroll;
									}
				
									$('html, body').stop(true, true).animate({
										scrollTop: scrollToTop
									}, 800, 'easeOutQuad');
									});
							}, 500);
						},
					}
					APP.portfolio.init();
				})(jQuery);
			</script>  
		<?php
		endif;
	}
	protected function content_template() {}
	public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_My_Custom_Elementor_Portfolio );