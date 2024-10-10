<?php
/**
 * Specialisty page
 *
 * @package WordPress
 * @subpackage Store-Child Theme
 * @since Store-Child Theme
 */
?>

<?php get_header(); ?>
  
<div class="specialisty-page sw-page custom-page">

  <div class="container">
    <div class="page-title">Специалисты</div>
  </div>

  <?php $cats = [393, 392, 391, 186, 187, 188, 190, 128, 122, 124, 123, 125, 126, 412]; ?>

  <div class="cities">
    <div class="container">
      <div class="flex-container">
        <a href="/specialisty" class="cities-item active">Все города</a>
        <?php $categories = get_terms( array( 'taxonomy' => 'category', 'include' => $cats ) ); ?>
        <?php foreach ($categories as $cat) : ?>
          <div class="cities-item js-city-btn" data-term-id="<?php echo $cat->term_id; ?>"><?php echo $cat->name; ?></div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <div class="specialists">
    <div class="container">
      <div class="row js-insert-specialists">
        <?php
        // получаем номер страницы пагинации
        $current = absint( max( 1, get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' ) ) );
        $args = array(
          // 'cat' => $cats,
          'cat' => 413,
          'posts_per_page' => 9,
          'nopaging' => false,
          'paged' => $current,
        );
        
        $query = new WP_Query( $args );
        // $cat_array = [];

        if ( $query->have_posts() ) :

          <?php
          

          /**
           * При первой итерации цикла добавляю id категории в массив
           * При следующих проверяю наличие этого id в массиве
           * Если есть, то ничего не делаю, если нет - то добавляю в массив
           * В итоге получиться массив с id категорий с уникальными значениями
          */



           ?>


          <?php while( $query->have_posts() ) : $query->the_post(); ?>
            
            <?php

            // $ct = get_the_category();
            // $cat_id = $ct[0]->cat_ID;

            // if (!in_array($cat_id, $cat_array)) {
            //   $cat_array[] = $cat_id;

            // };

            ?>


          <div class="col-lg-4 col-md-6">
            <div class="specialists-item">
              <div class="specialists-item__image">
                <a href="<?php the_permalink(); ?>" class="item-link">
                  <?php the_post_thumbnail(); ?>
                </a>
              </div>
              <div class="specialists-item__content">
                <div class="specialists-item__title"><?php the_title(); ?></div>
                <div class="specialists-item__excerpt"><?php the_excerpt_max_charlength(100); ?></div>
                <a href="<?php the_permalink(); ?>" class="specialists-item__link">Подробнее</a>
              </div>
            </div>
          </div>
          
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <p>Записей нет.</p>
        <?php endif; ?>


        <?php //var_dump($cat_array); ?>

      </div>
    </div>
  </div>

  <div class="pagination-section">
    <div class="container">
      <div class="pagination">
        <?php 
        echo wp_kses_post(
          paginate_links(
            [
              'total'   => $query->max_num_pages, // количество берем из дефолтной опции запроса
              'current' => $current, // текущая страница
            ]
          )
        );
        ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>