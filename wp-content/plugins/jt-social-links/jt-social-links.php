<?php
/*
Plugin Name: JT Social Links
Plugin URI: http://www.jsquare-themes.com
Description: Social Links
Text Domain: jt-social-links
Version: 1.1.0
Author: JSquare Themes
Author URI: http://www.jsquare-themes.com
License: GPLv2 or later
*/

defined('ABSPATH') or die;

// Creating the widget 
class jsquare_social_links extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of the widget
		'jsquare_social_links', 

		// Widget name
		__('JT Social Links Widget', 'jt-social-links'), 

		// Widget description
		array( 'description' => __( 'Social Links', 'jt-social-links' ), ) 
		);
	}

	// Create the widget for the front-end. This function displays the widget on the site
	public function widget( $widget_args, $instance ) {
		
        extract( $widget_args );
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		$style = $instance[ 'style' ];
		$behance = $instance[ 'behance' ];
		$dribbble = $instance[ 'dribbble' ];
		$facebook = $instance[ 'facebook' ];
		$flickr = $instance[ 'flickr' ];
		$foursquare = $instance[ 'foursquare' ];
		$github = $instance[ 'github' ];
		$gplus = $instance[ 'gplus' ];
		$instagram = $instance[ 'instagram' ];
		$linkedin = $instance[ 'linkedin' ];
		$pinterest = $instance[ 'pinterest' ];
		$tumblr = $instance[ 'tumblr' ];
		$twitter = $instance[ 'twitter' ];
		$vimeo = $instance[ 'vimeo' ];
		$vine = $instance[ 'vine' ];
		$youtube = $instance[ 'youtube' ];
		
		wp_register_style('jsquare_social_links', plugins_url('/css/style.css',__FILE__ ));
		wp_enqueue_style('jsquare_social_links');
		wp_style_add_data( 'jsquare_social_links', 'rtl', 'replace' );
		wp_register_style( 'uikit.css', plugin_dir_url(__FILE__).'css/uikit.css' );
		wp_enqueue_style( 'uikit.css' );
		wp_register_style( 'dotnav.css', plugin_dir_url(__FILE__).'css/dotnav.min.css' );
		wp_enqueue_style( 'dotnav.css' );
		wp_register_script( 'uikit.js', plugin_dir_url(__FILE__).'js/uikit.min.js' );
		wp_enqueue_script( 'uikit.js' );
		wp_register_script( 'slideset.js', plugin_dir_url(__FILE__).'js/slideset.min.js' );
		wp_enqueue_script( 'slideset.js' );
		
		// before and after widget arguments are defined by themes
		echo $widget_args['before_widget'];
		if ( ! empty( $title ) )
			echo $widget_args['before_title'] . esc_html( $title ) . $widget_args['after_title'];

		
		// Include files based on the style selected on widget's options
		if ($style == 'style-1') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-1.php');
		}
		else if ($style == 'style-2') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-2.php');
		}
		else if ($style == 'style-3') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-3.php');
		}
		else if ($style == 'style-4') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-4.php');
		}
		else if ($style == 'style-5') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-5.php');
		}
		else if ($style == 'style-5-rotate') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-5-rotate.php');
		}
		else if ($style == 'style-5-rotateX') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-5-rotateX.php');
		}
		else if ($style == 'style-5-rotateY') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-5-rotateY.php');
		}
		else if ($style == 'style-6') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-6.php');
		}
		else if ($style == 'style-7') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-7.php');
		}
		else if ($style == 'style-8') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-8.php');
		}
		else if ($style == 'style-9') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-9.php');
		}
		else if ($style == 'style-10') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-10.php');
		}
		else if ($style == 'style-11') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-11.php');
		}
		else if ($style == 'style-12') {
			include( plugin_dir_path( __FILE__ ) . 'styles/style-12.php');
		}
		else {
			return;
		}
		
		echo $widget_args['after_widget'];
	}


	// Function that creates the widget's options on WordPress admin
	public function form( $instance ) {
		$title =  isset( $instance['title'] ) ? esc_attr( $instance[ 'title' ] ) : ' ';	
		$style =  isset( $instance['style'] ) ? $instance[ 'style' ] : ' ';
		$behance = isset( $instance[ 'behance' ] ) ? esc_attr( $instance[ 'behance' ] ) : ' ';
		$dribbble = isset( $instance[ 'dribbble' ] ) ?  esc_attr( $instance[ 'dribbble' ] ) : ' ';
		$facebook = isset( $instance[ 'facebook' ] ) ?  esc_attr( $instance[ 'facebook' ] ) : ' ';
		$flickr = isset( $instance[ 'flickr' ] ) ?  esc_attr( $instance[ 'flickr' ] ) : ' ';
		$foursquare = isset( $instance[ 'foursquare' ] ) ?  esc_attr( $instance[ 'foursquare' ] ) : ' ';
		$github = isset( $instance[ 'github' ] ) ?  esc_attr( $instance[ 'github' ] ) : ' ';
		$gplus = isset( $instance[ 'gplus' ] ) ?  esc_attr( $instance[ 'gplus' ] ) : ' ';
		$instagram = isset( $instance[ 'instagram' ] ) ?  esc_attr( $instance[ 'instagram' ] ) : ' ';
		$linkedin = isset( $instance[ 'linkedin' ] ) ?  esc_attr( $instance[ 'linkedin' ] ) : ' ';
		$pinterest = isset( $instance[ 'pinterest' ] ) ?  esc_attr( $instance[ 'pinterest' ] ) : ' ';
		$tumblr = isset( $instance[ 'tumblr' ] ) ?  esc_attr( $instance[ 'tumblr' ] ) : ' ';
		$twitter = isset( $instance[ 'twitter' ] ) ?  esc_attr( $instance[ 'twitter' ] ) : ' ';
		$vimeo = isset( $instance[ 'vimeo' ] ) ?  esc_attr( $instance[ 'vimeo' ] ) : ' ';
		$vine = isset( $instance[ 'vine' ] ) ?  esc_attr( $instance[ 'vine' ] ) : ' ';
		$youtube = isset( $instance[ 'youtube' ] ) ?  esc_attr( $instance[ 'youtube' ] ) : ' ';
		
	?>
	<div class="wrap-jsquare">
		
		<div class="uk-accordion" data-uk-accordion>

			<h3 class="uk-accordion-title"><i class="fa fa-gear"></i></h3>
			<h3 class="uk-accordion-title"><i class="fa fa-link"></i></h3>
			
			<div class="uk-accordion-content">
				<h4>Widget Settings</h4>
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'jt-social-links' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e( 'Style:', 'jt-social-links' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>">
						<option value="style-1" <?php echo ($style == 'style-1')?'selected':''; ?>>Style 1</option>
						<option value="style-2" <?php echo ($style == 'style-2')?'selected':''; ?>>Style 2</option>
						<option value="style-3" <?php echo ($style == 'style-3')?'selected':''; ?>>Style 3</option>
						<option value="style-4" <?php echo ($style == 'style-4')?'selected':''; ?>>Style 4</option>
						<option value="style-5" <?php echo ($style == 'style-5')?'selected':''; ?>>Style 5</option>
						<option value="style-5-rotate" <?php echo ($style == 'style-5-rotate')?'selected':''; ?>>Style 5 with rotate</option>
						<option value="style-5-rotateX" <?php echo ($style == 'style-5-rotateX')?'selected':''; ?>>Style 5 with rotateX</option>
						<option value="style-5-rotateY" <?php echo ($style == 'style-5-rotateY')?'selected':''; ?>>Style 5 with rotateY</option>
						<option value="style-6" <?php echo ($style == 'style-6')?'selected':''; ?>>Style 6</option>
						<option value="style-7" <?php echo ($style == 'style-7')?'selected':''; ?>>Style 7</option>
						<option value="style-8" <?php echo ($style == 'style-8')?'selected':''; ?>>Style 8</option>
						<option value="style-9" <?php echo ($style == 'style-9')?'selected':''; ?>>Style 9</option>
						<option value="style-10" <?php echo ($style == 'style-10')?'selected':''; ?>>Style 10</option>
						<option value="style-11" <?php echo ($style == 'style-11')?'selected':''; ?>>Style 11</option>
						<option value="style-12" <?php echo ($style == 'style-12')?'selected':''; ?>>Style 12</option>

					</select>
				</p>
			</div>
			
			<div class="uk-accordion-content">
				<h4>Social Links</h4>
				<p>
					<label for="<?php echo $this->get_field_id( 'behance' ); ?>"><?php _e( 'Behance:' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'behance' ); ?>" name="<?php echo $this->get_field_name( 'behance' ); ?>" type="text" value="<?php echo esc_attr( $behance ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php _e( 'Dribbble:' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" type="text" value="<?php echo esc_attr( $dribbble ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook:' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e( 'Flickr:' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" type="text" value="<?php echo esc_attr( $flickr ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'foursquare' ); ?>"><?php _e( 'Foursquare:' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'foursquare' ); ?>" name="<?php echo $this->get_field_name( 'foursquare' ); ?>" type="text" value="<?php echo esc_attr( $foursquare ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'github' ); ?>"><?php _e( 'Github:' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'github' ); ?>" name="<?php echo $this->get_field_name( 'github' ); ?>" type="text" value="<?php echo esc_attr( $github ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'gplus' ); ?>"><?php _e( 'Google+:' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'gplus' ); ?>" name="<?php echo $this->get_field_name( 'gplus' ); ?>" type="text" value="<?php echo esc_attr( $gplus ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Instagram:' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'LinkedIn:' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e( 'Pinterest:' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" type="text" value="<?php echo esc_attr( $pinterest ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php _e( 'Tumblr:' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" type="text" value="<?php echo esc_attr( $tumblr ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter:' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php _e( 'Vimeo:' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" type="text" value="<?php echo esc_attr( $vimeo ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'vine' ); ?>"><?php _e( 'Vine:' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'vine' ); ?>" name="<?php echo $this->get_field_name( 'vine' ); ?>" type="text" value="<?php echo esc_attr( $vine ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'YouTube:' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" type="text" value="<?php echo esc_attr( $youtube ); ?>" />
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
		$instance['behance'] = strip_tags( $new_instance[ 'behance' ] );
		$instance['dribbble'] = strip_tags( $new_instance[ 'dribbble' ] );
		$instance['facebook'] = strip_tags( $new_instance[ 'facebook' ] );
		$instance['flickr'] = strip_tags( $new_instance[ 'flickr' ] );
		$instance['foursquare'] = strip_tags( $new_instance[ 'foursquare' ] );
		$instance['github'] = strip_tags( $new_instance[ 'github' ] );
		$instance['gplus'] = strip_tags( $new_instance[ 'gplus' ] );
		$instance['instagram'] = strip_tags( $new_instance[ 'instagram' ] );
		$instance['linkedin'] = strip_tags( $new_instance[ 'linkedin' ] );
		$instance['pinterest'] = strip_tags( $new_instance[ 'pinterest' ] );
		$instance['tumblr'] = strip_tags( $new_instance[ 'tumblr' ] );
		$instance['twitter'] = strip_tags( $new_instance[ 'twitter' ] );
		$instance['vimeo'] = strip_tags( $new_instance[ 'vimeo' ] );
		$instance['vine'] = strip_tags( $new_instance[ 'vine' ] );
		$instance['youtube'] = strip_tags( $new_instance[ 'youtube' ] );
		
		return $instance;
	}

}

// Register and load the widget
function jsquare_social_links_widget() {
	register_widget( 'jsquare_social_links' );
}
add_action( 'widgets_init', 'jsquare_social_links_widget' );


// Function that registers and enqueues css and js files for the widget's options on WordPress admin page
function jsquare_social_links_styles() {
	
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
add_action( 'widgets_init','jsquare_social_links_styles');


?>
