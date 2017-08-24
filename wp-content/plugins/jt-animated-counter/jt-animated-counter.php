<?php
/*
Plugin Name: JT Animated Counter
Plugin URI: http://www.jsquare-themes.com/extensions/jt-animated-counter
Description: Create easily an animated counter
Version: 1.0.0
Author: JSquare Themes
Author URI: http://www.jsquare-themes.com
License: GPLv2 or later
*/

defined('ABSPATH') or die;

// Creating the widget 
class jsquare_animated_counter extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of the widget
		'jsquare_animated_counter', 

		// Widget name
		__('JT Animated Counter Widget', 'jsquare_animated_counter_domain'), 

		// Widget description
		array( 'description' => __( 'Create easily an animated counter', 'jsquare_animated_counter_domain' ), ) 
		);
	}

	// Create the widget for the front-end. This function displays the widget on the site
	public function widget( $args, $instance ) {
		
        extract( $args );
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		$style = $instance[ 'style' ];
		
		$text = $instance[ 'text' ];
		$icon = $instance[ 'icon' ];
		$number = $instance[ 'number' ];
		
		$text_2 = $instance[ 'text_2' ];
		$icon_2 = $instance[ 'icon_2' ];
		$number_2 = $instance[ 'number_2' ];
		
		$text_3 = $instance[ 'text_3' ];
		$icon_3 = $instance[ 'icon_3' ];
		$number_3 = $instance[ 'number_3' ];
		
		$text_4 = $instance[ 'text_4' ];
		$icon_4 = $instance[ 'icon_4' ];
		$number_4 = $instance[ 'number_4' ];
		
		wp_register_style('jsquare_animated_counter_css', plugins_url('/css/style.css',__FILE__ ));
		wp_enqueue_style('jsquare_animated_counter_css');
		
		wp_register_script('waypoints_js', plugins_url('/js/jquery.waypoints.min.js',__FILE__ ));
		wp_enqueue_script('waypoints_js');
		wp_register_script('inview_js', plugins_url('/js/inview.min.js',__FILE__ ));
		wp_enqueue_script('inview_js');
		
		wp_register_script('script_animated_counter_js', plugins_url('/js/script-animated-counter.js',__FILE__ ));
		wp_enqueue_script('script_animated_counter_js');
		
		wp_register_style( 'uikit.css', plugin_dir_url(__FILE__).'css/uikit.css' );
		wp_enqueue_style( 'uikit.css' );
		
		
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . esc_html( $title ) . $args['after_title'];

		
		// Include files based on the style selected on widget's options
		?>
		<?php
			if ($style == 'white') {
				include 'styles/white-text.php';
			}
			else if ($style == 'black') {
				include 'styles/black-text.php';
			}
			else if ($style == 'icon') {
				include 'styles/counter-with-icon.php';
			}
		?>
		<?php
			echo __('', 'jsquare_animated_counter_domain' );
			echo $args['after_widget'];
	}

	
	// Function that creates the widget's options on WordPress admin
	public function form( $instance ) {
		$title =  isset( $instance['title'] ) ? esc_attr( $instance[ 'title' ] ) : ' ';	
		$style =  isset( $instance['style'] ) ? $instance[ 'style' ] : ' ';
		
		$text =  isset( $instance['text'] ) ? $instance[ 'text' ] : ' ';
		$icon =  isset( $instance['icon'] ) ? $instance[ 'icon' ] : ' ';
		$number =  isset( $instance['number'] ) ? $instance[ 'number' ] : ' ';
		
		$text_2 =  isset( $instance['text_2'] ) ? $instance[ 'text_2' ] : ' ';
		$icon_2 =  isset( $instance['icon_2'] ) ? $instance[ 'icon_2' ] : ' ';
		$number_2 =  isset( $instance['number_2'] ) ? $instance[ 'number_2' ] : ' ';
		
		$text_3 =  isset( $instance['text_2'] ) ? $instance[ 'text_3' ] : ' ';
		$icon_3 =  isset( $instance['icon_3'] ) ? $instance[ 'icon_3' ] : ' ';
		$number_3 =  isset( $instance['number_3'] ) ? $instance[ 'number_3' ] : ' ';
		
		$text_4 =  isset( $instance['text_4'] ) ? $instance[ 'text_4' ] : ' ';
		$icon_4 =  isset( $instance['icon_4'] ) ? $instance[ 'icon_4' ] : ' ';
		$number_4 =  isset( $instance['number_4'] ) ? $instance[ 'number_4' ] : ' ';
		
		// Widget admin form
	?>
	<div class="wrap-jsquare">
		<div class="uk-accordion" data-uk-accordion>

			<h3 class="uk-accordion-title"><i class="fa fa-gear"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-font"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-line-chart"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-font-awesome"></i></h3>
			
			<div class="uk-accordion-content">
				<h4>Widget Settings</h4>
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e( 'Style:' ); ?></label> 
					<select class="widefat" type="text" id="jsquare-counter-style <?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" >
						<option value="white" <?php echo ($style == 'white')?'selected':''; ?>>Basic White</option>
						<option value="black" <?php echo ($style == 'black')?'selected':''; ?>>Basic Black</option>
						<option value="icon" <?php echo ($style == 'icon')?'selected':''; ?>>Counter with icon</option>
					</select>
				</p>
			</div>
			
			<div class="uk-accordion-content">
				<h4>Counter Texts</h4>
				<p>
					<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Text:' ); ?><span><?php _e('e.g. Followers'); ?></span></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'text_2' ); ?>"><?php _e( 'Text 2:' ); ?><span><?php _e('e.g. Followers'); ?></span></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'text_2' ); ?>" name="<?php echo $this->get_field_name( 'text_2' ); ?>" type="text" value="<?php echo esc_attr( $text_2 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'text_3' ); ?>"><?php _e( 'Text 3:' ); ?><span><?php _e('e.g. Followers'); ?></span></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'text_3' ); ?>" name="<?php echo $this->get_field_name( 'text_3' ); ?>" type="text" value="<?php echo esc_attr( $text_3 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'text_4' ); ?>"><?php _e( 'Text 4:' ); ?><span><?php _e('e.g. Followers'); ?></span></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'text_4' ); ?>" name="<?php echo $this->get_field_name( 'text_4' ); ?>" type="text" value="<?php echo esc_attr( $text_4 ); ?>" />
				</p>
			</div>
			
			<div class="uk-accordion-content">
				<h4>Counter Numbers</h4>
				<p>
					<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number:' ); ?><span><?php _e('e.g. 1000'); ?></span></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'number_2' ); ?>"><?php _e( 'Number 2:' ); ?><span><?php _e('e.g. 1000'); ?></span></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'number_2' ); ?>" name="<?php echo $this->get_field_name( 'number_2' ); ?>" type="text" value="<?php echo esc_attr( $number_2 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'number_3' ); ?>"><?php _e( 'Number 3:' ); ?><span><?php _e('e.g. 1000'); ?></span></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'number_3' ); ?>" name="<?php echo $this->get_field_name( 'number_3' ); ?>" type="text" value="<?php echo esc_attr( $number_3 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'number_4' ); ?>"><?php _e( 'Number 4:' ); ?><span><?php _e('e.g. 1000'); ?></span></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'number_4' ); ?>" name="<?php echo $this->get_field_name( 'number_4' ); ?>" type="text" value="<?php echo esc_attr( $number_4 ); ?>" />
				</p>
			</div>
			
			<div class="uk-accordion-content">
				<h4>Counter Icons</h4>
				<p>
					<label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e( 'Icon:' ); ?><span><?php _e('e.g. fa-download'); ?></span></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" type="text" value="<?php echo esc_attr( $icon ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'icon_2' ); ?>"><?php _e( 'Icon 2:' ); ?><span><?php _e('e.g. fa-download'); ?></span></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'icon_2' ); ?>" name="<?php echo $this->get_field_name( 'icon_2' ); ?>" type="text" value="<?php echo esc_attr( $icon_2 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'icon_3' ); ?>"><?php _e( 'Icon 3:' ); ?><span><?php _e('e.g. fa-download'); ?></span></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'icon_3' ); ?>" name="<?php echo $this->get_field_name( 'icon_3' ); ?>" type="text" value="<?php echo esc_attr( $icon_3 ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'icon_4' ); ?>"><?php _e( 'Icon 4:' ); ?><span><?php _e('e.g. fa-download'); ?></span></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'icon_4' ); ?>" name="<?php echo $this->get_field_name( 'icon_4' ); ?>" type="text" value="<?php echo esc_attr( $icon_4 ); ?>" />
				</p>
			</div>
			
		</div>
	</div>
	<?php 
	}
	
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
    
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['style'] = $new_instance['style'];
		$instance['text'] = strip_tags( $new_instance[ 'text' ] );
		$instance['text_2'] = strip_tags( $new_instance[ 'text_2' ] );
		$instance['text_3'] = strip_tags( $new_instance[ 'text_3' ] );
		$instance['text_4'] = strip_tags( $new_instance[ 'text_4' ] );
		$instance['icon'] = strip_tags( $new_instance[ 'icon' ] );
		$instance['icon_2'] = strip_tags( $new_instance[ 'icon_2' ] );
		$instance['icon_3'] = strip_tags( $new_instance[ 'icon_3' ] );
		$instance['icon_4'] = strip_tags( $new_instance[ 'icon_4' ] );
		$instance['number'] = strip_tags( $new_instance[ 'number' ] );
		$instance['number_2'] = strip_tags( $new_instance[ 'number_2' ] );
		$instance['number_3'] = strip_tags( $new_instance[ 'number_3' ] );
		$instance['number_4'] = strip_tags( $new_instance[ 'number_4' ] );
		
		return $instance;
	}

} // Class wpb_widget ends here

// Register and load the widget
function jsquare_animated_counter_widget() {
	register_widget( 'jsquare_animated_counter' );
}
add_action( 'widgets_init', 'jsquare_animated_counter_widget' );


// Function that registers and enqueues css and js files for the widget's options on WordPress admin page
function jsquare_animated_counter_styles() {
	
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
       wp_register_script( 'accordion.js', plugin_dir_url(__FILE__).'js/accordion.min.js' );
       wp_enqueue_script( 'accordion.js' );
    }
}
add_action( 'widgets_init','jsquare_animated_counter_styles');


?>
