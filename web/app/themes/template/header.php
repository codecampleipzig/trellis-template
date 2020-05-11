<?php
	$description = ( empty(get_field("meta_description")) ? get_field("meta_description",'option') : get_field("meta_description") );
	$meta = ( !empty(get_field("meta_keywords"))  ? get_field("meta_keywords") : get_field("meta_keywords",'option'));
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php echo ( get_field("noindex") === false || get_field("noindex", "option") == false  ? '<meta name="robots" content="noindex" />' :  ''); ?>
	<meta name="description" content="<?php echo $description ?>" />
	<meta name="keywords" content="<?php echo $meta ?>" />

	<!--noptimize-->
	<script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>
	<!--/noptimize-->

	<?php wp_head(); ?>

	<?php the_field('head'); ?>

</head>

<body <?php body_class(); ?>>

<div id="wrapper">

	<nav class="container py-1">
  	<div class="row justify-content-between align-content-center">
					<h1 class="col-9 col-s-7 col-md-4 col-xl-3 p-1 m-0 page-title">
					<a class="logo" href="<?php bloginfo( 'url' ); ?>">
          	<img class="logo" src="<?php the_field("logo",'option') ?>" alt="<?php bloginfo( 'name' ); ?>" />
					</a>
        </h1>

			<?php wp_nav_menu( array( 'theme_location' => 'top', 'container' => false, 'menu_class' => 'd-none d-md-flex col menu', 'depth' => 0) ); ?>

			<button id="navtoggle" class="icon-bars col-auto text-right d-md-none"></button>

  	</div>
	</nav>

	<main>
		<div id="main" class="anchor"></div>
