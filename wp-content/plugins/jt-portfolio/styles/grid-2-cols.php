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

<div class="uk-grid-width-small-1-1 uk-grid-width-medium-1-1 uk-grid-width-large-1-2 grid-2-cols-portfolio" data-uk-grid="{controls: '#filter-list'}">
	<?php

		// Show all projects in a grid
		for($i = 1; $i <= 12; $i++) {
			if ( ${ 'img' . $i } != NULL ) {
				
	?>
	<div class="uk-grid" <?php if ($display_filters == 'yes') { ?>data-uk-filter="<?php echo rtrim(${'filter' . $i}); ?>" <?php } ?>>
		<div class="uk-width-1-2">
			<figure class="uk-overlay uk-overlay-hover">
				<img class="uk-overlay-scale" src="<?php echo ${'img' . $i }; ?>" alt="">
			</figure>
		</div>
		<div class="uk-width-1-2">
			<?php
				if ( ${ 'title' . $i } != NULL ) {
			?>
			<p class="project-title">
				<span><?php echo rtrim(${'title' . $i }); ?></span>
				<span class="project-info"><?php echo rtrim(${'short_info' . $i }); ?></span>
			<?php
				}

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
					<?php echo ${'lbutton_text' . $i }; ?>
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
			</p>
		</div>
	</div>
	<?php
			}
		} 
	?>
</div>