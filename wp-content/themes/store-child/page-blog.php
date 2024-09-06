<?php
/**
 * Blog page
 *
 * @package WordPress
 * @subpackage Store-Child Theme
 * @since Store-Child Theme
 */
?>

<?php get_header(); ?>
  
<div class="blog-page bo-page custom-page">

  <div class="container">
    <div class="page-title">Блог</div>
  </div>

  <div class="blog-content bo-content">
    <div class="container">
      <div class="row">
        
      <?php
      // получаем номер страницы пагинации
      $current = absint( max( 1, get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' ) ) );
      $args = array(
        'cat' => 105, // блог
        'posts_per_page' => 9,
        'nopaging' => false,
        'paged' => $current,
      );
        
      $query = new WP_Query( $args );
      if( $query->have_posts() ){
        while( $query->have_posts() ){
          $query->the_post();
      ?>
        <div class="col-lg-4 col-sm-6">
          <div class="bo-item">
            <div class="bo-item__content">
              <div class="bo-item__title"><?php the_title(); ?></div>
              <a href="<?php echo the_permalink(); ?>" class="bo-item__link">читать</a>
            </div>
            <div class="bo-item__image">
              <a href="<?php echo the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
              </a>
            </div>
          </div>
        </div>
        
        <?php
          }
          wp_reset_postdata();
        }
        else
          echo 'Записей нет.';
        ?>

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