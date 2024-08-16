<?php
/**
 * Single page
 * @package WordPress
 * @subpackage Store CHild Theme
 * Template Name: Шаблон блога
 */

?>

<?php get_header(); ?>

<div class="single-page custom-page">
  <div class="container">
    <div class="storefront-breadcrumb">
      <nav class="woocommerce-breadcrumb">
        <a href="/">Главная</a>
        <span class="breadcrumb-separator">></span>
      </nav>
    </div>
  </div>

  <div class="single-section">

    <div class="container">
      <div class="page-title"><?php the_title(); ?></div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="single-image">
            <?php the_post_thumbnail(''); ?>
          </div>
        </div>
        <div class="col-md-7">
          <div class="single-content">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php if( in_category( [393, 392, 391, 186, 187, 188, 190, 128, 122, 124, 123, 125, 126] ) ) { ?>
    <div class="lead-form-section">
      <div class="container">
        <div class="lead-form-section-title">ЗАПИСАТЬСЯ НА КОНСУЛЬТАЦИЮ</div> 
        <form class="form">
          <div class="form-group">
            <input type="text" name="name" id="lfs-name" class="input-field" required>
            <label for="lfs-name" class="label">имя<span class="red-color">*</span></label>
          </div>
          <div class="form-group">
            <input type="text" name="surname" id="lfs-surname" class="input-field">
            <label for="lfs-surname" class="label">фамилия</label>
          </div>
          <div class="form-group">
            <input type="text" name="phone" id="lfs-phone" class="input-field" placeholder="+7 (000) 000 00 00">
            <label for="lfs-phone" class="label">телефон<span class="red-color">*</span></label>
          </div>
          <div class="form-group">
            <input type="email" name="email" id="lfs-email" class="input-field">
            <label for="lfs-email" class="label">эл. почта<span class="red-color">*</span></label>
          </div>
          <div class="form-group">
            <input type="text" name="telegram" id="lfs-telegram" class="input-field" placeholder="формат @name">
            <label for="lfs-telegram" class="label">телеграм<span class="red-color">*</span></label>
          </div>

          <button type="button" id="lfs-submit" class="submit-btn">Отправить</button>
          <div class="agreement-text">
            <input type="checkbox" name="checkbox" class="custom-checkbox" checked onchange="document.getElementById('lfs-submit').disabled = !this.checked;">
            <label for="lfs-checkbox-form" class="custom-checkbox-label"></label>
            <span>Нажимая кнопку вы соглашаетесь с <a href="/politika-v-otnoshenii-obrabotki-personalnyh-dannyh">политикой обработки данных</a></span>
          </div>
        </form>
      </div>
    </div>
  <?php } ?>
  
</div>

<?php get_footer(); ?>