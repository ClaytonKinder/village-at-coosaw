<?php
	echo '<h3 class="events-list-title">' . $jt['title'] . '</h3>';
?>
<div class="uk-grid jt-event-calendar-overlay">
<?php
	
	if ($jt['cat'] == '') {
		$args = array("posts_per_page" => $jt['num'], "post_type" => array('events_list'), 'order' => 'ASC', 'orderby' => 'meta_value', 'meta_key' => 'event_start_date');
	}
	else {
		$args = array("posts_per_page" => $jt['num'], "post_type" => array('events_list'), 'order' => 'ASC', 'orderby' => 'meta_value', 'meta_key' => 'event_start_date', 'tax_query' => array(array('taxonomy' => 'events_categories', 'field' => 'slug', 'terms' => $jt['cat'])));
	}

		$posts_array = get_posts($args);

		// Show these posts in a grid
		foreach($posts_array as $post) {
			$post_type = get_post_type_object( get_post_type($post) );
			$post_cats = get_the_terms( $post->ID, 'events_categories');
			foreach ( $post_cats as $cat ) {
            	$cat_link = get_term_link( $cat, 'events_categories' );
			}
			
			$event_start_date = esc_attr( get_post_meta( $post->ID, 'event_start_date', true ) );
			$month = date("m",strtotime($event_start_date));
			if ($jt['month'] == '') {
				echo '<div class="uk-width-1-4">';
			}
			else {
				if ($jt['month'] == $month) {
					echo '<div class="uk-width-1-4">';
				}
				else {
					echo '<div class="uk-width-1-4 uk-hidden">';
				}
			}

					// Show the image of the event
					$event_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  );
					if ( $event_img != NULL ) {
						echo '<figure class="uk-overlay uk-overlay-hover">';
							echo '<p class="image">';
								$option = get_option(jt_settings);
								if ($option[event_page]) {
									echo '<a href="' . get_permalink( $post->ID ) . '">
									<img class="uk-overlay-scale" src="' . wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ) . '" alt=""></a>';
								} else {
									echo '<img class="uk-overlay-scale" src="' . wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ) . '" alt="">';
								}
							echo '</p>';

							echo '<figcaption class="uk-overlay-panel uk-overlay-background uk-flex uk-flex-middle uk-flex-center uk-ignore"><div>';
						
								// Show the location and the date/time if they are not empty
								$event_end_date = esc_attr( get_post_meta( $post->ID, 'event_end_date', true ) );
								$event_location = get_post_meta( $post->ID, 'event_location', true );

								if ($option[date_format] == 'dFY') {
									$start_date = date("d F Y", strtotime($event_start_date));
									$end_date = date("d F Y", strtotime($event_end_date));
								}
								else if ($option[date_format] == 'dF') {
									$start_date = date("d F", strtotime($event_start_date));
									$end_date = date("d F", strtotime($event_end_date));
								}
								else if ($option[date_format] == 'Fd') {
									$start_date = date("F d", strtotime($event_start_date));
									$end_date = date("F d", strtotime($event_end_date));
								}
								else if ($option[date_format] == 'dMY') {
									$start_date = date("d M Y", strtotime($event_start_date));
									$end_date = date("d M Y", strtotime($event_end_date));
								}
								else if ($option[date_format] == 'dM') {
									$start_date = date("d M", strtotime($event_start_date));
									$end_date = date("d M", strtotime($event_end_date));
								}
								else if ($option[date_format] == 'Md') {
									$start_date = date("M d", strtotime($event_start_date));
									$end_date = date("M d", strtotime($event_end_date));
								}
								else if ($option[date_format] == 'dmY') {
									$start_date = date("d/m/Y", strtotime($event_start_date));
									$end_date = date("d/m/Y", strtotime($event_end_date));
								}
								else if ($option[date_format] == 'mdY') {
									$start_date = date("m/d/Y", strtotime($event_start_date));
									$end_date = date("m/d/Y", strtotime($event_end_date));
								}
						
								if ( ( ! empty($event_start_date)) || ( ! empty($event_end_date)) || ( ! empty($event_location)) ) {
									echo '<p class="info"><i class="fa fa-calendar"></i> <span class="duration">' . $start_date;
									if ( ! empty($event_end_date)) {
										echo ' - ' . $end_date;
									}
									echo '</span>';

									echo '</p>';
								}

								// Show the event's title
								echo '<p class="title">';
								if ($option[event_page]) {
									echo '<a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a>';
								}
								else {
									echo $post->post_title;
								}
								echo '</p>';

								// Show the event's short info if it's not empty
								$event_short_info = get_post_meta( $post->ID, 'event_short_info', true );
						
								if ( ! empty($event_short_info)) {
									echo '<p class="short-info">' . esc_attr( $event_short_info ) . '</p>';
								}

								// Show the name of the user if it's not empty
								$event_link_text = get_post_meta( $post->ID, 'event_link_text', true );
								$event_link_url = get_post_meta( $post->ID, 'event_short_url', true );
						
								if ( ( ! empty($event_link_text)) || ( ! empty($event_link_url)) ) {
									echo '<p class="event-btn"><a href="' . $event_link_url . '">' . $event_link_text . '</a></p>';
								}
						
							echo '</div></figcaption>';
						echo '</figure>';
					}
			
			echo '</div>';
	}

?>
</div>