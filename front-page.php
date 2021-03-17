<?php get_header(); ?> 
<main class="front-page-header"> 
  <div class="container">
    <div class="hero">
      <div class="left">
          <?php
    // Объявляем глобальную переменную
global $post;

$myposts = get_posts([ 
	'numberposts' => 1,
  'category_name' => 'javascript, css, web-design, html',
]);
// Проверяем, есть ли посты
if( $myposts ){
  // Если есть, запускаем цикл
	foreach( $myposts as $post ){
		setup_postdata( $post );
		?>
        <!-- Выводим записи -->
        <img src="<?php the_post_thumbnail_url() ?>" alt="" class="post-thumb">
        <?php $author_id = get_the_author_meta('ID');?>
        <a href="<?php echo get_author_posts_url($author_id) ?>" class="author">
          <img src="<?php echo get_avatar_url($author_id)?>" alt="" class="avatar">
          <div class="author-bio">
            <span class="author-name"><?php the_author(); ?></span>
            <span class="author-rank">Должность</span>
          </div>
        </a>
        <div class="post-text">
          <?php
          foreach (get_the_category() as $category)    {
          printf(
            '<a href="%s" class="category-link %s">%s</a>',
            esc_url( get_category_link ( $category )),
            esc_html( $category -> slug),
            esc_html( $category -> name ),
          );
          }
          ?>
          <h2 class="post-title"> <?php echo mb_strimwidth(get_the_title( ), 0 ,60, '...') ?></h2>
          <a href="<?php echo get_the_permalink(); ?>" class="more">Читать далее</a>
        </div>
        		<?php 
            }
          } else {
            ?> <p>Постов нет</p> <?php
          }

          wp_reset_postdata(); // Сбрасываем $post
          ?>
      </div>
      <!-- /.left -->
      <div class="right">
        <h3 class="recommend">Рекомендуем</h3>
        <ul class="posts-list">
                 <?php
                // Объявляем глобальную переменную
            global $post;

            $myposts = get_posts([ 
              'numberposts' => 5,
              'offset' => 1,
              'category_name' => 'javascript, css, web-design, html',
            ]);
            // Проверяем, есть ли посты
            if( $myposts ){
              // Если есть, запускаем цикл
              foreach( $myposts as $post ){
                setup_postdata( $post );
                ?>
          <!-- Выводим записи -->
          <li class="post">
            <?php 
            foreach (get_the_category() as $category)    {
            printf(
            '<a href="%s" class="category-link %s">%s</a>',
            esc_url( get_category_link ( $category )),
            esc_html( $category -> slug),
            esc_html( $category -> name ),
            );
            }
            ?>
            <a class="post-permalink" href="<?php echo get_the_permalink(); ?>">
              <h4 class="post-title"><?php echo mb_strimwidth(get_the_title( ), 0 ,60, '...') ?></h4>
            </a>
          </li>
          		<?php 
            }
          } else {
            ?> <p>Постов нет</p> <?php
          }

          wp_reset_postdata(); // Сбрасываем $post
          ?>
        </ul>
      </div>
      <!-- /.right -->
    </div>
    <!-- /.hero -->
  
  </div>
  <!-- /.container -->
</main>
<div class="container">
  <ul class="article-list">
       <?php
                // Объявляем глобальную переменную
            global $post;

            $myposts = get_posts([ 
              'numberposts' => 4,
              'category_name' => 'articles',
            ]);
            // Проверяем, есть ли посты
            if( $myposts ){
              // Если есть, запускаем цикл
              foreach( $myposts as $post ){
                setup_postdata( $post );
                ?>
  <!-- Выводим записи -->
  <li class="article-item">
    <a class="article-permalink" href="<?php echo get_the_permalink(); ?>">
      <h4 class="article-title"><?php echo mb_strimwidth(get_the_title( ), 0 ,50, '...') ?></h4>
    </a>
    <img width="65" height="65" src="<?php echo get_the_post_thumbnail_url( null, 'thumbnail' ) ?>" alt="">
   </li>
          		<?php 
            }
          } else {
            ?> <p>Постов нет</p> <?php
          }

          wp_reset_postdata(); // Сбрасываем $post
          ?>

</ul>
<!-- ./article-list -->
<div class="main-grid">
<ul class="article-grid">
  <?php		
global $post;
// Формируем запрос в базу данных
$query = new WP_Query( [
  // Получаем 7  постов
	'posts_per_page' => 7,
  'tag'=> 'popular',
  'category_not_in'=> 23,

] );
// Проверяем есть ли посты

if ( $query->have_posts() ) {
  // Создаем переменню - счётчик постов
  $cnt = 0;
  // Пока посты есть, выводим их
	while ( $query->have_posts() ) {
		$query->the_post();
    // Увеличиваем счётчик постов
    $cnt++;
    switch ($cnt) {
      // выводим первый пост
      case '1':
        ?> 
         <li class="article-grid-item article-grid-item-1">
        <a href="<?php the_permalink()?>" class="article-grid-permalink">
        <span class="category-name"><?php $category = get_the_category(); echo $category [0]->name; ?>
      </span>
        <h4 class="article-grid-title"><?php echo get_the_title () ?></h4>
        <p class="article-grid-excerpt"><?php echo mb_strimwidth(get_the_excerpt( ), 0 ,90, '...') ?></p>
        <div class="article-grid-info">
         <div class="author">
           <?php $author_id = get_the_author_meta('ID');?>
          <img src="<?php echo get_avatar_url($author_id)?>" alt="" class="author-avatar">
          <span class="author-name"><strong><?php the_author() ?></strong>: <?php the_author_meta('description') ?> </span>
         </div>
         <div class="comments">
           <svg width="19" height="15" class="icon comments-icon">
              <use xlink:href="<?php echo get_template_directory_uri()?>/assetsimages/sprite.svg#comment"></use>
           </svg>
          <span class="comments-counter"><?php comments_number( '0', '1', '%' ); ?></span>
          </div>
        </div>
        </a>
        </li>
        <?php
        break;

        // Выводим второй пост
        case '2': ?>
        <li class="article-grid-item article-grid-item-2">
        <img src="<?php echo get_the_post_thumbnail_url()?>" alt="" class="article-grid-thumb">
        <a href="<?php the_permalink()?>" class="article-grid-permalink">
        <span class="tag">
          <?php $posttags = get_the_tags();
          if ($posttags) {
            echo $posttags[0]->name . ' ';
          } ?>
        </span>
        <span class="category-name"><?php $category = get_the_category(); echo $category [0]->name; ?>
      </span>
        <h4 class="article-grid-title"><?php the_title() ?></h4>
        <div class="article-grid-info">
         <div class="author">
           <?php $author_id = get_the_author_meta('ID');?>
          <img src="<?php echo get_avatar_url($author_id)?>" alt="" class="author-avatar">
           <div class="author-info">
               <span class="author-name"><strong><?php the_author() ?></strong></span>
               <span class="date"><?php the_time('j F'); ?></span>
                 <div class="comments">
                 <svg width="19" height="15" fill="#fff" class="icon comments-icon">
                   <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#comment"></use>
                 </svg>
                <span class="comments-counter"><?php comments_number( '0', '1', '%' ); ?></span>
                 </div>
                  <div class="likes">
                <div class="likes digest-likes">
               <svg width="19" height="15" class="icon comments-icon">
               <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#heart"></use>
           </svg>alt="icon:likes" class="icon likes-icon">
                <span class="likes-counter"><?php comments_number( '0', '1', '%' ); ?></span>
                  </div>
           </div>
           <!-- /author-info -->
         </div> 
        </div>
        </a>
        </li>

        <?php 
        break;
        // Выводим третий пост
        case '3': ?>
        <li class="article-grid-item article-grid-item-3">
        <a href="<?php the_permalink()?>" class="article-grid-permalink">
        <img width="65" height="65" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="article-thumb">
        <h4 class="article-grid-title"><?php echo the_title() ?></h4>
        </a>
        </li>
        <?php
        break;
      
        // Выводим остальные посты
      default: ?>
        <li class="article-grid-item article-grid-item-default">
        <a href="<?php the_permalink()?>" class="article-grid-permalink">
        <h4 class="article-grid-title"><?php echo mb_strimwidth(get_the_title( ), 0 ,45, '...') ?></h4>
        <p class="article-grid-excerpt"><?php echo mb_strimwidth(get_the_excerpt(), 0 ,85, '...') ?></p>
        <span class="article-date"><?php the_time('j F Y'); ?></span>
        </a>
        </li>
        <?php
        break;
    }
		?>
		<!-- Вывода постов, функции цикла: the_title() и т.д. -->
		<?php 
	}
} else {
	// Постов не найдено
}

wp_reset_postdata(); // Сбрасываем $post
?>

</ul>
<!-- /.article-grid -->
<!-- Подключаем верхний сайдбар -->
<?php get_sidebar('home-top'); ?>
</div>
<!-- /main-grid -->
</div>
<!-- /container -->

<?php		
global $post;

$query = new WP_Query( [
	'posts_per_page' => 1,
  'category_name' => 'investigation',
] );

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		?>
		<section class="investigation" style="background: linear-gradient(0deg, rgba(64, 48, 61, 0.45), rgba(64, 48, 61, 0.45)), url(<?php echo get_the_post_thumbnail_url() ?>) no-repeat center center">
  <div class="container">
    <h2 class="investigation-title"><?php the_title();?></h2>
    <a href="<?php echo get_the_permalink(); ?>" class="more">Читать статью</a>
  </div>
</section>
		<?php 
	}
} else {
	// Постов не найдено
}

wp_reset_postdata(); // Сбрасываем $post
?>
<div class="container">
<div class="digest-grid">
<div class="digest-wrapper">
  <ul class="digest">
       <?php
                // Объявляем глобальную переменную
            global $post;

            $myposts = get_posts([ 
              'numberposts' => 7,
              'category_name' => 'javascript, css, web-design, html',

            ]);
            // Проверяем, есть ли посты
            if( $myposts ){
              // Если есть, запускаем цикл
              foreach( $myposts as $post ){
                setup_postdata( $post );
                ?>
  <!-- Выводим записи -->
  <li class="digest-item">
      <a href="<?php the_permalink()?>" class="digest-item-permalink">
     
        <img src="<?php 
         if( has_post_thumbnail() ) {
          echo get_the_post_thumbnail_url( null, 'thumbnail' );
        }
        else {
          echo get_template_directory_uri().'/assets/images/img-default.png" />';
        }
         ?>" class="digest-thumb">
      </a>
      <div class="digest-info">
        <button class="bookmark">
          <img src="<?php echo get_template_directory_uri( ) . '/assets/images/bookmark.svg' ?>" alt="icon: bookmark" class="icon icon-bookmark">
        </button>
        <a href="#" class="category-link javascript"><?php $category = get_the_category(); echo $category [0]->name; ?></a>
        <a href="#" class="digest-item-permalink">
          <h3 class="digest-title"><?php echo mb_strimwidth(get_the_title( ), 0 ,100, '...') ?></h3>
        </a>
        <p class="digest-excerpt"><?php echo mb_strimwidth(get_the_excerpt(), 0 ,170, '...') ?></p>
        <div class="digest-footer">
          <span class="digest-date"><?php the_time('j F'); ?></span>
          <div class="comments digest-comments">
             <svg width="19" height="15" class="icon comments-icon">
              <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#comment"></use>
           </svg>
                <span class="comments-counter"><?php comments_number( '0', '1', '%' ); ?></span>
          </div>
          <div class="likes digest-likes">
             <svg width="19" height="15" class="icon comments-icon">
              <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#heart"></use>
           </svg>
            <span class="likes-counter"><?php comments_number( '0', '1', '%' ); ?></span>
          </div>
        </div>
        <!-- /.digest-footer -->
      </div>
      <!-- /.digest-info -->
    </li>
          		<?php 
            }
          } else {
            ?> <p>Постов нет</p> <?php
          }

          wp_reset_postdata(); // Сбрасываем $post
          ?>

</ul> 

</div>
<!-- ./digest-wrapper -->
<!-- Подключаем нижний сайдбар -->
<?php get_sidebar('home-bottom'); ?>
</div>
<!-- /digest-grid -->
</div>
<!-- /container -->
<div class="special">
  <div class="container">
    <div class="special-grid">
      <?php		
        global $post;

        $query = new WP_Query( [
          'posts_per_page' => 1,
          'category_name' => 'photo-report',
        ] );

        if ( $query->have_posts() ) {
          while ( $query->have_posts() ) {
            $query->the_post();
            ?>
            <div class="photo-report">
              <!-- Slider main container -->
              <div class="swiper-container photo-report-slider">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                  <!-- Slides -->
                  <div class="swiper-slide">
                    <img src="">
                  </div>
                  <div class="swiper-slide">
                    <img src="">
                  </div>
                  <div class="swiper-slide">
                    <img src="">
                  </div>
                </div>
                <div class="swiper-pagination"></div>
              </div>
              <div class="photo-report-content">
              <?php
                  foreach (get_the_category() as $category)    {
                  printf(
                  '<a href="%s" class="category-link %s">%s</a>',
                  esc_url( get_category_link ( $category )),
                  esc_html( $category -> slug),
                  esc_html( $category -> name ),
                  );
                  }
                  ?>
                  <img src="<?php the_post_thumbnail_url() ?>" alt="" class="post-thumb">
                      <?php $author_id = get_the_author_meta('ID');?>
                      <a href="<?php echo get_author_posts_url($author_id) ?>" class="author">
                        <img src="<?php echo get_avatar_url($author_id)?>" alt="" class="avatar">
                        <div class="author-bio">
                          <span class="author-name"><?php the_author(); ?></span>
                          <span class="author-rank">Должность</span>
                        </div>
                      </a>
                  <!-- /author bio -->
                <h3 class="photo-report-title"><?php the_title() ?></h3>
                <a href="<?php echo get_the_permalink()?>" class="button photo-report-button">
                  <svg width="19" height="15" class="icon photo-report-icon">
                    <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#images"></use>
                  </svg>
                  Смотреть фото
                  <span class="photo-report-counter">3</span>
                </a>
              </div>
              <!-- /.photo-report-content -->
            </div>
            <!-- /.photo-report -->
        <?php 
          }
        } else {
          // Постов не найдено
        }

        wp_reset_postdata(); // Сбрасываем $post
      ?>
      
      <div class="other">
        <div class="career-post">
          <a href="#" class="category-link">Карьера</a>
          <h3 class="career-post-title">Вопросы на собеседовании для джуна</h3>
          <p class="career-post-excerpt">
            Каверзные и не очень вопросы, которых боятся новички, когда идут на собеседование
          </p>
          <a href="#" class="more">Читать далее</a>
        </div>
        <!-- /.career-post -->
        <div class="other-posts">
          <a href="#" class="other-post other-post-default">
            <h4 class="other-post-title">Самые крутые функции в...</h4>
            <p class="other-post-excerpt">Тут полезный контент</p>
            <span class="other-post-date">3 декабря 2020</span>
          </a>
          <a href="#" class="other-post other-post-default">
            <h4 class="other-post-title">Новые возможности язык...</h4>
            <p class="other-post-excerpt">Тут про новые фичи языка CSS</p>
            <span class="other-post-date">3 декабря 2020</span>
          </a>
        </div>
        <!-- /.other-posts -->
      </div>
      <!-- /.other -->
    </div>
    <!-- /.special-grid -->
  </div>
  <!-- /.container -->
</div>
<!-- /.special -->