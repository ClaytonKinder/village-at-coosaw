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

	<div class="uk-grid grid-headlines uk-grid-match">
		<?php

			$posts_array = get_posts($args);

			// Show these posts in a grid
			foreach($posts_array as $post) {
				$post_type = get_post_type_object( get_post_type($post) );
				echo '<div class="uk-width-1-2">
						<p class="title"><a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a></p>
						<p class="post-info">';
							if ($show_date == 'yes') {
								echo '<span class="date">' . mysql2date('j M', $post->post_date) . '</span>';
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
				echo '</p></div>';
			} 

		?>
	</div>