<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/7d95682cb8.js" crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>

<?php
$navbar_scheme   = get_theme_mod('navbar_scheme', 'navbar-light bg-light'); // Get custom meta-value.
$navbar_position = get_theme_mod('navbar_position', 'static'); // Get custom meta-value.

$search_enabled  = get_theme_mod('search_enabled', '1'); // Get custom meta-value.

$top_header_color = carbon_get_theme_option('top_bar_color'); // Get custom meta-value.
$top_header_title = carbon_get_theme_option('header_title'); // Get custom meta-value.

$icons_color = carbon_get_theme_option('social_icons_color'); // Get custom meta-value.

$icons = array(
	'facebook' => array(
		'url' => carbon_get_theme_option('crb_network_facebook'),
		'icon' => 'fab fa-facebook-f',
	),
	'instagram' => array(
		'url' => carbon_get_theme_option('crb_network_instagram'),
		'icon' => 'fab fa-instagram',
	),
	'linkedin' => array(
		'url' => carbon_get_theme_option('crb_network_linkedin'),
		'icon' => 'fab fa-linkedin-in',
	),
);
?>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<a href="#main" class="visually-hidden-focusable"><?php esc_html_e('Skip to main content', 'studio-visual-teste'); ?></a>

	<header>
		<div class="top-menu bg-<?= $top_header_color; ?> p-3">
			<div class="container">
				<div class="row align-items-center justify-content-md-between text-center text-md-start">
					<div class="col-md-8">
						<div class="top-menu-left">
							<span><?= $top_header_title; ?></span>
						</div>
					</div>
					<div class="col-md-auto">
						<div class="top-menu-right">
							<ul class="list-inline m-0">
								<?php
								foreach ($icons as $network_social => $url) {
									if ($url['url']) : ?>
										<li class="list-inline-item">
											<a class="text-<?= $icons_color; ?>" href="<?= $url['url']; ?>" target="_blank" rel="noopener noreferrer">
												<i class="<?= $url['icon']; ?>"></i>
											</a>
										</li>
								<?php endif;
								} ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<nav id="header" class="navbar navbar-expand-md <?php echo esc_attr($navbar_scheme);
																										if (isset($navbar_position) && 'fixed_top' === $navbar_position) : echo ' fixed-top';
																										elseif (isset($navbar_position) && 'fixed_bottom' === $navbar_position) : echo ' fixed-bottom';
																										endif;
																										if (is_home() || is_front_page()) : echo ' home';
																										endif; ?>">
			<div class="container">
				<a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
					<?php
					$header_logo = get_theme_mod('header_logo'); // Get custom meta-value.

					if (!empty($header_logo)) :
					?>
						<img src="<?php echo esc_url($header_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
					<?php
					else :
						echo esc_attr(get_bloginfo('name', 'display'));
					endif;
					?>
				</a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'studio-visual-teste'); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div id="navbar" class="collapse navbar-collapse">
					<?php
					// Loading WordPress Custom Menu (theme_location).
					wp_nav_menu(
						array(
							'theme_location' => 'main-menu',
							'container'      => '',
							'menu_class'     => 'navbar-nav me-auto',
							'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
							'walker'         => new WP_Bootstrap_Navwalker(),
						)
					);

					if ('1' === $search_enabled) :
					?>
						<form class="search-form my-2 my-lg-0" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
							<div class="input-group">
								<input type="text" name="s" class="form-control" placeholder="<?php esc_attr_e('Search', 'studio-visual-teste'); ?>" title="<?php esc_attr_e('Search', 'studio-visual-teste'); ?>" />
								<button type="submit" name="submit" class="btn btn-outline-secondary"><?php esc_html_e('Search', 'studio-visual-teste'); ?></button>
							</div>
						</form>
					<?php
					endif;
					?>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container -->
		</nav><!-- /#header -->
	</header>

	<main id="main" class="container" <?php if (isset($navbar_position) && 'fixed_top' === $navbar_position) : echo ' style="padding-top: 100px;"';
																		elseif (isset($navbar_position) && 'fixed_bottom' === $navbar_position) : echo ' style="padding-bottom: 100px;"';
																		endif; ?>>