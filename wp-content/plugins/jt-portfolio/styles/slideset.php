<?php
	if ($display_filters == 'yes') {
?>
<ul id="filter-list">
    <li data-uk-filter=""><a href=""></a><?php _e('All'); ?></li>
	<?php
		$filters_array[] = NULL;

		for ($i = 1; $i <= 12; $i++) {
			if (! in_array(${'filter' . $i}, $filters_array)) {
				array_push($filters_array, ${'filter' . $i});
	?>
    	<li data-uk-filter="<?php echo rtrim(${'filter' . $i}); ?>"><a href=""><?php echo rtrim(${'filter' . $i}); ?></a></li>
	<?php
			}
		}
	?>
</ul>
<?php
	}
?>

<div class="slideset-portfolio uk-slidenav-position" data-uk-slideset="{small: 1, medium: 2, large: 4, controls: '#filter-list'}">
    <ul class="uk-grid uk-slideset">
	<?php

		// Show all projects in a grid
		for($i = 1; $i <= 12; $i++) {
			if ( ${ 'img' . $i } != NULL ) {
				
	?>
	<li <?php if ($display_filters == 'yes') { ?>data-uk-filter="<?php echo rtrim(${'filter' . $i}); ?>" <?php } ?>>
		<figure class="uk-overlay uk-overlay-hover">
			<img class="uk-overlay-scale" src="<?php echo ${'img' . $i }; ?>" alt="">
			<figcaption class="uk-overlay-panel uk-overlay-bottom uk-ignore uk-overlay-background">
				<div>
				<?php
					if ( ( ${ 'title' . $i } != NULL ) || ( ${ 'short_info' . $i } != NULL ) ) {
				?>
				<p class="project-title"><?php echo rtrim(${'title' . $i }); ?>
					<?php
						if ( ${ 'short_info' . $i } != NULL ) {
					?>
						<span class="project-info"><?php echo rtrim(${'short_info' . $i }); ?></span>
					<?php
						}
					?>
				</p>
				<?php
					}
				?>
				<?php
					if ( ( ${ 'lbutton_url' . $i } != NULL ) || ( ${ 'lbutton_icon' . $i } != NULL ) || ( ${ 'lbutton_text' . $i } != NULL ) ) {
				?>
					<a class="lbutton" href="<?php echo rtrim(${'lbutton_url' . $i }); ?>">
						<?php
							if ( ${ 'lbutton_icon' . $i } != NULL ) {
						?>
						<i class="fa <?php echo rtrim(${'lbutton_icon' . $i }); ?>"></i>
						<?php
							}
						?>
						<?php echo rtrim(${'lbutton_text' . $i }); ?>
					</a>
				<?php
					}
					if ( ( ${ 'rbutton_url' . $i } != NULL ) || ( ${ 'rbutton_icon' . $i } != NULL ) || ( ${ 'rbutton_text' . $i } != NULL ) ) {
				?>
					<a class="rbutton" href="<?php echo rtrim(${'rbutton_url' . $i }); ?>">
						<?php
							if ( ${ 'rbutton_icon' . $i } != NULL ) {
						?>
						<i class="fa <?php echo rtrim(${'rbutton_icon' . $i }); ?>"></i>
						<?php
							}
						?>
						<?php echo rtrim(${'rbutton_text' . $i }); ?>
					</a>
				<?php
					}
				?>
				</div>
			</figcaption>
		</figure>
	</li>
	<?php
			}
		} 
	?>
	</ul>
	<a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
	<a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
</div>