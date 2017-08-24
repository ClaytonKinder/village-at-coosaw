<?php
	
	for ($i = 1; $i <= 20; $i++) {
		if ( ! empty(rtrim(${'title'.$i}))) {
			
			echo '<div class="uk-grid jt-music-charts-default">';

				// Create a div that includes the content
				echo '<div class="uk-width-1-10 number">' . $i . '</div>';

				echo '<div class="uk-width-8-10">';

					// Show the song's title and artist if they are not empty
					if ( ( ! empty(rtrim(${'title'.$i}))) || ( ! empty(rtrim(${'artist'.$i}))) ) {
						echo '<p class="song-title">' . ${'title'.$i} . '</p>';
						echo '<p class="artist">' . ${'artist'.$i} . '</p>';
					}

				echo '</div>';
			
				echo '<div class="uk-width-1-10">';
			
					// Show a listen now link
					if ( ! empty(rtrim(${'url'.$i}))) {
						echo '<p class="listen-btn"><a href="' . ${'url'.$i} . '"><i class="fa fa-play"></i></a></p>';
					}

				echo '</div>';

			echo '</div>';
		}
	}

?>

		