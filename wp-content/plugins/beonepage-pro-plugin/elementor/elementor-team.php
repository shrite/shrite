<?php
namespace Elementor;
use Elementor\Core\Schemes\Color;
if ( ! defined( 'ABSPATH' ) ) exit;
class Widget_My_Custom_Elementor_Team extends Widget_Base {
	
	public function get_categories() {
		return [ 'beonepage-widgets' ];
	}
	public function get_name() {
		return 'elementor-team';
	}
	public function get_title() {
		return __( 'BeOne Team', 'beonepage' );
	}
	public function get_icon() {
		return 'fa fa-group';
	}
	protected function _register_controls() {
		$this->add_control(
			'elementor_team',
			[
				'label' => __( 'Team Option', 'beonepage' ),
				'type' 	=> Controls_Manager::SECTION,
			]
		);
		// Title
		$beonepage_team_module_title = beonepage_olddata_fetch_redux('front_page_team_module_title', 'option');
		if(!empty($beonepage_team_module_title)){
			$beonepage_team_module_title = beonepage_olddata_fetch_redux('front_page_team_module_title', 'option');
			$beonepage_team_module_title = html_entity_decode($beonepage_team_module_title);
		}else{
			$beonepage_team_module_title = wp_kses("<span>Team</span> Members",array('span' => array()));
		}
		$this->add_control(
			'section_title',
			[
				'label' 	=> __( "Title", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_team_module_title,
				'title'		=> __( 'Enter Title', 'beonepage' ),
				'section' 	=> 'elementor_team',
			]
		);		
        //Sub title
		$beonepage_team_module_subtitle = beonepage_olddata_fetch_redux('front_page_team_module_subtitle', 'option');
		if(!empty($beonepage_team_module_subtitle)){
			$beonepage_team_module_subtitle = beonepage_olddata_fetch_redux('front_page_team_module_subtitle', 'option');
			$beonepage_team_module_subtitle = html_entity_decode($beonepage_team_module_subtitle);
		}else{
			$beonepage_team_module_subtitle = esc_attr("We're the best professionals in this field");
		}
		$this->add_control(
			'section_sub_title',
			[
				'label' 	=> __( "Sub Title", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_team_module_subtitle,
				'title' 	=> __( 'Enter Sub Title', 'beonepage' ),
				'section' 	=> 'elementor_team',
			]
		
		);
		//Caption Animation
		$beonepage_team_module_animation = beonepage_olddata_fetch_redux('front_page_team_module_animation', 'option');
		if(!empty($beonepage_team_module_animation)){
			$beonepage_team_module_animation = beonepage_olddata_fetch_redux('front_page_team_module_animation', 'option');
		}else{
			$beonepage_team_module_animation = esc_attr("bounce");
		}
        $this->add_control(
            'section_title_animation',
            [
                'label'   => __( 'Caption Animation', 'beonepage' ),
                'type'    => Controls_Manager::SELECT,
                'default' => $beonepage_team_module_animation,
                'options' => beonepage_theme_animate(),
                'section' => 'elementor_team',
            ]
         
        );
		// Font Color
		$beonepage_team_module_color = beonepage_olddata_fetch_redux('front_page_team_module_color', 'option');
		if(!empty($beonepage_team_module_color)){
			$beonepage_team_module_color = beonepage_olddata_fetch_redux('front_page_team_module_color', 'option');
		}else{
			$beonepage_team_module_color = esc_attr("#eceff3");
		}
		$this->add_control(
			'section_font_color',
			[
				'label' 	=> __( "Font Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_team_module_color,
				'scheme' 	=> [
					'type' 		=> Color::get_type(),
					'value' 	=> Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team-module' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_team',
			]
		);
		//Separator Line & Dots Color
		$beonepage_team_module_sp_color = beonepage_olddata_fetch_redux('front_page_team_module_sp_color', 'option');
		if(!empty($beonepage_team_module_sp_color)){
			$beonepage_team_module_sp_color = beonepage_olddata_fetch_redux('front_page_team_module_sp_color', 'option');
		}else{
			$beonepage_team_module_sp_color = esc_attr("#888");
		}
		
		$this->add_control(
			'section_separator_line_color',
			[
				'label' 	=> __( "Separator Line & Dots Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_team_module_sp_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team-module .owl-dot span, .team-module .owl-dot::after, {{WRAPPER}} .team-module .separator span::after, .team-module .separator span::before' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_team',
			]
		
		);
		//Separator Circle & Active Dot Color
		$beonepage_team_module_sp_i_color = beonepage_olddata_fetch_redux('front_page_team_module_sp_i_color', 'option');
		if(!empty($beonepage_team_module_sp_i_color)){
			$beonepage_team_module_sp_i_color = beonepage_olddata_fetch_redux('front_page_team_module_sp_i_color', 'option');
		}else{
			$beonepage_team_module_sp_i_color = esc_attr("#ffcc00");
		}			
		$this->add_control(
			'section_separator_circle_color',
			[
				'label' 	=> __( "Separator Circle & Active Dot Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_team_module_sp_i_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team-module .owl-dot.active:after, {{WRAPPER}} .team-module .separator i, {{WRAPPER}} .team-member .member-title' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_team',
			]
		
		);
		//Font Color for Bio
		$beonepage_team_module_bio_color = beonepage_olddata_fetch_redux('front_page_team_module_bio_color', 'option');
		if(!empty($beonepage_team_module_bio_color)){
			$beonepage_team_module_bio_color = beonepage_olddata_fetch_redux('front_page_team_module_bio_color', 'option');
		}else{
			$beonepage_team_module_bio_color = esc_attr("#ccc");
		}
		
		$this->add_control(
			'section_font_color_bio',
			[
				'label' 	=> __( "Font Color for Bio", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_team_module_bio_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team-member .member-profile' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_team',
			]
		
		);
		//Background Color for Bio
		$beonepage_team_module_bio_bg_color = beonepage_olddata_fetch_redux('front_page_team_module_bio_bg_color', 'option');
		if(!empty($beonepage_team_module_bio_bg_color)){
			$beonepage_team_module_bio_bg_color = beonepage_olddata_fetch_redux('front_page_team_module_bio_bg_color', 'option');
		}else{
			$beonepage_team_module_bio_bg_color = esc_attr("#111");
		}
		
		$this->add_control(
			'section_background_color_bio',
			[
				'label' 	=> __( "Background Color for Bio", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_team_module_bio_bg_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team-member .member-profile' => 'Background-color: {{VALUE}}',
				],
				'section' 	=> 'elementor_team',
			]			
		);
        //Background setting                
		$class = '';
		$attribute = '';    
        $beonepage_team_module_bg = beonepage_olddata_fetch_redux('front_page_team_module_bg', 'option');
        if(!empty($beonepage_team_module_bg)){
			$beonepage_team_module_bg = beonepage_olddata_fetch_redux('front_page_team_module_bg', 'option');
        }else{
			$beonepage_team_module_bg = esc_attr("color");
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
				'default' 	=> $beonepage_team_module_bg,
				'toggle' 	=> true,
				'section' 	=> 'elementor_team',
			]         
        );
		//Background Color
		$beonepage_team_module_bg_color = beonepage_olddata_fetch_redux('front_page_team_module_bg_color', 'option');
        if(!empty($beonepage_team_module_bg_color)){
          $beonepage_team_module_bg_color = beonepage_olddata_fetch_redux('front_page_team_module_bg_color', 'option');
		}else{
          $beonepage_team_module_bg_color = esc_attr("#181a1c");
        }
        $this->add_control(
			'section_background_color',
			[
				'label' 	=> __( "Background Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_team_module_bg_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team-module' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'section_background' => 'color',
				],
				'section' 	=> 'elementor_team',
			]         
        );        
        //Background image 
        $beonepage_team_module_bg_img = beonepage_olddata_fetch_redux('front_page_team_module_bg_img', 'option');
        if(!empty($beonepage_team_module_bg_img['background-image'])){
			$beonepage_team_module_bg_img = beonepage_olddata_fetch_redux('front_page_team_module_bg_img', 'option');
			$beonepage_team_module_bg_img_url = $beonepage_team_module_bg_img['background-image'];
        }else{
			$beonepage_team_module_bg_img_url = \Elementor\Utils::get_placeholder_image_src();
        }
        $this->add_control(
			'section_background_image',
			[
				'label' 	=> __( "Bakground Image", 'beonepage' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => esc_url($beonepage_team_module_bg_img_url),
				],
				'condition' => [
					'section_background' => 'image',
				],
				'section' => 'elementor_team',
			]         
        );
        // Background Repeat
        $beonepage_team_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_team_module_bg_img', 'option');
        if(!empty($beonepage_team_module_bg_img_rp['background-repeat'])){
          $beonepage_team_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_team_module_bg_img', 'option');
          $beonepage_team_module_bg_img_rp = $beonepage_team_module_bg_img_rp['background-repeat'];
        }else{
           $beonepage_team_module_bg_img_rp = esc_attr("No Repeat");
        }
        $this->add_control(
            'section_background_image_rp',
            [
                'label' 	=> __( 'Background Repeat', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_team_module_bg_img_rp,
                'options' 	=> [
                    'no-repeat' => __( 'No Repeat', 'beonepage' ),
                    'repeat' 	=> __( 'Repeat All', 'beonepage' ),
                    'repeat-x' 	=> __( 'Repeat Horizontally', 'beonepage' ),
                    'repeat-y' 	=> __( 'Repeat Vertically', 'beonepage' ),
                ],
                'section' 	=> 'elementor_team',
				'condition'	=> [
                    'section_background' => 'image',
                ],
            ]         
        );
        //Background Position
        $beonepage_team_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_team_module_bg_img', 'option');
        if(!empty($beonepage_team_module_bg_img_bp['background-position'])){
          $beonepage_team_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_team_module_bg_img', 'option');
          $beonepage_team_module_bg_img_bp = $beonepage_team_module_bg_img_bp['background-position'];
        }else{
           $beonepage_team_module_bg_img_bp = esc_attr("Left Top");
        }
        $this->add_control(
            'section_background_image_bp',
            [
                'label' 	=> __( 'Background Position', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_team_module_bg_img_bp,
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
                'section' 	=> 'elementor_team',
				'condition' => [
                    'section_background' => 'image',
                ],
            ]
         
        );
        //Background Size
        $beonepage_team_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_team_module_bg_img', 'option');
        if(!empty($beonepage_team_module_bg_img_bs['background-size'])){
          $beonepage_team_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_team_module_bg_img', 'option');
          $beonepage_team_module_bg_img_bs = $beonepage_team_module_bg_img_bs['background-size'];
        }else{
          $beonepage_team_module_bg_img_bs = esc_attr("auto");
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
				'default' 		=> $beonepage_team_module_bg_img_bs,
				'toggle' 		=> true,
				'condition' 	=> [
					'section_background' => 'image',
				],
				'section' => 'elementor_team',
			]         
        );
        //Background Attachment
        $beonepage_team_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_team_module_bg_img', 'option');
        if(!empty($beonepage_team_module_bg_img_ath['background-attachment'])){
			$beonepage_team_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_team_module_bg_img', 'option');
			$beonepage_team_module_bg_img_ath = $beonepage_team_module_bg_img_ath['background-attachment'];
        }else{
			$beonepage_team_module_bg_img_ath = esc_attr("Scroll");
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
					'fixed' 	=> [
						'title' => __( 'Fixed', 'beonepage' ),
						'icon' 	=> 'fa fa-arrows-alt',
					],
				],
				'default' 	=> $beonepage_team_module_bg_img_ath,
				'toggle' 	=> true,
				'condition' => [
					'section_background' => 'image',
				],
				'section' 	=> 'elementor_team',
			]         
        );
        //Background video field
        $beonepage_team_module_bg_video = beonepage_olddata_fetch_redux('front_page_team_module_bg_video', 'option');
			if(!empty($beonepage_team_module_bg_video)){
				$beonepage_team_module_bg_video = beonepage_olddata_fetch_redux('front_team_table_module_bg_video', 'option');
				$beonepage_team_module_bg_video = html_entity_decode($beonepage_team_module_bg_video);
			}else{
				$beonepage_team_module_bg_video =  esc_attr("Video Url");
			}
        $this->add_control(
			'section_youtube_url',
			[
				'label' 	=> __( "YouTube URL", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_team_module_bg_video,
				'condition' => [
                    'section_background' => 'video',
				],
				'description' => __( 'IMPORTANT NOTE: The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so its better to define both Image and YouTube Video for best results.', 'beonepage' ),
				'section' 	=> 'elementor_team',
			]        
        );        
        //Parallax setting
        $beonepage_team_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_team_module_bg_parallax', 'option');
        if(!empty($beonepage_team_module_bg_parallax)){
			$beonepage_team_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_team_module_bg_parallax', 'option');
			$beonepage_team_module_bg_parallax = html_entity_decode($beonepage_team_module_bg_parallax);
        if($beonepage_team_module_bg_parallax == 1){
            $beonepage_team_module_bg_parallax_d = esc_attr("yes");
        }else{
            $beonepage_team_module_bg_parallax_d = esc_attr("no");
        }  
        }else{
          $beonepage_team_module_bg_parallax_d = esc_attr("yes");
        }
        $this->add_control(
			'section_bg_parallax',
			[
				'label' 		=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Enable', 'beonepage' ),
				'label_off' 	=> __( 'Disable', 'beonepage' ),
				'return_value' 	=> 'yes',
				'default' 		=> $beonepage_team_module_bg_parallax_d,
				'section' 		=> 'elementor_team',
			]
        );
		//Client Metabox data
		$result = array();
		$_beonepage_option_team = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_team', true );
		if(!empty($_beonepage_option_team)){
			$_beonepage_option_team = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_team', true );
			
			foreach ( $_beonepage_option_team as $teams ) :
			
				$beonepage_img_url = '';
				if(isset($teams['img_url']) && $teams['img_url'] != ''){
					$beonepage_img_url = $teams['img_url'];
				}
				$beonepage_name = '';
				if(isset($teams['name']) && $teams['name'] != ''){
					$beonepage_name = $teams['name'];
				}
				$beonepage_title = '';
				if(isset($teams['title']) && $teams['title'] != ''){
					$beonepage_title = $teams['title'];
				}
				$beonepage_bio = '';
				if(isset($teams['bio']) && $teams['bio'] != ''){
					$beonepage_bio = $teams['bio'];
				}
				$beonepage_social_label_1 = '';
				if(isset($teams['social_label_1']) && $teams['social_label_1'] != ''){
					$beonepage_social_label_1 = $teams['social_label_1'];
				}
				$beonepage_social_url_1 = '';
				if(isset($teams['social_url_1']) && $teams['social_url_1'] != ''){
					$beonepage_social_url_1 = $teams['social_url_1'];
				}
				$beonepage_social_label_2 = '';
				if(isset($teams['social_label_2']) && $teams['social_label_2'] != ''){
					$beonepage_social_label_2 = $teams['social_label_2'];
				}
				$beonepage_social_url_2 = '';
				if(isset($teams['social_url_2']) && $teams['social_url_2'] != ''){
					$beonepage_social_url_2 = $teams['social_url_2'];
				}
				$beonepage_social_label_3 = '';
				if(isset($teams['social_label_3']) && $teams['social_label_3'] != ''){
					$beonepage_social_label_3 = $teams['social_label_3'];
				}
				$beonepage_social_url_3 = '';
				if(isset($teams['social_url_3']) && $teams['social_url_3'] != ''){
					$beonepage_social_url_3 = $teams['social_url_3'];
				}
				$beonepage_social_label_4 = '';
				if(isset($teams['social_label_4']) && $teams['social_label_4'] != ''){
					$beonepage_social_label_4 = $teams['social_label_4'];
				}
				$beonepage_social_url_4 = '';
				if(isset($teams['social_url_4']) && $teams['social_url_4'] != ''){
					$beonepage_social_url_4 = $teams['social_url_4'];
				}
				$result[] = array('section_team_picture' => array('url' => $beonepage_img_url),
					'section_team_name' => $beonepage_name, 		
					'section_team_title' => $beonepage_title, 		
					'section_team_bio' => $beonepage_bio, 		
					'section_team_social_label_1' => $beonepage_social_label_1,
					'section_client_social_url_1' => $beonepage_social_url_1,								
					'section_team_social_label_2' => $beonepage_social_label_2,
					'section_client_social_url_2' => $beonepage_social_url_2,								
					'section_team_social_label_3' => $beonepage_social_label_3,
					'section_client_social_url_3' => $beonepage_social_url_3,								
					'section_team_social_label_4' => $beonepage_social_label_4,
					'section_client_social_url_4' => $beonepage_social_url_4,
				);	
			endforeach;
			
		}else{
			$result = array();
		}
		
		$section_team_repeater = new \Elementor\Repeater();
		$section_team_repeater->add_control(
			'section_team_picture',
			[
				'label' 	=> __( 'Picture', 'beonepage' ),
				'type' 		=> Controls_Manager::MEDIA,
			]
		);
		$section_team_repeater->add_control(
			'section_team_name',
			[
				'label' 	=> __( "Name", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
			]
		);
		$section_team_repeater->add_control(
			'section_team_title',
			[
				'label' 	=> __( "Title", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
			]
		);
		$section_team_repeater->add_control(
			'section_team_bio',
			[
				'label' 	=> 	__( "Bio", 'beonepage' ),
				'type' 		=> 	Controls_Manager::WYSIWYG,
				'rows' 		=> 	7,
			]
		);
		$section_team_repeater->add_control(
			'section_team_social_label_1',
			[
				'label' 	=> __( "Social Label 1", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'description'=> 'e.g. Twitter, Facebook, LinkedIn, Google Plus.',
			]
		);
		$section_team_repeater->add_control(
			'section_client_social_url_1',
			[
				'label' 	=> __( "Social Link 1", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'placeholder' => __( 'https://your-link.com', 'beonepage' ),
			]
		);
		$section_team_repeater->add_control(
			'section_team_social_label_2',
			[
				'label' 	=> __( "Social Label 2", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'description'=> 'e.g. Twitter, Facebook, LinkedIn, Google Plus.',
			]
		);
		$section_team_repeater->add_control(
			'section_client_social_url_2',
			[
				'label' 	=> __( "Social Link 2", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'placeholder' => __( 'https://your-link.com', 'beonepage' ),
			]
		);
		$section_team_repeater->add_control(
			'section_team_social_label_3',
			[
				'label' 	=> __( "Social Label 3", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'description'=> 'e.g. Twitter, Facebook, LinkedIn, Google Plus.',
			]
		);
		$section_team_repeater->add_control(
			'section_client_social_url_3',
			[
				'label' 	=> __( "Social Link 3", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'placeholder' => __( 'https://your-link.com', 'beonepage' ),
			]
		);
		$section_team_repeater->add_control(
			'section_team_social_label_4',
			[
				'label' 	=> __( "Social Label 4", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'description'=> 'e.g. Twitter, Facebook, LinkedIn, Google Plus.',
			]
		);
		$section_team_repeater->add_control(
			'section_client_social_url_4',
			[
				'label' 	=> __( "Social Link 4", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'placeholder' => __( 'https://your-link.com', 'beonepage' ),
			]
		);
		$this->add_control(
		'section_team',
			[
				'label' 	=> __('Team data', 'beonepage' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=> $section_team_repeater->get_controls(),
				'default' 		=> $result,								
				'section'	 	=> 'elementor_team',
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
		//Conitions for Css
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
		$beonepage_section_font_color_bio = '';
		if(isset($settings['section_font_color_bio']) && $settings['section_font_color_bio'] !=''){
			$beonepage_section_font_color_bio = $settings['section_font_color_bio'];
		}
		$beonepage_section_background_color_bio = '';
		if(isset($settings['section_background_color_bio']) && $settings['section_background_color_bio'] !=''){
			$beonepage_section_background_color_bio = $settings['section_background_color_bio'];
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
				.team-module{
					background-image: url(<?php echo $beonepage_section_background_image_url; ?>);
				}
			<?php }
			if(isset($beonepage_section_background_color) && $beonepage_section_background_color !=''){?>
				.team-module{
					background-color: <?php echo $beonepage_section_background_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_font_color) && $beonepage_section_font_color !=''){?>
				.team-module{
					color: <?php echo $beonepage_section_font_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_separator_line_color) && $beonepage_section_separator_line_color !=''){?>	
			.team-module .separator span{
					color: <?php echo $beonepage_section_separator_line_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_separator_circle_color) && $beonepage_section_separator_circle_color !=''){?>	
				.team-module .separator i {
					color: <?php echo $beonepage_section_separator_circle_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_font_color_bio) && $beonepage_section_font_color_bio !=''){?>	
				.team-member .member-profile {
					color: <?php echo $beonepage_section_font_color_bio; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_color_bio) && $beonepage_section_background_color_bio !=''){?>
				.team-member .member-profile {
					background-color: <?php echo $beonepage_section_background_color_bio; ?>;
				}
			<?php } 
			if(isset($beonepage_section_background_image_rp) && $beonepage_section_background_image_rp !=''){?>
				.team-module{
					background-repeat: <?php echo $beonepage_section_background_image_rp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bp) && $beonepage_section_background_image_bp !=''){?>
				.team-module{
					background-position: <?php echo $beonepage_section_background_image_bp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bs) && $beonepage_section_background_image_bs !=''){?>
				.team-module{
					background-size: <?php echo $beonepage_section_background_image_bs; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_ath) && $beonepage_section_background_image_ath !=''){?>
				.team-module{
					background-attachment: <?php echo $beonepage_section_background_image_ath; ?>;
				}
			<?php } ?>		
		</style>
		<section id="" class="module team-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
			<div class="container">
				<div class="row">
					<?php if ( $settings['section_title']!= '' ) : ?>
						<?php $animation = $settings['section_title_animation'] != 'none' ? ' wow ' . $settings['section_title_animation'] . '" data-wow-delay=".2s' : ''; ?>

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

					<div class="team-container col-md-12 owl-carousel wow fadeIn" data-wow-delay=".5s">
						<?php $members =$settings['section_team']; ?>

						<?php if ( ! empty( $members ) ) : ?>
							<?php foreach ( $members as $member ) : ?>
								<div class="team-member col-md-12">
									<div class="member-image">
										<img src="<?php echo $member['section_team_picture']['url']; ?>" alt="<?php echo isset( $member['section_team_name'] ) ? $member['section_team_name'] : ''; ?>">
									</div><!-- .member-image -->

									<div class="member-card">
										<?php if ( isset( $member['section_team_name'] ) ) : ?>
											<h3 class="member-name"><?php echo $member['section_team_name']; ?></h3>
										<?php endif; ?>

										<?php if ( isset( $member['section_team_title'] ) ) : ?>
											<p class="member-title"><?php echo $member['section_team_title']; ?></p>
										<?php endif; ?>
									</div><!-- .member-card -->

									<div class="member-profile">
										<?php if ( isset( $member['section_team_bio'] ) ) : ?>
											<div class="member-bio">
												<?php echo wpautop( $member['section_team_bio'] ); ?>
											</div><!-- .member-bio -->
										<?php endif; ?>

										<ul class="member-social">
											<?php 
												for ( $i = 1; $i <= 4; $i++ ) {
													if ( isset( $member['section_team_social_label_' . $i] ) && isset( $member['section_client_social_url_' . $i] ) && $member['section_team_social_label_' . $i] != '' ) {
														$social_label = strtolower( str_replace( ' ', '-', $member['section_team_social_label_' . $i] ) );
														$social_link = $member['section_client_social_url_' . $i];

														echo '<li><a href="' . $social_link . '"><i class="fa fa-' . $social_label . '"></i></a></li>';
													}
												}
											?> 
										</ul><!-- .member-social -->
									</div><!-- .member-profile -->
								</div><!-- .team-member -->
							<?php endforeach; ?> 
						<?php endif; ?>
					</div><!-- .team-container -->
				</div><!-- .row -->
			</div><!-- .container -->
		</section><!-- #team -->
		<?php
		if ( Plugin::$instance->editor->is_edit_mode() ) :  
			?>
			<script> 
			(function($) {
				var $body = $('body'),
					$owlCarouselTeam = $('.team-container.owl-carousel'),
					$owlCarouselTeam = $('.team-container.owl-carousel');
				APP.team = {
					init: function() {
						APP.team.owlCarousel();
						APP.team.profileContainer();
						APP.team.touch();
					},

					owlCarousel: function() {
						$owlCarouselTeam.owlCarousel({
							smartSpeed: 200,
							mouseDrag: false,
							responsiveClass: true,
							responsive: {
								0: {
									items: 1
								},
								479: {
									items: 2
								},
								991: {
									items: 3
								},
								1200: {
									items: 4
								}
							}
						});

						$owlCarouselTeam.find('.owl-dots').addClass('dot-container');
					},

					profileContainer: function() {
						$owlCarouselTeam.imagesLoaded(function() {
							$owlCarouselTeam.find('.team-member').each(function() {
								var containerWidth = $(this).find('.member-image').width();
								var containerHeight = $(this).find('.member-image').height();


								$(this).find('.member-profile').css({
									'top': containerHeight + 'px',
									'width': containerWidth + 'px',
									'height': containerHeight + 'px'
								});

								$(this).on('mouseenter', function() {
									$(this).find('.member-bio').niceScroll({
										cursorcolor: $('.team-member .member-profile').css('color'),
										cursorwidth: '3px',
										cursorfixedheight: 30,
										cursorborder: 0,
										cursorborderradius: 0,
										scrollspeed: 10,
										mousescrollstep: 10,
										horizrailenabled: false,
										autohidemode: false,
										zindex: 1
									});
								}).on('mouseleave', function() {
									$(this).find('.member-bio').getNiceScroll().remove();
								});
							});
						});
					},

					touch: function() {
						if ($body.hasClass('device-touch')) {
							$owlCarouselTeam.on('mouseup', '.team-member', function() {
								if (!$(this).hasClass('active')) {
									$(this).find('.member-profile').stop(true).animate({
										'top': '0'
									}, 350, 'easeOutQuad');

									$(this).addClass('active');
								} else {
									var containerHeight = $(this).find('.member-image').css('height');

									$(this).find('.member-profile').stop(true).animate({
										'top': containerHeight
									}, 350, 'easeOutQuad');

									$(this).removeClass('active');
								}
							});
						}
					}
				}
				APP.team.init();
			})(jQuery);
			</script>  
			<?php
		endif;
	}
	protected function content_template() {}
	public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_My_Custom_Elementor_Team );
