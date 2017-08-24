<?php

	echo '<div class="jsquare-users-list">';
	echo '<div class="uk-grid">';

		for ($i = 1; $i <= $numusers; $i++) {

	// Create a div that includes the content
	echo '<div class="uk-width-1-4">
		<div class="grid-style-2">';
	
		// Show the image of the user if it's not empty
		if ( ! empty(${'img'.$i})) {
			echo '<p class="image"><img src="' . ${'img'.$i} . '" alt=""></p>';
		}

		// Show the name and/or the job of the user if they are not empty
		if (( ! empty(${'name'.$i})) ||  ( ! empty(${'job'.$i}))) {
			echo '<div class="row">';
					if ( ! empty(${'name'.$i})) {
						echo '<p class="name">' . ${'name'.$i} . '</p>';
					}

					if ( ! empty(${'job'.$i})) {
						echo '<p class="job">' . ${'job'.$i} . '</p>';
					}
			echo '</div>';
		}	

		if ( ( ! empty(${'fb'.$i}) ) || ( ! empty(${'twitter'.$i}) ) || ( ! empty(${'linkedin'.$i}) )) {
				echo __('<div class="follow"><span class="label">Find me on</span>');
				
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
				
				echo '</div>';
			}

	echo '</div>
		</div>';
			
		}

	echo '</div>';
	echo '</div>';
?>

		