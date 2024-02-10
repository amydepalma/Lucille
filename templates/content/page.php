<?php
/**
 * Template part for displaying page content in page.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="wrapper">
		<?php the_title( '<h1 class="fs-super">', '</h1>' ); ?>
	</header>

	<?php ald_post_thumbnail(); ?>

	<div class="block-grid">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lucille' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>
</article>