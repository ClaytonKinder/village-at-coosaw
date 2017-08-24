<?php
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$radio_footer_1_width = esc_attr(ot_get_option('radio-footer-1-width'));
		$radio_footer_2_width = esc_attr(ot_get_option('radio-footer-2-width'));
		$radio_footer_3_width = esc_attr(ot_get_option('radio-footer-3-width'));
		$radio_footer_4_width = esc_attr(ot_get_option('radio-footer-4-width'));
				
		$copyright = esc_attr(ot_get_option('copyright'));
		$totop_button = ot_get_option('totop_button');
	}
	else {
		$radio_footer_1_width = 'on';
		$radio_footer_2_width = 'on';
		$radio_footer_3_width = 'on';
		$radio_footer_4_width = 'on';
		
		$copyright = 'Copyright &copy 2017';
		$totop_button = 'on';
	}
?>
<div id="footer">
	<div class="container">
		<?php
			if ( (is_active_sidebar('footer-1')) || (is_active_sidebar('footer-2')) || (is_active_sidebar('footer-3')) || (is_active_sidebar('footer-4')) ) {
		?>
		<div class="row">
			<?php if (is_active_sidebar('footer-1')) { ?>
			<div class="<?php echo $radio_footer_1_width; ?>">
				<?php
					dynamic_sidebar('footer-1');
				?>
			</div>
			<?php } ?>
			<?php if (is_active_sidebar('footer-2')) { ?>
			<div class="<?php echo $radio_footer_2_width; ?>">
				<?php
					dynamic_sidebar('footer-2');
				?>
			</div>
			<?php } ?>
			<?php if (is_active_sidebar('footer-3')) { ?>
			<div class="<?php echo $radio_footer_3_width; ?>">
				<?php
					dynamic_sidebar('footer-3');
				?>
			</div>
			<?php } ?>
			<?php if (is_active_sidebar('footer-4')) { ?>
			<div class="<?php echo $radio_footer_4_width; ?>">
				<?php
					dynamic_sidebar('footer-4');
				?>
			</div>
			<?php } ?>
		</div>	
		<?php
			}
		?>
		
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