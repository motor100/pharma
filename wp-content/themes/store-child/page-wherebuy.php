<?php
/**
 * Where buy page
 *
 * @package WordPress
 * @subpackage Store-Child Theme
 * @since Store-Child Theme
 */
?>

<?php get_header(); ?>
  
<div class="wherebuy-page custom-page">
  <div class="container">
    <div class="storefront-breadcrumb">
      <nav class="woocommerce-breadcrumb">
        <a href="/">Главная</a>
        <span class="breadcrumb-separator">></span>
      </nav>
    </div>
  </div>
  <div class="container">
    <div class="page-title">Где купить</div>
  </div>

  <div class="cities">
    <div class="container">
      <div class="flex-container">
        <a href="/specialisty" class="cities-item active">Все города</a>
        <div class="cities-item js-city-btn" data-term-id="">Москва</div>
        <div class="cities-item js-city-btn" data-term-id="">Брянск</div>
        <div class="cities-item js-city-btn" data-term-id="">Симферополь</div>
        <div class="cities-item js-city-btn" data-term-id="">Сочи</div>
        <div class="cities-item js-city-btn" data-term-id="">Чебоксары</div>
        <div class="cities-item js-city-btn" data-term-id="">Казань</div>
      </div>
    </div>
  </div>

  <div class="addresses">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="addresses-item">
            <div class="addresses-item__image">
              <img src="/wp-content/themes/store-child/includes/images/moskva-almaatinskaya.jpg" alt="">
            </div>
            <div class="addresses-item__title">Москва, Алма-Атинская</div>
            <div class="addresses-item__description">
              <p class="p">Аптека «NaturaPharma»</p>
              <p class="p">Алма-Атинская улица, дом 9, корпус 2</p>
              <p class="p">+7 (495) 927-4-928</p>
              <p class="p">пн.-пт. с 10.00 до 20.00</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="addresses-item">
            <div class="addresses-item__image">
              <img src="/wp-content/themes/store-child/includes/images/moskva-borovskoe.jpg" alt="">
            </div>
            <div class="addresses-item__title">Москва, Боровское шоссе</div>
            <div class="addresses-item__description">
              <p class="p">Аптека при медицинском центре «ЗдравиеPro»</p>
              <p class="p">Боровское шоссе, дом 56</p>
              <p class="p">+7 (495) 732-41-61</p>
              <p class="p">+7 (903) 011-24-49</p>
              <p class="p">пн.-пт. с 09.00 до 21.00</p>
              <p class="p">сб.-вс. с 10.00 до 20.00</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>
</div>

<?php get_footer(); ?>