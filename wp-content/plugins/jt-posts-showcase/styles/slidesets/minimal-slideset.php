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

	<div class="uk-slidenav-position minimal-slideset" data-uk-slideset="{small: 1, medium: 3, large: 4}">
		<ul class="uk-grid uk-slideset">
			<?php
				$posts_array = get_posts($args);

				// Show the posts in a UIkit's slideset
				foreach($posts_array as $post) {
					$post_type = get_post_type_object( get_post_type($post) );
					echo '<li><figure class="uk-overlay uk-overlay-hover">
							<a href="' . get_permalink( $post->ID ) . '">
								<img class="uk-overlay-scale" src="' . wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ) . '" alt=""></a>
							</figure>
							<div class="post-info uk-flex uk-flex-middle">
								<p class="title"><a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a></p>
							</div></li>';
				} 
			?>
		</ul>
			
		<a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
        <a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
	</div>