<?php 

function root(){
	echo get_stylesheet_directory_uri() . '/';
}

function get_root(){
	return get_stylesheet_directory_uri() . '/';
}

if (!WP_DEBUG) {
	define( 'ACF_LITE', true );
}
include_once('acf/acf.php' );

add_action('wp_enqueue_scripts', 'pocoloco_scripts');

function pocoloco_scripts(){
	if (is_front_page()) {
		wp_enqueue_script( 'poco-blog-slider', get_root() . 'js/blog-slider.js', array(), false, true );
	}
}

// Register custom post types
$labels = array(
  'name' => __('Reizen'),
  'singular_name' => __('Reis'),
  'add_new' => __('Nieuwe reis'),
  'add_new_item' => __('Nieuwe reis'),
  'edit_item' => __('Reis bewerken'),
  'new_item' => __('Nieuwe reis'),
  'view_item' => __('Bekijk reis'),
  'search_items' => __('Doorzoek reizen'),
  'not_found' =>  __('Niets gevonden'),
  'not_found_in_trash' => __('Niets gevonden in de prullenbak'),
  'parent_item_colon' => ''
);

$args = array(
  'labels' => $labels,
  'public' => true,
  'query_var' => true,
  'menu_icon' => get_stylesheet_directory_uri() . '/img/reizen.png',
  'hierarchical' => false,
  'menu_position' => null,
  'rewrite' => array( 'with_front' => false ),
  'supports' => array('title','editor','thumbnail', 'revisions')
  ); 

register_post_type( 'reizen' , $args );
flush_rewrite_rules();