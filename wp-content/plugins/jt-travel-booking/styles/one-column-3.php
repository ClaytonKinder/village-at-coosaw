<div class="uk-grid-width-small-1-1 uk-grid-width-medium-1-1 uk-grid-width-large-1-1 destinations-1-col-3 uk-grid-match" data-uk-grid>
	<?php
	
		if ($cat == 'all') {
			$args = array("posts_per_page" => $num_destinations, "post_type" => array('destinations_list'));
		}
		else {
			$args = array("posts_per_page" => $num_destinations, "post_type" => array('destinations_list'), 'tax_query' => array(array('taxonomy' => 'destinations_categories', 'field' => 'slug', 'terms' => $cat)));
		}

		$posts_array = get_posts($args);

		// Show these posts in a grid
		foreach($posts_array as $post) {
			$post_type = get_post_type_object( get_post_type($post) );
			$post_cats = get_the_terms( $post->ID, 'destinations_categories');
			foreach ( $post_cats as $cat ) {
            	$cat_link = get_term_link( $cat, 'destinations_categories' );
			}
				
	?>
	<div>
		<div class="uk-grid">
			<div class="uk-width-1-3">
				<a class="destination-link" href="<?php echo get_permalink( $post->ID ); ?>">
					<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ); ?>" alt="">
				</a>
			</div>
			<div class="uk-width-2-3">			
				<div class="destination-short-info">
					<h3 class="destination-title"><a class="destination-link" href="<?php echo get_permalink( $post->ID ); ?>"><?php echo $post->post_title; ?></a></h3>
				</div>
				<div class="destination-bottom-info">
					<?php 
						$destination_price = get_post_meta( $post->ID, 'destination_price', true );
						if (! empty ( $destination_price )) { ?>
					<div class="destination-price">
						<span><?php echo __('Starts from:', 'jt-travel-booking'); ?></span>
						<?php echo esc_html( $destination_price ); ?>
					</div>
					<?php } ?>
					<?php 
						$destination_days = get_post_meta( $post->ID, 'destination_days', true );
						if (! empty ($destination_days)) { ?>
					<div class="destination-days">
						<span><?php echo __('Days:', 'jt-travel-booking'); ?></span>
						<?php echo esc_html( $destination_days ); ?>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<?php
		} 
	?>
</div>