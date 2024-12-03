<div class="main-section">
  <div class="container">
    <div class="flex-container">
      <div class="main-section-about">
        <img src="/wp-content/themes/store-child/includes/images/svg/company-title.svg" class="company-title" alt="">
        <div class="fl-text fl-text-first">ПЕРВАЯ</div>
        <div class="m-text">производственная</div>
        <div class="m-text m-text-last">натуропатическая</div>
        <div class="fl-text">АПТЕКА</div>
        <div class="about-bg">
          <img src="/wp-content/themes/store-child/includes/images/about-bg.jpg" alt="">
        </div>
      </div>

      <div class="main-section-slider">
        <div class="main-slider swiper">
          <div class="swiper-wrapper">

            <?php
            $args = array(
              'post_type' => 'home_page_slider',
              'posts_per_page' => 5,
              'nopaging' => false,
            );
            $query = new WP_Query( $args );
            if( $query->have_posts() ) :
              while( $query->have_posts() ) :
                $query->the_post();
                $product_link = get_post_meta( $post->ID, 'product_link', true ); ?>

                <div class="main-slider-item swiper-slide">
                  <div class="slider-item-image">
                    <a href="<?php echo $product_link ? $product_link : "#"; ?>">
                      <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" alt="">
                    </a>
                  </div>
                </div>

              <?php
              endwhile;
              wp_reset_postdata();
            else :
              echo 'Записей нет.';
            endif;
            ?>
            
          </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>
</div>

<div class="info-section">
  <?php
  $args = array(
    'cat' => 424, // Категория объявления production id 424
    'posts_per_page' => 1,
  );

  $query = new WP_Query( $args );

  if( $query->have_posts() ) : ?>
    <div class="content-wrapper">
      <div class="container">
        <?php while( $query->have_posts() ) :
          $query->the_post(); ?>

          <div class="row">
            <div class="col-xl-6 col-md-5">
              <div class="info-image">
                <a href="<?php echo the_permalink(); ?>" class="info-link">
                  <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" alt="">
                </a>
              </div>
            </div>
            <div class="col-xl-6 col-md-7">
              <div class="info-content">
                <a href="<?php echo the_permalink(); ?>" class="info-title"><?php echo the_text_max_charlength( get_the_title(), 40); ?></a>
                <div class="info-text">
                  <?php echo the_text_max_charlength( get_the_excerpt(), 400); ?>
                </div>
              </div>
            </div>
          </div>

        <?php
        endwhile;
        wp_reset_postdata();
        ?>
      </div>
    </div>

  <?php
  endif;
  ?>
</div>

<div id="catalog-section" class="catalog-section">
  <div class="catalog-section-title">Каталог</div>
  <div class="curved violet v2">
    <div class="one"></div>
    <div class="two"></div>
    <div class="three"></div>
  </div>

  <div class="catalog-tabs">
    <div class="catalog-tabs-buttons">
      <div class="container">
        <div class="flex-container">
          <div class="catalog-tabs-button active" data-id="1">
            <div class="catalog-tabs-button__image">
              <img src="/wp-content/themes/store-child/includes/images/catalog-groups/1.png" alt="">
            </div>
            <div class="catalog-tabs-button__title">По сериям</div>
          </div>
          <div class="catalog-tabs-button" data-id="2">
            <div class="catalog-tabs-button__image">
              <img src="/wp-content/themes/store-child/includes/images/catalog-groups/2.png" alt="">
            </div>
            <div class="catalog-tabs-button__title">По<br>направлениям</div>
          </div>
          <div class="catalog-tabs-button" data-id="3">
            <div class="catalog-tabs-button__image">
              <img src="/wp-content/themes/store-child/includes/images/catalog-groups/3.png" alt="">
            </div>
            <div class="catalog-tabs-button__title">Подбор</div>
          </div>
          <div class="catalog-tabs-button" data-id="4">
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
        <div class="catalog-tabs-content active" data-id="1">
          <div class="cat-wrapper">
            <?php echo render__catalog('183'); ?>
          </div>
        </div>
        <div class="catalog-tabs-content" data-id="2">
          <div class="cat-wrapper"></div>
        </div>
        <div class="catalog-tabs-content" data-id="3">
          <div class="cat-wrapper"></div>
        </div>
        <div class="catalog-tabs-content" data-id="4">
          <div class="cat-wrapper"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="offer-of-week-section">
  <div class="section-title">Предложение недели</div>
  <div class="offers">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="big-offer">
            <div class="big-offer-frame">
              <?php
                $args = array(
                  'tax_query' => array(
                  'relation' => 'AND',
                  array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => 'promo'
                  )
                ),
                'posts_per_page' => 1, 
                'post_type' => 'product', 
                'orderby' => 'title',
                );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                global $product;
                if (get_post_meta( get_the_ID(), '_sale_price', true)) {$price = get_post_meta( get_the_ID(), '_sale_price', true); } else
                  {$price = get_post_meta( get_the_ID(), '_regular_price', true);}
                $full_price = get_post_meta( get_the_ID(), '_regular_price', true);
              ?>
              <div class="big-offer-image">
                <a href="<?php echo get_permalink( $loop->post->ID ) ?>">
                  <img src="<?php echo get_the_post_thumbnail_url($loop->post->ID); ?>" alt="<?php the_title(); ?>">
                </a>
              </div>
              <div class="big-offer-info">
                <a href="<?php echo get_permalink( $loop->post->ID ); ?>" class="info-title"><?php the_title(); ?></a>
                <?php if ($full_price != $price) { ?>
                  <div class="full-price"><?php echo ($full_price . " " . get_woocommerce_currency_symbol()); ?></div>
                <?php } ?>
                  <div class="price"><?php echo ($price . " " . get_woocommerce_currency_symbol()); ?></div>
              </div>
              <?php endwhile; ?>
              <?php wp_reset_query(); ?>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="small-offers">
            <div class="row">
              <?php
              $args = array(
                'tax_query' => array(
                  'relation' => 'AND',
                  array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => 'predlozhenie-4'
                  )
                ),
                'posts_per_page' => 4, 
                'post_type' => 'product',
                'orderby' => 'title',
              );
              ?>
              <?php
              $loop = new WP_Query( $args );
              while ( $loop->have_posts() ) : $loop->the_post();
                global $product;
                if (get_post_meta( get_the_ID(), '_sale_price', true)) {
                  $price = get_post_meta( get_the_ID(), '_sale_price', true);
                } else {
                  $price = get_post_meta( get_the_ID(), '_regular_price', true);
                }
              ?>
              <div class="col-6">
                <div class="offer-item">
                  <div class="offer-image">
                    <a href="<?php echo get_permalink( $loop->post->ID ) ?>" class="offer-link">
                      <img src="<?php echo get_the_post_thumbnail_url($loop->post->ID); ?>" alt="<?php the_title(); ?>">
                    </a>
                  </div>
                  <a class="offer-title" href="<?php echo get_permalink( $loop->post->ID ); ?>"><?php the_title(); ?></a>
                  <div class="offer-price"><?php echo ($price . " " . get_woocommerce_currency_symbol()); ?></div>
                </div>
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

<div class="advantages-section green-bg-section">
  <div class="curved green">
    <div class="one"></div>
    <div class="two"></div>
    <div class="three"></div>
  </div>
  <div class="container">
    <div class="section-title">Наши<br/>преимущества</div>
    <div class="row">
      <div class="col-xl-3 col-sm-6">
        <div class="advantages-item">
          <div class="advantage-flex-container">
            <div class="advantage-image">
              <img src="/wp-content/themes/store-child/includes/images/advantage/01.png" alt="">
            </div>
            <div class="advantage-title">Единственный специализированный компаундинг в России</div>
          </div>
          <div class="advantage-description">Природа уже создала все необходимое для здоровья и благополучия. Мы производим лекарства нового поколения "для здоровья", а не "от болезней".</div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="advantages-item">
          <div class="advantage-flex-container">
            <div class="advantage-image">
              <img src="/wp-content/themes/store-child/includes/images/advantage/02.png" alt="">
            </div>
            <div class="advantage-title">Фармацевтическая производственная лицензия</div>
          </div>
          <div class="advantage-description">Для Вас работает команда опытных врачей и фармацевтов. Для нас важно качество наших препаратов, мы аптека полного цикла - от заготовки сырья до производства персонального лекарства.</div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="advantages-item">
          <div class="advantage-flex-container">
            <div class="advantage-image">
              <img src="/wp-content/themes/store-child/includes/images/advantage/03.png" alt="">
            </div>
            <div class="advantage-title">Персонализированные натуральные лекарства</div>
          </div>
          <div class="advantage-description">Мы придерживаемся принципа персонального изготовления препаратов под каждого пациента с его особыми потребностями. У каждого своя причина заболеть - и лекарство должно быть персональным.</div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="advantages-item">
          <div class="advantage-flex-container">
            <div class="advantage-image">
              <img src="/wp-content/themes/store-child/includes/images/advantage/04.png" alt="">
            </div>
            <div class="advantage-title">Удобная доставка</div>
          </div>
          <div class="advantage-description">Аптека имеет официальное разрешение на диcтанционную продажу лекарственных средств. Мы осуществляем доставку по всем городам России, Казахстана, Белоруссии аккредитованной компанией Boxberry.</div>
        </div>
      </div>
    </div>
  </div>
  <div class="left-bg">
    <img src="/wp-content/themes/store-child/includes/images/left-bg.png" alt="">
  </div>
  <div class="right-bg">
    <img src="/wp-content/themes/store-child/includes/images/right-bg.png" alt="">
  </div>
</div>

<div class="text-section">
  <div class="container">
    <div class="text-section-title">NaturaPharma</div>
    <div class="paragraph-wrapper">
      <p class="p">Мы рады Вас приветствовать на сайте аптеки NaturaPharma. Это первая производственная специализированная аптека в России, создающая уникальные препараты нового поколения для здоровой и осознанной жизни. Вы можете заказать натуральные препараты и комплексы на основе природных  субстанций. Наша миссия – сохранить жизненную силу природных субстанций- растений, минералов, животных организмов-  для сохранения Вашего здоровья. Мы производим лекарства и пищевые добавки, которые способны регулировать биохимические процессы в организме, повышать уровень здоровья, давать организму ресурс, трансформировать различные эмоциональные состояния. Наши продукты служат не только устранению видимых симптомов болезни, но позволяют работать с их причинами, с «почвой» заболеваний.</p>
      <p class="p">Соли Шюсслера используют для тканевой биохимической терапии как катализаторы всех обменных процессов в организме. Цветочные эссенции Баха трансформируют  негативные эмоциональные состояния и разрывают порочный круг формирования психосоматических заболеваний. Это препараты для глубинного ощущения Вашего нового состояния. В производственной натуропатической аптеке  NaturaPharma Вы найдете продукты для здоровой и осознанной жизни. Мы понимаем, что современному человеку недостаточно принимать лекарства «от болезней». Сегодня люди стремятся к осознанной и осмысленной жизни. Это наша цель – производство препаратов «для состояний», препаратов, которые сами являются источником энергии.</p>
      <p class="p">Основа нашего производства – российская и европейская фармакопея, а опыт наших врачей и фармацевтов позволяет создавать уникальные препараты.
      Болезнь – часть жизни. Нет людей, которые не болеют. Но болеть можно по-разному. И лечиться тоже по-разному. Если Вы придерживаетесь бережного отношения к своему здоровью, понимаете роль психики, эмоций, различных жизненных ситуаций в Вашей жизни, будем рады Вас видеть. Мы считаем, что природа создала всё, что нужно для выздоровления. В наполненных энергией природных лекарствах гораздо больше ресурса для выздоровления не только тела, но и души. Для Вас работает наш сервис дистанционного заказа и  быстрой доставки, аккредитованными компаниями по всей России, Казахстану и Белоруссии, чтобы начать свой путь к лучшему здоровью уже сегодня.</p>
    </div>
    <div class="order-text">Заказать натуральные препараты и продукты на их основе в NaturaPharma очень просто</div>
    <div class="order-phone">наш телефон +7 (495) 927-4 -928</div>
    <div class="flex-container">
      <div class="callback-form-btn">
        <img src="/wp-content/themes/store-child/includes/images/svg/phone-call.svg" class="callback-form-btn__image" alt="">
        <span class="callback-form-btn__text">заказать звонок</span>
      </div>
      <a href="/o-nas" class="detailed-about-us-btn">подробнее о нас</a>
    </div>
  </div>
</div>