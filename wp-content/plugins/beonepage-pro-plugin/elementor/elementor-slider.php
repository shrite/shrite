<?php
namespace Elementor;
use Elementor\Core\Schemes\Color;
if ( ! defined( 'ABSPATH' ) ) exit;
class Widget_My_Custom_Elementor_Slider extends Widget_Base {
	
	public function get_categories() {
		return [ 'beonepage-widgets' ];
	}
	public function get_name() {
		return 'elementor-slider';
	}
	public function get_title() {
		return __( 'BeOne slider', 'beonepage' );
	}
	public function get_icon() {
		return 'fa fa-sliders';
	}
	protected function _register_controls() {
		$this->add_control(
			'elementor_text_slider',
			[
				'label' => __( 'Slider Option', 'beonepage' ),
				'type' 	=> Controls_Manager::SECTION,
			]
		);
		//Slider type
		$beonepage_text_slider_type = beonepage_olddata_fetch_redux('front_page_slider_type', 'option');
		if(!empty($beonepage_text_slider_type)){
			$beonepage_text_slider_type = beonepage_olddata_fetch_redux('front_page_slider_type', 'option');
			if($beonepage_text_slider_type == 1){
				$beonepage_text_slider_type = esc_attr('text');
			}else{
				$beonepage_text_slider_type = esc_attr('image');
			};
		}else{
			$beonepage_text_slider_type = esc_attr("text");
		}	
		$this->add_control(
			'section_slider_type',
			[
				'label' 	=> __( "Slider Type", 'beonepage' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'options' 	=> [
					'text' => [
						'title' => __( 'Text', 'beonepage' ),
						'icon' 	=> 'fa fa fa-font',
					],
					'image' 	=> [
						'title' => __( 'Image', 'beonepage' ),
						'icon' 	=> 'fa fa-file-image-o ',
					],
				],
				'default' 	=> $beonepage_text_slider_type,
				'toggle' 	=> true,
				'section' 	=> 'elementor_text_slider',
			]		 
		);
		// Text Title
		$beonepage_text_slider_module_title = beonepage_olddata_fetch_redux('front_page_text_slider_title', 'option');
		if(!empty($beonepage_text_slider_module_title)){
			$beonepage_text_slider_module_title = beonepage_olddata_fetch_redux('front_page_text_slider_title', 'option');
			$beonepage_text_slider_module_title = html_entity_decode($beonepage_text_slider_module_title);
		}else{
			$beonepage_text_slider_module_title = wp_kses("Be <span>Imaginative</span> • Be <span>Yourself</span>",array('span' => array()));
		}
		$this->add_control(
			'section_title',
			[
				'label' 	=> __( "Heading", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_text_slider_module_title,
				'title'		=> __( 'Enter Title', 'beonepage' ),
				'section' 	=> 'elementor_text_slider',
				'condition' => [
                    'section_slider_type' => 'text',
                ],
			]
		);
        //Text Content
		$beonepage_text_slider_content = beonepage_olddata_fetch_redux('front_page_text_slider_content', 'option');
		if(!empty($beonepage_text_slider_content)){
			$beonepage_text_slider_content = beonepage_olddata_fetch_redux('front_page_text_slider_content', 'option');
			$beonepage_text_slider_content = html_entity_decode($beonepage_text_slider_content);
		}else{
			$beonepage_text_slider_content = esc_attr("We handcraft well-thought-out WordPress themes");
		}
		$this->add_control(
			'section_content',
			[
				'label' 	=> 	__( "Content", 'beonepage' ),
				'type' 		=> 	Controls_Manager::TEXTAREA,
				'rows' 		=> 	7,
				'default'	=> 	$beonepage_text_slider_content,
				'placeholder' => __( 'Enter Content', 'beonepage' ),
				'section' 	=> 	'elementor_text_slider',
				'condition' => [
                    'section_slider_type' => 'text',
                ],
			]
		 
		);
		//Text Font Color
       $beonepage_text_slider_color = beonepage_olddata_fetch_redux('front_page_text_slider_color', 'option');
		if(!empty($beonepage_text_slider_color)){
		  $beonepage_text_slider_color = beonepage_olddata_fetch_redux('front_page_text_slider_color', 'option');		  
		}else{
		  $beonepage_text_slider_color = esc_attr("#fff");
		}
		$this->add_control(
			'section_font_color',
			[
				'label' 	=> __( "Font Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_text_slider_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .text-slider' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_text_slider',
				'condition' => [
                    'section_slider_type' => 'text',
                ],
			]		 
		);
		//Text Button TEXT
		$beonepage_text_slider_btn_text = beonepage_olddata_fetch_redux('front_page_text_slider_btn_text', 'option');
		if(!empty($beonepage_text_slider_btn_text)){
			$beonepage_text_slider_btn_text = beonepage_olddata_fetch_redux('front_page_text_slider_btn_text', 'option');
			$beonepage_text_slider_btn_text = html_entity_decode($beonepage_text_slider_btn_text);
		}else{
			$beonepage_text_slider_btn_text = esc_attr("Learn More");
		}
		$this->add_control(
			'section_button_text',
			[
				'label' 	=> 	__( "Button Text", 'beonepage' ),
				'type' 		=> 	Controls_Manager::TEXT,
				'default'	=> 	$beonepage_text_slider_btn_text,
				'title' 	=> 	__( 'Enter Button Text', 'beonepage' ),
				'section' 	=> 	'elementor_text_slider',
				'condition' => [
                    'section_slider_type' => 'text',
                ],
			]		 
		);
		//Text Button Url
		$beonepage_text_slider_btn_url = beonepage_olddata_fetch_redux('front_page_text_slider_btn_url', 'option');
		if(!empty($beonepage_text_slider_btn_url)){
			$beonepage_text_slider_btn_url = beonepage_olddata_fetch_redux('front_page_text_slider_btn_url', 'option');
		}else{
			$beonepage_text_slider_btn_url = esc_url("http://betheme.me");
		}
		$this->add_control(
			'section_button_url',
			[
				'label' 	=> 	__( "Button URL", 'beonepage' ),
				'type' 		=> 	Controls_Manager::TEXT,
				'default'	=> 	$beonepage_text_slider_btn_url,
				'title' 	=> 	__( 'Enter Button URL', 'beonepage' ),
				'section' 	=> 	'elementor_text_slider',
				'condition' => [
                    'section_slider_type' => 'text',
				],
			]		 
		);
		//Text Button Style
		$beonepage_text_slider_btn_style = beonepage_olddata_fetch_redux('front_page_text_slider_btn_style', 'option');
		if(!empty($beonepage_text_slider_btn_style)){
			$beonepage_text_slider_btn_style = beonepage_olddata_fetch_redux('front_page_text_slider_btn_style', 'option');
			if($beonepage_text_slider_btn_style == 1){
				$beonepage_text_slider_btn_style = esc_attr('light');
			}else{
				$beonepage_text_slider_btn_style = esc_attr('dark');
			}
		}else{
			$beonepage_text_slider_btn_style = esc_attr("light");
		}	
		$this->add_control(
			'section_button_style',
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
				'default' 	=> $beonepage_text_slider_btn_style,
				'toggle' 	=> true,
				'section' 	=> 'elementor_text_slider',
				'condition' => [
                    'section_slider_type' => 'text',
                ],
			]		 
		);
		//Text Background color                		
		$beonepage_text_slider_module_bg_color = beonepage_olddata_fetch_redux('front_page_text_slider_bg', 'option');
		if(!empty($beonepage_text_slider_module_bg_color['background-color'])){
			$beonepage_text_slider_module_bg_color = beonepage_olddata_fetch_redux('front_page_text_slider_bg', 'option');
			$beonepage_text_slider_module_bg_color = $beonepage_text_slider_module_bg_color['background-color'];
		}else{
			$beonepage_text_slider_module_bg_color = esc_attr("#181a1c");
		}
		$this->add_control(
			'section_background_color',
			[
				'label' 	=> __( "Background Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_text_slider_module_bg_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .text-slider' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'section_slider_type' => 'text',
				],
				'section' 	=> 'elementor_text_slider',
			]         
        );       
        //Text Background image 
        $beonepage_text_slider_module_bg_img = beonepage_olddata_fetch_redux('front_page_text_slider_bg', 'option');
        if(!empty($beonepage_text_slider_module_bg_img['background-image'])){
          $beonepage_text_slider_module_bg_img = beonepage_olddata_fetch_redux('front_page_text_slider_bg', 'option');
          $beonepage_text_slider_module_bg_img_url = $beonepage_text_slider_module_bg_img['background-image'];
        }else{
           $beonepage_text_slider_module_bg_img_url = \Elementor\Utils::get_placeholder_image_src();
        }
        $this->add_control(
			'section_background_image',
			[
				'label' 	=> __( "Bakground Image", 'beonepage' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 	=> esc_url($beonepage_text_slider_module_bg_img_url),
				],
				'condition' => [
					'section_slider_type' => 'text',
				],
				'section' 	=> 'elementor_text_slider',
			]         
        );
        //Text Background Repeat
        $beonepage_text_slider_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_text_slider_bg', 'option');
        if(!empty($beonepage_text_slider_module_bg_img_rp['background-repeat'])){
			$beonepage_text_slider_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_text_slider_bg', 'option');
			$beonepage_text_slider_module_bg_img_rp = $beonepage_text_slider_module_bg_img_rp['background-repeat'];
        }else{
			$beonepage_text_slider_module_bg_img_rp = esc_attr("No Repeat");
        }	
        $this->add_control(
			'section_background_image_rp',
            [
                'label' 	=> __( 'Background Repeat', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_text_slider_module_bg_img_rp,
                'options' 	=> [
                    'no-repeat' => __( 'No Repeat', 'beonepage' ),
                    'repeat' 	=> __( 'Repeat All', 'beonepage' ),
                    'repeat-x' 	=> __( 'Repeat Horizontally', 'beonepage' ),
                    'repeat-y' 	=> __( 'Repeat hortically', 'beonepage' ),
                ],
                'section' 	=> 'elementor_text_slider',
				'condition' => [
                    'section_slider_type' => 'text',
                ],
            ]         
        );
        //Text Background Position
        $beonepage_text_slider_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_text_slider_bg', 'option');
        if(!empty($beonepage_text_slider_module_bg_img_bp['background-position'])){
			$beonepage_text_slider_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_text_slider_bg', 'option');
			$beonepage_text_slider_module_bg_img_bp = $beonepage_text_slider_module_bg_img_bp['background-position'];
        }else{
			$beonepage_text_slider_module_bg_img_bp = esc_attr("Left Top");
        }
        $this->add_control(
			'section_background_image_bp',
            [
                'label' 	=> __( 'Background Position', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_text_slider_module_bg_img_bp,
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
                'section' 	=> 'elementor_text_slider',
				'condition' => [
                    'section_slider_type' => 'text',
                ],
            ]        
        );
        //Text Background Size
        $beonepage_text_slider_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_text_slider_bg', 'option');
        if(!empty($beonepage_text_slider_module_bg_img_bs['background-size'])){
			$beonepage_text_slider_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_text_slider_bg', 'option');
			$beonepage_text_slider_module_bg_img_bs = $beonepage_text_slider_module_bg_img_bs['background-size'];
        }else{
			$beonepage_text_slider_module_bg_img_bs = esc_attr("cover");
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
				'default' 	=> $beonepage_text_slider_module_bg_img_bs,
				'toggle' 	=> true,
				'condition' => [
					'section_slider_type' => 'text',
				],
				'section'	=> 'elementor_text_slider',
			]         
        );
        //Text Background Attachment
        $beonepage_text_slider_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_text_slider_bg', 'option');
        if(!empty($beonepage_text_slider_module_bg_img_ath['background-attachment'])){
			$beonepage_text_slider_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_text_slider_bg', 'option');
			$beonepage_text_slider_module_bg_img_ath = $beonepage_text_slider_module_bg_img_ath['background-attachment'];
        }else{
			$beonepage_text_slider_module_bg_img_ath = esc_attr("Scroll");
        }    
        $this->add_control(
			'section_background_image_ath',
			[
				'label' 	=> __( "Background Attachment", 'beonepage' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'options' 	=> [
					'scroll'	=> [
						'title' => __( 'Scroll', 'beonepage' ),
						'icon' 	=> 'fa fa-arrow-circle-right',
					],
					'fixed' 	=> [
						'title' => __( 'Fixed', 'beonepage' ),
						'icon' 	=> 'fa fa-arrows-alt',
					],
				],
				'default' 	=> $beonepage_text_slider_module_bg_img_ath,
				'toggle' 	=> true,
				'condition' => [
					'section_slider_type' => 'text',
				],
				'section' 	=> 'elementor_text_slider',
			]         
        );
        //Parallax setting
        $beonepage_text_slider_bg_parallax = beonepage_olddata_fetch_redux('front_page_text_slider_parallax', 'option');
        if(!empty($beonepage_text_slider_bg_parallax)){
			$beonepage_text_slider_bg_parallax = beonepage_olddata_fetch_redux('front_page_text_slider_parallax', 'option');
			$beonepage_text_slider_bg_parallax = html_entity_decode($beonepage_text_slider_bg_parallax);
        if($beonepage_text_slider_bg_parallax == 1){
            $beonepage_text_slider_bg_parallax_d = esc_attr("yes");
        }else{
            $beonepage_text_slider_bg_parallax_d = esc_attr("no");
        }  
        }else{
          $beonepage_text_slider_bg_parallax_d = esc_attr("yes");
        }
        $this->add_control(
			'section_bg_parallax',
			[
				'label' 	=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'type' 		=> Controls_Manager::SWITCHER,
				'label_on' 	=> __( 'Enable', 'beonepage' ),
				'label_off' 	=> __( 'Disable', 'beonepage' ),
				'return_value' 	=> 'yes',
				'default' 		=> $beonepage_text_slider_bg_parallax_d,
				'section'	 	=> 'elementor_text_slider',
			]
        );
		//Enable Scroll Down Button For Background Image?
        $beonepage_text_slider_scroll_down = beonepage_olddata_fetch_redux('front_page_text_slider_scroll_down', 'option');
        if(!empty($beonepage_text_slider_scroll_down)){
			$beonepage_text_slider_scroll_down = beonepage_olddata_fetch_redux('front_page_text_slider_scroll_down', 'option');
			$beonepage_text_slider_scroll_down = html_entity_decode($beonepage_text_slider_scroll_down);
        if($beonepage_text_slider_scroll_down == 1){
            $beonepage_text_slider_scroll_down_d = esc_attr("yes");
        }else{
            $beonepage_text_slider_scroll_down_d = esc_attr("no");
        }  
        }else{
          $beonepage_text_slider_scroll_down_d = esc_attr("yes");
        }
        $this->add_control(
			'section_bg_scroll_down',
			[
				'label' 	=> __( 'Enable Scroll Down Button For Background Image?', 'beonepage' ),
				'type' 		=> Controls_Manager::SWITCHER,
				'label_on' 	=> __( 'Enable', 'beonepage' ),
                'label_off' 	=> __( 'Disable', 'beonepage' ),
                'return_value' 	=> 'yes',
                'default' 		=> $beonepage_text_slider_scroll_down_d,
                'section'	 	=> 'elementor_text_slider',
			]
        );
		//Enable Parallax Scrolling For Swiper Slider?
        $beonepage_text_swiper_slider_parallax = beonepage_olddata_fetch_redux('front_page_swiper_slider_parallax', 'option');
        if(!empty($beonepage_text_swiper_slider_parallax)){
			$beonepage_text_swiper_slider_parallax = beonepage_olddata_fetch_redux('front_page_swiper_slider_parallax', 'option');
			$beonepage_text_swiper_slider_parallax = html_entity_decode($beonepage_text_swiper_slider_parallax);
        if($beonepage_text_swiper_slider_parallax == 1){
            $beonepage_text_swiper_slider_parallax_d = esc_attr("yes");
        }else{
            $beonepage_text_swiper_slider_parallax_d = esc_attr("no");
        }  
        }else{
          $beonepage_text_swiper_slider_parallax_d = esc_attr("yes");
        }
        $this->add_control(
			'section_bg_parallax_scrolling_for_swiper_slider',
			[
				'label' 	=> __( 'Enable Parallax Scrolling For Swiper Slider?', 'beonepage' ),
				'type' 		=> Controls_Manager::SWITCHER,
				'label_on' 	=> __( 'Enable', 'beonepage' ),
                'label_off' 	=> __( 'Disable', 'beonepage' ),
                'return_value' 	=> 'yes',
                'default' 		=> $beonepage_text_swiper_slider_parallax_d,
                'section'	 	=> 'elementor_text_slider',
			]
        );
		//Enable Scroll Down Button For Swiper Slider?
        $beonepage_text_swiper_slider_scroll_down = beonepage_olddata_fetch_redux('front_page_swiper_slider_scroll_down', 'option');
        if(!empty($beonepage_text_swiper_slider_scroll_down)){
			$beonepage_text_swiper_slider_scroll_down = beonepage_olddata_fetch_redux('front_page_swiper_slider_scroll_down', 'option');
			$beonepage_text_swiper_slider_scroll_down = html_entity_decode($beonepage_text_swiper_slider_scroll_down);
        if($beonepage_text_swiper_slider_scroll_down == 1){
            $beonepage_swiper_slider_scroll_down_d = esc_attr("yes");
        }else{
            $beonepage_swiper_slider_scroll_down_d = esc_attr("no");
        }  
        }else{
          $beonepage_swiper_slider_scroll_down_d = esc_attr("yes");
        }
        $this->add_control(
			'section_swiper_slider_scroll_down',
			[
				'label' 	=> __( 'Enable Scroll Down Button For Swiper Slider?', 'beonepage' ),
				'type' 		=> Controls_Manager::SWITCHER,
				'label_on' 	=> __( 'Enable', 'beonepage' ),
                'label_off' 	=> __( 'Disable', 'beonepage' ),
                'return_value' 	=> 'yes',
                'default' 		=> $beonepage_swiper_slider_scroll_down_d,
                'section'	 	=> 'elementor_text_slider',
			]
        );
		// Font Color
		$beonepage_swiper_slider_color = beonepage_olddata_fetch_redux('front_page_swiper_slider_color', 'option');
		if(!empty($beonepage_swiper_slider_color)){
			$beonepage_swiper_slider_color = beonepage_olddata_fetch_redux('front_page_swiper_slider_color', 'option');
		}else{
			$beonepage_swiper_slider_color = esc_attr("#fff");
		}
		$this->add_control(
			'section_swiper_slider_font_color',
			[
				'label' 	=> __( "Font Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_swiper_slider_color,
				'scheme' 	=> [
					'type' 		=> Color::get_type(),
					'value' 	=> Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_custom',
				'condition' => [
					'section_slider_type' => 'image',
				],
			]			
		);
		//Swiper Button Style
		$beonepage_swiper_slider_btn_style = beonepage_olddata_fetch_redux('front_page_swiper_slider_btn_style', 'option');
		if(!empty($beonepage_swiper_slider_btn_style)){
			$beonepage_swiper_slider_btn_style = beonepage_olddata_fetch_redux('front_page_swiper_slider_btn_style', 'option');
			if($beonepage_swiper_slider_btn_style == 1){
				$beonepage_swiper_slider_btn_style = esc_attr('light');
			}else{
				$beonepage_swiper_slider_btn_style = esc_attr('dark');
			}
		}else{
			$beonepage_swiper_slider_btn_style = esc_attr("light");
		}	
		$this->add_control(
			'section_swiper_slider_btn_style',
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
				'default' 	=> $beonepage_swiper_slider_btn_style,
				'toggle' 	=> true,
				'section' 	=> 'elementor_text_slider',
				'condition' => [
                    'section_slider_type' => 'image',
                ],
			]		 
		);
		//Home Page Slider AutoPlay
		$beonepage_slider_switch = beonepage_olddata_fetch_redux('front_page_slider_switch', 'option');
		if(!empty($beonepage_slider_switch)){
			$beonepage_slider_switch = beonepage_olddata_fetch_redux('front_page_slider_switch', 'option');
			if($beonepage_slider_switch == 1){
				$beonepage_slider_switch = esc_attr('On');
			}else{
				$beonepage_slider_switch = esc_attr('Off');
			}
		}else{
			$beonepage_slider_switch = esc_attr("off");
			}	
		$this->add_control(
			'section_slider_switch',
			[
				'label' 	=> __( "Home Page Slider AutoPlay", 'beonepage' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'options' 	=> [
					'on' => [
						'title' => __( 'AutoPlay On', 'beonepage' ),
						'icon' 	=> 'fa fa-play',						
					],
					'off' 	=> [
						'title' => __( 'AutoPlay Off', 'beonepage' ),
						'icon' 	=> 'fa fa-power-off ',
					],
					
				],
				'default' 	=> $beonepage_slider_switch,
				'toggle' 	=> true,
				'section' 	=> 'elementor_text_slider',
				'condition' => [
                    'section_slider_type' => 'image',
                ],
			]		 
		);
		// Slide REPEATER
		$slides = array();
		$_beonepage_option_swiper_slider = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_swiper_slider', true );
		if(!empty($_beonepage_option_swiper_slider)){
			$_beonepage_option_swiper_slider = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_swiper_slider', true );
			
			foreach ( $_beonepage_option_swiper_slider as $slide ) :
			
				$beonepage_img_url  = '';
				if(isset($slide['img_url']) && $slide['img_url'] != ''){
				$beonepage_img_url  = $slide['img_url'];
				}
				$beonepage_video_url = '';
				if(isset($slide['video_url']) && $slide['video_url'] != ''){
				$beonepage_video_url = $slide['video_url'];
				}
				$beonepage_title = '';
				if(isset($slide['title']) && $slide['title'] !=''){
				$beonepage_title = $slide['title'];
				}
				$beonepage_title_animation = '';
				if(isset($slide['title_animation']) && $slide['title_animation'] !=''){
				$beonepage_title_animation = $slide['title_animation'];
				}
				$beonepage_description = '';
				if(isset($slide['description']) && $slide['description'] !=''){
				$beonepage_description = $slide['description'];
				}
				$beonepage_description_animation = '';
				if(isset($slide['description_animation']) && $slide['description_animation'] !=''){
				$beonepage_description_animation = $slide['description_animation'];
				}
				$beonepage_btn_text  = '';
				if(isset($slide['btn_text']) && $slide['btn_text'] !=''){
				$beonepage_btn_text  = $slide['btn_text'];
				}
				$beonepage_btn_url  = '';
				if(isset($slide['btn_url']) && $slide['btn_url'] !=''){
				$beonepage_btn_url  = $slide['btn_url'];
				}
				$beonepage_btn_animation  = '';
				if(isset($slide['btn_animation']) && $slide['btn_animation'] !=''){
				$beonepage_btn_animation  = $slide['btn_animation'];
				}
				
				$slides[] = array('section_slider_type' => $slide['type'], 
					'section_slider_image' => array('url' => $beonepage_img_url), 
					'section_slider_video' => $beonepage_video_url , 
					'section_slider_heading' => $beonepage_title,
					'section_slider_heading_animation' => $beonepage_title_animation,
					'section_slider_content' => $beonepage_description,
					'section_slider_content_animation' => $beonepage_description_animation,
					'section_slider_button_text' => $beonepage_btn_text,
					'section_slider_button_url' => $beonepage_btn_url,
					'section_slider_button_animation' => $beonepage_btn_animation,							
				);	
			endforeach;
			
		}else{
			$slides =array();
		}
		
		$section_slider_repeater = new \Elementor\Repeater();
		$section_slider_repeater->add_control(
			'section_slider_type', 
			[
				'label' 	=> __( 'Slider Type', 'beonepage' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' 	=> [
					'image' => [
						'title' => __( 'Image', 'beonepage' ),
						'icon' 	=> 'eicon-slideshow',						
					],
					'video' => [
						'title' => __( 'Video', 'beonepage' ),
						'icon' 	=> 'eicon-video-camera',
					],					
				],
			]
		); 
		$section_slider_repeater->add_control(
			'section_slider_image',
			[
				'label' 	=> __( 'Image', 'beonepage' ),
				'type' 		=> Controls_Manager::MEDIA,
				'condition' => [
					'section_slider_type' => 'image',
				],
				'show_label'=> true,
			]
		);
		$section_slider_repeater->add_control(
			'section_slider_video',
			[
				'label' 	=> __( "YouTube URL", 'beonepage' ),
				'type' 		=>  Controls_Manager::TEXT,
				'condition' => [
					'section_slider_type' => 'video',
				],
			]
		);
		$section_slider_repeater->add_control(
			'section_slider_heading', 
			[
				'label' 	=> 	__( "Heading", 'beonepage' ),
				'type' 		=> 	 Controls_Manager::TEXTAREA,
				'rows' 		=> 	7,
				'description'=> 'If you want to color the word, just wrap it with "span" tag.',
			]
		);
		$section_slider_repeater->add_control(
			'section_slider_heading_animation', [
				'label' 	=> __( 'Heading Animation', 'beonepage' ),
				'type' 		=>  Controls_Manager::SELECT,
				'options' 	=> beonepage_theme_animate(),
			]
		);
		$section_slider_repeater->add_control(
			'section_slider_content', 
			[
				'label' 	=> 	__( "Content", 'beonepage' ),
				'type' 		=> 	Controls_Manager::TEXTAREA,
				'rows' 		=> 	7,
			]
		);
		$section_slider_repeater->add_control(
			'section_slider_content_animation',
			[
				'label' 	=> __( 'Content Animation', 'beonepage' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> beonepage_theme_animate(),
			]
		);
		$section_slider_repeater->add_control(
			'section_slider_button_text', 
			[
				'label' 	=> __( "Button Text", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
			]
		);
		$section_slider_repeater->add_control(
			'section_slider_button_url', 
			[
				'label' 	=> __( "Button Url", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'placeholder' => __( 'https://your-link.com', 'beonepage' ),
			]
		);
		$section_slider_repeater->add_control(
			'section_slider_button_animation', 
			[
				'label' 	=> __( 'Button Animation', 'beonepage' ), 
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> beonepage_theme_animate(),
			]
		);
		$this->add_control(
        'section_option_swiper_slider',
			[
				'label' 	=> __('Slider Module', 'beonepage' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=>  $section_slider_repeater->get_controls(), 
				'default' 		=> $slides,								
				'section'	 	=> 'elementor_text_slider',
			]
		);	
	}// End function
	protected function render( $instance = [] ) {
		$settings = $this->get_settings();
		$beonepage_slider_time = beonepage_olddata_fetch_redux('front_page_slider_time', 'option');
		
		$beonepage_section_font_color = '';
		if(isset($settings['section_font_color']) && $settings['section_font_color'] !=''){
			$beonepage_section_font_color = $settings['section_font_color'];
		} 
		$beonepage_section_background_color = '';
		if(isset($settings['section_background_color']) && $settings['section_background_color'] !=''){
			$beonepage_section_background_color = $settings['section_background_color'];
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
		$beonepage_section_background_image_bg = '';
		if(isset($settings['section_background_image']) && $settings['section_background_image'] !=''){
			$beonepage_section_background_image_bg = $settings['section_background_image']['url'];
		}
		
		?><!--Slider -->
		<style>
			<?php
			if(isset($beonepage_section_font_color) && $beonepage_section_font_color !=''){?>
				 .text-slider{
					color: <?php echo $beonepage_section_font_color; ?>;
				}
			<?php } 
			if(isset($beonepage_section_background_color) && $beonepage_section_background_color !=''){?>
				.text-slider{
					background-color: <?php echo $beonepage_section_background_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_rp) && $beonepage_section_background_image_rp !=''){?>
				.text-slider{
					background-repeat: <?php echo $beonepage_section_background_image_rp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bp) && $beonepage_section_background_image_bp !=''){?>
				.text-slider{
					background-position: <?php echo $beonepage_section_background_image_bp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bs) && $beonepage_section_background_image_bs !=''){?>
				.text-slider{
					background-size: <?php echo $beonepage_section_background_image_bs; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_ath) && $beonepage_section_background_image_ath !=''){?>
				.text-slider{
					background-attachment: <?php echo $beonepage_section_background_image_ath; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bg) && $beonepage_section_background_image_bg !=''){?>
				.text-slider{
					background-image: url('<?php echo $beonepage_section_background_image_bg; ?>');
				}
			<?php } ?>
		</style>

		<?php if ( $settings['section_slider_type'] == 'text' ) : ?>
			<section id="slider" class="slider text-slider<?php echo $settings['section_bg_parallax'] == 'yes' ? ' slider-parallax' : ''; ?> full-screen nopadding clearfix">
				<div class="slider-wrapper">
					<div class="slider-caption text-center clearfix">
						<?php
							if ( $settings['section_title'] != '' ) {
								echo '<h1>' . strip_tags( html_entity_decode( $settings['section_title'] ), '<span>' ) . '</h1>';
							} ?>
							
						<?php
							if ( $settings['section_content'] != '' ) {
								echo '<p>' . strip_tags( html_entity_decode( $settings['section_content'] ), '<span>' ) . '</p>';
							}
						?>

						<?php if ( $settings['section_button_text'] != '' ) : ?>
							<div class="slider-btn">
								<a href="<?php echo $settings['section_button_url']; ?>" class="btn <?php echo $settings['section_button_style'] == 'light' ? 'btn-light' : 'btn-dark'; ?>"><?php echo $settings['section_button_text']; ?></a>
							</div><!-- .slider-btn -->
						<?php endif; ?>
					</div><!-- .slider-caption -->
				</div><!-- .slider-wrapper -->

				<?php if ( $settings['section_bg_scroll_down'] == 'yes' ) : ?>
					<div class="scroll-down wow bounce" data-wow-delay="2s"></div>
				<?php endif; ?>
			</section><!-- #slider -->
		<?php else : 
		$autoplay = $settings['section_slider_switch'];
		$autoplaySpeed= $beonepage_slider_time;
		?>
		<section id="slider" class="slider swiper-slider<?php echo $settings['section_bg_parallax_scrolling_for_swiper_slider'] == 'yes' ? ' slider-parallax' : ''; ?> full-screen nopadding clearfix">
			<div class="swiper-container" data-autoslide="<?php echo $autoplay;?>" data-sliderspeed="<?php echo $autoplaySpeed;?>">
				<div class="swiper-wrapper">
					<?php $slides = $settings['section_option_swiper_slider']; ?>

					<?php if ( ! empty( $slides ) ) :  ?>
						<?php foreach ( $slides as $slide ) : ?>
							<?php
								$img_url = isset( $slide['section_slider_image']['url'] ) ? $slide['section_slider_image']['url'] : '';
								$video_url = isset( $slide['section_slider_video'] ) ? $slide['section_slider_video'] : '';
							?>

							<div class="swiper-slide" data-swiper-autoplay="<?php echo $autoplaySpeed;?>" style="background-image: url('<?php echo $img_url; ?>')">
								<?php if ( $slide['section_slider_type'] == 'video' && $video_url != '' && ! wp_is_mobile() ) : ?>
									<div class="yt-bg-player" data-yt-video="<?php echo $video_url; ?>">
								<?php endif; ?>

									<div class="slider-caption text-center clearfix">
										<?php if ( isset( $slide['section_slider_heading'] ) && $slide['section_slider_heading'] != '' ) : ?>
											<h1 data-animation="<?php echo isset( $slide['section_slider_heading_animation'] ) ? $slide['section_slider_heading_animation'] : ''; ?>" data-animation-delay="500"><?php echo $slide['section_slider_heading']; ?></h1>
										<?php endif; ?>

										<?php if ( isset( $slide['section_slider_content'] ) && $slide['section_slider_content'] != '' ) : ?>
											<p data-animation="<?php echo isset( $slide['section_slider_content_animation'] ) ? $slide['section_slider_content_animation'] : ''; ?>" data-animation-delay="250"><?php echo $slide['section_slider_content']; ?></p>
										<?php endif; ?>

										<?php if ( isset( $slide['section_slider_button_text'] ) && $slide['section_slider_button_text'] != '' ) : ?>
											<div class="slider-btn" data-animation="<?php echo isset( $slide['section_slider_button_animation'] ) ? $slide['section_slider_button_animation'] : ''; ?>" data-animation-delay="500">
												<a href="<?php echo isset( $slide['section_slider_button_url'] ) && $slide['section_slider_button_url'] != '' ? $slide['section_slider_button_url'] : ''; ?>" class="btn <?php echo $settings['section_swiper_slider_btn_style'] == 'light' ? 'btn-light' : 'btn-dark'; ?>"><?php echo $slide['section_slider_button_text']; ?></a>
											</div><!-- .slider-btn -->
										<?php endif; ?>
									</div><!-- .slider-caption -->

								<?php if ( $slide['section_slider_type'] == 'video' && $video_url != '' && ! wp_is_mobile() ) : ?>
									</div><!-- .yt-bg-player -->
								<?php endif; ?>	
							</div><!-- .swiper-slide -->
						<?php endforeach; ?> 
					<?php endif; ?>
				</div><!-- .swiper-wrapper -->

				<div id="slider-arrow-left"><i class="fa fa-chevron-left"></i></div>
				<div id="slider-arrow-right"><i class="fa fa-chevron-right"></i></div>

				<div id="slide-number">
					<div id="slide-number-current"></div><span><?php echo esc_html( '/'); ?></span><div id="slide-number-total"></div>
				</div><!-- #slide-number -->
			</div><!-- .swiper-container -->

			<?php if ( $settings['section_swiper_slider_scroll_down'] == 'yes' ) : ?>
				<div class="scroll-down wow bounce" data-wow-delay="2s"></div>
			<?php endif; ?>
		</section><!-- #slider -->
		<?php endif;
		if ( Plugin::$instance->editor->is_edit_mode() ) :  
			?>
			<script> 
			(function($) {
			var $window = $(window),
			$body = $('body'),
			$slider = $('#slider'),
			$sliderParallax = $('.slider-parallax'),
			$sliderCaption = $('.slider-caption'),
			$sliderScroll = $('.scroll-down'),
			$fullScreen = $('.full-screen');
				
			APP.slider = {
				init: function() {
					APP.slider.sliderParallax();
					APP.slider.sliderScrollDown();
					APP.slider.swiperSlider();
					APP.slider.fullScreen();
				},
				

			fullScreen: function() {
				var headerHeight = 0;
					wpAdminBarHeight = APP.initialize.wpAdminBar();

				if ($body.hasClass('small-device')) {
					headerHeight = 70;
				}

				if ($fullScreen.length > 0) {
					$fullScreen.each(function() {
						var scrHeight = $window.height() - headerHeight- wpAdminBarHeight;

						$(this).css('height', scrHeight);

						if ($(this).attr('id') == 'slider' && $(this).has('.swiper-slide')) {
							$(this).find('.swiper-slide').css('height', scrHeight);
						}
					});
				}
			},
			
				sliderParallax: function() { 
					if ($sliderParallax.length > 0) {
						if (!APP.isMobile.any()) {
							var parallaxHeight = $sliderParallax.outerHeight();

							if (parallaxHeight > $window.scrollTop()) {
								if ($window.scrollTop() > 0) {
									var tranformAmount1 = (($window.scrollTop()) / 3),
										tranformAmount2 = (($window.scrollTop()) / 6);

									$sliderParallax.stop(true, true).transition({
										y: tranformAmount1
									}, 0);
									$sliderCaption.stop(true, true).transition({
										y: -tranformAmount2
									}, 0);
									$sliderScroll.stop(true, true).css('bottom', 40 + $window.scrollTop() + 'px');
								} else {
									$sliderParallax.transition({
										y: 0
									}, 0);
									$sliderCaption.transition({
										y: 0
									}, 0);
									$sliderScroll.css('bottom', '40px');
								}
							}

							if (requesting) {
								requestAnimationFrame(function() {
									APP.slider.sliderParallax();
								});
							}
						}
					}
				},

				sliderFade: function() {
					if (!APP.isMobile.any()) {
						if ($window.scrollTop() > 0) {
							var sliderHeight = $slider.outerHeight();

							$slider.find($sliderCaption).css('opacity', ((sliderHeight / 2 - $window.scrollTop()) / sliderHeight).toFixed(1));
							$slider.find($sliderScroll).css('opacity', ((sliderHeight / 3 - $window.scrollTop()) / sliderHeight).toFixed(1));
							$slider.find('#slider-arrow-left, #slider-arrow-right').css('opacity', ((sliderHeight / 2 - $window.scrollTop()) / sliderHeight).toFixed(1));
						} else {
							$slider.find($sliderCaption).css('opacity', 1);
							$slider.find($sliderScroll).css('opacity', 1);
							$slider.find('#slider-arrow-left, #slider-arrow-right').css('opacity', 1);
						}
					}
				},

				sliderScrollDown: function() {

					var $scrollToElement = $slider.next();
					if ($slider.parent().hasClass('elementor-widget-container')) {
						var $scrollToElement = $slider.closest('section.elementor-element').next();
					} else {
						var $scrollToElement = $slider.next();
					}

					if ($scrollToElement.length > 0) {
						$sliderScroll.click(function() {
							var topOffsetScroll = APP.initialize.topScrollOffset();

							$('html, body').stop(true).animate({
								scrollTop: $scrollToElement.offset().top - topOffsetScroll
							}, 1000, 'easeInOutExpo');
						});
					}
				},

				swiperSlider: function() {
					if ($('.swiper-container').length > 0) {
						var autoslide = $('.swiper-container').attr('data-autoslide');
						var sliderspeed = $('.swiper-container').attr('data-sliderspeed');
						var autoplaySet = '';
						var autoplaySpeed = '';
						if (sliderspeed !== '') {
							autoplaySpeed = sliderspeed;
							console.log(sliderspeed);
						} else {
							autoplaySpeed = 5000;
						}

						if (autoslide !== '') {
							if (autoslide == 1 || autoslide == 'on') {
								var swipersetting = {
									slidesPerView: 1,
									grabCursor: true,
									resizeReInit: true,
									autoplay: {
										delay: autoplaySpeed,
										disableOnInteraction: false,
									},
									loop: true,
									navigation: {
										nextEl: '#slider-arrow-right',
										prevEl: '#slider-arrow-left',
									},
									on: {
										init: function(swiper) {
											$('.slider').find('[data-animation]').each(function() {
												var $toAnimateElement = $(this),
													animationDelayTime = Number($(this).attr('data-animation-delay'));
												var elementAnimation = $toAnimateElement.attr('data-animation');
												$toAnimateElement.addClass('no-animation');
												setTimeout(function() {
													$toAnimateElement.removeClass('no-animation').addClass('animated ' + elementAnimation);
												}, animationDelayTime);
											});
										},
										slideChangeTransitionStart: function(swiper) {
											$('.slider').find('[data-animation]').each(function() {
												var $toAnimateElement = $(this);
												var elementAnimation = $toAnimateElement.attr('data-animation');

												$toAnimateElement.removeClass('animated').removeClass(elementAnimation).addClass('no-animation');
											});
										},
										slideChangeTransitionEnd: function(swiper) {
											$('.slider .swiper-slide.swiper-slide-active').each(function() {
												var toAnimateElement = $(this);
												console.log(parseInt(toAnimateElement.attr('data-swiper-slide-index'), 10) + 1);
												$('#slide-number-current').html(parseInt(toAnimateElement.attr('data-swiper-slide-index'), 10) + 1);
												if (parseInt(toAnimateElement.attr('data-swiper-slide-index')) > 0) {

												}

											});
											$('.slider .swiper-slide.swiper-slide-active [data-animation]').each(function() {
												var $toAnimateElement = $(this),
													animationDelayTime = Number($(this).attr('data-animation-delay'));
												var elementAnimation = $toAnimateElement.attr('data-animation');

												$toAnimateElement.addClass('no-animation');

												setTimeout(function() {
													$toAnimateElement.removeClass('no-animation').addClass('animated ' + elementAnimation);
												}, animationDelayTime);
											});
										}
									}
								}

							} else {

								var swipersetting = {
									grabCursor: true,
									resizeReInit: true,
									navigation: {
										nextEl: '#slider-arrow-right',
										prevEl: '#slider-arrow-left',
									},
									on: {
										init: function(swiper) {
											$('.slider').find('[data-animation]').each(function() {
												var $toAnimateElement = $(this),
													animationDelayTime = Number($(this).attr('data-animation-delay'));

												var elementAnimation = $toAnimateElement.attr('data-animation');

												$toAnimateElement.addClass('no-animation');

												setTimeout(function() {
													$toAnimateElement.removeClass('no-animation').addClass('animated ' + elementAnimation);
												}, animationDelayTime);
											});
										},
										slideChangeTransitionStart: function(swiper) {
											console.log($('.swiper-container .swiper-wrapper .swiper-slide-active').index() + 1);
											//  $('#slide-number-current').html($('.swiper-container .swiper-wrapper .swiper-slide-active').index() + 1);

											$('.slider').find('[data-animation]').each(function() {
												var $toAnimateElement = $(this);
												var elementAnimation = $toAnimateElement.attr('data-animation');

												$toAnimateElement.removeClass('animated').removeClass(elementAnimation).addClass('no-animation');
											});
										},
										slideChangeTransitionEnd: function(swiper) {
											$('.slider .swiper-slide.swiper-slide-active').each(function() {
												var toAnimateElement = $(this);
												$('#slide-number-current').html(toAnimateElement.index() + 1);
											});

											$('.slider .swiper-slide.swiper-slide-active [data-animation]').each(function() {
												var $toAnimateElement = $(this),
													animationDelayTime = Number($(this).attr('data-animation-delay'));

												var elementAnimation = $toAnimateElement.attr('data-animation');

												$toAnimateElement.addClass('no-animation');

												setTimeout(function() {
													$toAnimateElement.removeClass('no-animation').addClass('animated ' + elementAnimation);
												}, animationDelayTime);
											});
										}
									}
								}

							}

							var swiperSlider = new Swiper('.swiper-container', swipersetting);

							if (autoslide !== '') {
								if (autoslide == 1 || autoslide == 'on') {
									var total_slides = swiperSlider.slides.length - 2;
								} else {
									var total_slides = swiperSlider.slides.length;
									$('#slide-number-current').html(swiperSlider.activeIndex + 1);
								}
							}
							$('#slide-number-total').html(total_slides);

						}
					}
				}
			}	
			 APP.slider.init();
			
			//ytplayer
			 var $youtubeBgPlayer = $('.yt-bg-player');	
				APP.widget = {
					init: function() {
						APP.widget.youtubeBgVideo();	
					},
					youtubeBgVideo: function() {
						if ($youtubeBgPlayer.length > 0 && !APP.isMobile.any()) {
							$youtubeBgPlayer.each(function() {
								var $element = $(this),
									ytbgVideo = $(this).attr('data-yt-video');
								var bgPlayerParams = {
									videoURL: ytbgVideo,
									mute: true,
									//ratio: 'auto',
									quality: 'default',
									opacity: 1,
									containment: 'self',
									optimizeDisplay: true,
									loop: true,
									vol: 80,
									autoPlay: true,
									realfullscreen: true,
									showYTLogo: false,
									showControls: false,
									stopMovieOnBlur: true
								}
								$element.mb_YTPlayer(bgPlayerParams);
								$(window).resize(function() {
									$element.mb_YTPlayer(bgPlayerParams);
								});
								$(this).append('<div class="yt-control"><i class="fa fa-pause" data-original-title="' + app_vars.pause + '"></i><i class="fa fa-volume-up" data-original-title="' + app_vars.unmute + '"></i><i class="fa fa-external-link-square" data-original-title="' + app_vars.popup + '"></i></div>');

								$('.yt-control i').tooltip({
									placement: 'top',
									container: 'body'
								});

								$element.find('.yt-control i').click(function() {
									var ytControlClass = $(this).attr('class');

									switch (ytControlClass) {
										case 'fa fa-pause':
											$element.YTPPause();;
											break;
										case 'fa fa-play':
											$element.YTPPlay();
											break;
										case 'fa fa-volume-off':
											$element.YTPMute();
											break;
										case 'fa fa-volume-up':
											$element.YTPUnmute();
											break;
										case 'fa fa-external-link-square':
											$element.YTPPause();
											$element.find('.yt-control').children().eq(0).toggleClass('fa-pause fa-play');

											$(this).magnificPopup({
												items: {
													src: ytbgVideo
												},
												type: 'iframe',
												removalDelay: 160,
												mainClass: 'mfp-fade',
												preloader: false,
												fixedContentPos: false
											}).magnificPopup('open');
											break;
									}
								});

								$element.find('.yt-control').children().eq(0).click(function() {
									$(this).toggleClass('fa-pause fa-play');

									if ($(this).hasClass('fa-play')) {
										$(this).attr('data-original-title', app_vars.play);
									} else {
										$(this).attr('data-original-title', app_vars.pause);
									}

									$(this).tooltip('hide');
								});

								$element.find('.yt-control').children().eq(1).click(function() {
									$(this).toggleClass('fa-volume-up fa-volume-off');

									if ($(this).hasClass('fa-volume-up')) {
										$(this).attr('data-original-title', app_vars.unmute);
									} else {
										$(this).attr('data-original-title', app_vars.mute);
									}

									$(this).tooltip('hide');
								});
							});
						}
					}
				}
				APP.widget.init();
			})(jQuery);
			</script>  
			<?php
		endif;
	}
	protected function content_template() {}
	public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_My_Custom_Elementor_Slider );
