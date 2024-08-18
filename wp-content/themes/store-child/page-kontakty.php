<?php
/**
 * Kontakty page
 *
 * @package WordPress
 * @subpackage Store-Child Theme
 * @since Store-Child Theme
 */
?>

<?php get_header(); ?>
  
<div class="kontakty-page custom-page">
  <div class="container">
    <div class="storefront-breadcrumb">
      <nav class="woocommerce-breadcrumb">
        <a href="/">Главная</a>
        <span class="breadcrumb-separator">></span>
      </nav>
    </div>
  </div>
  <div class="container">
    <div class="page-title">Контакты</div>
  </div>

  <div class="contacts-section">
    <div class="container">
      <div class="contacts-section-subtitle">Телефоны</div>
      <div class="phone-wrapper">
        <a href="tel:+74959274928" class="contacts-section__phone">+7 (495) 927-4-928</a>
        <span class="contacts-section__text">только по вопросам сотрудничества</span>
      </div>
      <div class="phone-wrapper">
        <a href="tel:+79269880861" class="contacts-section__phone">+7 (926) 988-08-61</a>
        <span class="contacts-section__text">по вопросам доставки и заказам</span>
      </div>
      <div class="contacts-section-subtitle">Адрес</div>
      <div class="contacts-section__address">Москва, Алма-Атинская 9 к 2</div>
      <div class="contacts-section__email">Почта: <span class="text-underline">info@naturapharma.ru</span></div>
      <div class="contacts-section-subtitle">Режим работы</div>
      <div class="working-time-item"><strong>Пн, Ср, Чт, Пт:</strong> С 10:00 до 20:00<br><strong>Вт:</strong> с 10:00 до 18:00</div>
      <div class="working-time-item"><strong>Сб, Вс:</strong> выходной</div>
    </div>
  </div>
  <div id="map-section" class="map-section">
    <div class="container">
      <div class="map">
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A031a0b6256d1d2ec52e827b39594e15e4572c27bb05415c6a40851ea3d4d4027&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
      </div>
    </div>
  </div>

  </div>
</div>

<?php get_footer(); ?>