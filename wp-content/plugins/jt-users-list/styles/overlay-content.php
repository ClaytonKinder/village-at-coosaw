<?php

	echo '<div class="jsquare-users-list">';
	echo '<div class="uk-grid">';

		for ($i = 1; $i <= $numusers; $i++) {

	// Create a div that includes the content
	echo '<div class="uk-width-1-4">
		<div class="grid-overlay-content">';
	
		/* Show the image and the basic info of the user if all of them are not empty. 
		 * We use overlay component of UIkit Framework to create the overlay.
		 */
		if (( ! empty(${'img'.$i})) || ( ! empty(${'name'.$i})) || ( ! empty(${'job'.$i})) || ( ! empty(${'fb'.$i})) || ( ! empty(${'twitter'.$i})) || (! empty(${'linkedin'.$i}))) {
			echo '<figure class="uk-overlay uk-overlay-hover"><p class="image"><img src="' . ${'img'.$i} . '" alt=""></p>';
			echo '<figcaption class="uk-overlay-panel uk-overlay-bottom uk-overlay-background uk-ignore">
					<p class="name">' . ${'name'.$i} . '</p>
					<div class="row">
				    	<p class="job"><i class="fa fa-briefcase"></i> ' . ${'job'.$i} . '</p>';
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

						echo '</p>
					</div>
				  </figcaption></figure>';
		}
	echo '</div>
		</div>';
			
	}

	echo '</div>';
	echo '</div>';

?>

		