<?php
	
	for ($i = 1; $i <= 31; $i++) {
		if ( (rtrim(${'img'.$i}) != NULL) ||  (rtrim(${'title'.$i}) != NULL ) ) {
			
			echo '<div class="uk-grid jt-event-calendar-small-list-2">';

				// Create a div that includes the content
				echo '<div class="uk-width-3-10">';

					// Show the image of the user if it's not empty
					if ( rtrim(${'img'.$i}) != NULL ) {
						echo '<p class="image"><img src="' . ${'img'.$i} . '" alt=""></p>';
					}

				echo '</div>';

				echo '<div class="uk-width-7-10">';

					// Show the event's title if it's not empty
					if ( rtrim(${'title'.$i}) != NULL ) {
						if ( ( rtrim(${'btn_url'.$i}) != NULL ) ) {
							echo '<p class="title"><a class="link-title" href="' . ${'btn_url'.$i} . '">' . ${'title'.$i} . '</a></p>';
						}
					}
			
					// Show the event's short info if it's not empty
					if ( rtrim(${'short_info'.$i}) != NULL ) {
						echo '<p class="short-info">' . ${'short_info'.$i} . '</p>';
					}

				echo '</div>';
			
				echo '<div class="uk-width-1-1">';
			
					// Show the location and the date/time if it's not empty
					if ( ( rtrim(${'start'.$i}) != NULL ) || ( rtrim(${'end'.$i}) != NULL ) || ( rtrim(${'location'.$i}) != NULL ) ) {
						echo '<p class="info"><i class="fa fa-calendar"></i> <span class="duration">' . ${'start'.$i};
						if ( rtrim(${'end'.$i}) != NULL ) {
							echo ' - ' . ${'end'.$i};
						}
						echo '</span>';
						if ( rtrim(${'location'.$i}) != NULL ) {
							echo '<span class="event-location"><i class="fa fa-map-marker"></i>' . ${'location'.$i} . '</span>';
						}
						
						echo '</p>';
					}

				echo '</div>';

			echo '</div>';
		}
	}

?>

		