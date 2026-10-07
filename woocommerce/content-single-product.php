<?php
/**
 * WooCommerce Single Product Template
 *
 * @package CerciEmre
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>

<div class="ce-single-product">
	<?php
	/**
	 * Hook: woocommerce_before_single_product.
	 */
	do_action( 'woocommerce_before_single_product' );
	?>

	<div class="ce-container">
		<?php woocommerce_breadcrumb(); ?>
	</div>

	<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

		<div class="ce-container">
			<div class="ce-single-product__main">
				<!-- Product Gallery -->
				<div class="ce-single-product__gallery">
					<?php
					/**
					 * Hook: woocommerce_before_single_product_summary.
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );
					?>
				</div>

				<!-- Product Summary -->
				<div class="ce-single-product__summary summary entry-summary">
					<?php
					/**
					 * Hook: woocommerce_single_product_summary.
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 */
					do_action( 'woocommerce_single_product_summary' );
					?>

					<!-- Trust Badges -->
					<div class="ce-single-product__trust">
						<div class="ce-single-product__trust-item">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
							<span><?php esc_html_e( 'Güvenli Ödeme', 'cerci-emre' ); ?></span>
						</div>
						<div class="ce-single-product__trust-item">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
							<span><?php esc_html_e( 'Hızlı Kargo', 'cerci-emre' ); ?></span>
						</div>
						<div class="ce-single-product__trust-item">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="20 12 20 22 4 22 4 12"></polyline><rect x="2" y="7" width="20" height="5"></rect><line x1="12" y1="22" x2="12" y2="7"></line><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path></svg>
							<span><?php esc_html_e( 'Doğal Ürün', 'cerci-emre' ); ?></span>
						</div>
					</div>
				</div>

			</div>
		</div>

		<div class="ce-container">
			<?php
			/**
			 * Hook: woocommerce_after_single_product_summary.
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_upsell_display - 15
			 * @hooked woocommerce_output_related_products - 20
			 */
			do_action( 'woocommerce_after_single_product_summary' );
			?>
		</div>

	</div>

	<?php do_action( 'woocommerce_after_single_product' ); ?>
</div>
