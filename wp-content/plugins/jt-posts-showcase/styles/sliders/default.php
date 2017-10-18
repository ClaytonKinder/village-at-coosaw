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

<div class="uk-slidenav-position" data-uk-slider="{center:true}" data-uk-check-display>
    <div class="uk-slider-container">
        <ul class="uk-slider uk-grid-width-medium-1-4">

			<?php
				
				$posts_array = get_posts($args);
				foreach($posts_array as $post) {
					
			?>
						
			<li class="slider-item"><figure class="uk-overlay uk-overlay-hover">
				<?php
					
					echo '<a href="' . get_permalink( $post->ID ) . '">
								<img class="uk-overlay-scale" src="' . wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ) . '" alt="">
							</a><div class="figure-overlay"></div>';
				
				?>
				<figcaption class="uk-overlay-panel black-bg uk-overlay-background semi-overlay uk-overlay-bottom uk-overlay-slide-bottom">
						  
			<?php
				echo '<div>';	
					echo '<p class="title"><a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a></p>';
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
				echo '</div>';
		?>
					</figcaption>
				</figure>
			</li>
			<?php 
				} 
			?>
		</ul>
	</div>
			
	<a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous" draggable="false"></a>
    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next" draggable="false"></a>
		
</div>