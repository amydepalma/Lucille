<?php
/**
 * Template part for displaying default posts
 */

	$related_posts = get_posts(array(
		'numberposts' => 3,
		'orderby' => 'date',
		'post_type' => get_post_type(),
		'category' => wp_get_post_categories(get_the_ID()),
		'post_status' => 'publish',
		'exclude' => get_the_ID(),
	));
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="article-grid wrapper">
		<header class="article-grid__title pt-6">
			<?php if (!empty(get_the_terms($post->ID, 'category'))): ?>
			<div class="mb-4">
				<?php get_template_part('templates/wp-block/post-terms', null, ['taxonomy' => 'category', 'post' => $post]); ?>
			</div>
			<?php endif; ?>

			<div class="mw-sm">
				<?php
					if ( is_singular() ) :
						the_title( '<h1>', '</h1>' );
					else:
						the_title( '<h2 class="h1"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;
				?>
				<p class="text-xl mb-0"><?= wp_strip_all_tags( get_the_excerpt() , true ); ?></p>
			</div>

			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="post-meta">
				<?php
						ald_posted_on();
						ald_posted_by();
					?>
			</div>
			<?php endif; ?>
		</header>

		<?php if (has_post_thumbnail()): //todo pass class and elment to wrapper for better resuability?>
		<div class="article-grid__image">
			<?php ald_post_thumbnail(); ?>
		</div>
		<?php endif; ?>

		<div class="article-grid__content">
			<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'lucille' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lucille' ),
						'after'  => '</div>',
					)
				);
				?>
		</div><!-- .entry-content -->

		<aside class="article-grid__sidetop">
			<p class="fw-bold text-sm text-uppercase"><time datetime="<?= get_the_date('c'); ?>"><?= esc_html(get_the_date('M. d Y')); ?></time> &bull; [5 min read]</p>
			<?php if (!empty(get_the_terms($post->ID, 'tag'))): ?>
			<div class="mb-4">
				<?php get_template_part('templates/wp-block/post-terms', null, ['taxonomy' => 'post_tag', 'post' => $post]); ?>
			</div>
			<?php endif; ?>

			If author
		</aside>
		<footer class="article-grid__sidebottom">
			<div class="article-grid__sidebottom-inner">
				<?php ald_entry_footer(); ?>
			</div>
		</footer>
	</div>
</article>

<?php get_template_part('templates/parts/related-posts', null, ['related_posts' => $related_posts]); ?>