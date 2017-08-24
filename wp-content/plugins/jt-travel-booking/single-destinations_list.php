<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package A+
 */

  //response generation function
  $response = "";
 
  //function to generate response
  function book_trip_form_generate_response($type, $message){
 
    global $response;
 
    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";
 
  }

	//response messages
	$missing_content = __("Please supply all information.", 'jt-travel-booking');
	$email_invalid   = __("Email Address Invalid.", 'jt-travel-booking');
	$message_unsent  = __("Message was not sent. Try Again.", 'jt-travel-booking');
	$message_sent    = __("Thanks! Your message has been sent.", 'jt-travel-booking');

	//user posted variables
	$destination = $_POST['destination'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$phone_number = $_POST['phone_number'];
	$persons = $_POST['persons'];
	$departure = $_POST['departure'];
	$comments = $_POST['additional_comments'];
	$submit = $_POST['submit'];

	//php mailer variables
	$to = get_option('admin_email');
	$subject = "New booking for " . $destination . " from " .get_bloginfo('name');
	$headers[] = 'From: '. $email . "\r\n";
	$headers[] = 'Reply-To: ' . $email . "\r\n";

	if ($submit) {
		//validate presence of fields
		if(empty($first_name) || empty($last_name) || empty($phone_number) || empty($persons) || empty($comments)){
			book_trip_form_generate_response("error", $missing_content);
		}
		else {
			$message = "Destination: " . $destination . "\r\n\r\nName: " . $first_name . " " . $last_name . " \r\nEmail: " . $email . " \r\nPhone Number: " . $phone_number . " \r\nNumber of persons: " . $persons . "\r\nDeparture: " . $departure . " \r\n\r\nAdditional Comments: \r\n" . $comments; 
			$sent = wp_mail($to, $subject, strip_tags($message), $headers);
			if($sent) {
				book_trip_form_generate_response("success", $message_sent); //message sent!
			}
			else {
				book_trip_form_generate_response("error", $message_unsent); //message wasn't sent
			}
		}
		echo "<script type='text/javascript'>
        window.location=document.location.href;
        </script>";
	}

get_header(); ?>

		<div id="primary" class="content-area jt-travel-booking">
			<main id="main" class="site-main">

			<?php
				while ( have_posts() ) : the_post();
					$post_id = get_the_ID();
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail(); ?>
					<?php endif; ?>
				
					<div class="container">
						<div class="row destination-header-info">
							<div class="col-md-9">
								<header class="entry-header">
									<?php
									if ( is_single() ) :
										the_title( '<h1 class="destination-title">', '</h1>' );
									else :
										the_title( '<h2 class="destination-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
									endif;
									?>
									<span><?php echo '<i class="fa fa-clock-o"></i>' . esc_html( get_post_meta( $post_id, 'destination_days', true ) ) . ' ' .  __('days'); ?></span>
									<span><?php echo '<i class="fa fa-calendar"></i>' . esc_html( get_post_meta( $post_id, 'destination_periods', true ) ); ?></span>
									<span><?php echo '<i class="' . esc_html( get_post_meta( $post_id, 'destination_transportation_icon', true ) ) . '"></i>' . esc_html( get_post_meta( $post_id, 'destination_transportation', true ) ); ?></span>
								</header><!-- .entry-header -->
							</div>

							<div class="col-md-3 destination-price-box">
								<span><?php echo __('Starts from:', 'jt-travel-booking'); ?></span> <?php echo esc_html( get_post_meta( $post_id, 'destination_price', true ) ); ?>
							</div>
						</div>
						
						<div class="row destination-tabs-info">
							<div class="col-md-9">
								<ul class="uk-tab" data-uk-switcher="{connect:'#destination-info-tabs'}">
									<li><a href="" onclick="return false;"><?php echo __('Info', 'jt-travel-booking'); ?></a></li>
									<li><a href="" onclick="return false;"><?php echo __('Daily Program', 'jt-travel-booking'); ?></a></li>
									<li><a href="" onclick="return false;"><?php echo __('Hotels', 'jt-travel-booking'); ?></a></li>
									<li><a href="" onclick="return false;"><?php echo __('Provisions', 'jt-travel-booking'); ?></a></li>
									<li><a href="" onclick="return false;"><?php echo __('Things to do', 'jt-travel-booking'); ?></a></li>
									<li><a href="" onclick="return false;"><?php echo __('Booking Info', 'jt-travel-booking'); ?></a></li>
								</ul>

								<ul id="destination-info-tabs" class="uk-switcher uk-margin">
									<li><?php echo wpautop(get_post_meta( $post_id, 'destination_info', true )); ?></li>
									<li><?php echo wpautop(get_post_meta( $post_id, 'destination_daily_program', true )); ?></li>
									<li><?php echo wpautop(get_post_meta( $post_id, 'destination_hotels', true )); ?></li>
									<li><?php echo wpautop(get_post_meta( $post_id, 'destination_provisions', true )); ?></li>
									<li><?php echo wpautop(get_post_meta( $post_id, 'destination_things_to_do', true )); ?></li>
									<li><?php echo wpautop(get_post_meta( $post_id, 'destination_booking_info', true )); ?></li>
								</ul>
							</div>
							
							<div class="col-md-3">
								<div class="departure-dates">
									<h4><?php echo __('Departures', 'jt-travel-booking'); ?></h4>
									<ul>
										<?php
											$destination_departure_dates = get_post_meta( $post_id, 'destination_departures', true );
											$departures = explode(', ', $destination_departure_dates);
											foreach ( $departures as $departure ) {
												echo '<li>' . $departure . '</li>';
											}
										?>
									</ul>
								</div>
								<?php echo get_post_meta( $post_id, 'destination_map', true ); ?>
							</div>
						</div>
						
						<div class="row book-destination-box">
							<div class="col-md-9">
								<p><?php echo __('Book now and we will contact you as soon as possible to confirm your booking.', 'jt-travel-booking'); ?></p>
							</div>
							<div class="col-md-3">
								<a class="book-now-btn" data-uk-toggle="{target:'#book-form-section', animation:'uk-animation-fade'}"><?php echo _e('Book This Tour', 'jt-travel-booking'); ?></a>
							</div>
						</div>
						
						<div id="book-form-section" class="uk-hidden">
                			<?php echo $response; ?>
							<form class="uk-form uk-form-stacked" method="post" action="<?php the_permalink(); ?>">
								<div class="row">
									<div class="col-md-6">
										<input type="hidden" name="destination" value="<?php echo the_title(); ?>">
										<p>
											<label class="uk-form-label"><?php echo __('First Name', 'jt-travel-booking'); ?></label>
											<input class="uk-form-controls" type="text" name="first_name" placeholder="<?php echo __('First Name', 'jt-travel-booking'); ?>" value="<?php echo esc_attr($_POST['first_name']); ?>" required>
										</p>
										<p>
											<label class="uk-form-label"><?php echo __('Last Name', 'jt-travel-booking'); ?></label>
											<input class="uk-form-controls" type="text" name="last_name" placeholder="<?php echo __('Last Name', 'jt-travel-booking'); ?>" value="<?php echo esc_attr($_POST['last_name']); ?>" required>
										</p>
										<p>
											<label class="uk-form-label"><?php echo __('Email', 'jt-travel-booking'); ?></label>
											<input class="uk-form-controls" type="email" name="email" placeholder="<?php echo __('Email', 'jt-travel-booking'); ?>" value="<?php echo esc_attr($_POST['email']); ?>" required>
										</p>
										<p>
											<label class="uk-form-label"><?php echo __('Phone Number', 'jt-travel-booking'); ?></label>
											<input class="uk-form-controls" type="text" name="phone_number" placeholder="<?php echo __('Phone Number', 'jt-travel-booking'); ?>" value="<?php echo esc_attr($_POST['phone_number']); ?>" required>
										</p>
										<p>
											<label class="uk-form-label"><?php echo __('Number of Persons', 'jt-travel-booking'); ?></label>
											<input class="uk-form-controls" type="number" name="persons" min="1" value="<?php echo esc_attr($_POST['persons']); ?>" required>
										</p>
										<label class="uk-form-label"><?php echo __('Departure', 'jt-travel-booking'); ?></label>
										<select name="departure" class="uk-form-controls">
											<?php
												$destination_departure_dates = get_post_meta( $post_id, 'destination_departures', true );
												$departures = explode(', ', $destination_departure_dates);
												foreach ( $departures as $departure ) {
													echo '<option value="' . $departure . '">' . $departure . '</option>';
												}
											?>
										</select>
									</div>
									<div class="col-md-6">
										<p>
											<label class="uk-form-label"><?php echo __('Additional Comments', 'jt-travel-booking'); ?></label>
											<textarea class="uk-form-controls" name="additional_comments" rows="17" required><?php echo esc_attr($_POST['additional_comments']); ?></textarea>
										</p>
									</div>
								</div>
								<p class="book-trip-btn">
									<input type="submit" name="submit" value="<?php echo __('Book Now', 'jt-travel-booking'); ?>">
								</p>
							</form>
						</div>
						
						<!-- More Destinations -->
						<div class="more-destinations-section">
							<h4><span><?php echo __('More Destinations', 'jt-travel-booking'); ?></span></h4>
						</div>
						<div class="uk-grid-width-small-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-5 destinations-5-cols uk-grid-match" data-uk-grid>
						<?php

							$args = array("posts_per_page" => 5, "post_type" => array('destinations_list'), "orderby" => "rand");

							$posts_array = get_posts($args);

							// Show these posts in a grid
							foreach($posts_array as $post) {
								$post_type = get_post_type_object( get_post_type($post) );
								$post_cats = get_the_terms( $post->ID, 'destinations_categories');
								foreach ( $post_cats as $cat ) {
									$cat_link = get_term_link( $cat, 'destinations_categories' );
								}

						?>
						<div>
							<figure class="uk-overlay uk-overlay-hover">
								<img class="uk-overlay-scale" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail'  ); ?>" alt="">
								<figcaption class="uk-overlay-panel uk-overlay-background uk-flex uk-ignore">
									<a class="destination-link" href="<?php echo get_permalink( $post->ID ); ?>"></a>
									<div>			
										<div class="destination-short-info">
											<h3 class="destination-title"><?php echo $post->post_title; ?></h3>
										</div>
										<div class="destination-bottom-info">
											<?php 
												$destination_price = esc_html( get_post_meta( $post->ID, 'destination_price', true ) );
												if (! empty ($destination_price)) { ?>
											<div class="destination-price">
												<span><?php echo __('Starts from:', 'jt-travel-booking'); ?></span>
												<?php echo $destination_price; ?>
											</div>
											<?php } ?>
											<?php
												$destination_days = esc_html( get_post_meta( $post->ID, 'destination_days', true ) );
												if (! empty ($destination_days)) { ?>
											<div class="destination-days">
												<span><?php echo __('Days:', 'jt-travel-booking'); ?></span>
												<?php echo $destination_days; ?>
											</div>
											<?php } ?>
										</div>
									</div>
								</figcaption>
							</figure>
						</div>
						<?php
							} 
						?>
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
