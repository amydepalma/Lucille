<?php

function locate_custom_block($block_name, $args = [])
{
  	$template_path = "blocks/$block_name/$block_name.php";
  	if (empty(locate_template($template_path, true, false, $args)) && current_user_can('edit_post', $args['post_id'])) :
    	echo "<p>Unable to locate template at: <code>$template_path</code></p>";
  	endif;
}

function render_custom_block($block, $content = '', $is_preview = false, $post_id = 0)
{
  	$block_name = str_replace("acf/", "", $block["name"]);
  	$fields = get_fields() ?: [];
  	$is_jsx = !empty($block["supports"]["jsx"]);
  	$class_name = !empty($block['className']) ? $block['className'] : '';
  	$InnerBlocks = !empty($block["InnerBlocks"]) ? $block["InnerBlocks"] : "<InnerBlocks />";
	$block_id = !empty($block["anchor"]) ? $block["anchor"] : ($block["id"] ?: '');
	$text_color_class = !empty($block['textColor']) ? 'has-' . $block['textColor'] . '-color' : '';
	$background_color_class = !empty($block['backgroundColor']) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
	$background_color_class = !empty($block['gradient']) ? 'has-' . $block['gradient'] . '-gradient-background' : $background_color_class;
	$style = get_block_styles($block);

  	$args = array_filter(array_merge([
    	"block" => $block,
    	"class_name" => $class_name . ' ' . $text_color_class . ' ' . $background_color_class,
    	"content" => $is_jsx && $is_preview ? $InnerBlocks : $content,
    	"id" => $block_id,
    	"is_preview" => $is_preview,
    	"post_id" => $post_id,
		"style" => $style
  	], $fields), function ($value) {
    	return $value !== null && $value !== '';
  	});

  	locate_custom_block($block_name, $args);
};

// auto register custom blocks within blocks directory
add_action('acf/init', function () {
	foreach (glob(get_stylesheet_directory() . '/blocks/*/') as $block_dir) {
		$block_name = basename($block_dir);
		$block_json = $block_dir . 'block.json';
		$block_dist_path = trailingslashit(get_stylesheet_directory() . '/dist/blocks/' . $block_name);
		$block_dist_uri = trailingslashit(get_template_directory_uri() . '/dist/blocks/' . $block_name);

		if (file_exists($block_json)) {
			register_block_type($block_json, array('render_callback' => 'render_custom_block'));
		}

		if (file_exists($block_dist_path . $block_name . '.js')) {
			wp_register_script($block_name, $block_dist_uri . $block_name . '.js', array('acf'), filemtime($block_dist_path . $block_name . '.js'), false);
		}

		if (file_exists($block_dist_path . $block_name . '.css')) {
			wp_register_style($block_name, $block_dist_uri . $block_name . '.css', array(), filemtime($block_dist_path . $block_name . '.css'), false);
		}
	}
});

// auto register custom block acf fields if they exist within block directories
foreach (glob(get_stylesheet_directory() . '/blocks/*/') as $block_dir) {
	add_filter(
		'acf/settings/load_json',
		function ($paths) use ($block_dir) {
			$paths[] = $block_dir;
			return $paths;
		}
	);
}
