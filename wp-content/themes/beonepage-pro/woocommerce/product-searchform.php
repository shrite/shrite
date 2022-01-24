<?php
/**
 * Search Form for WooCommerce
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */
?>

<form name="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search">
	<div class="search-wrap woocommerce-product-search">
		<button class="search-btn" type="submit"><i class="fa fa-search"></i></button>

		<input type="text" name="s" id="search" class="form-control search-field" placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'beonepage' ); ?>">
	</div><!-- .search-wrap -->

	<input type="hidden" name="post_type" value="product" />
</form>