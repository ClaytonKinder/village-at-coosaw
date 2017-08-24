<?php

	// Get posts based on the widget's settings
	if ($source == "wp-posts") {
		if ($post_category == 'all') {
			$args = array("posts_per_page" => $posts_number -1, "orderby" => $orderby, "order" => $order, "offset" => 1);
		} else {
			$args = array("posts_per_page" => $posts_number -1, "category" => $post_category, "orderby" => $orderby, "order" => $order,  "offset" => 1);
		}
	}
	else if ($source == "custom") {
		$args = array("posts_per_page" => $posts_number -1, "orderby" => $orderby, "order" => $order, "offset" => 1, "post_type" => array($include_post_types));
	}
			
?>

	<div class="uk-grid grid-large uk-grid-match">
		<?php

			// Get post based on the widget's settings to show it with a large image
			if ($source == "wp-posts") {
				$latest = get_posts(array("posts_per_page" => 1, "orderby" => $orderby, "order" => $order, "category" => $post_category));
			}
			else if ($source == "custom") {
				$latest = get_posts(array("posts_per_page" => 1, "orderby" => $orderby, "order" => $order, "post_type" => array($include_post_types)));
			}
			$posts_array = get_posts($args);

			// Show this post
			foreach($latest as $latest_post) {
				$post_type = get_post_type_object( get_post_type($latest_post) );
				echo '<div class="uk-width-1-2">
						<figure class="grid-large-image uk-overlay uk-overlay-hover">
							<a href="' . get_permalink( $latest_post->ID ) . '">
								<img class="uk-overlay-spin" src="' . wp_get_attachment_url( get_post_thumbnail_id($latest_post->ID), 'thumbnail'  ) . '" alt="">
							</a>
							<figcaption class="uk-overlay-panel uk-flex uk-flex-bottom uk-overlay-background uk-ignore">
								<div>
									<p><a href="' . get_permalink( $latest_post->ID ) . '">' . $latest_post->post_title . '</a>';
									if ($show_date == 'yes') {
										echo '<span class="date">' . mysql2date('j M Y', $latest_post->post_date) . '</span>';
									}
									if ($show_comments == 'yes') {
										echo '<span class="comments"><i class="fa fa-comments-o"></i>' . get_comments_number($latest_post->ID) . '</span>';
									}								
									if ($show_category == 'yes') {
										if ( $source == "custom" ) {
											echo '<a class="category" href="' . get_post_type_archive_link( $include_post_types ) . '">' . $post_type->label . '</a>';
										}
										else if ($source == "wp-posts") {
											echo '<a class="category" href="' . get_category_link(get_the_category($latest_post->ID)[0]) . '">' . get_the_category( $latest_post->ID )[0]->cat_name . '</a>';
										}
									}
								echo '</p>
								</div>
							</figcaption>
						</figure>
					</div>';
			}

			echo '<div class="uk-width-1-2"><div class="uk-grid grid-large-right uk-grid-match">';

				// Show the other posts
				foreach($posts_array as $post) {
				$post_type = get_post_type_object( get_post_type($post) );
					echo '<div class="uk-width-1-2">
						<figure class="grid-small-image uk-overlay uk-overlay-hover">
							<a href="' . get_permalink( $post->ID ) . '">
								<img class="uk-overlay-spin" src="' . wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ) . '" alt="">
							</a>
							<figcaption class="uk-overlay-panel uk-flex uk-flex-bottom uk-overlay-background uk-ignore">
								<div>
									<p><a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a>';
									if ($show_category == 'yes') {
										if ( $source == "custom" ) {
											echo '<a class="category" href="' . get_post_type_archive_link( $include_post_types ) . '">' . $post_type->label . '</a>';
										}
										else if ($source == "wp-posts") {
											echo '<a class="category" href="' . get_category_link(get_the_category($post->ID)[0]) . '">' . get_the_category( $post->ID )[0]->cat_name . '</a>';
										}
									}
									echo '<span class="meta-box">';
									if ($show_date == 'yes') {
										echo '<span class="date">' . mysql2date('j M Y', $post->post_date) . '</span>';
									}
									if ($show_comments == 'yes') {
										echo '<span class="comments"><i class="fa fa-comments-o"></i>' . get_comments_number($post->ID) . '</span>';
									}
								echo '</span></p>
								</div>
							</figcaption>
						</figure></div>';
				} 
			echo '</div></div>';

		?>
	</div>