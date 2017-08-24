<?php
	echo '<div class="uk-grid">';

		for ($i = 1; $i <= $numusers; $i++) {

		// Create a div that includes the content
		echo '<div class="uk-width-1-4">
				<div class="grid-style">';

			// Show the image of the user if it's not empty
			if ( ! empty(${'img'.$i})) {
				echo '<p class="image"><img src="' . ${'img'.$i} . '" alt=""></p>';
			}

			// Show the name of the user if it's not empty
			if ( ! empty(${'name'.$i})) {
				echo '<p class="name">' . ${'name'.$i} . '</p>';
			}

			// Show the job of the user if it's not empty
			if ( ! empty(${'job'.$i})) {
				echo '<p class="job"><i class="fa fa-briefcase"></i> ' . ${'job'.$i} . '</p>';
			}

			if ( ( ! empty(${'fb'.$i}) ) || ( ! empty(${'twitter'.$i}) ) || ( ! empty(${'linkedin'.$i}) )) {
				echo __('<p class="follow"><i class="fa fa-share-alt"></i> Find me on: ');
				
				// Show the facebook page of the user if it's not empty
				if ( ! empty(${'fb'.$i}) ) {
					echo '<a href="' . ${'fb'.$i} . '"><i class="link-icon fa fa-facebook"></i></a>';	
				}

				// Show the twitter profile of the user if it's not empty
				if ( ! empty(${'twitter'.$i}) ) {
					echo '<a href="' . ${'twitter'.$i} . '"><i class="link-icon fa fa-twitter"></i></a>';
				}

				// Show the linkedin profile of the user if it's not empty
				if ( ! empty(${'linkedin'.$i}) ) {
					echo '<a href="' . ${'linkedin'.$i} . '"><i class="link-icon fa fa-linkedin"></i></a>';
				}
				
				echo '</p>';
			}

		echo '</div>
			</div>';
		}

	echo '</div>';

?>

		