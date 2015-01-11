<?php 

$labels = array(
  'name' => __( 'Reistypes' ),
  'all_items' => __('Alle Reistypes'),
  'singular_name' => __('Reistype'),
  'add_new' => __('Nieuwe reistype'),
  'add_new_item' => __('Nieuwe reistype'),
  'edit_item' => __('Reistype bewerken'),
  'new_item' => __('Nieuwe reistype'),
  'view_item' => __('Bekijk reistype'),
  'search_items' => __('Zoek reistypes'),
  'not_found' =>  __('Niets gevonden'),
  'not_found_in_trash' => __('Niets gevonden in de prullenbak'),
  'parent_item_colon' => ''
);

$args = array(
  'hierarchical'          => true,
  'labels'                => $labels,
  'show_ui'               => true,
  'show_admin_column'     => true,
  'query_var'             => true,
  'public'                => false,
  'rewrite'               => false,
);

register_taxonomy('reistype', 'reizen', $args);

$labels = array(
  'name' => __( 'Reiscategorieën' ),
  'all_items' => __('Alle Reiscategorieën'),
  'singular_name' => __('Reiscategorie'),
  'add_new' => __('Nieuwe reiscategorie'),
  'add_new_item' => __('Nieuwe reiscategorie'),
  'edit_item' => __('Reiscategorie bewerken'),
  'new_item' => __('Nieuwe reiscategorie'),
  'view_item' => __('Bekijk reiscategorie'),
  'search_items' => __('Zoek reiscategorieën'),
  'not_found' =>  __('Niets gevonden'),
  'not_found_in_trash' => __('Niets gevonden in de prullenbak'),
  'parent_item_colon' => ''
);

$args = array(
  'hierarchical'          => true,
  'labels'                => $labels,
  'show_ui'               => true,
  'show_admin_column'     => true,
  'query_var'             => true,
  'public'                => false,
  'rewrite'               => false,
);

register_taxonomy('reiscategorie', 'reizen', $args);