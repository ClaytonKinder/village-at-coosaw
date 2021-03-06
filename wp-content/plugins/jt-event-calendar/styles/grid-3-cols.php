<div class="uk-grid jt-event-calendar-grid">
<?php
	
	for ($i = 1; $i <= 31; $i++) {
		if ( ! empty(rtrim(${'img'.$i})) ||  ! empty(rtrim(${'title'.$i})) ) {
			
			echo '<div class="uk-width-1-3">';

					// Show the image of the user if it's not empty
					if ( ! empty(rtrim(${'img'.$i}))) {
						echo '<p class="image"><img src="' . ${'img'.$i} . '" alt=""></p>';
					}

					// Show the name of the user if it's not empty
					if ( ( ! empty(rtrim(${'start'.$i}))) || ( ! empty(rtrim(${'end'.$i}))) || ( ! empty(rtrim(${'location'.$i}))) ) {
						echo '<p class="info"><i class="fa fa-calendar"></i> <span class="duration">' . ${'start'.$i};
						if ( ! empty(rtrim(${'end'.$i}))) {
							echo ' - ' . ${'end'.$i};
						}
						echo '</span>';
						if ( ! empty(rtrim(${'location'.$i}))) {
							echo '<span class="separator">/</span><i class="fa fa-map-marker"></i>' . ${'location'.$i};
						}
						
						echo '</p>';
					}

					// Show the event's title if it's not empty
					if ( ! empty(rtrim(${'title'.$i}))) {
						echo '<p class="title">' . ${'title'.$i} . '</p>';
					}

					// Show the event's short info if it's not empty
					if ( ! empty(rtrim(${'short_info'.$i}))) {
						echo '<p class="short-info">' . ${'short_info'.$i} . '</p>';
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

		