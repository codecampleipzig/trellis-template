<?php

$current_user = wp_get_current_user();


if ( $current_user->ID !== 1) :

 add_action( 'wp_before_admin_bar_render', 'mg_remove_admin_bar_links' );
   function mg_remove_admin_bar_links() {
     global $wp_admin_bar;
     $wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
     $wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
     $wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
     $wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
     $wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
     $wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
     $wp_admin_bar->remove_menu('updates');          // Remove the updates link
     $wp_admin_bar->remove_menu('comments');         // Remove the comments link
     $wp_admin_bar->remove_menu('new-content');      // Remove the content link
   }

 add_action('admin_menu', 'mg_remove_niggly_bits');
   function mg_remove_niggly_bits() {
     global $submenu;
     unset($submenu['edit.php?post_type=aussteller'][15]);
     unset($submenu['edit.php?post_type=aussteller'][16]);
     unset($submenu['edit.php?post_type=events'][15]);
     //print_r($submenu); exit; //Ausgabe vom Array zur Analyse
   }

//	add_action('admin_head', 'mg_admin_head');
   function mg_admin_head() {
     echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo("template_url").'/inc/css/admin.css">';
   }

$role_object = get_role( 'editor' );

// add $cap capability to this role object
$role_object->add_cap( 'edit_theme_options' );

 add_action('admin_menu', 'mg_register_custom_menu_page');
   function mg_register_custom_menu_page() {
     add_menu_page('Men&uuml;', 'Men&uuml;', 'editor', 'nav-menus.php', '',  '', 30);
   }


 add_action( 'admin_menu', 'mg_remove_menu_pages' );
   function mg_remove_menu_pages() {
     remove_menu_page('themes.php');
     remove_menu_page('plugins.php');
     remove_menu_page('users.php');
       remove_menu_page('options-general.php');
       remove_menu_page('edit.php?post_type=acf-field-group');
       remove_menu_page('edit.php');
       remove_menu_page('edit-comments.php');
       remove_menu_page('tools.php');
       remove_submenu_page('themes.php', 'nav-menus.php');
     remove_menu_page( 'wpcf7' );
   }

 // Wordpress Standard Widgets
 add_action('wp_dashboard_setup', 'mg_remove_dashboard_widgets');
   function mg_remove_dashboard_widgets(){
     global $wp_meta_boxes;
     unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
     unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
     unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
     unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
     unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
     unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
     unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
     unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
     unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
   }

 add_filter('admin_footer_text', 'mg_footer_admin');
   function mg_footer_admin () {
     echo 'Design von <a href="https://moritz-graf.de">Moritz Graf Mediengestalter</a>.';
   }


 add_action('wp_dashboard_setup', 'mgm_custom_dashboard_widgets');
   function mgm_custom_dashboard_widgets() {
     global $wp_meta_boxes;
     wp_add_dashboard_widget('custom_help_widget', 'Willkommen!', 'custom_dashboard_help');
   }

 function custom_dashboard_help() {
   echo '<p>Willkommen im Adminbereich!</p><p>Dies ist die Startseite des Administrator Bereichs.</p><p>Bei Fragen wenden Sie sich bitte an <a href="https://moritz-graf.de/">Moritz Graf</a></p><p>Viel Spaß mit Ihrer Webseite!</p>';
   }

endif;
