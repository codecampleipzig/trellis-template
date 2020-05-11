<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'blocks-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'blocks';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$blocks = get_field('blocks');

$spalten = array("col-12", "col-s-6", "col-md-4", "col-lg-3");
$gridsize = implode(" ", array_slice($spalten, 0, (get_field("spalten"))));

if ($blocks):
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> row clear">

<?php
	foreach($blocks as $i):
		$link = $i['link'];
		if ($link) {
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';
		}
		$beschreibung = $i['beschreibung'];
?>

	<div class="item <?php echo $gridsize ?>">
		<div class="thumbnails" data-flickity='{ 
				"lazyLoad": 2,
				"prevNextButtons": true,
				"autoPlay": false
			}'>
		<?php
			$bilder = $i["bilder"];
			foreach($bilder as $bild):
		?>
			<figure class="col-12">
				<?php echo $link ? '<a href="'.esc_url( $link_url ).'" target="'. esc_attr( $link_target ) .'" title="'. esc_html( $link_title ) . ' öffnen">' : '' ?>
					<img data-flickity-lazyload="<?php echo ( get_field("spalten") == 1 ) ? $bild['sizes']['slider'] : $bild['sizes']['thumbnail']; ?>" alt="<?php echo $bild['title']; ?>" />
				<?php echo $link ? '</a>' : '' ?>
			</figure>
		<?php
			endforeach;
		?>
		</div>
		<?php if ($beschreibung) { ?>
			<div class="teaser p-last-pb-0">
			<?php echo $beschreibung; ?>
			</div>
		<?php } ?>
		<div class="link-container bg-primary">
			<?php echo $i['beschriftung'] ? $i['beschriftung'] : '<a href="'. esc_url( $link_url ) .'" target="'. esc_attr( $link_target ) .'" title="'. esc_html( $link_title ) .' öffnen">'. esc_html( $link_title ) . '</a>' ?>
		</div>
	</div>

<?php
	endforeach;
?>
</div>
<?php
else:
	echo "Block bearbeiten um Verlinkungen hinzuzufügen";
endif;
?>
