<?php
namespace Elementor;
use Elementor\Core\Schemes\Color;
if ( ! defined( 'ABSPATH' ) ) exit;
class Widget_My_Custom_Elementor_Ver_Promo extends Widget_Base {
	public function get_categories() {
		return [ 'beonepage-widgets' ];
	}
	public function get_name() {
		return 'elementor-ver-promo';
	}
	public function get_title() {
		return __( 'BeOne Verticle Promotion', 'beonepage' );
	}
	public function get_icon() {
		return 'fa fa-bullhorn';
	}
	protected function _register_controls() {
		$this->add_control(
			'elementor_ver_promo',
			[
				'label' => __( 'Vertical Promotion Option', 'beonepage' ),
				'type' 	=> Controls_Manager::SECTION,
			]
		);
		// Title
		$beonepage_ver_promo_module_title = beonepage_olddata_fetch_redux('front_page_ver_promo_title', 'option');
		if(!empty($beonepage_ver_promo_module_title)){
			$beonepage_ver_promo_module_title = beonepage_olddata_fetch_redux('front_page_ver_promo_title', 'option');
			$beonepage_ver_promo_module_title = html_entity_decode($beonepage_ver_promo_module_title);
		}else{
			$beonepage_ver_promo_module_title = wp_kses("We are <span>BeTheme</span>",array('span' => array()));
		}
		$this->add_control(
			'section_title',
			[
				'label' 	=> __( "Heading", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_ver_promo_module_title,
				'title'		=> __( 'Enter Title', 'beonepage' ),
				'section' 	=> 'elementor_ver_promo',
			]
		);
		//Heading Animation
		$beonepage_ver_promo_module_title_animation = beonepage_olddata_fetch_redux('front_page_ver_promo_title_animation', 'option');
		if(!empty($beonepage_ver_promo_module_title_animation)){
			$beonepage_ver_promo_module_title_animation = beonepage_olddata_fetch_redux('front_page_ver_promo_title_animation', 'option');
        }else{
			$beonepage_ver_promo_module_title_animation = esc_attr("pulse");
        }
		$this->add_control(
			'section_heading_animation',
            [
                'label'   => __( 'Heading Animation', 'beonepage' ),
                'type'    => Controls_Manager::SELECT,
                'default' => $beonepage_ver_promo_module_title_animation,
                'options' => beonepage_theme_animate(),
                'section' => 'elementor_ver_promo',
            ]         
        );
        //Content
		$beonepage_ver_promo_content = beonepage_olddata_fetch_redux('front_page_ver_promo_content', 'option');
		if(!empty($beonepage_ver_promo_content)){
			$beonepage_ver_promo_content = beonepage_olddata_fetch_redux('front_page_ver_promo_content', 'option');
			$beonepage_ver_promo_content = html_entity_decode($beonepage_ver_promo_content);
		}else{
			$beonepage_ver_promo_content = esc_attr("We build more than just Themes. We build User Experience for both, you and your visitors.");
		}
		$this->add_control(
			'section_content',
			[
				'label' 	=> 	__( "Content", 'beonepage' ),
				'type' 		=> 	Controls_Manager::TEXTAREA,
				'rows' 		=> 	7,
				'default'	=> 	$beonepage_ver_promo_content,
				'placeholder' => __( 'Enter Content', 'beonepage' ),
				'section' 	=> 	'elementor_ver_promo',
			]
		);
		//Content Animation
		$beonepage_ver_promo_content_animation = beonepage_olddata_fetch_redux('front_page_ver_promo_content_animation', 'option');
        if(!empty($beonepage_ver_promo_content_animation)){
          $beonepage_ver_promo_content_animation = beonepage_olddata_fetch_redux('front_page_ver_promo_content_animation', 'option');
        }else{
          $beonepage_ver_promo_content_animation = esc_attr("pulse");
        }
        $this->add_control(
            'section_content_animation',
            [
                'label'   => __( 'Content Animation', 'beonepage' ),
                'type'    => Controls_Manager::SELECT,
                'default' => $beonepage_ver_promo_content_animation,
                'options' => beonepage_theme_animate(),
                'section' => 'elementor_ver_promo',
            ]
        );
		//Button TEXT
		$beonepage_ver_promo_btn_text = beonepage_olddata_fetch_redux('front_page_ver_promo_btn_text', 'option');
		if(!empty($beonepage_ver_promo_btn_text)){
			$beonepage_ver_promo_btn_text = beonepage_olddata_fetch_redux('front_page_ver_promo_btn_text', 'option');
			$beonepage_ver_promo_btn_text = html_entity_decode($beonepage_ver_promo_btn_text);
		}else{
			$beonepage_ver_promo_btn_text = esc_attr("Learn More");
		}
		$this->add_control(
			'section_button_text',
			[
				'label' 	=> 	__( "Button Text", 'beonepage' ),
				'type' 		=> 	Controls_Manager::TEXT,
				'default'	=> 	$beonepage_ver_promo_btn_text,
				'title' 	=> 	__( 'Enter Button Text', 'beonepage' ),
				'section' 	=> 	'elementor_ver_promo',
			]		 
		);
		//Button Url
		$beonepage_ver_promo_btn_url = beonepage_olddata_fetch_redux('front_page_ver_promo_btn_url', 'option');
		if(!empty($beonepage_ver_promo_btn_url)){
			$beonepage_ver_promo_btn_url = beonepage_olddata_fetch_redux('front_page_ver_promo_btn_url', 'option');
		}else{
			$beonepage_ver_promo_btn_url = esc_url("http://betheme.me");
		}
		$this->add_control(
			'section_button_url',
			[
				'label' 	=> 	__( "Button URL", 'beonepage' ),
				'type' 		=> 	Controls_Manager::TEXT,
				'default'	=> 	$beonepage_ver_promo_btn_url,
				'title' 	=> 	__( 'Enter Button URL', 'beonepage' ),
				'section' 	=> 	'elementor_ver_promo',
			]		 
		);
		//Button Animation
		$beonepage_ver_promo_btn_animation = beonepage_olddata_fetch_redux('front_page_ver_promo_btn_animation', 'option');
        if(!empty($beonepage_ver_promo_btn_animation)){
          $beonepage_ver_promo_btn_animation = beonepage_olddata_fetch_redux('front_page_ver_promo_btn_animation', 'option');
        }else{
          $beonepage_ver_promo_btn_animation = esc_attr("bounceInUp");
        }
        $this->add_control(
            'section_button_animation',
            [
                'label'   => __( 'Button Animation', 'beonepage' ),
                'type'    => Controls_Manager::SELECT,
                'default' => $beonepage_ver_promo_btn_animation,
                'options' => beonepage_theme_animate(),
                'section' => 'elementor_ver_promo',
            ]        
        );
		//Button Style
		$beonepage_ver_promo_btn_style1 = beonepage_olddata_fetch_redux('front_page_ver_promo_btn_style1', 'option');
		if(!empty($beonepage_ver_promo_btn_style1)){
			$beonepage_ver_promo_btn_style1 = beonepage_olddata_fetch_redux('front_page_ver_promo_btn_style1', 'option');
			$beonepage_ver_promo_btn_style1 = $beonepage_ver_promo_btn_style1;
		if($beonepage_ver_promo_btn_style1 == 1){
				$beonepage_ver_promo_btn_style1 = esc_attr('light');
			}else{
			$beonepage_ver_promo_btn_style1 = esc_attr('dark');
			}
		}else{
			$beonepage_ver_promo_btn_style1 = esc_attr("light");
		}		
		$this->add_control(
			'section_button_style1',
			[
				'label' => __( "Button Style", 'beonepage' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'light' => [
						'title' => __( 'Light', 'beonepage' ),
						'icon' => 'fa fa-circle-o',
					],
					'dark' => [
						'title' => __( 'Dark', 'beonepage' ),
						'icon' => 'fa fa-circle',
					],
				],
				'default' => $beonepage_ver_promo_btn_style1,
				'toggle' => true,
				'section' => 'elementor_ver_promo',
			]		 
		);
		//Font Color
       $beonepage_ver_promo_color = beonepage_olddata_fetch_redux('front_page_ver_promo_color', 'option');
		if(!empty($beonepage_ver_promo_color)){
		  $beonepage_ver_promo_color = beonepage_olddata_fetch_redux('front_page_ver_promo_color', 'option');		  
		}else{
		  $beonepage_ver_promo_color = esc_attr("#eceff3");
		}
		$this->add_control(
			'section_font_color',
			[
				'label' 	=> __( "Font Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_ver_promo_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .promo-box-ver h2, {{WRAPPER}} .promo-box-ver p' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_ver_promo',
			]		 
		);
        //Background setting                
		$class = '';
		$attribute = '';   
        $beonepage_ver_promo_module_bg = beonepage_olddata_fetch_redux('front_page_ver_promo_module_bg', 'option');
        if(!empty($beonepage_ver_promo_module_bg)){
			$beonepage_ver_promo_module_bg = beonepage_olddata_fetch_redux('front_page_ver_promo_module_bg', 'option');
        }else{
			$beonepage_ver_promo_module_bg = esc_attr("color");
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
				'default' 	=> $beonepage_ver_promo_module_bg,
				'toggle' 	=> true,
				'section' 	=> 'elementor_ver_promo',
			]        
        );
		//Background Color
		$beonepage_ver_promo_module_bg_color = beonepage_olddata_fetch_redux('front_page_ver_promo_module_bg_color', 'option');
		if(!empty($beonepage_ver_promo_module_bg_color)){
			$beonepage_ver_promo_module_bg_color = beonepage_olddata_fetch_redux('front_page_ver_promo_module_bg_color', 'option');
		}else{
			$beonepage_ver_promo_module_bg_color = esc_attr("#181a1c");
		}
		$this->add_control(
			'section_background_color',
			[
				'label' 	=> __( "Background Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_ver_promo_module_bg_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .promo-box-ver-module' => 'Background-color: {{VALUE}}',
				],
				'condition' => [
					'section_background' => 'color',
				],
				'section' => 'elementor_ver_promo',
			]         
        );       
        //Background image 
        $beonepage_ver_promo_module_bg_img = beonepage_olddata_fetch_redux('front_page_ver_promo_module_bg_img', 'option');
        if(!empty($beonepage_ver_promo_module_bg_img['background-image'])){
          $beonepage_ver_promo_module_bg_img = beonepage_olddata_fetch_redux('front_page_ver_promo_module_bg_img', 'option');
          $beonepage_ver_promo_module_bg_img_url = $beonepage_ver_promo_module_bg_img['background-image'];
        }else{
           $beonepage_ver_promo_module_bg_img_url = \Elementor\Utils::get_placeholder_image_src();
        }
        $this->add_control(
			'section_background_image',
			[
				'label' 	=> __( "Bakground Image", 'beonepage' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => esc_url($beonepage_ver_promo_module_bg_img_url),
				],
				'condition' => [
					'section_background' => 'image',
				],
				'section' 	=> 'elementor_ver_promo',
			]         
        );
        // Background Repeat
        $beonepage_ver_promo_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_ver_promo_module_bg_img', 'option');
        if(!empty($beonepage_ver_promo_module_bg_img_rp['background-repeat'])){
			$beonepage_ver_promo_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_ver_promo_module_bg_img', 'option');
			$beonepage_ver_promo_module_bg_img_rp = $beonepage_ver_promo_module_bg_img_rp['background-repeat'];
        }else{
			$beonepage_ver_promo_module_bg_img_rp = esc_attr("No Repeat");
        }	
        $this->add_control(
			'section_background_image_rp',
            [
                'label' 	=> __( 'Background Repeat', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_ver_promo_module_bg_img_rp,
                'options' 	=> [
                    'no-repeat' => __( 'No Repeat', 'beonepage' ),
                    'repeat' 	=> __( 'Repeat All', 'beonepage' ),
                    'repeat-x' 	=> __( 'Repeat Horizontally', 'beonepage' ),
                    'repeat-y' 	=> __( 'Repeat Vertically', 'beonepage' ),
                ],
                'section' 	=> 'elementor_ver_promo',
				'condition' => [
                    'section_background' => 'image',
                ],
            ]         
        );
        //Background Position
        $beonepage_ver_promo_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_ver_promo_module_bg_img', 'option');
        if(!empty($beonepage_ver_promo_module_bg_img_bp['background-position'])){
			$beonepage_ver_promo_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_ver_promo_module_bg_img', 'option');
			$beonepage_ver_promo_module_bg_img_bp = $beonepage_ver_promo_module_bg_img_bp['background-position'];
        }else{
			$beonepage_ver_promo_module_bg_img_bp = esc_attr("Left Top");
        }
        $this->add_control(
			'section_background_image_bp',
            [
                'label' 	=> __( 'Background Position', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_ver_promo_module_bg_img_bp,
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
                'section' 	=> 'elementor_ver_promo',
				'condition' => [
                    'section_background' => 'image',
                ],
            ]        
        );
        //Background Size
        $beonepage_ver_promo_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_ver_promo_module_bg_img', 'option');
        if(!empty($beonepage_ver_promo_module_bg_img_bs['background-size'])){
			$beonepage_ver_promo_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_ver_promo_module_bg_img', 'option');
			$beonepage_ver_promo_module_bg_img_bs = $beonepage_ver_promo_module_bg_img_bs['background-size'];
			}else{
			$beonepage_ver_promo_module_bg_img_bs = esc_attr("auto");
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
				'default' 		=> $beonepage_ver_promo_module_bg_img_bs,
				'toggle' 		=> true,
				'condition' 	=> [
					'section_background' => 'image',
				],
				'section' => 'elementor_ver_promo',
			]         
        );
        //Background Attachment
        $beonepage_ver_promo_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_ver_promo_module_bg_img', 'option');
        if(!empty($beonepage_ver_promo_module_bg_img_ath['background-attachment'])){
			$beonepage_ver_promo_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_ver_promo_module_bg_img', 'option');
			$beonepage_ver_promo_module_bg_img_ath = $beonepage_ver_promo_module_bg_img_ath['background-attachment'];
        }else{
			$beonepage_ver_promo_module_bg_img_ath = esc_attr("Scroll");
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
				'default' 	=> $beonepage_ver_promo_module_bg_img_ath,
				'toggle' 	=> true,
				'condition'=> [
					'section_background' => 'image',
				],
				'section' 	=> 'elementor_ver_promo',
			]         
        );
        //Background video field
        $beonepage_ver_promo_module_bg_video = beonepage_olddata_fetch_redux('front_page_ver_promo_module_bg_video', 'option');
		if(!empty($beonepage_ver_promo_module_bg_video)){
			$beonepage_ver_promo_module_bg_video = beonepage_olddata_fetch_redux('front_page_ver_promo_module_bg_video', 'option');
			$beonepage_ver_promo_module_bg_video = html_entity_decode($beonepage_ver_promo_module_bg_video);
		}else{
			$beonepage_ver_promo_module_bg_video =  esc_attr("Video Url");
		}
        $this->add_control(
			'section_youtube_url',
			[
				'label' 	=> __( "YouTube URL", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_ver_promo_module_bg_video,
				'condition' => [
					'section_background' => 'video',
				],
				'description'	=> __( 'IMPORTANT NOTE: The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so its better to define both Image and YouTube Video for best results.', 'beonepage' ),
				'section' 	=> 'elementor_ver_promo',
			]         
        );        
        //Parallax setting
        $beonepage_ver_promo_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_ver_promo_module_bg_parallax', 'option');
        if(!empty($beonepage_ver_promo_module_bg_parallax)){
			$beonepage_ver_promo_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_ver_promo_module_bg_parallax', 'option');
			$beonepage_ver_promo_module_bg_parallax = html_entity_decode($beonepage_ver_promo_module_bg_parallax);
        if($beonepage_ver_promo_module_bg_parallax == 1){
            $beonepage_ver_promo_module_bg_parallax_d = esc_attr("yes");
        }else{
            $beonepage_ver_promo_module_bg_parallax_d = esc_attr("no");
        }  
        }else{
          $beonepage_ver_promo_module_bg_parallax_d = esc_attr("yes");
        }
        $this->add_control(
			'section_bg_parallax',
			[
				'label' 	=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'type' 		=> Controls_Manager::SWITCHER,
				'label_on' 	=> __( 'Enable', 'beonepage' ),
                'label_off' 	=> __( 'Disable', 'beonepage' ),
                'return_value' 	=> 'yes',
                'default' 		=> $beonepage_ver_promo_module_bg_parallax_d,
                'section'	 	=> 'elementor_ver_promo',
			]
        );  
	}// End finction
	protected function render( $instance = [] ) {
		$settings = $this->get_settings();
		
		$class = '';
		$attribute = '';   
        
		if ( $settings['section_background'] == 'color' ) {
			$class = ' no-background';
		}else {
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
				.promo-box-ver-module{
					background-image: url(<?php echo $beonepage_section_background_image_url; ?>);
				}
			<?php }
			if(isset($beonepage_section_background_color) && $beonepage_section_background_color !=''){?>
				.promo-box-ver-module{
					background-color: <?php echo $beonepage_section_background_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_font_color) && $beonepage_section_font_color !=''){?>
				.promo-box-ver-module, .promo-box-ver h2{
					color: <?php echo $beonepage_section_font_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_rp) && $beonepage_section_background_image_rp !=''){?>
				.promo-box-ver-module{
					background-repeat: <?php echo $beonepage_section_background_image_rp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bp) && $beonepage_section_background_image_bp !=''){?>
				.promo-box-ver-module{
					background-position: <?php echo $beonepage_section_background_image_bp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bs) && $beonepage_section_background_image_bs !=''){?>
				.promo-box-ver-module{
					background-size: <?php echo $beonepage_section_background_image_bs; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_ath) && $beonepage_section_background_image_ath !=''){?>
				.promo-box-ver-module{
					background-attachment: <?php echo $beonepage_section_background_image_ath; ?>;
				}
			<?php } ?>
		</style>
		<section id="ver-promo-module" class="module promo-box-ver-module <?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
			<div class="container">
				<div class="row">
					<div class="promo-box-ver col-md-10 col-md-offset-1 text-center">
						<?php 
							if ( $settings['section_title'] != '' ) {
								$animation = $settings['section_heading_animation'] != 'none' ? ' class="wow ' . $settings['section_heading_animation'] . '" data-wow-delay=".3s"' : '';

								echo '<h2' . $animation . '>' . strip_tags( html_entity_decode( $settings['section_title'] ), '<span>' ) . '</h2>';
							}
						?>

						<?php
							if ( $settings['section_content'] != '' ) {
								$animation = $settings['section_content_animation'] != 'none' ? ' class="wow ' . $settings['section_content_animation'] . '" data-wow-delay=".3s"' : '';

								echo '<p' . $animation . '>' . strip_tags( html_entity_decode( $settings['section_content'] ), '<span>' ) . '</p>';
							}
						?>

						<?php if ( $settings['section_button_text'] != '' ) : ?>
							<?php $animation = $settings['section_button_animation'] != 'none' ? ' wow ' . $settings['section_button_animation'] . '" data-wow-delay=".3s' : ''; ?>

							<div class="promo-btn<?php echo $animation; ?>">
								<a href="<?php echo $settings['section_button_url']; ?>" class="btn <?php echo $settings['section_button_style1']  == 'light' ? 'btn-light' : 'btn-dark'; ?>"><?php echo $settings['section_button_text']; ?></a>
							</div><!-- .promo-btn -->
						<?php endif; ?>
					</div><!-- .promo-box-ver -->
				</div><!-- .row -->
			</div><!-- .container -->
		</section><!-- #promo-box-ver -->
		<?php
		if ( Plugin::$instance->editor->is_edit_mode() ) :  
			?>
			<script> 
			(function($) {
			
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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_My_Custom_Elementor_Ver_Promo );
