<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

</div>

<footer class="footer">
  <div class="curved m-b-30">
    <div class="one"></div>
    <div class="two"></div>
    <div class="three"></div>
  </div>
  <div class="footer-top">
    <div class="container">
      <div class="footer-logo">
        <img src="/wp-content/themes/store-child/includes/images/svg/footer-logo.svg" alt="logo">
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="company-info">Производственная натуропатическая аптека: натуральные препараты и лекарства, гомеопатия, капли Баха, гидролаты, витамины, соли Шюсслера</div>
          <div class="company-info">© Общество с ограниченной <br> ответственностью «Здоровье»</div>
          <div class="company-info company-info-last">ИНН 7724488603</div>
          <div class="footer-bottom-mobile-menu">
            <?php echo custom_nav_menu(0, 4); ?>
            <?php echo custom_nav_menu(5); ?>
          </div>
          <div class="footer-phone footer-pe">
            <img src="/wp-content/themes/store-child/includes/images/svg/circle-call.svg" class="footer-phone-image footer-pe-image" alt="phone call">
            <a class="footer-phone-link footer-pe-link" href="tel:+74959274928">+7 (495) 927-4-928</a>
          </div>
          <div class="working-time">Пн, Вт, Ср, Чт, Пт: С 10:00 до 20:00<br>Сб, Вс: выходной</div>
          <div class="footer-email footer-pe">
            <img src="/wp-content/themes/store-child/includes/images/svg/circle-email.svg" class="footer-phone-image footer-pe-image" alt="phone call">
            <a class="footer-email-link footer-pe-link" href="mailto:info@naturapharma.ru">info@naturapharma.ru</a>
          </div>
          <div class="footer-address">г. Москва, ул. Алма-Атинская, д. 9, корп. 2</div>
          <a href="/politika-v-otnoshenii-obrabotki-personalnyh-dannyh" class="privacy-policy footer-pa">Политика конфиденциальности</a>
          <a href="/soglasie-posetitelya-sajta-na-obrabotku-personalnyh-dannyh" class="agreement footer-pa">Согласие на обработку персональных данных</a>
          <div class="copyright">© 2016—<?php echo date("Y"); ?> Все права принадлежат ООО «Здоровье»</div>
        </div>
        <div class="col-lg-2 d-lg-block d-none"><?php echo custom_nav_menu(0, 4); ?></div>
        <div class="col-lg-3 d-lg-block d-none"><?php echo custom_nav_menu(5); ?></div>
        <div class="col-lg-3">
          <div class="flex-container">
            <div class="footer-buttons">
              <div class="callback-form-btn">
                <img src="/wp-content/themes/store-child/includes/images/svg/circle-call.svg" class="callback-form-btn__image" alt="">
                <span class="callback-form-btn__text">Заказать звонок</span>
              </div>
              <div class="search-btn" onclick="window.scrollTo(0,0)">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="search-btn__image" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
                <span class="search-btn__text">Поиск препаратов</span>
              </div>
            </div>
            <div class="payment-system">
              <img src="/wp-content/themes/store-child/includes/images/visa.png" class="payment-system__icon icon-visa" alt="visa">
              <img src="/wp-content/themes/store-child/includes/images/mastercard.png" class="payment-system__icon icon-mastercard" alt="mastercard">
              <img src="/wp-content/themes/store-child/includes/images/mir.png" class="payment-system__icon icon-mir" alt="mir">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="footer-bottom__text">все что представлено на сайте не является рекомендациями и мы не отвечаем за самоназначения, где то правильно написанная фраза у нас была</div>
    </div>
  </div>
</footer>

<div class="burger-menu-wrapper">
  <div class="burger-menu">
    <span class="span"></span>
  </div>
</div>

<div class="mobile-menu">
  <div class="mobile-menu-logo">
    <img src="/wp-content/themes/store-child/includes/images/svg/full-logo.svg" alt="лого">
  </div>
  <div class="working-time">Пн-Пт: 10:00 до 20:00, Сб-Вс: выходной</div>
  <?php
  wp_nav_menu(
    array(
      'menu' => 'header_menu',
      'menu_id' => 'mobile_menu',
    )
  );
  ?>
  <div class="phone-wrapper">
    <a href="#" class="social-icons__link" rel="nofollow noopener" target="_blank">
      <img src="/wp-content/themes/store-child/includes/images/svg/circle-wa.svg" class="social-icons__image social-icons__wa" alt="ватсап">
    </a>
    <a href="tel:+74959274928" class="social-icons__link" rel="nofollow noopener" target="_blank">
      <img src="/wp-content/themes/store-child/includes/images/svg/circle-call.svg" class="social-icons__image social-icons__call" alt="звонок">
    </a>
    <a href="tel:+74959274928" class="phone-text">+7 (495) 927-4-928</a>
  </div>
  <div class="feedback-text">Напишите нам</div>
  <div class="socials-icons">
    <a href="https://t.me/naturaproff" class="social-icons__link" rel="nofollow noopener" target="_blank">
      <img src="/wp-content/themes/store-child/includes/images/svg/circle-tg.svg" class="social-icons__image social-icons__tg" alt="телеграм">
    </a>
    <a href="https://vk.com/natura.pharma" class="social-icons__link" rel="nofollow noopener" target="_blank">
      <img src="/wp-content/themes/store-child/includes/images/svg/circle-vk.svg" class="social-icons__image social-icons__vk" alt="вконтакте">
    </a>
  </div>
  
</div>

<div class="fixed-bottom-menu hidden-desktop ">
  <div class="menu-wrapper">
    <div class="menu-item">
      <div class="menu-item__image">
        <img src="/wp-content/themes/store-child/includes/images/svg/house.svg" alt="">
      </div>
      <div class="menu-item__title">Главная</div>
      <a href="/" class="full-link"></a>
    </div>
    <div class="menu-item">
      <div class="menu-item__image">
        <img src="/wp-content/themes/store-child/includes/images/svg/catalog-lens.svg" alt="">
      </div>
      <div class="menu-item__title">Каталог</div>
      <a href="/catalog" class="full-link"></a>
    </div>
    <div class="menu-item cart-menu-item">
      <div class="menu-item__image">
        <img src="/wp-content/themes/store-child/includes/images/svg/shopping-cart-white.svg" alt="">
      </div>
      <div class="menu-item__title">Корзина</div>
      <div id="mobile-cart-counter" class="badge-counter"><?php echo WC()->cart->get_cart_contents_count(); ?></div>
      <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="full-link"></a>
    </div>
    <div class="menu-item favourite-menu-item">
      <div class="menu-item__image">
        <img src="/wp-content/themes/store-child/includes/images/svg/favourite-heart.svg" alt="">
      </div>
      <div class="menu-item__title">Избранное</div>
      <div id="mobile-favourites-counter" class="badge-counter">0</div>
      <a href="#" class="full-link"></a>
    </div>
    <div class="menu-item">
      <div class="menu-item__image">
        <img src="/wp-content/themes/store-child/includes/images/svg/phone-call-black.svg" alt="">
      </div>
      <div class="menu-item__title">Звонок</div>
      <a href="tel:+74959274928" class="full-link"></a>
    </div>
  </div>
</div>

<div class="have-contraindications">
  <div class="have-contraindications__text">ИМЕЮТСЯ ПРОТИВОПОКАЗАНИЯ. НЕОБХОДИМО ПРОКОНСУЛЬТИРОВАТЬСЯ СО СПЕЦИАЛИСТОМ</div>
</div>

<div id="cookie_note" class="we-use-cookie">
  <div class="we-use-cookie-wrapper">
    <div class="we-use-cookie-text">Этот сайт использует cookie-файлы и другие технологии для улучшения его работы. Продолжая работу с сайтом, вы разрешаете использование cookie-файлов. Вы всегда можете отключить файлы cookie в настройках Вашего браузера.</div>
    <button id="cookie_accept" class="we-use-cookie-close">ОК</button>
  </div>
</div>

<div id="callback-modal" class="modal-window callback-modal">
  <div class="modal-wrapper">
    <div class="modal-area">
      <div class="modal-close">
        <div class="close"></div>
      </div>
      <div class="modal-title">Заказать звонок</div>
      <!-- <form id="callback-modal-form" class="form" method="post"> -->
        <form id="callback-modal-form" class="form" method="post" action="/wp-content/themes/store-child/phpmailer/mailer.php">
        <label for="name-callback-modal" class="label">Имя<span class="terracota-color">*</span></label>
        <input type="text" id="name-callback-modal" class="input-field js-required-name" name="name" required minlength="3" maxlength="20" placeholder="">
        <label for="phone-callback-modal" class="label">Телефон<span class="terracota-color">*</span></label>
        <input type="text" id="phone-callback-modal" class="input-field js-required-phone js-input-phone-mask" name="phone" required maxlength="18">
        <input type="hidden" name="surname" class="js-required-surname" value="нет">
        <input type="hidden" name="email" class="js-required-email" value="нет">
        <!-- <input type="button" id="callback-modal-btn" class="submit-btn" value="Отправить"> -->
        <input type="submit" id="callback-modal-btn" class="submit-btn" value="Отправить">
        <div class="agreement-text">
          <input type="checkbox" id="cb-checkbox-input" name="checkbox" class="custom-checkbox js-required-checkbox" checked onchange="document.getElementById('callback-modal-btn').disabled = !this.checked;">
          <label for="lfs-checkbox-input" class="custom-checkbox-label"></label>
          <span>Нажимая кнопку вы соглашаетесь с <a href="/politika-v-otnoshenii-obrabotki-personalnyh-dannyh">политикой обработки данных</a></span>
        </div>
      </form>
    </div>
  </div>
</div>

</div>

<?php wp_footer(); ?>

<!-- Yandex.Metrika counter -->
<script>
  (function() {
    'use strict';

    var loadedMetrica = false;
    var metricaId = 95353045;
    var timerId;

    if ( navigator.userAgent.indexOf( 'YandexMetrika' ) > -1 ) {
      loadMetrica();
    } else {
      window.addEventListener( 'scroll', loadMetrica, {passive: true} );

      window.addEventListener( 'touchstart', loadMetrica );

      document.addEventListener( 'mouseenter', loadMetrica );

      document.addEventListener( 'click', loadMetrica );

      document.addEventListener( 'DOMContentLoaded', loadFallback );
    }

    function loadFallback() {
      timerId = setTimeout( loadMetrica, 3000 );
    }

    function loadMetrica( e ) {

      if ( loadedMetrica ) {
        return;
      }

      (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
      m[i].l=1*new Date();
      for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
      k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
      (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
      ym(95353045, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        ecommerce: "dataLayer"
      });

      loadedMetrica = true;

      clearTimeout( timerId );

      window.removeEventListener( 'scroll', loadMetrica );
      window.removeEventListener( 'touchstart', loadMetrica );
      document.removeEventListener( 'mouseenter', loadMetrica );
      document.removeEventListener( 'click', loadMetrica );
      document.removeEventListener( 'DOMContentLoaded', loadFallback );
    }
  })()
</script>
<!-- /Yandex.Metrika counter -->

<!-- VK-pixel-->
<script>
  ! function() {
    var t = document.createElement("script");
    t.async = !0, t.src = 'https://vk.com/js/api/openapi.js?169', t.onload = function() {
      VK.Retargeting.Init("VK-RTRG-1527673-1t4wP"), VK.Retargeting.Hit()
    }, document.head.appendChild(t)
  }();
</script>
<noscript><img src="https://vk.com/rtrg?p=VK-RTRG-1527673-1t4wP" style="position:fixed; left:-999px;" alt="" /></noscript>

<!-- VK-pixel-->
<script>
  ! function() {
    var t = document.createElement("script");
    t.async = !0, t.src = 'https://vk.com/js/api/openapi.js?169', t.onload = function() {
      VK.Retargeting.Init("VK-RTRG-1413699-2ZbwQ"), VK.Retargeting.Hit()
    }, document.head.appendChild(t)
  }();
</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-1413699-2ZbwQ" style="position:fixed; left:-999px;" alt="" /></noscript>
<!-- /VK-pixel -->

<!-- Top.Mail.Ru counter -->
<script>
  var _tmr = window._tmr || (window._tmr = []);
  _tmr.push({
    id: "3474743",
    type: "pageView",
    start: (new Date()).getTime()
  });
  (function(d, w, id) {
    if (d.getElementById(id)) return;
    var ts = d.createElement("script");
    ts.async = true;
    ts.id = id;
    ts.src = "https://top-fwz1.mail.ru/js/code.js";
    var f = function() {
      var s = d.getElementsByTagName("script")[0];
      s.parentNode.insertBefore(ts, s);
    };
    if (w.opera == "[object Opera]") {
      d.addEventListener("DOMContentLoaded", f, false);
    } else {
      f();
    }
  })(document, window, "tmr-code");
</script>
<noscript>
  <div><img src="https://top-fwz1.mail.ru/counter?id=3474743;js=na" style="position:absolute;left:-9999px;" alt="Top.Mail.Ru"></div>
</noscript>
<!-- /Top.Mail.Ru counter -->

<!-- Top100 (Kraken) Counter -->
<script>
  (function(w, d, c) {
    (w[c] = w[c] || []).push(function() {
      var options = {
        project: 7728152,
      };
      try {
        w.top100Counter = new top100(options);
      } catch (e) {}
    });
    var n = d.getElementsByTagName("script")[0],
      s = d.createElement("script"),
      f = function() {
        n.parentNode.insertBefore(s, n);
      };
    s.async = true;
    s.src =
      (d.location.protocol == "https:" ? "https:" : "http:") +
      "//st.top100.ru/top100/top100.js";

    if (w.opera == "[object Opera]") {
      d.addEventListener("DOMContentLoaded", f, false);
    } else {
      f();
    }
  })(window, document, "_top100q");
</script>
<noscript>
  <img src="//counter.rambler.ru/top100.cnt?pid=7728152" alt="Топ-100">
</noscript>
<!-- END Top100 (Kraken) Counter -->

</body>
</html>