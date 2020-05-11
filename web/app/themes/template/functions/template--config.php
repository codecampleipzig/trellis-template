<?php

  /*
    Aktiviert die Webfont, z.B. Typektit oder Google Font
  */


  add_action( 'wp_head', function () { ?>

    <link rel="stylesheet" href="https://use.typekit.net/pqg3zjy.css">

  <?php } );

  add_action( 'admin_head', function () { ?>

    <link rel="stylesheet" href="https://use.typekit.net/pqg3zjy.css">

  <?php } );

	function mgtheme_enqueue() {

    wp_enqueue_style( 'main-style', get_stylesheet_uri() );
		wp_enqueue_style( 'theme-main', get_template_directory_uri() . '/css/main.css' );

    wp_enqueue_script('jquery');

	}
add_action( 'wp_enqueue_scripts', 'mgtheme_enqueue' );
