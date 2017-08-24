<?php
	
	for ($i = 1; $i <= 12; $i++) {
		if ( ! empty(rtrim(${'img'.$i})) ||  ! empty(rtrim(${'title'.$i})) ) {
			
			echo '<div class="uk-grid jt-program-default">';

				// Create a div that includes the content
				echo '<div class="uk-width-2-10">';

					// Show the image of the user if it's not empty
					if ( ! empty(rtrim(${'img'.$i}))) {
						echo '<p class="image"><img src="' . ${'img'.$i} . '" alt=""></p>';
					}

				echo '</div>';

				echo '<div class="uk-width-8-10">';

					// Show the name of the user if it's not empty
					if ( ( ! empty(rtrim(${'start'.$i}))) || ( ! empty(rtrim(${'end'.$i}))) || ( ! empty(rtrim(${'user'.$i}))) ) {
						echo '<p class="info"><span class="duration">' . ${'start'.$i} . ' - ' . ${'end'.$i} . '</span><span class="separator">/</span>' . __('with ') . ${'user'.$i} . '</p>';
					}

					// Show the job of the user if it's not empty
					if ( ! empty(rtrim(${'title'.$i}))) {
						echo '<p class="title">' . ${'title'.$i} . '</p>';
					}

				echo '</div>';

			echo '</div>';
		}
	}

?>

		