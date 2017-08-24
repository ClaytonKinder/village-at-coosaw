<?php

	register_sidebar( array(
		'name'          => esc_html__( 'Newsletter', 'alphaplus' ),
		'id'            => 'newsletter',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Showcase', 'alphaplus' ),
		'id'            => 'showcase',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Counter', 'alphaplus' ),
		'id'            => 'counter',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

?>