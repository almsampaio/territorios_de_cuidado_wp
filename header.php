<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package territorios_de_cuidado
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/global.css" id="stylesheet">
	<!-- Favicon -->
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/brand/favicon.png" type="image/png">
	<!-- Font Awesome 5 -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/libs/@fortawesome/fontawesome-free/css/all.min.css"><!-- Page CSS -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/libs/animate.css/animate.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/libs/swiper/dist/css/swiper.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.css">
	<!-- Purpose CSS -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/purpose.css" id="stylesheet">
	<!-- LILITA ONE FONT -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">

	<link href="<?php echo get_template_directory_uri(); ?>/assets/libs/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

	<?php wp_head(); ?>

	<style>
		@font-face {
			font-family: 'Gotham';
			src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/Gotham Fonts Family/Gotham-Book.otf');
		}
		@font-face {
			font-family: 'Gotham';
			font-style: italic;
			src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/Gotham Fonts Family/Gotham-BookItalic.otf');
		}
		@font-face {
			font-family: 'Gotham';
			font-weight: 500;
			src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/Gotham Fonts Family/Gotham-Medium.otf');
		}
		@font-face {
			font-family: 'Gotham';
			font-weight: 700;
			src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/Gotham Fonts Family/GOTHAM-BOLD.TTF');
		}
		@font-face {
			font-family: 'Gotham';
			font-weight: 900;
			src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/Gotham Fonts Family/GOTHAM-ULTRA.TTF');
		}
	</style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'territorios_de_cuidado' ); ?></a>

	<header>
		<nav class="navbar navbar-horizontal navbar-expand-lg navbar-dark bg-primary">
			<div class="container ">
					<a class="navbar-brand pt-0 pb-2" href="/" style="max-width: 50%;">
						<img alt="Logo Territórios de Cuidado" class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/logo.svg">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbar-primary">
							<ul class="navbar-nav ml-lg-auto">
								<div class="navbar-nav">
									<li class="nav-item">
										<a class="nav-link" href="/projeto">O Projeto</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="/cursos">Cursos</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="/territorios">Territórios</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="/agenda">Agenda</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="/noticias">Notícias</a>
									</li>
								</div>

								<li class="nav-item">
									<button type="button" class="btn btn-warning py-0 px-4 rounded-pill">
										<a class="nav-link text-uppercase" href="#contato">Contato</a>
									</button>
								</li>
							</ul>
							
					</div>
			</div>
		</nav>
	</header>


