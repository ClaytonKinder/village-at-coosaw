<div class="uk-grid-width-small-1-1 uk-grid-width-medium-1-1 uk-grid-width-large-1-1 destinations-1-col-2 uk-grid-match" data-uk-grid>
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
		<figure class="uk-overlay uk-overlay-hover">
			<img class="uk-overlay-scale" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ); ?>" alt="">
			<figcaption class="uk-overlay-panel uk-overlay-background uk-flex uk-ignore">
				<a class="destination-link" href="<?php echo get_permalink( $post->ID ); ?>"></a>
				<div>			
					<div class="destination-short-info">
						<h3 class="destination-title"><?php echo $post->post_title; ?></h3>
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
			</figcaption>
		</figure>
	</div>
	<?php
		} 
	?>
</div>