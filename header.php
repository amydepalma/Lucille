<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head prefix="og: http://ogp.me/ns#">
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="apple-mobile-web-app-status-bar-style" content="default">
		<!-- TODO MAKE THIS BETTER INCLUDED  VIA SELF-HOSTING-->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,300&display=swap" rel="stylesheet">
		<?php wp_head() ?>
	</head>

	<body <?php body_class(); ?>>
		<a class="visually-hidden-focusable" id="skip-to-content" href="#content">Skip to main content</a>

		<?php wp_body_open() ?>

		<header class="top">
			<nav>
				Nav
				<?php
						wp_nav_menu([
							'theme_location'  => 'primary_nav',
							'menu_class'      => 'list-unstyled'
						]);
					?>
			</nav>
		</header>