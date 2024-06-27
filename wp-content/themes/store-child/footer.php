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

<footer>
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
					<p>© Общество с ограниченной <br /> ответственностью «Здоровье»</p>
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
						<a class="white" href="mailto: <?php echo $email ?>"><?php echo $email ?></a>
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
					<div class="search w70 m-b-30"><i class="bi bi-search m-r-10"></i>Поиск по сайту</div>
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

<script>
  ! function() {
    var t = document.createElement("script");
    t.type = "text/javascript", t.async = !0, t.src = 'https://vk.com/js/api/openapi.js?169', t.onload = function() {
      VK.Retargeting.Init("VK-RTRG-1527673-1t4wP"), VK.Retargeting.Hit()
    }, document.head.appendChild(t)
  }();
</script>
<noscript><img src="https://vk.com/rtrg?p=VK-RTRG-1527673-1t4wP" style="position:fixed; left:-999px;" alt="" /></noscript>


</body>

</html>