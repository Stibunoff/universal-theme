<?php
// Довабление расширенных возможностей
if ( ! function_exists( 'universal_theme_setup' ) ) :
    function universal_theme_setup() {
      // Добавление тега title
      add_theme_support( 'title-tag' );

      // Добавление миниатюр
      add_theme_support( 'post-thumbnails', array( 'post' ) );

      // Добавление пользовательского лого
      add_theme_support( 'custom-logo', [
          'width'       => 190,
          'flex-height' => true,
          'header-text' => 'Universal',
          'unlink-homepage-logo' => false, // WP 5.5
] );
      // Регистрайия меню
	      register_nav_menus( [
              'header_menu' => 'Меню в шапке',
              'footer_menu' => 'Меню в подвале'
	] );


    }
endif;
add_action( 'after_setup_theme', 'universal_theme_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function universal_example_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'universal-example' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'universal-example' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'universal_example_widgets_init' );

// Подключение стилей и скриптов
function enqueue_universal_style() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_style( 'universal-theme-style', get_template_directory_uri(  ) . '/assets/css/universal-theme.css', 'style');
  wp_enqueue_style( 'Roboto-Slab', 'https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap');
}
add_action( 'wp_enqueue_scripts', 'enqueue_universal_style' );

## отключаем создание миниатюр файлов для указанных размеров
add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );
function delete_intermediate_image_sizes( $sizes ){
	// размеры которые нужно удалить
	return array_diff( $sizes, [
		'medium_large',
		'large',
		'1536x1536',
		'2048x2048',
	] );
}


if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'homepage-thumb', 65, 65, true ); // Кадрирование изображения
  add_image_size( 'article-thumb', 336, 195, true ); // Кадрирование изображения
}