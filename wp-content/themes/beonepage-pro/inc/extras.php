<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package BeOnePage
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function beonepage_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class for front page.
	if ( is_front_page() ) {
		$classes[] = 'front-page';
	}

	return $classes;
}
add_filter( 'body_class', 'beonepage_body_classes' );

/**
 * Get theme version.
 *
 * @return string $theme_version The theme version.
 */
function beonepage_get_version() {
	$theme_info = wp_get_theme();

	// If it's a child theme, then get parent theme.
	if ( is_child_theme() ) {
		$theme_info = wp_get_theme( $theme_info->parent_theme );
	}

	$theme_version = $theme_info->display( 'Version' );

	return $theme_version;
}

/**
 * Register the required plugins for this theme.
 *
 * @link https://github.com/TGMPA/TGM-Plugin-Activation
 */
function beonepage_register_required_plugins() {
	// Required plugin.
	$plugins = array(
		array(
			'name'               => 'BeOnePage Pro Plugin',
			'slug'               => 'beonepage-pro-plugin',
			'source'             => get_template_directory_uri() . '/plugins/beonepage-pro-plugin.zip',
			'required'           => true,
			'version'            => '1.2.5',
			'force_activation'   => true,
			'force_deactivation' => true
		),
		array(
			'name'               => 'WooCommerce',
			'slug'               => 'woocommerce',
		),
		array(
			'name'               => 'One Click Importer',
			'slug'               => 'one-click-demo-import',
		),
		array(
			'name'               => 'Redux',
			'slug'               => 'redux-framework',
			'required'           => true,
			'force_activation'   => true,
		),
		array(
			'name'               => 'Elementor Page Builder',
			'slug'               => 'elementor',
		),
		array(
			'name'               => 'Cookie Notice for GDPR',
			'slug'               => 'cookie-notice',
		)
	);

	// Array of configuration settings.
	$config = array(
		'id'           => 'beonepage_tgmpa',
		'default_path' => '',
		'menu'         => 'beonepage-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'is_automatic' => true
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'beonepage_register_required_plugins' );

/**
 * Only show blog posts and products in search results.
 *
 * @param array $query The WP_Query object.
 */

function beonepage_search_filter( $query ) {
    if ( ! is_admin() && $query->is_main_query() ) {
		if ( isset( $query->query['post_type'] ) ) {
			$wc_post_type = 'product';
		} else {
			$wc_post_type = '';
		}

		if ( $query->is_search && ( $post_type = '' || $wc_post_type != 'product' ) ) {
			$query->set( 'post_type', array( 'post' ) );
		}
	}
}
add_filter( 'pre_get_posts', 'beonepage_search_filter' );

/**
 * Get the current URL of the page being viewed.
 *
 * @global object $wp
 * @return string $current_url Current URL.
 */
function beonepage_get_current_url() {
	global $wp;

	if ( empty( $_SERVER['QUERY_STRING'] ) )
		$current_url = trailingslashit( home_url( $wp->request ) );
	else
		$current_url = add_query_arg( $_SERVER['QUERY_STRING'], '', trailingslashit( home_url( $wp->request ) ) );

	return $current_url;
}

/**
 * Change the excerpt length.
 */
function beonepage_custom_excerpt_length( $length ) {
	return 60;
}
add_filter( 'excerpt_length', 'beonepage_custom_excerpt_length', 999 );

/**
 * Change the excerpt more string at the end.
 */
function beonepage_new_excerpt_more( $more ) {
	return ' &hellip;';
}
add_filter( 'excerpt_more', 'beonepage_new_excerpt_more' );

/**
 * Include the Portfolio details template.
 */
function beonepage_ajax_portfolio() {
	get_template_part( 'template-parts/content', 'ajax-portfolio' );

	wp_die();
}
add_action( 'wp_ajax_ajax_portfolio', 'beonepage_ajax_portfolio' );
add_action( 'wp_ajax_nopriv_ajax_portfolio', 'beonepage_ajax_portfolio' );

/**
 * Add page loading transition.
 *
 * @param array $classes
 * @return array $classes
 */

if (beOneKirki::get_option( 'general_page_transition' ) == '1') {
	// Add page loading transition class to body.
	function beonepage_add_animsition_class( $classes ) {
		$classes[] = 'animsition';
		return $classes;
	}
	//add_filter( 'body_class', 'beonepage_add_animsition_class' );

	// Enqueue styles and script for page loading transition.
	function beonepage_add_animsition_style_script() {
		wp_enqueue_style( 'beonepage-spinner-style', get_template_directory_uri() . '/layouts/loaders.css', array(), '20150816' );
		wp_enqueue_style( 'beonepage-animsition-style', get_template_directory_uri() . '/layouts/animsition.min.css', array(), '4.0.0' );
		wp_enqueue_script( 'beonepage-animsition-script', get_template_directory_uri() . '/js/animsition.min.js', array(), '4.0.0' );
	}
	add_action( 'wp_enqueue_scripts', 'beonepage_add_animsition_style_script' );
}

/**
 * Get attachment ID by URL.
 *
 * @param string $url The URL to resolve.
 * @return int $post_id The found post ID.
 */
function beonepage_get_attachment_id_by_url( $url ) {
	global $wpdb;

	$dir = wp_upload_dir();
	$path = $url;

    if ( strpos( $path, $dir['baseurl'] . '/' ) === 0 ) {
		$path = substr( $path, strlen( $dir['baseurl'] . '/' ) );
    }

    $sql = $wpdb->prepare(
		"SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_wp_attached_file' AND meta_value = %s",
		$path
    );

    $post_id = $wpdb->get_var( $sql );

    if ( !empty( $post_id ) ) {
		return (int) $post_id;
    }
}

/**
 * Send mail using wp_mail().
 */
function beonepage_contact_send_message() {
	if ( ! wp_verify_nonce( $_POST['ajax_contact_form_nonce'], 'ajax_contact_form' ) ) {
		$msg = array( 'error' => __( 'Verification error. Try again!', 'beonepage' ) );
	} else {
		$receiver_email=Kirki::get_option( 'front_page_contact_module_email' );
		if( $receiver_email &&  trim($receiver_email)!=''){
		$to		  =	$receiver_email;
		}else{
		$to       = get_option( 'admin_email' );
		}
		$name     = sanitize_text_field( $_POST['name'] );
		$email    = sanitize_email( $_POST['email'] );
		$phone    = sanitize_text_field( $_POST['phone'] );
		$subject  = sanitize_text_field( $_POST['subject'] );
		$message  = sanitize_text_field( $_POST['message'] );
		$headers  = 'From: ' . $name . ' <' . $email . '>' . "\r\n";
		$headers .= "Reply-To: $email\r\n";

		if ( $phone != '' ) {
			$subject .= ', from: ' . $name . ', ' . __( 'phone', 'beonepage' ) . ': ' . $phone ;
		}

		// Send the email using wp_mail().
		if ( wp_mail( $to, $subject, $message, $headers ) ) {
			$msg = array( 'success' => __( 'Thank you. The Mailman is on his way!', 'beonepage' ) );
		} else {
			$msg = array( 'error' => __( "Sorry, don't know what 	happened. Try later!", 'beonepage' ) );
		}
	}

	wp_send_json( $msg );
}
add_action( 'wp_ajax_contact_form', 'beonepage_contact_send_message' );
add_action( 'wp_ajax_nopriv_contact_form', 'beonepage_contact_send_message' );


/**
 * MailChimp subscribe.
 */
if ( class_exists( 'beOnePageProPlugin' ) ) {
	function beonepage_mailchimp_subscribe() {
	    $front_page_subscribe_mailchimp_api_post_meta = 'yes';
	    $front_page_subscribe_mailchimp_api_kirki = 'yes';
		if(get_post_meta( $_POST['page_id'], 'front_page_subscribe_mailchimp_api_new', true ) == '' || get_post_meta( $_POST['page_id'], 'front_page_subscribe_mailchimp_list_new', true ) == '' ){
			$front_page_subscribe_mailchimp_api_post_meta = '';
		}else{
			 $front_page_subscribe_mailchimp_api_post_meta = 'yes';
		}
		if(Kirki::get_option( 'front_page_subscribe_mailchimp_api' ) == '' || Kirki::get_option( 'front_page_subscribe_mailchimp_list' ) == ''){
			$front_page_subscribe_mailchimp_api_kirki = '';
		}else{
			$front_page_subscribe_mailchimp_api_kirki = 'yes';
		}
	 if ( ! wp_verify_nonce( $_POST['ajax_subscribe_form_nonce'], 'ajax_subscribe_form' ) ) {
			$msg = array( 'error' => __( 'Verification error. Try again!', 'beonepage' ) );
		} elseif ( $front_page_subscribe_mailchimp_api_post_meta == '' &&  $front_page_subscribe_mailchimp_api_kirki == '') {
			$msg = array( 'error' => __( 'Not properly configured, please check your settings.', 'beonepage' ) );
		} else {
			$beonepage_subscribe_mailchimp_api =  get_post_meta( $_POST['page_id'], 'front_page_subscribe_mailchimp_api_new', true );
			if(!empty($beonepage_subscribe_mailchimp_api)){
				$api_key = get_post_meta( $_POST['page_id'], 'front_page_subscribe_mailchimp_api_new', true );
			}else{
				$api_key = Kirki::get_option( 'front_page_subscribe_mailchimp_api' );
			}
			$beonepage_subscribe_mailchimp_list_new =  get_post_meta( $_POST['page_id'], 'front_page_subscribe_mailchimp_list_new', true );
			if(!empty($beonepage_subscribe_mailchimp_list_new)){
				$list_id = get_post_meta( $_POST['page_id'], 'front_page_subscribe_mailchimp_list_new', true );
			}else{
				$list_id = Kirki::get_option( 'front_page_subscribe_mailchimp_list' );
			}
			$mailchimp = new Mailchimp( $api_key );

			try {
				$subscriber = $mailchimp->lists->subscribe( $list_id, array( 'email' => sanitize_email( $_POST['email'] ) ) );
			}

			catch ( Exception $e ) {
				$result = $e->getMessage();
			}

			if ( ! empty( $subscriber['leid'] ) ) {
				$msg = array( 'success' => __( 'Thanks, we will be in touch!', 'beonepage' ) );
			} else {
				$msg = array( 'error' => $result );
			}
		}

		wp_send_json( $msg );
	}
	add_action( 'wp_ajax_subscribe_form', 'beonepage_mailchimp_subscribe' );
	add_action( 'wp_ajax_nopriv_subscribe_form', 'beonepage_mailchimp_subscribe' );
}

/**
 * Add numeric pagination.
 */
function beonepage_numeric_pagination( $pages = '', $range = 2 ) {
     $showitems = ( $range * 2 ) + 1;

     global $paged;

     if ( empty( $paged ) ) $paged = 1;

     if ( $pages == '' ) {
		global $wp_query;

		$pages = $wp_query->max_num_pages;

		if ( ! $pages ) {
			$pages = 1;
		}
	}

	if ( $pages != 1 ) {
		echo '<nav class="posts-navigation text-center hidden-xs clearfix" role="navigation">';
		echo '<ul>';

		if( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
			echo '<li><a href=' . get_pagenum_link( 1 ) . '>' . esc_html__( 'First', 'beonepage' ) . '</a></li>';
		}

		if( $paged > 1 && $showitems < $pages ) {
			echo '<li><a href=' . get_pagenum_link( $paged - 1 ) . '>' . esc_html__( 'Prev', 'beonepage' ) . '</a></li>';
		}

		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
				echo ( $paged == $i ) ? '<li class="active"><a href=' . get_pagenum_link( $i ) . '>' . $i . '</a></li>' : '<li><a href=' . get_pagenum_link( $i ) . '>' . $i . '</a></li>';
			}
		}

		if ( $paged < $pages && $showitems < $pages) {
			echo '<li><a href=' . get_pagenum_link( $paged + 1 ) . '>' . esc_html__( 'Next', 'beonepage' ) . '</a></li>';
		}

		if ( $paged < $pages - 1 &&  $pages > $paged + $range - 1 && $showitems < $pages ) {
			echo '<li><a href=' . get_pagenum_link( $pages ) . '>' . esc_html__( 'Last', 'beonepage' ) . '</a></li>';
		}

		echo '</ul>';
		echo '</nav>';
	}
}

/**
 * Get images attached to post.
 *
 * @param int $post_id The post ID.
 * @return array $images The image posts.
 */
function beonepage_get_post_images( $post_id ) {
	$args = array();
	$defaults = array(
		'numberposts'    => -1,
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
		'post_mime_type' => 'image',
		'post_parent'    =>  $post_id,
		'post_type'      => 'attachment',
	);

	$args = wp_parse_args( $args, $defaults );
	$images = get_posts( $args );

	return $images;
}

/**
 * Set/unset post formats.
 *
 * @param int $post_id The post ID.
 */
function beonepage_set_post_type( $post_id ) {
	global $pagenow;

	if ( in_array( $pagenow, array( 'post.php', 'post-new.php' ) ) ) {
		if ( get_post_type( $post_id ) == 'post' ) {
			if ( get_post_meta( $post_id, '_beonepage_option_post_embed_src', true ) == 'audio' ) {
				set_post_format( $post->ID, 'audio' );
			} elseif ( get_post_meta( $post_id, '_beonepage_option_post_embed_src', true ) == 'video' ) {
				set_post_format( $post->ID, 'video' );
			} elseif ( count( beonepage_get_post_images ( $post_id ) ) > 1 ) {
				set_post_format( $post->ID, 'gallery' );
			} elseif ( has_post_thumbnail( $post_id ) ) {
				set_post_format( $post->ID, 'image' );
			} elseif (  has_post_thumbnail( $post_id ) ) {
				set_post_format( $post->ID, '' );
			}
		}
	}
}
add_action( 'save_post', 'beonepage_set_post_type', 10, 3 );

/**ost-format-gallery/
 * Remove WordPress Admin Bar style from header.
 */
function beonepage_remove_admin_bar_style() {
	remove_action( 'wp_head', '_admin_bar_bump_cb' );
}
add_action( 'get_header', 'beonepage_remove_admin_bar_style' );

/**
 * Remove Recent Comments Widget style from header.
 */
function beonepage_remove_recent_comments_style() {
	global $wp_widget_factory;

	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'beonepage_remove_recent_comments_style' );

/**
 * Change the font size for Tag Cloud widget.
 */
function beonepage_custom_tag_cloud_font( $args ) {
	$custom_args = array( 'smallest' => 10, 'largest' => 10 );
	$args = wp_parse_args( $args, $custom_args );

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'beonepage_custom_tag_cloud_font' );

/**
 * Hide editor on Front Page.
 *
 */
function beonepage_hide_editor() {
	global $pagenow, $post;

	if ( ! ( $pagenow == 'post.php' ) ) {
		return;
	}

	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];

	if ( ! isset( $post_id ) ) {
		return;
	};

	if ( $post_id == get_option( 'page_on_front' ) ) {
		remove_post_type_support( 'page', 'editor' );
	}
}
add_action( 'admin_head', 'beonepage_hide_editor' );

/**
 * Update option after Customizer save.
 */
function beonepage_customize_save_after() {
	update_option( 'blogname', Kirki::get_option( 'icon_logo_title' ) );

	if ( Kirki::get_option( 'general_front_page' ) != '0' ) {
		update_option( 'show_on_front ', 'page' );
		update_option( 'page_on_front', Kirki::get_option( 'general_front_page' ) );
		update_option( 'page_for_posts', Kirki::get_option( 'general_posts_page' ) );
	}
}
add_action( 'customize_save_after', 'beonepage_customize_save_after' );

/**
 * Set option data when Customizer controls are initialized.
 */
function beonepage_customize_controls_init() {
	set_theme_mod( 'icon_logo_title', get_bloginfo( 'name' ) );
	set_theme_mod( 'general_front_page', get_option( 'page_on_front' ) );
	set_theme_mod( 'general_posts_page', get_option( 'page_for_posts' ) );
}
add_action( 'customize_controls_init', 'beonepage_customize_controls_init' );

/**
 * Enqueue scripts and styles for admin pages.
 */
function beonepage_admin_scripts() {
	global $pagenow;

	if ( ! is_admin() ) {
		return;
	}

	if ( in_array( $pagenow, array( 'nav-menus.php', 'post.php', 'post-new.php' ) ) ) {
		wp_enqueue_script( 'beonepage-admin-script', get_template_directory_uri() . '/js/admin.js', array(), beonepage_get_version(), true );
	}

	// Localize the script with new data.
	wp_localize_script( 'beonepage-admin-script', 'admin_vars', array(
		'screen'         => $pagenow,
		's_icon_found'   => esc_html__( 'icon found.', 'beonepage' ),
		'p_icons_found'  => esc_html__( 'icons found.', 'beonepage' ),
		'no_icons_found' => esc_html__( 'No icons found.', 'beonepage' )
	) );
}
add_action( 'admin_enqueue_scripts', 'beonepage_admin_scripts' );

/**
 * Get tweets class.
 */

if ( class_exists( 'beOnePageProPlugin' ) ) {
	class beOnePageTwitterModule {
	/* Return Tweets */

		public function getTweets() {
			$config = array();
			$config['count'] = 5;
			$beonepage_front_page_twitter_twitter_username_new =  get_post_meta( get_the_ID(), 'front_page_twitter_twitter_username_new', true );
			if(!empty($beonepage_front_page_twitter_twitter_username_new)){
			$config['username'] = get_post_meta( get_the_ID(), 'front_page_twitter_twitter_username_new', true );
			}else{
			$config['username'] = Kirki::get_option( 'front_page_twitter_twitter_username' );
			}
			$beonepage_front_page_twitter_twitter_tat_new =  get_post_meta( get_the_ID(), 'front_page_twitter_twitter_tat_new', true );
			if(!empty($beonepage_front_page_twitter_twitter_tat_new)){
			$config['access_token'] = get_post_meta( get_the_ID(), 'front_page_twitter_twitter_tat_new', true );
			}else{
			$config['access_token'] = Kirki::get_option( 'front_page_twitter_twitter_tat' );
			}
			$beonepage_front_page_twitter_twitter_tats_new =  get_post_meta( get_the_ID(), 'front_page_twitter_twitter_tats_new', true );
			if(!empty($beonepage_front_page_twitter_twitter_tats_new)){
			$config['access_token_secret'] = get_post_meta( get_the_ID(), 'front_page_twitter_twitter_tats_new', true );
			}else{
				$config['access_token_secret'] = Kirki::get_option( 'front_page_twitter_twitter_tats' );
			}

			$beonepage_front_page_twitter_twitter_tck_new =  get_post_meta( get_the_ID(), 'front_page_twitter_twitter_tck_new', true );
			if(!empty($beonepage_front_page_twitter_twitter_tck_new)){
			$config['consumer_key'] = get_post_meta( get_the_ID(), 'front_page_twitter_twitter_tck_new', true );
			}else{
				$config['consumer_key'] = Kirki::get_option( 'front_page_twitter_twitter_tck' );
			}
			$beonepage_front_page_twitter_twitter_tcs_new =  get_post_meta( get_the_ID(), 'front_page_twitter_twitter_tcs_new', true );
			if(!empty($beonepage_front_page_twitter_twitter_tcs_new)){
			$config['consumer_key_secret'] = get_post_meta( get_the_ID(), 'front_page_twitter_twitter_tcs_new', true );
			}else{
				$config['consumer_key_secret'] = Kirki::get_option( 'front_page_twitter_twitter_tcs' );
			}
			$transient = $config['username'];
			$result = get_transient( $transient );
			$error = esc_html__( 'Not properly configured, please check your settings.', 'beonepage' );

			if ( empty( $config['username'] ) || empty( $config['access_token'] ) || empty( $config['access_token_secret'] ) || empty( $config['consumer_key'] ) || empty( $config['consumer_key_secret'] ) ) {
				return array( 'error' => $error );
			}

			if ( ! $result ) {
				$results = $this->oauthRetrieveTweets( $config );

				if ( isset( $results->errors ) ) {
					return array( 'error' => $error );
				} else {
					$result = $this->parseTweets( $results );
					set_transient( $transient, $result, 300 );
				}
			} else {
				if ( is_string( $result ) )
					unserialize( $result );
			}

			return $result;
		}

		/* OAUTH - API 1.1 */
		private function oauthRetrieveTweets( $config ) {
			$options = array(
				'trim_user' => true,
				'exclude_replies' => false,
				'include_rts' => true,
				'count' => $config['count'],
				'screen_name' => $config['username']
			);

			$connection = new Abraham\TwitterOAuth\TwitterOAuth( $config['consumer_key'], $config['consumer_key_secret'], $config['access_token'], $config['access_token_secret'] );
			$result = $connection->get( 'statuses/user_timeline', $options );

			return $result;
		}

		/* Parse / Sanitize */
		public function parseTweets( $results = array() ) {
			$tweets = array();

			foreach( $results as $result ) {
				$timestamp = $result->created_at;

				$tweets[] = array(
					'id'        => $result->id_str,
					'text'      => filter_var( $result->text, FILTER_SANITIZE_STRING ),
					'timestamp' => $timestamp
				);
			}

			return $tweets;
		}

		/* Change Text To Link */
		private function changeTextLink( $matches ) {
			return '<a href="' . $matches[0] . '" target="_blank">' . $matches[0] . '</a>';
		}

		/* Change Hashtag To Link */
		private function changeHashtagLink( $matches ) {
			return '<a href="http://twitter.com/hashtag/' . str_replace( '#', '', $matches[0] ) . '" target="_blank">' . $matches[0] . '</a>';
		}

		/* Username Link */
		private function changeUserLink( $matches ) {
			return '<a href="http://twitter.com/' . str_replace( '@', '', $matches[0] ) . '" target="_blank">' . $matches[0] . '</a>';
		}

		/* Convert Links */
		public function link_replace( $text ) {
			$string = preg_replace_callback( "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\w+)?/", array( &$this, 'changeTextLink' ), $text );
			$string = preg_replace_callback( "/(?<!&)#(\w+)/", array( &$this, 'changeHashtagLink' ), $string );
			$string = preg_replace_callback( '/@([A-Za-z0-9_]{1,15})/', array( &$this, 'changeUserLink' ), $string );

			return $string;
		}

		/* Convert Time Format */
		public function changeTimeFormat( $date ) {
			// Array of time period chunks.
			$chunks = array(
				array( 60 * 60 * 24 * 365 , esc_html__( 'year', 'beonepage' ), esc_html__( 'years', 'beonepage' ) ),
				array( 60 * 60 * 24 * 30 , esc_html__( 'month', 'beonepage' ), esc_html__( 'months', 'beonepage' ) ),
				array( 60 * 60 * 24 * 7, esc_html__( 'week', 'beonepage' ), esc_html__( 'weeks', 'beonepage' ) ),
				array( 60 * 60 * 24 , esc_html__( 'day', 'beonepage' ), esc_html__( 'days', 'beonepage' ) ),
				array( 60 * 60 , esc_html__( 'hour', 'beonepage' ), esc_html__( 'hours', 'beonepage' ) ),
				array( 60 , esc_html__( 'minute', 'beonepage' ), esc_html__( 'minutes', 'beonepage' ) ),
				array( 1, esc_html__( 'second', 'beonepage' ), esc_html__( 'seconds', 'beonepage' ) )
			);

			$current_time = strtotime( current_time( 'mysql', 1 ) );

			// Difference in seconds.
			$since = $current_time - $date;

			// Something went wrong with date calculation and we ended up with a negative date.
			if ( $since < 0 )
				return esc_html__( 'sometime', 'beonepage' );

			// The first chunk.
			for ( $i = 0, $j = count( $chunks ); $i < $j; $i++ ) {
				$seconds = $chunks[$i][0];

				// Finding the biggest chunk (if the chunk fits, break).
				if ( ( $count = floor( $since / $seconds ) ) != 0 )
					break;
			}

			// Set output var.
			$output = ( $count == 1 ) ? '1 '. $chunks[$i][1] : $count . ' ' . $chunks[$i][2];

			if ( ! (int)trim( $output ) ) {
				$output = '0 ' . esc_html__( 'seconds', 'beonepage' );
			}

			$output .= esc_html__( ' ago', 'beonepage' );

			return $output;
		}
	}
}

/**
 * Get font icons list.
 *
 * @return array $font_icons
 */
function beonepage_icon_list() {
	$font_icons = array(
		'500px', 'address-book', 'address-book-o', 'address-card', 'address-card-o', 'adjust', 'adn', 'align-center', 'align-justify', 'align-left', 'align-right', 'amazon', 'ambulance', 'american-sign-language-interpreting', 'anchor', 'android', 'angellist', 'angle-double-down', 'angle-double-left', 'angle-double-right', 'angle-double-up', 'angle-down', 'angle-left', 'angle-right', 'angle-up', 'apple', 'archive', 'area-chart', 'arrow-circle-down', 'arrow-circle-left', 'arrow-circle-o-down', 'arrow-circle-o-left', 'arrow-circle-o-right', 'arrow-circle-o-up', 'arrow-circle-right', 'arrow-circle-up', 'arrow-down', 'arrow-left', 'arrow-right', 'arrow-up', 'arrows', 'arrows-alt', 'arrows-h', 'arrows-v', 'asl-interpreting', 'assistive-listening-systems', 'asterisk', 'at', 'audio-description', 'automobile', 'backward', 'balance-scale', 'ban', 'bandcamp', 'bank', 'bar-chart', 'bar-chart-o', 'barcode', 'bars', 'bath', 'bathtub', 'battery', 'battery-0', 'battery-1', 'battery-2', 'battery-3', 'battery-4', 'battery-empty', 'battery-full', 'battery-half', 'battery-quarter', 'battery-three-quarters', 'bed', 'beer', 'behance', 'behance-square', 'bell', 'bell-o', 'bell-slash', 'bell-slash-o', 'bicycle', 'binoculars', 'birthday-cake', 'bitbucket', 'bitbucket-square', 'bitcoin', 'black-tie', 'blind', 'bluetooth', 'bluetooth-b', 'bold', 'bolt', 'bomb', 'book', 'bookmark', 'bookmark-o', 'braille', 'briefcase', 'btc', 'bug', 'building', 'building-o', 'bullhorn', 'bullseye', 'bus', 'buysellads', 'cab', 'calculator', 'calendar', 'calendar-check-o', 'calendar-minus-o', 'calendar-o', 'calendar-plus-o', 'calendar-times-o', 'camera', 'camera-retro', 'car', 'caret-down', 'caret-left', 'caret-right', 'caret-square-o-down', 'caret-square-o-left', 'caret-square-o-right', 'caret-square-o-up', 'caret-up', 'cart-arrow-down', 'cart-plus', 'cc', 'cc-amex', 'cc-diners-club', 'cc-discover', 'cc-jcb', 'cc-mastercard', 'cc-paypal', 'cc-stripe', 'cc-visa', 'certificate', 'chain', 'chain-broken', 'check', 'check-circle', 'check-circle-o', 'check-square', 'check-square-o', 'chevron-circle-down', 'chevron-circle-left', 'chevron-circle-right', 'chevron-circle-up', 'chevron-down', 'chevron-left', 'chevron-right', 'chevron-up', 'child', 'chrome', 'circle', 'circle-o', 'circle-o-notch', 'circle-thin', 'clipboard', 'clock-o', 'clone', 'close', 'cloud', 'cloud-download', 'cloud-upload', 'cny', 'code', 'code-fork', 'codepen', 'codiepie', 'coffee', 'cog', 'cogs', 'columns', 'comment', 'comment-o', 'commenting', 'commenting-o', 'comments', 'comments-o', 'compass', 'compress', 'connectdevelop', 'contao', 'copy', 'copyright', 'creative-commons', 'credit-card', 'credit-card-alt', 'crop', 'crosshairs', 'css3', 'cube', 'cubes', 'cut', 'cutlery', 'dashboard', 'dashcube', 'database', 'deaf', 'deafness', 'dedent', 'delicious', 'desktop', 'deviantart', 'diamond', 'digg', 'dollar', 'dot-circle-o', 'download', 'dribbble', 'drivers-license', 'drivers-license-o', 'dropbox', 'drupal', 'edge', 'edit', 'eercast', 'eject', 'ellipsis-h', 'ellipsis-v', 'empire', 'envelope', 'envelope-o', 'envelope-open', 'envelope-open-o', 'envelope-square', 'envira', 'eraser', 'etsy', 'eur', 'euro', 'exchange', 'exclamation', 'exclamation-circle', 'exclamation-triangle', 'expand', 'expeditedssl', 'external-link', 'external-link-square', 'eye', 'eye-slash', 'eyedropper', 'fa', 'facebook', 'facebook-f', 'facebook-official', 'facebook-square', 'fast-backward', 'fast-forward', 'fax', 'feed', 'female', 'fighter-jet', 'file', 'file-archive-o', 'file-audio-o', 'file-code-o', 'file-excel-o', 'file-image-o', 'file-movie-o', 'file-o', 'file-pdf-o', 'file-photo-o', 'file-picture-o', 'file-powerpoint-o', 'file-sound-o', 'file-text', 'file-text-o', 'file-video-o', 'file-word-o', 'file-zip-o', 'files-o', 'film', 'filter', 'fire', 'fire-extinguisher', 'firefox', 'first-order', 'flag', 'flag-checkered', 'flag-o', 'flash', 'flask', 'flickr', 'floppy-o', 'folder', 'folder-o', 'folder-open', 'folder-open-o', 'font', 'font-awesome', 'fonticons', 'fort-awesome', 'forumbee', 'forward', 'foursquare', 'free-code-camp', 'frown-o', 'futbol-o', 'gamepad', 'gavel', 'gbp', 'ge', 'gear', 'gears', 'genderless', 'get-pocket', 'gg', 'gg-circle', 'gift', 'git', 'git-square', 'github', 'github-alt', 'github-square', 'gitlab', 'gittip', 'glass', 'glide', 'glide-g', 'globe', 'google', 'google-plus', 'google-plus-circle', 'google-plus-official', 'google-plus-square', 'google-wallet', 'graduation-cap', 'gratipay', 'grav', 'group', 'h-square', 'hacker-news', 'hand-grab-o', 'hand-lizard-o', 'hand-o-down', 'hand-o-left', 'hand-o-right', 'hand-o-up', 'hand-paper-o', 'hand-peace-o', 'hand-pointer-o', 'hand-rock-o', 'hand-scissors-o', 'hand-spock-o', 'hand-stop-o', 'handshake-o', 'hard-of-hearing', 'hashtag', 'hdd-o', 'header', 'headphones', 'heart', 'heart-o', 'heartbeat', 'history', 'home', 'hospital-o', 'hotel', 'hourglass', 'hourglass-1', 'hourglass-2', 'hourglass-3', 'hourglass-end', 'hourglass-half', 'hourglass-o', 'hourglass-start', 'houzz', 'html5', 'i-cursor', 'id-badge', 'id-card', 'id-card-o', 'ils', 'image', 'imdb', 'inbox', 'indent', 'industry', 'info', 'info-circle', 'inr', 'instagram', 'institution', 'internet-explorer', 'intersex', 'ioxhost', 'italic', 'joomla', 'jpy', 'jsfiddle', 'key', 'keyboard-o', 'krw', 'language', 'laptop', 'lastfm', 'lastfm-square', 'leaf', 'leanpub', 'legal', 'lemon-o', 'level-down', 'level-up', 'life-bouy', 'life-buoy', 'life-ring', 'life-saver', 'lightbulb-o', 'line-chart', 'link', 'linkedin', 'linkedin-square', 'linode', 'linux', 'list', 'list-alt', 'list-ol', 'list-ul', 'location-arrow', 'lock', 'long-arrow-down', 'long-arrow-left', 'long-arrow-right', 'long-arrow-up', 'low-vision', 'magic', 'magnet', 'mail-forward', 'mail-reply', 'mail-reply-all', 'male', 'map', 'map-marker', 'map-o', 'map-pin', 'map-signs', 'mars', 'mars-double', 'mars-stroke', 'mars-stroke-h', 'mars-stroke-v', 'maxcdn', 'meanpath', 'medium', 'medkit', 'meetup', 'meh-o', 'mercury', 'microchip', 'microphone', 'microphone-slash', 'minus', 'minus-circle', 'minus-square', 'minus-square-o', 'mixcloud', 'mobile', 'mobile-phone', 'modx', 'money', 'moon-o', 'mortar-board', 'motorcycle', 'mouse-pointer', 'music', 'navicon', 'neuter', 'newspaper-o', 'object-group', 'object-ungroup', 'odnoklassniki', 'odnoklassniki-square', 'opencart', 'openid', 'opera', 'optin-monster', 'outdent', 'pagelines', 'paint-brush', 'paper-plane', 'paper-plane-o', 'paperclip', 'paragraph', 'paste', 'pause', 'pause-circle', 'pause-circle-o', 'paw', 'paypal', 'pencil', 'pencil-square', 'pencil-square-o', 'percent', 'phone', 'phone-square', 'photo', 'picture-o', 'pie-chart', 'pied-piper', 'pied-piper-alt', 'pied-piper-pp', 'pinterest', 'pinterest-p', 'pinterest-square', 'plane', 'play', 'play-circle', 'play-circle-o', 'plug', 'plus', 'plus-circle', 'plus-square', 'plus-square-o', 'podcast', 'power-off', 'print', 'product-hunt', 'puzzle-piece', 'qq', 'qrcode', 'question', 'question-circle', 'question-circle-o', 'quora', 'quote-left', 'quote-right', 'ra', 'random', 'ravelry', 'rebel', 'recycle', 'reddit', 'reddit-alien', 'reddit-square', 'refresh', 'registered', 'remove', 'renren', 'reorder', 'repeat', 'reply', 'reply-all', 'resistance', 'retweet', 'rmb', 'road', 'rocket', 'rotate-left', 'rotate-right', 'rouble', 'rss', 'rss-square', 'rub', 'ruble', 'rupee', 's15', 'safari', 'save', 'scissors', 'scribd', 'search', 'search-minus', 'search-plus', 'sellsy', 'send', 'send-o', 'server', 'share', 'share-alt', 'share-alt-square', 'share-square', 'share-square-o', 'shekel', 'sheqel', 'shield', 'ship', 'shirtsinbulk', 'shopping-bag', 'shopping-basket', 'shopping-cart', 'shower', 'sign-in', 'sign-language', 'sign-out', 'signal', 'signing', 'simplybuilt', 'sitemap', 'skyatlas', 'skype', 'slack', 'sliders', 'slideshare', 'smile-o', 'snapchat', 'snapchat-ghost', 'snapchat-square', 'snowflake-o', 'soccer-ball-o', 'sort', 'sort-alpha-asc', 'sort-alpha-desc', 'sort-amount-asc', 'sort-amount-desc', 'sort-asc', 'sort-desc', 'sort-down', 'sort-numeric-asc', 'sort-numeric-desc', 'sort-up', 'soundcloud', 'space-shuttle', 'spinner', 'spoon', 'spotify', 'square', 'square-o', 'stack-exchange', 'stack-overflow', 'star', 'star-half', 'star-half-empty', 'star-half-full', 'star-half-o', 'star-o', 'steam', 'steam-square', 'step-backward', 'step-forward', 'stethoscope', 'sticky-note', 'sticky-note-o', 'stop', 'stop-circle', 'stop-circle-o', 'street-view', 'strikethrough', 'stumbleupon', 'stumbleupon-circle', 'subscript', 'subway', 'suitcase', 'sun-o', 'superpowers', 'superscript', 'support', 'table', 'tablet', 'tachometer', 'tag', 'tags', 'tasks', 'taxi', 'telegram', 'television', 'tencent-weibo', 'terminal', 'text-height', 'text-width', 'th', 'th-large', 'th-list', 'themeisle', 'thermometer', 'thermometer-0', 'thermometer-1', 'thermometer-2', 'thermometer-3', 'thermometer-4', 'thermometer-empty', 'thermometer-full', 'thermometer-half', 'thermometer-quarter', 'thermometer-three-quarters', 'thumb-tack', 'thumbs-down', 'thumbs-o-down', 'thumbs-o-up', 'thumbs-up', 'ticket', 'times', 'times-circle', 'times-circle-o', 'times-rectangle', 'times-rectangle-o', 'tint', 'toggle-down', 'toggle-left', 'toggle-off', 'toggle-on', 'toggle-right', 'toggle-up', 'trademark', 'train', 'transgender', 'transgender-alt', 'trash', 'trash-o', 'tree', 'trello', 'tripadvisor', 'trophy', 'truck', 'try', 'tty', 'tumblr', 'tumblr-square', 'turkish-lira', 'tv', 'twitch', 'twitter', 'twitter-square', 'umbrella', 'underline', 'undo', 'universal-access', 'university', 'unlink', 'unlock', 'unlock-alt', 'unsorted', 'upload', 'usb', 'usd', 'user', 'user-circle', 'user-circle-o', 'user-md', 'user-o', 'user-plus', 'user-secret', 'user-times', 'users', 'vcard', 'vcard-o', 'venus', 'venus-double', 'venus-mars', 'viacoin', 'viadeo', 'viadeo-square', 'video-camera', 'vimeo', 'vimeo-square', 'vine', 'vk', 'volume-control-phone', 'volume-down', 'volume-off', 'volume-up', 'warning', 'wechat', 'weibo', 'weixin', 'whatsapp', 'wheelchair', 'wheelchair-alt', 'wifi', 'wikipedia-w', 'window-close', 'window-close-o', 'window-maximize', 'window-minimize', 'window-restore', 'windows', 'won', 'wordpress', 'wpbeginner', 'wpexplorer', 'wpforms', 'wrench', 'xing', 'xing-square', 'y-combinator', 'y-combinator-square', 'yahoo', 'yc', 'yc-square', 'yelp', 'yen', 'yoast', 'youtube', 'youtube-play', 'youtube-square'
	);

	return $font_icons;
}
