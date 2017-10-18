<?php
add_action( 'admin_menu', 'jt_schedule_add_admin_menu' );
add_action( 'admin_init', 'jt_schedule_settings_init' );


function jt_schedule_add_admin_menu(  ) { 

	add_submenu_page( 'edit.php?post_type=schedule', 'JT Schedule', 'Settings', 'manage_options', 'jt_schedule', 'jt_schedule_options_page' );

}


function jt_schedule_settings_init(  ) { 

	register_setting( 'scheduleDisplayPage', 'jt_schedule_settings' );
	register_setting( 'scheduleTranslationsPage', 'jt_schedule_translations' );

	add_settings_section(
		'jt_schedule_displayPage_section', 
		__( '', 'jt-schedule' ), 
		'jt_schedule_settings_section_callback', 
		'scheduleDisplayPage'
	);
	
	add_settings_section(
		'jt_schedule_translationsPage_section', 
		__( '', 'jt-schedule' ), 
		'jt_schedule_translations_section_callback', 
		'scheduleTranslationsPage'
	);
	
	add_settings_field( 
		'jt_schedule_singlePage', 
		__( 'Enable Single Page', 'jt-schedule' ), 
		'jt_schedule_singlePage_render', 
		'scheduleDisplayPage', 
		'jt_schedule_displayPage_section' 
	);

	add_settings_field( 
		'jt_schedule_startsText', 
		__( 'Starts', 'jt-schedule' ), 
		'jt_schedule_startsText_render', 
		'scheduleTranslationsPage', 
		'jt_schedule_translationsPage_section' 
	);

	add_settings_field( 
		'jt_schedule_durationText', 
		__( 'Duration', 'jt-schedule' ), 
		'jt_schedule_durationText_render', 
		'scheduleTranslationsPage', 
		'jt_schedule_translationsPage_section' 
	);

	add_settings_field( 
		'jt_schedule_instructorText', 
		__( 'Instructor', 'jt-schedule' ), 
		'jt_schedule_instructorText_render', 
		'scheduleTranslationsPage', 
		'jt_schedule_translationsPage_section' 
	);

	add_settings_field( 
		'jt_schedule_classText', 
		__( 'Class', 'jt-schedule' ), 
		'jt_schedule_classText_render', 
		'scheduleTranslationsPage', 
		'jt_schedule_translationsPage_section' 
	);
	
	add_settings_field( 
		'jt_schedule_signupText', 
		__( 'Sign up', 'jt-schedule' ), 
		'jt_schedule_signupText_render', 
		'scheduleTranslationsPage', 
		'jt_schedule_translationsPage_section' 
	);
	
	add_settings_field( 
		'jt_schedule_firstnameText', 
		__( 'First Name', 'jt-schedule' ), 
		'jt_schedule_firstnameText_render', 
		'scheduleTranslationsPage', 
		'jt_schedule_translationsPage_section' 
	);
	
	add_settings_field( 
		'jt_schedule_lastnameText', 
		__( 'Last Name', 'jt-schedule' ), 
		'jt_schedule_lastnameText_render', 
		'scheduleTranslationsPage', 
		'jt_schedule_translationsPage_section' 
	);
	
	add_settings_field( 
		'jt_schedule_emailText', 
		__( 'Email', 'jt-schedule' ), 
		'jt_schedule_emailText_render', 
		'scheduleTranslationsPage', 
		'jt_schedule_translationsPage_section' 
	);
	
	add_settings_field( 
		'jt_schedule_phoneText', 
		__( 'Phone Number', 'jt-schedule' ), 
		'jt_schedule_phoneText_render', 
		'scheduleTranslationsPage', 
		'jt_schedule_translationsPage_section' 
	);
	
	add_settings_field( 
		'jt_schedule_dayText', 
		__( 'Day', 'jt-schedule' ), 
		'jt_schedule_dayText_render', 
		'scheduleTranslationsPage', 
		'jt_schedule_translationsPage_section' 
	);
	
	add_settings_field( 
		'jt_schedule_submitText', 
		__( 'Submit', 'jt-schedule' ), 
		'jt_schedule_submitText_render', 
		'scheduleTranslationsPage', 
		'jt_schedule_translationsPage_section' 
	);
	
}


function jt_schedule_startsText_render(  ) { 

	$options = get_option( 'jt_schedule_translations' );
	?>
	<input type='text' name='jt_schedule_translations[jt_schedule_startsText]' value='<?php echo $options['jt_schedule_startsText']; ?>'>
	<?php

}


function jt_schedule_durationText_render(  ) { 

	$options = get_option( 'jt_schedule_translations' );
	?>
	<input type='text' name='jt_schedule_translations[jt_schedule_durationText]' value='<?php echo $options['jt_schedule_durationText']; ?>'>
	<?php

}

function jt_schedule_instructorText_render(  ) { 

	$options = get_option( 'jt_schedule_translations' );
	?>
	<input type='text' name='jt_schedule_translations[jt_schedule_instructorText]' value='<?php echo $options['jt_schedule_instructorText']; ?>'>
	<?php

}

function jt_schedule_classText_render(  ) { 

	$options = get_option( 'jt_schedule_translations' );
	?>
	<input type='text' name='jt_schedule_translations[jt_schedule_classText]' value='<?php echo $options['jt_schedule_classText']; ?>'>
	<?php

}

function jt_schedule_signupText_render(  ) { 

	$options = get_option( 'jt_schedule_translations' );
	?>
	<input type='text' name='jt_schedule_translations[jt_schedule_signupText]' value='<?php echo $options['jt_schedule_signupText']; ?>'>
	<?php

}

function jt_schedule_singlePage_render(  ) { 

	$options = get_option( 'jt_schedule_settings' );
	?>
	<input type='checkbox' name='jt_schedule_settings[jt_schedule_singlePage]' <?php checked( $options['jt_schedule_singlePage'], 1 ); ?> value='1'>
	<?php

}



function jt_schedule_settings_section_callback(  ) { 

	echo __( 'This section description', 'jt-schedule' );

}

function jt_schedule_translations_section_callback(  ) { 

	echo __( 'This section description', 'jt-schedule' );

}


function jt_schedule_options_page(  ) { 

            if( isset( $_GET[ 'tab' ] ) ) {
                $active_tab = $_GET[ 'tab' ];
            } else{
				$active_tab = 'display_options' ;
			}
        ?>
		
		<h2>JT Schedule</h2>
		
		<h2 class="nav-tab-wrapper">
            <a href="edit.php?post_type=schedule&page=jt_schedule&tab=display_options" class="nav-tab <?php echo $active_tab == 'display_options' ? 'nav-tab-active' : ''; ?>">Display Options</a>
            <a href="edit.php?post_type=schedule&page=jt_schedule&tab=translations" class="nav-tab <?php echo $active_tab == 'translations' ? 'nav-tab-active' : ''; ?>">Translations</a>
        </h2>
	<form action='options.php' method='post'>
		
		<?php
				if( $active_tab == 'display_options' ) {
					settings_fields( 'scheduleDisplayPage' );
					do_settings_sections( 'scheduleDisplayPage' );
					submit_button();
				}
				else {
					settings_fields( 'scheduleTranslationsPage' );
					do_settings_sections( 'scheduleTranslationsPage' );
					submit_button();
				}
		?>

	</form>
	<?php

}

?>