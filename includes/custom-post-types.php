<?php 

$labels = array(
  'name' => __('Reizen'),
  'all_items' => __('Alle reizen'),
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
  'has_archive' => true,
  'taxonomies' => array('reistype', 'reiscategorie'),
  'rewrite' => array( 'with_front' => false ),
  'supports' => array('title','thumbnail', 'revisions')
  ); 

register_post_type( 'reizen' , $args );
//flush_rewrite_rules();

$labels = array(
  'name' => __('Kantoren'),
  'all_items' => __('Alle kantoren'),
  'singular_name' => __('Kantoor'),
  'add_new' => __('Nieuwe kantoor'),
  'add_new_item' => __('Nieuwe kantoor'),
  'edit_item' => __('Kantoor bewerken'),
  'new_item' => __('Nieuwe kantoor'),
  'view_item' => __('Bekijk kantoor'),
  'search_items' => __('Doorzoek kantoren'),
  'not_found' =>  __('Niets gevonden'),
  'not_found_in_trash' => __('Niets gevonden in de prullenbak'),
  'parent_item_colon' => ''
);

$args = array(
  'labels' => $labels,
  'public' => false,
  'show_ui' => true,
  'menu_icon' => get_stylesheet_directory_uri() . '/img/kantoren.png',
  'hierarchical' => false,
  'menu_position' => null,
  'has_archive' => false,
  'rewrite' => false,
  'supports' => array('title', 'revisions')
  ); 

register_post_type( 'kantoren' , $args );

flush_rewrite_rules();