<?php
/**
 * The template for displaying breadcrumbs
 *
 * @package BeOnePage
 */

function beonepage_get_breadcrumbs() {

	/* === OPTIONS === */
	$text['home']     = esc_html__( 'Home', 'beonepage' ); // text for the 'Home' link
	$text['blog']     = esc_html__( 'Blog', 'beonepage' ); // text for the 'Blog' link
	$text['category'] = esc_html__( 'Archive by Category "%s"', 'beonepage' ); // text for a category page
	$text['search']   = esc_html__( 'Search Results for "%s" Query', 'beonepage' ); // text for a search results page
	$text['tag']      = esc_html__( 'Posts Tagged "%s"', 'beonepage' ); // text for a tag page
	$text['author']   = esc_html__( 'Articles Posted by %s', 'beonepage' ); // text for an author page
	$text['404']      = esc_html__( 'Error 404', 'beonepage' ); // text for the 404 page

	$show_current   = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
	$show_on_home   = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
	$show_blog_link = 1; // 1 - show the 'Blog' link, 0 - don't show
	$show_shop_link = 1; // 1 - show the 'Shop' link, 0 - don't show
	$show_title     = 1; // 1 - show the title for the links, 0 - don't show
	$delimiter      = esc_html( '/' ); // delimiter between crumbs
	$before         = '<li class="active" property="itemListElement" typeof="ListItem"><span property="name">'; // tag before the current crumb
	$after          = '</li>'; // tag after the current crumb
	/* === END OF OPTIONS === */

	global $post;

	$home_link    = esc_url( home_url( '/' ) );
	$blog_link    = esc_url( get_permalink( get_option( 'page_for_posts' ) ) );
	$link_before  = '<li property="itemListElement" typeof="ListItem">';
	$link_after   = '</li>';
	$link_attr    = ' property="item" typeof="WebPage"';
	$link         = $link_before . '<a' . $link_attr . ' href="%1$s"><span property="name">%2$s</span></a>' . $link_after;

	if ( isset( $post->post_parent ) ) {
		$parent_id = $parent_id_2 = $post->post_parent;
	}

	$frontpage_id = get_option( 'page_on_front' );
	$blogpage_id = get_option( 'page_for_posts' );

	echo '<ol class="bcrumbs" vocab="https://schema.org/" typeof="BreadcrumbList">';

	if ( $show_home_link == 1 ) {
		echo '<li property="itemListElement" typeof="ListItem"><a href="' . $home_link . '" property="item" typeof="WebPage"><span property="name">' . $text['home'] . '</span></a><meta property="position" content="1"></li>';

		if ( $frontpage_id == 0 || ( isset( $parent_id ) && $parent_id != $frontpage_id ) ) {
			echo $delimiter;
		}
	}

	if ( $show_blog_link == 1 && ! is_home() && ! is_page() && ! is_404() && ! ( class_exists( 'woocommerce' ) && is_woocommerce() ) ) {
		echo '<li property="itemListElement" typeof="ListItem"><a href="' . $blog_link . '" property="item" typeof="WebPage"><span property="name">' . $text['blog'] . '</span></a><meta property="position" content="2"></li>';

		echo $delimiter;
	}

	if ( $show_shop_link == 1 && class_exists( 'woocommerce' ) && ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) ) {
		if ( is_shop() && ! is_search() ) {
			echo $before . get_the_title( wc_get_page_id( 'shop' ) ) .'</span><meta property="position" content="2">'. $after;
		} else {
			echo '<li property="itemListElement" typeof="ListItem"><a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '" property="item" typeof="WebPage"><span property="name">' . get_the_title( wc_get_page_id( 'shop' ) ) . '</span></a><meta property="position" content="2"></li>';

			echo $delimiter;
		}
	}

	if ( is_home() ) {
		if ( $show_current == 1 ) {
			echo $before . get_the_title( $blogpage_id ) .'</span><meta property="position" content="2">'. $after;
		}
	} elseif ( is_category() ) {
		$this_cat = get_category( get_query_var( 'cat' ), false );

		if ( $this_cat->parent != 0 ) {
			$cats = get_category_parents( $this_cat->parent, true, $delimiter );

			if ( $show_current == 0 ) {
				$cats = preg_replace( '#^(.+)$delimiter$#', '$1', $cats );
			}
			
			$cats = str_replace( '">', '" '.$link_attr.'>', $cats );
			$cats = str_replace( '<a', $link_before . '<a', $cats );	
			$cats = str_replace( '</a>', '</a>'. $link_after, $cats );
			$cats = str_replace( 'WebPage">', 'WebPage"><span property="name">', $cats );
			$cats = str_replace( '</a>', '</span></a>', $cats );
			$cats = str_replace( '/a>', '/a><meta property="position" content="3">', $cats );			

			if ( $show_title == 0 ) {
				$cats = preg_replace( '/ title="(.*?)"/', '', $cats );
			}

			echo $cats;
		}

		if ( $show_current == 1 ) {
			echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) .'</span><meta property="position" content="3">'. $after;
		}
	} elseif ( is_search() ) {
		echo $before . sprintf( $text['search'], get_search_query() ) .'</span><meta property="position" content="3">'. $after;
	} elseif ( is_day() ) {
		echo sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $delimiter;
		echo sprintf( $link, get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ), get_the_time( 'F' ) ) . $delimiter;
		echo $before . get_the_time( 'd' ) .'</span><meta property="position" content="3">'. $after;
	} elseif ( is_month() ) {
		echo sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $delimiter;
		echo $before . get_the_time( 'F' ) .'</span><meta property="position" content="3">'. $after;
	} elseif ( is_year() ) {
		echo $before . get_the_time( 'Y' ) .'</span><meta property="position" content="3">'. $after;
	} elseif ( is_single() && ! is_attachment() ) {
		if ( get_post_type() != 'post' ) {
			if ( get_post_type() != 'product' ) {
				$post_type = get_post_type_object( get_post_type() );
				$slug = $post_type->rewrite;

				printf( $link, $home_link . $slug['slug'] . '/', $post_type->labels->singular_name );
			}

			if ( $show_current == 1 ) {
				echo get_post_type() != 'product' ? $delimiter : '' . $before . get_the_title() .'</span><meta property="position" content="3">'. $after;
			}
		} else {
			$cat = get_the_category();
			$cat = $cat[0];
			$cats = get_category_parents( $cat, true, $delimiter );

			if ( $show_current == 0 ) {
				$cats = preg_replace( '#^(.+)$delimiter$#', '$1', $cats );
			}
			
			$cats = str_replace( '">', '" '.$link_attr.'>', $cats );
			$cats = str_replace( '<a', $link_before . '<a', $cats );	
			$cats = str_replace( '</a>', '</a>'. $link_after, $cats );
			$cats = str_replace( 'WebPage">', 'WebPage"><span property="name">', $cats );
			$cats = str_replace( '</a>', '</span></a>', $cats );
			$cats = str_replace( '/a>', '/a><meta property="position" content="3">', $cats );
			

			if ( $show_title == 0 ) {
				$cats = preg_replace( '/ title="(.*?)"/', '', $cats );
			}

			echo $cats;

			if ( $show_current == 1 ) {
				echo $before . get_the_title() .'</span><meta property="position" content="4">'. $after;
			}
		}

	} elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' && get_post_type() != 'product' && ! is_404() ) {
		$post_type = get_post_type_object( get_post_type() );
		echo $before . $post_type->labels->singular_name .'</span><meta property="position" content="2">'. $after;
	} elseif ( is_attachment() ) {
		$parent = get_post( $parent_id );
		$cat = get_the_category( $parent->ID );
		$cat = $cat[0];

		if ( $cat ) {
			$cats = get_category_parents( $cat, true, $delimiter );
			
			$cats = str_replace( '">', '" '.$link_attr.'>', $cats );
			$cats = str_replace( '<a', $link_before . '<a', $cats );	
			$cats = str_replace( '</a>', '</a>'. $link_after, $cats );
			$cats = str_replace( 'WebPage">', 'WebPage"><span property="name">', $cats );
			$cats = str_replace( '</a>', '</span></a>', $cats );
			$cats = str_replace( '/a>', '/a><meta property="position" content="3">', $cats );		
			

			if ( $show_title == 0 ) {
				$cats = preg_replace( '/ title="(.*?)"/', '', $cats );
			}

			echo $cats;
		}

		printf( $link, get_permalink( $parent ), $parent->post_title );

		if ( $show_current == 1 ) {
			echo $delimiter . $before . get_the_title() .'</span><meta property="position" content="4">'. $after;
		}
	} elseif ( is_page() && ! $parent_id ) {
		if ( $show_current == 1 ) {
			echo $before . get_the_title() .'</span><meta property="position" content="2">'. $after;
		}
	} elseif ( is_page() && $parent_id ) {
		if ( $parent_id != $frontpage_id ) {
			$breadcrumbs = array();

			while ( $parent_id ) {
				$page = get_page( $parent_id );

				if ( $parent_id != $frontpage_id ) {
					$breadcrumbs[] = sprintf( $link, get_permalink( $page->ID ), get_the_title( $page->ID ) );
				}

				$parent_id = $page->post_parent;
			}

			$breadcrumbs = array_reverse( $breadcrumbs );

			for ( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
				echo $breadcrumbs[$i];

				if ( $i != count( $breadcrumbs ) -1 ) {
					echo $delimiter;
				}
			}
		}

		if ( $show_current == 1 ) {
			if ( $show_home_link == 1 || ( $parent_id_2 != 0 && $parent_id_2 != $frontpage_id ) ) {
				echo $delimiter;
			}

			echo $before . get_the_title() .'</span><meta property="position" content="3">'.$after;
		}

	} elseif ( is_tag() ) {
		echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . '</span><meta property="position" content="3">'. $after;
	} elseif ( is_author() ) {
		global $author;

		$userdata = get_userdata( $author );
		echo $before . sprintf( $text['author'], $userdata->display_name ) .'</span><meta property="position" content="3">'. $after;
	} elseif ( is_404() ) {
		echo $before . $text['404'] .'</span><meta property="position" content="2">'. $after;
	} elseif ( has_post_format() && ! is_singular() ) {
		echo get_post_format_string( get_post_format() );
	}

	if ( get_query_var( 'paged' ) ) {
		if ( is_home() || is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
			echo ' ( ';
		}

		echo esc_html__( 'Page', 'beonepage' ) . ' ' . get_query_var( 'paged' );

		if ( is_home() || is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
			echo ' )';
		}
	}

	echo '</ol><!-- .breadcrumbs -->';
}
