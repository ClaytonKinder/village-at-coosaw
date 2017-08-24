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

	<div class="posts-showcase-headlines">
		<?php
			$posts_array = get_posts($args);
	
			// Show these posts as headlines with date, category and number of comments
			foreach($posts_array as $post) {
				$post_type = get_post_type_object( get_post_type($post) );
				echo '<div class="headline-row"><p>';
					echo '<p class="title"><a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a></p>';
					echo '<p class="post-info">';
						if ($show_date == 'yes') {
							echo '<i class="fa fa-calendar"></i>' . mysql2date('j M Y', $post->post_date);
						}
						if ($show_comments == 'yes') {
							echo '<i class="fa fa-comments-o"></i>' . get_comments_number($post->ID);
						}
						if ($show_category == 'yes') {
							if ( $source == "custom" ) {
								echo '<i class="fa fa-folder-o"></i><a class="category" href="' . get_post_type_archive_link( $include_post_types ) . '">' . $post_type->label . '</a>';
							}
							else if ($source == "wp-posts") {
								echo '<i class="fa fa-folder-o"></i><a class="category" href="' . get_category_link(get_the_category($post->ID)[0]) . '">' . get_the_category( $post->ID )[0]->cat_name . '</a>';
							}
						}
					echo '</p>';
				echo '</div>';
			} 

		?>
	</div>