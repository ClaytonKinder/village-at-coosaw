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
	<div class="uk-slidenav-position slideset-default" data-uk-slideset="{small: 1, medium: 2, large: 3}">
		<ul class="uk-grid uk-slideset">
			<?php
				$posts_array = get_posts($args);

				// Show the posts in a uikit's slideset
				foreach($posts_array as $post) {
					$post_type = get_post_type_object( get_post_type($post) );
					echo '<li><figure class="uk-overlay uk-overlay-hover">
							<a href="' . get_permalink( $post->ID ) . '">
								<img class="uk-overlay-scale" src="' . wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ) . '" alt=""></a>';
								if ($show_comments == 'yes') {
									echo '<span class="comments"><i class="fa fa-comments-o"></i>' . get_comments_number($post->ID) . '</span>';
								}
							echo '</figure>
							<div class="post-info">
								<p class="title"><a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a></p>
								<p class="content">' . substr(get_the_excerpt( $post->ID ), 0, intval($post_text_chars)) . '...' . '</p><p>';
								if ($show_category == 'yes') {
									if ( $source == "custom" ) {
										echo '<a class="category" href="' . get_post_type_archive_link( $include_post_types ) . '">' . $post_type->label . '</a>';
									}
									else if ($source == "wp-posts") {
										echo '<a class="category" href="' . get_category_link(get_the_category($post->ID)[0]) . '">' . get_the_category( $post->ID )[0]->cat_name . '</a>';
									}
								}
								if ($show_date == 'yes') {
									echo '<span class="date">' . mysql2date('j M Y', $post->post_date) . '</span>';
								}
								echo '</p></div></li>';
				} 
			?>
		</ul>
		<ul class="uk-slideset-nav uk-dotnav uk-flex-center">
			<?php
				$slides = $posts_number % 3;
				for ($i = 0; $i <= $slides; $i++) {
					echo '<li data-uk-slideset-item="' . $i . '"><a></a></li>';
				}
			?>
		</ul>
		
	</div>