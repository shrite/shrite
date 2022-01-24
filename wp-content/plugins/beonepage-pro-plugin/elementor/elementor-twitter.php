<?php
namespace Elementor;
use Elementor\Core\Schemes\Color;
if ( ! defined( 'ABSPATH' ) ) exit;
class Widget_My_Custom_Elementor_twitter extends Widget_Base {
	
	public function get_categories() {
		return [ 'beonepage-widgets' ];
	}
	public function get_name() {
		return 'elementor-twitter';
	}
	public function get_title() {
		return __( 'BeOne Twitter', 'beonepage' );
	}
	public function get_icon() {
		return 'fa fa-twitter';
	}
	protected function _register_controls() {
		$this->add_control(
			'elementor_twitter',
			[
				'label' => __( 'Twitter Option', 'beonepage' ),
				'type' 	=> Controls_Manager::SECTION,
			]
		);
		//Twitter Logo Animation
		$beonepage_twitter_twitter_animation = beonepage_olddata_fetch_redux('front_page_twitter_twitter_animation', 'option');
		if(!empty($beonepage_twitter_twitter_animation)){
			$beonepage_twitter_twitter_animation = beonepage_olddata_fetch_redux('front_page_twitter_twitter_animation', 'option');
		}else{
			$beonepage_twitter_twitter_animation = esc_attr("tada");
		}
		$this->add_control(
			'section_twitter_logo_animation',
			[
				'label'   => __( 'Twitter Logo Animation', 'beonepage' ),
				'type'    => Controls_Manager::SELECT,
				'default' => $beonepage_twitter_twitter_animation,
				'options' => beonepage_theme_animate(),
				'section' => 'elementor_twitter',
			]
         
        );
		// Twitter Username
		$beonepage_twitter_twitter_username = beonepage_olddata_fetch_redux('front_page_twitter_twitter_username', 'option');
		if(!empty($beonepage_twitter_twitter_username)){
			$beonepage_twitter_twitter_username = beonepage_olddata_fetch_redux('front_page_twitter_twitter_username', 'option');
		}else{
			$beonepage_twitter_twitter_username = esc_attr("twitter");
		}
		$this->add_control(
			'section_twitter_username',
			[
				'label' 	=> __( 'Twitter Username', 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_twitter_twitter_username,
				'title'		=> __( 'Enter Twitter Username', 'beonepage' ),
				'section' 	=> 'elementor_twitter',
			]
		);
		// Consumer Key
		$beonepage_twitter_twitter_tck = beonepage_olddata_fetch_redux('front_page_twitter_twitter_tck', 'option');
		if(!empty($beonepage_twitter_twitter_tck)){
			$beonepage_twitter_twitter_tck = beonepage_olddata_fetch_redux('front_page_twitter_twitter_tck', 'option');
		}else{
			$beonepage_twitter_twitter_tck = esc_attr("DYlJVGybOVxBnwnXJVV29r2Xr");
		}
		$this->add_control(
			'section_Consumer_Key',
			[
				'label' 	=> __( 'Consumer Key', 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_twitter_twitter_tck,
				'title'		=> __( 'Enter Twitter Username', 'beonepage' ),
				'section' 	=> 'elementor_twitter',
			]
		);
		// Consumer Secret
		$beonepage_twitter_twitter_tcs = beonepage_olddata_fetch_redux('front_page_twitter_twitter_tcs', 'option');
		if(!empty($beonepage_twitter_twitter_tcs)){
			$beonepage_twitter_twitter_tcs = beonepage_olddata_fetch_redux('front_page_twitter_twitter_tcs', 'option');
		}else{
			$beonepage_twitter_twitter_tcs = esc_attr("Y0XoZgOAfefMhMZMzRVw8nYUdUTDDhJEETPjcdihn4kkr6d7VG");
		}
		$this->add_control(
			'section_consumer_secret',
			[
				'label' 	=> __( 'Consumer Secret', 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_twitter_twitter_tcs,
				'title'		=> __( 'Enter Twitter Username', 'beonepage' ),
				'section' 	=> 'elementor_twitter',
			]
		);
		// Access Token
		$beonepage_twitter_twitter_tat = beonepage_olddata_fetch_redux('front_page_twitter_twitter_tat', 'option');
		if(!empty($beonepage_twitter_twitter_tat)){
			$beonepage_twitter_twitter_tat = beonepage_olddata_fetch_redux('front_page_twitter_twitter_tat', 'option');
		}else{
			$beonepage_twitter_twitter_tat = esc_attr("2802824782-kxLIjPOOsZOlvV3Gy1ujgVo9YUuc1Df05FF6AGy");
		}
		$this->add_control(
			'section_access_token',
			[
				'label' 	=> __( 'Access Token', 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_twitter_twitter_tat,
				'title'		=> __( 'Enter Twitter Username', 'beonepage' ),
				'section' 	=> 'elementor_twitter',
			]
		);
		// Access Token Secret
		$beonepage_twitter_twitter_tats = beonepage_olddata_fetch_redux('front_page_twitter_twitter_tats', 'option');
		if(!empty($beonepage_twitter_twitter_tats)){
			$beonepage_twitter_twitter_tats = beonepage_olddata_fetch_redux('front_page_twitter_twitter_tats', 'option');
		}else{
			$beonepage_twitter_twitter_tats = esc_attr("OgpdQ8liZN4EMbLJgv2RVmWDNQQEnerI2uSZb0U405f50");
		}
		$beonepage_twitter_twitter_note = wp_kses('<a href="http://docs.betheme.me/article/32-getting-twitter-api-consumer-and-secret-keys" target="_blank">How to get Twitter API Consumer and Secret Keys?</a>',array('a' => array('href' => array(),'target' => array())));
		$this->add_control(
			'section_access_token_secret',
			[
				'label' 	=> __( 'Access Token Secret', 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_twitter_twitter_tats,
				'title'		=> __( 'Enter Twitter Username', 'beonepage' ),
				'description' => $beonepage_twitter_twitter_note,
				'section' 	=> 'elementor_twitter',
			]
		);
		// Button Text
		$beonepage_twitter_btn_text = beonepage_olddata_fetch_redux('front_page_twitter_btn_text', 'option');
		if(!empty($beonepage_twitter_btn_text)){
			$beonepage_twitter_btn_text = beonepage_olddata_fetch_redux('front_page_twitter_btn_text', 'option');
		}else{
			$beonepage_twitter_btn_text = esc_attr("Follow Us");
		}
		$this->add_control(
			'section_button_text',
			[
				'label' 	=> __( 'Button Text', 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_twitter_btn_text,
				'title'		=> __( 'Enter Twitter Username', 'beonepage' ),
				'section' 	=> 'elementor_twitter',
			]
		);
		// Button URL
		$beonepage_twitter_btn_url = beonepage_olddata_fetch_redux('front_page_twitter_btn_url', 'option');
		if(!empty($beonepage_twitter_btn_url)){
			$beonepage_hor_twitter_url = beonepage_olddata_fetch_redux('front_page_twitter_btn_url', 'option');
		}else{
			$beonepage_twitter_btn_url = esc_url("http://betheme.me");
		}
		$this->add_control(
			'section_button_url',
			[
				'label' 	=> 	__( "Button URL", 'beonepage' ),
				'type' 		=> 	Controls_Manager::TEXT,
				'default'	=> 	$beonepage_twitter_btn_url,
				'title' 	=> 	__( 'Enter Button URL', 'beonepage' ),
				'section' 	=> 	'elementor_twitter',
			]		 
		);
		//Button Animation
		$beonepage_twitter_btn_animation = beonepage_olddata_fetch_redux('front_page_twitter_btn_animation', 'option');
        if(!empty($beonepage_twitter_btn_animation)){
          $beonepage_twitter_btn_animation = beonepage_olddata_fetch_redux('front_page_twitter_btn_animation', 'option');
        }else{
          $beonepage_twitter_btn_animation = esc_attr("flipInY");
        }
        $this->add_control(
            'section_button_animation',
            [
                'label'   => __( 'Button Animation', 'beonepage' ),
                'type'    => Controls_Manager::SELECT,
                'default' => $beonepage_twitter_btn_animation,
                'options' => beonepage_theme_animate(),
                'section' => 'elementor_twitter',
            ]        
        );
		//Button Style
		$beonepage_twitter_btn_style = beonepage_olddata_fetch_redux('front_page_twitter_btn_style', 'option');
		if(!empty($beonepage_twitter_btn_style)){
			$beonepage_twitter_btn_style = beonepage_olddata_fetch_redux('front_page_twitter_btn_style', 'option');
		if($beonepage_twitter_btn_style == 1){
				$beonepage_twitter_btn_style = esc_attr('light');
		}else{
			$beonepage_twitter_btn_style = esc_attr('dark');
		}
		}else{
			$beonepage_twitter_btn_style = esc_attr("light");
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
				'default' 	=> $beonepage_twitter_btn_style,
				'toggle' 	=> true,
				'section' 	=> 'elementor_twitter',
			]		 
		);
		//Font Color
		$beonepage_twitter_color = beonepage_olddata_fetch_redux('front_page_twitter_color', 'option');
		if(!empty($beonepage_twitter_color)){
		  $beonepage_twitter_color = beonepage_olddata_fetch_redux('front_page_twitter_color', 'option');		  
		}else{
		  $beonepage_twitter_color = esc_attr("#eceff3");
		}
		$this->add_control(
			'section_font_color',
			[
				'label' 	=> __( "Font Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_twitter_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .twitter-module, .twitter-module h2' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_twitter',
			]		 
		);
		//Twitter Logo & Link Color
		$beonepage_twitter_link_color = beonepage_olddata_fetch_redux('front_page_twitter_link_color', 'option');
		if(!empty($beonepage_twitter_link_color)){
		  $beonepage_twitter_link_color = beonepage_olddata_fetch_redux('front_page_twitter_link_color', 'option');		  
		}else{
		  $beonepage_twitter_link_color = esc_attr("#ffcc00");
		}
		$this->add_control(
			'section_logo_link_color',
			[
				'label' 	=> __( "Twitter Logo & Link Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_twitter_link_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .twitter-module .twitter-icon, .twitter-module .tweet a' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_twitter',
			]		 
		);
        //Background setting                
		$class = '';
		$attribute = '';    
        $beonepage_twitter_module_bg = beonepage_olddata_fetch_redux('front_page_twitter_module_bg', 'option');
        if(!empty($beonepage_twitter_module_bg)){
			$beonepage_twitter_module_bg = beonepage_olddata_fetch_redux('front_page_twitter_module_bg', 'option');
        }else{
			$beonepage_twitter_module_bg = esc_attr("color");
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
				'default' 	=> $beonepage_twitter_module_bg,
				'toggle' 	=> true,
				'section' 	=> 'elementor_twitter',
			]
         
        );
		//Background Color
		$beonepage_twitter_module_bg_color = beonepage_olddata_fetch_redux('front_page_twitter_module_bg_color', 'option');
        if(!empty($beonepage_twitter_module_bg_color)){
			$beonepage_twitter_module_bg_color = beonepage_olddata_fetch_redux('front_page_twitter_module_bg_color', 'option');
		}else{
			$beonepage_twitter_module_bg_color = esc_attr("#ffcc00");
        }
        $this->add_control(
			'section_background_color',
			[
				'label' 	=> __( "Background Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_twitter_module_bg_color,
				'scheme' 	=> [
						'type' 	=> Color::get_type(),
						'value' => Color::COLOR_1,
					],
					'selectors' => [
					   '{{WRAPPER}} .twitter-module' => 'Background-color: {{VALUE}}',
					],
					'condition' => [
						'section_background' => 'color',
					],
				'section' 	=> 'elementor_twitter',
			]         
        );        
        //Background image 
        $beonepage_twitter_module_bg_img = beonepage_olddata_fetch_redux('front_page_twitter_module_bg_img', 'option');
        if(!empty($beonepage_twitter_module_bg_img['background-image'])){
			$beonepage_twitter_module_bg_img = beonepage_olddata_fetch_redux('front_page_twitter_module_bg_img', 'option');
			$beonepage_twitter_module_bg_img_url = $beonepage_twitter_module_bg_img['background-image'];
        }else{
			$beonepage_twitter_module_bg_img_url = \Elementor\Utils::get_placeholder_image_src();
        }
        $this->add_control(
			'section_background_image',
			[
				'label' => __( "Bakground Image", 'beonepage' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => esc_url($beonepage_twitter_module_bg_img_url),
				],
				'condition' => [
					'section_background' => 'image',
				],
				'section' => 'elementor_twitter',
			]
        );
        // Background Repeat
        $beonepage_twitter_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_twitter_module_bg_img', 'option');
        if(!empty($beonepage_twitter_module_bg_img_rp['background-repeat'])){
          $beonepage_twitter_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_twitter_module_bg_img', 'option');
          $beonepage_twitter_module_bg_img_rp = $beonepage_twitter_module_bg_img_rp['background-repeat'];
        }else{
           $beonepage_twitter_module_bg_img_rp = esc_attr("No Repeat");
        }
        $this->add_control(
            'section_background_image_rp',
            [
                'label' 	=> __( 'Background Repeat', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_twitter_module_bg_img_rp,
                'options' 	=> [
                    'no-repeat' => __( 'No Repeat', 'beonepage' ),
                    'repeat' 	=> __( 'Repeat All', 'beonepage' ),
                    'repeat-x' 	=> __( 'Repeat Horizontally', 'beonepage' ),
                    'repeat-y' 	=> __( 'Repeat Vertically', 'beonepage' ),
                ],
                'section' 	=> 'elementor_twitter',
				'condition'	=> [
                    'section_background' => 'image',
                ],
            ]         
        );
        //Background Position
        $beonepage_twitter_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_twitter_module_bg_img', 'option');
        if(!empty($beonepage_twitter_module_bg_img_bp['background-position'])){
          $beonepage_twitter_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_twitter_module_bg_img', 'option');
          $beonepage_twitter_module_bg_img_bp = $beonepage_twitter_module_bg_img_bp['background-position'];
        }else{
           $beonepage_twitter_module_bg_img_bp = esc_attr("Left Top");
        }
        $this->add_control(
            'section_background_image_bp',
            [
                'label' 	=> __( 'Background Position', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_twitter_module_bg_img_bp,
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
                'section' 	=> 'elementor_twitter',
				'condition' => [
                    'section_background' => 'image',
                ],
            ]
        );
        //Background Size
        $beonepage_twitter_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_twitter_module_bg_img', 'option');
        if(!empty($beonepage_twitter_module_bg_img_bs['background-size'])){
          $beonepage_twitter_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_twitter_module_bg_img', 'option');
          $beonepage_twitter_module_bg_img_bs = $beonepage_twitter_module_bg_img_bs['background-size'];
        }else{
          $beonepage_twitter_module_bg_img_bs = esc_attr("auto");
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
				'default' 		=> $beonepage_twitter_module_bg_img_bs,
				'toggle' 		=> true,
				'condition' 	=> [
					'section_background' => 'image',
				],
				'section' => 'elementor_twitter',
			]
        );
        //Background Attachment
        $beonepage_twitter_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_twitter_module_bg_img', 'option');
        if(!empty($beonepage_twitter_module_bg_img_ath['background-attachment'])){
          $beonepage_twitter_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_twitter_module_bg_img', 'option');
          $beonepage_twitter_module_bg_img_ath = $beonepage_twitter_module_bg_img_ath['background-attachment'];
        }else{
          $beonepage_twitter_module_bg_img_ath = esc_attr("Scroll");
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
				'default' => $beonepage_twitter_module_bg_img_ath,
				'toggle' => true,
				'condition' => [
					'section_background' => 'image',
				],
				'section' => 'elementor_twitter',
			]         
        );
        //Background video field
        $beonepage_twitter_module_bg_video = beonepage_olddata_fetch_redux('front_page_twitter_module_bg_video', 'option');
		if(!empty($beonepage_twitter_module_bg_video)){
			$beonepage_twitter_module_bg_video = beonepage_olddata_fetch_redux('front_twitter_table_module_bg_video', 'option');
			$beonepage_twitter_module_bg_video = html_entity_decode($beonepage_twitter_module_bg_video);
		}else{
			$beonepage_twitter_module_bg_video =  esc_attr("Video Url");
		}
        $this->add_control(
			'section_youtube_url',
			[
				'label' 	=> __( "YouTube URL", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_twitter_module_bg_video,
				'condition' => [
                    'section_background' => 'video',
                ],
				'description' => __( 'IMPORTANT NOTE: The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so its better to define both Image and YouTube Video for best results.', 'beonepage' ),
				'section' 	=> 'elementor_twitter',
			]        
        );
		//Parallax setting
        $beonepage_twitter_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_twitter_module_bg_parallax', 'option');
        if(!empty($beonepage_twitter_module_bg_parallax)){
			$beonepage_twitter_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_twitter_module_bg_parallax', 'option');
			$beonepage_twitter_module_bg_parallax = html_entity_decode($beonepage_twitter_module_bg_parallax);
        if($beonepage_twitter_module_bg_parallax == 1){
            $beonepage_twitter_module_bg_parallax_d = esc_attr("yes");
        }else{
            $beonepage_twitter_module_bg_parallax_d = esc_attr("no");
        }  
        }else{
          $beonepage_twitter_module_bg_parallax_d = esc_attr("yes");
        }
        $this->add_control(
			'section_bg_parallax',
			[
				'label' 		=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Enable', 'beonepage' ),
				'label_off' 	=> __( 'Disable', 'beonepage' ),
				'return_value' 	=> 'yes',
				'default' 		=> $beonepage_twitter_module_bg_parallax_d,
				'section' 		=> 'elementor_twitter',
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
		//Post meta
		update_post_meta( get_the_ID(), 'front_page_twitter_twitter_username_new', $settings['section_twitter_username'] );
		update_post_meta( get_the_ID(), 'front_page_twitter_twitter_tck_new', $settings['section_Consumer_Key'] );
		update_post_meta( get_the_ID(), 'front_page_twitter_twitter_tcs_new', $settings['section_consumer_secret'] );
		update_post_meta( get_the_ID(), 'front_page_twitter_twitter_tat_new', $settings['section_access_token'] );
		update_post_meta( get_the_ID(), 'front_page_twitter_twitter_tats_new', $settings['section_access_token_secret'] );
		
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
		$beonepage_section_logo_link_color = '';
		if(isset($settings['section_logo_link_color']) && $settings['section_logo_link_color'] !=''){
			$beonepage_section_logo_link_color = $settings['section_logo_link_color'];
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
				.twitter-module{
					background-image: url(<?php echo $beonepage_section_background_image_url; ?>);
				}
			<?php }
			if(isset($beonepage_section_background_color) && $beonepage_section_background_color !=''){?>
				.twitter-module{
					background-color: <?php echo $beonepage_section_background_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_font_color) && $beonepage_section_font_color !=''){?>
				.twitter-module, .twitter-module h2{
					color: <?php echo $beonepage_section_font_color; ?>;
				}
			<?php } 
			if(isset($beonepage_section_logo_link_color) && $beonepage_section_logo_link_color !=''){?>
				.twitter-module .twitter-icon, .twitter-module .tweet a {
					color: <?php echo $beonepage_section_logo_link_color; ?>;
				}
			<?php } 
			if(isset($beonepage_section_background_image_rp) && $beonepage_section_background_image_rp !=''){?>
				.twitter-module{
					background-repeat: <?php echo $beonepage_section_background_image_rp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bp) && $beonepage_section_background_image_bp !=''){?>
				.twitter-module{
					background-position: <?php echo $beonepage_section_background_image_bp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bs) && $beonepage_section_background_image_bs !=''){?>
				.twitter-module{
					background-size: <?php echo $beonepage_section_background_image_bs; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_ath) && $beonepage_section_background_image_ath !=''){?>
				.twitter-module{
					background-attachment: <?php echo $beonepage_section_background_image_ath; ?>;
				}
			<?php } ?>
		</style>

		<section id="twitter-module" class="module twitter-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
			<div class="container-fluid">
				<div class="row row-nopadding">
					<div class="twitter-container text-center">
						<?php $animation = $settings['section_twitter_logo_animation'] != 'none' ? ' wow ' . $settings['section_twitter_logo_animation'] . '" data-wow-delay=".3s' : ''; ?>

						<div class="twitter-icon<?php echo $animation; ?>"><i class="fa fa-twitter"></i></div>

						<?php if ( class_exists( 'beOnePageTwitterModule' ) ) : ?>

							<?php
								$obj = new \beOnePageTwitterModule;

								try {
									$tweets = $obj->getTweets();
								}

								catch ( Exception $e ) {
									if ( $e->getMessage() != '' ) {
										echo '<p>' . esc_html( 'Connection Timed Out', 'beonepage' ) . '</p>';
									} else {
										$tweets = $obj->getTweets();
									}
								}
							?>

							<?php if ( isset( $tweets['error'] ) ) : ?>
								<p><?php echo esc_html( $tweets['error'] ); ?></p>
							<?php elseif ( ! empty( $tweets ) ) : ?>
								<div class="tweet-container owl-carousel wow fadeIn" data-wow-delay=".3s">
									<?php foreach ( $tweets as $tweet ) : ?>
										<?php
											$text = $obj->link_replace( $tweet['text'] );
											$text = preg_replace( '/RT/', '<i class="fa fa-retweet"></i>', $text, 1 );
										?>

										<div class="tweet col-md-6 col-md-offset-3">
											<p><?php echo $text; ?></p>
											<span class="tweet-timestamp"><?php echo $obj->changeTimeFormat( strtotime( $tweet['timestamp'] ) ); ?></span>
										</div>
									<?php endforeach; ?> 
								</div><!-- .tweet-container -->
							<?php endif; ?>
						<?php endif; ?>

						<?php if ( $settings['section_button_text'] != '' ) : ?>
							<?php $animation = $settings['section_button_animation'] != 'none' ? ' wow ' . $settings['section_button_animation'] . '" data-wow-delay=".3s' : ''; ?>

							<div class="twitter-btn<?php echo $animation; ?>">
								<a href="<?php echo $settings['section_button_url']; ?>" target="_blank" class="btn <?php echo $settings['section_button_style'] == 'light' ? 'btn-light' : 'btn-dark'; ?>"><?php echo $settings['section_button_text']; ?></a>
							</div><!-- .twitter-btn -->
						<?php endif; ?>
					</div><!-- .twitter-container -->
				</div><!-- .row -->
			</div><!-- .container-fluid -->
		</section><!-- #twitter -->
		<?php
	
		if ( Plugin::$instance->editor->is_edit_mode() ) :  
			?>
			<script> 
				(function($) {
				
				APP.twitter = {
					init: function() {
						APP.twitter.owlCarousel();
					},

					owlCarousel: function() {
						$owlCarouselTwitter.owlCarousel({
							animateIn: 'flipInX',
							animateOut: 'zoomOut',
							smartSpeed: 500,
							items: 1,
							loop: true,
							center: true,
							margin: 10,
							autoplay: false,
							autoplayTimeout: 4000,
							autoplayHoverPause: true,
							responsive: {
								0: {
									nav: false
								},
								768: {
									nav: true
								}
							}
						});

						$owlCarouselTwitter.find('.owl-dots').addClass('dot-container');
						$owlCarouselTwitter.find('.owl-prev').addClass('carousel-control left').empty().append('<i class="fa fa-angle-left"></i>');
						$owlCarouselTwitter.find('.owl-next').addClass('carousel-control right ').empty().append('<i class="fa fa-angle-right"></i>');
					}
				}
				APP.twitter.init();
			})(jQuery);
			</script>  
			<?php
		endif;
	}
	protected function content_template() {}
	public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_My_Custom_Elementor_twitter );