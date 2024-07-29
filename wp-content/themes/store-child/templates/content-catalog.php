<?php //if($_SERVER['REQUEST_URI'] != '/catalog/') { ?>
<?php if ( !is_page('catalog') ) { ?>

  <section class="text-page">
    <div class="container">
      <div class="row">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php
          /**
           * Functions hooked in to storefront_page add_action
           *
           * @hooked storefront_page_header          - 10
           * @hooked storefront_page_content         - 20
           */
          do_action( 'storefront_page' );
          
          ?>

        </article> 
      </div>
    </div>
  </section>

<?php } else { ?>

  <section class="catalog catalog-page">
    <div class="title page-title"><?php the_title(); ?></div>

    <div class="curved violet v2">
      <div class="one"></div>
      <div class="two"></div>
      <div class="three"></div>
    </div>

    <div class="catalog-tabs">
      <div class="groups">
        <div class="container">
          <ul class="clear">
            <li class="tab-item">
              <a href="#tabs-1">
                <div class="img">
                  <img src="/wp-content/themes/store-child/includes/images/catalog-groups/1.png" alt="">
                </div>по сериям
              </a>
              </li>
            <li class="tab-item">
              <a href="#tabs-2">
                <div class="img">
                  <img src="/wp-content/themes/store-child/includes/images/catalog-groups/2.png" alt="">
                </div>по направлениям
              </a>
            </li>
            <li class="tab-item">
              <a href="#tabs-3">
                <div class="img">
                  <img src="/wp-content/themes/store-child/includes/images/catalog-groups/3.png" alt="">
                </div>подбор
              </a>
            </li>
            <li class="tab-item">
              <a href="#tabs-4">
                <div class="img">
                  <img src="/wp-content/themes/store-child/includes/images/catalog-groups/4.png" alt="">
                </div>обучение
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="curved green v2">
        <div class="one"></div>
        <div class="two"></div>
        <div class="three"></div>
      </div>
      <div class="container">
        <div id="tabs-1">
          <div class="cat-wrapper">
            <?php render__catalog('183'); ?>
          </div>
        </div>
        <div id="tabs-2">
          <div class="cat-wrapper">
            <?php render__catalog('96'); ?>
          </div>
        </div>
        <div id="tabs-3">
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
        <div id="tabs-4">
          <div class="cat-wrapper">
            <?php
            $args = array(
              'tax_query' => array(
              'relation' => 'AND',
              array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => 'vebinary'
              )
            ),
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

    <div class="catalog-description">
      <div class="container">
        <h2 class="catalog-subtitle">Аптека натуральных лекарств</h2>
        <p>Аптека натуральных лекарств NaturaPharma единственная в своем роде, потому что предлагает лекарства не просто от болезней, а для повышения уровня здравья. Увеличения ресурса, трансформации негативных и ограничивающих убеждений, бессознательных программ. Аптека натуральных лекарств NaturaPharma – это аптека для людей, которые стремятся к здоровой и осознанной жизни. Мы верим, что только живые лекарства, наполненные природной энергией, способны помогать человеку на самом глубоком уровне.</p>
        <p>В каталоге NaturaPharma вы найдете большой выбор натуропатических комплексов и индивидуальных лекарств, которые можно использовать в тех или иных случаях. Цель наших лекарств - регуляция энергетических и биохимических процессов без замещения или подавления. Мы предлагаем лекарства в виде капель, таблеток, порошков (тритураций), глицериновых экстрактов, созданных из высококачественного сырья, собранного нами самостоятельно, или купленных в экологически чистых уголках нашей планеты, в соответствии со знанием природных циклов, планетарных ритмов, с большим уважением к природе и всему тому, что она даёт человеку.</p>
        <p>Наши продукты – это результат многолетних исследований и личного опыта врачей и фармацевтов в области натуропатии и психосоматики. Мы создаем культуру здоровой и осознанной жизни. В аптеке натуральных лекарств NaturaPharma каждый найдет именно то, что нужно лично ему для повышения уровня здоровья и ресурсности организма.</p>
        <p>Позвоните нам сегодня по телефону +7 (495) 927-49-28, чтобы узнать больше о наших продуктах и сделать шаг навстречу своему здоровью. Купите натуральные лекарства в NaturaPharma и откройте новую страницу в своей жизни.</p>
      </div>
    </div>
    
  </section>
  
<?php } ?>