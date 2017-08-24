<?php
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$copyright = esc_attr(ot_get_option('copyright'));
		$totop_button = ot_get_option('totop_button');
	}
	else {
		$copyright = 'Copyright 2017';
		$totop_button = 'on';
	}
?>
<div id="footer">
	<div class="container">
		<div id="copyright">
			<?php
				echo '<p>' . $copyright . '</p>';
			?>
			<?php
				if ($totop_button == 'on') {
			?>
			<div id="totop-btn">
				<a href="#page" data-uk-smooth-scroll><i class="fa fa-chevron-up"></i></a>
			</div>
			<?php
				}
			?>
		</div>
	</div>
</div>