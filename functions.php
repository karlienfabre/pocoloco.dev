<?php 

function root(){
  echo get_stylesheet_directory_uri() . '/';
}

function get_root(){
  return get_stylesheet_directory_uri() . '/';
}

function pocoloco_init() {
  if (!WP_DEBUG) {
    define( 'ACF_LITE', true );
  }

  include_once('includes/custom-post-types.php');
  include_once('includes/custom-taxonomies.php');
}
add_action( 'init', 'pocoloco_init' );

function pocoloco_theme_setup() {
  
  include_once('acf/acf.php' );
  include_once('acf-repeater/acf-repeater.php');

  add_theme_support( 'post-thumbnails' );

  register_nav_menus( array(
    'main' => 'Hoofdmenu',
  ) );
}
add_action( 'after_setup_theme', 'pocoloco_theme_setup' );

function pocoloco_scripts(){
  if (is_front_page()) {
    wp_enqueue_script( 'poco-blog-slider', get_root() . 'js/blog-slider.js', array(), false, true );
  }
}
add_action('wp_enqueue_scripts', 'pocoloco_scripts');

function pocoloco_excerpt_more( $more ) {
  return '... <p><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Lees meer</a></p>';
}
add_filter('excerpt_more', 'pocoloco_excerpt_more');