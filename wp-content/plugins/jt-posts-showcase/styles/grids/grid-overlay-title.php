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

	<div class="grid-overlay-title">
		<div class="uk-grid uk-grid-match">
			<?php
				
				$posts_array = get_posts($args);
								
				// Show these posts in a grid style with overlay title
				foreach($posts_array as $post) {
				$post_type = get_post_type_object( get_post_type($post) );
					echo '<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
							<figure class="uk-overlay uk-overlay-hover">
							<a href="' . get_permalink( $post->ID ) . '">
								<img class="uk-overlay-scale" src="' . wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ) . '" alt="">
								<figcaption class="uk-overlay-panel uk-flex uk-flex-bottom uk-overlay-background uk-ignore">
									<div class="grid-overlay-box">
										<p class="title">' . $post->post_title . '</p>';
										echo '<div class="meta-box">';
											if ($show_date == 'yes') {
												echo '<p class="date">' . mysql2date('j M Y', $post->post_date) . '</p>';
											}
											if ($show_comments == 'yes') {
												echo '<p class="comments"><i class="fa fa-comments-o"></i>' . get_comments_number($post->ID) . '</p>';
											}
											if ($show_category == 'yes') {
												echo '<p class="category">';
													if ( $source == "custom" ) {
														echo '<a href="' . get_post_type_archive_link( $include_post_types ) . '">' . $post_type->label . '</a>';
													}
													else if ($source == "wp-posts") {
														echo '<a href="' . get_category_link(get_the_category($post->ID)[0]) . '">' . get_the_category( $post->ID )[0]->cat_name . '</a>';
													}
												echo '</p>';
											}
									echo '</div></div>
								</figcaption>
							</a>
							</figure></div>';
				} 

			?>
		</div>
	</div>