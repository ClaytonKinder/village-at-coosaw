<?php
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$photofolio_footer_1_width = esc_attr(ot_get_option('photofolio-footer-1-width'));
		$photofolio_footer_2_width = esc_attr(ot_get_option('photofolio-footer-2-width'));
						
		$copyright = esc_attr(ot_get_option('copyright'));
	}
	else {
		$photofolio_footer_1_width = 'col-md-8';
		$photofolio_footer_2_width = 'col-md-4';
		
		$copyright = 'Copyright 2017';
	}
?>
<div id="footer">
	<div class="row">
		<div class="<?php echo $photofolio_footer_1_width; ?>">
			<div id="copyright">
				<?php
					echo '<p>' . $copyright . '</p>';
				?>
			</div>
		</div>
		<?php if (is_active_sidebar('newsletter')) { ?>
			<div class="<?php echo $photofolio_footer_2_width; ?>">
			<?php
				dynamic_sidebar('newsletter');
			?>
			</div>
		<?php } ?>
	</div>
</div>