<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php wp_body_open(); ?>

  <?php do_action('storefront_before_site'); ?>

  <div id="page" class="hfeed site">
    <?php do_action('storefront_before_header'); ?>

    <header class="header">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <div class="header-top__address">
                <img src="/wp-content/themes/store-child/includes/images/svg/geolocation.svg" class="geolocation" alt="геометка">
                <span class="address-text">г. Москва, ул. Алма-Атинская, д. 9, корп. 2 | Пн-Пт: 10:00 до 20:00, Сб-Вс: выходной</span>
              </div>
            </div>
            <div class="col-md-2">
              <div class="socials-icons">
                <a href="https://t.me/naturaproff" class="social-icons__link" rel="nofollow noopener" target="_blank">
                  <img src="/wp-content/themes/store-child/includes/images/svg/circle-tg.svg" class="social-icons__image social-icons__tg" alt="телеграм">
                </a>
                <a href="https://vk.com/natura.pharma" class="social-icons__link" rel="nofollow noopener" target="_blank">
                  <img src="/wp-content/themes/store-child/includes/images/svg/circle-vk.svg" class="social-icons__image social-icons__vk" alt="вконтакте">
                </a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="phone-wrapper">
                <a href="#" rel="nofollow noopener" target="_blank">
                  <img src="/wp-content/themes/store-child/includes/images/svg/circle-wa.svg" class="social-icons__image social-icons__wa" alt="ватсап">
                </a>
                <a href="tel:+74959274928" class="social-icons__link" rel="nofollow noopener" target="_blank">
                  <img src="/wp-content/themes/store-child/includes/images/svg/circle-call.svg" class="social-icons__image social-icons__call" alt="звонок">
                </a>
                <a href="tel:+74959274928" class="phone-text">+7 (495) 927-4-928</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- 
    <div class="header" id="myHeader">
      <div class="main_menu hidden-mobile">
      <div class="main_menu">
        <div class="container">
          <?php
          wp_nav_menu(
            array(
              'menu' => 'header_menu',
              'menu_id' => 'header_menu',
            )
          );
          ?>
        </div>
      </div>
      <header class="main-header">
        <div class="container">
          <div class="main-top">
            <div class="align-self-center">
              <div class="logo">
                <a href="/" class="main-header-logo-link" rel="home">
                  <img src="/wp-content/themes/store-child/includes/images/logo.svg" class="logo-image" alt="NaturaPharma">
                </a>
              </div>
            </div>
            <div class="align-self-center with-links">
              <div class="header-links header-address">г. Москва, ул. Алма-Атинская, д. 9, корп. 2 | Пн-Пт: 10:00 до 20:00, Сб-Вс: выходной</div>
              <div class="header-links">
                <?php
                $vk = get_field('link_vk', 2);
                $tg = get_field('link_telegram', 2);
                $phone = get_field('nomer_telefona', 2);
                $truephone = str_replace($vowels, "", $phone);
                if ($vk) { ?>
                  <a href="<?php echo $vk; ?>" rel="nofollow noopener" target="_blank">
                    <div class="circle-green vk"></div>
                  </a>
                <?php } ?>
                <?php if ($tg) { ?>
                  <a href="<?php echo $tg; ?>" rel="nofollow noopener" target="_blank">
                    <div class="circle-green tg"></div>
                  </a>
                <?php } ?>
                <a href="tel:+74959274928">
                  <div class="circle-green phone"></div>
                </a>
                <div class="header-contacts">
                  <a href="tel:+74959274928" class="header-contacts__phone">+7 (495) 927-4-928</a>
                  <a href="mailto:info@naturapharma.ru" class="header-contacts__email">info@naturapharma.ru</a>
                </div>
              </div>
              <?php echo do_shortcode('[fibosearch]'); ?>
            </div>
            <div class="align-self-center with-menu">
              <div class="header-navigation">
                <?php global $woocommerce; ?>
                <div class="woo-customs">
                  <div class="header-navigation__favourite">
                    <a href="#" class="header-navigation__link">
                      <img src="/wp-content/themes/store-child/includes/images/svg/favourite-with-circle.svg" class="header-navigation__favourite-image" alt="">
                      <span class="count header-navigation__count">0</span>
                    </a>
                  </div>
                  <div class="header-navigation__cart">
                    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="header-navigation__link">
                      <img src="/wp-content/themes/store-child/includes/images/svg/basket.svg" class="header-navigation__cart-image" alt="">
                      <span class="count header-navigation__count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
    </div>
     -->

    <div id="content" class="site-content" tabindex="-1">

      <?php if (!is_front_page()) { ?>
        <div class="h_green_line"></div>
      <?php } ?>
      <div class="container">
        <?php
        /**
         * Functions hooked in to storefront_before_content
         *
         * @hooked storefront_header_widget_region - 10
         * @hooked woocommerce_breadcrumb - 10
         */
        do_action('storefront_before_content');
        ?>
      </div>

      <?php do_action('storefront_content_top');
