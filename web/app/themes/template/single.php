<?php get_header(); ?>

<?php
	while ( have_posts() ) :
		the_post();
?>
<section class="container">
	<div class="row justify-content-center">
		<header class="col-lg-8 text-center">
			<h2><?php the_title(); ?></h2>
			<small><?php the_date(); ?></small>
		</header>
	</div>
	<div class="row gutenberg">
		<div class="col-12">
			<?php the_content(); ?>
		</div>
	</div>
</section>
<?php endwhile; ?>

<?php get_footer();
