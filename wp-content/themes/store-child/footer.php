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
	<div class="container">
		<div class="row">
			<div class="col-lg-4 align-self-center with-logo">
				<div class="logo-side">
					<img src="<?php the_field('logotip_v_futere', 2); ?>" alt="logo">
					<p>Производственная натуропатическая аптека: натуральные препараты и лекарства, гомеопатия, капли Баха, гидролаты, витамины, соли Шюсслера</p>
					<p>© Общество с ограниченной <br> ответственностью «Здоровье»</p>
				</div>
				<?php
				$phone = get_field('nomer_telefona', 2);
				$email = get_field('email', 2);
				$vowels = array("+", "(", ")", " ", "-", "_");
				$truephone = str_replace($vowels, "", $phone); ?>
				<?php if ($phone) { ?>
					<div class="flex align-items-center m-t-50">
						<div class="icon phone">
						</div>
						<a class="white footer-phone" href="tel:<?php echo $truephone; ?>"><?php echo $phone; ?></a>
					</div>
				<?php } ?>
				<?php if ($email) { ?>
					<div class="flex align-items-center m-t-30">
						<div class="icon mail">
						</div>
						<a class="white" href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
					</div>
				<?php } ?>
				<div class="m-t-30">
					<p>г. Москва, ул. Алма-Атинская, д. 9, корп. 2</p><br>
					<p>Пн, Вт, Ср, Чт, Пт:</p>
					<p>С 10:00 до 20:00</p>
					<p>Сб, Вс: выходной</p>
				</div>
			</div>
			<div class="col-lg-4 align-self-center with-menu-footer">
				<?php
				wp_nav_menu(
					array(
						'menu' => 'footer_menu',
						'menu_id' => 'footer_menu',
					)
				);
				?>
			</div>
			<div class="col-lg-4 txt_r flex f-d-column j-content-sb a-items-fe">
				<div class="">
					<a href="#" class="green-b m-b-30 w70" data-fancybox="dialog-form1" data-src="#contact-form">Заказать звонок</a>
					<a href="#" class="green-b m-b-30 w70" data-fancybox="dialog-form2" data-src="#contact-form2">Подписаться на рассылку</a>
          <div class="search w70 m-b-30">
            <div class="search-content-wrapper" onclick="window.scrollTo(0,0)">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="search-lens" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
              </svg>
              <span class="search-text">Поиск по сайту</span>
            </div>
          </div>
				</div>
				<div class="w70 pay_box">
					<div class="flex j-content-c">
						<div class="pay_icons icon-visa" title="Visa"></div>
						<div class="pay_icons icon-mastercard" title="MasterCard"></div>
						<div class="pay_icons icon-mir" title="МИР"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-end">
		<p>
			<a href="/politika-v-otnoshenii-obrabotki-personalnyh-dannyh/" style="font-size: 1.7em;">Политика конфиденциальности</a><br>
			<a href="/soglasie-posetitelya-sajta-na-obrabotku-personalnyh-dannyh/" style="font-size: 1.7em;">Согласие на обработку персональных данных</a>
		</p>
		<p>© 2016&mdash;<?= date('Y') ?> Все права принадлежат ООО «Здоровье»</p>
		<p>Производственная натуропатическая аптека: натуральные препараты и лекарства, гомеопатия, капли Баха, гидролаты, витамины, соли Шюсслера</p>
	</div>
</footer>

<div id="contact-form" style="display:none;max-width: calc(100vw - 50px);">
	<?php echo do_shortcode('[contact-form-7 id="5357fd9" title="Заказать звонок"]');  ?>
</div>
<div id="contact-form2" style="display:none;max-width: calc(100vw - 50px);">
	<?php echo do_shortcode('[contact-form-7 id="b0981bb" title="Подписаться на рассылку"]');  ?>
</div>
<div id="contact-form3" style="display:none;max-width: calc(100vw - 50px);">
	<?php echo do_shortcode('[contact-form-7 id="b528218" title="Сотрудничество"]');  ?>
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

<!-- Yandex.Metrika counter -->
<!-- 
<script>
  (function(m, e, t, r, i, k, a) {
    m[i] = m[i] || function() {
      (m[i].a = m[i].a || []).push(arguments)
    };
    m[i].l = 1 * new Date();
    for (var j = 0; j < document.scripts.length; j++) {
      if (document.scripts[j].src === r) {
        return;
      }
    }
    k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
  })
  (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

  ym(95353045, "init", {
    clickmap: true,
    trackLinks: true,
    accurateTrackBounce: true,
    webvisor: true,
    ecommerce: "dataLayer"
  });
</script>
<noscript>
  <div><img src="https://mc.yandex.ru/watch/95353045" style="position:absolute; left:-9999px;" alt="" /></div>
</noscript>
 -->
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