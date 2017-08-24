<?php

	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$product_home_showcase = ot_get_option('product_home_showcase');
		$product_page_showcase = ot_get_option('product_page_showcase');
	}
	else {	
		$product_home_showcase = 'on';
		$product_page_showcase = 'off';
	}

	if (( $product_home_showcase == 'on' ) && ( $product_page_showcase == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $product_home_showcase == 'on') && ( $product_page_showcase == 'on')) {
		$box_class = '';
	}
	else if (( $product_home_showcase == 'off') && ( $product_page_showcase == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $product_home_showcase == 'off') && ( $product_page_showcase == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('showcase') || is_active_sidebar('showcase-form')) {
?>
	<div id="showcase" class="<?php echo $box_class; ?>">
		<?php
			dynamic_sidebar('showcase');
		?>
		<div id="showcase-form" class="slide-bottom-animation">
			<?php
				dynamic_sidebar('showcase-form');
			?>
		</div>
	</div>
<?php
	}
?>