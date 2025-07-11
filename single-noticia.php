<?php
/**
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
    font-weight: 400;
    color: #4D99E2;
    text-align: center;
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

  .author-title {
    font-family: 'Gotham', sans-serif;
    font-size: 14px;
    font-weight: 700;
    color: #4D99E2;
  }
  .author-role {
    font-family: 'Gotham', sans-serif;
    font-size: 12px;
  }

  .img-description {
    font-style: italic;
  }
  .img-responsive {
    max-width: 100%;
    object-fit: contain;
  }
  /* MAIN END */


</style>

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

<main>
    <?php
    // Início do Loop Padrão do WordPress. Ele já sabe qual notícia pegar.
    while ( have_posts() ) :
        the_post();

        // Pegando os dados dos campos ACF
        $nome_autor = get_field('nome_do_autor');
        $empresa_autor = get_field('empresa_do_autor');

        // Pegando a URL da Imagem Destacada para o fundo do cabeçalho
        $imagem_fundo_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // 'full' para máxima qualidade
    ?>

    <div class="card text-white overflow-hidden shadow border-0">
        <?php if ($imagem_fundo_url): ?>
            <div class="card-img-bg" style="background-image: url('<?php echo esc_url($imagem_fundo_url); ?>');"></div>
        <?php endif; ?>
        <span class="mask news-bg-mask opacity-9 hover-opacity-6"></span>
        <div class="card-body d-flex justify-content-center px-5 py-5" style="min-height: 350px;">
            <div class="d-flex flex-column justify-content-center align-items-center" style="max-width: 600px;">
                <h1 class="news-title"><?php the_title(); ?></h1>
                <div class="d-flex flex-column justify-content-center align-items-center pt-4">
                    <?php if ($nome_autor): ?>
                        <span class="author-title"><?php echo esc_html($nome_autor); ?></span>
                    <?php endif; ?>
                    <?php if ($empresa_autor): ?>
                        <span class="author-role"><?php echo esc_html($empresa_autor); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <section class="container py-8 overflow-hidden text-dark">
        <div class="entry-content">
            <?php
            // A MÁGICA ACONTECE AQUI:
            // A função the_content() irá exibir todo o corpo da sua notícia,
            // incluindo parágrafos, imagens inseridas no meio do texto, subtítulos, etc.
            the_content();
            ?>
        </div>
    </section>

    <?php
    endwhile; // Fim do Loop
    ?>
</main>

<?php
get_footer();
