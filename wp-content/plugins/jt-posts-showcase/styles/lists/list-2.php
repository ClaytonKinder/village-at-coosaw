<?php

	if (($post_text_chars == NULL) || ($post_text_chars == ' ')){
		$post_text_chars = '200';
	}

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
	<div class="showcase-list-2">
		<?php

			$posts_array = get_posts($args);
	
			echo '<div class="posts-showcase-items">';
				// Show the posts with a small image
				foreach($posts_array as $post) {
					$post_type = get_post_type_object( get_post_type($post) );
					echo '<div class="row">';
						echo '<div class="post-img uk-overlay uk-overlay-hover"><a href="' . get_permalink( $post->ID ) . '"><img class="uk-overlay-scale" src="' . wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ) . '" alt=""></a></div>';
						echo '<div class="title">';
							if ($show_category == 'yes') {
								if ( $source == "custom" ) {
									echo '<a class="category" href="' . get_post_type_archive_link( $include_post_types ) . '">' . $post_type->label . '</a>';
								}
								else if ($source == "wp-posts") {
									echo '<a class="category" href="' . get_category_link(get_the_category($post->ID)[0]) . '">' . get_the_category( $post->ID )[0]->cat_name . '</a>';
								}
							}
							echo '<h3><a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a></h3>';
							echo '<p class="content">' . substr(get_the_excerpt( $post->ID ), 0, intval($post_text_chars)) . '...' . '</p>';
							if (($show_date == 'yes') || ($show_comments == 'yes')) {
								echo '<div class="post-info">
									<p class="date"><i class="fa fa-calendar"></i>' . mysql2date('j M', $post->post_date) . '</p>
									<p class="comments"><i class="fa fa-comments-o"></i>' . get_comments_number($post->ID) . '</p>
								</div>';
							}
						echo '</div>';
					echo '</div>';
				} 
				echo '<div class="clear-floating"></div>';
			echo '</div>';

		?>
	</div>