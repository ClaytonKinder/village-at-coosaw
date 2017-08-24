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

<div class="slider-posts-slideshow uk-slidenav-position" data-uk-slideshow="{animation: 'swipe', duration: 500, autoplay: true}" data-uk-check-display>
    <ul class="uk-slideshow" style="height: auto !important;">
        <?php

			$posts_array = get_posts($args);
			foreach($posts_array as $post) {
	
				echo '<li class="slideshow-item" style="height: auto !important;">';
				echo '<div class="post-img">
						<figure class="uk-overlay">
							<a href="' . get_permalink( $post->ID ) . '">
								<img class="uk-overlay-scale" src="' . wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ) . '" alt="">
							</a>
							<figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom" data-uk-scrollspy="{cls:\'uk-animation-slide-bottom\', delay: 600}">
								<div class="title">
									<h3><a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a></h3>
									<div class="post-info">';
									if ($show_date == 'yes') {
										echo '<p class="date"><i class="fa fa-calendar"></i>' . mysql2date('j M', $post->post_date) . '</p>';
									}
									if ($show_comments == 'yes') {
										echo '<p class="comments"><i class="fa fa-comments-o"></i>' . get_comments_number($post->ID) . '</p>';
									}
									if ($show_category == 'yes') {
										if ( $source == "custom" ) {
											echo '<a class="category" href="' . get_post_type_archive_link( $include_post_types ) . '">' . $post_type->label . '</a>';
										}
										else if ($source == "wp-posts") {
											echo '<a class="category" href="' . get_category_link(get_the_category($post->ID)[0]) . '">' . get_the_category( $post->ID )[0]->cat_name . '</a>';
										}
									}
									echo '</div>
								</div>
								<p class="content">' . get_the_excerpt( $post->ID ) . '</p>
							</figcaption>
						</figure>
				</div>';
				echo '</li>';
			}
		?>
    </ul>
		<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
		<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
    <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom">
        <?php
			for ($i = 0; $i < $posts_number; $i++) {
				echo '<li data-uk-slideshow-item="' . $i . '"><a href=""></a></li>';
			}
		?>
    </ul>
</div>