<?php
/**
 * @package territorios_de_cuidado
 */
get_header(); 
?>
<style>
  .page-header-container {
    position: relative;
    min-height: 200px;
  }

  .green-border {
    background-color: #E5EEFF;
    position: absolute;
    bottom: 0;
    z-index: -1;
    height: 100%;
    width: 100%;
    border-bottom: 1.25rem solid #469B49;
  }

  .page-header {
    position: relative;

    & > h1 {
      padding: 4rem 0;
      margin: 0;
      font-family: 'Lilita One', sans-serif;
      font-size: 48px;
    }
  }

  .page-header-img {
    position: absolute;
    width: 100%;
    height: auto;
    bottom: -10px;
    right: 0;
  }
</style>

    <!-- HEADER TITLE START  -->
    <div class="page-header-container">
      <div class="container page-header">
        <h1 class="text-primary">O Projeto</h1>
        
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/projeto-header-img.svg" class="page-header-img d-none d-md-block" alt="">
      </div>
      
      <div class="green-border"></div>
    </div>
    <!-- HEADER TITLE END -->

    <div id="headers-team" title="headers/team.html">
      <section class="slice slice-lg bg-primary overflow-hidden">
        <!-- Container -->
        <div class="container d-flex align-items-center justify-content-center">
          <div class="col">
            <div class="container">
              <div class="row row-grid">
                <div class="col-lg-6 pt-3 pt-lg-6">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand/logo-short.svg" alt="Logo">
                </div>
                <div class="col-lg-6">
                  <p class="text-white" style="font-family: 'Gotham', sans-serif;">O projeto Territórios Saudáveis e Sustentáveis na Promoção do Cuidado, ou simplesmente Territórios de Cuidado, é uma parceria entre a Fiocruz e o Ministério da Saúde. <br /><br />
                    Nosso objetivo é somar forças com quem vive e atua em territórios fora dos grandes centros urbanos, especialmente em comunidades que enfrentam situações de vulnerabilidade social e ambiental. Promovemos ações que unem saúde, meio ambiente, cultura e participação social, sempre valorizando os saberes locais e o protagonismo das pessoas.
                    </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

   

    <!-- MAIN CONTENT START -->
    <main>
      <section class="container base-section pt-4">
        <h3>O que fazemos?</h3>
        <div class="row justify-content-center">
          <div class="col-md-4 col-lg-4">
            <div class="card hover-shadow-lg hover-translate-y-n10 h-100">
              <div class="px-5 py-5">
                <h5 class="text-primary">Formação-ação</h5>
                <p class=" mt-2 mb-0">Oferecemos oficinas e cursos voltados para lideranças comunitárias, integrantes de conselhos de direitos e movimentos sociais.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-lg-4">
            <div class="card hover-shadow-lg hover-translate-y-n10 h-100">
              <div class="px-5 py-5">
                <h5 class="text-primary">Comunicação social</h5>
                <p class=" mt-2 mb-0">Produzimos conteúdos pedagógicos e informativos — como vídeos, podcasts, cartilhas e postagens digitais — que ajudam a divulgar boas práticas e ampliar o debate sobre saúde, cuidado e equidade.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-lg-4">
            <div class="card hover-shadow-lg hover-translate-y-n10 h-100">
              <div class="px-5 py-5">
                <h5 class="text-primary">Rede sociotécnica</h5>
                <p class=" mt-2 mb-0">Estamos construindo uma plataforma virtual colaborativa que vai conectar pessoas, territórios e saberes. Nela será possível acessar dados, compartilhar experiências e encontrar ferramentas úteis para mobilização e promoção da saúde.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section>
        <div class="container pb-4">
          <div class="mb-5 text-center">
            <h3 class="mt-4 text-primary" style="font-family: 'Lilita One', sans-serif;">Como atuamos</h3>
            <div class="fluid-paragraph mt-3">
              <p class="lead lh-180">Nossas ações envolvem diferentes áreas ao mesmo tempo <br/> — como saúde, educação, assistência social, meio ambiente e cultura.</p>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
              <div class="card bg-primary hover-shadow-lg hover-translate-y-n10 h-100">
                <div class="px-5 py-5">
                  <h5 class="mb-3 text-white" style="font-family: 'Lilita One', sans-serif;">Nossos objetivos</h5>
                  <ul>
                    <li class="text-white">Promover o cuidado como prática coletiva.</li>
                    <li class="text-white">Fortalecer a promoção da saúde com equidade e justiça social.</li>
                    <li class="text-white">Valorizar os saberes populares e as experiências construídas nas comunidades.</li>
                    <li class="text-white">Ampliar redes de colaboração entre diferentes áreas e grupos sociais.</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card hover-shadow-lg hover-translate-y-n10 h-100" style="background-color: #7AA2EF;">
                <div class="px-5 py-5">
                  <h5 class="text-white" style="font-family: 'Lilita One', sans-serif;">Metas</h5>
                  <ul>
                    <li class="text-white">Atuar nas 27 unidades da federação</li>
                    <li class="text-white">Mobilizar e formar mais de 9 mil pessoas diretamente</li>
                    <li class="text-white">Alcançar mais de 100 mil pessoas por meio das nossas ações de comunicação</li>
                  </ul>
                </div>
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
    <!-- MAIN CONTENT END -->


<?php
get_footer();
