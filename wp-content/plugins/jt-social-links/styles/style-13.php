<div class="uk-slidenav-position jsquare-social-links-4" data-uk-slideset="{default: 3}">
	<ul class="uk-grid uk-slideset">
	<?php

		if ( ! empty (rtrim($behance))) {
			echo __('<li class="column behance-icon">');
				echo '<a class="behance-icon" href="' . esc_html( $behance ) . '"><i class="fa fa-behance"></i><span>Behance</span></a>';
			echo __('</li>');
		}

		if ( ! empty (rtrim($dribbble))) {
			echo __('<li class="column dribbble-icon">');
				echo '<a class="dribbble-icon" href="' . esc_html( $dribbble ) . '"><i class="fa fa-dribbble"></i><span>Dribbble</span></a>';
			echo __('</li>');
		}

		if ( ! empty (rtrim($facebook))) {
			echo __('<li class="column facebook-icon">');
				echo '<a class="facebook-icon" href="' . esc_html( $facebook ) . '"><i class="fa fa-facebook"></i><span>Facebook</span></a>';
			echo __('</li>');
		}

		if ( ! empty (rtrim($flickr))) {
			echo __('<li class="column flickr-icon">');
				echo '<a class="flickr-icon" href="' . esc_html( $flickr ) . '"><i class="fa fa-flickr"></i><span>Flickr</span></a>';
			echo __('</li>');
		}

		if ( ! empty (rtrim($foursquare))) {
			echo __('<li class="column foursquare-icon">');
				echo '<a class="foursquare-icon" href="' . esc_html( $foursquare ) . '"><i class="fa fa-foursquare"></i><span>Foursquare</span></a>';
			echo __('</li>');
		}

		if ( ! empty (rtrim($github))) {
			echo __('<li class="column github-icon">');
				echo '<a class="github-icon" href="' . esc_html( $github ) . '"><i class="fa fa-github"></i><span>Github</span></a>';
			echo __('</li>');
		}

		if ( ! empty (rtrim($gplus))) {
			echo __('<li class="column gplus-icon">');
				echo '<a class="gplus-icon" href="' . esc_html( $gplus ) . '"><i class="fa fa-google-plus"></i><span>Google+</span></a>';
			echo __('</li>');
		}

		if ( ! empty (rtrim($instagram))) {
			echo __('<li class="column instagram-icon">');
				echo '<a class="instagram-icon" href="' . esc_html( $instagram ) . '"><i class="fa fa-instagram"></i><span>Instagram</span></a>';
			echo __('</li>');
		}

		if ( ! empty (rtrim($linkedin))) {
			echo __('<li class="column linkedin-icon">');
				echo '<a class="linkedin-icon" href="' . esc_html( $linkedin ) . '"><i class="fa fa-linkedin"></i><span>LinkedIn</span></a>';
			echo __('</li>');
		}

		if ( ! empty (rtrim($pinterest))) {
			echo __('<li class="column pinterest-icon">');
				echo '<a class="pinterest-icon" href="' . esc_html( $pinterest ) . '"><i class="fa fa-pinterest"></i><span>Pinterest</span></a>';
			echo __('</li>');
		}

		if ( ! empty (rtrim($tumblr))) {
			echo __('<li class="column tumblr-icon">');
				echo '<a class="tumblr-icon" href="' . esc_html( $tumblr ) . '"><i class="fa fa-tumblr"></i><span>Tumblr</span></a>';
			echo __('</li>');
		}

		if ( ! empty (rtrim($twitter))) {
			echo __('<li class="column twitter-icon">');
				echo '<a class="twitter-icon" href="' . esc_html( $twitter ) . '"><i class="fa fa-twitter"></i><span>Twitter</span></a>';
			echo __('</li>');
		}

		if ( ! empty (rtrim($vimeo))) {
			echo __('<li class="column vimeo-icon">');
				echo '<a class="vimeo-icon" href="' . esc_html( $vimeo ) . '"><i class="fa fa-vimeo"></i><span>Vimeo</span></a>';
			echo __('</li>');
		}

		if ( ! empty (rtrim($vine))) {
			echo __('<li class="column vine-icon">');
				echo '<a class="vine-icon" href="' . esc_html( $vine ) . '"><i class="fa fa-vine"></i><span>Vine</span></a>';
			echo __('</li>');
		}

		if ( ! empty (rtrim($youtube))) {
			echo __('<li class="column youtube-icon">');
				echo '<a class="youtube-icon" href="' . esc_html( $youtube ) . '"><i class="fa fa-youtube-play"></i><span>YouTube</span></a>';
			echo __('</li>');
		}

	?>
	</ul>
    <a href="" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
    <a href="" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
</div>