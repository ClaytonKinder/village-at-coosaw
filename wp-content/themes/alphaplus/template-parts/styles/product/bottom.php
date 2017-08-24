<?php
	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$product_home_bottom = ot_get_option('product_home_bottom');
		$product_page_bottom = ot_get_option('product_page_bottom');
		$product_home_sponsors = ot_get_option('product_home_sponsors');
		$product_page_sponsors = ot_get_option('product_page_sponsors');
	}
	else {
		$product_home_bottom = 'on';
		$product_page_bottom = 'off';
		$product_home_bottom = 'on';
		$product_page_bottom = 'on';
	}

	if (( $product_home_bottom == 'on' ) && ( $product_page_bottom == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $product_home_bottom == 'on') && ( $product_page_bottom == 'on')) {
		$box_class = '';
	}
	else if (( $product_home_bottom == 'off') && ( $product_page_bottom == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $product_home_bottom == 'off') && ( $product_page_bottom == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('bottom')) {
?>
<div id="bottom" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('bottom');
		?>
	</div>
</div>
<?php
	}

	if (( $product_home_sponsors == 'on' ) && ( $product_page_sponsors == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $product_home_sponsors == 'on') && ( $product_page_sponsors == 'on')) {
		$box_class = '';
	}
	else if (( $product_home_sponsors == 'off') && ( $product_page_sponsors == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $product_home_sponsors == 'off') && ( $product_page_sponsors == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('sponsors')) {
?>
<div id="sponsors" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('sponsors');
		?>
	</div>
</div>
<?php
	}
?>