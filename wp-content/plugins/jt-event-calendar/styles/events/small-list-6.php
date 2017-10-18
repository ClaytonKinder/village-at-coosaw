<?php

	// Get posts based on the widget's settings
	if ($cat == 'all') {
		$args = array("posts_per_page" => $number_of_events - 1, "post_type" => array('events_list'), 'order' => 'ASC', 'orderby' => 'meta_value', 'meta_key' => 'event_start_date', 'offset' => 1);
	}
	else {
		$args = array("posts_per_page" => $number_of_events - 1, "post_type" => array('events_list'), 'offset' => 1, 'order' => 'ASC', 'orderby' => 'meta_value', 'meta_key' => 'event_start_date', 'tax_query' => array(array('taxonomy' => 'events_categories', 'field' => 'slug', 'terms' => $cat)));
	}

?>
	<div class="uk-grid jt-event-calendar-small-list-6">
		<?php
			if ($cat == 'all') {
				$args2 = array("posts_per_page" => 1, "post_type" => array('events_list'), 'order' => 'ASC', 'orderby' => 'meta_value', 'meta_key' => 'event_start_date');
			}
			else {
				$args2 = array("posts_per_page" => 1, "post_type" => array('events_list'), 'order' => 'ASC', 'orderby' => 'meta_value', 'meta_key' => 'event_start_date', 'tax_query' => array(array('taxonomy' => 'events_categories', 'field' => 'slug', 'terms' => $cat)));
			}
			$latest = get_posts($args2);

			// Show this post
			foreach($latest as $latest_post) {
				$post_type = get_post_type_object( get_post_type($latest_post) );
				$event_start_date = esc_attr( get_post_meta( $latest_post->ID, 'event_start_date', true ) );
				$event_end_date = esc_attr( get_post_meta( $latest_post->ID, 'event_end_date', true ) );

				if ($date_format == 'dFY') {
					$start_date = date("d F Y", strtotime($event_start_date));
					$end_date = date("d F Y", strtotime($event_end_date));
				}
				else if ($date_format == 'dF') {
					$start_date = date("d F", strtotime($event_start_date));
					$end_date = date("d F", strtotime($event_end_date));
				}
				else if ($date_format == 'Fd') {
					$start_date = date("F d", strtotime($event_start_date));
					$end_date = date("F d", strtotime($event_end_date));
				}
				else if ($date_format == 'dMY') {
					$start_date = date("d M Y", strtotime($event_start_date));
					$end_date = date("d M Y", strtotime($event_end_date));
				}
				else if ($date_format == 'dM') {
					$start_date = date("d M", strtotime($event_start_date));
					$end_date = date("d M", strtotime($event_end_date));
				}
				else if ($date_format == 'Md') {
					$start_date = date("M d", strtotime($event_start_date));
					$end_date = date("M d", strtotime($event_end_date));
				}
				else if ($date_format == 'dmY') {
					$start_date = date("d/m/Y", strtotime($event_start_date));
					$end_date = date("d/m/Y", strtotime($event_end_date));
				}
				else if ($date_format == 'mdY') {
					$start_date = date("m/d/Y", strtotime($event_start_date));
					$end_date = date("m/d/Y", strtotime($event_end_date));
				}
				echo '<div class="uk-width-1-1">
						<div class="recent-post">
							<figure class="uk-overlay uk-overlay-hover">';
								$option = get_option(jt_settings);
								if ($option[event_page]) {
									echo '<a href="' . get_permalink( $latest_post->ID ) . '">
								<img class="uk-overlay-scale" src="' . wp_get_attachment_url( get_post_thumbnail_id($latest_post->ID), 'thumbnail'  ) . '" alt=""></a>';
								} else {
									echo '<img class="uk-overlay-scale" src="' . wp_get_attachment_url( get_post_thumbnail_id($latest_post->ID), 'thumbnail'  ) . '" alt="">';
								}
								echo '<figcaption class="uk-overlay-panel uk-overlay-bottom uk-overlay-background uk-ignore">
									<p class="title">';
										if ($option[event_page]) {
											echo '<a href="' . get_permalink( $latest_post->ID ) . '">' . $latest_post->post_title . '</a>';
										}
										else {
											echo $latest_post->post_title;
										}
									echo '</p>';	
									echo '<p class="meta-box">';
									if (!empty ($event_start_date)) {
										echo '<span class="event-date"><i class="fa fa-calendar"></i>' . $start_date;
										if (!empty ($event_end_date)) {
											echo ' - ' . $end_date;
										}
										echo '</span>';
									}
									echo '</p></figcaption>
								</a>
							</figure>
						</div>
					</div>';
			}

			echo '<div class="uk-width-1-1 events-list uk-grid-match">';
				$posts_array = get_posts($args);
				// Show the other posts as a list with a small image
				foreach($posts_array as $post) {
					$post_type = get_post_type_object( get_post_type($post) );
					$event_start_date = esc_attr( get_post_meta( $post->ID, 'event_start_date', true ) );
					$event_end_date = esc_attr( get_post_meta( $post->ID, 'event_end_date', true ) );

					if ($date_format == 'dFY') {
						$start_date = date("d F Y", strtotime($event_start_date));
						$end_date = date("d F Y", strtotime($event_end_date));
					}
					else if ($date_format == 'dF') {
						$start_date = date("d F", strtotime($event_start_date));
						$end_date = date("d F", strtotime($event_end_date));
					}
					else if ($date_format == 'Fd') {
						$start_date = date("F d", strtotime($event_start_date));
						$end_date = date("F d", strtotime($event_end_date));
					}
					else if ($date_format == 'dMY') {
						$start_date = date("d M Y", strtotime($event_start_date));
						$end_date = date("d M Y", strtotime($event_end_date));
					}
					else if ($date_format == 'dM') {
						$start_date = date("d M", strtotime($event_start_date));
						$end_date = date("d M", strtotime($event_end_date));
					}
					else if ($date_format == 'Md') {
						$start_date = date("M d", strtotime($event_start_date));
						$end_date = date("M d", strtotime($event_end_date));
					}
					else if ($date_format == 'dmY') {
						$start_date = date("d/m/Y", strtotime($event_start_date));
						$end_date = date("d/m/Y", strtotime($event_end_date));
					}
					else if ($date_format == 'mdY') {
						$start_date = date("m/d/Y", strtotime($event_start_date));
						$end_date = date("m/d/Y", strtotime($event_end_date));
					}
					echo '<div class="row">';
						echo '<div class="post-img uk-overlay uk-overlay-hover">';
						$option = get_option(jt_settings);
						if ($option[event_page]) {
							echo '<a href="' . get_permalink( $post->ID ) . '">
							<img class="uk-overlay-scale" src="' . wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ) . '" alt=""></a>';
						} else {
							echo '<img class="uk-overlay-scale" src="' . wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ) . '" alt="">';
						}
						echo '</div>';
						echo '<div class="event-info">';
							echo '<p class="event-title">';
							if ($option[event_page]) {
								echo '<a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a>';
							}
							else {
								echo $post->post_title;
							}
							echo '</p>';
							if (!empty ($event_start_date)) {
								echo '<p class="event-date"><i class="fa fa-calendar"></i>' . $start_date;
								if (!empty ($event_end_date)) {
									echo ' - ' . $end_date;
								}
								echo '</p>';
							}
						echo '</div>';
					echo '</div>';
				} 
			echo '</div>';

		?>
	</div>