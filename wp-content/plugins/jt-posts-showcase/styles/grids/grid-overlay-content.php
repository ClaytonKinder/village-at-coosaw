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

	<div class="uk-grid grid-overlay-content uk-grid-match">
		<?php
			$posts_array = get_posts($args);

			// Show these posts in a grid
			foreach($posts_array as $post) {
				$post_type = get_post_type_object( get_post_type($post) );
				echo '<div class="uk-width-1-4">
						<figure class="uk-overlay uk-overlay-hover">
							<a href="' . get_permalink( $post->ID ) . '">
								<img class="uk-overlay-scale" src="' . wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ) . '" alt="">
							</a>
							<figcaption class="uk-overlay-panel uk-flex uk-flex-bottom uk-overlay-background uk-ignore">
								<div class="post-info">
									<p class="title"><a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a></p>';
									if ($show_category == 'yes') {
										echo '<p>';
											if ( $source == "custom" ) {
												echo '<a class="category" href="' . get_post_type_archive_link( $include_post_types ) . '">' . $post_type->label . '</a>';
											}
											else if ($source == "wp-posts") {
												echo '<a class="category" href="' . get_category_link(get_the_category($post->ID)[0]) . '">' . get_the_category( $post->ID )[0]->cat_name . '</a>';
											}
										echo '</p>';
									}
									echo '<div class="meta-box">';
										if ($show_date == 'yes') {
											echo '<span class="date">' . mysql2date('j M Y', $post->post_date) . '</span>';
										}
										if ($show_comments == 'yes') {
											echo '<span class="comments"><i class="fa fa-comments-o"></i>' . get_comments_number($post->ID) . '</span>';
										}
								echo '</div></div>
							</figcaption>
						</figure></div>';
			} 

		?>
	</div>