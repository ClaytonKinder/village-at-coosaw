<div class="uk-grid jt-event-calendar-small-list-4">
<?php
	
	for ($i = 1; $i <= 31; $i++) {
		if ( ! empty(rtrim(${'title'.$i}) ) ) {
			
			echo '<div class="uk-width-1-1">';

				// Show the event's title if it's not empty
				if ( ! empty(rtrim(${'title'.$i}))) {
					echo '<p class="title"><i class="fa fa-angle-right"></i>' . ${'title'.$i} . '</p>';
				}
			
				// Show the location and the date/time if they are not empty
				if ( ( ! empty(rtrim(${'start'.$i}))) || ( ! empty(rtrim(${'end'.$i}))) || ( ! empty(rtrim(${'location'.$i}))) ) {
					echo '<p class="info"><i class="fa fa-calendar"></i> <span class="duration">' . ${'start'.$i};
					if ( ! empty(rtrim(${'end'.$i}))) {
						echo ' - ' . ${'end'.$i};
					}
					echo '</span>';

					echo '</p>';
				}

				if ( ! empty(rtrim(${'location'.$i}))) {
					echo '<span class="event-location"><i class="fa fa-map-marker"></i>' . ${'location'.$i} . '</span>';
				}
								
				// Show the name of the user if it's not empty
				if ( ( ! empty(rtrim(${'btn_text'.$i}))) || ( ! empty(rtrim(${'btn_url'.$i}))) ) {
					echo '<p class="event-btn"><a href="' . ${'btn_url'.$i} . '">' . ${'btn_text'.$i} . '</a></p>';
				}
						
						
			echo '</div>';
		}
	}

?>
</div>

		