<?php
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$mall_footer_1_width = esc_attr(ot_get_option('mall-footer-1-width'));
		$mall_footer_2_width = esc_attr(ot_get_option('mall-footer-2-width'));
						
		$copyright = esc_attr(ot_get_option('copyright'));
		$totop_button = ot_get_option('totop_button');
	}
	else {
		$mall_footer_1_width = 'col-md-8';
		$mall_footer_2_width = 'col-md-4';
		
		$copyright = 'Copyright 2017';
		$totop_button = 'on';
	}

?>
<div id="footer">
	<div class="container">
		<div class="row">
			<div class="<?php echo $mall_footer_1_width; ?>">
				<?php
					if (is_active_sidebar('footer-1')) {
						dynamic_sidebar('footer-1');
					}
				?>
				<div id="copyright">
					<?php

						echo '<p>' . $copyright . '</p>';
					?>
				</div>
			</div>
			<?php if (is_active_sidebar('footer-2')) { ?>
			<div class="<?php echo $mall_footer_2_width; ?>">
				<?php
					dynamic_sidebar('footer-2');
				?>
			</div>
			<?php } ?>
		</div>
	</div>
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