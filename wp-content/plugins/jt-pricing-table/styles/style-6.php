<div class="uk-grid jsquare-pricing-6">
	<style>
		<?php
			if ($num_columns == '3') {
		?>
		.jsquare-pricing-6 .pricing_btn {
			width: 53% !important;
		}
		<?php
			}
		?>
	</style>
<?php
	if ($num_columns == '3') {
		echo __('<div class="uk-width-1-3"');
	}
	else {
		echo __('<div class="uk-width-1-4"');
	}
	if ($animation == 'none') {
		echo ">";
	} else {
	?> data-uk-scrollspy="{cls:'uk-animation-<?php echo esc_html( $animation ); ?>', target:'.pricing-box', delay: 300, repeat: true}">
	<?php } echo __('<div class="pricing-box">');
		
		if ( ! empty($plan)) {
			echo '<div class="jsquare-pt-top-text"><p style="background: ' . $plan_color_1 . '">' . esc_html( $plan ) . '</p></div>';
		}

		if ( ! empty($features)) {
			echo '<div class="jsquare-pt-features">';
				$rows = preg_split('/\r\n|\r|\n/', $features);
				$i = 0;
				for ($i; $i < count($rows); $i++) {
					echo '<p>' . esc_textarea( $rows[$i] ) . '</p>';
				}
			echo '</div>';
		}

		if ( ! empty($price) ) {
			echo '<div class="jsquare-pt-price" style="background: ' . $price_color_1 . '"><p><sup>' . esc_html( $currency_symbol ) . '</sup>' . esc_html( $price ) . '</p></div>';
		}

		if ( $buy_button == 'show') {
			echo '<div class="pricing_btn"><p><a href="' . $buy_button_url . '">' . $buy_button_text . '</a></p></div>';
		}
		
		echo '</div>';
	echo '</div>';
		
	if ($num_columns == '3') {
		echo __('<div class="uk-width-1-3"');
	}
	else {
		echo __('<div class="uk-width-1-4"');
	}
	if ($animation == 'none') {
		echo ">";
	} else {
	?> data-uk-scrollspy="{cls:'uk-animation-<?php echo esc_html( $animation ); ?>', target:'.pricing-box', delay: 600, repeat: true}">
	<?php } echo __('<div class="pricing-box">');
		
		if ( ! empty($plan_2)) {
			echo '<div class="jsquare-pt-top-text"><p style="background: ' . $plan_color_2 . '">' . esc_html( $plan_2 ) . '</p></div>';
		}
		
		if ( ! empty($features_2)) {
			echo '<div class="jsquare-pt-features">';
				$rows = preg_split('/\r\n|\r|\n/', $features_2);
				$i = 0;
				for ($i; $i < count($rows); $i++) {
					echo '<p>' . esc_textarea( $rows[$i] ) . '</p>';
				}
			echo '</div>';
		}
		
		if ( ! empty($price_2) ) {
			echo '<div class="jsquare-pt-price" style="background: ' . $price_color_2 . '"><p><sup>' . esc_html( $currency_symbol ) . '</sup>' . esc_html( $price_2 ) . '</p></div>';
		}

		if ( $buy_button_2 == 'show') {
			echo '<div class="pricing_btn"><p><a href="' . $buy_button_url_2 . '">' . $buy_button_text_2 . '</a></p></div>';
		}
		
		echo '</div>';
	echo '</div>';
		
	if ($num_columns == '3') {
		echo __('<div class="uk-width-1-3"');
	}
	else {
		echo __('<div class="uk-width-1-4"');
	}
		if ($animation == 'none') {
			echo ">";
		} else {
	?> data-uk-scrollspy="{cls:'uk-animation-<?php echo esc_html( $animation ); ?>', target:'.pricing-box', delay: 900, repeat: true}">
	<?php } echo __('<div class="pricing-box">');
		
		if ( ! empty($plan_3)) {
			echo '<div class="jsquare-pt-top-text"><p style="background: ' . $plan_color_3 . '">' . esc_html( $plan_3 ) . '</p></div>';
		}
		
		if ( ! empty($features_3)) {
			echo '<div class="jsquare-pt-features">';
				$rows = preg_split('/\r\n|\r|\n/', $features_3);
				$i = 0;
				for ($i; $i < count($rows); $i++) {
					echo '<p>' . esc_textarea( $rows[$i] ) . '</p>';
				}
			echo '</div>';
		}
		
		if ( ! empty($price_3) ) {
			echo '<div class="jsquare-pt-price" style="background: ' . $price_color_3 . '"><p><sup>' . esc_html( $currency_symbol ) . '</sup>' . esc_html( $price_3 ) . '</p></div>';
		}

		if ( $buy_button_3 == 'show') {
			echo '<div class="pricing_btn"><p><a href="' . $buy_button_url_3 . '">' . $buy_button_text_3 . '</a></p></div>';
		}
		
		echo '</div>';
	echo '</div>';
	
	if ($num_columns == '3') {
	}
	else {
		echo __('<div class="uk-width-1-4"');
		if ($animation == 'none') {
			echo ">";
		} else {
	?> data-uk-scrollspy="{cls:'uk-animation-<?php echo esc_html( $animation ); ?>', target:'.pricing-box', delay: 1200, repeat: true}">
	<?php } echo __('<div class="pricing-box">');
		
		if ( ! empty($plan_4)) {
			echo '<div class="jsquare-pt-top-text"><p style="background: ' . $plan_color_4 . '">' . esc_html( $plan_4 ) . '</p></div>';
		}
		
		if ( ! empty($features_4)) {
			echo '<div class="jsquare-pt-features">';
				$rows = preg_split('/\r\n|\r|\n/', $features_4);
				$i = 0;
				for ($i; $i < count($rows); $i++) {
					echo '<p>' . esc_textarea( $rows[$i] ) . '</p>';
				}
			echo '</div>';
		}
		
		if ( ! empty($price_4) ) {
			echo '<div class="jsquare-pt-price" style="background: ' . $price_color_4 . '"><p><sup>' . esc_html( $currency_symbol ) . '</sup>' . esc_html( $price_4 ) . '</p></div>';
		}

		if ( $buy_button_4 == 'show') {
			echo '<div class="pricing_btn"><p><a href="' . $buy_button_url_4 . '">' . $buy_button_text_4 . '</a></p></div>';
		}
		
		echo '</div>';
	echo '</div>';
	}

?>
</div>