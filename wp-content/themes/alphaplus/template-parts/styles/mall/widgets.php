<?php

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'alphaplus' ),
		'id'            => 'sidebar-mall',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Header', 'alphaplus' ),
		'id'            => 'header',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Social', 'alphaplus' ),
		'id'            => 'social',
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
		'name'          => esc_html__( 'About', 'alphaplus' ),
		'id'            => 'about',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Stores', 'alphaplus' ),
		'id'            => 'stores',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Offers', 'alphaplus' ),
		'id'            => 'offers',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Services', 'alphaplus' ),
		'id'            => 'services',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Events', 'alphaplus' ),
		'id'            => 'events',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'News', 'alphaplus' ),
		'id'            => 'news',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Info', 'alphaplus' ),
		'id'            => 'info',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Contact', 'alphaplus' ),
		'id'            => 'contact',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'alphaplus' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'alphaplus' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
?>