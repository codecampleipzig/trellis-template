<?php

  /*
    Disable CF7 Scripts
  */

remove_action( 'wp_enqueue_scripts', 'wpcf7_enqueue_scripts' ); // Prevents the scripts from loading on all pages
remove_action( 'wp_enqueue_scripts', 'wpcf7_enqueue_styles' ); // Prevents the styles from loading on all pages
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

  function cf7_enqueue() {

    wp_enqueue_script( 'form-script', get_template_directory_uri() . '/functions/template--cf7.js', array('jquery'), false, true );

		$wpcf7 = array(
			'apiSettings' => array(
				'root' => esc_url_raw( rest_url( 'contact-form-7/v1' ) ),
				'namespace' => 'contact-form-7/v1',
			),
			'recaptcha' => array(
				'messages' => array(
					'empty' =>
						__( 'Please verify that you are not a robot.', 'contact-form-7' ),
				),
			),
		);

		if ( defined( 'WP_CACHE' ) && WP_CACHE ) {
			$wpcf7['cached'] = 1;
		}

		if ( function_exists('wpcf7_support_html5_fallback') && wpcf7_support_html5_fallback() ) {
			$wpcf7['jqueryUi'] = 1;
		}

		wp_localize_script( 'form-script', 'wpcf7', $wpcf7 );

	}
add_action( 'wp_enqueue_scripts', 'cf7_enqueue' );


/*
  Disable CF7 Errors
*/

add_filter( 'wpcf7_validate_configuration', '__return_false' );
