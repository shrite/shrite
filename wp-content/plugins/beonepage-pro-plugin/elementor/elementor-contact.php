<?php
namespace Elementor;
use Elementor\Core\Schemes\Color;
if ( ! defined( 'ABSPATH' ) ) exit;
class Widget_My_Custom_Elementor_Contact extends  Widget_Base {
	public function get_categories() {
		return [ 'beonepage-widgets' ];
	}
	public function get_name() {
		return 'elementor-contact';
	}
	public function get_title() {
		return __( 'BeOne Contact', 'beonepage' );
	}
	public function get_icon() {
		return 'fa fa-address-book';
	}
	protected function _register_controls() {
		$this->add_control(
			'elementor_contact',
			[
            'label' => __( 'Contact Option', 'beonepage' ),
            'type' 	=> Controls_Manager::SECTION,
			]
		);
		// Title
		$beonepage_contact_module_title = beonepage_olddata_fetch_redux('front_page_contact_module_title', 'option');
		if(!empty($beonepage_contact_module_title)){
			$beonepage_contact_module_title = beonepage_olddata_fetch_redux('front_page_contact_module_title', 'option');
			$beonepage_contact_module_title = html_entity_decode($beonepage_contact_module_title);
		}else{
			$beonepage_contact_module_title = wp_kses("<span>Contact</span> Us",array('span' => array()));
		}
		$this->add_control(
			'section_title',
			[
				'label' 	=> __( "Title", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_contact_module_title,
				'title'		=> __( 'Enter Title', 'beonepage' ),
				'section' 	=> 'elementor_contact',
			]
		);		
        //Sub title
		$beonepage_contact_module_subtitle = beonepage_olddata_fetch_redux('front_page_contact_module_subtitle', 'option');
		if(!empty($beonepage_contact_module_subtitle)){
			$beonepage_contact_module_subtitle = beonepage_olddata_fetch_redux('front_page_contact_module_subtitle', 'option');
			$beonepage_contact_module_subtitle = html_entity_decode($beonepage_contact_module_subtitle);
		}else{
			$beonepage_contact_module_subtitle = esc_attr("We'd love to hear your feedback.");
		}
		$this->add_control(
			'section_sub_title',
			[
				'label' 	=> __( "Sub Title", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_contact_module_subtitle,
				'title' 	=> __( 'Enter Sub Title', 'beonepage' ),
				'section' 	=> 'elementor_contact',
			]
		);
		//Caption Animation
		$beonepage_contact_module_animation = beonepage_olddata_fetch_redux('front_page_contact_module_animation', 'option');
		if(!empty($beonepage_contact_module_animation)){
			$beonepage_contact_module_animation = beonepage_olddata_fetch_redux('front_page_contact_module_animation', 'option');
		}else{
			$beonepage_contact_module_animation = esc_attr("FadeInDown");
		}
        $this->add_control(
            'section_contact_module_animation',
            [
                'label'   => __( 'Caption Animation', 'beonepage' ),
                'type'    => Controls_Manager::SELECT,
                'default' => $beonepage_contact_module_animation,
                'options' => beonepage_theme_animate(),
                'section' => 'elementor_contact',
            ]
        );
		// Font Color
		$beonepage_contact_module_color = beonepage_olddata_fetch_redux('front_page_contact_module_color', 'option');
		if(!empty($beonepage_contact_module_color)){
			$beonepage_contact_module_color = beonepage_olddata_fetch_redux('front_page_contact_module_color', 'option');
		}else{
			$beonepage_contact_module_color = esc_attr("#eceff3");
		}
		$this->add_control(
			'section_font_color',
			[
				'label' 	=> __( "Font Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_contact_module_color,
				'scheme' 	=> [
					'type' 		=> Color::get_type(),
					'value' 	=> Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .contact-module' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_contact',
			]
		);
		//Separator Line Color
		$beonepage_contact_module_sp_color = beonepage_olddata_fetch_redux('front_page_contact_module_sp_color', 'option');
		if(!empty($beonepage_contact_module_sp_color)){
			$beonepage_contact_module_sp_color = beonepage_olddata_fetch_redux('front_page_contact_module_sp_color', 'option');
		}else{
			$beonepage_contact_module_sp_color = esc_attr("#888888");
		}
		$this->add_control(
			'section_separator_line_color',
			[
				'label' 	=> __( "Separator Line Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_contact_module_sp_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .contact-module .separator span:before, .contact-module .separator span:after' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_contact',
			]
		);
		//Separator Circle Color
		$beonepage_contact_module_sp_i_color = beonepage_olddata_fetch_redux('front_page_contact_module_sp_i_color', 'option');
		if(!empty($beonepage_contact_module_sp_i_color)){
			$beonepage_contact_module_sp_i_color = beonepage_olddata_fetch_redux('front_page_contact_module_sp_i_color', 'option');
		}else{
			$beonepage_contact_module_sp_i_color = esc_attr("#ffcc00");
		}
		$this->add_control(
			'section_separator_circle_color',
			[
				'label' 	=> __( "Separator Circle Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_contact_module_sp_i_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .contact-module .separator i' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_contact',
			]
		);
        //Background setting                
		$class = '';
		$attribute = '';    
        $beonepage_contact_module_bg = beonepage_olddata_fetch_redux('front_page_contact_module_bg', 'option');
        if(!empty($beonepage_contact_module_bg)){
			$beonepage_contact_module_bg = beonepage_olddata_fetch_redux('front_page_contact_module_bg', 'option');
        }else{
			$beonepage_contact_module_bg = esc_attr("color");
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
				'default' 	=> $beonepage_contact_module_bg,
				'toggle' 	=> true,
				'section' 	=> 'elementor_contact',
			]         
        );
		$beonepage_contact_module_bg_color = beonepage_olddata_fetch_redux('front_page_contact_module_bg_color', 'option');
        if(!empty($beonepage_contact_module_bg_color)){
          $beonepage_contact_module_bg_color = beonepage_olddata_fetch_redux('front_page_contact_module_bg_color', 'option');
		}else{
          $beonepage_contact_module_bg_color = esc_attr("#181a1c");
        }
        $this->add_control(
			'section_background_color',
			[
				'label' 	=> __( "Background Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_contact_module_bg_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
				   '{{WRAPPER}} .contact-module' => 'Background-color: {{VALUE}}',
				],
				'condition' => [
					'section_background' => 'color',
				],
				'section' 	=> 'elementor_contact',
			]         
        );        
        //Background image 
        $beonepage_contact_module_bg_img = beonepage_olddata_fetch_redux('front_page_contact_module_bg_img', 'option');
        if(!empty($beonepage_contact_module_bg_img['background-image'])){
			$beonepage_contact_module_bg_img = beonepage_olddata_fetch_redux('front_page_contact_module_bg_img', 'option');
			$beonepage_contact_module_bg_img_url = $beonepage_contact_module_bg_img['background-image'];
        }else{
			$beonepage_contact_module_bg_img_url = \Elementor\Utils::get_placeholder_image_src();
        }
        $this->add_control(
			'section_background_image',
			[
				'label' => __( "Bakground Image", 'beonepage' ),
				'type' 	=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 	=> esc_url($beonepage_contact_module_bg_img_url),
				],
				'condition' => [
					'section_background' => 'image',
				],
				'section' 	=> 'elementor_contact',
			]        
        );
        // Background Repeat
        $beonepage_contact_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_contact_module_bg_img', 'option');
        if(!empty($beonepage_contact_module_bg_img_rp['background-repeat'])){
          $beonepage_contact_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_contact_module_bg_img', 'option');
          $beonepage_contact_module_bg_img_rp = $beonepage_contact_module_bg_img_rp['background-repeat'];
        }else{
           $beonepage_contact_module_bg_img_rp = esc_attr("No Repeat");
        }
        $this->add_control(
            'section_background_image_rp',
            [
                'label' 	=> __( 'Background Repeat', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_contact_module_bg_img_rp,
                'options' 	=> [
                    'no-repeat' => __( 'No Repeat', 'beonepage' ),
                    'repeat' 	=> __( 'Repeat All', 'beonepage' ),
                    'repeat-x' 	=> __( 'Repeat Horizontally', 'beonepage' ),
                    'repeat-y' 	=> __( 'Repeat Vertically', 'beonepage' ),
                ],
                'section' 	=> 'elementor_contact',
				'condition'	=> [
                    'section_background' => 'image',
                ],
            ]         
        );
        //Background Position
        $beonepage_contact_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_contact_module_bg_img', 'option');
        if(!empty($beonepage_contact_module_bg_img_bp['background-position'])){
          $beonepage_contact_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_contact_module_bg_img', 'option');
          $beonepage_contact_module_bg_img_bp = $beonepage_contact_module_bg_img_bp['background-position'];
        }else{
           $beonepage_contact_module_bg_img_bp = esc_attr("Left Top");
        }
        $this->add_control(
            'section_background_image_bp',
            [
                'label' 	=> __( 'Background Position', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_contact_module_bg_img_bp,
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
                'section' 	=> 'elementor_contact',
				'condition' => [
                    'section_background' => 'image',
                ],
            ]        
        );
        //Background Size
        $beonepage_contact_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_contact_module_bg_img', 'option');
        if(!empty($beonepage_contact_module_bg_img_bs['background-size'])){
          $beonepage_contact_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_contact_module_bg_img', 'option');
          $beonepage_contact_module_bg_img_bs = $beonepage_contact_module_bg_img_bs['background-size'];
        }else{
          $beonepage_contact_module_bg_img_bs = esc_attr("cover");
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
				'default' 		=> $beonepage_contact_module_bg_img_bs,
				'toggle' 		=> true,
				'condition' 	=> [
					'section_background' => 'image',
				],
				'section' => 'elementor_contact',
			]         
        );
        //Background Attachment
        $beonepage_contact_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_contact_module_bg_img', 'option');
        if(!empty($beonepage_contact_module_bg_img_ath['background-attachment'])){
          $beonepage_contact_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_contact_module_bg_img', 'option');
          $beonepage_contact_module_bg_img_ath = $beonepage_contact_module_bg_img_ath['background-attachment'];
        }else{
          $beonepage_contact_module_bg_img_ath = esc_attr("Scroll");
        }
		$this->add_control(
			'section_background_image_ath',
			[
				'label' => __( "Background Attachment", 'beonepage' ),
				'type' 	=> Controls_Manager::CHOOSE,
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
				'default' 	=> $beonepage_contact_module_bg_img_ath,
				'toggle' 	=> true,
				'condition' => [
					'section_background' => 'image',
				],
				'section' 	=> 'elementor_contact',
			]         
        );
        //Background video field
        $beonepage_contact_module_bg_video = beonepage_olddata_fetch_redux('front_page_contact_module_bg_video', 'option');
		if(!empty($beonepage_contact_module_bg_video)){
			$beonepage_contact_module_bg_video = beonepage_olddata_fetch_redux('front_contact_table_module_bg_video', 'option');
			$beonepage_contact_module_bg_video = html_entity_decode($beonepage_contact_module_bg_video);
		}else{
			$beonepage_contact_module_bg_video =  esc_attr("Video Url");
		}
        $this->add_control(
			'section_youtube_url',
			[
				'label' 	=> __( "YouTube URL", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_contact_module_bg_video,
				'condition' => [
                    'section_background' => 'video',
                ],
				'description' => __( 'IMPORTANT NOTE: The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so its better to define both Image and YouTube Video for best results.', 'beonepage' ),
				'section' 	=> 'elementor_contact',
			]        
        );
        
        //Parallax setting
        $beonepage_contact_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_contact_module_bg_parallax', 'option');
        if(!empty($beonepage_contact_module_bg_parallax)){
			$beonepage_contact_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_contact_module_bg_parallax', 'option');
			$beonepage_contact_module_bg_parallax = html_entity_decode($beonepage_contact_module_bg_parallax);
        if($beonepage_contact_module_bg_parallax == 1){
            $beonepage_contact_module_bg_parallax_d = esc_attr("yes");
        }else{
            $beonepage_contact_module_bg_parallax_d = esc_attr("no");
        }  
        }else{
          $beonepage_contact_module_bg_parallax_d = esc_attr("yes");
        }
        $this->add_control(
			'section_bg_parallax',
			[
				'label' 		=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Enable', 'beonepage' ),
				'label_off' 	=> __( 'Disable', 'beonepage' ),
				'return_value' 	=> 'yes',
				'default' 		=> $beonepage_contact_module_bg_parallax_d,
				'section' 		=> 'elementor_contact',
			]
        );
		//Contact Form Animation
		$beonepage_contact_module_cf_animation = beonepage_olddata_fetch_redux('front_page_contact_module_cf_animation', 'option');
        if(!empty($beonepage_contact_module_cf_animation)){
          $beonepage_contact_module_cf_animation = beonepage_olddata_fetch_redux('front_page_contact_module_cf_animation', 'option');
        }else{
          $beonepage_contact_module_cf_animation = esc_attr("Swing");
        }
        $this->add_control(
            'section_form_animation',
            [
                'label'   => __( 'Contact Form Animation', 'beonepage' ),
                'type'    => Controls_Manager::SELECT,
                'default' => $beonepage_contact_module_cf_animation,
                'options' => beonepage_theme_animate(),
                'section' => 'elementor_contact',
            ]        
        );
		// Send Button Text
		$beonepage_contact_module_send = beonepage_olddata_fetch_redux('front_page_contact_module_send', 'option');
		if(!empty($beonepage_contact_module_send)){
			$beonepage_contact_module_send = beonepage_olddata_fetch_redux('front_page_contact_module_send', 'option');
		}else{
			$beonepage_contact_module_send = esc_attr("Send");
		}
		$this->add_control(
			'section_send_btn_text',
			[
				'label' 	=> __( "Send Button Text", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_contact_module_send,
				'section' 	=> 'elementor_contact',
			]
		);
		//Button Style
		$beonepage_contact_module_btn_style = beonepage_olddata_fetch_redux('front_page_contact_module_btn_style', 'option');
		if(!empty($beonepage_contact_module_btn_style)){
			$beonepage_contact_module_btn_style = beonepage_olddata_fetch_redux('front_page_contact_module_btn_style', 'option');
			$beonepage_contact_module_btn_style = $beonepage_contact_module_btn_style;
		if($beonepage_contact_module_btn_style == 1){
				$beonepage_contact_module_btn_style = esc_attr('light');
			}else{
			$beonepage_contact_module_btn_style = esc_attr('dark');
			}
		}else{
			$beonepage_contact_module_btn_style = esc_attr("light");
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
				'default' 	=> $beonepage_contact_module_btn_style,
				'toggle' 	=> true,
				'section' 	=> 'elementor_contact',
			]		 
		);
		// Enable Google Maps?
        $beonepage_contact_module_gmap = beonepage_olddata_fetch_redux('front_page_contact_module_gmap', 'option');
        if(!empty($beonepage_contact_module_gmap)){
			$beonepage_contact_module_gmap = beonepage_olddata_fetch_redux('front_page_contact_module_gmap', 'option');
			$beonepage_contact_module_gmap = html_entity_decode($beonepage_contact_module_gmap);
        if($beonepage_contact_module_gmap == 1){
            $beonepage_beonepage_contact_module_gmap_d = esc_attr("yes");
        }else{
            $beonepage_beonepage_contact_module_gmap_d = esc_attr("no");
        }  
        }else{
          $beonepage_beonepage_contact_module_gmap_d = esc_attr("yes");
        }
        $this->add_control(
			'section_bg_gmap',
			[
				'label' 		=> __( 'Enable Google Maps?', 'beonepage' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Enable', 'beonepage' ),
				'label_off' 	=> __( 'Disable', 'beonepage' ),
				'return_value' 	=> 'yes',
				'default' 		=> $beonepage_beonepage_contact_module_gmap_d,
				'section' 		=> 'elementor_contact',
			]
        );
		// Latitude
		$beonepage_contact_module_gmap_lat = beonepage_olddata_fetch_redux('front_page_contact_module_gmap_lat', 'option');
		if(!empty($beonepage_contact_module_gmap_lat)){
			$beonepage_contact_module_gmap_lat = beonepage_olddata_fetch_redux('front_page_contact_module_gmap_lat', 'option');
		}else{
			$beonepage_contact_module_gmap_lat = esc_attr("37.4217429");
		}
		$this->add_control(
			'section_latitude',
			[
				'label' 	=> __( "Latitude", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_contact_module_gmap_lat,
				'section' 	=> 'elementor_contact',
			]
		);
		// Longitude
		$beonepage_contact_module_gmap_lng = beonepage_olddata_fetch_redux('front_page_contact_module_gmap_lng', 'option');
		if(!empty($beonepage_contact_module_gmap_lng)){
			$beonepage_contact_module_gmap_lng = beonepage_olddata_fetch_redux('front_page_contact_module_gmap_lng', 'option');
		}else{
			$beonepage_contact_module_gmap_lng = esc_attr("-122.0844308");
		}
		$beonepage_contact_module_gmap_lng_note = wp_kses('<a href="http://support.google.com/maps/answer/18539" target="_blank">How to find latitude and longitude coordinates of a location?</a>',array('a' => array('href' => array(),'target' => array())));
		$this->add_control(
			'section_longitude',
			[
				'label' 	=> __( "Longitude", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_contact_module_gmap_lng,
				'section' 	=> 'elementor_contact',
				'description' => $beonepage_contact_module_gmap_lng_note,				
			]
		);
		// Google Maps API key
		$beonepage_contact_module_gmap_api_key = beonepage_olddata_fetch_redux('front_page_contact_module_gmap_api_key', 'option');
		if(!empty($beonepage_contact_module_gmap_api_key)){
			$beonepage_contact_module_gmap_api_key = beonepage_olddata_fetch_redux('front_page_contact_module_gmap_api_key', 'option');
		}else{
			$beonepage_contact_module_gmap_api_key = esc_attr("AIzaSyBdC7EwT231KtUaWriiBCKYh08dziyzhDA");
		}
		$beonepage_contact_module_gmap_api_key_note = wp_kses('<a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">How to get an API key?</a>',array('a' => array('href' => array(),'target' => array())));
		$this->add_control(
			'section_gmap_api_key',
			[
				'label' 	=> __( "Google Maps API key", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_contact_module_gmap_api_key,
				'section' 	=> 'elementor_contact',
				'description' => $beonepage_contact_module_gmap_api_key_note,				
			]
		);
		// Contact form Receiver Email
		$beonepage_contact_module_email = beonepage_olddata_fetch_redux('front_page_contact_module_email', 'option');
		if(!empty($beonepage_contact_module_email)){
			$beonepage_contact_module_email = beonepage_olddata_fetch_redux('front_page_contact_module_email', 'option');
		}else{
			$beonepage_contact_module_email = esc_attr("hi@betheme.me");
		}
		$this->add_control(
			'section_contact_receiver_email',
			[
				'label' 	=> __( "Contact form Receiver Email", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_contact_module_email,
				'section' 	=> 'elementor_contact',	
			]
		);
		//Enable privacy notice
        $front_page_contact_module_enable_privacy = beonepage_olddata_fetch_redux('front_page_contact_module_enable_privacy', 'option');
        if(!empty($front_page_contact_module_enable_privacy)){
			$front_page_contact_module_enable_privacy = beonepage_olddata_fetch_redux('front_page_contact_module_enable_privacy', 'option');
			$front_page_contact_module_enable_privacy = html_entity_decode($front_page_contact_module_enable_privacy);
        if($front_page_contact_module_enable_privacy == 1){
            $beonepage_contact_module_enable_privacy_d = esc_attr("yes");
        }else{
            $beonepage_contact_module_enable_privacy_d = esc_attr("no");
        }  
        }else{
          $beonepage_contact_module_enable_privacy_d = esc_attr("yes");
        }
        $this->add_control(
			'section_enable_privacy_notice',
			[
				'label' 		=> __( 'Enable privacy checkbox?', 'beonepage' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'beonepage' ),
				'label_off' 	=> __( 'No', 'beonepage' ),
				'return_value' 	=> 'yes',
				'default' 	=> $beonepage_contact_module_enable_privacy_d,
				'section' 		=> 'elementor_contact',
			]
        );
		//Contact Form Animation
		$beonepage_contact_module_cf_privacy_page = beonepage_olddata_fetch_redux('front_page_contact_module_cf_privacy_page', 'option');
        if(!empty($beonepage_contact_module_cf_privacy_page)){
          $beonepage_contact_module_cf_privacy_page = beonepage_olddata_fetch_redux('front_page_contact_module_cf_privacy_page', 'option');
        }else{
          $beonepage_contact_module_cf_privacy_page = '';
        }
        $this->add_control(
            'section_privacy_page',
            [
                'label'   => __( 'Select privacy page', 'beonepage' ),
                'type'    => Controls_Manager::SELECT,
                'options' => beonepage_page_list(),
                'default' => $beonepage_contact_module_cf_privacy_page,
                'condition' => [
					'section_enable_privacy_notice' => 'yes',
				],
                'section' => 'elementor_contact',
            ]        
        );
		//Contact data
		$result = array();
			$_beonepage_option_contact_box = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_contact_box', true );
			if(!empty($_beonepage_option_contact_box)){
				$_beonepage_option_contact_box = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_contact_box', true );
				
				foreach ( $_beonepage_option_contact_box as $contact_box ) :
					
					$beonepage_label = '';
					if(isset($contact_box['label']) && $contact_box['label'] != ''){
						$beonepage_label = $contact_box['label'];
					}
					$beonepage_description = '';
					if(isset($contact_box['description']) && $contact_box['description'] != ''){
						$beonepage_description = $contact_box['description'];
					}
					$beonepage_icon = '';
					if(isset($contact_box['icon']) && $contact_box['icon'] != ''){
						$beonepage_icon = $contact_box['icon'];
					}
					$beonepage_url = '';
					if(isset($contact_box['url']) && $contact_box['url'] != ''){
						$beonepage_url = $contact_box['url'];
					}
					$beonepage_animation = '';
					if(isset($contact_box['animation']) && $contact_box['animation'] != ''){
						$beonepage_animation = $contact_box['animation'];
					}
					$result[] = array('section_contact_box_label' => $beonepage_label, 
						'section_contact_box_description' => $beonepage_description,
						'section_contact_box_icon' 	=> "fa fa-".$beonepage_icon,
						'section_contact_box_url' => $beonepage_url,
						'section_contact_box_animation' => $beonepage_animation,							
					);	
				endforeach;
				
			}else{
				$result = array();
			}
			$section_contact_box_repeater = new \Elementor\Repeater();
			$section_contact_box_repeater->add_control(
				'section_contact_box_label',
				[
					'label' 		=> __( "Label", 'beonepage' ),
					'type' 			=> Controls_Manager::TEXT,
					'default' 		=> __( 'List Item', 'beonepage'),
					'label_block' 	=> true,
				]
			);
			$section_contact_box_repeater->add_control(
				'section_contact_box_description',
				[
					'label' 		=> 	__( "Description", 'beonepage' ),
					'type' 			=> Controls_Manager::TEXTAREA,
					'rows' 			=> 	7,
				]
			);
		 	$section_contact_box_repeater->add_control(
				'section_contact_box_icon',
				[
					'label' 		=> 	__( "Icon", 'beonepage' ),
					'type' 			=> 	Controls_Manager::ICON,
				]
			);
			$section_contact_box_repeater->add_control(
				'section_contact_box_url',
				[
					'label' 		=> __( "URL", 'beonepage' ),
					'type' 			=> Controls_Manager::TEXT,
					'placeholder' 	=> __( 'https://your-link.com', 'beonepage' ),
				]
			);
			$section_contact_box_repeater->add_control(
				'section_contact_box_animation',
				[
					'label' 		=> __( 'Animation', 'beonepage' ),
					'type' 			=> Controls_Manager::SELECT,
					'options' 		=> beonepage_theme_animate(),
				]
			); 
			$this->add_control(
				'section_contact_boxes',
				[
					'label' 	=> __('Contact data', 'beonepage' ),
					'type' 		=> Controls_Manager::REPEATER,
					'fields' 	=> $section_contact_box_repeater->get_controls(),
					'default' 		=> $result,								
					'section'	 	=> 'elementor_contact',
				]
			);			
	}// End finction
	protected function render( $instance = [] ) {
		$settings = $this->get_settings();	
		$class = '';
		$attribute = '';    
		$beonepage_contact_module_bg = beonepage_olddata_fetch_redux('front_page_contact_module_bg', 'option');
		if(!empty($beonepage_contact_module_bg)){
			$beonepage_contact_module_bg = beonepage_olddata_fetch_redux('front_page_contact_module_bg', 'option');
		}else{
			$beonepage_contact_module_bg = esc_attr("color");
		}       
		$beonepage_contact_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_contact_module_bg_parallax', 'option');
		if(!empty($beonepage_contact_module_bg_parallax)){
			$beonepage_contact_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_contact_module_bg_parallax', 'option');
		}else{
			$beonepage_contact_module_bg_parallax = esc_attr('0');
		}   
		if ( $beonepage_contact_module_bg == 'color' ) {
			$class = ' no-background';
		} else {
			$class = ' img-background';
		}
		if ( $beonepage_contact_module_bg == 'image' && $beonepage_contact_module_bg_parallax == '1' ) {
			$class .= ' parallax';
			$attribute = ' data-stellar-background-ratio="0.5"';
		}

		if ( $beonepage_contact_module_bg == 'video' ) {
			$class .= 'yt-bg-player';
			$attribute .= ' data-yt-video="' . beonepage_olddata_fetch_redux('front_page_contact_module_bg_video', 'option'). '"';
		}elseif( $settings['section_background'] == 'video'){
		$class .= ' yt-bg-player';
		$attribute .= ' data-yt-video="' . $settings['section_youtube_url'].'"';			
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
				.contact-module{
					background-image: url(<?php echo $beonepage_section_background_image_url; ?>);
				}
			<?php }
			if(isset($beonepage_section_background_color) && $beonepage_section_background_color !=''){?>
				.contact-module{
					background-color: <?php echo $beonepage_section_background_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_font_color) && $beonepage_section_font_color !=''){?>
				.contact-module{
					color: <?php echo $beonepage_section_font_color; ?>;
				}
			<?php } 
			if(isset($beonepage_section_separator_line_color) && $beonepage_section_separator_line_color !=''){?>	
				.contact-module .separator span{
					color: <?php echo $beonepage_section_separator_line_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_separator_circle_color) && $beonepage_section_separator_circle_color !=''){?>	
				.contact-module .separator i {
					color: <?php echo $beonepage_section_separator_circle_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_rp) && $beonepage_section_background_image_rp !=''){?>
				.contact-module{
					background-repeat: <?php echo $beonepage_section_background_image_rp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bp) && $beonepage_section_background_image_bp !=''){?>
				.contact-module{
					background-position: <?php echo $beonepage_section_background_image_bp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bs) && $beonepage_section_background_image_bs !=''){?>
				.contact-module{
					background-size: <?php echo $beonepage_section_background_image_bs; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_ath) && $beonepage_section_background_image_ath !=''){?>
				.contact-module {
					background-attachment: <?php echo $beonepage_section_background_image_ath; ?>;
				}
			<?php } ?>
		</style>

		<section id="contact" class="module contact-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
			<div class="container">
				<div class="row">
					<?php if ( $settings['section_title'] != '' ) : ?>
						<?php $animation = $settings['section_contact_module_animation'] != 'none' ? ' wow ' . $settings['section_contact_module_animation'] . '" data-wow-delay=".2s' : ''; ?>

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

					<?php $contact_boxes = $settings['section_contact_boxes']; ?>

					<?php if ( ! empty( $contact_boxes ) ) : ?>
						<div class="contact-info col-md-4 clearfix">
							<?php foreach ( $contact_boxes as $contact_box ) : ?>
								<div class="contact-item<?php echo isset( $contact_box['section_contact_box_animation'] ) && $contact_box['section_contact_box_animation'] != '' ? ' wow ' . $contact_box['section_contact_box_animation'] . '" data-wow-delay=".5s' : ''; ?>">
									<?php if ( isset( $contact_box['section_contact_box_icon'] ) && $contact_box['section_contact_box_icon'] != '' ) : ?>
										<div class="ci-icon"><i class="<?php $icon = $contact_box['section_contact_box_icon']; 
											if (strpos($icon, 'fa fa-') !== false) {
											echo $icon; 
										}else{
											echo "fa fa-".$icon; 
										} ?>"></i></div>
									<?php endif; ?>

									<?php if ( isset( $contact_box['section_contact_box_label'] ) && $contact_box['section_contact_box_label'] != '' ) : ?>
										<div class="ci-title"><?php echo $contact_box['section_contact_box_label']; ?></div>
									<?php endif; ?>

									<?php if ( isset( $contact_box['section_contact_box_description'] ) && $contact_box['section_contact_box_description'] != '' ) : ?>
										<?php if ( isset( $contact_box['section_contact_box_url'] ) && $contact_box['section_contact_box_url'] != '' ) : ?>
											<div class="ci-content"><a href="<?php echo $contact_box['section_contact_box_url']; ?>"><?php echo $contact_box['section_contact_box_description']; ?></a></div>
										<?php else : ?>
											<div class="ci-content"><?php echo $contact_box['section_contact_box_description']; ?></div>
										<?php endif; ?>
									<?php endif; ?>
								</div><!-- .contact-info -->
							<?php endforeach; ?> 
						</div><!-- .contact-item  -->
					<?php endif; ?>

					<?php $animation = $settings['section_form_animation'] != 'none' ? ' wow ' . $settings['section_form_animation'] . '" data-wow-delay=".5s' : ''; ?>

					<div class="contact-form col-md-7 col-md-offset-1 clearfix<?php echo $animation; ?>">
						<?php
							$a = rand( 0, 9 );
							$b = rand( 0, 9 );
							$required = esc_attr__( 'This field is required.', 'beonepage' );
							$equalto = esc_attr__( 'Please check your math.', 'beonepage' );
							$email = esc_attr__( 'Invalid email address.', 'beonepage' );
						?>

						<form id="contact-form" class="contact-form clearfix">
							<div class="contact-form-process">
								<i class="fa fa-spinner fa-pulse"></i>
							</div><!-- .contact-form-process -->

							<div id="contact-form-result"><span></span></div>

							<fieldset class="col-sm-4">
								<input type="text" id="contact-form-name" name="name" placeholder="<?php echo esc_html__( 'Name', 'beonepage' ); ?>" value="<?php if( isset( $_POST['name'] ) ) { echo esc_attr( $_POST['name'] ); } ?>" class="cf-form-control required" data-msg-required="<?php echo $required; ?>" />
							</fieldset>

							<fieldset class="col-sm-4">
								<input type="email" id="contact-form-email" name="email" placeholder="<?php esc_html_e( 'Email', 'beonepage' ); ?>" value="<?php if( isset( $_POST['email'] ) ) { echo esc_attr( $_POST['email'] ); } ?>" class="required email cf-form-control" data-msg-required="<?php echo $required; ?>" data-msg-email="<?php echo $email; ?>" />
							</fieldset>

							<fieldset class="col-sm-4">
								<input type="text" id="contact-form-phone" name="phone" placeholder="<?php esc_html_e( 'Phone', 'beonepage' ); ?>" value="<?php if( isset( $_POST['phone'] ) ) { echo esc_attr( $_POST['phone'] ); } ?>" class="cf-form-control" />
							</fieldset>

							<fieldset class="col-sm-12">
								<input type="text" id="contact-form-subject" name="subject" placeholder="<?php esc_html_e( 'Subject', 'beonepage' ); ?>" value="<?php if( isset( $_POST['subject'] ) ) { echo esc_attr( $_POST['subject'] ); } ?>" class="required cf-form-control" data-msg-required="<?php echo $required; ?>" />
							</fieldset>

							<fieldset class="col-sm-12">
								<textarea rows="3" id="contact-form-message" name="message" placeholder="<?php esc_html_e( 'Message', 'beonepage' ); ?>" class="required cf-form-control" data-msg-required="<?php echo $required; ?>"><?php if( isset( $_POST['message'] ) ) { echo esc_attr( $_POST['message'] ); } ?></textarea>
							</fieldset>

							<fieldset class="captcha col-sm-6">
								<input type="text" id="contact-form-captcha" name="captcha" placeholder="<?php echo $a . ' + ' . $b . ' = ?'; ?>" class="required cf-form-control" data-msg-required="<?php echo $required; ?>" data-rule-equalto="#captcha-value" data-msg-equalto="<?php echo $equalto; ?>" />
								<input type="hidden" id="captcha-value" value="<?php echo $a + $b; ?>">
							</fieldset><!-- .captcha -->
							
							<?php if ( $settings['section_enable_privacy_notice'] == 'yes' ) {
								$page_id = $settings['section_privacy_page'];
								?>
							<fieldset class="checkbox col-sm-12">
								<input type="checkbox" id="contact-form-checkbox" name="checkbox" required class="required cf-form-control" value="1"  />
								<span><?php esc_html_e( 'By filling out this form and clicking submit, you agree to our ', 'beonepage' ); ?></span><a href="<?php the_permalink($page_id); ?> " target="_blank"><?php echo get_the_title($page_id); ?></a>
							</fieldset><!-- .checkbox -->
							<?php } ?>
							
							<fieldset class="submit col-sm-6">
								<input type="hidden" name="action" value="contact_form">

								<?php wp_nonce_field( 'ajax_contact_form', 'ajax_contact_form_nonce' ); ?>

								<button class="btn <?php echo $settings['section_button_style'] == 'light' ? 'btn-light' : 'btn-dark'; ?>" type="submit" id="contact-form-submit" name="submit" value="submit"><?php echo $settings['section_send_btn_text']; ?></button>
							</fieldset><!-- .submit -->
						</form>
					</div><!-- .contact-form -->
				</div><!-- .row -->
			</div><!-- .container -->
		</section><!-- #contact -->

		<?php if ( $settings['section_bg_gmap'] == 'yes' ) : ?>
			<div id="gmap" class="wow fadeInUp" data-wow-delay="1s">
				<a href="#google-map" data-original-title="<?php echo strtoupper( esc_attr__( 'Locate us on the map', 'beonepage' ) ); ?>"><i class="fa fa-street-view"></i></span></i></a>
				<div class="circle-left"></div>
				<div class="square"></div>
				<div class="rectangle"></div>
				<div class="circle-right"></div>
			</div><!-- #gmap -->

			<div id="gmap-container" data-gmap-lat="<?php echo $settings['section_latitude']; ?>" data-gmap-lng="<?php echo $settings['section_longitude']; ?>"></div>
		<?php endif;
		
		if ( Plugin::$instance->editor->is_edit_mode() ) :  
			?>
			<script> 
				(function($) {	
				
					var $contactForm = $('#contact-form'),
						$gmContainer = $('#gmap-container');
						
					APP.widget = {
						init: function() {
							APP.widget.sendMail();
						},
						sendMail: function() {
							$contactForm.validate({
								submitHandler: function(form) {
									$cfProcess.fadeIn();

									$.ajax({
										type: 'POST',
										url: app_vars.ajax_url,
										dataType: 'JSON',
										data: $contactForm.serialize(),
										success: function(data) {
											$cfProcess.fadeOut();
											$contactForm.find('.cf-form-control').val('');

											if (data.error) {
												$cfResult.find('span').html('<i class="fa fa-times-circle-o"></i>' + data.error);
											} else {
												$cfResult.find('span').html('<i class="fa fa-check-circle-o"></i>' + data.success);
											}

											$cfResult.show('slow').delay(3000).hide('slow');
										},
										error: function(data, errorThrown) {
											console.log(errorThrown);
										}
									});

									return false;
								}
							});
							
							$('#contact-form-submit').on('click', function() {
								setTimeout(function() {
									$contactForm.find('.error').each(function() {
										var text = $(this).text();

										$(this).closest('fieldset').find('input, textarea').blur();

										if (text != '') {
											$element = $(this).closest('fieldset').find("input[type!='hidden'], textarea");

											$element.val(text);
											$element.addClass('error');

											$element.focus(function() {
												if ($(this).val() === text) {
													$(this).val('');
													$(this).removeClass('error');
												}
											});
										}
									});
								}, 500);
							});

							$('#contact-form-message').niceScroll({
								cursorcolor: $('.contact-module').css('color'),
								cursorwidth: '5px',
								cursorfixedheight: 25,
								cursorborder: 0,
								cursorborderradius: 0,
								scrollspeed: 5,
								mousescrollstep: 5,
								horizrailenabled: false,
								autohidemode: false,
								zindex: 99
							});
						},

						googleMap: function() {
							if ($gmContainer.next().length > 0) {
								var bgColor = $gmContainer.next().css('background-color');
							} else {
								var bgColor = $('.site-footer').css('background-color');
							}

							$gmContainer.css('background-color', bgColor);
							$('#gmap .square, #gmap .rectangle').css('background-color', bgColor);

							$("a[href='#google-map']").tooltip({
								placement: 'bottom',
								container: 'body'
							});

							var title = $("a[href='#google-map']").attr('data-original-title');

							$("a[href='#google-map']").click(function(e) {
								var $element = $(this);

								if ($element.hasClass('map-active')) {
									$gmContainer.slideUp('slow');
								} else {
									$gmContainer.slideDown();

									setTimeout(function() {
										var topOffsetScroll = APP.initialize.topScrollOffset();

										$('html, body').stop(true).animate({
											scrollTop: $element.offset().top - topOffsetScroll - 10
										}, 'slow', 'easeInBack');
									}, 100);

									setTimeout(function() {
										if ($gmContainer.find('.gm-style').length == 0) {
											google.maps.event.addDomListener(window, 'load', APP.widget.initializeMap());
										}
									}, 500);
								}

								$element.toggleClass('map-active');

								if ($element.hasClass('map-active')) {
									$element.attr('data-original-title', app_vars.close_map.toUpperCase());
								} else {
									$element.attr('data-original-title', title);
								}

								$element.tooltip('hide');

								e.preventDefault();
							});
						},

						initializeMap: function() {
							var addLat = $gmContainer.attr('data-gmap-lat'),
								addLng = $gmContainer.attr('data-gmap-lng');

							var addLatlng = new google.maps.LatLng(addLat, addLng);

							var mapOptions = {
								zoom: 15,
								scrollwheel: false,
								center: addLatlng,
								styles: [{
									"featureType": "landscape",
									"stylers": [{
										"saturation": -100
									}, {
										"lightness": 65
									}, {
										"visibility": "on"
									}]
								}, {
									"featureType": "poi",
									"stylers": [{
										"saturation": -100
									}, {
										"lightness": 51
									}, {
										"visibility": "simplified"
									}]
								}, {
									"featureType": "road.highway",
									"stylers": [{
										"saturation": -100
									}, {
										"visibility": "simplified"
									}]
								}, {
									"featureType": "road.arterial",
									"stylers": [{
										"saturation": -100
									}, {
										"lightness": 30
									}, {
										"visibility": "on"
									}]
								}, {
									"featureType": "road.local",
									"stylers": [{
										"saturation": -100
									}, {
										"lightness": 40
									}, {
										"visibility": "on"
									}]
								}, {
									"featureType": "transit",
									"stylers": [{
										"saturation": -100
									}, {
										"visibility": "simplified"
									}]
								}, {
									"featureType": "administrative.province",
									"stylers": [{
										"visibility": "off"
									}]
								}, {
									"featureType": "water",
									"elementType": "labels",
									"stylers": [{
										"visibility": "on"
									}, {
										"lightness": -25
									}, {
										"saturation": -100
									}]
								}, {
									"featureType": "water",
									"elementType": "geometry",
									"stylers": [{
										"hue": "#ffff00"
									}, {
										"lightness": -25
									}, {
										"saturation": -97
									}]
								}]
							};

							var map = new google.maps.Map($gmContainer[0], mapOptions);

							google.maps.event.addDomListener(window, 'resize', function() {
								var center = map.getCenter();

								google.maps.event.trigger(map, 'resize');
								map.setCenter(center);
							});

							var iconMarker = 'M27.648 -41.399q0 -3.816 -2.7 -6.516t-6.516 -2.7 -6.516 2.7 -2.7 6.516 2.7 6.516 6.516 2.7 6.516 -2.7 2.7 -6.516zm9.216 0q0 3.924 -1.188 6.444l-13.104 27.864q-0.576 1.188 -1.71 1.872t-2.43 0.684 -2.43 -0.684 -1.674 -1.872l-13.14 -27.864q-1.188 -2.52 -1.188 -6.444 0 -7.632 5.4 -13.032t13.032 -5.4 13.032 5.4 5.4 13.032z';

							var marker = new google.maps.Marker({
								position: addLatlng,
								map: map,
								icon: {
									path: iconMarker,
									scale: 1,
									strokeOpacity: 0,
									fillColor: app_vars.accent_color,
									fillOpacity: 1,
									size: new google.maps.Size(35, 55),
									origin: new google.maps.Point(0, 0),
									anchor: new google.maps.Point(10, 10)
								},
								clickable: false
							});
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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_My_Custom_Elementor_Contact );
