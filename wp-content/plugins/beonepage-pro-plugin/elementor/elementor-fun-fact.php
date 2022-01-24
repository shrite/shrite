<?php
namespace Elementor;
use Elementor\Core\Schemes\Color;
if ( ! defined( 'ABSPATH' ) ) exit;
class Widget_My_Custom_Elementor_Fun_Fact extends Widget_Base {
	public function get_categories() {
		return [ 'beonepage-widgets' ];
	}
	public function get_name() {
      return 'elementor-fun-fact';
	}
	public function get_title() {
      return __( 'BeOne Fun Fact', 'beonepage' );
	}
	public function get_icon() {
      return 'fa fa-magic';
	}
	protected function _register_controls() {
		$this->add_control(
			'elementor_fun_fact',
			[
				'label' => __( 'Process Fun Fact', 'beonepage' ),
				'type' => Controls_Manager::SECTION,
			]
		);
		//Font Color
        $beonepage_fun_fact_color = beonepage_olddata_fetch_redux('front_page_fun_fact_color', 'option');
        if(!empty($beonepage_fun_fact_color)){
			$beonepage_fun_fact_color = beonepage_olddata_fetch_redux('front_page_fun_fact_color', 'option');
        }else{
			$beonepage_fun_fact_color =esc_attr("#eceff3");
        }
        $this->add_control(
			'section_font_color',
			[
				'label' => __( "Font Color", 'beonepage' ),
				'type' => Controls_Manager::COLOR,
				'default' => $beonepage_fun_fact_color,
				'scheme' => [
					'type' => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fact-number' => 'color: {{VALUE}}',
				],
				'section' => 'elementor_fun_fact',
			]        
        );
        //Label Color
        $beonepage_fun_fact_module_label = beonepage_olddata_fetch_redux('front_page_fun_fact_module_label', 'option');
        if(!empty($beonepage_fun_fact_module_label)){
			$beonepage_fun_fact_module_label = beonepage_olddata_fetch_redux('front_page_fun_fact_module_label', 'option');
        }else{
			$beonepage_fun_fact_module_label = esc_attr("#ffcc00");
        }        
        $this->add_control(
			'section_label_color',
			[
				'label' => __( "Label Color", 'beonepage' ),
				'type' => Controls_Manager::COLOR,
				'default' => $beonepage_fun_fact_module_label,
				'scheme' => [
					'type' => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fact-text' => 'color: {{VALUE}}',
				],
				'section' => 'elementor_fun_fact',
			]         
        );
        //Background setting                
		$class = '';
		$attribute = '';   
        $beonepage_fun_fact_module_bg = beonepage_olddata_fetch_redux('front_page_fun_fact_module_bg', 'option');
        if(!empty($beonepage_fun_fact_module_bg)){
			$beonepage_fun_fact_module_bg = beonepage_olddata_fetch_redux('front_page_fun_fact_module_bg', 'option');
        }else{
			$beonepage_fun_fact_module_bg = esc_attr("color");
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
				'default' 	=> $beonepage_fun_fact_module_bg,
				'toggle' 	=> true,
				'section' 	=> 'elementor_fun_fact',
			]        
        );
		$beonepage_fun_fact_module_bg_color = beonepage_olddata_fetch_redux('front_page_fun_fact_module_bg_color', 'option');
		if(!empty($beonepage_fun_fact_module_bg_color)){
			$beonepage_fun_fact_module_bg_color = beonepage_olddata_fetch_redux('front_page_fun_fact_module_bg_color', 'option');
		}else{
			$beonepage_fun_fact_module_bg_color = esc_attr("#181a1c");
		}
		$this->add_control(
			'section_background_color',
			[
				'label' => __( "Background Color", 'beonepage' ),
				'type' 	=> Controls_Manager::COLOR,
				'default' => $beonepage_fun_fact_module_bg_color,
				'scheme'=> [
					'type' => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fun-fact-module' => 'Background-color: {{VALUE}}',
				],
				'condition' => [
					'section_background' => 'color',
				],
				'section' => 'elementor_fun_fact',
			]         
        );       
        //Background image 
        $beonepage_fun_fact_module_bg_img = beonepage_olddata_fetch_redux('front_page_fun_fact_module_bg_img', 'option');
        if(!empty($beonepage_fun_fact_module_bg_img['background-image'])){
			$beonepage_fun_fact_module_bg_img = beonepage_olddata_fetch_redux('front_page_fun_fact_module_bg_img', 'option');
			$beonepage_fun_fact_module_bg_img_url = $beonepage_fun_fact_module_bg_img['background-image'];
        }else{
			$beonepage_fun_fact_module_bg_img_url = \Elementor\Utils::get_placeholder_image_src();
        }
        $this->add_control(
			'section_background_image',
			[
				'label' => __( "Bakground Image", 'beonepage' ),
				'type' 	=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 	=> esc_url($beonepage_fun_fact_module_bg_img_url),
				],
				'condition' => [
					'section_background' => 'image',
				],
				'section' 	=> 'elementor_fun_fact',
			]         
        );
        // Background Repeat
        $beonepage_fun_fact_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_fun_fact_module_bg_img', 'option');
        if(!empty($beonepage_fun_fact_module_bg_img_rp['background-repeat'])){
			$beonepage_fun_fact_module_bg_img_rp = beonepage_olddata_fetch_redux('front_page_fun_fact_module_bg_img', 'option');
			$beonepage_fun_fact_module_bg_img_rp = $beonepage_fun_fact_module_bg_img_rp['background-repeat'];
        }else{
			$beonepage_fun_fact_module_bg_img_rp = esc_attr("No Repeat");
        }	
        $this->add_control(
			'section_background_image_rp',
            [
                'label' => __( 'Background Repeat', 'beonepage' ),
                'type' => Controls_Manager::SELECT,
                'default' => $beonepage_fun_fact_module_bg_img_rp,
                'options' => [
                    'no-repeat'  => __( 'No Repeat', 'beonepage' ),
                    'repeat' => __( 'Repeat All', 'beonepage' ),
                    'repeat-x' => __( 'Repeat Horizontally', 'beonepage' ),
                    'repeat-y' => __( 'Repeat hortically', 'beonepage' ),
                ],
                'section' => 'elementor_fun_fact',
				'condition' => [
                    'section_background' => 'image',
                ],
            ]         
        );
        //Background Position
        $beonepage_fun_fact_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_fun_fact_module_bg_img', 'option');
        if(!empty($beonepage_fun_fact_module_bg_img_bp['background-position'])){
			$beonepage_fun_fact_module_bg_img_bp = beonepage_olddata_fetch_redux('front_page_fun_fact_module_bg_img', 'option');
			$beonepage_fun_fact_module_bg_img_bp = $beonepage_fun_fact_module_bg_img_bp['background-position'];
        }else{
			$beonepage_fun_fact_module_bg_img_bp = esc_attr("Left Top");
        }
        $this->add_control(
			'section_background_image_bp',
            [
                'label' 	=> __( 'Background Position', 'beonepage' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> $beonepage_fun_fact_module_bg_img_bp,
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
                'section' 	=> 'elementor_fun_fact',
				'condition' => [
                    'section_background' => 'image',
                ],
            ]        
        );
        //Background Size
        $beonepage_fun_fact_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_fun_fact_module_bg_img', 'option');
        if(!empty($beonepage_fun_fact_module_bg_img_bs['background-size'])){
			$beonepage_fun_fact_module_bg_img_bs = beonepage_olddata_fetch_redux('front_page_fun_fact_module_bg_img', 'option');
			$beonepage_fun_fact_module_bg_img_bs = $beonepage_fun_fact_module_bg_img_bs['background-size'];
        }else{
			$beonepage_fun_fact_module_bg_img_bs = esc_attr("Cover");
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
				'default' 		=> $beonepage_fun_fact_module_bg_img_bs,
				'toggle' 		=> true,
				'condition' 	=> [
					'section_background' => 'image',
				],
				'section' => 'elementor_fun_fact',
			]         
        );
        //Background Attachment
        $beonepage_fun_fact_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_fun_fact_module_bg_img', 'option');
        if(!empty($beonepage_fun_fact_module_bg_img_ath['background-attachment'])){
			$beonepage_fun_fact_module_bg_img_ath = beonepage_olddata_fetch_redux('front_page_fun_fact_module_bg_img', 'option');
			$beonepage_fun_fact_module_bg_img_ath = $beonepage_fun_fact_module_bg_img_ath['background-attachment'];
        }else{
			$beonepage_fun_fact_module_bg_img_ath = esc_attr("Scroll");
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
				'default' 	=> $beonepage_fun_fact_module_bg_img_ath,
				'toggle' 	=> true,
				'condition'	=> [
					'section_background' => 'image',
				],
				'section' 	=> 'elementor_fun_fact',
			]         
        );
        //Parallax seting
        $beonepage_fun_fact_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_fun_fact_module_bg_parallax', 'option');
        if(!empty($beonepage_fun_fact_module_bg_parallax)){
			$beonepage_fun_fact_module_bg_parallax = beonepage_olddata_fetch_redux('front_page_fun_fact_module_bg_parallax', 'option');
			$beonepage_fun_fact_module_bg_parallax = html_entity_decode($beonepage_fun_fact_module_bg_parallax);
        if($beonepage_fun_fact_module_bg_parallax == 1){
            $beonepage_fun_fact_module_bg_parallax_d = esc_attr("yes");
        }else{
            $beonepage_fun_fact_module_bg_parallax_d = esc_attr("no");
        }  
        }else{
          $beonepage_fun_fact_module_bg_parallax_d = esc_attr("yes");
        }
        $this->add_control(
			'section_bg_parallax',
			[
				'label' 	=> __( 'Enable Parallax Scrolling For Image?', 'beonepage' ),
				'type' 		=> Controls_Manager::SWITCHER,
				'label_on' 	=> __( 'Enable', 'beonepage' ),
				'label_off' 	=> __( 'Disable', 'beonepage' ),
				'return_value' 	=> 'yes',
				'default' 		=> $beonepage_fun_fact_module_bg_parallax_d,
				'section'	 	=> 'elementor_fun_fact',
			]
        );
		// Fun Fact REPEATER
		$result = array();
		$beonepage_fun_fact_module_fact = beonepage_olddata_fetch_redux('front_page_fun_fact_module_fact', 'option');
		if(!empty($beonepage_fun_fact_module_fact)){
			$beonepage_fun_fact_module_fact = beonepage_olddata_fetch_redux('front_page_fun_fact_module_fact', 'option');
			
			foreach ( $beonepage_fun_fact_module_fact as $fun_fact ) :
			
				$beonepage_fact_label = '';
				if(isset($fun_fact['fact_label']) && $fun_fact['fact_label'] != ''){
					$beonepage_fact_label = $fun_fact['fact_label'];
				}
				$beonepage_fact_num = '';
				if(isset($fun_fact['fact_num']) && $fun_fact['fact_num'] != ''){
					$beonepage_fact_num = $fun_fact['fact_num'];
				}
				$result[] = array('section_fun_fact_label' => $beonepage_fact_label , 
					'section_fun_fact_number' => $beonepage_fact_num,
				);	
			endforeach;
			
		}else{
			$beonepage_fun_fact_module_fact ='';
		}
		$section_fun_fact_repeater = new \Elementor\Repeater();
		$section_fun_fact_repeater->add_control(
			'section_fun_fact_label',
			[
				'label' 		=> __( 'Fact Label', 'beonepage' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);
		$section_fun_fact_repeater->add_control(
			'section_fun_fact_number',
			[
				'label' 		=> __( 'Fact Number', 'beonepage' ),
				'type' 			=> Controls_Manager::TEXT,
				'show_label'	=> true,
			]
		);
		$this->add_control(
			'section_fun_fact',
			[
				'label' 		=> __( 'Fun Fact', 'beonepage' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> 	$section_fun_fact_repeater->get_controls(),
				'default' 		=> $result,								
				'section' 		=> 'elementor_fun_fact',
			]
		);
	}// End finction
	protected function render( $instance = [] ) {
		$settings = $this->get_settings();
		$beonepage_fun_fact_module_layout = beonepage_olddata_fetch_redux('front_page_fun_fact_module_layout', 'option');
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
		}elseif( $settings['section_background'] == 'color')
		 {
			$class = ' no-background';
		} else {
			$class = ' img-background';
		}
			
		//conditions for css
		$beonepage_section_background_image_url = '';
		if(isset($settings['section_background_image']['url'])&& $settings['section_background_image']['url'] !=''){
			$beonepage_section_background_image_url = $settings['section_background_image']['url'];
		}
		$beonepage_section_font_color = '';
		if(isset($settings['section_font_color']) && $settings['section_font_color'] !=''){
			$beonepage_section_font_color = $settings['section_font_color'];
		}
		$beonepage_section_background_color = '';
		if(isset($settings['section_background_color']) && $settings['section_background_color'] !=''){
			$beonepage_section_background_color = $settings['section_background_color'];
		}
		$beonepage_section_label_color = '';
		if(isset($settings['section_label_color']) && $settings['section_label_color'] !=''){
			$beonepage_section_label_color = $settings['section_label_color'];
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
			<?php if(isset($beonepage_section_background_image_url) && $beonepage_section_background_image_url !='') {?>
				.fun-fact-module{
					background-image: url(<?php echo $beonepage_section_background_image_url; ?>);
				}
			<?php }
			if(isset($beonepage_section_font_color) && $beonepage_section_font_color!=''){?>
				.fun-fact-module{
					color: <?php echo $beonepage_section_font_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_color) && $beonepage_section_background_color!=''){?>
				.fun-fact-module{
					background-color: <?php echo $beonepage_section_background_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_label_color) && $beonepage_section_label_color!=''){?>
				.fun-fact-module .fact-text{
					color: <?php echo $beonepage_section_label_color; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_rp) && $beonepage_section_background_image_rp !=''){?>
				.fun-fact-module{
					background-repeat: <?php echo $beonepage_section_background_image_rp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bp) && $beonepage_section_background_image_bp !=''){?>
				.fun-fact-module{
					background-position: <?php echo $beonepage_section_background_image_bp; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_bs) && $beonepage_section_background_image_bs !=''){?>
				.fun-fact-module{
					background-size: <?php echo $beonepage_section_background_image_bs; ?>;
				}
			<?php }
			if(isset($beonepage_section_background_image_ath) && $beonepage_section_background_image_ath !=''){?>
				.fun-fact-module{
					background-attachment: <?php echo $beonepage_section_background_image_ath; ?>;
				}
			<?php } ?>
		</style>
		<section id="" class="sm-section module fun-fact-module<?php echo $class; ?> clearfix"<?php echo $attribute; ?>>
			<div class="<?php echo $beonepage_fun_fact_module_layout == 'fixed' ? 'container' : 'container-fluid'; ?>">
				<div class="row">
					<div id="fun-fact" class="fun-fact-container wow fadeIn clearfix" data-wow-delay=".3s">
						<?php $facts = $settings['section_fun_fact']; ?>

						<?php if ( ! empty( $facts ) ) : ?>
							<?php foreach ( $facts as $fact ) : ?>
								<?php //echo $fact['section_fun_fact_number']."akhill";
									$fact_label = isset( $fact['section_fun_fact_label'] ) && ! empty( $fact['section_fun_fact_label'] ) ? $fact['section_fun_fact_label'] : '';
									$fact_number = isset( $fact['section_fun_fact_number'] ) && ! empty( $fact['section_fun_fact_number'] ) ? $fact['section_fun_fact_number'] : '';
									$fact_number = preg_replace( '/[^0-9]/', '', $fact_number ); 
								?>

								<div class="fact-item <?php echo $beonepage_fun_fact_module_layout == 'fixed' ? 'col-md-3' : 'col-lg-2 col-md-4'; ?> col-sm-4 col-xs-6 text-center"> 
									<div class="fact-number" data-to="<?php echo $fact_number; ?>" data-speed="3000"><?php echo $fact_number; ?></div>
									<div class="fact-text"><?php echo $fact_label; ?></div>
								</div><!-- .fun-item -->
							<?php endforeach; ?> 
						<?php endif; ?>
					</div><!-- #fun-fact -->
				</div><!-- .row -->
			</div><!-- .container -->
		</section><!-- #fun-fact -->
		<?php
	
		if ( Plugin::$instance->editor->is_edit_mode() ) :  
			?>
			<script> 
			(function($) {
				
				APP.funFact = {
					init: function() {
						APP.funFact.counter();
					},

					counter: function() {
						if ($('.fun-fact-module').length > 0) {
							var waypoint = new Waypoint({
								element: '.fun-fact-module',
								handler: function() {
									$('.fact-item').each(function() {
										$(this).find('.fact-number').css('visibility', 'visible');
										$(this).find('.fact-number').countTo();
									});

									this.destroy();
								},
								offset: 'bottom-in-view'
							});
						}
					}
				}
				APP.funFact.init();
			})(jQuery);
			</script>  
			<?php
		endif;
	}
	protected function content_template() {}
	public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_My_Custom_Elementor_Fun_Fact );
