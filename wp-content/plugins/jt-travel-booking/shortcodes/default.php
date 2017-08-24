<?php

echo '<h3 class="destinations-title">' . $jt['title'] . '</h3>';
echo '<div class="uk-grid-width-small-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-3 destinations-default uk-grid-match" data-uk-grid>';

		if ($jt['cat'] == '') {
			$args = array("posts_per_page" => $jt['num'], "post_type" => array('destinations_list'), "orderby" => $jt['orderby'], "order" => $jt['order']);
		}
		else {
			$args = array("posts_per_page" => $jt['num'], "post_type" => array('destinations_list'), 'tax_query' => array(array('taxonomy' => 'destinations_categories', 'field' => 'slug', 'terms' => $jt['cat'])), "orderby" => $jt['orderby'], "order" => $jt['order']);
		}

		$posts_array = get_posts($args);

		// Show these posts in a grid
		foreach($posts_array as $post) {
			$post_type = get_post_type_object( get_post_type($post) );
			$post_cats = get_the_terms( $post->ID, 'destinations_categories');
			foreach ( $post_cats as $cat ) {
            	$cat_link = get_term_link( $cat, 'destinations_categories' );
			}
				
	echo '<div>
		<figure class="uk-overlay uk-overlay-hover">
			<a href="' . get_permalink( $post->ID ) . '">
				<img class="uk-overlay-scale" src="' . wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ) . '" alt="">
			</a>
		</figure>
		<div class="destination-short-info">
		<h3 class="destination-title"><a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a></h3>';
			
			$destination_short_info = get_post_meta( $post->ID, 'destination_short_info', true );
			if (! empty ( $destination_short_info )) {
				echo esc_html( $destination_short_info );
			} 
		echo '</div>
		<div class="uk-grid">';
			
				$destination_price = get_post_meta( $post->ID, 'destination_price', true );
				if (! empty ( $destination_price )) { 
					echo '<div class="uk-width-2-6 destination-price">
						<span>' . __('Starts from:', 'jt-travel-booking') . '</span>' . esc_html( $destination_price ) . '
					</div>';
				}
			
				$destination_days = get_post_meta( $post->ID, 'destination_days', true );
				if (! empty ( $destination_days )) {
					echo '<div class="uk-width-1-6 destination-days">
						<span>' . __('Days:', 'jt-travel-booking') . '</span>' . esc_html( $destination_days ) . '
					</div>';
				}
			echo '<div class="uk-width-3-6 destination-more-info">
				<a href="' . get_permalink( $post->ID ) . '">' . __('More Info', 'jt-travel-booking') . '</a>
			</div>
		</div>
	</div>';
		}
	echo '</div>';
?>