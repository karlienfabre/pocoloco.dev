<?php 

function root(){
	echo get_stylesheet_directory_uri() . '/';
}

function get_root(){
	return get_stylesheet_directory_uri() . '/';
}

add_action('wp_enqueue_scripts', 'pocoloco_scripts');

function pocoloco_scripts(){
	if (is_front_page()) {
		wp_enqueue_script( 'poco-blog-slider', get_root() . 'js/blog-slider.js', array(), false, true );
	}
}