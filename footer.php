<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package territorios_de_cuidado
 */

?>

	<footer id="contato">
		<div class="footer footer-dark bg-primary footer-bg">
			<div class="container px-4">
				<div class="row pt-md">
					<div class="col-lg-4 mb-5 mb-lg-0">
						<a href="/" class="mb-3" style="display: block;">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/logo-short.svg" alt="Footer logo" style="height: 70px;">
						</a>
						<p class="font-weight-bold" style="line-height: normal; font-size: 18px;">Saúde, Sustentabilidade <br/> e Saberes Locais em Ação</p>
					</div>
					<div class="col-lg-4 col-6 col-sm-4 mb-5 mb-lg-0">
						<h6 class="heading mb-3">Acesso rápido</h6>
						<ul class="list-unstyled" style="display: grid; grid-template-columns: 1fr 1fr;">
							<div class="">
								<li><a href="projeto">O Projeto</a></li>
								<li><a href="/page-agenda.html">Agenda</a></li>
								<li><a href="territorios">Territórios</a></li>
							</div>
							<div class="">
								<li><a href="/page-noticias.html">Notícias</a></li>
								<li><a href="/page-cursos.html">Cursos</a></li>
							</div>
						</ul>
					</div>
					<div class="col-lg-2 col-6 col-sm-4 mb-5 mb-lg-0">
						<h6 class="heading mb-3">Social</h6>
						<ul class="list-unstyled text-small">
							<li><a href="#">Instagram</a></li>
							<li><a href="#">TikTok</a></li>
						</ul>
					</div>
				</div>
				<div class="row align-items-center justify-content-md-between py-4 delimiter-top">
					<div class="col-md-6">
						<div class="copyright text-sm font-weight-bold text-center text-md-left">
							Copyright &copy; <a href="https://webpixels.io" class="font-weight-bold" target="_blank">Territórios de Cuidado</a>. Todos os direitos reservados.
						</div>
					</div>
					<div class="col-md-6">
						<ul class="nav justify-content-center justify-content-md-end mt-3 mt-md-0">
							<li class="nav-item">
								<a class="nav-link" href="https://www.instagram.com" target="_blank">
									<i class="fab fa-instagram"></i>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="https://www.tiktok.com" target="_blank">
									<i class="fab fa-tiktok"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

 	<!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/purpose.core.js"></script>
  <!-- Page JS -->
  <script src="<?php echo get_template_directory_uri(); ?>/assets/libs/swiper/dist/js/swiper.min.js"></script>
  <!-- Purpose JS -->
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/purpose.js"></script>

</html>
