<?php

extract(wp_parse_args($args, [
	"post" => $post,
	"block" => null,
	"is_preview" => null,
	"class_name" => null,
	"style" => ''
]));

$class = implode(" ", array_filter([
	"example-block",
	$class_name
]));

$style = get_block_styles($block);

$atts = array_filter(["class" => $class, "id" => $id, "style" => $style]);
$att_string = implode(" ", array_map(function ($key, $value) {
	return "$key='$value'";
}, array_keys($atts), $atts));

?>
<div <?= $att_string; ?>>
	<h1>Example Block</h1>
</div>