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

	<div class="showcase-overlay-title">
		<ul>
			<?php
				$posts_array = get_posts($args);

				// Show these posts
				foreach($posts_array as $post) {
					$post_type = get_post_type_object( get_post_type($post) );
					echo '<li><figure class="uk-overlay uk-overlay-hover">
							<a href="' . get_permalink( $post->ID ) . '">
								<img class="uk-overlay-scale" src="' . wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ) . '" alt="">';
								if ($show_date == 'yes') {
									echo '<p class="meta-box"><span class="date">' . mysql2date('j M Y', $post->post_date) . '</span></p>';
								}
								echo '</a><figcaption class="uk-overlay-panel uk-overlay-bottom uk-overlay-background uk-ignore">' . $post->post_title;
									if ($show_category == 'yes') {
										if ( $source == "custom" ) {
											echo '<a class="category" href="' . get_post_type_archive_link( $include_post_types ) . '">' . $post_type->label . '</a>';
										}
										else if ($source == "wp-posts") {
											echo '<a class="category" href="' . get_category_link(get_the_category($post->ID)[0]) . '">' . get_the_category( $post->ID )[0]->cat_name . '</a>';
										}
									}
								echo '</figcaption>
						</figure></li>';
				} 

			?>
		</ul>
	</div>