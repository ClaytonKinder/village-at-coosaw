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
	<div class="uk-grid showcase-small-list">
		<?php
			$posts_array = get_posts($args);

			echo '<div class="uk-width-1-1 posts-showcase-links uk-grid-match">';
				// Show the other posts as a list with a small image
				foreach($posts_array as $post) {
					$post_type = get_post_type_object( get_post_type($post) );
					echo '<div class="row">';
						echo '<div class="post-img uk-overlay uk-overlay-hover">
							<a href="' . get_permalink( $post->ID ) . '">
								<img class="uk-overlay-scale" src="' . wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ) . '" alt="">
							</a></div>';
						echo '<div class="right-col uk-flex uk-flex-middle">
							  <div>
								<a class="title" href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a>';
							echo '<div class="meta-box">';
								if ($show_date == 'yes') {
									echo '<span class="date">' . mysql2date('j M Y', $post->post_date) . '</span>';
								}
								if ($show_comments == 'yes') {
									echo '<span class="comments"><i class="fa fa-comments-o"></i>' . get_comments_number($post->ID) . '</span>';
								}
								if ($show_category == 'yes') {
									if ( $source == "custom" ) {
										echo '<a class="category" href="' . get_post_type_archive_link( $include_post_types ) . '">' . $post_type->label . '</a>';
									}
									else if ($source == "wp-posts") {
										echo '<a class="category" href="' . get_category_link(get_the_category($post->ID)[0]) . '">' . get_the_category( $post->ID )[0]->cat_name . '</a>';
									}
								}
						echo '</div></div></div>';
					echo '</div>';
				} 
			echo '</div>';

		?>
	</div>