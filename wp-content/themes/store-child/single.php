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

    <div class="single-section">
      <div class="container">
        <div class="page-title"><?php the_title(); ?></div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-5 mx-auto">
            <div class="single-image">
              <?php the_post_thumbnail(''); ?>
            </div>
          </div>
        </div>
        <div class="single-content">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
    
    <?php if( in_category( [393, 392, 391, 186, 187, 188, 190, 128, 122, 124, 123, 125, 126] ) ) { // специалисты ?>
    <div class="lead-form-section">
      <div class="container">
        <div class="lead-form-section-title">ЗАПИСАТЬСЯ НА КОНСУЛЬТАЦИЮ</div> 
        <form id="lfs-form" class="form">
          <div class="row">
            <div class="col-lg-6">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" name="name" id="lfs-name" class="input-field js-required-name" required>
                    <label for="lfs-name" class="label">Имя<span class="terracota-color">*</span></label>
                  </div>
                  <div class="form-group">
                    <input type="text" name="telegram" id="lfs-telegram" class="input-field js-input-telegram-mask" placeholder="формат @name">
                    <label for="lfs-telegram" class="label">Телеграм</label>
                  </div>
                  <div class="form-group">
                    <input type="text" name="phone" id="lfs-phone" class="input-field js-required-phone js-input-phone-mask" placeholder="+7 (000) 000 00 00" required>
                    <label for="lfs-phone" class="label">Телефон<span class="terracota-color">*</span></label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" name="surname" id="lfs-surname" class="input-field js-required-surname" required>
                    <label for="lfs-surname" class="label">Фамилия<span class="terracota-color">*</span></label>
                  </div>
                  
                  <div class="form-group">
                    <input type="email" name="email" id="lfs-email" class="input-field js-required-email" required>
                    <label for="lfs-email" class="label">Эл. почта<span class="terracota-color">*</span></label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <textarea name="message" id="lfs-message" class="input-field textarea"></textarea>
                <label for="lfs-telegram" class="label">Комментарий</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <button type="button" id="lfs-submit-btn" class="submit-btn">Отправить</button>
              <div class="agreement-text">
                <input type="checkbox" id="lfs-checkbox-input" name="checkbox" class="custom-checkbox js-required-checkbox" checked onchange="document.getElementById('lfs-submit-btn').disabled = !this.checked;">
                <label for="lfs-checkbox-input" class="custom-checkbox-label"></label>
                <span>Нажимая кнопку вы соглашаетесь с <a href="/politika-v-otnoshenii-obrabotki-personalnyh-dannyh">политикой обработки данных</a></span>
              </div>
            </div>
          </div>
          <?php $expert_email = get_post_meta( $post->ID, 'expert_email', true ); ?>
          <input type="hidden" name="cc" value="<?php echo $expert_email ? $expert_email : ""; ?>">
        </form>
      </div>
    </div>

  <?php } ?>

</div>

<?php get_footer(); ?>