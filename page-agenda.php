<?php
/**
 * @package territorios_de_cuidado
 */
get_header(); 
?>
<style>
  /* HEADER TITLE START */
  .page-header-container {
    background-color: #E5EEFF;
  }

  .page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    overflow: hidden;
    
    & > h1 {
      padding: 4rem 0;
      font-family: 'Lilita One', sans-serif;
      font-size: 48px;
    }

    & > div {
      position: absolute;
      right: 0;
      top: 50%;
      transform: translate(0,-50%);
      min-height: 0;

      & > img {
        max-width: 225px;
        height: 100%;
        object-fit: cover;
      }
    }
  }
  /* HEADER TITLE END */

  /* AGENDA START */
  .leading-none {
    line-height: normal;
    font-size: 14px;
  }

  .event-day {
    font-size: 40px;
    font-family: 'Gotham';
    font-weight: 500;
    line-height: normal;
  }
  .event-month {
    font-size: 25px;
    font-family: 'Gotham';
    font-weight: 500;
    line-height: normal;
  }
  .event-title {
    font-size: 16px;
    font-family: 'Gotham';
    font-weight: 500;
    line-height: normal;
  }
  .card-header-border {
    border-bottom: 1px solid #026FC2;
  }
  .link {
    cursor: pointer;

    &:hover {
      text-decoration: underline;
    }
  }
  /* AGENDA END */
</style>
 
<div class="page-header-container">
  <div class="container">
    <div class="page-header">
      <h1 class="text-primary">Agenda</h1>
      <div class="d-none d-md-block">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/agenda-header-img.svg" alt="">
      </div>
    </div>
  </div>
</div>
<div>
  <div class="container py-4">
    <p class="text-gray text-justify m-0 text-gotham">Confira os próximos eventos, encontros e atividades promovidas pelo projeto. Participe e fortaleça essa rede de cuidado.</p>
  </div>
</div>

<main>
  <section class="container">
    <div class="row agenda-container">

      <?php
      // =======================================================
      // LOOP 1: GERAR OS CARDS DOS EVENTOS
      // =======================================================
      $hoje = date('Ymd');

      $args_eventos = array(
          'post_type'      => 'evento',
          'posts_per_page' => -1,
          'meta_key'       => 'evento_data_inicio',
          'orderby'        => 'meta_value_num',
          'order'          => 'ASC',
          'meta_query'     => array(
              array(
                  'key'     => 'evento_data_inicio',
                  'value'   => $hoje,
                  'compare' => '>=',
              ),
          ),
      );

      $eventos_query = new WP_Query($args_eventos);

      if ($eventos_query->have_posts()) :
          while ($eventos_query->have_posts()) : $eventos_query->the_post();
              
              // Pega a data e a formata para Dia e Mês
              $data_evento_str = get_field('evento_data_inicio');
              $data_obj = DateTime::createFromFormat('Ymd', $data_evento_str);
              $dia_evento = $data_obj ? $data_obj->format('d') : '';
              $timestamp_evento = $data_obj ? $data_obj->getTimestamp() : 0;
              $mes_completo = $timestamp_evento ? wp_date('F', $timestamp_evento) : '';
              $mes_abreviado = substr($mes_completo, 0, 3);
              $mes_evento = strtolower($mes_abreviado);

              $horarios = get_field('evento_horarios');
              $endereco = get_field('evento_endereco');
      ?>

      <div class="col-md-6 col-12 mb-4">
          <div class="hover-shadow h-100">
              <div class="card h-100">
                  <div class="card-header d-flex justify-content-between align-items-end card-header-border">
                      <div class="d-flex flex-column pr-2">
                          <strong class="text-primary event-day"><?php echo $dia_evento; ?></strong>
                          <span class="text-primary event-month"><?php echo $mes_evento; ?></span>
                      </div>
                      <div class="container-fluid pl-2 d-flex">
                          <span class="text-primary event-title"><?php the_title(); ?></span>
                      </div>
                  </div>
                  <div class="card-body d-flex flex-column">
                      <div class="d-flex flex-column">
                          <?php if ($horarios): ?>
                          <div class="d-flex align-items-center"><i class="far fa-calendar mr-1"></i>
                              <span class="font-weight-bold leading-none py-1 px-2"><?php echo esc_html($horarios); ?></span>
                          </div>
                          <?php endif; ?>
                          <?php if ($endereco): ?>
                          <div class="d-flex align-items-center"><i class="fas fa-map-marker-alt mr-1"></i>
                              <span class="font-weight-bold leading-none py-1 px-2"><?php echo esc_html($endereco); ?></span>
                          </div>
                          <?php endif; ?>
                      </div>
                      <div class="card-text leading-none py-3">
                          <?php the_excerpt(); // Mostra um resumo do evento ?>
                      </div>
                      <div class="d-flex justify-content-end mt-auto">
                          <button type="button" data-toggle="modal" data-target="#modal-evento-<?php the_ID(); ?>" class="btn btn-sm btn-primary">Ler mais</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <?php
          endwhile;
      else:
      ?>
          <div class="col-12">
              <p>Nenhum evento futuro agendado no momento.</p>
          </div>
      <?php
      endif;
      // Não resetamos o post data ainda, pois usaremos o mesmo query para os modais
      ?>
    </div>
  </section>
</main>
<?php
// =======================================================
// LOOP 2: GERAR OS MODAIS (ESCONDIDOS)
// =======================================================
if ($eventos_query->have_posts()) :
    // Volta o ponteiro do loop para o início para podermos usá-lo de novo
    $eventos_query->rewind_posts();

    while ($eventos_query->have_posts()) : $eventos_query->the_post();

        // Pegando todos os dados novamente para o modal
        $data_obj = DateTime::createFromFormat('Ymd', get_field('evento_data_inicio'));
        $dia_evento = $data_obj ? $data_obj->format('d') : '';
        $timestamp_evento = $data_obj ? $data_obj->getTimestamp() : 0;
        $mes_completo = $timestamp_evento ? wp_date('F', $timestamp_evento) : '';
        $mes_abreviado = substr($mes_completo, 0, 3);
        $mes_evento = strtolower($mes_abreviado);
        
        $horarios = get_field('evento_horarios');
        $endereco = get_field('evento_endereco');
        $publico_alvo = get_field('evento_publico_alvo');
        $vagas_inscricao = get_field('evento_vagas_inscricao');
        $contato = get_field('evento_contato');
        $arquivo_apoio = get_field('evento_arquivo_apoio');
        $link_inscricao = get_field('evento_link_inscricao');
?>

<div class="modal fade" id="modal-evento-<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-label-<?php the_ID(); ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-end card-header-border">
                <div class="d-flex flex-column pr-2">
                    <strong class="text-primary event-day"><?php echo $dia_evento; ?></strong>
                    <span class="text-primary event-month"><?php echo $mes_evento; ?></span>
                </div>
                <div class="container-fluid pl-2 d-flex">
                    <h5 id="modal-label-<?php the_ID(); ?>" class="modal-title text-primary event-title"><?php the_title(); ?></h5>
                </div>
                <button type="button" class="close align-self-start" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body card-header-border">
                <div class="d-flex flex-column">
                    <?php if ($horarios): ?><div class="d-flex align-items-center"><i class="far fa-calendar mr-1"></i><span class="font-weight-bold leading-none py-1 px-2"><?php echo esc_html($horarios); ?></span></div><?php endif; ?>
                    <?php if ($endereco): ?><div class="d-flex align-items-center"><i class="fas fa-map-marker-alt mr-1"></i><span class="font-weight-bold leading-none py-1 px-2"><?php echo esc_html($endereco); ?></span></div><?php endif; ?>
                    <?php if ($publico_alvo): ?><span class="font-weight-bold leading-none py-1"><strong>Público-alvo:</strong> <?php echo esc_html($publico_alvo); ?></span><?php endif; ?>
                    <?php if ($vagas_inscricao): ?><span class="font-weight-bold leading-none py-1"><strong>Vagas e Inscrição:</strong> <?php echo esc_html($vagas_inscricao); ?></span><?php endif; ?>
                    <?php if ($contato): ?><span class="font-weight-bold leading-none py-1"><strong>Contato:</strong> <?php echo esc_html($contato); ?></span><?php endif; ?>
                </div>
                <div class="card-text leading-none py-3">
                    <?php the_content(); // Descrição completa do evento ?>
                </div>
                <?php if ($arquivo_apoio): ?>
                <a class="link d-flex align-items-center" href="<?php echo esc_url($arquivo_apoio['url']); ?>" download>
                    <i class="fas fa-file-download text-primary"></i>
                    <span class="font-weight-bold leading-none py-1 px-2 text-primary">Material de apoio</span>
                </a>
                <?php endif; ?>
            </div>
            <?php if ($link_inscricao): ?>
            <div class="modal-footer">
                <a href="<?php echo esc_url($link_inscricao); ?>" target="_blank" class="btn btn-primary rounded-pill w-100 py-1 text-uppercase leading-none">Inscrever-se</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
    endwhile;
endif;

// Agora sim, resetamos o post data
wp_reset_postdata();
?>

<?php
get_footer();