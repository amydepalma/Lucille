<?php
extract(wp_parse_args($args, [
  'post' => $post,
  'text_color' => null,
  'show_button' => true,
  'button_text' => 'Read More',
  'show_cats' => false,
  'class_name' => null,
]));

$class = implode(" ", array_filter([
  'h-100',
	'd-flex',
	'flex-column',
  $class_name
]));
$atts = array_filter(["class" => $class]);
$att_string = implode(" ", array_map(function ($key, $value) {
  return "$key='$value'";
}, array_keys($atts), $atts));

$post = is_array($post) ? array_pop($post) : $post;
$post_type = get_post_type();
$cat_taxonomy = 'category';

?>

<?php if (!empty($post)) : ?>
<article <?= $att_string ?>>
	<figure class="wp-block-post-featured-image mb-0">
		<a href="<?= get_permalink($post) ?>" target="_self">
			<?php if (!empty(get_the_post_thumbnail($post))) : ?>
			<?= get_the_post_thumbnail($post, 'large', ['class' => 'wp-post-image']) ?>
			<?php else: ?>
			<img src="<?= asset_path('images/post-fallback.png') ?>" alt="Featured Image for <?= $post->post_title ?>" class="wp-post-image">
			<?php endif; ?>
		</a>
	</figure>

	<?php
      get_template_part("templates/parts/card-body", null, [
        'text_color' => $text_color,
        'show_button' => $show_button,
        'button_text' => $button_text,
        'show_cats' => $show_cats,
        'cat_taxonomy' => $cat_taxonomy
      ]);
    ?>
</article>
<?php endif; ?>