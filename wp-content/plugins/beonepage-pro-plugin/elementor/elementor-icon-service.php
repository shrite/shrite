<?php
namespace Elementor;	
use Elementor\Core\Schemes\Color;
if ( ! defined( 'ABSPATH' ) ) exit;	
class Widget_My_Custom_Elementor_Icon_Service extends Widget_Base {
	
	public function get_categories() {
		return [ 'beonepage-widgets' ];
	}
	public function get_name() {
		return 'elementor-icon-service';
	}		
	public function get_title() {
		return __( 'BeOne Icon Service', 'beonepage' );
	}
		
	public function get_icon() {
		return 'fa fa-eye';
	}
	protected function _register_controls() {	
		$this->add_control(
		'elementor_icon_service',
			[
				'label' => __( 'Icon Service Option', 'beonepage' ),
				'type' 	=> Controls_Manager::SECTION,
			]
		);
		//Title
		$beonepage_icon_service_module_title = beonepage_olddata_fetch_redux('front_page_icon_service_module_title', 'option');
		if(!empty($beonepage_icon_service_module_title)){
		$beonepage_icon_service_module_title = beonepage_olddata_fetch_redux('front_page_icon_service_module_title', 'option');
		$beonepage_icon_service_module_title = html_entity_decode($beonepage_icon_service_module_title);
		}else{
		$beonepage_icon_service_module_title = wp_kses("Our <span>Services</span>",array('span' => array()));
		}
		$this->add_control(
			'section_title',
			[
				'label' 	=> __( "Section Title", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_icon_service_module_title,
				'title' 	=> __( 'Enter Title', 'beonepage' ),
				'section' 	=> 'elementor_icon_service',
			]			
		);
		//Subtitle
		$beonepage_icon_service_module_subtitle = beonepage_olddata_fetch_redux('front_page_icon_service_module_subtitle', 'option');
		if(!empty($beonepage_icon_service_module_subtitle)){
			$beonepage_icon_service_module_subtitle = beonepage_olddata_fetch_redux('front_page_icon_service_module_subtitle', 'option');
		}else{
			$beonepage_icon_service_module_subtitle = esc_attr("We provide a complete list of best digital services");
		}
		$this->add_control(
			'section_sub_title',
			[
				'label' 	=> __( "Section Sub Title", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_icon_service_module_subtitle,
				'title' 	=> __( 'Enter Sub Title', 'beonepage' ),
				'section' 	=> 'elementor_icon_service',
			]			
		);
		//Caption Animation
		$beonepage_icon_service_module_animation = beonepage_olddata_fetch_redux('front_page_icon_service_module_animation', 'option');
		if(!empty($beonepage_icon_service_module_animation)){
			$beonepage_icon_service_module_animation = beonepage_olddata_fetch_redux('front_page_icon_service_module_animation', 'option');
		}else{
			$beonepage_icon_service_module_animation = esc_attr("zoomIn");
		}
		$this->add_control(
			'section_title_animation',
			[
				'label' 	=> __( 'Caption Animation', 'beonepage' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> $beonepage_icon_service_module_animation,
				'options' 	=> beonepage_theme_animate(),
				'section' 	=> 'elementor_icon_service',
			]			
		);
		//Font Color
		$beonepage_icon_service_module_color = beonepage_olddata_fetch_redux('front_page_icon_service_module_color', 'option');
		if(!empty($beonepage_icon_service_module_color)){
			$beonepage_icon_service_module_color = beonepage_olddata_fetch_redux('front_page_icon_service_module_color', 'option');
		}else{
			$beonepage_icon_service_module_color = esc_attr("#eceff3");
		}
		$this->add_control(
			'section_font_color',
			[
				'label' 	=> __( "Font Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_icon_service_module_color,
				'scheme' 	=> [
					'type' 		=> Color::get_type(),
					'value' 	=> Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icon-service-module.module' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_icon_service',
			]		
		);
		//Separator Line Color
		$beonepage_icon_service_module_sp_color = beonepage_olddata_fetch_redux('front_page_icon_service_module_sp_color', 'option');
		if(!empty($beonepage_icon_service_module_sp_color)){
			$beonepage_icon_service_module_sp_color = beonepage_olddata_fetch_redux('front_page_icon_service_module_sp_color', 'option');
			}else{
			$beonepage_icon_service_module_sp_color =esc_attr("#888");
		}
		$this->add_control(
			'section_separator_line_color',
			[
				'label' 	=> __( "Separator Line Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_icon_service_module_sp_color,
				'scheme' 	=> [
					'type' 		=> Color::get_type(),
					'value' 	=> Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .separator span:after, .icon-service-module .separator span:before' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_icon_service',
			]			
		);
		//Separator Circle Color			
		$beonepage_icon_service_module_sp_i_color = beonepage_olddata_fetch_redux('front_page_icon_service_module_sp_i_color', 'option');
		if(!empty($beonepage_icon_service_module_sp_i_color)){
			$beonepage_icon_service_module_sp_i_color = beonepage_olddata_fetch_redux('front_page_icon_service_module_sp_i_color', 'option');
			$beonepage_icon_service_module_sp_i_color = html_entity_decode($beonepage_icon_service_module_sp_i_color);
			}else{
			$beonepage_icon_service_module_sp_i_color = wp_kses("#ffcc00",array('span' => array()));
		}		
		$this->add_control(
			'section_separator_circle_color',
			[
				'label' 	=> __( "Separator Circle Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_icon_service_module_sp_i_color,
				'scheme' 	=> [
					'type' 		=> Color::get_type(),
					'value' 	=> Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .separator i' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_icon_service',
			]
		);
		//Icon Background on Hover
		$beonepage_icon_service_module_hover_color = beonepage_olddata_fetch_redux('front_page_icon_service_module_hover_color', 'option');
		if(!empty($beonepage_icon_service_module_hover_color)){
			$beonepage_icon_service_module_hover_color = beonepage_olddata_fetch_redux('front_page_icon_service_module_hover_color', 'option');
			$beonepage_icon_service_module_hover_color = html_entity_decode($beonepage_icon_service_module_hover_color);
			}else{
			$beonepage_icon_service_module_hover_color =wp_kses("#ffcc00",array('span' => array()));
		}
		$this->add_control(
			'section_icon_background_hover',
			[
				'label' 	=> __( "Icon Background on Hover", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_icon_service_module_hover_color,
				'scheme' 	=> [
					'type' 		=> Color::get_type(),
					'value' 	=> Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}}  .icon-service-box:hover .service-icon' => 'background-color: {{VALUE}}',
				],
				'section' 	=> 'elementor_icon_service',
			]			
		);			
		//Background setting			
		$class = '';
		$attribute = '';
		$beonepage_icon_service_module_bg = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg', 'option');
		if(!empty($beonepage_icon_service_module_bg)){
			$beonepage_icon_service_module_bg = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg', 'option');
			}else{
			$beonepage_icon_service_module_bg = esc_attr("color");
		}
		$this->add_control(
			'section_background',
			[
				'label' => __( "Background", 'beonepage' ),
				'type' 	=> Controls_Manager::CHOOSE,
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
						'icon' 	=> ' eicon-video-camera',
					]
				],
				'default'	=> $beonepage_icon_service_module_bg,
				'toggle' 	=> true,
				'section' 	=> 'elementor_icon_service',
			]			
		);
		//Background Color		
		$beonepage_icon_service_module_bg_color = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg_color', 'option');
		if(!empty($beonepage_icon_service_module_bg_color)){
			$beonepage_icon_service_module_bg_color = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg_color', 'option');
			$beonepage_icon_service_module_bg_color = html_entity_decode($beonepage_icon_service_module_bg_color);
		}else{
			$beonepage_icon_service_module_bg_color = wp_kses("#181a1c",array('span' => array()));
		}
		$this->add_control(
			'section_background_color',
			[
				'label' 	=> __( "Background Color", 'beonepage' ),
				'type'		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_icon_service_module_bg_color,
				'scheme'	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icon-service-module' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'section_background' => 'color',
				],
				'section'=> 'elementor_icon_service',
			]			
		);			
		//Background image
		$beonepage_icon_service_module_bg_img = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg_img', 'option');
		if(!empty($beonepage_icon_service_module_bg_img['background-image'])){
			$beonepage_icon_service_module_bg_img = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg_img', 'option');
			$beonepage_icon_service_module_bg_img_url = $beonepage_icon_service_module_bg_img['background-image'];
		}else{
			$beonepage_icon_service_module_bg_img_url = \Elementor\Utils::get_placeholder_image_src();
		}
		$this->add_control(
			'section_background_image',
			[
				'label' => __( "Bakground Image", 'beonepage' ),
				'type' 	=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 	=> esc_url($beonepage_icon_service_module_bg_img_url),
				],
				'condition' => [
					'section_background' => 'image',
				],
				'section' 	=> 'elementor_icon_service',
			]			
		);
		// Background Repeat
		$beonepage_icon_service_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg_img', 'option');
		if(!empty($beonepage_icon_service_module_bg_img_rp['background-repeat'])){
			$beonepage_icon_service_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg_img', 'option');
			$beonepage_icon_service_module_bg_img_rp = $beonepage_icon_service_module_bg_img_rp['background-repeat'];
		}else{
			$beonepage_icon_service_module_bg_img_rp = esc_attr("no repeat");
		}
		$this->add_control(
			'section_background_image_rp',
			[
				'label' 	=> __( 'Background Repeat', 'beonepage' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> $beonepage_icon_service_module_bg_img_rp,
				'condition' => [
					'section_background' => 'image',
				],
				'options' 	=> [
					'no-repeat' => __( 'No Repeat', 'beonepage' ),
					'repeat' 	=> __( 'Repeat All', 'beonepage' ),
					'repeat-x' 	=> __( 'Repeat Horizontally', 'beonepage' ),
					'repeat-y' 	=> __( 'Repeat Vertically', 'beonepage' ),
				],
				'section' 	=> 'elementor_icon_service',
			]			
		);
		//Background Position
		$beonepage_icon_service_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg_img', 'option');
		if(!empty($beonepage_icon_service_module_bg_img_bp['background-position'])){
			$beonepage_icon_service_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg_img', 'option');
			$beonepage_icon_service_module_bg_img_bp = $beonepage_icon_service_module_bg_img_bp['background-position'];
		}else{
			$beonepage_icon_service_module_bg_img_bp = esc_attr("left top");
		}
		$this->add_control(
		'section_background_image_bp',
			[
				'label' => __( 'Background Position', 'beonepage' ),
				'type' => Controls_Manager::SELECT,
				'default' => $beonepage_icon_service_module_bg_img_bp,
				'condition' => [
					'section_background' => 'image',
				],
				'options' => [
					'left top'  => __( 'Left Top', 'beonepage' ),
					'left center' => __( 'Left Center', 'beonepage' ),
					'left bottom' => __( 'Left Bottom', 'beonepage' ),
					'right top' => __( 'Right Top', 'beonepage' ),
					'right center'  => __( 'Right Center', 'beonepage' ),
					'right bottom' => __( 'Right Bottom', 'beonepage' ),
					'center top' => __( 'Center Top', 'beonepage' ),
					'center center' => __( 'Center Center', 'beonepage' ),
					'center bottom' => __( 'Center Bottom', 'beonepage' ),
				],
				'section' => 'elementor_icon_service',
			]			
		);
		//Background Size
		$beonepage_icon_service_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg_img', 'option');
		if(!empty($beonepage_icon_service_module_bg_img_bs['background-size'])){
			$beonepage_icon_service_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg_img', 'option');
			$beonepage_icon_service_module_bg_img_bs = $beonepage_icon_service_module_bg_img_bs['background-size'];
		}else{
			$beonepage_icon_service_module_bg_img_bs = esc_attr("cover");
		}		
		$this->add_control(
			'section_background_image_bs',
			[
				'label' 	=> __( "Background Size", 'beonepage' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'condition' => [
					'section_background' => 'image',
				],
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
				'default' 	=> $beonepage_icon_service_module_bg_img_bs,
				'toggle' 	=> true,
				'section' 	=> 'elementor_icon_service',
			]			
		);
		//Background Attachment
		$beonepage_icon_service_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg_img', 'option');
		if(!empty($beonepage_icon_service_module_bg_img_ath['background-attachment'])){
			$beonepage_icon_service_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg_img', 'option');
			$beonepage_icon_service_module_bg_img_ath = $beonepage_icon_service_module_bg_img_ath['background-attachment'];
		}else{
			$beonepage_icon_service_module_bg_img_ath = esc_attr("scroll");
		}			
		$this->add_control(
			'section_background_image_ath',
			[
				'label' 	=> __( "Background Attachment", 'beonepage' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'condition' => [
					'section_background' => 'image',
				],
				'options' 	=> [
					'scroll' 	=> [
						'title' 	=> __( 'Scroll', 'beonepage' ),
						'icon' 		=> 'fa fa-arrow-circle-right',			
					],
					'fixed' 	=> [
						'title' 	=> __( 'Fixed', 'beonepage' ),
						'icon' 		=> 'fa fa-arrows-alt',
					],				
				],
				'default' 	=> $beonepage_icon_service_module_bg_img_ath,
				'toggle' 	=> true,
				'section' 	=> 'elementor_icon_service',
			]			
		);
		//Background video field
		$beonepage_icon_service_module_bg_video = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg_video', 'option');
		if(!empty($beonepage_icon_service_module_bg_video)){
			$beonepage_icon_service_module_bg_video = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg_video', 'option');
			$beonepage_icon_service_module_bg_video = html_entity_decode($beonepage_icon_service_module_bg_video);
		}else{
			$beonepage_icon_service_module_bg_video =wp_kses("Video Url",array('span' => array()));
		}
		$this->add_control(
			'section_youtube_url',
			[
				'label' 		=> __( "YouTube URL", 'beonepage' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> $beonepage_icon_service_module_bg_video,
				'condition' 	=> [
					'section_background' => 'video',
				],
				'description' 	=> __( 'IMPORTANT NOTE: The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so its better to define both Image and YouTube Video for best results.', 'beonepage' ),
				'section' 		=> 'elementor_icon_service',
			]		
		);		
		//Parallax seting
		$beonepage_icon_service_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg_parallax', 'option');
		if(!empty($beonepage_icon_service_module_bg_parallax)){
				$beonepage_icon_service_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg_parallax', 'option');
				$beonepage_icon_service_module_bg_parallax = html_entity_decode($beonepage_icon_service_module_bg_parallax);
			if($beonepage_icon_service_module_bg_parallax == 1){
				$beonepage_icon_service_module_bg_parallax_d = esc_attr("yes");
			}else{
				$beonepage_icon_service_module_bg_parallax_d = esc_attr("no");
			}				
		}else{
			$beonepage_icon_service_module_bg_parallax_d = esc_attr("yes");
		}
		$this->add_control(
			'section_bg_parallax',
			[
				'label' 	=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'type' 		=> Controls_Manager::SWITCHER,
				'label_on' 	=> __( 'Enable', 'beonepage' ),
				'label_off' => __( 'Disable', 'beonepage' ),
				'return_value' => 'yes',
				'default' 	=> $beonepage_icon_service_module_bg_parallax_d,
				'section' 	=> 'elementor_icon_service',
			]
		);		
		//Icon Service Metabox data
		$icon_service_box = array();
		$_beonepage_option_icon_service_box = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_icon_service_box', true );
		if(!empty($_beonepage_option_icon_service_box)){
			$_beonepage_option_icon_service_box = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_icon_service_box', true );
			
			foreach ( $_beonepage_option_icon_service_box as $icon_service_boxes ) :
				
				$beonepage_title = '';
				if(isset($icon_service_boxes['title']) && $icon_service_boxes['title'] != ''){
					$beonepage_title = $icon_service_boxes['title'];
				}
				$beonepage_description = '';
				if(isset($icon_service_boxes['description']) && $icon_service_boxes['description'] != ''){
					$beonepage_description = $icon_service_boxes['description'];
				}
				$beonepage_icon = '';
				if(isset($icon_service_boxes['icon']) && $icon_service_boxes['icon'] != ''){
					$beonepage_icon = $icon_service_boxes['icon'];
				}
				$beonepage_icon_img_url = '';
				if(isset($icon_service_boxes['icon_img_url']) && $icon_service_boxes['icon_img_url'] != ''){
					$beonepage_icon_img_url = $icon_service_boxes['icon_img_url'];
				}
				$beonepage_url = '';
				if(isset($icon_service_boxes['url']) && $icon_service_boxes['url'] != ''){
					$beonepage_url = $icon_service_boxes['url'];
				}
				$beonepage_animation = '';
				if(isset($icon_service_boxes['animation']) && $icon_service_boxes['animation'] != ''){
					$beonepage_animation = $icon_service_boxes['animation'];
				}
				$icon_service_box[] = array('section_icon_service_title' => $beonepage_title, 
					'section_icon_service_description' => $beonepage_description,
					'section_icon_service_icon' 	=> "fa fa-".$beonepage_icon,
					'section_icon_service_icon_image' => array('url' => $beonepage_icon_img_url),
					'section_icon_service_url' => $beonepage_url,
					'section_icon_service_animation' => $beonepage_animation,							
				);	
			endforeach;								
		}else{
			$icon_service_box = array();
		}
		
		$section_icon_service_repeater = new \Elementor\Repeater();
		$section_icon_service_repeater->add_control(
			'section_icon_service_title',
			[
				'label' 		=> __( "Title", 'beonepage' ),
				'type' 			=> Controls_Manager::TEXT,
			]
		);
		$section_icon_service_repeater->add_control(
			'section_icon_service_description',
			[
				'label' 		=> 	__( "Description", 'beonepage' ),
				'type' 			=> 	Controls_Manager::TEXTAREA,
				'rows' 			=> 	7,
			]
		);
		$section_icon_service_repeater->add_control(
			'section_icon_service_icon',
			[
				'label' 		=> 	__( "Icon", 'beonepage' ),
				'type' 			=> 	Controls_Manager::ICON,
			]
		);
		$section_icon_service_repeater->add_control(
			'section_icon_service_icon_image',
			[
				'label' 		=> __( 'Image Icon', 'beonepage' ),
				'type' 			=> Controls_Manager::MEDIA,
				'description'	=> 'Upload an image or enter an URL. (Recommended of size 40x40px)',
			]
		);
		$section_icon_service_repeater->add_control(
			'section_icon_service_url',
			[
				'label' 		=> __( "URL", 'beonepage' ),
				'type' 			=> Controls_Manager::TEXT,
				'placeholder' 	=> __( 'https://your-link.com', 'beonepage' ),
			]
		);
		$section_icon_service_repeater->add_control(
			'section_icon_service_animation',
			[
				'label' 		=> __( 'Animation', 'beonepage' ),
				'type' 			=> Controls_Manager::SELECT,
				'options' 		=> beonepage_theme_animate(),
			]
		);
		$this->add_control(
			'section_icon_service_boxes',
			[
				'label' 	=> __('Icon Service data', 'beonepage' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=>$section_icon_service_repeater->get_controls(), 
				'default' 		=> $icon_service_box,								
				'section'	 	=> 'elementor_icon_service',
			]
		);				
	}// End function	
	protected function render( $instance = [] ) {
		$settings = $this->get_settings();
		$beonepage_icon_service_module_layout = 'fixed';
			
		$class = '';
		$attribute = '';
		$beonepage_icon_service_module_bg1 = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg', 'option');
		if(!empty($beonepage_icon_service_module_bg1)){
			$beonepage_icon_service_module_bg1 = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg', 'option');
		}else{
			$beonepage_icon_service_module_bg1 = esc_attr("color");
		}
		//Background
		$beonepage_icon_service_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg_parallax', 'option');
		if(!empty($beonepage_icon_service_module_bg_parallax)){
			$beonepage_icon_service_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_icon_service_module_bg_parallax', 'option');
		}else{
			$beonepage_icon_service_module_bg_parallax = esc_attr('0');
		}
		if (  $settings['section_background'] == 'color' ) {
			$class = ' no-background';
		} else {
			$class = ' img-background';
		}
		if (  $settings['section_background'] == 'image' && $settings['section_bg_parallax'] == 'yes' ) {
			$class .= ' parallax';
			$attribute .= ' data-stellar-background-ratio="0.5"';
		}
		if ( $settings['section_background'] == 'video' ) {
			$class .= ' yt-bg-player';
			$attribute .= ' data-yt-video="' . $settings['section_youtube_url']. '"';
		}elseif( $settings['section_background'] == 'color')
		{
			$class = ' no-background';
		} else {
			$class = ' img-background';
		}
		//CONDITIONS CSS
		$beonepage_section_background_image_url = '';
		if(isset($settings['section_background_image']['url'])&& $settings['section_background_image']['url'] !=''){
			$beonepage_section_background_image_url = $settings['section_background_image']['url'];
		}
		$beonepage_section_background_color = '';
		if(isset($settings['section_background_color']) && $settings['section_background_color'] !=''){
			$beonepage_section_background_color = $settings['section_background_color'];
		}
		$beonepage_section_font_color = '';
		if(isset($settings['section_font_color']) && $settings['section_font_color'] !=''){
			$beonepage_section_font_color = $settings['section_font_color'];
		}
		$beonepage_section_separator_line_color = '';
		if(isset($settings['section_separator_line_color']) && $settings['section_separator_line_color'] !=''){
			$beonepage_section_separator_line_color = $settings['section_separator_line_color'];
		}
		$beonepage_section_separator_circle_color = '';
		if(isset($settings['section_separator_circle_color']) && $settings['section_separator_circle_color'] !=''){
			$beonepage_section_separator_circle_color = $settings['section_separator_circle_color'];
		}
		$beonepage_section_icon_background_hover = '';
		if(isset($settings['section_icon_background_hover']) && $settings['section_icon_background_hover'] !=''){
			$beonepage_section_icon_background_hover = $settings['section_icon_background_hover'];
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
			<?php if(isset($beonepage_section_background_image_url) && $beonepage_section_background_image_url !=''){?>
				.icon-service-module{
					background-image: url(<?php echo $beonepage_section_background_image_url; ?>);
				}
			<?php }
			if(isset($beonepage_section_background_color) && $beonepage_section_background_color !=''){?>	
				.icon-service-module.module {
					background-color: <?php echo $beonepage_section_background_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_font_color) && $beonepage_section_font_color !=''){?>
				.icon-service-module.module {
					color: <?php echo $beonepage_section_font_color; ?>;
				}
				<?php }
			if(isset($beonepage_section_separator_line_color) && $beonepage_section_separator_line_color !=''){?>
				.icon-service-module .separator  span {
					color: <?php echo $beonepage_section_separator_line_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_separator_circle_color) && $beonepage_section_separator_circle_color !=''){?>
				.icon-service-module .separator i {
					color: <?php echo $beonepage_section_separator_circle_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_icon_background_hover) && $beonepage_section_icon_background_hover !=''){?>
				.icon-service-module .icon-service-box:hover .service-icon {
					background-color:<?php echo $beonepage_section_icon_background_hover; ?>;
					border-color:	<?php echo $beonepage_section_icon_background_hover; ?>;
				}
			<?php } 
			if(isset($beonepage_section_background_image_rp) && $beonepage_section_background_image_rp !=''){?>
				.icon-service-module{
					background-repeat: <?php echo $beonepage_section_background_image_rp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bp) && $beonepage_section_background_image_bp !=''){?>
				.icon-service-module{
					background-position: <?php echo $beonepage_section_background_image_bp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bs) && $beonepage_section_background_image_bs !=''){?>
				.icon-service-module{
					background-size: <?php echo $beonepage_section_background_image_bs; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_ath) && $beonepage_section_background_image_ath !=''){?>
				.icon-service-module{
					background-attachment: <?php echo $beonepage_section_background_image_ath; ?>;
				}
			<?php } ?>
		</style>
		<section id="<?php  ?>" class="module icon-service-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
			<div class="<?php echo $beonepage_icon_service_module_layout == 'fixed' ? 'container' : 'container-fluid'; ?>">
				<div class="row">
					<?php if ($settings['section_title'] != '' ) : ?>
						<?php $animation = $settings['section_title_animation'] != 'none' ? ' wow ' . $settings['section_title_animation'] . '" data-wow-delay=".2s' : ''; ?>

						<div class="module-caption col-md-12 text-center<?php echo $animation; ?>">
							<h2><?php echo strip_tags( html_entity_decode($settings['section_title'] ), '<span>' ); ?></h2>

							<?php if ($settings['section_sub_title'] != '' ) : ?>
								<p><?php echo $settings['section_sub_title']; ?></p>
							<?php endif; ?>

							<div class="separator">
								<span><i class="fa fa-circle"></i></span>
							</div><!-- .separator -->

							<div class="spacer"></div>
						</div><!-- .module-caption -->
					<?php endif; ?>

					<?php $icon_service_boxes = $settings['section_icon_service_boxes']; ?>

					<?php if ( ! empty( $icon_service_boxes ) ) : ?>
						<?php foreach ( $icon_service_boxes as $icon_service_box ) : ?>
							<?php
								if ( $beonepage_icon_service_module_layout == 'fixed' ) {
									$width = 'col-md-4';
								} else {
									$width = 'col-md-3';
								}
							?>

							<div class="icon-service-box <?php echo $width; ?> text-center<?php echo isset( $icon_service_box['section_icon_service_animation'] ) && $icon_service_box['section_icon_service_animation'] != '' ? ' wow ' . $icon_service_box['section_icon_service_animation'] . '" data-wow-delay=".5s' : ''; ?>">
								<?php if ( isset( $icon_service_box['section_icon_service_url'] ) && $icon_service_box['section_icon_service_url'] != '' ) : ?>
									<a href="<?php echo $icon_service_box['section_icon_service_url']; ?>">
								<?php endif; ?>

								<div class="service-icon">
									<?php
										 if(isset( $icon_service_box['section_icon_service_icon_image']['url'] ) && $icon_service_box['section_icon_service_icon_image']['url'] !=''){
										?>
										<img src="<?php echo $icon_service_box['section_icon_service_icon_image']['url'];?>"  width="40" height="40" alt="">
									   <?php         
										}else{
										?>
									   <i class="<?php $icon = isset( $icon_service_box['section_icon_service_icon'] ) ? $icon_service_box['section_icon_service_icon'] : ''; 
										   if (strpos($icon, 'fa fa-') !== false) {
												echo $icon; 
											}else{
											   echo "fa fa-".$icon; 
											   } ?>"></i>       
									   <?php
										}
									   ?>
								</div><!-- .service-icon -->

								<?php if ( isset( $icon_service_box['section_icon_service_title'] ) && $icon_service_box['section_icon_service_title'] != '' ) : ?>
									<h3 class="service-title"><?php echo $icon_service_box['section_icon_service_title']; ?></h3>
								<?php endif; ?>

								<?php if ( isset( $icon_service_box['section_icon_service_description'] ) && $icon_service_box['section_icon_service_description'] != '' ) : ?>
									<p class="service-content"><?php echo $icon_service_box['section_icon_service_description']; ?></p>
								<?php endif; ?>

								<?php if ( isset( $icon_service_box['section_icon_service_url'] ) && $icon_service_box['section_icon_service_url'] != '' ) : ?>
									</a>
								<?php endif; ?>

								<div class="spacer"></div>
							</div><!-- .icon-service-box -->
						<?php endforeach; ?> 
					<?php endif; ?>
				</div><!-- .row -->
			</div><!-- .container -->
		</section><!-- #icon-service -->
	<?php		
	}		
	protected function content_template() {}
	public function render_plain_content( $instance = [] ) {}		
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_My_Custom_Elementor_Icon_Service );