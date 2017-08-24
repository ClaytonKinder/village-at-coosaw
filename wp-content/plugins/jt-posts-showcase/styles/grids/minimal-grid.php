<?php

	// Get posts based on the widget's settings
	if ($source == "wp-posts") {
		if ($post_category == 'all') {
			$args = array("posts_per_page" => $posts_number, "orderby" => $orderby, "order" => $order);
		} else {
			$args = array("posts_per_page" => $posts_number, "category" => $post_category, "orderby" => $orderby, "order" => $order);
		}
	}
	else if ($source == "custom") {
		$args = array("posts_per_page" => $posts_number, "orderby" => $orderby, "order" => $order, "post_type" => array($include_post_types));
	}
?>

	<div class="uk-grid minimal-grid">
			<?php
				$posts_array = get_posts($args);

				// Show the posts in a UIkit's slideset
				foreach($posts_array as $post) {
					echo '<div class="uk-width-small-1-2 uk-width-medium-1-4 uk-width-large-1-4"><figure class="uk-overlay uk-overlay-hover">
							<a href="' . get_permalink( $post->ID ) . '">
								<img class="uk-overlay-scale" src="' . wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ) . '" alt=""></a>
							</figure>
							<div class="post-info uk-flex uk-flex-middle">
								<p class="title"><a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a></p>
							</div></div>';
				} 
			?>
	</div>
			