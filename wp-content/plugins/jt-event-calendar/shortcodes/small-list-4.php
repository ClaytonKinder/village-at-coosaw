<?php
	echo '<h3 class="events-list-title">' . $jt['title'] . '</h3>';
?>
<div class="uk-grid jt-event-calendar-small-list-4">
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
				echo '<div class="uk-width-1-1">';
			}
			else {
				if ($jt['month'] == $month) {
					echo '<div class="uk-width-1-1">';
				}
				else {
					echo '<div class="uk-width-1-1 uk-hidden">';
				}
			}
								
				// Show the event's title
				echo '<p class="title"><i class="fa fa-angle-right"></i>';
					if ($option[event_page]) {
						echo '<a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a>';
					}
					else {
						echo $post->post_title;
					}
					echo '</p>';
			
					// Show event info
					$event_start_date = esc_attr( get_post_meta( $post->ID, 'event_start_date', true ) );
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
					echo '<p class="info"><i class="fa fa-calendar"></i><span class="duration">' . $start_date;
					if ( ! empty($event_end_date)) {
						echo ' - ' . $end_date;
					}
					echo '</span>';	
					echo '</p>';
				}

				if ( ! empty($event_location)) {
					echo '<span class="event-location"><i class="fa fa-map-marker"></i>' . esc_attr( $event_location ) . '</span>';
				}
				
				// Show the name of the user if it's not empty
				$event_link_text = get_post_meta( $post->ID, 'event_link_text', true );
				$event_link_url = get_post_meta( $post->ID, 'event_link_url', true );
						
				if ( ( ! empty($event_link_text)) || ( ! empty($event_link_url)) ) {
					echo '<p class="event-btn"><a href="' . esc_attr( $event_link_url ) . '">' . esc_attr( $event_link_text ) . '</a></p>';
				}
						
			echo '</div>';
	}

?>
</div>

		