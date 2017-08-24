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

<div class="jt-brands-list-2">
	<div class="uk-grid brands-top-bar">
		<div class="uk-width-1-10">
			<p><?php echo _e('Store'); ?></p>
		</div>
		<div class="uk-width-6-10">
			<p><?php echo _e('Brand / Details'); ?></p>
		</div>
		<div class="uk-width-1-10">
			<p><?php echo _e('Level'); ?></p>
		</div>
		<div class="uk-width-2-10">
			<p><?php echo _e('Info'); ?></p>
		</div>
	</div>
	<div class="brands-list-2">
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
		<div class="uk-grid" data-uk-grid-match data-uk-grid="{controls: '#filter-list'}">
			<div class="uk-width-1-10" <?php if ($display_filters == 'yes') { ?>data-uk-filter="<?php echo $cat_link; ?>" <?php } ?>>
				<figure class="uk-overlay uk-overlay-hover">
					<a href="<?php echo get_permalink( $post->ID ); ?>"><img class="uk-overlay-scale" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ); ?>" alt=""></a>
				</figure>
			</div>
			<div class="uk-width-6-10 uk-flex uk-flex-middle" <?php if ($display_filters == 'yes') { ?>data-uk-filter="<?php echo $cat_link; ?>" <?php } ?>>
				<div>
					<p class="brand-title"><a href="<?php echo get_permalink( $post->ID ); ?>"><?php echo $post->post_title; ?></a></p>
					<?php if (! empty (get_post_meta( $post->ID, 'short_info', true ))) { ?>
					<p class="store-short-info"><?php echo esc_html( get_post_meta( $post->ID, 'short_info', true ) ); ?></p>
					<?php } ?>
				</div>
			</div>
			<div class="uk-width-1-10 uk-flex uk-flex-middle" <?php if ($display_filters == 'yes') { ?>data-uk-filter="<?php echo $cat_link; ?>" <?php } ?>>
				<p class="store-location"><?php echo esc_html( get_post_meta( $post->ID, 'store_location', true ) ); ?></p>
			</div>
			<div class="uk-width-2-10 uk-flex uk-flex-middle" <?php if ($display_filters == 'yes') { ?>data-uk-filter="<?php echo $cat_link; ?>" <?php } ?>>
				<div>
					<p class="store-phone"><i class="fa fa-phone"></i> <?php echo esc_html( get_post_meta( $post->ID, 'store_phone', true ) ); ?></p>
					<p class="store-email"><i class="fa fa-envelope"></i> <?php echo esc_html( get_post_meta( $post->ID, 'store_email', true ) ); ?></p>
				</div>
			</div>
		</div>
		<?php
			} 
		?>
	</div>
</div>