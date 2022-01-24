<?php
namespace Elementor;
use Elementor\Core\Schemes\Color;
if ( ! defined( 'ABSPATH' ) ) exit;
class Widget_My_Custom_Elementor_Process extends Widget_Base {
	
	public function get_categories() {
		return [ 'beonepage-widgets' ];
	}
	public function get_name() {
		return 'elementor-process';
	}
	public function get_title() {
      return __( 'BeOne Process Flow', 'beonepage' );
	}
	public function get_icon() {
      return 'fa fa-gear';
	}
	protected function _register_controls() {
		$this->add_control(
			'elementor_process',
			[
				'label' => __( 'Process Flow Option', 'beonepage' ),
				'type' => Controls_Manager::SECTION,
			]
		);
		// Title
		$beonepage_process_module_title = beonepage_olddata_fetch_redux('front_page_process_module_title', 'option');
		if(!empty($beonepage_process_module_title)){
			$beonepage_process_module_title = beonepage_olddata_fetch_redux('front_page_process_module_title', 'option');
			$beonepage_process_module_title = html_entity_decode($beonepage_process_module_title);
		}else{
			$beonepage_process_module_title = wp_kses("<span>Process</span> Flow",array('span' => array()));
		}
		$this->add_control(
			'section_title',
			[
				'label' 	=> __( "Section Title", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_process_module_title,
				'title' 	=> __( 'Enter Title', 'beonepage' ),
				'section' 	=> 'elementor_process',
			]
		);
		//Sub Title
		$beonepage_process_module_subtitle = beonepage_olddata_fetch_redux('front_page_process_module_subtitle', 'option');
		if(!empty($beonepage_process_module_subtitle)){
			$beonepage_process_module_subtitle = beonepage_olddata_fetch_redux('front_page_process_module_subtitle', 'option');
			$beonepage_process_module_subtitle = html_entity_decode($beonepage_process_module_subtitle);
		}else{
			$beonepage_process_module_subtitle =esc_attr("How is our work");
		}
		$this->add_control(
			'section_sub_title',
			[
				'label'     => __( "Section Sub Title", 'beonepage' ),
				'type'     	=> Controls_Manager::TEXT,
				'default'   => $beonepage_process_module_subtitle,
				'title'     => __( 'Enter Sub Title', 'beonepage' ),
				'section'   => 'elementor_process',
			]
		);
		//Caption Animation
		$beonepage_process_module_animation = beonepage_olddata_fetch_redux('front_page_process_module_animation', 'option');
		if(!empty($beonepage_process_module_animation)){
			$beonepage_process_module_animation = beonepage_olddata_fetch_redux('front_page_process_module_animation', 'option');
        }else{
			$beonepage_process_module_animation = esc_attr("flipInY");
        }
        $this->add_control(
			'section_caption_animation',
            [
                'label'   	=> __( 'Caption Animation', 'beonepage' ),
                'type'      => Controls_Manager::SELECT,
                'default' 	=> $beonepage_process_module_animation,
                'options' 	=> beonepage_theme_animate(),
                'section' 	=> 'elementor_process',
            ]        
        );
        //Font Color
        $beonepage_process_module_color = beonepage_olddata_fetch_redux('front_page_process_module_color', 'option');
		if(!empty($beonepage_process_module_color)){
			$beonepage_process_module_color = beonepage_olddata_fetch_redux('front_page_process_module_color', 'option');
        }else{
			$beonepage_process_module_color =esc_attr("#eceff3");
        }
        $this->add_control(
			'section_font_color',
			[
				'label' 	=> __( "Font Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_process_module_color,
				'scheme' 	=> [
                    'type' 	=> Color::get_type(),
                    'value' => Color::COLOR_1,
                ],
                'selectors' => [
                   '{{WRAPPER}} .module-caption, {{WRAPPER}} .process-item p' => 'color: {{VALUE}}',
                ],
				'section' 	=> 'elementor_process',
			]        
        );
        //Separator Line Color
        $beonepage_process_module_sp_color = beonepage_olddata_fetch_redux('front_page_process_module_sp_color', 'option');
		if(!empty($beonepage_process_module_sp_color)){
			$beonepage_process_module_sp_color = beonepage_olddata_fetch_redux('front_page_process_module_sp_color', 'option');
        }else{
			$beonepage_process_module_sp_color = esc_attr("#888");
        }      
        $this->add_control(
			'section_separator_line_color',
			[
				'label'		=> __( "Separator Line Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_process_module_sp_color,
				'scheme' 	=> [
                    'type' 	=> Color::get_type(),
                    'value' => Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .process-module .separator span:before, .process-module .separator span:after' => 'color: {{VALUE}}',
                ],
				'section' 	=> 'elementor_process',
			]         
        );
        //Separator Circle Color       
        $beonepage_process_module_sp_i_color = beonepage_olddata_fetch_redux('front_page_process_module_sp_i_color', 'option');
        if(!empty($beonepage_process_module_sp_i_color)){
			$beonepage_process_module_sp_i_color = beonepage_olddata_fetch_redux('front_page_process_module_sp_i_color', 'option');
        }else{
			$beonepage_process_module_sp_i_color = esc_attr("#ffcc00");
        }       
        $this->add_control(
			'section_separator_circle_color',
			[
				'label' 	=> __( "Separator Circle Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_process_module_sp_i_color,
				'scheme' 	=> [
                    'type' 	=> Color::get_type(),
                    'value' => Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .process-module .separator i' => 'color: {{VALUE}}',
                ],
				'section' 	=> 'elementor_process',
			]        
        );
		//Process Label Color
        $beonepage_process_module_hover_label_color = beonepage_olddata_fetch_redux('front_page_process_module_label_color', 'option');
        if(!empty($beonepage_process_module_hover_label_color)){
			$beonepage_process_module_hover_label_color = beonepage_olddata_fetch_redux('front_page_process_module_label_color', 'option');
        }else{
			$beonepage_process_module_hover_label_color = esc_attr("#888");
        }
        $this->add_control(
			'section_process_label_color',
			[
				'label' 	=> __( "Process Label Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_process_module_hover_label_color,
				'scheme' 	=> [
                    'type' 	=> Color::get_type(),
                    'value' => Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .process-label' => 'color: {{VALUE}}',
                ],
				'section' 	=> 'elementor_process',
			]        
        );
        //active color         
        $beonepage_process_module_active_color = beonepage_olddata_fetch_redux('front_page_process_module_active_color', 'option');
        if(!empty($beonepage_process_module_active_color)){
			$beonepage_process_module_active_color = beonepage_olddata_fetch_redux('front_page_process_module_active_color', 'option');
        }else{
			$beonepage_process_module_active_color = esc_attr("#ffcc00");
        }
        $this->add_control(
			'section_active_process_color',
			[
				'label' 	=> __( "Active Process Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_process_module_active_color,
				'scheme' 	=> [
                    'type' 	=> Color::get_type(),
                    'value' => Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .process-label .icon-clone, .process-label span:before' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .line-process, .line-process-wrapper .owl-dot span:after, {{WRAPPER}} .line-process-wrapper .owl-dot.active span' => 'background-color: {{VALUE}}',
                ],
				'section' 	=> 'elementor_process',
			]        
        );
        //Background setting               
		$class = '';
		$attribute = '';  
        $beonepage_process_module_bg = beonepage_olddata_fetch_redux('front_page_process_module_bg', 'option');
        if(!empty($beonepage_process_module_bg)){
			$beonepage_process_module_bg = beonepage_olddata_fetch_redux('front_page_process_module_bg', 'option');
        }else{
			$beonepage_process_module_bg = esc_attr("color");
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
				'default' 	=> $beonepage_process_module_bg,
				'toggle' 	=> true,
				'section' 	=> 'elementor_process',
			]         
        );
		//Background Color
		$beonepage_process_module_bg_color = beonepage_olddata_fetch_redux('front_page_process_module_bg_color', 'option');
        if(!empty($beonepage_process_module_bg_color)){
			$beonepage_process_module_bg_color = beonepage_olddata_fetch_redux('front_page_process_module_bg_color', 'option');
        }else{
			$beonepage_process_module_bg_color = esc_attr("#181a1c");
        }
        $this->add_control(
			'section_background_color',
			[
				'label' 	=> __( "Background Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_process_module_bg_color,
				'scheme' 	=> [
                    'type' 	=> Color::get_type(),
                    'value' => Color::COLOR_1,
                ],
                'selectors' => [
					'{{WRAPPER}} .process-module' => 'Background-color: {{VALUE}}',
                ],
                'condition' => [
                    'section_background' => 'color',
                ],
				'section' => 'elementor_process',
			]        
        );       
        //Background image 
        $beonepage_process_module_bg_img = beonepage_olddata_fetch_redux('front_page_process_module_bg_img', 'option');
        if(!empty($beonepage_process_module_bg_img['background-image'])){
			$beonepage_process_module_bg_img = beonepage_olddata_fetch_redux('front_page_process_module_bg_img', 'option');
			$beonepage_process_module_bg_img_url = $beonepage_process_module_bg_img['background-image'];
        }else{
			$beonepage_process_module_bg_img_url = \Elementor\Utils::get_placeholder_image_src();
        }
        $this->add_control(
			'section_background_image',
			[
				'label' 	=> __( "Bakground Image", 'beonepage' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
                    'url' 	=> esc_url($beonepage_process_module_bg_img_url),
                ],
                'condition' => [
                    'section_background' => 'image',
                ],
				'section' 	=> 'elementor_process',
			]        
        );
        // Background Repeat
        $beonepage_process_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_process_module_bg_img', 'option');
        if(!empty($beonepage_process_module_bg_img_rp['background-repeat'])){
			$beonepage_process_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_process_module_bg_img', 'option');
			$beonepage_process_module_bg_img_rp = $beonepage_process_module_bg_img_rp['background-repeat'];
        }else{
			$beonepage_process_module_bg_img_rp = esc_attr("No Repeat");
        }
        $this->add_control(
			'section_background_image_rp',
            [
                'label' 	=> __( 'Background Repeat', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_process_module_bg_img_rp,
                'options' 	=> [
                    'no-repeat' => __( 'No Repeat', 'beonepage' ),
                    'repeat'	=> __( 'Repeat All', 'beonepage' ),
                    'repeat-x' 	=> __( 'Repeat Horizontally', 'beonepage' ),
                    'repeat-y' 	=> __( 'Repeat Vertically', 'beonepage' ),
                ],
                'section' 	=> 'elementor_process',
				'condition' => [
                    'section_background' => 'image',
                ],
            ]         
        );
        //Background Position
        $beonepage_process_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_process_module_bg_img', 'option');
        if(!empty($beonepage_process_module_bg_img_bp['background-position'])){
			$beonepage_process_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_process_module_bg_img', 'option');
			$beonepage_process_module_bg_img_bp = $beonepage_process_module_bg_img_bp['background-position'];
        }else{
			$beonepage_process_module_bg_img_bp = esc_attr("Left Top");
        }
        $this->add_control(
			'section_background_image_bp',
            [
                'label' 	=> __( 'Background Position', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_process_module_bg_img_bp,
                'options' 	=> [
                    'left top'  	=> __( 'Left Top', 'beonepage' ),
                    'left center' 	=> __( 'Left Center', 'beonepage' ),
                    'left bottom' 	=> __( 'Left Bottom', 'beonepage' ),
                    'right top'		=> __( 'Right Top', 'beonepage' ),
                    'right center'  => __( 'Right Center', 'beonepage' ),
                    'right bottom' 	=> __( 'Right Bottom', 'beonepage' ),
                    'center top' 	=> __( 'Center Top', 'beonepage' ),
                    'center center' => __( 'Center Center', 'beonepage' ),
                    'center bottom' => __( 'Center Bottom', 'beonepage' ),
                ],
                'section' 	=> 'elementor_process',
				'condition' => [
                    'section_background' => 'image',
                ],
            ]         
        );
        //Background Size
        $beonepage_process_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_process_module_bg_img', 'option');
        if(!empty($beonepage_process_module_bg_img_bs['background-size'])){
			$beonepage_process_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_process_module_bg_img', 'option');
			$beonepage_process_module_bg_img_bs = $beonepage_process_module_bg_img_bs['background-size'];
			}else{
			$beonepage_process_module_bg_img_bs = esc_attr("auto");
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
				'default' => $beonepage_process_module_bg_img_bs,
				'toggle' => true,
				'condition' => [
                    'section_background' => 'image',
                ],
				'section' => 'elementor_process',
			]        
        );
        //Background Attachment
        $beonepage_process_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_process_module_bg_img', 'option');
        if(!empty($beonepage_process_module_bg_img_ath['background-attachment'])){
			$beonepage_process_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_process_module_bg_img', 'option');
			$beonepage_process_module_bg_img_ath = $beonepage_process_module_bg_img_ath['background-attachment'];
        }else{
			$beonepage_process_module_bg_img_ath = esc_attr("Scroll");
        }   
        $this->add_control(
			'section_background_image_ath',
			[
				'label' 	=> __( "Background Attachment", 'beonepage' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'options' 	=> [
                    'scroll' 	=> [
                        'title' => __( 'Scroll', 'beonepage' ),
                        'icon' 	=> 'fa fa-arrow-circle-right',
                    ],
                    'fixed' => [
                        'title' => __( 'Fixed', 'beonepage' ),
                        'icon' 	=> 'fa fa-arrows-alt',
                    ],                   
                ],
				'default' 	=> $beonepage_process_module_bg_img_ath,
				'toggle' 	=> true,
				'condition' => [
                    'section_background' => 'image',
                ],
				'section' 	=> 'elementor_process',
			]        
        );
        //Background video field
        $beonepage_process_module_bg_video = beonepage_olddata_fetch_redux('front_page_process_module_bg_video', 'option');
		if(!empty($beonepage_process_module_bg_video)){
			$beonepage_process_module_bg_video = beonepage_olddata_fetch_redux('front_page_process_module_bg_video', 'option');
		}else{
			$beonepage_process_module_bg_video =  esc_attr("Video Url");
		}
        $this->add_control(
			'section_youtube_url',
			[
				'label' => __( "YouTube URL", 'beonepage' ),
				'type' => Controls_Manager::TEXT,
				'default' => $beonepage_process_module_bg_video,
				'condition' => [
					'section_background' => 'video',
				],
				'description' => __( 'IMPORTANT NOTE: The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so its better to define both Image and YouTube Video for best results.', 'beonepage' ),
				'section' => 'elementor_process',
			]
         
        );        
        //Parallax seting
        $beonepage_process_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_process_module_bg_parallax', 'option');
        if(!empty($beonepage_process_module_bg_parallax)){
			$beonepage_process_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_process_module_bg_parallax', 'option');
			$beonepage_process_module_bg_parallax = html_entity_decode($beonepage_process_module_bg_parallax);
			if($beonepage_process_module_bg_parallax == 1){
				$beonepage_process_module_bg_parallax_d = esc_attr("yes");
			}else{
				$beonepage_process_module_bg_parallax_d = esc_attr("no");
			}          
        }else{
			$beonepage_process_module_bg_parallax_d = esc_attr("yes");
        }
		
        $this->add_control(
			'section_bg_parallax',
			[
				'label' 	=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'type' 		=> Controls_Manager::SWITCHER,
				'label_on' 	=> __( 'Enable', 'beonepage' ),
                'label_off' => __( 'Disable', 'beonepage' ),
                'return_value' => 'yes',
                'default' 	=> $beonepage_process_module_bg_parallax_d,
                'section' 	=> 'elementor_process',
			]
        );
		//Process Metabox data
		$result = array();
		$_beonepage_option_process = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_process', true );
		if(!empty($_beonepage_option_process)){
			$_beonepage_option_process = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_process', true );
			
			foreach ( $_beonepage_option_process as $option_process ) :
			
				$beonepage_title = '';
				if(isset($option_process['title']) && $option_process['title'] != ''){
					$beonepage_title = $option_process['title'];
				}
				$beonepage_description = '';
				if(isset($option_process['description']) && $option_process['description'] != ''){
					$beonepage_description = $option_process['description'];
				}
				$beonepage_icon = '';
				if(isset($option_process['icon']) && $option_process['icon'] != ''){
					$beonepage_icon = $option_process['icon'];
				}
				$beonepage_animation = '';
				if(isset($option_process['animation']) && $option_process['animation'] != ''){
					$beonepage_animation = $option_process['animation'];
				}
				$result[] = array('section_process_title' => $beonepage_title, 
					'section_process_description' => $beonepage_description,
					'section_process_icon' 	=> "fa fa-".$beonepage_icon,
					'section_process_animation' => $beonepage_animation,							
				);	
			endforeach;
			
		}else{
			$result = array();
		}
		$section_process_repeater = new \Elementor\Repeater();
		$section_process_repeater->add_control(
			'section_process_title',
			[
				'label' 	=> __( "Title", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
			]
		);
		$section_process_repeater->add_control(
			'section_process_description',
			[
				'label' 	=> 	__( "Description", 'beonepage' ),
				'type' 		=> 	Controls_Manager::TEXTAREA,
				'rows' 		=> 	7,
			]
		);
		$section_process_repeater->add_control(
			'section_process_icon',
			[
				'label' 	=> 	__( "Icon", 'beonepage' ),
				'type' 		=> 	Controls_Manager::ICON,
			]
		);
		$section_process_repeater->add_control(
			'section_process_animation',
			[
				'label' 	=> __( 'Animation', 'beonepage' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> beonepage_theme_animate(),
			]
		);
		$this->add_control(
			'section_option_process_boxes',
			[
				'label' 	=> __('Process Flow', 'beonepage' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=> $section_process_repeater->get_controls(),
				'default' 		=> $result,								
				'section'	 	=> 'elementor_process',
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

		if ( $settings['section_background'] == 'image' && $settings['section_bg_parallax'] == 'yes' ) {
			$class .= ' parallax';
			$attribute = ' data-stellar-background-ratio="0.5"';
		}

		if ( $settings['section_background'] == 'video' ) {
			$class .= ' yt-bg-player';
			$attribute .= ' data-yt-video="' . $settings['section_youtube_url']. '"';
		}
		elseif( $settings['section_background'] == 'color')
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
		$beonepage_section_process_label_color = '';
		if(isset($settings['section_process_label_color']) && $settings['section_process_label_color'] !=''){
			$beonepage_section_process_label_color = $settings['section_process_label_color'];
		}
		$beonepage_section_active_process_color = '';
		if(isset($settings['section_active_process_color']) && $settings['section_active_process_color'] !=''){
			$beonepage_section_active_process_color = $settings['section_active_process_color'];
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
			<?php if(isset($beonepage_section_background_image_url)){?>
				.process-module{
					background-image: url(<?php echo $beonepage_section_background_image_url; ?>);
				}
			<?php }
			if(isset($beonepage_section_background_color)){?>
				.process-module{
					background-color: <?php echo $beonepage_section_background_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_font_color)){?>
				.process-module{
					color: <?php echo $beonepage_section_font_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_separator_line_color)){?>	
			.process-module .separator span{
					color: <?php echo $beonepage_section_separator_line_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_separator_circle_color)){?>	
				.process-module .separator i {
					color: <?php echo $beonepage_section_separator_circle_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_process_label_color)){?>	
				.process-label {
					color: <?php echo $beonepage_section_process_label_color; ?>;
				}
			<?php }		
			if(isset($beonepage_section_active_process_color)){?>
				.process-label ul li .active {
					color: <?php echo $beonepage_section_active_process_color; ?>;
				}
				. process-active-dot {
					color: <?php echo $beonepage_section_active_process_color; ?>;
				} 
			<?php }
			if(isset($beonepage_section_active_process_color)){?>
				. process-active-dot {
					color: <?php echo $beonepage_section_active_process_color; ?>;
				} 
			<?php } 
			if(isset($beonepage_section_background_image_rp) && $beonepage_section_background_image_rp !=''){?>
				.process-module{
					background-repeat: <?php echo $beonepage_section_background_image_rp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bp) && $beonepage_section_background_image_bp !=''){?>
				.process-module{
					background-position: <?php echo $beonepage_section_background_image_bp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bs) && $beonepage_section_background_image_bs !=''){?>
				.process-module{
					background-size: <?php echo $beonepage_section_background_image_bs; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_ath) && $beonepage_section_background_image_ath !=''){?>
				.process-module{
					background-attachment: <?php echo $beonepage_section_background_image_ath; ?>;
				}
			<?php } ?>	
		</style>

		<section id="" class="module process-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
			<div class="container">
				<div class="row">
					<?php if ( $settings['section_title'] != '' ) : ?>
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

					<?php $processes = $settings['section_option_process_boxes']; ?>

					<div class="process-flow col-md-12">
						<ul class="process-label">
							<?php if ( ! empty( $processes ) ) : ?>
								<?php $i = 0; ?>

								<?php foreach ( $processes as $process ) : ?>
									<li data-order="<?php echo $i + 1; ?>" class="<?php echo $i == 0 ? 'process-active ' : ''; ?><?php echo isset( $process['section_process_animation'] ) && $process['section_process_animation'] != '' ? 'wow ' . $process['section_process_animation'] . '" data-wow-delay="' . $i * .5 . 's' : ''; ?>">
										<i class="<?php $icon = isset( $process['section_process_icon'] ) ? $process['section_process_icon'] : ''; 
										if (strpos($icon, 'fa fa-') !== false) {
											echo $icon; 
										}else{
											echo "fa fa-".$icon; 
											}?>">
											<i class="<?php $icon1 = isset( $process['section_process_icon'] ) ? $process['section_process_icon'] : ''; 
											if (strpos($icon1, 'fa fa-') !== false) {
											echo $icon1; 
												}else{
											echo "fa fa-".$icon1; 
											}	
												?> icon-clone"></i>
										</i>

										<span data-active="<?php echo isset( $process['section_process_title'] ) ? $process['section_process_title'] : ''; ?>"><?php echo isset( $process['section_process_title'] ) ? $process['section_process_title'] : ''; ?></span>
									</li>

									<?php $i++; ?>
								<?php endforeach; ?> 
							<?php endif; ?>
						</ul><!-- .process-label -->

						<div class="line-process-container">
							<div class="line-process"></div>
						</div><!-- .line-process-container -->
					</div><!-- .process-flow -->

					<div class="process-container col-md-12 owl-carousel wow fadeIn" data-wow-delay=".5s">
						<?php if ( ! empty( $processes ) ) : ?>
							<?php foreach ( $processes as $process ) : ?>
								<div class="process-item">
									<p><?php echo isset( $process['section_process_description'] ) ? wpautop( $process['section_process_description'] ) : ''; ?></p>
								</div><!-- .process-item -->
							<?php endforeach; ?> 
						<?php endif; ?>
					</div><!-- .process-container -->
				</div><!-- .row -->
			</div><!-- .container -->
		</section><!-- #process -->
		<?php
		if ( Plugin::$instance->editor->is_edit_mode() ) :  
			?>
			<script> 
			(function($) {
				var $processLabel = $('.process-label li'),
					$owlCarouselProcess = $('.process-container.owl-carousel');
				
				APP.process = {
			init: function() {
				APP.process.owlCarousel();
			},

			label: function() {
				var i = 0,
					labelSum = $processLabel.length;

				var percent = 100 / (labelSum == 1 ? 2 : labelSum - 1);

				$processLabel.each(function() {
					var labelWidth = $(this).find('span').width();

					$(this).css({
						'left': i * percent + '%',
						'width': labelWidth + 1 + 'px',
						'margin-left': -(labelWidth / 2) + 'px'
					});

					i++;
				});
			},

			owlCarousel: function() {
				$owlCarouselProcess.owlCarousel({
					items: 1,
					smartSpeed: 500
				});

				$owlCarouselProcess.find('.owl-dots').addClass('line-process-wrapper');

				var i = 1,
					$owlCarouselDots = $owlCarouselProcess.find('.owl-dots'),
					$owlCarouselDot = $owlCarouselDots.find('.owl-dot');

				$owlCarouselDot.each(function() {
					$(this).attr('data-order', i);
					i++;
				});

				var i = 0,
					dotSum = $owlCarouselDot.length;

				var percent = 100 / (dotSum == 1 ? 2 : dotSum - 1);

				$owlCarouselDot.each(function() {
					$(this).css({
						left: i * percent + "%"
					});

					i++;
				});

				$owlCarouselProcess.on('changed.owl.carousel', function(event) {
					var lineWidth = $owlCarouselDot.eq(event.item.index).attr('data-order') - 1,
						lineProcess = $('.line-process'),
						$owlCarouselDotActive = $owlCarouselDots.find('.owl-dot.active');

					lineProcess.width(percent * lineWidth + '%');

					$owlCarouselDot.each(function() {
						if ($(this).attr('data-order') < $owlCarouselDotActive.attr('data-order')) {
							$(this).children('span').addClass('process-active-dot');
						} else {
							$(this).children('span').removeClass('process-active-dot');
						}
					});

					$processLabel.each(function() {
						if ($(this).attr('data-order') == $owlCarouselDotActive.attr('data-order')) {
							$(this).addClass('process-active');
						} else {
							$(this).removeClass('process-active');
						}
					});
				});
			}
		}
				APP.process.init();
				APP.process.label();
			})(jQuery);
			</script>  
			<?php
		endif;
	}
	protected function content_template() {}
	public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_My_Custom_Elementor_Process );
