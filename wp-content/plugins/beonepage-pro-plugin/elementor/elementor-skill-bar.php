<?php
namespace Elementor;
use Elementor\Core\Schemes\Color;
if ( ! defined( 'ABSPATH' ) ) exit;
class Widget_My_Custom_Elementor_Skill_Bar extends Widget_Base {
	
	public function get_categories() {
		return [ 'beonepage-widgets' ];
	}
	public function get_name() {
		return 'elementor-skill-bar';
	}
	public function get_title() {
      return __( 'BeOne Skill Bar', 'beonepage' );
	}
	public function get_icon() {
      return 'fa fa-asterisk';
	}
	protected function _register_controls() {
		$this->add_control(
			'elementor_skill_bar',
			[
				'label' => __( 'Skill Bar Option', 'beonepage' ),
				'type'	=> Controls_Manager::SECTION,
			]
		);
		//Title
		$beonepage_skill_bar_module_title = beonepage_olddata_fetch_redux('front_page_skill_bar_module_title', 'option');
		if(!empty($beonepage_skill_bar_module_title)){
			$beonepage_skill_bar_module_title = beonepage_olddata_fetch_redux('front_page_skill_bar_module_title', 'option');
			$beonepage_skill_bar_module_title = html_entity_decode($beonepage_skill_bar_module_title);
		}else{
			$beonepage_skill_bar_module_title =wp_kses("About <span>BeTheme</span>",array('span' => array()));
		}
		$this->add_control(
			'section_title',
			[
				'label' 	=> __( "Section Title", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_skill_bar_module_title,
				'title' 	=> __( 'Enter Title', 'beonepage' ),
				'section' 	=> 'elementor_skill_bar',
			]
		);
		//subtitle
		$beonepage_skill_bar_module_subtitle = beonepage_olddata_fetch_redux('front_page_skill_bar_module_subtitle', 'option');
		if(!empty($beonepage_skill_bar_module_subtitle)){
			$beonepage_skill_bar_module_subtitle = beonepage_olddata_fetch_redux('front_page_skill_bar_module_subtitle', 'option');
		}else{
			$beonepage_skill_bar_module_subtitle =esc_attr("First you should know");
		}
		$this->add_control(
			'section_sub_title',
			[
				'label' 	=> __( "Section Sub Title", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_skill_bar_module_subtitle,
				'title' 	=> __( 'Enter Sub Title', 'beonepage' ),
				'section' 	=> 'elementor_skill_bar',
			]
		);
		//Title Animation
		$beonepage_skill_bar_module_animation = beonepage_olddata_fetch_redux('front_page_skill_bar_module_animation', 'option');
		if(!empty($beonepage_skill_bar_module_animation)){
			$beonepage_skill_bar_module_animation = beonepage_olddata_fetch_redux('front_page_skill_bar_module_animation', 'option');
			}else{
			$beonepage_skill_bar_module_animation = esc_attr("swing");
		}
		$this->add_control(
			'about_title_animation',
			[
				'label' 	=> __( 'Caption Animation', 'beonepage' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> $beonepage_skill_bar_module_animation,
				'options' 	=> beonepage_theme_animate(),
				'section' 	=> 'elementor_skill_bar',
			]
		);
		//Font Color
		$beonepage_skill_bar_module_color = beonepage_olddata_fetch_redux('front_page_skill_bar_module_color', 'option');
		if(!empty($beonepage_skill_bar_module_color)){
			$beonepage_skill_bar_module_color = beonepage_olddata_fetch_redux('front_page_skill_bar_module_color', 'option');
		}else{
			$beonepage_skill_bar_module_color = esc_attr("#eceff3");
		}
		$this->add_control(
			'section_font_color',
			[
				'label' 	=> __( "Font Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_skill_bar_module_color,
				'scheme' 	=> [
					'type' 		=> Color::get_type(),
					'value' 	=> Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .skill-bar-module' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_skill_bar',
			]
		);
		//Separator Line & Progress Bar Color
		$beonepage_skill_bar_module_sp_color = beonepage_olddata_fetch_redux('front_page_skill_bar_module_sp_color', 'option');
		if(!empty($beonepage_skill_bar_module_sp_color)){
			$beonepage_skill_bar_module_sp_color = beonepage_olddata_fetch_redux('front_page_skill_bar_module_sp_color', 'option');
		}else{
			$beonepage_skill_bar_module_sp_color = esc_attr("#888");
		}
		$this->add_control(
			'section_line_and_progress_bar_color',
			[
				'label' 	=> __( "Separator Line & Progress Bar Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_skill_bar_module_sp_color,
				'scheme' 	=> [
				   'type' 		=> Color::get_type(),
				   'value' 		=> Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .bar-line' => 'background-color: {{VALUE}}',
				],
				'section' 	=> 'elementor_skill_bar',
			]
		);
		//Separator Circle & Active Bar Color
		$beonepage_skill_bar_module_sp_i_color = beonepage_olddata_fetch_redux('front_page_skill_bar_module_sp_i_color', 'option');
		if(!empty($beonepage_skill_bar_module_sp_i_color)){
			$beonepage_skill_bar_module_sp_i_color = beonepage_olddata_fetch_redux('front_page_skill_bar_module_sp_i_color', 'option');
		}else{
			$beonepage_skill_bar_module_sp_i_color = esc_attr("#ffcc00");
		}
		$this->add_control(
			'section_separator_circle_active_bar_color',
			[
				'label' 	=> __( "Separator Circle & Active Bar Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_skill_bar_module_sp_i_color,
				'scheme' 	=> [
					'type' 		=> Color::get_type(),
					'value' 	=> Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .line-active ' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .separator i  ' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_skill_bar',
			]
		);
		//Percentage Background Color
		$beonepage_skill_bar_module_pct = beonepage_olddata_fetch_redux('front_page_skill_bar_module_pct', 'option');
		if(!empty($beonepage_skill_bar_module_pct)){
			$beonepage_skill_bar_module_pct = beonepage_olddata_fetch_redux('front_page_skill_bar_module_pct', 'option');
		}else{
			$beonepage_skill_bar_module_pct = esc_attr("#272727");
		}
		$this->add_control(
			'section_percentage_background_color',
			[
				'label' 	=> __( "Percentage Background Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_skill_bar_module_pct,
				'scheme' 	=> [
					'type' 		=> Color::get_type(),
					'value' 	=> Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .line-active span ' => 'background-color: {{VALUE}}',
				],
				'section' 	=> 'elementor_skill_bar',
			]
		);
		// Backgroung Setting
		$class = '';
		$attribute = '';
		$beonepage_skill_bar_module_bg = beonepage_olddata_fetch_redux('front_page_skill_bar_module_bg', 'option');
		if(!empty($beonepage_skill_bar_module_bg)){
			$beonepage_skill_bar_module_bg = beonepage_olddata_fetch_redux('front_page_skill_bar_module_bg', 'option');
		}else{
			$beonepage_skill_bar_module_bg = esc_attr("color");
		}
		$this->add_control(
			'section_background',
			[
				'label' 	=> __( "Background", 'beonepage' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'options' 	=> [
				'color' 	=> [
					'title' => __( 'Color', 'beonepage' ),
					'icon' 	=> 'eicon-paint-brush',

				],
				'image' 	=> [
					'title' => __( 'Image', 'beonepage' ),
					'icon' 	=> 'eicon-slideshow',
				],
				'video' 	=> [
					'title' => __( 'Video', 'beonepage' ),
					'icon' 	=> ' eicon-video-camera',
				]
				],
				'default' 	=> $beonepage_skill_bar_module_bg,
				'toggle' 	=> true,
				'section' 	=> 'elementor_skill_bar',
			]
		);
		//Background Color
		$beonepage_skill_bar_module_bg_color = beonepage_olddata_fetch_redux('front_page_skill_bar_module_bg_color', 'option');
		if(!empty($beonepage_skill_bar_module_bg_color)){
			$beonepage_skill_bar_module_bg_color = beonepage_olddata_fetch_redux('front_page_skill_bar_module_bg_color', 'option');
		}else{
			$beonepage_skill_bar_module_bg_color = esc_attr("#181a1c");
		}
		$this->add_control(
        'section_background_color',
			[
				'label' 	=> __( "Background Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_skill_bar_module_bg_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .skill-bar-module' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'section_background' => 'color',
				],
				'section' 	=> 'elementor_skill_bar',
			]
		);
		//Background image & Color
		$beonepage_skill_bar_module_bg_color_img = beonepage_olddata_fetch_redux('front_page_skill_bar_module_bg_img', 'option');
		if(!empty($beonepage_skill_bar_module_bg_color_img['background-color'])){
			$beonepage_skill_bar_module_bg_color_img = beonepage_olddata_fetch_redux('front_page_skill_bar_module_bg_img', 'option');
			$beonepage_skill_bar_module_bg_color_img = $beonepage_skill_bar_module_bg_color_img['background-color'];
		}else{
			$beonepage_skill_bar_module_bg_color_img = esc_attr("#bcbcbc");
		}
		$this->add_control(
        'section_background_color_img',
			[
				'label' 	=> __( "Background Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_skill_bar_module_bg_color_img,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
				'condition' => [
					'section_background' => 'image',
				],
				'section' 	=> 'elementor_skill_bar',
			]
		);
		//Background image
		$beonepage_skill_bar_module_bg_img = beonepage_olddata_fetch_redux('front_page_skill_bar_module_bg_img', 'option');
		if(!empty($beonepage_skill_bar_module_bg_img['background-image'])){
			$beonepage_skill_bar_module_bg_img = beonepage_olddata_fetch_redux('front_page_skill_bar_module_bg_img', 'option');
			$beonepage_skill_bar_module_bg_img_url = $beonepage_skill_bar_module_bg_img['background-image'];
		}else{
			$beonepage_skill_bar_module_bg_img_url = \Elementor\Utils::get_placeholder_image_src();
		}
		$this->add_control(
			'section_background_image',
			[
				'label' 	=> __( "Bakground Image", 'beonepage' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
				'url' 		=> esc_url($beonepage_skill_bar_module_bg_img_url),
				],
				'condition' => [
				'section_background' => 'image',
				],
				'section' 	=> 'elementor_skill_bar',
			]
		);
		// Background Repeat
        $beonepage_skill_bar_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_skill_bar_module_bg_img', 'option');
        if(!empty($beonepage_skill_bar_module_bg_img_rp['background-repeat'])){
          $beonepage_skill_bar_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_skill_bar_module_bg_img', 'option');
          $beonepage_skill_bar_module_bg_img_rp = $beonepage_skill_bar_module_bg_img_rp['background-repeat'];
        }else{
           $beonepage_skill_bar_module_bg_img_rp = esc_attr("No Repeat");
        }
         $this->add_control(
            'section_background_image_rp',
            [
                'label' 	=> __( 'Background Repeat', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_skill_bar_module_bg_img_rp,
                'options' 	=> [
                    'no-repeat' => __( 'No Repeat', 'beonepage' ),
                    'repeat' 	=> __( 'Repeat All', 'beonepage' ),
                    'repeat-x' 	=> __( 'Repeat Horizontally', 'beonepage' ),
                    'repeat-y' 	=> __( 'Repeat Vertically', 'beonepage' ),
                ],
                'section' 	=> 'elementor_skill_bar',
				'condition'	=> [
                    'section_background' => 'image',
                ],
            ]         
        );
        //Background Position
        $beonepage_skill_bar_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_skill_bar_module_bg_img', 'option');
        if(!empty($beonepage_skill_bar_module_bg_img_bp['background-position'])){
          $beonepage_skill_bar_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_skill_bar_module_bg_img', 'option');
          $beonepage_skill_bar_module_bg_img_bp = $beonepage_skill_bar_module_bg_img_bp['background-position'];
        }else{
           $beonepage_skill_bar_module_bg_img_bp = esc_attr("Left Top");
        }
         $this->add_control(
            'section_background_image_bp',
            [
                'label' 	=> __( 'Background Position', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_skill_bar_module_bg_img_bp,
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
                'section' 	=> 'elementor_skill_bar',
				'condition' => [
                    'section_background' => 'image',
                ],
            ]
         
        );
        //Background Size
        $beonepage_skill_bar_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_skill_bar_module_bg_img', 'option');
        if(!empty($beonepage_skill_bar_module_bg_img_bs['background-size'])){
          $beonepage_skill_bar_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_skill_bar_module_bg_img', 'option');
          $beonepage_skill_bar_module_bg_img_bs = $beonepage_skill_bar_module_bg_img_bs['background-size'];
        }else{
          $beonepage_skill_bar_module_bg_img_bs = esc_attr("auto");
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
				'default' 		=> $beonepage_skill_bar_module_bg_img_bs,
				'toggle' 		=> true,
				'condition' 	=> [
					'section_background' => 'image',
				],
				'section' => 'elementor_skill_bar',
			]
        );
        //Background Attachment
        $beonepage_skill_bar_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_skill_bar_module_bg_img', 'option');
        if(!empty($beonepage_skill_bar_module_bg_img_ath['background-attachment'])){
          $beonepage_skill_bar_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_skill_bar_module_bg_img', 'option');
          $beonepage_skill_bar_module_bg_img_ath = $beonepage_skill_bar_module_bg_img_ath['background-attachment'];
        }else{
          $beonepage_skill_bar_module_bg_img_ath = esc_attr("Scroll");
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
				'default' => $beonepage_skill_bar_module_bg_img_ath,
				'toggle' => true,
				'condition' => [
					'section_background' => 'image',
				],
				'section' => 'elementor_skill_bar',
			]         
        );
		//Background video field
		$beonepage_skill_bar_module_bg_video = beonepage_olddata_fetch_redux('front_page_skill_bar_module_bg_video', 'option');
		if(!empty($beonepage_skill_bar_module_bg_video)){
			$beonepage_skill_bar_module_bg_video = beonepage_olddata_fetch_redux('front_page_skill_bar_module_bg_video', 'option');
			}else{
			$beonepage_skill_bar_module_bg_video =esc_url("Video Url");
		}
		$this->add_control(
			'section_youtube_url',
			[
				'label' 	=> __( "YouTube URL", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_skill_bar_module_bg_video,
				'condition' => [
					'section_background' => 'video',
				],
				'description' => __( 'IMPORTANT NOTE: The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so its better to define both Image and YouTube Video for best results.', 'beonepage' ),
				'section' 	=> 'elementor_skill_bar',
			]
		);
		//Parallax Scrolling
		$beonepage_skill_bar_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_skill_bar_module_bg_parallax', 'option');
		if(!empty($beonepage_skill_bar_module_bg_parallax)){
			$beonepage_skill_bar_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_skill_bar_module_bg_parallax', 'option');
	    if($beonepage_skill_bar_module_bg_parallax == 1){
            $beonepage_skill_bar_module_bg_parallax_d = esc_attr("yes");
        }else{
            $beonepage_skill_bar_module_bg_parallax_d = esc_attr("no");
        }
		}else{
			$beonepage_skill_bar_module_bg_parallax_d = esc_attr("yes");
		}
		$this->add_control(
        'section_bg_parallax',
			[
				'label' 	=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'type' 		=> Controls_Manager::SWITCHER,
				'label_on' 	=> __( 'Enable', 'beonepage' ),
				'label_off' => __( 'Disable', 'beonepage' ),
				'return_value' => 'yes',
				'default' 	=> $beonepage_skill_bar_module_bg_parallax_d,
				'section' 	=> 'elementor_skill_bar',
			]
		);
		//Content Box
		$beonepage_skill_bar_module_text = beonepage_olddata_fetch_redux('front_page_skill_bar_module_text', 'option');
		if(!empty($beonepage_skill_bar_module_text)){
			$beonepage_skill_bar_module_text = beonepage_olddata_fetch_redux('front_page_skill_bar_module_text', 'option');
			$beonepage_skill_bar_module_text = html_entity_decode($beonepage_skill_bar_module_text);
		}else{
			$beonepage_skill_bar_module_text =wp_kses("<blockquote>Hello, We are BeTheme. We love WordPress! We handcraft well-thought-out WordPress themes built on solid coding and elegant design.</blockquote>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",array('span' => array()));
		}
		$this->add_control(
        'section_content_box',
			[
				'label' 	=> __( 'Content Box', 'beonepage' ),
				'type' 		=> Controls_Manager::WYSIWYG,
				'default' 	=> $beonepage_skill_bar_module_text,
				'section' 	=> 'elementor_skill_bar',
			]
		);
		//Content Box Animation
		$beonepage_skill_bar_module_text_animation = beonepage_olddata_fetch_redux('front_page_skill_bar_module_text_animation', 'option');
		if(!empty($beonepage_skill_bar_module_text_animation)){
			$beonepage_skill_bar_module_text_animation = beonepage_olddata_fetch_redux('front_page_skill_bar_module_text_animation', 'option');
		}else{
			$beonepage_skill_bar_module_text_animation =wp_kses_post("bounceInLeft");
		}
		$this->add_control(
        'section_content_box_animation',
			[
				'label' 	=> __( 'Content Box Animation', 'beonepage' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> $beonepage_skill_bar_module_text_animation,
				'options' 	=> beonepage_theme_animate(),
				'section' 	=> 'elementor_skill_bar',
			]
		);
		// Skill Bar REPEATER
		$result = array();
		$beonepage_skill_bar_module_skill_bar = beonepage_olddata_fetch_redux('front_page_skill_bar_module_skill_bar', 'option');
		if(!empty($beonepage_skill_bar_module_skill_bar)){
			$beonepage_skill_bar_module_skill_bar = beonepage_olddata_fetch_redux('front_page_skill_bar_module_skill_bar', 'option');
			
			foreach ( $beonepage_skill_bar_module_skill_bar as $skill_bar ) :
			
				$beonepage_skill_bar_label = '';
				if(isset($skill_bar['skill_bar_label']) && $skill_bar['skill_bar_label'] != '' ){
					$beonepage_skill_bar_label = $skill_bar['skill_bar_label'];
					}
				$beonepage_skill_bar_pct = '';
				if(isset($skill_bar['skill_bar_pct']) && $skill_bar['skill_bar_pct'] != '' ){
					$beonepage_skill_bar_pct = $skill_bar['skill_bar_pct'];
					}
				$result[] = array('section_skill_bar_label' => $beonepage_skill_bar_label , 
					'section_skill_bar_percentage' => $beonepage_skill_bar_pct
				);	
			endforeach;
			
		}else{
			$beonepage_skill_bar_module_skill_bar ='';
		}
	
		$section_skill_bar_repeater = new \Elementor\Repeater();
		$section_skill_bar_repeater->add_control(
			'section_skill_bar_label',
			[
				'label' 	=> __( "Label", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$section_skill_bar_repeater->add_control(
			'section_skill_bar_percentage',
			[
				'label' 	=> __( 'Skill Bar Percentage (e.g. 80%)', 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
		
		$this->add_control(
        'section_skill_bar',
			[
				'label' => __( 'Skill Bar', 'beonepage' ),
				'type' => Controls_Manager::REPEATER,
				'fields' =>  $section_skill_bar_repeater->get_controls(),
				'default' => $result,								
				'section' => 'elementor_skill_bar',
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
		if ( $settings['section_background'] == 'image' && $settings['section_bg_parallax'] == 'yes') {
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
		//conditions Css
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
		if(isset($settings['section_line_and_progress_bar_color']) && $settings['section_line_and_progress_bar_color'] !=''){
			$beonepage_section_separator_line_color = $settings['section_line_and_progress_bar_color'];
		}
		$beonepage_section_separator_circle_color = '';
		if(isset($settings['section_separator_circle_active_bar_color']) && $settings['section_separator_circle_active_bar_color'] !=''){
			$beonepage_section_separator_circle_color = $settings['section_separator_circle_active_bar_color'];
		}
		$beonepage_section_percentage_background_color = '';
		if(isset($settings['section_percentage_background_color']) && $settings['section_percentage_background_color'] !=''){
			$beonepage_section_percentage_background_color = $settings['section_percentage_background_color'];
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
			.skill-bar-module{
				background-image: url(<?php echo $beonepage_section_background_image_url; ?>);
			}
			<?php }
			if(isset($beonepage_section_font_color) && $beonepage_section_font_color !=''){?>
			.skill-bar-module{
				color: <?php echo $beonepage_section_font_color; ?>;
			}
			<?php }
			if(isset($beonepage_section_background_color) && $beonepage_section_background_color !=''){?>
			.skill-bar-module{
				background-color: <?php echo $beonepage_section_background_color; ?>;
			}
			<?php }
			if(isset($beonepage_section_separator_line_color) && $beonepage_section_separator_line_color !=''){?>
			.skill-bar-module .separator span{
				color: <?php echo $beonepage_section_separator_line_color; ?>;
			}
			.skill-bar .bar-line {
				background-color: <?php echo $beonepage_section_separator_line_color; ?>;
			}
			<?php }
			if(isset($beonepage_section_separator_circle_color) && $beonepage_section_separator_circle_color !=''){?>
			.skill-bar-module .separator i {
				color: <?php echo $beonepage_section_separator_circle_color; ?>;
			}
			.skill-bar .line-active {
				background-color: <?php echo $beonepage_section_separator_circle_color; ?>;
			}
			<?php }
			if(isset($beonepage_section_percentage_background_color) && $beonepage_section_percentage_background_color !=''){?>
			.skill-bar .line-active span {
				background-color: <?php echo $beonepage_section_percentage_background_color; ?>;
			}
			<?php } 
			if(isset($beonepage_section_background_image_rp) && $beonepage_section_background_image_rp !=''){?>
			.skill-bar-module{
			    background-repeat: <?php echo $beonepage_section_background_image_rp; ?>;
			}
			<?php }
			if(isset($beonepage_section_background_image_bp) && $beonepage_section_background_image_bp !=''){?>
			.skill-bar-module{
			    background-position: <?php echo $beonepage_section_background_image_bp; ?>;
			}
			<?php }
			if(isset($beonepage_section_background_image_bs) && $beonepage_section_background_image_bs !=''){?>
			.skill-bar-module{
			    background-size: <?php echo $beonepage_section_background_image_bs; ?>;
			}
			<?php }
			if(isset($beonepage_section_background_image_ath) && $beonepage_section_background_image_ath !=''){?>
			.skill-bar-module{
			    background-attachment: <?php echo $beonepage_section_background_image_ath; ?>;
			}
			<?php } ?>
		</style>
		<section id="" class="module skill-bar-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>	
			<div class="container">
				<div class="row">
					<?php if  (( $settings['section_title'] ) != '' ) : ?>
						<?php $animation = $settings['about_title_animation'] != 'none' ? ' wow ' . $settings['about_title_animation'] . '" data-wow-delay=".2s' : ''; ?>

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

					<?php $animation = $settings['section_content_box_animation'] != 'none' ? ' wow ' . $settings['section_content_box_animation'] . '" data-wow-delay=".5s' : ''; ?>

					<div class="content-box col-sm-6<?php echo $animation; ?>">
						<?php echo html_entity_decode( $settings['section_content_box']); ?>
					</div><!-- .content-box -->

					<?php $skill_bars = $settings['section_skill_bar']; ?>

					<?php if ( ! empty( $skill_bars ) ) : ?>
						<div id="skill-bar" class="skill-bar-container col-sm-6">
							<?php $i = 0;  
								//echo "<pre>"; print_r($skill_bars); echo "</pre>";
								?>

							<?php foreach ( $skill_bars as $skill_bar ) : ?>
								<?php
									$section_skill_bar_label = isset( $skill_bar['section_skill_bar_label'] ) && ! empty( $skill_bar['section_skill_bar_label'] ) ? $skill_bar['section_skill_bar_label'] : '';
									$section_skill_bar_percentage = isset( $skill_bar['section_skill_bar_percentage'] ) && ! empty( $skill_bar['section_skill_bar_percentage'] ) ? $skill_bar['section_skill_bar_percentage'] : '';
									$section_skill_bar_percentage = preg_replace( '/[^0-9]/', '', $section_skill_bar_percentage );
								?>

								<div class="skill-bar wow fadeInUp" data-wow-delay="<?php echo $i * .3 . 's'; ?>">
									<h3><?php echo $section_skill_bar_label; ?></h3>

									<div class="bar-line">
										<div class="line-active">
											<span class="bar-timer" data-to="<?php echo $section_skill_bar_percentage; ?>" data-speed="3000"><?php echo $section_skill_bar_percentage; ?></span>
										</div>
									</div>
								</div>
								<?php $i++; ?>
							<?php endforeach; ?> 
						</div><!-- .skill-bar -->
					<?php endif; ?>
				</div><!-- .row -->
			</div><!-- .container -->
		</section><!-- #skill-bar -->
		<?php 
		if ( Plugin::$instance->editor->is_edit_mode() ) :  
			?>
		<script>
			(function($) {
				APP.skillBar = {
					init: function() {
						APP.skillBar.counter();
					},

					counter: function() {
						if ($('#skill-bar').length > 0) {
							var waypoint = new Waypoint({
								element: '#skill-bar',
								handler: function() {
									$('.skill-bar').each(function() {
										$(this).find('.bar-timer').countTo();

										var toWidth = $(this).find('.bar-timer').data('to');

										$(this).find('.line-active').width(toWidth + '%');
									});

									this.destroy();
								},
								offset: '80%'
							});
						}
					}
				}
				APP.skillBar.init();
			})(jQuery);
		</script>  
			<?php
		endif;
	}
	protected function content_template() {}
	public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_My_Custom_Elementor_Skill_Bar );