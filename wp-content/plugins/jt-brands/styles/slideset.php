<?php
	$args = array("posts_per_page" => -1, "post_type" => array('brands_list'));

	if ($display_filters == 'yes') {
		$cat_args = array(
			'type'                     => 'post_type',
			'child_of'                 => 0,
			'parent'                   => '',
			'orderby'                  => 'name',
			'order'                    => 'ASC',
			'hide_empty'               => 1,
			'hierarchical'             => 1,
			'exclude'                  => '',
			'include'                  => '',
			'number'                   => '',
			'taxonomy'                 => 'brands_categories',
			'pad_counts'               => false );
	$categories = get_categories($cat_args);
?>
<ul id="filter-list">
    <li data-uk-filter=""><a href=""></a><?php _e('All'); ?></li>
	<?php
			
		foreach($categories as $category) {
    		$url = get_term_link($category);
	?>
    <li data-uk-filter="<?php echo $url;?>"><a href=""><?php echo $category->name; ?></a></li>
	<?php
		}
	?>
</ul>
<?php
	}
?>

<div class="uk-slidenav-position brands-slideset-style" data-uk-slideset="{small: 1, medium: 2, large: 4, controls: '#filter-list'}">
	<ul class="uk-grid uk-slideset brands-default">
	<?php

		$posts_array = get_posts($args);

		// Show these posts in a grid
		foreach($posts_array as $post) {
			$post_type = get_post_type_object( get_post_type($post) );
			$post_cats = get_the_terms( $post->ID, 'brands_categories');
			foreach ( $post_cats as $cat ) {
            	$cat_link = get_term_link( $cat, 'brands_categories' );
			}
				
	?>
	<li <?php if ($display_filters == 'yes') { ?>data-uk-filter="<?php echo $cat_link; ?>" <?php } ?>>
		<figure class="uk-overlay uk-overlay-hover">
			<a href="<?php echo get_permalink( $post->ID ); ?>"><img class="uk-overlay-scale" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ); ?>" alt=""></a>
				<figcaption class="uk-overlay-panel uk-overlay-bottom uk-overlay-background uk-ignore">
					<p class="brand-title"><a href="<?php echo get_permalink( $post->ID ); ?>"><?php echo $post->post_title; ?></a></p>
					<?php if (! empty (get_post_meta( $post->ID, 'short_info', true ))) { ?>
					<p class="store-short-info"><?php echo esc_html( get_post_meta( $post->ID, 'short_info', true ) ); ?></p>
					<?php } ?>
				</figcaption>
		</figure>
		<div class="brand-info">
			<p class="store-location"><?php echo esc_html( get_post_meta( $post->ID, 'store_location', true ) ); ?></p>
			<p class="store-phone" data-uk-tooltip="{pos:'top-right'}" title="<?php echo esc_html( get_post_meta( $post->ID, 'store_phone', true ) ); ?>"><i class="fa fa-phone"></i></p>
			<p class="store-email" data-uk-tooltip="{pos:'top-right'}" title="<?php echo esc_html( get_post_meta( $post->ID, 'store_email', true ) ); ?>"><i class="fa fa-envelope"></i></p>
		</div>
	</li>
	<?php
		} 
	?>
	</ul>
    <a href="" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
    <a href="" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
</div>