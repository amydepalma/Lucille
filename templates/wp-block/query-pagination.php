<?php
  $args_defaults = array(
    'aria_label' => 'Results',
    'heading' => 'Results navigation'
  );
  $args = wp_parse_args($args, $args_defaults);
  $current_page = $paged ?: 1;
  $total_pages = $wp_query->max_num_pages;
?>

<?php if ($total_pages > 1): ?>

<nav class="wp-block-query-pagination" role="navigation" aria-label="<?= $args['aria_label'] ?>">

	<?php if ($paged > 1): ?>
	<a href="<?php previous_posts() ?>" class="wp-block-query-pagination-previous">
		<span class="wp-block-query-pagination-previous-arrow"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
				<path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z" fill="currentColor" />
			</svg></span>
	</a>
	<?php endif; ?>


	<div class="wp-block-query-pagination-numbers">
		<?php
        echo paginate_links( array(
          'prev_next' => false,
          'mid_size'  => 2,
          'end_size'  => 1,
          'format' => '?paged=%#%',
          'current' => $current_page,
          'total' => $total_pages,
        ));
      ?>
	</div>
	<?php if ($paged != $total_pages): ?>
	<a href="<?php next_posts() ?>" class="wp-block-query-pagination-next">
		<span class="wp-block-query-pagination-next-arrow"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
				<path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z" fill="currentColor" />
			</svg></span>
	</a>
	<?php endif; ?>

</nav>
<?php endif ?>