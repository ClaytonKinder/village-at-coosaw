<?php
	
	global $woocommerce;
	$cart_url = $woocommerce->cart->get_cart_url();
	
	// Get posts based on the widget's settings
	if ($product_category == 'all') {
		$args = array("post_type" => 'product', "posts_per_page" => $products_number, "orderby" => $orderby, "order" => $order);
	} else {
		$args = array("post_type" => 'product', "posts_per_page" => $products_number, "orderby" => $orderby, "order" => $order, 
			'tax_query'             => array(
				array(
					'taxonomy'      => 'product_cat',
					'field' => 'term_id',
					'terms'         => $product_category,
					'operator'      => 'IN'
				)
			));
	}
?>
	<div class="uk-grid product-grid-overlay-small">
		<?php
			// Get the post that will be shown with image
			$products_array = get_posts($args);

			
			// Show these posts in a grid
			foreach($products_array as $product) {
				$price = get_post_meta( $product->ID, '_regular_price', true);
				$sale = get_post_meta( $product->ID, '_sale_price', true);
				$sku = get_post_meta( $product->ID, '_sku', true);
				
				echo '<div class="uk-width-1-2">
						<figure class="uk-overlay uk-overlay-hover">
							<a href="' . get_permalink( $product->ID ) . '">
								<img class="uk-overlay-scale" src="' . wp_get_attachment_url( get_post_thumbnail_id($product->ID), 'thumbnail'  ) . '" alt="">
							</a>';
							if ($sale != NULL) {
								echo '<p class="sale-icon">' . __('Sale') . '</p>';
							}
							echo '<figcaption class="uk-overlay-bottom uk-overlay-panel uk-overlay-background uk-ignore">
								<div class="uk-grid">
									<div class="uk-width-2-3">
										<p class="title"><a href="' . get_permalink( $product->ID ) . '">' . $product->post_title . '</a></p>';
										if ($show_sku == 'yes') {
											echo '<p class="product-sku">' . __('#') . $sku . '</p>';
										}
									echo '</div>
									<div class="uk-width-1-3">';
										if ($sale != NULL) {
											echo '<p class="price">';
											if ($show_read_more == 'yes') {
												echo '<span class="product-btn"><a href="'  . get_permalink( $product->ID ) . '"><i class="fa fa-search"></i></a></span>';
											}
											echo '<span class="regular">' . get_woocommerce_currency_symbol() . ' ' . $price . '</span><span class="sale">' . get_woocommerce_currency_symbol() . ' ' .$sale . '</span>';
											if ($add_to_cart_btn == 'yes') {
												echo '<a class="add-to-cart-btn" href="' . $cart_url . '?add-to-cart=' . $product->ID . '"><i class="fa fa-shopping-cart"></i></a>';
											}
											echo '</p>';
										}
										else {
											echo '<p class="price">';
											if ($show_read_more == 'yes') {
												echo '<span class="product-btn"><a href="'  . get_permalink( $product->ID ) . '"><i class="fa fa-search"></i></a></span>';
											}
											echo get_woocommerce_currency_symbol() . ' ' . $price;
											if ($add_to_cart_btn == 'yes') {
												echo '<a class="add-to-cart-btn" href="' . $cart_url . '?add-to-cart=' . $product->ID . '"><i class="fa fa-shopping-cart"></i></a>';
											}
											echo '</p>';
										}
									echo '</div>';
								echo '</div>';
				
								echo '</figcaption>';
							echo '</figure>
					</div>';
			} 

		?>
	</div>
