<?php
/**
 * @package territorios_de_cuidado
 */

get_header(); 
?>
<style>
  .row-gap {
    row-gap: 16px;
  }

  .card-partner {
    height: 100%;
    
    & > div {
      display: flex;
      align-items: center;
      justify-content: center;
    }
  }
</style>
<?php
  $total_territorios = get_theme_mod('impacto_territorios');
  $total_mobilizadas = get_theme_mod('impacto_pessoas_mobilizadas');
  $total_alcancadas = get_theme_mod('impacto_pessoas_alcancadas');
  $total_ciclos = get_theme_mod('impacto_ciclos_formacao');
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
                  <a href="projeto" class="btn btn-outline-white rounded-pill hover-translate-y-n3 btn-icon d-none d-xl-inline-block scroll-me">
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
        <a href="cursos">
          <button class="btn btn-white rounded-pill" style="color: #469B49;">Ver conteúdos</button>
        </a>
      </div>

      <div class="bold-card" style="background-color: #EAB236;">
        <span>Conheça os 15 territórios de <br />cuidado</span>
        <a href="territorios">
          <button class="btn btn-white rounded-pill" style="color: #EAB236;">Ver no mapa</button>
        </a>
      </div>
    </section>

    <section class="slice slice-lg">
        <div class="container">
            <div class="mb-4">
                <h3 class="heading h3 text-primary text-uppercase mb-0" style="font-family: 'Lilita One', sans-serif;">Próximos eventos</h3>
            </div>
            <div class="row row-grid">

                <?php
                // =======================================================
                // INÍCIO DO LOOP DINÂMICO DOS EVENTOS
                // =======================================================
                $hoje = date('Ymd');

                $args_eventos = array(
                    'post_type'      => 'evento',
                    'posts_per_page' => 4, // AQUI ESTÁ A MUDANÇA: Buscar apenas 4 eventos
                    'meta_key'       => 'evento_data_inicio',
                    'orderby'        => 'meta_value_num',
                    'order'          => 'ASC', // Mais próximos primeiro
                    'meta_query'     => array(
                        array(
                            'key'     => 'evento_data_inicio',
                            'value'   => $hoje,
                            'compare' => '>=', // Apenas eventos futuros
                        ),
                    ),
                );

                $eventos_query = new WP_Query( $args_eventos );

                if ( $eventos_query->have_posts() ) :
                    while ( $eventos_query->have_posts() ) : $eventos_query->the_post();

                        // Pega a data e a formata para Dia e Mês
                        $data_obj = DateTime::createFromFormat('Ymd', get_field('evento_data_inicio'));
                        $timestamp_evento = $data_obj ? $data_obj->getTimestamp() : 0;
                        
                        $dia_evento = $timestamp_evento ? wp_date('d', $timestamp_evento) : '';
                        $mes_evento = $timestamp_evento ? wp_date('F', $timestamp_evento) : ''; // 'F' para o nome completo do mês
                        
                        // Pega o endereço
                        $endereco = get_field('evento_endereco');
                ?>

                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <span class="d-block text-center text-uppercase text-nowrap text-warning"><?php echo esc_html($mes_evento); ?></span>
                                    <span class="d-block text-center h1 mb-0" style="font-family: 'Oswald', sans-serif;"><?php echo esc_html($dia_evento); ?></span>
                                </div>
                                <div class="col-md-10 text-center text-md-left">
                                    <a href="<?php the_permalink(); ?>">
                                        <h3 class="h5 mb-0 text-primary"><?php the_title(); ?></h3>
                                    </a>
                                    <?php if ($endereco) : ?>
                                        <p class="mb-0 leading-none"><?php echo esc_html($endereco); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                    endwhile;
                    wp_reset_postdata(); // Restaura os dados do post original
                else :
                    echo '<div class="col-12"><p>Nenhum evento futuro agendado no momento.</p></div>';
                endif;
                // =======================================================
                // FIM DO LOOP
                // =======================================================
                ?>

            </div>
        </div>
    </section>

    <section class="container base-section">
      <h3>Números do projeto</h3>        
      <div class="position-relative">
        <div class="row">
          <?php if ($total_territorios) : ?>
              <div class="col-lg-3 col-6 mb-5 mb-lg-0">
                  <div class="text-center">
                      <div class="h1 text-primary">
                          <?php if ($total_territorios < 1000) : ?>
                              <span class="counter" data-from="0" data-to="<?php echo esc_attr($total_territorios); ?>" data-speed="3000" data-refresh-interval="100"></span>
                          <?php else : 
                              $valor_mil = floor($total_territorios / 1000);
                          ?>
                              <span class="counter-extra">+</span>
                              <span class="counter" data-from="0" data-to="<?php echo esc_attr($valor_mil); ?>" data-speed="3000" data-refresh-interval="100"></span>
                              <span class="counter-extra">mil</span>
                          <?php endif; ?>
                      </div>
                      <h3 class="h6 text-capitalize">Territórios de Cuidado em todas as regiões do Brasil</h3>
                  </div>
              </div>
          <?php endif; ?>

          <?php if ($total_mobilizadas) : ?>
              <div class="col-lg-3 col-6 mb-5 mb-lg-0">
                  <div class="text-center">
                      <div class="h1 text-primary">
                          <?php if ($total_mobilizadas < 1000) : ?>
                              <span class="counter" data-from="0" data-to="<?php echo esc_attr($total_mobilizadas); ?>" data-speed="3000" data-refresh-interval="100"></span>
                          <?php else : 
                              $valor_mil = floor($total_mobilizadas / 1000);
                          ?>
                              <span class="counter-extra">+</span>
                              <span class="counter" data-from="0" data-to="<?php echo esc_attr($valor_mil); ?>" data-speed="3000" data-refresh-interval="100"></span>
                              <span class="counter-extra">mil</span>
                          <?php endif; ?>
                      </div>
                      <h3 class="h6 text-capitalize">Pessoas mobilizadas diretamente</h3>
                  </div>
              </div>
          <?php endif; ?>

          <?php if ($total_alcancadas) : ?>
              <div class="col-lg-3 col-6">
                  <div class="text-center">
                      <div class="h1 text-primary">
                          <?php if ($total_alcancadas < 1000) : ?>
                              <span class="counter" data-from="0" data-to="<?php echo esc_attr($total_alcancadas); ?>" data-speed="3000" data-refresh-interval="100"></span>
                          <?php else : 
                              $valor_mil = floor($total_alcancadas / 1000);
                          ?>
                              <span class="counter-extra">+</span>
                              <span class="counter" data-from="0" data-to="<?php echo esc_attr($valor_mil); ?>" data-speed="3000" data-refresh-interval="100"></span>
                              <span class="counter-extra">mil</span>
                          <?php endif; ?>
                      </div>
                      <h3 class="h6 text-capitalize">Alcançadas mobilizadas diretamente</h3>
                  </div>
              </div>
          <?php endif; ?>

          <?php if ($total_ciclos) : ?>
              <div class="col-lg-3 col-6">
                  <div class="text-center">
                      <div class="h1 text-primary">
                          <?php if ($total_ciclos < 1000) : ?>
                              <span class="counter" data-from="0" data-to="<?php echo esc_attr($total_ciclos); ?>" data-speed="3000" data-refresh-interval="100"></span>
                          <?php else : 
                              $valor_mil = floor($total_ciclos / 1000);
                          ?>
                              <span class="counter-extra">+</span>
                              <span class="counter" data-from="0" data-to="<?php echo esc_attr($valor_mil); ?>" data-speed="3000" data-refresh-interval="100"></span>
                              <span class="counter-extra">mil</span>
                          <?php endif; ?>
                      </div>
                      <h3 class="h6 text-capitalize">Ciclos de formação previstos</h3>
                  </div>
              </div>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <section class="container base-section">
      <h3>Parceiros</h3>
      <span>Contamos com o apoio de movimentos sociais, universidades, secretarias estaduais e municipais, além de lideranças comunitárias e organizações locais.</span>   
      
      <div class="row row-gap">
        <?php
        // Inicia a busca personalizada por posts do tipo 'parceiro'
        $args_parceiros = array(
            'post_type'      => 'parceiro',
            'posts_per_page' => -1,       // -1 para buscar todos
            'orderby'        => 'title',    // Ordenar pelo nome em ordem alfabética
            'order'          => 'ASC',
        );
        $parceiros_query = new WP_Query( $args_parceiros );

        // Verifica se encontrou algum parceiro
        if ( $parceiros_query->have_posts() ) :
            // Inicia o loop para exibir cada parceiro
            while ( $parceiros_query->have_posts() ) : $parceiros_query->the_post();
        ?>

            <div class="col-lg-3">
              <div class="card-partner card border text-center py-4 hover-translate-y-n10 hover-shadow-lg">
                <div class="card-body flex">
                  <?php
                    // Verifica se o parceiro tem uma Imagem Destacada (logo)
                    if ( has_post_thumbnail() ) {
                        // Pega a URL da imagem no tamanho 'medium'
                        $logo_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                        // Pega o título do post (nome do parceiro) para usar no 'alt'
                        $logo_alt = get_the_title();
                  ?>
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($logo_alt); ?>">
                  <?php
                    } // Fim do if has_post_thumbnail
                  ?>
                </div>
              </div>
            </div>
            <?php
            endwhile; // Fim do loop
            wp_reset_postdata(); // Restaura os dados originais da página
        endif; // Fim da verificação if
        ?>
      </div>
    </section>

  </main>

<?php
get_footer();