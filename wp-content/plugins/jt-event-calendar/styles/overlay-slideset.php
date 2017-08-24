<div class="uk-slidenav-position jt-event-calendar-overlay-slideset" data-uk-slideset="{small: 1, medium: 2, large: 4}">
	<ul class="uk-grid uk-slideset">
<?php
	
	for ($i = 1; $i <= 31; $i++) {
		if ( ! empty(rtrim(${'img'.$i})) ||  ! empty(rtrim(${'title'.$i})) ) {
			
			echo '<li>';

					// Show the image of the user if it's not empty
					if ( ! empty(rtrim(${'img'.$i}))) {
						echo '<figure class="uk-overlay uk-overlay-hover">';
							echo '<p class="image"><img src="' . ${'img'.$i} . '" alt=""></p>';

							echo '<figcaption class="uk-overlay-panel uk-overlay-background uk-flex uk-flex-bottom uk-ignore"><div>';
						
								// Show the event's title if it's not empty
								if ( ! empty(rtrim(${'title'.$i}))) {
									echo '<p class="title">' . ${'title'.$i} . '</p>';
								}
						
								// Show the location and the date/time if they are not empty
								if ( ( ! empty(rtrim(${'start'.$i}))) || ( ! empty(rtrim(${'end'.$i})))) {
									echo '<p class="info"><i class="fa fa-calendar"></i> <span class="duration">' . ${'start'.$i};
									if ( ! empty(rtrim(${'end'.$i}))) {
										echo ' - ' . ${'end'.$i};
									}
									echo '</span>';

									echo '</p>';
								}
						
								if ( ! empty(rtrim(${'location'.$i}))) {
									echo '<p class="location"><i class="fa fa-map-marker"></i>' . ${'location'.$i} . '</p>';
								}

								// Show the button if it's not empty
								if ( ( ! empty(rtrim(${'btn_text'.$i}))) || ( ! empty(rtrim(${'btn_url'.$i}))) ) {
									echo '<p class="event-btn"><a href="' . ${'btn_url'.$i} . '">' . ${'btn_text'.$i} . '</a></p>';
								}
						
							echo '</div></figcaption>';
						echo '</figure>';
					}
			
			echo '</li>';
		}
	}

?>
	</ul>
	<a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
	<a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
</div>

		