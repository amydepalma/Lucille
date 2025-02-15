<?php
extract(wp_parse_args($args, [
  'post' => $post,
]));

$class = implode(" ", array_filter([
  $class_name
]));
$atts = array_filter(["class" => $class]);
$att_string = implode(" ", array_map(function ($key, $value) {
  return "$key='$value'";
}, array_keys($atts), $atts));

?>

<?php if (!empty($post)) : ?>
<article <?= $att_string ?>>
	<div class="itagp-item">
    <p class="itagp-item-title">
      <a href="<?= get_permalink($post) ?>">
        <?= $post->post_title ?>
      </a>
    </p>

    <?php if(get_categories()) :
      $args_defaults = array(
        'taxonomy' => null,
        'post' => $post,
      );
      $args = wp_parse_args($args, $args_defaults);
    ?>
    <?php
        if (!function_exists("output_categories")) {
          function output_categories($cat_tax, $post) {
            $post_categories = get_the_terms($post->ID, $cat_tax);
            $output = '';

            if (!empty($post_categories)) {
              $output = '<div class="itagp-item-terms">';
              if($cat_tax === 'post_tag') {
                $output .= '<span class="d-inline-flex">Topics:</span>';
              }
              foreach ($post_categories as $category) {
                $output .= '<a href="' . esc_attr( get_category_link( $category->term_id ) ) . '" rel="tag" class="badge badge--' . $cat_tax . '">' . __( $category->name ) . '</a>';
              }
              $output .= '</div>';
            }
            if (!empty($separator)) {
              return trim($output, $separator);
            } else {
              $separator = '/';
              return trim($output, $separator);
            }
          }
        }
      ?>
    <?= output_categories($args['taxonomy'], $args['post']); ?>
    <?php endif; ?>


    <p>
      <a href="<?= get_permalink($post) ?>"><?= $button_text ?></a>
    </p>
  </div>
</article>
<?php endif; ?>