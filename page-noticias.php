<?php
/**
 * Template Name: Página de Listagem de Notícias
 * @package territorios_de_cuidado
 * */

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

    &>h1 {
      padding: 4rem 0;
      font-family: 'Lilita One', sans-serif;
      font-size: 48px;
    }

    &>div {
      position: absolute;
      right: 0;
      top: 50%;
      transform: translate(0, -50%);
      min-height: 0;

      &>img {
        width: 170px;
        height: 100%;
        object-fit: contain;
      }
    }
  }

  /* HEADER TITLE END */

  .gap-4 {
    gap: 16px;
  }

  .news-card {
    display: flex;
    margin: 0 auto;
    gap: 1.5rem;
  }

  .news-card__image-container {
    flex-shrink: 0;
    width: 300px;
    background-color: #f1f3f4;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 5px;
    overflow: hidden;
    transition: all 0.2s ease;
  }

  .news-card__image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .news-card__content {
    padding: 1.5rem 1.5rem 1.5rem 0;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
  }

  .news-card__meta-top {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 0.75rem;
  }

  .news-card__category {
    background-color: #d1dbe3;
    color: white;
    font-size: 0.875rem;
    font-weight: 500;
    padding: 0.25rem 0.75rem;
    border-radius: 99999px;
    font-family: "Gotham";
  }

  .news-card__date {
    font-size: 0.875rem;
    font-family: "Gotham";
  }

  .news-card__title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #026fc2;
    text-decoration: none;
    line-height: 1.3;
    font-family: "Gotham";
  }

  .news-card__excerpt {
    line-height: 1.6;
    margin-top: 0.75rem;
    flex-grow: 1;
    font-family: "Gotham";
  }

  .news-card__footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 1.5rem;
    font-family: "Gotham";
  }

  .news-card__author {
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .news-card__author-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    background-color: #e0e0e0;
  }

  .news-card__author-info {
    display: flex;
    flex-direction: column;
  }

  .news-card__author-name {
    font-weight: 600;
    font-size: 0.9rem;
  }

  .news-card__author-role {
    font-size: 0.8rem;
  }

  .news-card__button {
    background-color: #026fc2;
    color: white;
    text-decoration: none;
    padding: 0.75rem 1.5rem;
    border-radius: 24px;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.2s ease;
    white-space: nowrap;
  }

  .news-card__button:hover {
    filter: brightness(0.9);
    color: white;
    transform: scale(1.1);
  }

  @media (max-width: 768px) {
    .news-card {
      flex-direction: column;
      gap: 0;
    }

    .news-card__image-container {
      width: 100%;
      height: 200px;
    }

    .news-card__content {
      padding: 1.5rem;
    }
  }
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
<div class="bg-primary">
  <div class="container py-4">
    <p class="text-white m-0 text-justify text-gotham">Notícias que conectam e informam: acompanhe os destaques,
      iniciativas e acontecimentos que marcam o nosso caminho coletivo.</p>
  </div>
</div>


<main>
  <section class="container py-8 overflow-hidden">

    <?php
    $args_noticias = array(
      'post_type' => 'noticia',
      'posts_per_page' => 10,
      'orderby' => 'date',
      'order' => 'DESC',
    );
    $noticias_query = new WP_Query($args_noticias);

    if ($noticias_query->have_posts()):
      while ($noticias_query->have_posts()):
        $noticias_query->the_post();

        $autor_avatar_url = get_field('autor_avatar') ? get_field('autor_avatar')['url'] : 'https://via.placeholder.com/40';
        $autor_nome = get_field('autor_nome') ? get_field('autor_nome') : 'Nome do Autor';
        $autor_cargo = get_field('autor_cargo') ? get_field('autor_cargo') : 'Instituição';
        ?>

        <article class="news-card mb-5">
          <div class="news-card__image-container">
            <?php if (has_post_thumbnail()): ?>
              <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"
                alt="<?php the_title_attribute(); ?>">
            <?php else: ?>
              <img src="https://via.placeholder.com/300x400.png?text=Imagem" alt="Imagem placeholder">
            <?php endif; ?>
          </div>

          <div class="news-card__content">
            <div class="news-card__meta-top">
              <span class="news-card__category">
                <?php
                $terms = get_the_terms(get_the_ID(), 'category');
                if ($terms && !is_wp_error($terms)) {
                  echo esc_html($terms[0]->name);
                } else {
                  echo 'Notícias';
                }
                ?>
              </span>
              <span class="news-card__date">Publicado em <?php echo get_the_date('d/m/Y H:i'); ?></span>
            </div>

            <h2 class="news-card__title">
              <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: inherit;">
                <?php the_title(); ?>
              </a>
            </h2>

            <div class="news-card__excerpt">
              <?php the_excerpt(); ?>
            </div>

            <div class="news-card__footer">
              <div class="news-card__author">
                <img class="news-card__author-avatar" src="<?php echo esc_url($autor_avatar_url); ?>"
                  alt="Avatar de <?php echo esc_attr($autor_nome); ?>">
                <div class="news-card__author-info">
                  <span class="news-card__author-name"><?php echo esc_html($autor_nome); ?></span>
                  <span class="news-card__author-role"><?php echo esc_html($autor_cargo); ?></span>
                </div>
              </div>
              <a href="<?php the_permalink(); ?>" class="news-card__button">Ler Notícia</a>
            </div>
          </div>
        </article>
        <?php
      endwhile;

      wp_reset_postdata();
    else:
      echo '<p>Nenhuma notícia encontrada.</p>';
    endif;
    ?>

  </section>
</main>

<?php
get_footer();