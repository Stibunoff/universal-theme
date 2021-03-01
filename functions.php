<?php
// Довабление расширенных возможностей
if ( ! function_exists( 'universal_theme_setup' ) ) :
    function universal_theme_setup() {
      // Добавление тега title
      add_theme_support( 'title-tag' );
    }
endif;
add_action( 'after_setup_theme', 'universal_theme_setup' );

// Подключение стилей и скриптов
function enqueue_universal_style() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_style( 'universal-theme-style', get_template_directory_uri(  ) . '/assets/css/universal-theme.css', 'style');
}
add_action( 'wp_enqueue_scripts', 'enqueue_universal_style' );