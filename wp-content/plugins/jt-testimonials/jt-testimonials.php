<?php
/*
Plugin Name: JT Testimonials
Plugin URI: http://www.jsquare-themes.com
Description: Advanced Testimonials Widget
Version: 1.0.0
Author: JSquare Themes
Author URI: http://www.jsquare-themes.com
License: GPLv2 or later
*/

defined('ABSPATH') or die;

// Creating the widget 
class jsquare_testimonials extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of the widget
		'jsquare_testimonials', 

		// Widget name
		__('JT Testimonials Widget', 'jsquare_testimonials_domain'), 

		// Widget description
		array( 'description' => __( 'Advanced Testimonials Widget', 'jsquare_testimonials_domain' ), ) 
		);
	}

	
	// Create the widget for the front-end. This function displays the widget on the site
	public function widget( $args, $instance ) {
		
        extract( $args );
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		for ($i = 1; $i <= 8; $i++) {
			${'img'.$i} = $instance[ 'img' . $i ];
			${'name'.$i} = $instance[ 'name' . $i ];
			${'job'.$i} = $instance[ 'job' . $i ];
			${'rating'.$i} = $instance[ 'rating' . $i ];
			${'feedback'.$i} = $instance[ 'feedback' . $i ];
		}
		
		$numfeedbacks = $instance[ 'numfeedbacks' ];
		$style = $instance[ 'style' ];
		$slideset_animations = $instance[ 'slideset_animations' ];
		$grid_animations = $instance[ 'grid_animations' ];
		$rating_icon = $instance[ 'rating_icon' ];
		
		wp_register_style('jsquare_testimonials_css', plugins_url('/css/style.css',__FILE__ ));
		wp_enqueue_style('jsquare_testimonials_css');
		
		wp_register_style('uikit_css', plugins_url('/css/uikit.css',__FILE__ ));
		wp_enqueue_style('uikit_css');
		
		wp_register_script('uikit.js', plugins_url('/js/uikit.min.js',__FILE__ ), array('jquery'));
		wp_enqueue_script('uikit.js');
			
		wp_register_script('slideset.js', plugins_url('/js/slideset.min.js',__FILE__ ));
		wp_enqueue_script('slideset.js');
		
		wp_register_style('slidenav.css', plugins_url('/css/slidenav.min.css',__FILE__ ));
		wp_enqueue_style('slidenav.css');
		
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . esc_html( $title ) . $args['after_title'];

		
		if ($style == 'style-1') {
			include 'styles/style-1.php';
		}
		else if ($style == 'style-2') {
			include 'styles/style-2.php';
		}
		else if ($style == 'style-3') {
			include 'styles/style-3.php';
		}
		else if ($style == 'style-4') {
			include 'styles/style-4.php';
		}
		else if ($style == 'style-7') {
			include 'styles/style-7.php';
		}
		// Grid Styles
		else if ($style == 'style-5') {
			include 'styles/style-5.php';
		}
		else if ($style == 'style-6') {
			include 'styles/style-6.php';
		}
		else if ($style == 'style-8') {
			include 'styles/style-8.php';
		}
		
		echo __('', 'jsquare_testimonials_domain' );
		echo $args['after_widget'];
	}

	// Function that creates the widget's options on WordPress admin
	public function form( $instance ) {
		$title =  isset( $instance['title'] ) ? esc_attr( $instance[ 'title' ] ) : ' ';	
		
		for ($i = 1; $i <= 8; $i++) {
			${'img'.$i} = isset( $instance['img' . $i] ) ? esc_attr( $instance[ 'img' . $i ] ) : ' ';
			${'name'.$i} = isset( $instance['name' . $i] ) ? esc_attr( $instance[ 'name' . $i ] ) : ' ';
			${'job'.$i} = isset( $instance['job' . $i] ) ? esc_attr( $instance[ 'job' . $i ] ) : ' ';
			${'rating'.$i} = isset( $instance['rating' . $i] ) ? esc_attr( $instance[ 'rating' . $i ] ) : ' ';
			${'feedback'.$i} = isset( $instance['feedback' . $i] ) ? esc_attr( $instance[ 'feedback' . $i ] ) : ' ';
		}
		
		$numfeedbacks =  isset( $instance['numfeedbacks'] ) ? $instance[ 'numfeedbacks' ] : ' ';
		$style =  isset( $instance['style'] ) ? $instance[ 'style' ] : ' ';
		$slideset_animations =  isset( $instance['slideset_animations'] ) ? $instance[ 'slideset_animations' ] : ' ';
		$grid_animations =  isset( $instance['grid_animations'] ) ? $instance[ 'grid_animations' ] : ' ';
		$rating_icon =  isset( $instance['rating_icon'] ) ? $instance[ 'rating_icon' ] : ' ';
		
	?>
	<div class="wrap-jsquare">
		<div class="uk-accordion" data-uk-accordion>

			<h3 class="uk-accordion-title"><i class="fa fa-gear"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-picture-o"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-user"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-briefcase"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-star"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-comments"></i></h3>
			
			<div class="uk-accordion-content">
				<h4>Widget Settings</h4>
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e( 'Style:' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>">
						<option value="style-1" <?php echo ($style == 'style-1')?'selected':''; ?>>Slideset - Style 1</option>
						<option value="style-2" <?php echo ($style == 'style-2')?'selected':''; ?>>Slideset - Style 2</option>
						<option value="style-3" <?php echo ($style == 'style-3')?'selected':''; ?>>Slideset - Style 3</option>
						<option value="style-4" <?php echo ($style == 'style-4')?'selected':''; ?>>Slideset - Style 4</option>
						<option value="style-7" <?php echo ($style == 'style-7')?'selected':''; ?>>Slideset - Style 5</option>
						<option value="style-5" <?php echo ($style == 'style-5')?'selected':''; ?>>Grid - Style 1</option>
						<option value="style-6" <?php echo ($style == 'style-6')?'selected':''; ?>>Grid - Style 2</option>
						<option value="style-8" <?php echo ($style == 'style-8')?'selected':''; ?>>Grid - Style 3</option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'numfeedbacks' ); ?>"><?php _e( 'Number of feedbacks:' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'numfeedbacks' ); ?>" name="<?php echo $this->get_field_name( 'numfeedbacks' ); ?>">
						<option value="1" <?php echo ($numfeedbacks == '1')?'selected':''; ?>>1</option>
						<option value="2" <?php echo ($numfeedbacks == '2')?'selected':''; ?>>2</option>
						<option value="3" <?php echo ($numfeedbacks == '3')?'selected':''; ?>>3</option>
						<option value="4" <?php echo ($numfeedbacks == '4')?'selected':''; ?>>4</option>
						<option value="5" <?php echo ($numfeedbacks == '5')?'selected':''; ?>>5</option>
						<option value="6" <?php echo ($numfeedbacks == '6')?'selected':''; ?>>6</option>
						<option value="7" <?php echo ($numfeedbacks == '7')?'selected':''; ?>>7</option>
						<option value="8" <?php echo ($numfeedbacks == '8')?'selected':''; ?>>8</option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'slideset_animations' ); ?>"><?php _e( 'Slideset animations:' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'slideset_animations' ); ?>" name="<?php echo $this->get_field_name( 'slideset_animations' ); ?>">
						<option value="none" <?php echo ($slideset_animations == 'none')?'selected':''; ?>>None</option>
						<option value="fade" <?php echo ($slideset_animations == 'fade')?'selected':''; ?>>Fade</option>
						<option value="scale" <?php echo ($slideset_animations == 'scale')?'selected':''; ?>>Scale</option>
						<option value="slide-horizontal" <?php echo ($slideset_animations == 'slide-horizontal')?'selected':''; ?>>Slide Horizontal</option>
						<option value="slide-vertical" <?php echo ($slideset_animations == 'slide-vertical')?'selected':''; ?>>Slide Vertical</option>
						<option value="slide-top" <?php echo ($slideset_animations == 'slide-top')?'selected':''; ?>>Slide Top</option>
						<option value="slide-bottom" <?php echo ($slideset_animations == 'slide-bottom')?'selected':''; ?>>Slide Bottom</option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'grid_animations' ); ?>"><?php _e( 'Grid animations:' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'grid_animations' ); ?>" name="<?php echo $this->get_field_name( 'grid_animations' ); ?>">
						<option value="none" <?php echo ($grid_animations == 'none')?'selected':''; ?>>None</option>
						<option value="fade" <?php echo ($grid_animations == 'fade')?'selected':''; ?>>Fade</option>
						<option value="scale-up" <?php echo ($grid_animations == 'scale-up')?'selected':''; ?>>Scale up</option>
						<option value="scale-down" <?php echo ($grid_animations == 'scale-down')?'selected':''; ?>>Scale down</option>
						<option value="slide-top" <?php echo ($grid_animations == 'slide-top')?'selected':''; ?>>Slide Top</option>
						<option value="slide-bottom" <?php echo ($grid_animations == 'slide-bottom')?'selected':''; ?>>Slide Bottom</option>
						<option value="slide-right" <?php echo ($grid_animations == 'slide-right')?'selected':''; ?>>Slide right</option>
						<option value="slide-left" <?php echo ($grid_animations == 'slide-left')?'selected':''; ?>>Slide left</option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'rating_icon' ); ?>"><?php _e( 'Rating icon:' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'rating_icon' ); ?>" name="<?php echo $this->get_field_name( 'rating_icon' ); ?>">
						<option value="star" <?php echo ($rating_icon == 'star')?'selected':''; ?>>Star</option>
						<option value="heart" <?php echo ($rating_icon == 'heart')?'selected':''; ?>>Heart</option>
						<option value="diamond" <?php echo ($rating_icon == 'diamond')?'selected':''; ?>>Diamond</option>
						<option value="thumbs-up" <?php echo ($rating_icon == 'thumbs-up')?'selected':''; ?>>Thumbs Up (Like)</option>
						<option value="smile-o" <?php echo ($rating_icon == 'smile-o')?'selected':''; ?>>Smile</option>
					</select>
				</p>
			</div>
		
			<div class="uk-accordion-content">
				<h4>User's Image URL</h4>
				<?php
					for ($i = 1; $i <= 8; $i++) {
				?>
				<p>
					<label for="<?php echo $this->get_field_id( 'img' . $i ); ?>"><?php echo 'User ' . $i; ?><span><?php _e('e.g. http://example.com/image.jpg'); ?></span></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'img' . $i ); ?>" name="<?php echo $this->get_field_name(  'img' . $i ); ?>" type="url" value="<?php echo esc_attr( ${'img'.$i} ); ?>" />
				</p>
				<?php
					}
				?>
			</div>
			
			<div class="uk-accordion-content">
				<h4>User's Name</h4>
				<?php
					for ($i = 1; $i <= 8; $i++) {
				?>
				<p>
					<label for="<?php echo $this->get_field_id( 'name' . $i ); ?>"><?php echo 'User ' . $i; ?><span><?php _e('e.g. John Doe'); ?></span></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'name' . $i ); ?>" name="<?php echo $this->get_field_name(  'name' . $i ); ?>" type="text" value="<?php echo esc_attr( ${'name'.$i} ); ?>" />
				</p>
				<?php
					}
				?>
			</div>
			
			<div class="uk-accordion-content">	
				<h4>User's Job</h4>
				<?php
					for ($i = 1; $i <= 8; $i++) {
				?>
				<p>
					<label for="<?php echo $this->get_field_id( 'job' . $i ); ?>"><?php echo 'User ' . $i; ?><span><?php _e('e.g. Web Designer'); ?></span></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'job' . $i ); ?>" name="<?php echo $this->get_field_name(  'job' . $i ); ?>" type="text" value="<?php echo esc_attr( ${'job'.$i} ); ?>" />
				</p>
				<?php
					}
				?>
			</div>
			
			<div class="uk-accordion-content">
				<h4>User's Rating</h4>
				<?php
					for ($i = 1; $i <= 8; $i++) {
				?>
				<p>
					<label for="<?php echo $this->get_field_id( 'rating' . $i ); ?>"><?php echo 'User ' . $i; ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'rating' . $i ); ?>" name="<?php echo $this->get_field_name( 'rating' . $i ); ?>">
							<option value="0" <?php echo (${'rating'.$i} == '0')?'selected':''; ?>>0 Stars</option>
							<option value="1" <?php echo (${'rating'.$i} == '1')?'selected':''; ?>>1 Star</option>
							<option value="2" <?php echo (${'rating'.$i} == '2')?'selected':''; ?>>2 Stars</option>
							<option value="3" <?php echo (${'rating'.$i} == '3')?'selected':''; ?>>3 Stars</option>
							<option value="4" <?php echo (${'rating'.$i} == '4')?'selected':''; ?>>4 Stars</option>
							<option value="5" <?php echo (${'rating'.$i} == '5')?'selected':''; ?>>5 Stars</option>
					</select>
				</p>
				<?php
					}
				?>
			</div>
			
			<div class="uk-accordion-content">
				<?php
					for ($i = 1; $i <= 8; $i++) {
				?>
				<p>
					<label for="<?php echo $this->get_field_id( 'feedback' . $i ); ?>"><?php echo 'User ' . $i; ?><span><?php _e('User\'s Review'); ?></span></label> 
					<textarea class="widefat" id="<?php echo $this->get_field_id( 'feedback' . $i ); ?>" name="<?php echo $this->get_field_name(  'feedback' . $i ); ?>" cols="200" rows="8"><?php echo esc_attr( ${'feedback'.$i}); ?></textarea>
				</p>
				<?php
					}
				?>
			</div>
			
		</div>		
	</div>
	<?php 
	}
	
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
    
		$instance['title'] = strip_tags( $new_instance['title'] );
		
		for ($i = 1; $i <= 8; $i++) {
			$instance['img' . $i] = strip_tags( $new_instance['img' . $i] );
			$instance['name' . $i] = strip_tags( $new_instance['name' . $i] );
			$instance['job' . $i] = strip_tags( $new_instance['job' . $i] );
			$instance['rating' . $i] = strip_tags( $new_instance['rating' . $i] );
			$instance['feedback' . $i] = strip_tags( $new_instance['feedback' . $i] );
		}
		
		$instance['numfeedbacks'] = strip_tags( $new_instance[ 'numfeedbacks' ] );
		$instance['style'] = strip_tags( $new_instance[ 'style' ] );
		$instance['slideset_animations'] = strip_tags( $new_instance[ 'slideset_animations' ] );
		$instance['grid_animations'] = strip_tags( $new_instance[ 'grid_animations' ] );
		$instance['rating_icon'] = strip_tags( $new_instance[ 'rating_icon' ] );
		
		return $instance;
	}

}

// Register and load the widget
function jsquare_testimonials_widget() {
	register_widget( 'jsquare_testimonials' );
}
add_action( 'widgets_init', 'jsquare_testimonials_widget' );


// Function that registers and enqueues css and js files for the widget's options on WordPress admin page
function jsquare_testimonials_styles() {
	
	wp_register_style('font-awesome', plugin_dir_url(__FILE__).'css/font-awesome.min.css');
	wp_enqueue_style('font-awesome');
	
	if (wp_style_is( 'jsquare-widget.css', 'enqueued' )) {
    	return;
    } else {
       wp_register_style( 'jsquare-widget.css', plugin_dir_url(__FILE__).'css/jsquare-widget.css' );
       wp_enqueue_style( 'jsquare-widget.css' );
    }
	
    if (wp_style_is( 'accordion.css', 'enqueued' )) {
    	return;
    } else {
       wp_register_style( 'accordion.css', plugin_dir_url(__FILE__).'css/accordion.min.css' );
       wp_enqueue_style( 'accordion.css' );
    }
	
    if (wp_script_is( 'uikit.js', 'enqueued' )) {
    	return;
    } else {
       wp_register_script( 'uikit.js', plugin_dir_url(__FILE__).'js/uikit.min.js', array('jquery') );
       wp_enqueue_script( 'uikit.js' );
    }
	
    if (wp_script_is( 'accordion.js', 'enqueued' )) {
    	return;
    } else {
       wp_register_script( 'accordion.js', plugin_dir_url(__FILE__).'js/accordion.min.js');
       wp_enqueue_script( 'accordion.js' );
    }
	
}
add_action( 'widgets_init','jsquare_testimonials_styles');


?>
