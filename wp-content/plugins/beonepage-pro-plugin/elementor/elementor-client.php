<?php
namespace Elementor;
use Elementor\Core\Schemes\Color;
if ( ! defined( 'ABSPATH' ) ) exit;
class Widget_My_Custom_Elementor_client extends Widget_Base {
	public function get_categories() {
		return [ 'beonepage-widgets' ];
	}
	public function get_name() {
		return 'elementor-client';
	}
	public function get_title() {
		return __( 'BeOne Client', 'beonepage' );
	}
	public function get_icon() {
		return 'fa fa-user';
	}
	protected function _register_controls() {
		$this->add_control(
			'elementor_client',
			[
				'label' => __( 'Client Option', 'beonepage' ),
				'type' 	=> Controls_Manager::SECTION,
			]
		);
        //Background setting                
		$class = '';
		$attribute = '';    
        $beonepage_client_module_bg = beonepage_olddata_fetch_redux('front_page_client_module_bg', 'option');
        if(!empty($beonepage_client_module_bg)){
			$beonepage_client_module_bg = beonepage_olddata_fetch_redux('front_page_client_module_bg', 'option');
        }else{
			$beonepage_client_module_bg = esc_attr("color");
        }       
        $beonepage_client_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_client_module_bg_parallax', 'option');
		if(!empty($beonepage_client_module_bg_parallax)){
			$beonepage_client_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_client_module_bg_parallax', 'option');
		}else{
			$beonepage_client_module_bg_parallax = esc_attr('0');
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
				'default' 	=> $beonepage_client_module_bg,
				'toggle' 	=> true,
				'section' 	=> 'elementor_client',
			]        
        );       
		if ( $beonepage_client_module_bg == 'color' ) {
			$class = ' no-background';
		} else {
			$class = ' img-background';
		}

		if ( $beonepage_client_module_bg == 'image' && $beonepage_client_module_bg_parallax == '1' ) {
			$class .= ' parallax';
			$attribute = ' data-stellar-background-ratio="0.5"';
		}
	  
		$beonepage_client_module_bg_color = beonepage_olddata_fetch_redux('front_page_client_module_bg_color', 'option');
        if(!empty($beonepage_client_module_bg_color)){
          $beonepage_client_module_bg_color = beonepage_olddata_fetch_redux('front_page_client_module_bg_color', 'option');
		}else{
          $beonepage_client_module_bg_color = esc_attr("#181a1c");
        }
        $this->add_control(
			'section_background_color',
			[
				'label' 	=> __( "Background Color", 'beonepage' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> $beonepage_client_module_bg_color,
				'scheme' 	=> [
					'type' 	=> Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .client-module' => 'Background-color: {{VALUE}}',
				],
				'condition' => [
					'section_background' => 'color',
				],
				'section' 	=> 'elementor_client',
			]         
        );        
        //Background image 
        $beonepage_client_module_bg_img = beonepage_olddata_fetch_redux('front_page_client_module_bg_img', 'option');
        if(!empty($beonepage_client_module_bg_img['background-image'])){
			$beonepage_client_module_bg_img = beonepage_olddata_fetch_redux('front_page_client_module_bg_img', 'option');
			$beonepage_client_module_bg_img_url = $beonepage_client_module_bg_img['background-image'];
        }else{
			$beonepage_client_module_bg_img_url = \Elementor\Utils::get_placeholder_image_src();
        }
        $this->add_control(
			'section_background_image',
			[
				'label' 	=> __( "Bakground Image", 'beonepage' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => esc_url($beonepage_client_module_bg_img_url),
				],
				'condition' => [
					'section_background' => 'image',
				],
				'section' 	=> 'elementor_client',
			]
        );
        // Background Repeat
        $beonepage_client_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_client_module_bg_img', 'option');
        if(!empty($beonepage_client_module_bg_img_rp['background-repeat'])){
          $beonepage_client_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_client_module_bg_img', 'option');
          $beonepage_client_module_bg_img_rp = $beonepage_client_module_bg_img_rp['background-repeat'];
        }else{
           $beonepage_client_module_bg_img_rp = esc_attr("No Repeat");
        }
        $this->add_control(
            'section_background_image_rp',
            [
                'label' 	=> __( 'Background Repeat', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_client_module_bg_img_rp,
                'options' 	=> [
                    'no-repeat' => __( 'No Repeat', 'beonepage' ),
                    'repeat' 	=> __( 'Repeat All', 'beonepage' ),
                    'repeat-x' 	=> __( 'Repeat Horizontally', 'beonepage' ),
                    'repeat-y' 	=> __( 'Repeat Vertically', 'beonepage' ),
                ],
                'section' 	=> 'elementor_client',
				'condition'	=> [
                    'section_background' => 'image',
                ],
            ]         
        );
        //Background Position
        $beonepage_client_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_client_module_bg_img', 'option');
        if(!empty($beonepage_client_module_bg_img_bp['background-position'])){
          $beonepage_client_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_client_module_bg_img', 'option');
          $beonepage_client_module_bg_img_bp = $beonepage_client_module_bg_img_bp['background-position'];
        }else{
           $beonepage_client_module_bg_img_bp = esc_attr("Left Top");
        }
         $this->add_control(
            'section_background_image_bp',
            [
                'label' 	=> __( 'Background Position', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_client_module_bg_img_bp,
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
                'section' 	=> 'elementor_client',
				'condition' => [
                    'section_background' => 'image',
                ],
            ]
        );
        //Background Size
        $beonepage_client_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_client_module_bg_img', 'option');
        if(!empty($beonepage_client_module_bg_img_bs['background-size'])){
          $beonepage_client_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_client_module_bg_img', 'option');
          $beonepage_client_module_bg_img_bs = $beonepage_client_module_bg_img_bs['background-size'];
        }else{
          $beonepage_client_module_bg_img_bs = esc_attr("auto");
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
				'default' 		=> $beonepage_client_module_bg_img_bs,
				'toggle' 		=> true,
				'condition' 	=> [
					'section_background' => 'image',
				],
				'section' => 'elementor_client',
			]
		);
        //Background Attachment
        $beonepage_client_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_client_module_bg_img', 'option');
        if(!empty($beonepage_client_module_bg_img_ath['background-attachment'])){
          $beonepage_client_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_client_module_bg_img', 'option');
          $beonepage_client_module_bg_img_ath = $beonepage_client_module_bg_img_ath['background-attachment'];
        }else{
          $beonepage_client_module_bg_img_ath = esc_attr("Scroll");
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
				'default' 	=> $beonepage_client_module_bg_img_ath,
				'toggle' 	=> true,
				'condition' => [
					'section_background' => 'image',
				],
				'section' 	=> 'elementor_client',
			]         
        );
        //Parallax seting
        $beonepage_client_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_client_module_bg_parallax', 'option');
        if(!empty($beonepage_client_module_bg_parallax)){
			$beonepage_client_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_client_module_bg_parallax', 'option');
			$beonepage_client_module_bg_parallax = html_entity_decode($beonepage_client_module_bg_parallax);
        if($beonepage_client_module_bg_parallax == 1){
            $beonepage_client_module_bg_parallax_d = esc_attr("yes");
        }else{
            $beonepage_client_module_bg_parallax_d = esc_attr("no");
        }  
        }else{
          $beonepage_client_module_bg_parallax_d = esc_attr("no");
        }
        $this->add_control(
			'section_bg_parallax',
			[
				'label' 		=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Enable', 'beonepage' ),
				'label_off' 	=> __( 'Disable', 'beonepage' ),
				'return_value' 	=> 'yes',
				'default' 		=> $beonepage_client_module_bg_parallax_d,
				'section' 		=> 'elementor_client',
			]
        );
		//Client Metabox data
		$result = array();
		$_beonepage_option_client = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_client', true );
		if(!empty($_beonepage_option_client)){
			$_beonepage_option_client = get_post_meta( get_option( 'page_on_front' ), '_beonepage_option_client', true );
			
			foreach ( $_beonepage_option_client as $clients ) :
			
				$beonepage_img_url = '';
				if(isset($clients['img_url']) && $clients['img_url'] != '' ){
					$beonepage_img_url = $clients['img_url'];
				}
				$beonepage_name = '';
				if(isset($clients['name']) && $clients['name'] != '' ){
					$beonepage_name = $clients['name'];
				}
				$beonepage_url = '';
				if(isset($clients['url']) && $clients['url'] != '' ){
					$beonepage_url = $clients['url'];
				}	
				$result[] = array('section_clients_logo_image' => array('url' => $beonepage_img_url),
					'section_clients_name' => $beonepage_name, 		
					'section_client_url' => $beonepage_url,
				);	
			endforeach;
			
		}else{
			$result = array();
		}
		
		$section_clients_repeater = new \Elementor\Repeater();
		$section_clients_repeater->add_control(
			'section_clients_logo_image',
			[
				'label' 	=> __( 'Client Logo', 'beonepage' ),
				'type' 		=> Controls_Manager::MEDIA,
			]
		);
		$section_clients_repeater->add_control(
			'section_clients_name',
			[
				'label' 	=> __( "Client Name", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
			]
		);
		$section_clients_repeater->add_control(
			'section_client_url',
			[
				'label' 	=> __( "Client URL", 'beonepage' ),
				'type' 		=> Controls_Manager::TEXT,
				'placeholder' => __( 'https://your-link.com', 'beonepage' ),
			]
		); 
		$this->add_control(
		'section_clients',
			[
				'label' 	=> __('Client data', 'beonepage' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=>  $section_clients_repeater->get_controls(),
				'default' 		=> $result,								
				'section'	 	=> 'elementor_client',
			]
		);	
	}// End function
	protected function render( $instance = [] ) {
		$settings = $this->get_settings();
		
		$class = '';
		$attribute = '';    
		$beonepage_client_module_bg = beonepage_olddata_fetch_redux('front_page_client_module_bg', 'option');
		if(!empty($beonepage_client_module_bg)){
			$beonepage_client_module_bg = beonepage_olddata_fetch_redux('front_page_client_module_bg', 'option');
		}else{
			$beonepage_client_module_bg = esc_attr("color");
		}       
		$beonepage_client_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_client_module_bg_parallax', 'option');
		if(!empty($beonepage_client_module_bg_parallax)){
			$beonepage_client_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_client_module_bg_parallax', 'option');
		}else{
			$beonepage_client_module_bg_parallax = esc_attr('0');
		}   
		 if ( $settings['section_background'] == 'color' ) {
			$class = ' no-background';
		} else {
			$class = ' img-background';
		}
		if ( $settings['section_background'] == 'image' && $settings['section_bg_parallax'] == 'yes' ) {
			$class .= ' parallax';
			$attribute = ' data-stellar-background-ratio="0.5"';
		}elseif( $settings['section_background'] == 'color')
		{
			$class = ' no-background';
		} else {
			$class = ' img-background';
		}
		//Conditions for css
		$beonepage_section_background_image_url = '';
		if(isset($settings['section_background_image']['url'])&& $settings['section_background_image']['url'] !=''){
			$beonepage_section_background_image_url = $settings['section_background_image']['url'];
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
		?>
		<style>
			<?php if(isset($beonepage_section_background_image_url) && $beonepage_section_background_image_url !=''){?>
				.client-module{
					background-image: url(<?php echo $beonepage_section_background_image_url; ?>);
				}
			<?php }
			if(isset($beonepage_section_background_color) && $beonepage_section_background_color !=''){?>
				.client-module{
					background-color: <?php echo $beonepage_section_background_color; ?>;
				}
			<?php } 
			if(isset($beonepage_section_background_image_rp) && $beonepage_section_background_image_rp !=''){?>
				.client-module{
					background-repeat: <?php echo $beonepage_section_background_image_rp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bp) && $beonepage_section_background_image_bp !=''){?>
				.client-module{
					background-position: <?php echo $beonepage_section_background_image_bp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bs) && $beonepage_section_background_image_bs !=''){?>
				.client-module{
					background-size: <?php echo $beonepage_section_background_image_bs; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_ath) && $beonepage_section_background_image_ath !=''){?>
				.client-module{
					background-attachment: <?php echo $beonepage_section_background_image_ath; ?>;
				}
			<?php } ?>
		</style>	
		<section id="client" class="sm-section module client-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
			<div class="container">
				<div class="row">
					<div class="client-container col-md-12 owl-carousel">
						<?php $clients = $settings['section_clients']; ?>

						<?php if ( ! empty( $clients ) ) : ?>
							<?php foreach ( $clients as $client ) : ?>
								<div class="client-item">
									<?php if ( isset( $client['section_client_url'] ) && $client['section_client_url'] != '' ) : ?>
										<a href="<?php echo $client['section_client_url']; ?>" target="_blank" rel="nofollow"><img src="<?php echo isset( $client['section_clients_logo_image']['url'] ) ? $client['section_clients_logo_image']['url'] : ''; ?>" alt="<?php echo isset( $client['section_clients_name'] ) ? $client['section_clients_name'] : ''; ?>"></a>
									<?php else : ?>
										<img src="<?php echo isset( $client['section_clients_logo_image']['url'] ) ? $client['section_clients_logo_image']['url'] : ''; ?>" alt="<?php echo isset( $client['section_clients_name'] ) ? $client['section_clients_name'] : ''; ?>">
									<?php endif; ?>
								</div><!-- .client-item -->
							<?php endforeach; ?> 
						<?php endif; ?>
					</div><!-- .client-container -->
				</div><!-- .row -->
			</div><!-- .container -->
		</section><!-- #client -->
		<?php
		if ( Plugin::$instance->editor->is_edit_mode() ) :  
			?>
			<script> 
				(function($) {			
					var  $owlCarouselClient = $('.client-container.owl-carousel');
					APP.client = {
						init: function() {
							APP.client.owlCarousel();
						},

						owlCarousel: function() {
							$owlCarouselClient.owlCarousel({
								autoplay: true,
								autoplayHoverPause: true,
								autoplaySpeed: 1000,
								autoplayTimeout: 2000,
								smartSpeed: 1200,
								stagePadding: 0,
								center: false,
								loop: true,
								rewind: true,
								dots: false,
								responsive: {
									0: {
										items: 2,
										margin: 20
									},
									479: {
										items: 3,
										margin: 70
									},
									767: {
										items: 4,
										margin: 70
									},
									991: {
										items: 4,
										margin: 100
									},
									1200: {
										items: 4,
										margin: 120
									}
								}
							});
						}
					}
					APP.client.init();
				})(jQuery);
			</script>  
			<?php
		endif;
	}
	protected function content_template() {}
	public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_My_Custom_Elementor_client );