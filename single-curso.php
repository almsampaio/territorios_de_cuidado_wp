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
        position: relative;
        top: 60px;
        height: 250px;
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
        transition: all 0.2s ease;
      }

      .cl-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        & .cl-card-mask {
          background: linear-gradient(180deg,rgba(7, 120, 206, 0.8) 0%, rgba(0, 71, 126, 0.8) 80%);
        }
      }

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
        transition: all 0.2s ease;
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

      /* HEADER START */

      .cs-header {
        position: relative;
        width: 100%;
        height: fit-content;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
      }

      .cs-header-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 1;
      }

      .cs-header-mask {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 71, 126, 0.8);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        z-index: 2;
      }

      .cs-header-content {
        position: relative;
        z-index: 3;
        padding: 40px;
        display: flex;
        align-items: center;
        flex-direction: column-reverse;
        height: 100%;
        gap: 20px;
      }
      
      .cs-badge {
        background-color: #469B49;
        color: white;
        width: fit-content;
        padding: 0.25rem 0.8rem;
        font-family: 'Gotham';
        font-size: 0.9em;
        font-weight: bold;
        border-radius: 5px;
        align-self: flex-start;
        display: block;
      }
      
      .cs-main-title {
        font-family: 'Gotham';
        color: white;
        font-weight: 900;
        line-height: 1.25;
        font-size: 1.5rem;
        margin: 0;
        text-transform: uppercase;
      }
      
      .cs-section-title {
        font-family: 'Lilita One';
        color: #026FC2;
        font-size: 2rem;
        line-height: 1.25;
        margin: 40px 0;
      }

      .cs-accordion-btn {
        font-family: 'Gotham';
        font-size: 16px;
        font-weight: 500;
        line-height: 28px;
      }

      .text-medium {
        font-weight: 500;
      }
      
      .cs-module {
        display: flex;
        flex-direction: column-reverse;
        align-items: center;
        gap: 40px;
      }
      .cs-module-asset {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 40px;
      }
      .cs-module-asset-download {
        display: block;
        width: 100%;
        padding: 12px 24px;
        background-color: #026EC2;
        color: white;
        text-align: center;
        text-decoration: none;
        text-transform: uppercase;
        font-weight: bold;
        font-size: 1em;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }
      .cs-module-asset-img {
        width: 250px;
        height: 400px;
        object-fit: cover;
        border-radius: 20px;
        max-width: unset;
      }
      .cs-paragraph {
        font-family: 'Gotham';
        font-weight: 500;
        margin: 0;
        text-align: justify;
        color: #9DAFBD;
      }

      .accordion .card-header:after {
        font-family: 'Gotham', sans-serif;
      }

      @media (min-width: 768px) {
        .cs-header-content {
          flex-direction: row;
          justify-content: space-between;
        }
        
        .cs-main-title {
          font-size: 2rem;
        }

        .cs-accordion-btn {
          font-size: 24px;
        }

        .cs-module {
          flex-direction: row;
          align-items: flex-start;
        }
      }

    </style>

<main id="primary" class="site-main">

    <?php
    // Início do Loop Principal do WordPress. Ele pega o Curso atual.
    while ( have_posts() ) :
        the_post();

        // Buscando os dados dos campos ACF do Curso
        $badge = get_field('badge');
        $imagem_de_fundo_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Pega a URL da Imagem Destacada
    ?>

    <div class="page-header-container" style="background-color: #E5EEFF;">
        <div class="container">
            <div class="page-header" style="position: relative; top: 60px; height: 250px;">
                <div class="cs-header">

                    <?php if ($imagem_de_fundo_url): ?>
                        <img class="cs-header-background" src="<?php echo esc_url($imagem_de_fundo_url); ?>" alt="Imagem de fundo do curso">
                    <?php endif; ?>

                    <div class="cs-header-mask"></div>
                    
                    <div class="cs-header-content">
                        <h1 class="cs-main-title">
                            <?php the_title(); // Título do Curso ?>
                        </h1>
                        <?php if ($badge): ?>
                            <span class="cs-badge"><?php echo esc_html($badge); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container py-4 mt-md-6 mt-10">
            <div class="cs-paragraph">
                <?php the_content(); // Descrição principal do Curso ?>
            </div>
        </div>
    </div>

    <section class="container">
        <div id="accordion-modulos" class="accordion accordion-stacked">

        <?php
        // =======================================================
        // INÍCIO DO LOOP PERSONALIZADO PARA OS MÓDULOS
        // =======================================================
        $id_do_curso_atual = get_the_ID();

        $args_modulos = array(
            'post_type' => 'modulo',
            'posts_per_page' => -1,
            'meta_key' => 'modulo_index', // Usa nosso campo ACF de índice para ordenar
            'orderby' => 'meta_value_num', // Ordena numericamente
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'curso_pai', // Busca módulos cujo 'curso_pai'
                    'value' => $id_do_curso_atual, // é igual ao ID do curso atual
                    'compare' => '=',
                )
            ),
        );

        $modulos_query = new WP_Query($args_modulos);

        if ($modulos_query->have_posts()) :
            while ($modulos_query->have_posts()) : $modulos_query->the_post();

                // Pega os dados dos campos ACF do Módulo
                $modulo_index = get_field('modulo_index');
                $imagem_ebook = get_field('modulo_imagem_ebook');
                $arquivo_ebook = get_field('modulo_arquivo_ebook');

                // Montando o título do accordion como você pediu
                $titulo_accordion = 'Módulo ' . esc_html($modulo_index) . ' - ' . get_the_title();

                $id_accordion = 'heading-' . esc_html($modulo_index);
                $control_accordion = 'collapse-' . esc_html($modulo_index);
            ?>

            <div class="card">
                 <div class="card-header py-4" id="<?php echo $id_accordion; ?>" data-toggle="collapse" role="button" data-target="#<?php echo $control_accordion; ?>" aria-expanded="false" aria-controls="<?php echo $control_accordion; ?>">
                    <h6 class="mb-0 cs-accordion-btn"><?php echo $titulo_accordion; ?></h6>
                </div>
                <div id="<?php echo $control_accordion; ?>" class="collapse" aria-labelledby="<?php echo $id_accordion; ?>" data-parent="#accordion-modulos">
                    <div class="card-body">
                        <div class="cs-module">
                            <?php if ($imagem_ebook && $arquivo_ebook): ?>
                            <div class="cs-module-asset">
                                <img class="cs-module-asset-img" src="<?php echo esc_url($imagem_ebook['url']); ?>" alt="<?php echo esc_attr($imagem_ebook['alt']); ?>">
                                <a class="cs-module-asset-download" href="<?php echo esc_url($arquivo_ebook['url']); ?>" download>Baixar Ebook</a>
                            </div>
                            <?php endif; ?>
                            
                            <div class="cs-paragraph">
                                <?php the_content(); // Descrição do Módulo ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            endwhile;
            wp_reset_postdata(); // Restaura os dados do post original. Essencial!
        endif;
        // =======================================================
        // FIM DO LOOP DOS MÓDULOS
        // =======================================================
        ?>

        </div>
    </section>
    <?php endwhile; // Fim do Loop Principal ?>
</main>

<?php
get_footer();