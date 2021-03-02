<?php get_header(); ?> 
<main class="front-page-header"> 
  <div class="container">
    <div class="hero">
      <div class="left">
        <!-- Выводим записи -->
        <img src="<?php echo get_template_directory_uri() . '/assets/images/image.png' ?>" alt="" class="post-thumb">
        <a href="#" class="author">
          <img src="<?php echo get_template_directory_uri() . '/assets/images/avatar.png' ?>" alt="" class="avatar">
          <div class="author-bio">
            <span class="author-name">Имя Автора</span>
            <span class="author-rank">Должность</span>
          </div>
        </a>
        <div class="post-text">
          <a href="#" class="category-link javascript">JavaScript</a>
          <h2 class="post-title">Самые крутые функции в javascript для новичка</h2>
          <a href="#" class="more">Читать далее</a>
        </div>
      </div>
      <!-- /.left -->
      <div class="right">
        <h3 class="recommend">Рекомендуем</h3>
        <ul class="posts-list">
          <!-- Выводим записи -->
          <li class="post">
            <a href="#" class="category-link css">CSS</a>
            <a class="post-permalink" href="#">
              <h4 class="post-title">Новые возможности языка стилей</h4>
            </a>
          </li>
          <!-- Выводим записи -->
          <li class="post">
            <a href="#" class="category-link web-design">Web Design</a>
            <a class="post-permalink" href="#">
              <h4 class="post-title">Где взять реальные проекты для портфолио</h4>
            </a>
          </li>
          <!-- Выводим записи -->
          <li class="post">
            <a href="#" class="category-link javascript">JavaScript</a>
            <a class="post-permalink" href="#">
              <h4 class="post-title">20+ инструментов для js-разработчика</h4>
            </a>
          </li>
          <!-- Выводим записи -->
          <li class="post">
            <a href="#" class="category-link web-design">Web Design</a>
            <a class="post-permalink" href="#">
              <h4 class="post-title">Удачные референсы</h4>
            </a>
          </li>
          <!-- Выводим записи -->
          <li class="post">
            <a href="#" class="category-link javascript">JavaScript</a>
            <a class="post-permalink" href="#">
              <h4 class="post-title">Топ плагинов jQuery</h4>
            </a>
          </li>
        </ul>
      </div>
      <!-- /.right -->
    </div>
    <!-- /.hero -->
  </div>
  <!-- /.container -->
</main>
