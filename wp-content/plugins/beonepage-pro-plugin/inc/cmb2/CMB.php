<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category BeOnePage Plugin
 * @package  CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

require_once dirname( __FILE__ ) . '/init.php';

/**
 * Conditionally displays a metabox when it's the front page.
 *
 * @param  CMB2 object $cmb CMB2 object
 * @return bool True if metabox should show
 */
function beonepage_cmb_show_if_front_page( $cmb ) {
	
	if( beOneKirki::get_option( 'multi_lang_check' ) == '1' ) {
		$front_page_array = beOneKirki::get_option( 'multi_lang_page_select' );
		if ( !( !empty( $front_page_array ) && in_array( $cmb -> object_id, $front_page_array ) ) ) {
			return false;
		}
	} else {
		if ( $cmb->object_id !== get_option( 'page_on_front' ) )
			return false;
	}

	wp_enqueue_style( 'beonepage-admin-font-awesome-style', get_template_directory_uri() . '/layouts/font.awesome.min.css', array(), '4.5.0' );
	wp_enqueue_style( 'beonepage-admin-icon-list-style', plugins_url( 'css/icon-list.css', __FILE__ ), array(), beonepage_get_version() );
	wp_enqueue_script( 'beonepage-admin-icon-field-script', plugins_url( 'js/jquery.cmb.field.js', __FILE__ ), array( 'jquery' ), beonepage_get_version(), true );
	wp_enqueue_script( 'beonepage-admin-typewatch-script', plugins_url( 'js/jquery.typewatch.js', __FILE__ ), array( 'jquery' ), '2.2.1', true );

	return true;
}

/**
 * Add icon control.
 */
function beonepage_cmb_icon_after() {
	$output = sprintf(
					'<span class="icon-control">
						<a href="javascript:void(0);" class="add-cmb-icon">%1$s</a>
						<a href="javascript:void(0);" class="remove-cmb-icon">%2$s</a>
					</span>',
					esc_html__( 'Choose Icon', 'beonepage' ),
					esc_html__( 'Remove Icon', 'beonepage' )
				);

	$font_icons = beonepage_icon_list();

	ob_start();
?>

	<div id="cmb-icon-list">
		<div class="cmb-icon-search">
			<input type="text" id="cmb-icon-search" placeholder="<?php esc_html_e( 'Type to search icons', 'beonepage' ); ?>">
			<span id="icons-search-result"></span>
		</div><!-- .icon-search -->

		<ul class="font-icons">
			<?php
				foreach ( $font_icons as $font_icon ) {
					echo '<li id="' . $font_icon . '"><i class="fa fa-' . $font_icon . '"></i></li>';
				}
			?>
		</ul>
	</div><!-- #cmb-icon-list -->
	
<?php
	$icon_list = ob_get_clean();

	return $output . $icon_list;
}

/**
 * Hook in and add metaboxes.
 */
function beonepage_register_metabox() {
	// Start with an underscore to hide fields from custom fields list.
	$prefix = '_beonepage_option_';

	$animate = array(
		'flash'         => __( 'flash', 'beonepage' ),
		'pulse'         => __( 'pulse', 'beonepage' ),
		'rubberBand'    => __( 'rubberBand', 'beonepage' ),
		'shake'         => __( 'shake', 'beonepage' ),
		'swing'         => __( 'swing', 'beonepage' ),
		'tada'          => __( 'tada', 'beonepage' ),
		'wobble'        => __( 'wobble', 'beonepage' ),
		'jello'         => __( 'jello', 'beonepage' ),
		'bounce'        => __( 'bounce', 'beonepage' ),
		'bounceIn'      => __( 'bounceIn', 'beonepage' ),
		'bounceInLeft'  => __( 'bounceInLeft', 'beonepage' ),
		'bounceInRight' => __( 'bounceInRight', 'beonepage' ),
		'bounceInUp'    => __( 'bounceInUp', 'beonepage' ),
		'bounceInDown'  => __( 'bounceInDown', 'beonepage' ),
		'fadeIn'        => __( 'FadeIn', 'beonepage' ),
		'fadeInLeft'    => __( 'FadeInLeft', 'beonepage' ),
		'fadeInRight'   => __( 'FadeInRight', 'beonepage' ),
		'fadeInUp'      => __( 'FadeInUp', 'beonepage' ),
		'fadeInDown'    => __( 'FadeInDown', 'beonepage' ),
		'flipInX'       => __( 'flipInX', 'beonepage' ),
		'flipInY'       => __( 'flipInY', 'beonepage' ),
		'slideInLeft'   => __( 'slideInLeft', 'beonepage' ),
		'slideInRight'  => __( 'slideInRight', 'beonepage' ),
		'slideInUp'     => __( 'slideInUp', 'beonepage' ),
		'slideInDown'   => __( 'slideInDown', 'beonepage' ),
		'zoomIn'        => __( 'zoomIn', 'beonepage' ),
		'zoomInLeft'    => __( 'zoomInLeft', 'beonepage' ),
		'zoomInRight'   => __( 'zoomInRight', 'beonepage' ),
		'zoomInUp'      => __( 'zoomInUp', 'beonepage' ),
		'zoomInDown'    => __( 'zoomInDown', 'beonepage' )
	);

	/**
	 * Initiate the metabox.
	 */
	/* Post Metabox Start */
	$post_metabox = new_cmb2_box( array(
		'id'           => 'post_metabox',
		'title'        => __( 'Post Metabox', 'beonepage' ),
		'object_types' => array( 'post' ),
		'context'      => 'normal',
		'priority'     => 'high'
	) );

	$post_metabox->add_field( array(
		'name'             => __( 'Audio & Video Resources:', 'beonepage' ),
		'desc'             => __( 'It is easy to embed audios or videos from popular websites (YouTube, Vimeo, SoundCloud, etc.), just need to paste the link.', 'beonepage' ),
		'id'               => $prefix . 'post_embed_src',
		'type'             => 'radio_inline',
		'show_option_none' => true,
		'options'          => array(
			'audio' => __( 'Audio', 'beonepage' ),
			'video' => __( 'Video', 'beonepage' )
		)
	) );

	$post_metabox->add_field( array(
		'name' => __( "Audio URL:", 'beonepage' ),
		'id'   => $prefix . 'post_embed_audio_url',
		'type' => 'oembed'
	) );

	$post_metabox->add_field( array(
		'name' => __( "Video URL:", 'beonepage' ),
		'id'   => $prefix . 'post_embed_video_url',
		'type' => 'oembed'
	) );
	/* Post Metabox Start */

	/* Portfolio Metabox Start */
	$portfolio_metabox = new_cmb2_box( array(
		'id'           => 'portfolio_metabox',
		'title'        => __( 'Portfolio Metabox', 'beonepage' ),
		'object_types' => array( 'portfolio' ),
		'context'      => 'normal',
		'priority'     => 'high'
	) );

	$portfolio_metabox->add_field( array(
		'name' => __( 'Created by:', 'beonepage' ),
		'id'   => $prefix . 'author',
		'type' => 'text_small',
	) );

	$portfolio_metabox->add_field( array(
		'name' => __( 'Completed on:', 'beonepage' ),
		'id'   => $prefix . 'date',
		'type' => 'text_date',
	) );

	$portfolio_metabox->add_field( array(
		'name' => __( 'Skills:', 'beonepage' ),
		'id'   => $prefix . 'skill',
		'type' => 'text_medium',
	) );

	$portfolio_metabox->add_field( array(
		'name' => __( "Client's Name:", 'beonepage' ),
		'id'   => $prefix . 'client_name',
		'type' => 'text_medium',
	) );

	$portfolio_metabox->add_field( array(
		'name' => __( "Client's URL:", 'beonepage' ),
		'id'   => $prefix . 'client_url',
		'type' => 'text_url',
	) );

	$portfolio_metabox->add_field( array(
		'name'             => __( 'Audio & Video Resources:', 'beonepage' ),
		'desc'             => __( 'It is easy to embed audios or videos from popular websites (YouTube, Vimeo, SoundCloud, etc.), just need to paste the link.', 'beonepage' ),
		'id'               => $prefix . 'portfolio_embed_src',
		'type'             => 'radio_inline',
		'show_option_none' => true,
		'options'          => array(
			'audio' => __( 'Audio', 'beonepage' ),
			'video' => __( 'Video', 'beonepage' )
		)
	) );

	$portfolio_metabox->add_field( array(
		'name' => __( "Audio URL:", 'beonepage' ),
		'id'   => $prefix . 'portfolio_embed_audio_url',
		'type' => 'oembed'
	) );

	$portfolio_metabox->add_field( array(
		'name' => __( "Video URL:", 'beonepage' ),
		'id'   => $prefix . 'portfolio_embed_video_url',
		'type' => 'oembed'
	) );
	/* Portfolio Metabox End */

	/* Swiper Slider Metabox Start */
	$swiper_slider = new_cmb2_box( array(
		'id'           => $prefix . 'swiper_slider',
		'title'        => __( 'Slider Metabox', 'beonepage' ),
		'object_types' => array( 'page' ),
		'show_on_cb'   => 'beonepage_cmb_show_if_front_page'
	) );

	$swiper_slider_field_id = $swiper_slider->add_field( array(
		'id'          => $prefix . 'swiper_slider',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Slide {#}', 'beonepage' ),
			'add_button'    => __( 'Add Another Slide', 'beonepage' ),
			'remove_button' => __( 'Remove Slide', 'beonepage' ),
			'sortable'      => true
		),
	) );
	
	if ( beOneKirki::get_option( 'front_page_slider_type' ) == '1' ) {

		$swiper_slider->add_field( array(
			'name' => __( 'Title', 'beonepage' ),
			'desc' => __( 'If you want to color the word, just wrap it with "span" tag.', 'beonepage' ),
			'id'   => $prefix .'front_page_text_slider_title',
			'type' => 'textarea',			
			'default' => html_entity_decode( Kirki::get_option( 'front_page_text_slider_title' ) )
		) );
		
		$swiper_slider->add_field( array(
			'name' => __( 'Subtitle', 'beonepage' ),
			'id'   => $prefix .'front_page_text_slider_content',
			'type' => 'textarea',			
			'default' => Kirki::get_option( 'front_page_text_slider_content' )
		) );
		
		$swiper_slider->add_field( array(
			'name'   => __( 'Button Text', 'beonepage' ),
			'id'     => $prefix .'front_page_text_slider_btn_text',
			'type'   => 'text_small',			
			'default' => Kirki::get_option( 'front_page_text_slider_btn_text' )
		) );
		
		$swiper_slider->add_field( array(
			'name' => __( 'Button URL', 'beonepage' ),
			'id'   => $prefix .'front_page_text_slider_btn_url',
			'type' => 'text_url',			
			'default' => Kirki::get_option( 'front_page_text_slider_btn_url' )
		) );
		
	} else {
		$swiper_slider->add_group_field( $swiper_slider_field_id, array(
			'name'             => __( 'Slider Type', 'beonepage' ),
			'id'               => 'type',
			'type'             => 'radio_inline',
			'default'          => 'image',
			'options'          => array(
				'image' => __( 'Image', 'beonepage' ),
				'video' => __( 'Video', 'beonepage' )
			)
		) );

		$swiper_slider->add_group_field( $swiper_slider_field_id, array(
			'name'    => __( 'Image', 'beonepage' ),
			'desc'    => __( 'Upload an image or enter an URL.', 'beonepage' ),
			'id'      => 'img_url',
			'type'    => 'file',
			'options' => array(
				'add_upload_file_text' => __( 'Add or Upload Image', 'beonepage' )
			),
		) );

		$swiper_slider->add_group_field( $swiper_slider_field_id, array(
			'name' => __( 'YouTube Video', 'beonepage' ),
			'desc' => __( 'It is easy to use any YouTube video as your background, just need to paste the link. <b>IMPORTANT NOTE:</b> The YouTube Video is automatically disabled in mobile devices. Instead, the Image will be used, so it\'s better to define both Image and YouTube Video for best results.', 'beonepage' ),
			'id'   => 'video_url',
			'type' => 'oembed'
		) );

		$swiper_slider->add_group_field( $swiper_slider_field_id, array(
			'name' => __( 'Heading', 'beonepage' ),
			'desc' => __( 'If you want to color the word, just wrap it with "span" tag.', 'beonepage' ),
			'id'   => 'title',
			'type' => 'textarea_code'
		) );

		$swiper_slider->add_group_field( $swiper_slider_field_id, array(
			'name'             => 'Heading Animation',
			'id'               => 'title_animation',
			'type'             => 'select',
			'show_option_none' => true,
			'default'          => 'none',
			'options'          => $animate
		) );

		$swiper_slider->add_group_field( $swiper_slider_field_id, array(
			'name' => __( 'Content', 'beonepage' ),
			'id'   => 'description',
			'type' => 'textarea'
		) );

		$swiper_slider->add_group_field( $swiper_slider_field_id, array(
			'name'             => 'Content Animation',
			'id'               => 'description_animation',
			'type'             => 'select',
			'show_option_none' => true,
			'default'          => 'none',
			'options'          => $animate
		) );

		$swiper_slider->add_group_field( $swiper_slider_field_id, array(
			'name'   => __( 'Button Text', 'beonepage' ),
			'id'     => 'btn_text',
			'type'   => 'text_small'
		) );

		$swiper_slider->add_group_field( $swiper_slider_field_id, array(
			'name' => __( 'Button URL', 'beonepage' ),
			'id'   => 'btn_url',
			'type' => 'text_url'
		) );

		$swiper_slider->add_group_field( $swiper_slider_field_id, array(
			'name'             => 'Button Animation',
			'id'               => 'btn_animation',
			'type'             => 'select',
			'show_option_none' => true,
			'default'          => 'none',
			'options'          => $animate
		) );
	}
	
	/* Swiper Slider Metabox End */

	/* Icon Service Box Metabox Start */
	$icon_service_box = new_cmb2_box( array(
		'id'           => $prefix . 'icon_service_box',
		'title'        => __( 'Icon Services Metabox', 'beonepage' ),
		'object_types' => array( 'page' ),
		'show_on_cb'   => 'beonepage_cmb_show_if_front_page'
	) );
	
	$icon_service_box->add_field( array(
		'name' => __( 'Heading', 'beonepage' ),
		'desc' => __( 'If you want to color the word, just wrap it with "span" tag.', 'beonepage' ),
		'id'   => $prefix .'front_page_icon_service_module_title',
		'type' => 'textarea',			
		'default' => html_entity_decode( Kirki::get_option( 'front_page_icon_service_module_title' ) )
	) );
	
	$icon_service_box->add_field( array(
		'name' => __( 'Subtitle', 'beonepage' ),
		'id'   => $prefix .'front_page_icon_service_module_subtitle',
		'type' => 'textarea',			
		'default' => Kirki::get_option( 'front_page_icon_service_module_subtitle' )
	) );

	$icon_service_box_field_id = $icon_service_box->add_field( array(
		'id'          => $prefix . 'icon_service_box',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Service Box {#}', 'beonepage' ),
			'add_button'    => __( 'Add Another Service Box', 'beonepage' ),
			'remove_button' => __( 'Remove Service Box', 'beonepage' ),
			'sortable'      => true
		),
	) );

	$icon_service_box->add_group_field( $icon_service_box_field_id, array(
		'name' => __( 'Title', 'beonepage' ),
		'desc' => __( 'If you want to color the word, just wrap it with "span" tag.', 'beonepage' ),
		'id'   => 'title',
		'type' => 'textarea_code'
	) );

	$icon_service_box->add_group_field( $icon_service_box_field_id, array(
		'name' => __( 'Description', 'beonepage' ),
		'id'   => 'description',
		'type' => 'textarea'
	) );

	$icon_service_box->add_group_field( $icon_service_box_field_id, array(
		'name'   => __( 'Icon', 'beonepage' ),
		'id'     => 'icon',
		'type'   => 'text_small',
		'before' => '<span class="selected-icon"><i class="fa fa-none"></i></span>',
		'after'  => 'beonepage_cmb_icon_after'
	) );
	$icon_service_box->add_group_field( $icon_service_box_field_id, array(
		'name'    => __( 'Image Icon', 'beonepage' ),
		'desc'    => __( 'Upload an image or enter an URL. (Recommended of size 40x40px)', 'beonepage' ),
		'id'      => 'icon_img_url',
		'type'    => 'file',
		'options' => array(
			'add_upload_file_text' => __( 'Add or Upload Image', 'beonepage' )
		),
	) );
	$icon_service_box->add_group_field( $icon_service_box_field_id, array(
		'name' => __( 'URL', 'beonepage' ),
		'id'   => 'url',
		'type' => 'text_url'
	) );

	$icon_service_box->add_group_field( $icon_service_box_field_id, array(
		'name'             => 'Animation',
		'id'               => 'animation',
		'type'             => 'select',
		'show_option_none' => true,
		'default'          => 'none',
		'options'          => $animate
	) );
	/* Icon Service Box Metabox End */

	/* Icon Service with Image Box Metabox Start */
	$icon_service_img_box = new_cmb2_box( array(
		'id'           => $prefix . 'icon_service_img_box',
		'title'        => __( 'Icon Services with Image Metabox', 'beonepage' ),
		'object_types' => array( 'page' ),
		'show_on_cb'   => 'beonepage_cmb_show_if_front_page'
	) );
	
	$icon_service_img_box->add_field( array(
		'name' => __( 'Title', 'beonepage' ),
		'desc' => __( 'If you want to color the word, just wrap it with "span" tag.', 'beonepage' ),
		'id'   => $prefix .'front_page_icon_service_img_module_title',
		'type' => 'textarea',			
		'default' => html_entity_decode( Kirki::get_option( 'front_page_icon_service_img_module_title' ) )
	) );
		
	$icon_service_img_box->add_field( array(
		'name' => __( 'Subtitle', 'beonepage' ),
		'id'   => $prefix .'front_page_icon_service_img_module_subtitle',
		'type' => 'textarea',			
		'default' => Kirki::get_option( 'front_page_icon_service_img_module_subtitle' )
	) );

	$icon_service_img_box_field_id = $icon_service_img_box->add_field( array(
		'id'          => $prefix . 'icon_service_img_box',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Service Box {#}', 'beonepage' ),
			'add_button'    => __( 'Add Another Service Box', 'beonepage' ),
			'remove_button' => __( 'Remove Service Box', 'beonepage' ),
			'sortable'      => true
		),
	) );

	$icon_service_img_box->add_group_field( $icon_service_img_box_field_id, array(
		'name' => __( 'Title', 'beonepage' ),
		'desc' => __( 'If you want to color the word, just wrap it with "span" tag.', 'beonepage' ),
		'id'   => 'title',
		'type' => 'textarea_code'
	) );

	$icon_service_img_box->add_group_field( $icon_service_img_box_field_id, array(
		'name' => __( 'Description', 'beonepage' ),
		'id'   => 'description',
		'type' => 'textarea'
	) );

	$icon_service_img_box->add_group_field( $icon_service_img_box_field_id, array(
		'name'   => __( 'Icon', 'beonepage' ),
		'id'     => 'icon',
		'type'   => 'text_small',
		'before' => '<span class="selected-icon"><i class="fa fa-none"></i></span>',
		'after'  => 'beonepage_cmb_icon_after'
	) );
      	$icon_service_img_box->add_group_field( $icon_service_img_box_field_id, array(
		'name'    => __( 'Image Icon', 'beonepage' ),
		'desc'    => __( 'Upload an image or enter an URL. (Recommended of size 40x40px)', 'beonepage' ),
		'id'      => 'icon_img_url_2',
		'type'    => 'file',
		'options' => array(
			'add_upload_file_text' => __( 'Add or Upload Image', 'beonepage' )
		),
	) );
	$icon_service_img_box->add_group_field( $icon_service_img_box_field_id, array(
		'name' => __( 'URL', 'beonepage' ),
		'id'   => 'url',
		'type' => 'text_url'
	) );

	$icon_service_img_box->add_group_field( $icon_service_img_box_field_id, array(
		'name'             => 'Animation',
		'id'               => 'animation',
		'type'             => 'select',
		'show_option_none' => true,
		'default'          => 'none',
		'options'          => $animate
	) );
	/* Icon Service with Image Box Metabox End */

	/* Contact Box Metabox Start */
	$contact_box = new_cmb2_box( array(
		'id'           => $prefix . 'contact_box',
		'title'        => __( 'Contact Metabox', 'beonepage' ),
		'object_types' => array( 'page' ),
		'show_on_cb'   => 'beonepage_cmb_show_if_front_page'
	) );
	
	$contact_box->add_field( array(
		'name' => __( 'Title', 'beonepage' ),
		'desc' => __( 'If you want to color the word, just wrap it with "span" tag.', 'beonepage' ),
		'id'   => $prefix .'front_page_contact_module_title',
		'type' => 'textarea',			
		'default' => html_entity_decode( Kirki::get_option( 'front_page_contact_module_title' ) )
	) );
	
	$contact_box->add_field( array(
		'name' => __( 'Subtitle', 'beonepage' ),
		'id'   => $prefix .'front_page_contact_module_subtitle',
		'type' => 'textarea',			
		'default' => Kirki::get_option( 'front_page_contact_module_subtitle' )
	) );
	
	$contact_box->add_field( array(
		'name' => __( 'Send Button Text', 'beonepage' ),
		'id'   => $prefix .'front_page_contact_module_send',
		'type' => 'textarea',			
		'default' => Kirki::get_option( 'front_page_contact_module_send' )
	) );

	$contact_box_field_id = $contact_box->add_field( array(
		'id'          => $prefix . 'contact_box',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Contact Box {#}', 'beonepage' ),
			'add_button'    => __( 'Add Another Contact Box', 'beonepage' ),
			'remove_button' => __( 'Remove Contact Box', 'beonepage' ),
			'sortable'      => true
		),
	) );

	$contact_box->add_group_field( $contact_box_field_id, array(
		'name' => __( 'Label', 'beonepage' ),
		'id'   => 'label',
		'type' => 'text_small'
	) );

	$contact_box->add_group_field( $contact_box_field_id, array(
		'name' => __( 'Description', 'beonepage' ),
		'id'   => 'description',
		'type' => 'text'
	) );

	$contact_box->add_group_field( $contact_box_field_id, array(
		'name'   => __( 'Icon', 'beonepage' ),
		'id'     => 'icon',
		'type'   => 'text_small',
		'before' => '<span class="selected-icon"><i class="fa fa-none"></i></span>',
		'after'  => 'beonepage_cmb_icon_after'
	) );

	$contact_box->add_group_field( $contact_box_field_id, array(
		'name' => __( 'URL', 'beonepage' ),
		'id'   => 'url',
		'type' => 'text_url'
	) );

	$contact_box->add_group_field( $contact_box_field_id, array(
		'name'             => 'Animation',
		'id'               => 'animation',
		'type'             => 'select',
		'show_option_none' => true,
		'default'          => 'none',
		'options'          => $animate
	) );
	/* Contact Box Metabox End */

	/* Process Metabox Start */
	$process = new_cmb2_box( array(
		'id'           => $prefix . 'process',
		'title'        => __( 'Process Metabox', 'beonepage' ),
		'object_types' => array( 'page' ),
		'show_on_cb'   => 'beonepage_cmb_show_if_front_page'
	) );
	
	$process->add_field( array(
		'name' => __( 'Title', 'beonepage' ),
		'desc' => __( 'If you want to color the word, just wrap it with "span" tag.', 'beonepage' ),
		'id'   => $prefix .'front_page_process_module_title',
		'type' => 'textarea',
		'default' => html_entity_decode( Kirki::get_option( 'front_page_process_module_title' ) )
	) );

	$process->add_field( array(
		'name' => __( 'Subtitle', 'beonepage' ),
		'id'   => $prefix .'front_page_process_module_subtitle',
		'type' => 'textarea',
		'default' => Kirki::get_option( 'front_page_process_module_subtitle' )
	) );

	$process_field_id = $process->add_field( array(
		'id'          => $prefix . 'process',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Process Flow {#}', 'beonepage' ),
			'add_button'    => __( 'Add Another Process', 'beonepage' ),
			'remove_button' => __( 'Remove Process', 'beonepage' ),
			'sortable'      => true
		),
	) );

	$process->add_group_field( $process_field_id, array(
		'name' => __( 'Title', 'beonepage' ),
		'id'   => 'title',
		'type' => 'text'
	) );

	$process->add_group_field( $process_field_id, array(
		'name' => __( 'Description', 'beonepage' ),
		'id'   => 'description',
		'type' => 'wysiwyg'
	) );

	$process->add_group_field( $process_field_id, array(
		'name'   => __( 'Icon', 'beonepage' ),
		'id'     => 'icon',
		'type'   => 'text_small',
		'before' => '<span class="selected-icon"><i class="fa fa-none"></i></span>',
		'after'  => 'beonepage_cmb_icon_after'
	) );

	$process->add_group_field( $process_field_id, array(
		'name'             => 'Animation',
		'id'               => 'animation',
		'type'             => 'select',
		'show_option_none' => true,
		'default'          => 'none',
		'options'          => $animate
	) );
	/* Process Metabox End */

	/* Team Metabox Start */
	$team = new_cmb2_box( array(
		'id'           => $prefix . 'team',
		'title'        => __( 'Team Metabox', 'beonepage' ),
		'object_types' => array( 'page' ),
		'show_on_cb'   => 'beonepage_cmb_show_if_front_page'
	) );
	
	$team->add_field( array(
		'name' => __( 'Title', 'beonepage' ),
		'desc' => __( 'If you want to color the word, just wrap it with "span" tag.', 'beonepage' ),
		'id'   => $prefix .'front_page_team_module_title',
		'type' => 'textarea',
		'default' => html_entity_decode( Kirki::get_option( 'front_page_team_module_title' ) )
	) );

	$team->add_field( array(
		'name' => __( 'Subtitle', 'beonepage' ),
		'id'   => $prefix .'front_page_team_module_subtitle',
		'type' => 'textarea',
		'default' => Kirki::get_option( 'front_page_team_module_subtitle' )
	) );

	$team_field_id = $team->add_field( array(
		'id'          => $prefix . 'team',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Team Member {#}', 'beonepage' ),
			'add_button'    => __( 'Add Another Team Member', 'beonepage' ),
			'remove_button' => __( 'Remove Team Member', 'beonepage' ),
			'sortable'      => true
		),
	) );

	$team->add_group_field( $team_field_id, array(
		'name'    => __( 'Picture', 'beonepage' ),
		'desc'    => __( 'Upload an image or enter an URL.', 'beonepage' ),
		'id'      => 'img_url',
		'type'    => 'file',
		'options' => array(
			'add_upload_file_text' => __( 'Add or Upload Image', 'beonepage' )
		),
	) );

	$team->add_group_field( $team_field_id, array(
		'name' => __( 'Name', 'beonepage' ),
		'id'   => 'name',
		'type' => 'text_small'
	) );

	$team->add_group_field( $team_field_id, array(
		'name' => __( 'Title', 'beonepage' ),
		'id'   => 'title',
		'type' => 'text_small'
	) );

	$team->add_group_field( $team_field_id, array(
		'name' => __( 'Bio', 'beonepage' ),
		'id'   => 'bio',
		'type' => 'wysiwyg'
	) );

	$team->add_group_field( $team_field_id, array(
		'name' => __( 'Social Label 1', 'beonepage' ),
		'desc' => __( 'e.g. Twitter, Facebook, LinkedIn, Google Plus.', 'beonepage' ),
		'id'   => 'social_label_1',
		'type' => 'text_small'
	) );

	$team->add_group_field( $team_field_id, array(
		'name' => __( 'Social Link 1', 'beonepage' ),
		'id'   => 'social_url_1',
		'type' => 'text_url'
	) );

	$team->add_group_field( $team_field_id, array(
		'name' => __( 'Social Label 2', 'beonepage' ),
		'desc' => __( 'e.g. Twitter, Facebook, LinkedIn, Google Plus.', 'beonepage' ),
		'id'   => 'social_label_2',
		'type' => 'text_small'
	) );

	$team->add_group_field( $team_field_id, array(
		'name' => __( 'Social Link 2', 'beonepage' ),
		'id'   => 'social_url_2',
		'type' => 'text_url'
	) );

	$team->add_group_field( $team_field_id, array(
		'name' => __( 'Social Label 3', 'beonepage' ),
		'desc' => __( 'e.g. Twitter, Facebook, LinkedIn, Google Plus.', 'beonepage' ),
		'id'   => 'social_label_3',
		'type' => 'text_small'
	) );

	$team->add_group_field( $team_field_id, array(
		'name' => __( 'Social Link 3', 'beonepage' ),
		'id'   => 'social_url_3',
		'type' => 'text_url'
	) );

	$team->add_group_field( $team_field_id, array(
		'name' => __( 'Social Label 4', 'beonepage' ),
		'desc' => __( 'e.g. Twitter, Facebook, LinkedIn, Google Plus.', 'beonepage' ),
		'id'   => 'social_label_4',
		'type' => 'text_small'
	) );

	$team->add_group_field( $team_field_id, array(
		'name' => __( 'Social Link 4', 'beonepage' ),
		'id'   => 'social_url_4',
		'type' => 'text_url'
	) );
	/* Team Metabox End */
	/* Testimonial Metabox Start */
	$testimonial = new_cmb2_box( array(
		'id'           => $prefix . 'testimonial',
		'title'        => __( 'Testimonial Metabox', 'beonepage' ),
		'object_types' => array( 'page' ),
		'show_on_cb'   => 'beonepage_cmb_show_if_front_page'
	) );
	
	$testimonial->add_field( array(
		'name' => __( 'Title', 'beonepage' ),
		'desc' => __( 'If you want to color the word, just wrap it with "span" tag.', 'beonepage' ),
		'id'   => $prefix .'front_page_testimonial_module_title',
		'type' => 'textarea',			
		'default' => html_entity_decode( Kirki::get_option( 'front_page_testimonial_module_title' ) )
	) );
	$testimonial->add_field( array(
		'name' => __( 'Subtitle', 'beonepage' ),
		'desc' => __( 'If you want to color the word, just wrap it with "span" tag.', 'beonepage' ),
		'id'   => $prefix .'front_page_testimonial_module_subtitle',
		'type' => 'textarea',			
		'default' => html_entity_decode( Kirki::get_option( 'front_page_testimonial_module_subtitle' ) )
	) );

	$testimonial_field_id = $testimonial->add_field( array(
		'id'          => $prefix . 'testimonial',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Testimonial {#}', 'beonepage' ),
			'add_button'    => __( 'Add Another Testimonial', 'beonepage' ),
			'remove_button' => __( 'Remove Testimonial', 'beonepage' ),
			'sortable'      => true
		),
	) );

	$testimonial->add_group_field( $testimonial_field_id, array(
		'name'    => __( 'Client Picture', 'beonepage' ),
		'desc'    => __( 'Upload an image or enter an URL.', 'beonepage' ),
		'id'      => 'img_url',
		'type'    => 'file',
		'options' => array(
			'add_upload_file_text' => __( 'Add or Upload Image', 'beonepage' )
		),
	) );

	$testimonial->add_group_field( $testimonial_field_id, array(
		'name'   => __( 'Client Name', 'beonepage' ),
		'id'     => 'name',
		'type'   => 'text_small'
	) );

	$testimonial->add_group_field( $testimonial_field_id, array(
		'name' => __( 'Addition', 'beonepage' ),
		'desc' => __( 'e.g. company or title.', 'beonepage' ),
		'id'   => 'addition',
		'type' => 'text_small'
	) );

	$testimonial->add_group_field( $testimonial_field_id, array(
		'name' => __( 'Content', 'beonepage' ),
		'id'   => 'description',
		'type' => 'textarea'
	) );
	/* Testimonial Metabox End */

	/* Client Metabox Start */
	$client = new_cmb2_box( array(
		'id'           => $prefix . 'client',
		'title'        => __( 'Client Metabox', 'beonepage' ),
		'object_types' => array( 'page' ),
		'show_on_cb'   => 'beonepage_cmb_show_if_front_page'
	) );

	$client_field_id = $client->add_field( array(
		'id'          => $prefix . 'client',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Client {#}', 'beonepage' ),
			'add_button'    => __( 'Add Another Client', 'beonepage' ),
			'remove_button' => __( 'Remove Client', 'beonepage' ),
			'sortable'      => true
		),
	) );

	$client->add_group_field( $client_field_id, array(
		'name'    => __( 'Client Logo', 'beonepage' ),
		'desc'    => __( 'Upload an image or enter an URL.', 'beonepage' ),
		'id'      => 'img_url',
		'type'    => 'file',
		'options' => array(
			'add_upload_file_text' => __( 'Add or Upload Image', 'beonepage' )
		),
	) );

	$client->add_group_field( $client_field_id, array(
		'name'   => __( 'Client Name', 'beonepage' ),
		'id'     => 'name',
		'type'   => 'text_small'
	) );

	$client->add_group_field( $client_field_id, array(
		'name' => __( 'Client URL', 'beonepage' ),
		'id'   => 'url',
		'type' => 'text_url'
	) );
	/* Client Metabox End */

	/* Pricing Table Metabox Start */
	$pricing_table = new_cmb2_box( array(
		'id'           => $prefix . 'pricing_table',
		'title'        => __( 'Pricing Table Metabox', 'beonepage' ),
		'object_types' => array( 'page' ),
		'show_on_cb'   => 'beonepage_cmb_show_if_front_page'
	) );
	
	$pricing_table->add_field( array(
		'name'    => __( 'Title', 'beonepage' ),
		'desc'    => '',
		'id'      => $prefix . 'front_page_pricing_table_module_title',
		'type'    => 'text',
		'default' => beonepage_olddata_fetch( 'front_page_pricing_table_module_title', 'option' ),
	) );
	
	$pricing_table->add_field( array(
		'name'    => __( 'Subtitle', 'beonepage' ),
		'desc'    => '',
		'id'      => $prefix . 'front_page_pricing_table_module_subtitle',
		'type'    => 'textarea',
		'default' => beonepage_olddata_fetch( 'front_page_pricing_table_module_subtitle', 'option' ),
	) );

	$pricing_table_field_id = $pricing_table->add_field( array(
		'id'          => $prefix . 'pricing_table',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Pricing Table {#}', 'beonepage' ),
			'add_button'    => __( 'Add Another Pricing Table', 'beonepage' ),
			'remove_button' => __( 'Remove Pricing Table', 'beonepage' ),
			'sortable'      => true
		),
	) );

	$pricing_table->add_group_field( $pricing_table_field_id, array(
		'name' => 'Featuring?',
		'desc' => __( 'Featuring a table will mark it with a star.', 'beonepage' ),
		'id'   => 'pick',
		'type' => 'checkbox'
	) );

	$pricing_table->add_group_field( $pricing_table_field_id, array(
		'name'   => __( 'Title', 'beonepage' ),
		'id'     => 'title',
		'type'   => 'text_small'
	) );

	$pricing_table->add_group_field( $pricing_table_field_id, array(
		'name' => __( 'Currency', 'beonepage' ),
		'desc' => __( 'Input your desired currency symbol here. e.g. "$".', 'beonepage' ),
		'id'   => 'currency',
		'type' => 'text_small'
	) );

	$pricing_table->add_group_field( $pricing_table_field_id, array(
		'name' => __( 'Duration', 'beonepage' ),
		'desc' => __( 'If your pricing is subscription based, input the subscription payment cycle here. e.g. monthly.', 'beonepage' ),
		'id'   => 'duration',
		'type' => 'text_small'
	) );

	$pricing_table->add_group_field( $pricing_table_field_id, array(
		'name' => __( 'Price', 'beonepage' ),
		'id'   => 'price',
		'type' => 'text_small'
	) );

	$pricing_table->add_group_field( $pricing_table_field_id, array(
		'name'   => __( 'Button Text', 'beonepage' ),
		'id'     => 'btn_text',
		'type'   => 'text_small'
	) );

	$pricing_table->add_group_field( $pricing_table_field_id, array(
		'name' => __( 'Button URL', 'beonepage' ),
		'id'   => 'btn_url',
		'type' => 'text_url'
	) );

	$pricing_table->add_group_field( $pricing_table_field_id, array(
		'name'             => 'Animation',
		'id'               => 'animation',
		'type'             => 'select',
		'show_option_none' => true,
		'default'          => 'none',
		'options'          => $animate
	) );

	$pricing_table->add_group_field( $pricing_table_field_id, array(
		'name' => __( 'Content', 'beonepage' ),
		'id'   => 'content',
		'desc' => __( 'Input a list of features that are/are not included in the product. Separate items on a new line, and begin with either a + or - symbol: + Included option - Excluded option.', 'beonepage' ),
		'type' => 'wysiwyg'
	) );
	/* Pricing Table Metabox End */
	
	/* Vertical promotion Metabox Start */
	$vertical_promotion = new_cmb2_box( array(
		'id'           => $prefix . 'vertical_promotion',
		'title'        => __( 'Vertical promotion Metabox', 'beonepage' ),
		'object_types' => array( 'page' ),
		'show_on_cb'   => 'beonepage_cmb_show_if_front_page'
	) );

	$vertical_promotion->add_field( array(
		'name' => __( 'Title', 'beonepage' ),
		'desc' => __( 'If you want to color the word, just wrap it with "span" tag.', 'beonepage' ),
		'id'   => $prefix .'front_page_ver_promo_title',
		'type' => 'textarea',
		'default' => html_entity_decode( Kirki::get_option( 'front_page_ver_promo_title' ) )
	) );

	$vertical_promotion->add_field( array(
		'name' => __( 'Subtitle', 'beonepage' ),
		'id'   => $prefix .'front_page_ver_promo_content',
		'type' => 'textarea',			
		'default' => Kirki::get_option( 'front_page_ver_promo_content' )
	) );

	$vertical_promotion->add_field( array(
		'name'   => __( 'Button Text', 'beonepage' ),
		'id'     => $prefix .'front_page_ver_promo_btn_text',
		'type'   => 'text_small',			
		'default' => Kirki::get_option( 'front_page_ver_promo_btn_text' )
	) );

	$vertical_promotion->add_field( array(
		'name' => __( 'Button URL', 'beonepage' ),
		'id'   => $prefix .'front_page_ver_promo_btn_url',
		'type' => 'text_url',			
		'default' => Kirki::get_option( 'front_page_ver_promo_btn_url' )
	) );
	/* Vertical promotion Metabox End */
	
	/* Horizontal promotion Metabox Start */
	$horizontal_promotion = new_cmb2_box( array(
		'id'           => $prefix . 'horizontal_promotion',
		'title'        => __( 'Horizontal promotion Metabox', 'beonepage' ),
		'object_types' => array( 'page' ),
		'show_on_cb'   => 'beonepage_cmb_show_if_front_page'
	) );

	$horizontal_promotion->add_field( array(
		'name' => __( 'Title', 'beonepage' ),
		'desc' => __( 'If you want to color the word, just wrap it with "span" tag.', 'beonepage' ),
		'id'   => $prefix .'front_page_hor_promo_title',
		'type' => 'textarea',
		'default' => html_entity_decode( Kirki::get_option( 'front_page_hor_promo_title' ) )
	) );

	$horizontal_promotion->add_field( array(
		'name' => __( 'Subtitle', 'beonepage' ),
		'id'   => $prefix .'front_page_hor_promo_content',
		'type' => 'textarea',			
		'default' => Kirki::get_option( 'front_page_hor_promo_content' )
	) );

	$horizontal_promotion->add_field( array(
		'name'   => __( 'Button Text', 'beonepage' ),
		'id'     => $prefix .'front_page_hor_promo_btn_text',
		'type'   => 'text_small',
		'default' => Kirki::get_option( 'front_page_hor_promo_btn_text' )
	) );

	$horizontal_promotion->add_field( array(
		'name' => __( 'Button URL', 'beonepage' ),
		'id'   => $prefix .'front_page_hor_promo_btn_url',
		'type' => 'text_url',			
		'default' => Kirki::get_option( 'front_page_hor_promo_btn_url' )
	) );
	/* Horizontal promotion Metabox End */
	
	/* Skill Bar Metabox Start */
	$skill_bar = new_cmb2_box( array(
		'id'           => $prefix . 'skill_bar',
		'title'        => __( 'Skill Bar Metabox', 'beonepage' ),
		'object_types' => array( 'page' ),
		'show_on_cb'   => 'beonepage_cmb_show_if_front_page'
	) );

	$skill_bar->add_field( array(
		'name' => __( 'Title', 'beonepage' ),
		'desc' => __( 'If you want to color the word, just wrap it with "span" tag.', 'beonepage' ),
		'id'   => $prefix .'front_page_skill_bar_module_title',
		'type' => 'textarea',
		'default' => html_entity_decode( Kirki::get_option( 'front_page_skill_bar_module_title' ) )
	) );

	$skill_bar->add_field( array(
		'name' => __( 'Subtitle', 'beonepage' ),
		'id'   => $prefix .'front_page_skill_bar_module_subtitle',
		'type' => 'textarea',			
		'default' => Kirki::get_option( 'front_page_skill_bar_module_subtitle' )
	) );

	$skill_bar->add_field( array(
		'name' => __( 'Content Box', 'beonepage' ),
		'id'   => $prefix .'front_page_skill_bar_module_text',
		'type' => 'wysiwyg',			
		'default' => Kirki::get_option( 'front_page_skill_bar_module_text' )
	) );
	
	$skill_bar_field_id = $skill_bar->add_field( array(
		'id'          => $prefix . 'front_page_skill_bar_module_skill_bar',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Skill Bars {#}', 'beonepage' ),
			'add_button'    => __( 'Add Skill Bar', 'beonepage' ),
			'remove_button' => __( 'Remove Skill Bar', 'beonepage' ),
			'sortable'      => true
		),
	) );

	$skill_bar->add_group_field( $skill_bar_field_id, array(
		'name' => 'Skill bar label',
		'desc' => __( 'Skill bar Label.', 'beonepage' ),
		'id'   => 'skill_bar_label',
		'type' => 'text'
	) );

	$skill_bar->add_group_field( $skill_bar_field_id, array(
		'name' => 'Skill bar Percentage',
		'desc' => __( 'Skill Bar Percentage (e.g. 80%)', 'beonepage' ),
		'id'   => 'skill_bar_pct',
		'type' => 'text'
	) );
	/* Skill Bar Metabox End */
	
	/* Portfolio Meta box Start */
	$portfolio_service_box = new_cmb2_box( array(
		'id'           => $prefix . 'front_page_portfolio_module_cmb',
		'title'        => __( 'Portfolio Metabox', 'beonepage' ),
		'object_types' => array( 'page' ),
		'show_on_cb'   => 'beonepage_cmb_show_if_front_page'
	) );
	
	$portfolio_service_box->add_field( array(
		'name' 	=> __( 'Title', 'beonepage' ),
		'desc' 	=> __( 'If you want to color the word, just wrap it with "span" tag.', 'beonepage' ),
		'id'   	=> $prefix .'front_page_portfolio_module_title',
		'type' 	=> 'textarea_code',
		'default'=> html_entity_decode(Kirki::get_option( 'front_page_portfolio_module_title' )),
	) );

	$portfolio_service_box->add_field( array(
		'name' => __( 'Subtitle', 'beonepage' ),
		'id'   => $prefix .'front_page_portfolio_module_subtitle',
		'type' => 'textarea',
		'default'=> Kirki::get_option( 'front_page_portfolio_module_subtitle' ),
	) );
	
	$portfolio_service_box->add_field( array(
		'name' => __( 'Show All Button Text', 'beonepage' ),
		'id'   => $prefix .'front_page_portfolio_module_all',
		'type' => 'text',
		'default'=> Kirki::get_option( 'front_page_portfolio_module_all' ),
	) );
	/* Portfolio Meta box End */
	
	/* Blog Meta box Start */
	$blog_service_box = new_cmb2_box( array(
		'id'           => $prefix . 'front_page_blog_module_cmb',
		'title'        => __( 'Blog Metabox', 'beonepage' ),
		'object_types' => array( 'page' ),
		'show_on_cb'   => 'beonepage_cmb_show_if_front_page'
	) );
	$blog_service_box->add_field( array(
		'name' => __( 'Title', 'beonepage' ),
		'desc' => __( 'If you want to color the word, just wrap it with "span" tag.', 'beonepage' ),
		'id'   => $prefix .'front_page_blog_module_title',
		'type' => 'textarea_code',
		'default'=> html_entity_decode(Kirki::get_option( 'front_page_blog_module_title' )),
	) );

	$blog_service_box->add_field( array(
		'name' => __( 'Subtitle', 'beonepage' ),
		'id'   => $prefix .'front_page_blog_module_subtitle',
		'type' => 'textarea',
		'default'=> Kirki::get_option( 'front_page_blog_module_subtitle' ),
	) );
	$blog_service_box->add_field( array(
		'name' => __( 'Read More Button Text', 'beonepage' ),
		'id'   => $prefix .'front_page_blog_module_read_more',
		'type' => 'text',
		'default'=> Kirki::get_option( 'front_page_blog_module_read_more' ),
	) );

	$blog_service_box->add_field( array(
		'name' => __( 'View More Button Text', 'beonepage' ),
		'id'   => $prefix .'front_page_blog_module_view_more',
		'type' => 'text',
		'default'=> Kirki::get_option( 'front_page_blog_module_view_more' ),
	) );
	/* Blog Meta box End */
	
	/* Twitter box Start */
	$twitter_box = new_cmb2_box( array(
		'id'           => $prefix . 'twitter_box',
		'title'        => __( 'Twitter Metabox', 'beonepage' ),
		'object_types' => array( 'page' ),
		'show_on_cb'   => 'beonepage_cmb_show_if_front_page'
	) );
	
	$twitter_box->add_field( array(
		'name'   => __( 'Button Text', 'beonepage' ),
		'id'     => $prefix .'front_page_twitter_btn_text',
		'type'   => 'text_small',			
		'default' => Kirki::get_option( 'front_page_twitter_btn_text' )
	) );
	
	$twitter_box->add_field( array(
		'name' => __( 'Button URL', 'beonepage' ),
		'id'   => $prefix .'front_page_twitter_btn_url',
		'type' => 'text_url',			
		'default' => Kirki::get_option( 'front_page_twitter_btn_url' )
	) );
	/* Twitter box End */
	
	/* Mailchip box Start */
	$mailchip_box = new_cmb2_box( array(
		'id'           => $prefix . 'mailchip_box',
		'title'        => __( 'Mailchip Metabox', 'beonepage' ),
		'object_types' => array( 'page' ),
		'show_on_cb'   => 'beonepage_cmb_show_if_front_page'
	) );
	
	$mailchip_box->add_field( array(
		'name' => __( 'Title', 'beonepage' ),
		'desc' => __( 'If you want to color the word, just wrap it with "span" tag.', 'beonepage' ),
		'id'   => $prefix .'front_page_subscribe_title',
		'type' => 'textarea_code',
		'default'=> html_entity_decode(Kirki::get_option( 'front_page_subscribe_title' )),
	) );

	$mailchip_box->add_field( array(
		'name' => __( 'Subtitle', 'beonepage' ),
		'id'   => $prefix .'front_page_subscribe_content',
		'type' => 'textarea',
		'default'=> Kirki::get_option( 'front_page_subscribe_content' ),
	) );
	
	$mailchip_box->add_field( array(
		'name'   => __( 'Button Text', 'beonepage' ),
		'id'     => $prefix .'front_page_subscribe_btn_text',
		'type'   => 'text_small',			
		'default' => Kirki::get_option( 'front_page_subscribe_btn_text' )
	) );
	/* Mailchip box End */
	
	/* Widget Area Start */
	$Widget_box = new_cmb2_box( array(
		'id'           => $prefix . 'Widget_box',
		'title'        => __( 'Widget Promotion', 'beonepage' ),
		'object_types' => array( 'page' ),
		'show_on_cb'   => 'beonepage_cmb_show_if_front_page'
	) );
	 $Widget_box->add_field( array(
		'name' => __( 'Title', 'beonepage' ),
		'desc' => __( 'If you want to color the word, just wrap it with "span" tag.', 'beonepage' ),
		'id'   => $prefix .'front_page_widget_module_title',
		'type' => 'textarea',			
		'default' => html_entity_decode( Kirki::get_option( 'front_page_widget_module_title' ) )
	) );
	
	$Widget_box->add_field( array(
		'name' => __( 'Subtitle', 'beonepage' ),
		'id'   => $prefix .'front_page_widget_module_subtitle',
		'type' => 'textarea',			
		'default' => Kirki::get_option( 'front_page_widget_module_subtitle' )
	) );
	/* Widget Area End */
	
	/* Custom  Area Start */
	$Custom_box = new_cmb2_box( array(
		'id'           => $prefix . 'Custom_box',
		'title'        => __( 'Custom Promotion', 'beonepage' ),
		'object_types' => array( 'page' ),
		'show_on_cb'   => 'beonepage_cmb_show_if_front_page'
	) );
	 $Custom_box->add_field( array(
		'name' => __( 'Title', 'beonepage' ),
		'desc' => __( 'If you want to color the word, just wrap it with "span" tag.', 'beonepage' ),
		'id'   => $prefix .'front_page_custom_module_title',
		'type' => 'textarea',			
		'default' => html_entity_decode( Kirki::get_option( 'front_page_custom_module_title' ) )
	) );
	
	$Custom_box->add_field( array(
		'name' => __( 'Subtitle', 'beonepage' ),
		'id'   => $prefix .'front_page_custom_module_subtitle',
		'type' => 'textarea',			
		'default' => Kirki::get_option( 'front_page_custom_module_subtitle' )
	) );
	
	$Custom_box->add_field( array(
		'name' => __( 'Content Box', 'beonepage' ),
		'id'   => $prefix .'front_page_custom_module_content',
		'type' => 'wysiwyg',			
		'default' => Kirki::get_option( 'front_page_custom_module_content' )
	) );
	/* Custom  Area End */
	
	/* Fun Fact Metabox Start */
	$funfact = new_cmb2_box( array(
		'id'           => $prefix .'funfact',
		'title'        => __( 'Fun Fact Metabox', 'beonepage' ),
		'object_types' => array( 'page' ),
		'show_on_cb'   => 'beonepage_cmb_show_if_front_page',
		'context'      => 'normal',
		'priority'     => 'default'
	) );
	
	$funfact_field_id = $funfact->add_field( array(
		'id'          => $prefix .'front_page_fun_fact_module_fact',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Fun Fact {#}', 'beonepage' ),
			'add_button'    => __( 'Add Another Fun Fact', 'beonepage' ),
			'remove_button' => __( 'Remove Fun Fact', 'beonepage' ),
			'sortable'      => true
		),
	) );
	
	$funfact->add_group_field( $funfact_field_id, array(
		'name'   => __( 'Fact Label', 'beonepage' ),
		'id'     => 'fact_label',
		'type'   => 'text',
	) );
	
	$funfact->add_group_field( $funfact_field_id, array(
		'name'   => __( 'Fact Number', 'beonepage' ),
		'id'     => 'fact_num',
		'type'   => 'text',
	) );
	/* Fun Fact Metabox End */	
}
add_action( 'cmb2_init', 'beonepage_register_metabox' );
