<?php
/**
 * Related Products
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product, $woocommerce_loop;
if ( empty( $product ) || ! $product->exists() ) {
	return;
}
$posts_per_page = 8;
$related = wc_get_related_products( $product->get_id(), $posts_per_page );
if ( sizeof( $related ) == 0 ) return;
$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->get_id() )
) );
$products = new WP_Query( $args );
if ( $products->have_posts() ) : ?>
	<div class="related products">
		<h2><?php _e( 'Related Products', 'beonepage' ); ?></h2>
		<ul id="oc-product" class="oc-item  owl-carousel product-carousel">
			<?php
			while ( $products->have_posts() ) : $products->the_post();
				wc_get_template_part( 'content', 'product' );
			endwhile; // end of the loop.
			?>
		</ul><!-- #oc-product -->
	</div><!-- .related -->
<?php endif;
wp_reset_postdata();
