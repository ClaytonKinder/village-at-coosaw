<?php
add_action( 'admin_menu', 'jt_add_admin_menu' );
add_action( 'admin_init', 'jt_settings_init' );


function jt_add_admin_menu(  ) { 

	add_submenu_page( 'edit.php?post_type=events_list', 'JT Event Calendar', 'Settings', 'manage_options', 'jt_event_calendar', 'jt_options_page' );

}


function jt_settings_init(  ) { 

	register_setting( 'pluginPage', 'jt_settings' );

	add_settings_section(
		'jt_pluginPage_section', 
		__( '', 'jt-event-calendar' ), 
		'jt_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'event_page', 
		__( 'Enable "Event Page"', 'jt-event-calendar' ), 
		'event_page_render', 
		'pluginPage', 
		'jt_pluginPage_section' 
	);

	add_settings_field( 
		'date_format', 
		__( 'Date Format', 'jt-event-calendar' ), 
		'date_format_render', 
		'pluginPage', 
		'jt_pluginPage_section' 
	);


}


function event_page_render(  ) { 

	$options = get_option( 'jt_settings' );
	?>
	<input type='checkbox' name='jt_settings[event_page]' <?php checked( $options['event_page'], 1 ); ?> value='1'>
	<p>By selecting this option, the plugin will create a new page for every event with the info you provided when you added the events. Also, <strong>"JT Events"</strong> widget will replace all event titles with a link to these pages.</p>
	<?php

}


function date_format_render(  ) { 

	$options = get_option( 'jt_settings' );
	?>
	<select name='jt_settings[date_format]'>
		<option value='dFY' <?php selected( $options['date_format'], 'dFY' ); ?>>01 January 2017</option>
		<option value='dF' <?php selected( $options['date_format'], 'dF' ); ?>>01 January</option>
		<option value='Fd' <?php selected( $options['date_format'], 'Fd' ); ?>>January 01</option>
		<option value='dMY' <?php selected( $options['date_format'], 'dMY' ); ?>>01 Jan 2017</option>
		<option value='dM' <?php selected( $options['date_format'], 'dM' ); ?>>01 Jan</option>
		<option value='Md' <?php selected( $options['date_format'], 'Md' ); ?>>Jan 01</option>
		<option value='dmY' <?php selected( $options['date_format'], 'dmY' ); ?>>01/02/2017 (DD/MM/YYYY)</option>
		<option value='mdY' <?php selected( $options['date_format'], 'mdY' ); ?>>02/01/2017 (MM/DD/YYYY)</option>
	</select>
	<p>Select the date format for the event's page. Note that this date format can be different from the date format you define when you add a <strong>JT Events</strong> widget.</p>

<?php

}


function jt_settings_section_callback(  ) { 

	echo __( 'Basic Settings for "JT Event Calendar" plugin and "JT Events" widget', 'jt-event-calendar' );

}


function jt_options_page(  ) { 

	?>
	<form action='options.php' method='post'>

		<h2>JT Event Calendar</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}

?>