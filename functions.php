<?php
/**
 * territorios_de_cuidado functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package territorios_de_cuidado
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function territorios_de_cuidado_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on territorios_de_cuidado, use a find and replace
		* to change 'territorios_de_cuidado' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'territorios_de_cuidado', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'territorios_de_cuidado' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'territorios_de_cuidado_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'territorios_de_cuidado_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function territorios_de_cuidado_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'territorios_de_cuidado_content_width', 640 );
}
add_action( 'after_setup_theme', 'territorios_de_cuidado_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function territorios_de_cuidado_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'territorios_de_cuidado' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'territorios_de_cuidado' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'territorios_de_cuidado_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function territorios_de_cuidado_scripts() {
	wp_enqueue_style( 'territorios_de_cuidado-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'territorios_de_cuidado-style', 'rtl', 'replace' );

	wp_enqueue_script( 'territorios_de_cuidado-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'territorios_de_cuidado_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function territorios_de_cuidado_registrar_cpt_curso() {
	$labels = array(
		'name'                  => _x( 'Cursos', 'Post Type General Name', 'territorios_de_cuidado' ),
		'singular_name'         => _x( 'Curso', 'Post Type Singular Name', 'territorios_de_cuidado' ),
		'menu_name'             => __( 'Cursos', 'territorios_de_cuidado' ),
		'all_items'             => __( 'Todos os Cursos', 'territorios_de_cuidado' ),
		'add_new_item'          => __( 'Adicionar Novo Curso', 'territorios_de_cuidado' ),
		'add_new'               => __( 'Adicionar Novo', 'territorios_de_cuidado' ),
	);
	$args = array(
		'label'                 => __( 'Curso', 'territorios_de_cuidado' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-welcome-learn-more',
		'has_archive'           => true,
		'rewrite'               => array( 'slug' => 'curso' ),
	);
	register_post_type( 'curso', $args );
}
add_action( 'init', 'territorios_de_cuidado_registrar_cpt_curso', 0 );

function territorios_de_cuidado_registrar_cpt_modulo() {
    $labels = array(
        'name' => 'Módulos',
        'singular_name' => 'Módulo',
        'add_new_item' => 'Adicionar Novo Módulo',
        'edit_item' => 'Editar Módulo',
        'new_item' => 'Novo Módulo',
        'view_item' => 'Ver Módulo',
        'search_items' => 'Procurar Módulos',
        'not_found' => 'Nenhum módulo encontrado',
        'not_found_in_trash' => 'Nenhum módulo na lixeira',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => 'edit.php?post_type=curso',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'hierarchical' => false,
        'menu_icon' => 'dashicons-media-text',
        'rewrite' => array('slug' => 'modulo'),
    );
    register_post_type('modulo', $args);
}
add_action('init', 'territorios_de_cuidado_registrar_cpt_modulo');

function territorios_de_cuidado_registrar_cpt_evento() {
	$labels = array(
		'name'                  => _x( 'Eventos', 'Post Type General Name', 'territorios_de_cuidado' ),
		'singular_name'         => _x( 'Evento', 'Post Type Singular Name', 'territorios_de_cuidado' ),
		'menu_name'             => __( 'Agenda de Eventos', 'territorios_de_cuidado' ),
		'all_items'             => __( 'Todos os Eventos', 'territorios_de_cuidado' ),
		'add_new_item'          => __( 'Adicionar Novo Evento', 'territorios_de_cuidado' ),
		'add_new'               => __( 'Adicionar Novo', 'territorios_de_cuidado' ),
	);
	$args = array(
		'label'                 => __( 'Evento', 'territorios_de_cuidado' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ), 
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'menu_icon'             => 'dashicons-calendar-alt', 
		'has_archive'           => true,
		'rewrite'               => array( 'slug' => 'evento' ),
	);
	register_post_type( 'evento', $args );
}
add_action( 'init', 'territorios_de_cuidado_registrar_cpt_evento', 0 );

function territorios_de_cuidado_registrar_cpt_noticia() {
	$labels = array(
		'name'                  => _x( 'Notícias', 'Post Type General Name', 'territorios_de_cuidado' ),
		'singular_name'         => _x( 'Notícia', 'Post Type Singular Name', 'territorios_de_cuidado' ),
		'menu_name'             => __( 'Notícias', 'territorios_de_cuidado' ),
		'all_items'             => __( 'Todas as Notícias', 'territorios_de_cuidado' ),
		'add_new_item'          => __( 'Adicionar Nova Notícia', 'territorios_de_cuidado' ),
		'add_new'               => __( 'Adicionar Nova', 'territorios_de_cuidado' ),
	);
	$args = array(
		'label'                 => __( 'Notícia', 'territorios_de_cuidado' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 7,
		'menu_icon'             => 'dashicons-megaphone',
		'has_archive'           => true,
		'rewrite'               => array( 'slug' => 'noticia' ),
	);
	register_post_type( 'noticia', $args );
}
add_action( 'init', 'territorios_de_cuidado_registrar_cpt_noticia', 0 );

function territorios_de_cuidado_registrar_cpt_parceiro() {
	$labels = array(
		'name'                  => _x( 'Parceiros', 'Post Type General Name', 'territorios_de_cuidado' ),
		'singular_name'         => _x( 'Parceiro', 'Post Type Singular Name', 'territorios_de_cuidado' ),
		'menu_name'             => __( 'Parceiros', 'territorios_de_cuidado' ),
		'all_items'             => __( 'Todos os Parceiros', 'territorios_de_cuidado' ),
		'add_new_item'          => __( 'Adicionar Novo Parceiro', 'territorios_de_cuidado' ),
		'add_new'               => __( 'Adicionar Novo', 'territorios_de_cuidado' ),
	);
	$args = array(
		'label'                 => __( 'Parceiro', 'territorios_de_cuidado' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => false, 
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 8,
		'menu_icon'             => 'dashicons-groups',
		'can_export'            => true,
	);
	register_post_type( 'parceiro', $args );
}
add_action( 'init', 'territorios_de_cuidado_registrar_cpt_parceiro', 0 );

function territorios_de_cuidado_customizer_settings($wp_customize) {
	// Dados de impacto
	$wp_customize->add_section('dados_impacto_section', array(
			'title'      => __('Dados de Impacto', 'territorios_de_cuidado'),
			'priority'   => 30,
	));

	$wp_customize->add_setting('impacto_territorios');
	$wp_customize->add_setting('impacto_pessoas_mobilizadas');
	$wp_customize->add_setting('impacto_pessoas_alcancadas');
	$wp_customize->add_setting('impacto_ciclos_formacao');

	$wp_customize->add_control('impacto_territorios_control', array(
			'label'      => __('Territórios de Cuidado', 'territorios_de_cuidado'),
			'section'    => 'dados_impacto_section',
			'settings'   => 'impacto_territorios',
			'type'       => 'number',
	));
	$wp_customize->add_control('impacto_pessoas_mobilizadas_control', array(
			'label'      => __('Pessoas mobilizadas diretamente', 'territorios_de_cuidado'),
			'section'    => 'dados_impacto_section',
			'settings'   => 'impacto_pessoas_mobilizadas',
			'type'       => 'number',
	));
	$wp_customize->add_control('impacto_pessoas_alcancadas_control', array(
			'label'      => __('Alcançadas mobilizadas diretamente', 'territorios_de_cuidado'),
			'section'    => 'dados_impacto_section',
			'settings'   => 'impacto_pessoas_alcancadas',
			'type'       => 'number',
	));
	$wp_customize->add_control('impacto_ciclos_formacao_control', array(
			'label'      => __('Ciclos de formação previstos', 'territorios_de_cuidado'),
			'section'    => 'dados_impacto_section',
			'settings'   => 'impacto_ciclos_formacao',
			'type'       => 'number',
	));
	
	// Redes sociais
	$wp_customize->add_section('redes_sociais_section', array(
			'title'      => __('Redes Sociais', 'territorios_de_cuidado'),
			'priority'   => 40,
	));
	$wp_customize->add_setting('link_instagram', array(
			'default'   => '',
			'transport' => 'refresh',
	));
	$wp_customize->add_control('link_instagram_control', array(
			'label'      => __('Link do Instagram', 'territorios_de_cuidado'),
			'section'    => 'redes_sociais_section',
			'settings'   => 'link_instagram',
			'type'       => 'url', 
	));
	$wp_customize->add_setting('link_tiktok', array(
			'default'   => '',
			'transport' => 'refresh',
	));
	$wp_customize->add_control('link_tiktok_control', array(
			'label'      => __('Link do TikTok', 'territorios_de_cuidado'),
			'section'    => 'redes_sociais_section',
			'settings'   => 'link_tiktok',
			'type'       => 'url',
	));

}
add_action('customize_register', 'territorios_de_cuidado_customizer_settings');

/**
 * Formata um número para uma versão "humanamente legível" com "mil".
 * Ex: 9586 se torna "9 mil".
 *
 * @param int $numero O número a ser formatado.
 * @return string O número formatado.
 */
function formatar_numero_impacto( $numero ) {
    // Garante que estamos trabalhando com um número
    $numero = (int) $numero;

    // Se o número for menor que 1000, retorna ele mesmo, sem formatação.
    if ( $numero < 1000 ) {
        return $numero;
    }

    // Se for 1000 ou maior, faz a formatação
    $numero_formatado = floor( $numero / 1000 ); // floor() arredonda para baixo
    return $numero_formatado . ' mil';
}