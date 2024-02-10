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
					$output = '<div class="wp-block-post-terms">';
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