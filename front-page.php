<?php
/**
 * @package territorios_de_cuidado
 */

get_header(); 
?>


  <div class="hero">
    <section class="header-1 section-rotate bg-section-secondary" data-offset-top="#header-main">
      <div class="section-inner bg-primary py-2"></div>
      <!-- SVG illustration 1 -->
      <div class="pt-7 position-absolute middle right-0 col-lg-7 col-xl-6 d-none d-lg-block">
        <figure class="w-100" style="max-width: 500px;">
          <img alt="Image placeholder" src="<?php echo get_template_directory_uri(); ?>/assets/img/backgrounds/hero.svg" class="svg-inject img-fluid">
        </figure>
      </div>
      <!-- SVG illustration 2 -->
      <div class="hero-bg">
        <figure class="w-100" style="max-width: 500px;">
          <img alt="Image placeholder" src="<?php echo get_template_directory_uri(); ?>/assets/img/backgrounds/hero-bg.svg" class="svg-inject img-fluid">
        </figure>
      </div>
      <!-- Hero container -->
      <div class="container py-5 pt-lg-6 d-flex align-items-center position-relative zindex-100">
        <div class="col">
          <div class="row">
            <div class="col-lg-5 col-xl-6 text-center text-lg-left">
              <div>
                <h2 class="text-white mb-4">
                  <span class="display-6" style="font-family: Lilita One, sans-serif;">Saúde, Sustentabilidade <br /> e Saberes Locais</span>
                </h2>
                <p class="lead text-white" style="font-family: 'Gotham', sans-serif;">Saiba como o projeto esta promovendo cuidado, <br /> saúde e equidade nos territórios brasileiros</p>
                <div class="mt-5" style="display: flex;">
                  <a href="#sct-page-examples" class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon p-0 scroll-me" style="width: 48px; height: 48px; display: flex; justify-content: center; align-items: center; position: relative;">
                    <span class="btn-inner--icon" style="position: absolute; transform: translate(2px, 0);"><i class="fa fa-play"></i></span>
                  </a>
                  <a href="/page-projeto.html" class="btn btn-outline-white rounded-pill hover-translate-y-n3 btn-icon d-none d-xl-inline-block scroll-me">
                    <span class="btn-inner--icon"><i class="fas fa-file-alt"></i></span>
                    <span class="btn-inner--text">Ler mais</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <main>
    <section class="container bold-cards-section">
      <div class="bold-card" style="background-color: #026FC2;">
        <span>Inscreva-se na formação</span>
        <button class="btn btn-white rounded-pill" style="color: #026FC2;">Quero me inscrever</button>
      </div>

      <div class="bold-card" style="background-color: #469B49;">
        <span>Acesse nossos materiais <br /> pedagógicos</span>
        <button class="btn btn-white rounded-pill" style="color: #469B49;">Ver conteúdos</button>
      </div>

      <div class="bold-card" style="background-color: #EAB236;">
        <span>Conheça os 15 territórios de <br />cuidado</span>
        <button class="btn btn-white rounded-pill" style="color: #EAB236;">Ver no mapa</button>
      </div>
    </section>

    <section class="slice slice-lg">
      <div class="container">
        <div class="mb-4">
          <h3 class="heading h3 text-primary text-uppercase mb-0" style="font-family: 'Lilita One', sans-serif;">Próximos eventos</h3>
        </div>
        <div class="row row-grid">
          <div class="col-lg-6">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-2">
                    <span class="d-block text-center text-uppercase text-nowrap text-warning">Agosto</span>
                    <span class="d-block text-center h1 mb-0" style="font-family: 'Oswald', sans-serif;">03</span>
                  </div>
                  <div class="col-md-10 text-center text-md-left">
                    <h3 class="h5 mb-0 text-primary">Workshop FioCruz Brasília</h3>
                    <p class="mb-0 leading-none">Avenida L3 Norte, s/n, Campus Universitário Darcy Ribeiro, Gleba A, Brasília</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-2">
                    <span class="d-block text-center text-uppercase text-nowrap text-warning">Agosto</span>
                    <span class="d-block text-center h1 mb-0" style="font-family: 'Oswald', sans-serif;">03</span>
                  </div>
                  <div class="col-md-10 text-center text-md-left">
                    <h3 class="h5 mb-0 text-primary">Workshop FioCruz Brasília</h3>
                    <p class="mb-0 leading-none">Avenida L3 Norte, s/n, Campus Universitário Darcy Ribeiro, Gleba A, Brasília</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-2">
                    <span class="d-block text-center text-uppercase text-nowrap text-warning">Agosto</span>
                    <span class="d-block text-center h1 mb-0" style="font-family: 'Oswald', sans-serif;">03</span>
                  </div>
                  <div class="col-md-10 text-center text-md-left">
                    <h3 class="h5 mb-0 text-primary">Workshop FioCruz Brasília</h3>
                    <p class="mb-0 leading-none">Avenida L3 Norte, s/n, Campus Universitário Darcy Ribeiro, Gleba A, Brasília</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="container base-section">
      <h3>Números do projeto</h3>        
      <div class="position-relative">
        <div class="row">
          <div class="col-lg-3 col-6 mb-5 mb-lg-0">
            <div class="text-center">
              <div class="h1 text-primary">
                <span class="counter" data-from="0" data-to="15" data-speed="3000" data-refresh-interval="100"></span>
              </div>
              <h3 class="h6 text-capitalize">Territórios  de Cuidado em todas as regiões do Brasil</h3>
            </div>
          </div>
          <div class="col-lg-3 col-6 mb-5 mb-lg-0">
            <div class="text-center">
              <div class="h1 text-primary">
                <span class="counter-extra">+</span>
                <span class="counter" data-from="0" data-to="9" data-speed="3000" data-refresh-interval="100"></span>
                <span class="counter-extra">mil</span>
              </div>
              <h3 class="h6 text-capitalize">Pessoas mobilizadas diretamente</h3>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="text-center">
              <div class="h1 text-primary">
                <span class="counter-extra">+</span>
                <span class="counter" data-from="0" data-to="100" data-speed="3000" data-refresh-interval="100"></span>
                <span class="counter-extra">mil</span>
              </div>
              <h3 class="h6 text-capitalize">Alcançadas mobilizadas diretamente</h3>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="text-center">
              <div class="h1 text-primary">
                <span class="counter-extra">+</span>
                <span class="counter" data-from="0" data-to="3" data-speed="3000" data-refresh-interval="100"></span>
              </div>
              <h3 class="h6 text-capitalize">Ciclos de formação previstos</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="container base-section">
      <h3>Parceiros</h3>
      <span>Contamos com o apoio de movimentos sociais, universidades, secretarias estaduais e municipais, além de lideranças comunitárias e organizações locais.</span>   
      <div class="row">
        <div class="col-lg-3">
          <div class="card border text-center py-4 hover-translate-y-n10 hover-shadow-lg">
            <div class="card-body flex">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/clients/fiocruz.svg" alt="FioCruz">
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card border text-center py-4 hover-translate-y-n10 hover-shadow-lg">
            <div class="card-body">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/clients/brasil-bem-cuidado.svg" alt="Brasil Bem Cuidado">
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card border text-center py-4 hover-translate-y-n10 hover-shadow-lg">
            <div class="card-body">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/clients/sus.svg" alt="SUS">
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card border text-center py-4 hover-translate-y-n10 hover-shadow-lg">
            <div class="card-body">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/clients/gov.svg" alt="Ministério da Saúde">
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

<?php
get_footer();