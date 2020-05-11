<?php


/**
 * Autoload template's functions folder
 */

  function autoload( $path ) {
      $items = glob( $path . DIRECTORY_SEPARATOR . "*" );

      foreach( $items as $item ) {

          if ( is_file( $item ) && pathinfo( $item )["extension"] === "php" ) {
              require_once $item;
          } elseif ( is_dir( $item ) ) {
              autoload( $item );
          }
      }
  }
autoload( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "functions" );


/**
 * Setup Post-Types
 */

require_once('gutenberg/setup.php');
require_once('gutenberg-vimeo/setup.php');
require_once('termine/setup.php');
