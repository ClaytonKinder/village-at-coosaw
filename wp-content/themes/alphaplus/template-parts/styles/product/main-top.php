<?php

	$box_class = NULL;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {
		$product_home_features = ot_get_option('product_home_features');
		$product_page_features = ot_get_option('product_page_features');
		$product_home_pricing = ot_get_option('product_home_pricing');
		$product_page_pricing = ot_get_option('product_page_pricing');
		$product_home_testimonials = ot_get_option('product_home_testimonials');
		$product_page_testimonials = ot_get_option('product_page_testimonials');
	}
	else {
		$product_home_features = 'on';
		$product_page_features = 'off';
		$product_home_pricing = 'on';
		$product_page_pricing = 'off';
		$product_home_testimonials = 'on';
		$product_page_testimonials = 'off';
	}


	if (( $product_home_features == 'on' ) && ( $product_page_features == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $product_home_features == 'on') && ( $product_page_features == 'on')) {
		$box_class = '';
	}
	else if (( $product_home_features == 'off') && ( $product_page_features == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $product_home_features == 'off') && ( $product_page_features == 'off')) {
		$box_class = 'hidden';
	}
	
	if (is_active_sidebar('features')) {
?>
<div id="features" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('features');
		?>
	</div>
</div>
<?php
	}
?>

<?php
	if (( $product_home_pricing == 'on' ) && ( $product_page_pricing == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $product_home_pricing == 'on') && ( $product_page_pricing == 'on')) {
		$box_class = '';
	}
	else if (( $product_home_pricing == 'off') && ( $product_page_pricing == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $product_home_pricing == 'off') && ( $product_page_pricing == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('pricing')) {
?>
<div id="pricing" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('pricing');
		?>
	</div>
</div>
<?php
	}
?>

<?php
	if (( $product_home_testimonials == 'on' ) && ( $product_page_testimonials == 'off')) {
		$box_class = 'front-widget';
	}
	else if (( $product_home_testimonials == 'on') && ( $product_page_testimonials == 'on')) {
		$box_class = '';
	}
	else if (( $product_home_testimonials == 'off') && ( $product_page_testimonials == 'on')) {
		$box_class = 'hidden-front';
	}	
	else if (( $product_home_testimonials == 'off') && ( $product_page_testimonials == 'off')) {
		$box_class = 'hidden';
	}

	if (is_active_sidebar('testimonials')) {
?>
<div id="testimonials" class="<?php echo $box_class; ?>">
	<div class="container">
		<?php
			dynamic_sidebar('testimonials');
		?>
	</div>
</div>
<?php
	}
?>