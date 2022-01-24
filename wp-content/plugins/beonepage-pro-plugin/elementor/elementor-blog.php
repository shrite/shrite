<?php
namespace Elementor;
use Elementor\Core\Schemes\Color; 
if ( ! defined( 'ABSPATH' ) ) exit;
class Widget_My_Custom_Elementor_blog extends Widget_Base {
	public function get_categories() {
		return [ 'beonepage-widgets' ];
	}
	public function get_name() {
		return 'elementor-blog';
	}
	public function get_title() {
		return __( 'BeOne Blog', 'beonepage' );
	}
	public function get_icon() {
		return 'fa fa-newspaper-o';
	}
	protected function _register_controls() {
		$this->add_control(
			'elementor_blog',
			[
				'label' => __( 'Blog Option', 'beonepage' ),
				'type' 	=> Controls_Manager::SECTION,
			]
		);
		//Title
		$beonepage_blog_module_title = beonepage_olddata_fetch_redux('front_page_blog_module_title', 'option');
		if(!empty($beonepage_blog_module_title)){
			$beonepage_blog_module_title = beonepage_olddata_fetch_redux('front_page_blog_module_title', 'option');
			$beonepage_blog_module_title = html_entity_decode($beonepage_blog_module_title);
		}else{
			$beonepage_blog_module_title = wp_kses("Our Latest Blog",array('span' => array()));
		}
		$this->add_control(
			'section_title',
			[
				'label' 	=> __( "Title", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_blog_module_title,
				'title'		=> __( 'Enter Title', 'beonepage' ),
				'section' 	=> 'elementor_blog',
			]
		);		
        //Sub title
		$beonepage_blog_module_subtitle = beonepage_olddata_fetch_redux('front_page_blog_module_subtitle', 'option');
		if(!empty($beonepage_blog_module_subtitle)){
			$beonepage_blog_module_subtitle = beonepage_olddata_fetch_redux('front_page_blog_module_subtitle', 'option');
			$beonepage_blog_module_subtitle = html_entity_decode($beonepage_blog_module_subtitle);
		}else{
			$beonepage_blog_module_subtitle = esc_attr("We share our best ideas in our blog");
		}
		$this->add_control(
		'section_sub_title',
			[
				'label' 	=> __( "Sub Title", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_blog_module_subtitle,
				'title' 	=> __( 'Enter Sub Title', 'beonepage' ),
				'section' 	=> 'elementor_blog',
			]			
		);
		//Caption Animation
		$beonepage_blog_module_animation = beonepage_olddata_fetch_redux('front_page_blog_module_animation', 'option');
		if(!empty($beonepage_blog_module_animation)){
			$beonepage_blog_module_animation = beonepage_olddata_fetch_redux('front_page_blog_module_animation', 'option');
		}else{
			$beonepage_blog_module_animation = esc_attr("rubberBand");
		}
        $this->add_control(
            'section_caption_animation',
            [
                'label'   => __( 'Caption Animation', 'beonepage' ),
                'type'    => Controls_Manager::SELECT,
                'default' => $beonepage_blog_module_animation,
                'options' => beonepage_theme_animate(),
                'section' => 'elementor_blog',
            ]        
        );
		//Font Color
		$beonepage_blog_module_color = beonepage_olddata_fetch_redux('front_page_blog_module_color', 'option');
		if(!empty($beonepage_blog_module_color)){
			$beonepage_blog_module_color = beonepage_olddata_fetch_redux('front_page_blog_module_color', 'option');
		}else{
			$beonepage_blog_module_color = esc_attr("#181a1c");
		}
		$this->add_control(
			'section_font_color',
			[
				'label' 	=> __( "Font Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_blog_module_color,
				'scheme' 	=> [
					'type' 		=> Color::get_type(),
					'value' 	=> Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .blog-module' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_blog',
			]			
		);
		//Separator Circle Color
		$beonepage_blog_module_sp_color = beonepage_olddata_fetch_redux('front_page_blog_module_sp_color', 'option');
		if(!empty($beonepage_blog_module_sp_color)){
			$beonepage_blog_module_sp_color = beonepage_olddata_fetch_redux('front_page_blog_module_sp_color', 'option');
		}else{
			$beonepage_blog_module_sp_color = esc_attr("#111");
		}
		$this->add_control(
			'section_separator_line_color',
			[
				'label' 	=> __( "Separator Line Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_blog_module_sp_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .blog-module .separator span:after, .blog-module .separator span:before' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_blog',
			]			
		);
		//Separator Circle Color
		$beonepage_blog_module_sp_i_color = beonepage_olddata_fetch_redux('front_page_blog_module_sp_i_color', 'option');
		if(!empty($beonepage_blog_module_sp_i_color)){
			$beonepage_blog_module_sp_i_color = beonepage_olddata_fetch_redux('front_page_blog_module_sp_i_color', 'option');
		}else{
			$beonepage_blog_module_sp_i_color = esc_attr("#111");
		}			
		$this->add_control(
			'section_separator_circle_color',
			[
				'label' 	=> __( "Separator Circle Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_blog_module_sp_i_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .blog-module .separator i' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_blog',
			]			
		);		
        //Background setting                
		$class = '';
		$attribute = '';    
        $beonepage_blog_module_bg = beonepage_olddata_fetch_redux('front_page_blog_module_bg', 'option');
        if(!empty($beonepage_blog_module_bg)){
			$beonepage_blog_module_bg = beonepage_olddata_fetch_redux('front_page_blog_module_bg', 'option');
        }else{
			$beonepage_blog_module_bg = esc_attr("color");
        }       
        $beonepage_blog_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_blog_module_bg_parallax', 'option');
		if(!empty($beonepage_blog_module_bg_parallax)){
			$beonepage_blog_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_blog_module_bg_parallax', 'option');
		}else{
			$beonepage_blog_module_bg_parallax = esc_attr('0');
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
				'default' 	=> $beonepage_blog_module_bg,
				'toggle' 	=> true,
				'section' 	=> 'elementor_blog',
			]         
        );        
		if ( $beonepage_blog_module_bg == 'color' ) {
			$class = ' no-background';
		} else {
			$class = ' img-background';
		}
		if ( $beonepage_blog_module_bg == 'image' && $beonepage_blog_module_bg_parallax == '1' ) {
			$class .= ' parallax';
			$attribute = ' data-stellar-background-ratio="0.5"';
		}
		if ( $beonepage_blog_module_bg == 'video' ) {
			$class .= 'yt-bg-player';
			$attribute .= ' data-yt-video="' . beonepage_olddata_fetch_redux('front_page_blog_module_bg_video', 'option'). '"';
		}   
		//Background Color
		$beonepage_blog_module_bg_color = beonepage_olddata_fetch_redux('front_page_blog_module_bg_color', 'option');
        if(!empty($beonepage_blog_module_bg_color)){
			$beonepage_blog_module_bg_color = beonepage_olddata_fetch_redux('front_page_blog_module_bg_color', 'option');
		}else{
			$beonepage_blog_module_bg_color = esc_attr("#ffcc00");
        }
        $this->add_control(
			'section_background_color',
			[
				'label' 	=> __( "Background Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_blog_module_bg_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .blog-module' => 'Background-color: {{VALUE}}',
				],
				'condition' => [
					'section_background' => 'color',
				],
				'section' 	=> 'elementor_blog',
			]         
        );        
        //Background image 
        $beonepage_blog_module_bg_img = beonepage_olddata_fetch_redux('front_page_blog_module_bg_img', 'option');
        if(!empty($beonepage_blog_module_bg_img['background-image'])){
			$beonepage_blog_module_bg_img = beonepage_olddata_fetch_redux('front_page_blog_module_bg_img', 'option');
			$beonepage_blog_module_bg_img_url = $beonepage_blog_module_bg_img['background-image'];
        }else{
			$beonepage_blog_module_bg_img_url = \Elementor\Utils::get_placeholder_image_src();
        }
        $this->add_control(
			'section_background_image',
			[
				'label' => __( "Bakground Image", 'beonepage' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => esc_url($beonepage_blog_module_bg_img_url),
				],
				'condition' => [
					'section_background' => 'image',
				],
				'section' => 'elementor_blog',
			]        
        );
        // Background Repeat
        $beonepage_blog_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_blog_module_bg_img', 'option');
        if(!empty($beonepage_blog_module_bg_img_rp['background-repeat'])){
          $beonepage_blog_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_blog_module_bg_img', 'option');
          $beonepage_blog_module_bg_img_rp = $beonepage_blog_module_bg_img_rp['background-repeat'];
        }else{
           $beonepage_blog_module_bg_img_rp = esc_attr("No Repeat");
        }
        $this->add_control(
            'section_background_image_rp',
            [
                'label' 	=> __( 'Background Repeat', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_blog_module_bg_img_rp,
                'options' 	=> [
                    'no-repeat' => __( 'No Repeat', 'beonepage' ),
                    'repeat' 	=> __( 'Repeat All', 'beonepage' ),
                    'repeat-x' 	=> __( 'Repeat Horizontally', 'beonepage' ),
                    'repeat-y' 	=> __( 'Repeat Vertically', 'beonepage' ),
                ],
                'section' 	=> 'elementor_blog',
				'condition'	=> [
                    'section_background' => 'image',
                ],
            ]         
        );
        //Background Position
        $beonepage_blog_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_blog_module_bg_img', 'option');
        if(!empty($beonepage_blog_module_bg_img_bp['background-position'])){
          $beonepage_blog_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_blog_module_bg_img', 'option');
          $beonepage_blog_module_bg_img_bp = $beonepage_blog_module_bg_img_bp['background-position'];
        }else{
           $beonepage_blog_module_bg_img_bp = esc_attr("Left Top");
        }
        $this->add_control(
            'section_background_image_bp',
            [
                'label' 	=> __( 'Background Position', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_blog_module_bg_img_bp,
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
                'section' 	=> 'elementor_blog',
				'condition' => [
                    'section_background' => 'image',
                ],
            ]         
        );
        //Background Size
        $beonepage_blog_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_blog_module_bg_img', 'option');
        if(!empty($beonepage_blog_module_bg_img_bs['background-size'])){
          $beonepage_blog_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_blog_module_bg_img', 'option');
          $beonepage_blog_module_bg_img_bs = $beonepage_blog_module_bg_img_bs['background-size'];
        }else{
          $beonepage_blog_module_bg_img_bs = esc_attr("cover");
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
				'default' 		=> $beonepage_blog_module_bg_img_bs,
				'toggle' 		=> true,
				'condition' 	=> [
					'section_background' => 'image',
				],
				'section' => 'elementor_blog',
			]        
        );
        //Background Attachment
        $beonepage_blog_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_blog_module_bg_img', 'option');
        if(!empty($beonepage_blog_module_bg_img_ath['background-attachment'])){
          $beonepage_blog_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_blog_module_bg_img', 'option');
          $beonepage_blog_module_bg_img_ath = $beonepage_blog_module_bg_img_ath['background-attachment'];
        }else{
          $beonepage_blog_module_bg_img_ath = esc_attr("Scroll");
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
				'default' => $beonepage_blog_module_bg_img_ath,
				'toggle' => true,
				'condition' => [
					'section_background' => 'image',
				],
				'section' => 'elementor_blog',
			]         
        );
        //Background video field
        $beonepage_blog_module_bg_video = beonepage_olddata_fetch_redux('front_page_blog_module_bg_video', 'option');
		if(!empty($beonepage_blog_module_bg_video)){
			$beonepage_blog_module_bg_video = beonepage_olddata_fetch_redux('front_blog_table_module_bg_video', 'option');
			$beonepage_blog_module_bg_video = html_entity_decode($beonepage_blog_module_bg_video);
		}else{
			$beonepage_blog_module_bg_video =  esc_attr("Video Url");
		}
        $this->add_control(
			'section_youtube_url',
			[
				'label' 	=> __( "YouTube URL", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_blog_module_bg_video,
				'condition' => [
                    'section_background' => 'video',
                ],
				'description' => __( 'IMPORTANT NOTE: The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so its better to define both Image and YouTube Video for best results.', 'beonepage' ),
				'section' 	=> 'elementor_blog',
			]        
        );        
        //Parallax seting
        $beonepage_blog_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_blog_module_bg_parallax', 'option');
        if(!empty($beonepage_blog_module_bg_parallax)){
			$beonepage_blog_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_blog_module_bg_parallax', 'option');
			$beonepage_blog_module_bg_parallax = html_entity_decode($beonepage_blog_module_bg_parallax);
			if($beonepage_blog_module_bg_parallax == 1){
				$beonepage_blog_module_bg_parallax_d = esc_attr("yes");
			}else{
				$beonepage_blog_module_bg_parallax_d = esc_attr("no");
			}  
        }else{
          $beonepage_blog_module_bg_parallax_d = esc_attr("yes");
        }
        $this->add_control(
			'section_bg_parallax',
			[
				'label' 		=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Enable', 'beonepage' ),
				'label_off' 	=> __( 'Disable', 'beonepage' ),
				'return_value' 	=> 'yes',
				'default' 		=> $beonepage_blog_module_bg_parallax_d,
				'section' 		=> 'elementor_blog',
			]
        );
		//Post Date Font Color
		$beonepage_blog_module_pd_color = beonepage_olddata_fetch_redux('front_page_blog_module_pd_color', 'option');
		if(!empty($beonepage_blog_module_pd_color)){
			$beonepage_blog_module_pd_color = beonepage_olddata_fetch_redux('front_page_blog_module_pd_color', 'option');
		}else{
			$beonepage_blog_module_pd_color = esc_attr("#222");
		}			
		$this->add_control(
			'section_post_date_font_color_pd',
			[
				'label' 	=> __( "Post Date Font Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_blog_module_pd_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .blog-item .entry-publish-date span' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_blog',
			]			
		);
		//Post Date Background Color
		$beonepage_blog_module_pd_bg_color_array = beonepage_olddata_fetch_redux('front_page_blog_module_pd_bg_color', 'option');
		if(!empty($beonepage_blog_module_pd_bg_color_array)){
			$beonepage_blog_module_pd_bg_color_array = beonepage_olddata_fetch_redux('front_page_blog_module_pd_bg_color', 'option');
			$beonepage_blog_module_pd_bg_color =  $beonepage_blog_module_pd_bg_color_array['rgba'];
		}else{
			$beonepage_blog_module_pd_bg_color = esc_attr("#ffffff");
		}			
		$this->add_control(
			'section_post_date_background_color_pd',
			[
				'label' 	=> __( "Post Date Background Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_blog_module_pd_bg_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .blog-item .entry-publish-date' => 'Background-color: {{VALUE}}',
				],
				'section' 	=> 'elementor_blog',
			]
		);
		//Read More Button Text
		$beonepage_blog_module_read_more = beonepage_olddata_fetch_redux('front_page_blog_module_read_more', 'option');
		if(!empty($beonepage_blog_module_read_more)){
			$beonepage_blog_module_read_more = beonepage_olddata_fetch_redux('front_page_blog_module_read_more', 'option');
		}else{
			$beonepage_blog_module_read_more = esc_attr("Read More");
		}
		$this->add_control(
			'section_rm_btn_text',
			[
				'label' 	=> __( "Read More Button Text", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_blog_module_read_more,
				'section' 	=> 'elementor_blog',
			]			
		);
		//Read More Font Color
		$beonepage_blog_module_rm_color = beonepage_olddata_fetch_redux('front_page_blog_module_rm_color', 'option');
		if(!empty($beonepage_blog_module_rm_color)){
			$beonepage_blog_module_rm_color = beonepage_olddata_fetch_redux('front_page_blog_module_rm_color', 'option');
		}else{
			$beonepage_blog_module_rm_color = esc_attr("#181a1c");
		}			
		$this->add_control(
			'section_rm_color',
			[
				'label' 	=> __( "Read More Font Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_blog_module_rm_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .blog-item .read-more' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_blog',
			]			
		);
		//Read More Background Color
		$beonepage_blog_module_rm_bg_color_array = beonepage_olddata_fetch_redux('front_page_blog_module_rm_bg_color', 'option');
		if(!empty($beonepage_blog_module_rm_bg_color_array)){
			$beonepage_blog_module_rm_bg_color = beonepage_olddata_fetch_redux('front_page_blog_module_rm_bg_color', 'option');
			$beonepage_blog_module_rm_bg_color =  $beonepage_blog_module_rm_bg_color_array['rgba'];
		}else{
			$beonepage_blog_module_rm_bg_color = esc_attr("rgba(255,204,0,0.9)");
		}
		$this->add_control(
			'section_rm_bg_color',
			[
				'label' 	=> __( "Read More Background Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_blog_module_rm_bg_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .blog-item .read-more' => 'Background-color: {{VALUE}}',
				],
				'section' 	=> 'elementor_blog',
			]			
		);
		//View More Button Text
		$beonepage_blog_module_view_more = beonepage_olddata_fetch_redux('front_page_blog_module_view_more', 'option');
		if(!empty($beonepage_blog_module_view_more)){
			$beonepage_blog_module_view_more = beonepage_olddata_fetch_redux('front_page_blog_module_view_more', 'option');
		}else{
			$beonepage_blog_module_view_more = esc_attr("View More");
		}
		$this->add_control(
			'section_vw_btn_text',
			[
				'label' 	=> __( "View More Button Text", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_blog_module_view_more,
				'section' 	=> 'elementor_blog',
			]			
		);
		//View More Font Color
		$beonepage_blog_module_vw_color = beonepage_olddata_fetch_redux('front_page_blog_module_vw_color', 'option');
		if(!empty($beonepage_blog_module_vw_color)){
			$beonepage_blog_module_vw_color = beonepage_olddata_fetch_redux('front_page_blog_module_vw_color', 'option');
		}else{
			$beonepage_blog_module_vw_color = esc_attr("#eee");
		}			
		$this->add_control(
			'section_vw_color',
			[
				'label' 	=> __( "View More Font Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_blog_module_vw_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .see-more-wrap .sm-container' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_blog',
			]			
		);
		//View More Icon Color
		$beonepage_blog_module_vw_icon_color = beonepage_olddata_fetch_redux('front_page_blog_module_vw_icon_color', 'option');
		if(!empty($beonepage_blog_module_vw_icon_color)){
			$beonepage_blog_module_vw_icon_color = beonepage_olddata_fetch_redux('front_page_blog_module_vw_icon_color', 'option');
		}else{
			$beonepage_blog_module_vw_icon_color = esc_attr("#eee");
		}			
		$this->add_control(
			'section_vw_icon_color',
			[
				'label' 	=> __( "View More Icon Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_blog_module_vw_icon_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .see-more-wrap .sm-icon' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_blog',
			]			
		);
		//View More Background Color
		$beonepage_blog_module_vw_bg_color = beonepage_olddata_fetch_redux('front_page_blog_module_vw_bg_color', 'option');
		if(!empty($beonepage_blog_module_vw_bg_color)){
			$beonepage_blog_module_vw_bg_color = beonepage_olddata_fetch_redux('front_page_blog_module_vw_bg_color', 'option');
		}else{
			$beonepage_blog_module_vw_bg_color = esc_attr("#222");
		}			
		$this->add_control(
			'section_background_color_vw',
			[
				'label' 	=> __( "View More Background Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_blog_module_vw_bg_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .see-more-wrap' => 'Background-color: {{VALUE}}',
				],
				'section' 	=> 'elementor_blog',
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
		}elseif( $settings['section_background'] == 'color')
		{
			$class = ' no-background';
		} else {
			$class = ' img-background';
		}
		//conitions for css
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
		$beonepage_section_post_date_font_color_pd = '';
		if(isset($settings['section_post_date_font_color_pd']) && $settings['section_post_date_font_color_pd'] !=''){
			$beonepage_section_post_date_font_color_pd = $settings['section_post_date_font_color_pd'];
		}
		$beonepage_section_post_date_background_color_pd = '';
		if(isset($settings['section_post_date_background_color_pd']) && $settings['section_post_date_background_color_pd'] !=''){
			$beonepage_section_post_date_background_color_pd = $settings['section_post_date_background_color_pd'];
		}
		$beonepage_section_rm_color = '';
		if(isset($settings['section_rm_color']) && $settings['section_rm_color'] !=''){
			$beonepage_section_rm_color = $settings['section_rm_color'];
		}
		$beonepage_section_rm_bg_color = '';
		if(isset($settings['section_rm_bg_color']) && $settings['section_rm_bg_color'] !=''){
			$beonepage_section_rm_bg_color = $settings['section_rm_bg_color'];
		}
		$beonepage_section_vw_color = '';
		if(isset($settings['section_vw_color']) && $settings['section_vw_color'] !=''){
			$beonepage_section_vw_color = $settings['section_vw_color'];
		}
		$beonepage_section_vw_icon_color = '';
		if(isset($settings['section_vw_icon_color']) && $settings['section_vw_icon_color'] !=''){
			$beonepage_section_vw_icon_color = $settings['section_vw_icon_color'];
		}
		$beonepage_section_background_color_vw = '';
		if(isset($settings['section_background_color_vw']) && $settings['section_background_color_vw'] !=''){
			$beonepage_section_background_color_vw = $settings['section_background_color_vw'];
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
				.blog-module{
					background-image: url(<?php echo $beonepage_section_background_image_url; ?>);
				}
			<?php }
			if(isset($beonepage_section_background_color) && $beonepage_section_background_color !=''){?>
				.blog-module{
					background-color: <?php echo $beonepage_section_background_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_font_color) && $beonepage_section_font_color !=''){?>
				.blog-module{
					color: <?php echo $beonepage_section_font_color; ?>;
				}
				<?php }
			if(isset($beonepage_section_separator_line_color) && $beonepage_section_separator_line_color !=''){?>	
				.blog-module .separator span{
					color: <?php echo $beonepage_section_separator_line_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_separator_circle_color) && $beonepage_section_separator_circle_color !=''){?>	
				.blog-module .separator i {
					color: <?php echo $beonepage_section_separator_circle_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_module_box) && $beonepage_section_module_box !=''){?>	
				.testimonial-box blockquote {
					background-color: <?php echo $beonepage_section_module_box; ?>;
				}
			<?php } 
			if(isset($beonepage_section_post_date_font_color_pd) && $beonepage_section_post_date_font_color_pd !=''){?>	
				.blog-item .entry-publish-date span {
					color: <?php echo $beonepage_section_post_date_font_color_pd; ?>;
				}
			<?php } 
			if(isset($beonepage_section_post_date_background_color_pd) && $beonepage_section_post_date_background_color_pd !=''){?>	
				.blog-item .entry-publish-date {
					background-color: <?php echo $beonepage_section_post_date_background_color_pd; ?>;
				}
			<?php } 
			if(isset($beonepage_section_rm_color) && $beonepage_section_rm_color !=''){?>	
				.blog-item .read-more  {
					color: <?php echo $beonepage_section_rm_color; ?>;
				}
			<?php } 
			if(isset($beonepage_section_rm_bg_color) && $beonepage_section_rm_bg_color !=''){?>	
				.blog-item .read-more  {
					background-color: <?php echo $beonepage_section_rm_bg_color; ?>;
				}
			<?php } 
			if(isset($beonepage_section_vw_color) && $beonepage_section_vw_color !=''){?>	
				.see-more-wrap .sm-container {
					color: <?php echo $beonepage_section_vw_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_vw_icon_color) && $beonepage_section_vw_icon_color !=''){?>	
				.see-more-wrap .sm-icon {
					color: <?php echo $beonepage_section_vw_icon_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_color_vw) && $beonepage_section_background_color_vw !=''){?>	
				.see-more-wrap {
					background-color: <?php echo $beonepage_section_background_color_vw; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_rp) && $beonepage_section_background_image_rp !=''){?>
				.blog-module{
					background-repeat: <?php echo $beonepage_section_background_image_rp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bp) && $beonepage_section_background_image_bp !=''){?>
				.blog-module{
					background-position: <?php echo $beonepage_section_background_image_bp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bs) && $beonepage_section_background_image_bs !=''){?>
				.blog-module{
					background-size: <?php echo $beonepage_section_background_image_bs; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_ath) && $beonepage_section_background_image_ath !=''){?>
				.blog-module{
					background-attachment: <?php echo $beonepage_section_background_image_ath; ?>;
				}
			<?php } ?>	
		</style>

		<section id="blog" class="module blog-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
			<div class="container-fluid">
				<div class="row row-nopadding">
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

					<div class="blog-wrap col-md-12 clearfix">
						<?php
							$args = array(
								'ignore_sticky_posts' => 1,
								'posts_per_page'      => 3,
								'tax_query' => array(
									array(
										'taxonomy' => 'post_format',
										'field'    => 'slug',
										'terms'    => array( 'post-format-audio', 'post-format-video', 'post-format-gallery', 'post-format-image' )
									)
								),
							);
							$query = new \WP_Query( $args );

							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) : $query->the_post();

									get_template_part( 'template-parts/content', 'blog' );

								endwhile;
						?>

								<a class="blog-item wow fadeIn" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" data-wow-delay=".5s">
									<?php printf( '<img src="%s">', esc_url( get_template_directory_uri() . '/images/blog-placeholder.png' ) ); ?>

									<div class="see-more-wrap">
										<div class="sm-container">
											<div class="sm-icon"><i class="fa fa-external-link"></i></div>
											<div class="sm-text"><?php echo $settings['section_vw_btn_text']; ?></div>
										</div>
									</div><!-- .see-more-wrap -->
								</a><!-- .blog-item -->

						<?php
							} else {
								global $switch_portfolio_post;

								$switch_portfolio_post = 'post';

								get_template_part( 'template-parts/content', 'none' );
							}

							wp_reset_postdata();
						?>
					</div><!-- #blog-wrap -->
				</div><!-- .row -->
			</div><!-- .container-fluid -->
		</section><!-- #blog -->
		<?php
		if ( Plugin::$instance->editor->is_edit_mode() ) :  
			?>
			<script> 
				(function($) {			
					var $blogWrap = $('.blog-wrap');
					APP.blog = {
						init: function() {
							APP.blog.containerHeight();
						},

						containerHeight: function() {
							setTimeout(function() {
								if ($blogWrap.find('.blog-item').length > 0) {
									var $blogItem = $blogWrap.find('.blog-item .entry-media');

									var containerHeight = $blogItem.eq(0).width() * 3 / 4;

									$blogItem.css('height', containerHeight + 'px');

									$('.see-more-wrap').css('height', containerHeight + 'px');
								}
							}, 500);
						}
					}
					 APP.blog.init();
				})(jQuery);
			</script>  
			<?php
		endif;
	}
	protected function content_template() {}
	public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_My_Custom_Elementor_blog );