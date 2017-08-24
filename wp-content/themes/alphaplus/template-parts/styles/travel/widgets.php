<?php

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
		'name'          => esc_html__( 'Top Destinations', 'alphaplus' ),
		'id'            => 'top-destinations',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Destinations', 'alphaplus' ),
		'id'            => 'destinations',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Activities', 'alphaplus' ),
		'id'            => 'activities',
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
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
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
		'name'          => esc_html__( 'Sidebar', 'alphaplus' ),
		'id'            => 'sidebar-travel',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

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

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'alphaplus' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'alphaplus' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'alphaplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
?>