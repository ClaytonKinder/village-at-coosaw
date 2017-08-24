<?php
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$photofolio_2_footer_1_width = esc_attr(ot_get_option('photofolio-2-footer-1-width'));
		$photofolio_2_footer_2_width = esc_attr(ot_get_option('photofolio-2-footer-2-width'));
						
		$copyright = esc_attr(ot_get_option('copyright'));
		$totop_button = ot_get_option('totop_button');
	}
	else {
		$photofolio_2_footer_1_width = 'col-md-8';
		$photofolio_2_footer_2_width = 'col-md-4';
		
		$copyright = 'Copyright 2017';
		$totop_button = 'on';
	}
?>
<div id="footer">
	<div class="container">
		<div class="row">
			<div class="<?php echo $photofolio_2_footer_1_width; ?>">
				<div id="copyright">
					<?php
						echo '<p>' . $copyright . '</p>';
					?>
				</div>
			</div>
			<?php if (is_active_sidebar('newsletter') || $totop_button == 'on') { ?>
				<div class="<?php echo $photofolio_2_footer_2_width; ?>">
				<?php
					dynamic_sidebar('newsletter');
				?>
				<div id="totop-btn">
					<a href="#page" data-uk-smooth-scroll><i class="fa fa-chevron-up"></i></a>
				</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>