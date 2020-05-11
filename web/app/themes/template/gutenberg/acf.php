<?php

/**
 * Limit WYSIWYG height
 */
add_action('admin_head', function () {
	?>
	<style>
		.acf-block-fields .acf-editor-wrap iframe {			
			height: 150px !important;
			min-height: 100px !important;
		}
	</style>
	<?php
	
});


/**
 * Downloads Block
 * Uses downloads-template.php to Render
 */

$downloads = new StoutLogic\AcfBuilder\FieldsBuilder('downloads',[
	'title' => 'Downloads',
	'style' => 'default', // or 'seamless'
	  'position' => 'acf_after_title',
	  'hide_on_screen' => array( 0 => 'the_content' ),
]);

$downloads
	->addFlexibleContent('downloads', [
		'button_label' => 'Block hinzufügen',
		// 'layout' => 'block',
	])
	->setAttr('class', 'acf-builder-title')  // For ACF Builder Title
	->addLayout('download', [ 'label' => "Download" ])
		->addText('title', [
			'label' => 'Titel',
			'default_value' => 'Titel'
		])
		->setAttr('class', 'title') // For ACF Builder Title
		->addGallery('files', [
			'label' => 'Dateien',
			'instructions' => 'Dateinamen werden in der Liste der Dateien angezeigt. Vor dem Upload entsprechend benennen.',
			'required' => 1
		])
		->addWysiwyg('beschreibung', [
			'label' => 'Beschreibung'
		])
	->addLayout('info', [ 'label' => "Info" ])
		->addText('title', [
			'label' => 'Titel',
			'default_value' => 'Titel'
		])
		->setAttr('class', 'title') // For ACF Builder Title
		->addWysiwyg('beschreibung', [
			'label' => 'Beschreibung'
		])
		->addRepeater('links', [
			'label' => 'Links',
			'required' => 1,
			'button_label' => 'Link',
		])
			->addLink('link', [
				'label' => 'Verlinkung'
			])

		->setLocation('block', '==', 'acf/downloads');


add_action('acf/init', function() use ($downloads) {
   acf_add_local_field_group($downloads->build());
});


/**
 * Blocks Block
 * Uses blocks-template.php to Render
 */

$blocks = new StoutLogic\AcfBuilder\FieldsBuilder('blocks',[
	'title' => 'blocks',
	'style' => 'default', // or 'seamless'
	  'position' => 'acf_after_title',
	  'hide_on_screen' => array( 0 => 'the_content' ),
]);
$blocks
	->addSelect('spalten', [
		'label' => 'Spaltenanzahl',
		'required' => 1
	])
		->addChoice('1', '1 Spalte')
		->addChoice('2', '2 Spalten')
		->addChoice('3', '3 Spalten')
		->addChoice('4', '4 Spalten')
	->addFlexibleContent('blocks', [
		'button_label' => 'Block hinzufügen',
		// 'layout' => 'block',
	])
	->setAttr('class', 'acf-builder-title')  // For ACF Builder Title
	->addLayout('block', [ 'label' => "Block" ])
		->addText('title', [
			'label' => 'Titel',
			'default_value' => 'Titel'
		])
		->setAttr('class', 'title') // For ACF Builder Title
		->addGallery('bilder', [
			'label' => 'Bilder',
			'required' => 1,
			'preview_size' => 'thumbnail'
		])
		->addLink('link', [
			'label' => 'Verlinkung',
			'instructions' => 'Zieladresse des Blocks.'
		])
		->addWysiwyg('beschreibung', [
			'label' => 'Beschreibung',
			'instructions' => 'Text unter dem Bild',
			'media_upload' => 0,
			'wrapper' => array('width' => '50')
		])
		->addWysiwyg('beschriftung', [
			'label' => 'Beschriftung',
			'instructions' => 'Überschreibt die Link Beschriftung',
			'required' => 0,
			'media_upload' => 0,
			'wrapper' => array('width' => '50')
		])

		->setLocation('block', '==', 'acf/blocks');


add_action('acf/init', function() use ($blocks) {
   acf_add_local_field_group($blocks->build());
});
