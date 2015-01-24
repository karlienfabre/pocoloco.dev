<?php 

include_once('includes/helpful-functions.php');

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

  add_image_size( 'homepage-thumb', 330, 196, true );

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

add_filter('wp_title', 'pocoloco_wp_title');
function pocoloco_wp_title($input){
  $output = $input . get_bloginfo( 'name' );

  return $output;
}