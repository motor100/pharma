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

    <div class="header" id="myHeader">
      <div class="main_menu">
        <div class="container">
          <div class="row">
            <div class="head-nav">
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
        </div>
      </div>
      <header class="main-header">
        <div class="container">
          <div class="row">
            <div class="main-top">
              <div class="align-self-center">
                <div class="logo">
                  <?php if (is_front_page()) : ?>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/includes/images/logo.svg" alt="NaturaPharma">
                  <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/includes/images/logo.svg" alt="NaturaPharma">
                    </a>
                  <?php endif; ?>
                </div>
              </div>
              <div class="align-self-center with-links">
                <div class="header-links" style=" font-size: 14px; ">г. Москва, ул. Алма-Атинская, д. 9, корп. 2 | Пн-Пт: 10:00 до 20:00, Сб-Вс: выходной<br></div>
                <div class="header-links">
                  <?php
                  $vk = get_field('link_vk', 2);
                  $tg = get_field('link_telegram', 2);
                  $phone = get_field('nomer_telefona', 2);
                  $truephone = str_replace($vowels, "", $phone);
                  if ($vk) { ?>
                    <a href="<?php echo $vk ?>" target="_blank" rel="nofollow noopener">
                      <div class="circle-green vk"></div>
                    </a>
                  <?php } ?>
                  <?php if ($tg) { ?>
                    <a href="<?php echo $tg ?>" target="_blank" rel="nofollow noopener">
                      <div class="circle-green tg"></div>
                    </a>
                  <?php } ?>
                  <a href="tel:+74959274928">
                    <div class="circle-green phone"></div>
                  </a>
                  <div>
                    <a href="tel:+74959274928" style="font-size: 18px;">+7 (495) 927-4-928</a>
                    <a href="mailto:info@naturapharma.ru" style="font-size: 18px;">info@naturapharma.ru</a>
                  </div>
                </div>
                <?php echo do_shortcode('[fibosearch]'); ?>
              </div>
              <div class="align-self-center with-menu">
                <div class="header-navigation">
                  <div class="head-nav"></div>
                  <?php global $woocommerce; ?>
                  <div class="woo-customs">
                    <div><a href="<?php echo $woocommerce->cart->get_cart_url() ?>">
                        <div class="circle-green basket"></div>
                        <div class="count"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></div>
                      </a></div>
                    <div>
                      <div class="circle-green favorite"></div>
                      <div class="count">0</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
    </div>

    <div id="content" class="site-content" tabindex="-1">

      <script>
        if (window.innerWidth >= 991) {


          // When the user scrolls the page, execute myFunction
          window.onscroll = function() {
            myFunction()
          };

          // Get the header
          var header = document.getElementById("myHeader");

          // Get the offset position of the navbar
          var sticky = header.offsetTop;

          // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
          function myFunction() {
            if (window.pageYOffset > sticky) {
              header.classList.add("sticky");
            } else {
              header.classList.remove("sticky");
            }
          }

        } else {
          //не выполнять
        }
      </script>

      <?php if (!is_front_page()) { ?>
        <div class="h_green_line">
        </div>
      <?php } ?>
      <div class="container">
        <div class="row">
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
      </div>

      <?php do_action('storefront_content_top');
