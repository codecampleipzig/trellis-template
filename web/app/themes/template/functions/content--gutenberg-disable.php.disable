<?php

/*
  Disable Gutenberg by default
  Readme: https://digwp.com/2018/12/enable-gutenberg-block-editor/
*/

// Disable
add_filter('use_block_editor_for_post', '__return_false', 5);


  function shapeSpace_enable_gutenberg_post_type($can_edit, $post) {

    if ('produkte' === $post->post_type || 'dienstleistungen' === $post->post_type || 'page' === $post->post_type) return true;

    return false;
    
  }
// Enable Gutenberg for WordPress >= 5.0
add_filter('use_block_editor_for_post', 'shapeSpace_enable_gutenberg_post_type', 9, 2);

function shapeSpace_enable_gutenberg_post_ids($can_edit, $post) {
  $disabled_posts = array(3, 162, 22, 2, 47);

	if (empty($post->ID)) return $can_edit;
	
	if ( !in_array($post->ID, $disabled_posts) && $can_edit) return true;
	
	return false;
	
}
// Enable Gutenberg for WordPress >= 5.0
add_filter('use_block_editor_for_post', 'shapeSpace_enable_gutenberg_post_ids', 10, 2);

// Hide Builder if it's Gutenberg
add_action('admin_head', function () {
	?>
	<style>
		.block-editor #acf-group_builder {			
			display: none !important
		}
	</style>
	<?php
	
}
);
