<?php
/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

$page_title = ( 'billing' === $load_address ) ? esc_html__( 'Billing address', 'woocommerce' ) : esc_html__( 'Shipping address', 'woocommerce' );

do_action( 'woocommerce_before_edit_account_address_form' ); ?>

<?php if ( ! $load_address ) : ?>
	<?php wc_get_template( 'myaccount/my-address.php' ); ?>
<?php else : ?>
    <style>
        .woocommerce h3 {
            text-align: center;
            margin-top: 10px;
        }
        .woocommerce-address-fields__field-wrapper {
            
        }
        .woocommerce-address-fields__field-wrapper > p {
            width: 100% !important;
            display: flex;
            padding: 0 20px;
            align-items: center;
            border-bottom: 1px solid #e3e3e3;
        }
        .woocommerce-address-fields__field-wrapper > p > label{
            width: 160px;
            font-size: 12px;
            font-weight: bold;
        }
        .woocommerce form .form-row .input-text, .woocommerce-page form .form-row .input-text {
            border: none;
            outline: none;
            font-size: 12px;
            padding: 0 0;
            margin-bottom: 0.5rem;
        }
        #billing_address_2_field > span, #shipping_address_2_field > span {
            width: 100%;
        }
        .woocommerce form .form-row select, .woocommerce-page form .form-row select {
            font-size: 12px;
        }
    </style>
	<form method="post">

		<h3><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title, $load_address ); ?></h3><?php // @codingStandardsIgnoreLine ?>

		<div class="woocommerce-address-fields">
			<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

			<div class="woocommerce-address-fields__field-wrapper">
				<?php
				foreach ( $address as $key => $field ) {
					woocommerce_form_field( $key, $field, wc_get_post_data_by_key( $key, $field['value'] ) );
				}
				?>
			</div>

			<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

			<p style="text-align: center;">
				<button type="submit" class="button" name="save_address" value="<?php esc_attr_e( 'Save address', 'woocommerce' ); ?>"><?php esc_html_e( 'Save address', 'woocommerce' ); ?></button>
				<?php wp_nonce_field( 'woocommerce-edit_address', 'woocommerce-edit-address-nonce' ); ?>
				<input type="hidden" name="action" value="edit_address" />
			</p>
		</div>

	</form>

<?php endif; ?>

<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>
