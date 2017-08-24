<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header(); ?>

		<div id="primary" class="content-area jt-brands">
			<main id="main" class="site-main">

			<?php
				while ( have_posts() ) : the_post();
					$post_id = get_the_ID();
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<div class="container">
						<div class="row store-header">
							<div class="col-md-4">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail(); ?>
								<?php endif; ?>
							</div>
							<div class="col-md-8">
								<?php
									if ( is_single() ) :
										the_title( '<h1 class="store-title">', '</h1>' );
									else :
										the_title( '<h2 class="store-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
									endif;

									$short_info = esc_attr( get_post_meta( $post_id, 'short_info', true ) );
									$location = esc_attr( get_post_meta( $post_id, 'store_location', true ) );
									$map = esc_attr( get_post_meta( $post_id, 'store_map', true ) );
									$phone = esc_attr( get_post_meta( $post_id, 'store_phone', true ) );
									$fax = esc_attr( get_post_meta( $post_id, 'store_fax', true ) );
									$email = esc_attr( get_post_meta( $post_id, 'store_email', true ) );
				
									if (!empty ($short_info)) {
										echo '<p class="store-short-info">' . $short_info . '</p>';
									}
	
									if ( (!empty ($location)) || (!empty ($map))) {
										echo '<p class="store-basic-info">';
											
											if (!empty ($location)) {
												echo '<span><i class="fa fa-map-marker"></i>' . $location . '</span>';
											}
										
											if (!empty ($map)) {
												echo '<a href="#store-map" data-uk-modal><span><i class="fa fa-map-o"></i> Check the map</span></a>';
											}
										
										echo '</p>';
									}

									if ( (!empty ($phone)) || (!empty ($fax)) || (!empty ($email)) ) {
										echo '<p class="store-basic-info">';
										
											if (!empty ($phone)) {
												echo '<span><i class="fa fa-phone"></i>' . $phone . '</span>';
											}
										
											if (!empty ($fax)) {
												echo '<span><i class="fa fa-fax"></i>' . $fax . '</span>';
											}
										
										echo '</p>';
									}
										
									if (!empty ($email)) {
										echo '<p class="store-basic-info">';
											echo '<span><i class="fa fa-envelope"></i>' . $email . '</span>';
										echo '</p>';
									}
								?>
								
							</div>
						</div>
						
						<div class="store-tabs">
							<?php
								$info = wpautop(get_post_meta( $post_id, 'store_info', true ));
								$offers = wpautop(get_post_meta( $post_id, 'store_offers', true ));
								$events = wpautop(get_post_meta( $post_id, 'store_events', true ));
							?>
							<ul class="uk-tab" data-uk-tab="{connect:'#store-info-tabs'}">
								<?php
									if (!empty ($info)) {
								?>
								<li><a href=""><?php echo __('Info', 'jt-brands'); ?></a></li>
								<?php
									}
									if (!empty ($offers)) {
								?>
								<li><a href=""><?php echo __('Offers', 'jt-brands'); ?></a></li>
								<?php
									}
									if ( (!empty ($events)) ) {
								?>
								<li><a href=""><?php echo __('Events', 'jt-brands'); ?></a></li>
								<?php
									}
									$video = esc_attr( get_post_meta( $post_id, 'store_video', true ) );
									$video_embed = get_post_meta( $post_id, 'store_video_embed', true );
									if ( (!empty ($video)) || (!empty ($video_embed))) {
								?>
								<li><a href=""><?php echo __('Video', 'jt-brands'); ?></a></li>
								<?php
									}
								?>
							</ul>

							<ul id="store-info-tabs" class="uk-switcher uk-margin">
								<li>
									<?php
										if (!empty ($info)) {
											echo $info;
										}
									?>
								</li>

								<li>
									<?php
										if (!empty ($offers)) {
											echo $offers;
										}
									?>
								</li>
								<li>
									<?php
										if (!empty ($events)) {
											echo $events;
										}
									?>
								</li>
								<li>
									<?php
										if (!empty ($video)) {
									?>
										<video width="660" height="370" controls>
											<source src="<?php echo $video; ?>" type="video/mp4">
										</video>
									<?php
										}
										else if (!empty ($video_embed)) {
									?>
										<?php echo $video_embed; ?>
									<?php
										}
									?>
								</li>
							</ul>
						</div>
							
						<?php
							$img1 = get_post_meta( $post_id, 'store_img1', true );
							$img2 = get_post_meta( $post_id, 'store_img2', true );
							$img3 = get_post_meta( $post_id, 'store_img3', true );
							$img4 = get_post_meta( $post_id, 'store_img4', true );
							$img5 = get_post_meta( $post_id, 'store_img5', true );
							$img6 = get_post_meta( $post_id, 'store_img6', true );
							$img7 = get_post_meta( $post_id, 'store_img7', true );
							$img8 = get_post_meta( $post_id, 'store_img8', true );
							$img9 = get_post_meta( $post_id, 'store_img9', true );
							$img10 = get_post_meta( $post_id, 'store_img10', true );
							$img11 = get_post_meta( $post_id, 'store_img11', true );
							$img12 = get_post_meta( $post_id, 'store_img12', true );
	
							if ( (!empty ($img1)) || (!empty ($img2)) || (!empty ($img3)) || (!empty ($img4)) || (!empty ($img5)) || (!empty ($img6)) || (!empty ($img7)) || (!empty ($img8)) || (!empty ($img9)) || (!empty ($img10)) || (!empty ($img11)) || (!empty ($img12)) ) {
						?>
						<div class="store-gallery">
							<h3><?php echo __('Photo Gallery', 'jt-brands'); ?></h3>
							<div class="row">
								<?php
									if (!empty ($img1)) {
								?>
								<div class="col-md-2">
									<a href="<?php echo $img1; ?>" data-uk-lightbox="{group:'store-images'}"><img src="<?php echo $img1; ?>"></a>
								</div>
								<?php
									}
									if (!empty ($img2)) {
								?>
								<div class="col-md-2">
									<a href="<?php echo $img2; ?>" data-uk-lightbox="{group:'store-images'}"><img src="<?php echo $img2; ?>"></a>
								</div>
								<?php
									}
									if (!empty ($img3)) {
								?>
								<div class="col-md-2">
									<a href="<?php echo $img3; ?>" data-uk-lightbox="{group:'store-images'}"><img src="<?php echo $img3; ?>"></a>
								</div>
								<?php
									}
									if (!empty ($img4)) {
								?>
								<div class="col-md-2">
									<a href="<?php echo $img4; ?>" data-uk-lightbox="{group:'store-images'}"><img src="<?php echo $img4; ?>"></a>
								</div>
								<?php
									}
									if (!empty ($img5)) {
								?>
								<div class="col-md-2">
									<a href="<?php echo $img5; ?>" data-uk-lightbox="{group:'store-images'}"><img src="<?php echo $img5; ?>"></a>
								</div>
								<?php
									}
									if (!empty ($img6)) {
								?>
								<div class="col-md-2">
									<a href="<?php echo $img6; ?>" data-uk-lightbox="{group:'store-images'}"><img src="<?php echo $img6; ?>"></a>
								</div>
								<?php
									}
									if (!empty ($img7)) {
								?>
								<div class="col-md-2">
									<a href="<?php echo $img7; ?>" data-uk-lightbox="{group:'store-images'}"><img src="<?php echo $img7; ?>"></a>
								</div>
								<?php
									}
									if (!empty ($img8)) {
								?>
								<div class="col-md-2">
									<a href="<?php echo $img8; ?>" data-uk-lightbox="{group:'store-images'}"><img src="<?php echo $img8; ?>"></a>
								</div>
								<?php
									}
									if (!empty ($img9)) {
								?>
								<div class="col-md-2">
									<a href="<?php echo $img9; ?>" data-uk-lightbox="{group:'store-images'}"><img src="<?php echo $img9; ?>"></a>
								</div>
								<?php
									}
									if (!empty ($img10)) {
								?>
								<div class="col-md-2">
									<a href="<?php echo $img10; ?>" data-uk-lightbox="{group:'store-images'}"><img src="<?php echo $img10; ?>"></a>
								</div>
								<?php
									}
									if (!empty ($img11)) {
								?>
								<div class="col-md-2">
									<a href="<?php echo $img11; ?>" data-uk-lightbox="{group:'store-images'}"><img src="<?php echo $img11; ?>"></a>
								</div>
								<?php
									}
									if (!empty ($img12)) {
								?>
								<div class="col-md-2">
									<a href="<?php echo $img12; ?>" data-uk-lightbox="{group:'store-images'}"><img src="<?php echo $img12; ?>"></a>
								</div>
								<?php
									}
								?>
							</div>
						</div>
						<?php
							}
							$map = get_post_meta( $post_id, 'store_map', true );
							if (!empty ($map) ) {
								echo '<div id="store-map" class="uk-modal">
										<div class="uk-modal-dialog">
											<a class="uk-modal-close uk-close"></a>';
											echo $map;
								echo '</div></div>';
							}
						?>
						
					</div>
				</article><!-- #post-## -->
				
				<?php
					endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- #primary -->
		
<?php
get_footer();
