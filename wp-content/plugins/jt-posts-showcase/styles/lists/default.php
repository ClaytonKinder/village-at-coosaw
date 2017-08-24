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
	<div class="uk-grid jt-posts-box">
		<?php
			// Get the post that will be shown with image
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
				echo '<div class="uk-width-1-2 default-list">
						<div class="recent-post">
							<figure class="uk-overlay uk-overlay-hover">
								<a href="' . get_permalink( $latest_post->ID ) . '">
									<img class="uk-overlay-spin" src="' . wp_get_attachment_url( get_post_thumbnail_id($latest_post->ID), 'thumbnail'  ) . '" alt="">
									<figcaption class="uk-overlay-panel uk-overlay-bottom uk-overlay-background uk-ignore">
										<p class="title">' . $latest_post->post_title . '</p>';
									echo '<p class="meta-box">';
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
									echo '</p></figcaption>
								</a>
							</figure>
						</div>
					</div>';
			}
		?>
			<div class="uk-width-1-2">
				<div class="posts-showcase-links">
					<h4 class="headlines-title">
						<?php _e('More Headlines'); ?>
					</h4>
		<?php
			// Show the other posts as headlines
			foreach($posts_array as $post) {
				echo '<p class="title"><i class="fa fa-angle-right"></i><a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a></p>';
			} 
		?>
				</div>
			</div>
	</div>
