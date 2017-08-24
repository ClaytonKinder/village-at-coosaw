<?php
	if (is_active_sidebar('showcase')) {
?>
	<div id="showcase" class="<?php echo $box_class; ?>">
		<?php
			dynamic_sidebar('showcase');
		?>
	</div>
<?php
	}

	if (is_active_sidebar('counter')) {
?>
	<div id="counter" class="<?php echo $box_class; ?>">
		<?php
			dynamic_sidebar('counter');
		?>
	</div>
<?php
	}
?>