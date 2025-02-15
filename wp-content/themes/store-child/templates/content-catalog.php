<?php if ( !is_page('catalog') ) { ?>

  <div class="text-page">
    <div class="container">
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

<?php } else { ?>

  <div class="catalog-page">
    <div class="catalog-section">
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
                <div class="catalog-tabs-item__image">
                  <img src="/wp-content/themes/store-child/includes/images/catalog-groups/2.png" alt="">
                </div>
                <div class="catalog-tabs-button__title">По<br>направлениям</div>
              </div>
              <div class="catalog-tabs-button" data-id="3">
                <div class="catalog-tabs-item__image">
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

    <div class="catalog-subcategory">
      <div class="catalog-subcategory-section-title csp-section-title section-title">Подкатегории</div>
      <div class="catalog-subcategories">
        <div class="container">
          <div class="flex-container">
            <?php echo render__catalog('96'); ?>
          </div>
        </div>
      </div>
    </div>

    <div class="composition-and-promo-section">
      <div class="composition-and-promo-section-title csp-section-title section-title">Композиции и акции</div>
      <div class="container">
        <div class="composition-and-promo-subtitle">Композиции</div>
        <div class="small-products">
          <div class="row">
            <div class="col-lg-3 col-sm-4 col-6">
              <div class="small-products-item">
                <div class="small-products-item__image">
                  <img src="/wp-content/themes/store-child/includes/images/test-image.jpg" alt="">
                </div>
                <div class="small-products-item__title">Персональная композиция эссенций Баха на водно-глицериновой основе</div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-4 col-6">
              <div class="small-products-item">
                <div class="small-products-item__image">
                  <img src="/wp-content/themes/store-child/includes/images/test-image.jpg" alt="">
                </div>
                <div class="small-products-item__title">Персональная композиция эссенций Баха на водно-глицериновой основе</div>
              </div>
            </div>
          </div>
        </div>
        <div class="composition-and-promo-subtitle">Подарочные сертификаты</div>
        <div class="certificates">
          <div class="row">
            <div class="col-md-4 col-6">
              <div class="certificates-item">
                <div class="certificates-image">
                  <img src="/wp-content/themes/store-child/includes/images/test-certificate.jpg" alt="">
                </div>
                <div class="certificates-title">Подарочный сертификат на 10 000Р</div>
              </div>
            </div>
            <div class="col-md-4 col-6">
              <div class="certificates-item">
                <div class="certificates-image">
                  <img src="/wp-content/themes/store-child/includes/images/test-certificate.jpg" alt="">
                </div>
                <div class="certificates-title">Подарочный сертификат на 10 000Р</div>
              </div>
            </div>
            <div class="col-md-4 col-6">
              <div class="certificates-item">
                <div class="certificates-image">
                  <img src="/wp-content/themes/store-child/includes/images/test-certificate.jpg" alt="">
                </div>
                <div class="certificates-title">Подарочный сертификат на 10 000Р</div>
              </div>
            </div>
          </div>
        </div>
        <div class="composition-and-promo-subtitle">Подборы</div>
        <div class="sets">
          <div class="row">
            <div class="col-md-4 col-6">
              <div class="sets-item">
                <div class="sets-item__image">
                  <img src="/wp-content/themes/store-child/includes/images/test-image.jpg" alt="">
                </div>
                <div class="sets-item__title">Персональная композиция эссенций Баха на водно-глицериновой основе</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="learning-materials-section catalog-section green-bg-section">
      <div class="curved green">
        <div class="one"></div>
        <div class="two"></div>
        <div class="three"></div>
      </div>
      <div class="container">
        <div class="section-title">НАШИ обучающие материалы и курсы</div>
        <div class="catalog-tabs-contents">
          <div class="cat-wrapper">
            <?php get_template_part( 'templates/content', 'vebinary' ); ?>
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

    <div class="description-section text-section">
      <div class="container">
        <div class="description-section-subtitle">Аптека натуральных лекарств</div>
        <p class="p">Аптека натуральных лекарств NaturaPharma единственная в своем роде, потому что предлагает лекарства не просто от болезней, а для повышения уровня здравья. Увеличения ресурса, трансформации негативных и ограничивающих убеждений, бессознательных программ. Аптека натуральных лекарств NaturaPharma – это аптека для людей, которые стремятся к здоровой и осознанной жизни. Мы верим, что только живые лекарства, наполненные природной энергией, способны помогать человеку на самом глубоком уровне.</p>
        <p class="p">В каталоге NaturaPharma вы найдете большой выбор натуропатических комплексов и индивидуальных лекарств, которые можно использовать в тех или иных случаях. Цель наших лекарств - регуляция энергетических и биохимических процессов без замещения или подавления. Мы предлагаем лекарства в виде капель, таблеток, порошков (тритураций), глицериновых экстрактов, созданных из высококачественного сырья, собранного нами самостоятельно, или купленных в экологически чистых уголках нашей планеты, в соответствии со знанием природных циклов, планетарных ритмов, с большим уважением к природе и всему тому, что она даёт человеку.</p>
        <p class="p">Наши продукты – это результат многолетних исследований и личного опыта врачей и фармацевтов в области натуропатии и психосоматики. Мы создаем культуру здоровой и осознанной жизни. В аптеке натуральных лекарств NaturaPharma каждый найдет именно то, что нужно лично ему для повышения уровня здоровья и ресурсности организма.</p>
        <p class="p p-last"><span class="text-bold">Позвоните нам сегодня по телефону +7 (495) 927-49-28</span>, чтобы узнать больше о наших продуктах и сделать шаг навстречу своему здоровью. Купите натуральные лекарства в NaturaPharma и откройте новую страницу в своей жизни.</p>
        <div class="callback-form-btn">
          <img src="/wp-content/themes/store-child/includes/images/svg/phone-call.svg" class="callback-form-btn__image" alt="">
          <span class="callback-form-btn__text">заказать звонок</span>
        </div>
      </div>
    </div>
    
  </div>
  
<?php } ?>