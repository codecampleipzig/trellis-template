<?php

add_action( 'init',
   function () {

      /**
       * Register Produkte Posttype
      */

      $labels = array(
         "name" => __( 'Produkte', "mg" ),
         "singular_name" => __( 'Produkt', "mg" ),
         "parent_item_colon" => __( 'Eltern', "mg" ),
      );

      $args = array(
         "label" => __( 'Produkte', "mg" ),
         "labels" => $labels,
         "description" => "",
         "public" => true,
         "has_archive" => false,
         "show_in_menu" => true,
         "capability_type" => "page",
         "hierarchical" => true,
         "menu_position" => 5,
         "show_in_rest" => true, // required for Gutenberg enable/disable (see content--gutenberg-disable.php)
         "menu_icon" => "dashicons-carrot", // https://developer.wordpress.org/resource/dashicons/
         "supports" => array( "title", "revisions", "editor", "thumbnail", "excerpt", "page-attributes" )
      );

      register_post_type( 'produkte', $args );


      /**
       * Register Dienstleistungen Posttype
      */

      $labels = array(
         "name" => __( 'Dienstleistungen', "mg" ),
         "singular_name" => __( 'Dienstleistung', "mg" ),
         "parent_item_colon" => __( 'Eltern', "mg" ),
      );

      $args = array(
         "label" => __( 'Dienstleistungen', "mg" ),
         "labels" => $labels,
         "description" => "",
         "public" => true,
         "has_archive" => false,
         "show_in_menu" => true,
         "capability_type" => "page",
         "hierarchical" => true,
         "menu_position" => 5,
         "show_in_rest" => true, // required for Gutenberg enable/disable (see content--gutenberg-disable.php)
         "menu_icon" => "dashicons-businessman", // https://developer.wordpress.org/resource/dashicons/
         "supports" => array( "title", "revisions", "editor", "thumbnail", "excerpt", "page-attributes" )
      );

      register_post_type( 'dienstleistungen', $args );
   }
);

add_action('acf/init', 
   function () {
      
      // check function exists
      if( function_exists('acf_register_block') ) {
         
         acf_register_block(array(
            'name'				=> 'blocks',
            'title'				=> __('Blöcke'),
            'description'		=> __('Verlinkungen mit Bild, Beschreibung & Schaltfläche, nebeneinander'),
            'render_callback'	=> 'blocks_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'grid-view',
            'keywords'			=> array( 'spalten', '3sechzig' ),
            'mode'            => 'edit',
            'supports'        => array(
               'align'        => false
            )
         ));

         acf_register_block(array(
            'name'				=> 'downloads',
            'title'				=> __('Downloads'),
            'description'		=> __('Liste mit Dateidownloads'),
            'render_callback'	=> 'downloads_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'paperclip',
            'keywords'			=> array( '3sechzig' ),
            'mode'            => 'edit',
            'supports'        => array(
               'align'        => false
            )
         ));
      }
   }
);

function blocks_block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
   if( file_exists( get_theme_file_path("/gutenberg/blocks-template.php") ) ) {
		include( get_theme_file_path("/gutenberg/blocks-template.php") );
	}
}

function downloads_block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/gutenberg/downloads-template.php") ) ) {
		include( get_theme_file_path("/gutenberg/downloads-template.php") );
	}
}

require_once('acf.php');
