<?php

/*
  Optionen für Standardgrößen überschreiben und Post Thumbnails aktivieren
*/

//add_image_size( 'custom-image', 2000, 1200, true );
//add_image_size( 'portrait', 300, 300, array( 'center', 'center' ) );
add_image_size( 'slider', 960, 300, array( 'top', 'center' ) );

#add_theme_support( 'post-thumbnails' );

#Standardgrößen
#set_post_thumbnail_size( 440, 300, true );
update_option('thumbnail_size_w',440);
update_option('thumbnail_size_h', 300);
update_option('thumbnail_crop', 1);
update_option('medium_size_w',600);
update_option('medium_size_h', 0);
update_option('medium_large_size_w',900);
update_option('medium_large_size_h', 0);
update_option('large_size_w',1800);
update_option('large_size_h', 0);
