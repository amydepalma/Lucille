<?php
	/**
	 * Default Blog & CPT Archive template
	*/

	get_header();

  // Get information about the page query which we will leverage later for various conditions
	$q_obj = get_queried_object();
	$post_type = get_post_type();
  $page_title = get_the_title();

	$cat_taxonomy = 'category';
	$posts_page_id = get_option('page_for_posts');
	$all_link = get_permalink($posts_page_id);
	if(is_category() || is_tax()){
		$page_intro = category_description();
	}
?>

<main id="page">
	<nav class="wrapper-md">
		Breadcrumbs
	</nav>

	<section class="wrapper">
		<h1 class="mb-0"><?= $page_title ?></h1>
		<?php if (!empty($page_intro)): ?>
		<div class="mt-3 mb-0"><?= $page_intro ?></div>
		<?php elseif(!empty($q_obj->post_excerpt)): ?>
		<p class="mt-3 mb-0"><?= $q_obj->post_excerpt ?></p>
		<?php endif; ?>
	</section>

	<div class="wrapper has-green-200-background-color">
		<div>
			<h2>Featured</h2>
			<p>Category</p>
			<h2>Title</h2>
			<p>Excerpt</p>
			<p>Date</p>
		</div>
		<div>
			Last 3
		</div>
	</div>

	<section class="wrapper">
		<?php if(get_terms($cat_taxonomy)): ?>
		<div class="d-flex flex-row align-items-center flex-wrap gap-2 mt-6">
			<div class="flex-shrink-0">
				<label for="cat_select" class="text-gray-300 small mb-0 me-2">Filter by</label>
			</div>
			<div>
				<div class="d-inline-flex flex-row flex-wrap gap-2">
					<a href="<?= esc_url($all_link); ?>" class="<?= !is_category() && !is_tax() ? 'fw-bold' : '' ?>">All</a>

					<?php
									$cats = get_terms($cat_taxonomy);
									if(is_category() || is_tax()){
										$current = $q_obj->slug;
									}

									foreach($cats as $cat){
										$is_selected = '';
										if (!empty($current) && $current === $cat->slug) {
											$is_selected = ' fw-bold';
										}
										echo '<a href="' . esc_attr( get_category_link( $cat->term_id ) ) . '" class="'.$is_selected.'">' . __( $cat->name ) . '</a>';
									}
								?>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</section>

	<section class="mb-md mb-lg-lg">

		<?php if (have_posts()): ?>
		<div>
			<ul class="is-layout-flow is-flex-container columns-3 wp-block-post-template">
				<?php while (have_posts()) : the_post(); ?>
				<li class="wp-block-post">
					<?php get_template_part('templates/wp-block/post', null, ['post' => $post, 'button_text' => 'Read More', 'show_cats' => true]); ?>
				</li>
				<?php endwhile; wp_reset_postdata(); ?>
			</ul>
		</div>

		<?php if (is_paginated()) : ?>
		<?php get_template_part('templates/wp-block/query-pagination'); ?>
		<?php endif; ?>
		<?php else: ?>
		<div class="mh-50vh">
			<?php get_template_part('templates/content/none'); ?>
		</div>
		<?php endif; ?>

	</section>
</main>
<?php get_footer(); ?>