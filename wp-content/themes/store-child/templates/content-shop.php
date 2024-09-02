<div class="catalog-page">
  <div class="catalog-section">

    <div class="catalog-section-title"><?php echo woocommerce_page_title(); ?></div>
    <div class="curved violet v2">
      <div class="one"></div>
      <div class="two"></div>
      <div class="three"></div>
    </div>

    <div class="catalog-tabs">
      <div class="catalog-tabs-buttons">
        <div class="container">
          <div class="flex-container">
            <div class="catalog-tabs-button active">
              <div class="catalog-tabs-button__image">
                <img src="/wp-content/themes/store-child/includes/images/catalog-groups/1.png" alt="">
              </div>
              <div class="catalog-tabs-button__title">По сериям</div>
            </div>
            <div class="catalog-tabs-button">
              <div class="catalog-tabs-item__image">
                <img src="/wp-content/themes/store-child/includes/images/catalog-groups/2.png" alt="">
              </div>
              <div class="catalog-tabs-button__title">По<br>направлениям</div>
            </div>
            <div class="catalog-tabs-button">
              <div class="catalog-tabs-item__image">
                <img src="/wp-content/themes/store-child/includes/images/catalog-groups/3.png" alt="">
              </div>
              <div class="catalog-tabs-button__title">Подбор</div>
            </div>
            <div class="catalog-tabs-button">
              <div class="catalog-tabs-button__image">
                <img src="/wp-content/themes/store-child/includes/images/catalog-groups/4.png" alt="">
              </div>
              <div class="catalog-tabs-button__title">Обучение</div>
            </div>
          </div>
        </div>
      </div>
      <div class="curved green v2">
        <div class="one"></div>
        <div class="two"></div>
        <div class="three"></div>
      </div>
      <div class="catalog-tabs-contents">
        <div class="container">
          <div class="catalog-tabs-content active">
            <div class="cat-wrapper">
              <?php render__catalog('183'); ?>
            </div>
          </div>
          <div class="catalog-tabs-content">
            <div class="cat-wrapper">
              <?php render__catalog('96'); ?>
            </div>
          </div>
          <div class="catalog-tabs-content">
            <div class="cat-wrapper">
              <?php
              $args = array(
              'tax_query' => array(
              'relation' => 'AND',
              array(
              'taxonomy' => 'product_cat',
              'field' => 'slug',
              'terms' => 'klasternii_analiz'
              )),
              'posts_per_page' => 20, 
              'post_type' => 'product', 
              'orderby' => 'title',
              );
              $loop = new WP_Query( $args );
              while ( $loop->have_posts() ) : $loop->the_post();
              global $product;
              ?>
              <div class="children__item">
                <div class="children__image">
                  <a href="<?php echo get_permalink( $loop->post->ID ) ?>">
                    <img class="ww100" src="<?php echo get_the_post_thumbnail_url($loop->post->ID); ?>" alt="">
                  </a>
                </div>
                <a class="subcat__link" href="<?php echo get_permalink( $loop->post->ID ) ?>"><?php the_title(); ?></a>
              </div>
              <?php endwhile; ?>
              <?php wp_reset_query(); ?>
            </div>
          </div>
          <div class="catalog-tabs-content">
            <div class="cat-wrapper">
              <?php
              $args = array(
              'tax_query' => array(
              'relation' => 'AND',
              array(
              'taxonomy' => 'product_cat',
              'field' => 'slug',
              'terms' => 'vebinary'
              )),
              'posts_per_page' => 20, 
              'post_type' => 'product', 
              'orderby' => 'title',
              );
              $loop = new WP_Query( $args );
              while ( $loop->have_posts() ) : $loop->the_post();
              global $product;
              ?>
              <div class="children__item">
                <div class="children__image">
                  <a href="<?php echo get_permalink( $loop->post->ID ) ?>">
                    <img class="ww100" src="<?php echo get_the_post_thumbnail_url($loop->post->ID); ?>" alt="">
                  </a>
                </div>
                <a class="subcat__link" href="<?php echo get_permalink( $loop->post->ID ) ?>"><?php the_title(); ?></a>
              </div>
              <?php endwhile; ?>
              <?php wp_reset_query(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>