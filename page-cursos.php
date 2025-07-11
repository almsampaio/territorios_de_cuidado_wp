<?php
/**
 * Template Name: Página de Listagem de Cursos
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
      height: 100%;

      & > img {
        padding-top: 0.5rem;
        max-width: 225px;
        height: 100%;
        object-fit: contain;
      }
    }
  }
  /* HEADER TITLE END */

  .responsive-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 28px;
    justify-content: center;
  }

  /* CARD START */

  .cl-card {
    cursor: pointer;
    position: relative;
    width: 350px;
    height: 400px;
    border-radius: 5px;
    overflow: hidden;
    color: white;
    box-shadow: 0 10px 25px rgba(42, 56, 67, 0.2);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 25px;
    box-sizing: border-box;
    transition: all 0.2s ease-in-out;
  }

  .cl-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    & .cl-card-mask {
      background: linear-gradient(180deg,rgba(7, 120, 206, 0.8) 0%, rgba(0, 71, 126, 0.8) 80%);
    }
  }
  
  .cl-card-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: 1;
  }

  .cl-card-mask {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(42, 56, 67, 0.5);
    z-index: 2;
    transition: all 0.2s ease;
  }

  .cl-card-content {
    position: relative;
    z-index: 3;
    height: 100%;
    display: flex;
    flex-direction: column;
  }

  .cl-badge {
    background-color: #469B49;
    color: white;
    width: fit-content;
    padding: 0.25rem 0.8rem;
    font-family: 'Gotham';
    font-size: 0.9em;
    font-weight: bold;
    align-self: flex-start;
    border-radius: 5px;
  }

  .cl-card-title {
    margin-top: 20px;
    line-height: 1.25;
    font-size: 10px;
    font-family: 'Gotham';
  }
  
  .cl-card-title .cl-main-title {
    color: white;
    font-weight: 900;
    font-size: 2.8em;
    line-height: 1.25;
    margin: 0;
    text-transform: uppercase;
  }
  
  .cl-card-title .cl-subtitle {
    font-size: 2.2em;
    font-weight: 500;
    line-height: 1.2;
    margin-top: 8px;
    color: white;
  }

  .cl-card-footer {
    margin-top: auto;
  }

  .cl-divider {
    width: 100%;
    height: 2px;
    background-color: rgba(255, 255, 255, 0.6);
    margin-bottom: 25px;
  }

  .cl-card-button {
    display: block;
    width: fit-content;
    padding: 12px 24px;
    background-color: #026EC2;
    color: white;
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 1em;
    border: none;
    border-radius: calc(infinity * 1px);
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  /* CARD END */

</style>

    <!-- HEADER TITLE START  -->
    <div class="page-header-container">
      <div class="container">
        <div class="page-header">
          <h1 class="text-primary">Cursos</h1>
          
          <div class="d-none d-md-block">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cursos-header-img.svg" alt="">
          </div>
        </div>
      </div>
    </div>
    <!-- HEADER TITLE END -->

    <div>
      <div class="container py-4">
        <p class="text-gray text-justify m-0 text-gotham">Os cursos voltados para fortalecer iniciativas locais que integram saúde, meio ambiente, cultura e participação social. Através de formações acessíveis e alinhadas às realidades dos territórios, buscamos apoiar comunidades fora dos grandes centros urbanos, promovendo autonomia, conhecimento e valorização dos saberes locais. Cada curso é uma oportunidade de aprendizado e troca, incentivando o protagonismo das pessoas na construção de territórios mais saudáveis e sustentáveis.</p>
      </div>
    </div>

    <!-- MAIN CONTENT START -->
    <main>
      <section class="container">
        <div class="responsive-grid">
        <?php
          // =======================================================
          // INÍCIO DO LOOP DINÂMICO DO WORDPRESS
          // =======================================================

          $args_cursos = array(
              'post_type'      => 'curso',    // Queremos buscar apenas o CPT 'curso'
              'posts_per_page' => -1,        // -1 para buscar todos os cursos
              'orderby'        => 'title',    // Ordenar pelo título
              'order'          => 'ASC',      // Ordem ascendente (A-Z)
          );

          $cursos_query = new WP_Query( $args_cursos );

          if ( $cursos_query->have_posts() ) :
              while ( $cursos_query->have_posts() ) : $cursos_query->the_post();

                  // Pega os dados dos campos ACF
                  $subtitulo = get_field('curso_subtitulo');
                  $badge = get_field('badge');
                  ?>

                  <a href="<?php the_permalink(); // Link para a página individual do curso ?>">
                      <div class="cl-card">
                          
                          <?php if ( has_post_thumbnail() ) : // Verifica se há uma imagem destacada
                              // A Imagem Destacada do curso como background
                              the_post_thumbnail( 'large', array( 'class' => 'cl-card-background' ) );
                          endif; ?>
                          
                          <div class="cl-card-mask"></div>
                          <div class="cl-card-content">
                              <div class="cl-card-header">
                                  
                                  <script>
                                    console.log($badge, 'aloha')
                                  </script>
                                  <?php if ($badge) : // Só mostra o badge se ele for preenchido ?>
                                      <span class="cl-badge"><?php echo esc_html($badge); ?></span>
                                  <?php endif; ?>
                                  
                                  <div class="cl-card-title">
                                      <h1 class="cl-main-title"><?php the_title(); ?></h1>
                                      
                                      <?php if ($subtitulo) : // Só mostra o subtitulo se ele for preenchido ?>
                                          <h2 class="cl-subtitle"><?php echo esc_html($subtitulo); ?></h2>
                                      <?php endif; ?>
                                  </div>
                              </div>
                              <div class="cl-card-footer">
                                  <div class="cl-divider"></div>
                                  <span class="cl-card-button">Ver Mais</span>
                              </div>
                          </div>
                      </div>
                  </a>

              <?php
              endwhile;
              wp_reset_postdata(); // Restaura os dados do post original
          else :
              echo '<p>Nenhum curso encontrado.</p>';
          endif;
          // =======================================================
          // FIM DO LOOP DINÂMICO DO WORDPRESS
          // =======================================================
        ?>
        </div>
      </section>
    </main>
    <!-- MAIN CONTENT END -->

<?php
get_footer();