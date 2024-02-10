<?php
	/**
	 * The template for displaying all pages
	 */

	get_header();
?>

<main id="page">

	<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'templates/content/page' );

		endwhile; // End of the loop.
		?>

</main>

<?php get_footer() ?>