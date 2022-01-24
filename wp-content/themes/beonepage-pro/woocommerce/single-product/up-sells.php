<?php
/**
 * Single Product Up-Sells
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

$upsells = $product->get_upsell_ids();

if ( sizeof( $upsells ) === 0 ) {
	return;
}

$meta_query = WC()->query->get_meta_query();

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => $posts_per_page,
	'orderby'             => $orderby,
	'post__in'            => $upsells,
	'post__not_in'        => array( $product->get_id () ),
	'meta_query'          => $meta_query
);

$products = new WP_Query( $args );

//echo '<pre>'; print_r($products); echo '</pre>';
 
if ( $products->have_posts() ) : ?>
	
	<div class="upsells products">

		<h2><?php _e( 'You may also like&hellip;', 'beonepage' ) ?></h2>

		<div id="oc-product" class="owl-carousel product-carousel">

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<div class="oc-item">

					<?php wc_get_template_part( 'content', 'product' ); ?>

				</div><!-- .oc-item-->

			<?php endwhile; // end of the loop. ?>

		</div><!-- #oc-product -->
	</div>

<?php endif;

wp_reset_postdata();
