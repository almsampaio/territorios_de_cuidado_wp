<?php
/**
 * Template Name: Página de Listagem de Notícias
 * @package territorios_de_cuidado
 * 
 */

get_header(); ?>
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
        max-width: 80px;
        height: 100%;
        object-fit: contain;
      }
    }
  }
  /* HEADER TITLE END */

  /* MAIN START */
  .news-content {
    display: flex;
    flex-direction: column;
    gap: 8px;
  }
  .news-date {
    font-family: 'Gotham';
    font-size: 12px;
    font-weight: 700;
    color: #6D8394;
  }
  .news-title {
    font-family: 'Gotham';
    font-size: 28px;
    font-weight: 500;
    color: #4D99E2;
  }
  .news-description {
    font-family: 'Gotham';
    font-size: 14px;
    font-weight: 400;
    color: #6D8394;
    letter-spacing: 0.01rem;
  }
  .news-bg-mask {
    background-color: #EEF2F4;
  }
  /* MAIN END */
</style>


<!-- HEADER TITLE START  -->
<div class="page-header-container">
  <div class="container">
    <div class="page-header">
      <h1 class="text-primary">Notícias</h1>
      
      <div class="d-none d-md-block">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noticias-header-img.svg" alt="">
      </div>
    </div>
  </div>
</div>
<!-- HEADER TITLE END -->

<div class="bg-primary">
  <div class="container py-4">
    <p class="text-white m-0 text-justify text-gotham">Notícias que conectam e informam: acompanhe os destaques, iniciativas e acontecimentos que marcam o nosso caminho coletivo.</p>
  </div>
</div>


<main>
    <section class="container py-8 overflow-hidden">

        <?php
        // =======================================================
        // INÍCIO DO LOOP DINÂMICO PARA AS NOTÍCIAS
        // =======================================================
        $args_noticias = array(
            'post_type'      => 'noticia',
            'posts_per_page' => 10, // Mostrar 10 notícias por página
            'orderby'        => 'date',
            'order'          => 'DESC', // Mais recentes primeiro
        );
        $noticias_query = new WP_Query( $args_noticias );

        if ( $noticias_query->have_posts() ) :
            while ( $noticias_query->have_posts() ) : $noticias_query->the_post();

                // Pega a URL da imagem destacada para o background
                $imagem_fundo_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); // 'large' é um bom tamanho para backgrounds
        ?>
            
            <div class="card text-white overflow-hidden shadow border-0 mb-4">
                
                <?php if ($imagem_fundo_url): ?>
                    <div class="card-img-bg" style="background-image: url('<?php echo esc_url($imagem_fundo_url); ?>');"></div>
                <?php endif; ?>

                <span class="mask news-bg-mask opacity-9 hover-opacity-6"></span>
                <div class="card-body news-content px-5 py-5" style="min-height: 250px;">
                    
                    <h5 class="news-date">Publicado em <?php echo get_the_date('d/m/Y H:i'); ?></h5>
                    
                    <h4 class="news-title"><?php the_title(); ?></h4>
                    
                    <div class="news-description">
                        <?php the_excerpt(); ?>
                    </div>
                    
                    <div class="align-self-end mt-auto">
                        <a href="<?php the_permalink(); ?>" class="btn rounded-pill btn-primary">
                            Ler notícia
                        </a>
                    </div>
                </div>
            </div>

        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>Nenhuma notícia encontrada.</p>';
        endif;
        // =======================================================
        // FIM DO LOOP DINÂMICO
        // =======================================================
        ?>

    </section>
</main>

<?php
get_footer();
