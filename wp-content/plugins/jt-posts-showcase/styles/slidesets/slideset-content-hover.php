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
	<div class="uk-slidenav-position slideset-content-hover" data-uk-slideset="{small: 1, medium: 2, large: 3}">
		<ul class="uk-grid uk-slideset">
			<?php
				$posts_array = get_posts($args);

				// Show the posts in a uikit's slideset
				foreach($posts_array as $post) {
					$post_type = get_post_type_object( get_post_type($post) );
					echo '<li><figure>
							<a href="' . get_permalink( $post->ID ) . '">
								<img class="uk-overlay-spin" src="' . wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ) . '" alt=""></a>
								<figcaption><a href="' . get_permalink( $post->ID ) . '"><h3>' . $post->post_title . '</h3></a>
									<p class="post-info">';
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
									echo '</p></figcaption>
						</figure></li>';
				} 
			?>
		</ul>
		
		<a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
		<a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
		
	</div>