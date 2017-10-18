<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header(); ?>

		<div id="primary" class="content-area jt-event-calendar">
			<main id="main" class="site-main">

			<?php
				while ( have_posts() ) : the_post();
					$post_id = get_the_ID();
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<div class="container">
						<div class="row">
							<div class="col-md-4">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail(); ?>
								<?php endif; ?>
								<?php
									$img1 = get_post_meta( $post_id, 'event_gallery_img1', true );
									$img2 = get_post_meta( $post_id, 'event_gallery_img2', true );
									$img3 = get_post_meta( $post_id, 'event_gallery_img3', true );
									$img4 = get_post_meta( $post_id, 'event_gallery_img4', true );
									$img5 = get_post_meta( $post_id, 'event_gallery_img5', true );
									$img6 = get_post_meta( $post_id, 'event_gallery_img6', true );
									$img7 = get_post_meta( $post_id, 'event_gallery_img7', true );
									$img8 = get_post_meta( $post_id, 'event_gallery_img8', true );
	
									if ( (!empty ($img1)) || (!empty ($img2)) || (!empty ($img3)) || (!empty ($img4)) || (!empty ($img5)) || (!empty ($img6)) || (!empty ($img7)) || (!empty ($img8)) ) {
								?>
									<div class="event-gallery">
										<?php
											if (!empty ($img1)) {
										?>
											<a href="<?php echo $img1; ?>" data-uk-lightbox="{group:'event-images'}"><img src="<?php echo $img1; ?>"></a>
										<?php
											}
											if (!empty ($img2)) {
										?>
											<a href="<?php echo $img2; ?>" data-uk-lightbox="{group:'event-images'}"><img src="<?php echo $img2; ?>"></a>
										<?php
											}
											if (!empty ($img3)) {
										?>
											<a href="<?php echo $img3; ?>" data-uk-lightbox="{group:'event-images'}"><img src="<?php echo $img3; ?>"></a>
										<?php
											}
											if (!empty ($img4)) {
										?>
											<a href="<?php echo $img4; ?>" data-uk-lightbox="{group:'event-images'}"><img src="<?php echo $img4; ?>"></a>
										<?php
											}
											if (!empty ($img5)) {
										?>
											<a href="<?php echo $img5; ?>" data-uk-lightbox="{group:'event-images'}"><img src="<?php echo $img5; ?>"></a>
										<?php
											}
											if (!empty ($img6)) {
										?>
											<a href="<?php echo $img6; ?>" data-uk-lightbox="{group:'event-images'}"><img src="<?php echo $img6; ?>"></a>
										<?php
											}
											if (!empty ($img7)) {
										?>
											<a href="<?php echo $img7; ?>" data-uk-lightbox="{group:'event-images'}"><img src="<?php echo $img7; ?>"></a>
										<?php
											}
											if (!empty ($img8)) {
										?>
											<a href="<?php echo $img8; ?>" data-uk-lightbox="{group:'event-images'}"><img src="<?php echo $img8; ?>"></a>
										<?php
											}
										?>
									</div>
								<?php
									}
									$map = get_post_meta( $post_id, 'event_map', true );
									if (!empty ($map) ) {
										echo $map;
									}
								?>
							</div>
							<div class="col-md-8">
								<?php
								if ( is_single() ) :
									the_title( '<h1 class="event-title">', '</h1>' );
								else :
									the_title( '<h2 class="event-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
								endif;
								?>
								<?php
									$short_info = esc_html( get_post_meta( $post_id, 'event_short_info', true ) );
									if (!empty ($short_info)) {
								?>
								<p class="event-short-info">
									<?php echo $short_info; ?>
								</p>
								<?php
									}
									$location = esc_html( get_post_meta( $post_id, 'event_location', true ) );
									$starts = esc_html( get_post_meta( $post_id, 'event_start_date', true ) );
									$ends = esc_html( get_post_meta( $post_id, 'event_end_date', true ) );
									$time = esc_html( get_post_meta( $post_id, 'event_time', true ) );
									$link_url = esc_html( get_post_meta( $post_id, 'event_link_url', true ) );
									$link_text = esc_html( get_post_meta( $post_id, 'event_link_text', true ) );
									if (!empty ($location)) {
								?>
								<p class="event-location">
									<i class="fa fa-map-marker"></i> <?php echo $location; ?>
									<span class="more-btn"><a href="<?php echo $link_url; ?>"><?php echo $link_text; ?></a></span>
								</p>
								<?php
									}
									if (!empty ($starts)) {
										$option = get_option(jt_settings);
										if ($option[date_format] == 'dFY') {
											$start_date = date("d F Y", strtotime($starts));
											$end_date = date("d F Y", strtotime($ends));
										}
										else if ($option[date_format] == 'dF') {
											$start_date = date("d F", strtotime($starts));
											$end_date = date("d F", strtotime($ends));
										}
										else if ($option[date_format] == 'Fd') {
											$start_date = date("F d", strtotime($starts));
											$end_date = date("F d", strtotime($ends));
										}
										else if ($option[date_format] == 'dMY') {
											$start_date = date("d M Y", strtotime($starts));
											$end_date = date("d M Y", strtotime($ends));
										}
										else if ($option[date_format] == 'dM') {
											$start_date = date("d M", strtotime($starts));
											$end_date = date("d M", strtotime($ends));
										}
										else if ($option[date_format] == 'Md') {
											$start_date = date("M d", strtotime($starts));
											$end_date = date("M d", strtotime($ends));
										}
										else if ($option[date_format] == 'dmY') {
											$start_date = date("d/m/Y", strtotime($starts));
											$end_date = date("d/m/Y", strtotime($ends));
										}
										else if ($option[date_format] == 'mdY') {
											$start_date = date("m/d/Y", strtotime($starts));
											$end_date = date("m/d/Y", strtotime($ends));
										}
								?>
								<p class="event-datetime">
									<?php 
										echo '<i class="fa fa-calendar"></i>' . $start_date;
										if (!empty ($ends)) {
											echo ' - ' . $end_date;
										}
										if (!empty ($time)) {
									?>
									<span class="time"><i class="fa fa-clock-o"></i><?php echo $time; ?></span>
									<?php
										}
									?>
								</p>
								<?php
									}
									$event_info = wpautop(get_post_meta( $post_id, 'event_info', true ));
									if (!empty ($event_info)) {
								?>
								<div class="event-info">
									<?php echo $event_info; ?>
								</div>
								<?php
									}
									$event_ticket_price = wpautop(get_post_meta( $post_id, 'event_ticket_price', true ));
									if (!empty ($event_ticket_price)) {
								?>
								<div class="event-tickets">
									<h3><?php echo __('Tickets', 'jt-event-calendar'); ?></h3>
									<?php echo $event_ticket_price; ?>
								</div>
								<?php
									}
									$event_video_url = get_post_meta( $post_id, 'event_video_url', true);
									$event_video = get_post_meta( $post_id, 'event_video', true);
									if (!empty ($event_video_url)) {
								?>
								<div class="event-video">
									<h3><?php echo __('Video', 'jt-event-calendar'); ?></h3>
									<video width="670" height="380" controls>
									  <source src="<?php echo $event_video_url; ?>" type="video/mp4">
									</video>
								</div>
								<?php
									}
									else if (!empty ($event_video)) {
								?>
								<div class="event-video">
									<h3><?php echo __('Video', 'jt-event-calendar'); ?></h3>
									<?php echo $event_video; ?>
								</div>
								<?php
									}
								?>
							</div>
						</div>
						
						
					</div>
				</article><!-- #post-## -->
				
				<?php
					endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- #primary -->
		
<?php
get_footer();
