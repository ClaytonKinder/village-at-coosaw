<div class="jsquare-container" data-uk-scrollspy="<?php
	if ($grid_animations == 'none') {
	}
	else if ($grid_animations == 'fade') {
		echo "{cls:'uk-animation-fade'}";
	}
	else if ($grid_animations == 'scale-up') {
		echo "{cls:'uk-animation-scale-up'}";
	}
	else if ($grid_animations == 'scale-down') {
		echo "{cls:'uk-animation-scale-down'}";
	}
	else if ($grid_animations == 'slide-top') {
		echo "{cls:'uk-animation-slide-top'}";
	}
	else if ($grid_animations == 'slide-bottom') {
		echo "{cls:'uk-animation-slide-bottom'}";
	}
	else if ($grid_animations == 'slide-right') {
		echo "{cls:'uk-animation-slide-right'}";
	}
	else if ($grid_animations == 'slide-left') {
		echo "{cls:'uk-animation-slide-left'}";
	}
	?>">
	<div class="jsquare-testimonials-8">
		<div class="uk-grid">
			<?php
				for ($i = 1; $i <= $numfeedbacks; $i++) {
			?>
			<div class="uk-width-1-4 testimonials-box">
				<?php 
					if (! empty(${'img'.$i})) {
				?>
					<div class="image-col">
						<img src="<?php echo esc_html( ${'img'.$i} ); ?>" alt="">
					<?php
						if (! empty(${'job'.$i})) {
					?>
						<p class="jsquare-job-company"><?php echo esc_html( ${'job'.$i} ); ?></p>
					<?php
						}
					?>
					</div>
				<?php
					}
					if (! empty(${'name'.$i}) || ! empty(${'feedback'.$i})  || ! empty(${'job'.$i}) || ! empty(${'rating'.$i})) {
				?>
					<div class="right-col">
					<?php
						if (! empty(${'name'.$i}) ) {
					?>
						<p class="jsquare-user-name"><?php echo esc_html( ${'name'.$i} ); ?></p>
						<?php
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
			</div>
			<?php
				}
			?>
		</div>
	</div>
</div>