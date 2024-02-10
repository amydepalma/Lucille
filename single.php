<?php

/**
 * Default Singleton Template
 */

get_header();

?>

<main id="page">
	<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'templates/content/' . get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'lucille' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'lucille' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

		endwhile;
		?>
</main>

<?php get_footer(); ?>