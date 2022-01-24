<?php
    /**
     * Template part for displaying portfolio posts.
     *
     * @package BeOnePage
     */
    
    $terms = get_the_terms( $post->ID, 'portfolio_tag' );
    
    if ( $terms && ! is_wp_error( $terms ) ) {
    	$tag = array();
    	$filter = array();
    
    	foreach ( $terms as $term ) {
    		$tag[] = $term->name;
    		$filter[] = 'portfolio-tag-' . $term->name;
    	}
    
    	$filter = str_replace( ' ', '-', $filter );
    	$portfolio_tag = ( join( ', ', $tag ) );
    	$portfolio_filter = strtolower( join( ' ', $filter ) );
    }
    ?>
<article id="portfolio-item-<?php the_ID() ?>" class="portfolio-item<?php echo isset( $portfolio_filter ) ? ' ' . esc_attr( $portfolio_filter) : ''; ?> wow fadeIn" data-wow-delay=".5s">
    <?php
        $portfolio_thumbnail_url = get_the_post_thumbnail_url();
        $portfolio_preview_type = beOneKirki::get_option( 'front_page_portfolio_module_item_image_popup' );
        if($portfolio_preview_type == 1){
        ?>
    <a href="#<?php echo $post->post_name; ?>" class="ajax-content-box">
    <?php
        }else{
        ?>
		<a href="#" class="fancybox-images">
			<?php
				}
				?>
			<div class="portfolio-image">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'featured-thumb' );
					} else {
						printf( '<img src="%s">', esc_url( get_template_directory_uri() . '/images/portfolio-placeholder.png' ) );
					}
					?>
			</div>
			<!--.portfolio-image -->
			<div class="portfolio-caption">
				<h3 class="entry-title"><?php the_title(); ?></h3>
				<?php echo isset( $portfolio_tag ) ? '<span class="entry-meta">' . esc_html( $portfolio_tag ) . '</span>' : ''; ?>
			</div>
			<!--.portfolio-caption -->
		</a>
	<?php if($portfolio_preview_type != 1): ?>
	<div class="popup_preview" id="popup_preview-<?php the_ID() ?>" style="display:none;">			
		<?php 
		$args = array(
			'post_parent'    => $post->ID,
			'post_type'      => 'attachment',
			'numberposts'    => -1, // show all
			'post_status'    => 'any',
			'post_mime_type' => 'image',
			'orderby'        => 'menu_order',
			'order'           => 'ASC'
		);
		$images = get_posts($args);	
		
		foreach ( $images as $image ) : 
			if ( count( $images ) > 1 ) :		
			?>
			<a href="<?php echo wp_get_attachment_url($image->ID); ?>"  data-fancybox-group="group" title="<?php the_title(); ?> "></a>		
			<?php 
			endif; 
		endforeach;
		if(empty($images)){
			?>
			<a href="<?php echo esc_url($portfolio_thumbnail_url); ?>"  data-fancybox-group="group" title="<?php the_title(); ?>">
			</a>
			<?php
		}
		?>			
	</div>
	<?php endif; ?>
</article>