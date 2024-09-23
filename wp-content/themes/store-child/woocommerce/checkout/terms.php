<?php
/**
 * Checkout terms and conditions area.
 *
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

if ( apply_filters( 'woocommerce_checkout_show_terms', true ) && function_exists( 'wc_terms_and_conditions_checkbox_enabled' ) ) {
	do_action( 'woocommerce_checkout_before_terms_and_conditions' );

	?>
	<div class="woocommerce-terms-and-conditions-wrapper">
		<?php
		/**
		 * Terms and conditions hook used to inject content.
		 *
		 * @since 3.4.0.
		 * @hooked wc_checkout_privacy_policy_text() Shows custom privacy policy text. Priority 20.
		 * @hooked wc_terms_and_conditions_page_content() Shows t&c page content. Priority 30.
		 */
		do_action( 'woocommerce_checkout_terms_and_conditions' );
		?>

		<?php if ( wc_terms_and_conditions_checkbox_enabled() ) : ?>
			<p class="form-row validate-required agreement-text">
  				<input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox custom-checkbox js-required-checkbox" name="terms" <?php checked( apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms'] ) ), true ); // WPCS: input var ok, csrf ok. ?> id="terms" onchange="document.getElementById('place_order').disabled = !this.checked;" checked>
  				<label for="terms" class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox custom-checkbox-label"></label>
				<span class="woocommerce-terms-and-conditions-checkbox-text">Я прочитал(а) и принимаю <a href="/politika-v-otnoshenii-obrabotki-personalnyh-dannyh/" target="_blank">правила и условия</a> сайта</span>&nbsp;<span class="required">*</span>
				</span>
			</p>
			<input type="hidden" name="terms-field" value="1">
		<?php endif; ?>
	</div>
	<?php

	do_action( 'woocommerce_checkout_after_terms_and_conditions' );
}
