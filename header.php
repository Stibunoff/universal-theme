<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="header">
<div class="container"> 
      <div class="header-wrapper"> 
      <?php 
      if( has_custom_logo() ){
	the_custom_logo();
      } else { echo 'Univeresal';}
      ?>
      <?php 
      wp_nav_menu( [
	'theme_location'  => 'header_menu',
	'container'       => 'nav', 
	'container_class' => 'header-nav', 
	'menu_class'      => 'header-menu', 
	'echo'            => true,
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
      ] );
      ?>
      <?php get_search_form(); ?>
      </div>
      <!-- /header-wrapper -->
</div>
</header>
