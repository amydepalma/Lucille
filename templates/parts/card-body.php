<?php
extract(
	wp_parse_args($args, [
		'text_color' => null,
		'show_button' => null,
		'button_text' => 'Read More',
		'show_cats' => true,
		'cat_taxonomy' => null,
	])
); ?>
<div class="wp-block-group card-body">
	<?php if ($show_cats): ?>
	<div class="mb-4">
		<?php get_template_part('templates/parts/wp-block-post-terms', null, ['taxonomy' => $cat_taxonomy, 'post' => $post]); ?>
	</div>
	<?php endif; ?>

	<div class="wp-block-post-date mb-2"><time datetime="<?= get_the_date('c', $post->ID) ?>"><?= get_the_date('d F Y', $post->ID) ?></time></div>

	<h3 class="wp-block-post-title mb-2">
		<a href="<?= get_permalink($post) ?>" class="text-decoration-none mb-0 <?= $text_color ? 'link-' . $text_color : 'link-gray-500' ?>">
			<?= $post->post_title ?>
		</a>
	</h3>

	<div class="wp-block-post-excerpt card-text">
		<p class="wp-block-post-excerpt__excerpt"><?= get_the_excerpt() ?></p>

		<?php if ($show_button): ?>
		<p class="wp-block-post-excerpt__more-text card-links mt-3">
			<a class="wp-block-post-excerpt__more-link" href="<?= get_permalink($post) ?>"><?= $button_text ?></a>
		</p>
		<?php endif; ?>
	</div>
</div>