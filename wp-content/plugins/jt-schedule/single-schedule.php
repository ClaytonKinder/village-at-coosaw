<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header(); ?>

		<div id="primary" class="content-area jt-schedule">
			<main id="main" class="site-main">

			<?php
				while ( have_posts() ) : the_post();
					$post_id = get_the_ID();
					$options = get_option( 'jt_schedule_settings' );
					$translate = get_option( 'jt_schedule_translations' );
					include ( dirname( __FILE__ ) . '/options/variables.php');
					include ( dirname( __FILE__ ) . '/options/strings.php');
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<div class="container">
						<div class="row">
							<div class="col-md-4">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail(); ?>
								<?php endif; ?>
								<?php
									$img1 = get_post_meta( $post_id, 'class_gallery_img1', true );
									$img2 = get_post_meta( $post_id, 'class_gallery_img2', true );
									$img3 = get_post_meta( $post_id, 'class_gallery_img3', true );
									$img4 = get_post_meta( $post_id, 'class_gallery_img4', true );
									$img5 = get_post_meta( $post_id, 'class_gallery_img5', true );
									$img6 = get_post_meta( $post_id, 'class_gallery_img6', true );
									$img7 = get_post_meta( $post_id, 'class_gallery_img7', true );
									$img8 = get_post_meta( $post_id, 'class_gallery_img8', true );
	
									if ( (!empty ($img1)) || (!empty ($img2)) || (!empty ($img3)) || (!empty ($img4)) || (!empty ($img5)) || (!empty ($img6)) || (!empty ($img7)) || (!empty ($img8)) ) {
								?>
									<div class="class-gallery">
										<?php
											if (!empty ($img1)) {
										?>
											<a href="<?php echo $img1; ?>" data-uk-lightbox="{group:'class-images'}"><img src="<?php echo $img1; ?>"></a>
										<?php
											}
											if (!empty ($img2)) {
										?>
											<a href="<?php echo $img2; ?>" data-uk-lightbox="{group:'class-images'}"><img src="<?php echo $img2; ?>"></a>
										<?php
											}
											if (!empty ($img3)) {
										?>
											<a href="<?php echo $img3; ?>" data-uk-lightbox="{group:'class-images'}"><img src="<?php echo $img3; ?>"></a>
										<?php
											}
											if (!empty ($img4)) {
										?>
											<a href="<?php echo $img4; ?>" data-uk-lightbox="{group:'class-images'}"><img src="<?php echo $img4; ?>"></a>
										<?php
											}
											if (!empty ($img5)) {
										?>
											<a href="<?php echo $img5; ?>" data-uk-lightbox="{group:'class-images'}"><img src="<?php echo $img5; ?>"></a>
										<?php
											}
											if (!empty ($img6)) {
										?>
											<a href="<?php echo $img6; ?>" data-uk-lightbox="{group:'class-images'}"><img src="<?php echo $img6; ?>"></a>
										<?php
											}
											if (!empty ($img7)) {
										?>
											<a href="<?php echo $img7; ?>" data-uk-lightbox="{group:'class-images'}"><img src="<?php echo $img7; ?>"></a>
										<?php
											}
											if (!empty ($img8)) {
										?>
											<a href="<?php echo $img8; ?>" data-uk-lightbox="{group:'class-images'}"><img src="<?php echo $img8; ?>"></a>
										<?php
											}
										?>
									</div>
								<?php
									}
									$starts = esc_attr( get_post_meta( $post_id, 'class_starts', true ) );
									$duration = esc_attr( get_post_meta( $post_id, 'class_duration', true ) );
									$trainer = esc_attr( get_post_meta( $post_id, 'class_trainer', true ) );
									$room = esc_attr( get_post_meta( $post_id, 'class_room', true ) );
								?>
								<div class="class-basic-info">
								<?php
									if (!empty ($starts) ) {
										echo __('<p><span>' . $starts_text . ':</span>' . $starts . '</p>', 'jt-schedule');
									}
									if (!empty ($duration) ) {
										echo __('<p><span>' . $duration_text . ':</span>' . $duration . '</p>', 'jt-schedule');
									}
									if (!empty ($trainer) ) {
										echo __('<p><span>' . $instructor_text . ':</span>' . $trainer . '</p>', 'jt-schedule');
									}
									if (!empty ($room) ) {
										echo __('<p><span>' . $class_text . ':</span>' . $room . '</p>', 'jt-schedule');
									}
								?>
								</div>
							</div>
							<div class="col-md-8">
								<?php
								if ( is_single() ) :
									the_title( '<h1 class="class-title">', '<span class="sign-in-btn" data-uk-modal="{target:\'#sign-up-box\'}">' . $signup_text . '</span></h1>' );
								else :
									the_title( '<h2 class="class-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
								endif;
									$class_info = wpautop(get_post_meta( $post_id, 'class_info', true ));
									if (!empty ($class_info)) {
								?>
								<div class="class-info">
									<?php echo $class_info; ?>
								</div>
								<?php
									}
									$video_url = get_post_meta( $post_id, 'class_video_url', true );
									$video_embed = get_post_meta( $post_id, 'class_video_embed', true );
									if ( (!empty ($video_url)) || (!empty ($video_embed)) ) {
								?>
								<div class="class-video">
									<?php
										if (!empty ($video_url)) {
									?>
									<video width="670" height="378" controls>
									  <source src="<?php echo $video_url; ?>" type="video/mp4">
									</video>
									<?php
										}
										else if (!empty ($video_embed)) {
											echo $video_embed;
										}
									?>
								</div>
								<?php
									}
								?>
							</div>
						</div>
						<div id="sign-up-box" class="uk-modal">
							<div class="uk-modal-dialog">
								<div class="uk-modal-header">
									<?php echo __($signup_text, 'jt-schedule'); ?>
									<a class="uk-modal-close uk-close"></a>
								</div>
								<form class="uk-form uk-form-stacked" method="post">
									<p>
										<label class="uk-form-label"><?php echo __($firstname_text, 'jt-schedule'); ?></label>
										<input class="uk-form-controls" type="text" name="first_name" placeholder="<?php echo __($firstname_text, 'jt-schedule'); ?>" value="<?php echo esc_attr($_POST['first_name']); ?>" required>
									</p>
									<p>
										<label class="uk-form-label"><?php echo __($lastname_text, 'jt-schedule'); ?></label>
										<input class="uk-form-controls" type="text" name="last_name" placeholder="<?php echo __($lastname_text, 'jt-schedule'); ?>" value="<?php echo esc_attr($_POST['last_name']); ?>" required>
									</p>
									<p>
										<label class="uk-form-label"><?php echo __($email_text, 'jt-schedule'); ?></label>
										<input class="uk-form-controls" type="email" name="email" placeholder="<?php echo __($email_text, 'jt-schedule'); ?>" value="<?php echo esc_attr($_POST['email']); ?>" required>
									</p>
									<p>
										<label class="uk-form-label"><?php echo __($phone_text, 'jt-schedule'); ?></label>
										<input class="uk-form-controls" type="text" name="phone_number" placeholder="<?php echo __($phone_text, 'jt-schedule'); ?>" value="<?php echo esc_attr($_POST['phone_number']); ?>" required>
									</p>
									<p>
										<?php
											$terms = get_the_terms( $post_id, 'classes_categories' );
											if ( ! empty( $terms ) ) {
										?>
											<label class="uk-form-label"><?php echo __($day_text, 'jt-staff-profiles'); ?></label>
											<select class="uk-form-controls" name="day">
											<?php
												sort($terms);
												foreach ( $terms as $term ) {
											?>
												<option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
											<?php
												}
											?>
											</select>
										<?php
											}
										?>
									</p>
									<input type="submit" name="submit" value="<?php echo __($submit_text, 'jt-schedule'); ?>">
								</form>
							</div>
						</div>
						<?php

							//user posted variables
							$first_name = (isset($_POST['first_name']) ? $_POST['first_name'] : null);
							$last_name = (isset($_POST['last_name']) ? $_POST['last_name'] : null);
							$email = (isset($_POST['email']) ? $_POST['email'] : null);
							$phone_number = (isset($_POST['phone_number']) ? $_POST['phone_number'] : null);
							$day = (isset($_POST['day']) ? $_POST['day'] : null);
							$submit = (isset($_POST['submit']) ? $_POST['submit'] : null);

							//php mailer variables
							$to = get_option('admin_email');
							$subject = "New user registered on " . get_the_title($post_id);

							$headers[] = 'From: '. $email . "\r\n";
							$headers[] = 'Reply-To: ' . $email . "\r\n";

							$message = "Class: " . get_the_title($post_id) . "\r\n\r\nName: " . $first_name . " " . $last_name . "\r\nEmail: " . $email . " \r\nPhone Number: " . $phone_number . " \r\nDay: " . $day . "\r\nTime: " . $starts; 

							if ($submit) {
								$sent = wp_mail($to, $subject, strip_tags($message), $headers);
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
