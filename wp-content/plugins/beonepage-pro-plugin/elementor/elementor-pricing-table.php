<?php
namespace Elementor;

use Elementor\Core\Schemes\Color;

if ( ! defined( 'ABSPATH' ) ) exit;
class Widget_My_Custom_Elementor_Pricing_Table extends Widget_Base {
	
	public function get_categories() {
		return [ 'beonepage-widgets' ];
	}
	public function get_name() {
		return 'elementor-pricing-table';
	}
	public function get_title() {
		return __( 'BeOne Pricing Table', 'beonepage' );
	}
	public function get_icon() {
		return 'fa fa-table';
	}
	protected function _register_controls() {
		$this->add_control(
			'elementor_pricing_table',
			[
			   'label' => __( 'Pricing Table Option', 'beonepage' ),
			   'type' 	=> Controls_Manager::SECTION,
			]
		);
		// Title
		$beonepage_pricing_table_module_title = beonepage_olddata_fetch_redux('front_page_pricing_table_module_title', 'option');
		if(!empty($beonepage_pricing_table_module_title)){
			$beonepage_pricing_table_module_title = beonepage_olddata_fetch_redux('front_page_pricing_table_module_title', 'option');
			$beonepage_pricing_table_module_title = html_entity_decode($beonepage_pricing_table_module_title);
		}else{
			$beonepage_pricing_table_module_title = wp_kses("See Our <span>Plans</span>",array('span' => array()));
		}
		$this->add_control(
			'section_title',
			[
				'label' 	=> __( "Title", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_pricing_table_module_title,
				'title'		=> __( 'Enter Title', 'beonepage' ),
				'section' 	=> 'elementor_pricing_table',
			]
		);
		//Sub title
		$beonepage_pricing_table_module_subtitle = beonepage_olddata_fetch_redux('front_page_pricing_table_module_subtitle', 'option');
		if(!empty($beonepage_pricing_table_module_subtitle)){
			$beonepage_pricing_table_module_subtitle = beonepage_olddata_fetch_redux('front_page_pricing_table_module_subtitle', 'option');
			$beonepage_pricing_table_module_subtitle = html_entity_decode($beonepage_pricing_table_module_subtitle);
		}else{
			$beonepage_pricing_table_module_subtitle = esc_attr("Find the plan that fits your needs");
		}
		$this->add_control(
			'section_sub_title',
			[
				'label' 	=> __( "Sub Title", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_pricing_table_module_subtitle,
				'title' 	=> __( 'Enter Sub Title', 'beonepage' ),
				'section' 	=> 'elementor_pricing_table',
			]
		);
		//Caption Animation
		$beonepage_pricing_table_module_animation = beonepage_olddata_fetch_redux('front_page_pricing_table_module_animation', 'option');
		if(!empty($beonepage_pricing_table_module_animation)){
			$beonepage_pricing_table_module_animation = beonepage_olddata_fetch_redux('front_page_pricing_table_module_animation', 'option');
		}else{
			$beonepage_pricing_table_module_animation = esc_attr("bounceInDown");
		}
		$this->add_control(
		   'section_caption_animation',
			[
			   'label'   => __( 'Caption Animation', 'beonepage' ),
			   'type'    => Controls_Manager::SELECT,
			   'default' => $beonepage_pricing_table_module_animation,
			   'options' => beonepage_theme_animate(),
			   'section' => 'elementor_pricing_table',
			]
		);
		// Font Color
		$beonepage_pricing_table_module_color = beonepage_olddata_fetch_redux('front_page_pricing_table_module_color', 'option');
		if(!empty($beonepage_pricing_table_module_color)){
			$beonepage_pricing_table_module_color = beonepage_olddata_fetch_redux('front_page_pricing_table_module_color', 'option');
		}else{
			$beonepage_pricing_table_module_color = esc_attr("#eceff3");
		}
		$this->add_control(
			'section_font_color',
			[
				'label' 	=> __( "Font Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_pricing_table_module_color,
				'scheme' 	=> [
					'type' 		=> Color::get_type(),
					'value' 	=> Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-table-module' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_pricing_table',
			]			
		);
		//Separator Line Color
		$beonepage_pricing_table_module_sp_color = beonepage_olddata_fetch_redux('front_page_pricing_table_module_sp_color', 'option');
		if(!empty($beonepage_pricing_table_module_sp_color)){
			$beonepage_pricing_table_module_sp_color = beonepage_olddata_fetch_redux('front_page_pricing_table_module_sp_color', 'option');
		}else{
			$beonepage_pricing_table_module_sp_color = esc_attr("#888");
		}
		$this->add_control(
			'section_separator_line_color',
			[
				'label' 	=> __( "Separator Line Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_pricing_table_module_sp_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-table-module .separator span:after, .pricing-table-module .separator span:before' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_pricing_table',
			]			
		);
		//Separator Circle & Featured Table Color
		$beonepage_pricing_table_module_sp_i_color = beonepage_olddata_fetch_redux('front_page_pricing_table_module_sp_i_color', 'option');
		if(!empty($beonepage_pricing_table_module_sp_i_color)){
			$beonepage_pricing_table_module_sp_i_color = beonepage_olddata_fetch_redux('front_page_pricing_table_module_sp_i_color', 'option');
		}else{
			$beonepage_pricing_table_module_sp_i_color = esc_attr("#ffcc00");
		}
		$this->add_control(
			'section_separator_circle_color',
			[
				'label' 	=> __( "Separator Circle & Featured Table Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_pricing_table_module_sp_i_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-table-module .separator i' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_pricing_table',
			]			
		);
		//Pricing Table Box Font Color
		$beonepage_pricing_table_module_box = beonepage_olddata_fetch_redux('front_page_pricing_table_module_box', 'option');
		if(!empty($beonepage_pricing_table_module_box)){
			$beonepage_pricing_table_module_box = beonepage_olddata_fetch_redux('front_page_pricing_table_module_box', 'option');
		}else{
			$beonepage_pricing_table_module_box = esc_attr("#ffcc00");
		}
		$this->add_control(
			'section_table_box_font_color',
			[
				'label' 	=> __( "Pricing Table Box Font Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_pricing_table_module_box,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-item, .pb-star, .pb-active-price, .pb-special-price' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_pricing_table',
			]			
		);
		//Pricing Table Box professinal Font Color
		$beonepage_pricing_table_module_box_feature_color = esc_attr("#fff");
		$this->add_control(
			'section_table_feature_box_font_color',
			[
				'label' 	=> __( "Pricing Table feature price Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_pricing_table_module_box_feature_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .pb-special-price' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_pricing_table',
			]			
		);
		//Pricing Table Box Background Color
		$beonepage_pricing_table_module_box_bg = beonepage_olddata_fetch_redux('front_page_pricing_table_module_box_bg', 'option');
		if(!empty($beonepage_pricing_table_module_box_bg)){
			$beonepage_pricing_table_module_box_bg = beonepage_olddata_fetch_redux('front_page_pricing_table_module_box_bg', 'option');
		}else{
			$beonepage_pricing_table_module_box_bg = esc_attr("#ffcc00");
		}
		$this->add_control(
			'section_table_box_background_color',
			[
				'label' 	=> __( "Pricing Table Box Background Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_pricing_table_module_box_bg,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-item' => 'Background-color: {{VALUE}}',
				],
				'section' 	=> 'elementor_pricing_table',
			]			
		);
		//Button Style
		$beonepage_pricing_table_module_btn_style = beonepage_olddata_fetch_redux('front_page_pricing_table_module_btn_style1', 'option');
		if(!empty($beonepage_pricing_table_module_btn_style)){
			$beonepage_pricing_table_module_btn_style = beonepage_olddata_fetch_redux('front_page_pricing_table_module_btn_style1', 'option');
			$beonepage_pricing_table_module_btn_style = $beonepage_pricing_table_module_btn_style;
		}else{
			$beonepage_pricing_table_module_btn_style = esc_attr("Light");
		}
		$this->add_control(
			'section_button_style1',
			[
				'label' 	=> __( "Button Style", 'beonepage' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'options' 	=> [
					'light' => [
						'title' => __( 'Light', 'beonepage' ),
						'icon' 	=> 'fa fa-circle-o',
					],
					'dark' 	=> [
						'title' => __( 'Dark', 'beonepage' ),
						'icon' 	=> 'fa fa-circle',
					],
				],
				'default' 	=> $beonepage_pricing_table_module_btn_style,
				'toggle' 	=> true,
				'section' 	=> 'elementor_pricing_table',
			]		 
		);
		//Background setting                
		$class 	= '';
		$attribute = '';
		$beonepage_pricing_table_module_bg = beonepage_olddata_fetch_redux('front_page_pricing_table_module_bg', 'option');
		if(!empty($beonepage_pricing_table_module_bg)){
			$beonepage_pricing_table_module_bg = beonepage_olddata_fetch_redux('front_page_pricing_table_module_bg', 'option');
		}else{
			$beonepage_pricing_table_module_bg = esc_attr("color");
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
				'default' 	=> $beonepage_pricing_table_module_bg,
				'toggle' 	=> true,
				'section' 	=> 'elementor_pricing_table',
			]
		);
		//Background Color
		$beonepage_pricing_table_module_bg_color = beonepage_olddata_fetch_redux('front_page_pricing_table_module_bg_color', 'option');
        if(!empty($beonepage_pricing_table_module_bg_color)){
          $beonepage_pricing_table_module_bg_color = beonepage_olddata_fetch_redux('front_page_pricing_table_module_bg_color', 'option');
		}else{
          $beonepage_pricing_table_module_bg_color = esc_attr("#181a1c");
        }
        $this->add_control(
			'section_background_color',
			[
				'label' 	=> __( "Background Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_pricing_table_module_bg_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
				   '{{WRAPPER}} .pricing-table-module' => 'Background-color: {{VALUE}}',
				],
				'condition' => [
					'section_background' => 'color',
				],
				'section' 	=> 'elementor_pricing_table',
			]         
        );
        
		//Background image 
		$beonepage_pricing_table_module_bg_img = beonepage_olddata_fetch_redux('front_page_pricing_table_module_bg_img', 'option');
		if(!empty($beonepage_pricing_table_module_bg_img['background-image'])){
			$beonepage_pricing_table_module_bg_img = beonepage_olddata_fetch_redux('front_page_pricing_table_module_bg_img', 'option');
			$beonepage_pricing_table_module_bg_img_url = $beonepage_pricing_table_module_bg_img['background-image'];
		}else{
			$beonepage_pricing_table_module_bg_img_url = \Elementor\Utils::get_placeholder_image_src();
		}
		$this->add_control(
		   'section_background_image',
			[
				'label' 	=> __( "Bakground Image", 'beonepage' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
				   'url' => esc_url($beonepage_pricing_table_module_bg_img_url),
				],
				'condition' => [
				   'section_background' => 'image',
				],
				'section' 	=> 'elementor_pricing_table',
			]        
		);
		// Background Repeat
		$beonepage_pricing_table_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_pricing_table_module_bg_img', 'option');
		if(!empty($beonepage_pricing_table_module_bg_img_rp['background-repeat'])){
			$beonepage_pricing_table_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_pricing_table_module_bg_img', 'option');
			$beonepage_pricing_table_module_bg_img_rp = $beonepage_pricing_table_module_bg_img_rp['background-repeat'];
		}else{
			$beonepage_pricing_table_module_bg_img_rp = esc_attr("No Repeat");
		}
		$this->add_control(
			'section_background_image_rp',
			[
				'label' 	=> __( 'Background Repeat', 'beonepage' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> $beonepage_pricing_table_module_bg_img_rp,
				'options' 		=> [
					'no-repeat'  => __( 'No Repeat', 'beonepage' ),
					'repeat' => __( 'Repeat All', 'beonepage' ),
					'repeat-x' => __( 'Repeat Horizontally', 'beonepage' ),
					'repeat-y' => __( 'Repeat Vertically', 'beonepage' ),
				],
				'section' 	=> 'elementor_pricing_table',
				'condition' => [
				   'section_background' => 'image',
				],
			]         
		);
		 //Background Position
		$beonepage_pricing_table_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_pricing_table_module_bg_img', 'option');
		if(!empty($beonepage_pricing_table_module_bg_img_bp['background-position'])){
		  $beonepage_pricing_table_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_pricing_table_module_bg_img', 'option');
		  $beonepage_pricing_table_module_bg_img_bp = $beonepage_pricing_table_module_bg_img_bp['background-position'];
		}else{
		   $beonepage_pricing_table_module_bg_img_bp = esc_attr("Left Top");
		}
		$this->add_control(
			'section_background_image_bp',
			[
				'label' 	=> __( 'Background Position', 'beonepage' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> $beonepage_pricing_table_module_bg_img_bp,
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
				'section' 	=> 'elementor_pricing_table',
				'condition' => [
					'section_background' => 'image',
				],
			]    
		);
		//Background Size
		$beonepage_pricing_table_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_pricing_table_module_bg_img', 'option');
		if(!empty($beonepage_pricing_table_module_bg_img_bs['background-size'])){
			$beonepage_pricing_table_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_pricing_table_module_bg_img', 'option');
			$beonepage_pricing_table_module_bg_img_bs = $beonepage_pricing_table_module_bg_img_bs['background-size'];
		}else{
			$beonepage_pricing_table_module_bg_img_bs = esc_attr("auto");
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
				'default' 		=> $beonepage_pricing_table_module_bg_img_bs,
				'toggle' 		=> true,
				'condition' 	=> [
					'section_background' => 'image',
				],
				'section' => 'elementor_pricing_table',
			]
		);
		//Background Attachment
		$beonepage_pricing_table_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_pricing_table_module_bg_img', 'option');
		if(!empty($beonepage_pricing_table_module_bg_img_ath['background-attachment'])){
			$beonepage_pricing_table_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_pricing_table_module_bg_img', 'option');
			$beonepage_pricing_table_module_bg_img_ath = $beonepage_pricing_table_module_bg_img_ath['background-attachment'];
		}else{
			$beonepage_pricing_table_module_bg_img_ath = esc_attr("Scroll");
		}   
		$this->add_control(
			'section_background_image_ath',
			[
				'label' 	=> __( "Background Attachment", 'beonepage' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'options' 	=> [
				   'scroll' 	=> [
					   'title' 	=> __( 'Scroll', 'beonepage' ),
					   'icon' 	=> 'fa fa-arrow-circle-right',
					],
				   'fixed' 		=> [
					   'title' 	=> __( 'Fixed', 'beonepage' ),
					   'icon' 	=> 'fa fa-arrows-alt',
					],                   
				],
				'default' 	=> $beonepage_pricing_table_module_bg_img_ath,
				'toggle' 	=> true,
				'condition' => [
					'section_background' => 'image',
				],
				'section' 	=> 'elementor_pricing_table',
			]         
		);
		//Background video field
		$beonepage_pricing_table_module_bg_video = beonepage_olddata_fetch_redux('front_page_pricing_table_module_bg_video', 'option');
		if(!empty($beonepage_pricing_table_module_bg_video)){
			$beonepage_pricing_table_module_bg_video = beonepage_olddata_fetch_redux('front_page_pricing_table_module_bg_video', 'option');
			$beonepage_pricing_table_module_bg_video = html_entity_decode($beonepage_pricing_table_module_bg_video);
		}else{
			$beonepage_pricing_table_module_bg_video =  esc_attr("Video Url");
		}
		$this->add_control(
			'section_youtube_url',
			[
				'label' 	=> __( "YouTube URL", 'beonepage' ),
				'type'		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_pricing_table_module_bg_video,
				'condition' => [
					'section_background' => 'video',
				],
				'description' => __( 'IMPORTANT NOTE: The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so its better to define both Image and YouTube Video for best results.', 'beonepage' ),
				'section' 	=> 'elementor_pricing_table',
			]        
		   );      
		//Parallax setting
		$beonepage_pricing_table_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_pricing_table_module_bg_parallax', 'option');
		if(!empty($beonepage_pricing_table_module_bg_parallax)){
			$beonepage_pricing_table_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_pricing_table_module_bg_parallax', 'option');
			$beonepage_pricing_table_module_bg_parallax = html_entity_decode($beonepage_pricing_table_module_bg_parallax);
		if($beonepage_pricing_table_module_bg_parallax == 1){
			$beonepage_pricing_table_module_bg_parallax_d = esc_attr("yes");
		}else{
			$beonepage_pricing_table_module_bg_parallax_d = esc_attr("no");
		}  
		}else{
			$beonepage_pricing_table_module_bg_parallax_d = esc_attr("yes");
		}
		$this->add_control(
			'section_bg_parallax',
			[
				'label' 		=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Enable', 'beonepage' ),
				'label_off' 	=> __( 'Disable', 'beonepage' ),
				'return_value' 	=> 'yes',
				'default' 		=> $beonepage_pricing_table_module_bg_parallax_d,
				'section'		=> 'elementor_pricing_table',
			]
		);
		//Pricing Table Metabox data
		$result = array();
		$_beonepage_option_pricing_table = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_pricing_table', true );
		if(!empty($_beonepage_option_pricing_table)){
			$_beonepage_option_pricing_table = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_pricing_table', true );
			
			foreach ( $_beonepage_option_pricing_table as $pricing_table ) :
			
				$beonepage_pick = '';
				if(isset($pricing_table['pick']) && $pricing_table['pick'] != ''){
					$beonepage_pick = $pricing_table['pick'];
				}
				$beonepage_title = '';
				if(isset($pricing_table['title']) && $pricing_table['title'] != ''){
					$beonepage_title = $pricing_table['title'];
				}
				$beonepage_currency = '';
				if(isset($pricing_table['currency']) && $pricing_table['currency'] != ''){
					$beonepage_currency = $pricing_table['currency'];
				}
				$beonepage_duration = '';
				if(isset($pricing_table['duration']) && $pricing_table['duration'] != ''){
					$beonepage_duration = $pricing_table['duration'];
				}
				$beonepage_price = '';
				if(isset($pricing_table['price']) && $pricing_table['price'] != ''){
					$beonepage_price = $pricing_table['price'];
				}
				$beonepage_btn_text = '';
				if(isset($pricing_table['btn_text']) && $pricing_table['btn_text'] != ''){
					$beonepage_btn_text = $pricing_table['btn_text'];
				}
				$beonepage_btn_url = '';
				if(isset($pricing_table['btn_url']) && $pricing_table['btn_url'] != ''){
					$beonepage_btn_url = $pricing_table['btn_url'];
				}
				$beonepage_animation = '';
				if(isset($pricing_table['animation']) && $pricing_table['animation'] != ''){
					$beonepage_animation = $pricing_table['animation'];
				}
				$beonepage_content = '';
				if(isset($pricing_table['content']) && $pricing_table['content'] != ''){
					$beonepage_content = $pricing_table['content'];
				}
				$result[] = array('section_pricing_table_pick' => $beonepage_pick, 
					'section_pricing_table_title' => $beonepage_title,
					'section_pricing_table_currency' => $beonepage_currency,
					'section_pricing_table_duration' => $beonepage_duration,
					'section_pricing_table_price' => $beonepage_price,							
					'section_pricing_table_button_text' => $beonepage_btn_text,							
					'section_pricing_table_button_url' => $beonepage_btn_url,							
					'section_pricing_table_animation' => $beonepage_animation,							
					'section_pricing_table_content' => $beonepage_content,							
				);	
			endforeach;		
		}else{
			$result = array();
		}
		$section_pricing_table_repeater = new \Elementor\Repeater();
		$section_pricing_table_repeater->add_control(
			'section_pricing_table_pick', 
			[
				'label' 		=> __( 'Featuring?', 'beonepage' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Enable', 'beonepage' ),
				'label_off' 	=> __( 'Disable', 'beonepage' ),
				'return_value' 	=> 'on',
				'description'	=> 'Featuring a table will mark it with a star.',
			]
		);
		$section_pricing_table_repeater->add_control(
			'section_pricing_table_title', 
			[
				'label' 		=> __( "Title", 'beonepage' ),
				'type' 			=> Controls_Manager::TEXT,
			]
		);
		$section_pricing_table_repeater->add_control(
			'section_pricing_table_currency', 
			[
				'label' 		=> __( "Currency", 'beonepage' ),
				'type' 			=> Controls_Manager::TEXT,
				'description'	=> 'Input your desired currency symbol here. e.g. "$".',
			]
		);
		$section_pricing_table_repeater->add_control(
			'section_pricing_table_duration', 
			[
				'label' 		=> __( "Duration", 'beonepage' ),
				'type' 			=> Controls_Manager::TEXT,
				'description'	=> 'If your pricing is subscription based, input the subscription payment cycle here. e.g. monthly.',
			]
		);
		$section_pricing_table_repeater->add_control(
			'section_pricing_table_price', 
			[
				'label' 		=> __( "Price", 'beonepage' ),
				'type' 			=> Controls_Manager::TEXT,
			]
		);
		$section_pricing_table_repeater->add_control(
			'section_pricing_table_button_text', 
			[
				'label' 		=> __( "Button Text", 'beonepage' ),
				'type' 			=> Controls_Manager::TEXT,
			]
		);
		$section_pricing_table_repeater->add_control(
			'section_pricing_table_button_url', 
			[
				'label' 		=> __( "Button URL", 'beonepage' ),
				'type' 			=> Controls_Manager::TEXT,
				'placeholder' 	=> __( 'https://your-link.com', 'beonepage' ),
			]
		);
		$section_pricing_table_repeater->add_control(
			'section_pricing_table_animation', 
			[
				'label' 		=> __( 'Animation', 'beonepage' ),
				'type' 			=> Controls_Manager::SELECT,
				'options' 		=> beonepage_theme_animate(),
			]
		);
		$section_pricing_table_repeater->add_control(
			'section_pricing_table_content', 
			[
				'label' 		=> 	__( "Content", 'beonepage' ),
				'type' 			=> 	Controls_Manager::WYSIWYG,
				'rows' 			=> 	7,
			]
		);
		$this->add_control(
		'section_pricing_table_boxes',
			[
				'label' 	=> __('Pricing Table data', 'beonepage' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=> $section_pricing_table_repeater->get_controls(),
				'default' 	=> $result,								
				'section'	=> 'elementor_pricing_table',
			]
		);	
	}// End function
	protected function render( $instance = [] ) {
		$settings = $this->get_settings();
		$class = '';
		$attribute = '';    
        if ( $settings['section_background'] == 'color' ) {
			$class = ' no-background';
		} else {
			$class = ' img-background';
		}
		if ( $settings['section_background'] == 'image' && $settings['section_bg_parallax']== 'yes' ) {
			$class .= ' parallax';
			$attribute = ' data-stellar-background-ratio="0.5"';
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
		
		//conitions For Css
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
		$beonepage_section_table_box_font_color = '';
		if(isset($settings['section_table_box_font_color']) && $settings['section_table_box_font_color'] !=''){
			$beonepage_section_table_box_font_color = $settings['section_table_box_font_color'];
		}
		$beonepage_table_box_background_color = '';
		if(isset($settings['section_table_box_background_color']) && $settings['section_table_box_background_color'] !=''){
			$beonepage_table_box_background_color = $settings['section_table_box_background_color'];
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
		} ?>
		<style>
			<?php if(isset($beonepage_section_background_image_url) && $beonepage_section_background_image_url !=''){?>
				.pricing-table-module{
					background-image: url(<?php echo $beonepage_section_background_image_url; ?>);
				}
			<?php }
			if(isset($beonepage_section_background_color) && $beonepage_section_background_color !=''){?>
				.pricing-table-module{
					background-color: <?php echo $beonepage_section_background_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_font_color) && $beonepage_section_font_color !=''){?>
				.pricing-table-module{
					color: <?php echo $beonepage_section_font_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_separator_line_color) && $beonepage_section_separator_line_color !=''){?>	
			.pricing-table-module .separator span{
					color: <?php echo $beonepage_section_separator_line_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_separator_circle_color) && $beonepage_section_separator_circle_color !=''){?>	
				.pricing-table-module .separator i, .item-price {
					color: <?php echo $beonepage_section_separator_circle_color; ?>;
				}
				.item-price {
					border-color: <?php echo $beonepage_section_separator_circle_color; ?>;
				}
				.pb-active-price, .pb-star {
					background-color: <?php echo $beonepage_section_separator_circle_color; ?>;
				}
				star:after {
					background-color: <?php echo $beonepage_section_separator_circle_color; ?>;
				}
				.pb-special-price {
					background-color: <?php echo $beonepage_section_separator_circle_color; ?>; 
				}
			<?php }
			if(isset($beonepage_section_table_box_font_color) && $beonepage_section_table_box_font_color !=''){?>	
				.pb-special-price, .pricing-item, .pb-active-price, .pb-star {
					color: <?php echo $beonepage_section_table_box_font_color; ?>;
				}
			<?php }
			if(isset($beonepage_table_box_background_color) && $beonepage_table_box_background_color !=''){?>
				.pricing-item{
					background-color: <?php echo $beonepage_table_box_background_color; ?>;
				}
				.pb-star:after {
					border-bottom-color: <?php echo $beonepage_table_box_background_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_rp) && $beonepage_section_background_image_rp !=''){?>
				.pricing-table-module{
					background-repeat: <?php echo $beonepage_section_background_image_rp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bp) && $beonepage_section_background_image_bp !=''){?>
				.pricing-table-module{
					background-position: <?php echo $beonepage_section_background_image_bp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bs) && $beonepage_section_background_image_bs !=''){?>
				.pricing-table-module{
					background-size: <?php echo $beonepage_section_background_image_bs; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_ath) && $beonepage_section_background_image_ath !=''){?>
				.pricing-table-module{
					background-attachment: <?php echo $beonepage_section_background_image_ath; ?>;
				}
			<?php } ?>
			
		</style>

		<section id="pricing-table-module" class="module pricing-table-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
			<div class="container">
				<div class="row">
					<?php if ($settings['section_title'] != '' ) : ?>
						<?php $animation = $settings['section_caption_animation'] != 'none' ? ' wow ' . $settings['section_caption_animation'] . '" data-wow-delay=".2s' : ''; ?>

						<div class="module-caption col-md-12 text-center<?php echo $animation; ?>">
							<h2><?php echo strip_tags( html_entity_decode( $settings['section_title'] ), '<span>' ); ?></h2>

							<?php if ( $settings['section_sub_title'] != '' ) : ?>
								<p><?php echo $settings['section_sub_title']; ?></p>
							<?php endif; ?>

							<div class="separator">
								<span><i class="fa fa-circle"></i></span>
							</div><!-- .separator -->

							<div class="spacer"></div>
						</div><!-- .module-caption -->
					<?php endif; ?>

					<div class="pricing-table-container text-center clearfix">
						<?php
							$pricing_tables = $settings['section_pricing_table_boxes'];
							$pricing_table_num = count( $pricing_tables );

							if ( $pricing_table_num < 4 ) {
								$col_md = 'col-md-4';
							} else {
								$col_md = 'col-md-3';
							}
						?>

						<?php if ( ! empty( $pricing_tables ) ) : ?>
							<?php foreach ( $pricing_tables as $pricing_table ) : ?>
								<div class="<?php echo esc_attr( $col_md ); ?> wow <?php echo isset( $pricing_table['section_pricing_table_animation'] ) && $pricing_table['section_pricing_table_animation'] != 'none' ? $pricing_table['section_pricing_table_animation'] : ''; ?>" data-wow-delay=".5s">
									<?php if ( isset( $pricing_table['section_pricing_table_pick'] ) && $pricing_table['section_pricing_table_pick'] == 'on' ) : ?>
										<div class="pb-featured">
											<span class="pb-star"><i class="fa fa-star"></i></span>
										</div><!-- pb-featured -->
									<?php endif; ?>

									<div class="pricing-item">
										<?php if ( isset( $pricing_table['section_pricing_table_title'] ) && $pricing_table['section_pricing_table_title'] != '' ) : ?>
											<h3 class="pb-heading"><?php echo $pricing_table['section_pricing_table_title']; ?></h3>
										<?php endif; ?>

										<div class="item-price<?php echo isset( $pricing_table['section_pricing_table_pick'] ) && $pricing_table['section_pricing_table_pick'] == 'on' ? ' pb-special-price' : ''; ?>">
											<div class="price-wrapper">
												<?php if ( isset( $pricing_table['section_pricing_table_currency'] ) && $pricing_table['section_pricing_table_currency'] != '' ) : ?>
													<span class="pb-currency"><?php echo $pricing_table['section_pricing_table_currency']; ?></span>
												<?php endif; ?>

												<?php if ( isset( $pricing_table['section_pricing_table_price'] ) && $pricing_table['section_pricing_table_price'] != '' ) : ?>
													<span class="pb-price"><?php echo $pricing_table['section_pricing_table_price']; ?></span>
												<?php endif; ?>
											</div>

											<?php if ( isset( $pricing_table['section_pricing_table_duration'] ) && $pricing_table['section_pricing_table_duration'] != '' ) : ?>
												<div class="pb-duration"><?php echo $pricing_table['section_pricing_table_duration']; ?></div>
											<?php endif; ?>
										</div><!-- item-price -->

										<?php if ( isset( $pricing_table['section_pricing_table_content'] ) && $pricing_table['section_pricing_table_content'] != '' ) : ?>
											<div class="pb-detail">
												<?php
													$items = explode( "\n", $pricing_table['section_pricing_table_content'] );

													echo '<ul>';

													foreach( $items as $item ) {
														if ( strpos( $item, '+' ) === 0 ) {
															$item = str_replace( '+', '<i class="fa fa-check-square-o"></i>', $item );
														} elseif ( strpos( $item, '-' ) === 0 ) {
															$item = str_replace( '-', '<i class="fa fa-times"></i>', $item );
														}

														echo '<li>' . str_replace( array( "\r", "\n" ), '' , $item ) . '</li>';
													}

													echo '</ul>';
												?>
											</div><!-- pb-detail -->
										<?php endif; ?>

										<a href="<?php echo isset( $pricing_table['section_pricing_table_button_url'] ) && $pricing_table['section_pricing_table_button_url'] != '' ? $pricing_table['section_pricing_table_button_url'] : ''; ?>" class="btn <?php echo $settings['section_button_style1'] == 'Light' ? 'btn-light' : 'btn-dark'; ?>">
											<?php echo isset( $pricing_table['section_pricing_table_button_text'] ) && $pricing_table['section_pricing_table_button_text'] != '' ? $pricing_table['section_pricing_table_button_text'] : ''; ?>
										</a>
									</div><!-- pricing-item -->
								</div><!-- .col-md-* -->
							<?php endforeach; ?> 
						<?php endif; ?>
					</div><!-- .pricing-table-container -->
				</div><!-- .row -->
			</div><!-- .container -->
		</section><!-- #pricing-table -->
		<?php
		if ( Plugin::$instance->editor->is_edit_mode() ) :  
			?>
			<script> 
			(function($) {
				
				APP.pricingTable = {
					init: function() {
						APP.pricingTable.active();
					},

					active: function() {
						if ($('.pricing-item').length > 0) {
							$('.pricing-item').each(function() {
								$(this).hover(function() {
									if ($(this).find('.pb-special-price').length == 0) {
										$(this).find('.item-price').addClass('pb-active-price');
										$('.pricing-table-container').find('.pb-special-price').addClass('special-price').removeClass('pb-special-price');
									}
								}, function() {
									if ($(this).find('.pb-active-price').length > 0) {
										$(this).find('.pb-active-price').removeClass('pb-active-price');
										$('.pricing-table-container').find('.special-price').removeClass('special-price').addClass('pb-special-price');
									}
								});
							});
						}
					}
				}			
				APP.pricingTable.init();
			})(jQuery);
			</script>  
			<?php
		endif;
	}
	protected function content_template() {}
	public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_My_Custom_Elementor_Pricing_Table );
