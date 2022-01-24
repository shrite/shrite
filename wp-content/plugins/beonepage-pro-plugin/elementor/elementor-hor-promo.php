<?php
namespace Elementor;
use Elementor\Core\Schemes\Color;

if ( ! defined( 'ABSPATH' ) ) exit;
class Widget_My_Custom_Elementor_hor_Promo extends Widget_Base {
	public function get_categories() {
		return [ 'beonepage-widgets' ];
	}
	public function get_name() {
		return 'elementor-hor-promo';
	}
	public function get_title() {
		return __( 'BeOne Horizontal Promotion', 'beonepage' );
	}
	public function get_icon() {
		return 'fa fa-bullhorn';
	}
	protected function _register_controls() {
		$this->add_control(
			'elementor_hor_promo',
			[
				'label' => __( 'Horizontal Promotion Option', 'beonepage' ),
				'type' 	=> Controls_Manager::SECTION,
			]
		);
		// Title
		$beonepage_hor_promo_module_title = beonepage_olddata_fetch_redux('front_page_hor_promo_title', 'option');
		if(!empty($beonepage_hor_promo_module_title)){
			$beonepage_hor_promo_module_title = beonepage_olddata_fetch_redux('front_page_hor_promo_title', 'option');
			$beonepage_hor_promo_module_title = html_entity_decode($beonepage_hor_promo_module_title);
		}else{
			$beonepage_hor_promo_module_title = wp_kses("<span>WordPress Themes</span> That Make Your Life <span>Easier</span>",array('span' => array()));
		}
		$this->add_control(
			'section_title',
			[
				'label' 	=> __( "Heading", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_hor_promo_module_title,
				'title'		=> __( 'Enter Title', 'beonepage' ),
				'section' 	=> 'elementor_hor_promo',
			]
		);
		//Heading Animation
		$beonepage_hor_promo_module_title_animation = beonepage_olddata_fetch_redux('front_page_hor_promo_title_animation', 'option');
		if(!empty($beonepage_hor_promo_module_title_animation)){
			$beonepage_hor_promo_module_title_animation = beonepage_olddata_fetch_redux('front_page_hor_promo_title_animation', 'option');
        }else{
			$beonepage_hor_promo_module_title_animation = esc_attr("FadeInDown");
        }
		$this->add_control(
			'section_heading_animation',
            [
                'label'   => __( 'Heading Animation', 'beonepage' ),
                'type'    => Controls_Manager::SELECT,
                'default' => $beonepage_hor_promo_module_title_animation,
                'options' => beonepage_theme_animate(),
                'section' => 'elementor_hor_promo',
            ]         
        );
        //Content
		$beonepage_hor_promo_content = beonepage_olddata_fetch_redux('front_page_hor_promo_content', 'option');
		if(!empty($beonepage_hor_promo_content)){
			$beonepage_hor_promo_content = beonepage_olddata_fetch_redux('front_page_hor_promo_content', 'option');
			$beonepage_hor_promo_content = html_entity_decode($beonepage_hor_promo_content);
		}else{
			$beonepage_hor_promo_content = esc_attr("We build more than just Themes. We build User Experience for both, you and your visitors.");
		}
		$this->add_control(
			'section_content',
			[
				'label' 	=> 	__( "Content", 'beonepage' ),
				'type' 		=> 	Controls_Manager::TEXTAREA,
				'rows' 		=> 	7,
				'default'	=> 	$beonepage_hor_promo_content,
				'placeholder' => __( 'Enter Content', 'beonepage' ),
				'section' 	=> 	'elementor_hor_promo',
			]		 
		);
		//Content Animation
		$beonepage_hor_promo_content_animation = beonepage_olddata_fetch_redux('front_page_hor_promo_content_animation', 'option');
        if(!empty($beonepage_hor_promo_content_animation)){
          $beonepage_hor_promo_content_animation = beonepage_olddata_fetch_redux('front_page_hor_promo_content_animation', 'option');
        }else{
          $beonepage_hor_promo_content_animation = esc_attr("FadeInUp");
        }
        $this->add_control(
            'section_content_animation',
            [
                'label'   => __( 'Content Animation', 'beonepage' ),
                'type'    => Controls_Manager::SELECT,
                'default' => $beonepage_hor_promo_content_animation,
                'options' => beonepage_theme_animate(),
                'section' => 'elementor_hor_promo',
            ]         
        );
		//Button TEXT
		$beonepage_hor_promo_btn_text = beonepage_olddata_fetch_redux('front_page_hor_promo_btn_text', 'option');
		if(!empty($beonepage_hor_promo_btn_text)){
			$beonepage_hor_promo_btn_text = beonepage_olddata_fetch_redux('front_page_hor_promo_btn_text', 'option');
			$beonepage_hor_promo_btn_text = html_entity_decode($beonepage_hor_promo_btn_text);
		}else{
			$beonepage_hor_promo_btn_text = esc_attr("Start Browsing");
		}
		$this->add_control(
			'section_button_text',
			[
				'label' 	=> 	__( "Button Text", 'beonepage' ),
				'type' 		=> 	Controls_Manager::TEXT,
				'default'	=> 	$beonepage_hor_promo_btn_text,
				'title' 	=> 	__( 'Enter Button Text', 'beonepage' ),
				'section' 	=> 	'elementor_hor_promo',
			]		 
		);
		//Button Url
		$beonepage_hor_promo_btn_url = beonepage_olddata_fetch_redux('front_page_hor_promo_btn_url', 'option');
		if(!empty($beonepage_hor_promo_btn_url)){
			$beonepage_hor_promo_btn_url = beonepage_olddata_fetch_redux('front_page_hor_promo_btn_url', 'option');
		}else{
			$beonepage_hor_promo_btn_url = esc_url("http://betheme.me");
		}
		$this->add_control(
			'section_button_url',
			[
				'label' 	=> 	__( "Button URL", 'beonepage' ),
				'type' 		=> 	Controls_Manager::TEXT,
				'default'	=> 	$beonepage_hor_promo_btn_url,
				'title' 	=> 	__( 'Enter Button URL', 'beonepage' ),
				'section' 	=> 	'elementor_hor_promo',
			]		 
		);
		//Button Animation
		$beonepage_hor_promo_btn_animation = beonepage_olddata_fetch_redux('front_page_hor_promo_btn_animation', 'option');
        if(!empty($beonepage_hor_promo_btn_animation)){
          $beonepage_hor_promo_btn_animation = beonepage_olddata_fetch_redux('front_page_hor_promo_btn_animation', 'option');
        }else{
          $beonepage_hor_promo_btn_animation = esc_attr("flipInX");
        }
        $this->add_control(
            'section_button_animation',
            [
                'label'   => __( 'Button Animation', 'beonepage' ),
                'type'    => Controls_Manager::SELECT,
                'default' => $beonepage_hor_promo_btn_animation,
                'options' => beonepage_theme_animate(),
                'section' => 'elementor_hor_promo',
            ]        
        );
		//Button Style
		$beonepage_hor_promo_btn_style1 = beonepage_olddata_fetch_redux('front_page_hor_promo_btn_style1', 'option');
		if(!empty($beonepage_hor_promo_btn_style1)){
			$beonepage_hor_promo_btn_style1 = beonepage_olddata_fetch_redux('front_page_hor_promo_btn_style1', 'option');
			if($beonepage_hor_promo_btn_style1 == 1){
				$beonepage_hor_promo_btn_style1 = esc_attr('light');
			}else{
			$beonepage_hor_promo_btn_style1 = esc_attr('dark');
			}
		}else{
			$beonepage_hor_promo_btn_style1 = esc_attr("light");
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
				'default' 	=> $beonepage_hor_promo_btn_style1,
				'toggle' 	=> true,
				'section' 	=> 'elementor_hor_promo',
			]		 
		);
		//Font Color
       $beonepage_hor_promo_color = beonepage_olddata_fetch_redux('front_page_hor_promo_color', 'option');
		if(!empty($beonepage_hor_promo_color)){
		  $beonepage_hor_promo_color = beonepage_olddata_fetch_redux('front_page_hor_promo_color', 'option');		  
		}else{
		  $beonepage_hor_promo_color = esc_attr("#eceff3");
		}
		$this->add_control(
			'section_font_color',
			[
				'label' 	=> __( "Font Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_hor_promo_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .promo-box-hor h2, {{WRAPPER}} .promo-box-hor p' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_hor_promo',
			]		 
		);
        //Background setting                
		$class = '';
		$attribute = '';   
        $beonepage_hor_promo_module_bg = beonepage_olddata_fetch_redux('front_page_hor_promo_module_bg', 'option');
        if(!empty($beonepage_hor_promo_module_bg)){
			$beonepage_hor_promo_module_bg = beonepage_olddata_fetch_redux('front_page_hor_promo_module_bg', 'option');
         }else{
			$beonepage_hor_promo_module_bg = esc_attr("color");
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
                ],
				'default' 	=> $beonepage_hor_promo_module_bg,
				'toggle' 	=> true,
				'section' 	=> 'elementor_hor_promo',
			]        
        );
        //Background Color
		$beonepage_hor_promo_module_bg_color = beonepage_olddata_fetch_redux('front_page_hor_promo_module_bg_color', 'option');
		if(!empty($beonepage_hor_promo_module_bg_color)){
			$beonepage_hor_promo_module_bg_color = beonepage_olddata_fetch_redux('front_page_hor_promo_module_bg_color', 'option');
		}else{
			$beonepage_hor_promo_module_bg_color = esc_attr("#181a1c");
		}
		$this->add_control(
			'section_background_color',
			[
				'label' => __( "Background Color", 'beonepage' ),
				'type' => Controls_Manager::COLOR,
				'default' => $beonepage_hor_promo_module_bg_color,
				'scheme' => [
					'type' => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .promo-box-hor-module' => 'Background-color: {{VALUE}}',
				],
				'condition' => [
					'section_background' => 'color',
				],
				'section' => 'elementor_hor_promo',
			]         
        );       
        //Background image 
        $beonepage_hor_promo_module_bg_img = beonepage_olddata_fetch_redux('front_page_hor_promo_module_bg_img', 'option');
        if(!empty($beonepage_hor_promo_module_bg_img['background-image'])){
          $beonepage_hor_promo_module_bg_img = beonepage_olddata_fetch_redux('front_page_hor_promo_module_bg_img', 'option');
          $beonepage_hor_promo_module_bg_img_url = $beonepage_hor_promo_module_bg_img['background-image'];
        }else{
           $beonepage_hor_promo_module_bg_img_url = \Elementor\Utils::get_placeholder_image_src();
        }
        $this->add_control(
			'section_background_image',
			[
				'label' 	=> __( "Bakground Image", 'beonepage' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => esc_url($beonepage_hor_promo_module_bg_img_url),
				],
				'condition' => [
					'section_background' => 'image',
				],
				'section' 	=> 'elementor_hor_promo',
			]         
        );
        // Background Repeat
        $beonepage_hor_promo_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_hor_promo_module_bg_img', 'option');
        if(!empty($beonepage_hor_promo_module_bg_img_rp['background-repeat'])){
			$beonepage_hor_promo_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_hor_promo_module_bg_img', 'option');
			$beonepage_hor_promo_module_bg_img_rp = $beonepage_hor_promo_module_bg_img_rp['background-repeat'];
        }else{
			$beonepage_hor_promo_module_bg_img_rp = esc_attr("No Repeat");
        }	
        $this->add_control(
			'section_background_image_rp',
            [
                'label'		=> __( 'Background Repeat', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default'	=> $beonepage_hor_promo_module_bg_img_rp,
                'options' 	=> [
                    'no-repeat' => __( 'No Repeat', 'beonepage' ),
                    'repeat' 	=> __( 'Repeat All', 'beonepage' ),
                    'repeat-x'	=> __( 'Repeat Horizontally', 'beonepage' ),
                    'repeat-y' 	=> __( 'Repeat hortically', 'beonepage' ),
                ],
                'section'	 => 'elementor_hor_promo',
				'condition'	 => [
                    'section_background' => 'image',
                ],
            ]         
        );
        //Background Position
        $beonepage_hor_promo_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_hor_promo_module_bg_img', 'option');
        if(!empty($beonepage_hor_promo_module_bg_img_bp['background-position'])){
			$beonepage_hor_promo_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_hor_promo_module_bg_img', 'option');
			$beonepage_hor_promo_module_bg_img_bp = $beonepage_hor_promo_module_bg_img_bp['background-position'];
        }else{
			$beonepage_hor_promo_module_bg_img_bp = esc_attr("Left Top");
        }
        $this->add_control(
			'section_background_image_bp',
            [
                'label' 	=> __( 'Background Position', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_hor_promo_module_bg_img_bp,
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
                'section' 	=> 'elementor_hor_promo',
				'condition' => [
                    'section_background' => 'image',
                ],
            ]        
        );
        //Background Size
        $beonepage_hor_promo_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_hor_promo_module_bg_img', 'option');
        if(!empty($beonepage_hor_promo_module_bg_img_bs['background-size'])){
			$beonepage_hor_promo_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_hor_promo_module_bg_img', 'option');
			$beonepage_hor_promo_module_bg_img_bs = $beonepage_hor_promo_module_bg_img_bs['background-size'];
        }else{
			$beonepage_hor_promo_module_bg_img_bs = esc_attr("cover");
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
				'default' 		=> $beonepage_hor_promo_module_bg_img_bs,
				'toggle' 		=> true,
				'condition' 	=> [
					'section_background' => 'image',
				],
				'section' => 'elementor_hor_promo',
			]         
        );
        //Background Attachment
        $beonepage_hor_promo_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_hor_promo_module_bg_img', 'option');
        if(!empty($beonepage_hor_promo_module_bg_img_ath['background-attachment'])){
			$beonepage_hor_promo_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_hor_promo_module_bg_img', 'option');
			$beonepage_hor_promo_module_bg_img_ath = $beonepage_hor_promo_module_bg_img_ath['background-attachment'];
        }else{
			$beonepage_hor_promo_module_bg_img_ath = esc_attr("Scroll");
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
				'default' 	=> $beonepage_hor_promo_module_bg_img_ath,
				'toggle' 	=> true,
				'condition'	=> [
					'section_background' => 'image',
				],
				'section' 	=> 'elementor_hor_promo',
			]         
        );
        //Parallax seting
        $beonepage_hor_promo_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_hor_promo_module_bg_parallax', 'option');
        if(!empty($beonepage_hor_promo_module_bg_parallax)){
			$beonepage_hor_promo_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_hor_promo_module_bg_parallax', 'option');
			$beonepage_hor_promo_module_bg_parallax = html_entity_decode($beonepage_hor_promo_module_bg_parallax);
        if($beonepage_hor_promo_module_bg_parallax == 1){
            $beonepage_hor_promo_module_bg_parallax_d = esc_attr("yes");
        }else{
            $beonepage_hor_promo_module_bg_parallax_d = esc_attr("no");
        }  
        }else{
          $beonepage_hor_promo_module_bg_parallax_d = esc_attr("yes");
        }
        $this->add_control(
			'section_bg_parallax',
			[
				'label' 	=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'type' 		=> Controls_Manager::SWITCHER,
				'label_on' 	=> __( 'Enable', 'beonepage' ),
				'label_off' 	=> __( 'Disable', 'beonepage' ),
                'return_value' 	=> 'yes',
                'default' 		=> $beonepage_hor_promo_module_bg_parallax_d,
                'section'	 	=> 'elementor_hor_promo',
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
		} ?>
		<style>
			<?php if(isset($beonepage_section_background_image_url) && $beonepage_section_background_image_url !=''){?>
				.promo-box-hor-module{
					background-image: url(<?php echo $beonepage_section_background_image_url; ?>);
				}
			<?php }
			if(isset($beonepage_section_background_color) && $beonepage_section_background_color !=''){?>
				.promo-box-hor-module{
					background-color: <?php echo $beonepage_section_background_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_font_color) && $beonepage_section_font_color !=''){?>
				.promo-box-hor-module, .promo-box-hor h2{
					color: <?php echo $beonepage_section_font_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_rp) && $beonepage_section_background_image_rp !=''){?>
				.promo-box-hor-module{
					background-repeat: <?php echo $beonepage_section_background_image_rp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bp) && $beonepage_section_background_image_bp !=''){?>
				.promo-box-hor-module{
					background-position: <?php echo $beonepage_section_background_image_bp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bs) && $beonepage_section_background_image_bs !=''){?>
				.promo-box-hor-module{
					background-size: <?php echo $beonepage_section_background_image_bs; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_ath) && $beonepage_section_background_image_ath !=''){?>
				.promo-box-hor-module{
					background-attachment: <?php echo $beonepage_section_background_image_ath; ?>;
				}
			<?php } ?>
		</style>

		<section id="hor-promo-module" class="module promo-box-hor-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
			<div class="container">
				<div class="row">
					<div class="promo-box-hor">
						<?php
							if ( $settings['section_title'] != '' ) {
								$animation = $settings['section_heading_animation'] != 'none' ? ' class="wow ' . $settings['section_heading_animation'] . '" data-wow-delay=".3s"' : '';

								echo '<h2' . $animation . '>' . strip_tags( html_entity_decode( $settings['section_title'] ), '<span>' ) . '</h2>';
							}
						?>

						<?php
							if ( $settings['section_content'] != '' ) {
								$animation =  $settings['section_content_animation'] != 'none' ? ' class="wow ' . $settings['section_content_animation'] . '" data-wow-delay=".3s"' : '';

								echo '<p' . $animation . '>' . strip_tags( html_entity_decode(  $settings['section_content'] ), '<span>' ) . '</p>';
							}
						?>

						<?php if ( $settings['section_button_text'] != '' ) : ?>
							<?php $animation = $settings['section_button_animation'] != 'none' ? ' wow ' . $settings['section_button_animation'] . '" data-wow-delay=".3s' : ''; ?>

							<div class="promo-btn<?php echo $animation; ?>">
								<a href="<?php echo $settings['section_button_url']; ?>" class="btn <?php echo $settings['section_button_style1'] == 'light' ? 'btn-light' : 'btn-dark'; ?>"><?php echo $settings['section_button_text']; ?></a>
							</div><!-- .promo-btn -->
						<?php endif; ?>
					</div><!-- .promo-box-hor -->
				</div><!-- .row -->
			</div><!-- .container -->
		</section><!-- #promo-box-hor -->
	<?php
	}
	protected function content_template() {}
	public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_My_Custom_Elementor_hor_Promo );
