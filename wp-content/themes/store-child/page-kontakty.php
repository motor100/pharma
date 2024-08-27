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
    <div class="page-title">Контакты</div>
  </div>

  <div class="contacts-section">
    <div class="container">
      <div class="contacts-section-subtitle">Телефоны</div>
      <div class="phone-wrapper">
        <a href="tel:+79269880861" class="contacts-section__phone">+7 (926) 988-08-61</a>
        <span class="contacts-section__text">по вопросам доставки и заказам</span>
      </div>
      <div class="phone-wrapper">
        <a href="tel:+74959274928" class="contacts-section__phone">+7 (495) 927-4-928</a>
        <span class="contacts-section__text">только по вопросам сотрудничества</span>
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
        <!-- <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A031a0b6256d1d2ec52e827b39594e15e4572c27bb05415c6a40851ea3d4d4027&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe> -->
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A25722c9a3a69fad830e4e032ab3d73a56464673e466ab82a64057765dc4ae600&amp;width=100%25&amp;height=410&amp;lang=ru_RU&amp;scroll=true"></script>
      </div>
    </div>
  </div>

  <div class="trace-route-section">
    <div class="container">
      <div class="trace-route-text">Проложить маршрут</div>
      <a href="https://2gis.ru/moscow/directions/points/%7C37.773221%2C55.639125%3B4504235282532904?m=37.773221%2C55.639125%2F16" class="map-link" target="_blank">
        <img class="map-logo twogis-logo" src="/wp-content/themes/store-child/includes/images/2gis-logo.png" alt="">
      </a>
      <a href="https://yandex.ru/maps/213/moscow/?ll=37.772927%2C55.639380&mode=routes&rtext=~55.639380%2C37.772927&rtt=auto&ruri=~ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgg1NjY0OTU0NRJG0KDQvtGB0YHQuNGPLCDQnNC-0YHQutCy0LAsINCQ0LvQvNCwLdCQ0YLQuNC90YHQutCw0Y8g0YPQu9C40YbQsCwgOdC6MiIKDXkXF0IVuY5eQg%2C%2C&z=17.12" class="map-link" target="_blank">
        <img class="map-logo yandex-logo" src="/wp-content/themes/store-child/includes/images/yandex-logo.png" alt="">
      </a>
      <a href="https://www.google.ru/maps/dir//%D0%90%D0%BB%D0%BC%D0%B0-%D0%90%D1%82%D0%B8%D0%BD%D1%81%D0%BA%D0%B0%D1%8F+%D1%83%D0%BB.,+9+%D0%BA%D0%BE%D1%80%D0%BF%D1%83%D1%81+2,+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+115408/@55.6394323,37.770145,17z/data=!4m8!4m7!1m0!1m5!1m1!1s0x414ab6ac375ded43:0x93576c58d3dba6a8!2m2!1d37.7727199!2d55.6394293?hl=ru&entry=ttu&g_ep=EgoyMDI0MDgyMS4wIKXMDSoASAFQAw%3D%3D" class="map-link" target="_blank">
        <img class="map-logo google-logo" src="/wp-content/themes/store-child/includes/images/google-logo.png" alt="">
      </a>
    </div>
  </div>

  </div>
</div>

<?php get_footer(); ?>