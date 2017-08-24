<div class="uk-grid jsquare-black">
<?php
	
	echo __('<div class="uk-width-1-4">');
		echo __('<div class="counter-box">');

			if ( ! empty($number)) {
				echo '<p class="jsquare-counter-number">'. esc_html( $number ) . '</p>';
			}

			if ( ! empty($text)) {
				echo '<p class="jsquare-counter-text">' . esc_html( $text ) . '</p>';
			}

	echo __('</div></div>');

	echo __('<div class="uk-width-1-4">');
		echo __('<div class="counter-box">');

			if ( ! empty($number_2)) {
					echo '<p class="jsquare-counter-number" data-uk-scrollspy>' . esc_html( $number_2 ) . '</p>';
			}

			if ( ! empty($text_2)) {
				echo '<p class="jsquare-counter-text">' . esc_html( $text_2 ) . '</p>';
			}

	echo __('</div></div>');

	echo __('<div class="uk-width-1-4">');
		echo __('<div class="counter-box">');

			if ( ! empty($number_3)) {
				echo '<p class="jsquare-counter-number" data-uk-scrollspy>' . esc_html( $number_3 ) . '</p>';
			}

			if ( ! empty($text_3)) {
				echo '<p class="jsquare-counter-text">' . esc_html( $text_3 ) . '</p>';
			}

	echo __('</div></div>');

	echo __('<div class="uk-width-1-4">');
		echo __('<div class="counter-box">');

			if ( ! empty($number_4)) {
				echo '<p class="jsquare-counter-number" data-uk-scrollspy>' . esc_html( $number_4 ) . '</p>';
			}

			if ( ! empty($text_4)) {
				echo '<p class="jsquare-counter-text">' . esc_html( $text_4 ) . '</p>';
			}

	echo __('</div></div>');
?>
</div>