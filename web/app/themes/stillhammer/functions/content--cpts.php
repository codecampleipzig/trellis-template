<?php

function register_my_cpts() {
  $labels = array(
    "name" => __( "Aktuelles-Einträge", "mg" ),
    "singular_name" => __( "Aktuelles-Eintrag", "custom-post-type-ui" ),
  );

  $args = array(
    "label" => __( "Aktuelles", "custom-post-type-ui" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "delete_with_user" => false,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => array( "slug" => "aktuelles", "with_front" => true ),
    "query_var" => true,
    "menu_position" => 5,
    "menu_icon" => "dashicons-megaphone",
    "supports" => array( "title", "editor", "revisions" )
  );

  register_post_type( "aktuelles", $args );
}
add_action( 'init', 'register_my_cpts' );
