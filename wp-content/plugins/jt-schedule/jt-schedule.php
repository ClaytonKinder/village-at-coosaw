<?php
/*
Plugin Name: JT Schedule
Plugin URI: http://www.jsquare-themes.com
Description: Create a modern and responsive schedule
Text Domain: jt-schedule
Version: 2.0.0
Author: JSquare Themes
Author URI: http://www.jsquare-themes.com
License: GPLv2 or later
*/

defined('ABSPATH') or die;

add_action( 'init', 'create_schedule_list' );
function create_schedule_list() {
    register_post_type( 'schedule',
        array(
            'labels' => array(
                'name' => __('Schedule', 'jt-schedule'),
                'singular_name' => __('Class', 'jt-schedule'),
                'add_new' => __('Add New', 'jt-schedule'),
                'add_new_item' => __('Add New Brand', 'jt-schedule'),
                'edit' => __('Edit', 'jt-schedule'),
                'edit_item' => __('Edit Class', 'jt-schedule'),
                'new_item' => __('New Class', 'jt-schedule'),
                'view' => __('View', 'jt-schedule'),
                'view_item' => __('View Class', 'jt-schedule'),
                'search_items' => __('Search Classes', 'jt-schedule'),
                'not_found' => __('No Classes found', 'jt-schedule'),
                'not_found_in_trash' => __('No Classes found in Trash', 'jt-schedule'),
                'parent' => __('Parent Class', 'jt-schedule')
            ),
 
            'public' => true,
            'menu_position' => 25,
            'supports' => array( 'title', 'thumbnail' ),
            'taxonomies' => array( '' ),
            'menu_icon' => 'dashicons-calendar',
            'has_archive' => true
        )
    );

}

add_action('init', 'register_classes_category', 0);

function register_classes_category() {
    register_taxonomy(
        'classes_categories',
        'schedule',
        array(
            'labels' => array(
                'name' => __('Class Category', 'jt-schedule'),
                'add_new_item' => __('Add New Class Category', 'jt-schedule'),
                'new_item_name' => __("New Class Category", 'jt-schedule')
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
}

add_action( 'admin_init', 'classes_meta' );
function classes_meta() {
    add_meta_box( 'class_meta_box',
        'Class Details',
        'display_class_meta_box',
        'schedule', 'normal', 'high'
    );
}


include ( dirname( __FILE__ ) . '/options.php');

function display_class_meta_box( $class ) {
    $class_starts = esc_html( get_post_meta( $class->ID, 'class_starts', true ) );
    $class_duration = esc_html( get_post_meta( $class->ID, 'class_duration', true ) );
    $class_trainer = esc_html( get_post_meta( $class->ID, 'class_trainer', true ) );
    $class_room = esc_html( get_post_meta( $class->ID, 'class_room', true ) );
    $class_color = esc_html( get_post_meta( $class->ID, 'class_color', true ) );
	
	$info = 'class_info';
    $class_info = esc_html( get_post_meta( $class->ID, 'class_info', true ) );
	
    $class_video_url = esc_html( get_post_meta( $class->ID, 'class_video_url', true ) );
    $class_video_embed = esc_html( get_post_meta( $class->ID, 'class_video_embed', true ) );
	
    $class_gallery_img1 = esc_html( get_post_meta( $class->ID, 'class_gallery_img1', true ) );
    $class_gallery_img2 = esc_html( get_post_meta( $class->ID, 'class_gallery_img2', true ) );
    $class_gallery_img3 = esc_html( get_post_meta( $class->ID, 'class_gallery_img3', true ) );
    $class_gallery_img4 = esc_html( get_post_meta( $class->ID, 'class_gallery_img4', true ) );
    $class_gallery_img5 = esc_html( get_post_meta( $class->ID, 'class_gallery_img5', true ) );
    $class_gallery_img6 = esc_html( get_post_meta( $class->ID, 'class_gallery_img6', true ) );
    $class_gallery_img7 = esc_html( get_post_meta( $class->ID, 'class_gallery_img7', true ) );
    $class_gallery_img8 = esc_html( get_post_meta( $class->ID, 'class_gallery_img8', true ) );
    ?>
	<ul id="schedule-tabs-nav" data-uk-switcher="{connect:'#schedule-tabs'}">
		<li><a href="">Basic Info</a></li>
		<li><a href="">Info</a></li>
		<li><a href="">Media</a></li>
	</ul>

	<ul id="schedule-tabs" class="uk-switcher">
		<li>
			<table>
				<tr>
					<td style="width: 100%"><?php echo __('Starts (e.g. 09:00)', 'jt-schedule'); ?></td>
					<td><input type="text" size="5" name="class_starts" value="<?php echo $class_starts; ?>" /></td>
				</tr>
				<tr>
					<td style="width: 150px"><?php echo __('Duration (e.g. 30min)', 'jt-schedule'); ?></td>
					<td><input type="text" size="10" name="class_duration" value="<?php echo $class_duration; ?>" /></td>
				</tr>
				<tr>
					<td style="width: 150px"><?php echo __('Instructor (e.g. John Doe)', 'jt-schedule'); ?></td>
					<td><input type="text" size="80" name="class_trainer" value="<?php echo $class_trainer; ?>" /></td>
				</tr>
				<tr>
					<td style="width: 150px"><?php echo __('Room (e.g. C3)', 'jt-schedule'); ?></td>
					<td><input type="text" size="80" name="class_room" value="<?php echo $class_room; ?>" /></td>
				</tr>
				<tr>
					<td style="width: 150px"><?php echo __('Color*', 'jt-schedule'); ?></td>
					<td><input type="color" name="class_color" value="<?php echo $class_color; ?>" /></td>
				</tr>
			</table>
			<p><?php echo __('* Color is used only with the "Text only schedule" style of JT Schedule\'s widget.', 'jt-schedule'); ?></p>
		</li>
		<li>
			<?php wp_editor( html_entity_decode(stripcslashes($class_info)), $info ); ?>
		</li>
		<li>
			<table>
				<tr>
					<td style="width: 100%"><?php echo __('Video URL', 'jt-schedule'); ?></td>
					<td><input type="url" size="80" name="class_video_url" value="<?php echo $class_video_url; ?>" /></td>
				</tr>
				<tr>
					<td style="width: 100%"><?php echo __('Video (Embed Code)', 'jt-schedule'); ?></td>
					<td><textarea name="class_video_embed" cols="70" rows="3"><?php echo $class_video_embed; ?></textarea></td>
				</tr>
			</table>
			<hr />
			<h3><?php echo __('Photo Gallery', 'jt-schedule'); ?></h3>
			<p>
				<label for="class_gallery_img1">
					<input id="class_gallery_img1" type="text" size="100" name="class_gallery_img1" value="<?php echo $class_gallery_img1; ?>" placeholder="Image 1" /><input id="class_gallery_img1_button" class="button" type="button" value="<?php echo __('Upload', 'jt-event-calendar'); ?>" />
				</label>
			</p>
			<p>
				<label for="class_gallery_img2">
					<input id="class_gallery_img2" type="text" size="100" name="class_gallery_img2" value="<?php echo $class_gallery_img2; ?>" placeholder="Image 2" /><input id="class_gallery_img2_button" class="button" type="button" value="<?php echo __('Upload', 'jt-event-calendar'); ?>" />
				</label>
			</p>
			<p>
				<label for="class_gallery_img3">
					<input id="class_gallery_img3" type="text" size="100" name="class_gallery_img3" value="<?php echo $class_gallery_img3; ?>" placeholder="Image 3" /><input id="class_gallery_img3_button" class="button" type="button" value="<?php echo __('Upload', 'jt-event-calendar'); ?>" />
				</label>
			</p>
			<p>
				<label for="class_gallery_img4">
					<input id="class_gallery_img4" type="text" size="100" name="class_gallery_img4" value="<?php echo $class_gallery_img4; ?>" placeholder="Image 4" /><input id="class_gallery_img4_button" class="button" type="button" value="<?php echo __('Upload', 'jt-event-calendar'); ?>" />
				</label>
			</p>
			<p>
				<label for="class_gallery_img5">
					<input id="class_gallery_img5" type="text" size="100" name="class_gallery_img5" value="<?php echo $class_gallery_img5; ?>" placeholder="Image 5" /><input id="class_gallery_img5_button" class="button" type="button" value="<?php echo __('Upload', 'jt-event-calendar'); ?>" />
				</label>
			</p>
			<p>
				<label for="class_gallery_img6">
					<input id="class_gallery_img6" type="text" size="100" name="class_gallery_img6" value="<?php echo $class_gallery_img6; ?>" placeholder="Image 6" /><input id="class_gallery_img6_button" class="button" type="button" value="<?php echo __('Upload', 'jt-event-calendar'); ?>" />
				</label>
			</p>
			<p>
				<label for="class_gallery_img7">
					<input id="class_gallery_img7" type="text" size="100" name="class_gallery_img7" value="<?php echo $class_gallery_img7; ?>" placeholder="Image 7" /><input id="class_gallery_img7_button" class="button" type="button" value="<?php echo __('Upload', 'jt-event-calendar'); ?>" />
				</label>
			</p>
			<p>
				<label for="class_gallery_img8">
					<input id="class_gallery_img8" type="text" size="100" name="class_gallery_img8" value="<?php echo $class_gallery_img8; ?>" placeholder="Image 8" /><input id="class_gallery_img8_button" class="button" type="button" value="<?php echo __('Upload', 'jt-event-calendar'); ?>" />
				</label>
			</p>
		</li>
	</ul>
    <?php
}

add_action( 'save_post', 'add_class_fields', 10, 2 );
function add_class_fields( $class_id, $class ) {
    // Check post type for movie reviews
    if ( $class->post_type == 'schedule' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['class_starts'] ) && $_POST['class_starts'] != '' ) {
            update_post_meta( $class_id, 'class_starts', $_POST['class_starts'] );
        }
        if ( isset( $_POST['class_duration'] ) && $_POST['class_duration'] != '' ) {
            update_post_meta( $class_id, 'class_duration', $_POST['class_duration'] );
        }
        if ( isset( $_POST['class_trainer'] ) && $_POST['class_trainer'] != '' ) {
            update_post_meta( $class_id, 'class_trainer', $_POST['class_trainer'] );
        }
        if ( isset( $_POST['class_room'] ) && $_POST['class_room'] != '' ) {
            update_post_meta( $class_id, 'class_room', $_POST['class_room'] );
        }
        if ( isset( $_POST['class_color'] ) && $_POST['class_color'] != '' ) {
            update_post_meta( $class_id, 'class_color', $_POST['class_color'] );
        }
        if ( isset( $_POST['class_info'] ) && $_POST['class_info'] != '' ) {
            update_post_meta( $class_id, 'class_info', $_POST['class_info'] );
        }
        if ( isset( $_POST['class_video_url'] ) && $_POST['class_video_url'] != '' ) {
            update_post_meta( $class_id, 'class_video_url', $_POST['class_video_url'] );
        }
        if ( isset( $_POST['class_video_embed'] ) && $_POST['class_video_embed'] != '' ) {
            update_post_meta( $class_id, 'class_video_embed', $_POST['class_video_embed'] );
        }
        if ( isset( $_POST['class_gallery_img1'] ) && $_POST['class_gallery_img1'] != '' ) {
            update_post_meta( $class_id, 'class_gallery_img1', $_POST['class_gallery_img1'] );
        }
        if ( isset( $_POST['class_gallery_img2'] ) && $_POST['class_gallery_img2'] != '' ) {
            update_post_meta( $class_id, 'class_gallery_img2', $_POST['class_gallery_img2'] );
        }
        if ( isset( $_POST['class_gallery_img3'] ) && $_POST['class_gallery_img3'] != '' ) {
            update_post_meta( $class_id, 'class_gallery_img3', $_POST['class_gallery_img3'] );
        }
        if ( isset( $_POST['class_gallery_img4'] ) && $_POST['class_gallery_img4'] != '' ) {
            update_post_meta( $class_id, 'class_gallery_img4', $_POST['class_gallery_img4'] );
        }
        if ( isset( $_POST['class_gallery_img5'] ) && $_POST['class_gallery_img5'] != '' ) {
            update_post_meta( $class_id, 'class_gallery_img5', $_POST['class_gallery_img5'] );
        }
        if ( isset( $_POST['class_gallery_img6'] ) && $_POST['class_gallery_img6'] != '' ) {
            update_post_meta( $class_id, 'class_gallery_img6', $_POST['class_gallery_img6'] );
        }
        if ( isset( $_POST['class_gallery_img7'] ) && $_POST['class_gallery_img7'] != '' ) {
            update_post_meta( $class_id, 'class_gallery_img7', $_POST['class_gallery_img7'] );
        }
        if ( isset( $_POST['class_gallery_img8'] ) && $_POST['class_gallery_img8'] != '' ) {
            update_post_meta( $class_id, 'class_gallery_img8', $_POST['class_gallery_img8'] );
        }
    }
}


function get_schedule_template($single_template) {
     global $post;

     if ($post->post_type == 'schedule') {
          $single_template = dirname( __FILE__ ) . '/single-schedule.php';
     }
     return $single_template;
}
add_filter( 'single_template', 'get_schedule_template' );



// Creating the widget 
class jt_schedule extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'jt_schedule', 

		// Widget name will appear in UI
		__('JT Schedule', 'jt-schedule'), 

		// Widget description
		array( 'description' => __( 'Create a modern and responsive schedule', 'jt-schedule' ), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $widget_args, $instance ) {
					
		$options = get_option( 'jt_schedule_settings' );
		include ( dirname( __FILE__ ) . '/options/variables.php');
		
        extract( $widget_args );
	
		$title = apply_filters( 'widget_title', $instance['title'] );
		$style = $instance['style'];
		$order = $instance['order'];
		$category = $instance['category'];
		
		wp_register_script('uikit_js', plugins_url('/js/uikit.min.js',__FILE__ ));
		wp_enqueue_script('uikit_js');
		wp_register_script('uikit_grid_js', plugins_url('/js/grid.min.js',__FILE__ ));
		wp_enqueue_script('uikit_grid_js');
		wp_register_style('jt-schedule', plugins_url('/css/style.css',__FILE__ ));
		wp_enqueue_style('jt-schedule');
		wp_style_add_data( 'jt-schedule', 'rtl', 'replace' );
		wp_register_style( 'uikit.css', plugin_dir_url(__FILE__).'css/uikit.css' );
		wp_enqueue_style( 'uikit.css' );
		wp_register_style( 'tooltip.css', plugin_dir_url(__FILE__).'css/tooltip.min.css' );
		wp_enqueue_style( 'tooltip.css' );
		wp_register_script( 'tooltip.js', plugin_dir_url(__FILE__).'js/tooltip.min.js' );
		wp_enqueue_script( 'tooltip.js' );
		
		
		
		// before and after widget arguments are defined by themes
		echo $widget_args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $widget_args['before_title'];
		
			echo $title;
		
			echo $widget_args['after_title'];
		}
		
		// Include style based on the widget's settings
		if ($style == 'default') {
			include( plugin_dir_path( __FILE__ ) . 'styles/default.php');
		}
		else if ($style == 'default-2') {
			include( plugin_dir_path( __FILE__ ) . 'styles/default-2.php');
		}
		else if ($style == 'rounded-images') {
			include( plugin_dir_path( __FILE__ ) . 'styles/rounded-images.php');
		}
		else if ($style == 'rounded-overlay') {
			include( plugin_dir_path( __FILE__ ) . 'styles/rounded-overlay.php');
		}
		else if ($style == 'colored') {
			include( plugin_dir_path( __FILE__ ) . 'styles/colored.php');
		}
		
		echo $widget_args['after_widget'];
	}

	// Widget Backend 
	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance[ 'title' ] ) : ' ';
		$style =  isset( $instance['style'] ) ? $instance[ 'style' ] : ' ';
		$order =  isset( $instance['order'] ) ? $instance[ 'order' ] : ' ';
		$category =  isset( $instance['category'] ) ? $instance[ 'category' ] : ' ';
		
		
		// Widget admin form
	?>
	<div class="wrap-jsquare">
	
		<div class="uk-accordion" data-uk-accordion>
			<div class="jt-menu-widget">
				<h3 class="uk-accordion-title"><i class="fa fa-gear"></i></h3>
			</div>
			<div class="uk-accordion-content">
				<h4>Widget Settings</h4>
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget Title:', 'jt-schedule' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e( 'Style:', 'jt-schedule' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>">
						<option value="default" <?php echo ($style == 'default')?'selected':''; ?>>Default</option>
						<option value="default-2" <?php echo ($style == 'default-2')?'selected':''; ?>>Default 2</option>
						<option value="rounded-images" <?php echo ($style == 'rounded-images')?'selected':''; ?>>Rounded Images</option>
						<option value="rounded-overlay" <?php echo ($style == 'rounded-overlay')?'selected':''; ?>>Rounded Images - Overlay Text</option>
						<option value="colored" <?php echo ($style == 'colored')?'selected':''; ?>>Text only schedule</option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php _e( 'Order:', 'jt-schedule' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'order' ); ?>" name="<?php echo $this->get_field_name( 'order' ); ?>">
						<option value="ASC" <?php echo ($order == 'ASC')?'selected':''; ?>>ASC</option>
						<option value="DESC" <?php echo ($order == 'DESC')?'selected':''; ?>>DESC</option>
					</select>
				</p>
				<p>
				<?php
					$terms = get_terms( 'classes_categories' );
					if ( ! empty( $terms ) ) {
				?>
					<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Category:', 'jt-schedule' ); ?></label> 
					<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>">
						<option value="all" <?php echo ($category == 'all')?'selected':''; ?>><?php _e('All Categories'); ?></option>
						<?php
					 		foreach ( $terms as $term ) {
						 ?>
						<option value="<?php echo $term->slug; ?>" <?php echo ($category == $term->slug)?'selected':''; ?>><?php echo $term->name; ?></option>
						<?php
							}
						?>
				</select>
				<?php
					}
				?>
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
		$instance['order'] = $new_instance['order'];
		$instance['category'] = $new_instance['category'];
		
		return $instance;
	}

} // Class wpb_widget ends here

// Register and load the widget
function jt_schedule_widget() {
	register_widget( 'jt_schedule' );
}
add_action( 'widgets_init', 'jt_schedule_widget' );

function jt_schedule_styles() {
	
	   wp_register_style('font-awesome', plugin_dir_url(__FILE__).'css/font-awesome.min.css');
	   wp_enqueue_style('font-awesome');
		
       wp_register_style( 'uikit.css', plugin_dir_url(__FILE__).'css/uikit.css' );
       wp_enqueue_style( 'uikit.css' );
	
       wp_register_script( 'switcher.js', plugin_dir_url(__FILE__).'js/switcher.min.js' );
       wp_enqueue_script( 'switcher.js' );
	
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
       wp_register_script( 'uikit.js', plugin_dir_url(__FILE__).'js/uikit.min.js');
       wp_enqueue_script( 'uikit.js' );
    }
	
    if (wp_script_is( 'accordion.js', 'enqueued' )) {
    	return;
    } else {
       wp_register_script( 'accordion.js', plugin_dir_url(__FILE__).'js/accordion.min.js' );
       wp_enqueue_script( 'accordion.js' );
    }
	
}
add_action( 'widgets_init','jt_schedule_styles');


function jt_schedule_scripts() {
		
       wp_register_style( 'jt-schedule.css', plugin_dir_url(__FILE__).'css/jt-schedule.css' );
       wp_enqueue_style( 'jt-schedule.css' );
	
}
add_action( 'init','jt_schedule_scripts');


add_action('admin_enqueue_scripts', 'jt_schedule_admin_scripts');
 
function jt_schedule_admin_scripts() {
        wp_enqueue_media();
        wp_register_script('jt-admin-scripts.js', plugin_dir_url(__FILE__) . '/js/admin-scripts.js', array('jquery'));
        wp_enqueue_script('jt-admin-scripts.js');
}

?>
