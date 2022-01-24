<?php
namespace Elementor;
use Elementor\Core\Schemes\Color;
if ( ! defined( 'ABSPATH' ) ) exit;
class Widget_My_Custom_Elementor_Subscribe extends Widget_Base {
	
	public function get_categories() {
		return [ 'beonepage-widgets' ];
	}
	public function get_name() {
		return 'elementor-subscribe';
   }
	public function get_title() {
		return __( 'BeOne Subscribe', 'beonepage' );
   }
	public function get_icon() {
		return 'fa fa-envelope';
   }
	protected function _register_controls() {
		$this->add_control(
			'elementor_subscribe',
			[
				'label' => __( 'MailChimp Subscribe Option', 'beonepage' ),
				'type' 	=> Controls_Manager::SECTION,
			]
		);
		// Heading
		$beonepage_subscribe_title = beonepage_olddata_fetch_redux('front_page_subscribe_title', 'option');
		if(!empty($beonepage_subscribe_title)){
			$beonepage_subscribe_title = beonepage_olddata_fetch_redux('front_page_subscribe_title', 'option');
			$beonepage_subscribe_title = html_entity_decode($beonepage_subscribe_title);
		}else{
			$beonepage_subscribe_title = wp_kses("<span>Subscribe</span> to Our <span>Newsletter</span>",array('span' => array()));
		}
		$this->add_control(
			'section_title',
			[
				'label' 	=> __( "Heading", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_subscribe_title,
				'title'		=> __( 'Enter Heading', 'beonepage' ),
				'section' 	=> 'elementor_subscribe',
			]
		);		
		//Heading Animation
		$beonepage_subscribe_title_animation = beonepage_olddata_fetch_redux('front_page_subscribe_title_animation', 'option');
		if(!empty($beonepage_subscribe_title_animation)){
			$beonepage_subscribe_title_animation = beonepage_olddata_fetch_redux('front_page_subscribe_title_animation', 'option');
		}else{
			$beonepage_subscribe_title_animation = esc_attr("pulse");
		}
        $this->add_control(
            'section_subscribe_title_animation',
            [
                'label'   => __( 'Heading Animation', 'beonepage' ),
                'type'    => Controls_Manager::SELECT,
                'default' => $beonepage_subscribe_title_animation,
                'options' => beonepage_theme_animate(),
                'section' => 'elementor_subscribe',
            ]        
        );
		//Content
		$beonepage_subscribe_content = beonepage_olddata_fetch_redux('front_page_subscribe_content', 'option');
		if(!empty($beonepage_subscribe_content)){
			$beonepage_subscribe_content = beonepage_olddata_fetch_redux('front_page_subscribe_content', 'option');
		}else{
			$beonepage_subscribe_content = esc_attr("We make sure you do not miss any news.	");
		}
		$this->add_control(
			'section_subscribe_content',
			[
				'label' 	=> __( 'Content', 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_subscribe_content,
				'title'		=> __( 'Enter Content', 'beonepage' ),
				'section' 	=> 'elementor_subscribe',
			]
		);
		//Content Animation
		$beonepage_subscribe_content_animation = beonepage_olddata_fetch_redux('front_page_subscribe_content_animation', 'option');
		if(!empty($beonepage_subscribe_content_animation)){
			$beonepage_subscribe_content_animation = beonepage_olddata_fetch_redux('front_page_subscribe_content_animation', 'option');
		}else{
			$beonepage_subscribe_content_animation = esc_attr("FadeIn");
		}
        $this->add_control(
            'section_subscribe_content_animation',
            [
                'label'   => __( 'Content Animation', 'beonepage' ),
                'type'    => Controls_Manager::SELECT,
                'default' => $beonepage_subscribe_content_animation,
                'options' => beonepage_theme_animate(),
                'section' => 'elementor_subscribe',
            ]       
        );
		// MailChimp API Key
		$beonepage_subscribe_mailchimp_api = beonepage_olddata_fetch_redux('front_page_subscribe_mailchimp_api', 'option');
		if(!empty($beonepage_subscribe_mailchimp_api)){
			$beonepage_subscribe_mailchimp_api = beonepage_olddata_fetch_redux('front_page_subscribe_mailchimp_api', 'option');
		}else{
			$beonepage_subscribe_mailchimp_api = esc_attr("fbd01dd759e3f57778c967749fee5493-us11");
		}
		$this->add_control(
			'section_subscribe_mailchimp_api',
			[
				'label' 	=> __( 'MailChimp API Key', 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_subscribe_mailchimp_api,
				'title'		=> __( 'Enter subscribe Username', 'beonepage' ),
				'section' 	=> 'elementor_subscribe',
			]
		);
		// MailChimp List ID
		$beonepage_subscribe_mailchimp_list = beonepage_olddata_fetch_redux('front_page_subscribe_mailchimp_list', 'option');
		if(!empty($beonepage_subscribe_mailchimp_list)){
			$beonepage_subscribe_mailchimp_list = beonepage_olddata_fetch_redux('front_page_subscribe_mailchimp_list', 'option');
		}else{
			$beonepage_subscribe_mailchimp_list = esc_attr("6e485c6a12");
		}
		$beonepage_subscribe_mailchimp_list_note = wp_kses('<a href="http://docs.betheme.me/article/33-getting-mailchimp-api-key-and-list-id" target="_blank">How to get MailChimp API Key and List ID?</a>',array('a' => array('href' => array(),'target' => array())));
		$this->add_control(
			'section_subscribe_mailchimp_list',
			[
				'label' 	=> __( 'MailChimp List ID', 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_subscribe_mailchimp_list,
				'title'		=> __( 'Enter subscribe Username', 'beonepage' ),
				'description' => $beonepage_subscribe_mailchimp_list_note,
				'section' 	=> 'elementor_subscribe',
			]
		);
		// Button Text
		$beonepage_subscribe_btn_text = beonepage_olddata_fetch_redux('front_page_subscribe_btn_text', 'option');
		if(!empty($beonepage_subscribe_btn_text)){
			$beonepage_subscribe_btn_text = beonepage_olddata_fetch_redux('front_page_subscribe_btn_text', 'option');
		}else{
			$beonepage_subscribe_btn_text = esc_attr("Notify Me");
		}
		$this->add_control(
			'section_subscribe_btn_text',
			[
				'label' 	=> __( 'Button Text', 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> $beonepage_subscribe_btn_text,
				'title'		=> __( 'Enter Button Text', 'beonepage' ),
				'section' 	=> 'elementor_subscribe',
			]
		);
		//Button Animation
		$beonepage_subscribe_btn_animation = beonepage_olddata_fetch_redux('front_page_subscribe_btn_animation', 'option');
		if(!empty($beonepage_subscribe_btn_animation)){
			$beonepage_subscribe_btn_animation = beonepage_olddata_fetch_redux('front_page_subscribe_btn_animation', 'option');
		}else{
			$beonepage_subscribe_btn_animation = esc_attr("tada");
		}
        $this->add_control(
            'section_subscribe_btn_animation',
            [
                'label'   => __( 'Button Animation', 'beonepage' ),
                'type'    => Controls_Manager::SELECT,
                'default' => $beonepage_subscribe_btn_animation,
                'options' => beonepage_theme_animate(),
                'section' => 'elementor_subscribe',
            ]       
        );
		//Button Color
		$beonepage_subscribe_btn_color = beonepage_olddata_fetch_redux('front_page_subscribe_btn_color', 'option');
		if(!empty($beonepage_subscribe_btn_color)){
		  $beonepage_subscribe_btn_color = beonepage_olddata_fetch_redux('front_page_subscribe_btn_color', 'option');		  
		}else{
		  $beonepage_subscribe_btn_color = esc_attr("#ffcc00");
		}
		$this->add_control(
			'section_subscribe_btn_color',
			[
				'label' 	=> __( "Button Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_subscribe_btn_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}}  .input-group-btn' => 'Background-color: {{VALUE}}',
				],
				'section' 	=> 'elementor_subscribe',
			]		 
		);
		//Font Color
		$beonepage_subscribe_color = beonepage_olddata_fetch_redux('front_page_subscribe_color', 'option');
		if(!empty($beonepage_subscribe_color)){
		  $beonepage_subscribe_color = beonepage_olddata_fetch_redux('front_page_subscribe_color', 'option');		  
		}else{
		  $beonepage_subscribe_color = esc_attr("#eceff3");
		}
		$this->add_control(
			'section_font_color',
			[
				'label' 	=> __( "Font Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_subscribe_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .subscribe-module' => 'color: {{VALUE}}',
				],
				'section' 	=> 'elementor_subscribe',
			]		 
		);
        //Background setting                
		$class = '';
		$attribute = '';    
        $beonepage_subscribe_module_bg = beonepage_olddata_fetch_redux('front_page_subscribe_module_bg', 'option');
        if(!empty($beonepage_subscribe_module_bg)){
			$beonepage_subscribe_module_bg = beonepage_olddata_fetch_redux('front_page_subscribe_module_bg', 'option');
        }else{
			$beonepage_subscribe_module_bg = esc_attr("color");
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
				'default' 	=> $beonepage_subscribe_module_bg,
				'toggle' 	=> true,
				'section' 	=> 'elementor_subscribe',
			]         
        );
		//Background Color
		$beonepage_subscribe_module_bg_color = beonepage_olddata_fetch_redux('front_page_subscribe_module_bg_color', 'option');
        if(!empty($beonepage_subscribe_module_bg_color)){
			$beonepage_subscribe_module_bg_color = beonepage_olddata_fetch_redux('front_page_subscribe_module_bg_color', 'option');
		}else{
			$beonepage_subscribe_module_bg_color = esc_attr("#ffcc00");
        }
        $this->add_control(
			'section_background_color',
			[
				'label' 	=> __( "Background Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_subscribe_module_bg_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					 '{{WRAPPER}} .subscribe-module' => 'Background-color: {{VALUE}}',
				],
				'condition' => [
					'section_background' => 'color',
				],
				'section' 	=> 'elementor_subscribe',
			]         
        );        
        //Background image 
        $beonepage_subscribe_module_bg_img = beonepage_olddata_fetch_redux('front_page_subscribe_module_bg_img', 'option');
        if(!empty($beonepage_subscribe_module_bg_img['background-image'])){
			$beonepage_subscribe_module_bg_img = beonepage_olddata_fetch_redux('front_page_subscribe_module_bg_img', 'option');
			$beonepage_subscribe_module_bg_img_url = $beonepage_subscribe_module_bg_img['background-image'];
        }else{
			$beonepage_subscribe_module_bg_img_url = \Elementor\Utils::get_placeholder_image_src();
        }
        $this->add_control(
			'section_background_image',
			[
				'label' 	=> __( "Bakground Image", 'beonepage' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => esc_url($beonepage_subscribe_module_bg_img_url),
				],
				'condition' => [
					'section_background' => 'image',
				],
				'section'	=> 'elementor_subscribe',
			]       
        );
        // Background Repeat
        $beonepage_subscribe_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_subscribe_module_bg_img', 'option');
        if(!empty($beonepage_subscribe_module_bg_img_rp['background-repeat'])){
          $beonepage_subscribe_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_subscribe_module_bg_img', 'option');
          $beonepage_subscribe_module_bg_img_rp = $beonepage_subscribe_module_bg_img_rp['background-repeat'];
        }else{
           $beonepage_subscribe_module_bg_img_rp = esc_attr("No Repeat");
        }
         $this->add_control(
            'section_background_image_rp',
            [
                'label' 	=> __( 'Background Repeat', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_subscribe_module_bg_img_rp,
                'options' 	=> [
                    'no-repeat' => __( 'No Repeat', 'beonepage' ),
                    'repeat' 	=> __( 'Repeat All', 'beonepage' ),
                    'repeat-x' 	=> __( 'Repeat Horizontally', 'beonepage' ),
                    'repeat-y' 	=> __( 'Repeat Vertically', 'beonepage' ),
                ],
                'section' 	=> 'elementor_subscribe',
				'condition'	=> [
                    'section_background' => 'image',
                ],
            ]         
        );
        //Background Position
        $beonepage_subscribe_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_subscribe_module_bg_img', 'option');
        if(!empty($beonepage_subscribe_module_bg_img_bp['background-position'])){
          $beonepage_subscribe_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_subscribe_module_bg_img', 'option');
          $beonepage_subscribe_module_bg_img_bp = $beonepage_subscribe_module_bg_img_bp['background-position'];
        }else{
           $beonepage_subscribe_module_bg_img_bp = esc_attr("Left Top");
        }
        $this->add_control(
            'section_background_image_bp',
            [
                'label' 	=> __( 'Background Position', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_subscribe_module_bg_img_bp,
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
                'section' 	=> 'elementor_subscribe',
				'condition' => [
                    'section_background' => 'image',
                ],
            ]         
        );
        //Background Size
        $beonepage_subscribe_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_subscribe_module_bg_img', 'option');
        if(!empty($beonepage_subscribe_module_bg_img_bs['background-size'])){
          $beonepage_subscribe_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_subscribe_module_bg_img', 'option');
          $beonepage_subscribe_module_bg_img_bs = $beonepage_subscribe_module_bg_img_bs['background-size'];
        }else{
          $beonepage_subscribe_module_bg_img_bs = esc_attr("cover");
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
				'default' 		=> $beonepage_subscribe_module_bg_img_bs,
				'toggle' 		=> true,
				'condition' 	=> [
					'section_background' => 'image',
				],
				'section' => 'elementor_subscribe',
			]         
        );
        //Background Attachment
        $beonepage_subscribe_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_subscribe_module_bg_img', 'option');
        if(!empty($beonepage_subscribe_module_bg_img_ath['background-attachment'])){
          $beonepage_subscribe_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_subscribe_module_bg_img', 'option');
          $beonepage_subscribe_module_bg_img_ath = $beonepage_subscribe_module_bg_img_ath['background-attachment'];
        }else{
          $beonepage_subscribe_module_bg_img_ath = esc_attr("Scroll");
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
				'default' 	=> $beonepage_subscribe_module_bg_img_ath,
				'toggle' 	=> true,
				'condition' => [
					'section_background' => 'image',
				],
				'section' 	=> 'elementor_subscribe',
			]         
        );
        //Parallax setting
        $beonepage_subscribe_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_subscribe_module_bg_parallax', 'option');
        if(!empty($beonepage_subscribe_module_bg_parallax)){
			$beonepage_subscribe_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_subscribe_module_bg_parallax', 'option');
			$beonepage_subscribe_module_bg_parallax = html_entity_decode($beonepage_subscribe_module_bg_parallax);
        if($beonepage_subscribe_module_bg_parallax == 1){
            $beonepage_subscribe_module_bg_parallax_d = esc_attr("yes");
        }else{
            $beonepage_subscribe_module_bg_parallax_d = esc_attr("no");
        }  
        }else{
          $beonepage_subscribe_module_bg_parallax_d = esc_attr("yes");
        }
        $this->add_control(
			'section_bg_parallax',
			[
				'label' 		=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Enable', 'beonepage' ),
				'label_off' 	=> __( 'Disable', 'beonepage' ),
				'return_value' 	=> 'yes',
				'default' 		=> $beonepage_subscribe_module_bg_parallax_d,
				'section' 		=> 'elementor_subscribe',
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
		//Post meta
		update_post_meta( get_the_ID(), 'front_page_subscribe_mailchimp_api_newfront_page_subscribe_mailchimp_api_newfront_page_subscribe_mailchimp_api_new', $settings['section_subscribe_mailchimp_api'] );
		update_post_meta( get_the_ID(), 'front_page_subscribe_mailchimp_list_new', $settings['section_subscribe_mailchimp_list'] );
		
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
		$beonepage_section_subscribe_btn_color = '';
		if(isset($settings['section_subscribe_btn_color']) && $settings['section_subscribe_btn_color'] !=''){
			$beonepage_section_subscribe_btn_color = $settings['section_subscribe_btn_color'];
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
				.subscribe-module{
				background-image: url(<?php echo $beonepage_section_background_image_url; ?>);
				}
			<?php }
			if(isset($beonepage_section_background_color) && $beonepage_section_background_color !=''){?>
				.subscribe-module{
					background-color: <?php echo $beonepage_section_background_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_font_color) && $beonepage_section_font_color !=''){?>
				.subscribe-module {
					color: <?php echo $beonepage_section_font_color; ?>;
				}
			<?php } 
			if(isset($beonepage_section_subscribe_btn_color) && $beonepage_section_subscribe_btn_color !=''){?>
				.subscribe-module .input-group-btn{
					background-color: <?php echo $beonepage_section_subscribe_btn_color; ?>;
				}
			<?php } 
			if(isset($beonepage_section_background_image_rp) && $beonepage_section_background_image_rp !=''){?>
				.subscribe-module{
					background-repeat: <?php echo $beonepage_section_background_image_rp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bp) && $beonepage_section_background_image_bp !=''){?>
				.subscribe-module{
					background-position: <?php echo $beonepage_section_background_image_bp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bs) && $beonepage_section_background_image_bs !=''){?>
				.subscribe-module{
					background-size: <?php echo $beonepage_section_background_image_bs; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_ath) && $beonepage_section_background_image_ath !=''){?>
				.subscribe-module {
					background-attachment: <?php echo $beonepage_section_background_image_ath; ?>;
				}
			<?php } ?>
		</style>

		<section id="subscribe-module" class="module subscribe-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
			<div class="container">
				<div class="row">
					<div class="col-md-7">
						<?php
							if ( $settings['section_title'] != '' ) {
								$animation = $settings['section_subscribe_title_animation'] != 'none' ? ' class="wow ' . $settings['section_subscribe_title_animation'] . '" data-wow-delay=".3s"' : '';

								echo '<h2' . $animation . '>' . strip_tags( html_entity_decode( $settings['section_title'] ), '<span>' ) . '</h2>';
							}
						?>

						<?php
							if ( $settings['section_subscribe_content'] != '' ) {
								$animation = $settings['section_subscribe_content_animation'] != 'none' ? ' class="wow ' . $settings['section_subscribe_content_animation'] . '" data-wow-delay=".3s"' : '';

								echo '<p' . $animation . '>' . strip_tags( html_entity_decode( $settings['section_subscribe_content'] ), '<span>' ) . '</p>';
							}
						?>
					</div><!-- .col-md-7 -->

					<?php if ($settings['section_subscribe_btn_text'] != '' ) : ?>
						<?php $animation = $settings['section_subscribe_btn_animation'] != 'none' ? ' wow ' . $settings['section_subscribe_btn_animation'] . '" data-wow-delay=".3s' : ''; ?>

						<div class="col-md-5<?php echo $animation; ?>">
							<?php
								$required = esc_attr__( 'Please fill out this field.', 'beonepage' );
								$email = esc_attr__( 'Please enter a valid email address.', 'beonepage' );
							?>

							<form id="subscribe-form" class="subscribe-form input-group">
								<input type="email" id="subscribe-email" name="email" placeholder="<?php esc_html_e( 'Enter your email address...', 'beonepage' ); ?>" class="required email form-control" data-msg-required="<?php echo $required; ?>" data-msg-email="<?php echo $email; ?>" />

								<span class="input-group-btn">
									<button class="btn subscribe-btn" type="submit" id="subscribe-form-submit" name="submit" value="submit"><span><?php echo $settings['section_subscribe_btn_text']; ?></span></button>
								</span>

								<div id="subscribe-form-result"></div>

								<input type="hidden" name="page_id" value="<?php echo esc_attr(get_the_ID()); ?>">
								<input type="hidden" name="action" value="subscribe_form">

								<?php wp_nonce_field( 'ajax_subscribe_form', 'ajax_subscribe_form_nonce' ); ?>
							</form>
						</div><!-- .col-md-5-->
					<?php endif; ?>
				</div><!-- .row -->
			</div><!-- .container -->
		</section><!-- #subscribe -->
		<?php
		if ( Plugin::$instance->editor->is_edit_mode() ) :  
			?>
			<script> 
				(function($) {			
					var $subscribeForm = $('#subscribe-form');
					APP.widget = {
						init: function() {
							APP.widget.subscribe();
						},
						subscribe: function() {
							$subscribeForm.validate({
								submitHandler: function(form) {
									$.ajax({
										type: 'POST',
										url: app_vars.ajax_url,
										dataType: 'JSON',
										data: $subscribeForm.serialize(),
										success: function(data) {
											if (data.error) {
												$msResult.html('<i class="fa fa-times-circle-o"></i>' + data.error);
												console.log(data.error);
											} else {
												$msResult.html('<i class="fa fa-check-circle-o"></i>' + data.success);
											}

											$msResult.show('slow').delay(3000).hide('slow');
										},
										error: function(data, errorThrown) {
											console.log(errorThrown);
										}
									});

									return false;
								}
							});

							$('#subscribe-form-submit').on('click', function() {
								setTimeout(function() {
									$subscribeForm.find('.error').each(function() {
										var text = $(this).text();

										$(this).closest('form').find('input').blur();

										if (text != '') {
											$element = $(this).closest('form').find('input');

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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_My_Custom_Elementor_Subscribe );
