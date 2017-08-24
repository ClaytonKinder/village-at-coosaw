<?php
/*
Plugin Name: JT Program
Plugin URI: http://www.jsquare-themes.com
Description: Create a modern and responsive program with JT Program Widget
Version: 1.0.0
Author: JSquare Themes
Author URI: http://www.jsquare-themes.com
License: GPLv2 or later
*/

defined('ABSPATH') or die;

// Creating the widget 
class jt_program extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'jt_program', 

		// Widget name will appear in UI
		__('JT Program Widget', 'jt_program_domain'), 

		// Widget description
		array( 'description' => __( 'Create a modern and responsive program with JT Program Widget', 'jt_program_domain' ), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		
        extract( $args );
	
		$title = apply_filters( 'widget_title', $instance['title'] );
		$style = $instance['style'];
		
		for ($i = 1; $i <= 12; $i++) {
			${'img'.$i} = $instance[ 'img' . $i ];
			${'title'.$i} = $instance[ 'title' . $i ];
			${'user'.$i} = $instance[ 'user' . $i ];
			${'start'.$i} = $instance[ 'start' . $i ];
			${'end'.$i} = $instance[ 'end' . $i ];
		}
		
		wp_register_script('jt_uikit_js', plugins_url('/js/uikit.min.js',__FILE__ ));
		wp_enqueue_script('jt_uikit_js');
		wp_register_style('jt_program_css', plugins_url('/css/style.css',__FILE__ ));
		wp_enqueue_style('jt_program_css');
		wp_register_style( 'uikit.css', plugin_dir_url(__FILE__).'css/uikit.css' );
		wp_enqueue_style( 'uikit.css' );
		
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'];
		
			echo $title;
		
			echo $args['after_title'];
		}
		
		// Include style based on the widget's settings
		if ($style == 'default') {
			include 'styles/default.php';
		}
		
		
		echo __('</div>', 'jt_program_domain' );
	}

	// Widget Backend 
	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance[ 'title' ] ) : ' ';
		$style =  isset( $instance['style'] ) ? $instance[ 'style' ] : ' ';
		$numusers =  isset( $instance['numusers'] ) ? $instance[ 'numusers' ] : ' ';
		
		for ($i = 1; $i <= 12; $i++) {
			${'img'.$i} = isset( $instance['img' . $i] ) ? esc_attr( $instance[ 'img' . $i ] ) : ' ';
			${'title'.$i} = isset( $instance['title' . $i] ) ? esc_attr( $instance[ 'title' . $i ] ) : ' ';
			${'user'.$i} = isset( $instance['user' . $i] ) ? esc_attr( $instance[ 'user' . $i ] ) : ' ';
			${'start'.$i} = isset( $instance['start' . $i] ) ? esc_attr( $instance[ 'start' . $i ] ) : ' ';
			${'end'.$i} = isset( $instance['end' . $i] ) ? esc_attr( $instance[ 'end' . $i ] ) : ' ';
		}
		
		
		// Widget admin form
	?>
	<div class="wrap-jsquare">
	
		<div class="uk-accordion" data-uk-accordion>
			
			<h3 class="uk-accordion-title"><i class="fa fa-gear"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-picture-o"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-font"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-user"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-clock-o"></i></h3>
			
			<div class="uk-accordion-content">
				<h4>Widget Settings</h4>
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget Title:' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e( 'Style:' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>">
						<option value="default" <?php echo ($style == 'default')?'selected':''; ?>>Default</option>
					</select>
				</p>
			</div>
			
			<div class="uk-accordion-content">
				<h4>Image</h4>
				<?php 
					for ($i = 1; $i <= 12; $i++) { 
				?>
					<p>
						<label for="<?php echo $this->get_field_id( 'img' . $i ); ?>"><?php _e( 'Image ' . $i ); ?></label> 
						<input class="widefat" id="<?php echo $this->get_field_id( 'img' . $i ); ?>" name="<?php echo $this->get_field_name(  'img' . $i ); ?>" type="url" value="<?php echo esc_attr( ${'img'.$i} ); ?>" />
					</p>
				<?php
					}
				?>
			</div>
			
			<div class="uk-accordion-content">
				<h4>Event/Show Title</h4>
				<?php 
					for ($i = 1; $i <= 12; $i++) { 
				?>
					<p>
						<label for="<?php echo $this->get_field_id( 'title' . $i ); ?>"><?php _e( 'Event/Show ' . $i ); ?></label> 
						<input class="widefat" id="<?php echo $this->get_field_id( 'title' . $i ); ?>" name="<?php echo $this->get_field_name( 'title' . $i ); ?>" type="text" value="<?php echo esc_attr( ${'title'.$i} ); ?>" />
					</p>
				<?php
					}
				?>
			</div>
			
			
			<div class="uk-accordion-content">
				<h4>Presenters/Producers</h4>
				<?php 
					for ($i = 1; $i <= 12; $i++) { 
				?>
					<p>
						<label for="<?php echo $this->get_field_id( 'user' . $i ); ?>"><?php _e( 'Event/Show ' . $i ); ?></label> 
						<input class="widefat" id="<?php echo $this->get_field_id( 'user' . $i ); ?>" name="<?php echo $this->get_field_name( 'user' . $i ); ?>" type="text" value="<?php echo esc_attr( ${'user'.$i} ); ?>" />
					</p>
				<?php
					}
				?>
			</div>
			
			
			<div class="uk-accordion-content">
				<h4>Hours/Dates</h4>
				<?php 
					for ($i = 1; $i <= 12; $i++) { 
				?>
					<h5>Event/Show <?php echo $i; ?></h5>
					<p>
						<label for="<?php echo $this->get_field_id( 'start' . $i ); ?>"><?php _e( 'Starts:' ); ?></label> 
						<input class="widefat" id="<?php echo $this->get_field_id( 'start' . $i ); ?>" name="<?php echo $this->get_field_name( 'start' . $i ); ?>" type="text" value="<?php echo esc_attr( ${'start'.$i} ); ?>" />
					</p>
					<p>
						<label for="<?php echo $this->get_field_id( 'end' . $i ); ?>"><?php _e( 'Ends:' ); ?></label> 
						<input class="widefat" id="<?php echo $this->get_field_id( 'end' . $i ); ?>" name="<?php echo $this->get_field_name( 'end' . $i ); ?>" type="text" value="<?php echo esc_attr( ${'end'.$i} ); ?>" />
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
		$instance['style'] = $new_instance['style'];
		
		for ($i = 1; $i <= 12; $i++) {
			$instance['img' . $i] = strip_tags( $new_instance['img' . $i] );
			$instance['title' . $i] = strip_tags( $new_instance['title' . $i] );
			$instance['user' . $i] = strip_tags( $new_instance['user' . $i] );
			$instance['start' . $i] = strip_tags( $new_instance['start' . $i] );
			$instance['end' . $i] = strip_tags( $new_instance['end' . $i] );
		}
		
		return $instance;
	}

} // Class wpb_widget ends here

// Register and load the widget
function jt_program_widget() {
	register_widget( 'jt_program' );
}
add_action( 'widgets_init', 'jt_program_widget' );

function jt_program_styles() {
	
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
       wp_register_script( 'accordion.css', plugin_dir_url(__FILE__).'css/accordion.min.css' );
       wp_enqueue_script( 'accordion.css' );
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
add_action( 'widgets_init','jt_program_styles');


?>
