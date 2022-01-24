<?php
namespace Elementor;
use Elementor\Core\Schemes\Color;
if ( ! defined( 'ABSPATH' ) ) exit;
class Widget_My_Custom_Elementor_Custom extends Widget_Base {
	public function get_categories() {
		return [ 'beonepage-widgets' ];
	}
	public function get_name() {
		return 'elementor-custom';
	}
	public function get_title() {
		return __( 'BeOne Custom', 'beonepage' );
	}
	public function get_icon() {
		return 'fa fa-houzz';
	}
	protected function _register_controls() {
		$this->add_control(
			'elementor_custom',
			[
				'label' => __( 'Custom Option', 'beonepage' ),
				'type' 	=> Controls_Manager::SECTION,
			]
		);
		
		// Title
		$beonepage_custom_module_title = beonepage_olddata_fetch_redux('front_page_custom_module_title', 'option');
		if(!empty($beonepage_custom_module_title)){
			$beonepage_custom_module_title = beonepage_olddata_fetch_redux('front_page_custom_module_title', 'option');
			$beonepage_custom_module_title = html_entity_decode($beonepage_custom_module_title);
		}else{
			$beonepage_custom_module_title = wp_kses("<span>Custom</span> Module",array('span' => array()));
		}
		$this->add_control(
			'section_title',
			[
				'label' 	=> __( "Title", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_custom_module_title,
				'title'		=> __( 'Enter Title', 'beonepage' ),
				'section' 	=> 'elementor_custom',
			]
		);		
        //Sub title
		$beonepage_custom_module_subtitle = beonepage_olddata_fetch_redux('front_page_custom_module_subtitle', 'option');
		if(!empty($beonepage_custom_module_subtitle)){
			$beonepage_custom_module_subtitle = beonepage_olddata_fetch_redux('front_page_custom_module_subtitle', 'option');
			$beonepage_custom_module_subtitle = html_entity_decode($beonepage_custom_module_subtitle);
		}else{
			$beonepage_custom_module_subtitle = esc_attr("Subtitle for custom module");
		}
		$this->add_control(
			'section_sub_title',
			[
				'label' 	=> __( "Sub Title", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_custom_module_subtitle,
				'title' 	=> __( 'Enter Sub Title', 'beonepage' ),
				'section' 	=> 'elementor_custom',
			]
		);
		//Caption Animation
		$beonepage_custom_module_animation = beonepage_olddata_fetch_redux('front_page_custom_module_animation', 'option');
		if(!empty($beonepage_custom_module_animation)){
			$beonepage_custom_module_animation = beonepage_olddata_fetch_redux('front_page_custom_module_animation', 'option');
		}else{
			$beonepage_custom_module_animation = esc_attr("none");
		}
        $this->add_control(
            'section_caption_animation',
            [
                'label'   => __( 'Caption Animation', 'beonepage' ),
                'type'    => Controls_Manager::SELECT,
                'default' => $beonepage_custom_module_animation,
                'options' => beonepage_theme_animate(),
                'section' => 'elementor_custom',
            ]
        );
		// Font Color
		$beonepage_custom_module_color = beonepage_olddata_fetch_redux('front_page_custom_module_color', 'option');
		if(!empty($beonepage_custom_module_color)){
			$beonepage_custom_module_color = beonepage_olddata_fetch_redux('front_page_custom_module_color', 'option');
		}else{
			$beonepage_custom_module_color = esc_attr("#eceff3");
		}
		$this->add_control(
			'section_font_color',
			[
				'label' 	=> __( "Font Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_custom_module_color,
				'scheme' 	=> [
					'type' 		=> Color::get_type(),
					'value' 	=> Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .custom-module' => 'color: {{VALUE}}',				
				],
				'section' 	=> 'elementor_custom',
			]			
		);
		//Separator Line
		$beonepage_custom_module_sp_color = beonepage_olddata_fetch_redux('front_page_custom_module_sp_color', 'option');
		if(!empty($beonepage_custom_module_sp_color)){
			$beonepage_custom_module_sp_color = beonepage_olddata_fetch_redux('front_page_custom_module_sp_color', 'option');
		}else{
			$beonepage_custom_module_sp_color = esc_attr("#888");
		}			
		$this->add_control(
			'section_separator_line_color',
			[
				'label' 	=> __( "Separator Line", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_custom_module_sp_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .custom-module .separator span:after, .custom-module .separator span:before' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_custom',
			]			
		);
		//Separator Circle
		$beonepage_custom_module_sp_i_color = beonepage_olddata_fetch_redux('front_page_custom_module_sp_i_color', 'option');
		if(!empty($beonepage_custom_module_sp_i_color)){
			$beonepage_custom_module_sp_i_color = beonepage_olddata_fetch_redux('front_page_custom_module_sp_i_color', 'option');
		}else{
			$beonepage_custom_module_sp_i_color = esc_attr("#ffcc00");
		}			
		$this->add_control(
			'section_separator_circle_color',
			[
				'label' 	=> __( "Separator Circle", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_custom_module_sp_i_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .custom-module .separator i' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_custom',
			]			
		);
		//Background setting                
		$class = '';
		$attribute = '';    
        $beonepage_custom_module_bg = beonepage_olddata_fetch_redux('front_page_custom_module_bg', 'option');
		if(!empty($beonepage_custom_module_bg)){
			$beonepage_custom_module_bg = beonepage_olddata_fetch_redux('front_page_custom_module_bg', 'option');
		}else{
			$beonepage_custom_module_bg = esc_attr("color");
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
				'default' 	=> $beonepage_custom_module_bg,
				'toggle' 	=> true,
				'section' 	=> 'elementor_custom',
			]
        );
		$beonepage_custom_module_bg_color = beonepage_olddata_fetch_redux('front_page_custom_module_bg_color', 'option');
		if(!empty($beonepage_custom_module_bg_color)){
			$beonepage_custom_module_bg_color = beonepage_olddata_fetch_redux('front_page_custom_module_bg_color', 'option');
		}else{
			$beonepage_custom_module_bg_color = esc_attr("#181a1c");
		}
		$this->add_control(
			'section_background_color',
			[
				'label' 	=> __( "Background Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_custom_module_bg_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .custom-module' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'section_background' => 'color',
				],
				'section' 	=> 'elementor_custom',
			]         
        );        
        //Background image 
        $beonepage_custom_module_bg_img = beonepage_olddata_fetch_redux('front_page_custom_module_bg_img', 'option');
        if(!empty($beonepage_custom_module_bg_img['background-image'])){
			$beonepage_custom_module_bg_img = beonepage_olddata_fetch_redux('front_page_custom_module_bg_img', 'option');
			$beonepage_custom_module_bg_img_url = $beonepage_custom_module_bg_img['background-image'];
        }else{
			$beonepage_custom_module_bg_img_url = \Elementor\Utils::get_placeholder_image_src();
        }
        $this->add_control(
			'section_background_image',
			[
				'label' => __( "Bakground Image", 'beonepage' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => esc_url($beonepage_custom_module_bg_img_url),
				],
				'condition' => [
					'section_background' => 'image',
				],
				'section' => 'elementor_custom',
			]         
        );
        // Background Repeat
        $beonepage_custom_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_custom_module_bg_img', 'option');
        if(!empty($beonepage_custom_module_bg_img_rp['background-repeat'])){
			$beonepage_custom_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_custom_module_bg_img', 'option');
			$beonepage_custom_module_bg_img_rp = $beonepage_custom_module_bg_img_rp['background-repeat'];
        }else{
			$beonepage_custom_module_bg_img_rp = esc_attr("No Repeat");
        }
        $this->add_control(
            'section_background_image_rp',
            [
                'label' 	=> __( 'Background Repeat', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_custom_module_bg_img_rp,
                'options' 	=> [
                    'no-repeat' => __( 'No Repeat', 'beonepage' ),
                    'repeat' 	=> __( 'Repeat All', 'beonepage' ),
                    'repeat-x' 	=> __( 'Repeat Horizontally', 'beonepage' ),
                    'repeat-y' 	=> __( 'Repeat Vertically', 'beonepage' ),
                ],
                'section' 	=> 'elementor_custom',
				'condition'	=> [
                    'section_background' => 'image',
                ],
            ]         
        );
        //Background Position
        $beonepage_custom_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_custom_module_bg_img', 'option');
        if(!empty($beonepage_custom_module_bg_img_bp['background-position'])){
          $beonepage_custom_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_custom_module_bg_img', 'option');
          $beonepage_custom_module_bg_img_bp = $beonepage_custom_module_bg_img_bp['background-position'];
        }else{
           $beonepage_custom_module_bg_img_bp = esc_attr("Left Top");
        }
        $this->add_control(
            'section_background_image_bp',
            [
                'label' 	=> __( 'Background Position', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_custom_module_bg_img_bp,
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
                'section' 	=> 'elementor_custom',
				'condition' => [
					'section_background' => 'image',
                ],
            ]        
        );
        //Background Size
        $beonepage_custom_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_custom_module_bg_img', 'option');
        if(!empty($beonepage_custom_module_bg_img_bs['background-size'])){
          $beonepage_custom_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_custom_module_bg_img', 'option');
          $beonepage_custom_module_bg_img_bs = $beonepage_custom_module_bg_img_bs['background-size'];
        }else{
          $beonepage_custom_module_bg_img_bs = esc_attr("Left Top");
        }  
        $this->add_control(
			'section_background_image_bs',
			[
				'label' 	=> __( "Background Size", 'beonepage' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'options' 	=> [
					'cover' => [
						'title' => __( 'Cover', 'beonepage' ),
						'icon' 	=> 'eicon-paint-brush',
					],
					'contain' 	=> [
						'title' => __( 'Contain', 'beonepage' ),
						'icon' 	=> 'eicon-slideshow',
					],
					'auto' 	=> [
						'title' => __( 'Auto', 'beonepage' ),
						'icon' => '    eicon-video-camera',
					]
				],
				'default' 		=> $beonepage_custom_module_bg_img_bs,
				'toggle' 		=> true,
				'condition' 	=> [
					'section_background' => 'image',
				],
				'section' => 'elementor_custom',
			]       
        );
        //Background Attachment
        $beonepage_custom_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_custom_module_bg_img', 'option');
		if(!empty($beonepage_custom_module_bg_img_ath['background-attachment'])){
			$beonepage_custom_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_custom_module_bg_img', 'option');
			$beonepage_custom_module_bg_img_ath = $beonepage_custom_module_bg_img_ath['background-attachment'];
		}else{
			$beonepage_custom_module_bg_img_ath = esc_attr("Scroll");
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
				'default' => $beonepage_custom_module_bg_img_ath,
				'toggle' => true,
				'condition' => [
					'section_background' => 'image',
				],
				'section' => 'elementor_custom',
			]         
        );
        //Background video field
        $beonepage_custom_module_bg_video = beonepage_olddata_fetch_redux('front_page_custom_module_bg_video', 'option');
		if(!empty($beonepage_custom_module_bg_video)){
			$beonepage_custom_module_bg_video = beonepage_olddata_fetch_redux('front_custom_table_module_bg_video', 'option');
			$beonepage_custom_module_bg_video = html_entity_decode($beonepage_custom_module_bg_video);
		}else{
			$beonepage_custom_module_bg_video =  esc_attr("Video Url");
		}
        $this->add_control(
			'section_youtube_url',
			[
				'label' 	=> __( "YouTube URL", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_custom_module_bg_video,
				'condition' => [
                    'section_background' => 'video',
                ],
				'description' => __( 'IMPORTANT NOTE: The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so its better to define both Image and YouTube Video for best results.', 'beonepage' ),
				'section' 	=> 'elementor_custom',
			]        
        );        
        //Parallax seting
        $beonepage_custom_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_custom_module_bg_parallax', 'option');
        if(!empty($beonepage_custom_module_bg_parallax)){
			$beonepage_custom_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_custom_module_bg_parallax', 'option');
			$beonepage_custom_module_bg_parallax = html_entity_decode($beonepage_custom_module_bg_parallax);
        if($beonepage_custom_module_bg_parallax == 1){
            $beonepage_custom_module_bg_parallax_d = esc_attr("yes");
        }else{
            $beonepage_custom_module_bg_parallax_d = esc_attr("no");
        }  
        }else{
          $beonepage_custom_module_bg_parallax_d = esc_attr("yes");
        }
        $this->add_control(
			'section_bg_parallax',
			[
				'label' 		=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Enable', 'beonepage' ),
				'label_off' 	=> __( 'Disable', 'beonepage' ),
				'return_value' 	=> 'yes',
				'default' 		=> $beonepage_custom_module_bg_parallax_d,
				'section' 		=> 'elementor_custom',
			]
        );
		//Content Box
		$beonepage_custom_module_content = beonepage_olddata_fetch_redux('front_page_custom_module_content', 'option');
		if(!empty($beonepage_custom_module_content)){
			$beonepage_custom_module_content = beonepage_olddata_fetch_redux('front_page_custom_module_content', 'option');
			$beonepage_custom_module_content = html_entity_decode($beonepage_custom_module_content);
		}else{
			$beonepage_custom_module_content = esc_attr("");
		}
		$this->add_control(
			'section_module_content',
			[
				'label' 	=> __( "Content Box", 'beonepage' ),
				'type' 		=> Controls_Manager::WYSIWYG,
				'default' 	=> $beonepage_custom_module_content,
				'title' 	=> __( 'Enter Content', 'beonepage' ),
				'section' 	=> 'elementor_custom',
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
		//Layout
		$beonepage_custom_module_layout = beonepage_olddata_fetch_redux('front_page_custom_module_layout', 'option');
		?>
		<section id="custom" class="module custom-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
			<div class="<?php echo $beonepage_custom_module_layout == 'fixed' ? 'container' : 'container-fluid'; ?>">
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

					<div class="content-box col-md-12">
						<?php echo do_shortcode( html_entity_decode( $settings['section_module_content'] ) ); ?>
					</div><!-- .content-box -->
				</div><!-- .row -->
			</div><!-- .container -->
		</section><!-- #custom -->
		<?php
	}
	protected function content_template() {}
	public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new widget_My_Custom_Elementor_Custom );
