<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'downloads-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'downloads';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$filetypes_map = array(
	'pdf' => 'a',
	'zip' => 'b'
);

if (have_rows('downloads')):
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> clear">

<?php
	while( have_rows('downloads') ): the_row();
		if( get_row_layout() == 'download' ):
			$titel = get_sub_field('title');
			$files = get_sub_field('files');
			$beschreibung = get_sub_field('beschreibung');
?>

	<section class="download row">
		<h4 class="col-12 order-first"><?php echo $titel; ?></h4>
		<?php if ($beschreibung) : ?>
		<div class="col p-md-0">
			<?php echo $beschreibung; ?>
		</div>
		<?php endif; ?>
		<ul class="col-12 col-md order-md-first list-unstyled">
		<?php
			foreach( $files as $file):
		?>
			<li data-icon-left="d"><?php echo $file['description'] ? $file['description'] . ' ' : '' ;?><a target="_blank" href="<?php echo $file['url']; ?>" title="<?php echo $file['filename']; ?> herunterladen/öffnen"><?php echo $file['title']; ?> <small>.<?php echo $file['subtype']; ?></small></a></li>
		<?php 
			// data-icon-left="<?php echo $filetypes_map[$file['subtype']]; ? >"
			endforeach;
		?>
		</ul>
	</section>

<?php
		elseif( get_row_layout() == 'info' ):
			$titel = get_sub_field('title');
			$files = get_sub_field('links');
			$beschreibung = get_sub_field('beschreibung');
?>

	<section class="download info row">
		<h4 class="col-12 order-first"><?php echo $titel; ?></h4>
		<?php if ($beschreibung) : ?>
		<div class="col p-md-0">
			<?php echo $beschreibung; ?>
		</div>
		<?php endif; ?>
		<ul class="col-12 col-md order-md-first list-unstyled">
		<?php
			foreach( $files as $link):
				$link_url = $link['link']['url'];
				$link_title = $link['link']['title'];
				$link_target = $link['link']['target'] ? $link['link']['target'] : '_self';
		?>
			<li data-icon-left="d"><?php echo '<a target="_blank" href="'. esc_url( $link_url ) .'" target="'. esc_attr( $link_target ) .'" title="'. esc_html( $link_title ) .' öffnen">'. esc_html( $link_title ) . '</a>' ?></li>
		<?php 
			// data-icon-left="<?php echo $filetypes_map[$file['subtype']]; ? >"
			endforeach;
		?>
		</ul>
	</section>

<?php
		endif;
	endwhile;
?>
</section>
<?php
else:
	echo "Block bearbeiten um Verlinkungen hinzuzufügen";
endif;
?>
