<script>
jQuery(document).ready(function($) {
  $('.catalog-tabs').tabs({active:0});
});
</script>

<div class="main-section">
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <div class="about">
          <img src="/wp-content/themes/store-child/includes/images/svg/company-title.svg" class="company-title" alt="">
          <div class="fl-text">ПЕРВАЯ</div>
          <div class="m-text">производственная</div>
          <div class="m-text">натуропатическая</div>
          <div class="fl-text">АПТЕКА</div>
          <div class="about-bg">
            <img src="" alt="">
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="slider">
          
        </div>
      </div>
    </div>
  </div>
</div>


<p></p>
<p></p>
<p></p>
<br>

<div class="banner">
  <div class="all-ban">
    <div class="relative">
      <div class="about">
        <div class="v1">Первая</div>
        <div class="v2">производственная</div>
        <div class="v2">натуропатическая</div>
        <div class="v1">Аптека</div>
        <div class="btm-img"></div>
      </div>
    </div>
    <div class="var-banner">
      <div class="bn">
        <div class="img">
          <?php echo do_shortcode('[slick-slider image_fit="true"]'); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="catalog-section" class="catalog">
  <div class="title">Каталог</div>
  <div class="curved violet v2">
    <div class="one"></div>
    <div class="two"></div>
    <div class="three"></div>
  </div>
  <div class="catalog-tabs">
    <div class="groups">
      <div class="container">
        <ul class="clear">
          <li class="catalog-tabs-item">
            <a href="#tabs-1">
              <div class="img">
                <img src="/wp-content/themes/store-child/includes/images/catalog-groups/1.png" alt="">
              </div>по сериям
            </a>
          </li>
          <li class="catalog-tabs-item">
            <a href="#tabs-2">
              <div class="img">
                <img src="/wp-content/themes/store-child/includes/images/catalog-groups/2.png" alt="">
              </div>по направлениям
            </a>
          </li>
          <li class="catalog-tabs-item">
            <a href="#tabs-3">
              <div class="img">
                <img src="/wp-content/themes/store-child/includes/images/catalog-groups/3.png" alt="">
              </div>подбор
            </a>
          </li>
          <li class="catalog-tabs-item">
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

<div class="offer m-b-200">
  <div class="title">Предложение недели</div>
  <div class="container">
    <div class="all-offer">
      <div class="items">
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
          $loop = new WP_Query( $args );
          while ( $loop->have_posts() ) : $loop->the_post();
            global $product;
            if (get_post_meta( get_the_ID(), '_sale_price', true)) {$price = get_post_meta( get_the_ID(), '_sale_price', true); } else
              {$price = get_post_meta( get_the_ID(), '_regular_price', true);}
        ?>
        <div class="children__item">
          <div class="children__image">
            <div class="circle-green favorite"></div>
            <a href="<?php echo get_permalink( $loop->post->ID ) ?>">
              <img src="<?php echo get_the_post_thumbnail_url($loop->post->ID); ?>" alt="<?php the_title(); ?>">
            </a>
          </div>
          <a class="subcat__link m-b-10" href="<?php echo get_permalink( $loop->post->ID ) ?>"><?php the_title(); ?></a>
          <div class="price black">
            <span><?php echo $price; ?> Р</span>
          </div>
          
        </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
      </div>
      <div class="item">
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
        <div class="item__image">
          <a href="<?php echo get_permalink( $loop->post->ID ) ?>">
            <img src="<?php echo get_the_post_thumbnail_url($loop->post->ID); ?>" alt="<?php the_title(); ?>">
          </a>
        </div>
        <div class="info">
          <a href="<?php echo get_permalink( $loop->post->ID ) ?>" class="info-title m-b-10"><?php the_title(); ?></a>
          <?php if ($full_price != $price) {?>
            <div class="full_price">
              <span><?php echo $full_price; ?> Р</span>
            </div>
          <?php } ?>
            <div class="price">
              <span><?php echo $price; ?> Р</span>
              <div class="circle-green favorite"></div>
            </div>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
      </div>
    </div>
  </div>
</div>

<div class="advantages-section">
  <div class="curved transparent">
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
</div>

<div class="text-section">
  <div class="container">
    <div class="text-section-title">NaturaPharma</div>
    <div class="paragraph-wrapper">
      <p class="paragraph">Мы рады Вас приветствовать на сайте аптеки NaturaPharma. Это первая производственная специализированная аптека в России, создающая уникальные препараты нового поколения для здоровой и осознанной жизни. Вы можете заказать натуральные препараты и комплексы на основе природных  субстанций. Наша миссия – сохранить жизненную силу природных субстанций- растений, минералов, животных организмов-  для сохранения Вашего здоровья. Мы производим лекарства и пищевые добавки, которые способны регулировать биохимические процессы в организме, повышать уровень здоровья, давать организму ресурс, трансформировать различные эмоциональные состояния. Наши продукты служат не только устранению видимых симптомов болезни, но позволяют работать с их причинами, с «почвой» заболеваний.</p>
      <p class="paragraph">Соли Шюсслера используют для тканевой биохимической терапии как катализаторы всех обменных процессов в организме. Цветочные эссенции Баха трансформируют  негативные эмоциональные состояния и разрывают порочный круг формирования психосоматических заболеваний. Это препараты для глубинного ощущения Вашего нового состояния. В производственной натуропатической аптеке  NaturaPharma Вы найдете продукты для здоровой и осознанной жизни. Мы понимаем, что современному человеку недостаточно принимать лекарства «от болезней». Сегодня люди стремятся к осознанной и осмысленной жизни. Это наша цель – производство препаратов «для состояний», препаратов, которые сами являются источником энергии.</p>
      <p class="paragraph">Основа нашего производства – российская и европейская фармакопея, а опыт наших врачей и фармацевтов позволяет создавать уникальные препараты.
      Болезнь – часть жизни. Нет людей, которые не болеют. Но болеть можно по-разному. И лечиться тоже по-разному. Если Вы придерживаетесь бережного отношения к своему здоровью, понимаете роль психики, эмоций, различных жизненных ситуаций в Вашей жизни, будем рады Вас видеть. Мы считаем, что природа создала всё, что нужно для выздоровления. В наполненных энергией природных лекарствах гораздо больше ресурса для выздоровления не только тела, но и души. Для Вас работает наш сервис дистанционного заказа и  быстрой доставки, аккредитованными компаниями по всей России, Казахстану и Белоруссии, чтобы начать свой путь к лучшему здоровью уже сегодня.</p>
    </div>
    <div class="order-text">Заказать натуральные препараты и продукты на их основе в NaturaPharma очень просто</div>
    <div class="order-phone">наш телефон +7 (495) 927-4 -928</div>
    <div class="flex-container">
      <div class="callback-btn" data-fancybox="dialog-form1" data-src="#contact-form">
        <img src="/wp-content/themes/store-child/includes/images/svg/phone-call.svg" class="callback-btn__image" alt="">
        <span class="callback-btn__text">заказать звонок</span>
      </div>
      <a href="/o-nas" class="detailed-about-us-btn">подробнее о нас</a>
    </div>
  </div>
</div>

