<div class="jsquare-container uk-slidenav-position" data-uk-slideset="{default: 2<?php
	if ($slideset_animations == 'none') {
		echo "}";
	}
	else if ($slideset_animations == 'fade') {
		echo ", animation: 'fade', duration: 200}";
	}
	else if ($slideset_animations == 'scale') {
		echo ", animation: 'scale', duration: 200}";
	}
	else if ($slideset_animations == 'slide-horizontal') {
		echo ", animation: 'slide-horizontal', duration: 200}";
	}
	else if ($slideset_animations == 'slide-vertical') {
		echo ", animation: 'slide-vertical', duration: 200}";
	}
	else if ($slideset_animations == 'slide-top') {
		echo ", animation: 'slide-top', duration: 200}";
	}
	else if ($slideset_animations == 'slide-bottom') {
		echo ", animation: 'slide-bottom', duration: 200}";
	}
	?>">
	<div class="uk-slider-container">
		<ul class="uk-grid uk-slideset style-1">
			<?php
				for ($i = 1; $i <= $numfeedbacks; $i++) {
			?>
			<li>
				<div class="jsquare-testimonials-box jsquare-testimonials-1">
					<?php 
						if (! empty(${'name'.$i}) || ! empty(${'feedback'.$i})) {
					?>
					<div class="left-col"><div class="rounded-section">
						<?php
							if (! empty(${'img'.$i})) {
						?>
						<img src="<?php echo esc_html( ${'img'.$i} ); ?>" alt="">
						<?php
							}
							else if ( empty(${'img'.$i}) && (! empty(${'name'.$i})) ) {
								echo '<img src="' . plugin_dir_url( __FILE__ ) . 'images/user-image.jpg" alt="">';
							}
							if (${'rating'.$i} != '0') {
								echo '<div class="rating-stars"><p>';
								if (${'rating'.$i} == '1') {
									echo '<i class="fa fa-' . $rating_icon . '"></i>';
								}
								else if (${'rating'.$i} == '2') {
									echo '<i class="fa fa-' . $rating_icon . '"></i><i class="fa fa-' . $rating_icon . '"></i>';
								}
								else if (${'rating'.$i} == '3') {
									echo '<i class="fa fa-' . $rating_icon . '"></i><i class="fa fa-' . $rating_icon . '"></i><i class="fa fa-' . $rating_icon . '"></i>';
								}
								else if (${'rating'.$i} == '4') {
									echo '<i class="fa fa-' . $rating_icon . '"></i><i class="fa fa-' . $rating_icon . '"></i><i class="fa fa-' . $rating_icon . '"></i><i class="fa fa-' . $rating_icon . '"></i>';
								}
								else if (${'rating'.$i} == '5') {
									echo '<i class="fa fa-' . $rating_icon . '"></i><i class="fa fa-' . $rating_icon . '"></i><i class="fa fa-' . $rating_icon . '"></i><i class="fa fa-' . $rating_icon . '"></i><i class="fa fa-' . $rating_icon . '"></i>';
								}
								echo '</p><p style="clear: both"></p></div>';
								}
						?>
					</div>
				</div>
							
				<div class="right-col">
					<?php
						if (! empty(${'name'.$i}) ) {
					?>
					<p class="jsquare-user-name"><?php echo esc_html( ${'name'.$i} ); ?></p>
					<?php
						}
						if (! empty(${'job'.$i})) {
					?>
					<p class="jsquare-job-company"><?php echo esc_html( ${'job'.$i} ); ?></p>
					<?php
						}
						if (! empty(${'feedback'.$i})) {
					?>
					<p class="jsquare-feedback"><?php echo esc_textarea( ${'feedback'.$i} ); ?></p>
					<?php
						}
					?>
				</div>
				<?php
					}
				?>
				<div style="clear: both;"></div></div>
			</li>
			<?php
				}
			?>
		</ul>
	</div>

	<a href="" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
	<a href="" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
</div>