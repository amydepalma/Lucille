<?php
	extract(
		wp_parse_args($args, [
			'related_posts' => null,
			'section_title' => 'Related Posts'
		])
	);
?>

<?php if (!empty($related_posts)): ?>
<section class="has-green-200-background-color">
	<div class="wrapper-lg">
		<h2><?= $section_title ?></h2>
		<ul class="columns columns-3">
			<?php foreach ($related_posts as $related): ?>
			<li class="col">
				<?php get_template_part('templates/wp-block/post', null, ['post' => $related, 'button_text' => 'Read More', 'show_cats' => true]); ?>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
<?php endif; ?>