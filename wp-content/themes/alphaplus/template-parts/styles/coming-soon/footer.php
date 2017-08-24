<?php
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$copyright = esc_attr(ot_get_option('copyright'));
	}
	else {
		$copyright = 'Copyright 2017';
	}
?>
<div id="footer">
	<div class="container">
		<div id="copyright">
			<?php
				echo '<p>' . $copyright . '</p>';
			?>
		</div>
	</div>
</div>